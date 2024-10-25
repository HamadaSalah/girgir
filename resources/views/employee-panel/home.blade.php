@extends('employee-panel.layouts.app')

@section('title', 'Home')

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
                      <div class="col-12 mb-2 d-flex">
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
                              Assigned Orders
                            </h6>
                            <p class="card-text" style="font-size: 1.5rem">
                                {{  auth()->user()->orders()->count() }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
@endsection
