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
                            <h2 class="content-header-title float-left mb-0">{{ __('pages.tasks.edit.title') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('menu.dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('tasks.create') }}">{{ __('pages.tasks.edit.title') }}</a>
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
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal form-user" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="title">{{ __('entities/user.name') }}</label>
                                                <input type="text" id="name" class="form-control" name="name" placeholder="{{ __('entities/user.name') }}" value="{{ $user->name }}">
                                                @error('name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="status">{{ __('entities/user.level_access') }}</label>
                                                <select type="text" id="level_access" class="select2 form-control" name="level_access">
                                                    <option value="{{ \App\Models\User::$ROLE_COLLABORATOR }}" @if($user->level_access === \App\Models\User::$ROLE_COLLABORATOR) selected @endif>Collaborator</option>
                                                    <option value="{{ \App\Models\User::$ROLE_ADMINISTRATOR }}" @if($user->level_access === \App\Models\User::$ROLE_ADMINISTRATOR) selected @endif>Administrator</option>
                                                    <option value="{{ \App\Models\User::$ROLE_SUPER_ADMINISTRATOR }}" @if($user->level_access === \App\Models\User::$ROLE_SUPER_ADMINISTRATOR) selected @endif>Super Administrator</option>
                                                </select>
                                                @error('status')
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="title">{{ __('entities/user.email') }}</label>
                                                <input type="text" id="email" class="form-control" name="email" placeholder="{{ __('entities/user.email') }}" value="{{ $user->email }}">
                                                @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="title">{{ __('entities/user.password') }}</label>
                                                <input type="password" id="password" class="form-control" name="password" placeholder="{{ __('entities/user.password') }}" value="">
                                                @error('password')
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 form-group text-right">
                                                <button type="submit" class="btn btn-primary mr-1">Cadastrar</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
@endsection
