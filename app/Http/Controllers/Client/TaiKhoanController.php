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
    public function index()
    {
        $user = Auth::user();
        $danhMucs = DanhMuc::all();
        // Lấy thông trạng thái mặc định "chờ xác nhận"
        $donHangs = $user->hoaDons()->where('trang_thai', 1)->orderBy('created_at', 'desc')->get();
        // Lấy thuộc tính
        $trang_thai_don_hang = HoaDon::TRANG_THAI;

        return view('clients.taikhoan.donhang', compact('danhMucs', 'donHangs', 'trang_thai_don_hang'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $hoaDon = HoaDon::query()->findOrFail($id);
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        return view('clients.taikhoan.chitietdonhang', compact('trangThaiThanhToan', 'hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan'));
    }

    public function edit(string $id)
    {
        $user = Auth::user();
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'so_dien_thoai' => ['required', 'regex:/^(0|\+84)\d{9}$/', 'max:10'],
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dia_chi' => 'nullable|string',
        ], [
            'ten.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ.',
            'so_dien_thoai.max' => 'Số điện thoại không được vượt quá 10 số.',
            'anh_dai_dien.image' => 'Ảnh đại diện phải là ảnh.',
            'anh_dai_dien.mimes' => 'Ảnh đại diện phải là ảnh.',
            'anh_dai_dien.max' => 'Ảnh đại diện không được vượt quá 2MB.',
        ]);

        $users = Auth::user();
        $users->ten = $request->get('ten');
        $users->email = $request->get('email');
        $users->so_dien_thoai = $request->get('so_dien_thoai');
        $users->dia_chi = $request->get('dia_chi');
        if ($request->hasFile('anh_dai_dien')) {
            if ($users->anh_dai_dien) {
                Storage::disk('public')->delete($users->anh_dai_dien);
            }
            $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
            $users->anh_dai_dien = $filePath;
        }
        $users->save();

        return redirect()->route('customer.profileUser')->with('success', 'Cập nhật thông tin thành công');
    }

    public function destroy(string $id)
    {
        //
    }

    public function profileUser()
    {
        $profile = Auth::user();
        $lienhes = lien_hes::where('user_id', Auth::id())->with('adminPhanHoi.admin')->get();
        $danhMucs = DanhMuc::all();
        $donHangs = $profile->hoaDons()->orderByDesc('id')->paginate(10);
        $maCaNhans = \App\Models\KhuyenMai::where('user_id', $profile->id)
            ->orderByDesc('trang_thai')
            ->orderBy('ngay_ket_thuc', 'asc')
            ->get();
        $lichSuDoiDiem = $profile->lichSuDoiDiem()->orderByDesc('created_at')->get();

        return view('clients.taikhoan.profile', compact('donHangs', 'danhMucs', 'profile', 'lienhes', 'maCaNhans', 'lichSuDoiDiem'));
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'mat_khau_cu' => 'required',
            'mat_khau_moi' => 'required|string|min:8|confirmed|different:mat_khau_cu'
        ], [
            'mat_khau_cu.required' => 'Mật khẩu cũ là bắt buộc.',
            'mat_khau_moi.required' => 'Mật khẩu mới là bắt buộc.',
            'mat_khau_moi.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'mat_khau_moi.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'mat_khau_moi.different' => 'Mật khẩu mới phải khác mật khẩu cũ.'
        ]);

        if (!Hash::check($request->input('mat_khau_cu'), $user->mat_khau)) {
            return back()->with('error', 'Mật khẩu cũ không đúng.');
        }

        $user->mat_khau = Hash::make($request->input('mat_khau_moi'));
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function cancelOrder($id, Request $request)
    {
        $orders = HoaDon::findOrFail($id);

        if ($orders->user_id !== Auth::id()) {
            return redirect()->route('customer.donhang')->with('error', 'Bạn không có quyền hủy đơn hàng này!');
        }

        if ($orders->trang_thai !== 1) {
            return redirect()->route('customer.donhang')->with('error', 'Chỉ có thể hủy đơn hàng ở trạng thái Chờ xác nhận!');
        }

        if ($orders->trang_thai_thanh_toan !== 'Chưa thanh toán') {
            return redirect()->route('customer.donhang')->with('error', 'Không thể hủy đơn hàng vì đơn hàng đã được thanh toán!');
        }

        $chiTietHoaDons = ChiTietHoaDon::where('hoa_don_id', $orders->id)->get();
        foreach ($chiTietHoaDons as $chiTiet) {
            $bienThe = $chiTiet->bienTheSanPham;
            if ($bienThe) {
                $bienThe->so_luong += $chiTiet->so_luong;
                $bienThe->save();
            }
        }

        $orders->trang_thai = 6;
        $orders->save();

        return redirect()->route('customer.donhang')->with('success', 'Đã hủy đơn hàng thành công!');
    }

    public function getOrder($id, Request $request)
    {
        $orders = HoaDon::findOrFail($id);

        if ($orders->trang_thai != 5) {
            return redirect()->back()->with('error', 'Chỉ có thể xác nhận nhận hàng khi đơn hàng ở trạng thái "Đã giao".');
        }

        $orders->trang_thai = 7;
        $orders->trang_thai_thanh_toan = 'Đã thanh toán';

        if ($orders->save()) {
            return redirect()->back()->with('success', 'Đã nhận được hàng. Cảm ơn bạn!');
        } else {
            return redirect()->back()->with('error', 'Đã có lỗi khi xác nhận nhận hàng!');
        }
    }

    public function filterOrders(Request $request)
    {
        $status = $request->get('status');
        $userId = auth()->id();
        $donHangs = HoaDon::where('user_id', $userId);

        if ($status == 1) {
            $donHangs = $donHangs->where('trang_thai', 1);
        } elseif ($status == 2) {
            $donHangs = $donHangs->where('trang_thai', 2);
        } elseif ($status == 3) {
            $donHangs = $donHangs->where('trang_thai', 3);
        } elseif ($status == 4) {
            $donHangs = $donHangs->where('trang_thai', 4);
        } elseif ($status == 5) {
            $donHangs = $donHangs->whereIn('trang_thai', [5]);
        } elseif ($status == 6) {
            $donHangs = $donHangs->where('trang_thai', 6);
        } elseif ($status == 7) {
            $donHangs = $donHangs->where('trang_thai', 7);
        }

        $donHangs = $donHangs->orderByDesc('id')->get();

        $counts = [
            1 => HoaDon::where('user_id', $userId)->where('trang_thai', 1)->count(),
            2 => HoaDon::where('user_id', $userId)->where('trang_thai', 2)->count(),
            3 => HoaDon::where('user_id', $userId)->where('trang_thai', 3)->count(),
            4 => HoaDon::where('user_id', $userId)->where('trang_thai', 4)->count(),
            5 => HoaDon::where('user_id', $userId)->where('trang_thai', 5)->count(),
            6 => HoaDon::where('user_id', $userId)->where('trang_thai', 6)->count(),
            7 => HoaDon::where('user_id', $userId)->where('trang_thai', 7)->count(),
        ];

        return response()->json([
            'html' => view('clients.taikhoan.list', compact('donHangs'))->render(),
            'counts' => $counts,
        ]);
    }

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
        $tienShip = 50000;
        $giamGia = $request->input('giam_gia', 0);

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
            'trang_thai' => 1,
            'giam_gia' => $giamGia,
            'tong_tien' => 0,
        ]);

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

            $bienTheSanPham->so_luong -= $item['so_luong'];
            $bienTheSanPham->save();
        }

        $hoaDon->tong_tien = $tongTien + $tienShip - $giamGia;
        $hoaDon->save();

        return redirect()->route('customer.profileUser')->with('success', 'Đặt hàng thành công!');
    }
}