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

                        <form action="" method="post">
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <h1 class="lead fw-normal mb-0 me-3">Sign in</h1>
                            </div><br>
                            <p>
                                Login dikhususkan untuk Anggota Rescue020 dan Admin... Terima kasih !!!
                            </p>
                            <?php
                            if ($err) {
                                echo "<ul>$err</ul>";
                            }
                            ?>

                            <!-- Username input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="username" value="<?php echo $username; ?>" id="form3Example3"
                                    class="form-control form-control-lg" placeholder="Username" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" name="password" id="form3Example4"
                                    class="form-control form-control-lg" placeholder="Password" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" name="login" class="btn btn-primary mb1 bg-orange btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;background:#f25c00">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                        class="link-danger">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Login Section -->

    </main><!-- End #main -->
@endsection
