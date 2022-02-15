@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-user"></i> Nuevo Usuario</h3>
          </div>
          <form action="{{ route('users.store') }}" method="POST">
            @method('POST')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Email:</label>
                <input type="text" name="email" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Clave:</label>
                <input type="text" name="password" class="form-control" />
              </div>
            </div>
            <div class="card-footer text-right">
              @include('admin.partials.form_buttons',['routeCancel'=>'users.index'])
            </div>
          </form>
        </div>
      </div>
    </div>
@stop