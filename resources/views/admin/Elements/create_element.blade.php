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
                                        <h3 class="card-title">Create Elemet <small></small></h3>
                                    </div>
                                    <div class="col-sm-6 text-white">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item">Administrator Dashboard</li>
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
                            <form id="quickForm" action="{{route('admin.elements.create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="element_name">Element Name</label>
                                        <input type="text" name="element_name" class="form-control" id="element_name"
                                            placeholder="Element Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Parameter</label> <span class="is-available badge " style=" display: none;background-color:#e7616a"> This parameter is already selected.</span>
                                        <select name="parameter" class="form-control" id="category"
                                            name="selectedOptions[]">
                                            <option style="display:none">---Select and option----</option>
                                            @foreach ($parameters as $parameterId => $parameterName)
                                                <option value="{{ $parameterId }}">{{ $parameterName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="selected-categories" style="display: flex;">

                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            @foreach($statuses as $status)
                                            <option value="{{$status->value}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="mapped_with">Map With</label>
                                        <select name="mapped_with" class="form-control" id="mapped_with">
                                            <option value="">---select---</option>
                                            @foreach($tables as $mapping_schema)
                                            <option value="{{$mapping_schema}}">{{$mapping_schema}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
