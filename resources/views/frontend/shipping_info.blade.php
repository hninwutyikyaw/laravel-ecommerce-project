@extends('frontend.master')

@section('title','shipping info')
@section('content')
<style>
  .myButton{
      margin-left:40%;
  }
</style>

<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item"><a href="{{url('/cart')}}" class="cart-link">Shopping-cart</i></a></li>
<li class="breadcrumb-item active">Checkout</li>
</ol>
</div>

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="Shipping-text">Checkout</h3>

                    {!! Form::open(['route' => 'address.store', 'method' => 'post']) !!}

                    <div class="form-group">
                        {{ Form::label('phone', 'Phone') }}
                        {{ Form::text('phone', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('addressline', 'Address Line') }}
                        {{ Form::text('addressline', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City') }}
                        {{ Form::text('city', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('state', 'State') }}
                        {{ Form::text('state', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('zip', 'Zip') }}
                        {{ Form::text('zip', null, array('class' => 'form-control')) }}
                    </div>
                    {{-- <div class="form-group">
                        {{ Form::label('payment method', 'Payment Method') }}
                        {{ Form::text('payment method', null, array('class' => 'form-control')) }}
                      <br>     
                    <input type="radio"> Pay by Cash on Delivery
                    <br>
                    <br>
                    <input type="checkbox">I agree to the terms of service and will adhere to them unconditionally.
                    </div> --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{ Form::submit('Proceed to Payment', array('class' => 'myButton')) }}
                    {!! Form::close() !!}
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>


<!--================End Checkout Area =================-->

@endsection

@section('scripts')

@endsection