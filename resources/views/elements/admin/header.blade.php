<header class="main-header">
    <a href="{{URL::to( 'admin/admins/dashboard')}}" class="logo">
        <span class="logo-mini"><b>{{ strtoupper(substr(SITE_TITLE, 0, 2))}}</b></span>
        <span class="logo-lg">{{HTML::image(LOGO_PATH, SITE_TITLE)}}</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{Session::get('admin_username')}}</span>
                    </a>
                </li>
                <li><a href="{{URL::to( 'admin/admins/logout')}}" class=""><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </div>
    </nav>
</header>