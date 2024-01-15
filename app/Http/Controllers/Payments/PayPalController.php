<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PayPalController extends Controller
{

    private $clientId;
    private $appSecret;
    private $baseURL;

    public function __construct()
    {
        $this->clientId = config('paypal.client_id');
        $this->appSecret = config('paypal.secret');
        $this->baseURL = config('paypal.url');
    }

    public function ShowPaypalForm()
    {

        return response()->json('nani');
    }

    public function createOrder(Request $request)
    {
        $accessToken = $this->generateAccessToken();
        $url = "{$this->baseURL}/v2/checkout/orders";  // Endpoint URL for creating an order
        \Log::error($request->all());
        
        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(
            $array = [
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "reference_id" => "d9f80740-38f0-11e8-b467-0ed5f89f718b",
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => "100.00"
                        ]
                    ]
                ],
                "payment_source" => [
                    "paypal" => [
                        "experience_context" => [
                            "payment_method_preference" => "IMMEDIATE_PAYMENT_REQUIRED",
                            "brand_name" => "EXAMPLE INC",
                            "locale" => "en-US",
                            "landing_page" => "GUEST_CHECKOUT",
                            "shipping_preference" => "NO_SHIPPING",
                            "user_action" => "PAY_NOW",
                            "return_url" => "https://730f-2803-9800-9442-4222-5452-30e4-7a6-269f.ngrok-free.app/paypalStatus",
                            "cancel_url" => "https://example.com/cancelUrl"
                        ]
                    ]
                ]
            ]
        ));

        // Execute cURL session and close it
        $response = curl_exec($ch);
        curl_close($ch);

        // Decode the JSON response
        $order = json_decode($response, true);
        \Log::error(print_r($order, true));
        // Loop through the order links to find the "approve" link
        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                // Return the approve link
                return response()->json(['url' => $link['href']]);
            }
        }

        // If "approve" link is not found, return an error
        return response()->json(['error' => 'Approve link not found'], 500);
    }

    private function generateAccessToken()
    {
        // Encode client ID and app secret for basic authentication
        $auth = base64_encode($this->clientId . ':' . $this->appSecret);


        // Endpoint URL for getting the access token
        $url = "{$this->baseURL}/v1/oauth2/token";

        // Initialize cURL session
        $ch = curl_init($url);
        // \Log::error('$ch', $ch);


        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . $auth
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');

        // Execute cURL session and close it
        $response = curl_exec($ch);

        if (!$response) {

            if (curl_errno($ch)) {
                \Log::error(print_r(curl_error($ch), true));
            }
        }
        curl_close($ch);

        // Decode the JSON response
        $data = json_decode($response, true);

        return $data['access_token'];
    }

    public function paypalStatus(Request $request)
    {
        \Log::info(print_r($request->all(), 'true'));
    }
}
