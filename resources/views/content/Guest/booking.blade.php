@extends('layouts/contentNavbarLayout')

@section('title', 'Booking')

@section('content')
<div class="col-12">
    <div class="card">
      <h5 class="card-header">Booking</h5>
      @if(session('success'))
      <div class="alert alert-success">
                {{session('success')}}
      </div>
    @endif
      @if ($errors->has('salon'))
    <div class="alert alert-danger">
      {{ $errors->first('salon') }}
    </div>
    @endif
    @if ($errors->has('treatment'))
    <div class="alert alert-danger">
      {{ $errors->first('treatment') }}
    </div>
    @endif
      <div class="card-body">
        <form class="row" method="POST" action="{{ route('booking-store') }}">
        @csrf
          <div class="col-12">
            <h6>Booking Details</h6>
            <hr class="mt-0">
          </div>
          <div class="col-md-6 mb-5">
            <label for="fullname" class="form-label-lg">Full Name</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text" id="fullnameIcon"><i class="mdi mdi-account-outline"></i></span>
              <input type="text" class="form-control form-control-lg" id="fullname" placeholder="Full Name" name="fullname" required/>
            </div>
          </div>
          <div class="col-md-6 mb-5">
            <label for="salon_name" class="form-label-lg">Choose Your Salon</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text" id="salonnameIcon"><i class="mdi mdi-magnify"></i></span>
              <input class="form-control form-control-lg" list="datalistSalon" id="salon_name" placeholder="Type to search... " name="salon_name" required>
              <datalist id="datalistSalon">
                @foreach($salon as $salon)
                  <option value="{{ $salon->salon_name }}"></option>
                @endforeach
              </datalist>
            </div>
          </div>
          <div class="col-md-6 mb-5">
              <label for="treatment_name" class="form-label-lg">Choose Your Treatment</label>
              <select id="treatment_name" class="form-select form-select-lg" name="treatment_name" required>
                  <option value="">Select Your Treatment...</option>
                  @foreach($treatment as $treatment)
                      <option value="{{ $treatment->treatment_id }}" data-price="{{ $treatment->treatment_price }}" >{{ $treatment->treatment_name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="col-md-6 mb-5">
            <label for="book_date" class="form-label-lg">Choose Your Date</label>
            <input class="form-control form-control-lg" type="date" id="book_date"  name="book_date" required/>
          </div>
          <div class="col-md-6 mb-5">
            <label for="book_time" class="form-label-lg">Choose Your Time</label>
            <input class="form-control" type="time" name="book_time"id="book_time" min="10:00" max="16:00" step="3600" aria-describedby="booktime"/>
            <div id="book_time" class="form-text">Open from 10:00 till 17:00</div>
          </div>
          <div class="col-md-6 mb-5">
              <label for="treatment_price" class="form-label-lg">Price</label>
              <div class="input-group">
                  <span class="input-group-text">Rp</span>
                  <input type="number" class="form-control" id="treatment_price" name="treatment_price" placeholder="Amount" readonly required/>
              </div>
          </div>
          <input type="hidden" id="total_price" name="total_price">
          <button type="button" class="btn btn-primary" onclick="confirmBooking()">BOOK</button>
          <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="confirmationModalLabel">Confirm Booking</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Full Name:</strong> <span id="modalFullname"></span></p>
                    <p><strong>Salon:</strong> <span id="modalSalon"></span></p>
                    <p><strong>Treatment:</strong> <span id="modalTreatment"></span></p>
                    <p><strong>Date:</strong> <span id="modalDate"></span></p>
                    <p><strong>Time:</strong> <span id="modalTime"></span></p>
                    <p><strong>Treatment Price:</strong> <span id="modalTreatmentPrice"></span></p>
                    <p><strong>Service Fee:</strong> <span id="modalServiceFee"></span></p>
                    <p><strong>Total Price:</strong> <span id="modalTotalPrice"></span></p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Confirm Booking</button>
                  </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
