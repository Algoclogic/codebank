<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    
    //   $validation = Validator::make( $request->all(), [
       //          'name' => 'bail|required|min:4|max:255',
       //       'email' => 'bail|required|min:4|max:255',
       //       'address' =>'bail|required|min:4|max:255',
    //         ]);

          // if( $validation->fails() ){
          // $users=User::all();
          //   return response([
          //           'errors' => $validation->errors()->getMessages(),
          //           'code' => 422,
    //                 'table' => response()->json(View::make('user.tableData')->with('users',$users)->render()),
          //        ]);
          // }
        //dd($request->all());
        
}
