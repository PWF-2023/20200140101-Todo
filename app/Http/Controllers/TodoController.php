<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // return view todo.index
    public function index()
    {
        $todos = Todo::where('user_id', auth()->user()->id)->
            orderBy('is_completed', 'asc')->
            orderBy('created_at', 'desc')->
            get();
        // $todos = Todo::where('user_id', auth()->id())->get();
        // collection of todos
        return view('todo.index', compact('todos'));
    }

    public function store(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);
        $todo = Todo::create([
            'title'   => ucfirst($request->title),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('todo.index')->with('success', 'Todo created successfully!');
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