<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <ul class="menu-nav">
                    <li class="menu-item menu-item-submenu menu-item-rel menu-item-active">
                        <a href="/dashboard" class="menu-link">
                            <span class="menu-text"> Dashboard </span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="topbar">
            @include('layouts.backend.__includes.components.topbar-search')
            @include('layouts.backend.__includes.components.topbar-cart')
            @include('layouts.backend.__includes.components.topbar-chat')
            @include('layouts.backend.__includes.components.topbar-notification')
            @include('layouts.backend.__includes.components.topbar-panel')
            @include('layouts.backend.__includes.components.topbar-action')
            @include('layouts.backend.__includes.components.topbar-language')
            @include('layouts.backend.__includes.components.topbar-user')
        </div>
    </div>
</div>