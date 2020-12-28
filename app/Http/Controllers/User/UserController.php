<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
