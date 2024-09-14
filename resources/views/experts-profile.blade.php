@extends('layouts.landing-page.layout')

@section('pagecontent')

        <!-- About Start -->
        <div class="container-fluid about service bg-light py-5">
            <hr style="color: #006680">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">

                        <div class="about-img pb-5 ps-5">
                            <img src="{{ asset('/storage/images/'.$expert->picture) }}" class="img-fluid " style="object-fit: cover;" alt="Expert Image">
                            <a href="{{ route('expert.message',$expert->id) }}" style="font-size:26px" class="btn btn-primary square-pill text-white py-0 px-2 mb-0 w-100 mes">Send Message</a>
                        </div>
                    </div>

                    <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="section-title text-start mb-5">
                            <h4 class="sub-title pe-3 mb-4">Expert Profile</h4>

                            <a href="/" style="color: white" class="btn btn-primary right"><i class="fa fa-arrow-left"></i></a>

                            <h3 class="display-7 mb-4">{{ $expert->name }}</h3>
                            <h5 class="mb-4 display-7 "><i class="fa fa-star" style="color: gold"></i><b> {{ $expert->years_of_experience }} years experience <b> in the field of cyber security</h5>

                            <p style="color: black"> <strong class="s">Areas of Expertise:</strong> </p>
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
