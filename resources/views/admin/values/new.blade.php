@extends('adminlte::page')

@section('title', 'Nuevo Valor')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-tag"></i> Nuevo Valor</h3>
          </div>
          <form action="{{ route('values.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Llave:</label>
                <input type="text" name="key" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Etiqueta:</label>
                <input type="text" name="label" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Tipo:</label>
                <select name="type" class="form-control">
                  <option value="-">Seleccione</option>
                  <option value="text">Texto</option>
                  <option value="file">Archivo</option>
                </select>
              </div>
              <div class="form-group" id="type_value"></div>
            </div>
            <div class="card-footer text-right">
              @include('admin.partials.form_buttons',['routeCancel'=>'values.index'])
            </div>
          </form>
        </div>
      </div>
    </div>
@stop

@section('js')
<script>
  $(document).ready(function(){
    $("select[name='type']").change(function(){
      let type = $(this).val();
      if(type != '-'){ 
        if(type == 'text'){
          $("#type_value").html("<label>Valor</label><textarea class='form-control' name='value'></textarea>");
        }else{
          $("#type_value").html("<label>Archivo</label><input type='file' name='file' class='form-control' />");
        }
      }else{
        $("#type_value").empty();
      }
    });
  });
</script>
@stop