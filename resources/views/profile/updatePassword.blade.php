@extends('frontend.master')

@section('title','Password')
@section('content')


<br>
    <div class="container">  
        <ol class="breadcrumb breadcrumb-right-arrow">
    <li class="breadcrumb-item"><a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
    <li class="breadcrumb-item"><a href="{{url('/profile')}}" class="breadcrumb-link">Personal info</i></a></li>
    <li class="breadcrumb-item active">Update Password</li>
    </ol>
    </div>

    <div class="container">
        <h3 ><span style="color: #0090F0;">{{(Auth::user()->name)}}></span>Your Password</h3>
        <strong>Update your password</strong>
        <div class="row">
           
            <div class="col-lg-7">
            
            <div class="password">
              
                   {{-- @if(session('msg'))
                        <div class="alert altert-info">
                            {{session('msg')}}
                        </div>
                   @endif --}}
                   @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
                   @endif
                   <br>
                <form action="{{url('updatePassword')}} " method="POST" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="method" value="PUT">
                    <div class="form-group password{{$errors->has('oldPassword')?'has-error':''}}">
                        <label class="password-label" for="oldPassword">Current Password </label>
                        <input type="password" class="form-control password-input"  name="oldPassword" id="oldPassword" placeholder="Old Password">
                        <span class="text-danger">{{$errors->first('')}}</span>
                    </div>  
                    <div class="form-group password {{$errors->has('')?'has-error':''}}">
                        <label class="password-label" for="newPassword">New Password</label>
                        <input type="password" class="form-control password-input" name="newPassword" id="newPassword" placeholder="New Password">
                        <span class="text-danger">{{$errors->first('')}}</span>
                    </div>  

                <button type="submit" class="myButton Update-Password">Update Password</button>
                </form>
  
            </div>
        </div>
    </div> 
</div>
   
@endsection
	
@section('scripts')
   
@endsection