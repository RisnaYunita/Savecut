@extends('layouts/contentNavbarLayout')

@section('title', 'Treatment')

@section('content')
<div class="col-12">
  <div class="card">
    <h5 class="card-header">Treatment List</h5>
    <hr class="mt-0">
    <div class="card-body">
      @foreach ($treatment as $treatment)
        <div class = "row">
          <div class="col-lg-6" style="width: 800px; height: 600px; overflow: hidden;">
            <img src="{{ asset('storage/' . $treatment->treatment_image) }}" alt="error" class="w-100" />
          </div>
          <div class="col-lg-6">
            <h1 class="fw-bold mt-3">
              {{$treatment->treatment_name}}
            </h1>
            <hr>
            <h3>
              Price
            </h3>
            <h5 class="w-100 text-muted">
              {{$treatment->treatment_price}}
            </h5>
            <hr>
            <h3>
              Description
            </h3>
            <h5 class="w-100 text-muted">
              {{$treatment->treatment_description}}
            </h5>
          </div>
        </div>
        <div class="divider text-end">
          <div class="divider-text">
            <i class="mdi mdi-content-cut mdi-rotate-180"></i>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
