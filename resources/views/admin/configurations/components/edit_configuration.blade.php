<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="{{'#edit-configuration'.$configuration->id}}">
<i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-configuration'.$configuration->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Configuration - {{$configuration->configuration_key}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.configurations.update',['id' => $configuration->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="configuration_key">Configuration Key</label>
                            <input type="text" name="configuration_key" class="form-control" value="{{$configuration->configuration_key}}" placeholder="Configuration Key" required>
                        </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="configuration_value">Configuration Value</label>
                            <input type="text" name="configuration_value" class="form-control" value="{{$configuration->configuration_value}}" id="configuration_value">
                        </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label for="enabled_on_api">Enabled On API</label>
                            <select class="form-control" name="enabled_on_api" class="form-control" id="enabled_on_api">
                                <option {{$configuration->enabled_on_api == 0 ? 'selected':''}} value="0">Not enabled</option>
                                <option {{$configuration->enabled_on_api == 1 ? 'selected':''}} value="1">Enabled</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Configuration Type</label>
                                <select name="type" class="form-control">
                                    @foreach($configurationTypes as $configurationType)                                    
                                    <option value="{{$configurationType->value}}" {{$configurationType->value == $configuration->type ? 'selected' : ''}} >{{$configurationType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
