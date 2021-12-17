@extends('layout.master')
@section('title', 'Homepage')

@section('content')
<div class = "d-flex flex-column justify-content-center align-items-center w-100">
    <h1 class = "text-white">New Products</h1>
    <div class = "p-2 m-2 d-flex flex-row flex-wrap w-100 justify-content-center align-items-center">
        @include('product.list')
    </div>
</div>
@endsection