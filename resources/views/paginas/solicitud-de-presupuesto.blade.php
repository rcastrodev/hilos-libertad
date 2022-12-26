@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="color-azul-oscuro text-decoration-none font-weight-600">Home</a>
                </li>
                <li class="breadcrumb-item active color-azul-claro" aria-current="page">solicitud de presupuesto</li>
            </ol>
        </nav>
    </div>
</div>
<div class="my-5">
    <div class="container">
        <form id="formQuote" action="{{ route('send-quote') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <span class="d-block">{{$error}}</span>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>  
                @endif
                @if (Session::has('mensaje'))
                    <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('mensaje') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                @endif
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingresa el nombre *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Ingresa su correo electrónico *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3">
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Ingrese su teléfono *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3">
                    <div class="form-group">
                        <input type="text" name="company" placeholder="Empresa *" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 mb-sm-3 mb-md-3">
                    <div class="form-group">
                        <textarea name="message" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-5 position-relative">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-folder"></i></div>
                        </div>
                    </div>
                    <input type="file" name="file" class="form-control-file position-absolute" 
                    style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                </div>
                <div class="col-sm-12 table-responsive">
                    <table id="table"  class="table font-size-14 mb-4">
                        <thead class="text-capitalize fondo-azul-oscuro color-white">
                            <tr>
                                <th scope="col" class="fw-light">Código</th>
                                <th scope="col" class="fw-light">Producto</th>
                                <th scope="col" class="fw-light">Medida</th>
                                <th scope="col" class="fw-light">Carretel</th>
                                <th scope="col" class="fw-light">Color</th>
                                <th scope="col" class="fw-light">Servicios</th>
                                <th scope="col" class="fw-light text-center" width="120">Cantidad</th>
                                <th scope="col" class="fw-light"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-md-between justify-content-sm-center">
                <a href="{{ route('productos') }}" class="text-uppercase btn btn-outline-primary font-size-14 py-2 px-4 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ancho-boton"> <span>+</span> agregar más productos</a>
                <button type="submit" class="text-uppercase btn btn-primary font-size-14 py-2 px-4 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ancho-boton ">cotizar</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
    <script>
        let formQoute = document.getElementById('formQuote')
        function clearLocalStore(e){
            e.preventDefault()
            localStorage.removeItem('variableProducts')
            this.submit()   
        }
        formQoute.addEventListener('submit', clearLocalStore)
    </script>
@endpush