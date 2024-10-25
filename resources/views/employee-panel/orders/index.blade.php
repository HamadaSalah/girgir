@extends('employee-panel.layouts.app')

@section('title', 'Assigned Orders')
@section('content')

<main class="mt-5" id="pmain">
    <div class="container containerMission" style="font-family: 'Cairo', sans-serif;">
        <div class="mission">
            <h2 class="text-center font-weight-bold mb-4">Reviews</h2>

            <div class="row">
                @if ($orders->isEmpty())
                    <div class="alert alert-primary text-center mt-4">
                        <strong>No reviews available at the moment.</strong>
                    </div>
                @else
                @foreach ($orders as $order)
                    <div class="col-md-6 mb-4">
                        <!-- Review card -->
                        <div class="card p-4 shadow-sm position-relative" style="border-radius: 10px; border: 1px solid #e0e0e0;">

                            <!-- Order Status Badge -->
                            <span class="badge position-absolute top-0 end-0 m-2 p-2 bg-primary" style="border-radius: 5px;">
                                {{ ucfirst($order->order->readable_status) }}
                            </span>

                            <!-- User's Info -->
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ $order->order->user->profile_picture }}" alt="Profile" class="rounded-circle mr-3" style="width: 60px; height: 60px; object-fit: cover;">

                                <!-- User's name and stars -->
                                <div>
                                    <span style="font-size: 18px; font-weight: 600; letter-spacing: -0.02em;margin-left: 4px">
                                        {{ $order->order->user->name }}
                                    </span>
                                    <div class="d-flex align-items-center mt-1">
                                        {{ $order->order->date_from->format('d M Y') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Review location and comment -->
                            <p class="text-muted mb-2">{{ $order->order->location ?? 'Location not specified' }}</p>
                            <span class="reviewparagraph">{{ $order->comment }}</span>
                        </div>
                    </div>
                @endforeach

                @endif
            </div>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</main>

@endsection
