<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $todos = Todo::where('user_id', $user->id)->get();

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'public' => ['boolean'],
        ]);

        $todo = new Todo($request->all());
        $todo->user_id = $user->id;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);

        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);

        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'public' => ['boolean'],
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully');
    }
}
