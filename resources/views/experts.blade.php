@extends('layouts.landing-page.layout')

@section('pagecontent')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s"></h1>
        </div>
    </div>
    <!-- Header End -->
        <!-- Experts Start -->
        <div class="container-fluid service py-5 ">
            <div class="container">
                <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="sub-style">
                        <h4 class="sub-title px-3 mb-0">EXPERTS</h4>
                    </div>
                    {{-- <h3 class="display-7 mb-2 mt-4">Our Team of experts are always ready to assist you.</h3> --}}
                </div>

                {{-- filter start --}}

                    <div class="row mb-1">
                       <div class="col-md-5 form-group">
                        <form action="{{ route("home") }}" method="get">
                           <strong class="s">Search by Area of Expertise</Strong>
                            <div class="container-flex">
                                <select name="area_id" class="form-select" style="border-radius: 0">
                                    @foreach (\App\Models\Area::all() as $item)
                                    <option value="{{ $item->id }}" {{ $request->id === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <input style="border-radius: 0" type="submit" class="btn btn-primary" value="Search">
                            </div>
                        </form>
                    </div>

                        <div class="col-md-5 form-group">
                            <strong class="s">Search by Name of Expert</Strong>
                                <form action="{{ route("home") }}" method="get">
                            <div class="container-flex">
                                <input name="name" type="text" style="border-radius: 0" class="form-control search"   placeholder="ie. Abubakar Issaka" id="name">
                                <input style="border-radius: 0" type="submit" class="btn btn-primary" value="Search">
                            </div>
                        </form>

                        </div>
                        <div class="col-md-2 form-group">
                            <a href="/"  class="btn btn-primary mt-4">Reset</a>
                        </div>
                            @if ($request->area_id)
                            <div class="mt-3">
                                <p>Search results for : <strong style="color: #006680">{{ $exp->name }}</strong></p>
                            </div>
                            @endif
                    </div>


                    @if ($experts->isEmpty())
                    <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">

                        <h4 class="mb-2 mt-5" style="color: red">No result matches your search</h4>
                    </div>
                @else
                  {{--filter End  --}}
                <div class="row g-4 mt-2 justify-content-center">

                    @foreach ($experts as $key => $expert)

                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded">
                           <div class="service-img rounded-top">
                             @if ($expert->picture != null)
                                <img src="{{ asset('/storage/images/'.$expert->picture) }}" class="img-fluid rounded-top w-100" alt="">
                                @else
                                <img src="/img/teacher.jpg" class="img-fluid rounded-top w-100" alt="">
                                @endif
                            </div>
                            <div class="service-content rounded-bottom bg-light p-4">
                                <div class="service-content-inner">
                                    <h5 class="mb-4">{{ $expert->name }}</h5>
                                    <p>
                                        <div style="text-align: center; color:#006680; font-weight:bold"> Area(s) of Expertise</div>
                                        <hr class="mt-1">
                                        @if(!empty($expert->area))
                                            @foreach($expert->area  as $expertise)
                                                <li style="color: #006680">{{ $expertise->name}}</li>
                                            @endforeach
                                        @endif
                                        <hr>
                                    </p>
                                    {{-- <p class="mb-4" style="color: #006680">{{ $expert->area->name }}</p> --}}
                                    <p class="mb-4" style="color: #006680"><i class="fa fa-star"> {{ $expert->years_of_experience }} Years Of Experience</i></p>
                                    <a href="{{ route('expert.profile',$expert->id) }}" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
        <!-- Experts End -->


        @include('layouts.landing-page.footer')

        @endsection
