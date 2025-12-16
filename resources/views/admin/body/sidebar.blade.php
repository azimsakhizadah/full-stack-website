<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a href="{{ route('home') }}" class="logo logo-dark">
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



                {{-- team memberes section --}}
                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> Messages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.messages') }}" class="tp-link">All Message</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- team memberes section --}}
                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> Portfolio </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.portfolios') }}" class="tp-link">All Portfolios</a>
                            </li>
                            <li>
                                <a href="{{ route('add.portfolio') }}" class="tp-link">Add Portfolio</a>
                            </li>
                            <li>
                                <a href="{{ route('portfolio-categories.index') }}" class="tp-link">All
                                    Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('portfolio-categories.create') }}" class="tp-link">Add Category</a>
                            </li>
                        </ul>
                    </div>
                </li>


                {{-- Blog section --}}
                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> Posts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.posts') }}" class="tp-link">All Posts</a>
                            </li>
                            <li>
                                <a href="{{ route('add.post') }}" class="tp-link">Add Post</a>
                            </li>
                            <li>
                                <a href="{{ route('post-categories.index') }}" class="tp-link">All
                                    Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('post-categories.create') }}" class="tp-link">Add Category</a>
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
