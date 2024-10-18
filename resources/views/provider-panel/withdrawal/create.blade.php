@extends('provider-panel\layouts\app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/service.css" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"/>
@endpush

@section('title', 'Create Withdrawal Request')

@section('content')
<h3 class="mb-4 mt-2" id="txt" style="margin-left: 15%;">Payment Page</h3>

  <div style="display: flex; justify-content: space-evenly; width: 100%;" id="payment">
    <div style="width: 30%; margin-left: 4%;" id="form">
      <form method="POST" action="">
        @csrf
        <strong>Enter Data to Withdraw the Money.</strong>

        <div class="mb-3">
          <label for="name" class="form-note-label" style="color: #83044a;">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required />
          @error('name')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="iban" class="form-note-label" style="color: #83044a;">IBAN</label>
          <input type="text" class="form-control" id="iban" name="IBAN" placeholder="Enter your IBAN" value="{{ old('IBAN') }}" required />
          @error('iban')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="bank_name" class="form-note-label" style="color: #83044a;">Bank Name</label>
          <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter bank name" value="{{ old('bank_name') }}" required />
          @error('bank_name')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="swift_code" class="form-note-label" style="color: #83044a;">SWIFT Code</label>
          <input type="text" class="form-control" id="swift_code" name="swift_code" placeholder="Enter SWIFT code" value="{{ old('swift_code') }}" required />
          @error('swift_code')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="address" class="form-note-label" style="color: #83044a;">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}" required />
          @error('address')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="currency" class="form-note-label" style="color: #83044a;">Currency</label>
          <input type="text" class="form-control" id="currency" name="currency" placeholder="Enter the currency" value="{{ old('currency') }}" required />
          @error('currency')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="amount" class="form-note-label" style="color: #83044a;">Amount</label>
          <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter the amount" value="{{ old('amount') }}" required />
          @error('amount')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="user_note" class="form-note-label" style="color: #83044a;">Note</label>
          <textarea class="form-control" id="user_note" name="user_note" rows="2" placeholder="Enter any additional notes (optional)">{{ old('user_note') }}</textarea>
          @error('user_note')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-secondary me-2">Cancel</button>
          <button type="submit" class="btn btn-primary">Send request</button>
        </div>
      </form>
    </div>

    <div style="display: flex;flex-direction: column;align-items: center; justify-content: center;">
      <img src="{{ asset('') }}imgs/payment.png" alt="payment" width="250px" />
      <img src="{{ asset('') }}imgs/paymentAccount.png" alt="" width="500px" id="img">
    </div>
  </div>
@endsection
