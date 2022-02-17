@extends('adminlte::page')

@section('title', 'Editar Galeria')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-image"></i> Editar Galeria</h3>
          </div>
          <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Titulo:</label>
                <input type="text" name="title" value="{{ $slider->title }}" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Imagen:</label>
                <input type="file" name="image" class="form-control" />
                <br />
                <img style="width: 300px; height: 300px;" src="{{ asset(str_replace('public','storage',$slider->image)) }}" />
              </div>
              <div class="form-group">
                <label for="">Posicion:</label>
                <input type="text" name="position" value="{{ $slider->position }}" class="form-control" />
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