<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GHNService;

class ShippingController extends Controller
{
    protected $ghnService;

    public function __construct(GHNService $ghnService)
    {
        $this->ghnService = $ghnService;
    }

    public function calculateShippingFee(Request $request)
{
    $validatedData = $request->validate([
        'to_district_id' => 'required|integer',
    ]);

    $data = [
        'from_district_id' => 3695,
        'to_district_id' => (int) $validatedData['to_district_id'],
        // 'service_id' => 53320,
        'service_type_id' => 2,
        'weight' => $request->input('weight', 500),
    ];

    $response = $this->ghnService->calculateShippingFee($data);

    return response()->json($response);
}

}
