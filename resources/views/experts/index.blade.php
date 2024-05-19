@extends('layouts.dashboard-page.main')

@section('page-content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Experts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Experts</li>
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

          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="font-size:20px;color:#006680; text-transform:uppercase">Experts Table</h3>
              <div class="float-right">
                <a class="btn btn-success" href="{{ route('experts.create') }}"> Create New Expert</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Area of Expertise</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($experts as $key => $expert)
                        <tr>
                            <td>{{ $expert->name }}</td>
                            <td>{{ $expert->email }}</td>
                            <td>{{ $expert->area->name }}</td>
                            <td>{{ $expert->created_at }}</td>

                            <td>
                            <a class="btn btn-info" href="{{ route('experts.show',$expert->id) }}"> <i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary" href="{{ route('experts.edit',$expert->id) }}"><i class="fa fa-pen"></i></a>
                                {{-- <a class="btn btn-success" href="{{ route('experts.destroy',$expert->id) }}"><i class="fa fa-trash"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Area of Expertise</th>
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
