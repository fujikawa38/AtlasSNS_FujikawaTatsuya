<x-login-layout>


  <div class="">
  <img src="{{ asset('images/' . Auth::user() -> icon_image) }}">
  {{ Form::open(['url' => '']) }}
  {{ Form::textarea('post', null, ['class' => 'post', 'placeholder' => '投稿を入力してください。']) }}
  <img src="{{ asset('images/post.png') }}" class="">
  {{ Form::close() }}
  </div>

  <div>

  </div>

</x-login-layout>
