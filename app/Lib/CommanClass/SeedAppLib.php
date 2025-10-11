<?php

namespace App\Lib\CommanClass;

use Illuminate\Support\Facades\Mail;
use App\Lib\ShopInstall\AppAuthorizer;
use App\Mail\WelcomeEmail;
use App\Models\Settings;
use App\Models\Shops;
use Illuminate\Support\Facades\DB;
use PHPShopify\ShopifySDK;

class SeedAppLib
{
    /**
     *  Seed Default data on app install
     */
    public static function seedDefaultData($shop_id)
    {
        $shopData = Shops::find($shop_id);

        try
        {
            $config = AppAuthorizer::returnConfig($shopData->shop_name, $shopData->permanent_token);

            $shopify = new ShopifySDK($config);
           
            $query = '
                {
                    shop
                    {
                        name
                        email
                        contactEmail
                        currencyFormats
                        {
                            moneyWithCurrencyFormat
                        }
                        billingAddress
                        {
                            address1
                            address2
                            city
                            company
                            country
                            phone
                        }
                    }
                }';

            $shop = $shopify->GraphQL->post($query);

            self::saveShopSettings($shop_id, $shop);
        }
        catch (\Exception $e)
        {
            \Log::alert($e->getMessage().$e->getFile().$e->getLine());
        }
    }


    /**
     * @param $data
     */
    protected static function saveShopSettings($shop_id, $data)
    {
        try
        {
            $now = date("Y-m-d H:i:s");

            $address = !empty($data['data']['shop']['billingAddress']['address1']) ? $data['data']['shop']['billingAddress']['address1'] : '';
            $address .= !empty($data['data']['shop']['billingAddress']['address2']) ? ' ' . $data['data']['shop']['billingAddress']['address2'] : '';
            $address .= !empty($data['data']['shop']['billingAddress']['city']) ? ', ' . $data['data']['shop']['billingAddress']['city'] : '';
            $address .= !empty($data['data']['shop']['billingAddress']['country']) ? ', ' . $data['data']['shop']['billingAddress']['country'] : '';

            $arr = array(
                array('shop_id' => $shop_id, 'key' => 'email_from_name', 'value' => $data['data']['shop']['name'], 'created_at' => $now, 'updated_at' => $now),
                array('shop_id' => $shop_id, 'key' => 'email_from', 'value' => $data['data']['shop']['email'], 'created_at' => $now, 'updated_at' => $now),
                array('shop_id' => $shop_id, 'key' => 'contact_email', 'value' => (!empty($data['data']['shop']['contactEmail']) ? $data['data']['shop']['contactEmail'] : ''), 'created_at' => $now, 'updated_at' => $now),
                array('shop_id' => $shop_id, 'key' => 'currency_format', 'value' => (!empty($data['data']['shop']['currencyFormats']['moneyWithCurrencyFormat']) ? $data['data']['shop']['currencyFormats']['moneyWithCurrencyFormat'] : ''), 'created_at' => $now, 'updated_at' => $now),
                array('shop_id' => $shop_id, 'key' => 'address', 'value' => $address, 'created_at' => $now, 'updated_at' => $now),
                array('shop_id' => $shop_id, 'key' => 'company', 'value' => (!empty($data['data']['shop']['billingAddress']['company']) ? $data['data']['shop']['billingAddress']['company'] : ''), 'created_at' => $now, 'updated_at' => $now),
                array('shop_id' => $shop_id, 'key' => 'phone', 'value' => (!empty($data['data']['shop']['billingAddress']['phone']) ? $data['data']['shop']['billingAddress']['phone'] : ''), 'created_at' => $now, 'updated_at' => $now),
                array('shop_id' => $shop_id, 'key' => 'jyotisham_astro_api', 'value' => env('JYOTISHAM_ASTRO_API_KEY'), 'created_at' => $now, 'updated_at' => $now),
            );

            DB::table('shop_settings')->upsert(
                $arr,
                ['shop_id', 'key'],
                ['value', 'updated_at']
            );
          
            // Save plan credits for basic plan (plan_id = 1)
            
            Settings::updateOrCreate(
                ['shop_id' => $shop_id, 'key' => 'plan_credits'],
                ['value' => env('Plan_1_Credits')]
            );

            self::sendMail(array("email_from" => $data['data']['shop']['email'], "email_from_name" => $data['data']['shop']['name']));
        }
        catch (\Exception $e)
        {
            \Log::alert($e->getMessage().$e->getFile().$e->getLine());
        }
    }

    protected static function sendMail($contents)
    {
        try
        {
            if (!empty($contents['email_from']))
            {
                $data['message'] = '';
                $data['toName'] = $contents['email_from_name'];

                $data['to'] = $contents['email_from'];
                $data['name'] = $contents['email_from_name'];

                $data['from_email'] = env('EMAIL_FROM');
                $data['from_name'] = env('EMAIL_FROM_NAME');

                $data['subject'] = 'Welcome to '. env("APP_NAME");

                $message = (new WelcomeEmail($data))->onQueue('default');

                Mail::to($data['to'])->queue($message);

            }
        }
        catch (\Exception $e)
        {
            \Log::alert($e->getMessage().$e->getFile().$e->getLine());
        }
    }
}
