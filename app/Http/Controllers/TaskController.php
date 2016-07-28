<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\http\Requests\TaskRequest;
use App\Task;
use App\Repositories\TaskRepository;  //usar repositories agregar el protected $task

class TaskController extends Controller
{

    //para uso del repository
    protected $tasks;

    /**
     * TaskController constructor. para uso del repository TaskRepository
     * @param TaskRepository $tasks
     */
    public function __construct(TaskRepository $tasks)
    {
        //en $this->tasks  queda configurado el resposity
        $this->tasks = $tasks;  //set el task que se recibe al crearse un Task
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$tasks = Task::all();  obtener todo

       // $tasks = Task::where('user_id', $request->user()->id)->get();  //se comenta para usar el Repositoy

        $tasks= $this->tasks->forUser($request->user());

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {

        $request->user()->tasks()->create(['name' => $request->name]);  //pasa el request a usuario y a task de usuario.

        return redirect('/task')->with('success', 'Task created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)  //en lugar de in $id  sera un TASK $task
    {
        $this->authorize('owner', $task);
        return view('tasks.edit', compact('task')); //pase directo al view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(Request $request, Task $task)
    {
        $this->authorize('owner', $task);
        $task->update($request->all());

        return redirect('/task')->with('success', 'Task Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('owner',$task);

        $task->delete();

        return redirect('/task')->with('success', 'Task Deleted');
    }
}
