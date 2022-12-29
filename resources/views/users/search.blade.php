@extends('layouts.login')

@section('content')

    <div id="search">
<div class="search-window">
      <form action="/search/select" method="get">
        <input type="text" name="search" value placeholder="ユーザー名で検索">
        <button id="sbtn" type="submit">
          <i class="bi-alarm">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
</i>
</button>
{{ csrf_field() }}

@if(!empty($username))
<span>検索ワード:{{$username}}</span>
@endif
      </form>
</div>



  @foreach($users as $users)
  <div class="search-List">
   @if($users->id != auth()->user()->id)
  <tr>
  <td><a href="/profile/{{$users->id}}">
  @if($users->images == 'dawn.png')
  <img src="{{asset('images/icon1.png')}}" class="icon">
@else
 <img src="{{asset('storage/'.$users->images)}}" class="icon">
  @endif
  </a></td>

  <td><p>{{$users->username}}</p></td>

  @if (auth()->user()->isFollowing($users->id))
  <form action="{{ url('/users/unfollow')}}" method="POST">
    {{ csrf_field() }}
  <input name="id" type="hidden" value="{{ $users->id }}">
     <button type="submit" class="btn btn-primary f-out">フォロー解除</button>
  </form>
 @else
  <form action="{{ url('/users/follow')}}" method="POST">
    {{ csrf_field() }}
  <input name="id" type="hidden" value="{{ $users->id }}">
     <button type="submit" class="btn btn-primary f-in">フォローする</button>
  </form>
@endif

  </tr>
@endif
 </div>
  @endforeach

</div>
@endsection
