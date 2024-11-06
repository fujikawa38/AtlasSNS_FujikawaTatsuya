<x-logout-layout>

<div class="added">
    <div class="added_content">
        <p class="added_name">{{ $name = session()->get('key') }}さん</p>   <!-- sessionで名前表示 -->
        <p class="added_name">ようこそ！AtlasSNSへ</p>
    </div>
    <div class="added_content">
        <p class="added_text">ユーザー登録が完了いたしました。</p>
        <p class="added_text">早速ログインをしてみましょう！</p>
    </div>
    <div class="login_button">
        <a href="login" class="btn btn-danger btn-lg">ログイン画面へ</a>
    </div>
</div>

</x-logout-layout>
