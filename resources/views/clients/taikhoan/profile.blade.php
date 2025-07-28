@extends('layouts.client')

@section('content')
    <section class="profile__area pt-120 pb-120">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
            @endif
            <div class="profile__inner p-relative">
                <div class="profile__shape">
                    <img class="profile__shape-1" src="{{ asset('assets/client/img/login/laptop.png') }}" alt="">
                    <img class="profile__shape-2" src="{{ asset('assets/client/img/login/man.png') }}" alt="">
                    <img class="profile__shape-3" src="{{ asset('assets/client/img/login/shape-1.png') }}" alt="">
                    <img class="profile__shape-4" src="{{ asset('assets/client/img/login/shape-2.png') }}" alt="">
                    <img class="profile__shape-5" src="{{ asset('assets/client/img/login/shape-3.png') }}" alt="">
                    <img class="profile__shape-6" src="{{ asset('assets/client/img/login/shape-4.png') }}" alt="">
                </div>

                <div class="row">
                    <div class="col-xxl-4 col-lg-4">
                        <div class="profile__tab mr-40">
                            <nav>
                                <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false"><span><i
                                                class="fa-regular fa-user-pen"></i></span>Tài khoản</button>
                                    <button class="nav-link" id="nav-information-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-information" type="button" role="tab"
                                        aria-controls="nav-information" aria-selected="false"><span><i
                                                class="fa-regular fa-circle-info"></i></span>Thông tin tài khoản</button>
                                    <a href="{{ route('customer.donhang') }}" class="nav-link"><span><i
                                                class="fa-light fa-clipboard-list-check"></i></span>Đơn hàng</a>
                                    <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-password" type="button" role="tab"
                                        aria-controls="nav-password" aria-selected="false"><span><i
                                                class="fa-regular fa-lock"></i></span>Thay đổi mật khẩu</button>
                                    <button class="nav-link" id="nav-lienhe-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-lienhe" type="button" role="tab"
                                        aria-controls="nav-lienhe" aria-selected="false"><span><i
                                                class="fas fa-envelope"></i></span>Hòm thư phản hồi</button>
                                    <button class="nav-link" id="nav-discount-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-discount" type="button" role="tab"
                                        aria-controls="nav-discount" aria-selected="false"><span><i
                                                class="fa fa-ticket"></i></span>Mã khuyến mãi cá nhân</button>
                                    <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>

                                    {{-- Nút quay lại trang Admin --}}
                                    @auth
                                        @if(Auth::user() && Auth::user()->vai_tro === 'admin')
                                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                                <span><i class="fa-solid fa-user-gear"></i></span>Về trang Admin
                                            </a>
                                            <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
                                        @endif
                                    @endauth
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-lg-8">
                        <div class="profile__tab-content">
                            <div class="tab-content" id="profile-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="profile__main">
                                        <div class="profile__main-top pb-80">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="profile__main-inner d-flex flex-wrap align-items-center">
                                                        <div class="profile__main-thumb">
                                                            @if ($profile->anh_dai_dien != '')
                                                                <img src="{{ asset('storage/' . $profile->anh_dai_dien) }}"
                                                                    class="rounded-circle avatar-xxl img-thumbnail float-start"
                                                                    alt="Avatar" style="object-fit: cover">
                                                            @else
                                                                <img src="{{ isset($user) && $user->anh_dai_dien ? Storage::url($user->anh_dai_dien) : asset('assets/client/img/about/anhchuadangnhap.jpg') }}"
                                                                    alt="">
                                                            @endif
                                                        </div>
                                                        <div class="profile__main-content">
                                                            <h4 class="profile__main-title">Xin chào {{ $profile->ten }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="profile__main-logout text-sm-end">
                                                        <form id="logout-form-client"
                                                            action="{{ route('customer.logout') }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                        </form>
                                                        <a class='dropdown-item notify-item' href="#"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form-client').submit();">
                                                            <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                                            <button type="submit" class="btn btn-danger">Đăng xuất</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile__main-info">
                                            <div class="row gx-3">
                                                {{-- <div class="col-md-3 col-sm-6">
                                                    <div class="profile__main-info-item">
                                                        <div class="profile__main-info-icon">
                                                            <span>
                                                                <span class="profile-icon-count profile-download">2</span>
                                                                <svg enable-background="new 0 0 512 512"
                                                                    viewBox="0 0 512 512">
                                                                    <path
                                                                        d="m334.52 286.41c3.21 3.21 3.21 8.42 0 11.63l-71.73 71.73c-1.48 2.16-3.97 3.59-6.79 3.59-.03 0-.07 0-.1 0s-.07 0-.1 0c-2.11 0-4.21-.8-5.82-2.41l-72.5-72.5c-3.21-3.21-3.21-8.42 0-11.63s8.42-3.21 11.63 0l58.66 58.66v-198.62c0-4.54 3.68-8.23 8.23-8.23 4.54 0 8.23 3.68 8.23 8.23v198.21l58.66-58.66c3.21-3.21 8.42-3.21 11.63 0zm117.29-226.22c39.34 38.21 58.47 100.39 60.19 195.66v.3c-1.72 95.28-20.85 157.46-60.19 195.66-38.21 39.34-100.39 58.47-195.66 60.19-.05 0-.1 0-.15 0s-.1 0-.15 0c-95.28-1.72-157.46-20.85-195.66-60.19-39.34-38.21-58.47-100.38-60.19-195.66 0-.1 0-.2 0-.3 1.72-95.28 20.85-157.46 60.19-195.66 38.21-39.34 100.39-58.47 195.66-60.19h.3c95.27 1.72 157.45 20.85 195.66 60.19zm43.73 195.81c-1.65-90.63-19.22-149.13-55.28-184.09-.06-.06-.12-.12-.18-.18-34.95-36.06-93.45-53.62-184.08-55.27-90.63 1.65-149.13 19.22-184.09 55.28-.06.06-.12.12-.18.18-36.06 34.95-53.62 93.44-55.27 184.08 1.65 90.63 19.22 149.13 55.28 184.09l.18.18c34.95 36.06 93.45 53.62 184.09 55.28 90.63-1.65 149.13-19.22 184.09-55.28l.18-.18c36.04-34.96 53.61-93.45 55.26-184.09z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <h4 class="profile__main-info-title">Downlaods</h4>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="profile__main-info-item">
                                                        <div class="profile__main-info-icon">
                                                            <span>
                                                                <span class="profile-icon-count profile-order">
                                                                    @if (Auth::user())
                                                                        {{ Auth::user()->hoaDons()->count() }}
                                                                    @endif
                                                                </span>
                                                                <svg viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M472.916,224H448.007a24.534,24.534,0,0,0-23.417-18H398V140.976a6.86,6.86,0,0,0-3.346-6.062L207.077,26.572a6.927,6.927,0,0,0-6.962,0L12.48,134.914A6.981,6.981,0,0,0,9,140.976V357.661a7,7,0,0,0,3.5,6.062L200.154,472.065a7,7,0,0,0,3.5.938,7.361,7.361,0,0,0,3.6-.938L306,415.108v41.174A29.642,29.642,0,0,0,335.891,486H472.916A29.807,29.807,0,0,0,503,456.282v-202.1A30.2,30.2,0,0,0,472.916,224Zm-48.077-4A10.161,10.161,0,0,1,435,230.161v.678A10.161,10.161,0,0,1,424.839,241H384.161A10.161,10.161,0,0,1,374,230.839v-.678A10.161,10.161,0,0,1,384.161,220ZM203.654,40.717l77.974,45.018L107.986,185.987,30.013,140.969ZM197,453.878,23,353.619V153.085L197,253.344Zm6.654-212.658-81.668-47.151L295.628,93.818,377.3,140.969ZM306,254.182V398.943l-95,54.935V253.344L384,153.085V206h.217A24.533,24.533,0,0,0,360.8,224H335.891A30.037,30.037,0,0,0,306,254.182Zm183,202.1A15.793,15.793,0,0,1,472.916,472H335.891A15.628,15.628,0,0,1,320,456.282v-202.1A16.022,16.022,0,0,1,335.891,238h25.182a23.944,23.944,0,0,0,23.144,17H424.59a23.942,23.942,0,0,0,23.143-17h25.183A16.186,16.186,0,0,1,489,254.182Z" />
                                                                    <path
                                                                        d="M343.949,325h7.327a7,7,0,1,0,0-14H351V292h19.307a6.739,6.739,0,0,0,6.655,4.727A7.019,7.019,0,0,0,384,289.743v-4.71A7.093,7.093,0,0,0,376.924,278H343.949A6.985,6.985,0,0,0,337,285.033v32.975A6.95,6.95,0,0,0,343.949,325Z" />
                                                                    <path
                                                                        d="M344,389h33a7,7,0,0,0,7-7V349a7,7,0,0,0-7-7H344a7,7,0,0,0-7,7v33A7,7,0,0,0,344,389Zm7-33h19v19H351Z" />
                                                                    <path
                                                                        d="M351.277,439H351V420h18.929a7.037,7.037,0,0,0,14.071.014v-6.745A7.3,7.3,0,0,0,376.924,406H343.949A7.191,7.191,0,0,0,337,413.269v32.975A6.752,6.752,0,0,0,343.949,453h7.328a7,7,0,1,0,0-14Z" />
                                                                    <path
                                                                        d="M393.041,286.592l-20.5,20.5-6.236-6.237a7,7,0,1,0-9.9,9.9l11.187,11.186a7,7,0,0,0,9.9,0l25.452-25.452a7,7,0,0,0-9.9-9.9Z" />
                                                                    <path
                                                                        d="M393.041,415.841l-20.5,20.5-6.236-6.237a7,7,0,1,0-9.9,9.9l11.187,11.186a7,7,0,0,0,9.9,0l25.452-25.452a7,7,0,0,0-9.9-9.9Z" />
                                                                    <path
                                                                        d="M464.857,295H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" />
                                                                    <path
                                                                        d="M464.857,359H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" />
                                                                    <path
                                                                        d="M464.857,423H420.891a7,7,0,0,0,0,14h43.966a7,7,0,0,0,0-14Z" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <a href="{{ route('customer.donhang') }}">
                                                            <h4 class="profile__main-info-title">Đơn hàng</h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="profile__main-info-item">
                                                        <div class="profile__main-info-icon">
                                                            <span>
                                                                <span class="profile-icon-count profile-wishlist">
                                                                    @if (Auth::user())
                                                                        {{ Auth::user()->sanPhamYeuThichs()->count() }}
                                                                    @endif
                                                                </span>
                                                                <svg viewBox="0 0 480 480"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="m348 0c-43 .0664062-83.28125 21.039062-108 56.222656-24.71875-35.183594-65-56.1562498-108-56.222656-70.320312 0-132 65.425781-132 140 0 72.679688 41.039062 147.535156 118.6875 216.480469 35.976562 31.882812 75.441406 59.597656 117.640625 82.625 2.304687 1.1875 5.039063 1.1875 7.34375 0 42.183594-23.027344 81.636719-50.746094 117.601563-82.625 77.6875-68.945313 118.726562-143.800781 118.726562-216.480469 0-74.574219-61.679688-140-132-140zm-108 422.902344c-29.382812-16.214844-224-129.496094-224-282.902344 0-66.054688 54.199219-124 116-124 41.867188.074219 80.460938 22.660156 101.03125 59.128906 1.539062 2.351563 4.160156 3.765625 6.96875 3.765625s5.429688-1.414062 6.96875-3.765625c20.570312-36.46875 59.164062-59.054687 101.03125-59.128906 61.800781 0 116 57.945312 116 124 0 153.40625-194.617188 266.6875-224 282.902344zm0 0" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <h4 class="profile__main-info-title">Yêu thích</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-information" role="tabpanel"
                                    aria-labelledby="nav-information-tab">
                                    <div class="profile__info">
                                        <h3 class="profile__info-title">Thông tin cá nhân</h3>
                                        <div class="profile__info-content">
                                            <form action="{{ route('customer.update.profileUser', $profile->id) }}"
                                                enctype="multipart/form-data" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input type="text" placeholder="Enter your username"
                                                                    value="{{ old('ten', $profile->ten) }}"
                                                                    name="ten">
                                                                @error('ten')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                                <span>
                                                                    <svg width="17" height="19"
                                                                        viewBox="0 0 17 19" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M15.5 17.6C15.5 14.504 12.3626 12 8.5 12C4.63737 12 1.5 14.504 1.5 17.6"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input type="email" placeholder="Enter your email"
                                                                    name="email"
                                                                    value="{{ old('email', $profile->email) }}">
                                                                @error('email')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                                <span>
                                                                    <svg width="18" height="16"
                                                                        viewBox="0 0 18 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M13 5.3999L10.496 7.3999C9.672 8.0559 8.32 8.0559 7.496 7.3999L5 5.3999"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input type="text" placeholder="Nhập số điện thoại"
                                                                    name="so_dien_thoai"
                                                                    value="{{ old('so_dien_thoai', $profile->so_dien_thoai) }}">
                                                                @error('so_dien_thoai')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                                <span>
                                                                    <svg width="15" height="18"
                                                                        viewBox="0 0 15 18" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M13.9148 5V13C13.9148 16.2 13.1076 17 9.87892 17H5.03587C1.80717 17 1 16.2 1 13V5C1 1.8 1.80717 1 5.03587 1H9.87892C13.1076 1 13.9148 1.8 13.9148 5Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path opacity="0.4" d="M9.08026 3.80054H5.85156"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path opacity="0.4"
                                                                            d="M7.45425 14.6795C8.14522 14.6795 8.70537 14.1243 8.70537 13.4395C8.70537 12.7546 8.14522 12.1995 7.45425 12.1995C6.76327 12.1995 6.20312 12.7546 6.20312 13.4395C6.20312 14.1243 6.76327 14.6795 7.45425 14.6795Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input type="date" placeholder="Nhập ngày sinh"
                                                                    name="ngay_sinh"
                                                                    value="{{ old('ngay_sinh', $profile->ngay_sinh) }}">
                                                                @error('ngay_sinh')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                                <span><i class="fa-solid fa-calendar-days"
                                                                        style="color: #000000;"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-md-6">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input type="file" name="anh_dai_dien"
                                                                    id="anh_dai_dien">
                                                                <span>
                                                                    <i class="fa-regular fa-image"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="profile__input-box">
                                                            <div class="profile__input">
                                                                <input type="text" placeholder="Nhập địa chỉ"
                                                                    name="dia_chi"
                                                                    value="{{ old('dia_chi', $profile->dia_chi) }}">
                                                                @error('dia_chi')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                                <span>
                                                                    <svg width="16" height="18"
                                                                        viewBox="0 0 16 18" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M7.99377 10.1461C9.39262 10.1461 10.5266 9.0283 10.5266 7.64946C10.5266 6.27061 9.39262 5.15283 7.99377 5.15283C6.59493 5.15283 5.46094 6.27061 5.46094 7.64946C5.46094 9.0283 6.59493 10.1461 7.99377 10.1461Z"
                                                                            stroke="currentColor" stroke-width="1.5" />
                                                                        <path
                                                                            d="M1.19707 6.1933C2.79633 -0.736432 13.2118 -0.72843 14.803 6.2013C15.7365 10.2663 13.1712 13.7072 10.9225 15.8357C9.29079 17.3881 6.70924 17.3881 5.06939 15.8357C2.8288 13.7072 0.263493 10.2583 1.19707 6.1933Z"
                                                                            stroke="currentColor" stroke-width="1.5" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="profile__btn">
                                                            <button type="submit" class="tp-btn">Cập nhật thông
                                                                tin</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-password" role="tabpanel"
                                    aria-labelledby="nav-password-tab">
                                    <div class="profile__password">
                                        <form action="{{ route('customer.changePassword') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-xxl-12">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-contact-input">
                                                            <input name="mat_khau_cu" class="@error('mat_khau_cu') is-invalid
                                                            @enderror" id="old_pass" type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="mat_khau_moi">Mật khẩu cũ</label>
                                                        </div>
                                                        @error('mat_khau_cu')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="mat_khau_moi" id="new_pass" type="password"
                                                                class="@error('mat_khau_moi') is-invalid @enderror">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="mat_khau_moi">Mật khẩu mới</label>
                                                        </div>
                                                        @error('mat_khau_moi')
                                                            <p class="alert alert-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="tp-profile-input-box">
                                                        <div class="tp-profile-input">
                                                            <input name="mat_khau_moi_confirmation" id="con_new_pass"
                                                                type="password">
                                                        </div>
                                                        <div class="tp-profile-input-title">
                                                            <label for="con_new_pass">Xác nhận mật khẩu mới</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div class="profile__btn">
                                                        <button type="submit" class="tp-btn">Cập nhật</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-lienhe" role="tabpanel"
                                    aria-labelledby="nav-lienhe-tab">
                                    <div class="profile__feedback">
                                        <h3 class="profile__info-title">Hòm thư phản hồi</h3>
                                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                            <table class="table table-striped table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Tên người gửi</th>
                                                        <th>Nội dung liên hệ</th>
                                                        <th>Ngày gửi</th>
                                                        <th>Trạng thái</th>
                                                        <th>Phản hồi</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($lienhes as $lienhe)
                                                        <tr>
                                                            <td>{{ $lienhe->ten_nguoi_gui }}</td>
                                                            <td>{{ Str::limit($lienhe->tin_nhan, 50) }}</td>
                                                            <td>{{ $lienhe->created_at->format('d/m/Y H:i') }}</td>
                                                            <td>
                                                                @if ($lienhe->trang_thai_phan_hoi == 'pending')
                                                                    <span class="badge bg-warning">Đang chờ xử lý</span>
                                                                @elseif ($lienhe->trang_thai_phan_hoi == 'resolved')
                                                                    <span class="badge bg-success">Đã xử lý</span>
                                                                @else
                                                                    <span class="badge bg-secondary">Chưa xử lý</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($lienhe->adminPhanHoi->count() > 0)
                                                                    {{ Str::limit($lienhe->adminPhanHoi->first()->reply, 50) }}
                                                                @else
                                                                    Chưa có phản hồi
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                                    data-bs-target="#feedbackModal{{ $lienhe->id }}">Xem chi tiết</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Modal for each feedback -->
                                        @foreach ($lienhes as $lienhe)
                                            <div class="modal fade" id="feedbackModal{{ $lienhe->id }}"
                                                tabindex="-1" aria-labelledby="feedbackModalLabel{{ $lienhe->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="feedbackModalLabel{{ $lienhe->id }}">Chi tiết phản hồi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Tên người gửi:</strong> {{ $lienhe->ten_nguoi_gui }}</p>
                                                            <p><strong>Nội dung liên hệ:</strong> {{ $lienhe->tin_nhan }}</p>
                                                            <p><strong>Ngày gửi:</strong> {{ $lienhe->created_at->format('d/m/Y H:i') }}</p>
                                                            <p><strong>Trạng thái:</strong>
                                                                @if ($lienhe->trang_thai_phan_hoi == 'pending')
                                                                    <span class="badge bg-warning">Đang chờ xử lý</span>
                                                                @elseif ($lienhe->trang_thai_phan_hoi == 'resolved')
                                                                    <span class="badge bg-success">Đã xử lý</span>
                                                                @else
                                                                    <span class="badge bg-secondary">Chưa xử lý</span>
                                                                @endif
                                                            </p>
                                                            <hr>
                                                            <h6><strong>Danh sách phản hồi:</strong></h6>
                                                            @if ($lienhe->adminPhanHoi->count() > 0)
                                                                <ul class="list-group">
                                                                    @foreach ($lienhe->adminPhanHoi as $phanHoi)
                                                                        <li class="list-group-item">
                                                                            <p><strong>Phản hồi:</strong> {{ $phanHoi->reply }}</p>
                                                                            <p><strong>Ngày phản hồi:</strong> {{ $phanHoi->created_at->format('d/m/Y H:i') }}</p>
                                                                            <p><strong>Admin:</strong> {{ $phanHoi->admin ? $phanHoi->admin->ten : 'Không xác định' }}</p>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <p>Chưa có phản hồi.</p>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- Mã khuyến mãi cá nhân -->
                                <div class="tab-pane fade" id="nav-discount" role="tabpanel" aria-labelledby="nav-discount-tab">
                                    <div class="profile__discount">
                                        <h3 class="profile__info-title">Mã khuyến mãi cá nhân</h3>
                                        <div class="mb-3">
                                            <button id="btn-active-discount" type="button" class="btn btn-primary btn-sm me-2 active">Còn hiệu lực</button>
                                            <button id="btn-expired-discount" type="button" class="btn btn-outline-secondary btn-sm">Hết hạn</button>
                                        </div>
                                        <!-- Danh sách mã khuyến mãi còn hiệu lực -->
                                        <div id="discount-active-list">
                                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                                <table class="table table-striped table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã khuyến mãi</th>
                                                            <th>Giảm (%)</th>
                                                            <th>Giảm tối đa</th>
                                                            <th>Ngày hết hạn</th>
                                                            <th>Trạng thái</th>
                                                            <th>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($maCaNhans->where('trang_thai', 1) as $maCaNhan)
                                                            <tr>
                                                                <td>
                                                                    <span class="badge bg-primary" style="font-size: 1em;">{{ $maCaNhan->ma_khuyen_mai }}</span>
                                                                </td>
                                                                <td>{{ $maCaNhan->phan_tram_khuyen_mai }}%</td>
                                                                <td>{{ number_format($maCaNhan->giam_toi_da, 0, ',', '.') }} VNĐ</td>
                                                                <td>{{ $maCaNhan->ngay_ket_thuc ? $maCaNhan->ngay_ket_thuc : "Không có thời hạn" }}</td>
                                                                <td>
                                                                    <span class="badge bg-success">Còn hiệu lực</span>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-sm btn-outline-primary copy-btn" data-code="{{ $maCaNhan->ma_khuyen_mai }}">
                                                                        <i class="fas fa-copy"></i> Copy
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6">Bạn chưa có mã khuyến mãi cá nhân nào còn hiệu lực.</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <!-- Danh sách mã khuyến mãi đã hết hạn -->
                                        <div id="discount-expired-list" style="display: none;">
                                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                                <table class="table table-striped table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã khuyến mãi</th>
                                                            <th>Giảm (%)</th>
                                                            <th>Giảm tối đa</th>
                                                            <th>Ngày hết hạn</th>
                                                            <th>Trạng thái</th>
                                                            <th>Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($maCaNhans->where('trang_thai', 0) as $maCaNhan)
                                                            <tr>
                                                                <td>
                                                                    <span class="badge bg-secondary" style="font-size: 1em;">{{ $maCaNhan->ma_khuyen_mai }}</span>
                                                                </td>
                                                                <td>{{ $maCaNhan->phan_tram_khuyen_mai }}%</td>
                                                                <td>{{ number_format($maCaNhan->giam_toi_da, 0, ',', '.') }} VNĐ</td>
                                                                <td>{{ $maCaNhan->ngay_ket_thuc ? $maCaNhan->ngay_ket_thuc : "Không có thời hạn" }}</td>
                                                                <td>
                                                                    <span class="badge bg-secondary">Hết hạn</span>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-sm btn-outline-primary copy-btn" data-code="{{ $maCaNhan->ma_khuyen_mai }}">
                                                                        <i class="fas fa-copy"></i> Copy
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6">Bạn chưa có mã khuyến mãi cá nhân nào hết hạn.</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Copy mã khuyến mãi
        const copyButtons = document.querySelectorAll(".copy-btn");
        copyButtons.forEach(button => {
            button.addEventListener("click", function () {
                const code = this.getAttribute("data-code");
                const tempInput = document.createElement("input");
                tempInput.value = code;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
                this.innerHTML = '<i class="fas fa-check"></i> Đã copy';
                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-success');
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-copy"></i> Copy';
                    this.classList.remove('btn-success');
                    this.classList.add('btn-outline-primary');
                }, 1000);
            });
        });

        // Tab chuyển đổi giữa còn hiệu lực và hết hạn
        const btnActive = document.getElementById('btn-active-discount');
        const btnExpired = document.getElementById('btn-expired-discount');
        const activeList = document.getElementById('discount-active-list');
        const expiredList = document.getElementById('discount-expired-list');

        btnActive.addEventListener('click', function () {
            btnActive.classList.add('btn-primary', 'active');
            btnActive.classList.remove('btn-outline-secondary');
            btnExpired.classList.remove('btn-primary', 'active');
            btnExpired.classList.add('btn-outline-secondary');
            activeList.style.display = '';
            expiredList.style.display = 'none';
        });
        btnExpired.addEventListener('click', function () {
            btnExpired.classList.add('btn-primary', 'active');
            btnExpired.classList.remove('btn-outline-secondary');
            btnActive.classList.remove('btn-primary', 'active');
            btnActive.classList.add('btn-outline-secondary');
            activeList.style.display = 'none';
            expiredList.style.display = '';
        });
    });
    </script>

@endsection