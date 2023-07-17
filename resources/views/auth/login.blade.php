@extends('layouts2.master')
@section('content')
    <main id="main">

        <!-- ======= Login Section ======= -->
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5" style="margin-top:100px;">
                        <img src="assets/img/kegiatan10.png" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="margin:10px; margin-top:100px">

                        <div class="card-body">
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <h1 class="lead fw-normal mb-0 me-3">Sign in</h1>
                            </div><br>
                            <p>
                                Login dikhususkan untuk Anggota Rescue020 dan Admin... Terima kasih !!!
                            </p><br>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Username input -->
                                <div class="row mb-3">
                                    <div class="form-outline mb-4">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Username"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password input -->
                                <div class="row mb-3">
                                    <div class="form-outline mb-4">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="form-outline mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="form-outline mb-4">
                                        <button type="submit" name="login" class="btn btn-primary mb1 bg-orange btn-lg"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;background:#f25c00">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Login Section -->

    </main><!-- End #main -->
@endsection
