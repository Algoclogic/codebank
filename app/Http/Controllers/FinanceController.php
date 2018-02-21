<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Validator;
//use App\MWSFinancesService_Client\MWSFinancesPHPClientLibrary\src\MWSFinancesService\Client;
class FinanceController extends Controller{
    /*
    * this function gets all records from user table and passes them to user view file
    */
    public function index(){
       // $client = new Client();

       // $client->listFinancialEventGroups();
         require (app_path().'/MWSFinancesPHPClientLibrary/src/MWSFinancesService/Samples/ListFinancialEventsSample.php');
        // showMe();
    	
    }

    /*
    * this function store new record to user table
    */
    public function add(Request $request){


    }

    

    public function update(Request $request){


    }

    

    public function updateDetail(Request $request){

    }


    public function delet(Request $request){


    }
}
