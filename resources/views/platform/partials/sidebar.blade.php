<div class="main-menu menu-fixed {{ env('APP_THEME') === 'dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Início</span><i data-feather="more-horizontal"></i></li>
            <li class="nav-item @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard') active @endif"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">{{ __('menu.dashboard') }}</span></a></li>
            <li class="nav-item @if(in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['tasks.index', 'tasks.create'])) active @endif"><a class="d-flex align-items-center" href="{{ route('tasks.index') }}"><i data-feather="paperclip"></i><span class="menu-title text-truncate" data-i18n="Dashboard">{{ __('menu.tasks.index') }}</span></a></li>
        </ul>
    </div>
</div>
