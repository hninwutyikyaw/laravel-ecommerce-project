@extends('frontend.master')

@section('title','Blogs')
@section('content')
<style>
.find {
  width: 100%;
  position: relative;
  display: flex;
}

</style>
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item active">Blogs</li>
</ol>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">{{-- search-box --}}
          
            <form method="get" action="{{url('blog_search')}}">
                <input type="text" name="searchData" id="search_input" placeholder="Search blogs here..." class="blog-search form-control form-rounded" aria-label="Search">
                <button type="submit" class="submit"><i class="fas fa-search"></i></button>
            </form>

        </div>
        
        
        <div class="col-lg-8">
            <section class="lattest-product-area pb-40 category-list">
                <div class="row blog-card">
                    @forelse($blogs as $blog)
                    
                    <div class="col-lg-4 col-md-6">

                        <div class="card mb-3" style="max-width: 18rem;">

                            <div class="card-body">
                                <a href="{{url('blogDetail',$blog->id)}}">
                                <img class="card-image product-images" src="{{URL::to('/')}}/images/{{ $blog->image }}"width="200px" height="400px" style="margin:0 auto;" alt="">
                                </a>
                   
                                <p class="blog-title">{{$blog->title}}</p>
                                <div class="blog-text">
                                    <strong>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()}} </strong>
                                </div>
                                    <br>
                                    {!! Str::limit($blog->blog_paragraph, 100) !!}
                                    <br>
                                    <a href="{{url('blogDetail',$blog->id)}}" style="color: #0090F0;" class="see-more" >See more</a>
                            </div>

                        </div>

                    </div>{{-- col-lg-4 col-md-6 --}}
                    @empty
                        <h3>No Blogs</h3>
                    @endforelse

                </div>{{-- blog-card --}}
            </section>
            <br><br>
    
            <div class="background">
                <div class="transbox">
                    <ul class="pagination">
                        <li>{{$blogs->links()}}</li>
                        Page:{{$blogs->currentpage()}}-{{$blogs->lastpage()}} Total:{{$blogs->total()}}
                    </ul>
                </div>
            </div>

        </div>{{-- col-lg-8 --}}
    </div>{{-- row --}}
</div>{{-- container --}}

@endsection

@section('scripts')
<script src="https://kit.fontawesome.com/57456f662e.js" crossorigin="anonymous">

@endsection