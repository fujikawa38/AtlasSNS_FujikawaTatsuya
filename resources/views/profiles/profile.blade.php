<x-login-layout>

@foreach($profiles as $profile)
@if ($profile->id == Auth::id())
<div class="profile_content">
    <div class="profile_image">
        <img src="{{ asset('storage/' . $profile->icon_image) }}">
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
</div>
@endif
@endforeach


@foreach($profiles as $profile)   <!-- 表示はされるけどもっと簡単な記述ありそう -->
@if ($profile->id != Auth::id())
<div class="profile_others">
    <div class="others_icon">
        <img src="{{ asset('storage/' . $profile->icon_image) }}">
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
            <a href="/users/{{$profile->id}}/cancel" class="btn btn-danger">フォロー解除</a>
        </div>
    @else
        <div>
            <a href="/users/{{$profile->id}}/add" class="btn btn-info">フォローする</a>
        </div>
    @endif
    </div>
</div>
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
@endif
@endforeach


</x-login-layout>
