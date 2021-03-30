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
        <!-- Menu Workers -->
        <li class="bold @if($active == 'allWorkers' || $active == 'addWorker')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">people_outline</i><span class="menu-title" data-i18n="{{__('Radnici')}}">{{__('Radnici')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allWorkers' || $active == 'addWorker')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allWorkers')class="active" @endif>
                        <a @if($active == 'allWorkers')class="active" @endif href="{{ url('admin/workers') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi radnici')}}">{{__('Svi radnici')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addWorker')class="active" @endif>
                        <a @if($active == 'addWorker')class="active" @endif href="{{ url('admin/workers/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Radnika')}}">{{__('Dodaj Radnika')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        <!-- Menu Codebooks -->
        <li class="bold @if($active == 'allEnforcers' || $active == 'addEnforcer' || $active == 'allPartners' || $active == 'addPartner')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">library_books</i><span class="menu-title" data-i18n="{{__('Šifarnici')}}">{{__('Šifarnici')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allEnforcers' || $active == 'addEnforcer' || $active == 'allPartners' || $active == 'addPartner')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="bold @if($active == 'allEnforcers' || $active == 'addEnforcer')active open @endif">
                        <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                            <i class="material-icons">supervisor_account</i><span class="menu-title" data-i18n="{{__('Izvršitelji')}}">{{__('Izvršitelji')}}</span>
                        </a>
                        <div class="collapsible-body" @if($active == 'allEnforcers' || $active == 'addEnforcer')style="display: block" @endif>
                            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                                <li @if($active == 'allEnforcers')class="active" @endif>
                                    <a @if($active == 'allEnforcers')class="active" @endif href="{{ url('admin/enforcers') }}">
                                        <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi izvršitelji')}}">{{__('Svi izvršitelji')}}</span></a>
                                    </a>
                                </li>
                                <li @if($active == 'addEnforcer')class="active" @endif>
                                    <a @if($active == 'addEnforcer')class="active" @endif href="{{ url('admin/enforcers/create') }}">
                                        <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj izvršitelja')}}">{{__('Dodaj izvršitelja')}}</span></a>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold @if($active == 'allPartners' || $active == 'addPartner')active open @endif">
                        <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                            <i class="material-icons">people_outline</i><span class="menu-title" data-i18n="{{__('Partneri')}}">{{__('Partneri')}}</span>
                        </a>
                        <div class="collapsible-body" @if($active == 'allPartners' || $active == 'addPartner')style="display: block" @endif>
                            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                                <li @if($active == 'allPartners')class="active" @endif>
                                    <a @if($active == 'allPartners')class="active" @endif href="{{ url('admin/partners') }}">
                                        <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi partneri')}}">{{__('Svi partneri')}}</span></a>
                                    </a>
                                </li>
                                <li @if($active == 'addPartner')class="active" @endif>
                                    <a @if($active == 'addPartner')class="active" @endif href="{{ url('admin/partners/create') }}">
                                        <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj partnera')}}">{{__('Dodaj partnera')}}</span></a>
                                    </a>
                                </li>
                            </ul>
                        </div>
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

