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
                  <h3 class="card-title">Users<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                @include('admin.common.alerts')
              </div>
            </div>
            <div class="row my-2">
              <div class="col-sm-8 text-end mt-2 pt-2"></div>
              <div class="col-sm-4 text-end mt-2">
                @include('admin.users.components.filters')
                @can('create-users')
                    @include('admin.users.components.create_user')
                @endcan
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">Id</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th class="w-25 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if(sizeof($users) > 0)
                    @foreach($users as $key => $user)
                    <tr>
                      <td>{{$key}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td><span class="badge bg-success">{{sizeof($user->roles)> 0 ? $user->roles[0]->name  : 'n/a'}}</span></td>
                      <td><span class="badge {{$user->status == 1 ? 'bg-success':'bg-danger'}}">{{$user->status == 1 ? 'Active':'Inactive'}}</span></td>
                      <td class="text-end">
                        @can('edit-users')
                          @include('admin.users.components.edit_user')
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  @else
                  <tr>
                    <td colspan="6" class="text-center">No Records Found</td>
                  </tr>
                  @endif

                </tbody>
              </table>
              </div>
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
