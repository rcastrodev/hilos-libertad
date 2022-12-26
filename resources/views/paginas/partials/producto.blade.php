<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('producto', ['product'=> $product->id ]) }}" class="mas position-absolute">
            <img src="{{ asset('images/plus.svg') }}" class="img-fluid">
        </a>
        @if (count($product->images))
            <img src="{{ asset($product->images()->first()->image) }}" class="img-fluid" style="min-height: 167px; object-fit: cover;">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid" style="min-height: 167px; object-fit: cover;">
        @endif
    </div>
    <div class="card-body">
        <p class="card-text mb-0"><a href="{{ route('producto', ['product'=> $product->id ]) }}">{{$product->name}}</a></p>
        <a href="{{ route('producto', ['product'=> $product->id ]) }}" class="font-size-14 text-decoration-none" style="color:#0090df;">
            {{Str::limit($product->characteristic, 80)}}</a>
    </div>
</div>