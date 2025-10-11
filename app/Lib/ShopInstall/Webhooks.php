<?php

namespace App\Lib\ShopInstall;

class Webhooks
{
    public static function createWebhooks($shopify, $webhookArray = [])
    {
        foreach ($webhookArray as $webhook) {

            try
            {
                if($webhook == 'APP_UNINSTALLED')
                {
                    $endpoint = url("/webhook/app/uninstalled");
                  \Log::alert($endpoint);
                  \Log::alert("endpoint");
                }
                else if($webhook == 'ORDERS_CREATE')
                {
                    $endpoint = url("/webhook/orders/create");
                }
                
                $mutation = '
                    mutation {
                        webhookSubscriptionCreate(
                            topic: '.$webhook.', 
                            webhookSubscription: {
                                callbackUrl: "'.$endpoint.'",
                                format: JSON
                            }
                        ) {
                            webhookSubscription {
                                id
                                topic
                                format
                                endpoint {
                                    __typename
                                    ... on WebhookHttpEndpoint {
                                        callbackUrl
                                    }
                                }
                            }
                            userErrors {
                                field
                                message
                            }
                        }
                    }';
    
                $shopify->GraphQL->post($mutation);
            }
            catch (\Exception $e)
            {
                \Log::error($e->getMessage());
            }
        }
    }
}