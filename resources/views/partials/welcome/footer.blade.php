<section class="mbr-section article" id="msg-box22-g" style="padding-top: 40px; padding-bottom: 20px;">
    <div class="mbr-overlay" style="background-color: #f4f4f4;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                @if (Route::has('login'))
                    @auth
                            <a class="" href="{{ url('/home') }}">INICIO</a>
                    @else
                            <a class="" href="{{ route('login') }}">INGRESAR</a>
                            <a class="" href="{{ route('register') }}">REGISTRARSE</a>
                    @endauth
                @endif
                <p>(c) 2017 <!-- <a  href="https://mobirise.com" style="color:#333;text-decoration:underline;"> Mobirise</a> --></p>
            </div>
        </div>
    </div>
</section>