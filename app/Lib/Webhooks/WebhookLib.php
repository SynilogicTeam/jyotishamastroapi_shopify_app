<?php

namespace App\Lib\Webhooks;

use App\Lib;
use App\Lib\API\Kundali;
use App\Mail\UninstallEmail;
use App\Models\KundaliPayment;
use App\Models\Settings;
use App\Models\Shops;
use App\Models\UserKundali;
use App\Models\UserMatchKundali;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PHPShopify\ShopifySDK;

class WebhookLib
{
    public static function getShopDetails($input)
    {
        $ShopName = Lib\ShopInstall\AppInstaller::getShopNameFromString($input['myshopify_domain']);
        
        return Shops::getShopUserByShopName($ShopName);
    }
    
    public static function appUninstall($input)
    {
        $shop = self::getShopDetails($input);
        
        $is_active = 1;
        
        if($shop)
        {
            try
            {
                $config = Lib\ShopInstall\AppAuthorizer::returnConfig($shop->shop_name, $shop->permanent_token);

                $shopify = new ShopifySDK($config);
                
                $query = '
                {
                    shop
                    {
                        email
                    }
                }';

                $shopify->GraphQL->post($query);
            }
            catch (\Exception $e)
            {
                $is_active = 0;
            }

            if($is_active == 0)
            {
                try
                {
                    $shop->is_active = 0;
                    $shop->save();
                    
                    KundaliPayment::where('shop_id', $shop->id)->delete();
                    Settings::where('shop_id', $shop->id)->delete();
                    UserKundali::where('shop_id', $shop->id)->delete();
                    UserMatchKundali::where('shop_id', $shop->id)->delete();
                    
                    if ($shop->payment_status != 'pending')
                    {
                        Session::put('shop_id', $shop->id);
                        Session::save();
                        
                        $data['message'] = '';
                        $data['toName'] = $shop->shop_name;
                        
                        $data['to'] = $shop['email'];
                        $data['name'] = $shop->shop_name;
                        
                        $data['from_email'] = env('EMAIL_FROM');
                        $data['from_name'] = env('EMAIL_FROM_NAME');
                        
                        $data['subject'] = "App Uninstalled: " . env("APP_NAME");
                        
                        $message = (new UninstallEmail($data))->onQueue('default');
                      Log::alert($message);
                      Log::alert("message");
                        
                        Mail::to($data['to'])->queue($message);
                    }
                }
                catch (\Exception $e)
                {
                    Log::alert($e->getMessage().$e->getFile().$e->getLine()." in appUninstall function");
                }
            }
        }
    }
    
    public static function shopDataRedactWebhook($input)
    {
        $shop = self::getShopDetails($input);

        $is_active = 1;

        if ($shop)
        {
            try
            {
                $config = Lib\ShopInstall\AppAuthorizer::returnConfig($shop->shop_name, $shop->permanent_token);

                $shopify = new ShopifySDK($config);

                $query = '
                {
                    shop
                    {
                        email
                    }
                }';

                $shopify->GraphQL->post($query);
            }
            catch (\Exception $e)
            {
                $is_active = 0;
            }

            if ($is_active == 0)
            {
                KundaliPayment::where('shop_id', $shop->id)->delete();
                Settings::where('shop_id', $shop->id)->delete();
                UserKundali::where('shop_id', $shop->id)->delete();
                UserMatchKundali::where('shop_id', $shop->id)->delete();
            }
        }
    }

    public static function ordersCreateWebhook($order)
    {
        $input['myshopify_domain'] = app('request')->header('X-Shopify-Shop-Domain');

        $shop = self::getShopDetails($input);

        if ($shop)
        {
            try
            {
                $config = Lib\ShopInstall\AppAuthorizer::returnConfig($shop->shop_name, $shop->permanent_token);

                $shopify = new ShopifySDK($config);

                $query = '
                {
                    customer(id: "'.$order['customer']['admin_graphql_api_id'].'") {
                        firstName
                        lastName
                        email
                    }
                }';

                $customer = $shopify->GraphQL->post($query);

                foreach($order['line_items'] as $line_item)
                {
                    $properties = [];
                    if (!empty($line_item['properties']) && is_array($line_item['properties'])) {
                        foreach ($line_item['properties'] as $prop) {
                            if (isset($prop['name']) && isset($prop['value'])) {
                                $properties[$prop['name']] = $prop['value'];
                            }
                        }
                    }

                    if (!empty($properties['shop_id']) && !empty($properties['plan_id']) && !empty($properties['kundali_id']))
                    {
                        $kundali_payment = KundaliPayment::where(['kundali_id' => $properties['kundali_id'], 'order_id' => $order['id'], 'shop_id' => $properties['shop_id'], 'customer_id' => $order['customer']['id']])->first();
                        
                        if(empty($kundali_payment))
                        {
                            // Fetch price based on plan_id
                            $price = 0;
                            if($properties['plan_id'] == 1)
                            {
                                $settings = Settings::where(['shop_id' => $properties['shop_id'], 'key' => 'small_kundali_price'])->first(['value']);
                                $price = !empty($settings['value']) ? $settings['value'] : 0;
                            }
                            else if($properties['plan_id'] == 2)
                            {
                                $settings = Settings::where(['shop_id' => $properties['shop_id'], 'key' => 'medium_kundali_price'])->first(['value']);
                                $price = !empty($settings['value']) ? $settings['value'] : 0;
                            }
                            else if($properties['plan_id'] == 3)
                            {
                                $settings = Settings::where(['shop_id' => $properties['shop_id'], 'key' => 'large_kundali_price'])->first(['value']);
                                $price = !empty($settings['value']) ? $settings['value'] : 0;
                            }
                            else if($properties['plan_id'] == 4)
                            {
                                $settings = Settings::where(['shop_id' => $properties['shop_id'], 'key' => 'kundali_match_price'])->first(['value']);
                                $price = !empty($settings['value']) ? $settings['value'] : 0;
                            }

                            $kundali_payment = new KundaliPayment();
                            $kundali_payment->kundali_id = $properties['kundali_id'];
                            $kundali_payment->plan_id = $properties['plan_id'];
                            $kundali_payment->shop_id = $properties['shop_id'];
                            $kundali_payment->order_id = $order['id'];
                            $kundali_payment->customer_id = $order['customer']['id'];
                            $kundali_payment->kundali_type = ($properties['kundali_type'] == "kundali") ? "kundali" : "kundali_matching";
                            $kundali_payment->price = $price;
                            $kundali_payment->save();
                            
                            Kundali::generateKundaliPDF($properties['shop_id'], $properties['kundali_id'], $kundali_payment->id, $properties['plan_id'], $properties['kundali_type'], ($customer['data']['customer']) ? $customer['data']['customer'] : []);
                        }
                    }
                    else
                    {
                        Log::alert("Kundali ID or Plan ID or Shop ID is empty in ordersCreateWebhook function");
                    }
                }
            }
            catch (\Exception $e)
            {
                Log::alert($e->getMessage().$e->getFile().$e->getLine()." In ordersCreateWebhook function");
            }
        }
    }
}
