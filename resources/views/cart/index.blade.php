@extends('frontend.master')

@section('title','Cart')
@section('content')

<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item active">Shopping-cart</li>
</ol>
</div>

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
<br>
    <h4>Shopping Cart</h4>

        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $cartItem)

                        <tr>
                            
                            <td><img src="{{URL::to('/')}}/images/{{ $cartItem->products->image }}"
                                    class="img-thumbnail" width="100px" height="100px" alt="Image" /></td>
                            <td>{{$cartItem->products->p_name}}</td>
                            <td>{{$cartItem->products->price}}</td>
                            <td>
                                {{$cartItem->quantity}}
                            </td>
                            <td>{{$cartItem->total }}</td>
                            <td>
                                <a href="{{url('/')}}/removecardslist/{{$cartItem->id}}"
                                    onclick="return confirm('Are you sure?');"  type="button" style="color: #dd2c00;" class="btn-floating">
                                    <i class="fas fa-trash fa-2x" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <strong>Total Quantity : </strong>{{$quantities}}
                <br>
                <strong>Total Price : </strong>{{ $total }}
                <br>
                <div class="checkout_btn_inner d-flex align-items-center" style="float:right">
                    <a class="myButton prodeed-to-shipping" href="{{route('checkout.shipping')}}">Proceed To Checkout</a>
                </div>
                <div class="checkout_btn_inner d-flex align-items-center" style="float:right">
                    <a class="myButton" href="{{url('/shipping_info')}}">Continue Shopping</a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
@endsection