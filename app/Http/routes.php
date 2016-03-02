<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::get('/angular' , function()
{
    return view('testAngular');

});






Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', function () {
         return redirect('home') ;
    });
    Route::resource('/home','HomeController');
    
    //test module
    Route::get('/testModule',function(){
        return view('testModule');
    });

    Route::any('home/active/{status}', 'UserTasksController@getActive');
    Route::any('home/passive/{status}', 'UserTasksController@getPassive');

    Route::any('/testDB/{id}', 'UserTasksController@testDB');
   
    Route::post('/home/check/{id}', 'UserTasksController@checksigned');
    Route::post('/home/checkpw/{id}', 'UserTasksController@checkpassword');



    Route::resource('api/todos','TodosController');
    Route::get('api/users','TodosController@getUser');
    Route::get('api/users/{id}','TodosController@getUserById');
    Route::get('api/tasks','TodosController@getTask');
    Route::get('api/tasks/{id}','TodosController@getTaskbyID');
    Route::get('api/usertasks','TodosController@getUsertask');

    Route::get('api/usertasks/{id}','TodosController@selectUsertask');

    //route to add
    Route::get('todoapp','TodoAppController@index');
    Route::get('todoapp/{id}','TodoAppController@show');

    //checkpassword
    Route::post('checkpassword','TodoAppController@checkpassword');

    //create Task
    Route::post('createtask','TodoAppController@createtask');

    Route::get('create' , function()
    {
        return view('createItem');

    });


   /* Route::get('/home', 'HomeController@index');
    //Route::get('/tasks', 'TasksController@index');

    Route::get('/home/create', 'HomeController@create');
    Route::get('/home/{id}', 'HomeController@show');
    Route::post('/home', 'HomeController@store');
    Route::get('/home/{id}/edit', 'HomeController@edit');
    Route::patch('/home/{id}', 'HomeController@update');
    */
});
