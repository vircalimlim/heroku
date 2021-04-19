@extends('layouts.app')
@section('content')

<div class="">
  <ul>
    @forelse($profiles as $profile)
    <li><a href="/profile/{{$profile->id}}">{{ $profile->firstname }}</a></li>
    @empty
    <h2>Empty result</h2>
    @endforelse
  </ul>
</div>


@endsection