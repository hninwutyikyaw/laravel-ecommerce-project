@extends('frontend.master')

@section('title','Category Page')
@section('content')

<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
    <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
    @foreach($category_products as $product)
        <li class="breadcrumb-item active">{{$product->category->category_name}}</li>  
    @endforeach
</ol>
</div>
    
    <div class="container-fluid">
        <div class="row">
		<div class="col-lg-4">
			@include("frontend.pricerange") 
		</div>
	
		<div class="col-lg-8">
		
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @forelse( $category_products as $product)
                        <div class="col-lg-4 col-md-6">

                            <div class="card mb-3" style="max-width: 18rem;">

                                <div class="card-body text-success">
                                    <a href="{{url('productDetail',$product->id)}}">
                                    <img class="card-image product-images" 
                                    src="{{URL::to('/')}}/images/{{ $product->image }}" alt="">
                                    </a>
                                </div>

                            </div>
                                    <a class="product-name" href="{{url('productDetail',$product->id)}}">
                                        {{$product->p_name}}
                                    </a>
                                    <h6 class="price" >{{$product->price}}-kyats</h6>
                        </div>{{-- col-lg-4 col-md-6 --}}

                        @empty
                            <h3>No Products</h3>
                        @endforelse

                    </div>{{-- row --}}
                </section>
		</div>{{-- col-lg-8 --}}
	</div>{{-- row --}}
</div>{{-- container-fluid --}}

@endsection

@section('scripts')


@endsection
