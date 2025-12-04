<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="{{ route('dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a href="{{ route('home')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="40">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                <li class="menu-title">Pages</li>

                     {{-- Slider section --}}
                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Slider Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('get.slider') }}" class="tp-link">Edit slider</a>
                            </li>
                        </ul>
                    </div>
                </li>


                     {{-- features section --}}
                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Features </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.features') }}" class="tp-link">All Features</a>
                            </li>
                            <li>
                                <a href="{{ route('add.feature') }}" class="tp-link">Add Features</a>
                            </li>
                        </ul>
                    </div>
                </li>

                 {{-- about us section --}}
                <li>
                    <a href="#sidebarError" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Intro Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarError">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('get.intro') }}" class="tp-link">Get Intro</a>
                            </li>
                            <li>
                                <a href="{{ route('all.introvalue') }}" class="tp-link">All Introvalue</a>
                            </li>
                            <li>
                                <a href="{{ route('add.introvalue') }}" class="tp-link">Add Introvalue</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Our portfolio showcase --}}

                <li>
                    <a href="#sidebarBaseui" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Portfolio Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('get.usability') }}" class="tp-link">Edit Portfolio</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- review section --}}
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> Review Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.review') }}" class="tp-link">All Review</a>
                            </li>
                            <li>
                                <a href="{{ route('add.review') }}" class="tp-link">Add Review</a>
                            </li>
                        </ul>
                    </div>
                </li>


                 {{-- faq section --}}
                <li>
                    <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> FAQ Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdvancedUI">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.faq') }}" class="tp-link">All FAQ</a>
                            </li>
                            <li>
                                <a href="{{ route('add.faq') }}" class="tp-link">Add FAQ</a>
                            </li>
                        </ul>
                    </div>
                </li>
                

                  {{-- CTA section --}}
                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> CTA Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('get.cta') }}" class="tp-link">Get CTA</a>
                            </li>
                        </ul>
                    </div>
                </li>

                  {{-- team memberes section --}}
                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> Team Member </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.team') }}" class="tp-link">All Members</a>
                            </li>
                            <li>
                                <a href="{{ route('add.team') }}" class="tp-link">Add Members</a>
                            </li>
                        </ul>
                    </div>
                </li>
                


                <li class="menu-title mt-2">General</li>

                <li>
                    <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Components </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdvancedUI">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ui-accordions.html" class="tp-link">Accordions</a>
                            </li>
                            <li>
                                <a href="ui-alerts.html" class="tp-link">Alerts</a>
                            </li>
                            <li>
                                <a href="ui-badges.html" class="tp-link">Badges</a>
                            </li>
                            <li>
                                <a href="ui-breadcrumb.html" class="tp-link">Breadcrumb</a>
                            </li>
                            <li>
                                <a href="ui-buttons.html" class="tp-link">Buttons</a>
                            </li>
                            <li>
                                <a href="ui-cards.html" class="tp-link">Cards</a>
                            </li>
                            <li>
                                <a href="ui-collapse.html" class="tp-link">Collapse</a>
                            </li>
                            <li>
                                <a href="ui-dropdowns.html" class="tp-link">Dropdowns</a>
                            </li>
                            <li>
                                <a href="ui-video.html" class="tp-link">Embed Video</a>
                            </li>
                            <li>
                                <a href="ui-grid.html" class="tp-link">Grid</a>
                            </li>
                            <li>
                                <a href="ui-images.html" class="tp-link">Images</a>
                            </li>
                            <li>
                                <a href="ui-list.html" class="tp-link">List Group</a>
                            </li>
                            <li>
                                <a href="ui-modals.html" class="tp-link">Modals</a>
                            </li>
                            <li>
                                <a href="ui-placeholders.html" class="tp-link">Placeholders</a>
                            </li>
                            <li>
                                <a href="ui-pagination.html" class="tp-link">Pagination</a>
                            </li>
                            <li>
                                <a href="ui-popovers.html" class="tp-link">Popovers</a>
                            </li>
                            <li>
                                <a href="ui-progress.html" class="tp-link">Progress</a>
                            </li>
                            <li>
                                <a href="ui-scrollspy.html" class="tp-link">Scrollspy</a>
                            </li>
                            <li>
                                <a href="ui-spinners.html" class="tp-link">Spinners</a>
                            </li>
                            <li>
                                <a href="ui-tabs.html" class="tp-link">Tabs</a>
                            </li>
                            <li>
                                <a href="ui-tooltips.html" class="tp-link">Tooltips</a>
                            </li>
                            <li>
                                <a href="ui-typography.html" class="tp-link">Typography</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="widgets.html" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span> Widgets </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                        <i data-feather="cpu"></i>
                        <span> Extended UI </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdvancedUI">
                        <ul class="nav-second-level">
                            <li>
                                <a href="extended-carousel.html" class="tp-link">Carousel</a>
                            </li>
                            <li>
                                <a href="extended-notifications.html" class="tp-link">Notifications</a>
                            </li>
                            <li>
                                <a href="extended-offcanvas.html" class="tp-link">Offcanvas</a>
                            </li>
                            <li>
                                <a href="extended-range-slider.html" class="tp-link">Range Slider</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="award"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="icons-feather.html" class="tp-link">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icons-mdi.html" class="tp-link">Material Design Icons</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>