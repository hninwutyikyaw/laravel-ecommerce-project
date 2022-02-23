@extends('frontend.master')

@section('title','Order Confirm')
@section('content')
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item"><a href="{{url('/cart')}}" class="breadcrumb-link">Shopping-cart</i></a></li>
<li class="breadcrumb-item"><a href="{{url('/shipping_info')}}" class="breadcrumb-link">Checkout</i></a></li>
<li class="breadcrumb-item active">Order Confirm</li>
</ol>
</div>

<section class="order_area">
    <div class="container">
        <div class="order_inner">
            <br>
            <h3 style="color:#0090F0;text-align:center;">
                <i class="fa fa-check-circle i-check-circle--size"></i>
                We've recieved your order!
            </h3>
            <h3 class="order-confirm-text">Delivery details</h3>
            <br>
            <h5 class="order-confirm-text">Delivery for</h5>
            Name:{{(Auth::user()->name)}}
            <br>
            Phone no:{{$shipping_address->phone}}
            <br>
            <br>
            <h5 class="order-confirm-text">Address</h5>
            {{$shipping_address->addressline}},
            {{$shipping_address->state}},
            {{$shipping_address->city}},
            {{$shipping_address->zip}}
            <br>
            <br>
        
            <h5 class="order-confirm-text">Payment information</h5>
            Cash on delivery (CDO)
            <br>
            <br>
            
            <h5 class="order-confirm-text">Total Payment: {{ session('total') }}-kyats</h5>
            <h5 class="order-confirm-text">Total Quantity: {{ session('quantities') }}</h5>
           
            <br>
            <br>
            <div class="checkout_btn_inner d-flex align-items-center" >
                <a class="myButton" href="{{route('storeOrder')}}">Order Confirm</a>
                <a href="{{url('dynamic_pf/pdf')}}" lass="btn btn-default"><i class="fa fa-print"></i>Print</a>
               
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
@section('scripts')
@endsection
