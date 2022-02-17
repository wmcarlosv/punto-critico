@extends('adminlte::page')

@section('title', 'Nuevo Experto')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-flask"></i> Nuevo Experto</h3>
          </div>
          <form action="{{ route('experts.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Icono:</label>
                <input type="file" name="icon" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Posicion:</label>
                <input type="text" name="position" class="form-control" />
              </div>
            </div>
            <div class="card-footer text-right">
              @include('admin.partials.form_buttons',['routeCancel'=>'experts.index'])
            </div>
          </form>
        </div>
      </div>
    </div>
@stop