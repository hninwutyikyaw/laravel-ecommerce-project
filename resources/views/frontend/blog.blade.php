@extends('frontend.master')

@section('title','Blog Detail')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">

<br>
<div class="container">  
    <ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="home-icon fa fa-home" aria-hidden="true"></i></a></li>
<li class="breadcrumb-item active">Blog</li>
</ol>
</div>

<div class="container main">
	<div class="row">

		<div class="col blog">
			<h3>{{$blog->title}}</h3>
			By <strong style="color:#0090F0">{{$blog->name}}</strong>	
			<hr>
			Posted on {{$blog->created_at->format('m/d, Y')}}
			<hr>
            <img src="{{URL::to('/')}}/images/{{ $blog->image }}" class="blog-image" alt="Can't Find Image" width="100%" height="400">      
            <p>{!! $blog->blog_paragraph !!}</p>							
		</div>{{-- Blog --}}
		
	</div>{{-- row --}}

		<h3 class="comment-title">All Comments</h3>
			<div id="posts">
				@if(count($comments)>0)                 
	 
	 			@foreach($comments as $comment)

	 			 <img style="width:50px;height:50px;border-radius:50%;" src="{{asset($comment->user->user_image )}}"alt="">
				
					<td><p class="user-name">{{$comment->user_name}}</p></td>
					<td>{{$comment->created_at->format('m/d, Y')}}</td>
					<br>
					<td>{{$comment->comment}}</td>
			<br>

			
			<div class="row">{{-- comment edit and delete --}}
					@auth

					@if(Auth::user()->id == $comment->user_id)
			
					@include('frontend.comment_edit')
			 			<a href="{{ route('comment.edit',$comment->id) }}" data-toggle="modal" data-target="#exampleModal" type="button" class="blog-button"><i class="fas fa-edit fa">Edit</i>
            			</a>
            				&nbsp;  &nbsp; &nbsp;

					<form action="{{ route('comment.destroy',$comment->id) }}" method="POST">
                		@csrf
                		@method('DELETE')
                		<button type="submit" onclick="return confirm('Are you sure?');" class="blog-button"><i class="fas fa-trash">Delete</i></button>
            		</form>
            
            		@endif

             		@endauth
        	</div>
<hr>
			
			@auth
				<form action="{{route('reply.store')}}" method="POST" enctype="multipart/form-data">
          			@csrf
            		<input type="hidden" value="{{$comment->id}}" name="comment_id">
        			<input type="hidden" value="{{ Auth::user()->name}}" name="name">
        			<input type="hidden" value="{{ Auth::user()->id}}" name="user_id">
        	 		<input type="hidden" value="{{$blog->id}}" name="blog_id">
            		<div class="form-group">
              			<input type="text" name="reply" id="name" class="form-control">
            		</div>  
          			<button type="submit" class="wishlist-button" style="margin-left:90%;"><strong>Reply</strong></button>
      			</form> 
			@endauth

			@guest
				<form action="{{route('reply.store')}}" method="POST" enctype="multipart/form-data">
          			@csrf
          			<button type="submit" class="wishlist-button" style="margin-left:90%;"><strong>Reply</strong></button>
      			</form> 
      		@endguest	

 				@endforeach {{-- show comment --}}



 		@foreach($replys as $reply)
			{{$reply->reply}}<br>
		@endforeach

	
                    <ul class="pagination" style="float:right;">
                        <li class="pag">{{$comments->links()}}</li>
                    </ul>

          
 	 </div>
 	     <button class="see-more myButton" data-page="2" data-link="http://localhost:8000/blogDetail/{{$blog->id}}?page=" data-div="#posts" style="margin-left: 45%;">
            load more comment</button>
 	@else
			 @if($comments->isEmpty())
                <h4 style="text-align: center;">No Comment for This Blog</h4>      
                <hr>
			@endif
		@endif
 		<br>
 		<br>



				@auth
					@if (Auth::user()->id)
					<h3 class="comment">Leave a Comment</h3>
					
					<form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
          			@csrf
						<strong>{{Auth::user()->name}}</strong>
					<input type="hidden" value="{{ Auth::user()->name}}" name="user_name">

					<input type="hidden" value="{{$blog->id}}" name="blogs_id">

					 <div class="form-group">
              			<label>Comment</label>
              			<textarea rows = "5" cols = "50" 
              			 name="comment" class="form-control"></textarea>
              		
            		</div>
					<button type="submit" class="myButton">Submit</button>
					
					@else
                    
                    @endif
                @endauth
                @guest
					<form action="{{route('login')}}" mehtod="POST" role="form">
						@csrf
						 <input type="hidden" value="{{$blog->id}}" name="blogs_id">
						<button type="submit" class="Button">Add Your Comment </button>
					</form>
                @endguest



</div>{{-- container --}}


@endsection

@section('scripts')

<script src="{{asset('js/wNumb.min.js')}}"></script>
<script src="{{asset('js/nouislider.min.js')}}"></script>
<script>
var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [10000, 2000000],
	connect: true,
	tooltips: true,
    range: {
        'min': 10000,
        'max': 2000000
	},
	format: wNumb({
        decimals: 0
	}),
	step: 100000
});

window.slider = slider;

function searchItems() {
	let data = slider.noUiSlider.get();

	let min_price = data[0];
	let max_price = data[1];
	
	let min_price_input = document.getElementById('min_price');
	min_price_input.value = min_price;
	
	let max_price_input = document.getElementById('max_price');
	max_price_input.value = max_price;

}

</script>
<script>
	/*$(function() {
  var $posts = $("#posts");
  var $ul = $("ul.pagination");
  $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...

  $(".see-more").click(function() {
      $.get($ul.find("a[rel='next']").attr("href"), function(response) {
           $posts.append(
               $(response).find("#posts").html()
           );
      });
  });
});*/

$(".see-more").click(function() {
  $div = $($(this).attr('data-div')); //div to append
  $link = $(this).attr('data-link'); //current URL
  $page = $(this).attr('data-page'); //get the next page #
  $href = $link + $page; //complete URL
  $.get($href, function(response) { //append data
    $html = $(response).find("#posts").html(); 
    $div.append($html);
  });
  $(this).attr('data-page', (parseInt($page) + 1)); //update page #
});
</script>
@endsection