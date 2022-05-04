@extends('layouts.login')

@section('content')
<h5>Follower List</h5>
@foreach($posts as $post)
<p><img src=<img src="{{ asset('storage/' . $list->user->images) }}" >{{ $post->user->username }}</p><br />
<p>{{ $post->post }}</p><br />
@endforeach


@endsection
