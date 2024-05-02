@extends('layouts/admincontentNavbarLayout')

@section('title', 'User List')

@section('content')
<div class="card">
  <div class="col-12 ms-3 mb-3">
    <div class="row">
      <h3 class="col-lg-10 col-md-9">User List</h3>
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
    <table id="datatable"class="table">
      <thead class="table-light">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($user as $user)
        @if($user->active == '1')
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->role}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->updated_at}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editUser{{$user->user_id}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit Role</button>
                <form action="{{ route('delete-user', ['id' => $user->user_id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can-outline me-1" ></i> Delete</button>
                </form>
              </div>
            </div>
          </td>
          <!-- Edit Modal -->
          <div class="modal fade" id="editUser{{$user->user_id}}" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="editUser">Edit User</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('update-role', ['id' => $user->user_id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="role" class="form-label">Role</label>
                      <select name="role" id="role" class="form-select">
                        <option value="0" {{ $user->role === 0 ? 'selected' : '' }}>User</option>
                        <option value="1"{{ $user->role === 1 ? 'selected' : '' }}>Owner</option>
                        <option value="2"{{ $user->role === 2 ? 'selected' : '' }}>Admin</option>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                  </form>
              </div>
            </div>
          </div>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
