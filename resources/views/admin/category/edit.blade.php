@extends('layouts.master')

@section('title')
Category edit
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Products Edit</h4>
        <form action="{{route('category.update', $categories->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="modal-body">
            <img src="{{ URL::to('/')}}/images/{{$categories->image}}" class="img-thumbnail" width="100" />
            <div class="input-group">
              <div class="custom-file">
                <label>Image</label>
                <input type="file" name="image" class="custom-file-input" value="{{$categories->image}}">
                <label class="custom-file-label">Select Images</label>                
                {{-- <input type="hidden" name="hidden_image" value="{{$categories->image}}" /> --}}
              </div>
            </div>
           
           
           
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Category Name:</label>
              <input type="text" name="category_name" class="form-control" value="{{$categories->category_name}}">
            </div>
          </div>
          <div class="modal-footer">
            <a href="{{url('category')}}" class="btn btn-secondary">Back</a>
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