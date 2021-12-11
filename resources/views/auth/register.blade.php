@extends('layout.master')
@section('title', 'Homepage')

@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column bg-white rounded p-3 w-50">
    <div class = "text-primary">
        <h3>
            Join With Us
        </h3>
    </div>
    <form action="" method = "post" class = "w-100 p-2 d-flex flex-column align-items-start justify-content-start">
        <input type="text" name = "name" id = "name" placeholder = "Full name" class = "border borer-secondary rounded form-control p-2 m-2">
        <label for="gender" class = "px-1 pt-2 mt-1 mx-1">Gender</label>
        <div class = "d-flex flex-row align-items-start justify-content-evently px-1 mx-1 mb-2 pb-1">
            <div class = "form-check">
                <input type="radio" class = "form-check-input" value = "male" id = "male" name = "gender">
                <label for="male" class = "form-check-label">Male</label>
            </div>
            <div class = "form-check px-5">
                <input type="radio" class = "form-check-input" value = "female" id = "female" name = "gender">
                <label for="female" class = "form-check-label">Female</label>
            </div>
        </div>
        <textarea name="address" id="adress" rows="3" placeholder = "Address" class = "border borer-secondary rounded form-control p-2 m-2" style = "resize: none"></textarea>
        <input type="text" email = "email" id = "email" placeholder = "Email" class = "border borer-secondary rounded form-control p-2 m-2">
        <input type="password" password = "password" id = "password" placeholder = "Password" class = "border borer-secondary rounded form-control p-2 m-2">
        <input type="password" password = "confirm" id = "confirm" placeholder = "Confirm Password" class = "border borer-secondary rounded form-control p-2 m-2">
        <div class = "d-flex flex-row align-items-start p-1 m-2">
            <input type="checkbox" class = "form-check-input" id = "check" name = "check">
            <label for="check" class = "mx-1 px-1">I agree with terms & conditions</label>
        </div>

        <div class = " p-2 m-2 w-100 d-flex flex-row justify-content-end mt-5 pt-5">
            <input type="submit" class = "btn btn-warning" value = "Register Now">
        </div>
    </form>
</div>
@endsection