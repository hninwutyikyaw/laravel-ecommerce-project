@extends('layouts.master')

@section('title','Brands')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name="brand_name" class="form-control">
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
        <h4 class="card-title">Brand
          <button type="button" class="btn btn-primary float-right" data-toggle="modal"
            data-target="#exampleModal">ADD</button>
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable" class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Brand name</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach($brands as $brand)
              <td>{{ $brand->id}}</td>
              <td>{{ $brand->brand_name}}</td>
              <td>
                <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
              </td>
              <td>
                <form method="post" action="{{ route('brand.destroy', $brand->id) }}">
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