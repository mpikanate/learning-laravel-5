<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Task;
use App\User;
use App\Usertasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckPasswordRequest;
use Hash;

class UserTasksController extends Controller
{	
	public function __construct()
    {
        $this->middleware('auth');
    }


    


    public function checksigned($id)
    {	

        $usertasks = Usertasks::find($id);
        $taskid = $usertasks->task_id;
        $userid = $usertasks->user_id;
        //dd('hello');
        $task = Task::find($taskid);
        $user = User::find($userid);
       // dd($user->toArray());
        //dd($test);
        
		//dd($usertasks->task->title);

        
        $errormessage = '';
        return view('checksigned',compact('usertasks','user','task','errormessage'));
    }


    public function checkpassword($id, CheckPasswordRequest $request)
    {	
    	$usertasks = Usertasks::find($id);
      	$taskid = $usertasks->task_id;
        $userid = $usertasks->user_id;
        $task = Task::find($taskid);
        $user = User::find($userid);
        //dd($request->all());
        $password = $request->password;
        $userpassword = $user->password;

        $hashedPassword = bcrypt('secrets');
        
        if (Hash::check($password, $userpassword))
		{
			
    		$usertasks['status'] = 'active';
        	           $usertasks->update();
        	//$tasdd = $usertasks->task_id;
       		// dd($dd);
        	return redirect('home/'.$taskid);
		}
        else
        {
        	$errormessage = 'miss';
        	return view('checksigned',compact('usertasks','user','task','errormessage'));
        }
        
    }

    public function getActive($id)
    {   
        $usertasks = Usertasks::where('user_id',$id);
        $actives = $usertasks->where('status','active')->get();
         $tasks = Task::all();

        
        $statusmsg = 'active';
       
        return view('showstatus',compact('actives','statusmsg','tasks'));
    }

    public function getPassive($id)
    {   
        $usertasks = Usertasks::where('user_id',$id);
        $actives = $usertasks->where('status','passive')->get();
        $tasks = Task::all();

        $statusmsg = 'passive';
       
        return view('showstatus',compact('actives','statusmsg','tasks'));
    }


     public function testDB($id)
    {   
        //eager loader
       $usertasks = Usertasks::with('user')->where('task_id',$id)->get();
       foreach($usertasks as $usertask){
            echo $usertask->user->name; 
            echo '<br/>';
        }
        //dd($user);
    }

}
