<header class="header fondo-azul-oscuro py-2 d-sm-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-7 col-xxl-6 d-flex justify-content-between flex-wrap">
                        <span class="mb-xs-2 mb-md-0">
                            <i class="fas fa-map-marker-alt"></i> {{ $data->address }}
                        </span>
                        <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0">
                            <i class="fas fa-envelope"></i> {{ $data->email }}
                        </a>
                        <span class="mb-xs-2 mb-md-0"><i class="fas fa-phone-alt"></i> (011)
                            <a href="tel:+54011{{ Str::replaceArray('-', ['', ''], $data->phone1) }}" style="color: #ffffffeb;
                                text-decoration: none;">{{ $data->phone1 }}</a>
                            <span class="mx-1">|</span> 
                            <a href="tel:+54011{{ Str::replaceArray('-', ['', ''], $data->phone2) }}" style="color: #ffffffeb;
                                text-decoration: none;">{{ $data->phone2 }}</a></span>
                    </div>
                    <div class="col-sm-12 col-md-5 d-flex justify-content-end">
                        <a href="{{$data->facebook}}" class="px-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$data->instagram}}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link @if(Request::is('/')) active @endif" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                
                <li class="nav-item @if(Request::is('cordon') || Request::is('cordon/*')) position-relative @endif">
                    <a class="nav-link @if(Request::is('cordon') || Request::is('cordon/*')) active @endif" href="{{ route('cordon') }}">Cordón</a>
                </li>
                <li class="nav-item @if(Request::is('cinta') || Request::is('cinta/*')) position-relative @endif">
                    <a class="nav-link @if(Request::is('cinta') || Request::is('cinta/*')) active @endif" href="{{ route('cinta') }}">Cinta</a>
                </li>
                <li class="nav-item @if(Request::is('servicios')) position-relative @endif">
                    <a class="nav-link @if(Request::is('servicios')) active @endif" href="{{ route('servicios') }}" >Servicios</a>
                </li>
                <li class="nav-item @if(Request::is('colores')) position-relative @endif">
                    <a class="nav-link @if(Request::is('colores')) active @endif" href="{{ route('colores') }}">Colores</a>
                </li>
                <li class="nav-item @if(Request::is('solicitar-prosupuesto')) position-relative @endif">
                    <a class="nav-link @if(Request::is('solicitar-prosupuesto')) active @endif" href="{{ route('solicitar-prosupuesto') }}" >Solicitud de presupuesto</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('productos') }}"><i class="fas fa-search"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
