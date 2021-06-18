@extends('layouts.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <h2>Olá {{ Auth::user()->name }}, bem-vindo novamente.</h2>
                </div>
            </div>
            <div class="content-body">
                <section class="main-container" >
                    <div class="location" id="home">
                        <h1 id="home">Veja as tarefas de hoje...</h1>
                        <livewire:dashboard-tasks></livewire:dashboard-tasks>
                    </div>
                </section>
                <!-- END OF MAIN CONTAINER -->
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('assets/css/netflix-styles.css') }}" type="text/css" rel="stylesheet">
@endsection

@section('scripts')
@endsection
