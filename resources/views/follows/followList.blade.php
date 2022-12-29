@extends('layouts.login')

@section('content')
<div class="F-List">
<h1>Follow List</h1>

  @foreach($users as $users)
  <div class="List-icon">
  <td><a href="/profile/{{$users->id}}">
 @if($users->images == 'dawn.png')
  <img src="{{asset('images/icon1.png')}}" class="icon">
@else
 <img src="{{asset('storage/'.$users->images)}}" class="icon">
  @endif
</a></td>
</div>
@endforeach

</div>

  <!-- 投稿リスト -->
       @foreach ($posts as $posts)
<li class="F-post-block">

  <td><a href="/profile/{{$posts->user->id}}">
    @if($posts->user->images == 'dawn.png')
  <img src="{{asset('images/icon1.png')}}" class="icon">
@else
 <img src="{{asset('storage/'.$posts->user->images)}}" class="icon">
  @endif
</a></td>


<div class="F-post-content">
 <div class="F-post-name">
<td>{{ $posts->user->username }}</td>
 <div class="F-post-created">
 <td>{{ $posts->created_at }}</td></div></div>

  <div class="F-post-index">
          <td>{{ $posts->post }}</td></div>
</div>
</li>
       @endforeach

@endsection
