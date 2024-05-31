<?php

namespace App\Http\Controllers;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SendemailController extends Controller
{
    public function index() {

        Mail::to('dtrinhit84@gmail.com')->send();

        return 'Mail sent!';
    }
}
