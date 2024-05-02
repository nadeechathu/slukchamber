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
                  <h3 class="card-title">Edit Post <small></small></h3>
                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Edit Post</li>
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
                  <form id="quickForm" action="{{route('admin.posts.update',['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $post->title}}" placeholder="Title" />
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
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $post->slug}}" placeholder="Slug" />
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tags Input</label>
                                    <div class="form-group custom-tag">
                                        <input type="text" id="inputTag" class="form-control" name="tags"  value="{{ $post->tags}}" data-role="tagsinput">
                                    </div>
                                    @error('tags')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                    @if ($errors->has('tags'))
                                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                                    @endif
                                </div>
                            </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="published-date">Published Date / Event Date</label>
                            <input type="date" name="published_date" class="form-control" value="{{ $post->published_date}}" id="published-date" placeholder="Published Date" />
                            @if ($errors->has('published_date'))
                            <span class="text-danger">{{ $errors->first('published_date') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="category">Category</label> <span class="is-available badge " style=" display: none;background-color:#e7616a"> This category is already selected.</span>
                            <select name="category" class="form-control" id="category">
                              <option style="display:none" disabled selected>---Select an option----</option>
                              @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                            </select>

                          </div>

                          <div id="selected-categories" style="display: flex;">
                            @foreach ($post->categories as $postCategory)
                            <ul style="display: flex;">
                              <li class="selected-option">
                                {{ $postCategory->name }}
                                <input type="hidden" name="selectedOptions[]" value="{{ $postCategory->id }}">
                              </li>
                            </ul>
                            @endforeach
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                              @foreach($statuses as $status)
                                <option {{ $status->value == $post->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
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
                        <textarea name="short_description" class="form-control" id="short-description" cols="30" value="{{ old('description')}}" placeholder="Short Description" rows="4">{{$post->short_description}}</textarea>
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
                        <textarea name="description" class="form-control" id="description" cols="30" value="{{ old('description')}}" placeholder="Description" rows="4">{{$post->description}}</textarea>
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
                        <label for="banner-image">Banner Image</label>
                        <input type="file" name="banner_image" class="form-control" id="banner-image" placeholder="Banner Image">
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif</b></p>
                        @if($post->postImages[0]->banner_image != null)
                        <div class="row">
                          <div class="col-md-3">
                            <img src="{{asset($post->postImages[0]->banner_image)}}" class="w-100" alt="">
                          </div>
                        </div>
                        @endif
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="time">Time</label>
                              <input type="time" name="time" class="form-control" id="time" value="{{ $post->time}}" placeholder="Time">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="location">Location</label>
                          <input type="text" name="location" class="form-control" id="location" value="{{ $post->location}}" placeholder="Location">
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="is_featured">Featured</label>
                              <select name="is_featured" class="form-control" id="is_featured">
                                      <option {{ $post->is_featured == '0' ? 'selected' : ''}} value="0">NO</option>
                                      <option {{ $post->is_featured == '1' ? 'selected' : ''}} value="1">YES</option>
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
<script>
  // Create an empty JavaScript array to store the category data
  var postCategories = [];

  <?php foreach ($post->categories as $postCategory) : ?>
    // Add each category to the JavaScript array
    postCategories.push({
      text: "<?php echo $postCategory['text']; ?>",
      value: "<?php echo $postCategory['value']; ?>"
    });
  <?php endforeach; ?>

  // Now you have the data in the 'postCategories' JavaScript array
</script>

    <script>
        $( document ).ready(function() {
            $("#inputTag").tagsinput('items');
        });
    </script>

@endsection
