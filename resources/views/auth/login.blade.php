@extends('layouts.login')

@section('content')

<div class="login-box-body">
    <p class="login-box-msg">Login</p>

    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

        <div class=" has-feedback form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class=" has-feedback form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember"> Recordar
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar <i class="fa fa-btn fa-sign-in"></i></button>
            </div>
            <!-- /.col -->
        </div>

    </form>

    <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvidé mi contraseña</a>

</div><!-- /.register-box -->
@endsection
