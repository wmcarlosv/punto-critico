@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-user"></i> Nuevo Cliente</h3>
          </div>
          <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Url: </label>
                <textarea name="url" class="form-control"></textarea>
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
              @include('admin.partials.form_buttons',['routeCancel'=>'customers.index'])
            </div>
          </form>
        </div>
      </div>
    </div>
@stop