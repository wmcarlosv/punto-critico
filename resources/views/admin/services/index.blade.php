@extends('adminlte::page')

@section('title', 'Servicios')

@section('content')
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-flask"></i> Servicios</h3>
          </div>
          <div class="card-body">
            @include('admin.partials.new_button',['routeName'=>'services.create'])
            <table class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Icono</th>
                <th>Posicion</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($services as $service)
                  <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td><img style="width:150px; height: 150px;" src="{{ asset(str_replace('public','storage',$service->icon)) }}" alt=""></td>
                    <td>{{ $service->position }}</td>
                    <td>
                      @include('admin.partials.actions_buttons',['routeEdit'=>'services.edit', 'id'=>$service->id, 'routeDelete'=>'services.destroy'])
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@stop

@section('js')
  @include('admin.partials.message')
@stop