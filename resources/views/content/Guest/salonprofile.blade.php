@extends('layouts/contentNavbarLayout')

@section('title', 'Salon Profiles')

@section('content')
<div class="col-12">
  <div class="card">
    <h5 class="card-header">Salon List</h5>
    <hr class="mt-0">
    @if(session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif
    <div class="card-body">
      @foreach ($salon as $salon)
      <a href="{{ route('salon-details', ['id' => $salon->salon_id]) }}">
        <div class = "row">
          <div class="col-lg-6" style="width: 800px; height: 600px; overflow: hidden;">
            <img src="{{ asset('storage/' . $salon->salon_image) }}" alt="error" class="w-100" />
          </div>
          <div class="col-lg-6">
            <h1 class="fw-bold mt-3">
              {{$salon->salon_name}}
            </h1>
            <h5 class="text-muted">
            4.0
            <i class="mdi mdi-star  active mdi-24px"></i>
            <i class="mdi mdi-star  active mdi-24px"></i>
            <i class="mdi mdi-star  mdi-24px"></i>
            <i class="mdi mdi-star  mdi-24px"></i>
            <i class="mdi mdi-star  mdi-24px"></i>
            (100)
            </h5>
            <hr>
            <h3>
            <i class="mdi mdi-map-marker mdi-24px"></i>
              Location
            </h3>
            <h5 class="w-100 text-muted">
            {{$salon->salon_location}}
            </h5>
            <h3>
              <i class="mdi mdi-phone-classic mdi-24px"></i>
              Phone Number
            </h3>
            <h5 class="w-100 text-muted">
              {{ $salon->salon_phone }}
            </h5>
            <h3>
              <i class="mdi mdi-pencil mdi-24px"></i>
              Description
            </h3>
            <h5 class="w-100 text-muted">
            {{ $salon->salon_description }}
            </h5>
          </div>
        </div>
        <div class="divider text-end">
          <div class="divider-text">
            <i class="mdi mdi-content-cut mdi-rotate-180"></i>
          </div>
        </div>
      </a>
      @endforeach
    </div>
   </div>

</div>
@endsection
