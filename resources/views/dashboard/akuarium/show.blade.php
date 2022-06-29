@extends('dashboard.layouts.main')

@section('container')
<div class="container my-3">
    <div class="row justify-content-start">
        <div class="col-lg-8 ">

            <h3 class="">{{ $akuarium->nama_ikan }}</h3>


            @if ($akuarium->image)
            <div style="max-height: 350px; overflow: hidden;">
              <img src="{{ asset('storage/' . $akuarium->image) }}" alt="{{ $akuarium->kategori->nama_kategori }}" class="img-fluid mb-3">
            </div>
            @else
            <img src="https://source.unsplash.com/700x300?{{ $akuarium->kategori->nama_kategori }}" alt="{{ $akuarium->kategori->nama_kategori }}" class="img-fluid mb-3">
            @endif


            <h5 class="fs-5 fw-bold">Kategori <a href="/akuarium?kategori={{ $akuarium->kategori->slug }}" class="text-decoration-none fs-5 fw-bold">{{ $akuarium->kategori->nama_kategori }}</a> {{ $akuarium->created_at->diffForHumans() }}</h5>

            <div class="row">
                <label for="kode_akuarium" class="col-lg-4 col-form-label fs-5 fw-bold">Kode Akuarium :</label>
                <div class="col-lg-8">
                  <input type="text" readonly class="form-control-plaintext fs-5 fw-bold" id="kode_akuarium" value="{{ $akuarium->kode_akuarium }}">
                </div>
              </div>
            <div class="row">
                <label for="jumlah_ikan" class="col-lg-4 col-form-label fs-5 fw-bold">Jumlah Ikan :</label>
                <div class="col-lg-8">
                  <input type="text" readonly class="form-control-plaintext fs-5 fw-bold" id="jumlah_ikan" value="{{ $akuarium->jumlah_ikan }}">
                </div>
              </div>
            <div class="row">
                <label for="harga_ikan" class="col-lg-4 col-form-label fs-5 fw-bold">Harga Ikan :</label>
                <div class="col-lg-8">
                  <input type="text" readonly class="form-control-plaintext fs-5 fw-bold" id="harga_ikan" value="Rp.{{ $akuarium->harga_ikan }},00.">
                </div>
              </div>
    
    
            <a href="/dashboard/akuarium" class="text-decoration-none btn btn-primary mt-3"><span data-feather="arrow-left"></span> Kembali</a>
            <a href="/dashboard/akuarium/{{ $akuarium->slug }}/edit" class="text-decoration-none btn btn-warning mt-3"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/akuarium/{{ $akuarium->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger mt-3" onclick="return confirm('Yakin Dek?')"><span data-feather="x-circle"></span> Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection