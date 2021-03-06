<?php
/**
 * Created by PhpStorm.
 * User: Egin Kaman
 * Date: 29.03.2018
 * Time: 12:13
 */

namespace Users\Http\Controllers;

use Users\User;
use Users\Visitors;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$users = User::paginate();
		return view('users.list', ['users' => $users]);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @param Request $request
	 * @param integer $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		if ($id == Auth::id()) {
			return redirect('home');
		}
		$user = User::getFirstUser($id);
		if (empty($user)) {
			abort(404);
		} else {
			Visitors::insert(['id' => $id, 'guest_id' => Auth::id()]);
			return view('users.show', ['user' => $user]);
		}

	}
}