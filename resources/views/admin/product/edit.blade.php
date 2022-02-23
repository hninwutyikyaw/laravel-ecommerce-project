@extends('layouts.master')

@section('title')
Product edit
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Products Edit</h4>
        <form action="{{route('product.update', $products->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')


          <div class="modal-body">
            <img src="{{ URL::to('/')}}/images/{{$products->image}}" class="img-thumbnail" width="100" />
            <div class="input-group">
              <div class="custom-file">
                <label>Image</label>
                <input type="file" name="image" class="custom-file-input" value="{{$products->image}}">
                <label class="custom-file-label">Select Images</label>                
                <input type="hidden" name="hidden_image" value="{{$products->image}}" />
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Under Category</label>
              <select name="categories_id" class="form-control">
                @foreach($categories as $key=> $value)
                <option value="{{ $value->id}}"
                  @if ($value->id == $products->categories_id)
                    selected="selected"
                  @endif    
                >
                  {{ $value->category_name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Under Brand</label>
              <select name="brands_id" class="form-control">
                @foreach($brands as $key=> $value)
                <option value="{{ $value->id}}"
                  @if ($value->id == $products->brands_id)
                    selected="selected"
                  @endif   
                  >
                  {{ $value->brand_name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Product Name:</label>
              <input type="text" name="p_name" class="form-control" value="{{$products->p_name}}">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Specification:</label>
              <textarea id="editor" name="description">{{$products->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Product Price:</label>
              <input type="text" name="price" class="form-control" value="{{$products->price}}">
            </div>
          </div>
          <div class="modal-footer">
            <a href="{{url('product')}}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </form>

      </div>
    </div>
  </div>
</div>

@endsection
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
@section('scripts')
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