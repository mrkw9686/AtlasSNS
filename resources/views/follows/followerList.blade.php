@extends('layouts.login')

@section('content')

  @foreach($users as $users)

  <td><a href="/profile/{{$users->id}}"><img src="{{asset('storage/'.$users->images)}}" class="icon"></a></td>
@endforeach
  <!-- 投稿リスト -->
       @foreach ($posts as $posts)
<li class="post-block">
       <tr>
          <div class="post-content">

  <tr>
  <td><a href="/profile/{{$users->id}}"><img src="{{asset('storage/'.$users->images)}}" class="icon"></a></td>
 <div class="post-name">{{ $posts->user->username }}</div>

          <div><td>{{ $posts->created_at }}</td></div>
          <div><td>{{ $posts->post }}</td></div>
</div>
</li>
       @endforeach
@endsection
