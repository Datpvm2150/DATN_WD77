<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='index.html'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Quản trị</li>

                <li class="menu-title">Kinh doanh</li>

                <li>
                    <a href="#sanpham" data-bs-toggle="collapse">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path
                                d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z">
                            </path>
                        </svg>
                        <span> Sản phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sanpham">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.sanphams.index') }}">Danh sách</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.sanphams.create') }}">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>

                    <a href='#danhmucs' data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> Danh mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="danhmucs">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.danhmucs.index') }}">Danh sách</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.danhmucs.create') }}">Thêm mới</a>

                            </li>
                        </ul>
                    </div>
                </li>

                <li>

                    <a href="#bannerSection" data-bs-toggle="collapse">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                            <line x1="7" y1="2" x2="7" y2="22"></line>
                            <line x1="17" y1="2" x2="17" y2="22"></line>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <line x1="2" y1="7" x2="7" y2="7"></line>
                            <line x1="2" y1="17" x2="7" y2="17"></line>
                            <line x1="17" y1="17" x2="22" y2="17"></line>
                            <line x1="17" y1="7" x2="22" y2="7"></line>
                        </svg>
                        <span> Banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="bannerSection">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.banners.index') }}">Danh sách</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.banners.create') }}">Thêm mới</a>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#baiviets" data-bs-toggle="collapse">
                        <i data-feather="table"></i>
                        <span>Tin tức</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="baiviets">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.baiviets.index') }}">Danh sách</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.baiviets.create') }}">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#promotionSection" data-bs-toggle="collapse">
                        <i class="fas fa-tag"></i>
                        <span> Khuyến mãi </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="promotionSection">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.khuyen_mais.index') }}">Danh sách</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.khuyen_mais.create') }}">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
            </li>

                <li>
                    <a href="#tags" data-bs-toggle="collapse">
                        <i class="fas fa-tags"></i>
                        <span> Thẻ Tag </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="tags">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.tag.index') }}">Danh sách</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.tag.create') }}">Thêm mới</a>
                     </li>
                {{-- mau sac --}}
                <li>
                    <a href='#mausacs' data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Màu sắc </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="mausacs">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.mausacs.index') }}">Danh sách</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.mausacs.create') }}">Thêm mới</a>

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
<!-- Left Sidebar End -->
