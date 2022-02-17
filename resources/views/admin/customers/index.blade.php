@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-users"></i> Cientes</h3>
          </div>
          <div class="card-body">
            @include('admin.partials.new_button',['routeName'=>'customers.create'])
            <table class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Url</th>
                <th>Icono</th>
                <th>Posicion</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($customers as $customer)
                  <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->url }}</td>
                    <td><img src="{{ asset(str_replace('public','storage',$customer->icon)) }}" style="width: 150px; height: 150px;" alt=""></td>
                    <td>{{ $customer->position }}</td>
                    <td>
                      @include('admin.partials.actions_buttons',['routeEdit'=>'customers.edit', 'id'=>$customer->id, 'routeDelete'=>'customers.destroy'])
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