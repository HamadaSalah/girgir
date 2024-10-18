@extends('provider-panel\layouts\app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

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

                  <!-- Red status dot -->
                  <div class="status-dot"></div>
                </div>

                <!-- Footer with buttons -->
                <div class="card-footer-custom mt-3" style="border-radius: 30px;">
                  <button disabled >inProgress</button>
                  <div style="border-left: 1px solid #ccc; height: 40px; margin: 0 10px;"></div>
                  <button>Edit Tracking</button>
                </div>
              </div>
              <div class="d-flex justify-content-center mt-5" style="width: 100%;">
                <div style="width: 40%;">
                    <strong style="font-size: 1rem;">Order Details:</strong><br>
                    <div>
                        <strong style="font-size: 0.8rem;">Package Name:</strong>
                        <strong style="font-size: 0.8rem; margin-left: 5px;">{{ $order->orderable->name }}</strong><br>
                        <strong style="font-size: 0.8rem;">Package No:</strong>
                        <strong style="font-size: 0.8rem; margin-left: 5px;">{{ $order->orderable->id }}</strong>
                    </div>
                    <strong style="font-size: 0.8rem;">Package Details:</strong><br>
                    <small style="font-size: 0.8rem">{{ $order->orderable->description }}</small><br>
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
                    <small style="font-size: 0.8rem;">Executoion Time:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->date_from->format('H:i') }}</small><br>
                    <small style="font-size: 0.8rem;">Package Name:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->orderable->name }}</small><br>
                    <small style="font-size: 0.8rem;">Package No:</small>
                    <small style="font-size: 0.8rem; margin-left: 5px;">{{ $order->orderable->id }}</small>
                </div>
                <strong style="font-size: 0.8rem;">Package Details:</strong><br>
                <small style="font-size: 0.8rem">{{ $order->orderable->description }}</small><br>
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
    <div class="mt-5" style="width: 70%;display: flex;align-items: center; justify-content: space-evenly;" id="btns">
      <div>  <a href="#" class="btn btn-secondary btn-sm" style="font-size: 12px; padding: 5px 15px; margin-right: 10px;border:1px solid #83044a">Cancel Request</a></div>
      <div>  <a href="#" class="btn btn-primary btn-sm" style="font-size: 12px; padding:5px 15px; margin-right: 10px;border:1px solid #83044a">Approve Request</a></div>
      <div>  <a href="#" class="btn btn-secondary btn-sm" style="font-size: 12px; padding: 5px 15px; margin-right: 10px;border:1px solid #83044a">Chat to Applicant</a></div>
    </div>
@endsection
