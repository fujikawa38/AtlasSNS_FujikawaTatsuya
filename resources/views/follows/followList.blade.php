<x-login-layout>

<section class="follow_list">
    <h2>フォローリスト</h2>
    <div class="follow_users">
        @foreach($followings as $following)
        @if ($following->relation() == 1 || $following->relation() == 3)
            <div class="follow_icon">
                <a href="{{ route('profile.other', ['id' => $following->id]) }}">
                    @if ($following->icon_image != "icon1.png")
                    <img src="{{ asset('storage/' . $following->icon_image) }}" alt="アイコン画像">
                    @else
                    <img src="{{ asset('images/icon1.png') }}" alt="アイコン画像">
                    @endif
                </a>
            </div>
        @endif
        @endforeach
    </div>
</section>

<article>
    @foreach($posts as $post)
    <div class="user_post">
        <ul class="post_block">
            <li>
                <a href="{{ route('profile.other', ['id' => $post->user->id]) }}">
                    @if ($post->user->icon_image != "icon1.png")
                    <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="アイコン画像">
                    @else
                    <img src="{{ asset('images/icon1.png') }}" alt="アイコン画像">
                    @endif
                </a>
            <li class="post_content">
                <div>
                    <p class="post_text">{{ $post->user->username }}</p>
                    <p class="post_text">{{ $post->updated_at }}</p>
                </div>
                <div class="post_main">
                    <p class="post_text">{{ $post->post }}</p>
                </div>
            </li>
        </ul>
    </div>
    @endforeach
</article>

</x-login-layout>
