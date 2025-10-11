<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\Webhooks\WebhookLib;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class WebhookController extends Controller
{
    protected $debug = true;
    
    function __construct()
    {
        $this->middleware('VerifyWebhooks', ['except'=>['appUninstalled']]);
    }
    
    public function WebhookAllRequests($type, $event)
    {
        try
        {
            $route = $type.ucfirst($event);
            $this->$route();
            return response()->json(['success' => true]);
        }
        catch (\Exception $e)
        {
        }
    }
    
    /**
    * Call When App Uninstalled
    */
    public function appUninstalled(){
        
        $input = FacadesRequest::all();
        
        $valueapp = WebhookLib::appUninstall($input);
      	Log::alert($valueapp);
      Log::alert("valueapp");
    }
    
    public function shopDelete()
    {
        $input = FacadesRequest::all();

        WebhookLib::shopDataRedactWebhook($input);
    }

    public function ordersCreate()
    {
        $input = FacadesRequest::all();
		/**\Log::alert($input);	
      	 *\Log::alert("input");
        */
       	WebhookLib::ordersCreateWebhook($input); 
      
    }
    
    public function customerDelete()
    {
        return response()->json(['Error' => "Data not found"]);
    }

    public function customerGet()
    {
        return response()->json(['Error' => "Data not found"]);
    }
}
