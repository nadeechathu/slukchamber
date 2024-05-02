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
                                    <h3 class="card-title">Create Component <small></small></h3>
                                </div>
                                <div class="col-sm-6 text-white">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item">Create Component</li>
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
                        <form id="quickForm" action="{{route('admin.components.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Component Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Component Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="commonName">Common Name</label>
                                            <select class="form-control" id="commonName" name="component_name_id" required>
                                                <option value="">---Select and option----</option>
                                                @foreach ($componentNames as $componentName)
                                                <option value="{{ $componentName->id }}">{{ $componentName->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                @foreach($statuses as $status)
                                                <option value="{{$status->value}}">{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="layout_image">Component Image</label>
                                    <input type="file" name="layout_image" class="form-control" id="layout_image" placeholder="Component Image">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Elements</label> <span class="is-available badge " style=" display: none;background-color:#e7616a"> This element is already selected.</span>
                                            <select name="parameter" class="form-control" id="category" name="element_ids[]">
                                                <option style="display:none">---Select and option----</option>
                                                @foreach ($elements as $elementId => $element)
                                                <option value="{{ $elementId }}">{{ $element->element_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="selected-categories" style="display: flex;">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="configuration">Configuration</label>
                                            <select name="configuration" class="form-control" id="category" name="configuration">
                                                <option value="">---Select and option----</option>
                                                @foreach ($configurations as $configurationId => $configuration)
                                                <option value="{{ $configurationId }}">{{ $configuration->configuration_key }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                  
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