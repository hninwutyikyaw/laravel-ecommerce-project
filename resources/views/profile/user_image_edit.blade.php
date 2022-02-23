@extends('frontend.master')

@section('title','User_image_Edit')
@section('content')


<br>
    <div class="container">  
        <ol class="breadcrumb breadcrumb-right-arrow">
    <li class="breadcrumb-item"><a href="{{url('/main')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
    <li class="breadcrumb-item"><a href="{{url('/profile')}}" class="breadcrumb-link">Personal info</i></a></li>
    <li class="breadcrumb-item active">Edit Image</li>
    </ol>
    </div>

    <div class="container">
        <h3 ><span style="color: #0090F0;">{{(Auth::user()->name)}}></span>Your Profile Image</h3>
        <strong>Update your profile image</strong>
        <div class="row">
             <img src="{{asset(Auth::user()->user_image )}}" alt="" class="img-thumbnails" width="100" ></div>
              
          
            <div class="col-lg-7">
     
                        <form action="/user_image-update/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                            {{-- protection --}}
                            {{csrf_field()}}
                            {{method_field("PUT")}}

                            <div class="form-group">
                                <input type="file" name="user_image" value="{{ Auth::user()->user_image}}" class="custom-file-input">
                                <label class="custom-file-label">Select Images</label>
                            </div>
                            
                            <button type="submit" class="wishlist-button">Update</button>
                            <a href="/Image" class="wishlist-button">Cancel</a>
                        </form>
                    
        </div>
    </div> 
</div>
   
@endsection
    
@section('scripts')
   
@endsection