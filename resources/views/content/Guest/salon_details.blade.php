@extends('layouts/contentNavbarLayout')

@section('title', 'Salon Profiles')

@section('content')
<div class="col-12">
  <div class="card">
    <h5 class="card-header">Salon Profile</h5>
    <hr class="mt-0">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="d-none d-lg-block" style="width: 800px; height: 600px; overflow: hidden;">
              <div>
                <img src="{{ asset('storage/' . $salon->salon_image) }}" alt="error" class="w-100" />
              </div>
            </div>
            <div class="d-lg-none">
              <div>
                <img src="{{ asset('storage/' . $salon->salon_image) }}" alt="error" class="w-100" />
              </div>
            </div>
        </div>
        <div class="row text-center">
            <h1 class="fw-bold mt-3">
              {{$salon->salon_name}}
            </h1>
        </div>
        <div class="row">
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
        <div class="divider">
          <div class="divider-text">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="row">
          <h4>
            <i class="mdi mdi-playlist-star mdi-24px"></i>
            Rating | Reviews
          </h4>
          <h5 class="text-muted">
              All Ratings : {{ number_format($meanRating, 2) }}
              @for ($i = 1; $i <= 5; $i++)
                  @if ($i <= $meanRating)
                      <i class="mdi mdi-star  active mdi-24px"></i>
                  @else
                      <i class="mdi mdi-star  mdi-24px"></i>
                  @endif
              @endfor
              ({{ $totalReviews }})
          </h5>
          <h5>Rate and Review for {{ $salon->salon_name }}!</h5>
          @if(session('success'))
            <div class="alert alert-success">
                      {{session('success')}}
            </div>
          @endif
          @if(session('error'))
            <div class="alert alert-success">
                      {{session('error')}}
            </div>
          @endif
          <form action="{{ route('reviews.store', ['salon_id' => $salon->salon_id]) }}" method="POST">
            @csrf
            <label class="form-label"> Rate us!</label>
            <div class="stars">
              <input type="radio" name="rating" id="rated-5" value="5" /><label for="rated-5"></label>
              <input type="radio" name="rating" id="rated-4" value="4" /><label for="rated-4"></label>
              <input type="radio" name="rating" id="rated-3" value="3" /><label for="rated-3"></label>
              <input type="radio" name="rating" id="rated-2" value="2" /><label for="rated-2"></label>
              <input type="radio" name="rating" id="rated-1" value="1" /><label for="rated-1"></label>

            </div>
            <div class="mb-3">
              <label for="comment" class="form-label">Write your review!</label>
              <textarea class="form-control" name="comment" id="comment" placeholder="Comment" rows="5" maxlength="255" required></textarea>
            </div>
            <input type="hidden" name="salon_id" value="{{ $salon->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <div class="divider">
            <div class="divider-text">
              <i class="mdi mdi-star-outline"></i>
            </div>
          </div>
          <h3><i class="mdi mdi-account-group"></i> Reviews from Others!</h3>
          @if ($reviews->isEmpty())
              <p>No reviews available for this salon.</p>
          @else
            @foreach ($reviews as $review)
              <div class= "row">
                <div class="col">
                    <!-- Name section -->
                    <h5>
                        <i class="mdi mdi-account-circle-outline"></i> {{ $review->user->name }}
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="mdi mdi-star active"></i> <!-- Filled star icon -->
                            @else
                                <i class="mdi mdi-star"></i> <!-- Empty star icon -->
                            @endif
                        @endfor
                    </h5>
                </div>
                <div class="col-auto">
                    <!-- Dropdown section -->
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="mdi mdi-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li>
                              <!-- Form for deleting review -->
                              <form action="{{ route('reviews.destroy', ['review' => $review->reviews_id]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Delete</button>
                              </form>
                          </li>
                        </ul>
                    </div>
                </div>
                <p>Comment: {{ $review->comment }}</p>
              </div>
            @endforeach
          @endif
        </div>
      </div>
   </div>
</div>
@endsection
