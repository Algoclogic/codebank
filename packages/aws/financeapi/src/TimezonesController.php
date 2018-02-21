<?php

namespace AWS\Financeapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TimezonesController extends Controller{

    public function index($timezone){

        echo Carbon::now($timezone)->toDateTimeString();
    }
}
