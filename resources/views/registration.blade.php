@extends('layout')
@section('title', 'registration')
@section('content')
@include('include.nav')
<div class="container">
    <div class="mt-5">
        @if ($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session()->has('success'))
            <!-- Use "alert-success" instead of "alert-danger" for success messages -->
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('registration.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf
            <div class="mb-3">
                <label class="form-label">Fullname</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
             <p><button type="submit" class="btn btn-primary">Submit</button>
           Already have an account
                <a href="{{ route('login') }}">Go to Login</a><br></br>
            </p>
        </form>
    </div>
</div>
@endsection

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        margin-top: 100px; /* Add margin to the top of the container */
    }

    .login {
        display: flex; /* Use flexbox for layout */
        align-items: center; /* Center vertically */
    }

    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 300px;
        padding top; 1000px;
        position: relative; /* Ensure relative positioning */
        z-index: 1; /* Ensure form stays on top */
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    button {
        background-color: #008080;
        color: #ffffff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .nav-link1 {
        font-family: Arial, sans-serif;
        background-color: #008080;
        color: #ffffff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
