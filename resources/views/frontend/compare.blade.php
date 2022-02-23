@extends('frontend.master')

@section('title','E-Shop')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
</head>
<body>
<style>
.col {
  width:230px;
  float:left;
}

</style>
    

<div class="container-fluid compare">
    <h4> Product Comparison </h4>
    <div class="row">

        <div class="col">
            <p class="search_Box" > compare with </p>
            
        </div>

        <div class="col">
          <p class="search_Box" > compare with </p>
          <form class="justify-content-between" action="{{url('compare')}}">
            <select class="searchbar" name="searchData" id="Search">
              <option value="">Select...</option>
                @foreach($product as $products)
                  <option value="{{$products->p_name}}">{{$products->p_name}}</option>
                @endforeach
            </select>
      
            <button type="submit" class="btnsearch">
              <i class="fas fa-search" style="color: white;"></i>
            </button>
          </form>
        </div>

    </div>
    
    <div class="row">
        <div class="col">

          @php
          $name = Session::get('total');
          @endphp
              <div class="card mb-3" style="max-width: 18rem;">
                  <div class="card-body text-success">
                      <img class="card-image product-images"
                      src="{{URL::to('/')}}/images/{{ $name->image }}" alt="">   
                  </div>
            </div>
             <h3 style="text-align: center;"> {!! $name->p_name !!} </h3>
             <h4 style="text-align: center;"> {!! $name->price !!} - kyats</h4>
             <br>
              {!! $name->description !!}

        </div>

        <div class="col">
       
            @foreach($search as $result)
                <div class="card mb-3" style="max-width: 18rem;" >
                    <div class="card-body text-success">
                        <a href="{{url('productDetail',$result->id)}}">
                            <img class="card-image product-images"
                            src="{{URL::to('/')}}/images/{{ $result->image }}" alt="">
                        </a>
                    </div>
                  </div>
                      <h3 style="text-align: center;"> {!! $result->p_name !!} </h3>
                      <h4 style="text-align: center;"> {!! $result->price !!} - kyats</h4>
                      <br>
                        {!! $result->description !!}
            @endforeach
          
        </div>
    </div>
</div>

@endsection

@section('scripts')
 <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
$("#Search").chosen({no_results_text: "Oops, nothing found!"}); 
</script>

@endsection
