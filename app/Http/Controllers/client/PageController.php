<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CommentsModel;
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

        return view('client.layouts.master', compact(
            'config',
            'template'
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
        $config = ['title' => 'Shop'];
        $template = 'client.shop';

        $getAllProduct = ProductsModel::paginate(16);

        return view('client.layouts.master', compact(
            'config',
            'template',
            'getAllProduct'
        )
        );
    }
    
    public function blogs()
    {
        $config = ['title' => 'Blogs'];
        $template = 'client.blog';

        $blogs = BlogModel::orderBy('xem','desc')->paginate(9);
        $blogxem = BlogModel::orderBy('ngayDang','desc')->paginate(9);
        
        return view('client.layouts.master', compact(
            'config',
            'template',
            'blogs',
            'blogxem'
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
