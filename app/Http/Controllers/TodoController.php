<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use App\Models\Post;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('category')
            ->latest()
            ->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('todos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string']
        ]);

        Todo::create($validated);

        return redirect()
            ->route('todos.index')
            ->with('success', '投稿を作成しました。');
    }

    public function edit(Todo $todo)
    {
        $categories = Category::orderBy('name')->get();
        return view('todos.edit', compact('todo', 'categories'));
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
