        <div id="head">
            <h1><a href="top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
            <div id="">
                <div id="">
                    <p>{{ Auth::user() -> username }}さん</p>
                    <img src= "{{ asset('images/' . Auth::user() -> icon_image) }}" class="">
                </div>
                <ul>
                    <li><a href="{{ route('top') }}">HOME</a></li>
                    <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                    <li><a href="{{ route('logout') }}">ログアウト</a></li>
                </ul>
            </div>
        </div>
