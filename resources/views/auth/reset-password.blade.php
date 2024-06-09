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
                            <p class="mb-4" style="color: #006680">{{ __('Please Enter a new Password. Choose a song password with more than 8 characters, containing capital letter, symbols ans numbers.') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="appointment-form rounded p-5">
                            <p class="fs-4 text-uppercase text-primary">Password Reset</p>
                             <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="row gy-3 gx-4">
                                    <div class="col-xl-12">
                                        <input id="email" type="email" style="color: #006680" name="email" :value="old('email', $request->email)" class="form-control py-3 border-primary bg-transparent mb-3" required autofocus autocomplete="username" >
                                    </div>
                                    <div class="col-xl-12">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <input id="password" class="form-control py-3 border-primary bg-transparent mb-3" type="password" name="password" required autocomplete="new-password" >
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-xl-12">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <input id="password_confirmation" class="form-control py-3 border-primary bg-transparent mb-3" type="password" name="password_confirmation" required autocomplete="new-password" >
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary text-white w-100 py-3 px-5">Reset Password</button>
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
