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
                  <h3 class="card-title">Configurations<small></small></h3>

                </div>
                <div class="col-sm-6 text-white">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Configurations</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                @include('admin.common.alerts')
              </div>
            </div>
            <div class="row my-2">
              <div class="col-sm-12 text-end mt-1">
              @include('admin.configurations.components.filters')
                @can('create-configurations')
                @include('admin.configurations.components.create_configuration')
                @endcan
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Configuration Key</th>
                    <th>Configuration Value</th>
                    <th>Enabled On API</th>
                    <th>Type</th>
                    <th class="w-25 text-end">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($configurations as $key => $configuration)
                  <tr>
                    <td>{{$configuration->configuration_key}}</td>
                    <td>                      
                    {{$configuration->configuration_value != null ? $configuration->configuration_value : 'n/a'}}
                      
                    </td>
                    <td>
                      @if($configuration->enabled_on_api == 1)
                      <span class="badge bg-success">Enabled</span>
                      @else
                      <span class="badge bg-danger">Not Enabled</span>
                      @endif
                    </td>
                    <td>
                      @foreach($configurationTypes as $configurationType)
                      @if($configurationType->value == $configuration->type)
                      <span class="badge bg-info">{{$configurationType->name}}</span>
                      @endif
                      @endforeach
                      <br>
                      @if($configuration->type == 1)
                            <b>Component - {{$configuration->component != null ? $configuration->component->commonName->name : 'n/a'}}</b>                       
                      @endif
                    </td>
                    <td class="text-end">
                      @can('edit-configurations')
                        @include('admin.configurations.components.edit_configuration')
                      @endcan
                      @can('delete-configurations')
                        @include('admin.configurations.components.remove_configuration')
                      @endcan
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>

              <div class="row mt-3">
                <div class="col-md-12">
                    {{$configurations->links()}}
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</section>
@endsection
