<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('super_admin.dashboard') }}" title="Dashboard">
                {{-- <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg> --}}
                <span class="brand-name text-truncate">Layali Dashboard </span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <ul class="nav sidebar-inner" id="sidebar-menu">
                {{-- =================================================== --}}
                {{-- ==================== Dashboard ==================== --}}
                {{-- =================================================== --}}
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('super_admin.dashboard') }}">
                        <i class="mdi mdi-desktop-mac-dashboard"></i>
                        <span class="nav-text" style="font-size: 10pt;">Dashboard</span>
                    </a>
                </li>

                {{-- =================================================== --}}
                {{-- ================== Website Pages ================== --}}
                {{-- =================================================== --}}
                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#website_pages" aria-expanded="false" aria-controls="website_pages">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="nav-text" style="font-size: 10pt;"> Website Pages </span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="website_pages" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            {{-- =================================================== --}}
                            {{-- ====================== PLaylist =================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.playlist-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> PLaylist</span>
                                </a>
                            </li>

                           
                            {{-- =================================================== --}}
                            {{-- ======================== Category =================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.categories-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Categories</span>
                                </a>
                            </li>
                            

                            {{-- =================================================== --}}
                            {{-- ====================== Slider =================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.slider-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Slider</span>
                                </a>
                            </li>
                            {{-- =================================================== --}}
                            {{-- ======================== Movies =================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.movies-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Movies</span>
                                </a>
                            </li>
                            {{-- =================================================== --}}
                            {{-- ======================== Series =================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.series-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Series</span>
                                </a>
                            </li>
                            {{-- =================================================== --}}
                            {{-- ========================= Kids ==================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.kids-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Kids</span>
                                </a>
                            </li>
                            {{-- =================================================== --}}
                            {{-- ========================= Programs ==================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.programs-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Programs</span>
                                </a>
                            </li>
                            {{-- =================================================== --}}
                            {{-- ========================= Songs ==================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.songs-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Songs</span>
                                </a>
                            </li>
                        

                        </div>
                    </ul>
                </li>

                {{-- =================================================== --}}
                {{-- ================ Website Layouts ================== --}}
                {{-- =================================================== --}}
                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#website_layout" aria-expanded="false" aria-controls="website_layout">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="nav-text" style="font-size: 10pt;"> Website Layouts </span> <b
                            class="caret"></b>
                    </a>
                    <ul class="collapse" id="website_layout" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            {{-- =================================================== --}}
                            {{-- ===================== Home Layout ================= --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.home_layouts-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Home Layout </span>
                                </a>
                            </li>
                            
                            {{-- =================================================== --}}
                            {{-- ====================== About Us =================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.abouts-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;">About Us</span>
                                </a>
                            </li>

                            {{-- =================================================== --}}
                            {{-- ================= Terms & Conditions ============== --}}
                            {{-- =================================================== --}}
                            {{-- <li class="active">
                                <a class="sidenav-item-link"
                                    href="#">
                                    <span class="nav-text" style="font-size: 9pt;"> Terms & Conditions</span>
                                </a>
                            </li> --}}

                            {{-- =================================================== --}}
                            {{-- ================== Privacy Policy ================= --}}
                            {{-- =================================================== --}}
                            {{-- <li class="active">
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text" style="font-size: 9pt;"> Privacy Policy</span>
                                </a>
                            </li> --}}

                            {{-- =================================================== --}}
                            {{-- ===================== Contact Us ================== --}}
                            {{-- =================================================== --}}
                            {{-- <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.contact_us-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;">Contact Us</span>
                                </a>
                            </li> --}}
                          

                        </div>
                    </ul>
                </li>

                {{-- =================================================== --}}
                {{-- ================ Website Settings ================= --}}
                {{-- =================================================== --}}
                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#website_setting" aria-expanded="false" aria-controls="website_setting">
                        <i class="mdi mdi-format-list-bulleted"></i>
                        <span class="nav-text" style="font-size: 10pt;"> Website Settings </span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="website_setting" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            {{-- =================================================== --}}
                            {{-- ================= Support Tickets ================= --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ route('super_admin.support_tickets-index') }}">
                                    <span class="nav-text" style="font-size: 9pt;"> Support Tickets</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                {{-- =================================================== --}}
                {{-- ===================== Logout ====================== --}}
                {{-- =================================================== --}}
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('super_admin.support_tickets-index') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout"></i>
                        <span class="nav-text" style="font-size: 10pt;"> Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</aside>
