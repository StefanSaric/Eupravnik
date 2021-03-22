<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
    <div class="brand-sidebar">
        <!-- BEGIN TITLE -->
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{ url('admin/') }}">
<!--                <img class="hide-on-med-and-down " src="{{asset('images/logo.png')}}" alt="logo"/>-->
<!--                <img class="show-on-medium-and-down hide-on-med-and-up" src="{{asset('images/logo-2.png')}}" alt="logo"/>-->
                <span class="logo-text hide-on-med-and-down">E - Upravnik</span>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <!-- END TITLE -->
    <!-- BEGIN MAIN MENU -->
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <!-- Menu Dashboard -->
        <li class="@if($active == 'dash')active @endif bold">
            <a class="waves-effect waves-cyan @if($active == 'dash')active @endif" href="{{ url('admin/') }}">
                <i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
            </a>
        </li><!--end /menu-item -->
        <!-- Menu Users -->
        <li class="bold @if($active == 'allUsers' || $active == 'addUser')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="{{__('Administratori')}}">{{__('Administratori')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allUsers' || $active == 'addUser')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allUsers')class="active" @endif>
                        <a @if($active == 'allUsers')class="active" @endif href="{{ url('admin/users') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi Administratori')}}">{{__('Svi Administratori')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addUser')class="active" @endif>
                        <a @if($active == 'addUser')class="active" @endif href="{{ url('admin/users/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Administratora')}}">{{__('Dodaj Administratora')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        <!-- Menu Roles -->
        <li class="bold @if($active == 'allRoles' || $active == 'addRole')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">people_outline</i><span class="menu-title" data-i18n="{{__('Role')}}">{{__('Role')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allRoles' || $active == 'addRole')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allRoles')class="active" @endif>
                        <a @if($active == 'allRoles')class="active" @endif href="{{ url('admin/roles') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve role')}}">{{__('Sve role')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addRole')class="active" @endif>
                        <a @if($active == 'addRole')class="active" @endif href="{{ url('admin/roles/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj rolu')}}">{{__('Dodaj rolu')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        <!-- Menu Councils -->
        <li class="bold @if($active == 'allCouncils' || $active == 'addCouncil')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">people_outline</i><span class="menu-title" data-i18n="{{__('Skupštine stanara')}}">{{__('Skupštine stanara')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allCouncils' || $active == 'addCouncil')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allCouncils')class="active" @endif>
                        <a @if($active == 'allCouncils')class="active" @endif href="{{ url('admin/councils') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve skupštine')}}">{{__('Sve skupštine')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addCouncil')class="active" @endif>
                        <a @if($active == 'addCouncil')class="active" @endif href="{{ url('admin/councils/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj skupštinu')}}">{{__('Dodaj skupštinu')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out">
        <i class="material-icons">menu</i>
    </a>
    <!-- END MAIN MENU -->
</aside>

