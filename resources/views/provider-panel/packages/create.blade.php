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

                    <!-- File Upload Section -->
                    <div class="d-flex" style="justify-content: space-evenly;" id="dflex">
                        @for ($i = 1; $i <= 3; $i++)
                            <div id="pcard" class="position-relative">
                                <label for="fileInput{{ $i }}" class="custom-file-input">
                                    <img src="{{ asset('imgs/plussign.png') }}" width="50px" alt="Add file" class="cursor-pointer">
                                </label>
                                <input type="file" id="fileInput{{ $i }}" style="display: none;" name="files[]" accept="image/*" required>
                                @error('files.' . ($i - 1))
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endfor
                    </div>

                    <!-- Package Details -->
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

                    <!-- Add Service Button and Inputs -->
                    <div class="mb-3">
                        <label class="form-note-label" style="color: #83044a;">Services in This Package</label>
                        <div id="services-section">
                            <img src="{{ asset('imgs/plussign.png') }}" width="50px" alt="Add Service" id="addServiceBtn" style="cursor: pointer;">
                        </div>
                    </div>

                    <!-- Dynamic Service Inputs -->
                    <div id="servicesContainer"></div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Create Package</button>
                        <a href="{{ route('provider-panel.packages.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        // Handle file input click for each package image
        document.querySelectorAll('.custom-file-input').forEach((label, index) => {
            const fileInput = document.getElementById(`fileInput${index + 1}`);

            label.addEventListener('click', function() {
                // Click the associated file input when the label is clicked
                fileInput.click();
            });

            // Handle file selection
            fileInput.addEventListener('change', function() {
                // Prevent reopening file dialog after selection
                if (fileInput.files.length > 0) {
                    const fileName = fileInput.files[0].name;
                    label.innerHTML = `<img src="${URL.createObjectURL(fileInput.files[0])}" width="50px" alt="Selected file">`;
                    label.title = fileName; // Optional: display file name
                }
            });
        });

        document.getElementById('addServiceBtn').addEventListener('click', function() {
            const servicesContainer = document.getElementById('servicesContainer');

            // Create a new row with 3 inline inputs
            const serviceRow = document.createElement('div');
            serviceRow.className = 'd-flex justify-content-between align-items-center mb-2';

            serviceRow.innerHTML = `
                <div class="flex-fill me-2">
                    <label class="form-note-label">Service Name</label>
                    <input type="text" class="form-control" name="service_name[]" placeholder="Service Name" required>
                </div>
                <div class="flex-fill me-2">
                    <label class="form-note-label">Service Cost</label>
                    <input type="number" class="form-control" name="service_cost[]" placeholder="Service Cost" required>
                </div>
                <div class="flex-fill">
                    <label class="form-note-label">Service Image</label>
                    <input type="file" class="form-control" name="service_image[]" accept="image/*" required>
                </div>
            `;

            servicesContainer.appendChild(serviceRow);
        });
    </script>
@endpush
