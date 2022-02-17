@extends('adminlte::page')

@section('title', 'Procesos')

@section('content')
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-cog"></i> Procesos</h3>
          </div>
          <div class="card-body">
            @include('admin.partials.new_button',['routeName'=>'process.create'])
            <table class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Icono</th>
                <th>Posicion</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($process as $proces)
                  <tr>
                    <td>{{ $proces->id }}</td>
                    <td>{{ $proces->title }}</td>
                    <td><img src="{{ asset(str_replace('public','storage',$proces->icon)) }}" style="width: 150px; height: 150px;" alt=""></td>
                    <td>{{ $proces->position }}</td>
                    <td>
                      @include('admin.partials.actions_buttons',['routeEdit'=>'process.edit', 'id'=>$proces->id, 'routeDelete'=>'process.destroy'])
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