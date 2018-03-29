<?php
/**
 * Created by PhpStorm.
 * User: Egin Kaman
 * Date: 29.03.2018
 * Time: 11:07
 */

namespace Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VisitorsController extends Controller
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
		$visitors = DB::table('visitors')
			->join('users', 'guest_id', '=', 'users.id')
			->select('users.id', 'users.name', 'users.email', 'visitors.visited_at')
			->where(['visitors.id' => Auth::id()])
			->paginate(15);
		return view('visitors', ['visitors' => $visitors]);
	}
}