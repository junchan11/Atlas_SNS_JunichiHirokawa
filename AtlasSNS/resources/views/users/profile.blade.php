@extends('layouts.login')

@section('content')

<img src="{{ asset('storage/' . Auth::user()->images) }}" style="width:45px; height:45px;">
<form action="/profile_edit" method="post" enctype='multipart/form-data'>
    <div class ="pf-block">
      <label class="profile-text" for="username">user name </label><input type="text" name="username" value="{{ Auth::user()->username }}" /><input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
    </div><br />
    <div class ="pf-block">
      <label class="profile-text" for="mail_address">mail address </label><input type="text" name="email" placeholder="{{ Auth::user()->mail }}" />
    </div><br />
    <div class ="pf-block">
      <label class="profile-text" for="password">password </label><input type="password" name="password"  />
    </div><br />
    <div class ="pf-block">
      <label class="profile-text" for="password_comfirm">password comfirm </label><input type="password" name="password_confirmation" value="" />
    </div><br />
    <div class ="pf-block">
      <label class="profile-text" for="bio">bio </label><input type="text" name="bio" value="{{ Auth::user()->bio }}" />
    </div><br />
    <div class = "pf-block">
      <label class="profile-text" for="icon-image">icon image  </label><input type="file" name="image" />
    </div><br />
    <div class ="up-button">
      <p align="center"><input type="submit" value="更新" class="up_button"/></p>
    </div>

    @if ($errors->has('password'))
                <span class=“help-block”>
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
    @endif
{{csrf_field()}}

</form>

@endsection
