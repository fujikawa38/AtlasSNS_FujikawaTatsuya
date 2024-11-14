<x-login-layout>

<article id="searchBlock">
    <form action="{{ route('search') }}" class="search_form">
        @csrf
        <input type="text" name="keyword" class="search_window" placeholder="ユーザー名">
        <input type="image" src="{{ asset('images/search.png') }}" class=" search_button" alt="検索">
    </form>
    @if (!empty($keyword))
    <p class="search_text">検索ワード：{{ $keyword }}</p>
    @endif
</article>

<article>
    @foreach ($users as $user)
    <ul id="searchUser">
        <li class="search_image"><img src="{{ asset('storage/' . $user->icon_image ) }}" alt="アイコン画像"></li>
        <li class="search_name">{{ $user->username }}</li>
    @if ($user->relation() == 1 || $user->relation() == 3)
        <li class="follow_button">
            <a href="{{ route('cancel', ['id' => $user->id]) }}" class="btn btn-danger">フォロー解除</a>
        </li>
    @else
        <li class="follow_button">
            <a href="{{ route('add', ['id' => $user->id]) }}" class="btn btn-info">フォローする</a>
        </li>
    @endif
    </ul>
    @endforeach
</article>

</x-login-layout>
