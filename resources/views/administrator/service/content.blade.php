@extends('adminlte::page')
@section('title', 'Contenido servicios')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido servicios</h1>
    </div>
@stop
@section('content')
    <div class="row mb-5">
        <div class="col-sm-12">
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Contentido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $section2->content_1 }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('service.content.update-bag') }}" method="post" id="form{{$section2->id}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $section2->id }}">
                        <div class="form-group">
                            <input type="text" name="content_1" value="{{ $section2->content_1 }}" class="form-control" placeholder="Ingrese el título">
                        </div>
                        <div class="form-group">
                            <input type="text" name="content_2" value="{{ $section2->content_2 }}" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary ">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@includeIf('administrator.service.modals.create-slider')
@includeIf('administrator.service.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('service.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/service/index.js') }}"></script>
@stop

