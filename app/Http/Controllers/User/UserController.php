<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
// use Illuminate\Validation\Validator;
use Validator;
use Elibyy\TCPDF\Facades\TCPDF;

class UserController extends Controller
{
    /*
    * this function gets all records from user table and passes them to user view file
    */
    public function index(){

        
    	$users=User::all();

    	return view('user.user',compact('users'));
    }

    /*
    * this function store new record to user table
    */
    public function add(Request $request){

    	$this->validate($request, [
	        'name' => 'bail|required|min:4|max:255',
	        'email' => 'bail|required|email',
	        'address' =>'bail|required|min:4|max:255',
    	]);


    	User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'address' => $request->address,
    	]);

    	return redirect(route('user.home'))->with('status', 'User added!');

    }

    /*
    * this function gets single record from user table based on matched id  and renders ajaxTemplate view
    */

    public function update(Request $request){


    	$user=User::findOrFail($request->id);
    	return View::make('user.ajaxTemplate')->with('user',$user)->render();

    }

    /*
    * this function updates single record to user table based on matched id  and renders tableData view
    */

    public function updateDetail(Request $request){


		$user=User::findOrFail($request->id);

		$user->fill([

			'name'=>$request->name,
			'email'=>$request->email,
			'address'=>$request->address,

		]);    	

		$user->save();

		$users=User::all();
		return response()->json(View::make('user.tableData')->with('users',$users)->render());

    }

    /*
    * this function deletes single record from user table based on matched id  and renders tableData view
    */

    public function delet(Request $request){

    	$user=User::findOrFail($request->id);

    	$user->delete();
    	$users=User::all();
		return response()->json(View::make('user.tableData')->with('users',$users)->render());
    	//return redirect(route('user.home'))->with('status', 'User deleted sucessfully!');

    }
}
