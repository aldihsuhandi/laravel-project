@extends('layout.master')
@section('title', $product -> name)

@section('content')
<div class = "d-flex flex-row justify-content-center align-items-start bg-white rounded p-3 w-100 shadow">
    <div class = "w-50">
        <img src="{{ asset($product -> image) }}" alt="" class = "w-100 p-2 m-2">
    </div>
    <div class = "w-50 d-flex flex-column justify-content-start align-items-start py-2 my-2 px-3 mx-3">
        <div class = "border-bottom w-100 py-2"><b>{{ $product -> name }}</b></div>
        <div class = "border-bottom w-100 py-2 my-2">
            <b>Category:</b><br>
            <p class = "pt-3">{{ $product -> category -> name }}</p>
        </div>
        <div class = "border-bottom w-100 py-2 my-2">
            <b>Price:</b><br>
            <p class = "pt-3">IDR. {{ $product -> price }}</p>
        </div>
        <div class = "border-bottom w-100 py-2 my-2">
            <b>Description:</b><br>
            <p class = "pt-3">IDR. {{ $product -> description }}</p>
        </div>

        @if(Auth::check())
        <form action="/cart/add" method = "post" class = "d-flex flex-row justify-content-start align-items-center py-2">
            <label for="quantity">Qty:</label>
            @csrf
            <input type="hidden" name="product_id" value = "{{ $product -> id }}">
            <input type="number" name="quantity" id="quantity" class = "border border-secondary rounded form-control p-2 m-2" value = "1">
            <input type="submit" value="Add To Cart" class = "btn btn-warning">
        </form>
        @else
        <a href="/login" class = "btn btn-warning">Login to buy</a>
        @endif
    </div>
</div>
@endsection