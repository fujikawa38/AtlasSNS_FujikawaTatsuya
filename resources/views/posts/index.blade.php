<x-login-layout>


  <div class="">
    <img src="{{ asset('storage/' . Auth::user()->icon_image) }}">
    {{ Form::open(['route' => 'post.create']) }}
      {{ Form::textarea('post', null, ['class' => 'post', 'placeholder' => '投稿を入力してください。']) }}
      <input type="image" src="images/post.png" class="" alt="投稿">
    {{ Form::close() }}
  </div>

  <div>
    @foreach ($posts as $post)
      <div>
        <img src="{{ asset('storage/' . $post->user->icon_image) }}">
        <ul>
          <li>{{ $post->user->username }}</li>
          <li>{{ $post->updated_at }}</li>
          <li>{{ $post->post }}</li>
        </ul>
        @if ($post->user_id == Auth::id())
          <a href="#" class="modal-open" data-target="modal-update"><img src="images/edit.png" class="" alt="編集"></a>
          <div class="modal-main js-modal" id="modal-update">
            {{ Form::open(['route' => 'post.update']) }}
              <div class="modal-inner">
                {{ Form::textarea('postUpdate', $post->post, ['class' => '',]) }}
                {{ Form::hidden('id', $post->id) }}
                <input type="image" src="images/edit.png" class="" alt="編集">
              </div>
              {{ Form::close() }}
            </div>
          <a href="/posts/{{$post->id}}/delete" class="" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png" class="" alt="削除"></a>
        @endif
      </div>
    @endforeach
  </div>

</x-login-layout>
