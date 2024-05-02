@extends('layouts/contentNavbarLayout')

@section('title', 'Invoice')

@section('content')
<div class="col-12">
    <div class="card">
      <h5 class="card-header">Invoice</h5>
      <div class="card-body">
        <h6>Booking Details</h6>
        <div class="row">
            <hr>
            <h6><strong>Name:</strong> {{$booking->fullname ?? 'N/A'}}</h6>
            <h6><strong>Salon:</strong> {{ $booking->salon->salon_name }}</h6>
            <h6><strong>Treatment:</strong> {{ $booking->treatment->treatment_name }}</h6>
            <h6><strong>Date:</strong> {{ $booking->booking_date->format('Y-m-d') }}</h6>
            <h6><strong>Time:</strong> {{ $booking->booking_time }}</h6>
            <h6><strong>Price:</strong> {{ $booking->booking_price }}</h6>
            <h6><strong>Payment Status:</strong>
              @if($booking->payment_status == 'paid')
                  <span class="badge rounded-pill bg-label-success">Paid</span>
              @else
                  <span class="badge rounded-pill bg-label-danger">Unpaid</span>
              @endif
            </h6>
        </div>
      </div>
    </div>

</div>
@endsection
