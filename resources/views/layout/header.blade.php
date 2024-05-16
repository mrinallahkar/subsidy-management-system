<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('dashboard-page')}}');">
            <!--<img src="{{ url('assets/images/logo.svg') }}" alt="logo" /> </a>-->
            <img src="{{ url('assets/images/side_logo.png') }}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('dashboard-page')}}');">
            <img src="{{ url('assets/images/favicon.ico') }}" alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-left header-links">
            <li class="nav-item dropdown d-none d-lg-flex">
                <a class="nav-link px-0" aria-expanded="false"><span style="font-size:large">Subsidy Management System</span></a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <span class="profile-text d-none d-md-inline-flex"><b>{{Session::get('username')}}</b></span>
                    <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face3.jpg') }}" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown">
                    <!-- <a class="dropdown-item mt-2"> Manage Accounts </a> -->
                    <a class="dropdown-item" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('change_password')}}');" class="btn btn-danger btn-sm"> Change Password </a>
                    <a class="dropdown-item" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('configuration')}}');" class="btn btn-danger btn-sm"> Configuration </a>
                    <!-- <a class="dropdown-item" href="{{ url('logout') }}"> Sign Out </a> -->
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logOutModal">Log Out</a>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link count-indicator dropdown-toggle" href="#" onclick="fnLeftSubMenuNavigation(this,'{{url('master-ui.master-setting')}}');">
                    <i class="menu-icon mdi mdi-settings"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu icon-menu"></span>
        </button>
    </div>
</nav>
<div style="padding-top: 53px;">
</div>

<div class="modal fade" id="logOutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="width: 23%;">
        <div class="modal-content">
            <div class="modal-header">
            <h5><i class="mdi mdi-lock"></i> Are you sure you want to log-off? </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="actionsBtns" style="text-align: center;">
                    <!-- <form action="{{ url('logout') }}" method="post"> -->

                    <a class="btn btn-default btn-primary" href="{{ url('signout') }}">Logout</a>
                    <!-- <input type="submit" class="btn btn-default btn-primary" value="Logout" /> -->
                    <button class="btn btn-default btn-danger" data-dismiss="modal">Cancel</button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('assets/js/common_script.js') }}"></script>