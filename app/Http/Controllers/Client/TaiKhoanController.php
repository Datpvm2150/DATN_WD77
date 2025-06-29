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
    public function index() {
        // Lấy thông tin người đăng nhập
        $user = Auth::user(); // Lấy người dùng hiện tại

        // Lấy danh mục
        $danhMucs = DanhMuc::get();
        // Lấy thông tin hóa đơn của người đăng nhập
        $donHangs = $user->hoaDons()->get();
        // dd($donHangs);
        // Lấy trạng trạng thái hóa đơn
        $trang_thai_don_hang = HoaDon::TRANG_THAI;
        return view('clients.taikhoan.donhang',compact('danhMucs','donHangs','trang_thai_don_hang'));
    }

    public function show(string $id) {
        $hoaDon = HoaDon::findOrFail($id);

        // Lấy thông tin chi tiết sản phẩm theo hóa đơn cùng với biến thể sản phẩm và sản phẩm
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();
        $danhMucs = DanhMuc::all();
        // Lấy các thuộc tính của hóa đơn
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        return view('clients.taikhoan.chitietdonhang', compact('trangThaiThanhToan','hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan', 'danhMucs'));

    }

    public function cancelOrder($id, Request $request) {
        $orders = HoaDon::findOrFail($id);

        if(!$orders) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại');
        }

        // Lấy chi tiết hóa đơn theo hóa đơn
        $chiTietHoaDons = ChiTietHoaDon::where('hoa_don_id', $orders->id)->get();

        // Cập nhật số lượng sản phẩm trong kho
        foreach($chiTietHoaDons as $chiTiet) {
            $bienThe = $chiTiet->bienTheSanPham;
            if($bienThe) {
                $bienThe->so_luong += $chiTiet->so_luong;
                $bienThe->save();
            }
        }

        // Cập nhật trạng thái đơn hàng
        $orders->trang_thai = 6; // hủy đơn

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
    public function filterOrders(Request $request) {
        $status = $request->get('status');

        // Lấy Id người dùng đăng nhập
        $userId = auth()->id();
        // Lấy đơn hàng theo người dùng
        $donHangs = HoaDon::where('user_id', $userId);

        // Gộp trạng thái
        if($status == 1) {
        $donHangs = $donHangs->where('trang_thai', 1); // Chờ xác nhận
        } elseif ($status == 2) {
        $donHangs = $donHangs->whereIn('trang_thai', [2, 3]); // Chờ lấy hàng
        } elseif ($status == 4) {
            $donHangs = $donHangs->whereIn('trang_thai', [4, 5]); // Đang giao
        }elseif ($status == 5) {
            $donHangs = $donHangs->where('trang_thai', 7); // Đã giao
        }elseif ($status == 6) {
            $donHangs = $donHangs->where('trang_thai', 6); // Đã hủy
        }

        $donHangs = $donHangs->get();

          // Đếm số lượng theo từng trạng thái
    $counts = [
        1 => HoaDon::where('user_id', $userId)->where('trang_thai', 1)->count(), // Chờ xác nhận
        2 => HoaDon::where('user_id', $userId)->whereIn('trang_thai', [2, 3])->count(), // Chờ lấy hàng
        4 => HoaDon::where('user_id', $userId)->whereIn('trang_thai', [4, 5])->count(), // Đang giao
        5 => HoaDon::where('user_id', $userId)->where('trang_thai', 7)->count(), // Đã giao
        6 => HoaDon::where('user_id', $userId)->where('trang_thai', 6)->count(), // Đã hủy
    ];

    // Trả về view partial cho AJAX
    return response()->json([
        'html' => view('clients.taikhoan.list', compact('donHangs'))->render(),
        'counts' => $counts,
    ]);
    }
    public function profileUser()
    {
        // lấy thông tin người dùng đăng đăng nhập
        $profile = Auth::user();
        $lienhes = lien_hes::where('user_id', $profile->id)->get();  // Lấy tất cả các bản ghi lien_hes cho người dùng này
        $danhMucs = DanhMuc::all();

        // Link
        return view('clients.taikhoan.profile', compact('danhMucs', 'profile', 'lienhes'));
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->input('mat_khau_cu'), $user->mat_khau)) {
            return redirect()->back()
                ->withErrors(['mat_khau_cu' => 'Mật Khẩu Cũ Không Đúng.'])
                ->withInput();
        }

        // Kiểm tra mật khẩu mới có trùng với mật khẩu cũ không
        if (Hash::check($request->input('mat_khau_moi'), $user->mat_khau)) {
            return redirect()->back()
                ->withErrors(['mat_khau_moi' => 'Bạn đang sử dụng mật khẩu này.'])
                ->withInput();
        }

        // Xác thực mật khẩu cũ, mật khẩu mới và xác nhận mật khẩu mới
        $request->validate(
            [
                'mat_khau_cu' => 'required', // Bắt buộc phải nhập mật khẩu cũ
                'mat_khau_moi' => 'required|min:8|confirmed', // Mật khẩu mới phải ít nhất 8 ký tự
                'mat_khau_moi_confirmation' => 'required', // Xác nhận mật khẩu mới phải được nhập và khớp với mật khẩu mới
            ],
            [
                'mat_khau_cu.required' => 'Mật khẩu cũ không được để trống.',
                'mat_khau_moi.required' => 'Mật khẩu mới không được để trống.',
                'mat_khau_moi.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
                'mat_khau_moi_confirmation.required' => 'Xác nhận mật khẩu mới không được để trống.',
                'mat_khau_moi.confirmed' => 'Mật khẩu mới và xác nhận mật khẩu mới không khớp.',
            ]
        );



        // Cập nhật mật khẩu mới
        $user->mat_khau = $request->input('mat_khau_moi');
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function edit($id)
    {
        // Lấy thông tin người dùng theo ID
        $user = Auth::user();
        if ($user->id != $id) {
            return redirect()->route('customer.profileUser')->with('error', 'Bạn không có quyền chỉnh sửa thông tin của người dùng khác.');
        }
    }

    public function update(Request $request, string $id)
    {
        //Validate dữ liệu từ form
        $request->validate(
            [
                'ten' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'so_dien_thoai' => 'nullable|string|max:20',
                'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'dia_chi' => 'nullable|string',
            ],
            [
                "ten.required" => "Tên không được để trống.",
                "email.required" => "Email không được để trống.",
                "email.email" => "Email không hợp lệ.",
                "email.unique" => "Email đã được sử dụng.",
                "so_dien_thoai.max" => "Số điện thoại không được vượt quá 20 ký tự.",
                "anh_dai_dien.image" => "Ảnh đại diện phải là một tệp hình ảnh.",
                "anh_dai_dien.mimes" => "Ảnh đại diện phải có định dạng jpeg, png, jpg, gif hoặc svg.",
                "anh_dai_dien.max" => "Ảnh đại diện không được vượt quá 2MB.",
                "dia_chi.string" => "Địa chỉ phải là một chuỗi ký tự.",
                "dia_chi.max" => "Địa chỉ không được vượt quá 255 ký tự."
            ]
        );

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
}

