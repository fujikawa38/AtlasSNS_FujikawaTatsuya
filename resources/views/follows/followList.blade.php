<x-login-layout>

  <div>
    <h3>フォローリスト</h3>
    <div>
    @foreach($followings as $following)
    @if ($following->relation() == 1 || $following->relation() == 3)
      <a href="/profile/{{$following->id}}"><img src="{{ asset('images/' . $following->icon_image) }}"></a>
    @endif
    @endforeach
    </div>
  </div>

  <div>
    @foreach($posts as $post)
      <div>
        <a href="#"><img src="{{ asset('images/' . $post->user->icon_image) }}"></a>
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->updated_at }}</p>
        <p>{{ $post->post }}</p>
      </div>
    @endforeach
  </div>

</x-login-layout>
