<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use follows;
class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function search(){
$users = \DB::table('users')->get();
        return view('users.search',['users'=>$users]);
    }


public function select(Request $req){

//値を取得
$username = $req->input('search');

$query= User::query();

if(!empty($username)){
$users = $query->where('username','like','%'.$username.'%')->get();
}else {
   $users = $query->get();
}

return view('users.search',['users'=>$users,'username'=>$username]);

}

}
