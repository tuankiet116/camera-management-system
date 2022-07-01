<aside class="main-sidebar sidebar-dark-primary">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if(Route::is('home')) active @endif">
                        <i class="fa-solid fa-house"></i>
                        <p>
                            {{ __('user.home') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('camera.list') }}" class="nav-link @if(Route::is('camera.list')) active @endif">
                        <i class="fa-solid fa-camera"></i>
                        <p>
                            {{ __('user.camera.list') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member.list') }}" class="nav-link @if(Route::is('member.list')) active @endif">
                        <i class="fa-solid fa-people-roof"></i>
                        <p>
                            {{ __('user.member.list') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('camera.list') }}" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                        <p>
                            {{ __('user.setting.title') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<style>
    .main-sidebar {
        position: fixed !important;
    }
</style>