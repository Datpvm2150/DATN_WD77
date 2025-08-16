@extends('layouts.client')

@section('content')
   <!-- breadcrumb area start -->
   <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
      <div class="container">
        <div class="row">
          <div class="col-xxl-12">
            <div class="breadcrumb__content p-relative z-index-1">
               <h3 class="breadcrumb__title">Giữ liên lạc với chúng tôi</h3>
               <div class="breadcrumb__list">
                 <span><a href="#">Trang chủ</a></span>
                 <span>Liên hệ</span>
               </div>
            </div>
          </div>
        </div>
      </div>
   </section>
   <!-- breadcrumb area end -->


   <!-- contact area start -->


   <section class="tp-contact-area pb-100">
      <div class="container">
        <div class="tp-contact-inner">
          <div class="row">
            <div class="col-xl-9 col-lg-8">
               <div class="tp-contact-wrapper">
                 <h3 class="tp-contact-title">Thông tin và tin nhắn liên hệ</h3>

                 <div class="tp-contact-form">
                   @if(auth()->check())

                  <form id="contact-form" action="{{ route('lienhe.store') }}" method="POST">
                   @csrf
                   <div class="tp-contact-input-wrapper">
                     <div class="tp-contact-input-box">
                       <div class="tp-contact-input">
                        <input name="ten_nguoi_gui" id="ten_nguoi_gui" type="text" placeholder="Tên của bạn"
                          required>
                       </div>
                       <div class="tp-contact-input-title">
                        <label for="ten_nguoi_gui">Tên của bạn</label>
                       </div>

                     </div>

                     <div class="tp-contact-input-box">
                       <div class="tp-contact-input">
                        <textarea id="tin_nhan" name="tin_nhan" placeholder="Viết tin nhắn của bạn..."
                          required></textarea>
                       </div>
                       <div class="tp-contact-input-title">
                        <label for="tin_nhan">Tin nhắn của bạn</label>
                       </div>

                     </div>
                   </div>
                   <div class="tp-contact-btn">
                     <button type="submit">Gửi tin nhắn</button>
                   </div>
                  </form>




               @else
                  <p class="fs-5">Bạn cần <a class="text-decoration-underline text-danger"
                     href="{{ route('customer.login') }}">đăng nhập</a> để gửi form!</p>
               @endif
                 </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-4">
               <div class="tp-contact-info-wrapper">
                 <div class="tp-contact-info-item">
                   <div class="tp-contact-info-icon">
                     <span>
                        <img src="{{ asset('assets/client/img/contact/contact-icon-1.png') }}" alt="">
                     </span>
                   </div>
                   <div class="tp-contact-info-content">
                     <p data-info="mail">
                        <a href="mailto:your_email@example.com">izone@gmail.com</a>
                     </p>
                     <p data-info="phone">
                        <a href="tel:123-456-7890">+(402) 763 282 46</a>
                     </p>
                   </div>
                 </div>
                 {{-- <div class="tp-contact-info-item">
                   <div class="tp-contact-info-icon">
                     <span>
                        <img src="assets/img/contact/contact-icon-2.png" alt="">
                     </span>
                   </div>
                   <div class="tp-contact-info-content">
                     <p>
                        <a href="https://www.google.com/maps" target="_blank">
                          123 Đường ABC, Thành phố XYZ
                        </a>
                     </p>
                   </div>
                 </div> --}}
                 <div class="tp-contact-info-item">
                   <div class="tp-contact-info-icon">
                     <span>
                        <img src="{{ asset('assets/client/img/contact/contact-icon-3.png') }}" alt="">
                     </span>
                   </div>
                   <div class="tp-contact-info-content">
                     <div class="tp-contact-social-wrapper mt-5">
                        <h4 class="tp-contact-social-title">Kết nối trên mạng xã hội</h4>
                        <div class="tp-contact-social-icon">
                          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                          <a href="#"><i class="fa-brands fa-twitter"></i></a>
                          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
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




   <!-- contact area end -->

   <!-- map area start -->
   <section class="tp-map-area pb-120">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="tp-map-wrapper">
               <div class="tp-map-hotspot">
                 <span class="tp-hotspot tp-pulse-border">
                   <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <circle cx="6" cy="6" r="6" fill="#821F40" />
                   </svg>
                 </span>
               </div>
               <div class="tp-map-iframe">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.4043860776055!2d105.74435187508114!3d21.037963480613605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e1!3m2!1svi!2s!4v1754581546417!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            </div>
          </div>
        </div>
      </div>
   </section>
   <!-- map area end -->
@endsection

@section('js')
   <script>
      document.getElementById('contact-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngăn chặn gửi form bình thường

        // Vô hiệu hóa nút gửi
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Đang gửi...'; // Thay đổi văn bản nút

        var formData = new FormData(this); // Lấy dữ liệu từ form

        // Gửi yêu cầu Ajax tới server
        fetch('{{ route('lienhe.store') }}', {
          method: 'POST',
          body: formData,
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
               alert(data.success); // Hiển thị thông báo thành công
               this.reset(); // Xóa nội dung form
            } else if (data.error) {
               alert(data.error); // Hiển thị thông báo lỗi
            }
          })
          .catch(error => {
            alert('Có lỗi xảy ra, vui lòng thử lại sau.');
          })
          .finally(() => {
            // Kích hoạt lại nút sau khi xử lý xong
            submitButton.disabled = false;
            submitButton.textContent = 'Gửi tin nhắn';
          });
      });
   </script>
@endsection