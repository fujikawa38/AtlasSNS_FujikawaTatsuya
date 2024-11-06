<x-login-layout>

  <div>
    <h3>フォローリスト</h3>
    <div>
    @foreach($followings as $following)
    @if ($following->relation() == 1 || $following->relation() == 3)
      <a href="/profile/{{$following->id}}"><img src="{{ asset('storage/' . $following->icon_image) }}"></a>
    @endif
    @endforeach
    </div>
  </div>

  <div>
    @foreach($posts as $post)
      <div>
        <a href="/profile/{{$post->user->id}}"><img src="{{ asset('storage/' . $post->user->icon_image) }}"></a>
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->updated_at }}</p>
        <p>{{ $post->post }}</p>
      </div>
    @endforeach
  </div>

</x-login-layout>
