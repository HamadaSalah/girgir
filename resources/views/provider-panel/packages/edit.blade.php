@extends('provider-panel\layouts\app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', "Edit {$package->name}")

@section('content')
    <!-- Sidebar and Main Content -->
    <main class="mt-5" id="pmain">
        <div class="d-flex" style="justify-content: space-evenly;" id="dflex">
            <div id="pcard">
                <img src="{{ $package->cover }}" width="150px" alt="Package Cover">
            </div>
        </div>

        <h3 class="text-center">{{ $package->name }}</h3>

        <div class="d-flex justify-content-start" id="description">
            <!-- Form Section -->
            <div style="width: 50%;" id="form">
        
                <form action="{{ route('provider-panel.packages.update', $package->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="packageName" class="form-note-label" style="color: #83044a;">Name of the Package</label>
                        <input type="text" class="form-control" id="packageName" name="name" value="{{ old('name', $package->name) }}" required />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="packageCost" class="form-note-label" style="color: #83044a;">Package Cost</label>
                        <input type="number" class="form-control" id="packageCost" name="cost" value="{{ old('cost', $package->cost) }}" required />
                        @error('cost')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-note-label" style="color: #83044a;">Select Category</label>
                        <select class="form-control" id="category" name="category_id" required>
                            <option value="">Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id', $package->category_id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="serviceDescription" class="form-note-label" style="color: #83044a;">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" name="description" rows="4" required>{{ old('description', $package->description) }}</textarea>
                        @error('description')
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
                <img src="{{ asset('') }}imgs/deisgn.png" width="300px" alt="Design Image">
            </div>
        </div>
    </main>
@endsection
