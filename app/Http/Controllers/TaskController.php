<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;


class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        // Filter by status if provided
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Filter by category if provided
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // Sort tasks
        $sortBy = $request->sort ?? 'created_at';
        $direction = $request->direction ?? 'desc';
        $query->orderBy($sortBy, $direction);

        $tasks = $query->with('category')->get();
        $categories = Category::all();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
