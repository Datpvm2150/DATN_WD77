<?php

use App\Http\Controllers\Admin\ChatLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ChatBotController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\MauSacController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\BaiVietController;
use App\Http\Controllers\Admin\DungLuongController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\DanhGiaSanPhamController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\AdminLienHeController;
use App\Http\Controllers\Admin\NotificationController;

// Client Routes
use App\Http\Controllers\Client\TrangChuController;
use App\Http\Controllers\Client\LienHeController;
use App\Http\Controllers\Client\TrangSanPhamController;
use App\Http\Controllers\Client\ChiTietSanPhamController;
use App\Http\Controllers\Client\YeuThichController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\SanPhamDanhMucController;
use App\Http\Controllers\Client\TrangBaiVietController;
use App\Http\Controllers\Client\TaiKhoanController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\CustomerForgotPassword;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Client\DanhgiaController;
use App\Http\Controllers\Client\ThanhToanController;
use App\Http\Controllers\VNPayController;
use App\Http\Middleware\CheckDisscountMiddleware;

// Admin đăng ký đăng nhập
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [AdminForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [AdminForgotPasswordController::class, 'reset'])->name('password.update');
});

//Thông báo
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
});
// Nhật ký ChatBot
Route::prefix('chat-logs')->name('chatlogs.')->group(function () {
    Route::get('/', [ChatLogController::class, 'index'])->name('index');
});
Route::middleware('auth')->group(function () {
    Route::post('/chatbot/gpt', [ChatBotController::class, 'chatWithGpt'])->name('chatbot.gpt');
    Route::get('/chatbot/history/{session_id}', [ChatBotController::class, 'getChatHistory']);
});
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // San phẩm
    Route::prefix('sanphams')->name('sanphams.')->group(function () {
        Route::get('/', [SanPhamController::class, 'index'])->name('index');
        Route::get('create', [SanPhamController::class, 'create'])->name('create');
        Route::post('store', [SanPhamController::class, 'store'])->name('store');
        Route::get('/{id}/show', [SanPhamController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SanPhamController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [SanPhamController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/restore', [SanPhamController::class, 'restore'])->name('restore');
        Route::get('/sanpham/{id}/filterDanhGia/{star}', [SanPhamController::class, 'filterDanhGia'])->name('filterDanhGia');
        Route::post('/admin/sanpham/{sanpham}/danhgias', [SanPhamController::class, 'storeReview'])->name('admin.sanpham.danhgias');
        Route::post('/{id}/isHot', [SanPhamController::class, 'isHot'])->name('isHot');
    });

    // Banner
    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('create', [BannerController::class, 'create'])->name('create');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::get('/{vi_tri}', [BannerController::class, 'show'])->name('show');
        Route::get('/{vi_tri}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::put('/update', [BannerController::class, 'update'])->name('update');
        Route::post('/{id}/onOffBanner', [BannerController::class, 'onOffBanner'])->name('onOffBanner');
        Route::delete('/{id}', [BannerController::class, 'destroy'])->name('destroy');
    });

    // Bài viết
    Route::prefix('baiviets')->name('baiviets.')->group(function () {
        Route::get('/', [BaiVietController::class, 'index'])->name('index');
        Route::get('create', [BaiVietController::class, 'create'])->name('create');
        Route::post('store', [BaiVietController::class, 'store'])->name('store');
        Route::get('/{id}', [BaiVietController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [BaiVietController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BaiVietController::class, 'update'])->name('update');
        Route::post('/{id}/onOffBaiViet', [BaiVietController::class, 'onOffBaiViet'])->name('onOffBaiViet');
        Route::delete('/{id}/destroy', [BaiVietController::class, 'destroy'])->name('destroy');
    });

    // Danh mục
    Route::prefix('danhmucs')->name('danhmucs.')->group(function () {
        Route::get('/', [DanhMucController::class, 'index'])->name('index');
        Route::get('create', [DanhMucController::class, 'create'])->name('create');
        Route::post('store', [DanhMucController::class, 'store'])->name('store');
        Route::get('/{id}/show', [DanhMucController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [DanhMucController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [DanhMucController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
        Route::delete('/{id}/softDelete', [DanhMucController::class, 'softDelete'])->name('softDelete');
        Route::post('/{id}/restore', [DanhMucController::class, 'restore'])->name('restore');
    });

    // Dung lượng
    Route::prefix('dungluongs')->name('dungluongs.')->group(function () {
        Route::get('/', [DungLuongController::class, 'index'])->name('index');
        Route::get('create', [DungLuongController::class, 'create'])->name('create');
        Route::post('store', [DungLuongController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DungLuongController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [DungLuongController::class, 'update'])->name('update');
        Route::post('/{id}/onOffDungLuong', [DungLuongController::class, 'onOffDungLuong'])->name('onOffDungLuong');
        Route::delete('/{id}/destroy', [DungLuongController::class, 'destroy'])->name('destroy');
    });

    // Tag
    Route::prefix('tag')->name('tag.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('create', [TagController::class, 'create'])->name('create');
        Route::post('store', [TagController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TagController::class, 'update'])->name('update');
        Route::post('/{id}/onOffTag', [TagController::class, 'onOffTag'])->name('onOffTag');
        Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
    });

    // Màu sắc
    Route::prefix('mausacs')->name('mausacs.')->group(function () {
        Route::get('/', [MauSacController::class, 'index'])->name('index');
        Route::get('create', [MauSacController::class, 'create'])->name('create');
        Route::post('store', [MauSacController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MauSacController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [MauSacController::class, 'update'])->name('update');
        Route::post('/{id}/onOffMauSac', [MauSacController::class, 'onOffMauSac'])->name('onOffMauSac');
        Route::delete('/{id}/destroy', [MauSacController::class, 'destroy'])->name('destroy');
    });

    // Khuyến mãi
    Route::prefix('khuyen_mais')->name('khuyen_mais.')->group(function () {
        Route::get('/', [KhuyenMaiController::class, 'index'])->name('index');
        Route::get('create', [KhuyenMaiController::class, 'create'])->name('create');
        Route::get('/{id}/show', [KhuyenMaiController::class, 'show'])->name('show');
        Route::post('store', [KhuyenMaiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [KhuyenMaiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KhuyenMaiController::class, 'update'])->name('update');
        Route::get('/update-expired', [KhuyenMaiController::class, 'updateExpiredKhuyenMai'])->name('updateExpired');
        Route::post('/{id}/onOffKhuyenMai', [KhuyenMaiController::class, 'onOffKhuyenMai'])->name('onOffKhuyenMai');
        Route::delete('/{id}', [KhuyenMaiController::class, 'destroy'])->name('destroy');
        Route::get('/trash', [KhuyenMaiController::class, 'trash'])->name('trash');
        Route::post('/restore/{id}', [KhuyenMaiController::class, 'restore'])->name('restore');
        Route::delete('/force-delete/{id}', [KhuyenMaiController::class, 'forceDelete'])->name('forceDelete');
    });
    // Đánh giá
    Route::prefix('Danhgias')->name('Danhgias.')->group(function () {
        Route::get('/', [DanhGiaSanPhamController::class, 'index'])->name('index');
        Route::get('/danh-gia/{danhGiaId}', [DanhGiaSanPhamController::class, 'show'])->name('show');
        Route::post('/danh-gia/{danhGiaId}/tra-loi', [DanhGiaSanPhamController::class, 'traLoi'])->name('traLoi');
        Route::put('admin/danhgias/tra-loi/{id}', [DanhGiaSanPhamController::class, 'updateResponse'])->name('traLoi.update');
    });

    // Route hóa đơn
    Route::prefix('hoadons')->name('hoadons.')->group(function () {
        Route::get('/', [HoaDonController::class, 'index'])->name('index');
        Route::get('/{id}/show', [HoaDonController::class, 'show'])->name('show');
        Route::put('/{id}/update', [HoaDonController::class, 'update'])->name('update');
        //admin
        Route::post('/query', [VnpayController::class, 'queryTransaction'])->name('query');
        Route::post('/refund', [VnpayController::class, 'queryTransaction'])->name('refund');
        Route::get('/tracuu', [VnpayController::class, 'tracuu'])->name('tracuu');
        Route::get('/hoantien', [VnpayController::class, 'hoantien'])->name('hoantien');

        Route::delete('/{id}/destroy', [HoaDonController::class, 'destroy'])->name('destroy');
    });

    //Thống kê
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/doanhthu', [DashboardController::class, 'doanhthu'])->name('doanhthu');
    Route::get('/dashboard/filter', [DashboardController::class, 'filter'])->name('dashboard.filter');
    Route::get('/tk-sanpham-banchay', [DashboardController::class, 'sanPhamBanChay'])->name('thongke.sanpham.banchay');
    Route::get('/tk-sanpham-kho', [DashboardController::class, 'sanPhamBanKho'])->name('thongke.sanpham.kho');

    //Liên hệ
    Route::prefix('lienhes')->name('lienhes.')->group(function () {
        Route::get('/', [AdminLienHeController::class, 'index'])->name('index');
        Route::post('store', [AdminLienHeController::class, 'store'])->name('store');
        Route::post('/phanhoi/reply/send/{id}', [AdminLienHeController::class, 'sendReply'])->name('phanhoi.reply.send');
        Route::get('/form-phan-hoi/{id}', [AdminLienHeController::class, 'showReplyForm'])->name('form.reply');
        Route::get('/phan-hoi/cap-nhat/{id}/{trang_thai_phan_hoi}', [AdminLienHeController::class, 'capNhatTrangThai'])->name('phan_hoi.cap_nhat');
    });
});

//tai khoan admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/admins', [AdminController::class, 'index'])->name('admins');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{id}', [AdminController::class, 'show'])->name('admins.show');
    Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
});

//khachhang
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/khachhangs', [UserController::class, 'khachhangs'])->name('khachhangs'); // Display users list
    Route::get('/taikhoans/{id}', [UserController::class, 'show'])->name('taikhoans.show'); // Show user details
});
//profile
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/update/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::put('/profile/updatePassword', [UserController::class, 'updatePassword'])->name('profile.updatePassword');
});

// chuyển hướng nếu người dùng nhập route không tồn tại trong admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::fallback(function () {
        return redirect('admin');
    });
});

