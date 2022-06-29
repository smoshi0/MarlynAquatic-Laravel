@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tabel Akuarium</h1>
  </div>

  @if (session()->has('success'))
      <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif


  @if (session()->has('hapus'))
      <div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
        {{ session('hapus') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

  @if (session()->has('alert'))
      <div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
        {{ session('alert') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

  @if (session()->has('edit'))
      <div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
        {{ session('edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

  @if (session()->has('tambah'))
      <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
        {{ session('tambah') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <a href="/dashboard/akuarium/create" class="btn btn-light text-dark btn-outline-primary">Input Data</a>
      <a href="/dashboard/pdf_akuarium" class="btn btn-light text-dark btn-outline-primary mx-3" target="_blank">Cetak Data</a>
      <a href="/dashboard/download_akuarium" class="btn btn-light text-dark btn-outline-primary" target="_blank">Download Data</a>
      
  <div class="table-responsive col-lg-10 my-3" id="customers">
    <table class="table table-striped table-sm my-5" id="example" class="display">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Ikan</th>
          <th scope="col">Kode Akuarium</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Action</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($akuariums as $akuarium)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $akuarium->nama_ikan }}</td>
              <td>{{ $akuarium->kode_akuarium }}</td>
              @if ($akuarium->jumlah_ikan < 1)
              <td>Ikan Kosong</td>
              @else
              <td>{{ $akuarium->jumlah_ikan }}</td>
              @endif
              <td>
                <a href="/dashboard/akuarium/{{ $akuarium->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/akuarium/{{ $akuarium->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/akuarium/{{ $akuarium->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin Dek?')"><span data-feather="x-circle"></span></button>
                </form>
                {{-- <a href="" class="badge bg-danger"></a> --}}
              </td>
              <td>
                <a href="/dashboard/akuarium/{{ $akuarium->slug }}/edit/tambahjumlah" class="badge bg-primary"><span data-feather="plus"></span></a>
                <a href="/dashboard/akuarium/{{ $akuarium->slug }}/edit/kurangjumlah" class="badge bg-success"><span data-feather="minus"></span></a>
              </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{-- {{ $akuariums->links() }} --}}
  </div>
  
@endsection