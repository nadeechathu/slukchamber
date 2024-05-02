<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{'#remove-page-has-components'.$component->id}}">
    <i class="fa fa-trash"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="{{'remove-page-has-components'.$component->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remove Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body text-start">
          <p>Are you sure you want to remove this component from this page ? </p>
          <p class="text-danger">This action cannot be undone.</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="{{route('admin.pages.components.delete',['page_id' => $page_has_components->id,'component_id' => $component->id])}}"><button type="button" class="btn btn-primary">Confirm</button></a>
        </div>

      </div>
    </div>
  </div>
