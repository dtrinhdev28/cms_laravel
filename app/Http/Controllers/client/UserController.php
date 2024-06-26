<?php

namespace App\Http\Controllers\client;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    //POST login
    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/profile');
        }

        return back()->withErrors([
            'errorLogin' => 'Email or password do not match',
        ])->onlyInput('errorLogin');
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

    public function signup(AuthRequest $request) {
        // Create user with hashed password
        $results = UsersModel::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'nghenghiep' => $request->nghenghiep ?? '',
            'address' => $request->diachi ?? ''
        ]);

        if ($results) {
            $email = $request->input('email');
            // Send email
            Mail::raw('Chúc mừng bạn đăng ký thành công tài khoản', function ($message) use ($email) {
                $message->to($email)->subject('Đăng ký tài khoản thành công');
            });
            return redirect::route('login')->with('alerts', ['success' => 'Đăng ký tài khoản thành công!!']);

        } else {
            return response()->json(['message' => 'User creation failed!'], 500);
        }
    }

    // GET profile
    public function profile() {
        $config = [
            'title' => 'Profile'
        ];

        $template = 'client.profile';

        return view('client.layouts.master', compact(
            'config','template'
        ));
    }

    // GET forgot-password
    public function forgotpassword() {
        $config = [
            'title' => 'Profile'
        ];

        $template = 'client.forgot-password';

        return view('client.layouts.master', compact(
            'config','template'
        ));
    }

    // POST update password
    public function updatePassword(Request $requets) {
        $payload = $requets->all();

        $requets->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required'
        ]);

        // check password
        if(!Hash::check($requets->currentpassword, Auth::user()->password )) {
            dd("Password not matching");
        };

        UsersModel::whereId(Auth::user()->id)->update([
            'password' => Hash::make($requets->newpassword)
        ]);
    }
}
