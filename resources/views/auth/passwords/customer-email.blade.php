@extends('layouts.client')

@section('content')
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Xin chào bạn !</h3>
                        {{-- <div class="breadcrumb__list">
                 <span><a href="#">Ho</a></span>
                 <span>My account</span>
               </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- login area start -->
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
        <div class="tp-login-shape">
            <img class="tp-login-shape-1" src="{{ asset('assets/client/img/login/login-shape-1.png') }}" alt="">
            <img class="tp-login-shape-2" src="{{ asset('assets/client/img/login/login-shape-2.png') }}" alt="">
            <img class="tp-login-shape-3" src="{{ asset('assets/client/img/login/login-shape-3.png') }}" alt="">
            <img class="tp-login-shape-4" src="{{ asset('assets/client/img/login/login-shape-4.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-login-wrapper">
                        <div class="tp-login-top text-center mb-30">
                            <h3 class="tp-login-title">Quên mật khẩu</h3>
                            <p>quay lại đăng nhập? <span><a href="{{ route('customer.login.post') }}"> Đăng nhập tài
                                        khoản</a></span></p>
                        </div>
                        <div class="tp-login-option">
                            <div class="tp-login-social mb-10 d-flex flex-wrap align-items-center justify-content-center">

                            </div>
                            <div class="tp-login-mail text-center mb-40">
                                <p>Quên mật khẩu <a href="#"></a></p>
                            </div>
                            <form action="{{ route('customer.password.email') }}" method="POST" class="my-4">
                                @csrf
                                <!-- Hiển thị lỗi xác thực -->
                                {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                   <ul>
                     @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                  @endforeach
                   </ul>
                  </div>
               @endif --}}
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif

                                <div class="tp-login-input-wrapper">
                                    <div class="tp-login-input-box">
                                        <div class="tp-login-input">
                                            <input id="email" class="form-control @error('email') is-invalid @enderror"
                                                type="text" name="email" placeholder="Nhập email của bạn"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="tp-login-input-title">
                                            <label for="email"> Email</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="tp-login-bottom">
                                    <button type="submit" class="tp-login-btn w-100">Quên mật khẩu</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
