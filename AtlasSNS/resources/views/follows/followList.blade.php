@extends('layouts.login')

@section('content')
<h5>Follow List</h5>
@foreach($posts as $post)
    <p>名前：{{ $post->user->username }}</p><br />
    <p>投稿内容：{{ $post->post }}</p><br />
@endforeach


@endsection
