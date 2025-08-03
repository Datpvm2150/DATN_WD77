<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use Carbon\Carbon;

class KhuyenMaiController extends Controller
{
    public function index(Request $request)
    {
        $query = KhuyenMai::query();
        if ($request->has('ngay_bat_dau') && $request->input('ngay_bat_dau')) {
            $query->where('ngay_bat_dau', '>=', $request->input('ngay_bat_dau'));
        }
        if ($request->has('ngay_ket_thuc') && $request->input('ngay_ket_thuc')) {
            $query->where('ngay_ket_thuc', '<=', $request->input('ngay_ket_thuc'));
        }

        $KhuyenMais = $query->get();
        $khuyenmais = KhuyenMai::with('user')->get();
        return view('admins.khuyen_mais.index', compact('KhuyenMais'));
    }

    public function show($id)
    {
        $khuyenMai = KhuyenMai::withTrashed()->find($id);

        if (!$khuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }

        return view('admins.khuyen_mais.show', compact('khuyenMai'));
    }

    public function create()
    {
        return view('admins.khuyen_mais.create');
    }

    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đâu vào
        $request->validate([
            'ma_khuyen_mai' => 'required|string|unique:khuyen_mais,ma_khuyen_mai', // Mã khuyến mãi là bắt buộc, phải là chuỗi, và duy nhất trong bảng khuyen_mais
            'phan_tram_khuyen_mai' => 'required|integer|min:1|max:99', // Phần trăm khuyến mãi từ 1 đến 99
            'giam_toi_da' => 'required|integer|min:0|max:1000000000',
            'loai_ma' => 'required|in:cong_khai,ma_doi_qua', // Loại mã khuyến mãi phải là một trong các giá trị hợp lệ
            'diem_can' => 'required|integer|min:1|max:1000000',
            'ngay_bat_dau' => 'required|date', // Ngày bắt đầu là bắt buộc và phải là kiểu ngày
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau', // Ngày kết thúc phải sau hoặc bằng ngày bắt đầu
        ], [
            'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
            'ma_khuyen_mai.unique' => 'Mã khuyến mãi đã tồn tại. Vui lòng nhập mã khác.',
            'loai_ma.required' => 'Loại mã không được để trống.',
            'loai_ma.in' => 'Loại mã không hợp lệ.',
            'diem_can.required' => 'Điểm cần không được để trống.',
            'diem_can.integer' => 'Điểm cần phải là số nguyên.',
            'diem_can.min' => 'Điểm cần phải lớn hơn 0.',
            'diem_can.max' => 'Điểm cần không vượt quá 1 triệu.',
            'phan_tram_khuyen_mai.required' => 'Phần trăm khuyến mãi không được để trống.',
            'phan_tram_khuyen_mai.integer' => 'Phần trăm khuyến mãi phải là một số nguyên.',
            'phan_tram_khuyen_mai.min' => 'Phần trăm khuyến mãi phải lớn hơn 0.',
            'phan_tram_khuyen_mai.max' => 'Phần trăm khuyến mãi phải nhỏ hơn 100.',
            'ngay_bat_dau.required' => 'Ngày bắt đầu không được để trống.',
            'giam_toi_da.required' => 'Giảm tối đa không được để trống.',
            'giam_toi_da.min' => 'Giảm tối đa phải là lớn hơn 0.',
            'giam_toi_da.max' => 'Giảm tối đa phải là nhỏ hơn 1 tỷ.',
            'giam_toi_da.integer' => 'Giảm tối đa phải là một số nguyên.',
            'ngay_ket_thuc.required' => 'Ngày kết thúc không được để trống.',
            'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu.',
        ]);

