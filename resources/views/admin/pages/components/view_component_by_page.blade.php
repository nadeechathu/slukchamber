@extends('admin.layouts.app')

@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary mt-3">
                            <div class="card-header content-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title">Page Components<small> - {{$page->title}}</small></h3>

                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Page Components</li>
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
                                @can('view-pages')
                                        <a href="{{ route('admin.pages.all') }}" class="btn btn-dark mx-1">
                                            <i class="fa fa-backward"></i> Back To Pages
                                        </a>
                                    @endcan
                                    @can('create-page-components')

                                            @include('admin.pages.components.add_components')

                                    @endcan
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <form id="quickForm" action="{{ route('admin.pages.components.UpdateSortOrder', ['page_id' => $page_has_components->id]) }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body p-0">
                                    <table class="table table-striped table-hover page-has-components-table">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th class="w-25 text-end">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="sorttable">

                                        @foreach ($page_has_components->components as $key => $component)

                                            <tr class="ui-sortable-handle">
                                                <td>
                                                    {{ $key +1 }}
                                                    <input type="text" name="sortOrder[]" value="{{$component->id}}" hidden>
                                                </td>
                                                <td>{{ $component->name }}</td>
                                                <td class="text-end">
                                                    @can('delete-page-has-components')
                                                        @include('admin.pages.components.remove_page_has_components')
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

@section('scripts')
    <script>
        $( document ).ready(function() {
            $("#sorttable").sortable({
                cursor: 'row-resize',
                placeholder: 'ui-state-highlight',
                opacity: '0.55',
                items: '.ui-sortable-handle'
            }).disableSelection();
        });

    </script>
@endsection
