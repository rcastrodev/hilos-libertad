@extends('paginas.partials.app')
@section('content')
@if ($hero)
<div id="heroProducto" class="hero fondo-azul-oscuro p-sm-2 p-md-5 mb-3">
    <div class="container d-flex">
        <img src="{{ asset($hero->image) }}" class="d-sm-none d-md-block img-fluid me-sm-0 me-md-5 p-1 bg-white rounded-pill" style="max-width: 108px; min-width: 108px; min-height: 107px; max-height: 107px;object-fit: contain;">
        <div class="color-white">
            <h2>{{ $hero->content_1 }}</h2>
            <p>{{ $hero->content_2 }}</p>
        </div>
    </div>
</div>    
@endif
@isset($products)
    <section class="productos m-sm-0 m-md-5">
        <div class="container">
            <div class="row">
                @if (count($products))
                    @foreach ($products as $product)
                        <div class="col-sm-12 col-md-3 mb-sm-2 mb-md-5">
                            @includeIf('paginas.partials.producto', ['product' => $product])
                        </div>              
                    @endforeach                
                @else
                    <h2 class="col-sm-12 text-center">No tenemos productos en esta categoría</h2> 
                @endif

            </div>
        </div>
    </section>   
@endisset

@endsection
