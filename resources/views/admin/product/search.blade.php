@extends('layouts.master')

@section('title')
@section('content')
<style>
    .btn {
      font-weight: 800;
      line-height: 2.35em;
    }
    .btnsearch {
      background-color: yellow;
      border: none;
      color: black;
      padding: 6px 8px;
      font-size: 17px;
      cursor: pointer;
    }
    
    /* Darker background on mouse-over */
    .btnsearch:hover {
      background-color: red;
    }
    .form-control{
    width: 100%;
    padding: 10px 15px;
    margin: 4px 0;
    box-sizing: border-box;
    border: 2px solid red;
    border-radius: 4px;
}
</style>

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-6" >
            <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
        </div>

        <div class="col-6">
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <!-- Search form -->
                    <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2" action="{{url('productSearch')}}">
                        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                        id="search_input" name="searchData" aria-label="Search">
                        <button type="submit" class="btnsearch">
                        <i class="fas fa-search">
                        </i>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  <div class="row">
    @if(count($products)>0)
            @foreach($products as $product)
            <div class="col-sm-4 d-flex pb-3">
                <div class="card card-body h-150 w-100">
                    <img src="{{URL::to('/')}}/images/{{ $product->image }}"alt="Card image">
                      <p style="font-size:20px;">{{ $product->p_name}}</p>
                    <p class="card-text" style="color:blue;font-size:20px">{{$product->price}}-kyats</p>
                    <p style="color:green;font-size:15px">Category :  {{ $product->category_name}}</p>
                    <p style="color:green;font-size:15px">Brand :  {{ $product->brand_name}}</p>
                    {{-- <p style="color:green;font-size:15px">Category :  {{ $product->category['category_name']}}</p> --}}
                    {{-- <p style="color:green;font-size:15px">Brand : {{ $product->brand['brand_name']}}</p> --}}
                  <div class="card-footer1 " style="display: inline-block">
                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-success">
                    <i class="fas fa-edit"></i>
                    </a>
                  </div>
                  <div class="card-footer" style="display: inline-block">
                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">
                          <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
            @endif
        </div>
    </section>
</div>
<br>
<br>
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