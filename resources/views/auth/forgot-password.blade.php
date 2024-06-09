@extends('layouts.landing-page.layout')

@section('pagecontent')

        <div class="container-fluid about service bg-light py-5">
            <hr style="color: #006680">
            <div class="container py-5">
                <div class="row align-items-center">

        <div class="container-fluid appointment py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2">
                        <div class="section-title text-start">
                            <p class="mb-4" style="color: #006680">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="appointment-form rounded p-5">
                            <p class="fs-4 text-uppercase text-primary">Forgot Password</p>
                             <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row gy-3 gx-4">
                                    <div class="col-xl-12">
                                        <input id="email" type="email" name="email" :value="old('email')" required autofocus class="form-control py-3 border-primary bg-transparent mb-3" placeholder="Enter Email Address">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary text-white w-100 py-3 px-5">Email Password Reset Link</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                </div>
            </div>
        </div>
        <!-- About End -->

        @include('layouts.landing-page.footer')

        @endsection
