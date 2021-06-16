<li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="user-nav d-sm-flex d-none">
            <span class="user-name font-weight-bolder">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
            <span class="user-status">{{ \Illuminate\Support\Facades\Auth::user()->getRole() }}</span>
        </div>
        <span class="avatar">
            <img class="round" src="{{ asset(Auth::user()->avatar) }}" alt="avatar" height="40" width="40">
            <span class="avatar-status-online"></span>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
        <a class="dropdown-item" href="{{ route('account.settings') }}"><i class="mr-50" data-feather="user"></i> Profile</a>
{{--        <a class="dropdown-item" href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox--}}
{{--        </a><a class="dropdown-item" href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a>--}}
{{--        <a class="dropdown-item" href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a>--}}
{{--        <div class="dropdown-divider"></div>--}}
{{--        <a class="dropdown-item"><i class="mr-50" data-feather="settings"></i> Settings</a>--}}
{{--        <a class="dropdown-item" href="page-pricing.html"><i class="mr-50" data-feather="credit-card"></i> Pricing--}}
{{--        </a><a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a>--}}
        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mr-50" data-feather="power"></i> Logout</a>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
