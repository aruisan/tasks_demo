<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class TaskController extends Controller
{



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
}
