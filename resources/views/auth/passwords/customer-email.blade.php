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
                   {{-- <div class="tp-login-option-item has-google">
                     <a href="#">
                        <img src="{{ asset('assets/client/img/icon/login/google.svg') }}" alt="">
                        Sign in with google
                     </a>
                   </div>
                   <div class="tp-login-option-item">
                     <a href="#">
                        <img src="{{ asset('assets/client/img/icon/login/facebook.svg') }}" alt="">
                     </a>
                   </div>
                   <div class="tp-login-option-item">
                     <a href="#">
                        <img class="apple" src="{{ asset('assets/client/img/icon/login/apple.svg') }}" alt="">
                     </a>
                   </div> --}}
                 </div>
                 <div class="tp-login-mail text-center mb-40">
                   <p>Quên mật khẩu <a href="#"></a></p>
                 </div>
                 <form action="{{route('customer.password.email')}}" method="POST" class="my-4">
                   @csrf
                   <!-- Hiển thị lỗi xác thực -->
                   @if ($errors->any())
                  <div class="alert alert-danger">
                   <ul>
                     @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                  @endforeach
                   </ul>
                  </div>
               @endif
                   <div class="tp-login-input-wrapper">
                     <div class="tp-login-input-box">
                        <div class="tp-login-input">
                          <input id="email" class="form-control @error('email') is-invalid @enderror" type="email"
                            name="email" required placeholder="Nhập email của bạn" value="{{ old('email') }}">
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
                     {{-- <div class="tp-login-input-box">
                        <div class="tp-login-input">
                          <input id="tp_password @error('mat_khau') is-invalid @enderror" type="password"
                            name="mat_khau" placeholder="Nhập mật khẩu của bạn">
                          @error('mat_khau')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="tp-login-input-eye" id="password-show-toggle">
                          <span id="open-eye" class="open-eye">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                 d="M1 6.77778C1 6.77778 3.90909 1 9 1C14.0909 1 17 6.77778 17 6.77778C17 6.77778 14.0909 12.5556 9 12.5556C3.90909 12.5556 1 6.77778 1 6.77778Z"
                                 stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                 stroke-linejoin="round" />
                              <path
                                 d="M9.00018 8.94466C10.2052 8.94466 11.182 7.97461 11.182 6.77799C11.182 5.58138 10.2052 4.61133 9.00018 4.61133C7.79519 4.61133 6.81836 5.58138 6.81836 6.77799C6.81836 7.97461 7.79519 8.94466 9.00018 8.94466Z"
                                 stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                 stroke-linejoin="round" />
                            </svg>
                          </span>
                          <span id="close-eye" class="open-close">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                 d="M6.8822 11.7457C6.72311 11.7457 6.56402 11.6871 6.43842 11.5615C5.7518 10.8749 5.375 9.9622 5.375 8.99926C5.375 6.99803 6.99943 5.3736 9.00066 5.3736C9.9636 5.3736 10.8763 5.7504 11.5629 6.43701C11.6801 6.55424 11.7471 6.71333 11.7471 6.8808C11.7471 7.04827 11.6801 7.20736 11.5629 7.32459L7.32599 11.5615C7.20039 11.6871 7.0413 11.7457 6.8822 11.7457ZM9.00066 6.6296C7.69442 6.6296 6.631 7.69302 6.631 8.99926C6.631 9.41793 6.73986 9.81985 6.94082 10.1715L10.1729 6.93941C9.82125 6.73845 9.41933 6.6296 9.00066 6.6296Z"
                                 fill="#1C274C" />
                              <path opacity="0.5"
                                 d="M3.63816 14.4503C3.49582 14.4503 3.3451 14.4001 3.22787 14.2996C2.33192 13.5376 1.52808 12.5998 0.841463 11.5112C-0.0461127 10.1296 -0.0461127 7.87721 0.841463 6.48723C2.88456 3.28861 5.8571 1.44647 8.99711 1.44647C10.8393 1.44647 12.6563 2.08285 14.2472 3.28024C14.5235 3.48957 14.5821 3.88312 14.3728 4.15944C14.1635 4.43576 13.7699 4.49437 13.4936 4.28504C12.1204 3.24674 10.5629 2.70248 8.99711 2.70248C6.29252 2.70248 3.70515 4.32691 1.89651 7.16547C1.2685 8.14516 1.2685 9.85332 1.89651 10.833C2.52451 11.8127 3.24462 12.6584 4.04009 13.345C4.29966 13.5711 4.33315 13.9646 4.10707 14.2326C3.98984 14.3749 3.814 14.4503 3.63816 14.4503Z"
                                 fill="#1C274C" />
                              <path opacity="0.5"
                                 d="M9.00382 16.552C7.89017 16.552 6.80163 16.3259 5.75496 15.8821C5.43678 15.7482 5.28606 15.3797 5.42003 15.0616C5.554 14.7434 5.92243 14.5927 6.24062 14.7266C7.12819 15.1034 8.05764 15.296 8.99545 15.296C11.7 15.296 14.2874 13.6716 16.0961 10.833C16.7241 9.85333 16.7241 8.14517 16.0961 7.16548C15.8365 6.75519 15.5518 6.36164 15.2503 5.99321C15.0326 5.72527 15.0745 5.33172 15.3425 5.10564C15.6104 4.88793 16.0039 4.92142 16.23 5.19775C16.5566 5.59967 16.8748 6.03508 17.1595 6.48724C18.047 7.86885 18.047 10.1213 17.1595 11.5113C15.1164 14.7099 12.1438 16.552 9.00382 16.552Z"
                                 fill="#1C274C" />
                              <path
                                 d="M9.58061 12.5747C9.28754 12.5747 9.01959 12.3654 8.96098 12.0639C8.89399 11.7206 9.12007 11.3941 9.46338 11.3355C10.3845 11.168 11.1548 10.3976 11.3223 9.47657C11.3893 9.13327 11.7158 8.91556 12.0591 8.97417C12.4024 9.04116 12.6285 9.36772 12.5615 9.71103C12.2936 11.1596 11.1381 12.3068 9.69783 12.5747C9.65597 12.5663 9.62247 12.5747 9.58061 12.5747Z"
                                 fill="#1C274C" />
                              <path
                                 d="M0.625908 18.0007C0.466815 18.0007 0.307721 17.9421 0.18212 17.8165C-0.0607068 17.5736 -0.0607068 17.1717 0.18212 16.9289L6.43702 10.674C6.67984 10.4312 7.08177 10.4312 7.32459 10.674C7.56742 10.9168 7.56742 11.3188 7.32459 11.5616L1.0697 17.8165C0.944096 17.9421 0.785002 18.0007 0.625908 18.0007Z"
                                 fill="#1C274C" />
                              <path
                                 d="M11.122 7.50881C10.9629 7.50881 10.8038 7.45019 10.6782 7.32459C10.4354 7.08177 10.4354 6.67984 10.6782 6.43702L16.9331 0.182121C17.1759 -0.0607068 17.5779 -0.0607068 17.8207 0.182121C18.0635 0.424948 18.0635 0.826869 17.8207 1.0697L11.5658 7.32459C11.4402 7.45019 11.2811 7.50881 11.122 7.50881Z"
                                 fill="#1C274C" />
                            </svg>
                          </span>
                        </div>
                        <div class="tp-login-input-title">
                          <label for="tp_password">Mật khẩu</label>
                        </div>
                     </div> --}}
                   </div>
                   {{-- <div class="tp-login-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                     <div class="tp-login-remeber">
                        <input id="remeber" type="checkbox">
                        <label for="remeber">Nhớ tài khoản</label>
                     </div>
                     <div class="tp-login-forgot">
                        <a href="{{route('customer.forgotPassword')}}">Quên mật khẩu</a>
                     </div>
                   </div> --}}
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