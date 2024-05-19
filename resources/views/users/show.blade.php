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
                        <h3 class="card-title" style="font-size:20px;color:#006680; text-transform:uppercase">User Details</h3>
                        <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                    </div>
                    </div>
        </div>


      <div class="row">
        <div class="col-md-3">
          <!-- /.card -->
          @if ($message = Session::get('success'))
            <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
            </div>
            @endif

{{-- profile --}}


          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class=" img-fluid"
                     src="../../img/teacher.jpg"
                     alt="User profile picture">
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Full Name:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Email Address:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Role:</strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <strong class="badge  text-dark" style="font-size: 16px">{{ $v }}</strong>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <strong>Created on:</strong>
                            {{ $user->created_at }}
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
