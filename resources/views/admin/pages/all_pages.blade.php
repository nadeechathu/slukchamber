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
                                        <h3 class="card-title">Pages<small></small></h3>

                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Page</li>
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
                                    @include('admin.pages.components.filters')
                                    @can('create-pages')
{{--                                        @include('admin.pages.pages.create_page')--}}
                                        <a href="{{ route('admin.pages.new') }}" class="btn btn-dark mx-2">
                                            <i class="fa fa-plus"></i> Create Page
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
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th class="w-25 text-end">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pages as $key => $page)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->slug }}</td>
                                            <td>
                                                <span class="badge {{ $page->status == 1 ? 'bg-olive' : 'bg-danger' }}">{{ $page->status == 1 ? 'Active' : 'Inactive' }}</span>
                                            </td>
                                            <td class="text-end">
                                                @can('view-page-components')
                                                    <a href="{{ route('admin.pages.components.viewComponentByPage', $page->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                @endcan
                                                @can('edit-pages')
                                                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit fa-sm"></i>
                                                    </a>

                                                @endcan
                                                @can('delete-pages')
                                                    @include('admin.pages.components.remove_page')
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="col-md-12">
                                    {{$pages->links()}}
                                </div>
                            </div>
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
