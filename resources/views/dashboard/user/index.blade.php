@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tabel User</h1>
  </div>
  @if (session()->has('hapus'))
  <div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
    {{ session('hapus') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if (session()->has('edit'))
  <div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
    {{ session('edit') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive col-lg-10 my-3" id="customers">
    <table class="table table-striped table-sm my-5" id="example" class="display">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Level</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->level }}</td>
              <td>
                <a href="/dashboard/user/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin Data Akan Dihapus?')"><span data-feather="trash"></span></button>
                </form>
                {{-- <a href="" class="badge bg-danger"></a> --}}
              </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{-- {{ $akuariums->links() }} --}}
  </div>
  
@endsection