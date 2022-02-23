@extends('frontend.master')

@section('title','Register Page')
@section('content')

<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item active">Register</li>
</ol>
</div>

<section class="register_box_area section_gap">
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }} : if you have an account please go to
                        <a class="login" href="{{route('login')}}">Login </a>
                    </div>

                    <div class="card-body register-form">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                             <div class="form-group row">
                                 <label for="user_image" class="col-md-4 col-form-label text-md-right">
                                {{ __('User_image (optional)') }}
                             </label>
                                  <div class="col-md-6">
                                    <input type="file" id="user_image" class="form-control" name="user_image">
                                  </div>
                             </div>
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name">
                                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                    
                            <div class="form-group row mb-0 Register-Button">
                                <div class="col-md-6 offset-md-4 ">
                                    <button type="submit" class="myButton">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>

@endsection

@section('scripts')

@endsection