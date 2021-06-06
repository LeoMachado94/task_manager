@extends('layouts.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Informações da conta</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('account.settings') }}">Informações da conta</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-2">
                            <div class="nav-vertical">
                                <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link {{ empty(request()->query('tab')) || request()->query('tab') === 'general' ? 'active' : '' }}" id="baseVerticalLeft-tab1" data-toggle="tab" aria-controls="tab-general-area" href="#tab-general" role="tab" aria-selected="{{ empty(request()->query('tab')) || request()->query('tab') === 'general' ? 'true' : 'false' }}">
                                            <i data-feather="settings"></i> Geral
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query('tab') === 'security' ? 'active' : '' }}" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tab-security-area" href="#tab-security" role="tab" aria-selected="{{ request()->query('tab') === 'security' ? 'true' : 'false' }}">
                                            <i data-feather="lock"></i> Segurança
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query('tab') === 'info' ? 'active' : '' }}" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tab-info-area" href="#tab-info" role="tab" aria-selected="{{ request()->query('tab') === 'info' ? 'true' : 'false' }}">
                                            <i data-feather="info"></i> Informações
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query('tab') === 'address' ? 'active' : '' }}" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tab-address-area" href="#tab-address" role="tab" aria-selected="{{ request()->query('tab') === 'address' ? 'true' : 'false' }}">
                                            <i data-feather="map-pin"></i> Endereço
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="card">
                                <div class="card-body">
                                    <div class="nav-vertical">
                                        <div class="tab-content">
                                            @if(session()->has('message') && session()->get('message_type') === 'danger')
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">{{ session()->get('message') }}</h4>
{{--                                                    <div class="alert-body">--}}
{{--                                                        Tootsie roll lollipop lollipop icing. Wafer cookie danish macaroon. Liquorice fruitcake apple pie I love--}}
{{--                                                        cupcake cupcake.--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endif
                                                @if(session()->has('message') && session()->get('message_type') === 'success')
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading">{{ session()->get('message') }}</h4>
                                                        {{--                                                    <div class="alert-body">--}}
                                                        {{--                                                        Tootsie roll lollipop lollipop icing. Wafer cookie danish macaroon. Liquorice fruitcake apple pie I love--}}
                                                        {{--                                                        cupcake cupcake.--}}
                                                        {{--                                                    </div>--}}
                                                    </div>
                                                @endif
                                            @include('platform.accounts.tabs.tab-general')
                                            @include('platform.accounts.tabs.tab-security')
                                            @include('platform.accounts.tabs.tab-info')
                                            @include('platform.accounts.tabs.tab-address')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Horizontal form layout section end -->
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')
    <script src="{{ asset('app-assets/js/scripts/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        function previewImages() {

            var preview = document.querySelector('#preview');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    document.getElementById('avatar-preview').src = this.result;
                });

                reader.readAsDataURL(file);

            }
        }

        document.querySelector('#file-input').addEventListener("change", previewImages);

        @if(session()->has('message'))
        document.addEventListener("DOMContentLoaded", () => {
            swal("Atualizado!", "{{ session()->get('message') }}", "success");
        });
        @endif
    </script>
@endsection
