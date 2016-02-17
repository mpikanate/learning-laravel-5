<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use DB;
use Log;
use App\Task;
use App\User;
use App\Usertasks;
use Carbon\Carbon;
use App\Http\Requests\CreateTaskRequest;
use Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //DB::connection()->enableQueryLog();
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $tasks = Task::latest('published_at')->get();
       // dd($tasks->toArray());
        $id = Auth::user()->id;
       // $usertasks = Usertasks::all();
       // $users = User::find(2)->tasks->toArray();
        $usertasks = User::find($id)->usertasks;
        //dd($usertasks->toArray());
        //$test = Usertasks::find(3)->user;
        //$test = Usertasks::find(12)->task;
        //dd($test->toArray());
        //dd($tasksuser);
        return view('home',compact('tasks','usertasks'));
    }
    
    public function create()
    {
     //   $users = User::where('status_user','user')->get();
       // $users = $input->get()->toArray();
       // dd($users);
      // dd('hello');
        return view('create');
    }

    public function edit($id)
    {
        $users = User::where('status_user','user')->get();
       $task = Task::findOrFail($id);
        return view('edit',compact('task','users'));
    }

    public function update($id, CreateTaskRequest $request)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect('home');
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
       // dd($task);
        $task->delete();

        return redirect('home');
    }

    public function store(CreateTaskRequest $request)
    {
        //validation
       // $this->validate($request , ['title' => 'required' , 'body' => 'required']);
       // dd($request->toArray());
        //$input['uid'] = $request->uid;
        //dd($request->title);

        Task::create($request->all());
        
        $taskid = Task::latest('id')->get();
        $test = $taskid->first();
        $id = $test->id;

       // dd($taskid->toArray());
        $users = User::where('status_user','user')->get();
        //dd($users);
        //dd($users);
        foreach ($users as $user) {
            $request['status'] = 'passive';
            $request['user_id'] = $user->id;
            $request['task_id'] = $id;//add task id
            Usertasks::create($request->all());
            //dd($request->toArray());
        }
        //dd($request->toArray());


       
        //dd($request->toArray());
        
        return redirect('home');
    }

    public function show($id)
    {
   
        // update 01/02/2559
        $tasks = Task::find($id);
       // $usertasks = Usertasks::where('task_id',$id)->get();
       //$users = User::all();
       

       $usertasks = Usertasks::with('user')->where('task_id',$id)->get();
       
    
        return view('show',compact('tasks','usertasks'));
    }
    
}
