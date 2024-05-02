<!-- Button trigger modal -->

<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="{{'#edit-user'.$user->id}}">
<i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-user'.$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.users.update',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body text-start">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                @foreach($roles as $role)
                                <option value="{{$role->name}}" {{sizeof($user->roles) > 0 ? ($user->roles[0]->name == $role->name ? 'selected':'') : ''}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(Auth::id() != $user->id)
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">                                
                                @foreach($statuses as $status)
                                <option {{ $status->value == $user->status ? 'selected' : ''}} value="{{$status->value}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
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