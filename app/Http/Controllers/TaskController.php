<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Task, TodoList };

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $lists = $user->todoLists;

        //dd($lists);

        $tasks = Task::where('list_id', $lists[0]->id)->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TodoList $list)
    {
        
        return view('tasks.create', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TodoList $list)
    {
        
        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500',
            'toDo' => 'required'
        ]);

        $task = Task::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'toDoFor' => $request->toDo,
            'list_id' => intval($request->list_id, 10)
        ]);
        
        return back()->with('message', "La tâche a bien été créée !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $list = $task->list;
        return view('tasks.show', compact('task','list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $list = $task->list;
        return view('tasks.edit', compact('task', 'list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500',
            'toDo' => 'required'
        ]);
        $task->title = $request->title;
        $task->detail = $request->detail;
        $task->toDoFor = $request->toDo;
        $task->state = $request->has('state');
        $task->save();

        return back()->with('message', "La tâche a bien été modifiée !");
    }

    public function changeState(Request $request, Task $task) 
    {
        if ($request->has('state')) {

            $task->state = $request->has('state');
            $task->save();

        } else { 

            $task->state = false;
            $task->save();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}
