@extends('frontend.master')

@section('title','E-Shop')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/owl.theme.default.min.css') }}">

<section id="testimonials">
	<div id="testimonial-carousel" class="carousel slide" data-interval="5000" data-ride="carousel" >  
		
		<ol class="carousel-indicators">
			<li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#testimonial-carousel" data-slide-to="1"></li>
			<li data-target="#testimonial-carousel" data-slide-to="2"></li>
		</ol> 
		<div class="carousel-inner">
			<div class="carousel-item active" style="background-color: #dbdbdb;">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<div class="text-box">
								<em class="introduction animated zoomInLeft" style="animation-delay:400ms; font-size:3vw;">Introduction the new</em>
								<h3 class="huawei animated bounceInRight" style="animation-delay:1000ms; font-size:4vw;">HUAWEI <br> Mate 20 X 5G </h3>
								<h6 class="animated fadeInUp" style="animation-delay:1500ms;">Connecting The Future</h6>
							</div>
							<form method="get" action="{{url('allproducts')}}">
							<button type="submit" class="btn animated zoomIn" style="animation-delay: 2000ms; margin-left: 30%; margin-bottom: 10%;">Shop now</button>				
						</form>			
						</div>
						<div class="col-6">
							<img class="responsive" style="margin:10% 30% 3% 20%;" width="400px" height="400px" src="/img/frontend/banner/11.png">
							
						</div>
					</div>
				</div>
			</div>
			  <div class="carousel-item" style="background-color:#dbdbdb; ">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<img class="responsive animated slideInDown"  style="animation-delay:300ms; margin-top: 10%;" width="600px" height="400px" src="/img/frontend/banner/44.png">
						</div>
						<div class="col-6">
							<div class="text-box">
								<em class="animated fadeInDownBig" style="animation-delay: 600ms; font-size:3vw;">Introduction the new</em>
								<h3 class="animated slideInRight" style="animation-delay: 1100ms;font-size:4vw;">Samsung <br> Galaxy Z Flip</h3>
								<h6 class="animated fadeInUpBig" style="animation-delay: 1500ms;">Glass.But make it fold.</h6>
							</div>
							<form method="get" action="{{url('allproducts')}}">
							<button type="submit" class="btn animated bounceInRight" style="animation-delay: 2000ms;margin-left: 30%; margin-bottom: 10%;">Shop now</button>
							</form>
						</div>
					</div>
				</div>
			  </div>
			
			<div class="carousel-item" style="background-color:#dbdbdb; ">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<img class="responsive animated slideInRight" style="animation-delay:400ms; margin-top: 15%;margin-right: 40%;" width="600px"  height="600px" src="/img/frontend/banner/55.png">
						</div>
						<div class="col-6">
							<div class="text-box" style="margin-left: 10%;">
								<h3  class="animated zoomInDown" style="animation-delay:1000ms;font-size:4vw;"><span class="fab fa-apple"></span>WATCH Series 5</h3>
								<h6 class="animated slideInRight" style="animation-delay:1700ms;"> The #1 smartwatch in the world.</h6>
							</div>
							<form method="get" action="{{url('allproducts')}}">
							<button type="submit" class="btn animated bounceInRight" style="animation-delay: 2300ms;margin-left: 30%; margin-bottom: 10%;">Shop now</button>
							</form>
						</div>
					</div>
				</div>
		</div>
	</div>
</section>

