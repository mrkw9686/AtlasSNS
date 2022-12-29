@extends('layouts.login')

@section('content')

  @foreach($users as $users)

  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
<div class=mypro>

 <td>
    @if($users->images == 'dawn.png')
  <img src="{{asset('images/icon1.png')}}" class="icon">
@else
 <img src="{{asset('storage/'.$users->images)}}" class="icon">
  @endif
</td>



{!! Form::open(['url' => "/up_profile",'files' => true]) !!}
{{ csrf_field() }}
<p>
{{ Form::label('user name') }}
{{ Form::text('username',$users->username,['class' => 'input']) }}
</p>
<p>
{{ Form::label('mail adress') }}
{{ Form::text('mail',$users->mail,['class' => 'input']) }}
</p>
  <p>
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</p>
  <p>
{{ Form::label('password comfirm') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
</p>
<p>
{{ Form::label('bio') }}
{{ Form::text('bio',$users->bio,['class' => 'input']) }}
</p>
<p>
{{ Form::label('icon image ') }}
{{ Form::file('images',['class' => 'image-input','id'=>'fileImage']) }}
</p>

{{ Form::submit('更新',['class' => 'mypro_btn']) }}

</div>


{!! Form::close() !!}


  @endforeach
@endsection
