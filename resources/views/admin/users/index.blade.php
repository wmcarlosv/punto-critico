@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-users"></i> Usuarios</h3>
          </div>
          <div class="card-body">
            @include('admin.partials.new_button',['routeName'=>'users.create'])
            <table class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @include('admin.partials.actions_buttons',['routeEdit'=>'users.edit', 'id'=>$user->id, 'routeDelete'=>'users.destroy'])
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