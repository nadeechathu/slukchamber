<!-- Button trigger modal -->
<button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="{{'#user-permissions'.$user->id}}">
<i class="fa fa-lock"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="{{'user-permissions'.$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Permissions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.users.permissions',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-start">
                  <div class="row">
                  @if(isset($user->roles[0]))
                   @foreach($user->roles[0]->permissions as $permission)
                   <div class="col-md-3">
                    <input type="checkbox" class="mt-2" name="permissions[]" value="{{$permission->name}}" {{in_array($permission->name, $user->permissions->pluck('name')->toArray()) ? 'checked':''}}> {{ucfirst(str_replace('-',' ',$permission->name))}}
                   </div>
                   @endforeach
                   @endif
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>