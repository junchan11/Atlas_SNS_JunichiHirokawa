@extends('layouts.login')

@section('content')

    <div class="show-form">
        <div class="show-block1">
            <figure><img src="{{ asset('storage/' . $user->images) }}" ></figure>
            <div class="show-show">
                <div class="show-name">name &emsp;&emsp;&emsp;&emsp;{{ $user->username }}</div>
                <div class="show-bio">bio &emsp;&emsp;&emsp;&emsp;{{ $user->bio }}</div>
            </div>

            <div class="show-btn">

                @if (auth()->user()->isFollowing($user->id))
                    <div class="px-2">
                        {!! Form::open(['url' => '/unfollow']) !!}
                        {!!Form::button('フォロー解除', ['type' => 'submit', 'class' => 'unfollow-btn'])!!}
                        {!! Form::hidden('user_id', $user -> id ) !!}
                        {!! Form::close() !!}
                    </div><br />
                    @else
                    <div class="px-2">
                        {!! Form::open(['url' => '/follow']) !!}
                        {!!Form::button('フォローする', ['type' => 'submit', 'class' => 'follow-btn'])!!}
                        {!! Form::hidden('user_id', $user -> id ) !!}
                        {!! Form::close() !!}
                    </div><br />
                @endif
            </div>
        </div>
    </div>


    @foreach($posts as $post)
        <div class ="show-list">
            <ul>
                <li class="show-block2">
                    <figure><img src="{{ asset('storage/' . $post->user->images) }}" ></figure>
                    <div class="show-content">
                        <div>
                            <div class="show-name">{{ $post->user->username }}</div>
                            <div>{{$post->created_at}}</div>
                        </div>
                        <div>{{ $post->post }}</div>
                    </div>
                </li>
            </ul>
        </div>
    @endforeach

@endsection
