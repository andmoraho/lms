@extends('layouts.login')

@section('logintitle')
Log in
@endsection

@section('contentlogin')

<div class="login-box">
  <div class="login-logo">
    <a href="/login"><b>LMS</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h1 class="login-box-msg">{{__('Login')}}</h1>

    <form action="{{ url('/login') }}" method="post">
    @csrf
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
        <br><br>
        <a href="{{ route('password.request') }}">{{ __('I forgot my password') }}</a><br>
        <a href="{{ route('register') }}">{{ __('Register a new member') }}</a>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
