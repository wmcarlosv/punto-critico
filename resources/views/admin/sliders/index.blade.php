@extends('adminlte::page')

@section('title', 'Galerias')

@section('content')
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3><i class="fas fa-images"></i> Galerias</h3>
          </div>
          <div class="card-body">
            @include('admin.partials.new_button',['routeName'=>'sliders.create'])
            <table class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Posicion</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach($sliders as $slider)
                  <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td><img style="width:150px; height: 150px;" src="{{ asset(str_replace('public','storage',$slider->image)) }}" alt=""></td>
                    <td>{{ $slider->position }}</td>
                    <td>
                      @include('admin.partials.actions_buttons',['routeEdit'=>'sliders.edit', 'id'=>$slider->id, 'routeDelete'=>'sliders.destroy'])
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