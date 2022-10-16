<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\follow;
use App\User;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followList(){
//    フォローしているユーザーのidを取得
  $following_id = Auth::user()->follows()->pluck('followed_id');
// フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id', $following_id)->orderBy('created_at', 'desc')->get();

  $users = User::whereIn('id', $following_id)->get();
        return view('follows.followList',['posts'=>$posts,'users'=>$users]);
    }

    public function followerList(){
        //    フォローされてるユーザーのidを取得
  $followed_id = Auth::user()->followers()->pluck('following_id');
// フォローされてるユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id', $followed_id)->orderBy('created_at', 'desc')->get();

  $users = User::whereIn('id', $followed_id)->get();
        return view('follows.followerList',['posts'=>$posts,'users'=>$users]);

    }


    // フォローボタン

        public function follow(Request $request) {
            $user =$request->input('id');
       \DB::table('follows')->insert
        ([
            'following_id' => Auth::user()->id,
            'followed_id' =>$user

        ]);
        return redirect('/search');
    }

    public function unfollow(Request $request) {
         $user =$request->input('id');
        $follow = follow::where('following_id', \Auth::user()->id)
        ->where('followed_id', $user)->first();
        if (!empty($follow)) {
        $follow->delete();
        }
return redirect('/search');
    }
}
