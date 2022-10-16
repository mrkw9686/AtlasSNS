@extends('layouts.login')

@section('content')


  @foreach($users as $users)

  <td><img src="{{ asset('images/icon1.png') }}">{{$users->username}}</td>
  <td>Bio{{$users->bio}} </td>

  @if (auth()->user()->isFollowing($users->id))
  <form action="{{ url('/users/unfollow')}}" method="POST">
    {{ csrf_field() }}
  <input name="id" type="hidden" value="{{ $users->id }}">
     <button type="submit" class="btn btn-primary">フォロー解除</button>
  </form>
 @else
  <form action="{{ url('/users/follow')}}" method="POST">
    {{ csrf_field() }}
  <input name="id" type="hidden" value="{{ $users->id }}">
     <button type="submit" class="btn btn-primary">フォローする</button>
  </form>
@endif

  @endforeach



  <!-- 投稿リスト -->
       @foreach ($posts as $posts)
<li class="post-block">
       <tr>
          <div class="post-content">

  <tr>
  <td><img src="{{ asset('images/icon1.png') }}"></a></td>
 <div class="post-name">{{ $posts->user->username }}</div>

          <div><td>{{ $posts->created_at }}</td></div>
          <div><td>{{ $posts->post }}</td></div>
</div>
</li>
       @endforeach

@endsection
