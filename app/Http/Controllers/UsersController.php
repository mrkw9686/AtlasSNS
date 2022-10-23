<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use follows;
use App\Post;
class UsersController extends Controller
{
    //

    public function myprofile(){
        $id=Auth::id();
$users = User::where('id',$id)->get();

        return view('users.myprofile',['users'=>$users]);
    }

    public function up_profile(Request $request)
    {

        $user_id =Auth::id();
       $data = $request->all();
               //画像のオリジナルネームを取得
        $filename = $request->images->getClientOriginalName();
        //画像を保存して、そのパスを$imgに保存　第三引数に'public'を指定
        $img = $request->images->storeAs('',$filename,'public');

        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' => $data['username'],
                    'mail' => $data['mail'],
                    'password' => bcrypt($data['password']),
                    'bio' =>$data['bio'],
                    'images'=> $img
                ]);


        return redirect('/myprofile');
    }





    public function profile($id){
$users = User::where('id',$id)->get();
// フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('users.profile',['users'=>$users],['posts'=>$posts]);
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
$users = $query->where('username','like','%'.$username.'%')->orderBy('created_at', 'desc')->get();
}else {
   $users = $query->orderBy('created_at', 'desc')->get();
}

return view('users.search',['users'=>$users,'username'=>$username]);

}

}
