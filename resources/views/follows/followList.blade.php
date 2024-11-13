<x-login-layout>

<div class="follow_list">
    <h2>フォローリスト</h2>
    <div class="follow_users">
        @foreach($followings as $following)
        @if ($following->relation() == 1 || $following->relation() == 3)
            <div class="follow_icon">
                <a href="/profile/{{$following->id}}"><img src="{{ asset('storage/' . $following->icon_image) }}"></a>
            </div>
        @endif
        @endforeach
    </div>
</div>

<div>
@foreach($posts as $post)
    <div class="user_post">
        <ul>
            <li class="post_block">
                <div>
                    <a href="/profile/{{$post->user->id}}">
                        <img src="{{ asset('storage/' . $post->user->icon_image) }}">
                    </a>
                </div>
                <div class="post_content">
                    <div>
                        <p class="post_text">{{ $post->user->username }}</p>
                        <p class="post_text">{{ $post->updated_at }}</p>
                    </div>
                    <div class="post_main">
                        <p class="post_text">{{ $post->post }}</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endforeach
</div>

</x-login-layout>
