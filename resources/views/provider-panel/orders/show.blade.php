@extends('provider-panel\layouts\app')

@section('title', 'Orders')

@section('content')
<h3 class="mb-4 mt-2" style="margin-left:4%">Preview Order</h3>
      <p style="margin-left:4%">If the order is not accepted within 24 hours, it will be cancelled.</p>

      <div class="d-flex justify-content-between" style="width: 100%;" id="prev">
        <div style="width: 70%; margin-left: 4%;" id="leftprev">
            <div class="card card-custom align-items-center mt-3" style="background-color: #efe6eb; border:1px solid #83044a;">

                <div style="width: 100%;border-radius: 30px; ">
                  <div class="icon">
                    <i class="bi bi-file-earmark-text"></i>
                  </div>

                  <div style="width: 100%">
                    <div class="d-flex justify-content-between mb-1" style="width: 100%">
                      <div style="flex: 1;">
                        <small class="info-text">Site Commission:</small>
                        <strong class="info-strong">${{ $order->total * $website_info->withdraw_rate / 100 }}</strong>
                      </div>
                      <div class="vertical-divider"></div>
                      <div style="flex: 1;">
                        <small class="info-text">Order Date:</small>
                        <strong class="info-strong">{{ $order->created_at->format('d/m/Y') }}</strong>
                      </div>
                      <div class="vertical-divider"></div>
                      <div style="flex: 1;">
                        <small class="info-text">Execution Date:</small>
                        <strong class="info-strong">{{ $order->date_from->format('d/m/Y') }}</strong>
                      </div>
                    </div>

                    <div class="d-flex justify-content-between mb-1" style="width: 100%">
                      <div style="flex: 1;">
                        <small class="info-text">Total Amount:</small>
                        <strong class="info-strong">${{ $order->total }}</strong>
                      </div>
                      <div class="vertical-divider"></div>
                      <div style="flex: 1;">
                        <small class="info-text">Order Time:</small>
                        <strong class="info-strong">{{ $order->created_at->format('H:i') }}</strong>
                      </div>
                      <div class="vertical-divider"></div>
                      <div style="flex: 1;">
                        <small class="info-text">Execution Time:</small>
                        <strong class="info-strong">{{ $order->date_from->format('H:i') }}</strong>
                      </div>
                    </div>
                  </div>

                  <div class="status-dot
                    @if($order->status == 'received')
                        pending-status
                    @elseif($order->status == 'cancelled')
                        cancelled-status
                    @else
                        inprogress-status
                    @endif
                "></div>
                </div>

                <!-- Footer with buttons -->
                <div class="card-footer-custom mt-3" style="border-radius: 30px; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center;">
                        <button disabled>{{ $order->readable_status }}</button>
                        <div style="border-left: 1px solid #ccc; height: 40px; margin: 0 10px;"></div>
                        <button onclick="scrollToUpdateForm()">Edit Tracking</button>
                    </div>
                </div>
              </div>
              <div class="d-flex justify-content-center mt-5" style="width: 100%;">
                <div style="width: 40%;">
                    <strong style="font-size: 1rem;">Order Details:</strong><br>
                    @foreach ($order->items as $item)
                        <div>
                            <strong style="font-size: 0.8rem;">Package Name:</strong>
                            <strong style="font-size: 0.8rem; margin-left: 5px;">{{ $item->orderable->name }}</strong><br>
                            <strong style="font-size: 0.8rem;">Package No:</strong>
                            <strong style="font-size: 0.8rem; margin-left: 5px;">{{ $item->orderable->id }}</strong><br>
                            <strong style="font-size: 0.8rem;">Package Details:</strong><br>
                            <small style="font-size: 0.8rem">{{ $item->orderable->description }}</small><br>
                            <hr>
                        </div>
                    @endforeach
                </div>
                <div style="width: 1px; background-color: #ccc; margin: 0 15px;"></div>
                <div style="text-align: left;width: 40%;">
                    <strong style="font-size: 1rem;">User Details:</strong><br>
                    <div>
                        <strong style="font-size: 0.8rem;">Name :</strong>
                        <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->user->first_name }} {{ $order->user->last_name }}</small><br>
                        <strong style="font-size: 0.8rem;">Date :</strong>
                        <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->created_at->format('m-d-Y') }}</small><br>
                        <strong style="font-size: 0.8rem;">Invoice No :</strong>
                        <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->invoice_number }}</small><br>
                        <strong style="font-size: 0.8rem;">Date :</strong>
                        <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->created_at->format('m-d-Y') }}</small><br>
                    </div>
                </div>

            </div>


        </div>

          <div class="card card-custom align-items-center mt-3" style="width: 25%; padding: 15px;border:1px solid #83044a" id="rightprev">
            <img src="{{ asset('') }}imgs/gir.png" alt="" width="100px">

            <!-- Row for Name and Order Date -->
            <div style="flex: 1; display: flex; justify-content: space-between; width: 100%;margin-top: 5px">
                <div>
                    <small style="font-size: 0.8rem;">Name:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->user->first_name }} {{ $order->user->last_name }}</small>
                </div>
                <div>
                    <small style="font-size: 0.8rem;">Order Date:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->created_at->format('d-m-Y') }}</small>
                </div>
            </div>

            <!-- Row for Invoice number and Order Time -->
            <div style="flex: 1;  display: flex; justify-content: space-between;width: 100%">
                <div>
                    <small style="font-size: 0.8rem;">Invoice number:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->invoice_number }}</small>
                </div>
                <div>
                    <small style="font-size: 0.8rem;">Order Time:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->created_at->format('H:i') }}</small>
                </div>
            </div>

            <!-- Row for Phone number and Status -->
            <div style="flex: 1; display: flex; justify-content: space-between;width: 100%">
                <div>
                    <small style="font-size: 0.8rem;">Phone number:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->user->phone }}</small>
                </div>
                <div>
                    <small style="font-size: 0.8rem;">Status:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->status }}</small>
                </div>
            </div>
        <hr color="black" width="100%">
        <div class="d-flex justify-content-between" style="width: 100%;">
            <div>
                <div>
                    <small style="font-size: 0.8rem;">Execution Date:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->date_from->format('d-m-Y') }}</small>
                    <br>
                    <small style="font-size: 0.8rem;">Execution Time:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->date_from->format('H:i') }}</small><br>

                    @foreach ($order->items as $item)
                        <small style="font-size: 0.8rem;">Package Name:</small>
                        <small style="font-size: 0.8rem; margin-left: 5px;">{{ $item->orderable->name }}</small><br>
                        <small style="font-size: 0.8rem;">Package No:</small>
                        <small style="font-size: 0.8rem; margin-left: 5px;">{{ $item->orderable->id }}</small>
                        <br>
                        <strong style="font-size: 0.8rem;">Package Details:</strong><br>
                        <small style="font-size: 0.8rem">{{ $item->orderable->description }}</small><br>
                    @endforeach
                </div>
                <strong style="font-size: 0.8rem;">Order Location</strong><br>
                <small style="font-size: 0.8rem">{{ $order->location }}</small><br>
            </div>
            <div style="width: 1px; background-color: #ccc; margin: 0 15px;"></div>
            <div style="text-align: left;">
                <strong style="font-size: 0.8rem;">Order Location</strong><br>
                <small style="font-size: 0.8rem">{{ $order->location }}</small><br>
            </div>
        </div>

        <div class="d-flex justify-content-between" style="width: 100%;">
            <div>
                <strong style="font-size: 0.8rem;">Providers:</strong>
                <strong style="font-size: 0.8rem; margin-left: 5px;">{{ $order->provider->name }}</strong><br>
                <strong style="font-size: 0.8rem;">Total Amount:</strong>
                <strong style="font-size: 0.8rem; margin-left: 5px;">{{ number_format($order->total,2) }}$</strong><br>
            </div>
            <div style="flex-direction: column;display: flex;align-items: center;text-align: left;">
