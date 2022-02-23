
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('comment.update', $comment->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
           @method('PATCH')
      <div class="modal-body">
            <div class="form-group">
              <label>Comment</label>
              <input type="text" name="comment" class="form-control" value="{{$comment->comment}}">
            </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="wishlist-button">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

