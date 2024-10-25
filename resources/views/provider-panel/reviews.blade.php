@extends('provider-panel\layouts\app')

@section('title', 'Reviews')
@section('content')

<main class="mt-5" id="pmain">
    <div class="container containerMission" style="font-family: 'Cairo', sans-serif;">
        <div class="mission">
            <h2 class="text-center font-weight-bold mb-4">Reviews</h2>

            <div class="row">
                @if ($reviews->isEmpty())
                    <div class="alert alert-primary text-center mt-4">
                        <strong>No reviews available at the moment.</strong>
                    </div>
                @else
                @foreach ($reviews as $review)
                <div class="col-md-6 mb-4">
                    <!-- Review card -->
                    <div class="card p-4 shadow-sm" style="border-radius: 10px; border: 1px solid #e0e0e0;">
                        <div class="d-flex align-items-center mb-3">
                            <!-- User's rounded profile image -->
                            <img src="{{ $review->user->profile_picture }}" alt="Profile" class="rounded-circle mr-3" style="width: 60px; height: 60px; object-fit: cover;">

                            <!-- User's name and stars -->
                            <div>
                                <span style="font-size: 18px; font-weight: 600; letter-spacing: -0.02em;margin-left: 4px">
                                    {{ $review->user->name }}
                                </span>
                                <div class="mt-2">
                                    <!-- Rating stars -->
                                    @php
                                        $rate = $review->rate;
                                        $fullStars = floor($rate); // Number of full stars
                                        $halfStar = ($rate - $fullStars) >= 0.5 ? 1 : 0; // Number of half stars
                                        $emptyStars = 5 - $fullStars - $halfStar; // Remaining empty stars
                                    @endphp

                                    <!-- Full stars -->
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <img style="width: 18px; height: 18px;" src="{{ asset('provider-panel/imgs/full-star.png') }}" alt="Full Star">
                                    @endfor

                                    <!-- Half star -->
                                    @if ($halfStar)
                                        <img style="width: 18px; height: 18px;" src="{{ asset('provider-panel/imgs/half-star.png') }}" alt="Half Star">
                                    @endif

                                    <!-- Empty stars -->
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <img style="width: 18px; height: 18px;" src="{{ asset('provider-panel/imgs/zero-star.png') }}" alt="Empty Star">
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Review location and comment -->
                        <p class="text-muted mb-2">{{ $review->order->location ?? 'Location not specified' }}</p>
                        <span class="reviewparagraph">{{ $review->comment }}</span>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $reviews->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</main>

@endsection
