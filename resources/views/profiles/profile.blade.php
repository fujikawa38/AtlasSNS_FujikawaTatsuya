<x-login-layout>

@foreach($profiles as $profile)
@if ($profile->id == Auth::id())
<article id="profileContent">
    <div class="profile_image">
        @if (Auth::user()->icon_image != "icon1.png")
        <img src="{{ asset('storage/' . $profile->icon_image) }}" alt="アイコン画像">
        @else
        <img src="{{ asset('images/icon1.png') }}" alt="アイコン画像">
        @endif
    </div>
    {{ Form::open(['route' => 'profile.update', 'enctype' => 'multipart/form-data', 'class' => 'profile_form']) }}
        <div class="profile_item">
            {{ Form::label('username', 'ユーザー名', ['class' => 'profile_label']) }}
            {{ Form::input('text', 'username', $profile->username, ['required', 'class' => 'profile_window']) }}
        </div>
        <div class="profile_item">
            {{ Form::label('email', 'メールアドレス', ['class' => 'profile_label']) }}
            {{ Form::input('email', 'email', $profile->email, ['required', 'class' => 'profile_window']) }}
        </div>
        <div class="profile_item">
            {{ Form::label('newPassword', 'パスワード', ['class' => 'profile_label']) }}
            {{ Form::password('newPassword', ['required', 'class' => 'profile_window']) }}
        </div>
        <div class="profile_item">
            {{ Form::label('newPassword_confirmation', 'パスワード確認', ['class' => 'profile_label']) }}
            {{ Form::password('newPassword_confirmation', ['required', 'class' => 'profile_window']) }}
        </div>
        <div class="profile_item">
            {{ Form::label('bio', '自己紹介', ['class' => 'profile_label']) }}
            {{ Form::input('text', 'bio', $profile->bio, ['class' => 'profile_window']) }}
        </div>
        <div class="profile_item">
            {{ Form::label('iconImage', 'アイコン画像', ['class' => 'profile_label']) }}
            {{ Form::input('file', 'iconImage', '', ['class' => 'upload_button']) }}
        </div>
        {{ Form::hidden('id', $profile->id) }}
        <div class="profile_submit">
            <button type="submit" class="btn btn-danger btn-lg">更新</button>
        </div>
    {{ Form::close() }}
</article>
@endif
@endforeach


@foreach($profiles as $profile)   <!-- 表示はされるけどもっと簡単な記述ありそう -->
@if ($profile->id != Auth::id())
<article id="profileOthers">
    <div class="others_icon">
        @if ($profile->icon_image != "icon1.png")
        <img src="{{ asset('storage/' . $profile->icon_image) }}" alt="アイコン画像">
        @else
        <img src="{{ asset('images/icon1.png') }}" alt="アイコン画像">
        @endif
    </div>
    <div class="others_block">
        <div class="others_content">
            <p class="others_item">ユーザー名</p>
            <p class="others_text">{{ $profile->username }}</p>
        </div>
        <div class="others_content">
            <p class="others_item">自己紹介</p>
            <p class="others_text">{{ $profile->bio }}</p>
        </div>
    </div>
    <div class="others_follow">
    @if ($profile->relation() == 1 || $profile->relation() == 3)
        <div>
            <a href="{{ route('cancel', ['id' => $profile->id]) }}" class="btn btn-danger">フォロー解除</a>
        </div>
    @else
        <div>
            <a href="{{ route('add', ['id' => $profile->id]) }}" class="btn btn-info">フォローする</a>
        </div>
    @endif
    </div>
</article>
@foreach($posts as $post)
<article>
    <div class="user_post">
        <ul class="post_block">
            <li>
                @if ($post->user->icon_image != "icon1.png")
                <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="アイコン画像">
                @else
                <img src="{{ asset('images/icon1.png') }}" alt="アイコン画像">
                @endif
            </li>
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
</article>
@endforeach
@endif
@endforeach


</x-login-layout>
