@extends('layouts.master')

@section('title')
Brand edit
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Brand Edit</h4>
        <form action="{{route('brand.update', $brands->id)}}" method="POST">
          @csrf
          @method('PUT')

          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Brand Name</label>
              <input type="text" name="brand_name" class="form-control" value="{{$brands->brand_name}}">
            </div>
          </div>
          <div class="modal-footer">
            <a href="{{url('brand')}}" class="btn btn-secondary">Back</a>
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