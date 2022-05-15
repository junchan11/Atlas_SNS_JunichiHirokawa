@extends('layouts.login')

@section('content')

    <div class="followList-img">
        <h1>Follow List</h1>
        @foreach($users as $user)
            <div class="follow-icon">
                <a href="{{route('postShow',['id' => $user->id ])}}"><img src="{{ asset('storage/' . $user->images) }}" ></a>
            </div>
        @endforeach
    </div>

    @foreach($posts as $post)
        <div class ="followPost">
            <ul>
                <li class="follow-block">
                    <figure><img src="{{ asset('storage/' . $post->user->images) }}" ></figure>
                    <div class="follow-content">
                        <div>
                            <div class="follow-name">{{ $post->user->username }}</div>
                            <div>{{$post->created_at}}</div>
                        </div>
                        <div>{{ $post->post }}</div>
                    </div>
                </li>
            </ul>
        </div>
    @endforeach

@endsection
