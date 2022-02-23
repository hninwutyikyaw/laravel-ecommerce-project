@extends('layouts.master')

@section('title')
Dashboard E-Shop
@endsection

@section('content')
<div class="container">
  <br>
    <br>
  <div class="row">
  
      <div class="col-sm-4 d-flex pb-3">
        <div class="card card-body h-150 w-100">
            <p class="card-text" style="color:blue;font-size:20px">Total Customers </p>
            <h2 style="color:green;">{{$customerCount}}</h2>
        </div>
      </div>
      <div class="col-sm-4 d-flex pb-3">
        <div class="card card-body h-150 w-100">
            <p class="card-text" style="color:blue;font-size:20px">Total Orders </p>
            <h2 style="color:green;">{{$orderCount}}</h2>
        </div>
      </div>
      
      <div class="col-sm-4 d-flex pb-3">
        <div class="card card-body h-150 w-100">
            <p class="card-text" style="color:blue;font-size:20px">Total Sales </p>           
            Total out<h2 style="color:green;">${{$totalOut}}</h2>   
            Total in<h2 style="color:green;">${{$total1}}</h2> 
        </div>
      </div>
    
  </div>
</div>
      
@endsection

@section('scripts')

@endsection