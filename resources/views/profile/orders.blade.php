@extends('frontend.master')

@section('title','Order')
@section('content')

<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item"><a href="{{url('/profile')}}" class="breadcrumb-link">Personal info</i></a></li>
<li class="breadcrumb-item active">Order Historys & Details</li>
</ol>
</div>

    <div class="container">
        <br>
        <h3><span style="color: #0090F0; ">{{(Auth::user()->name)}}></span>Your Orders</h3>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="cart-inner">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Item name</th>
                                            <th>Order Status</th>
                                            <th>Item Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td><img src="{{URL::to('/')}}/images/{{ $order->image }}" class="img-thumbnail"
                                                    width="100px" height="100px" alt="Image" /></td>
                                            <td  width="150px" height="100px">{{$order->p_name}}</td>
                                            <td>{{$order->delivered? "delivered" : "pending"}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->qty}}</td>
                                            <td>{{$order->price*$order->qty}}</td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
  
       
            </div>
        </div>
    </div>


@endsection

@section('scripts')

@endsection