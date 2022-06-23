@extends('layouts.app')

@section('content')
{{-- @dd($users) --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Username</th>
      <th scope="col">email</th>
        <th scope="col">github</th>
        <th scope="col">linkedin</th>
        <th scope="col">phone</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>

    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
      {{-- @dd($user->contactInfo) --}}
    <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        @if($user->contactInfo->github && $user->contactInfo->linkedin && $user->contactInfo->phone)
            <td>{{$user->contactInfo->github}}</td>
            <td>{{$user->contactInfo->linkedin}}</td>
            <td>{{$user->contactInfo->phone}}</td>}
            @else
            <td>no info</td>
            <td>no info</td>
            <td>no info</td>
            @endif

        <td>{{$user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
