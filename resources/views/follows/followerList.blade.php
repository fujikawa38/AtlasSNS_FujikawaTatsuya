<x-login-layout>

  <div>
    <h3>フォロワーリスト</h3>
    <div>
    @foreach($followers as $follower)
    @if ($follower->relation() == 2 || $follower->relation() == 3)
      <a href="/profile/{{$follower->id}}"><img src="{{ asset('images/' . $follower->icon_image) }}"></a>
    @endif
    @endforeach
    </div>
  </div>

  <div>
    @foreach($posts as $post)
      <a href="/profile/{{$post->user->id}}"><img src="{{ asset('images/' . $post->user->icon_image) }}"></a>
      <p>{{ $post->user->username }}</p>
      <p>{{ $post->updated_at }}</p>
      <p>{{ $post->post }}</p>
    @endforeach
  </div>

</x-login-layout>
