<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use App\Models\loaitin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function themtin() {

        $config = [
            'title' => "Thêm tin tức",
        ];
        $template = "client.tin.themtin";

        $loaitin = loaitin::all();

        return view('client.layouts.master', compact(
            [
                'config',
                'template',
                'loaitin'
            ]
        ));
    }

    // tạo tin
    public function storeTin(Request $request) {
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('', $filename, 'images');

            $result = BlogModel::create([
                'tieuDe' => $request->input('tieuDe'),
                'tomTat' => $request->input('tomTat'),
                'urlHinh' => $filename,
                'idLT' => $request->input('idLT'),
                'noiDung' => $request->input('noidung'),
            ]);

            if($result) {
            return redirect::route('themtin')->with('alerts', ['success' => 'Tạo tin mới thành công!!']);
        } else {
            return redirect::route('themtin')->with('alerts', ['danger' => 'Tạo tin mới thất bại!!']);
        }
        }
    }

    public function deleteBlog($id) {
        $result = BlogModel::findOrFail($id)->delete();
        if(!$result) {
            return redirect()->route('blogs')->with('alerts', ['danger' => 'Xóa bài viết không thành công']);
        }
        return redirect()->route('blogs')->with('alerts', ['success' => 'Xóa bài viết thành công']);
    }

    // Xóa vĩnh viễn bài viết
    public function deleteforce($id) {
        $result = BlogModel::findOrFail($id)->forceDelete();
        if(!$result) {
            return redirect()->route('blogs')->with('alerts', ['danger' => 'Xóa bài viết không thành công']);
        }
        return redirect()->route('blogs')->with('alerts', ['success' => 'Xóa bài viết thành công']);
    }

    // chỉnh tin
    public function edit($id) {
        
        $config = [
            'title' => 'Chỉnh bài viết'
        ];
        $loaitin = loaitin::all();
        $template = 'client.tin.chinhtin';

        $blog = BlogModel::findOrFail($id);

        return view('client.layouts.master', compact([
            'config',
            'template',
            'loaitin',
            'blog'
        ]));
    }

    public function updateBlog(Request $request) {

        $id = $request->input('id');
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('', $filename, 'images');

        $result = BlogModel::where('id', $id)
        ->update([
            'tieuDe' => $request->input('tieuDe'),
            'tomTat' => $request->input('tomTat'),
            'urlHinh' => $filename,
            'noiDung' => $request->input('noiDung'),
            'idLT' => $request->input('idLT'),
        ]);

        if(!$result) {
            return redirect()->route('blogs')->with('alerts', ['danger' => 'Cập nhật bài viết không thành công']);
        }
        return redirect()->route('blogs')->with('alerts', ['success' => 'Cập nhật bài viết thành công']);

    }

    public function trash() {
        $config = [
            'title' => "Thêm tin tức",
        ];
        $template = "client.tin.trashblog";

        $loaitin = loaitin::all();
        $blogs = BlogModel::onlyTrashed()->paginate(6);

        return view('client.layouts.master', compact(
            [
                'config',
                'template',
                'loaitin',
                'blogs'
            ]
        ));
    }

    public function restoreBlog($id) {
        $results = BlogModel::withTrashed()->where('id', $id)->restore();
        if(!$results) {
            return redirect()->route('blogs')->with('alerts', ['danger' => 'Khôi phục bài viết thất bại']);
        }
        return redirect()->route('blogs')->with('alerts', ['success' => 'Khôi phục bài viết thành công']);
    }
 }
