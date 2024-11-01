<x-login-layout>

  <div>
  @foreach($followers as $follower)
  @if ($follower->relation() == 2)
  <a href="#"><img src="{{ asset('images/' . $follower->icon_image ) }}"></a>
  @endif
  @endforeach
  </div>

</x-login-layout>
