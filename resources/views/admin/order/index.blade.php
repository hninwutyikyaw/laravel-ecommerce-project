@extends('layouts.master')

@section('title')
Order list
@endsection

@section('content')
<style>
.inner{
  display: inline-block;
}
  .outter{
    width:100%;
    text-align: center;
  }
</style>

<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-body">

        <div class="table-responsive">
          <table id="dataTable" class="table">
            <thead class=" text-primary">
              <tr>
                <th>Date</th>
                <th>User Name</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $data)
              <td>{{ $data->created_at}}</td>
              <td>{{$data->user->name}}</td>
              <td>{{$data->total}}</td>
              <td>{{$data->delivered ? "delivered" : "pending"}}</td>
              <td>
                <div class="outter">
                  <div class="inner">
                    <a href="{{ route('adminorder.show',$data->id) }}" class="btn btn-primary">
                      <i class="fas fa-eye"></i>
                    </a>
                  </div>
                  <div class="inner">
                    <a href="{{ route('adminorder.edit',$data->id) }}" class="btn btn-success">
                      <i class="fas fa-edit"></i>
                    </a>
                  </div>
                  <div class="inner">
                    <form action="{{ route('adminorder.destroy',$data->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>  
                </div>  
              </td>
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
      $('#dataTable').DataTable();
    });
  </script>
  @endsection