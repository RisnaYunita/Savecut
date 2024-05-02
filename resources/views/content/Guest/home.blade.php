@extends('layouts/contentNavbarLayout')

@section('title', 'Home')

@section('content')

<div id="carouselhome" class="carousel  carousel-light slide carousel-fade mx-n4" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselhome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselhome" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselhome" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner mt-n4">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('assets/img/home/page.jpeg')}}" alt="First slide" />
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('assets/img/home/page1.jpg')}}" alt="Second slide" />
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('assets/img/home/page2.jpg')}}" alt="Third slide" />
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselhome" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselhome" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5 mt-5" id="feature">
  <div class="col">
    <a href="{{url('salon-profile')}}">
      <div class="cardho h-100 card-ho">
        <img class="card-img-top" src="{{asset('assets/img/home/salon.jpeg')}}" alt="error" />
        <div class="card-body">
          <h5 class="card-title">Salon Profile</h5>
          <p class="card-text">Here where you can see the salon listed</p>
        </div>
      </div>
    </a>
  </div>
  <div class="col">
    <a href="{{url('booking')}}">
      <div class="cardho h-100 card-ho">
        <img class="card-img-top" src="{{asset('assets/img/home/booking.jpg')}}" alt="error" />
        <div class="card-body">
          <h5 class="card-title">Booking</h5>
          <p class="card-text">Book?</p>
        </div>
      </div>
    </a>
  </div>
  <a href="{{url('treatment')}}">
    <div class="col">
      <div class="cardho h-100 card-ho">
        <img class="card-img-top" src="{{asset('assets/img/home/treatment.jpg')}}" alt="error" />
        <div class="card-body">
          <h5 class="card-title">Treatment List</h5>
          <p class="card-text">See what kind of treatment you can get!</p>
        </div>
      </div>
    </div>
  </a>
</div>

@endsection
