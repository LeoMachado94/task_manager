<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-lg-8 col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('pages.tasks.index.title') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('pages.dashboard.title') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('pages.tasks.index.title') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                <div class="col-lg-4 col-md-6 col-12 text-right">
                    <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="plus"></i> {{ __('pages.tasks.create.title') }}
                    </a>
                    @if($assignedTo !== 'me')
                    <button class="btn btn-sm btn-outline-secondary" wire:click="setAssignedTo('me')">
                        <i data-feather="paperclip"></i> {{ __('actions.tasks.show-my-tasks') }}
                    </button>
                    @else
                    <button class="btn btn-sm btn-outline-secondary" wire:click="setAssignedTo('null')">
                        <i data-feather="paperclip"></i> {{ __('actions.tasks.show-users-tasks') }}
                    </button>
                    @endif
                </div>
            @endif
        </div>
        <div class="content-detached content-left">
            @if(!$tasks->isEmpty())
                <div class="content-body" style="margin-right: 0">
                <div class="row">
                @if(session()->has('message'))
                    <div class="col-lg-12 col-md-12">
                        <div class="alert alert-success p-1">
                            {{ session()->get('message') }}
                        </div>
                    </div>
                @endif
                @foreach($tasks as $task)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card shadow-none bg-transparent @if($task->delayed()) border-danger @else border-success @endif">
                            <div class="card-body">
                                <h4 class="card-title @if($task->delayed()) text-danger @else text-success @endif" style="height: 42px; overflow: hidden;">
                                    {{ $task->getTitleAbbr() }}
                                </h4>
                                <p class="card-text" style="max-height: 125px; overflow: hidden;">{{ $task->getDescriptionAbbr() }}</p>
                                <p><strong>Prazo:</strong> {{ $task->date }} - {{ $task->hour }}</p>
                                <p><strong>Responsável:</strong> {{ $task->user->name }}</p>
                                <div>
                                    <a class="btn btn-primary btn-sm" href="{{ route('tasks.show', $task->id) }}">
                                        <i data-feather="eye"></i> {{ __('actions.show') }}
                                    </a>
                                    <button class="btn btn-success btn-sm" wire:click="finished({{ $task->id }})">
                                        <i data-feather="check"></i> {{ __('actions.finished') }}
                                    </button>
                                    @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $task->id }})">
                                        <i data-feather="trash"></i> {{ __('actions.delete') }}
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="col-md-12">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
