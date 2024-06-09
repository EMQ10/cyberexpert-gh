@extends('layouts.dashboard-page.main')

@section('page-content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>experts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">experts</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->
          @if ($message = Session::get('success'))
            <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
            </div>
            @endif


                <!-- left column -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="font-size:20px;color:#006680; text-transform:uppercase">experts Create</h3>
                    </div>
                    <div class="card-body">

                    {{--
                                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <form action="{{ route('experts.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Full Name:</strong>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <strong>Years of Experience:</strong>

                                <div class="input-group-append">
                                    <input type="number" name="years_of_experience" class="form-control" value="{{ old('years_of_experience') }}" placeholder="ie.5">
                                        <span class="input-group-text">Years</span>
                                    @if ($errors->has('years_of_experience'))
                                        <span class="text-danger">{{ $errors->first('years_of_experience') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <strong>Contact:</strong>
                                    <input type="number" name="contact" class="form-control" value="{{ old('contact') }}" placeholder="ie.0241234567">
                                    @if ($errors->has('contact'))
                                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <strong>Picture:</strong>
                                <div class="form-group">
                                    <input type="file" name="picture" class="form-control p-1">
                                  </div>
                              </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Profile Message</label>
                                  <textarea class="form-control" name="profile_message" rows="5" value="{{ old('profile_message') }}" placeholder="Enter ..."></textarea>
                                </div>
                              </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Area of expertise (Multiple)</label>
                                    <div class="select2-blue">
                                    <select class="select2" multiple="multiple" name="area_id[]" data-placeholder="Select Area (s) of expertise" value="{{ old('area_id[]') }}" data-dropdown-css-class="select2-blue" style="width: 100%;">
                                        @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    @if ($errors->has('area'))
                                        <span class="text-danger">{{ $errors->first('area') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                  <!-- /.card -->
                <!--/.col (left) -->
            </div>

              </div>
              <!-- /.row -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->



@endsection
