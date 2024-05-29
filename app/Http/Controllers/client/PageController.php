<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\CommentsModel;
use App\Models\ImageProductModel;
use App\Models\ViewersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BlogModel;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function index()
    {
        $config = ['title' => 'Trang chủ'];
        $template = 'client.index';

        $products = ProductsModel::take('3')->get();

        $blogs = BlogModel::take('3')->orderBy('ngayDang', 'DESC')->get();

        return view('client.layouts.master', compact(
            'config',
            'template',
            'blogs',
            'products'
        )
        );
    }
    public function about()
    {
        $config = ['title' => 'Giới thiệu'];
        $template = 'client.about';

        return view('client.layouts.master', compact(
            'config',
            'template'
        )
        );
    }
    public function contact()
    {
        $config = ['title' => 'Liên hệ'];
        $template = 'client.contact';

        return view('client.layouts.master', compact(
            'config',
            'template'
        )
        );
    }
    public function services()
    {
        $config = ['title' => 'Services'];
        $template = 'client.services';

        return view('client.layouts.master', compact(
            'config',
            'template'
        )
        );
    }
    public function shop()
    {


        $keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : '';

        $getAllProduct = ProductsModel::where('name', 'like', '%'.$keyword.'%')->inRandomOrder()->paginate(12);
        $getAllCategory = CategoryModel::get();

        $viewers = [''];
        if(\Auth::check()) {
            $viewers =  ViewersModel::
            select('products.*')
            ->leftJoin('products','products.id_product', '=', 'viewer.id_product')
            ->leftJoin('users','users.id', '=', 'viewer.id_user')
            ->where('users.id', '=', \Auth::user()->id)
            ->where('products.hidden', '=', 1)
            ->get();
        }
        $config = ['title' => (isset($_GET['keyword']) && $_GET['keyword'] !== '' ) ? 'Tìm kiếm sản phẩm ' . $_GET['keyword'] : 'Shop'];
        $template = 'client.shop';

        return view('client.layouts.master', compact(
            'config',
            'template',
            'getAllProduct',
            'getAllCategory',
            'viewers'
        )
        );
    }

    public function blogs()
    {
        $config = ['title' => 'Blogs'];
        $template = 'client.blog';

        $blogs = BlogModel::orderBy('id','desc')->paginate(9);

        return view('client.layouts.master', compact(
            'config',
            'template',
            'blogs',
        )
        );
    }
    public function blogDetail($id = 0)
    {

        $blog = BlogModel::findOrFail($id);
        $config = ['title' => $blog->tieuDe];

        $template = 'client.blogDetail';

        // view posr new
        $latest_post = BlogModel::orderBy('id', 'desc')->take(4)->get();

        $commment = DB::table('binhluan')
            ->join('tin', 'tin.id', '=', 'binhluan.idTin' )
            ->select('*')
            ->get();

        return view('client.layouts.master', compact(
            'config',
            'template',
            'blog',
            'commment',
            'latest_post'
        )
        );
    }

}
