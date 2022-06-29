@extends('layouts.main')

@section('container')
<h3 class="mb-2 text-center">{{ $title }}</h3>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/akuarium">
        @if (request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
          <button class="btn btn-dark " type="submit" id="">Search</button>
        </div>
      </form>
    </div>
  </div>

@if ($ikans->count())
<div class="card mb-3 shadow">
  @if ($ikans[0]->image)
      <div style="max-height: 400px; overflow: hidden;">
        <img src="{{ asset('storage/' . $ikans[0]->image) }}" alt="{{ $ikans[0]->kategori->nama_kategori }}" class="img-fluid">
      </div>
    @else
      <img src="https://source.unsplash.com/900x300?{{ $ikans[0]->kategori->nama_kategori }}" class="card-img-top" alt="{{ $ikans[0]->kategori->nama_kategori }}">
    @endif
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/akuarium/{{ $ikans[0]->slug }}" class="text-decoration-none text-dark">{{ $ikans[0]->nama_ikan }}</a></h3>
      <p class="card-text">
        <small class="text-muted">
            Kategori <a href="/akuarium?kategori={{ $ikans[0]->kategori->slug }}" class="text-decoration-none">{{ $ikans[0]->kategori->nama_kategori }}</a> {{ $ikans[0]->created_at->diffForHumans() }}
        </small>
    </p>
    <a href="/akuarium/{{ $ikans[0]->slug }}" class="text-decoration-none btn btn-dark shadow ">See More</a>
    </div>
  </div>   

<div class="container">
    <div class="row">
      @foreach ($ikans->skip(1) as $ikan)
        <div class="col-md-6 my-3 text-center ">
          <div class="card shadow">
              <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.6)"><a href="/akuarium?kategori={{ $ikan->kategori->slug }}" class="text-decoration-none text-white">{{ $ikan->kategori->nama_kategori }}</a></div>
              @if ($ikan->image)
                  <img src="{{ asset('storage/' . $ikan->image) }}" alt="{{ $ikan->kategori->nama_kategori }}" class="img-fluid">
              @else
              <img src="https://source.unsplash.com/500x500?{{ $ikan->kategori->nama_kategori }}" class="card-img-top" alt="{{ $ikan->kategori->nama_kategori }}">
              @endif
                
                <div class="card-body">
                  <h5 class="card-title"><a href="/akuarium/{{ $ikan->slug }}" class="text-decoration-none">{{ $ikan->nama_ikan }}</a></h5>
                  <p class="card-text">Input {{ $ikan->created_at->diffForHumans() }} </p>
                  <a href="/akuarium/{{ $ikan->slug }}" class="text-decoration-none btn btn-dark shadow ">See More</a>
                </div>
              </div>
            </div>
            @endforeach
    </div>
</div> 
@else
  <p style="color: red" class="text-center fs-4">Ikan Tidak Tersedia.</p>
@endif
<br>
{{ $ikans->links() }}
@endsection