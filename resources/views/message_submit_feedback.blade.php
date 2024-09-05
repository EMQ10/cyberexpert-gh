@extends('layouts.landing-page.layout')

@section('pagecontent')


<!-- Contact Start -->

<div class="container-fluid  py-5">
    <hr style="color: #006680">
    <div class="container ">
        {{-- <div class="row g-5 align-items-center">
            <div class="col-lg-3  fadeInLeft" data-wow-delay="0.2">

            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="appointment-form rounded">
                    <a href="/" style="color: white" class="btn btn-primary right pr-2"><i class="fa fa-arrow-left"></i></a>

                    <p class="fs-4 text-uppercase text-primary">Message</p>

                    <hr style="color: #006680">

                    <h6>Thank you for your message, the expert will get back to you as soon as possible.</h6>

                    <button class="btn btn-primary"></button>

                </div>
            </div>

        </div> --}}

        <div class=content>
            <div class="wrapper-1">
              <div class="wrapper-2">
                <h3>Message Received !</h3>
                <p>We appreciate you reaching out.  </p>
                <p>The expert will contact and assist you soon.  </p>
                <p>Thank you</p>
                <button class="go-home">
                <a href="{{ route('home') }}">View Experts</a>
                </button>
              </div>

          </div>
          </div>
    </div>
</div>



<!-- Contact End -->
{{-- @include('layouts.landing-page.footer') --}}

@include('layouts.landing-page.inc.js')

        @endsection
