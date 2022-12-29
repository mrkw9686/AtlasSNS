<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <script type="text/javascript"　src="{{ asset('js/app.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}" width="100"></a></h1>

<div class="user">
<div class="block">
       <div class="name">{{Auth::user()->username}}  さん</div>

       <div class="accordion">
          <dl>
            <dt></dt>
            <div class="menu">
            <dd><span><a href="/top">ホーム</a></span></dd>
            <dd><span><a href="/myprofile">プロフィール編集</a></span></dd>
            <dd><span><a href="/logout">ログアウト</a></span></dd>
            </div>
          </dl>
        </div>
</div>
        <p><a href="/myprofile">
    @if(Auth::user()->images == 'dawn.png')
  <img src="{{asset('images/icon1.png')}}" class="icon">
@else
<img src="{{asset('storage/'.Auth::user()->images)}}" class="icon">
  @endif
    </a></p>
</div>

    </header>
    <div id="row">

        <div class="side-bar">
            <div class="confirm">
                <p class="side-text">{{Auth::user()->username}}さんの</p>
                <div class="side-text">
                    <p >フォロー数</p>
                    <p >{{(auth()->user()->follows()->count())}}人</p>
                </div>
                <div class="f-btn">
                <p class="btn btn-primary"><a href="/follow-list">フォローリスト</a></p>
                </div>
                <div class="side-text">
                    <p>フォロワー数</p>
                    <p>{{(auth()->user()->followers()->count())}}人</p>
                </div>
                <div class="f-btn">
                <p class="btn btn-primary"><a href="/follower-list">フォロワーリスト</a></p>
                </div>
            </div>
<div class="u-btn">
        <button class="btn btn-primary" type="submit">
  <p ><a href="/search">ユーザー検索</a></p>
        </button>
</div>
        </div>

               <div id="container">
            @yield('content')
</div>
        </div >
    <footer>
    </footer>


</body>
</html>
