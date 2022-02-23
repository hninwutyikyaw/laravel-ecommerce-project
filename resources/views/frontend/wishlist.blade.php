@extends('frontend.master')

@section('title','Wishlist')
@section('content')

<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item active">Wishlist</li>
</ol>
</div>

<h3 style=" margin-top:50px;text-align: center; text-decoration:underline;">Wishlist Products</h3>
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif


 @if($products->isEmpty())
    <h4 style="color: #0090F0; margin-top: 50px; margin-left: 40px;">
        Sorry, Products not found</h4>
     
    @else
<div class="wishlist-table cart_inner">
    <div class="table-responsive">
        <table class="table">
            
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $wishlist)

                <tr>
                    <td>
                        <img src="{{URL::to('/')}}/images/{{ $wishlist->product->image }}"
                        class="img-thumbnail" width="100px" height="100px" alt="Image" />
                </td>
                    <td>{{$wishlist->product->p_name}}</td>
                    <td>{{$wishlist->product->price}}-kyats</td>
                    <td> 
                        <a href="{{url('/')}}/removeWishlist/{{$wishlist->product->id}}" onclick="return confirm('Are you sure?');"
                        type="button" style="color: #dd2c00;" class="btn-floating"><i class="fas fa-trash fa-2x" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>
@endif


@endsection

@section('scripts')

@endsection