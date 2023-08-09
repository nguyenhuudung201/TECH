<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::where('role', '!=', 1)->get();
        return view('admin.users', compact('users'));
    }

    public function createUser()
    {
        return view('admin.create_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:6'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('superAdminUsers'));
    }
    public function editUser(User $user)
    {
        return view('admin.update_user', ['user' => $user]);
    }

    public function updateUser(User $user, Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|max:100',
            'password' => 'string|required|confirmed|min:6'
        ]);
        $user = new User;
        $user->name = $request->name;

        $user->password = Hash::make($request->password);
        $user->update();
        $user->save();
        return redirect(route('superAdminUsers'));
    }

    public function manageRole()
    {
        $users = User::where('role', '!=', 1)->get();
        $roles = Role::all();
        return view('admin.manage-role', compact(['users', 'roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }
}
