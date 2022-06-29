@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">

      @if (session()->has('success'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      

        <main class="form-signin border p-5 shadow mt-3">
          <div class="text-center">
            <img src="{{ asset('img/logo.jpeg') }}" alt="" style="width: 30%">
          </div>
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <form class="mb-2" action="/login" method="POST">
              @csrf
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror  
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember" name="remember"> Remember me
                </label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
             </form>
             <small class="d-block text-center">Belum Registrasi? Klik <a href="/register" class="text-decoration-none">Di Sini</a></small>
          </main>

    </div>
</div>
<div style="height:250px"></div>
@endsection