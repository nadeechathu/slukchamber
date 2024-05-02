<!-- Button trigger modal -->
<a type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="{{'#remove-parameter'.$parameter->id}}">
    <i class="fa fa-trash"></i>
</a>
  <!-- Modal -->
  <div class="modal fade" id="{{'remove-parameter'.$parameter->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remove Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.parameters.delete',['id' => $parameter->id])}}" method="get">
          @csrf
        <div class="modal-body text-start">
          <p>Are you sure you want to remove this parameter from the system ? </p>
          <p class="text-danger">This action canot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
