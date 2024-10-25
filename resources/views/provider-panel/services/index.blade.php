@extends('provider-panel.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', 'Services')

@section('sidebar')
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('provider-panel.home') }}">Control Panel</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="#">All Services</a>
                </li>
                <li class="nav-item d-flex justify-content-between">
                    <a class="nav-link" href="{{ route('provider-panel.services.create') }}">
                        Create Service
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container mt-5">
        <div class="row mt-4">
            @foreach ($services as $service)
                <div class="col-md-6 mt-2">
                    <div class="card custom-card">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ $service->cover }}" alt="{{ $service->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; border: 1px solid #ddd; padding: 10px;">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $service->name }}
                                        <img src="{{ asset('imgs/rating.png') }}" width="30px" style="margin-left: 90px;" alt="Rating">
                                    </h5>
                                    <small class="text-muted">Provider: {{ $service->provider->name }}</small>
                                    <small class="details">
                                        Details: {{ implode(', ', array_slice(explode(',', $service->description), 0, 4)) }}
                                    </small>
                                    <small class="price">From / {{ $service->cost }}$</small>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('provider-panel.services.show', $service->id) }}" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 2px 10px; margin-right: 10px;">Discover Now</a>
                                        <div class="d-flex flex-column justify-content-between align-items-center">
                                            <a href="#"
                                                onclick="event.preventDefault();
                                                if (confirm('Are you sure you want to delete this service?')) {
                                                    document.getElementById('delete-service-{{ $service->id }}').submit();
                                                }">
                                                <img src="{{ asset('imgs/delete.png') }}" alt="Delete" style="width: 20px;">
                                            </a>
                                            <form id="delete-service-{{ $service->id }}" action="{{ route('provider-panel.services.destroy', $service->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <a href="{{ route('provider-panel.services.edit', $service->id) }}"><img src="{{ asset('imgs/edit.png') }}" alt="Edit" style="width: 20px"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
