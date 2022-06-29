@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Akuarium</h1>
  </div>

  <div class="col-lg-8 mb-5">
    <form method="post" action="/dashboard/akuarium/{{ $akuarium->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
              <label for="nama_ikan" class="form-label">Nama Ikan</label>
              <input type="text" class="form-control @error('nama_ikan') is-invalid @enderror" id="nama_ikan" name="nama_ikan" autofocus required value="{{ old('nama_ikan', $akuarium->nama_ikan) }}">
              @error('nama_ikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly required value="{{ old('slug', $akuarium->slug) }}">
              @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="kode_akuarium" class="form-label">Kode Akuarium</label>
              <input type="text" class="form-control @error('kode_akuarium') is-invalid @enderror" id="kode_akuarium" name="kode_akuarium" required value="{{ old('kode_akuarium', $akuarium->kode_akuarium) }}">
              @error('kode_akuarium')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="jumlah_ikan" class="form-label">Jumlah Ikan</label>
              <input type="number" class="form-control @error('jumlah_ikan') is-invalid @enderror" id="jumlah_ikan" name="jumlah_ikan" required value="{{ old('jumlah_ikan', $akuarium->jumlah_ikan) }}">
              @error('jumlah_ikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
        </div>
        <div class="mb-3">
              <label for="harga_ikan" class="form-label">Harga Satuan Ikan</label>
              <input type="number" min="0.00" max="100000.00" step="0.01" class="form-control @error('harga_ikan') is-invalid @enderror" id="harga_ikan" name="harga_ikan" required value="{{ old('harga_ikan', $akuarium->harga_ikan) }}">
              @error('harga_ikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
            </div>

        <div class="mb-3">
            <label for="Kategori" class="form-label">Kategori Ikan</label>
            <select class="form-select" name="kategori_id">
                  @foreach ($kategoris as $kategori)
                  @if (old('kategori_id', $akuarium->kategori_id) == $kategori->id)
                  <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}</option>
                  @else
                  <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                  @endif
                  @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Masukkan Gambar Ikan <small style="color: rgb(255, 0, 0)">(Boleh Dikosongkan)</small></label>
                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage()">
                <input type="hidden" name="oldImage" value="{{ $akuarium->image }}">
                @if ($akuarium->image)
                    <img src="{{ asset('storage/' . $akuarium->image) }}" class="img-preview img-fluid mt-3 col-sm-6">
                @else
                    <img class="img-preview img-fluid mt-3 col-sm-6">
                @endif
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror 
              </div>
            <button type="submit" class="btn btn-warning">Edit</button>
    </form>
        </div>

        <script>
            const nama_ikan = document.querySelector('#nama_ikan');
            const slug = document.querySelector('#slug');

            nama_ikan.addEventListener('change', function() {
                fetch('/dashboard/akuarium/checkSlug?nama_ikan=' + nama_ikan.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
            });

            function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview =  document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
            }
        </script>

@endsection