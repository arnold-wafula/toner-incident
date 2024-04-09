<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Department;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        $roles = UserRole::all();
        $departments = Department::all();

        return view('admin/admin', compact('roles', 'departments'));
    }

    public function store() {
        $user = new User();

        $user->fname = request('fname');
        $user->lname = request('lname');
        $user->email = request('email');
        $user->role_id = request('role_id');
        $user->department_id = request('department_id');
        $user->password = request('password');

        $user->save();

        return redirect('/');
    }
}