@extends('layouts.app')
@section('title' , 'Home Page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endpush

@section('content')

<div class="container" style="padding: 50px 100px">
    <div class="row">
        <h1>All Orders</h1>
        
        <table class="table" style="border: 1px solid #ccc;
    border-radius: 15px;
    box-shadow: 0 0 5px #ccc;
    padding: 10px;
    text-align: center;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Order Number</th>
                <th scope="col">Cost</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $order->invoice_number  }}</td>
                    <td>{{ $order->total  }} $</td>
                    <td>{{ $order->status  }}</td>
                    <td><a href="{{ Route('orderDetails', $order->invoice_number) }}"><button class="btn btn-primary">Show Details</button></a></td>
                    </tr>            
                @endforeach
            </tbody>
          </table>
    </div>
</div>

@endsection


@push('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="js/script.js"></script>
@endpush
