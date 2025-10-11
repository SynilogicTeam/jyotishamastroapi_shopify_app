<?php

namespace App\Lib\API;

use App\Mail\SendKundaliPDF_Mail;
use App\Models\KundaliPayment;
use App\Models\Settings;
use App\Models\UserKundali;
use App\Models\UserMatchKundali;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class Kundali
{    
    public static function generateKundaliPDF($shop_id, $kundali_id, $kundali_payment_id, $plan_id, $kundali_type, $customer)
    {
        try
        {
            $jyotisham_astro_api = Settings::where(['shop_id' => $shop_id, 'key' => 'jyotisham_astro_api'])->first(['value']);
            $contact_number = Settings::where(['shop_id' => $shop_id, 'key' => 'phone'])->first(['value']);
            $contact_email = Settings::where(['shop_id' => $shop_id, 'key' => 'contact_email'])->first(['value']);
            $address = Settings::where(['shop_id' => $shop_id, 'key' => 'address'])->first(['value']);
            $company = Settings::where(['shop_id' => $shop_id, 'key' => 'company'])->first(['value']);

            if($kundali_type == "kundali")
            {
                if($plan_id == 1)
                {
                    $pdf_type = "small";
                }
                else if($plan_id == 2)
                {
                    $pdf_type = "medium";
                }
                else if($plan_id == 3)
                {
                    $pdf_type = "large";
                }
                
                $kundali = UserKundali::find($kundali_id);

                $apiUrl = "https://api.jyotishamastroapi.com/api/pdf/generate";
                $params = [
                    'name' => $kundali->name,
                    'date' => \Carbon\Carbon::parse($kundali->birth_date)->format('d/m/Y'),
                    'time' => $kundali->birth_time,
                    'lat' => $kundali->latitude,
                    'lon' => $kundali->longitude,
                    'tz' => $kundali->tz,
                    'lang' => $kundali->language,
                    'style' => $kundali->style,
                    'place' => $kundali->birth_place,
                    'company_name' => ($company['value']) ? $company['value'] : '',
                    'company_address' => ($address['value']) ? $address['value'] : '',
                    'company_email' => ($contact_email['value']) ? $contact_email['value'] : '',
                    'company_phone' => ($contact_number['value']) ? $contact_number['value'] : '',
                    'company_website' => ($company['value']) ? 'https://'.$company['value'].'.myshopify.com' : '',
                    'pdf_type' => $pdf_type
                ];
            }
            else
            {
                $kundali = UserMatchKundali::find($kundali_id);

                $apiUrl = "https://api.jyotishamastroapi.com/api/pdf/generate_matching";
                $params = [
                    'boy_name' => $kundali->boy_name,
                    'boy_dob' => \Carbon\Carbon::parse($kundali->boy_dob)->format('d/m/Y'),
                    'boy_tob' => $kundali->boy_tob,
                    'boy_tz' => $kundali->boy_tz,
                    'boy_lat' => $kundali->boy_lat,
                    'boy_lon' => $kundali->boy_lon,
                    'boy_place' => $kundali->boyPob,
                    'girl_name' => $kundali->girl_name,
                    'girl_dob' => \Carbon\Carbon::parse($kundali->girl_dob)->format('d/m/Y'),
                    'girl_tob' => $kundali->girl_tob,
                    'girl_tz' => $kundali->girl_tz,
                    'girl_lat' => $kundali->girl_lat,
                    'girl_lon' => $kundali->girl_lon,
                    'girl_place' => $kundali->girlPob,
                    'lang' => 'en',
                    'style' => 'south',
                    'company_name' => ($company['value']) ? $company['value'] : '',
                    'company_address' => ($address['value']) ? $address['value'] : '',
                    'company_email' => ($contact_email['value']) ? $contact_email['value'] : '',
                    'company_phone' => ($contact_number['value']) ? $contact_number['value'] : '',
                    'company_website' => ($company['value']) ? 'https://'.$company['value'].'.myshopify.com' : '',
                ];
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl . '?' . http_build_query($params));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'key: ' . (!empty($jyotisham_astro_api['value']) ? $jyotisham_astro_api['value'] : ''),
                'Content-Type: application/json',
            ]);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('Curl error: ' . curl_error($ch));
            }
            curl_close($ch);

            $result = json_decode($response, true);

            if(!empty($result['downloadUrl']))
            {
                KundaliPayment::where('id', $kundali_payment_id)->update(['pdf_link' => $result['downloadUrl']]);

                /* Send Email */

                if (!empty($customer['email']))
                {
                    $data['message'] = '';
                    $data['toName'] = (!empty($customer['firstName']) ? $customer['firstName'] : '') ."". (!empty($customer['lastName']) ? " ".$customer['lastName'] : '');

                    $data['to'] = $customer['email'];
                    $data['name'] = $data['toName'];

                    $data['from_email'] = env('MAIL_FROM_ADDRESS');
                    $data['from_name'] = env('MAIL_FROM_NAME');

                    $data['subject'] = 'Kundali PDF';

                    $data['downloadUrl'] = $result['downloadUrl'];

                    $message = (new SendKundaliPDF_Mail($data))->onQueue('default');
                    
                    Mail::to($data['to'])->queue($message);
    
                    /* \Log::info("Email sent successfully for shop_id: $shop_id and kundali_id: $kundali_id and kundali_payment_id: $kundali_payment_id"); */
                }
                else
                {
                    \Log::info("Email not sent because email is not provided for shop_id: $shop_id and kundali_id: $kundali_id and kundali_payment_id: $kundali_payment_id");
                }
            }
            else
            {
                \Log::info("PDF not generated for shop_id: $shop_id and kundali_id: $kundali_id and kundali_payment_id: $kundali_payment_id (CHECK API KEY)");
            }
        }
        catch (\Exception $e)
        {
            \Log::alert($e->getMessage().$e->getFile().$e->getLine()." in generateKundaliPDF function");
        }
    }
}