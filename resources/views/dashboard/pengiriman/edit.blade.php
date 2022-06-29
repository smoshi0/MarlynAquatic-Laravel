@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Pengiriman</h1>
</div>
<div class="col-lg-8 mb-5">
    <form method="post" action="/dashboard/pengiriman/{{ $pengiriman->id }}" enctype="multipart/form-data">
      @method('put')
        @csrf
        <input type="hidden" value="{{ $pengiriman->akuarium_id }}" id="akuarium_id" name="akuarium_id">
        <div class="mb-3">
        <label for="Kategori" class="form-label">Kategori Ikan</label>
              <input type="text" class="form-control" placeholder="{{ $pengiriman->namaIkan }}" readonly disabled>
        </div>
        <div class="mb-3">
              <label for="jumlah_ikan" class="form-label">Jumlah Ikan</label>
              @if (!$pengiriman->akuarium)
                <input type="number" readonly disabled class="form-control @error('jumlah_ikan') is-invalid @enderror" id="jumlah_ikan" name="jumlah_ikan" required value="{{ $pengiriman->jumlah_ikan }}">
                <small>*Tabel Akuarium Tidak Tersedia</small>
                @elseif($pengiriman->akuarium->nama_ikan)
                <input type="number" class="form-control @error('jumlah_ikan') is-invalid @enderror" id="jumlah_ikan" name="jumlah_ikan" required value="{{ $pengiriman->jumlah_ikan }}">
                @endif
              @error('jumlah_ikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
              <input type="text" class="form-control @error('alamat_tujuan') is-invalid @enderror" id="alamat_tujuan" name="alamat_tujuan" required value="{{ $pengiriman->alamat_tujuan }}">
              @error('alamat_tujuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
              <input type="date" class="form-control @error('tanggal_pengiriman') is-invalid @enderror" id="tanggal_pengiriman" name="tanggal_pengiriman" required value="{{ $pengiriman->tanggal_pengiriman }}">
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