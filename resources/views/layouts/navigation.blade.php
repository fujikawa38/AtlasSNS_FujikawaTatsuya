        <div id="head">
            <h1>
                <a href="{{ route('top') }}"><img src="{{ asset('images/atlas.png') }}"  class="logo" alt="Atlasロゴ"></a>
            </h1>
            <nav id="menu">
                <div>
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
                    @if (Auth::user()->icon_image != "icon1.png")
                    <img src= "{{ asset('storage/' . Auth::user() -> icon_image) }}">
                    @else
                    <img src="{{ asset('images/icon1.png') }}" alt="アイコン画像">
                    @endif
                </div>
            </nav>
        </div>
