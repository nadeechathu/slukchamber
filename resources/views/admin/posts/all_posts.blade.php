@extends('admin.layouts.app')

@section('content')
<section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary mt-3">
            <div class="card-header content-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3 class="card-title">Posts<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Posts</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                @include('admin.common.alerts')
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 text-end mt-1">
                  @include('admin.posts.components.filters')
                  @can('create-posts')
                      <a href="{{route('admin.posts.new')}}"><button class="btn btn-dark mx-2" type="button"><i class="fa fa-edit"></i> Create Post</button></a>
                  @endcan
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                      <th style="width: 10px">Id</th>
                      <th>Banner Image</th>
                      <th>Title</th>
                      <th>Short Description</th>
                      <th>Tags</th>
                      <th>Status</th>
                      <th class="w-25 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if(sizeof($posts) > 0)
                  @foreach($posts as $key => $post)
                      <tr>
                          <td>{{$key}}</td>
                          <td><img src="{{ asset($post->postImages[0]->banner_image) }}" alt="banner_image" width="100" heigh="100"/></td>
                          <td>{{$post->title}}</td>
                          <td>{{$post->short_description}}</td>
                          <td>{{$post->tags}}</td>
                          <td><span class="badge {{$post->status == 1 ? 'bg-success':'bg-danger'}}">{{$post->status == 1 ? 'Active':'Inactive'}}</span></td>
                          <td class="text-end">
                             @can('edit-posts')
                                  <a href="{{route('admin.posts.edit',['id' => $post->id])}}"><button class="btn btn-warning mx-2 btn-sm" type="button"><i class="fa fa-edit"></i></button></a>
                             @endcan
                             @can('delete-posts')
                                   @include('admin.posts.components.remove_post')
                             @endcan
                          </td>
                      </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-center" colspan="7">No Records Found</td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</section>
@endsection
