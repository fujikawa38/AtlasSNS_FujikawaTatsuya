<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{!! Form::open(['route' => 'register.store']) !!}

    <h2 class="message">新規ユーザー登録</h2>
    <div class="form_content">
        <div class="mb-3">
            {{ Form::label('username', 'ユーザー名', ['class' => 'form-label']) }}
            {{ Form::text('username',null,['class' => 'form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('email', 'メールアドレス', ['class' => 'form-label']) }}
            {{ Form::email('email',null,['class' => 'form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('password', 'パスワード', ['class' => 'form-label']) }}
            {{ Form::password('password',['class' => 'form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('password_confirmation', 'パスワード確認', ['class' => 'form-label']) }}
            {{ Form::password('password_confirmation',['class' => 'form-control']) }}
        </div>
        <div class="form_button">
            {{ Form::submit('新規登録', ['class' => 'btn btn-danger btn-lg me-md-2']) }}
        </div>
    </div>

    <p class="login_text">
        <a href="login" class="login_link">ログイン画面へ戻る</a>
    </p>

{!! Form::close() !!}


</x-logout-layout>
