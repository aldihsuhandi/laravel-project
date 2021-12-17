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
        /category/new
    @else
        /category/update
    @endif
    " 
    method = "post" class = "w-100 p-2 d-flex flex-column align-items-start justify-content-start">
        @csrf
        @if($action == "update")
            <input type="hidden" value = {{ $category -> id }} name = "id" id = "id">
        @endif
        <input type="text" name = "name" id = "name" placeholder = "Category Name" class = "border border-secondary rounded form-control p-2 m-2"
        value = "@if (isset($category -> name)){{ $category -> name }}@else{{ old('name') }}@endif"
        >
        @error('name')
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