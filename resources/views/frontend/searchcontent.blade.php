@extends('frontend.master')

@section('title','Digital World')
@section('content')
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
    <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
</ol>
</div>

<div class="container main">
	<div class="row">
		<div class="col-lg-4 price-range">
			@include("frontend.pricerange")
		</div>
		
		<div class="col-lg-8">
		    <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                        @if(count($products)>0)

                        @foreach($products as $product)

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
                        </div>
                        @endforeach
                        @else

                        @if($products->isEmpty())
                             <h4 style="margin-top: 50px; margin-left: 60px;">
                                Sorry, Products not found</h4>
                        @endif


                        @endif
                </div>
            </section>
        </div>
        
	</div>
</div>

@endsection

@section('scripts')

@endsection