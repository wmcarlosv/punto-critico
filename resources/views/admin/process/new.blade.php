@extends('adminlte::page')

@section('title', 'Nuevo Proceso')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-cog"></i> Nuevo Proceso</h3>
          </div>
          <form action="{{ route('process.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Titulo:</label>
                <input type="text" name="title" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Icono:</label>
                <input type="file" name="icon" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Contendio:</label>
                <textarea name="content" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="">Posicion:</label>
                <input type="text" name="position" class="form-control" />
              </div>
            </div>
            <div class="card-footer text-right">
              @include('admin.partials.form_buttons',['routeCancel'=>'process.index'])
            </div>
          </form>
        </div>
      </div>
    </div>
@stop