@extends('layouts/admincontentNavbarLayout')

@section('title', 'Customer Review List')

@section('content')

<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">Review List</h3>
    </div>
    @if(session('success'))
      <div class="alert alert-success">
                {{session('success')}}
      </div>
    @endif
  </div>
  <div class="table-responsive text-nowrap py-3 px-4">
    <table id="datatable" class="table">
      <thead class="table-light">
        <tr>
          <th>Salon Name</th>
          <th>User Name</th>
          <th>Rating</th>
          <th>Comment</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($review as $review)
        <tr>
          <td>{{$review->salon->salon_name}}</td>
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
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <form action="{{ route('review-delete-admin', ['reviews_id' => $review->reviews_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can-outline me-1" ></i> Delete</button>
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
@endsection
