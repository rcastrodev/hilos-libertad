@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>Sliders</h3>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Pre título</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Sección 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Sección 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Sección 4</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <div class="row">   
                                @foreach ($section2->sort() as $card)
                                    <div class="col-sm-12 col-md-6">
                                        <form action="{{ route('home.content.generic-section.update') }}" method="post" id="form{{$card->id}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <input type="hidden" name="id" value="{{$card->id}}">
                                                <div class="form-group">
                                                    <input type="text" name="content_1" value="{{$card->content_1}}" class="form-control" placeholder="Ingrese el título">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="content_2" cols="30" rows="2" class="form-control">{{$card->content_2}}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <img src="{{ asset($card->image) }}" class="img-fluid" style="max-width: 100px; min-width: 100px;
                                                    max-height: 70px; min-height: 70px; object-fit: contain;">
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input" id="cardImagen{{$card->id}}">
                                                            <label class="custom-file-label custom-file-label-imagen" for="cardImagen{{$card->id}}">Imagen</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary ">Actualizar</button>
                                            </div>
                                        </form>
                                    </div> 
                                @endforeach   
                            </div>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <form action="{{ route('home.content.generic-section.update') }}" method="post" id="form{{$section3->id}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{ $section3->id }}">
                                    <div class="form-group">
                                        <input type="text" name="content_1" value="{{ $section3->content_1 }}" class="form-control" placeholder="Ingrese el título">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="content_2" cols="30" rows="2" class="form-control">{{ $section3->content_2 }}</textarea>
                                    </div>
                                    @if (Storage::disk('custom')->exists($section3->image))
                                        <div class="mb-3">
                                            <img src="{{ asset($section3->image) }}" class="img-fluid" style="max-width: 250px; max-height: 200px; object-fit: cover; min-width: 250px; min-height: 140px;">
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image{{ $section3->id }}">
                                                <label class="custom-file-label custom-file-label-imagen" for="image{{ $section3->id }}">Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary ">Actualizar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                            <form action="{{ route('home.content.generic-section.update') }}" method="post" id="form{{$section4->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{ $section4->id }}">
                                    <div class="form-group">
                                        <input type="text" name="content_1" value="{{ $section4->content_1 }}" class="form-control" placeholder="Ingrese el título">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="content_2" cols="30" rows="2" class="form-control">{{ $section4->content_2 }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <img src="{{ asset($section4->image) }}" class="img-fluid" style="max-width: 250px; max-height: 200px; object-fit: cover; min-width: 250px; min-height: 140px;">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image{{ $section4->id }}">
                                                <label class="custom-file-label custom-file-label-imagen" for="image{{ $section4->id }}">Imagen</label>
                                                <small>Se recomienda subir imágenes 1300x400</small>
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
@includeIf('administrator.home.modals.create-slider')
@includeIf('administrator.home.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

