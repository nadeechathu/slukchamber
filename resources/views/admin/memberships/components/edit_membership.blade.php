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
                  <h3 class="card-title">Edit Membership <small></small></h3>
                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Edit Membership</li>
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
                  <form id="quickForm" action="{{route('admin.memberships.update',['id' => $membership->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $membership->title}}" placeholder="Title" />
                            @error('title')
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
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $membership->slug}}" placeholder="Slug" />
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if ($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                          </div>
                        </div>
                            
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                              @foreach($statuses as $status)
                                <option {{ $status->value == $membership->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="short-description">Short Description</label>
                        <textarea name="short_description" class="form-control" id="short-description" cols="30" value="{{ old('description')}}" placeholder="Short Description" rows="4">{{$membership->short_description}}</textarea>
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
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="30" value="{{ old('description')}}" placeholder="Description" rows="4">{{$membership->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $membership->price}}" placeholder="Price" />
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                          </div>
                        </div>
                            
                      </div>

                      <div class="form-group">
                        <label for="pdf_file">PDF File</label>
                        <input type="file" name="pdf_file" class="form-control" id="pdf_file" placeholder="PDF File" accept="application/pdf">
                        @if($membership->pdf_file != null)
                        <div class="row">
                          <div class="col-md-3">
                            <a href="{{asset($membership->pdf_file)}}" target="_blank">Open PDF</a>
                          </div>
                        </div>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="banner-image">Banner Image</label>
                        <input type="file" name="banner_image" class="form-control" id="banner-image" placeholder="Banner Image">
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif</b></p>
                        @if($membership->banner_image != null)
                        <div class="row">
                          <div class="col-md-3">
                            <img src="{{asset($membership->banner_image)}}" class="w-100" alt="">
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
