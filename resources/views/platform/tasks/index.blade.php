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
                            <h2 class="content-header-title float-left mb-0">{{ __('pages.tasks.index.title') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('pages.home.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">{{ __('pages.tasks.index.title') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->isSuperAdmin())
                    <div class="col-md-3 col-12 text-right">
                        <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus"></i> {{ __('menu.tasks.create') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="content-detached content-left">
                <div class="content-body" style="margin-right: 0">
                    <!-- Blog List -->
                    <div class="blog-list-wrapper">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body">
                                Nenhuma notícia encontrada.
                            </div>
                        </div>
                        <!-- Blog List Items -->
                    <!--/ Blog List Items -->

                        <!-- Pagination -->
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-12">--}}
                    {{--                                <nav aria-label="Page navigation">--}}
                    {{--                                    <ul class="pagination justify-content-center mt-2">--}}
                    {{--                                        <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>--}}
                    {{--                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>--}}
                    {{--                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>--}}
                    {{--                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>--}}
                    {{--                                        <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a></li>--}}
                    {{--                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>--}}
                    {{--                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>--}}
                    {{--                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>--}}
                    {{--                                        <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li>--}}
                    {{--                                    </ul>--}}
                    {{--                                </nav>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <!--/ Pagination -->
                    </div>
                    <!--/ Blog List -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection
