@extends('provider-panel.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('provider-panel/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('provider-panel/css/service.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', "Edit {$service->name}")

@section('content')
    <!-- Sidebar and Main Content -->
    <main class="mt-5" id="pmain">
        <div class="d-flex" style="justify-content: space-evenly;" id="dflex">
            <div id="pcard">
                <img src="{{ $service->files->first()->path ?? asset('placeholder-image.png') }}" width="150px" alt="Service Image">
            </div>
        </div>

        <h3 class="text-center">{{ $service->name }}</h3>

        <div class="d-flex justify-content-start" id="description">
            <!-- Form Section -->
            <div style="width: 50%;" id="form">
                <form action="{{ route('provider-panel.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="serviceName" class="form-note-label" style="color: #83044a;">Name of the Service</label>
                        <input type="text" class="form-control" id="serviceName" name="name" value="{{ old('name', $service->name) }}" required />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="serviceCost" class="form-note-label" style="color: #83044a;">Service Cost</label>
                        <input type="number" class="form-control" id="serviceCost" name="cost" value="{{ old('cost', $service->cost) }}" required />
                        @error('cost')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="serviceDescription" class="form-note-label" style="color: #83044a;">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" name="description" rows="4" required>{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fileInput" class="form-note-label" style="color: #83044a;">Update Service Image</label>
                        <input type="file" id="fileInput" class="form-control" name="file" accept="image/*">
                        @error('file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

            <!-- Design Image Section -->
            <div style="margin-left: 4%;">
                <img src="{{ asset('provider-panel/imgs/deisgn.png') }}" width="300px" alt="Design Image">
            </div>
        </div>
    </main>
@endsection
