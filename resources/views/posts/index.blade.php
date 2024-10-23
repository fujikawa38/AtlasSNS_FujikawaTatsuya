<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
  <div class="">
  <img src="{{ asset('images/' . Auth::user() -> icon_image) }}">
  {{ Form::open(['url' => '']) }}
  {{ Form::input('textarea' ,'post', null, ['class' => 'post', 'placeholder' => '投稿を入力してください。']) }}
  <img src="{{ asset('images/post.png') }}" class="">
  {{ Form::close() }}
  </div>

  <div>

  </div>

</x-login-layout>
