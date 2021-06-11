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
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('pages.dashboard.title') }}</a>
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
                <div class="row">
                @foreach($tasks as $task)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card shadow-none bg-transparent @if($task->delayed()) border-danger @else border-success @endif">
                            <div class="card-body">
                                <h4 class="card-title @if($task->delayed()) text-danger @else text-success @endif" style="height: 42px; overflow: hidden;">
                                    {{ $task->getTitleAbbr() }}
                                </h4>
                                <p class="card-text" style="max-height: 125px; overflow: hidden;">{{ $task->getDescriptionAbbr() }}</p>
                                <p><strong>Prazo:</strong> {{ $task->date }} - {{ $task->hour }}</p>
                                <div>
                                    <button class="btn btn-success btn-sm">
                                        <i data-feather="check"></i> Finished
                                    </button>
                                    <button class="btn btn-danger btn-sm">
                                        <i data-feather="trash"></i> Remove
                                    </button>
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
        </div>
    </div>
</div>
