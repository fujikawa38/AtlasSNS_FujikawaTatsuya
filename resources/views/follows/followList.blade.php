<x-login-layout>

  <div>
    @foreach($followings as $following)
    @if ($following->relation() == 1 || $following->relation() == 3)
      <a href="#"><img src="{{ asset('images/' . $following->icon_image ) }}"></a>
    @endif
    @endforeach
  </div>

  <div>

  </div>

</x-login-layout>
