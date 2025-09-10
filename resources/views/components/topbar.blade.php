<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>

            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search...">
                    <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#"><i class='bx bx-search'></i></a>
                    </li>

                    {{-- Apps dropdown --}}
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-category'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">
                                <div class="col text-center"><div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i></div><div class="app-title">Teams</div></div>
                                <div class="col text-center"><div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i></div><div class="app-title">Projects</div></div>
                                <div class="col text-center"><div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i></div><div class="app-title">Tasks</div></div>
                                <div class="col text-center"><div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i></div><div class="app-title">Feeds</div></div>
                                <div class="col text-center"><div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i></div><div class="app-title">Files</div></div>
                                <div class="col text-center"><div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i></div><div class="app-title">Alerts</div></div>
                            </div>
                        </div>
                    </li>

                    {{-- Notifications --}}
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <x-notification-item icon="bx bx-group" color="primary" title="New Customers" time="14 Sec ago">5 new user registered</x-notification-item>
                                <x-notification-item icon="bx bx-cart-alt" color="danger" title="New Orders" time="2 min ago">You have received new orders</x-notification-item>
                                <x-notification-item icon="bx bx-file" color="success" title="24 PDF File" time="19 min ago">The pdf files generated</x-notification-item>
                            </div>
                            <div class="text-center msg-footer">View All Notifications</div>
                        </div>
                    </li>

                    {{-- Mensajes placeholder --}}
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">5</span>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Messages</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">No messages</a>
                            </div>
                            <div class="text-center msg-footer">View All Messages</div>
                        </div>
                    </li>

                    {{-- User dropdown (placeholder) --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img" alt="user avatar">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Ajustes</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

