<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ArrayImageModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminProductController extends Controller
{
    // Hiển thị sản phẩm
    public function index()
    {

        $config = [
            'title' => 'Tạo Sản phẩm',
            'subtitle' => 'Sản phẩm',
            'title_heading' => 'Tạo Sản phẩm',
        ];

        $template = 'admin.product.index';

        $allProducts = ProductsModel::
            leftJoin('category', 'category.id', '=', 'products.category_id')
            ->paginate(10);

        return view('admin.layouts.master', compact([
            'config',
            'template',
            'allProducts',
        ]));
    }

    // POST create user
    public function store(Request $request)
    {
        $payload = request()->all();

        $idProduct = ProductsModel::findOrFail($payload['id'])->first();

        if ($request->file('image_products')) {
            $fileArray = $request->file('image_products');
            $filenameAray = [];
            foreach ($fileArray as $key => $value) {
                $filenameAray[] = $value->getClientOriginalName();
            }
            $fileArray->storeAs('', $filenameAray, 'images');
        }

        if (isset($idProduct) && $idProduct != null) {
            $updateProduct = [
                'name' => $payload['name'],
                'views' => $payload['views'],
                'category_id' => $payload['category_id'],
                'stock' => $payload['stock'],
                'price' => $payload['price'],
                'price_promotion' => $payload['price_promotion'],
                'special' => $payload['special'],
                'hidden' => $payload['hidden'],
                'description' => $payload['description'],
            ];

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();

                $updateProduct['image'] = $filename;
                $file->storeAs('', $filename, 'images');
            }

            if (isset($filenameAray)) {
                $updateImageProduct = [
                    'image' => $filenameAray,
                ];
                $results = ArrayImageModel::where('id_product', $payload['id'])->update($updateImageProduct);
            }

            $results = ProductsModel::where('id_product', $payload['id'])->update($updateProduct);

            if ($results) {
                return redirect()->route('getAllProduct')->with('alerts', ['success' => 'Cập nhật sản phẩm thành công']);
            } else {
                return redirect()->route('getAllProduct')->with('alerts', ['error' => 'Cập nhật sản phẩm thất bại']);
            }
        } else {
            $results = ProductsModel::create([
                'name_category' => $payload['name_category'],
                'hidden' => $payload['hidden'],
            ]);

            if ($results) {
                return Redirect::route('getAllProduct')->with('alerts', ['success' => 'Tạo sản phẩm thành công']);
            }
        }

    }

    public function deleteAt(Request $requets)
    {
        $id = $requets->input('idProduct');

        $results = ProductsModel::findOrFail($id)->delete();

        if (!$results) {
            return redirect()->route('getAllProduct')->with('alerts', ['danger' => 'Xóa sản phẩm thất bại']);
        }
        return redirect()->route('getAllProduct')->with('alerts', ['success' => 'Xóa sản phẩm thành công']);
    }

    public function trash()
    {
        $ProductTrashed = ProductsModel::onlyTrashed()->paginate(10);
        $config = [
            'title' => 'Thùng rác Sản phẩm',
            'subtitle' => 'Sản phẩm',
            'title_heading' => 'Thùng rác Sản phẩm',
        ];
        $template = 'admin.product.trash';
        return view('admin.layouts.master', compact([
            'ProductTrashed',
            'template',
            'config'
        ]));
    }

    public function restore(Request $request)
    {
        $id = $request->input('idProduct');
        $results = ProductsModel::withTrashed()->where('id_product', $id)->restore();
        if (!$results) {
            return redirect()->route('getAllProduct')->with('alerts', ['danger' => 'Khôi phục sản phẩm thất bại']);
        }
        return redirect()->route('getAllProduct')->with('alerts', ['success' => 'Khôi phục sản phẩm thành công']);
    }

    public function forceDelete(Request $request)
    {
        $id = $request->input('idProduct');
        $results = ProductsModel::withTrashed()->where('id_product', $id)->forceDelete();

        if (!$results) {
            return redirect()->route('getAllProduct')->with('alerts', ['danger' => 'Xóa sản phẩm thất bại']);
        }
        return redirect()->route('getAllProduct')->with('alerts', ['success' => 'Xóa sản phẩm thành công']);
    }

    public function edit($id)
    {
        $config = [
            'title' => 'Cập nhật sản phẩm',
            'subtitle' => 'Sản phẩm',
            'title_heading' => 'Cập nhật sản phẩm',
        ];

        $template = 'admin.product.edit';
        $ProductID = ProductsModel::where('id_product', $id)->first();
        $categorys = CategoryModel::where('hidden', 1)->get();

        return view('admin.layouts.master', compact([
            'config',
            'template',
            'ProductID',
            'categorys',
        ]));
    }

}
