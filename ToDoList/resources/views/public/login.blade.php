@extends('public')
@section('content')
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form class="frm_login" method="post">
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="inputEmail" aria-describedby="emailHelp"
                       placeholder="Enter Email Address...">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="checkRememberMe">
                    <label class="custom-control-label py-1" for="checkRememberMe">Remember Me</label>
                </div>
            </div>
            <a id="urs-login" href="{{route('public.login')}}" class="btn btn-primary btn-user btn-block">Login</a>
        </form>
    </div>
@stop
