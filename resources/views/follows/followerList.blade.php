<x-login-layout>

  <div>
  @foreach($followers as $follower)
  <img src="{{ asset('images/' . $follower->icon_image ) }}">
  @endforeach
  </div>

</x-login-layout>
