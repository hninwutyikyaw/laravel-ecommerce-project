@extends('layouts.master')

@section('title')
Register 
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Registered Roles</h4>

        {{-- status --}}
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable" class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Usertype</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach ($users as $row)
              <td>{{ $row->id }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->email}}</td>
              <td>{{ $row->admin}}</td>
              <td>
                <a href="/role-edit/{{$row->id}}" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
              </td>
              <td>
                <form action="/role-delete/{{ $row->id}}" method="post">
                  {{ csrf_field () }}
                  {{ method_field('DELETE')}}
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