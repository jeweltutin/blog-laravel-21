@extends('layouts.admintemplate')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $postCount }}</h3>
                        <p>All Posts</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-pen-square"></i>
                    </div>
                    <a href="{{ route('post.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $categoryCount }}<sup style="font-size: 20px">*</sup></h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-check-circle"></i>
                    </div>
                    <a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $tagCount }}</h3>
                        <p>Tags</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-tags"></i>
                    </div>
                    <a href="{{ route('tag.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $userCount }}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-user"></i>
                    </div>
                    <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div style="padding-top:20px;" class="row justify-content-md-center">
            <div class="col-lg-11">          
                <div class="card card-primary card-outline">
                    <div class="card-body">
                      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

        

        <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Recent Posts</h3>
                        <a href="{{ route('post.index') }}" class="btn btn-primary">Post List</a>
                
                  </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Category</th> 
                      <th>Tags</th> 
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
                          <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
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

    </div><!-- /.container-fluid -->
</div>
</div>
<!-- /.content -->
@endsection

@section('script')
<script type="text/javascript">
  window.onload = function () {

  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2", // "light1", "dark1", "dark2"
    animationEnabled: false, // change to true		
    title:{
      text: "Post Chart"
    },
    data: [
    {
      // Change type to "bar", "area", "spline", "pie",etc.
      type: "column",
      dataPoints: [
        { label: "August",  y: 10  },
        { label: "September", y: 30  },
        { label: "October", y: {{ $postCount }}  },
        { label: "November",  y: 5  },
        { label: "December",  y: 3  }
      ]
    }
    ]
  });
  chart.render();
  }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
@endsection
