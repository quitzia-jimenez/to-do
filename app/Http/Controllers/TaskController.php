<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable',
            'deadline' => 'nullable|date',
            'complete' => 'nullable|boolean',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea creada con éxito.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable',
            'deadline' => 'nullable|date',
            'complete' => 'nullable|boolean',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada.');
    }
}
