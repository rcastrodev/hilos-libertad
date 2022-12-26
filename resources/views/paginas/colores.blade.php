@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="color-azul-oscuro text-decoration-none font-weight-600">inicio</a>
                </li>
                <li class="breadcrumb-item active color-azul-claro" aria-current="page">colores</li>
            </ol>
        </nav>
    </div>
</div>
<div class="my-5">
    @if ($colors->count())
        <div class="container">
            <div class="d-flex flex-wrap">
                @foreach ($colors as $color)
                    <div class="card me-sm-0 me-md-3 rcard">
                        <img src="{{asset($color->exa)}}" class="card-img-top contenedor b-0" style="border: none;">
                        <div class="card-body">
                            <p class="card-text nombre-color font-size-17">{{$color->reference}} - {{$color->name}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>      
    @else
        <h2 class="text-center">No tenemos colores cargados en estos momentos</h2>
    @endif
</div>
@endsection
