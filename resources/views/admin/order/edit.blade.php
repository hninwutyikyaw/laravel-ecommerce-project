@extends('layouts.master')

@section('title')
Order edit
@endsection

@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Order Edit</h4>
        <form action="{{route('adminorder.update', $order->id)}}" method="POST">
          @csrf
          @method('PUT')


          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Customer Name:</label>
              <input type="text" name="name" class="form-control" value="{{$order->user->name}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Total Amount:</label>
              <input type="text" name="total" class="form-control" value="{{$order->total}}">
            </div>
            <div class="col-sm-12">
              <div class="line line-dashed line-lg pull-in"></div>
              <div class="row">
                <div class="form-group">
                  <label class="col-sm-12">Status</label>
                  <div class="form-group">
                    <select name="delivered" class="form-control">
                      <option value="0">pending</option>
                      <option value="1">delivered</option>
                      <option value="">None</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <a href="{{url('adminorder.index')}}" class="btn btn-secondary">Back</a>
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