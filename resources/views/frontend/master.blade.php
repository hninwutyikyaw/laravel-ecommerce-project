<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta charset="utf-8" />
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset('img/frontend/fav.png') }}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>
		@yield('title')
	</title>

	<!--===CSS=== -->
	<link rel="stylesheet" href="{{ asset('css/frontend/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/easyzoom.css') }}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
</head>

<body>

	<div class="container-fluid">
		<div id="text">
			Welcome you to our store!
		</div>
	</div>

<!-- Start navbar-->
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="{{url('/home')}}">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/allproducts')}}">Products</a></li>

						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							 aria-expanded="false">Brands</a>
							<ul class="dropdown-menu">
								<li class="nav-item">	
									@foreach($brands as $brand)
										<li class="nav-item">
											<a class="nav-link" href="{{url('brand',$brand->id)}}">{{($brand->brand_name)}}</a>
										</li>
									@endforeach
								</li>	
							</ul>
						</li>

						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							 aria-expanded="false">Category</a>
							<ul class="dropdown-menu">
								<li class="nav-item">
									@foreach($categories as $category)
									<li class="nav-item"><a class="nav-link"
											href="{{url('category',$category->id)}}">{{($category->category_name)}}</a></li>
									@endforeach
								</li>	
							</ul>
						</li>

						<li class="nav-item"><a class="nav-link" href="{{url('/blogs')}}">Blogs</a></li>

						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								@guest
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-user-circle fa-2x"></i>
									</a>
								@else
									<img style="width:30px;height:30px;border-radius:50%;" src="{{asset(Auth::user()->user_image )}}"alt="">
	            			{{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
								@endguest
							</a>

							<ul class="dropdown-menu">
								<li class="nav-item">
									<!-- Authentication Links -->
									@guest
										<li class="nav-item">
											<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
										</li>
										@if (Route::has('register'))
											<li class="nav-item">
												<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
											</li>
										@endif
									@endguest

									@auth
											<div class="dropdown-menu" aria-labelledby="navbarDropdown">
												<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
													{{ __('Logout') }}
												</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST">
													@csrf
												</form>
											</div>
									@endauth
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
	</div>
	
</header>
<!-- End nav bar -->

<!-- START BLUE HEAD BAR -->
		<div class="container-fluid header-bar">
			<div class="row">

				<div class="col-lg-3 col-md-6">
					<div class="header">
						<a class="header-logo" href="{{url('/home')}}">E-Shop</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="header">
						{{-- <i class="header-icon fas fa-address-book fa-3x"></i> --}}
						<p class="callus-text">Call us: +95 893245644</p>
						<p class="callus-text">eshop@gmail.com</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="header">
						<form class="d-flex justify-content-between" action="{{url('search')}}">
							<input type="text" class="form-control form-rounded" id="search_input" placeholder="Search product here..." name="searchData" aria-label="Search">
							<button type="submit" class="search-box btn-floating">
							 <i class="search fas fa-search"></i></button>
						</form>
					</div>	
				</div>
				
						
			<div class="col-lg-3 col-md-6">
				<div class="header">
					<div class="container-fluid">
						<div class="row">	
					
						<a class="nav-link blue-bar-icon" href="{{url("cart")}}" >
							<i class="Shopping-icon fa fa-shopping-cart fa-2x"></i>
								<span class="shopping-text">Cart</span>
								<span style="color:white; font-weight:bold;">
									{{$carts}}
								</span>
						</a>

					<a class="nav-link blue-bar-icon" href="{{url("wishlist")}}">
						<i class="Shopping-icon fa fa-star fa-2x"></i>
							<span class="shopping-text">Wishlist</span>
							<span style="color:white; font-weight:bold;">
								{{$wishlists}}
							</span>
					</a>
					
				</div>
				</div>	
				</div>
				</div>
			</div>
		</div>
		
	<!-- END BLUE HEAD BAR -->
	<div class="content">

		@yield('content')
	</div>
	

	<!-- START BLUE END BAR -->
				
					
						<div class="container-fluid footer-blue-bar">
							<div class="row">

								<div class="col-lg-4 col-md-6">
									<div class="footer">
										<h3 class="footer-sign">Sign Up For Newsletters!</h3>
										<p class="footer-sign">Be the First to Know. Sign up for newsletter today !</p>
									</div>
								</div>

								<div class="col-lg-4 col-md-6">
									<div class="footer">
										<div class="input-group box-group">
											<input type="text" class="form-control form-rounded" placeholder="Your email address" 
											aria-label="Recipient's username">
											<div class="input-group-append">
											  <span class="input-group-text form-rounded">Sign Up</span>
											</div>
										  </div>
										  
									</div>
								</div>

								<div class="col-lg-4">
									<div class="footer social">
										<i class="social-icon fab fa-facebook-f fa-2x"></i>
										<i class="social-icon fab fa-twitter fa-2x"></i>
										<i class="social-icon fab fa-instagram fa-2x"></i>
										<i class="social-icon fab fa-youtube fa-2x"></i>
										<i class="social-icon fab fa-google-plus-g fa-2x"></i>
									</div>
								</div>

							</div>
						</div>	
					
	<!-- END BLUE END BAR -->

						<div class="container-fluid contact">
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="footer">
										<i class="contact-icon fas fa-map-marker-alt fa-2x"></i>
										<h5>No(11) Maharbandula St Upper Block, Ygn</h5>
										<p class="contact-text">Contact Info!</p>
									</div>
								</div>
								<div class="col-lg-4 col-md-6">
									<div class="footer">
										<i class="contact-icon far fa-envelope fa-2x"></i>
										<h5>eshop@gmail.com</h5>
										<p class="contact-text">Orders Support!</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="footer">
										<i class="contact-icon fas fa-phone fa-2x"></i>
										<h5>+95 893245644, +01 661840</h5>
										<p class="contact-text">Free support line!</p>
									</div>
								</div>
							</div>
						</div>

						<div class="container-fluid end-footer">
							<div class="row">
								
								<div class="col-lg-3 col-md-6">
									<h3>Information</h3>
									<hr class="footer-line">
									<div class="last-footer">
										<ul class="footer_ul">
											<li class="footer-list"><a href="">Delivery</a></li>
											<li class="footer-list"><a href="">About us</a></li>
											<li class="footer-list"><a href="{{url('contact')}}">Contact us</a></li>
											<li class="footer-list"><a href="">Store</a></li>
										</ul>
									</div>
								</div>
								
								<div class="col-lg-3 col-md-6">
									<h3>Products</h3>
									<hr class="footer-line">
									<div class="last-footer">
									<ul class="footer_ul">
										<li class="footer-list"><a href="">Legal Notice</a></li>
										<li class="footer-list"><a href="">New products</></li>
										<li class="footer-list"><a href="{{ route('login') }}">Login</></li>
										<li class="footer-list"><a href="">My account</></li>
									</ul>
									</div>
								</div>
 
								<div class="col-lg-3 col-md-6">
									<h3>My Account</h3>
									<hr class="footer-line">
									<div class="last-footer">
										<ul class="footer_ul">
											<li class="footer-list"><a href="{{url('/profile')}}">Personal info</a></li>
											<li class="footer-list"><a href="{{url('/orders')}}">Orders History & Detail</a></li>
											<li class="footer-list"><a href="{{url('/address')}}">Address</a></li>
											<li class="footer-list"><a href="{{url('/password')}}">Password</a></li>
										</ul>
									</div>
								</div>

						<div class="col-lg-3 col-md-6">
							<h3>Information</h3>
							<hr class="footer-line">
							<div class="last-footer">
								<ul class="footer_ul">
									<li class="footer-list"><a href="">Delivery</a></li>
									<li class="footer-list"><a href="">About us</a></li>
									<li class="footer-list"><a href="{{url('contact')}}">Contact us</a></li>
									<li class="footer-list"><a href="">Store</a></li>
								</ul>
							</div>
						</div>
							
					</div>
				</div>
				
							<div class="col copyright">
									Copyright 2020 UniqueDesign Inc. All Rights Reserved
							</div>
					
						<a onclick="topFunction()" id="myBtn"  href="#"><i class="fas fa-arrow-up"></i><a>
					
					
{{-- End footer Area --}}
	
			<script src="{{asset('js/frontend/ckeditor.js')}}"></script>
			<script src="{{asset('js/frontend/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
				integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
				crossorigin="anonymous"></script>
				{{-- <script src="{{asset('js/frontend/popper.min.js')}}"></script>	 --}}
			<script src="{{asset('js/frontend/vendor/bootstrap.min.js')}}"></script>
			<script src="{{asset('js/frontend/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('js/frontend/jquery.nice-select.min.js')}}"></script>
			<script src="{{asset('js/frontend/jquery.sticky.js')}}"></script>
			<script src="{{asset('js/frontend/nouislider.min.js')}}"></script>
			<script src="{{asset('js/frontend/jquery.magnific-popup.min.js')}}"></script>
			<script src="{{asset('js/frontend/owl.carousel.js')}}"></script>
			<script src="{{asset('js/frontend/owl.carousel.min.js')}}"></script>
			<script src="{{asset('js/frontend/easyzoom.js')}}"></script>
			<script src="{{asset('js/frontend/scroll-reveal.js')}}"></script>
			<script src="{{asset('js/frontend/owl.carousel.min.js')}}"></script>
			<!--gmaps Js-->
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
			<script src="{{asset('js/frontend/gmaps.min.js')}}"></script>
			<script src="{{asset('js/frontend/main.js')}}"></script>
			<script src="https://js.stripe.com/v3/"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


			@yield('scripts')

<script>
        
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({html:true});

	});
</script>
<script>

var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
	</script>
</body>

</html>