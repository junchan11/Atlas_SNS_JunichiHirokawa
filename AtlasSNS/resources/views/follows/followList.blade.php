@extends('layouts.login')

@section('content')
<h5>Follow List</h5>
@foreach($posts as $post)
    <p>{{ $post->user->username }}</p><br />
    <p>{{ $post->post }}</p><br />
@endforeach


@endsection
