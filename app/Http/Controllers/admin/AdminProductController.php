<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ArrayImageModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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
            ->orderBy('id_product', 'desc')
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
                // $value->move(public_path('image'), $filenameAray);
            }

            // var_dump($filenameAray);

            // $fileArray->storeAs('', $filenameAray, 'images');
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
        }
        return redirect()->route('getAllProduct')->with('alerts', ['error' => 'Cập nhật sản phẩm thất bại']);
    }

    public function createProduct(Request $request)
    {
        // Tạo sản phẩm
        $request->validate([
            'name' => 'required',
            'views' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'price_promotion' => 'required',
            'special' => 'required',
            'hidden' => 'required',
            'description' => 'required',
        ]);
        $payload = request()->all();
        // $createProduct = $request->except(['_token']);
        $request['slug'] = Str::slug($payload['name']);
        $createProduct = [
            'name' => $payload['name'],
            'slug' => $request['slug'],
            'views' => $payload['views'],
            'category_id' => $payload['category_id'],
            'stock' => $payload['stock'],
            'price' => $payload['price'],
            'price_promotion' => $payload['price_promotion'],
            'special' => $payload['special'],
            'hidden' => $payload['hidden'],
            'description' => $payload['description'],
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();

            $createProduct['image'] = $filename;
            $file->storeAs('', $filename, 'images');
        }

        $id_product = ProductsModel::create($createProduct)->id_product;

        // upload nhiều hình ảnh
        if ($request->hasFile('image_products')) {
            $fileArray = $request->file('image_products');
            $filenameArray = [];

            foreach ($fileArray as $file) {
                $filename = $file->getClientOriginalName();
                $filenameArray[] = $filename;
                $file->storeAs('', $filename, 'images');
            }
            // Chuyển đổi mảng thành một chuỗi JSON
            $imageJSON = json_encode($filenameArray);
            $createThumbnailProduct = [
                'id_product' => (int)$id_product,
                'image' => $imageJSON,
            ];
            $results = ArrayImageModel::create($createThumbnailProduct);
        }

        if ($id_product) {
            return Redirect::route('getAllProduct')->with('alerts', ['success' => 'Tạo sản phẩm thành công']);
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
            'config',
        ]));
    }

    // khôi phục sản phẩm
    public function restore(Request $request)
    {
        $id = $request->input('idProduct');
        $results = ProductsModel::withTrashed()->where('id_product', $id)->restore();
        if (!$results) {
            return redirect()->route('getAllProduct')->with('alerts', ['danger' => 'Khôi phục sản phẩm thất bại']);
        }
        return redirect()->route('getAllProduct')->with('alerts', ['success' => 'Khôi phục sản phẩm thành công']);
    }

    // xóa luôn
    public function forceDelete(Request $request)
    {
        $id = $request->input('idProduct');
        try {
            ProductsModel::withTrashed()->where('id_product', $id)->forceDelete();
            return redirect()->route('getAllProduct')->with('alerts', ['success' => 'Xóa sản phẩm thành công']);
        } catch (\Exception $e) {
            return redirect()->route('getAllProduct')->with('alerts', ['danger' => 'Sản phẩm không được xóa']);
        }
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

    public function create()
    {
        $config = [
            'title' => 'Tạo sản phẩm',
            'subtitle' => 'Sản phẩm',
            'title_heading' => 'Tạo sản phẩm',
        ];

        $template = 'admin.product.create';
        $categorys = CategoryModel::where('hidden', 1)->get();

        return view('admin.layouts.master', compact([
            'config',
            'template',
            'categorys',
        ]));
    }
}
