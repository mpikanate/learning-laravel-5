<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
class UsersController extends Controller
{
    public function index(){
    	
        //dd('test');
    	return   view('users.index');
    }
    public function create(){
        
        //dd('test');
        return   view('users.create');
    }
    public function store(UserRequest $request){
 
        dd('test');
        User::create($request->all());
    
        return redirect('users');
    }
}
