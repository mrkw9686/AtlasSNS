@extends('layouts.login')

@section('content')
<!-- 投稿ボタン -->
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
{!! Form::open(['url' => 'post/create']) !!}
     <div class="form-group">
    <td><img src="{{asset('storage/'.Auth::user()->images)}}" class="icon"></td>
         {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
     </div>
     <button type="submit"><img src="{{ asset('images/post.png') }}"></button>
 {!! Form::close() !!}
<!-- 投稿リスト -->
       @foreach ($posts as $posts)
<li class="post-block">
       <tr>
          <td>{{ $posts->id }}</td>
          <div class="post-content">
 <div class="post-name">{{ $posts->user->username }}</div>

          <div><td>{{ $posts->created_at }}</td></div>
          <div><td>{{ $posts->post }}</td></div>
</div>
@if (Auth::user()->id === $posts->user_id)
<!-- 更新ボタン -->
    <div class="content">
        <a class="js-modal-open" href="" post_id="{{ $posts->id }}" post="{{ $posts->post }}" ><img src="{{ asset('images/edit.png') }}"></a>
    </div>
<!-- 削除ボタン -->
          <a class="btn btn-danger" href="/post/{{$posts->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">　<img src="{{ asset('images/trash.png') }}"></a>
        </li>
@endif
       @endforeach
       <!-- モーダルウィンドウ -->
       <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
<form method="POST" action="{{ url('/post/update')}}" accept-charset="UTF-8">
            <input class="modal_id" name="id" type="hidden" value="post_id">

            <textarea class="modal_post" name="upPost"></textarea>
        <button type="submit" class="btn btn-primary pull-right"><img src="{{ asset('images/edit.png') }}"></button>
        {{ csrf_field() }}
        </form>
           <a class="js-modal-close" href="">閉じる</a>

        </div>
    </div>
   </table>
@endsection
