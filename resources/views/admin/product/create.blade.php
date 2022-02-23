@extends('layouts.master')

@section('title','Product Create Form')
@section('content')
<hr>
<h1>Add product</h1>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="Input-group">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" />
            <label class="custom-file-label">Choose Image</label>
          </div>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Under Category</label>
          <select name="categories_id" class="form-control">

            @foreach($categories as $key=> $value)
            <option value="{{ $value->id }}">
              {{ $value->category_name }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Under Brand</label>
          <select name="brands_id" class="form-control">

            @foreach($brands as $key=> $value)
            <option value="{{ $value->id }}">
              {{ $value->brand_name }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Product Name:</label>
          <input type="text" name="p_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label">Specification:</label>
          <textarea id="editor" name="description"></textarea>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Product Price:</label>
          <input type="text" name="price" class="form-control">
        </div>
    </div>
    <a href="{{url('product')}}" class="btn btn-secondary">Close</a>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then(editor => {
      console.log( editor );
    })
    .catch(error => {
      console.error( error );
    });
</script>
@endsection