<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usertasks;
use App\User;
use App\Task;
use App\Http\Requests\CheckPasswordRequest;
use Hash;
use Log;
use Carbon\Carbon;



class TodoAppController extends Controller {

	
	    public function __construct()
	    {
	        $this->middleware('auth');
	        
	    }

	public function index()
	{ 
		return view('TodoApp/index');
	}

	
	public function show($id)
	{ 
		$todos = Usertasks::with('user','task')->where('task_id',$id)->get();
		/*foreach($todos as $todo){

			echo $todo->user->name;
			echo '</br>';
			echo $todo->task->title;
			echo $todo->status;
			echo '</br>';

		};*/
		return $todos;
	}

	 public function checkpassword(Request $request )
    	{	
    		$id = $request->id;
    		$password = $request->password;
	    	$usertask = Usertasks::with('user','task')->get();
		$usertask = $usertask->find($id);
		$usertasks = Usertasks::find($id);

		$userpassword = $usertask->user->password;

		if (Hash::check($password, $userpassword))
		{
			
    			$usertasks['status'] = 'active';
		        	 $usertasks->update();
		        	//$tasdd = $usertasks->task_id;
		       		// dd($dd);
		        	return 'success';
		}
		        else
		        {
		        	
		        	return 'failed';
		        }


        
    	}
    	public function createtask(Request $request)
	{ 


		$date = $request->published_at;
		if($date == ""){
			$request['published_at'] = Carbon::now();
		}else{
			Log::info($date);


			$fixeddated = date('Y-m-d', strtotime($date));



			Log::info($fixeddated);


			$request['published_at'] = Carbon::createFromFormat('Y-m-d', $fixeddated);
		}

		

		$data = $request->all();
		Log::info($data);
		
		//dd($request->all());
		Task::create($data);


		
		$task = Task::latest('id')->get();
	        	$taskid = $task->first();
	        	$id = $taskid->id;

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




		$status = $data;
		return $status;
		
		
	}


}
