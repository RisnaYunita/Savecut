@extends('layouts/contentNavbarLayout')

@section('title', 'Payment')

@section('content')
<div class="col-12">
    <div class="card">
      <h5 class="card-header">Payment</h5>
      <div class="card-body">
        <h6>Booking Details</h6>
        <div class="row mb-2">
              <p><strong>Name:</strong> {{ $booking->fullname }}</p>
              <p><strong>Salon:</strong> {{ $booking->salon->salon_name }}</p>
              <p><strong>Treatment:</strong> {{ $booking->treatment->treatment_name }}</p>
              <p><strong>Date:</strong> {{ $booking->booking_date }}</p>
              <p><strong>Time:</strong> {{ $booking->booking_time }}</p>
              <p><strong>Treatment Price:</strong> Rp {{ $booking->treatment->treatment_price }}</p>
              <p><strong>Service Fee:</strong> Rp 10000.00</p>
              <p><strong>Total Price:</strong> Rp {{ $booking->booking_price}}</p>
        </div>
        <hr>
        <h6>Payment Methods</h6>
        <div class="mb-3">
          <p><strong>Total Price: </strong>Rp {{ $booking->booking_price }}</p>
          <p><strong>Payment Status: </strong>
            @if($booking->payment_status == 'paid')
                <span class="badge rounded-pill bg-label-success">Paid</span>
            @elseif($booking->payment_status == 'unpaid')
                <span class="badge rounded-pill bg-label-danger">Unpaid</span>
            @endif
          </p>
        </div>
        <div id="snap-container"></div>
        <button id="pay-button" class="btn btn-primary">Proceed to Payment</button>
      </div>
    </div>

</div>
<script>
  document.getElementById('pay-button').onclick = function(){
    snap.pay('{{$snapToken}}', {
      onSuccess: function(result){
        // alert("payment success!"); console.log(result);
        window.location.href= '/booking/invoice/{{$booking->booking_id}}'
      },
      onPending: function(result){
        alert("wating your payment!"); console.log(result)
      },
      onError: function(result){
        alert("payment failed!"); console.log(result);
      },
      onClose: function () {
        alert('you closed the popup without finishing the payment');
        }
    });
  };
</script>
@endsection
