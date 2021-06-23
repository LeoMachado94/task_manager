<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-lg-8 col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('pages.users.index.title') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('pages.dashboard.title') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('pages.users.index.title') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin())
                <div class="col-lg-4 col-md-6 col-12 text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">
                        <i data-feather="plus"></i> {{ __('pages.users.create.title') }}
                    </a>
                </div>
            @endif
        </div>
        <div class="content-detached content-left">
            @if(!$users->isEmpty())
                <div class="content-body" style="margin-right: 0">
                <div class="row">
                    @if(session()->has('message'))
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        </div>
                    @endif
                @foreach($users as $user)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card shadow-none bg-transparent border-primary">
                            <div class="card-body">
                                <h4 class="card-title" style="overflow: hidden;">
                                    {{ $user->name }}
                                </h4>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <div>
                                    <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user->id) }}">
                                        <i data-feather="eye"></i> {{ __('actions.show') }}
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">
                                        <i data-feather="edit"></i> {{ __('actions.edit') }}
                                    </a>
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $user->id }})">
                                        <i data-feather="trash"></i> {{ __('actions.delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="col-md-12">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
