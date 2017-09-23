@extends('layouts.app')

@section('content')

<div class="col-lg-12">

<table class="table table-striped table-hover ">
	<thead>
		<th>Nombre</th>
		<th>Email</th>
		<th>Accion</th>
	</thead>
	<tbody>
		@if(isset($userList))

			@foreach($userList as $u)
				<tr class="tr{{$u->id}}">
					@if($u->rol != 1)
					<td>{{ $u->name }}</td>
					<td>{{ $u->email }}</td>
					<td><a href="{{ url('userEdit') }}/{{ $u->id }}" class="btn btn-warning btn-xs">Editar</a>

							
	        			@if($u->voting === 1)
	        				<button class="btn btn-danger"onclick="lauchModalConfirm({{ $u->id }},'¿El usuario esta Votando desea eliminarlo?','text-danger')" type="button">Eliminar</button>
							<span class="label label-danger">Usuario votando</span>
						@elseif ($u->voting === 0)
							<button class="btn btn-danger"onclick="lauchModalConfirm({{ $u->id }},'¿Desea eliminar el usuario?','text')" type="button">Eliminar</button>
						@endif					
					<form type="hidden" id="form_delete{{ $u->id }}" action="{{ url('userDelete') }} " method="post">
        				{{ csrf_field() }}
        				<input type="hidden" name="id" value="{{ $u->id }}">
					</form>
					</td>
					@endif
				</tr>
			@endforeach
		@endif
	</tbody>
</table>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmacion</h4>
      </div>
      <div class="modal-body text-center">
      <p class="msj-alert-user"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button onclick="delUser()" type="button" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">


var idDelete;
var msj="Desea eliminar usuario";
function lauchModalConfirm(id,msj,clase){
	idDelete=id;
	msj=msj;
	$(".msj-alert-user").text(msj);
	$('.msj-alert-user').attr('class',clase);
	$('#myModal').modal('show');

}
	
function delUser(){
	var form=$("#form_delete"+idDelete);
	var url= form.attr('action');
	var data= form.serialize();
	$.post(url,data,function(result){
	$('#myModal').modal('hide');
	if(result.status=='1')
		{
			$(".tr"+idDelete).fadeOut();			
		}//usuario votando
		else if(result.status=='0'){
			alert(result.msj);
		}//error 3
	
	}).fail(function(e){
		console.log(e);
		alert(e);
	});	
 }


</script>
@endsection