        $data = [
            'ma_khuyen_mai' => $request->ma_khuyen_mai,
            'loai_ma' => $request->loai_ma,
            'diem_can' => $request->loai_ma === 'ma_doi_qua' ? $request->diem_can : null,
            'phan_tram_khuyen_mai' => $request->phan_tram_khuyen_mai,
            'giam_toi_da' => $request->giam_toi_da,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'so_luong' => $request->so_luong,
            // 'da_su_dung'=>$request->da_su_dung,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'trang_thai' => 1,
        ];
        KhuyenMai::create($data);
        return redirect()->route('admin.khuyen_mais.index')->with('success', 'Khuyến mãi đã được tạo thành công.');
    }

    public function edit($id)
    {
        $KhuyenMai = KhuyenMai::find($id);

        if (!$KhuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }

        // Định dạng ngày giờ để hiển thị trong form
        $KhuyenMai->ngay_bat_dau = Carbon::parse($KhuyenMai->ngay_bat_dau)->format('Y-m-d H:i:s');
        $KhuyenMai->ngay_ket_thuc = Carbon::parse($KhuyenMai->ngay_ket_thuc)->format('Y-m-d H:i:s');

        return view('admins.khuyen_mais.update', compact('KhuyenMai'));
    }

    public function update(Request $request, $id)
    {
        $khuyenMai = KhuyenMai::find($id);
        if (!$khuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }

        // Check không cho sửa nếu mã đã là "ca_nhan"
        if ($khuyenMai->loai_ma === 'ca_nhan') {
            return redirect()->back()->with('error', 'Không thể chỉnh sửa mã khuyến mãi đã thuộc về cá nhân.');
        }

        // Kiểm tra nếu đang sửa sang "ca_nhan"
        if ($request->loai_ma === 'ca_nhan') {
            return redirect()->back()->with('error', 'Không thể chuyển mã khuyến mãi sang loại cá nhân.');
        }

        if ($request->loai_ma === 'ma_doi_qua' && $khuyenMai->loai_ma === 'cong_khai') {
            // Mã đã có user sử dụng thì không được chuyển
            $isUsed = DB::table('don_hangs') 
                        ->where('ma_khuyen_mai', $khuyenMai->ma_khuyen_mai)
                        ->exists();

            if ($isUsed) {
                return redirect()->back()->with('error', 'Không thể chuyển mã đã sử dụng sang "mã đổi quà".');
            }
        }

        // VALIDATE
        $request->validate([
            'ma_khuyen_mai' => 'required|string|unique:khuyen_mais,ma_khuyen_mai,' . $id,
            'loai_ma' => 'required|in:cong_khai,ma_doi_qua',
            'diem_can' => $request->loai_ma === 'ma_doi_qua' ? 'required|integer|min:0' : 'nullable',
            'phan_tram_khuyen_mai' => 'required|integer|min:1|max:99',
            'giam_toi_da' => 'required|nullable|integer|numeric|min:0|max:1000000000',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ], [
            'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
            'ma_khuyen_mai.unique' => 'Mã khuyến mãi đã tồn tại.',
            'loai_ma.required' => 'Loại mã không được để trống.',
            'loai_ma.in' => 'Loại mã không hợp lệ.',
            'diem_can.required' => 'Điểm đổi không được để trống khi là mã đổi quà.',
            'diem_can.integer' => 'Điểm đổi phải là số nguyên.',
            'diem_can.min' => 'Điểm đổi phải >= 0.',
            'phan_tram_khuyen_mai.required' => 'Phần trăm khuyến mãi không được để trống.',
            'phan_tram_khuyen_mai.integer' => 'Phần trăm phải là số nguyên.',
            'phan_tram_khuyen_mai.min' => 'Phần trăm phải > 0.',
            'phan_tram_khuyen_mai.max' => 'Phần trăm phải < 100.',
            'giam_toi_da.required' => 'Giảm tối đa không được để trống.',
            'giam_toi_da.integer' => 'Giảm tối đa phải là số nguyên.',
            'giam_toi_da.numeric' => 'Giảm tối đa phải là số.',
            'giam_toi_da.min' => 'Giảm tối đa phải >= 0.',
            'giam_toi_da.max' => 'Giảm tối đa phải nhỏ hơn 1 tỷ.',
            'ngay_bat_dau.required' => 'Ngày bắt đầu không được để trống.',
            'ngay_ket_thuc.required' => 'Ngày kết thúc không được để trống.',
            'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải >= ngày bắt đầu.',
        ]);

        // Logic cập nhật tùy theo loại mã
        $diemCan = null;
        if ($request->loai_ma === 'ma_doi_qua') {
            $diemCan = $request->diem_can;
        }

        // Cập nhật dữ liệu
        $khuyenMai->update([
            'ma_khuyen_mai' => $request->ma_khuyen_mai,
            'loai_ma' => $request->loai_ma,
            'diem_can' => $request->loai_ma === 'ma_doi_qua' ? $diemCan : null,
            'phan_tram_khuyen_mai' => $request->phan_tram_khuyen_mai,
            'giam_toi_da' => $request->giam_toi_da,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'so_luong' => $request->so_luong,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'trang_thai' => 1,
        ]);

        // Cập nhật trạng thái theo ngày
        $now = Carbon::now();
        if ($khuyenMai->ngay_ket_thuc < $now) {
            $khuyenMai->update(['trang_thai' => false]);
        }

        return redirect()->route('admin.khuyen_mais.index')->with('success', 'Khuyến mãi đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        // Tìm kiếm bản ghi Khuyến Mãi theo ID
        $khuyenMai = KhuyenMai::find($id);
        if (!$khuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }
        // Xóa bản ghi
        $khuyenMai->trang_thai = false;
        $khuyenMai->save();
        $khuyenMai->delete();
        return redirect()->route('admin.khuyen_mais.index')->with('success', 'Khuyến mãi đã được xóa thành công.');
    }
    public function onOffKhuyenMai($id)
    {
        // Lấy bảng ghi khuyến mãi theo Id
        $khuyenMai = KhuyenMai::find($id);

        if (!$khuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }
        // So sánh ngày hiện tại với ngày kết thúc của khuyến mãi 
        $now = Carbon::now();
        if ($khuyenMai->ngay_ket_thuc < $now) {
            // Nếu ngày hiện tại đã qua ngày kết thúc
            return redirect()->back()->with('error', 'Khuyến mãi đã hết thời gian, không thể thay đổi trạng thái.');
        }

        // Cập nhật trạng thái khuyến mãi nếu còn hạn
        if ($khuyenMai->trang_thai) {
            // Nếu trạng thái đang hoạt động, chuyển thành ngừng hoạt động
            $khuyenMai->trang_thai = false;
            $khuyenMai->save();
            return redirect()->back()->with('success', 'Khuyến mãi đã được ngừng hoạt động.');
        } else {
            // Nếu trạng thái đang ngừng hoạt động, chuyển thành hoạt động
            $khuyenMai->trang_thai = true;
            $khuyenMai->save();
            return redirect()->back()->with('success', 'Khuyến mãi đã được kích hoạt.');
        }
    }
    public function updateExpiredKhuyenMai()
    {
        $now = Carbon::now();
        // Cập nhật trạng thái khuyến mãi là hết hạn
        $updatedCount = KhuyenMai::where('ngay_ket_thuc', '<', $now)
            ->where(['trang_thai' => true]) // chỉ cập nhật trạng thái hiện tại vẫn còn hoạt động
            ->update(['trang_thai' => false]);

        // Trả về thông báo hoặc view nếu cần
        return redirect()->back()->with('success', "Đã cập nhật trạng thái của $updatedCount khuyến mãi.");
    }



    public function trash(Request $request)
    {
        $query = KhuyenMai::query();
        if ($request->has(('ngay_bat_dau')) && $request->input('ngay_ket_thuc')) {
            $query->where('ngay_bat_dau', '>=', $request->input('ngay_bat_dau'));
        }

        if ($request->has('ngay_ket_thuc') && $request->input('ngay_ket_thuc')) {
            $query->where('ngay_ket_thuc', '<=', $request->input('ngay_ket_thuc'));
        }

        $KhuyenMais = $query->onlyTrashed()->get();
        return view('admins.khuyen_mais.trash', compact('KhuyenMais'));
    }

    public function restore($id)
    {
        $khuyenMai = KhuyenMai::withTrashed()->find($id);
        if ($khuyenMai) {
            $khuyenMai->trang_thai = true;
            $khuyenMai->save();
            $khuyenMai->restore();
            return redirect()->back()->with('success', 'khôi phục thành công');
        }
        return redirect()->back()->with('error', 'Khuyến mãi chưa bị xóa mềm');
    }

    public function forceDelete($id)
    {
        $khuyenMai = KhuyenMai::withTrashed()->find($id);
        if ($khuyenMai) {
            $khuyenMai->forceDelete();
            return redirect()->route('admin.khuyen_mais.trash')->with('success', 'Khuyến mãi đã được xóa thành công.');
        }
        return redirect()->route('admin.khuyen_mais.trash')->with('success', 'Khuyến mãi không tồn tại.');
    }
}
