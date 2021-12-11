@extends('layout.master')
@section('title', 'Homepage')

@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column bg-white rounded p-3 w-50">
    <div class = "text-primary">
        <h3>
            Join With Us
        </h3>
    </div>
    <form action="" method = "post" class = "w-100 d-flex flex-column align-items-start justify-content-start">
        <input type="text" name = "name" id = "name" placeholder = "Full name" class = "border borer-secondary rounded form-control p-2 m-1">
        <label for="gender" class = "px-1 pt-1 mt-1 mx-1">Gender</label>
        <div class = "d-flex flex-row align-items-start justify-content-evently px-1 mx-1 mb-1 pb-1">
            <div class = "form-check">
                <input type="radio" class = "form-check-input" value = "male" id = "gender" name = "gender">
                <label for="gender" class = "form-check-label">Male</label>
            </div>
            <div class = "form-check px-5">
                <input type="radio" class = "form-check-input" value = "female" id = "gender" name = "gender">
                <label for="gender" class = "form-check-label">Female</label>
            </div>
        </div>
        <textarea name="address" id="adress" rows="3" placeholder = "Address" class = "border borer-secondary rounded form-control p-2 m-1" style = "resize: none"></textarea>
        <input type="text" email = "email" id = "email" placeholder = "Email" class = "border borer-secondary rounded form-control p-2 m-1">
        <input type="password" password = "password" id = "password" placeholder = "Password" class = "border borer-secondary rounded form-control p-2 m-1">
        <input type="password" password = "confirm" id = "confirm" placeholder = "Confirm Password" class = "border borer-secondary rounded form-control p-2 m-1">
    </form>
</div>
@endsection