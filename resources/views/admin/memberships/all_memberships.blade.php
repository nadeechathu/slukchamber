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
                  <h3 class="card-title">Memberships<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Memberships</li>
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
                  @include('admin.memberships.components.filters')
                  @can('create-memberships')
                      <a href="{{route('admin.memberships.new')}}"><button class="btn btn-dark mx-2" type="button"><i class="fa fa-edit"></i> Create Membership</button></a>
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
                      <th>Status</th>
                      <th class="w-25 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if(sizeof($memberships) > 0)
                  @foreach($memberships as $key => $membership)
                      <tr>
                          <td>{{$key}}</td>
                          <td><img src="{{ asset($membership->banner_image) }}" alt="banner_image" width="100" heigh="100"/></td>
                          <td>{{$membership->title}}</td>
                          <td>{{$membership->short_description}}</td>
                          <td><span class="badge {{$membership->status == 1 ? 'bg-success':'bg-danger'}}">{{$membership->status == 1 ? 'Active':'Inactive'}}</span></td>
                          <td class="text-end">
                             @can('edit-memberships')
                                  <a href="{{route('admin.memberships.edit',['id' => $membership->id])}}"><button class="btn btn-warning mx-2 btn-sm" type="button"><i class="fa fa-edit"></i></button></a>
                             @endcan
                             @can('delete-memberships')
                                   @include('admin.memberships.components.remove_membership')
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
          <div class="card-footer">
              <div class="d-felx justify-content-center">

             {{$memberships->links()}}

              </div>
                  </div>

        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</section>
@endsection
