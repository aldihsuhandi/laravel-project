@extends('layout.master')
@section('title', "Product List")
@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column bg-white rounded p-3 w-100 shadow">
    <div class = "text-primary">
        <h3>
            Manage Product
        </h3>
    </div>

    <table class = "table-warning table">
        <thead>
            <tr>
                <th scope = "col">No</th>
                <th scope = "col">Product Image</th>
                <th scope = "col">Product Name</th>
                <th scope = "col">Product Description</th>
                <th scope = "col">Product Price</th>
                <th scope = "col">Product Category</th>
                <th scope = "col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <th scope = "row">{{ $product -> id }}</th>
                    <td><img style = "width: 100px;" src="{{ asset('storage/product/'.$product -> image) }}" alt=""></td>
                    <td>{{ $product -> name }}</td>
                    <td>{{ $product -> description }}</td>
                    <td>{{ $product -> price }}</td>
                    <td>{{ $product -> category -> name }}</td>
                    <td class = "d-flex flex-row justify-content-center align-items-center"> 
                        <a href = "/product/{{ $product -> id }}/update" class="btn btn-warning m-1">Update</a>
                        <form action="/product/{{ $product -> id }}/delete" method = "get">
                            @csrf
                            <input type="submit" class = "btn btn-danger" value = "Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <h1 class = "text-secondary">
                    There is no product
                </h1>
            @endforelse
        </tbody>
    </table>
</div>
@endsection