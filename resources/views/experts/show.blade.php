@extends('layouts.dashboard-page.main')

@section('page-content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
 <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                        <h3 class="card-title pt-2" style="font-size:20px;color:#006680; text-transform:uppercase">Expert Details</h3>
                        <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('experts.index') }}"> Back</a>
                        <a class="btn btn-primary" href="{{ route('experts.edit',$expert->id) }}"><i class="fa fa-pen"></i></a>

                    </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
        <p>{{ $message }}</p>
        </div>
        @endif


                        <div class="row">
                            <div class="col-md-3">
                            <!-- /.card -->


                    {{-- profile --}}


                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class=" img-fluid"
                                    src="{{ asset('/storage/images/'.$expert->picture) }}"  alt="Expert picture">
                                </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <form action="{{ route('picture',$expert->id) }}" method="POST" id="quickForm" enctype="multipart/form-data">
                                @csrf
                            <hr style="color: #006680">
                            <div class="">
                                <strong>Update Picture</strong>
                                <div class="form-group">
                                    <input type="file" name="picture" class="form-control p-1">
                                  </div>
                              </div>
                              <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <hr style="color: #006680">
                            </form>

                            <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                            <div class="card">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-8 mb-3">
                                            <div class="form-group">
                                                <strong>Full Name:</strong>
                                                {{ $expert->name }}
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <div class="form-group">
                                                <strong>Years Of Experience:</strong>
                                                {{ $expert->years_of_experience }} Years
                                            </div>
                                        </div>
                                        <div class="col-sm-8 mb-3">
                                            <div class="form-group">
                                                <strong>Area of Expertise:</strong>
                                                {{ $expert->area->name }}
                                            </div>
                                        </div>

                                        <div class="col-sm-4 mb-3">
                                            <div class="form-group">
                                                <strong>Contact:</strong>
                                                {{ $expert->contact }}
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <div class="form-group">
                                                <strong>Email Address:</strong>
                                                {{ $expert->email }}
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mb-3">
                                            <div class="form-group">
                                                <strong>Profile Message:</strong>
                                                {{ $expert->profile_message}}
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <div class="form-group">
                                                <strong>Added By:</strong>
                                                {{ $expert->user->name}}
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mb-3">
                                            <div class="form-group">
                                                <strong>Created on:</strong>
                                                {{ $expert->created_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                    {{-- profile end --}}




@endsection