<div class="container delivery">
	<div class="row de">
		
				<div class="col-lg-3 col-md-6 four-icon">
					<div class="card truck-card">
						<div class="body">			  
							<div class="col truck">
								<i class="icon fas fa-truck fa-2x"></i>
							  <h4>Free Delivery</h4>
								  <p>Free Shipping on all order</p>
							</div>
					  </div>
					</div>						
				</div>

				<div class="col-lg-3 col-md-6 four-icon">
					<div class="card truck-card">
						<div class="body">			  
							<div class="col truck">
								<i class="icon fas fa-sync-alt fa-2x"></i>
							  <h4>Return Policy</h4>
								<p>Free Shipping on all order</p>
							</div>
					  </div>
					</div>						
				</div>

				<div class="col-lg-3 col-md-6 four-icon">
					<div class="card  truck-card">
						<div class="body">			  
							<div class="col truck">
								<i class="icon fa fa-clock-o fa-2x"></i>
							  <h4>24/7 Support</h4>
								<p>Free Shipping on all order</p>
							</div>
					  </div>
					</div>						
				</div>

				<div class="col-lg-3 col-md-6 four-icon">
					<div class="card truck-card">
						<div class="body">			  
							<div class="col truck">
								<i class="icon fas fa-database fa-2x"></i>
							  <h4>Secure Payment</h4>
								<p>Free Shipping on all order</p>
							</div>
					  </div>
					</div>						
				</div>
	
	</div>
</div>

<div class="container arrival">
	<div class="row">
		<div class="col">
			<h3>New Arrivals</h3>
		<p class="arrival-sub">Valid on select styles online and in-store supplies last</p>
		<hr>
		</div>
<div class="owl-carousel owl-theme">
	@foreach( $arrival as $photo )
	<div class="item">
		<a href="{{url('productDetail',$photo->id)}}">
			<img class="card-image product-images" Width=100% height=100%
				src="{{URL::to('/')}}/images/{{ $photo->image }}" alt="">
		</a>
			<a class="product-name" href="{{url('productDetail',$photo->id)}}">
				{{$photo->p_name}}
			</a>
				<h6 class="price" >{{$photo->price}}-kyats</h6>
	</div>
	@endforeach 
</div>
	</div>
</div>



<div class="container category">
	<div class="row">
			@foreach($categories as $category)
		<div class="col-lg-6 col-md-6">
			<div class="card category-box">
				<div class="card-body text-success">			  
				  <div class="row">
					  <div class="col">
					  	<a href="{{url('category',$category->id)}}" type="button" style="color: #dd2c00;" class="btn-floating shop-now">
						<img class="card-image product-images"
						src="{{URL::to('/')}}/images/{{ $category->image }}" alt="">
					</a>
					</div>
					  <div class="col cat-name">
						<h4 style="color:black;">{{$category->category_name}}</h4>
						<a href="{{url('category',$category->id)}}" type="button" style="color: #dd2c00;" class="btn-floating shop-now">
							<p style="color: black;">Shop Now &nbsp;<span class="fas fa-play-circle" style="color:#0090F0;" aria-hidden="true"></span></p>
						</a>
						
					  </div>
				  </div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

	<div class="container blog">
		<p style="color: black; font-size: 30px">From Our Blogs</p>
		<p style="font-size: 15px">The latest news, videos, and discussion topics</p>  
		<hr>
			<div class="row">
				@foreach( $blogs as $list )
					<div class="col-lg-3 col-md-6">
	
						<div class="card mb-3" style="max-width: 20rem; max-height: 50rem">
							<div class="card-image">
							<a href="{{url('blogDetail',$list->id)}}">
								<img class="card-image product-images"
								src="{{URL::to('/')}}/images/{{ $list->image }}" alt=""></a> 
							</div>
						<div class="card-body">
							<p class="blog-title">{{$list->title}}</p>
							<hr>
								<p  style="color: #888888;">{{ Carbon\Carbon::parse($list->created_at)->diffForHumans()}}</p>
								<div class="blog-text">
									By <strong style="color:#1b1b2f"> {{$list->name}} </strong><br>
									   		
								</div>

								{!! Str::limit($list->blog_paragraph, 100) !!}
								<br>
								<a href="{{url('blogDetail',$list->id)}}" style="color: #0090F0;" class="see-more" >See more</a>
						</div>
					</div>
			</div>
			@endforeach 
		</div>
	</div>

@endsection

@section('scripts')

<script src="{{asset('js/wNumb.min.js')}}"></script>

<script src="{{asset('js/frontend/owl.carousel.js')}}"></script>
<script src="{{asset('js/frontend/owl.carousel.min.js')}}"></script>

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