@extends('layouts.admintemplate')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">View Message</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('website') }}">Message</a></li>
          <li class="breadcrumb-item active">Message</li>
          <li class="breadcrumb-item active">View Message</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">View Message</h3>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary">Go Back to Message List</a>
            
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-primary">
                        <tbody>
                            <tr>
                                <th style="width:250px;">Name</th>
                                <td>{{ $message->name }}</td>
                            </tr>
                            <tr>
                                <th style="width:250px;">Email</th>
                                <td>{{ $message->email }}</td>
                            </tr>
                            <tr>
                                <th style="width:250px;">Subject</th>
                                <td>{{ $message->subject }}</td>
                            </tr>
                            <tr>
                                <th style="width:250px;">Description</th>
                                <td>{!! $message->message !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
          </div>
      </div>
    
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection