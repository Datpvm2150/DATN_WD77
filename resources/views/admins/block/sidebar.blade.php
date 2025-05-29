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
        

    
    </ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
</div>
<!-- Left Sidebar End -->
