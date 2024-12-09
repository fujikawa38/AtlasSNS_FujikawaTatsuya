<x-login-layout>


<article id="myPost">
    <div class="post_image">
        @if (Auth::user()->icon_image != "icon1.png")
        <img src="{{ asset('storage/' . Auth::user()->icon_image) }}" alt="アイコン画像">
        @else
        <img src="{{ asset('images/icon1.png') }}" alt="アイコン画像">
        @endif
    </div>
    {{ Form::open(['route' => 'post.create', 'class' => 'post_form']) }}
        {{ Form::textarea('post', null, ['class' => 'post', 'placeholder' => '投稿を入力してください。']) }}
        <input type="image" src="images/post.png" class="post_button" alt="投稿">
    {{ Form::close() }}
</article>

<article>
    @foreach ($posts as $post)
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
        @if ($post->user_id == Auth::id())
        <div class="edit_button">
            <a href="#" class="modal_open button_image" post="{{ $post->post }}" post_id="{{ $post->id }}">
                <img src="images/edit.png" class="" alt="編集">
            </a>
            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="button_image" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                <img src="images/trash.png" class="trash" alt="削除">
            </a>
        </div>
        @endif
    </div>
    @endforeach
    <div class="modal js_modal" id="modalUpdate">
        <div class="modal_bg modal_close"></div>
        <div class="modal_content">
            {{ Form::open(['route' => 'post.update', 'class' => 'modal_inner']) }}
                {{ Form::textarea('postUpdate', '', ['class' => 'modal_post',]) }}
                {{ Form::hidden('id', '', ['class' => 'modal_id', ]) }}
                <div>
                    <input type="image" src="images/edit.png" class="modal_button" alt="編集">
                </div>
            {{ Form::close() }}
        </div>
    </div>
</article>

</x-login-layout>
