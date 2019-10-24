@extends('public')
@section('content')
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
        </div>
        <form id="frm_register" class="user" method="post">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="registerFirstName"
                           name="registerFirstName" placeholder="Nome">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="registerLastName"
                           name="registerLastName" placeholder="Sobrenome">
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="registerInputEmail"
                       name="registerInputEmail" placeholder="E-mail">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="registerInputPassword"
                           name="registerInputPassword" placeholder="Senha" data-toggle="tooltip" data-placement="top"
                           title="Sua senha deve ter entre 4 e 20 caracteres.">
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="registerRepeatPassword"
                           name="registerRepeatPassword" placeholder="Repetir Senha">
                </div>
            </div>
            <a href="javascript:void(0);" id="submitRegister" class="btn btn-primary btn-user btn-block">
                Register Account
            </a>
            {{--            <hr>--}}
            {{--            <a href="index.html" class="btn btn-google btn-user btn-block">--}}
            {{--                <i class="fab fa-google fa-fw"></i> Register with Google--}}
            {{--            </a>--}}
            {{--            <a href="index.html" class="btn btn-facebook btn-user btn-block">--}}
            {{--                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook--}}
            {{--            </a>--}}
        </form>
        <hr>
        {{--        <div class="text-center">--}}
        {{--            <a class="small" href="/forgot-password">Forgot Password?</a>--}}
        {{--        </div>--}}
        <div class="text-center">
            <a class="small" href="/login">Already have an account? Login!</a>
        </div>
    </div>
    </div>
@stop
