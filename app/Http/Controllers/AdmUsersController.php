<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdmUsersController extends Controller
{

   /*  public function __construct(){
        $this->middleware('auth');
    } */
    
    public function AllUsers(){

        $users = User::oldest()->paginate(5);
        return view('admin.users.users', compact('users') );
    }

    public function Details($id){
        $user= User::find($id);
        return view('admin.users.user_details',compact('user'));
    }

}
