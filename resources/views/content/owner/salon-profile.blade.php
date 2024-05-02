@extends('layouts/ownercontentNavbarLayout')

@section('title', 'Salon Profiles')

@section('content')
<div class="col-12">
  <div class="card">
    <h5 class="card-header">Salon Profile</h5>
    <hr class="mt-0">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <div class="card-body">
      <div class="row mb-5">
        <div class="col-lg-6" style="width: 800px; height: 600px; overflow: hidden;">
          <img src="{{ asset('storage/' . $salon->salon_image) }}" alt="error" class="w-100" />
        </div>
        <div class="col-lg-6">
          <h1 class="fw-bold mt-3">
            {{ $salon->salon_name }}
            <button type="button" class="btn rounded-pill btn-icon btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#editSalonprofile">
              <i class="tf-icons mdi mdi-pencil-outline"></i>
            </button>
          </h1>
          <hr>
          <h3><i class="mdi mdi-map-marker mdi-24px"></i> Location</h3>
          <h5 class="w-100 text-muted">{{ $salon->salon_location }}</h5>
          <h3><i class="mdi mdi-phone-classic mdi-24px"></i> Phone Number</h3>
          <h5 class="w-100 text-muted">{{ $salon->salon_phone }}</h5>
          <h3><i class="mdi mdi-pencil mdi-24px"></i> Description</h3>
          <h5 class="w-100 text-muted">{{ $salon->salon_description }}</h5>
        </div>
      </div>
      <hr>
      <!-- Edit Salon Profile Modal -->
      <div class="modal fade" id="editSalonprofile" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="editSalonTitle">Edit Salon</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('edit-profile', $salon->salon_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="salon_id" value="{{ $salon->salon_id }}">
                <div class="row">
                  <div class="col mb-4 mt-2">
                    <div>
                      <label for="salon_name" class="form-label">Salon Name</label>
                      <input type="text" class="form-control" id="salon_name" name="salon_name" placeholder="Salon Name" value="{{ $salon->salon_name }}" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-4">
                    <div>
                      <label for="salon_location" class="form-label">Location</label>
                      <input type="text" class="form-control" id="salon_location" name="salon_location" placeholder="Location" value="{{ $salon->salon_location }}" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-4">
                    <div>
                      <label for="salon_phone" class="form-label">Phone Number</label>
                      <input type="text" class="form-control" id="salon_phone" name="salon_phone" placeholder="0811-1111-1111" value="{{ $salon->salon_phone }}" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-4">
                    <div>
                      <label for="salon_description" class="form-label">Description</label>
                      <textarea class="form-control h-px-100" id="salon_description" name="salon_description" placeholder="Description" required>{{ $salon->salon_description }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-4">
                    <div>
                      <label for="salon_image" class="form-label">Profile Image</label>
                      <input type="file" class="form-control" id="salon_image" name="salon_image">
                    </div>
                  </div>
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
  </div>
</div>

@endsection
