<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['route' => 'login.store']) !!}

  <h2 class="message">AtlasSNSへようこそ</h2>
  <div class="form_content">
      <div class="mb-3">
          {{ Form::label('email', 'メールアドレス', ['class' => 'form-label']) }}
          {{ Form::text('email',null,['class' => 'form-control']) }}
      </div>
      <div class="mb-3">
          {{ Form::label('password', 'パスワード', ['class' => 'form-label']) }}
          {{ Form::password('password',['class' => 'form-control']) }}
      </div>
      <div class="form_button">
          {{ Form::submit('ログイン', ['class' => 'btn btn-danger btn-lg me-md-2']) }}
      </div>
  </div>
  <p class="login_text">
    <a href="register" class="login_link">新規ユーザーの方はこちら</a>
  </p>

  {!! Form::close() !!}

</x-logout-layout>
