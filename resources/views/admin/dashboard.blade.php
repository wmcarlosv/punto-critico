@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Escritorio</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Usuarios</span>
                <span class="info-box-number">{{ $users->count() }}</span>
              </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fas fa-tags"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Valores</span>
                <span class="info-box-number">{{ $values->count() }}</span>
              </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="fas fa-images"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Galeria de Fotos</span>
                <span class="info-box-number">{{ $sliders->count() }}</span>
              </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fas fa-flask"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Expertos</span>
                <span class="info-box-number">{{ $experts->count() }}</span>
              </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fas fa-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Servicios</span>
                <span class="info-box-number">{{ $services->count() }}</span>
              </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Clientes</span>
                <span class="info-box-number">0</span>
              </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Procesos</span>
                <span class="info-box-number">0</span>
              </div>
            </div>
        </div>

    </div>
@stop

@section('js')
    @include('admin.partials.message')
@stop