@extends('provider-panel.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('provider-panel/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('provider-panel/css/service.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', "Create New Package")

@section('content')
    <!-- Sidebar and Main Content -->
    <main class="mt-5" id="pmain">
        <h3 class="text-center">Create New Package</h3>

        <div class="d-flex justify-content-center align-items-center" id="description">
            <!-- Form Section -->
            <div id="form">

                <form action="{{ route('provider-panel.packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="d-flex" style="justify-content: space-evenly;" id="dflex">
                        <div id="pcard">
                            <label for="fileInput2" class="custom-file-input">
                              <img src="{{asset('imgs/plussign.png')}}" width="50px" alt="Add file">
                            </label>
                            <input type="file" id="fileInput2" style="display: none;"  name="files[]" accept="image/*" required >
                            @error('files.0')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="pcard">
                            <label for="fileInput2" class="custom-file-input">
                              <img src="{{asset('imgs/plussign.png')}}" width="50px" alt="Add file">
                            </label>
                            <input type="file" id="fileInput2" style="display: none;"  name="files[]" accept="image/*" required >
                            @error('files.0')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="pcard">
                            <label for="fileInput2" class="custom-file-input">
                              <img src="{{asset('imgs/plussign.png')}}" width="50px" alt="Add file">
                            </label>
                            <input type="file" id="fileInput2" style="display: none;"  name="files[]" accept="image/*" required >
                            @error('files.0')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="packageName" class="form-note-label" style="color: #83044a;">Name of the Package</label>
                        <input type="text" class="form-control" id="packageName" name="name" value="{{ old('name') }}" required />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="packageCost" class="form-note-label" style="color: #83044a;">Package Cost</label>
                        <input type="number" class="form-control" id="packageCost" name="cost" value="{{ old('cost') }}" required />
                        @error('cost')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-note-label" style="color: #83044a;">Select Category</label>
                        <select class="form-control" id="category" name="category_id" required>
                            <option value="">Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="serviceDescription" class="form-note-label" style="color: #83044a;">Package Description</label>
                        <textarea class="form-control" id="serviceDescription" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="services" class="form-note-label" style="color: #83044a;">Service In this package</label>
                        <textarea class="form-control" id="services" name="services" rows="2" placeholder="Example: DJ,Free Drinks" required>{{ old('services') }}</textarea>
                        @error('services')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Create Package</button>
                        <a href="{{ route('provider-panel.packages.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
