@extends('provider-panel\layouts\app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', 'Home')

@section('sidebar')
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#home">Control Panel</a>
            </li>
            <li class="nav-item d-flex justify-content-between">
              <a class="nav-link" href="./orders.html">
                Orders ({{ $overall_orders }})
                <img src="./imgs/order.png" width="20px" style="margin-left: 20px;" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('provider-panel.packages.index') }}">Packages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#vip">Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#providers">Invoices</a>
            </li>
          </ul>
        </div>
      </nav>
@endsection

@section('content')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-4 mt-2">
            <h2 class="text-center mb-3">Overview</h2>
            <div class="row justify-content-center">
              <!-- First Card -->
              <div class="col-md-8 mb-4">
                <div
                  class="card"
                  style="border-radius: 15px; background-color: #d1a3bc; color: white"
                >
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="row d-flex align-items-stretch">
                      <!-- Card 1: Orders This Month -->
                      <div class="col-4 mb-2 d-flex">
                        <div
                          class="card flex-grow-1"
                          style="
                            border-radius: 10px;
                            background-color: #f4d1e3;
                            text-align: center;
                          "
                        >
                          <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="card-subtitle mb-2 text-muted">
                              Orders This Month
                            </h6>
                            <p class="card-text" style="font-size: 1.5rem">
                              {{ $ordersThisMonth }}
                            </p>
                          </div>
                        </div>
                      </div>
                      <!-- Card 2: Profit This Month -->
                      <div class="col-4 mb-2 d-flex">
                        <div
                          class="card flex-grow-1"
                          style="
                            border-radius: 10px;
                            background-color: #f4d1e3;
                            text-align: center;
                          "
                        >
                          <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="card-subtitle mb-2 text-muted">
                              Profit This Month
                            </h6>
                            <p class="card-text" style="font-size: 1.5rem">
                              {{ $profitThisMonth }}
                            </p>
                          </div>
                        </div>
                      </div>
                      <!-- Card 3: In Progress -->
                      <div class="col-4 mb-2 d-flex">
                        <div
                          class="card flex-grow-1"
                          style="
                            border-radius: 10px;
                            background-color: #f4d1e3;
                            text-align: center;
                          "
                        >
                          <div class="card-body d-flex flex-column justify-content-center">
                            <h6 class="card-subtitle mb-2 text-muted">In Progress</h6>
                            <p class="card-text" style="font-size: 1.5rem">
                              {{ $inProgressOrders }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Second Card -->
              <div class="col-md-8 mb-4">
                <div class="card" style="border-radius: 15px; width: 100%">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-title">Orders</h5>
                      <form method="GET" action="{{ request()->url() }}" class="">
                        <select
                          name="month"
                          class="form-select border border-purple-500 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                          aria-label="Month Selection"
                          onchange="this.form.submit()"
                        >
                          <option value="">Select Month</option>
                          @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" @if($i == request('month')) selected @endif>
                              {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                            </option>
                          @endfor
                        </select>
                      </form>
                    </div>
                    <div>
                      <!-- Orders Table -->
                      @if($orders->isEmpty())
                        <p class="text-center p-4 mt-3" style="border-radius: 15px; background-color: #d1a3bc">No orders available for this month.</p>
                      @else
                      @foreach($orders as $order)
                      <div class="card-body">
                          <h6 class="card-subtitle mb-2 text-muted">Order #{{ $order->id }}</h6>
                          <div class="d-flex flex-column flex-md-row justify-content-between">
                              <div style="width:100%" class="mb-3">
                                  <div class="d-flex justify-content-between mb-1 flex-wrap">
                                      <div class="flex-fill mb-2">
                                          <small style="font-size: 0.8rem;">Site Commission:</small>
                                          <strong style="font-size: 0.9rem;">${{ $order->total * $website_info->withdraw_rate / 100 }}</strong>
                                      </div>
                                      <div class="flex-fill mb-2">
                                          <small style="font-size: 0.8rem;">Order Date:</small>
                                          <strong style="font-size: 0.9rem;">{{ $order->created_at->format('d/m/Y') }}</strong>
                                      </div>
                                      <div class="flex-fill mb-2">
                                          <small style="font-size: 0.8rem;">Last Execution Date:</small>
                                          <strong style="font-size: 0.9rem;">{{ $order->updated_at->format('d/m/Y') }}</strong>
                                      </div>
                                  </div>
                  
                                  <div class="d-flex justify-content-between mb-1 flex-wrap">
                                      <div class="flex-fill mb-2">
                                          <small style="font-size: 0.8rem;">Total Amount:</small>
                                          <strong style="font-size: 0.9rem;">${{ number_format($order->total, 2) }}</strong>
                                      </div>
                                      <div class="flex-fill mb-2">
                                          <small style="font-size: 0.8rem;">Order Time:</small>
                                          <strong style="font-size: 0.9rem;">{{ $order->created_at->format('H:i') }}</strong>
                                      </div>
                                      <div class="flex-fill mb-2">
                                          <small style="font-size: 0.8rem;">Last Execution Time:</small>
                                          <strong style="font-size: 0.9rem;">{{ $order->updated_at->format('H:i') }}</strong>
                                      </div>
                                  </div>
                              </div>
                  
                              <div class="d-flex justify-content-center align-items-center">
                                  <a href="" class="btn btn-primary btn-sm mt-md-0" style="padding: 2px 10px;">Review</a>
                              </div>
                          </div>
                      </div>
                  @endforeach                  
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
@endsection