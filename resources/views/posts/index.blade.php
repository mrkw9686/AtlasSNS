@extends('layouts.login')

@section('content')

{!! Form::open(['url' => 'post/create']) !!}
     <div class="form-group">
       <img src="{{ asset('images/icon1.png') }}">
         {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
     </div>
     <button type="submit" class="btn btn-success pull-right"><img src="{{ asset('images/post.png') }}"></button>
 {!! Form::close() !!}

       @foreach ($list as $list)
<li class="post-block">
       <tr>
          <td>{{ $list->id }}</td>
          <div class="post-content">
 <div class="post-name">{{ $list->user_id }}</div>

          <div><td>{{ $list->created_at }}</td></div>
          <div><td>{{ $list->post }}</td></div>
</div>

        <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="{{ asset('images/edit.png') }}"></a>

          <a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">　<img src="{{ asset('images/trash.png') }}"></a>
        </li>
       @endforeach
       <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="" method="">
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                                <textarea name="" class="modal_post"></textarea>

           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
   </table>
@endsection
