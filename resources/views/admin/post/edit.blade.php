@extends('layouts.admintemplate')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Post</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
          <li class="breadcrumb-item active">Post</li>
          <li class="breadcrumb-item active">Edit Post</li>
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
                    <h3 class="card-title">Edit Post - {{ $post->title }}</h3>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Post List</a>
            
              </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
          <!-- form start -->
          <div class="row">
              <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
              <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
              @include('includes.errors')

              <div class="form-group">
                <label for="category">Post Title</label>
                <input type="text" class="form-control" id="category" name="title" value="{{ $post->title }}" placeholder="Enter Title">
              </div>

              <div class="form-group">
                <label for="title">Post Category</label>
                <select name="categoryid" id="category" class="form-control">
                  <option value="" selected style="display:none;">Select Category</option>
                  @foreach($categories as $c)
                    <option value="{{ $c->id }}" @if($post->category_id == $c->id) selected @endif> {{ $c->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-8">
                  <label for="image">Image Upload</label>
                <input type="file" name="image" id="image" class="form-control-file"> 
                  </div>
                  <div class="col-4 text-right">
                    <div style="max-width: 100px;  max-height:100px; overflow:hidden; margin-left:auto;">
                      <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                    </div>
                  </div>
                </div>
             
              </div>

              <div class="form-group">
                <label for="description">Enter Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="Enter Description" rows="4">{{ old('description') }}</textarea>
              </div>
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