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
						<button class="btn btn-danger"onclick="lauchModalConfirm({{ $u->id }})" type="button">Eliminar</button>

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
      <div class="modal-body">
        Confirmar eliminacion de usuario
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
function lauchModalConfirm(id){
	$('#myModal').modal('show');
	idDelete=id;
}
	
function delUser(){
	var form=$("#form_delete"+idDelete);
	var url= form.attr('action');
	var data= form.serialize();
	$.post(url,data,function(result){
	$('#myModal').modal('hide');

		$(".tr"+idDelete).fadeOut();
	}).fail(function(e){
		console.log(e);
		alert(e);
	});	
 }

</script>
@endsection
