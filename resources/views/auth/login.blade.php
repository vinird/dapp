@extends('layouts.authentication')

@section('content')
<div class="page login-page ">
  <div class="container d-flex align-items-center">
    <div class="form-holder has-shadow">
      <div class="hidden-sm-up">
          <h3>Ingreso al sistema</h3>
      </div>
      <div class="row">
        <!-- Logo & Information Panel-->
        <div class="col-lg-6 hidden-xs-down">
          <div class="info d-flex align-items-center">
            <div class="content">
              <div class="logo">
                <h1>Nombre del sistema</h1>
              </div>
              <p>Acceso al sistema.</p>
            </div>
          </div>
        </div>
        <!-- Form Panel    -->
        <div class="col-lg-6 bg-white">
          <div class="form d-flex align-items-center">
            <div class="content">
              @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <form id="login-form" class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="email" type="email" class="input-material" name="email" value="{{ old('email') }}" required autofocus>
                  <label for="email" class="label-material">Correo electrónico</label>
                  @if ($errors->has('email'))
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input id="password" type="password" class="input-material" name="password" required>
                  <label for="password" class="label-material">Contraseña</label>
                </div>
                {!! captcha_img() !!}
                <br/><br/>
                <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                  <input id="captcha" type="text" class="input-material" name="captcha" required>
                  <label for="captcha" class="label-material">Captcha</label>
                </div>

                <button id="login" type="submit" class="btn btn-primary">Ingresar</button>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                      </label>
                    </div>
                  </div>
                </div>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </form>
                <a href="{{ route('password.request') }}" class="forgot-pass">¿Olvidó la contraseña?</a>
                <br>
                <!-- <small>¿No tiene cuenta? </small><a href="{{ route('register') }}" class="signup">Registrarse</a> -->
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyrights text-center">
    <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
  </div>
</div>
@endsection
