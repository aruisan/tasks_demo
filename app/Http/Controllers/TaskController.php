<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index(){
        $tasks = auth()->user()->tasks()->latest()->get();
        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'nullable|string'
        ]);

        auth()->user()->tasks()->create($data);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task){
        $this->authorize('update', $task);

        $task->update($request->only('title, description', 'completed'));

        return redirect()->back();

    }

    public function destroy(Task $task){
        $this->authorize('delete', $task);

        $task->delete();
        return redirect()->back();
    }
}
