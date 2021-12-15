@extends('layout.master')
@section('title', "Category List")
@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column bg-white rounded p-3 w-75 shadow">
    <div class = "text-primary">
        <h3>
            Manage Category
        </h3>
    </div>
    <table class = "table-warning table">
        <thead>
            <tr>
                <th scope = "col">No.</th>
                <th scope = "col">Category Name</th>
                <th scope = "col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope = "row">{{ $category -> id }}</th>
                    <td>{{ $category -> name }}</td>
                    <td class = "d-flex flex-row justify-content-center align-items-center"> 
                        <a href = "/category/{{ $category -> id }}/update" class="btn btn-warning m-1">Update</a>
                        <form action="/category/{{ $category -> id }}/delete" method = "get">
                            @csrf
                            <input type="submit" class = "btn btn-danger" value = "Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection