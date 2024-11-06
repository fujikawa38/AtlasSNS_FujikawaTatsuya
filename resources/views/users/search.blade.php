<x-login-layout>

<div class="">
  <form action="/search">
    @csrf
    <input type="text" name="keyword" class="form" placeholder="ユーザー名">
    <input type="image" src="{{ asset('images/search.png') }}" class="btn" alt="検索">
  </form>
  @if (!empty($keyword))
    <p>検索ワード：{{ $keyword }}</p>
  @endif
</div>

<div class="">
  @foreach ($users as $user)
    <div class="">
      <img src="{{ asset('storage/' . $user->icon_image ) }}">
      <p>{{ $user->username }}</p>
      @if ($user->relation() == 1 || $user->relation() == 3)
        <a href="/users/{{$user->id}}/cancel">フォロー解除</a>
      @else
        <a href="/users/{{$user->id}}/add">フォローする</a>
      @endif
    </div>
  @endforeach
</div>

</x-login-layout>
