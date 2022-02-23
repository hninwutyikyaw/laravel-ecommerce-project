@extends('frontend.master')

@section('title','Profile')
@section('content')
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item active">Personal info</li>
</ol>
</div>
<section id="cart-item">
    <div class="container">
        <br>
        <h2 style="text-align: center">
            Welcome
            <span style="color: #0090F0">{{Auth::user()->name}}</span>
        </h2>
        <h4>Your account</h4>
        <hr>

        <div class="row">
                <div class="col-lg-4 col-md-6">
                 
                    <div class="card border-dark profile-box" style="max-width: 18rem;">
                        <div class="card-body text-primary">
                            <a href="{{url('/orders')}}">
                                <i class="profile-icon fas fa-calendar-week fa-2x"></i>
                            </a>
                          <h5 class="profile-text card-title">Orders History and Detail</h5>
                        </div>
                    </div> 

                </div>

                <div class="col-lg-4 col-md-6">
                 
                    <div class="card border-dark profile-box" style="max-width: 18rem;">
                        <div class="card-body text-primary">
                            <a href="{{url('/address')}}">
                                <i class="profile-icon fas fa-address-card fa-2x"></i>
                            </a>
                          <h5 class="profile-text card-title">My Address</h5>
                        </div>
                    </div> 
                
                </div>
                        
                <div class="col-lg-4">
                 
                    <div class="card border-dark profile-box" style="max-width: 18rem;">
                        <div class="card-body text-primary">
                            <a href="{{url('/password')}}">
                                <i class="profile-icon fas fa-key fa-2x"></i>
                            </a>
                          <h5 class="profile-text card-title">Update Password</h5>
                        </div>
                    </div> 

                </div>        
        </div>
    </div>
</section>

@endsection
	
@section('scripts')
   
@endsection