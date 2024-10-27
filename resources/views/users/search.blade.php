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
        <a href="#">フォロー解除</a>
      @else
        <a href="#">フォローする</a>
      @endif
    </div>
  @endforeach
</div>

</x-login-layout>
