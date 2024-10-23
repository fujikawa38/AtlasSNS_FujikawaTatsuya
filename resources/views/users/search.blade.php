<x-login-layout>


<div class="">
  @csrf
  <input type="text" name="keyword" class="form" placeholder="ユーザー名">
  <img src="{{ asset('images/search.png') }}" class="">
</div>

<div class="">
  @foreach ($users as $user)
    <tr>
      <td>{{ asset('images/' . $user->icon_image ) }}</td>
      <td>{{ $user->name }}</td>
    </tr>
  @endforeach
</div>

</x-login-layout>
