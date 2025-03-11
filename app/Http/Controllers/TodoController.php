<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('status', 'pending')->get(); // Show only pending tasks
        return view('todolist', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['task' => 'required|string|max:255']);

        Todo::create([
            'task' => $request->task,
            'status' => 'pending' // Default status
        ]);

        return redirect()->route('todolist')->with('success', 'Task added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['task' => 'required|string|max:255']);
        $todo = Todo::findOrFail($id);
        $todo->update(['task' => $request->task]);

        return redirect()->route('todolist')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return redirect()->route('todolist')->with('success', 'Task deleted successfully!');
    }

    public function markAsCompleted($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['status' => 'completed']);

        return redirect()->route('todolist')->with('success', 'Task marked as completed!');
    }

    public function undoTask($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['status' => 'pending']);

        return redirect()->route('todolist.completed')->with('success', 'Task moved back to To-Do List!');
    }

    public function completedTasks()
    {
        $completedTasks = Todo::where('status', 'completed')->get();
        return view('completed', compact('completedTasks'));
    }
}
