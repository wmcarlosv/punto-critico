@extends('adminlte::page')

@section('title', 'Editar Valor')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-tag"></i> Nuevo Valor</h3>
          </div>
          <form action="{{ route('values.update', $Value->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Llave:</label>
                <input type="text" name="key" value="{{ $Value->key }}" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Etiqueta:</label>
                <input type="text" name="label" value="{{ $Value->label }}" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Tipo:</label>
                <select name="type" class="form-control">
                  <option value="-">Seleccione</option>
                  <option value="text" @if($Value->type == 'text') selected='selected' @endif>Texto</option>
                  <option value="file" @if($Value->type == 'file') selected='selected' @endif>Archivo</option>
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
    let edit_type = '{{ $Value->type }}';

    if(edit_type == 'text'){
        $("#type_value").html("<label>Valor</label><textarea class='form-control' name='value'>{{ $Value->value }}</textarea>");
      }else{
        @if($Value->type == 'file')
        let file = '<a href="{{ asset(str_replace("public","storage",$Value->value)) }}" target="_blank" class="btn btn-info">View File</a>';
        @else
        let file = '';
        @endif
        $("#type_value").html("<label>Archivo</label><input type='file' name='file' class='form-control' /><br />"+file);
      }

    $("select[name='type']").change(function(){
      let type = $(this).val();
      if(type != '-'){ 
        if(type == 'text'){
          $("#type_value").html("<label>Valor</label><textarea class='form-control' name='value'></textarea>");
        }else{
          @if($Value->type == 'file')
          let file = '<a href="{{ asset(str_replace("public","storage",$Value->value)) }}" target="_blank" class="btn btn-info">View File</a>';
          @else
          let file = '';
          @endif
        
          $("#type_value").html("<label>Archivo</label><input type='file' name='file' class='form-control' /><br />"+file);
        }
      }else{
        $("#type_value").empty();
      }
    });
  });
</script>
@stop