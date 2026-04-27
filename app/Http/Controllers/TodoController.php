<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $title = 'Todo一覧';
        return view(
            'todos.index',
            ['title' => $title],
            compact('todos')
        );
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        Todo::create([
            'title' => request('title'),
            'body' => request('body'),
            'is_done' => request('is_done')
        ]);
        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'nullable',
            'is_done' => 'nullable|boolean',
        ]);

        $todo->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'is_done' => $request->boolean('is_done'),
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
