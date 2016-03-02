<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Usertasks;
use App\User;
use App\Task;
use Request;

class TodosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$usertask = Usertasks::all();
		return $usertask;
	}
	public function getUser() {

		$user = User::all()->where('status_user','user');
		return $user;
	}
	public function getUserById($id) {

		$user = User::find($id);
		return $user;
	}
	public function getTask() {

		$task = Task::latest('published_at')->get();;
		return $task;
	}

	public function getTaskbyID($id) {

		$task = Task::find($id);
		return $task;
	}

	public function getUsertask() {

		$usertask = Usertasks::all();
		return $usertask;
	}

	public function selectUsertask($id) {

		$usertask = Usertasks::with('user','task')->get();
		$usertask = $usertask->find($id);
		return $usertask;
	}

	public function show($id) {

		

		$todos = Usertasks::with('user')->where('task_id',$id)->get();
		
		return $todos;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$todo = Usertasks::create(Request::all());
		return $todo;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$todo = Usertasks::find($id);
		$todo->done = Request::input('done');
		$todo->save();

		return $todo;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Usertasks::destroy($id);
	}

}

