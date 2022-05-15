@extends('layouts.logout')

@section('content')

  <div class="new-menu">
    <div class="new-form">
      {!! Form::open(['url' => '/register']) !!}
      <p class="nwe-title">新規ユーザー登録</p>
        @if ($errors->has('password'))
          <span class=“help-block”>
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      <div class="new-item">
        {{ Form::label('user name') }}
        {{ Form::text('username',null,['class' => 'input-new' , 'placeholder' => '◯◯◯◯◯◯◯']) }}
      </div>
      <div class="new-item">
        {{ Form::label('mail address') }}
        {{ Form::text('mail',null,['class' => 'input-new' , 'placeholder' => 'abcdefg@mail']) }}
      </div>
      <div class="new-item">
        {{ Form::label('password') }}
        {{ Form::password('password',null,['class' => 'input-pass']) }}
      <div class="new-item">
        {{ Form::label('password confirmation') }}
        {{ Form::password('password_confirmation',null,['class' => 'input-pass']) }}
      </div>
      <div class="new-item-btn">
        {{ Form::submit('REGISTER') }}
      </div>
        <div class="back-login"><a href="/login">ログイン画面へ戻る</a></div>
        {!! Form::close() !!}
    </div>
  </div>

@endsection
