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
                  <h3 class="card-title">Elements<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Elements</li>
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
                @include('admin.Elements.components.filters')
                @can('create-elements')
                    <a href="{{route('admin.elements.new')}}"><button class="btn btn-dark mx-2" type="button"><i class="fa fa-plus"></i> Create Element</button></a>
                @endcan

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Element Name</th>
                    <th>Status</th>
                    <th class="w-25 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($elements as $key => $element)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$element->element_name}}</td>
                      <td><span class="badge {{$element->status == 1 ? 'bg-teal':'bg-danger'}}">{{$element->status == 1 ? 'Active':'Inactive'}}</span></td>
                      <td class="text-end">
                             @can('edit-elements')
                                 <a href="{{route('admin.elements.edit',['id' => $element->id])}}"><button class="btn btn-warning btn-sm" type="button"><i class="fa fa-edit"></i></button></a>
                            @endcan

                            @can('delete-elements')
                            @include('admin.Elements.components.remove_element')
                            @endcan
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="row">
            <div class="col-md-12">
              {{$elements->links()}}
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
