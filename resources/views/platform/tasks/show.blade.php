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
                            <h2 class="content-header-title float-left mb-0">{{ __('pages.tasks.show.title') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('menu.dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('tasks.create') }}">{{ __('pages.tasks.show.title') }}</a>
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
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="title">{{ __('entities/task.title') }}</label>
                                            <div>{{ $task->title }}</div>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="status">{{ __('entities/task.status') }}</label>
                                            <div>{{ \App\Models\Task::$STATUS[\App\Models\Task::$TASK_STATUS_PENDING] }}</div>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="date">{{ __('entities/task.date') }}</label>
                                            <div>{{ $task->date }}</div>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="hour">{{ __('entities/task.date') }}</label>
                                            <div>{{ $task->hour }}</div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="description">{{ __('entities/task.description') }}</label>
                                            <div>{{ $task->description }}</div>
                                        </div>
                                        <div class="col-12 form-group text-right">
                                            <button type="button" class="btn btn-outline-danger" onclick="window.history.back();">Voltar</button>
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
@endsection
