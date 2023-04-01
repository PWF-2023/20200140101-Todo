<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // return view todo.index
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();
        // collection of todos
        dd($todos);
        return view('todo.index');
    }

    // return view todo.create
    public function create()
    {
        return view('todo.create');
    }

    // return view todo.edit
    public function edit()
    {
        return view('todo.edit');
    }
}