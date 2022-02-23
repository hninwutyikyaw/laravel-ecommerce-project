@extends('frontend.master')

@section('title','Digital World')
@section('content')
<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
    <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
    <li class="breadcrumb-item active">Blogs</li>
</ol>
</div>

<div class="container main">
	<div class="row">
		<div class="col-lg-4">
			 <form method="get" action="{{url('blog_search')}}">
                <input type="text" name="searchData" id="search_input" placeholder="Search blogs here..." class="blog-search form-control form-rounded" aria-label="Search">
                <button type="submit" class="submit"><i class="fas fa-search"></i></button>
            </form>
		</div>
		
		<div class="col-lg-8">
		    <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                        @if(count($blogs)>0)
                        
                        @foreach($blogs as $blog)

                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <a href="{{url('blogDetail',$blog->id)}}">
                                        <img class="card-image product-images"
                                        src="{{URL::to('/')}}/images/{{ $blog->image }}" alt="">
                                    </a>
                                    <p class="blog-title">{{$blog->title}}</p>

                                <div class="blog-text">
                                    <em>Posted by</em> &nbsp; /<strong> {{$blog->name}} </strong>
                                    / {{$blog->created_at->format('d,m,Y')}}
                                    <br>
                                    <strong>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()}} </strong> 
                                </div>
                                <br>
                                {!! Str::limit($blog->blog_paragraph, 100) !!}
                                <br>
                                <a href="{{url('blogDetail',$blog->id)}}" style="color: #0090F0;" class="see-more" >See more</a>
                                </div>
                            </div>

                               
                        </div>

                        @endforeach
                        @else

                        @if($blogs->isEmpty())
                             <h4 style="margin-top: 50px; margin-left: 60px;">
                                Sorry, Blogs not found</h4>
                        @endif

                        @endif
                </div>
            </section>
        </div>
        
	</div>
</div>

@endsection

@section('scripts')

@endsection