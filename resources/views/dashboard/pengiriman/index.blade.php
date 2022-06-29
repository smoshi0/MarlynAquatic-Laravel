@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tabel Pengiriman</h1>
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

      @if (session()->has('success'))
      <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

  <a href="/dashboard/pengiriman/create" class="btn btn-light text-dark btn-outline-primary">Input Data</a>
  <a href="/dashboard/pdf_pengiriman" class="btn btn-light text-dark btn-outline-primary mx-3" target="_blank">Cetak Data</a>
  <a href="/dashboard/download_pengiriman" class="btn btn-light text-dark btn-outline-primary" target="_blank">Download Data</a>

  <div class="table-responsive col-lg-10 my-3" id="customers">
    <table class="table table-striped table-sm my-5" id="example" class="display">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Ikan</th>
          <th scope="col">Jumlah Ikan</th>
          <th scope="col">ALamat Tujuan</th>
          <th scope="col">Tanggal Pengiriman</th>
          <th scope="col">Action</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($pengirimans as $pengiriman)
          <tr>
              <td>{{ $loop->iteration }}</td>
              
                @if (!$pengiriman->akuarium)
                <td>{{ $pengiriman->namaIkan }}</td>
                @elseif($pengiriman->akuarium->nama_ikan)
                <td>{{$pengiriman->akuarium->nama_ikan}}</td>
                @endif
                
              <td>{{ $pengiriman->jumlah_ikan }}</td>
              <td>{{ $pengiriman->alamat_tujuan }}</td>
              <td>{{ $pengiriman->tanggal_pengiriman }}</td>
              <td>
                @if (!$pengiriman->akuarium)

                @elseif($pengiriman->akuarium->nama_ikan)
                <a href="/dashboard/pengiriman/{{ $pengiriman->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                @endif
                <form action="/dashboard/pengiriman/{{ $pengiriman->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin Data Akan Dihapus?')"><span data-feather="trash"></span></button>
                </form>
                {{-- <a href="" class="badge bg-danger"></a> --}}
              </td>
              <td>
                @if (!$pengiriman->akuarium)
                
                @elseif($pengiriman->akuarium->nama_ikan)
                <form action="/dashboard/pengiriman/{{ $pengiriman->id }}/edit/batal" method="post" class="d-inline">
                  @method('patch')
                  @csrf
                  <button class="badge bg-dark border-0 btn-outline-danger" onclick="return confirm('Pengiriman Dibatalkan?')"><span data-feather="x-circle"></span></button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{-- {{ $akuariums->links() }} --}}
  </div>

@endsection