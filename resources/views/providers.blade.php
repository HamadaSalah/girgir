@extends('layouts.app')
@section('title' , 'Home Page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endpush

@section('content')

<div class="container">
    <div class="row  center">
    @foreach($best_shops as $shop)
        <div class="col-lg-6  ">

            <div class="ProviderClass">
                <img src="{{ asset('imgs') }}/mdi_heart-outline.svg" alt="add to fav"
                    class="p-2 bg-dark bg-opacity-75 rounded-5 position-absolute add__tofav mt-3" />
    
                <img src="{{ asset($shop->files[0]?->path ?? '') }}" alt="wedding"
                    class="card-img-top img-fluid rounded-3" style="width: 50%;float: left;margin-right: 20px;"/>
    
                <div class="card-body rounded-5 px-4 py-2 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="card-title h6 fw-bold mb-0">{{ $shop->name }}</h3>
                        <span class="d-flex align-items-center bg_rating p-1 rounded-5"><img src="{{ asset('imgs') }}/Star_1.svg" alt="rating" class="me-1" />
                            <span class="rating__number text-white fs-12 fw-light">4.9</span>
                        </span>
                    </div>
                    <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                        Details :
                        <span class="text-secondary text-black-50">
                            {{ strlen($shop->description) > 100 ? substr($shop->description, 0, 100) . '...' : $shop->description }}
                        </span>
                    </p>
                    <p class="card-text text-black fs-14 ls-5 fm-cairo mb-2">
                        Provider Type :
                        <span class="text-secondary text-black-50"> Company </span>
                    </p>
                    <div class=" ">
                        <a href="{{ Route('provider.show',  $shop->id) }}" class="btn btn-primary fm-cairo py-1 px-2 rounded-2" style="wid">Discover now</a>
                    </div>
                </div>

            </div>
        </div>

    @endforeach
</div>

</div>

 
@endsection


@push('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="js/script.js"></script>
@endpush
