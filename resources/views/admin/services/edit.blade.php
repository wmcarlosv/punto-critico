@extends('adminlte::page')

@section('title', 'Editar Servicio')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-list"></i> Editar Servicio</h3>
          </div>
          <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Titulo:</label>
                <input type="text" name="title" value="{{ $service->title }}" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Icono:</label>
                <input type="file" name="icon" class="form-control" />
                <br />
                <img style="width: 150px; height: 150px;" src="{{ asset(str_replace('public','storage',$service->icon)) }}" alt="">
              </div>
              <div class="form-group">
                <label for="">Contenido:</label>
                <textarea name="content" class="form-control">{{ $service->content }}</textarea>
              </div>
              <div class="form-group">
                <label for="">Posicion:</label>
                <input type="text" name="position" value="{{ $service->position }}" class="form-control" />
              </div>

              <div class="form-group">
                <label for="">Imagen de Fondo:</label>
                <input type="file" name="background_image" class="form-control" />
                <br />
                <img style="width: 150px; height: 150px;" src="{{ asset(str_replace('public','storage',$service->background_image)) }}" alt="">
              </div>
            <div class="card-footer text-right">
              @include('admin.partials.form_buttons',['routeCancel'=>'services.index'])
            </div>
          </form>
        </div>
      </div>
    </div>
@stop