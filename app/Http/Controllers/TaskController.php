<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Faker\Generator as FakerGenerator;
use Faker\Generator ;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return response($tasks->jsonSerialize());//->json($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Generator $faker )
    {
        $task= new Task();
        $task->title = $faker->text(20) ;
        $task->priority = $faker->boolean ?"High":"low";
        $task->save();
        return response($task->jsonSerialize() );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task= new Task();
        $task->title = $request->title ;
        $task->priority = $request->priority ;
        $task->save();
       // $saved = Task::updateOrCreate( $task );

        return response($task->jsonSerialize() );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task = Task::findOrfail($task->id);
        return response($task->jsonSerialize() );
    }
}
