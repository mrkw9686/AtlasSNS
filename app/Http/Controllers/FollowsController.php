<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\follow;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');

    }
        public function follow(Request $request) {
            $user =$request->input('id');
        // $follow = follow::create
       \DB::table('follows')->insert
        ([
            'following_id' => Auth::user()->id,
            'followed_id' =>$user

        ]);
        return redirect('/search');
        // $followCount = count(follow::where('followed_id')->get());
        // return response()
        // ->json(['followCount' => $followCount]);
    }

    public function unfollow(Request $request) {
         $user =$request->input('id');
        $follow = follow::where('following_id', \Auth::user()->id)
        ->where('followed_id', $user)->first();
        if (!empty($follow)) {
        $follow->delete();
        }

        // $followCount = count(follows::where('followed_user_id', $users->id)->get());
return redirect('/search');
        // return response()->json(['followCount' => $followCount]);
    }
}
