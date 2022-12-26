@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if (count($sliders))
		<div id="sliderHeroEmpresa" class="carousel slide mb-4" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@php $slide = 0  @endphp
				@foreach ($sliders as $sliderItem)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$slide}}" class="@if(!$slide) active @endif"  aria-current="true" aria-label="Slide {{$slide}}"></button>
					@php $slide++  @endphp	
				@endforeach
			</div>
			<div class="carousel-inner">
				@php $count = 0  @endphp
				@foreach ($sliders as $slider)
					<div class="carousel-item @if(!$count) active @endif">
						<img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block text-start">
							<h5 class="text-uppercase">{{ $slider->content_1 }}</h5>
							<h2 class="fw-bold" style="font-size: 42px;">{{ $slider->content_2 }}</h2>
						</div>
					</div>
					@php $count++  @endphp			
				@endforeach
			</div>
			@if ($ribbon)
				<div class="fondo-azul-claro p-2 d-none d-md-block" style="">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h5 class="color-white py-3 text-center mb-0 font-size-21">{{$ribbon->content_1}}</h5>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>		
	@endif
@endisset
@if ($company)
	<div class="pt-3 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 font-size-15">
					<div class="mb-3">{!! $company->content_1 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6">
					{!! $company->content_2 !!}
				</div>
			</div>
		</div>
	</div>	
@endif
@endsection