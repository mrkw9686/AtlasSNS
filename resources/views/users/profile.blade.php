@extends('layouts.login')

@section('content')

<div class="plf-group">
  @foreach($users as $users)


 <td>
    @if($users->images == 'dawn.png')
  <img src="{{asset('images/icon1.png')}}" class="icon">
@else
 <img src="{{asset('storage/'.$users->images)}}" class="icon">
  @endif
</td>

  <div class="plf-box">
<div class="plf-name"><h2>name</h2> {{ $users->username }}</div>
  <div class="plf-Bio"><h2>Bio</h2> {{$users->bio}} </div>
</div>

<div class="plf-btn">
  @if (auth()->user()->isFollowing($users->id))
  <form action="{{ url('/users/unfollow')}}" method="POST">
    {{ csrf_field() }}
  <input name="id" type="hidden" value="{{ $users->id }}">
     <button type="submit" class="btn btn-primary f-out"　>フォロー解除</button>
  </form>
 @else
  <form action="{{ url('/users/follow')}}" method="POST">
    {{ csrf_field() }}
  <input name="id" type="hidden" value="{{ $users->id }}">
     <button type="submit" class="btn btn-primary f-in">フォローする</button>
  </form>
@endif
</div>
  @endforeach
</div>

  <!-- 投稿リスト -->
       @foreach ($posts as $posts)
<li class="P-post-block">

 <td>
    @if($posts->user->images == 'dawn.png')
  <img src="{{asset('images/icon1.png')}}" class="icon">
@else
 <img src="{{asset('storage/'.$posts->user->images)}}" class="icon">
  @endif
<div class="P-post-content">
 <div class="P-post-name">
<td>{{ $posts->user->username }}</td>
 <div class="P-post-created">
 <td>{{ $posts->created_at }}</td></div></div>

  <div class="P-post-index">
          <td>{{ $posts->post }}</td></div>
</div>
</div>
</li>
       @endforeach

@endsection
