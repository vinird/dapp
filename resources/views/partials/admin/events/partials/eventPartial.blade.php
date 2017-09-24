<div id="papeleta-form" class="card">
  <div class="card-body">
    <form method="POST" action="{{ url('/test') }}" class="form-horizontal">
      {{ csrf_field() }}
        <div class="form-group">
          <label class="form-control-label">Nombre</label>
          <div class="input-group">
            <input type="text" class="form-control"><span class="input-group-btn">
            <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button></span>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Otto</td>
              <td><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
            </tr>
            </tbody>
          </table>
    </form>
  </div>
</div>

<div id="referendum-form" class="card">
  <div class="card-body">
    <form method="POST" action="{{ url('/test') }}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="form-control-label">Pregunta o propuesta</label>
        <div class="input-group">
          <textarea class="form-control"></textarea>
        </div>
      </div>
    </form>
  </div>
</div>

<div id="multiple-form" class="card">
  <div class="card-body">
    <form method="POST" action="{{ url('/test') }}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="form-control-label">Pregunta</label>
        <div class="input-group">
          <textarea class="form-control"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label">Opcion</label>
        <div class="input-group">
          <input type="text" class="form-control"><span class="input-group-btn">
            <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button></span>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
           <th>Opcion</th>
           <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>Otto</td>
              <td><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
            </tr>
          </tbody>
        </table>
    </form>
  </div>
</div>

<script src="{{ asset('js/libs/datepicker.min.js') }}"></script>
<script src="{{ asset('js/eventosVotacion.js') }}"></script>
