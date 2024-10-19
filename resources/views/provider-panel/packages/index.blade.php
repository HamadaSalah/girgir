@extends('provider-panel\layouts\app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', 'Pacakges')

@section('sidebar')
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('provider-panel.home') }}">Control Panel</a>
              </li>
            <li class="nav-item active">
              <a class="nav-link active" href="#">All Packages</a>
            </li>
            <li class="nav-item d-flex justify-content-between">
              <a class="nav-link" href="{{ route('provider-panel.packages.create') }}">
                Create Package
              </a>
            </li>
          </ul>
        </div>
      </nav>
@endsection

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    @foreach ($categories as $category)
        <div class="container mt-5">
            <div>
                <strong style="font-size: 20px;">
                    {{ $category->name }} ({{ $category->packages_count }} packages)
                    <button style="border: none;" type="button" data-bs-toggle="collapse" data-bs-target="#category-{{ $category->id }}" aria-expanded="false" aria-controls="category-{{ $category->id }}">
                        <img src="{{ asset('imgs/plus.png') }}" alt="" width="20px">
                    </button>
                </strong><br>
                <img src="{{ asset('imgs/line.png') }}" width="250px" alt="">
                <div id="category-{{ $category->id }}">
                <div class="row">
                    @foreach ($category->packages as $package)
                    <div class="col-md-6 mt-2">
                    <div class="card custom-card">
                        <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{ $package->cover }}" alt="{{ $package->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; border: 1px solid #ddd; padding: 10px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                            <h5 class="card-title">{{ $package->name }}
                                <img src="{{ asset('imgs/rating.png') }}" width="30px" style="margin-left: 90px;" alt="Rating">
                            </h5>
                            <small class="text-muted">Name Shop: {{ $package->provider->name }}</small>
                            <small class="details">
                                Details: {{ implode(', ', array_slice(explode(',', $package->description), 0, 4)) }}
                            </small>
                            <small class="price">From / {{ $package->cost }}$</small>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('provider-panel.packages.show', $package->id) }}" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 2px 10px; margin-right: 10px;">Discover Now</a>
                                <div class="d-flex flex-column justify-content-between align-items-center">
                                <a href="#" 
                                    onclick="event.preventDefault(); 
                                    if (confirm('Are you sure you want to delete this package?')) {
                                        document.getElementById('delete-package-{{ $package->id }}').submit();
                                    }">
                                    <img src="{{ asset('imgs/delete.png') }}" alt="Delete" style="width: 20px;">
                                 </a>
                                 <form id="delete-package-{{ $package->id }}" action="{{ route('provider-panel.packages.destroy', $package->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                 </form>
                                 
                                <a href="{{ route('provider-panel.packages.edit', $package->id) }}"><img src="{{ asset('imgs/edit.png') }}" alt="Edit" style="width: 20px"></a>
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
            </div>
        </div>
    @endforeach  
</main>
@endsection