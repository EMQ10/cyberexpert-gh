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
                  <!-- jquery validation -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title" style="font-size:20px;color:#006680; text-transform:uppercase">expert Edit</h3>
                      <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('experts.show',$expert->id) }}"><i class="fa fa-eye"></i></a>
                    </div>
                    </div>
                    <div class="card-body">


                                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('experts.update',$expert->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Full Name:</strong>
                                    <input type="text" name="name" class="form-control" value="{{ $expert->name }}">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <strong>Years of Experience:</strong>
                                <div class="input-group-append">
                                    <input type="number" name="years_of_experience" class="form-control" value="{{ $expert->years_of_experience }}">
                                        <span class="input-group-text">Years</span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <strong>Contact:</strong>
                                    <input type="number" name="contact" class="form-control" value="{{ $expert->contact }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" class="form-control" value="{{ $expert->email }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Area of expertise (Multiple)</label>
                                  <div class="select2-blue">
                                  <select class="select2" multiple="multiple" name="area_id[]" data-placeholder="Select Area (s) of expertise" value="{{ old('area_id[]') }}" data-dropdown-css-class="select2-blue" style="width: 100%;">
                                      @foreach ($expertise as $area)
                                      <option value="{{ $area->id }}">{{ $area->name }}</option>
                                      @endforeach
                                  </select>
                                  </div>
                              </div>
                          </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Profile Message</label>
                                  <textarea class="form-control" name="profile_message" rows="5">{{ $expert->profile_message }}</textarea>
                                </div>
                              </div>



                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                  <!-- /.card -->
                <!--/.col (left) -->
                <div class="row">

                  <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <strong>Current Area(s) of Expertise:</strong>
                        <div class="lgs">
                           @if(!empty($expert->area))
                                @foreach($expert->area  as $expertise)
                                <form action="{{ route('expertise.remove') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="col-sm-12 p-0">
                                        <input type="text" name="expert_id" class="form-control" value="{{ $expert->id }}" hidden>
                                    </div>
                                    <label class="lang">{{ $expertise->name}}
                                        <input type="text" name="expertise" class="lang" value="{{ $expertise->id }}" hidden>

                                        <button type="submit" class="btn p-0"><span style="color: red" class="close">&times;</span></button>
                                    </label>
                                </form>
                                @endforeach
                            @endif
                        </div>

                        {{-- {{ $expert->area->name }} --}}
                    </div>
                </div>

                {{-- </form> --}}
            </div>

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
