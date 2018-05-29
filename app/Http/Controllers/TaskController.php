<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use Session;

class TaskController extends Controller
{
    public function index()
    {
    	$tasks = Task::orderBy('id', 'desc')->paginate(5);
    	return view('tasks.index')->with('storedTasks', $tasks);
    }

    public function store(Request $request)
    {

    	$this->validate($request, [
    		'newTaskName' => 'required|min:5|max:255',
    	]);

    	$task = new Task;

    	$task->name = $request->newTaskName;

    	$task->save();

    	Session::flash('success', 'New Task Has Been Succesfully Added');

    	return redirect()->route('task.index');
    }

    public function destroy($id)
    {
    	$task = Task::find($id);
    	$task->delete();

    	Session::flash('success', 'Task ' .$id. ' Has Been Succesfully Deleted');

    	return redirect()->route('task.index');
    }

    public function edit($id)
    {
    	$task = Task::find($id);

    	return view('tasks.edit')->with('taskUnderEdit', $task);
    }
    public function update(Request $request, $id)
    {

    	$this->validate($request, [
    		'updatedTask' => 'required|min:5|max:255',
    	]);

    	$task = Task::find($id);

    	$task->name = $request->updatedTask;

    	$task->save();

    	Session::flash('success', 'Task Has Been Succesfully Updated');

    	return redirect()->route('task.index');
    }
}

