@extends('layouts.dashboard-page.main')

@section('page-content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-5">
          <h1>Messages</h1>
        </div>
        <div class="col-sm-2">
                   <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
        </div>
        <div class="col-sm-5">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Messages</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <h5 style="color: #006080">Assigned Expert</h5>
                <hr>
                     <img src="{{ asset('/storage/images/'.$expert->picture) }}" class="img-fluid rounded-top w-100" alt="">
              </div>

              <hr style="color: #006080">
              <h3 class="profile-username text-center">{{$expert->name}}</h3>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-success card-outline">
            <div class="card-header p-2">
                <h5><b>Subject:</b> <strong class="color">{{ $message->subject }}</strong> </h5>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">
                    <!-- /.user-block -->
                    <p>
                     {{ $message->message }}
                    </p>
                    <p>
                      <a href="#" data-target="#modal-default" data-toggle="modal" class="text-md mr-2"><i class="fas fa-user mr-1"></i> Sent By : <b class="color">{{ $message->name }}</b></a>
                      <span class="float-right">
                        <a  class=" color text-md">
                          <i class="far fa-clock mr-1"></i>{{ $message->created_at }}
                        </a>
                      </span>
                    </p>

                  </div>
                  <!-- /.post -->
                </div>

              </div>
              @if ($message->status == 0)
              <button class="btn btn-info">Change Expert</button>
              <a class="btn btn-success" href="{{ route('expert.mail',$message->id) }}" class="btn btn-success">Mail to Expert</a>
              @else
              <h6> Status : <b style="color: green">Mailed</b></h6>
              @endif

              <!-- /.tab-content -->
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


<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">

              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Client's Details
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <hr>
                <div class="card-body pt-0" style="color: #006080">
                  <div class="row">
                    <div class="col-9">
                      <h6><b>Full Name: </b>{{ $message->name }}</h6>
                      <h6><b>Email: </b>{{ $message->email }}</h6>
                      <h6><b>Phone: </b>{{ $message->phone }}</h6>
                      <h6><b>Gender: </b>{{ $message->gender }}</h6>

                    </div>
                    <div class="col-3 text-center">
                      <img src="/img/teacher.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>

              </div>
            {{-- </div> --}}

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

      @endsection
