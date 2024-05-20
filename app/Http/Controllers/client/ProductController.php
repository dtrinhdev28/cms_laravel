<?php

namespace App\Http\Controllers\client;

use App\Models\CartModel;
use App\Models\ImageProductModel;
use App\Models\ProductsModel;
use App\Models\ViewersModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    // protected $productRepo;

    public function detail(Request $request, $slug = 0)
    {
        $config = [
            'title' => 'Detail'
        ];

        $productBySlug = ProductsModel::select('products.*', 'category.*')
        ->leftJoin('category', 'products.category_id', '=', 'category.id')
        ->where('slug', $slug)
        ->first();

        $id_product = $productBySlug->id_product;
        
        $productByimage = ImageProductModel::select('image_products.image')
        ->where('id_product', $id_product )
        ->first();
        
        $imageAray = [''];
        if($productByimage !== null) {
            $imageAray = json_decode($productByimage->image, true);
        }
        
        // update views
        ProductsModel::
        where('id_product', $id_product)
        ->update(['views' => $productBySlug->views + 1]);

        // similar products
        $productsType = ProductsModel::
        where('category_id', '=', $productBySlug->category_id)
        ->get();
        $template = 'client.productDetail';

        // update viewer
        if(\Auth::check()) {
            $existsViewer = ViewersModel::where('id_user', '=', \Auth::user()->id)
            ->where('id_product', '=', $id_product)->first();

            if(!$existsViewer) {
                ViewersModel::create([
                    "id_user" => \Auth::user()->id,
                    "id_product" => $id_product,
                ]);
            }
        }

        return view(
            'client.layouts.master',
            compact(
                'config',
                'template',
                'productBySlug',
                'imageAray',
                'productsType'
            )
        );
    }

    public function addToCart(Request $request)
    {
        $payload = $request->all();
        $id_user = \Auth::user()->id;

        $existsProduct =
            CartModel::
                where('id_product', $payload['id_product'])
                ->where('id_user', $id_user)
                ->get();

        if (count($existsProduct) > 0) {

            $results = CartModel::
            where('id_product', $payload['id_product'])
            ->where('id_user', $id_user)
            ->update(['quantity' => $existsProduct['0']->quantity + $payload['quantitybuy']]);
            if ($results) {
                return redirect()->route('cart')->with('alerts', ['success' => 'Update product to cart successfully']);
            } else {
                return redirect()->route('')->with('alerts', ['error' => 'Update product to cart fail']);
            }
        } else {
            $results = CartModel::create([
                "id_user" => $id_user,
                "id_product" => $payload['id_product'],
                "price" => $payload['price'],
                "quantity" => $payload['quantitybuy'],
            ]);
            if ($results) {
                return redirect()->route('cart')->with('alerts', ['success' => 'Added to cart successfully']);
            } else {
                return redirect()->route('')->with('alerts', ['error' => 'Added to cart fail']);
            }
        }

    }

}
