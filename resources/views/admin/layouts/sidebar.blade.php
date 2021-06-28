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
        @if(Auth::user()->hasRole('Super Admin'))
        <!-- Menu Users -->
        <li class="bold @if($active == 'allUsers' || $active == 'addUser')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="{{__('Korisnici')}}">{{__('Korisnici')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allUsers' || $active == 'addUser')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allUsers')class="active" @endif>
                        <a @if($active == 'allUsers')class="active" @endif href="{{ url('admin/users') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi Korisnici')}}">{{__('Svi korisnici')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addUser')class="active" @endif>
                        <a @if($active == 'addUser')class="active" @endif href="{{ url('admin/users/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Korsinika')}}">{{__('Dodaj Korisnika')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Super Admin'))
        <!-- Menu Roles -->
        <li class="bold @if($active == 'allRoles' || $active == 'addRole')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">supervisor_account</i><span class="menu-title" data-i18n="{{__('Role')}}">{{__('Role')}}</span>
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
        @endif
        @if(Auth::user()->hasRole('Super Admin'))
        <!-- Menu Firm -->
        <li class="bold @if($active == 'allFirms' || $active == 'addFirm')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">business_center</i><span class="menu-title" data-i18n="{{__('Firme')}}">{{__('Firme')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allFirms' || $active == 'addFirm')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allFirms')class="active" @endif>
                        <a @if($active == 'allFirms')class="active" @endif href="{{ url('admin/firms') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve firme')}}">{{__('Sve firme')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addFirm')class="active" @endif>
                        <a @if($active == 'addFirm')class="active" @endif href="{{ url('admin/firms/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj firmu')}}">{{__('Dodaj firmu')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Firma'))
            <!-- Menu Stewards -->
                <li class="bold @if($active == 'allStewards' || $active == 'addSteward')active open @endif">
                    <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                        <i class="material-icons">person_outline</i><span class="menu-title" data-i18n="{{__('Upravnici')}}">{{__('Upravnici')}}</span>
                    </a>
                    <div class="collapsible-body" @if($active == 'allStewards' || $active == 'addSteward')style="display: block" @endif>
                        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                            <li @if($active == 'allStewards')class="active" @endif>
                                <a @if($active == 'allStewards')class="active" @endif href="{{ url('admin/stewards') }}">
                                    <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi Upravnici')}}">{{__('Svi Upravnici')}}</span></a>
                                </a>
                            </li>
                            <li @if($active == 'addSteward')class="active" @endif>
                                <a @if($active == 'addSteward')class="active" @endif href="{{ url('admin/stewards/create') }}">
                                    <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Upravnika')}}">{{__('Dodaj Upravnika')}}</span></a>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Firma') || Auth::user()->hasRole('Upravnik'))
        <!-- Menu Councils -->
        <li class="bold @if($active == 'allCouncils' || $active == 'addCouncil')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">business</i><span class="menu-title" data-i18n="{{__('Skupštine stanara')}}">{{__('Skupštine stanara')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allCouncils' || $active == 'addCouncil')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allCouncils')class="active" @endif>
                        <a @if($active == 'allCouncils')class="active" @endif href="{{ url('admin/councils') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve skupštine')}}">{{__('Sve skupštine')}}</span></a>
                        </a>
                    </li>
                    @if(Auth::user()->hasRole('Firma'))
                    <li @if($active == 'addCouncil')class="active" @endif>
                        <a @if($active == 'addCouncil')class="active" @endif href="{{ url('admin/councils/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj skupštinu')}}">{{__('Dodaj skupštinu')}}</span></a>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
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
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
            <!-- Menu Codebooks -->
        <li class="bold @if($active == 'allEnforcers' || $active == 'addEnforcer' || $active == 'allPartners' || $active == 'addPartner')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">storage</i><span class="menu-title" data-i18n="{{__('Šifarnici')}}">{{__('Šifarnici')}}</span>
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
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
        <!-- Menu Maintenance -->
        <li class="bold @if($active == 'allMaintenances' || $active == 'addMaintenance')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">playlist_add_check</i><span class="menu-title" data-i18n="{{__('Analize Stanja')}}">{{__('Analize Stanja')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allMaintenances' || $active == 'addMaintenance')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allMaintenances')class="active" @endif>
                        <a @if($active == 'allMaintenances')class="active" @endif href="{{ url('admin/maintenance') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve Analize ')}}">{{__('Sve Analize ')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addMaintenance')class="active" @endif>
                        <a @if($active == 'addMaintenance')class="active" @endif href="{{ url('admin/maintenance/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Analizu ')}}">{{__('Dodaj Analizu ')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
        <!-- Menu Program -->
        <li class="bold @if($active == 'allPrograms' || $active == 'addProgram')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">build</i><span class="menu-title" data-i18n="{{__('Programi Održavanja')}}">{{__('Programi Održavanja')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allPrograms' || $active == 'addProgram')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allPrograms')class="active" @endif>
                        <a @if($active == 'allPrograms')class="active" @endif href="{{ url('admin/programs') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi Programi ')}}">{{__('Svi Programi ')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
        <!-- Menu Documents -->
        <li class="bold @if($active == 'allDocuments')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">library_books</i><span class="menu-title" data-i18n="{{__('Dokumenti')}}">{{__('Dokumenti')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allDocuments' || $active == 'addDuty')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allDocuments')class="active" @endif>
                        <a @if($active == 'allDocuments')class="active" @endif href="{{ url('admin/documents') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Svi Dokumenti ')}}">{{__('Svi Dokumenti ')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
        <!-- Menu Duties -->
        <li class="bold @if($active == 'allDuties' || $active == 'addDuty')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">assignment_turned_in</i><span class="menu-title" data-i18n="{{__('Obaveze')}}">{{__('Obaveze')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allDuties' || $active == 'addDuty')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allDuties')class="active" @endif>
                        <a @if($active == 'allDuties')class="active" @endif href="{{ url('admin/duties') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve Obaveze ')}}">{{__('Sve Obaveze ')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addDuty')class="active" @endif>
                        <a @if($active == 'addDuty')class="active" @endif href="{{ url('admin/duties/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Obavezu ')}}">{{__('Dodaj Obavezu ')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
        <!-- Menu Warning -->
        <li class="bold @if($active == 'allWarnings' || $active == 'addWarning')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">assignment_late</i><span class="menu-title" data-i18n="{{__('Opomene')}}">{{__('Opomene')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allWarnings' || $active == 'addWarning')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allWarnings')class="active" @endif>
                        <a @if($active == 'allWarnings')class="active" @endif href="{{ url('admin/warnings') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve Opomene ')}}">{{__('Sve Opomene ')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addWarning')class="active" @endif>
                        <a @if($active == 'addWarning')class="active" @endif href="{{ url('admin/warnings/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Opomenu ')}}">{{__('Dodaj Opomenu ')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
        @if(Auth::user()->hasRole('Upravnik'))
        <!-- Menu Warning -->
        <li class="bold @if($active == 'allLawsuits' || $active == 'addLawsuit')active open @endif">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">gavel</i><span class="menu-title" data-i18n="{{__('Tužbe')}}">{{__('Tužbe')}}</span>
            </a>
            <div class="collapsible-body" @if($active == 'allLawsuits' || $active == 'addLawsuit')style="display: block" @endif>
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li @if($active == 'allLawsuits')class="active" @endif>
                        <a @if($active == 'allLawsuits')class="active" @endif href="{{ url('admin/lawsuits') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Sve Tužbe ')}}">{{__('Sve Tužbe ')}}</span></a>
                        </a>
                    </li>
                    <li @if($active == 'addLawsuit')class="active" @endif>
                        <a @if($active == 'addLawsuit')class="active" @endif href="{{ url('admin/lawsuits/create') }}">
                            <i class="material-icons">radio_button_unchecked</i><span data-i18n="{{__('Dodaj Tužbu ')}}">{{__('Dodaj Tužbu ')}}</span></a>
                        </a>
                    </li>
                </ul>
            </div>
        </li><!--end /menu-item -->
        @endif
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out">
        <i class="material-icons">menu</i>
    </a>
    <!-- END MAIN MENU -->
</aside>

