<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login() {
        $config = [
            'title' => 'Sign In'
        ];

        $template = 'client.login';
      
        return view('client.layouts.master', compact(
            'config','template'
        ));
    }

    public function store(AuthRequest $request) {

    }

    public function register() {
        
        $config = [
            'title' => 'Sign Up'
        ];

        $template = 'client.register';
      
        return view('client.layouts.master', compact(
            'config','template'
        ));
    }
}
