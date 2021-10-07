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
                        <h3 class="card-title">Post List</h3>
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
                
                  </div>
              <!-- /.card-header -->
              <div class="card-body pt-20">
                <table id="post-data-table" class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Category</th> 
                      <th>Tags</th> 
                      <th>Featured</th> 
                      <th>Created</th>
                      <th>Author</th> 
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($posts->count())
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->title }}</td>
                      <td>
                        <div style="max-width: 70px;  max-height:70px; overflow:hidden">
                          <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                        </div>
                      </td>
                      <!--<td>{{ $post->category_id }}</td>
                      <td>{{ $post->category }}</td>-->
                      <td>{{ $post->category->name }}</td> 
                      <td>
                        @foreach($post->tags as $tag)
                          <span class="badge badge-primary">{{ $tag->name }}</span>
                        @endforeach
                      </td> 
                      <!-- <td>{{ $post->user }}</td> -->
                      <td>
                        <input type="checkbox" data-toggle="toggle" data-style="ios" data-size="xs">
                      </td>
                      <td>{{ $post->created_at->format('d M, Y') }}</td>
                      <td>{{ $post->user->name }}</td>
                      <td class="d-flex">
                        <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('post.edit',[ $post->id ]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('post.destroy', [$post->id]) }}" method="POST" class="mr-1">
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
                          <h5 class="text-center">No Posts Found.</h5>
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
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#post-data-table').DataTable();
} );
</script>
@endsection


<!-- Toogle Button add using bootstrap
 ** https://gitbrent.github.io/bootstrap4-toggle/ --> 