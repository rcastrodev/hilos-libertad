@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <select name="category_id" class="form-control select2">
                @foreach ($categories as $category)
                    <option 
                        value="{{$category->id}}" 
                        @if($category->id == $product->category_id) selected @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="order_product" value="{{$product->order_product}}" class="form-control" placeholder="Orden ej AA AB AC">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Palabras claves</label>
            <input type="text" name="keywords" value="{{$product->keywords}}" class="form-control" placeholder="Palabras claves">
        </div>  
        <div class="form-group col-sm-12">
            <input type="text" name="characteristic" value="{{$product->characteristic}}" class="form-control" placeholder="Característica del producto">
        </div>
        <div class="form-group col-sm-12">
            <input type="text" name="presentation" value="{{$product->presentation}}"  class="form-control" placeholder="Presentación del producto">
        </div>
        <div class="form-group col-sm-12">
            <input type="text" name="application" value="{{$product->application}}" class="form-control" placeholder="Aplicación del producto">
        </div>
        @foreach ($product->images as $pi)
            <div class="form-group col-sm-12 col-md-4 ">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                    <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen</label>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach
        @if ($numberOfImagesAllowed)
            @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image">imagen</label>
                    <input type="file" name="images[]" class="form-control-file" id="">
                </div>           
            @endfor
        @endif   
        <div class="form-group col-sm-12">
            <label for="">Colores</label>
            <select name="colors[]" class="select2 form-control" multiple="multiple">
                @if ($colors->count())
                    <option value="-1">Todos</option>
                @endif
                @foreach ($colors as $color)
                    <option 
                    value="{{$color->id}}"
                    @if(in_array($color->id, $product->colors->pluck('id')->toArray(), true)) selected @endif
                    >{{$color->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>

@includeIf('administrator.product.variable-product.index')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/product/variable-product.js') }}"></script>
    {{-- <script src="{{ asset('js/admin/product/index.js') }}"></script>    --}}
@stop

