<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $id_user = \Auth::user()->id;
        $config = [
            'title' => 'Cart',
            'jquery' => '/client/lib/jquery.min.js'
        ];

        $getcartbyuser = CartModel::
            select('products.name', 'products.slug','products.image', 'cart.*')
            ->join('products', 'cart.id_product', '=', 'products.id_product')
            ->where('id_user', '=', $id_user)
            ->get();

        if ($getcartbyuser && count($getcartbyuser) > 0) {
            $template = 'client.cart';
        } else {
            $template = 'client.errors.cartnotefound';
        }

        return view(
            'client.layouts.master',
            compact(
                'template',
                'config',
                'getcartbyuser',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id_cart = $request->input('cart_id');

        $results = CartModel::where('cart', '=', $id_cart)->delete();

        if ($results) {
            return redirect()->route('cart')->with('alerts', ['success' => 'Deleted product successfully']);
        } else {
            return redirect()->route('cart')->with('alerts', ['danger' => 'Deleted product fail']);
        }

    }
}
