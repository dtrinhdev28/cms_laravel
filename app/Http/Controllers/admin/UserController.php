<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersModel;


class UserController extends Controller
{
    public function index() {
        $config = [
            'title' => 'Manager user',
            'subtitle' => 'User',
            'title_heading' => 'Manager user'
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
    public function create() {
        $config = [
            'title' => 'Create user',
            'subtitle' => 'User',
            'title_heading' => 'Create user'
        ];

        $template = 'admin.createUser';

        return view('admin.layouts.master', compact(
            'config',
            'template',
        )
        );
    }

    // POST create user
    public function store(UserRequest $request) {
        $payload = request()->all();

        $results  = UsersModel::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'numberphone' => $payload['numberphone'],
            'address' => $payload['address'],
            'role' => $payload['role'],
            'avatar' => $payload['avatar'],
            'password' => bcrypt($payload['password']),
        ]);

        if($results) {
            return Redirect::route('createUser')->with('alerts', ['success' => 'Create A User Successfully']);
        }
    }

    public function deleteAt(Request $requets) {
        $id = $requets->input('idUser');

        $results = UsersModel::findOrFail($id)->delete();

        if(!$results) {
            return redirect()->route('getAllUsers')->with('alerts', ['danger' => 'Deleted user failed']);
        }
        return redirect()->route('getAllUsers')->with('alerts', ['success' => 'Xóa user thành công']);
    }

    public function trash() {
        $getUserTrash = UsersModel::onlyTrashed()->get();

        $template = 'admin.usertrash';
        return view('admin.layouts.master', compact([
            'getUserTrash',
            'template'
        ]));
    }

    public function restoreUser(Request $request) {
        $idUser = $request->input('idUser');
        $results = UsersModel::withTrashed()->where('id', $idUser)->restore();
        if(!$results) {
            return redirect()->route('getAllUsers')->with('alerts', ['danger' => 'Khôi phục user thất bại']);
        }
        return redirect()->route('getAllUsers')->with('alerts', ['success' => 'Khôi phục user thành công']);
    }

    public function forceDeleteUser(Request $request) {
        $idUser = $request->input('idUser');
        $results = UsersModel::withTrashed()->where('id', $idUser)->forceDelete();

        if(!$results) {
            return redirect()->route('getAllUsers')->with('alerts', ['danger' => 'XÓa user thất bại']);
        }
        return redirect()->route('getAllUsers')->with('alerts', ['success' => 'Xóa user thành công']);
    }
}
