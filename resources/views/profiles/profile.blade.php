<x-login-layout>

@foreach($profiles as $profile)
@if ($profile->id == Auth::id())
  {{ Form::open(['url' => '/profile/update', 'enctype' => 'multipart/form-data']) }}
  <div>
    {{ Form::label('ユーザー名') }}
    {{ Form::input('text', 'username', $profile->username, ['required', 'class' => '']) }}
    {{ Form::label('メールアドレス') }}
    {{ Form::input('email', 'email', $profile->email, ['required', 'class' => '']) }}
    {{ Form::label('パスワード') }}
    {{ Form::input('password', 'password', '', ['required', 'class' => '']) }}
    {{ Form::label('パスワード確認') }}
    {{ Form::input('password', 'password_confirmation', '', ['required', 'class' => '']) }}
    {{ Form::label('自己紹介') }}
    {{ Form::input('text', 'bio', $profile->bio, ['class' => '']) }}
    {{ Form::label('アイコン画像') }}
    {{ Form::input('file', 'icon_image', '', ['class' => '']) }}
  </div>
  <button type="submit" class="btn">更新</button>
@endif
@endforeach

@foreach($profiles as $profile)   <!-- 表示はされるけどもっと簡単な記述ありそう -->
@if ($profile->id != Auth::id())
  <div>
    <div>
      <p>ユーザー名</p>
      <p>{{ $profile->username }}</p>
    </div>
    <div>
      <p>自己紹介</p>
      <p>{{ $profile->bio }}</p>
    </div>
    <div>
      @if ($profile->relation() == 1 || $profile->relation() == 3)
        <a href="/users/{{$profile->id}}/cancel">フォロー解除</a>
      @else
        <a href="/users/{{$profile->id}}/add">フォローする</a>
      @endif
    </div>
  </div>
  @foreach($posts as $post)
  <div>
    <div>
      <img src="{{ asset('images/' . $post->user->icon_image) }}">
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->user->updated_at }}</p>
      <p>{{ $post->post }}</p>
    </div>
  </div>
  @endforeach
@endif
@endforeach


</x-login-layout>
