<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    // Hiển thị danh mục
    public function index() {

        $config = [
            'title' => 'Create Category',
            'subtitle' => 'Category',
            'title_heading' => 'Create Category'
        ];

        $template = 'admin.Category';

        $getAllcategory = CategoryModel::paginate(10);

        return view('admin.layouts.master', compact([
            'config',
            'template',
            'getAllcategory'
        ]));
    }


    // POST create user
    public function store(Request $request) {
        $payload = request()->all();

        $idCategory = CategoryModel::findOrFail($payload['id'])->first();

        if(isset($idCategory) && $idCategory != null) {
            // update
            $results  = CategoryModel::
            where('id', $payload['id'])
            ->update([
                'name_category' => $payload['name_category'],
                'hidden' => $payload['hidden'],
            ]);
            if ($results) {
                return redirect()->route('getAllcategory')->with('alerts', ['success' => 'Cập nhật danh mục thành công']);
            } else {
                return redirect()->route('getAllcategory')->with('alerts', ['error' => 'Cập nhật danh mục thất bại']);
            }
        } else {
            $results  = CategoryModel::create([
                'name_category' => $payload['name_category'],
                'hidden' => $payload['hidden'],
            ]);

            if($results) {
                return Redirect::route('getAllcategory')->with('alerts', ['success' => 'Tạo danh mục thành công']);
            }
        }


    }

    public function deleteAt(Request $requets) {
        $id = $requets->input('idCategory');

        $results = CategoryModel::findOrFail($id)->delete();

        if(!$results) {
            return redirect()->route('getAllcategory')->with('alerts', ['danger' => 'Xóa danh mục thất bại']);
        }
        return redirect()->route('getAllcategory')->with('alerts', ['success' => 'Xóa danh mục thành công']);
    }

    public function trash() {
        $getAllcategory = CategoryModel::onlyTrashed()->paginate(10);

        $template = 'admin.Categorytrash';
        return view('admin.layouts.master', compact([
            'getAllcategory',
            'template'
        ]));
    }

    public function restore(Request $request) {
        $id = $request->input('idCategory');
        $results = CategoryModel::withTrashed()->where('id', $id)->restore();
        if(!$results) {
            return redirect()->route('getAllcategory')->with('alerts', ['danger' => 'Khôi phục danh mục thất bại']);
        }
        return redirect()->route('getAllcategory')->with('alerts', ['success' => 'Khôi phục danh mục thành công']);
    }

    public function forceDelete(Request $request) {
        $id = $request->input('idCategory');
        $results = CategoryModel::withTrashed()->where('id', $id)->forceDelete();

        if(!$results) {
            return redirect()->route('getAllcategory')->with('alerts', ['danger' => 'Xóa danh mục thất bại']);
        }
        return redirect()->route('getAllcategory')->with('alerts', ['success' => 'Xóa danh mục thành công']);
    }

    public function edit($id) {
        $config = [
            'title' => 'Chỉnh danh mục',
            'subtitle' => 'Danh mục',
            'title_heading' => 'Chỉnh danh mục'
        ];

        $template = 'admin.CategoryEdit';
        $categoryById = CategoryModel::where('id', $id)->limit(1)->first();

        return view('admin.layouts.master', compact([
            'config',
            'template',
            'categoryById'
        ]));
    }

}
