@extends('layouts.landing-page.layout')

@section('pagecontent')


<!-- Contact Start -->
<div class="container-fluid bg-light py-5">
    <hr style="color: #006680">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-3  fadeInLeft" data-wow-delay="0.2">

            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="appointment-form rounded">
                    <a href="/" style="color: white" class="btn btn-primary right pr-2"><i class="fa fa-arrow-left"></i></a>

                    <p class="fs-4 text-uppercase text-primary">Message</p>

                    <div class="flex-container">
                        <div class="flex-item-left">
                            <img src="{{ asset('/storage/images/'.$expert->picture) }}" class=" mm rounded" style="object-fit: cover;" alt="Expert Image">
                        </div>
                        <div class="flex-item-right">
                            <h4 class="sub-title">Expert</h4>
                            <a href="{{ route('expert.profile',$expert->id) }}" style="font-size:20px" class="btn btn-primary right square-pill text-white py-0 px-2 mb-0"><i class="fa fa-eye"></i></a>

                            <h4>{{ $expert->name }}</h4>
                            <h6 style="color: #006680"> <i class="fa fa-star"></i> {{ $expert->years_of_experience }} years experience</h6>
                        </div>
                    </div>

                    <hr style="color: #006680">

                    <form action="{{ route('expertise.message.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row gy-3 gx-4">

                            <input type="text" name="expert_name" class="form-control" value="{{ $expert->name }}" hidden>
                            <input type="email" name="expert_email" class="form-control" value="{{ $expert->email }}" hidden>
                            <input type="text" name="expert_id" class="form-control" value="{{ $expert->id }}" hidden>


                            <div class="col-xl-8">
                                <div class="form-group">
                                <input type="text" name="name" class="form-control py-3 border-primary bg-transparent " style="color: #006680" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group">
                                <input type="number" name="phone" class="form-control py-3 border-primary bg-transparent " style="color: #006680" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-xl-9">
                                <div class="form-group">
                                <input type="email" name="email" class="form-control py-3 border-primary bg-transparent" style="color: #006680" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <select class="form-select py-3 border-primary bg-transparent" style="color: #006680" name="gender" aria-label="Default select example">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                <input type="text" name="subject" class="form-control py-3 border-primary bg-transparent" style="color: #006680" placeholder="Subject">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                <textarea class="form-control border-primary bg-transparent " name="message" id="area-text" style="color: #006680" cols="30" rows="5" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary text-white w-100 py-3 px-5">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Contact End -->

        @include('layouts.landing-page.footer')

        @endsection
