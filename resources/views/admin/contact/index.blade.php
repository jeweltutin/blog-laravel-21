@extends('layouts.admintemplate')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
              <li class="breadcrumb-item active">Message</li>
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
                        <h3 class="card-title">Message List</h3>
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Create Message</a>
                
                  </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th> 
                      <th>Message</th> 
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($messages->count())
                    @foreach ($messages as $msg)
                    <tr>
                      <td>{{ $msg->id }}</td>
                      <td>{{ $msg->name }}</td>
                      <td>{{ $msg->email }}</td> 
                      <td> {{ $msg->subject }} </td> 
                      <td>{{ $msg->message }}</td>
                      <td class="d-flex">
                        <a href="{{ route('contact.show', ['id' => $msg->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('contact.destroy', ['id' => $msg->id]) }}" method="POST" class="mr-1">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>                  
                      </td>
                    </tr>
                    @endforeach
                    @else
                      <tr>
                        <td colspan="6">
                          <h5 class="text-center">No Messages Found.</h5>
                        </td>
                      </tr>

                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    @endsection

  
@section('style')
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
    .toggle.ios .toggle-handle { border-radius: 20rem; }
  </style>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection


<!-- Toogle Button add using bootstrap
 ** https://gitbrent.github.io/bootstrap4-toggle/ --> 