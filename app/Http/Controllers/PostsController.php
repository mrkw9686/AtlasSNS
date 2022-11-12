<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;
class PostsController extends Controller
{

    public function index(){
//    フォローしているユーザーのidを取得
  $following_id = Auth::user()->follows()->pluck('followed_id');
// フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id', $following_id)->orWhere('user_id',Auth::id())->get();
        return view('posts.index',['posts'=>$posts]);
    }


  public function create(Request $request)
    {

        $user_id = Auth::id();
        $post = $request->input();
        $errors = Validator::make($post, [
            'newPost' => 'required|string|min:3|max:200'
  // バリデーションルール定義
        ]);
        $errors->validate();
        if($errors->fails()){
        return redirect('/top')
         ->withInput()
         ->withErrors($errors);
        }

        \DB::table('posts')->insert([
            'user_id' => $user_id,
            'post' => $post['newPost']
]);
        return redirect('/top');

   }

    public function update(Request $request)
    {

        $user_id= Auth::id();
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/top');
    }

public function delete($id)
{
    $user_id= Auth::id();
     \DB::table('posts')
     ->where('id',$id)
     ->delete();

     return redirect('/top');
}

}
