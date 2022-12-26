    @extends('paginas.partials.app')
    @section('content')
    <div class="contenedor-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase py-2 font-size-13">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}" class="color-azul-oscuro text-decoration-none font-weight-600">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        @if ($product->category->name == 'cordon')
                            <a href="{{ route('cordon') }}" class="color-azul-oscuro text-decoration-none font-weight-600">
                                {{ $product->category->name }}
                            </a>
                        @elseif($product->category->name == 'cinta')
                            <a href="{{ route('cinta') }}" class="color-azul-oscuro text-decoration-none font-weight-600">
                                {{ $product->category->name }}
                            </a>
                        @endif
                    </li>
                    <li class="breadcrumb-item active color-azul-claro" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <aside class="col-sm-12 col-md-3">
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($productsCategory as $productCategory)
                            <li class="py-2 ps-3 @if($product->name == $productCategory->name) active @endif"> 
                                <a href="{{ route('producto', ['product' => $productCategory->id]) }}" class="text-decoration-none">{{$productCategory->name}}</a>
                            </li>                        
                        @endforeach
                    </ul>
                </aside>
                <section class="producto col-sm-12 col-md-9 font-size-14">
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-5">
                            <div id="carruselProducto" class="carousel slide carousel-fade border border-light border-2" data-bs-ride="carousel" style="height: 200px;">
                                <div class="carousel-inner">
                                    @if (count($product->images))
                                        @foreach ($product->images as $k => $pi)
                                            <div class="carousel-item @if(!$k) {{'active'}} @endif">
                                                <img src="{{ asset($pi->image) }}" class="d-block w-100 img-fluid" style="object-fit: cover;
                                                min-width: 100%; max-width: 100%; max-height:200px; min-height:200px;" alt="{{$product->name}}">
                                            </div>                                    
                                        @endforeach
                                    @else 
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: cover;
                                        min-width: 100%; max-width: 100%; max-height:200px; min-height:200px;" alt="{{$product->name}}">
                                    </div>                                     
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carruselProducto" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carruselProducto" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="col-sm-12">
                                <h1 class="mb-3" style="font-size: 28px;">{{ $product->name }}</h1>
                                <div class="div mb-3">
                                    
                                    <strong>Caracter&iacute;sticas</strong>
                                    <p>{{ $product->characteristic }}</p>
                                </div>
                                <div class="div mb-3">
                                    <strong>Presentaci&oacute;n</strong>
                                    <p>{{ $product->presentation }}</p>
                                </div>
                                <div class="div mb-3">
                                    <strong>Aplicaci&oacute;n</strong>
                                    <p>{{ $product->application }}</p>
                                </div>
                                <div class="div mb-5">
                                    <strong class="d-block mb-3">Colores</strong>
                                    <ul class="d-flex flex-wrap p-0" style="list-style: none;">
                                        @foreach($product->colors as $colorProduct)
                                        <li class="me-2">
                                            <img src="{{ asset($colorProduct->exa) }}" alt="" style="max-width: 20px; max-height: 20px;
                                            min-height: 20px; min-width: 20px; border-radius: 100%;">
                                        </li>                                        
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="{{ route('contacto') }}" class="btn btn-primary fw-bold py-2 px-5 text-uppercase rounded-pill font-size-14">Consultar</a>
                            </div>
                        </div>
                    </div>
                    @if ($product->variableProducts()->count())
                        <div class="row mb-5">
                            <div class="col-sm-12 table-responsive">
                                <table class="table">
                                    <thead class="text-capitalize fondo-azul-oscuro color-white">
                                        <tr>
                                            <th scope="col" class="fw-light">c&oacute;digo</th>
                                            <th scope="col" class="fw-light">Carretel</th>
                                            <th scope="col" class="fw-light">Color</th>
                                            <th scope="col" class="fw-light">Servicios</th>
                                            <th scope="col" class="fw-light" width="120">cantidad</th>
                                            <th scope="col" class="fw-light"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->variableProducts as $vProduct)
                                            <tr>
                                                <td>{{$vProduct->code}} <br> {{ $product->name }}</td>
                                                <td>{{$vProduct->packaging}}</td>
                                                <td>
                                                    <select name="color" class="form-control">
                                                        @if ($product->colors()->count())
                                                            @foreach ($product->colors as $cp)
                                                                <option value="{{$cp->name}}">{{$cp->name}}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="Sin Color">Sin Color</option>
                                                        @endif
                                                    </select>      
                                                </td>
                                                <td>
                                                    <select name="service" class="form-control">
                                                        <option value="En carretel">En carretel</option>
                                                        <option value="Cortado">Cortado</option>
                                                        <option value="Punteado">Punteado</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" min="1" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <button class="btn btn-outline-primary fw-bold py-2 px-5 text-capitalize rounded-pill font-size-14 add-variable-product-to-qoute" 
                                                    data-id="{{$vProduct->id}}" 
                                                    data-productid="{{$product->id}}"
                                                    data-product="{{$product->name}}"
                                                    data-code="{{$vProduct->code}}"
                                                    data-measure="{{$vProduct->measure}}"
                                                    data-packaging="{{$vProduct->packaging}}">cotizar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>                  
                    @endif
                    <div class="row mb-5">
                        <div class="col-sm-12 mb-3">
                            <h5 class="text-uppercase">productos relacionados</h5>
                        </div>
                        @foreach ($productsCategory->random($randomProducts) as $pr)
                            <div class="col-sm-12 col-md-4">
                                @includeIf('paginas.partials.producto', ['product' => $pr])
                            </div>       
                        @endforeach
                    </div>                    
                </section>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
        <script src="{{ asset('js/pages/product.js') }}"></script>
    @endpush
