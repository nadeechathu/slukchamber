<!-- Button trigger modal -->
<button type="button" class="btn btn-dark mx-2" data-bs-toggle="modal" data-bs-target="#create-permission">
<i class="fa fa-plus"></i> Create Permission
</button>

<!-- Modal -->
<div class="modal fade" id="create-permission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.permissions.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                        </div>

                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <select name="guard_name" class="form-control" id="guard_name" required>
                                <option value="web">Web Guard</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="system_module_id">System Module Name</label>

                                <select name="system_module_id" class="form-control" id="system_module_id">
                                    <option value="">---Select and option----</option>
                                    @foreach ($system_modules as $system_module)
                                        <option value="{{ $system_module->id }}">{{ $system_module->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    @foreach($statuses as $status)
                                        <option value="{{$status->value}}">{{$status->name}}</option>
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
