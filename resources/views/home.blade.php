@extends('layouts4.master')
@section('content')
    <main id="main" data-aos="fade-in"><br><br><br><br><br><br>

        <!-- ======= Founders Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{ __('Maaf anda tidak punya akses') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Founders Section -->
    </main>
@endsection
