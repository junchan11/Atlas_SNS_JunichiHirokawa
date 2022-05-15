@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="add-form">
    <p>{{ session('username') }}さん</p>
      <p>ようこそ！AtlasSNSへ！</p>
      <div class="add-text">
        <p>ユーザー登録が完了しました。</p>
        <p>早速ログインをしてみましょう。</p>
      </div>
  </div>
  <div class="add-btn">
    <p class="back-login"><a href="/login">ログイン画面へ</a></p>
  </div>

</div>

@endsection
