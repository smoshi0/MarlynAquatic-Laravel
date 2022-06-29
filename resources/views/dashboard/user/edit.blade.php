@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data user</h1>
  </div>

  <div class="col-lg-8 mb-5">
    <form method="post" action="/dashboard/user/{{ $user->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus required value="{{ old('name', $user->name) }}">
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username', $user->username) }}">
              @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" name="level">
                  <option value="admin" {{ ($user->level === "admin") ? 'selected' : '' }}>Admin</option>
                  <option value="f_manajer" {{ ($user->level === "f_manajer") ? 'selected' : '' }}>Fish Manager</option>
                  <option value="courier" {{ ($user->level === "courier") ? 'selected' : '' }}>Courier</option>
            </select>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
    </form>
        </div>

@endsection