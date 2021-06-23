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
                <!-- Report -->
                @if (Auth::user()->id == $task->user_id)
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Enviar Relatório</h3>
                            </div>
                            <div class="card-body">
                                @if(session()->has('message'))
                                    <div class="alert alert-success p-1">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <form name="form-report" id="form-report" action="{{ route('tasks.update', [$task->id, 'returnTo' => 'task-info']) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <textarea name="report" id="input-report" style="display: none;"></textarea>
                                        <div class="col-md-12">
                                            <div id="editor" style="min-height: 150px;">{!! $task->report !!}</div>
                                        </div>
                                        <div class="col-md-12 text-right mt-5">
                                            <button type="submit" class="btn btn-success">Enviar relatório</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Relatório</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! $task->report !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/quill-editor/quill.min.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('app-assets/js/scripts/sweetalert/sweetalert.min.js') }}"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('plugins/quill-editor/quill.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var quill = new Quill('#editor', {
                placeholder: 'Digite seu relatório aqui...',
                readOnly: false,
                theme: 'snow'
            });
            quill.on('text-change', function(delta, oldDelta, source) {
                console.log(quill.container.firstChild.innerHTML)
                $('#input-report').val(quill.container.firstChild.innerHTML);
            });
        });
    </script>
@endsection
