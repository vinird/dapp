$( document ).ready(function() {
	jQuery.datetimepicker.setLocale('es');
	$('#dpFechaInicio').datetimepicker({
		 format:'d-m-Y H:i'
	});
    $('#dpFechaFinal').datetimepicker({
		 format:'d-m-Y H:i'
	});
});

$( "#sOpcionVoto" ).change(function () {
	$( "#sOpcionVoto option:selected" ).each(function() {
      switch ($( this ).val()) { 
		case '1':
			$('#papeleta-form').fadeIn();
			$('#referendum-form').fadeOut();
			$('#multiple-form').fadeOut();
			$('#papeleta-activo').val("1");
			$('#referendum-activo').val("0");
			$('#multiple-activo').val("0");
			break;
		case '2': 
			$('#papeleta-form').fadeOut();
			$('#referendum-form').fadeIn();
			$('#multiple-form').fadeOut();
			$('#papeleta-activo').val("0");
			$('#referendum-activo').val("1");
			$('#multiple-activo').val("0");
			break;	
		case '3': 
			$('#papeleta-form').fadeOut();
			$('#referendum-form').fadeOut();
			$('#multiple-form').fadeIn();
			$('#papeleta-activo').val("0");
			$('#referendum-activo').val("0");
			$('#multiple-activo').val("1");
			break;
	  }
	});
});

$( "#btnAgregarNombre" ).click(function() {
	if($('#iNombrePapeleta').val() != "") {
	  var cantNombres = cuentaInputs(false);
	  $('#tNombresPapeleta tr:last').after('<tr><td><input name="iNombre[' + cantNombres + ']" id="iNombre' + cantNombres + '" value="' + $('#iNombrePapeleta').val() + '" class="form-control" readonly></td><td><button id="btnNombre' + cantNombres + '" type="button" class="btn btn-danger">Eliminar</button></td></tr>');
	  $("#btnNombre" + cantNombres).on('click', function() {
		$(this).parent().parent().remove();
		renombrarInputs(false);
	  });
	  $('#iNombrePapeleta').val("");
	}
});

$( "#btnAgregarOpciones" ).click(function() {
	if($('#iOpcionValor').val() != "") {
	  var cantOpciones = cuentaInputs(true);
	  $('#tOpcionesPregunta tr:last').after('<tr><td><input name="iOpcionMultiple[' + cantOpciones + ']" id="iOpcionMultiple' + cantOpciones + '" value="' + $('#iOpcionValor').val() + '" class="form-control" readonly></td><td><button id="btnOpcion' + cantOpciones + '" type="button" class="btn btn-danger">Eliminar</button></td></tr>');
	  $("#btnOpcion" + cantOpciones).on('click', function() {
		$(this).parent().parent().remove();
		renombrarInputs(true);
	  });
	  $('#iOpcionValor').val("");
	}
});

function cuentaInputs(tipoInput) {
	var idInput = 0;
	var RevisarInput = "";
	var existeInputs = true;

	if (tipoInput) {
		RevisarInput= "iOpcionMultiple";
	} else {
		RevisarInput= "iNombre";
	}

	while(existeInputs) {
		if (document.getElementById(RevisarInput+idInput) != null) {
			idInput++;
		} else {
			existeInputs = false;
		}
	}

	cambiarMaximoOpciones(idInput);

	return idInput;
}

function renombrarInputs(tipoInput) {
	var RevisarTabla = "";
	var RevisarInput = "";
	if (tipoInput) {
		RevisarTabla = "tOpcionesPregunta";
		RevisarInput= "iOpcionMultiple";
	} else {
		RevisarTabla = "tNombresPapeleta";
		RevisarInput= "iNombre";
	}
	var totalInputs = $("#" + RevisarTabla).find("tr").not(':first');
	
	$.each(totalInputs, function(index) {
		if (tipoInput) {
			$(this).find( "input[id*='iOpcionMultiple']" ).attr("id", RevisarInput + "" + (index));
			$(this).find( "input[id*='iOpcionMultiple']" ).attr("name", RevisarInput + "[" + (index) + "]");
		} else {
    		$(this).find( "input[id*='iNombre']" ).attr("id", RevisarInput + "" + (index));
    		$(this).find( "input[id*='iNombre']" ).attr("name", RevisarInput + "[" + (index) + "]");
    	}
	});

	cambiarMaximoOpciones($("#" + RevisarTabla).find("tr").not(':first').size());
}

function cambiarMaximoOpciones(registrosActuales) {
	/*console.log(registrosActuales);
	if ($("#iMaximo").attr("max") <= 2 && registrosActuales < $("#iMaximo").attr("max")) {
		$("#iMaximo").attr("max", registrosActuales);
		$("#iMaximo").attr("value", registrosActuales);
	}*/
} 