@extends('layouts.main')

@section('container')
<div class="row justify-content-center ">
    <div class="col-md-5">
        <main class="form-registration border mt-3 p-5 shadow">
          <div class="text-center">
            <img src="{{ asset('img/logo.jpeg') }}" alt="" style="width: 30%">
          </div>
            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
            <form class="mb-2" action="/register" method="POST">
                @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror   
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror  
              </div>
              {{-- <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror  
              </div> --}}
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                @enderror  
              </div>
              <div class="">
                <div class="my-2">Level : </div>
                <select name="level" id="level" class="form-control form-select rounded-bottom">
                  <option value="f_manajer">Fish Manajer</option>
                  <option value="courier">Courier</option>
                </select>
              </div>
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
             </form>
             <small class="d-block text-center">Sudah Registrasi?? Klik <a href="/login" class="text-decoration-none">Di Sini</a></small>
          </main>

    </div>
</div>
<div style="height:250px"></div>
@endsection