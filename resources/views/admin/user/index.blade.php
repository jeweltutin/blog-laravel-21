@extends('layouts.admintemplate')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categoy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                        <h3 class="card-title">User List</h3>
                        <a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
                
                  </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Email</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($users->count() > 0)
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>
                        <div style="max-width: 70px;  max-height:70px; overflow:hidden">
                          <img src="{{ asset($user->image) }}" class="img-fluid" alt="">
                        </div>
                      </td>
                      <td>{{ $user->email }}</td>
                      <td class="d-flex" style="width:150px;">
                        <a href="{{ route('user.edit',[ $user->id ]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('user.destroy', [$user->id]) }}" method="POST" class="mr-1">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        <a href="{{ route('user.show', [$user->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    @else
                      <tr>
                        <td colspan="5">
                          <h5 class="text-center">No Users Found.</h5>
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