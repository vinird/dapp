@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in! / <strong> Text from home template</strong>
        </div>
        <br>
        <br>
        <button class="btn btn-primary" id="btn_create_contract"> Create contract</button>
        <br>
        <br>

        


        <script type="text/javascript">
          ///////////////////////////////////////////
          ///////////////////////////////////////////
          $('#btn_create_contract').click(function(){
            App.createContract();
          });
        </script>
        

            
        <div>
            <strong id="blockchain_info"></strong>
        </div>
        <br>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
@endsection
