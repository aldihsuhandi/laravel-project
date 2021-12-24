@extends('layout.master')
@section('title', 'Login')

@section('content')
<div class = "d-flex justify-content-start align-items-center flex-column bg-white rounded p-3 w-25 shadow">
    <div class = "text-primary">
        <h3>
            Welcome!
        </h3>
    </div>

    @if (isset($invalid) && $invalid == true)
        <div class = "text-danger">
            <b>Invalid email / password</b>
        </div>
    @endif

    <form action="/login" method = "post" class = "w-100 p-2 d-flex flex-column align-items-start justify-content-start">
        @csrf
        <input type="text" name = "email" id = "email" placeholder = "Email" class = "border borer-secondary rounded form-control p-2 m-2" 
        value = @if (Cookie::get('email') != NULL)
            "{{ Cookie::get('email') }}"
        @else
            "{{ old('email') }}"
        @endif
        >
        @error('email')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror
        <input type="password" name = "password" id = "password" placeholder = "Password" class = "border borer-secondary rounded form-control p-2 m-2">
        @error('password')
            <div class = "text-danger px-2" style = "font-size: 11pt;">* {{ $message }}</div>
        @enderror

        <div class = "d-flex flex-row align-items-start p-1 m-2">
            <input type="checkbox" class = "form-check-input" id = "remember" name = "remember">
            <label for="remember" class = "mx-1 px-1">Remember me</label>
        </div>
        
        <div class = "w-100 d-flex flex-row justify-content-end mt-3 pt-5">
            <input type="submit" class = "btn btn-warning" value = "Login">
        </div>
    </form>
    <div class = "w-100 border-bottom border-dark text-white mb-3">;</div>
    <div class = "w-100 d-flex justify-content-start">Don't have an account?&ensp;<a href="/register">Register Now!</a></div>
</div>
@endsection
