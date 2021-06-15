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
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('app-assets/images/pages/forgot-password-v2.svg') }}" alt="Forgot password V2" /></div>
        </div>
        <!-- /Left Text-->
        <!-- Forgot password-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title font-weight-bold mb-1">Esqueceu a senha? 🔒</h2>
                <p class="card-text mb-2">Digite seu email para recuperar a senha.</p>
                <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="text" name="email" value="{{ old('email') }}" placeholder="Seu email" aria-describedby="email" autofocus="" tabindex="1" />
                        @error('email')
                        <span class="text-danger">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button class="btn btn-primary btn-block" tabindex="2">Solicitar link</button>
                </form>
                <p class="text-center mt-2"><a href="{{ route('login') }}">
                    <i data-feather="chevron-left"></i> Voltar para o Login</a>
                </p>
            </div>
        </div>
        <!-- /Forgot password-->
    </div>
</div>
@endsection
