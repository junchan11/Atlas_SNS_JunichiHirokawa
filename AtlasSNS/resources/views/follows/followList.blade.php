@extends('layouts.login')

@section('content')
<h5>Follow List</h5>

@foreach($users as $user)
        <a href="{{route('postShow',['id' => $user->id ])}}"><img src="{{ asset('storage/' . $user->images) }}" ></a>
@endforeach

@foreach($posts as $post)
    <div class ="followPost">
        <ul>
            <li><img src="{{ asset('storage/' . $post->user->images) }}" >
            <li>{{ $post->user->username }}</li>
            <li>{{ $post->post }} {{$post->created_at}}</li>
        </ul>
    </div>
@endforeach

@endsection
