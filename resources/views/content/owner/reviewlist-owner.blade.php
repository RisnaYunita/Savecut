@extends('layouts/ownercontentNavbarLayout')

@section('title', 'Customer Review List')

@section('content')

<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">Salon List</h3>
    </div>
    @if(session('deletereview'))
      <div class="alert alert-success">
                {{session('deletereview')}}
      </div>
    @endif
  </div>
  <div class="table-responsive text-nowrap py-3 px-4">
    <table id="datatable" class="table">
      <thead class="table-light">
        <tr>
          <th>User Name</th>
          <th>Rating</th>
          <th>Comment</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($review as $review)
        <tr>
          <td>{{$review->user->name}}</td>
          <td>
            @for ($i = 1; $i <= 5; $i++)
              @if ($i <= $review->rating)
                <i class="mdi mdi-star active"></i> <!-- Filled star icon -->
              @else
                <i class="mdi mdi-star"></i> <!-- Empty star icon -->
              @endif
            @endfor</td>
          <td>{{$review->comment}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
