@extends('provider-panel\layouts\app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', 'Employees')

@section('content')
<main class="col-md-12 ms-sm-auto col-lg-12 underline mt-3">
    <div class="container">
      <h1 class="text-center">Employees</h1>

      <!-- Create Button -->
      <div class="text-center my-4">
        <a href="{{ route('provider-panel.employees.create') }}" class="btn btn-primary">Create Employee</a>
      </div>

      @if($employees->isEmpty())
        <div class="alert alert-primary text-center mt-4">
          <strong>You Don't have Employees yet</strong>
        </div>
      @else
        <div class="row">
          @foreach ($employees as $employee)
          <div class="col-md-4 mb-4">
              <div class="card p-4 shadow-sm" style="border-radius: 10px; border: 1px solid #e0e0e0;">
                  <div class="d-flex align-items-center mb-3">
                      <!-- User's rounded profile image -->
                      <img src="{{ $employee->avatar }}" alt="Profile" class="rounded-circle mr-3" style="width: 60px; height: 60px; object-fit: cover;">

                      <!-- User's name and stars -->
                      <div>
                          <span style="font-size: 18px; font-weight: 600; letter-spacing: -0.02em;margin-left: 4px">
                              {{ $employee->name }}
                          </span>
                      </div>
                  </div>

                  <!-- Employee details -->
                  <p class="text-muted mb-2">ID: {{ $employee->manager_id }}</p>
                  <p class="text-muted mb-2">Phone: {{ $employee->phone }}</p>

                  <!-- Edit and Delete Buttons -->
                  <div class="d-flex justify-content-between">
                      <a href="{{ route('provider-panel.employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('provider-panel.employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                  </div>
              </div>
          </div>
          @endforeach
        </div>
      @endif

    </div>
</main>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this employee?');
    }
</script>
@endsection
