<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>
        <!-- Sidebar Menu -->
        <div id="sidebar-menu">
            <!-- Logo Box -->
            <div class="logo-box">
                <a href="index.html">
                    <img src="{{ asset('assets/admin/images/logo-ctstore.png') }}" alt="logo"
                        style="width:160px; height:70px;">
                </a>
            </div>
            <!-- End Logo Box -->

            <ul id="side-menu">

                <!-- Quản trị -->

                <li class="menu-title">Quản trị</li>


                {{-- Thống kê --}}
                <li>
                    <a href='#dbs' data-bs-toggle="collapse">
                        <i data-feather="home"></i>
                        <span> Thống kê </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="dbs">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.dashboard')}}" class="tp-link">Dashboard</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.doanhthu') }}">Doanh thu</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.thongke.sanpham.banchay') }}">Sản phẩm bán
                                    chạy</a>
                            </li>
                            <li>
                                <a class='tp-link' href="{{ route('admin.thongke.sanpham.kho') }}">Kho Sản phẩm </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Quản lý tài khoản </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.admins') }}'>Quản trị viên</a>
                            </li>

                            <li>
                                <a class='tp-link' href='{{ route('admin.khachhangs') }}'>Khách hàng</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Kinh doanh -->
                <li class="menu-title">Kinh doanh</li>

                <!-- Sản phẩm -->
                <li>
                    <a href="#sanpham" data-bs-toggle="collapse">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z">
                            </path>
                        </svg>
                        <span> Sản phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sanpham">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.sanphams.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.sanphams.create') }}">Thêm mới</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Danh mục -->
                <li>
                    <a href="#danhmucs" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span> Danh mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="danhmucs">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.danhmucs.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.danhmucs.create') }}">Thêm mới</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Banner -->
                <li>
                    <a href="#bannerSection" data-bs-toggle="collapse">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            <li><a class='tp-link' href="{{ route('admin.banners.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.banners.create') }}">Thêm mới</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Dung lượng -->
                <li>
                    <a href="#dungluongs" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Dung lượng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="dungluongs">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.dungluongs.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.dungluongs.create') }}">Thêm mới</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Tin tức -->
                <li>
                    <a href="#baiviets" data-bs-toggle="collapse">
                        <i data-feather="table"></i>
                        <span>Tin tức</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="baiviets">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.baiviets.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.baiviets.create') }}">Thêm mới</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Khuyến mãi -->
                <li>
                    <a href="#promotionSection" data-bs-toggle="collapse">
                        <i class="fas fa-tag"></i>
                        <span> Khuyến mãi </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="promotionSection">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.khuyen_mais.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.khuyen_mais.create') }}">Thêm mới</a></li>
                            <li><a class='tp-link' href="{{ route('admin.khuyen_mais.trash') }}">Thùng rác <i
                                        class="fas fa-trash-alt"></i> </a></li>
                        </ul>
                    </div>
                </li>

                <!-- Thẻ tag -->
                <li>
                    <a href="#tags" data-bs-toggle="collapse">
                        <i class="fas fa-tags"></i>
                        <span> Thẻ Tag </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="tags">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.tag.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.tag.create') }}">Thêm mới</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Màu sắc -->
                <li>
                    <a href="#mausacs" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Màu sắc </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="mausacs">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.mausacs.index') }}">Danh sách</a></li>
                            <li><a class='tp-link' href="{{ route('admin.mausacs.create') }}">Thêm mới</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Đánh giá -->
                <li>
                    <a href="#danhgias" data-bs-toggle="collapse">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span> Đánh giá </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="danhgias">
                        <ul class="nav-second-level">
                            <li><a class='tp-link' href="{{ route('admin.Danhgias.index') }}">Danh sách</a></li>
                        </ul>
                    </div>
                </li>

                {{-- Đơn hàng --}}
                <li>
                    <a href='#hoadons' data-bs-toggle="collapse">
                        <i data-feather="shopping-bag"></i>
                        <span> Đơn hàng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="hoadons">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.hoadons.index') }}">Danh sách</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li>

                    <a href="#lienhes" data-bs-toggle="collapse">
                        <i class="fa fa-phone"></i>
                        <span> Liên hệ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="lienhes">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href="{{ route('admin.lienhes.index') }}">Danh sách</a>
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