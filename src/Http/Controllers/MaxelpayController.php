<?php

namespace Maxelpay\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;


class MaxelpayController extends Controller
{    
    protected static $apiurl_stag = 'https://dev-api.maxelpay.com/v1/stg/merchant/order/checkout';
    protected static $apiurl_live = 'https://dev-api.maxelpay.com/v1/prod/merchant/order/checkout';
    /**
     * @param array $payload
     * @return array
     */
    static function maxelpayPayload(array $payload){
       
        if(strlen(config('maxelpay.maxelpay_secret_key')) < 16)
            return [
                'status' => 422,
                'message' => 'The secret key must have a minimum length of 16 characters.'
            ];
        
        $apiurl = config('maxelpay.maxelpay_payment_mode') == 'STAGING' ? self::$apiurl_stag : self::$apiurl_live;
        $result = self::encryption($payload);

        $response = Http::withHeaders([
            'api-key' => config('maxelpay.maxelpay_api_key'),
            'Content-Type' => 'application/json'
        ])->post($apiurl, [
            'data' => $result
        ]);
        
        if ($response->successful()) {
            $responseData = $response->json();
            header("Location: ".$responseData['result']); 
            exit();
        } else {
            $errorCode = $response->status(); 
            $errorMessage = $response->body(); 
            return [
                'status' => $errorCode,
                'message' => $errorMessage
            ];
        }
       
    }

    /**
     * @param array $payload
     * @return string
     */
    static private function encryption(array $payload ) {
       
        $encrypted_data = openssl_encrypt(
                json_encode($payload),
                "aes-256-cbc",
                config('maxelpay.maxelpay_secret_key'),
                true,
                substr( config('maxelpay.maxelpay_secret_key'), 0, 16 )
        );
        return base64_encode( $encrypted_data );
      
    }

}
