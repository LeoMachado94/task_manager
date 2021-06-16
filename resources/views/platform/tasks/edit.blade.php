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
                                    <form class="form form-horizontal form-task" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data" method="post">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="reporter_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label for="title">{{ __('entities/task.title') }}</label>
                                                <input type="text" id="title" class="form-control" name="title" placeholder="{{ __('entities/task.title') }}" value="{{ $task->title }}">
                                                @error('title')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="status">{{ __('entities/task.status') }}</label>
                                                <select type="text" id="status" class="select2 form-control" name="status">
                                                    @foreach(\App\Models\Task::$STATUS as $k => $v)
                                                        <option value="{{ $k }}" @if($task->status === $k) selected @endif>{{ $v }}</option>
                                                    @endforeach
                                                </select>
                                                @error('status')
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="date">{{ __('entities/task.date') }}</label>
                                                <input type="date" id="date" class="form-control" name="date" placeholder="{{ __('entities/task.date') }}" value="{{ $task->date }}">
                                                @error('date')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label for="hour">{{ __('entities/task.date') }}</label>
                                                <input type="time" id="hour" class="form-control" name="hour" placeholder="{{ __('entities/task.date') }}" value="{{ $task->hour }}">
                                                @error('hour')
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="description">{{ __('entities/task.description') }}</label>
                                                <textarea id="description" class="form-control" name="description" placeholder="{{ __('entities/task.description') }}">{{ $task->description }}</textarea>
                                                @error('description')
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
