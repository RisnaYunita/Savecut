@extends('layouts/admincontentNavbarLayout')

@section('title', 'Booking List')

@section('content')
<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">Booking List</h3>
      <div class="col-lg-2 col-md-3 ">
        <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addBookingModal">
          <i class="mdi mdi-plus"></i>
          Add Booking
        </a>
      </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
    {{ session('error6') }}
    </div>
    @endif
    @if ($errors->has('salon'))
    <div class="alert alert-danger">
      {{ $errors->first('salon') }}
    </div>
    @endif
    @if ($errors->has('treatment_name'))
    <div class="alert alert-danger">
      {{ $errors->first('treatment_name') }}
    </div>
    @endif
  </div>
  <div class="table-responsive text-nowrap py-3 px-4">
    <table id="datatable" class="table table-hover">
      <thead class="table-light">
        <tr>
          <th>Name</th>
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
        @foreach ($bookings as $booking)
        <tr>
          <td>{{ $booking->fullname }}</td>
          <td>{{ $booking->salon->salon_name}}</td>
          <td>{{ $booking->treatment->treatment_name }}</td>
          <td>{{ $booking->booking_date->format('Y-m-d') }}</td>
          <td>{{ $booking->booking_time }}</td>
          <td>{{ $booking->booking_price }}</td>
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
            @if($booking->payment_status == 'paid')
            <span class="badge rounded-pill bg-label-success me-1">Paid</span>
            @else
            <span class="badge rounded-pill bg-label-danger me-1">Unpaid</span>
            @endif
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                @if($booking->status == 'pending')
                <form class="dropdown_item" action="{{ route('mark-as-done', $booking->booking_id) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <div class="form-check ms-3">
                    <input class="form-check-input" type="checkbox" id="markAsDone{{$booking->booking_id}}" name="status" value="done" onchange="this.form.submit()" />
                    <label class="form-check-label"for="markAsDone{{$booking->booking_id}}">Mark as Done</label>
                  </div>
                </form>
                @endif
                <form action="{{ route('delete-booking', ['booking_id' => $booking->booking_id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this booking?')"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Add Booking Modal -->
<div class="modal fade" id="addBookingModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="AddBookingTitle">Add Booking</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('add-booking') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col mb-4 mt-2">
              <div>
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col mb-4">
              <label for="salon_name" class="form-label">Salon Name</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text" id="salon_name"><i class="mdi mdi-magnify"></i></span>
                <input class="form-control form-control-lg" list="datalistSalon" id="salon_name" placeholder="Type to search... " name="salon_name" required>
                <datalist id="datalistSalon">
                  @foreach($salons as $salon)
                  <option value="{{ $salon->salon_name }}"></option>
                  @endforeach
                </datalist>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col mb-4">
              <label for="treatment_name" class="form-label">Treatment Name</label>
              <select id="treatment_name" class="form-select form-select" name="treatment_name" required>
                <option value="">Select The Treatment...</option>
                @foreach($treatments as $treatment)
                <option value="{{ $treatment->treatment_id }}" data-price="{{ $treatment->treatment_price }}">{{ $treatment->treatment_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
              <div class="col mb-4">
                <label for="treatment_price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" id="treatment_price" name="treatment_price" placeholder="Amount" readonly required/>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col mb-4">
              <label for="book_date" class="form-label">Choose Your Date</label>
              <input class="form-control" type="date" id="datebooking" name="book_date" required />
            </div>
          </div>
          <div class="row">
            <div class="col mb-4">
              <label for="book_time" class="form-label">Choose Your Time</label>
              <input class="form-control" type="time" id="book_time" min="10:00" max="17:00" step="3600" aria-describedby="booktime" name="book_time" required />
              <div id="book_time" class="form-text">Open from 10:00 till 17:00</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
