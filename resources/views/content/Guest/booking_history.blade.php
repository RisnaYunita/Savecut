@extends('layouts/contentNavbarLayout')

@section('title', 'Booking History')

@section('content')

<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">Booking History</h3>
    </div>
  </div>
  <div class="table-responsive text-nowrap py-3 px-4">
    <table id="datatable"class="table table-hover">
      <thead class="table-light">
        <tr>
          <th>Full Name</th>
          <th>Salon</th>
          <th>Treatment</th>
          <th>Date</th>
          <th>Time</th>
          <th>Price</th>
          <th>Status</th>
          <th>Payment Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bookings as $book)
        <tr>
          <td>{{$book->fullname}}</td>
          <td>{{$book->salon->salon_name}}</td>
          <td>{{$book->treatment->treatment_name}}</td>
          <td>{{$book->booking_date->format('Y-m-d')}}</td>
          <td>{{$book->booking_time}}</td>
          <td>{{$book->treatment->treatment_price}}</td>
          <td>
            @if($book->status == 'done')
              <span class="badge rounded-pill bg-label-success me-1">Done</span>
            @elseif($book->status == 'pending')
              <span class="badge rounded-pill bg-label-warning me-1">Pending</span>
            @elseif($book->status == 'expired')
              <span class="badge rounded-pill bg-label-danger me-1">Expired</span>
            @endif
          </td>
          <td>
            @if($book->payment_status == 'paid')
            <span class="badge rounded-pill bg-label-success me-1">Paid</span>
            @else
            <span class="badge rounded-pill bg-label-danger me-1">Unpaid</span>
            @endif
          </td>
          <td>
            @if($book->status != 'expired')
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                @if($book->payment_status == 'paid')
                <a class="dropdown-item" href="{{route('invoice',['booking_id' => $book->booking_id])}}"><i class="mdi mdi-information-outline me-1" ></i> Invoice</a>
                @else
                <a class="dropdown-item" href="{{route('payment', ['booking_id' => $book->booking_id])}}"><i class="mdi mdi-credit-card-outline me-1" ></i> Payment</a>
                @endif
              </div>
            </div>
            @elseif($book->status == 'expired')
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                @if($book->payment_status == 'paid')
                <a class="dropdown-item" href="{{route('invoice',['booking_id' => $book->booking_id])}}"><i class="mdi mdi-information-outline me-1" ></i> Invoice</a>
                @endif
              </div>
            </div>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
