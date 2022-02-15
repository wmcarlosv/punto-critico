@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-user"></i> Editar Usuario</h3>
          </div>
          <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Email:</label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" />
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