/////////////////////////////////////NGUOI DUNG TRANG WEB //////////////////////////////////////////
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('login', [CustomerLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CustomerLoginController::class, 'login'])->name('login.post');
    Route::get('register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [CustomerRegisterController::class, 'register'])->name('register.post');
    Route::post('logout', [CustomerLoginController::class, 'logout'])->name('logout');
    Route::get('profile', [TaiKhoanController::class, 'profileUser'])->name('profileUser');
    Route::put('/editProfile/{id}', [TaiKhoanController::class, 'update'])->name('update.profileUser');
    Route::get('/donhang', [TaiKhoanController::class, 'index'])->name('donhang');
    Route::put('changepassword', [TaiKhoanController::class, 'changePassword'])->name('changePassword');
    Route::match(['get', 'post'], '/{id}/chitietdonhang', [TaiKhoanController::class, 'show'])->name('donhang.chitiet');
    Route::post('/{id}/cancel', [TaiKhoanController::class, 'cancelOrder'])->name('cancelOrder'); // hủy đơn hàng
    Route::post('/{id}/getOrder', [TaiKhoanController::class, 'getOrder'])->name('getOrder');
    Route::get('orders/filter', [TaiKhoanController::class, 'filterOrders'])->name('customer.orders.filter');
    // quên mk customer
    Route::get('/show-form-forgot', [CustomerForgotPassword::class, 'ShowformForgotPasswword'])->name('forgotPassword');
    Route::post('/forgot-password', [CustomerForgotPassword::class, 'SendEmailForgot'])->name('password.email');
    Route::get('reset-password/{token}', [CustomerForgotPassword::class, 'formResetPassword'])->name('password.reset');
    Route::post('reset-pass', [CustomerForgotPassword::class, 'resetPassword'])->name('password.change');
});

