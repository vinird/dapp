@extends('layouts.authentication')

@section('content')
<div class="page login-page">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="hidden-sm-up">
          <h3>Registro de nuevo usuario</h3>
      </div>
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6 hidden-xs-down">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Dashboard</h1>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <!-- Form Panel    -->
        <div class="col-lg-6 bg-white">
          <div class="form d-flex align-items-center">
            <div class="content">
              <form id="register-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <input id="register-username" type="text" name="name" required class="input-material" value="{{ old('name') }}" required autofocus>
                  <label for="register-username" class="label-material">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="register-email" type="email" name="email" required class="input-material" value="{{ old('email') }}">
                  <label for="register-email" class="label-material">Correo electrónico</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input id="register-passowrd" type="password" name="password" required class="input-material">
                  <label for="register-passowrd" class="label-material">Contraseña</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <input id="register-passowrd-confirmation" type="password" name="password_confirmation" required class="input-material">
                  <label for="register-passowrd-confirmation" class="label-material">Confirmar contraseña</label>
                </div>

                <!-- <div class="form-group terms-conditions">
                  <input id="license" type="checkbox" class="checkbox-template">
                  <label for="license">Agree the terms and policy</label>
                </div> -->

                <input id="register" type="submit" value="Register" class="btn btn-primary">
              </form><small>¿Ya tienes una cuenta? </small><a href="{{ route('login') }}" class="signup">Ingresar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyrights text-center">
    <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
  </div>
</div>

@endsection
