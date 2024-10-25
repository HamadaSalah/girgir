@extends('provider-panel.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('provider-panel/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('provider-panel/css/service.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', "Create New Service")

@section('content')
    <!-- Sidebar and Main Content -->
    <main class="mt-5" id="pmain">
        <h3 class="text-center">Create New Service</h3>

        <div class="d-flex justify-content-center align-items-center" id="description">
            <!-- Form Section -->
            <div id="form">
                <form action="{{ route('provider-panel.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex" style="justify-content: space-evenly;" id="dflex">
                            <div id="pcard">
                                <label for="fileInput" class="custom-file-input">
                                    <img src="{{ asset('imgs/plussign.png') }}" width="50px" alt="Add file">
                                </label>
                                <input type="file" id="fileInput" style="display: none;" name="file" accept="image/*" required>
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="ServiceName" class="form-note-label" style="color: #83044a;">Name of the Service</label>
                        <input type="text" class="form-control" id="ServiceName" name="name" value="{{ old('name') }}" required />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ServiceCost" class="form-note-label" style="color: #83044a;">Service Cost</label>
                        <input type="number" class="form-control" id="ServiceCost" name="cost" value="{{ old('cost') }}" required />
                        @error('cost')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="serviceDescription" class="form-note-label" style="color: #83044a;">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Create Service</button>
                        <a href="{{ route('provider-panel.services.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
