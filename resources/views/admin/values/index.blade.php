@extends('adminlte::page')

@section('title', 'Valores')

@section('content')
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-tags"></i> Valores</h3>
          </div>
          <div class="card-body">
            @include('admin.partials.new_button',['routeName'=>'values.create'])
            <table class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Usuario</th>
                <th>LLave</th>
                <th>Etiqueta</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($values as $value)
                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->key }}</td>
                    <td>{{ $value->label }}</td>
                    <td>{{ $value->type }}</td>
                    <td>
                      @if($value->type == 'file')
                        <a href="{{ asset(str_replace('public','storage',$value->value)) }}" target="_blank" class="btn btn-info">View</a>
                      @else
                        {{ $value->value }}
                      @endif
                      </td>
                    <td>
                      @include('admin.partials.actions_buttons',['routeEdit'=>'values.edit', 'id'=>$value->id, 'routeDelete'=>'values.destroy'])
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