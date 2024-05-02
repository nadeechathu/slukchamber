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
                                    <h3 class="card-title">Update Component <small></small></h3>
                                </div>
                                <div class="col-sm-6 text-white">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item">Update Component</li>
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
                        <form id="quickForm" action="{{ route('admin.components.update', ['id' => $component->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Component Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $component->name }}" placeholder="Component Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="commonName">Common Name</label>
                                            <select class="form-control" name="component_name_id" required>
                                                <option value="">---Select and option----</option>
                                                @foreach ($componentNames as $componentName)
                                                <option {{$component->component_name_id == $componentName->id ? 'selected':''}} value="{{ $componentName->id }}">{{ $componentName->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                @foreach($statuses as $status)
                                                <option {{ $status->value == $component->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="layout_image">Component Image</label>
                                    <input type="file" name="layout_image" class="form-control" id="layout_image" placeholder="Component Image">

                                    <div class="row">
                                        <div class="col-md-4">
                                            @if($component->layout_image != null)
                                            <img src="{{asset($component->layout_image)}}" class="w-100">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="category">Elements</label> <span class="is-available badge " style=" display: none;background-color:#e7616a"> This element is already selected.</span>
                                            <select name="category" class="form-control" id="category">
                                                <option style="display:none" disabled selected>---Select an option----</option>
                                                @foreach ($elements as $elementId => $element)
                                                <option value="{{ $element->id }}">{{ $element->element_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div id="selected-categories" style="display: flex;">
                                            @foreach ($component->elements as $componentElement)
                                            <ul style="display: flex;">
                                                <li class="selected-option">
                                                    {{ $componentElement->element_name }}
                                                    <input type="hidden" name="selectedOptions[]" value="{{ $componentElement->id }}">
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                            <label for="configuration">Configuration</label>
                                            <select name="configuration" class="form-control" id="category" name="configuration">
                                                <option value="">---Select and option----</option>
                                                @foreach ($configurations as $configurationId => $configuration)
                                                <option {{$configuration->configuration_value == $component->id ? 'selected':''}} value="{{ $configuration->id }}">{{ $configuration->configuration_key }}</option>
                                                @endforeach
                                            </select>
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