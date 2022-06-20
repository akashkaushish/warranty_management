<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User; 

class UsersController extends Controller
{
    /*
	 * Show customer listing
	*/
	
  function userlisting(){
	  // $data=User::paginate(5);
	  $data= DB::table('users')
	              ->where('id', '!=', '1')
	              ->get()->toArray();
	   return view('userlist',['userlist'=>$data]);
	}
}
