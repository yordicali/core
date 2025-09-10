<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li><a href="{{ url('/') }}"><i class="bx bx-right-arrow-alt"></i>Default</a></li>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
            <a href="{{ url('widgets') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Widgets</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i></div>
                <div class="menu-title">Components</div>
            </a>
            <ul>
                <li><a href="{{ url('components/alerts') }}"><i class="bx bx-right-arrow-alt"></i>Alerts</a></li>
                <li><a href="{{ url('components/accordions') }}"><i class="bx bx-right-arrow-alt"></i>Accordions</a></li>
                <li><a href="{{ url('components/badges') }}"><i class="bx bx-right-arrow-alt"></i>Badges</a></li>
                <li><a href="{{ url('components/buttons') }}"><i class="bx bx-right-arrow-alt"></i>Buttons</a></li>
                <li><a href="{{ url('components/cards') }}"><i class="bx bx-right-arrow-alt"></i>Cards</a></li>
                <li><a href="{{ url('components/carousels') }}"><i class="bx bx-right-arrow-alt"></i>Carousels</a></li>
                <li><a href="{{ url('components/list-groups') }}"><i class="bx bx-right-arrow-alt"></i>List Groups</a></li>
                <li><a href="{{ url('components/media-object') }}"><i class="bx bx-right-arrow-alt"></i>Media Objects</a></li>
                <li><a href="{{ url('components/modals') }}"><i class="bx bx-right-arrow-alt"></i>Modals</a></li>
                <li><a href="{{ url('components/navs-tabs') }}"><i class="bx bx-right-arrow-alt"></i>Navs & Tabs</a></li>
                <li><a href="{{ url('components/navbar') }}"><i class="bx bx-right-arrow-alt"></i>Navbar</a></li>
                <li><a href="{{ url('components/paginations') }}"><i class="bx bx-right-arrow-alt"></i>Pagination</a></li>
                <li><a href="{{ url('components/progress-bars') }}"><i class="bx bx-right-arrow-alt"></i>Progress</a></li>
                <li><a href="{{ url('components/spinners') }}"><i class="bx bx-right-arrow-alt"></i>Spinners</a></li>
                <li><a href="{{ url('components/notifications') }}"><i class="bx bx-right-arrow-alt"></i>Notifications</a></li>
                <li><a href="{{ url('components/avatars-chips') }}"><i class="bx bx-right-arrow-alt"></i>Avatars & Chips</a></li>
            </ul>
        </li>
    </ul>
</div>

