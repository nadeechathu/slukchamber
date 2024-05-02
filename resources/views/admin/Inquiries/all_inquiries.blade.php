@extends('admin.layouts.app')

@section('content')
<section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary mt-3">
            <div class="card-header content-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3 class="card-title">Inquiries<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Inquiries</li>
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
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                      <th style="width: 10px">Id</th>
                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Subject</th>
                      <th>Status</th>
                      <th class="w-25 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if(sizeof($inquiries) > 0)
                  @foreach($inquiries as $key => $inquiry)
                      <tr>
                          <td>{{$key}}</td>
                          <td>{{$inquiry->full_name}}</td>
                          <td>{{$inquiry->inquiry_email}}</td>
                          <td>{{$inquiry->phone}}</td>
                          <td>{{$inquiry->inquiry_subject}}</td>
                          <td><span class="badge {{$inquiry->status == 1 ? 'bg-success':'bg-danger'}}">{{$inquiry->status == 1 ? 'Active':'Inactive'}}</span></td>
                          <td class="text-end">
                                   @include('admin.inquiries.components.inquiry_msg')
                     
                          </td>
                      </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-center" colspan="7">No Records Found</td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card-footer">
              <div class="d-felx justify-content-center">

             {{$inquiries->links()}}

              </div>
                  </div>

        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</section>
@endsection
