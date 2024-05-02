@extends('layouts/ownercontentNavbarLayout')

@section('title', 'Home')

@section('content')

<div class="row row-cols-1 row-cols-md-3 g-4 mt-5" id="feature">
  <div class="col-lg-3 col-md-6">
    <a href="{{url('owner/review-list')}}">
      <div class="cardho h-100 card-ho">
        <img class="card-img-top" src="{{asset('assets/img/home/review.jpeg')}}" alt="error" />
        <div class="card-body">
          <h5 class="card-title">Customer Review</h5>
          <p class="card-text">To see the reviews</p>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="{{url('owner/booking-list')}}">
      <div class="cardho h-100 card-ho">
        <img class="card-img-top" src="{{asset('assets/img/home/book.jpg')}}" alt="error" />
        <div class="card-body">
          <h5 class="card-title">Booking List</h5>
          <p class="card-text">To see the booking list</p>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="{{url('owner/treatment-list')}}">
      <div class="cardho h-100 card-ho">
        <img class="card-img-top" src="{{asset('assets/img/home/treatment.jpg')}}" alt="error" />
        <div class="card-body">
          <h5 class="card-title">Treatment List</h5>
          <p class="card-text">To see the treatment list of your salon</p>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-3 col-md-6">
    <a href="{{url('owner/salon-profile')}}">
      <div class="cardho h-100 card-ho">
        <img class="card-img-top" src="{{asset('assets/img/home/salons.jpg')}}" alt="error" />
        <div class="card-body">
          <h5 class="card-title">Salon Profile</h5>
          <p class="card-text">To see the profile of your salon</p>
        </div>
      </div>
    </a>
  </div>
</div>
@endsection
