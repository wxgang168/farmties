<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUserController extends Controller
{
    public function index()
    {
    	$users = User::latest()->get();
    	return view('admin.users', compact('users'));
    }
}
