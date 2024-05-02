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
                                        <h3 class="card-title">Services<small></small></h3>

                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Services</li>
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
                                    @include('admin.services.components.filters')
                                    <a href="{{ route('admin.services.create') }}" class="btn btn-dark mx-2">
                                        <i class="fa fa-plus"></i> Create Service
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th class="w-25 text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($services) > 0)
                                            @foreach ($services as $key => $service)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><img src="{{ asset($service->service_images->banner_image) }}"
                                                            width="100" alt="Image Description"></td>
                                                    <td>{{ $service->title }}</td>
                                                    <td>{{ $service->slug }}</td>
                                                    <td><span
                                                            class="badge {{ $service->status == 1 ? 'bg-olive' : 'bg-danger' }}">{{ $service->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        @can('edit-services')
                                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fa fa-edit"></i></a>
                                                        @endcan
                                                        {{-- @include('admin.services.components.edit_service') --}}
                                                        @can('delete-services')
                                                            @include('admin.services.components.remove_service')
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td class="text-center" colspan="6">No Records Found</td>
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
