@extends('layouts.admintemplate')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">Create User</li>
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
                            <h3 class="card-title">Create User</h3>
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Go Back to User List</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <!-- form start -->
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('user.store') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name">User Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">User Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">User Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Enter Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Enter About yourself</label>
                                                <textarea name="bio" class="form-control" id="description"
                                                    placeholder="Enter About" rows="4">{{ $user->bio }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
</div></div>
        <!-- /.content -->
        @endsection