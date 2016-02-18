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


}
