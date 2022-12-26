@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide mb-4" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@php $slide = 0  @endphp
				@foreach ($section1s as $sliderItem)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$slide}}" class="@if(!$slide) active @endif"  aria-current="true" aria-label="Slide {{$slide}}"></button>
					@php $slide++  @endphp	
				@endforeach
			</div>
			<div class="carousel-inner">
				@php $count = 0  @endphp
				@foreach ($section1s as $slider)
					<div class="carousel-item @if(!$count) active @endif">
						<img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block text-start">
							<h5 class="text-uppercase">{{ $slider->content_1 }}</h5>
							<h2 class="fw-bold">{{ $slider->content_2 }}</h2>
						</div>
					</div>
					@php $count++  @endphp			
				@endforeach
			</div>
		</div>		
	@endif
@endisset

<section class="categoria-producto position-relative">
	<div class="container">
		<div class="d-flex justify-content-between flex-sm-wrap flex-md-nowrap mx-auto">
			@if ($card1)
				<a href="{{ route('cordon') }}" class="d-block fondo-azul-oscuro pt-3 pb-5 w-sm-100 w-md-48 px-4 mb-2 text-decoration-none">
					<div class="d-flex justify-content-start align-items-center">
						<img src="{{ asset($card1->image) }}" class="d-sm-none d-md-block img-fluid me-2 p-1 bg-white rounded-pill" style="max-width: 108px; min-width: 108px; min-height: 107px; max-height: 107px;object-fit: contain;">
						<h4 class="color-white text-uppercase">{{$card1->content_1}}</h4>
					</div>
					<p class="mb-3 color-white mt-4">{{$card1->content_2}}</p>
					<span  class="color-white text-uppercase fw-bold">Más información</span>
				</a>				
			@endif
			@if ($card2)
				<a href="{{ route('cinta') }}" class="text-decoration-none fondo-azul-claro pt-3 pb-5 px-3 w-sm-100 w-md-48 px-4 mb-sm-2 mb-2">
					<div class="d-flex justify-content-start align-items-center">
						<img src="{{ asset($card2->image) }}" class="d-sm-none d-md-block img-fluid me-2 bg-white rounded-pill" style="max-width: 108px; min-width: 108px; min-height: 107px; max-height: 107px;object-fit: contain;">
						<h4 class="color-white text-uppercase">{{$card2->content_1}}</h4>
					</div>
					<p class="mb-3 color-white mt-4">{{$card2->content_2}}</p> 
					<span  class="color-white text-uppercase  fw-bold">más información</span>
				</a>			
			@endif
		</div>
	</div>
</section>
@if ($section3)
<section id="hilos-libertad" class="mb-5">
	<div class="row align-items-center">
		<div class="col-sm-12 col-md-6">
			<img src="{{ asset($section3->image) }}" alt="" class="img-fluid w-100">
		</div>
		<div class="col-sm-12 col-md-5 ps-xs-0 ps-md-4 text-sm-center text-md-start mt-sm-3 mt-md-0">
			<p class="color-azul-claro font-weight-600 mb-1 text-uppercase">{{ $section3->content_1 }}</p>
			<h5 class="font-weight-600 mb-5">{{ $section3->content_2 }}</h5>
			<a href="{{ route('empresa') }}" class="btn btn-primary py-2 px-4 rounded-pill text-uppercase">más información</a>
		</div>
	</div>
</section>	
@endif
@if ($section4)
<section class="p-sm-0 p-md-5" style="background: url({{ asset($section4->image) }}), url({{ asset('images/Path_3314.svg') }}) center; background-blend-mode: multiply;">
	<div class="container">
		<div class="row p-sm-4 p-md-5">
			<div class="col-sm-12 offset-sm-0 col-md-6 offset-md-3 text-center color-white">
				<h5 class="text-uppercase font-size-24">{{ $section4->content_1 }}</h5>
				<h4 class="font-weight-600 mb-sm-3 mb-md-5">{{ $section4->content_2 }}</h4>
				<a href="{{ route('solicitar-prosupuesto') }}" class="text-uppercase btn fondo-azul-claro py-2 px-4 rounded-pill color-white fw-bold" style="font-size: 14px;">Solicitar presupuesto</a>
			</div>
		</div>
	</div>
</section>	
@endif
@endsection
@push('head')
	<style>
		.carousel-caption{
			max-width: 60% !important;
		}
		@media(min-width:992px){
			.carousel-caption h2{
				font-size: 42px;
			}
			#sliderHero, #sliderHero .carousel-inner, #sliderHero .carousel-inner .carousel-item, #sliderHero img{
				height: 500px;
			}
		}
		@media(max-width:992px){
			.carousel-caption h2{
				font-size: 22px;
			}
		}

	</style>
@endpush