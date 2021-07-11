<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return Task::orderBy('completed')
            ->orderByDesc('created_at')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Task
     */
    public function store(Request $request)
    {
        $newTask = new Task();
        $newTask->name = $request->task['name'];
        $newTask->save();

        return $newTask;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Task $task
     * @return Task
     */
    public function update(Request $request, Task $task)
    {
        $task->completed = (bool)$request->task['completed'];
        $task->completed_at = $request->task['completed'] ? now() : null;
        $task->save();
        return $task;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return string
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return 'Task successfully deleted';
    }
}
