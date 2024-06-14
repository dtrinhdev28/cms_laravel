<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $config = [
            'title' => 'Manager user',
            'subtitle' => 'User',
            'title_heading' => 'Manager user',
        ];
        $template = 'admin.users';

        $getAllUser = UsersModel::paginate(10);

        return view('admin.layouts.master', compact(
            'config',
            'template',
            'getAllUser'
        )
        );
    }

    // GET Create
    public function create()
    {
        $config = [
            'title' => 'Tạo người dùng',
            'subtitle' => 'Người dùng',
            'title_heading' => 'Tạo người dùng',
        ];

        $template = 'admin.createUser';

        return view('admin.layouts.master', compact(
            'config',
            'template',
        )
        );
    }
    public function edit($id)
    {
        $config = [
            'title' => 'Cập nhật người dùng',
            'subtitle' => 'Người dùng',
            'title_heading' => 'Cập nhật người dùng',
        ];

        $getUserById = UsersModel::findOrFail($id);
        $template = 'admin.editUser';

        return view('admin.layouts.master', compact(
            'config',
            'template',
            'getUserById'
        )
        );
    }

    public function UpdateUser(Request $request)
    {
        $payload = $request->except(['_token']);

        $result = UsersModel::where('id', $request->input('id'))->update($payload);

        if (!$result) {
            return Redirect::route('getAllUsers')->with('alerts', ['success' => 'Cập nhật người dùng thành công']);
        }
        return Redirect::route('getAllUsers')->with('alerts', ['success' => 'Cập nhật người dùng thành công']);

    }

    // POST create user
    public function store(UserRequest $request)
    {
        $payload = request()->all();
        $results = UsersModel::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'numberphone' => $payload['numberphone'],
            'address' => $payload['address'],
            'role' => $payload['role'],
            'avatar' => $payload['avatar'],
            'password' => Hash::make($payload['password']),
        ]);

        if ($results) {
            return Redirect::route('createUser')->with('alerts', ['success' => 'Tạo người dùng thành công']);
        }
    }

    public function deleteAt(Request $requets)
    {
        $id = $requets->input('idUser');

        $results = UsersModel::findOrFail($id)->delete();

        if (!$results) {
            return redirect()->route('getAllUsers')->with('alerts', ['danger' => 'Xóa user thất bại']);
        }
        return redirect()->route('getAllUsers')->with('alerts', ['success' => 'Xóa user thành công']);
    }

    public function trash()
    {
        $getUserTrash = UsersModel::onlyTrashed()->get();

        $template = 'admin.usertrash';
        return view('admin.layouts.master', compact([
            'getUserTrash',
            'template',
        ]));
    }

    public function restoreUser(Request $request)
    {
        $idUser = $request->input('idUser');
        $results = UsersModel::withTrashed()->where('id', $idUser)->restore();
        if (!$results) {
            return redirect()->route('getAllUsers')->with('alerts', ['danger' => 'Khôi phục user thất bại']);
        }
        return redirect()->route('getAllUsers')->with('alerts', ['success' => 'Khôi phục user thành công']);
    }

    public function forceDeleteUser(Request $request)
    {
        $idUser = $request->input('idUser');
        $results = UsersModel::withTrashed()->where('id', $idUser)->forceDelete();

        if (!$results) {
            return redirect()->route('getAllUsers')->with('alerts', ['danger' => 'Xóa user thất bại']);
        }
        return redirect()->route('getAllUsers')->with('alerts', ['success' => 'Xóa user thành công']);
    }
}
