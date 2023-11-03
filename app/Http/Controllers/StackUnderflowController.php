<?php

namespace App\Http\Controllers;

use App\Models\Task;
//use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
//use function Sodium\add;


class StackUnderflowController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $id = Task::all('id')->toArray();
    }


    public function index()
    {

        $task = Task::all()->toArray();


        return view('home', ['task'=> $task]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $tasks=[$request['taskname'],$request['taskdescription']] ;
        $list = 0;
        switch ($request['list']){

            case  "To Do":
                $list = 1;
                break;
            case  "In Progress":
                $list = 2;
                break;
            case  "Done":
                $list = 3;
                break;

        }
        array_push($tasks,$list);



        $task = Task::firstOrNew(['id' => $request['id']]);

        $task->taskname = $request['taskname'];
        $task->taskdescription = $request['taskdescription'];
        $task->list = $list;

        $task->save($tasks);


        return redirect()->to('/');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $taskdata = Task::find($id);

        return view("edit",['taskdata'=>$taskdata]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $tasks=[$request['taskname'],$request['taskdescription']] ;
        $id = $request['id'];
        $list = 0;
        switch ($request['list']){

            case  "To Do":
                $list = 1;
                break;
            case  "In Progress":
                $list = 2;
                break;
            case  "Done":
                $list = 3;
                break;

        }

        $task = Task::firstOrNew(['id' => $id]);

        array_push($tasks,$list);
        // update record
        $task->taskName = $request['taskname'];
        $task->taskDescription = $request['taskdescription'];
        $task->list = $list;
        $task->save();
        return redirect()->to('/');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $taskid = Task::find($id);
        if (!$taskid) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Delete the record
        $taskid->delete();

        return redirect()->to('/');
    }
}
