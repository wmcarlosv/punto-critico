@extends('adminlte::page')

@section('title', 'Expertos')

@section('content')
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-flask"></i> Expertos</h3>
          </div>
          <div class="card-body">
            @include('admin.partials.new_button',['routeName'=>'experts.create'])
            <table class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Icono</th>
                <th>Posicion</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($experts as $expert)
                  <tr>
                    <td>{{ $expert->id }}</td>
                    <td>{{ $expert->name }}</td>
                    <td><img style="width:150px; height: 150px;" src="{{ asset(str_replace('public','storage',$expert->icon)) }}" alt=""></td>
                    <td>{{ $expert->position }}</td>
                    <td>
                      @include('admin.partials.actions_buttons',['routeEdit'=>'experts.edit', 'id'=>$expert->id, 'routeDelete'=>'experts.destroy'])
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