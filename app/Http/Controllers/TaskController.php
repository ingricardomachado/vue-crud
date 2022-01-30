<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('category')->orderBy('id', 'desc')->get();

        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        try {
            
            $task = Task::create($request->all());
            /*$task = new Task();
            $task->category_id=$request->category;
            $task->keep=$request->keep;
            $task->save();*/
            
            return response()->json([
                    'message' => 'Tarea registrada exitosamente',
                    'data' => $task
                ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                    'message' => $e->getMessage()
                ], 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->update($request->all());

            return response()->json([
                    'message' => 'Tarea actualizada exitosamente',
                    'data' => $task
                ], 200);
            
        } catch (Exception $e) {
            
            return response()->json([
                    'message' => $e->getMessage()
                ], 500);
        }


        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
            
            return response()->json([
                'message' => 'Tarea eliminada exitosamente'
            ], 200);

        } catch (Exception $e) {
            
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }
}
