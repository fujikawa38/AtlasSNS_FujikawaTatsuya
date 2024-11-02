<x-login-layout>

@foreach($profiles as $profile)
@if ($profile->id == Auth::id())
  {{ Form::open(['url' => '/profile/update']) }}
  <div>
    {{ Form::label('ユーザー名') }}
    {{ Form::input('text', 'userName', $profile->username, ['required', 'class' => '']) }}
  </div>
@endif
@endforeach

</x-login-layout>
