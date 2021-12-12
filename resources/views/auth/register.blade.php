@extends('layout.master')
@section('title', 'Register')

@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column bg-white rounded p-3 w-50 shadow">
    <div class = "text-primary">
        <h3>
            Join With Us
        </h3>
    </div>
    <form action="/register" method = "post" class = "w-100 p-2 d-flex flex-column align-items-start justify-content-start">
        @csrf
        <input type="text" name = "name" id = "name" placeholder = "Full name" class = "border borer-secondary rounded form-control p-2 m-2"
        value = "@if (isset($name)){{ $name }}@else{{ old('name') }}@endif"
        >
        @error('name')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <label for="gender" class = "px-1 pt-2 mt-1 mx-1"
        checked >Gender</label>
        <div class = "d-flex flex-row align-items-start justify-content-evently px-1 mx-1 mb-2 pb-1">
            <div class = "form-check">
                <input type="radio" class = "form-check-input" value = "male" id = "male" name = "gender"
                @if(old('gender') == "male") checked @endif
                >
                <label for="male" class = "form-check-label">Male</label>
            </div>
            <div class = "form-check px-5">
                <input type="radio" class = "form-check-input" value = "female" id = "female" name = "gender"
                @if(old('gender') == "female") checked @endif
                >
                <label for="female" class = "form-check-label">Female</label>
            </div>
        </div>
        @error('gender')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <textarea name="address" id="adress" rows="3" placeholder = "Address" class = "border borer-secondary rounded form-control p-2 m-2" style = "resize: none">@if (isset($address)){{ $address }}@else{{ old('address') }}@endif</textarea>
        @error('address')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <input type="text" name = "email" id = "email" placeholder = "Email" 
        value = "@if (isset($email)){{ $email }}@else{{ old('email') }}@endif"
        class = "border borer-secondary rounded form-control p-2 m-2">
        @error('email')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <input type="password" name = "password" id = "password" placeholder = "Password" class = "border borer-secondary rounded form-control p-2 m-2">
        @error('password')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <input type="password" name = "confirm" id = "confirm" placeholder = "Confirm Password" class = "border borer-secondary rounded form-control p-2 m-2">
        @error('confirm')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <div class = "d-flex flex-row align-items-start p-1 m-2">
            <input type="checkbox" class = "form-check-input" id = "check" name = "check">
            <label for="check" class = "mx-1 px-1">I agree with terms & conditions</label>
        </div>
        @error('check')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror

        <div class = " p-2 m-2 w-100 d-flex flex-row justify-content-end mt-5 pt-5">
            <input type="submit" class = "btn btn-warning" value = "Register Now">
        </div>
    </form>
</div>
@endsection