@extends('layouts.guest')

@section('title', 'Registro')
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
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('app-assets/images/pages/register-v2.svg') }}" alt="Register V2" /></div>
            </div>
            <!-- /Left Text-->
            <!-- Register-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title font-weight-bold mb-1">Seja nosso cliente</h2>
                    <p class="card-text mb-2">Cadastre-se gratuitamente e tenha acesso ao nosso portal de conexões juridicas.</p>
                    <form class="auth-register-form mt-2" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="username">Nome</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Nome" aria-describedby="name" autofocus="" tabindex="1" />
                            @error('name')
                            <span class="text-danger">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" id="email" type="text" name="email" placeholder="Email" aria-describedby="email" tabindex="2" />
                            @error('email')
                            <span class="text-danger">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="register-password">Senha</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="3" />
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
                                <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                                <label class="custom-control-label" for="register-privacy-policy">Eu aceito<a href="javascript:void(0);">&nbsp;os termos e política de privacidade</a></label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" tabindex="5">Cadastrar</button>
                    </form>
                    <p class="text-center mt-2"><span>Já tem uma conta?</span><a href="{{ route('login') }}"><span>&nbsp;Faça login</span></a></p>
{{--                    <div class="divider my-2">--}}
{{--                        <div class="divider-text">or</div>--}}
{{--                    </div>--}}
{{--                    <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>--}}
                </div>
            </div>
            <!-- /Register-->
        </div>
    </div>
@endsection
