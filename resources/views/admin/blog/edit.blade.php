@extends('layouts.master')

@section('title')
Blog edit
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit</h4>
        <form action="{{route('blog.update', $blogs->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')


          <div class="modal-body">
            <img src="{{ URL::to('/')}}/images/{{$blogs->image}}" class="img-thumbnail" width="100" />
            <div class="input-group">
                <div class="custom-file">
                  <label>Image</label>
                  <input type="file" name="image" class="custom-file-input" value="{{$blogs->image}}">
                  <label class="custom-file-label">Select Images</label>                
                </div>
              </div>
             
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Author Name:</label>
              <input type="text" name="name" class="form-control" value="{{$blogs->name}}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Title:</label>
              <input type="text" name="title" class="form-control" value="{{$blogs->title}}">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Blog:</label>
              <textarea id="editor" name="blog_paragraph">{{$blogs->blog_paragraph}}</textarea>
            </div>
          <div class="modal-footer">
            <a href="{{url('blog')}}" class="btn btn-secondary">Back</a>
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