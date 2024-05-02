@extends('layouts/ownercontentNavbarLayout')

@section('title', 'Treatment List')

@section('content')

<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">Treatment List</h3>
      <div class="col-lg-2 col-md-3 ">
        <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addTreatment">
          <i class="mdi mdi-plus"></i>
            Add Treatment
          </i>
        </a>
      </div>
    </div>
    @if(session('success'))
      <div class="alert alert-success">
                {{session('success')}}
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">
                {{session('error')}}
      </div>
    @endif
  </div>
  <div class="table-responsive text-nowrap py-3 px-4">
    <table id="datatable"class="table table-hover">
      <thead class="table-light">
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($treatment as $treatment)
        <tr>
          <td class="table-cell table-image"><img src="{{ asset('storage/' . $treatment->treatment_image) }}" alt="error" class="w-25" /></td>
          <td class="table-cell">{{$treatment->treatment_name}}</td>
          <td class="table-cell">Rp {{$treatment->treatment_price}}</td>
          <td class="table-cell">{{$treatment->treatment_description}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTreatment{{$treatment->treatment_id}}" ><i class="mdi mdi-pencil-outline me-1"></i> Edit Treatment</button>
                <form action="{{ route('delete-treatment', ['treatment_id' => $treatment->treatment_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this treatment?')"><i class="mdi mdi-trash-can-outline me-1" ></i> Delete</button>
                </form>
              </div>
            </div>
          </td>
          <!-- Edit Treatment Profile Modal -->
          <div class="modal fade" id="editTreatment{{$treatment->treatment_id}}" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="editTreatmentTitle">Edit Treatment</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('edit-treatment', $treatment->treatment_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="treatment_id" value="{{ $treatment->treatment_id }}">
                    <div class="row">
                      <div class="col mb-4">
                        <div>
                          <label for="treatment_image" class="form-label">Treatment Image</label>
                          <input type="file" class="form-control" id="treatment_image" name="treatment_image" value="{{ $treatment->treatment_image }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-4 mt-2">
                        <div>
                          <label for="treatment_name" class="form-label">Treatment Name</label>
                          <input type="text" class="form-control" id="treatment_name" name="treatment_name" placeholder="Treatment Name" value="{{ $treatment->treatment_name }}" required />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-4">
                        <div>
                          <label for="treatment_price" class="form-label">Treatment Price</label>
                          <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="treatment_price" name="treatment_price" placeholder="Amount" value="{{ $treatment->treatment_price }}" required/>
                            <span class="input-group-text">,00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-4">
                        <div>
                          <label for="treatment_description" class="form-label">Treatment Description</label>
                          <textarea class="form-control h-px-100" id="treatment_description" name="treatment_description" placeholder="Description" required maxlength="1000">{{ $treatment->treatment_description }}</textarea>
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
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- Add Treatment Modal -->
  <div class="modal fade" id="addTreatment" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="AddTreatmentTitle">Add Treatment</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('add-treatment') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="treatment_id">
            <div class="row">
              <div class="col mb-4">
                <div>
                  <label for="treatment_image" class="form-label">Treatment Image</label>
                  <input type="file" class="form-control" id="treatment_image" name="treatment_image" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col mb-4 mt-2">
                <div>
                  <label for="treatment_name" class="form-label">Treatment Name</label>
                  <input type="text" class="form-control" id="treatment_name" name="treatment_name" placeholder="Treatment Name" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col mb-4">
                <div>
                  <label for="treatment_price" class="form-label">Treatment Price</label>
                  <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control" id="treatment_price" name="treatment_price" placeholder="Amount" aria-label="Amount" required/>
                    <span class="input-group-text">,00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col mb-4">
                <div>
                  <label for="treatment_description" class="form-label">Treatment Description</label>
                  <textarea class="form-control h-px-100" id="treatment_description" name="treatment_description" placeholder="Description" required maxlength="1000"></textarea>
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
@endsection
