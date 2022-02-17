@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-user"></i> Editar Cliente</h3>
          </div>
          <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf()
            <div class="card-body">
              <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="name" value="{{ $customer->name }}" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Url: </label>
                <textarea name="url" class="form-control">{{ $customer->url }}</textarea>
              </div>
              <div class="form-group">
                <label for="">Icono:</label>
                <input type="file" name="icon" class="form-control" />
                <br />
                <img style="width: 150px; height: 150px;" src="{{ asset(str_replace('public','storage',$customer->icon)) }}" alt="">
              </div>
              <div class="form-group">
                <label for="">Posicion:</label>
                <input type="text" name="position" value="{{ $customer->position }}" class="form-control" />
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