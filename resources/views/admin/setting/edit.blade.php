@extends('layouts.admintemplate')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Post</li>
                    <li class="breadcrumb-item active">Settings</li>
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
                            <h3 class="card-title">Settings - {{ $setting->name }}</h3>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Post List</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('setting.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                            @include('includes.errors')

                                            <div class="form-group">
                                                <label for="category">Site Name</label>
                                                <input type="text" class="form-control" id="category" name="name"
                                                    value="{{ $setting->name }}" placeholder="Enter Title">
                                            </div>
                                </div>
                            </div>
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Footer Secial Media settings</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            value="{{ $setting->facebook }}" placeholder="Enter Facebook url">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            value="{{ $setting->twitter }}" placeholder="Enter Twitter url">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="reddit">Reddit</label>
                                        <input type="text" class="form-control" id="reddit" name="reddit"
                                            value="{{ $setting->reddit }}" placeholder="Enter Reddit url">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                            value="{{ $setting->instagram }}" placeholder="Enter Instagram url">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $setting->email }}" placeholder="Enter Email url">
                                    </div> -->
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email"  value="{{ $setting->email }}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="copyright">Copyright</label>
                                        <input type="text" class="form-control" id="copyright" name="copyright"
                                            value="{{ $setting->copyright }}" placeholder="Enter Copyright text">
                                    </div>
                                </div>
                            </div>
                            <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Website logo set</h3>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- <div class="col-8">
                                        <label for="logo">Site Logo</label>
                                        <input type="file" name="site_logo" id="image" class="form-control-file">
                                    </div> -->
                                    <div class="col-8">
                                        <label for="logo">Site Logo</label>
                                        <div class="custom-file">
                                            <input type="file" name="site_logo" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div
                                            style="max-width: 200px;  max-height:100px; overflow:hidden; margin-left:auto;">
                                            <img src="{{ asset($setting->site_logo) }}" class="img-fluid" alt="">
                                        </div>
                                    </div> 
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="description">Enter Description</label>
                                <textarea name="about_site" class="form-control" id="description"
                                    placeholder="Enter Description" rows="4">{{ $setting->about_site }}</textarea>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-lg btn-primary">Update Post</button>
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
<!-- /.content -->
@endsection
