<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
class RegisterController extends Controller
{
    public function index(){
    	
        //dd('test');
    	return   view('users.index');
    }

}
