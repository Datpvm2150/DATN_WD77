<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\lien_hes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy thông tin người dùng đang đăng nhập
        $user = Auth::user();  // Lấy người dùng hiện tại
        $danhMucs = DanhMuc::all();
        // Lấy thông trạng thái mặc định "chờ xác nhận"
        $donHangs = $user->hoaDons()->where('trang_thai', 1)->get();
        // Lấy thuộc tính
        $trang_thai_don_hang = HoaDon::TRANG_THAI;

        return view('clients.taikhoan.donhang', compact('danhMucs', 'donHangs', 'trang_thai_don_hang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Lấy hóa đơn theo ID
        $hoaDon = HoaDon::query()->findOrFail($id);

        // Lấy thông tin chi tiết sản phẩm theo hóa đơn cùng với biến thể sản phẩm và sản phẩm
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();
        // Các thuộc tính khác của hóa đơn
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        return view('clients.taikhoan.chitietdonhang', compact('trangThaiThanhToan', 'hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dia_chi' => 'nullable|string',
        ]);

        $users = Auth::user();
        $users->ten = $request->get('ten');
        $users->email = $request->get('email');
        $users->so_dien_thoai = $request->get('so_dien_thoai');
        $users->dia_chi = $request->get('dia_chi');
        // Xử lý upload ảnh đại diện mới (nếu có)
        if ($request->hasFile('anh_dai_dien')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($users->anh_dai_dien) {
                Storage::disk('public')->delete($users->anh_dai_dien);
            }

            // Lưu ảnh mới
            $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
            $users->anh_dai_dien = $filePath;
        }

        $users->save();

        return redirect()->route('customer.profileUser')->with('success', 'Cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profileUser()
    {
        // Lấy thông tin người dùng đăng nhập
        $profile = Auth::user();
        $lienhes = lien_hes::where('user_id', Auth::id())->with('adminPhanHoi.admin')->get();  // Lấy tất cả các bản ghi lien_hes cho người dùng này
        $danhMucs = DanhMuc::all();
        // Lấy danh sách đơn hàng
        $donHangs = $profile->hoaDons()->orderByDesc('id')->paginate(10);
        // Lấy các mã khuyến mãi cá nhân của user
        $maCaNhans = \App\Models\KhuyenMai::where('user_id', $profile->id)
            ->orderByDesc('trang_thai') // Đẩy trạng thái đang hoạt động lên đầu
            ->orderBy('ngay_ket_thuc', 'asc') // Ưu tiên mã sắp hết hạn
            ->get();  // Lấy tất cả các mã khuyến mãi cá nhân của người dùng này
        // Lấy lịch sử đổi điểm lấy mã khuyến mại của user
        $lichSuDoiDiem = $profile->lichSuDoiDiem()
            ->orderByDesc('created_at')
            ->get();
        // Trả về view
        return view('clients.taikhoan.profile', compact('donHangs', 'danhMucs', 'profile', 'lienhes', 'maCaNhans', 'lichSuDoiDiem'));
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Xác thực mật khẩu cũ, mật khẩu mới và xác nhận mật khẩu mới
        $request->validate([
            'mat_khau_cu' => 'required', // Bắt buộc phải nhập mật khẩu cũ
            'mat_khau_moi' => 'required|min:8|confirmed' // Mật khẩu mới phải ít nhất 8 ký tự và khớp với xác nhận mật khẩu
        ]);

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->input('mat_khau_cu'), $user->mat_khau)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng.');
        }

        // Cập nhật mật khẩu mới
        $user->mat_khau = Hash::make($request->input('mat_khau_moi'));
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function cancelOrder($id, Request $request)
    {
        // Tìm hóa đơn
        $orders = HoaDon::findOrFail($id);

        if (!$orders) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại!');
        }

        // Kiểm tra trạng thái đơn hàng
        if (in_array($orders->trang_thai, [2, 3, 4, 5])) {
            return redirect()->back()->with('error', 'Không thể hủy đơn hàng ở trạng thái này!');
        }

        // Lấy danh sách chi tiết hóa đơn
        $chiTietHoaDons = ChiTietHoaDon::where('hoa_don_id', $orders->id)->get();

        // Cập nhật số lượng tồn kho
        foreach ($chiTietHoaDons as $chiTiet) {
            $bienThe = $chiTiet->bienTheSanPham;
            if ($bienThe) {
                $bienThe->so_luong += $chiTiet->so_luong; // Cộng lại số lượng vào kho
                $bienThe->save();
            }
        }

        // Cập nhật trạng thái đơn hàng
        $orders->trang_thai = 6; // Trạng thái "Đã hủy"

        if ($orders->save()) {
            return redirect()->back()->with('success', 'Đã hủy đơn hàng thành công!');
        } else {
            return redirect()->back()->with('error', 'Đã có lỗi khi hủy!');
        }
    }

    public function getOrder($id, Request $request)
    {
        // Tìm đơn hàng theo ID
        $orders = HoaDon::findOrFail($id);

        // Kiểm tra trạng thái đơn hàng có phải là 5 (Đã giao) không
        if ($orders->trang_thai != 5) {
            return redirect()->back()->with('error', 'Chỉ có thể xác nhận nhận hàng khi đơn hàng ở trạng thái "Đã giao".');
        }

        // Cập nhật trạng thái đơn hàng sang 7 (Đã nhận hàng)
        $orders->trang_thai = 7;
        $orders->trang_thai_thanh_toan = 'Đã thanh toán';

        // Lưu lại trạng thái đơn hàng
        if ($orders->save()) {
            return redirect()->back()->with('success', 'Đã nhận được hàng. Cảm ơn bạn!');
        } else {
            return redirect()->back()->with('error', 'Đã có lỗi khi xác nhận nhận hàng!');
        }
    }

    public function filterOrders(Request $request)
    {
        $status = $request->get('status');

        // Lấy ID người dùng đang đăng nhập
        $userId = auth()->id();

        // Lấy danh sách đơn hàng theo trạng thái và người dùng
        $donHangs = HoaDon::where('user_id', $userId);

        // Gộp trạng thái theo yêu cầu
        if ($status == 1) {
            $donHangs = $donHangs->where('trang_thai', 1); // Chờ xác nhận
        } elseif ($status == 2) {
            $donHangs = $donHangs->where('trang_thai', 2); // Đã xác nhận
        } elseif($status == 3) {
            $donHangs = $donHangs->where('trang_thai', 3); // Đang chuẩn bị
        } elseif ($status == 4) {
            $donHangs = $donHangs->where('trang_thai', 4); // Đang giao
        } elseif ($status == 5) {
            $donHangs = $donHangs->whereIn('trang_thai', [5]); // Đã giao
        } elseif ($status == 6) {
            $donHangs = $donHangs->where('trang_thai', 6); // Đã hủy
        } elseif ($status == 7) {
            $donHangs = $donHangs->where('trang_thai', 7); // Đã nhận hàng
        } 

        $donHangs = $donHangs->get();

        // Đếm số lượng theo từng trạng thái
        $counts = [
            1 => HoaDon::where('user_id', $userId)->where('trang_thai', 1)->count(), // Chờ xác nhận
            2 => HoaDon::where('user_id', $userId)->where('trang_thai', 2)->count(), // Đã xác nhận
            3 => HoaDon::where('user_id', $userId)->where('trang_thai', 3)->count(), // Đang chuẩn bị
            4 => HoaDon::where('user_id', $userId)->where('trang_thai', 4)->count(), // Đang giao
            5 => HoaDon::where('user_id', $userId)->where('trang_thai', 5)->count(), // Đã giao
            6 => HoaDon::where('user_id', $userId)->where('trang_thai', 6)->count(), // Đã hủy
            7 => HoaDon::where('user_id', $userId)->where('trang_thai', 7)->count(), // Đã nhận hàng
        ];

        // Trả về view partial cho AJAX
        return response()->json([
            'html' => view('clients.taikhoan.list', compact('donHangs'))->render(),
            'counts' => $counts,
        ]);
    }

    /**
     * Store a new order (Example method for creating order)
     */
    public function storeOrder(Request $request)
    {
        $request->validate([
            'ten_nguoi_nhan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'so_dien_thoai' => 'required|string|max:20',
            'dia_chi_nhan_hang' => 'required|string',
            'phuong_thuc_thanh_toan' => 'required|in:online,offline',
            'items' => 'required|array',
            'items.*.bien_the_san_pham_id' => 'required|exists:bien_the_san_phams,id',
            'items.*.so_luong' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $tongTien = 0;
        $tienShip = 50000; // Giả định tiền ship cố định
        $giamGia = $request->input('giam_gia', 0);

        // Tạo hóa đơn
        $hoaDon = HoaDon::create([
            'user_id' => $user->id,
            'ma_hoa_don' => 'HD' . time(),
            'ten_nguoi_nhan' => $request->input('ten_nguoi_nhan'),
            'email' => $request->input('email'),
            'so_dien_thoai' => $request->input('so_dien_thoai'),
            'dia_chi_nhan_hang' => $request->input('dia_chi_nhan_hang'),
            'ngay_dat_hang' => now(),
            'ghi_chu' => $request->input('ghi_chu'),
            'phuong_thuc_thanh_toan' => $request->input('phuong_thuc_thanh_toan'),
            'trang_thai' => 1, // Chờ xác nhận
            'giam_gia' => $giamGia,
            'tong_tien' => 0, // Sẽ cập nhật sau
        ]);

        // Tạo chi tiết hóa đơn
        foreach ($request->input('items') as $item) {
            $bienTheSanPham = \App\Models\BienTheSanPham::with(['sanPham', 'dungLuong', 'mauSac'])->findOrFail($item['bien_the_san_pham_id']);
            $thanhTien = $bienTheSanPham->gia * $item['so_luong'];
            $tongTien += $thanhTien;

            ChiTietHoaDon::create([
                'hoa_don_id' => $hoaDon->id,
                'bien_the_san_pham_id' => $bienTheSanPham->id,
                'ten_san_pham' => $bienTheSanPham->sanPham->ten_san_pham,
                'ten_dung_luong' => $bienTheSanPham->dungLuong ? $bienTheSanPham->dungLuong->ten_dung_luong : null,
                'ten_mau_sac' => $bienTheSanPham->mauSac ? $bienTheSanPham->mauSac->ten_mau_sac : null,
                'so_luong' => $item['so_luong'],
                'don_gia' => $bienTheSanPham->gia,
                'thanh_tien' => $thanhTien,
            ]);

            // Cập nhật số lượng tồn kho
            $bienTheSanPham->so_luong -= $item['so_luong'];
            $bienTheSanPham->save();
        }

        // Cập nhật tổng tiền cho hóa đơn
        $hoaDon->tong_tien = $tongTien + $tienShip - $giamGia;
        $hoaDon->save();

        return redirect()->route('customer.profileUser')->with('success', 'Đặt hàng thành công!');
    }
}