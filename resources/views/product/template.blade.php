@extends('layout.master')
@section('title', $titles)
@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column bg-white rounded p-3 w-50 shadow">
    <div class = "text-primary">
        <h3>
            {{ $titles }}
        </h3>
    </div>
    <form enctype = "multipart/form-data" 
    action="
    @if ($action == "insert")
        /product/new
    @else
        /product/{{ $product -> id }}/update
    @endif
    " 
    method = "post" class = "w-100 p-2 d-flex flex-column align-items-start justify-content-start">
        @csrf
        <input type="text" name = "name" id = "name" placeholder = "Product Name" class = "border border-secondary rounded form-control p-2 m-2"
        value = "@if (isset($product -> name)){{ $product -> name }}@else{{ old('name') }}@endif"
        >
        @error('name')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <textarea name="description" id="adress" rows="3" placeholder = "Product Description" class = "border border-secondary rounded form-control p-2 m-2" style = "resize: none">@if (isset($product -> description)){{ $product -> description }}@else{{ old('description') }}@endif</textarea>
        @error('description')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <input type="number" name = "price" id = "price" placeholder = "Product Price" class = "border border-secondary rounded form-control p-2 m-2"
        value = "@if (isset($product -> price)){{ $product -> price }}@else{{ old('price') }}@endif"
        >
        @error('price')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <div class = "d-flex flex-column m-2 w-100">
            <label for="category" class = "pb-1">Product Category</label>
            <select name="category" id="category" class = "border border-secondary rounded form-select p-2">
                @foreach ($categories as $category)
                    <option value="{{ $category -> id }}"
                    @if (isset($product -> category_id) and $product -> category_id == $category -> id)
                        selected
                    @endif
                    >{{ $category -> name }}</option>
                @endforeach
            </select>
        </div>
        <div class = "d-flex flex-column m-2 w-100">
            <label for="image" class = "pb-1">Product Image</label>
            <input type="file" name="image" id="image" class = "border border-secondary rounded form-file p-2">
        </div>
        @error('image')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <div class = " p-2 m-2 w-100 d-flex flex-row justify-content-end">
            <input type="submit" class = "btn btn-warning"
            value = "@if ($action == "insert") Add @else Save @endif"
            >
        </div>
    </form>
</div>
@endsection