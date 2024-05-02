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
                                        <h3 class="card-title">Edit Component <small></small></h3>
                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Edit Component</li>
                                        </ol>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @include('admin.common.alerts')
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form id="quickForm" action="{{ route('admin.pages.update', ['id' => $page->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{ $page->title }}" placeholder="Title">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" name="slug" class="form-control" id="slug"
                                                    value="{{ $page->slug }}" placeholder="Slug">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" id="status">
                                                    <option value="1" {{ $page->status == 1 ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="0" {{ $page->status == 0 ? 'selected' : '' }}>
                                                        Inactive
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta-title">Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control" id="meta-title"
                                                placeholder="Meta Title" value="{{ $page->meta_title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta-description">Meta Description</label>
                                                <textarea name="meta_description" class="form-control" id="meta-description" cols="30"
                                                    placeholder="Meta Description" rows="4">{{ $page->meta_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="canonical-url">Canonical Url</label>
                                                <input type="text" name="canonical_url" class="form-control" id="canonical-url"
                                                        placeholder="Canonical Url" value="{{ $page->canonical_url }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keywords">Keywords</label>
                                                <input type="text" name="keywords" class="form-control" id="keywords"
                                                           placeholder="Keywords" value="{{ $page->keywords }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
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
