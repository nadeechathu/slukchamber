<!-- Button trigger modal -->
<a type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="{{'#inquiry-msg'.$inquiry->id}}">
    <i class="fa fa-eye"></i>
</a>
  <!-- Modal -->
  <div class="modal fade" id="{{'inquiry-msg'.$inquiry->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inquiry Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
          <p>{{$inquiry->inquiry_message}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
