@extends('layouts.guest')

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
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('app-assets/images/pages/reset-password-v2.svg') }}" alt="Register V2" /></div>
            </div>
            <!-- /Left Text-->
            <!-- Reset password-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title font-weight-bold mb-1">Redefinir Senha 🔒</h2>
                    <p class="card-text mb-2">Por favor, digite sua nova senha</p>
                    <form class="auth-reset-password-form mt-2" action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="reset-password-new">Email</label>
                            <input class="form-control form-control-merge" id="email" type="text" name="email" value="{{ $email ?? old('email') }}" aria-describedby="email" autofocus="" tabindex="1" readonly>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="reset-password-new">Nova senha</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="reset-password-new" type="password" name="password" placeholder="············" aria-describedby="reset-password-new" autofocus="" tabindex="1" />
                                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                            </div>
                            @error('password')
                            <span class="text-danger">
                            <small>{{ $message }}</small>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="reset-password-confirm">Confirmação de senha</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="reset-password-confirm" type="password" name="password_confirmation" placeholder="············" aria-describedby="reset-password-confirm" tabindex="2" />
                                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                            </div>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button class="btn btn-primary btn-block" tabindex="3">Salvar</button>
                    </form>
                    <p class="text-center mt-2"><a href="{{ route('login') }}"><i data-feather="chevron-left"></i> Voltar para o login</a></p>
                </div>
            </div>
            <!-- /Reset password-->
        </div>
    </div>
@endsection
