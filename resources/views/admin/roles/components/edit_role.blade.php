<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="{{'#edit-role'.$role->id}}">
<i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-role'.$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role - {{$role->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.roles.update',['id' => $role->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$role->name}}" placeholder="Name" required>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <select name="guard_name" class="form-control" id="guard_name" required>
                                <option value="web" {{$role->guard_name == 'web' ? 'selected':''}}>Web Guard</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <h5>Permissions</h5>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="row">
                            @foreach($groupedPermissions as $module => $permissionSet)                            
                            <div class="col-md-12 mt-3 border border-secondary rounded p-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h6>{{ucfirst(str_replace('_',' ',$module))}}</h6>
                                        
                                    </div>
                                    @foreach($permissionSet as $permission)
                                    <div class="col-md-3 mt-1">
                                        <input type="checkbox" name="role_permissions[]" value="{{$permission->name}}" {{in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? 'checked':''}}> {{ucfirst(str_replace('-',' ',$permission->name))}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            @endforeach
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
