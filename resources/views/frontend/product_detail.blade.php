@extends('frontend.master')

@section('title','Detail Product')
@section('content')
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item">{{$product->category->category_name}}</li>
<li class="breadcrumb-item active">{{$product->p_name}}</li>
</ol>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <br>
            <br>
            <div class="card detail-image" style="width: 20rem;">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                <a href="{{URL::to('/')}}/images/{{ $product->image }}">
                        <img class="image" style="Width:100%;cursor:pointer"
                        src="{{URL::to('/')}}/images/{{ $product->image }}" alt="">
                    </div>
                </a>
            </div>
        </div>
    <div class="col-lg-6 col-md-6">
        <br>
        <br>
        <div class="card w-75">
            <div class="card-body">
                <h4 class="box">{{$product->category->category_name}}</h4>
                <h1 class="card-title product-detail-name">{{$product->p_name}}</h1>
                <h4 class="brand">{{$product->brand->brand_name}}</h4>
                <p class="card-text price">{{$product->price}}-kyats</p>
                 @if(($product->stock)>0)
                <h4 class="quantity-left">Quantity : {{$product->stock}} left</h4>
                @else
               @if(($product->stock)==0)
                <h3 style="color: red">Out of stock</h2>
                @else
                @endif
                @endif
                <hr>
                
                <div class="product-cart">
                    @auth
                    
                    @if ($cart_count=="0")

                    <form action="{{route('addToCard')}}" mehtod="POST" role="form">
                        <input type="hidden" name="token" value="{{csrf_token()}}">
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <div class="quantity" style="color:#0D224F;font-weight:550;">
                            Quantity :
                        <input name="quantity" class="quantity-box" type="number" min="0" max="{{ $product->stock }}" step="1" value="0">
                        <button type="submit" class="Button cart-button">+ Add to cart</button>
                    </div>  
                    </form>
                    @else
                    <p>
                        The product was successfully added to your cart.
                        <br>
                        Check
                        <a href="{{url('/cart')}}">
                            Here
                        </a>
                    </p>
                    @endif
                    @endauth
                    @guest
                    <form action="{{route('addToCard')}}" mehtod="POST" role="form">
                        <input type="hidden" name="token" value="{{csrf_token()}}">
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <div class="quantity" style="color:#0D224F;font-weight:550;">
                            Quantity :
                        <input name="quantity" class="quantity-box" style="width:50px;" type="number" min="0" max="{{ $product->stock }}" step="1" value="0">
                        <button type="submit" class="Button">Add to cart</button>
                    </form>
                    @endguest
                </div>

              
                @auth
                
                @if ($counts == 0)
                <form action="{{route('addToWishlist')}}" mehtod="POST" role="form">
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <button type="submit" class="wishlist-button"><i class="fas fa-heart"></i> Add to wishlist</button>
                </form>
                @else
                <p>
                   The product was successfully added to your wishlist.
                    <br>
                    Check 
                    <a href="{{url('/wishlist')}}">
                       Here
                    </a>
                </p>
                @endif
                @endauth
                @guest
                <form action="{{route('addToWishlist')}}" mehtod="POST" role="form">
                    <input type="hidden" name="token" value="{{csrf_token()}}">
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <button type="submit" class="wishlist-button"><i class="fas fa-heart"></i>Add to wishlist</button>
                </form>
                @endguest
           
                @auth
              
                @if ($count=="0")
                  <a href="#" class="Button" data-toggle="modal" data-target="#exampleModal">Write a review</a>
                @else
                <p>
                    Your wrote review for this product. Thanks you for your review! 
                    <br>
                    Please Check
                    
                </p>
                @endif
                @endauth
                @guest
                <a href="/login"  class="Button" >Write a review</a>
                @endguest
                <a href="/compare"  class="Button" >Compare</a>
            </div>
            
        </div>
        </div>
        <br>
        {{-- end row --}}
    </div>
    {{-- end container --}}
</div>


   <p class="overall">Overall rating</p>
 
            <h1 class="average-rating">
               {{ number_format($rate, 2, '.', ',')}}
           </h1> 
           <p class="base">based on {{$count_review}} reviews</p>
           <hr class="review">
 
  <!-- Modal -->
 @include('frontend.review_form')
 @if($product->reviews->isEmpty())
 <h4 style="color: #0090F0; margin: 5%; text-align:center;">
    Nothing review for this product</h4>
    @else
  <div class="container-fluid review">
    <h3 style="color:#0090F0;">Reviews</h3>
    
    <div class="row" id="posts">
   
            @forelse($review as $reviews)
            <div class="col-lg-4">
                <img style="width:50px;height:50px;border-radius:50%;" src="{{asset($reviews->user->user_image )}}"alt="">
               <br> 
              {{ $reviews->created_at->format('d.m/  Y')}}
            </div>

            <div class="col-lg-8">
             <strong>{{$reviews->user->name}}</strong>
             <br>
                Rating:  <strong>{{$reviews->rating}}</strong> 
                <br>
                <strong> {{$reviews->headline}}</strong>
                <br>
                {{$reviews->description}}
                <br>
                   
            </div>  
            <hr>

            @empty
            
            @endforelse

        </div>
        <hr>

                    <ul class="pagination" style="float:right;">
                        <li class="pag">{{$review->links()}}</li>
                    </ul>

       
            <button class="see-more myButton" data-page="2" data-link="http://localhost:8000/productDetail/{{$product->id}}?page=" data-div="#posts">
            See more</button>
</div>
@endif

<div class="container-fluid" style="background-color: #F6F6F6">
    <div class="row">
        <div class="specification-list" style="background-color: #ffffff; margin: 3%;width:100%;">
            <p class="specification-title">Specification</p>
            <div class="col">
                <div class="tab-content" id="description">
                            {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

<!--================End Single Product Area =================-->

@endsection

@section('scripts')
<script>

$(".see-more").click(function() {
  $div = $($(this).attr('data-div')); //div to append
  $link = $(this).attr('data-link'); //current URL
  $page = $(this).attr('data-page'); //get the next page #
  $href = $link + $page; //complete URL
  $.get($href, function(response) { //append data
    $html = $(response).find("#posts").html(); 
    $div.append($html);
  });
  $(this).attr('data-page', (parseInt($page) + 1)); //update page #
});
</script>
@endsection