<x-login-layout>

  <div>
    <h2>フォロワーリスト</h2>
    <div>
    @foreach($followers as $follower)
    @if ($follower->relation() == 2 || $follower->relation() == 3)
      <a href="/profile/{{$follower->id}}"><img src="{{ asset('storage/' . $follower->icon_image) }}"></a>
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
