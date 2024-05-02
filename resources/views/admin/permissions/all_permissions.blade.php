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
                  <h3 class="card-title">Permissions<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Permissions</li>
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
            <div class="col-sm-7 text-end mt-1"></div>
              <div class="col-sm-5 text-end mt-1">
              @include('admin.permissions.components.filters')
                @can('create-permissions')
                @include('admin.permissions.components.create_permission')
                @endcan
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                      <th>System Module </th>
                    <th class="w-25 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
{{--                @dd($permissions)--}}
                  @foreach($permissions as $key => $permission)
                  <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{ucfirst(str_replace('-',' ',$permission->name))}}</td>
                    <td>{{$permission->guard_name}}</td>
                      <td>
                          @if($permission->system_module_id != null)
                              {{$permission->system_module->name}}
                          @endif
                      </td>
                    <td class="text-end">
                      @can('edit-permissions')
                        @include('admin.permissions.components.edit_permission')
                      @endcan
                      @can('delete-permissions')
                        @include('admin.permissions.components.remove_permission')
                      @endcan
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="row">
            <div class="col-md-12">
          {{$permissions->links()}}
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
