@extends('layouts.login')

@section('content')

  @foreach($users as $users)

    <td><img src="{{asset('storage/'.Auth::user()->images)}}" class="icon"></td>

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

{!! Form::open(['url' => "/up_profile",'files' => true]) !!}
{{ csrf_field() }}
{{ Form::label('user name') }}
{{ Form::text('username',$users->username,['class' => 'input']) }}

{{ Form::label('mail adress') }}
{{ Form::text('mail',$users->mail,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('password comfirm') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::label('bio') }}
{{ Form::text('bio',$users->bio,['class' => 'input']) }}

{{ Form::label('icon image ') }}
{{ Form::file('images',null,['class' => 'custom-file-input','id'=>'fileImage']) }}

{{ Form::submit('更新') }}


{!! Form::close() !!}


  @endforeach
@endsection
