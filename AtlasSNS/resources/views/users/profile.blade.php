@extends('layouts.login')

@section('content')

  <div class="profile-form">
      <img src="{{ asset('storage/' . Auth::user()->images) }}" >
      <form action="/profile_edit" method="post" class="profile-menu" enctype='multipart/form-data' >
        <div class ="pf-block">
        <label class="profile-text" for="username">user name </label><input class="profile-info" type="text" name="username" value="{{ Auth::user()->username }}" /><input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
        </div><br />
        <div class ="pf-block">
        <label class="profile-text" for="mail_address">mail address </label><input class="profile-info" type="text" name="mail" value="{{ Auth::user()->mail }}" />
        </div><br />
        <div class ="pf-block">
        <label class="profile-text" for="password">password </label><input class="profile-info" type="password" name="password" />
        </div><br />
        <div class ="pf-block">
          <label class="profile-text" for="password_comfirm">password comfirm </label><input type="password" class="profile-info" name="password_confirmation" value="" />
        </div><br />
        <div class ="pf-block">
          <label class="profile-text" for="bio">bio </label><input type="text" class="profile-info" name="bio" value="{{ Auth::user()->bio }}" />
        </div><br />
        <div class = "pf-block">
          <label class="profile-text" for="icon-image">icon image  </label><input class="profile-bio" type="file" name="image" />
        </div><br />
        <div class ="up-button">
          <p align="center"><input type="submit" value="更新" class="up_button"/></p>
        </div>
      </form>


    @if ($errors->has('password'))
                <span class=“help-block”>
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
    @endif
    @if ($errors->has('password_confirmation'))
                <span class=“help-block”>
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
    @endif
    @if ($errors->has('username'))
                <span class=“help-block”>
                  <strong>{{ $errors->first('username') }}</strong>
                </span>
    @endif
    @if ($errors->has('mail'))
                <span class=“help-block”>
                  <strong>{{ $errors->first('mail') }}</strong>
                </span>
    @endif

{{csrf_field()}}


</div>
@endsection
