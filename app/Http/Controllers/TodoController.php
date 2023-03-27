<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    // return view todo.index
    public function index(){
        return view('todo.index');
    }

    // return view todo.create
    public function create(){
        return view('todo.create');
    }

    // return view todo.edit
    public function edit(){
        return view('todo.edit');
    }
}
