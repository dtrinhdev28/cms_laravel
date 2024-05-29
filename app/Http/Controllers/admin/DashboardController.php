<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $config = [
            'title' => 'Dasboard',
            'subtitle' => 'Dashboard',
            'title_heading' => 'Dashboard'
        ];
        $template = 'admin.dashboard';

        return view('admin.layouts.master', compact([
            'template',
            'config'
        ]));
    }
}
