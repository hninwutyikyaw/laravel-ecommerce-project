@extends('layouts.master')

@section('title','Inventories Stock')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Inventory Stock
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="table" class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Total Stock In</th>
              <th>Total Stock Out</th>
              <th>Total Left</th>
            </thead>
            <tbody>
              @foreach($products as $data)
              <td>{{$data->id}}</td>
              <td><img src="{{URL::to('/')}}/images/{{ $data->image }}" class="img-thumbnail" width="75px"
                height="100px" alt="Image" /></td>
              <td>{{$data->p_name}}</td>
              <td>{{$data->in}}</td>
              <td>{{$data->out}}</td>
              <td>{{$data->stock}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>


@endsection

@section('scripts')
<script>
$(document).ready(function () {
  $('#table').DataTable();
});
</script>
@endsection