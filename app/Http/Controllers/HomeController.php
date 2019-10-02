<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function save(Request $request)
    {
        $task = new Task();
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->status = 0;
        $task->save();        
        return $task;
    }

    public function allTasks(Request $request){
         $sendtasks = Task::all();
         return $sendtasks;
    }
  
    public function deleteTask(Request $request){
        $task = Task::find($request->id)->delete();
    }
    public function changeTask(Request $request){
        $task =Task::where('id', $request->id)->first();
        $task->status  = 1;
        $task->save();
        return $task;
    }

     public function cancel(Request $request){
        $task =Task::where('id', $request->id)->first();
        $task->status = 2;
        $task->save();
        return $task;
    }

     public function finish(Request $request){
        $task =Task::where('id', $request->id)->first();
        $task->status = 3;
        $task->save();
        return $task;
    }

    

}
