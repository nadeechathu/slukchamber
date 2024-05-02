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
                  <h3 class="card-title">Edit Staff Member <small></small></h3>
                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Edit Staff Member</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <section class="container-fluid">

              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                    @include('admin.common.alerts')
                  </div>

                  <!-- form start -->
                  <form id="quickForm" action="{{route('admin.director_board.update',['id' => $director->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $director->name}}" placeholder="Name" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                       
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{ $director->designation}}" placeholder="Designation" />
                            @error('designation')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $director->email}}" placeholder="Email" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                              @foreach($statuses as $status)
                                <option {{ $status->value == $director->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="30" value="{{ old('description')}}" placeholder="Description" rows="4">{{$director->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="image">Profile Image</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="Profile Image">
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif</b></p>
                        @if($director->image != null)
                        <div class="row">
                          <div class="col-md-3">
                            <img src="{{asset($director->image)}}" class="w-100" alt="">
                          </div>
                        </div>
                        @endif
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


    <script>
        $( document ).ready(function() {
            $("#inputTag").tagsinput('items');
        });
    </script>

@endsection