// Bài viết
Route::get('/bai-viet', [TrangBaiVietController::class, 'index'])->name('bai-viet');
Route::get('/bai-viet/{id}', [TrangBaiVietController::class, 'show'])->name('chitietbaiviet');
Route::get('/baiviet/{danh_muc}', [TrangBaiVietController::class, 'filterByCategory'])->name('baiviet.danhmuc');

// Liên Hệ
Route::get('/lienhe', [LienHeController::class, 'index'])->name('lienhe');
Route::post('/lienhe', [LienHeController::class, 'store'])->name('lienhe.store');



// Client
// Trang chủ
Route::get('/', [TrangChuController::class, 'index'])->name('/');
Route::get('/trangchu', [TrangChuController::class, 'index'])->name('trangchu');
Route::get('/404', [TrangChuController::class, 'index'])->name('error404');
Route::get('/500', [TrangChuController::class, 'index'])->name('error500');

// giỏ hàng
Route::get('/Cart-Index', [CartController::class, 'index'])->name('cart.index');
Route::get('/Cart-List-Drop', [CartController::class, 'CartListDrop'])->name('cart.list.drop');
Route::get('/Cart-List', [CartController::class, 'CartList'])->name('cart.list');
Route::get('/Add-Cart/{id}', [CartController::class, 'AddCart'])->name('cart.add');
Route::get('/Delete-Item-Cart/{id}', [CartController::class, 'DeleteItemCart'])->name('cart.delete.item');
Route::get('/Delete-Item-List-Cart/{id}', [CartController::class, 'DeleteItemListCart'])->name('cart.delete.item.list');
Route::get('/Update-Item-Cart/{id}', [CartController::class, 'UpdateItemCart'])->name('cart.update.item');
Route::get('/Discount-Cart/{disscountCode}', [CartController::class, 'discount'])->name('cart.disscount');
Route::get('/DeleteDiscount', [CartController::class, 'DeleteDiscount'])->name('cart.DeleteDiscount');


