<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GHNService
{
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->baseUrl = 'https://online-gateway.ghn.vn/shiip/public-api';
        $this->token = 'ed187595-1fec-11ef-a9c4-9e9a72686e07';
    }

    private function getHeaders()
    {
        return [
            'Content-Type' => 'application/json',
            'Token' => 'ed187595-1fec-11ef-a9c4-9e9a72686e07',
        ];
    }

    public function calculateShippingFee($data)
    {
        $url = $this->baseUrl . '/v2/shipping-order/fee';

        $response = Http::withHeaders($this->getHeaders())->post($url, $data);

        return $response->json();
    }
}
