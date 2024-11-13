<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        @include('layouts.navigation')
    </header>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

  <!-- Page Content -->
    <div id="row">
        <div id="container">
            {{ $slot }}
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p class="user_name">{{ Auth::user() -> username }}さんの</p>
                <div class="follow_count">
                    <p class="follow_text">フォロー数</p>
                    <p class="follow_number">{{ count($countFollow) }}名</p>
                </div>
                <div class="to_follow">
                    <a href="{{ route('follow-list') }}"  class="btn btn-primary">フォローリスト</a>
                </div>
                <div class="follow_count">
                    <p class="follow_text">フォロワー数</p>
                    <p class="follow_number">{{ count($countFollower) }}名</p>
                </div>
                <div class="to_follow">
                    <a href="{{ route('follower-list') }}" class="btn btn-primary">フォロワーリスト</a>
                </div>
            </div>
            <div class="to_search">
                <a href="{{ route('search') }}"  class="btn btn-primary">ユーザー検索</a>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
