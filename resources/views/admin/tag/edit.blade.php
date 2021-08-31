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
          <li class="breadcrumb-item active">Category</li>
          <li class="breadcrumb-item active">Edit Category</li>
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
                    <h3 class="card-title">Edit Category - {{ $category->name }}</h3>
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Go Back to Category List</a>
            
              </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
          <!-- form start -->
          <div class="row">
              <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
              <form action="{{ route('category.update', [$category->id]) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="card-body">
              @include('includes.errors')
              <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="description">Enter Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="Enter Description" rows="4">{{ $category->description }}</textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-lg btn-primary">Update Category</button>
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