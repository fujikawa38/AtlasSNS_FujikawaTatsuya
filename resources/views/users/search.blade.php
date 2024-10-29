<x-login-layout>


<div class="">
  @csrf
  <input type="text" name="keyword" class="form" placeholder="ユーザー名">
  <button type="button">
    <img src="{{ asset('images/search.png') }}" class="">
  </button>
</div>

<div class="">
  @foreach ($users as $user)
    <div class="">
      <img src="{{ asset('images/' . $user->icon_image ) }}">
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
