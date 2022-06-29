@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Pengiriman</h1>
  </div>

  <div class="col-lg-8 mb-5">

    <form method="post" action="/dashboard/pengiriman" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="Kategori" class="form-label">Kategori Ikan</label>
        <select class="form-select" name="akuarium_id" onchange="myFunction()" id="akuarium_id">
              @foreach ($akuariums as $akuarium)
              <option value="{{ $akuarium->id }}"  selected="selected">{{ $akuarium->nama_ikan }}</option>
              @endforeach
            </select>
        </div>
        {{-- <button type="button" onmouseover="myFunction()">Try it</button> --}}
        <script>
          function myFunction(){
            var x = document.getElementById("akuarium_id");
            document.getElementById("namaIkan").value = x.options[x.selectedIndex].text;
          }
        </script>
        <input type="hidden" name="namaIkan" id="namaIkan" value="">
        <div class="mb-3">
              <label for="jumlah_ikan" class="form-label">Jumlah Ikan</label>
              <input type="number" class="form-control @error('jumlah_ikan') is-invalid @enderror" id="jumlah_ikan" name="jumlah_ikan" required value="{{ old('jumlah_ikan') }}">
              @error('jumlah_ikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
              <input type="text" class="form-control @error('alamat_tujuan') is-invalid @enderror" id="alamat_tujuan" name="alamat_tujuan" required value="{{ old('alamat_tujuan') }}">
              @error('alamat_tujuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
              <input type="date" class="form-control @error('tanggal_pengiriman') is-invalid @enderror" id="tanggal_pengiriman" name="tanggal_pengiriman" required value="{{ old('tanggal_pengiriman') }}">
              @error('tanggal_pengiriman')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  
@endsection