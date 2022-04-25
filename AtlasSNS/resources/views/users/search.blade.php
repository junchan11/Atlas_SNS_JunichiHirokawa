@extends('layouts.login')

@section('content')

{!! Form::open(['url' => 'post/search']) !!}
        <div class="form-group">
            {!! Form::input('text', 'search', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">検索
        </button>
        {!! Form::close() !!}
        @if (!empty($keyword))
        <p>検索キーワード:{{$keyword}}</p>
        @endif

<ul class="list-unstyled">
  @foreach ($search as $user)
    <li>{{ $user -> username }}
@if (auth()->user()->isFollowing($user->id))
                                <div class="px-2">
                                    {!! Form::open(['url' => '/unfollow']) !!}
                                        {!!Form::button('フォロー解除', ['type' => 'submit', 'class' => 'btn btn-primary'])!!}
                                        {!! Form::hidden('user_id', $user -> id ) !!}
                                    {!! Form::close() !!}
                                </div><br />
                            @else
                            <div class="px-2">
                                    {!! Form::open(['url' => '/follow']) !!}
                                        {!!Form::button('フォローする', ['type' => 'submit', 'class' => 'btn btn-primary'])!!}
                                        {!! Form::hidden('user_id', $user -> id ) !!}
                                    {!! Form::close() !!}
                                </div><br />
                            @endif
    </li>
  @endforeach
</ul>







@endsection
