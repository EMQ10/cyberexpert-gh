@extends('layouts.landing-page.layout')

@section('pagecontent')

        <!-- About Start -->
        <div class="container-fluid about service bg-light py-5">
            <hr style="color: #006680">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">

                        <div class="about-img pb-5 ps-5">
                            <img src="{{ asset('/storage/images/'.$expert->picture) }}" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Expert Image">
                            <div class="about-experience">{{ $expert->years_of_experience }} years experience</div>
                        </div>
                    </div>

                    <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="section-title text-start mb-5">
                            <h4 class="sub-title pe-3 mb-4">Expert Profile</h4>
                            <h3 class="display-7 mb-4">{{ $expert->name }}</h3>
                            <p style="color: black"> <strong class="s">Expertise:</strong> </p>
                            {{-- <strong>Area(s) of Expertise:</strong> --}}
                                                <p style="display: flex;
                                                flex-wrap: wrap;">
                                                   @if(!empty($expert->area))
                                                        @foreach($expert->area  as $expertise)
                                                            <label style="text-transform: capitalize !important;
                                                            color: #006680;
                                                            border: 1px solid  #006680;
                                                            border-radius: 3px;
                                                            margin-right: 5px;
                                                            padding: 5px;" class="mb-2">{{ $expertise->name}}</label>
                                                        @endforeach
                                                    @endif
                                                </p>
                            <strong style="color: #006680">Profile</strong>
                            <p style="color: black" class="mb-4">{{ $expert->profile_message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        @include('layouts.landing-page.footer')

        @endsection
