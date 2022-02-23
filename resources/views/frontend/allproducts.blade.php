@extends('frontend.master')

@section('title','Digital World')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">


<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item active">Products</li>
</ol>
</div>

 <div class="container-fluid">
	<div class="row">
		<div class="col-lg-4 price-range">
			@include("frontend.pricerange")
		</div>
		
		
		<div class="col-lg-8">
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">
					@forelse($products as $product)
					
					<div class="col-lg-4 col-md-6">

						<div class="card mb-3" style="max-width: 18rem;">

							<div class="card-body text-success">
							  	<a href="{{url('productDetail',$product->id)}}">
									<img class="card-image product-images" Width=100% height=100%
									src="{{URL::to('/')}}/images/{{ $product->image }}" alt="">
								</a>
								
							</div>

						</div>

						<div class="title-box">
								<a class="product-name" href="{{url('productDetail',$product->id)}}">
									{{$product->p_name}}
								</a>
								<div class="price-box">
									<h6 class="price" >{{$product->price}}-kyats</h6>
								</div>
							</div>
						
					</div>

					@empty
						<h3>No Products</h3>
					@endforelse

				</div>
			</section>

			<br><br>
	
			<div class="background">
				<div class="transbox">
					   <ul class="pagination">
						<li>{{$products->links()}}</li>
					</ul>
					Page:{{$products->currentpage()}}-{{$products->lastpage()}} Total:{{$products->total()}}
				</div>
			</div>

		</div>{{-- col-lg-8 --}}

	</div>{{-- row --}}
</div>{{-- container-fluid --}}
@endsection

@section('scripts')

<script src="{{asset('js/wNumb.min.js')}}"></script>
<script src="{{asset('js/nouislider.min.js')}}"></script>
<script src="{{asset('js/frontend/owl.carousel.js')}}"></script>
<script src="{{asset('js/frontend/owl.carousel.min.js')}}"></script>

<script>
var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [10000, 2000000],
	connect: true,
	tooltips: true,
    range: {
        'min': 10000,
        'max': 2000000
	},
	format: wNumb({
        decimals: 0
	}),
	step: 100000
});

window.slider = slider;

function searchItems() {
	let data = slider.noUiSlider.get();

	let min_price = data[0];
	let max_price = data[1];
	
	let min_price_input = document.getElementById('min_price');
	min_price_input.value = min_price;
	
	let max_price_input = document.getElementById('max_price');
	max_price_input.value = max_price;

}
</script>

<script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
</script>

@endsection