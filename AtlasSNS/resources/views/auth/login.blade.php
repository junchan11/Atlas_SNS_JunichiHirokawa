@extends('layouts.logout')

@section('content')

    <div class="login_menu">
        <div class="login_form">
                {!! Form::open(['url' => '/login']) !!}
                @csrf
                    <p class="login_title">AtlasSNSへようこそ</p>
                    <div class="login_item">
                        {{ Form::label('mail address') }}
                        {{ Form::text('mail',null,['class' => 'input-login']) }}
                    </div>
                    <div class="login_item">
                        {{ Form::label('password') }}
                        {{ Form::password('password',['class' => 'input-login']) }}
                    </div>
                    <div class="login_item_but">
                        {{ Form::submit('LOGIN') }}
                    </div>
                        <div class="new"><a href="/register">新規ユーザーの方はこちら</a></div>

                        @if ($errors->has('password'))
                        <span class=“help-block”>
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                {!! Form::close() !!}
        </div>
    </div>

@endsection
