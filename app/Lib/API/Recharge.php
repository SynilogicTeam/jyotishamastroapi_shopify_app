<?php

namespace App\Lib\API;

use App\Http\Controllers\AppController;
use App\Models\Settings;
use Illuminate\Support\Facades\Log;

class Recharge
{    
    public static function CreateRechargeDraftOrder($customer_id, $shop_id, $kundali_id, $kundali_type, $plan_id)
    {
        try
        {
            if(!empty($shop_id))
            {
                $shopify = AppController::CreateShopifyObject($shop_id);

                if($plan_id == 1)
                {
                    $settings = Settings::where(['shop_id' => $shop_id, 'key' => 'small_kundali_price'])->first(['value']);
                    $price = !empty($settings['value']) ? $settings['value'] : 0;
                    $title = env("Small_Kundali_Title");
                }
                else if($plan_id == 2)
                {
                    $settings = Settings::where(['shop_id' => $shop_id, 'key' => 'medium_kundali_price'])->first(['value']);
                    $price = !empty($settings['value']) ? $settings['value'] : 0;
                    $title = env("Medium_Kundali_Title");
                }
                else if($plan_id == 3)
                {
                    $settings = Settings::where(['shop_id' => $shop_id, 'key' => 'large_kundali_price'])->first(['value']);
                    $price = !empty($settings['value']) ? $settings['value'] : 0;
                    $title = env("Large_Kundali_Title");
                }
                else if($plan_id == 4)
                {
                    $settings = Settings::where(['shop_id' => $shop_id, 'key' => 'kundali_match_price'])->first(['value']);
                    $price = !empty($settings['value']) ? $settings['value'] : 0;
                    $title = env("Kundali_Matching_Title");
                }
            
                if(!empty($customer_id))
                {
                    $query = '
                        mutation {
                            draftOrderCreate(input: {
                                customerId: "gid://shopify/Customer/'.$customer_id.'"
                                lineItems: [{
                                    title: "'.$title.'"
                                    quantity: 1
                                    originalUnitPrice: '.$price.'
                                    customAttributes: [
                                        {
                                            key: "kundali_id"
                                            value: "'.$kundali_id.'"
                                        },
                                        {
                                            key: "plan_id"
                                            value: "'.$plan_id.'"
                                        },
                                        {
                                            key: "shop_id"
                                            value: "'.$shop_id.'"
                                        },
                                        {
                                            key: "kundali_type"
                                            value: "'.$kundali_type.'"
                                        }
                                    ]
                                }]
                            }) {
                                draftOrder
                                {
                                    id
                                    invoiceUrl
                                }
                                userErrors {
                                    field
                                    message
                                }
                            }
                        }';

                    $response = $shopify->GraphQL->post($query);
\Log::alert($response);
                    return $response['data']['draftOrderCreate']['draftOrder']['invoiceUrl'];
                }
            }

            return "";
        }
        catch (\Exception $e)
        {
            Log::alert($e->getMessage().$e->getFile().$e->getLine()." in CreateRechargeDraftOrder function");
        }
    }   
}