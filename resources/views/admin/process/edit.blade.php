@extends('adminlte::page')

@section('title', 'Editar Proceso')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-cog"></i> Editar Proceso</h3>
          </div>
          <form action="{{ route('process.update', $proces->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Titulo:</label>
                <input type="text" name="title" value="{{ $proces->id }}" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Icono:</label>
                <input type="file" name="icon" class="form-control" />
                <br />
                <img style="width: 150px; height: 150px;" src="{{ asset(str_replace('public','storage',$proces->icon)) }}" alt="">
              </div>
              <div class="form-group">
                <label for="">Contendio:</label>
                <textarea name="content" class="form-control">{{ $proces->content }}</textarea>
              </div>
              <div class="form-group">
                <label for="">Posicion:</label>
                <input type="text" name="position" value="{{ $proces->position }}" class="form-control" />
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