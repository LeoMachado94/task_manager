@extends('layouts.guest')

@section('title', 'Login')
@section('content')
    <div class="auth-wrapper auth-v2">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="javascript:void(0);">
                <h2 class="brand-text text-primary ml-1">{{ env('APP_NAME') }}</h2>
            </a>
            <!-- /Brand logo-->
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="../../../app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title font-weight-bold mb-1">Entrar</h2>
                    <p class="card-text mb-2">Bem vindo de volta, Por favor faça login</p>
                    <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" id="email" type="text" name="email" placeholder="Email" aria-describedby="email" autofocus="" tabindex="1" />
                            @error('email')
                            <span class="text-danger">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="login-password">Password</label><a href="{{ route('password.request') }}"><small>Esqueceu a senha?</small></a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="2" />
                                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                            </div>
                            @error('password')
                            <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                <label class="custom-control-label" for="remember-me"> Lembrar-me</label>
                            </div>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button class="btn btn-primary btn-block" tabindex="4">Entrar</button>
                    </form>
                    <p class="text-center mt-2"><span>Ainda não tem uma conta?</span><a href="{{ route('register') }}"><span>&nbsp;Criar conta</span></a></p>
{{--                    <div class="divider my-2">--}}
{{--                        <div class="divider-text">or</div>--}}
{{--                    </div>--}}
{{--                    <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>--}}
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@endsection
