<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;

class KhuyenMaiController extends Controller
{
    public function index(Request $request) {
        $query = KhuyenMai::query();
       if($request->has('ngay_bat_dau') && $request->input('ngay_bat_dau')) {
        $query->where('ngay_bat_dau', '>=', $request->input('ngay_bat_dau'));
       }
       if($request->has('ngay_ket_thuc') && $request->input('ngay_ket_thuc')) {
        $query->where('ngay_ket_thuc', '<=', $request->input('ngay_ket_thuc'));
       }

       $khuyenMais = $query->get();
        return view('admins.khuyenmais.index', compact('khuyenMais'));
    }

    public function create() {
        return view('admins.khuyenmais.create');
    }

    public function store(Request $request) {
        // Kiểm tra dữ liệu đâu vào
        $request->validate([
            'ma_khuyen_mai' => 'required|string|unique:khuyen_mais,ma_khuyen_mai', // Mã khuyến mãi là bắt buộc, phải là chuỗi, và duy nhất trong bảng khuyen_mais
            'phan_tram_khuyen_mai' => 'required|integer|min:1|max:99', // Phần trăm khuyến mãi từ 1 đến 99
            'giam_toi_da'=>'required|integer|min:0|max:1000000000',
            'ngay_bat_dau' => 'required|date', // Ngày bắt đầu là bắt buộc và phải là kiểu ngày
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau', // Ngày kết thúc phải sau hoặc bằng ngày bắt đầu
        ], [
            'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
            'ma_khuyen_mai.unique' => 'Mã khuyến mãi đã tồn tại. Vui lòng nhập mã khác.',
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
            'phan_tram_khuyen_mai' => $request->phan_tram_khuyen_mai,
            'giam_toi_da' => $request->giam_toi_da,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'trang_thai' => 1,
        ];
        KhuyenMai::create($data);
        return redirect()->route('admin.khuyenmais.index')->with('success', 'Khuyến mãi đã được tạo thành công.');
    }

}
