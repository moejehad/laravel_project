<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('admin.profile', ['user' => $user]);
    }
}
