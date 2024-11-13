<x-login-layout>

<div class="search_block">
    <form action="{{ route('search') }}" class="search_form">
        @csrf
        <input type="text" name="keyword" class="search_window" placeholder="ユーザー名">
        <input type="image" src="{{ asset('images/search.png') }}" class=" search_button" alt="検索">
    </form>
    @if (!empty($keyword))
    <p class="search_text">検索ワード：{{ $keyword }}</p>
    @endif
</div>

<div>
@foreach ($users as $user)
    <ul class="search_user">
        <li class="search_image"><img src="{{ asset('storage/' . $user->icon_image ) }}"></li>
        <li class="search_name">{{ $user->username }}</li>
    @if ($user->relation() == 1 || $user->relation() == 3)
        <li class="follow_button">
            <a href="/users/{{$user->id}}/cancel" class="btn btn-danger">フォロー解除</a>
        </li>
    @else
        <li class="follow_button">
            <a href="/users/{{$user->id}}/add" class="btn btn-info">フォローする</a>
        </li>
    @endif
    </ul>
@endforeach
</div>

</x-login-layout>
