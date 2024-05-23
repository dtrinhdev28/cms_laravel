<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;

abstract class Controller
{

    public function menu(){
        $category = CategoryModel::get();
        \View::share('View', $category);
    }
}
