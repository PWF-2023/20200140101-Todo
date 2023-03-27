<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // return view users.index
    public function index(){
        return view('user.index');
    }
}
