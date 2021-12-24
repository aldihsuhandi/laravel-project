@extends('layout.master')
@section('title', 'My Cart')

@section('content')
<div class = "d-flex flex-column justify-content-center align-items-center w-100">
    <h1 class = "text-white">My Cart</h1>
    <div class = "p-2 m-2 d-flex flex-column w-100 justify-content-center align-items-center">
        @include('cart.list')
    </div>
    <div class = "w-100 d-flex flex-row justify-content-between align-items-center">
        <div class = "d-flex text-white flex-column align-items-start justify-content-start">
            <div><h3><b>Total Price:</b></h3></div>
            <div class = "p-3 mx-2">IDR. {{ $carts -> sum(function($t){
                return $t -> quantity * $t -> product -> price;
            }) }}</div>
        </div>
        <a href="" class = "btn btn-warning">Checkout ({{ $carts -> sum(function($t){
            return $t -> quantity;
        }) }})</a>
    </div>
</div>
@endsection