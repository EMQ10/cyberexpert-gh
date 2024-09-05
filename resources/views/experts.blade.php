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
                            <h5 class="p-3 m-0 text-center text-light name">{{ $expert->name }}</h5>

                            <div class="service-content border border-primary rounded-bottom bg-light p-4">

                                <div class="service-content-inner">
                                    <p class="mb-4" style="color: #006680"><i class="fa fa-star"> {{ $expert->years_of_experience }} Years Of Experience</i></p>
                                    <p>
                                        <div style="text-align: center; color:#006680; font-weight:bold"> Area(s) of Expertise
                                        <button class="btn btn-outline-primary expertise rounded-pill" value="{{ $expert->id }}" ><i class="fa fa-arrow-down"></i></button></div>
                                        <hr>
                                    </p>
                                    <a href="{{ route('expert.message',$expert->id) }}" style="font-size:26px" class="btn btn-primary  square-pill text-white py-0 px-2 mb-0"><i class="fa fa-envelope"></i></a>
                                    <a href="{{ route('expert.profile',$expert->id) }}" class="btn btn-primary square-pill text-white  right float-right py-2 px-4 mb-2">Read More</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>

{{-- Expertise modal --}}

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title row" id="staticBackdropLabel">
                        <input id="mini" style="width: max-content" type="text" value=""></h5>
                    </div>
                    <div class="modal-body">
                        <p style="display: flex; flex-wrap: wrap;"id="list"></p>
                        <span type="button" class="btn btn-danger right" data-bs-dismiss="modal">Close</span>

                    </div>
                    {{-- <div class="modal-footer">
                    </div> --}}
                  </div>
                </div>
              </div>

        </div>
        <!-- Experts End -->


        @include('layouts.landing-page.footer')

        @endsection
