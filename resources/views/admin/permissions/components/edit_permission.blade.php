<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="{{'#edit-permission'.$permission->id}}">
<i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-permission'.$permission->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Permission - {{$permission->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.permissions.update',['id' => $permission->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$permission->name}}" placeholder="Name" required>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <select name="guard_name" class="form-control" id="guard_name" required>
                                <option value="web" {{$permission->guard_name == 'web' ? 'selected':''}}>Web Guard</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="system_module_id">System Module Name</label>
                                <select name="system_module_id" class="form-control" id="system_module_id">
                                    <option style="display:none">---Select and option----</option>
                                    @foreach ($system_modules as $system_module)
                                        <option {{ $system_module->id == $permission->system_module_id ? 'selected' : ''}} value="{{ $system_module->id }}">{{ $system_module->name }}</option>
                                    @endforeach
                                    <option value="0">other</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    @foreach($statuses as $status)
                                        <option {{ $status->value == $permission->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
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
