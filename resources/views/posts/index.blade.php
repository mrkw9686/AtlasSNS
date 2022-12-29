@extends('layouts.login')

@section('content')
<!-- 投稿ボタン -->

@foreach ($errors->all() as $error)
<div class="error">
  <tb>{{$error}}</tb>
  </div>
@endforeach

{!! Form::open(['url' => 'post/create']) !!}
<div class="form-group">
    <div class="form-area">
             <td><img src="{{asset('storage/'.Auth::user()->images)}}" class="icon"></td>
         {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-box', 'placeholder' => '投稿内容を入力してください。']) !!}
            </div>
    <div class="form-button">
     <input type="image" src="{{ asset('images/post.png') }}"  width="35"　height="35">
    </div>
</div>
 {!! Form::close() !!}

<!-- 投稿リスト -->
@foreach ($posts as $posts)
<li class="post-block">
<td>
@if($posts->user->images == 'dawn.png')
<img src="{{asset('images/icon1.png')}}" class="icon">
@else
<img src="{{asset('storage/'.$posts->user->images)}}" class="icon">
@endif
</td>

<div class="post-content">
 <div class="post-name">
<td>{{ $posts->user->username }}</td>
 <div class="post-created">
 <td>{{ $posts->created_at }}</td></div></div>

  <div class="post-index">
          <td>{{ $posts->post }}</td></div>


@if (Auth::user()->id === $posts->user_id)
<!-- 更新ボタン -->
<div class="post-button">
        <a class="js-modal-open" href="" post_id="{{ $posts->id }}" post="{{ $posts->post }}" ><img src="{{ asset('images/edit.png') }}" width="35"　height="35"></a>

<!-- 削除ボタン -->
<div class="trash">
          <a href="/post/{{$posts->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">　<img src="{{ asset('images/trash.png') }}" width="35"　height="35"></a>
</div>
        </div>
</div>
</li>
@endif
@endforeach

       <!-- モーダルウィンドウ -->
       <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
<form method="POST" action="{{ url('/post/update')}}" accept-charset="UTF-8">
            <input class="modal_id" name="id" type="hidden" value="post_id">

            <textarea class="modal_post" name="upPost" rows="10" cols="70" ></textarea>
             <button type="submit" class="edit_button" ><img src="{{ asset('images/edit.png') }}"></button>

        {{ csrf_field() }}
        </form>
        </div>
    </div>

@endsection
