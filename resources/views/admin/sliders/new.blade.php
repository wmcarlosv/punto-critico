@extends('adminlte::page')

@section('title', 'Nueva Galeria')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-image"></i> Nueva Galeria</h3>
          </div>
          <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Titulo:</label>
                <input type="text" name="title" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Imagen:</label>
                <input type="file" name="image" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Posicion:</label>
                <input type="text" name="position" class="form-control" />
              </div>
            </div>
            <div class="card-footer text-right">
              @include('admin.partials.form_buttons',['routeCancel'=>'sliders.index'])
            </div>
          </form>
        </div>
      </div>
    </div>
@stop