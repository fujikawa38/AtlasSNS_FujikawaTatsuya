        <div id="head">
            <a href="{{ route('top') }}"><img src="{{ asset('images/atlas.png') }}"  class="logo"></a>
            <nav class="menu">
                <div id="">
                    <p class="nav_text">{{ Auth::user() -> username }}　さん</p>
                </div>
                <div class="accordion_menu">
                    <div class="accordion_arrow"></div>
                    <ul class="accordion_content">
                        <li class="accordion_lists"><a href="{{ route('top') }}">HOME</a></li>
                        <li class="accordion_lists"><a href="{{ route('profile') }}">プロフィール編集</a></li>
                        <li class="accordion_lists"><a href="{{ route('logout') }}">ログアウト</a></li>
                    </ul>
                </div>
                <div>
                    <img src= "{{ asset('storage/' . Auth::user() -> icon_image) }}" class="">
                </div>
            </nav>
        </div>
