@extends('layouts.dashboard-page.main')

@section('page-content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Messages</h1>
        </div>
        <div class="col-sm-6">
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
        <div class="col-12">

          <!-- /.card -->
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p style="color: white; font-size:20px">{{ $message }}</p>
            </div>
            @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="font-size:20px;color:#006680; text-transform:uppercase">Message Table</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive text-nowrap">
                <thead>
                <tr>
                  <th>S/n</th>
                  <th>To Expert</th>
                  <th>Status</th>
                  <th>Subject</th>
                  <th>Client's Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($messages as $key => $message)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $message->expert_name }}</td>
                            @if ($message->status == 1)
                            <td><label style="color: green">Mailed</label></td>
                            @else
                            <td>
                                <b class="btn btn-outline-success">New</b>
                            </td>
                            @endif

                            <td> <b></b>{{ $message->subject}}</td>
                            <td>{{ $message->name }}</td>

                            <td>{{ $message->created_at }}</td>

                            <td>
                            <a class="btn btn-info" href="{{ route('message.show',$message->id) }}"> <i class="fa fa-eye"></i></a>
                            {{-- <a class="btn btn-primary" href="{{ route('messages.edit',$message->id) }}"><i class="fa fa-pen"></i></a> --}}
                                {{-- <a class="btn btn-success" href="{{ route('messages.destroy',$message->id) }}"><i class="fa fa-trash"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>S/n</th>
                    <th>To Expert</th>
                    <th>Subject</th>
                    <th>Client's Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
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
