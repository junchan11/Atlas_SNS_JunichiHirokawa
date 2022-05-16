@extends('layouts.login')

@section('content')

    {!! Form::open(['url' => 'post/search']) !!}
        <div class="search-form">
            <div class="search-item">
                {!! Form::input('text', 'search', null, ['required', 'class' => 'search-text', 'placeholder' => 'ユーザー名']) !!}
                <button type="submit" class="search-btn"><img src="{{ asset('images/search.png') }}" ></button>
                @if (!empty($keyword))
                                <p class="word">検索キーワード:{{$keyword}}</p>
                @endif
            </div>
        </div>
    {!! Form::close() !!}



    @foreach ($search as $user)
        <div class="search-list">
            <ul>
                <li class="search-block">
                    <figure><img src="{{ asset('storage/' . $user->images) }}" ></figure>
                    <div class="search-content">
                        <div>
                            <div class="search-name">{{ $user -> username }}</div>
                        </div>
                    </div>
                    @if (auth()->user()->isFollowing($user->id))
                        <div class="px-3">
                            {!! Form::open(['url' => '/unfollow']) !!}
                            {!!Form::button('フォロー解除', ['type' => 'submit', 'class' => 'unfollow-btn'])!!}
                            {!! Form::hidden('user_id', $user -> id ) !!}
                            {!! Form::close() !!}
                            </div>
                            @else
                            <div class="px-3">
                            {!! Form::open(['url' => '/follow']) !!}
                            {!!Form::button('フォローする', ['type' => 'submit', 'class' => 'follow-btn'])!!}
                            {!! Form::hidden('user_id', $user -> id ) !!}
                            {!! Form::close() !!}
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    @endforeach








@endsection
