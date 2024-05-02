@extends('admin.layouts.app')

@section('content')
    <section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary mt-3">
                            <div class="card-header content-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title">All Testimonials <small></small></h3>
                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">All Testimonials</li>
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
                                @include('admin.testimonials.components.filters')
                                @can('create-testimonials')
                                <a href="{{route('admin.testimonials.new')}}">
                                <button type="button" class="btn btn-dark mx-2">
                                    <i class="fa fa-plus"></i> Create Testimonial
                                </button>
                                </a>
                                @endcan
                            </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->


                            <table class="table table-striped table-hover">
                                <thead>

                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th class="w-50">Description</th>
                                        <th>slug</th>
                                        <th>status</th>
                                        <th class="w-25 text-end">Actions</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @if(sizeof($testimonials) > 0)
                                        @foreach ($testimonials as $key =>  $testimonial)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$testimonial->title}}</td>
                                            <td>{{substr($testimonial->description, 0, 150)}}...</td>
                                            <td>{{$testimonial->slug}}</td>
                                            <td>
                                                @if($testimonial->status == 1)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td class="w-25 text-end">
                                            @can('edit-testimonials')
                                                <a href="{{route('admin.testimonials.edit',['id' => $testimonial->id])}}">
                                                <button class="btn btn-warning btn-sm" type="button"><i class="fa fa-edit"></i></button>
                                                @endcan
                                            </a>
                                            @can('delete-testimonials')
                                                <a href="{{route('admin.testimonials.delete',['slug' => $testimonial->slug])}}">
                                                    <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i></button>
                                                </a>
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
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>

            </div>
        </section>

    </section>
@endsection
