<x-login-layout>

  <div>
  @foreach($followings as $following)
  <img src="{{ asset('images/' . $following->icon_image ) }}">
  @endforeach
  </div>

</x-login-layout>
