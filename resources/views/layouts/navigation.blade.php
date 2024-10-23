        <div id="head">
            <h1><a><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p>{{ Auth::user() -> username }}さん</p>
                    <img src= "{{ asset('images/' . Auth::user() -> icon_image) }}" class="">
                </div>
                <ul>
                    <li><a href="top">HOME</a></li>
                    <li><a href="profile">プロフィール編集</a></li>
                    <li><a href="logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
