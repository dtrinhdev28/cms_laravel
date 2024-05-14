<?php

namespace App\Http\Controllers\client;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\DB;
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

    public function detail(Request $request, $slug = 0)
    {
        $config = [
            'title' => 'Detail'
        ];

        $productBySlug = ProductsModel::select('products.*', 'categorys.*', 'images.*')
        ->leftJoin('categorys', 'products.category_id', '=', 'categorys.category_id')
        ->leftJoin('images', 'products.image_id', '=', 'images.id')
        ->where('slug', $slug)
        ->limit(1)
        ->first();

        $template = 'client.productDetail';

        return view('client.layouts.master', compact(
            'config',
            'template',
            'productBySlug'
        )
        );
    }
}
