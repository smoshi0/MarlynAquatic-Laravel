@extends('layouts.main')

@section('container')
<h2 class="text-center mb-3">Halaman Kategori</h2>


<div class="container">
    <div class="row">
@foreach ($kategoris as $kategori)
        <div class="col-md-4 mb-5">
            <a href="/akuarium?kategori={{ $kategori->slug }}">
                <div class="card bg-dark text-white">
                    <img src="img/{{ $kategori->slug }}.jpg" class="card-img" alt="{{ $kategori->nama_kategori }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.6)">{{ $kategori->nama_kategori }}</h5>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
</div>
<div style="height: 200px"></div>
@endsection
