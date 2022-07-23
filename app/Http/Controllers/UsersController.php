<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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


// 検索QUERY
// $query =::query();

//結合
// $query->join('follows', function ($query) use ($req) {
// $query->on('id', '=', 'follows.id');
// });

$query= User::query();

if(!empty($username)){
$users = $query->where('username','like','%'.$username.'%')->get();
}else {
   $users = $query->get();
    # code...
}

// ビューへ渡す値を配列に格納
// $hash = array(
// 'username' => $username

// );


return view('users.search',['users'=>$users,'username'=>$username]);
// ->with($hash)
}

}
