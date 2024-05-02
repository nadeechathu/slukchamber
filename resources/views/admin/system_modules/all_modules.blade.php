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
                  <h3 class="card-title">System Modules<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">System Modules</li>
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
                @include('admin.system_modules.components.filters')
                @can('create-modules')
                    <a href="{{route('admin.system-modules.new')}}"><button class="btn btn-dark mx-2" type="button"><i class="fa fa-plus"></i> Create System Module</button></a>
                @endcan

              </div>
            </div>


              <!-- /.card-header -->
                <div class="card-body p-0">
                    <form action="{{route('admin.system-modules.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>System Module Name</th>
                        <th class="w-25 text-end">Status</th>
    {{--                    <th class="w-25 text-end">Actions</th>--}}
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($modules as $key => $module)

                        <tr>
                          <td>{{$key+1}}</td>
                          <td>
                              {{$module->name}}
                              <input type="hidden" id="id" name="ids[]" value="{{ $module->id }}">
                          </td>
                            <td class="text-end">
                                <div class="form-check form-switch ">
                                    <input class="form-check-input module-status" type="checkbox" role="switch"  name="statuses[]" id="status" value="{{$module->status}},{{$module->id}}"{{ $module->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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

@section('scripts')
{{--    <script>--}}
{{--        $('#status').change(function (){--}}
{{--            var status = $(this).prop('checked') == true ? 1 : 0;--}}
{{--            // var id = $(this).data('ids');--}}
{{--            // $.ajex({--}}
{{--            //     type: "PUT",--}}
{{--            //     dataType: "json",--}}
{{--            //     url: '/system-modules/update/',--}}
{{--            //     data: {'status':status, 'id':id},--}}
{{--            //     success:function (data){--}}
{{--            //         console.log('Success')--}}
{{--            //     }--}}
{{--            // })--}}
{{--        })--}}
{{--    </script>--}}
@endsection
