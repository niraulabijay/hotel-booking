@extends('layouts.front.app')
@section('title', 'Login')

@section('content')
</section>

<div class="container">
    <div class="login-wrapper">
        <h3>Sign in</h3>
        <form action="{{route('login_check')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-danger" style="display: none">

            </div>

            <div class="form-group">
                <label for="inputemail2">Email address</label>
                <input type="email" name="email" class="form-control" id="inputemail2"
                       placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="inputpassword2">Password</label>
                <input type="password" name="password" class="form-control" id="inputpassword2"
                       placeholder="Enter password">
            </div>

            <a href="{{ route('forgot_password') }}" class="link mb-3 d-block" id="forgetlink1">Forget your password?</a>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary ">Login</button>
            </div>
            <hr>
            <h6 class="d-block text-center">New to Tenjin Eco Trek?</h6>
            <a href="{{ route('register') }}" class="btn btn-secondary d-block" style="margin: 0 auto">Create a new account?</a><br>

            <a href="/login/google" class="btn btn-lg btn-google btn-block text-uppercase"><i class="fab fa-google mr-2"></i> Sign in with Google</a>
            <a href="/login/facebook" class="btn btn-lg btn-facebook btn-block text-uppercase" ><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</a>
        </form>
    </div>
</div>
@endsection