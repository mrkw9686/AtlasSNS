<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Auth;
class PostsController extends Controller
{
    //
    public function index(){
   $list = \DB::table('posts')->get();
        return view('posts.index',['list'=>$list]);
    }


  public function create(Request $request)
    {
        $id = Auth::id();
        $post = $request->input('newPost');
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $id

        ]);
        return redirect('/top');
    }

// public function update($id)
// {
//      \DB::table('posts')
//       ->where('id', $id)
//       ->first();
//         return view('/top', compact('post'));
// }

//     public function update(Request $request)
//     {
//         $id = $request->input('id');
//         $up_post = $request->input('upPost');
//         \DB::table('posts')
//             ->where('id', $id)
//             ->update(
//                 ['post' => $up_post]
//             );

//         return redirect('/top');
//     }

public function delete($id)
{
     \DB::table('posts')
     ->where('id',$id)
     ->delete();

     return redirect('/top');
}

}
