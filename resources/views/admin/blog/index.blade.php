@extends('layouts.master')

@section('title','Blogs')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        </button>
      </div>
      <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="Input-group">
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" />
              <label class="custom-file-label">Choose Image</label>
            </div>
          </div>
          <div class="form-group">
            <label>Author Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Blog</label>
            <textarea id="editor" name="blog_paragraph"></textarea>
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

{{-- End Add Modal --}}


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Category
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
              <th>Title</th>
              <th>Author</th>
              <th>Blog</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach($blogs as $blog)
              <td>{{ $blog->id}}</td>
              <td><img width="100px" height="100px" src="{{URL::to('/')}}/images/{{ $blog->image }}"alt=""></td>
              <td>{{$blog->title}}</td>
              <td>{{ $blog->name}}</td>
              <td ><p width="50px" height="10px">{!! Str::limit($blog->blog_paragraph, 200) !!}</p></td>
              <td>
                <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-success">
                  <i class="fas fa-edit">
                  </i></a>
              </td>
              <td>
                <form method="post" action="{{ route('blog.destroy', $blog->id) }}">
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