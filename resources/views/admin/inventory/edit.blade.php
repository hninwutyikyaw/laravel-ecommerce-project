@extends('layouts.master')

@section('title')
Category edit
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Inventory Edit</h4>
        <form action="{{route('inventory.update', $inventories->id)}}" method="POST">
          @csrf
          @method('PUT')

          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label"> Type:</label>
              <input type="text" name="type" class="form-control" value="{{$inventories->type}}">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label"> Product_id:</label>
                <input type="text" name="product_id" class="form-control" value="{{$inventories->product_id}}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"> Price:</label>
                <input type="price" name="price" class="form-control" value="{{$inventories->price}}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"> Quantity:</label>
                <input type="text" name="quantity" class="form-control" value="{{$inventories->quantity}}">
              </div>
          </div>
          <div class="modal-footer">
            <a href="{{url('inventory')}}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

@endsection