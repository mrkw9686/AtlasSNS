@extends('layouts.login')

@section('content')

    <div id="search">
      <form action="http://127.0.0.1:8000/search/select" method="get">
        <input type="text" name="search" value placeholder="ユーザー名で検索">
        <button id="sbtn" type="submit">
          <i class="bi-alarm">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
</i>
</button>
{{ csrf_field() }}

@if(!empty($username))
<span>検索ワード:{{$username}}</span>
@endif
      </form>

  @foreach($users as $users)
  <tr>
  <td><img src="{{ asset('images/icon1.png') }}"></td>
  <td>{{$users->username}}</td>

  </tr>
  @endforeach

@endsection
