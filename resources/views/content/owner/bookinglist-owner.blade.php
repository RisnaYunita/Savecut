@extends('layouts/ownercontentNavbarLayout')

@section('title', 'Booking List')

@section('content')

<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">Booking List</h3>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
    @endif
  </div>
  <div class="table-responsive text-nowrap py-3 px-4">
    <table id="datatable"class="table table-hover">
      <thead class="table-light">
        <tr>
          <th>Name</th>
          <th>Treatment</th>
          <th>Date</th>
          <th>Time</th>
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($booking as $booking)
        @if($booking->payment_status == 'paid')
        <tr>
          <td>{{$booking->fullname}}</td>
          <td>{{$booking->treatment->treatment_name}}</td>
          <td>{{$booking->booking_date->format('Y-m-d')}}</td>
          <td>{{$booking->booking_time}}</td>
          <td>{{$booking->treatment->treatment_price}}</td>
          <td>
            @if($booking->status == 'done')
              <span class="badge rounded-pill bg-label-success me-1">Done</span>
            @elseif($booking->status == 'pending')
              <span class="badge rounded-pill bg-label-warning me-1">Pending</span>
            @elseif($booking->status == 'expired')
              <span class="badge rounded-pill bg-label-danger me-1">Expired</span>
            @endif
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                @if($booking->status == 'pending')
                  <form  class="dropdown_item" action="{{ route('mark.as.done', $booking->booking_id) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" id="markAsDone{{$booking->booking_id}}" name="status" value="done" onchange="this.form.submit()" />
                        <label class="form-check-label"for="markAsDone{{$booking->booking_id}}">Mark as Done</label>
                      </div>
                  </form>
                @endif
                <form action="{{route('deleteBooking', ['booking_id' => $booking->booking_id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can-outline me-1" ></i> Delete</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
