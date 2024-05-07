<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interface\ProductRepositoryInterface;

class ProductController extends Controller
{
    // protected $productRepo;

    // public function __construct(ProductRepositoryInterface $productRepo)
    // {
    //     $this->productRepo = $productRepo;
    // }

    public function detail(Request $request, $id = 0)
    {
        $config = [
            'title' => 'Detail'
        ];

        $template = 'client.productDetail';

        return view('client.layouts.master', compact(
            'config',
            'template'
        )
        );
    }
}
