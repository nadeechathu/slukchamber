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
                                        <h3 class="card-title">Components<small></small></h3>

                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Component</li>
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
                                    @include('admin.component_manager.components.filters')
                                     @can('create-components')
                                     <a href="{{ route('admin.components.new') }}" class="btn btn-dark mx-1">
                                     <i class="fa fa-plus"></i> Create Component
                                                       </a>
                                     @endcan
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Common Name</th>
                                            <th>Status</th>
                                            <th class="w-25 text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($components as $key => $component)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $component->name }}</td>
                                                <td>{{$component->commonName != null ? $component->commonName->name : 'n/a'}}</td>
                                                <td>
                                                    <span class="badge {{ $component->status == 1 ? 'bg-olive' : 'bg-danger' }}">{{ $component->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                </td>
                                                <td class="text-end">
                                                    @can('edit-components')
                                                     <a href="{{ route('admin.components.edit', $component->id) }}" class="btn btn-sm btn-warning">
                                                           <i class="fa fa-edit"></i>
                                                       </a>
                                                   @endcan
                                                    @can('delete-components')
                                                        @include('admin.component_manager.components.remove_component')
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
                                {{$components->links()}}
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
