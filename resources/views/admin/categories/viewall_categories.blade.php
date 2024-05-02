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
                                        <h3 class="card-title">All <small></small></h3>

                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Category</li>
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
                                    @include('admin.categories.components.filters')
                                    <a href="{{ route('admin.categories.new') }}" class="btn btn-dark mx-2">
                                        <i class="fa fa-plus"></i> Create Category
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
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th class="w-25 text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($categories) > 0)
                                            @foreach ($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        @if ($category->categoryImages->isNotEmpty())
                                                            <img src="{{ asset($category->categoryImages->first()->banner_image) }}"
                                                                width="100" alt="Image Description">
                                                        @else
                                                            No Image Available
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td><span
                                                            class="badge {{ $category->status == 1 ? 'bg-olive' : 'bg-danger' }}">{{ $category->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        @can('edit-categories')
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fa fa-edit"></i></a>
                                                        @endcan
                                                        @can('delete-categories')
                                                            @include('admin.categories.components.remove_category')
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
