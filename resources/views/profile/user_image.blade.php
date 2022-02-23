@extends('frontend.master')

@section('title','Profile Image')
@section('content')
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item"><a href="{{url('/profile')}}" class="breadcrumb-link">Personal info</i></a></li>
<li class="breadcrumb-item active">My Profile Image</li>
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

            <img style="width:300px;height:300px;" src="{{asset(Auth::user()->user_image )}}"alt=""></div>
                <a href="/userimage_edit/{{Auth::user()->id}}" class="wishist-button">
                  <i class="fas fa-edit fa-2x"></i>
                </a>
                </form>
               </div>
                </div> 
            </div>
    </div>
</section>

@endsection
	
@section('scripts')
   
@endsection