<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://unpkg.com/webkul-micron@1.1.6/dist/css/micron.min.css" type="text/css" rel="stylesheet">
        <script src="https://unpkg.com/webkul-micron@1.1.6/dist/script/micron.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}


    <title>Marlyn Aquatic | {{ $title }}</title>
    <link rel="icon" href="{{ asset('img/icon.png') }}"/>
  </head>
  <body>

    @include('partials.navbar')

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h3 class="text-center mt-3">{{ $ikan->nama_ikan }}</h3>
                @if ($ikan->image)
                <div style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/' . $ikan->image) }}" alt="{{ $ikan->kategori->nama_kategori }}" class="img-fluid">
                </div>
                @else
                <img src="https://source.unsplash.com/900x300?{{ $ikan->kategori->nama_kategori }}" alt="{{ $ikan->kategori->nama_kategori }}" class="img-fluid">
                @endif
                

                <h5 class="mt-3">Kategori <a href="/akuarium?kategori={{ $ikan->kategori->slug }}" class="text-decoration-none">{{ $ikan->kategori->nama_kategori }}</a> {{ $ikan->created_at->diffForHumans() }}</h5>
                <h6>Akuarium Kode : {{ $ikan->kode_akuarium }}</h6>
                <h6>Jumlah Ikan : {{ $ikan->jumlah_ikan }}</h6>
                <h6>Harga Satuan : Rp.{{ $ikan->harga_ikan }},00.</h6>
        
        
                <a href="/akuarium" class="text-decoration-none btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    <div style="height: 100px"></div>


    
    <footer class="footer bg-dark mt-3" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2 text-primary">
                        <p>Jl. Babakan Desa No.29, Pasir Biru, Kec. Cibiru, Kota Bandung, Jawa Barat 40615</p>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Marlyn Aquatic 2022. All Rights Reserved.</p>
                </div>
                <div class="col-lg-3 d-flex justify-content-center mb-3">
                    <img class="rounded-circle" style="width: 150px; height: 150px" src="{{ asset('img/logo.jpeg') }}" alt="">
                </div>
                <div class="col-lg-3 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-whatsapp fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script>
        AOS.init();
      </script>
    {{-- <script src="/js/feather.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  </body>
</html>
