<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id',Auth::id())->get();
        return Inertia::render('Task',[
            'tasks'=>$tasks
        ]);
    }
    public function create(Request $request)
    {
        return Inertia::render('TaskForm');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'duration' => 'required|numeric',
            'description' => 'required',
        ]);
        $task = new Task();
        $task->user_id = Auth::id();
        $task->title = $request->title;
        $task->date = $request->date;
        $task->duration = $request->duration;
        $task->description = $request->description;
        $task->save();
        
        return Redirect::route('task');
    }
    
    public function edit($id)
    {
        $task = Task::find($id);
        return Inertia::render('TaskEdit',[
            'task'=>$task
        ]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'duration' => 'required|numeric',
            'description' => 'required',
        ]);
        $task = Task::find($id);
        $task->title = $request->title;
        $task->date = $request->date;
        $task->duration = $request->duration;
        $task->description = $request->description;
        $task->save();
        return Redirect::route('task');
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return Redirect::route('task');
    }
}
