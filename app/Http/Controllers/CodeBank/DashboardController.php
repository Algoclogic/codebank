<?php

namespace App\Http\Controllers\CodeBank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Validator;
use App\Model\Question;

class DashboardController extends Controller{
   
    public function index(){

    	$response = Question::latest()->paginate(10);

		return View::make('searchResult', compact('response'));

    	return view('searchResult');

    	return view('pages.dashboard');
    }

    public function search(Request $request){

    	$search= $request->search;
    	//$search= 'validate form';

    	$response = Question::whereRaw(
					"MATCH(question,answer) AGAINST(? IN BOOLEAN MODE)", 
					[$search])
				->select('question','answer','code')
				->paginate(10);

		return view('searchResult', compact('response'));


    }



}    