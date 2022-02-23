@extends('layouts.master')

@section('title','Stocks History')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <form action="{{route('inventory.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Type</label>
            <select class="custom-select" name="type">
              <option selected>Choose a option</option>
              <option value="in">Stock In</option>
              <option value="out">Stock Out</option>
            </select>
          </div>
          <div class="form-group">
            <label>Product</label>
            <select class="custom-select" name="product_id">
              <option selected>Choose a product</option>
              @foreach ($products as $product)
              <option value="{{ $product->id }}">{{ $product->p_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="price" name="price" class="form-control">
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="price" name="quantity" class="form-control">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </div>
    </form>
  </div>
</div>

{{-- End ADd --}}


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stock History
          <button type="button" class="btn btn-primary float-right" data-toggle="modal"
            data-target="#exampleModal">ADD</button>
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable" class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Type</th>
              <th>Quantity</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach($inventories as $inventory)
              <td>{{$inventory->id}}</td>
              <td><img src="{{URL::to('/')}}/images/{{ $inventory->product->image }}" class="img-thumbnail" width="75px"
                height="100px" alt="Image" /></td>
              <td>{{ $inventory->product->p_name }}</td>
              <td>{{$inventory->price}}</td>
              <td>{{$inventory->type}}</td>
              <td>{{$inventory->quantity}}</td>
              <td>
                <a href="{{route('inventory.edit', $inventory->id)}}" class="btn btn-success">
                  <i class="fas fa-edit">
                  </i></a>
              </td>
              <td>
                <form method="post" action="{{ route('inventory.destroy', $inventory->id) }}">
                  @method('DELETE')
                  @csrf
                  <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  $(document).ready(function () {
      $('#datatable').DataTable();
   });
</script>
@endsection