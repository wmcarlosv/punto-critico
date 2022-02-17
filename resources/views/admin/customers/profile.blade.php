@extends('adminlte::page')

@section('title', 'Perfil')

@section('content')
    @include('admin.partials.validation_errors')
    <div class="row">
      <div class="col-md-12">
          <div class="card card-success">
           <div class="card-header">
             <h3><i class="fas fa-user-circle"></i> Perfil</h3>
           </div>
           <form method="POST" action="{{ route('change_profile') }}">
            @method('PUT')
            @csrf()
             <div class="card-body">
               <div class="form-group">
                 <label for="">Nombre:</label>
                 <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
               </div>
               <div class="form-group">
                 <label for="">Correo:</label>
                 <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
               </div>
             </div>
             <div class="card-footer text-right">
               <button class="btn btn-success"><i class="fas fa-sync"></i> Actualizar</button>
               <a href="{{ route('dashboard') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancelar</a>
             </div>
           </form>
         </div>
      </div>

      <div class="col-md-12">
          <div class="card card-success">
           <div class="card-header">
             <h3><i class="fas fa-key"></i> Cambiar Clave</h3>
           </div>
           <form method="POST" action="{{ route('change_password') }}">
            @method('PUT')
            @csrf()
             <div class="card-body">
               <div class="form-group">
                 <label for="">Clave:</label>
                 <input type="password" class="form-control" name="password">
               </div>
               <div class="form-group">
                 <label for="">Repita Clave:</label>
                 <input type="password" class="form-control" name="password_confirmation">
               </div>
             </div>
             <div class="card-footer text-right">
               <button class="btn btn-success"><i class="fas fa-sync"></i> Actualizar</button>
               <a href="{{ route('dashboard') }}" class="btn btn-danger"><i class="fas fa-times"></i> Cancelar</a>
             </div>
           </form>
         </div>
      </div>
    </div>
@stop