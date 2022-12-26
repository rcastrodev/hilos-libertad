@extends('adminlte::page')
@section('title', 'Contenido categorías')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de Categoría de productos</h1>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Cordón</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Cinta</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{ route('category.content.update') }}" method="post" id="form{{$cordon->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{$cordon->id}}">
                                    <div class="form-group">
                                        <input type="text" name="content_1" value="{{$cordon->content_1}}" class="form-control" placeholder="Ingrese el título" readonly>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="content_2" cols="30" rows="2" class="form-control">{{$cordon->content_2}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ asset($cordon->image) }}" class="img-fluid" style="max-width: 100px; min-width: 100px;
                                        max-height: 70px; min-height: 70px; object-fit: contain;">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="imagen{{$cordon->id}}">
                                                <label class="custom-file-label custom-file-label-imagen" for="imagen{{$cordon->id}}">Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary ">Actualizar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <form action="{{ route('home.content.generic-section.update') }}" method="post" id="form{{$cinta->id}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{ $cinta->id }}">
                                    <div class="form-group">
                                        <input type="text" name="content_1" value="{{ $cinta->content_1 }}" class="form-control" placeholder="Ingrese el título" readonly>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="content_2" cols="30" rows="2" class="form-control">{{ $cinta->content_2 }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ asset($cinta->image) }}" class="img-fluid" style="max-width: 100px; min-width: 100px;
                                        max-height: 70px; min-height: 70px; object-fit: contain;">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image{{ $cinta->id }}">
                                                <label class="custom-file-label custom-file-label-imagen" for="image{{ $cinta->id }}">Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary ">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/category/index.js') }}"></script>
@stop

