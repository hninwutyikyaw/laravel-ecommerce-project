@extends('frontend.master')

@section('title','Thank You')
@section('content')


<section id="card_items">
    <div class="container">
        <div class="text-center">
            <i class="fa fa-check-circle i-check-circle--size"></i>
                <h3 style='color:#0090F0'>Thank {{(Auth::user()->name)}}</h3>
                <br>
            <h4>Your order was completed successfully.</h4>
            <h5 class="enjoy">We hope you enjoy your purchase.</h5>
            <br>
            <br>
            <p class="thanku-text">You have chosen the cash on delivery method.</p>
            <p class="thanku-text">Your order will be sent very soon.</p>
            <p class="thanku-text">For any questions or for further information, please contact our customer support.</p>
           
        </div>
    </div>


    @endsection
    @section('scripts')

    @endsection