<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('review.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
          <div class="form-group">
              <label>Rating</label>
              <select class="custom-select" name="rating">
                <option selected>Choose rating</option>
                <option value="1.0">1.0</option>
                <option value="2.0">2.0</option>
                <option value="3.0">3.0</option>
                <option value="4.0">4.0</option>
                <option value="5.0">5.0</option>
              </select>
            </div>
            <input type="hidden" value="{{$product->id}}" name="product_id">
            <div class="form-group">
              <label>Headline</label>
              <input type="text" name="headline" class="form-control">
            </div>
  
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="wishlist-button">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
