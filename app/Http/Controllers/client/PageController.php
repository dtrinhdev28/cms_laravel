<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('client.layouts.master', compact(
            'config',
            'template'
        )
        );
    }
    public function blog()
    {
        $config = ['title' => 'Blogs'];
        $template = 'client.blog';

        return view('client.layouts.master', compact(
            'config',
            'template'
        )
        );
    }
}
