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
                <div class="col-sm-6"><h3 class="card-title">Create Testimonial <small></small></h3></div>
              <div class="col-sm-6 text-white">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Administrator Dashboard</li>
            </ol>
          </div>
                </div>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{route('admin.testimonials.create')}}" method="post" >
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      @include('admin.common.alerts')
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                  </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
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
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" placeholder= "Description" rows="4"></textarea>
                  </div>
                 
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
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
