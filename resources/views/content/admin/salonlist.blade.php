@extends('layouts/admincontentNavbarLayout')

@section('title', 'Salon List')

@section('content')
<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">Salon List</h3>
      <div class="col-lg-2 col-md-3 ">
        <a class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#addSalon">
          <i class="mdi mdi-plus"></i>
            Add Salon
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
    <table id="datatable" class="table">
      <thead class="table-light">
        <tr>
          <th>Salon Name</th>
          <th>Location</th>
          <th>Phone Number</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($salon as $salon)
        <tr>
          <td>{{$salon->salon_name}}</td>
          <td>{{$salon->salon_location}}</td>
          <td>{{$salon->salon_phone}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editSalon{{$salon->salon_id}}" ><i class="mdi mdi-pencil-outline me-1"></i> Edit Salon</button>
                <form action="{{ route('delete-salon', ['salon_id' => $salon->salon_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can-outline me-1" ></i> Delete</button>
                </form>
              </div>
            </div>
          </td>
          <!-- Edit Salon Modal -->
          <div class="modal fade" id="editSalon{{$salon->salon_id}}" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="editSalonTitle">Edit Salon</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('edit-salon', $salon->salon_id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="salon_id" value="{{$salon ->salon_id}}">
                            <div class="row">
                              <div class="col mb-4 mt-2">
                                <div>
                                  <label for="salon_name" class="form-label">Salon Name</label>
                                  <input type="text" class="form-control" id="salon_name" name="salon_name" placeholder="Salon Name" value="{{$salon ->salon_name}}" required />
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-4">
                                <div>
                                  <label for="salon_location" class="form-label">Location</label>
                                  <input type="text" class="form-control" id="salon_location" name="salon_location" placeholder="Location" value="{{$salon ->salon_location}}" required />
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-4">
                                <div>
                                  <label for="salon_location" class="form-label">Phone Number</label>
                                  <input type="text" class="form-control" id="salon_phone" name="salon_phone" placeholder="0811-1111-1111"  value="{{$salon ->salon_phone}}" required/>
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
  <!-- Add Salon Modal -->
  <div class="modal fade" id="addSalon" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="AddSalonTitle">Add Salon</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('add-salon') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col mb-4 mt-2">
                <div>
                  <label for="salon_name" class="form-label">Salon Name</label>
                  <input type="text" class="form-control" id="salon_name" name="salon_name" placeholder="Salon Name" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col mb-4">
                <div>
                  <label for="salon_location" class="form-label">Location</label>
                  <input type="text" class="form-control" id="salon_location" name="salon_location" placeholder="Location" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col mb-4">
                <div>
                  <label for="salon_location" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" id="salon_phone" name="salon_phone" placeholder="0811-1111-1111" required/>
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
