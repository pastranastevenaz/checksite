<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
// use DB;

class TaskController extends Controller
{


    /**
     * Create a new controller instance.
     *    //Only allowing the index age and the show pae
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderby('created_at', 'dec')->paginate(6);
        return view('tasks.index')->with('tasks', $tasks)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasts.create')
    }

    /**
     * Store a newly task resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'id' => 'required',
        'timestamp' => 'required',
        'user' => 'required',
        'userid' => 'required',
        'criminal_background_check' => 'required',
        'employment_verification' => 'required',
        'drug_testing' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'fed_id_num' => 'required'
      ]);

      // CREATE THE TASK
      $task = new Task;

      // -----META
      $task->id = $request->input('id');
      $task->timestamp = $request->input('timestamp');
      $task->ipaddress = $request->input('ipaddress');

      // -----USER INFO
      $task->user = $request->input('user');
      $task->userid = $request->input('userid');

      // -----SERVICE REQUEST INFO
      $task->criminal_background_check = $request->input('criminal_background_check');
      $task->employment_verification = $request->input('employment_verification');
      $task->drug_testing = $request->input('drug_testing');

      // -----SUBJECT INFO
      $task->first_name = $request->input('first_name');
      $task->middle_name = $request->input('middle_name');
      $task->last_name = $request->input('last_name');
      $task->fed_id_num = $request->input('fed_id_num');

      $task->save();

      return redirect('//tasks')->with('success', 'Task Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
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
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
