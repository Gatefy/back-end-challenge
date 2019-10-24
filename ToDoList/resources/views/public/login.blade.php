@extends('public')
@section('content')
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form class="user" method="post" id="frm-login">
            <div class="form-group">
                <input type="email" class="form-control form-control-user validate[required,custom[email]]"
                       id="inputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user  validate[required]" id="inputPassword"
                       placeholder="Password">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="checkRememberMe">
                    <label class="custom-control-label" for="checkRememberMe">Remember Me</label>
                </div>
            </div>
            <a id="urs-login" href="{{route('public.login')}}" class="btn btn-primary btn-user btn-block">Login</a>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{route('public.register')}}">Create an Account!</a>
        </div>
    </div>

    <script type="text/html" id="frm-msg-default">
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="my-0 frm-msg">Email or password is invalid.</p>
        </div>
    </script>
@stop
