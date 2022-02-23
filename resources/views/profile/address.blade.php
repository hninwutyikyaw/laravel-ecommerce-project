@extends('frontend.master')

@section('title','Address')
@section('content')
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item"><a href="{{url('/profile')}}" class="breadcrumb-link">Personal info</i></a></li>
<li class="breadcrumb-item active">My Address</li>
</ol>
</div>

<section id="cart-item">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-7">
                <h3 ><span style="color: #0090F0;">{{(Auth::user()->name)}}></span>Your Address</h3>
               <div class="address">
                   @if(session('msg'))
                        <div class="alert altert-info">
                            {{session('msg')}}
                        </div>
                   @endif
                <form action="{{url('updateAddress')}} " method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @foreach($address as $value)
                    <div class="form-group address-form {{$errors->has('')?'has-error':''}}">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control address-input" value="{{$value->phone}}" name="phone" id="phone" placeholder="Phone Number">
                        <span class="text-danger">{{$errors->first('')}}</span>
                    </div>  
                    <div class="form-group address-form {{$errors->has('')?'has-error':''}}">
                        <label for="addressline">Addressline</label>
                        <input type="text" class="form-control address-input" value="{{$value->addressline}}" name="addressline" id="addressline" placeholder="Address">
                        <span class="text-danger">{{$errors->first('')}}</span>
                    </div>  
                    <div class="form-group address-form {{$errors->has('')?'has-error':''}}">
                        <label for="city">City</label>
                        <input type="text" class="form-control address-input" value="{{$value->city}}" name="city" id="city" placeholder="City">
                        <span class="text-danger">{{$errors->first('')}}</span>
                    </div>  
                    <div class="form-group address-form {{$errors->has('')?'has-error':''}}">
                        <label for="state">State</label>
                        <input type="text" class="form-control address-input" value="{{$value->state}}" name="state" id="state" placeholder="Sziptate">
                        <span class="text-danger">{{$errors->first('')}}</span>
                    </div>  
                    <div class="form-group address-form {{$errors->has('')?'has-error':''}}">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control address-input" value="{{$value->zip}}" name="zip" id="zip" placeholder="ip">
                        <span class="text-danger">{{$errors->first('')}}</span>
                    </div>  
                @endforeach 
                <button type="submit" class="myButton update-address">Update Address</button>
                </form>
               </div>
                </div> 
            </div>
    </div>
</section>

@endsection
	
@section('scripts')
   
@endsection