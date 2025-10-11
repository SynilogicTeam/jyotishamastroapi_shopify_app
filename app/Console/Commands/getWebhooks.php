<?php

namespace App\Console\Commands;

use App\Lib\ShopInstall\AppAuthorizer;
use App\Models\Shops;
use Illuminate\Console\Command;
use PHPShopify\ShopifySDK;

class getWebhooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getWebhooks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $shopName = $this->ask("Enter shop name");

        $shopData = Shops::getActiveShop($shopName, ['id', 'shop_name', 'permanent_token']);

        if($shopData) {
            $config = AppAuthorizer::returnConfig($shopName, $shopData->permanent_token);
            $shopify = new ShopifySDK($config);

            $response = $shopify->Webhook->get();
            \Log::alert($response);
            foreach ($response as $data) {
                $this->info($data['address']);
            }
        }
    }
}