//thanh toan
Route::get('/thanhtoan', [ThanhToanController::class, 'index'])->name('thanhtoan');
Route::post('/apply-discount', [ThanhToanController::class, 'applyDiscount'])->name('applyDiscount')->middleware(CheckDisscountMiddleware::class);;
Route::post('/place-order', [ThanhToanController::class, 'placeOrder'])->name('placeOrder')->middleware(CheckDisscountMiddleware::class);
Route::post('/clear-discount', [ThanhToanController::class, 'clearDiscount'])->name('clear.discount');
Route::get('/payment/callback', [ThanhToanController::class, 'callback'])->name('payment.callback');
Route::post('/payment/notify', [ThanhToanController::class, 'notify'])->name('payment.notify');
Route::post('/zalopay/callback', [ThanhToanController::class, 'handleZaloPayCallback'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/customer/orders/retry-payment/{id}', [ThanhToanController::class, 'retryPayment'])->name('customer.retryPayment');
Route::post('/remove-discount', [ThanhToanController::class, 'removeDiscount'])->name('removeDiscount');

Route::get('/san-pham', [TrangSanPhamController::class, 'index'])->name('san-pham');
Route::get('/danh-muc/{danh_muc_id}', [SanPhamDanhMucController::class, 'index'])->name('sanpham.danhmuc');

Route::get('/search', [TrangSanPhamController::class, 'search'])->name('search.sanpham');
//danhgia
// Route::post('/reviews', [DanhgiaController::class, 'storeReview'])->name('reviews.store');

// Chi tiết sản phẩm

Route::get('/chitietsanpham/{id}', [ChiTietSanPhamController::class, 'show'])->name('chitietsanpham');
Route::get('/sanphamtag/{id}', [TagController::class, 'sanphamtag'])->name('sanphamtag');
Route::get('/sanpham/lay-gia-bien-the', [ChiTietSanPhamController::class, 'layGiaBienThe'])->name('sanpham.lay_gia_bien_the');
Route::get('/get-so-luong-bien-the', [ChiTietSanPhamController::class, 'getSoLuongBienThe'])->name('sanpham.get_so_luong_bien_the');
Route::get('/sanpham/get-all-variants', [ChiTietSanPhamController::class, 'getAllVariants'])->name('sanpham.get_all_variants');
Route::post('/danh-gia/{danhGia}/reply', [ChiTietSanPhamController::class, 'reply'])->name('admin.danhgia.reply');
Route::put('/danh-gia/tra-loi/{traLoi}', [ChiTietSanPhamController::class, 'editReply'])->name('admin.danhgia.editReply');


Route::get('/vnpay/return', [VNPayController::class, 'handleReturn'])->name('vnpay.return');

//yeu thich
Route::get('/Add-To-Love/{id}', [YeuThichController::class, 'addToLove'])->name('love.add');
Route::get('/yeuthich', [YeuThichController::class, 'showYeuThich'])->name('yeuthich');
Route::get('/Delete-From-Love/{id}', [YeuThichController::class, 'deleteLove'])->name('love.delete');
Route::get('/Loved-List', [YeuThichController::class, 'lovedList'])->name('love.list');