<img src="{{ asset('') }}imgs/print.png" alt="" width="70px">
<strong>Print</strong>
            </div>
        </div>
        </div>




    </div>
    @if($order->status == 'received')
    <div id="updateForm" class="flex items-center justify-evenly" style="width: 70%;">
        <div>
            <a href="{{ route('provider-panel.orders.response', ['order' => $order->id, 'response' => 'cancelled']) }}" class="btn btn-secondary btn-sm" style="font-size: 12px; padding: 5px 15px; margin-right: 10px; border:1px solid #83044a">Cancel Request</a>
        </div>
        <div>
            <a href="{{ route('provider-panel.orders.response', ['order' => $order->id, 'response' => 'approved']) }}" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 5px 15px; margin-right: 10px; border:1px solid #83044a">Approve Request</a>
        </div>
        <div>
            <a href="#" class="btn btn-secondary btn-sm" style="font-size: 12px; padding: 5px 15px; margin-right: 10px; border:1px solid #83044a">Chat to Applicant</a>
        </div>
    </div>
    @elseif($order->status == 'cancelled')
    <h3 class="text-center">The order has been cancelled.</h3>
    @else
    <div class="flex items-start justify-center" style="width: 100%; margin-right: 30%;">
        <section class="col-12 col-lg-12 track-order">
            <h3 class="track-title text-lg font-semibold text-xl mb-4">Track Order</h3>
            <div class="track-status flex flex-wrap justify-between">

                @php
                    // Define the statuses in order
                    $statuses = [
                        'requested' => ['title' => 'Received request', 'description' => 'Your request has been successfully received and is being reviewed.'],
                        'approved' => ['title' => 'Approved', 'description' => 'Your request has been approved.'],
                        'set_the_installation' => ['title' => 'Set the installation', 'description' => 'A worker has been assigned to install or deliver the decorations and ornaments to you.'],
                        'the_visit_has_been_scheduled' => ['title' => 'The visit has been scheduled', 'description' => 'The appointment is scheduled.'],
                        'worker_on_the_road' => ['title' => 'Worker on the road', 'description' => 'Technician on the way to your location.'],
                        'get_started' => ['title' => 'Get started', 'description' => 'The worker has started working on your order.'],
                        'work_completed' => ['title' => 'Work completed', 'description' => 'Your order has been completed, please rate the service and provide your feedback.'],
                    ];

                    // Get the current order status
                    $currentStatusIndex = array_search($order->status, array_keys($statuses));
                @endphp

                @foreach ($statuses as $key => $status)
                    <div class="step mb-4 flex items-start w-1/6 {{ $currentStatusIndex >= array_search($key, array_keys($statuses)) ? 'active' : '' }}">
                        <div class="icon mr-3">
                            <img src="{{ asset('provider-panel/imgs/k-track-order' . (array_search($key, array_keys($statuses)) + 1) . '.svg') }}" alt="track" loading="lazy" class="w-8 h-8">
                        </div>
                        <div class="content">
                            <h3 class="font-semibold text-lg">{{ $status['title'] }}</h3>
                            <p>{{ $status['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Form to move to the next step -->
            <form id="next-step-form" class="mt-4" method="POST" action="{{ route('provider-panel.orders.update' , $order) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary btn-sm" style="font-size: 12px; padding: 5px 15px; border: 1px solid #83044a;">Move to Next Step</button>
            </form>
        </section>
    </div>
@endif


    <script>
        function scrollToUpdateForm() {
            const updateForm = document.getElementById('updateForm');
            updateForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    </script>
@endsection
