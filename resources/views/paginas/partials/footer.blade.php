<div class="pre-footer text-uppercase text-center fondo-azul-claro p-3">
    <span class="font-size-14 color-white">seguinos en</span>
    <a href="{{$data->facebook}}" class="py-1 px-2 color-white rounded-circle border border-2 border-white mx-2">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="{{$data->instagram}}" class="py-1 px-2 color-white rounded-circle border border-2 border-white">
        <i class="fab fa-instagram"></i>
    </a>
</div>
<footer class="py-sm-2 py-md-5 font-size-14 text-sm-center text-md-start">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-5">
                <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-5 mb-sm-4 mb-md-0">
                        <img src="{{ asset($data->logo_footer) }}" alt="" class="d-block mx-auto">
                    </div>
                    <div class="col-sm-12 col-md-7 d-sm-none d-md-block">    
                        <div class="row">
                            <div class="col-m-12">
                                <h6 class="text-uppercase color-azul-claro font-weight-600">secciones</h6>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none color-link-gris">home</a>
                                <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none color-link-gris">empresa</a>
                                <a href="{{ route('cordon') }}" class="d-block text-uppercase text-decoration-none color-link-gris">cord&oacute;n</a>
                                <a href="{{ route('cinta') }}" class="d-block text-uppercase text-decoration-none color-link-gris">cinta</a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <a href="{{ route('servicios') }}" class="d-block text-uppercase text-decoration-none color-link-gris">servicios</a>
                                <a href="{{ route('solicitar-prosupuesto') }}" class="d-block text-uppercase text-decoration-none color-link-gris">presupuesto</a>
                                <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none color-link-gris">contacto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 color-link-gris mb-sm-4 mb-md-0">
                <div class="row">
                    <div class="col-sm-12 newsletter">
                        <h6 class="text-uppercase color-azul-claro font-weight-600">SUSCRIBITE AL NEWSLETTER</h6>
                        <form action="{{ route('newsletter.store') }}" id="formNewsletter">
                            @csrf
                            <div class="">
                                <label class="visually-hidden" for="">Username</label>
                                <div class="input-group font-size-12">
                                    <input type="email" name="email" autocomplete="off" class="form-control font-size-12" placeholder="Ingresa tu email" style="border-radius: 15px 0 0 15px; background-color: #f9f9f9;">
                                    <button type="submit" id="" class="input-group-text fondo-azul-oscuro" style="border-radius: 0 15px 15px 0;"><i class="far fa-paper-plane color-white"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase color-azul-claro font-weight-600">contacto</h6>
                    <div class="d-flex">
                        <i class="fas fa-map-marker-alt color-azul-oscuro d-block me-2 mb-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-envelope color-azul-oscuro d-block me-2 mb-3"></i><span class="d-block"></span>
                        <a href="mailto:{{ $data->email }}" style="color: #212529; text-decoration: none;">{{ $data->email }}</a>             
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-phone-alt color-azul-oscuro d-block me-2 mb-3"></i>
                        <a href="tel:+54011{{ Str::replaceArray('-', ['', ''], $data->phone1) }}" style="color: #212529; text-decoration: none;">(011) {{ $data->phone1 }}</a>
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-phone-alt color-azul-oscuro d-block me-2 mb-3"></i>
                        <a href="tel:+54011{{ Str::replaceArray('-', ['', ''], $data->phone2) }}" style="color: #212529; text-decoration: none;">(011) {{ $data->phone2 }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="fondo-azul-oscuro color-white p-2 font-size-13">
    <div class="container">
        <div class="row">
            <div class="col">
                <span>© Copyright 2021 Hilos Libertad. Todos los derechos reservados</span>
            </div>
        </div>
    </div>
</div>