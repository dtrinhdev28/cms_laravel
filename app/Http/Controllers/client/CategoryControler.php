<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\ProductsModel;
use Illuminate\Http\Request;

class CategoryControler extends Controller
{
    public function index($id) {

        $config = [
            'title' => 'Danh mục sản phẩm'
        ];

        $template = 'client.danhmuc';

        $allProductByCategory = ProductsModel::where('category_id', '=', $id)->paginate(6);

        if(count($allProductByCategory) < 1 ) {
        }

        return view('client.layouts.master', compact(
            'config',
            'allProductByCategory',
            'template'
        ));
    }
}

