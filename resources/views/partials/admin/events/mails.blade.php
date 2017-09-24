@extends('layouts.app')

@section('content')

<div style="padding: 30px;">
  <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Agregar correos al evento / {{ $event->nombreEvento }} </h3>
      </div>
      <br>
      <div class="card-body">
          <form method="POST" action="{{ url('/asignarCorreos') }}" enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}
              <input type="hidden" name="evento_id" value="{{ $event->id }}">
            <!--  -->
            <div id="div_insert_mail">
              <span>Puede ingresar los correos de manera manual</span>
              <div class="form-group" >
                <!-- <label class="form-control-label">Correos</label> -->
                <div class="input-group">
                  <input type="mail" class="form-control" id="mail_value" autocomplete="off">
                  <span class="input-group-btn">
                    <a type="button" id="createNewMail" class="btn btn-primary disabled"><i class="fa fa-plus"></i></a>
                  </span>
                </div>
                <span class="text-danger" style="display: none;" id="mail_valid_message">Correo inválido</span>
              </div>
              <br>
            </div>
            <!--  -->
            <div id="btn_delete_mail" style="display: none;">
              <div class="">
                <a class="btn btn-block btn-warning"> <i class="fa fa-times"></i> </a>  
              </div>
            </div>

            <!--  -->
            <table class="table table- table-hover">
              <tbody id="tbody_correos">
              </tbody>
            </table><br>
            <!--  -->

            <div id="div_file">
              <span>O puede subir un archivo de texto (.txt) con los correos</span>
              <div class="form-group" >
                <!-- <label class="form-control-label">Correos</label> -->
                <input type="file" name="_file" id="btn_select_file" class="form-control">
                <h6 class="help-block">Debe ingresar los correos en el archivo de texto (.txt) de manera que solo haya uno por línea, ejemplo: nombre de correo enter, nombre del correo, y así sucesivamente.</h6>
              </div>
            </div>
            <button class="btn btn-primary">Agregar correos</button>
            <br>
            <!--  -->
          
          
        </form>
      </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(() => {
    var _countMail = 0;

    ///////////////////////////////////////////
    $('#createNewMail').click(function() {
      if ( $('#mail_value').val() != "" ) {
        _countMail++;
        $('#tbody_correos').append(
          '<tr><td style="width: 10px; padding-top: 21px;"><i class="fa fa-arrow-right" aria-hidden="true"></i></td><td><input type="test" name="correo[' + _countMail + ']" value="'+ $('#mail_value').val() +'" readonly="" class="form-control" style="background: transparent;"></td></tr>'
          );
        $('#mail_value').val("");
        $('#createNewMail').addClass('disabled');
        if (_countMail > 0) {
          $('#div_file').css({display: 'none'})
          $('#btn_delete_mail').css({display: 'block'})
        } else {
          $('#btn_delete_mail').css({display: 'none'})
          $('#div_file').css({display: 'block'})
        }
      }
    });


    //////////////////////////////////////////
    $('#btn_delete_mail').click(function(){
      $('#tbody_correos tr:last-child').remove();
      _countMail--;
      if (_countMail > 0) {
          $('#div_file').css({display: 'none'})
          $('#btn_delete_mail').css({display: 'block'})
        } else {
          $('#btn_delete_mail').css({display: 'none'})
          $('#div_file').css({display: 'block'})
        }
    });


    ///////////////////////////////////////////
    $('#mail_value').keyup(function(){
      if($('#mail_value').val() == "") {
        $('#createNewMail').addClass('disabled');
      } else {
        if ( validateEmail($('#mail_value').val()) ) {
          console.log('valid')
          $('#mail_valid_message').css({display: 'none'});   
          $('#createNewMail').removeClass('disabled');             
        } else {
          console.log("invalid")
          $('#mail_valid_message').css({display: 'block'});                  
          $('#createNewMail').addClass('disabled');
        }
      }
    })


    ///////////////////////////////////////////
    $('#btn_select_file').on("change", function(){ 
      $('#div_insert_mail').remove();
    });

    ///////////////////////////////////////////
    function validateEmail(email) {
       var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
    
  })
</script>
@endsection