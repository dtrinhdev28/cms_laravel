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
        'to_ward_code' => 'required',
    ]);

    $data = [
        'from_district_id' => 3695,
        'to_district_id' => (int) $validatedData['to_district_id'],
        'to_ward_code' => $validatedData['to_ward_code'],
        'service_id' => 53321,
        // 'service_type_id' => 2,
        'weight' => $request->input('weight', 500),
    ];

    $response = $this->ghnService->calculateShippingFee($data);

    return response()->json($response);
}

}
