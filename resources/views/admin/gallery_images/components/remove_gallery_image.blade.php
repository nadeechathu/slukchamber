<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="{{'#remove-gallery-image'.$gallery_image->id}}">
    <i class="fa fa-trash"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="{{'remove-gallery-image'.$gallery_image->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remove Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.gallery-images.delete',['id' => $gallery_image->id])}}" method="get">
          @csrf
        <div class="modal-body text-start">
          <p>Are you sure you want to remove this Gallery Image from the system ? </p>
          <p class="text-danger">This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
