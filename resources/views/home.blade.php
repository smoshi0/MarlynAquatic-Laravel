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
    <link rel="icon" href="img/icon.png"/>
  </head>
  <body>

    @include('partials.navbar')
<!-- Masthead-->
<header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">CARI TAHU APA YANG KAMU MAU DI MARLYN AQUATIC!</h1>
                                <a href="/akuarium" class="btn btn-primary text-white btn-outline-dark">Lihat Akuarium</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="justify-content-center m-auto text-primary mb-5">
                    <h3>Mengapa Harus Marlyn Aquatic?</h3>
                </div>
                <div class="row">
                    <div data-aos="fade-up" class="col-lg-3" data-aos-duration="2000">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3" >
                            <div class="features-icons-icon d-flex"><i class="bi-star m-auto text-primary"></i></div>
                            <h3>Kualitas</h3>
                            <p class="lead mb-0">Memberikan kualitas ikan hias yang sangat baik.</p>
                        </div>
                    </div>
                    <div class="col-lg-3" data-aos="fade-up" data-aos-duration="2000">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3" >
                            <div class="features-icons-icon d-flex"><i class="bi-check-circle m-auto text-primary"></i></div>
                            <h3>Pemeliharaan</h3>
                            <p class="lead mb-0">Memelihara ikan secara teratur dan rutin.</p>
                        </div>
                    </div>
                    <div class="col-lg-3" data-aos="fade-up" data-aos-duration="2000">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-3" >
                            <div class="features-icons-icon d-flex"><i class="bi-arrow-down-square m-auto text-primary"></i></div>
                            <h3>Ikan Import</h3>
                            <p class="lead mb-0">Memberikan ikan hias hasil import dengan kualitas terbaik.</p>
                        </div>
                    </div>
                    <div class="col-lg-3" data-aos="fade-up" data-aos-duration="2000">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3" >
                            <div class="features-icons-icon d-flex"><i class="bi-truck m-auto text-primary"></i></div>
                            <h3>Pengiriman Seluruh Indonesia</h3>
                            <p class="lead mb-0">Mampu melayani pengiriman ke seluruh wilayah Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-center bg-light mb-5">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>
                
                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/small-fish.jpg" alt="Los Angeles" class="d-block" style="width:100%">
                    <div class="carousel-caption">
                      <h3>Menampilkan Ikan dengan Ukuran Relatif Kecil</h3>
                      <a href="/akuarium?kategori=small-fish" class="btn btn-dark text-decoration-none btn-outline-primary text-white">Small Fish</a>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="img/medium-fish.jpg" alt="Chicago" class="d-block" style="width:100%">
                    <div class="carousel-caption">
                      <h3>Menampilkan Ikan Dengan Ukuran Sedang</h3>
                      <a href="/akuarium?kategori=medium-fish" class="btn btn-dark text-decoration-none btn-outline-primary text-white">Medium Fish</a>
                    </div> 
                  </div>
                  <div class="carousel-item">
                    <img src="img/big-fish.jpg" alt="New York" class="d-block" style="width:100%">
                    <div class="carousel-caption">
                      <h3>Menampilkan Ukuran Ikan Besar</h3>
                      <a href="/akuarium?kategori=big-fish" class="btn btn-dark text-decoration-none btn-outline-primary text-white">Big Fish</a>
                    </div>  
                  </div>
                </div>
                
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </button>
              </div>
        </section>

        <section class="text-center my-4">
          <div class="container">
            <div class="row">
              <h2 class="mb-5">Ikan Terbaru!</h2>
            </div>
            <div class="row">
              @foreach ($akuariums->take(3) as $akuarium)
                  
              <div class="col-lg-4 mb-5">
                <div class="card rounded-top rounded-4 shadow">
                  
                  @if ($akuarium->image)
                  <img src="{{ asset('storage/' . $akuarium->image) }}" alt="{{ $akuarium->kategori->nama_kategori }}" class="img-fluid rounded-5 rounded-top">
                  @else
                  <img src="https://source.unsplash.com/500x500?{{ $akuarium->kategori->nama_kategori }}" class="card-img-top rounded-5 rounded-top" alt="{{ $akuarium->kategori->nama_kategori }}">
                  @endif

                  <div class="card-body">
                    <h5 class="card-title">{{ $akuarium->nama_ikan }}</h5>
                  </div>
                  <div class="card-footer border-0">
                    <small class="text-muted">Last Inputed {{ $akuarium->created_at->diffForHumans() }}</small>
                  </div>
                </div>
              </div>

              @endforeach
            </div>
          </div>
        </section>
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Kenali Kami Lebih Jauh!</h2>
                <div class="row">
                    <div class="col-lg-4" data-aos="zoom-out-up" data-aos-duration="1000">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" data-micron="jerk" src="img/testimonials-1.jpg" alt="..." />
                            <h5>Margaret E.</h5>
                            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="zoom-out-up" data-aos-duration="1000">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" data-micron="jerk" src="img/testimonials-2.jpg" alt="..." />
                            <h5>Fred S.</h5>
                            <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="zoom-out-up" data-aos-duration="1000">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" data-micron="jerk" src="img/testimonials-3.jpg" alt="..." />
                            <h5>Sarah W.</h5>
                            <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('partials.footer')

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
