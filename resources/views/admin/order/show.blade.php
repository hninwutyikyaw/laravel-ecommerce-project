@extends('layouts.master')

@section('title')
Order list
@endsection

@section('content')

<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Order</h2>
            </div>

        </div>
        @foreach($orders as $data)
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date </strong>
                    {{$data->created_at}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image : </strong>
                    <img src="{{URL::to('/')}}/images/{{ $data->image }}" class="img-thumbnail" width="75px"
                        height="100px" alt="Image" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name : </strong>
                    {{$data->p_name}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Price : </strong>
                    {{$data->price}}-kyats
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Quantity : </strong>
                    {{$data->qty}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Price : </strong>
                    {{$data->total}}-kyats
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order Status : </strong>
                    {{$data->status}}
                </div>
            </div>
        </div>
        @endforeach
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('adminorder.index') }}"> Back</a>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection