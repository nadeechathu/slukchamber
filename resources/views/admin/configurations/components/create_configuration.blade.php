<!-- Button trigger modal -->
<button type="button" class="btn btn-dark mx-2" data-bs-toggle="modal" data-bs-target="#create-configuration">
<i class="fa fa-plus"></i> Create Configuration
</button>

<!-- Modal -->
<div class="modal fade" id="create-configuration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Configuration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.configurations.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="configuration_key">Configuration Key</label>
                            <input type="text" name="configuration_key" class="form-control" id="configuration_key" placeholder="Configuration Key" required>
                        </div>
                       
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="configuration_value">Configuration Value</label>
                            <input type="text" name="configuration_value" class="form-control" id="configuration_value">
                        </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label for="enabled_on_api">Enabled On API</label>
                            <select class="form-control" name="enabled_on_api" class="form-control" id="enabled_on_api">
                                <option value="0">Not enabled</option>
                                <option value="1">Enabled</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="configuration_type">Configuration Type</label>
                                <select name="type" class="form-control" id="configuration_type">
                                    @foreach($configurationTypes as $configurationType)
                                    
                                    <option value="{{$configurationType->value}}">{{$configurationType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>