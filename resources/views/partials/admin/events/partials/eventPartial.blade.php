<div id="papeleta-form" class="card">
  <div class="card-body">
    <form method="POST" action="{{ url('/test') }}" class="form-horizontal">
      {{ csrf_field() }}
        <div class="form-group">
          <label class="form-control-label">Nombre</label>
          <div class="input-group">
            <input id="iNombrePapeleta" type="text" class="form-control"><span class="input-group-btn">
            <button id="btnAgregarNombre" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button></span>
          </div>
        </div>
        <table id="tNombresPapeleta" class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </form>
  </div>
</div>

<div id="referendum-form" class="card" style="display: none;">
  <div class="card-body">
    <form method="POST" action="{{ url('/test') }}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="form-control-label">Pregunta o propuesta</label>
        <div class="input-group">
          <textarea name="taPregunta" class="form-control"></textarea>
        </div>
      </div>
    </form>
  </div>
</div>

<div id="multiple-form" class="card" style="display: none;">
  <div class="card-body">
    <form method="POST" action="{{ url('/test') }}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="form-control-label">Pregunta</label>
        <div class="input-group">
          <textarea name="taPreguntaMultiple" class="form-control"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Opcion</label>
        <div class="input-group">
          <input id="iOpcionValor" type="text" class="form-control"><span class="input-group-btn">
            <button id="btnAgregarOpciones" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button></span>
        </div>
      </div>
      <table id="tOpcionesPregunta" class="table table-striped table-hover">
        <thead>
          <tr>
           <th>Opcion</th>
           <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </form>
  </div>
</div>

<script src="{{ asset('js/libs/datepicker.min.js') }}"></script>
<script src="{{ asset('js/libs/datepicker.es-ES.js') }}"></script>
<script src="{{ asset('js/eventosVotacion.js') }}"></script>
