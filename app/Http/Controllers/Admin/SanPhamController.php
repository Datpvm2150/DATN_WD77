<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\DanhGiaSanPham;
use App\Models\DanhMuc;
use App\Models\DungLuong;
use App\Models\HinhAnhSanPham;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\Tag;
use App\Models\TagSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SanPhamController extends Controller
{
    public function index(Request $request)
    {
        $query = SanPham::withTrashed()->with('bienTheSanPhams', 'hinhAnhSanPhams', 'tagSanPhams');
        // Lọc theo danh mục
        if ($request->filled('danh_muc_id')) {
            $query->where('danh_muc_id', $request->danh_muc_id);
        }
        // Lọc theo ngày tạo
        if ($request->filled('ngay_tao')) {
            $query->whereDate('created_at', $request->ngay_tao);
        }
        // Lọc theo trạng thái
        if ($request->has('trang_thai') && $request->trang_thai !== '') {
            if ($request->trang_thai == '1') {
                $query->whereNull('deleted_at'); // Hoạt động
            } elseif ($request->trang_thai == '0') {
                $query->whereNotNull('deleted_at'); // Ngừng Hoạt động
            }
        }
        $sanphams = $query->latest('id')->get();

        // Lấy danh sách danh mục để hiển thị trong form lọc
        $danhMucs = DanhMuc::all();
        return view('admins.sanphams.index', compact('sanphams', 'danhMucs'));
    }

    public function create()
    {
        $danhmucs = DanhMuc::get();
        $tags = Tag::where('trang_thai', 1)->get();
        $mausacs = MauSac::where('trang_thai', 1)->get();
        $dungluongs = DungLuong::where('trang_thai', 1)->get();
        return view('admins.sanphams.create', compact('danhmucs', 'mausacs', 'dungluongs', 'tags'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'ma_san_pham' => ['required', 'string', 'max:255', 'unique:san_phams,ma_san_pham'],
                'ten_san_pham' => ['required', 'string', 'max:255'],
                'danh_muc_id' => ['required', 'integer', 'exists:danh_mucs,id'],
                'anh_san_pham' => ['required', 'mimes:jpg,jpeg,png,gif,bmp,webp,svg', 'max:4048'],
                'mo_ta' => ['nullable', 'string'],

                'hinh_anh' => ['required', 'array'],
                'hinh_anh.*' => ['file', 'mimes:jpg,jpeg,png,gif,bmp,webp,svg', 'max:4048'],

                'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
                'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
                'gia_cu.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'gia_moi.*' => ['nullable', 'numeric', 'min:1', 'max:4000000000'],
                'so_luong.*' => ['required', 'min:0', 'max:4000000000', 'integer'],
            ],
            [
                'ma_san_pham.required' => 'Mã sản phẩm không được để trống.',
                'ma_san_pham.string' => 'Mã sản phẩm phải là chuỗi ký tự.',
                'ma_san_pham.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
                'ma_san_pham.unique' => 'Mã sản phẩm đã tồn tại.',

                'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
                'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

                'danh_muc_id.required' => 'Danh mục ID không được để trống.',
                'danh_muc_id.integer' => 'Danh mục ID phải là số nguyên.',
                'danh_muc_id.exists' => 'Danh mục ID không tồn tại.',

                'anh_san_pham.required' => 'Ảnh sản phẩm không được để trống.',
                'anh_san_pham.mimes' => 'Ảnh sản phẩm phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
                'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 4MB.',

                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

                // ảnh sản phẩm
                'hinh_anh.required' => 'Album ảnh không được để trống',
                'hinh_anh.array' => 'Album ảnh phải là một mảng',
                'hinh_anh.*.file' => 'Có ảnh sai định dạng',
                'hinh_anh.*.mimes' => 'Ảnh phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
                'hinh_anh.*.max' => 'Ảnh không được vượt quá 4MB',

                // //biến thể sản phẩm
                'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
                'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
                'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
                'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',

                'gia_cu.*.required' => 'Giá cũ không được để trống.',
                'gia_cu.*.numeric' => 'Giá cũ phải là số.',
                'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
                'gia_cu.*.max' => 'Giá cũ phải nhỏ hơn 4 tỷ.',

                'gia_moi.*.numeric' => 'Giá mới phải là số.',
                'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
                'gia_moi.*.max' => 'Giá mới phải nhỏ hơn 4 tỷ.',

                'so_luong.*.required' => 'Số lượng không được để trống.',
                'so_luong.*.max' => 'Số lượng phải nhỏ hơn 4 tỷ.',
                'so_luong.*.integer' => 'Số lượng phải là số nguyên.',
                'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            ]
        );
        // Kiểm tra giá mới trùng giá cũ
        $validator->after(function ($validator) use ($request) {
            $gia_cus = $request->input('gia_cu', []);
            $gia_mois = $request->input('gia_moi', []);

            foreach ($gia_cus as $index => $gia_cu) {
                if (isset($gia_mois[$index]) && $gia_cu == $gia_mois[$index]) {
                    $validator->errors()->add("gia_moi.$index", 'Giá mới không được trùng với giá cũ .');
                }
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Sản phẩm
        $datasanpham = $request->only([
            'ma_san_pham',
            'ten_san_pham',
            'danh_muc_id',
            'anh_san_pham',
            'mo_ta'
        ]);
        $databienthesanphams = $request->only(['dung_luong_id', 'mau_sac_id', 'gia_cu', 'gia_moi', 'so_luong']);

        if (isset($datasanpham['ten_san_pham'])) {
            $datasanpham['ten_san_pham'] = ucfirst(mb_strtolower(trim($datasanpham['ten_san_pham'])));
        }
        if ($request->hasFile('anh_san_pham')) {
            $path_anh_san_pham = $request->file('anh_san_pham')->store('thumbnail', 'public');
            $datasanpham['anh_san_pham'] = 'storage/' . $path_anh_san_pham;
        }
        $datasanpham['luot_xem'] = 0;
        $datasanpham['da_ban'] = 0;
        $sanpham = SanPham::create($datasanpham);
        // album ảnh
        $hinh_anhs = $request->file('hinh_anh');
        foreach ($hinh_anhs as $hinh_anh) {
            $path = $hinh_anh->store('albums', 'public');
            HinhAnhSanPham::create([
                'san_pham_id' => $sanpham['id'],
                'hinh_anh' => 'storage/' . $path,
            ]);
        }
        // Xử lý và lưu biến thể sản phẩm
        $flag = true;
        foreach ($databienthesanphams['dung_luong_id'] as $index => $dung_luong_id) {
            $exists = BienTheSanPham::where('san_pham_id', $sanpham['id'])
                ->where('dung_luong_id', $dung_luong_id)
                ->where('mau_sac_id', $databienthesanphams['mau_sac_id'][$index])
                ->exists();
            if (!$exists) {
                BienTheSanPham::create([
                    'san_pham_id' => $sanpham['id'],
                    'so_luong' => $databienthesanphams['so_luong'][$index],
                    'gia_cu' => $databienthesanphams['gia_cu'][$index],
                    'gia_moi' => $databienthesanphams['gia_moi'][$index],
                    'dung_luong_id' => $dung_luong_id,
                    'mau_sac_id' => $databienthesanphams['mau_sac_id'][$index] ?? null,

                ]);
            } else {
                $flag = false;
            }
        }
        // Tag san pham
        $tags = $request->input('tag_id', []);
        if (!empty($tags)) {
            $data = [];
            foreach ($tags as $tagId) {
                $data[] = [
                    'tag_id' => $tagId,
                    'san_pham_id' => $sanpham['id'],
                ];
            }
            if (!empty($data)) {
                TagSanPham::insert($data);
            }
        }
        if (!$flag) {
            return redirect()->route('admin.sanphams.edit', ['id' => $sanpham['id']])->with('error', 'Không thể thêm biến thể trùng!');
        }
        return redirect()->route('admin.sanphams.index')->with('success', 'Thêm thành công sản phẩm!');
    }


    public function show(string $id)
    {

        $sanpham = SanPham::withTrashed()->find($id);

        if ($sanpham) {
            $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
            $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->get();
            $tagsanphams = TagSanPham::where('san_pham_id', $id)->get();

            // Lấy danh sách đánh giá sản phẩm
            $danhgias = DanhGiaSanPham::latest('id')->where('san_pham_id', $id)->paginate(10);

            // tính điểm trung bình và số lượt đánh giá
            $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
            $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count();

            // Tính tỷ lệ phần trăm cho mỗi loại sao
            $starCounts = DanhGiaSanPham::select(DB::raw('diem_so, count(*) as count'))
                ->where('san_pham_id', $id)
                ->groupBy('diem_so')
                ->pluck('count', 'diem_so');

            $totalRatings = $starCounts->sum(); // Tổng số đánh giá
            $starPercentage = [];

            for ($i = 1; $i <= 5; $i++) {
                $percentage = $totalRatings > 0 ? ($starCounts->get($i, 0) / $totalRatings) * 100 : 0;
                $starPercentage[$i] = $percentage;
            }
            return view('admins.sanphams.show', compact(
                'sanpham',
                'bienthesanphams',
                'anhsanphams',
                'tagsanphams',
                'danhgias',
                'diemtrungbinh',
                'soluotdanhgia',
                'starPercentage' // Truyền tỷ lệ phần trăm sao vào view ....
            ));
        }
        return redirect()->route('admin.sanphams.index')->with('error', 'Không tìm thấy sản phẩm');
    }
    public function isHot(string $id, Request $request)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if (!$sanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        if ($sanpham->is_hot == false) {
            $count = SanPham::where('is_hot', 1)->count();
            if ($count >= 15) {
                return redirect()->back()->with('error', 'Chỉ có 15 sản phẩm có thể đánh dấu là HOT');
            }
            $sanpham->is_hot = true;
            $sanpham->save();
            return redirect()->back()->with('success', 'Sản phẩm đã được đánh dấu HOT');
        } else {
            $sanpham->is_hot = false;
            $sanpham->save();
            return redirect()->back()->with('success', 'Sản phẩm đã tắt đánh dấu HOT');
        }
    }

    public function edit(string $id)
    {

        $sanpham = SanPham::withTrashed()->find($id);

        if ($sanpham) {

            $bienthesanphams = BienTheSanPham::withTrashed()->where("san_pham_id", $id)->get();
            $hinh_anhs = HinhAnhSanPham::where("san_pham_id", $id)->get();
            $tagsanphams = TagSanPham::where("san_pham_id", $id)->get();

            $danhmucs = DanhMuc::get();
            $tags = Tag::where("trang_thai", 1)->get();
            $mausacs = MauSac::where("trang_thai", 1)->get();
            $dungluongs = DungLuong::where("trang_thai", 1)->get();
            return view("admins.sanphams.update", compact("sanpham", "bienthesanphams", "hinh_anhs", "tagsanphams", "danhmucs", "tags", "mausacs", "dungluongs"));
        }
        return redirect()->route("admin.sanphams.index")->with("error", "Không tìm thấy sản phẩm");
    }

    public function update(string $id, Request $request)
    {
        // sản phẩm
        $sanpham = SanPham::withTrashed()->find($id);

        $old_anh_san_pham = $sanpham->anh_san_pham;
        // Xử lý mảng rỗng giá_moi => null
        $request->merge([
            'gia_moi' => array_map(function ($item) {
                return ($item === '' || $item == 0) ? null : $item;
            }, $request->input('gia_moi', [])),

            'new_gia_moi' => array_map(function ($item) {
                return ($item === '' || $item == 0) ? null : $item;
            }, $request->input('new_gia_moi', [])),
        ]);

        $validator = Validator::make($request->all(), [
            'ma_san_pham' => ['string', 'max:255', Rule::unique('san_phams', 'ma_san_pham')->ignore($id)],
            'ten_san_pham' => ['required', 'string', 'max:255'],
            'danh_muc_id' => ['required', 'integer', 'exists:danh_mucs,id'],
            'anh_san_pham' => ['mimes:jpg,jpeg,png,gif,bmp,webp,svg', 'max:4048'],
            'mo_ta' => ['nullable', 'string'],
            'hinh_anh.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,bmp,webp,svg', 'max:4048'],
            'deleted_images' => ['nullable', 'string'],
            'old_images' => ['nullable', 'string'],

            // biến thể cũ
            'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
            'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
            'gia_cu.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
            'gia_moi.*' => ['nullable', 'sometimes', 'numeric', 'min:1', 'max:4000000000'],
            'so_luong.*' => ['required', 'numeric', 'min:0', 'max:4000000000'],
            'trangthai.*' => ['nullable', 'boolean'],

            // biến thể mới
            'new_dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
            'new_mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
            'new_gia_cu.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
            'new_gia_moi.*' => ['nullable', 'sometimes', 'numeric', 'min:1', 'max:4000000000'],
            'new_so_luong.*' => ['required', 'integer', 'min:0', 'max:4000000000'],

        ], [
            'ma_san_pham.required' => 'Mã sản phẩm không được để trống.',
            'ma_san_pham.string' => 'Mã sản phẩm phải là chuỗi ký tự.',
            'ma_san_pham.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
            'ma_san_pham.unique' => 'Mã sản phẩm đã tồn tại.',

            'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
            'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

            'danh_muc_id.required' => 'Danh mục ID không được để trống.',
            'danh_muc_id.integer' => 'Danh mục ID phải là số nguyên.',
            'danh_muc_id.exists' => 'Danh mục ID không tồn tại.',

            'anh_san_pham.mimes' => 'Ảnh sản phẩm phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
            'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 4MB.',

            'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

            // ảnh sản phẩm
            'hinh_anh.*.image' => 'Phải là ảnh',
            'hinh_anh.*.mimes' => 'Ảnh sản phẩm phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
            'hinh_anh.*.max' => 'Ảnh sản phẩm không được vượt quá 4MB.',

            // // biến thể sản phẩm cũ
            'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
            'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',

            'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
            'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',

            'gia_cu.*.required' => 'Giá cũ không được để trống.',
            'gia_cu.*.numeric' => 'Giá cũ phải là số.',
            'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
            'gia_cu.*.max' => 'Giá cũ phải nhỏ hơn 4 tỷ.',

            'gia_moi.*.numeric' => 'Giá mới phải là số.',
            'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
            'gia_moi.*.max' => 'Giá mới phải nhỏ hơn 4 tỷ.',

            'so_luong.*.required' => 'Số lượng không được để trống.',
            'so_luong.*.numeric' => 'Số lượng phải là số nguyên.',
            'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            'so_luong.*.max' => 'Số lượng phải nhỏ hơn 4 tỷ.',

            // // biến thể sản phẩm mới
            'new_dung_luong_id.*.required' => 'Dung lượng không được để trống.',
            'new_dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
            'new_mau_sac_id.*.required' => 'Màu sắc không được để trống.',
            'new_mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',

            'new_gia_cu.*.required' => 'Giá cũ không được để trống.',
            'new_gia_cu.*.numeric' => 'Giá cũ phải là số.',
            'new_gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
            'new_gia_cu.*.max' => 'Giá cũ phải nhỏ hơn 4 tỷ.',


            'new_gia_moi.*.numeric' => 'Giá mới phải là số.',
            'new_gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
            'new_gia_moi.*.max' => 'Giá mới phải nhỏ hơn 4 tỷ.',

            'new_so_luong.*.required' => 'Số lượng không được để trống.',
            'new_so_luong.*.integer' => 'Số lượng phải là số nguyên.',
            'new_so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            'new_so_luong.*.max' => 'Số lượng phải nhỏ hơn 4 tỷ.',
        ]);

        // Kiểm tra giá mới = giá cũ
        $validator->after(function ($validator) use ($request) {
            $gia_cus = $request->input('gia_cu', []);
            $gia_mois = $request->input('gia_moi', []);
            foreach ($gia_cus as $index => $gia_cu) {
                if (isset($gia_mois[$index]) && $gia_cu == $gia_mois[$index]) {
                    $validator->errors()->add("gia_moi.$index", 'Giá mới không được trùng với giá cũ .');
                }
            }

            $new_gia_cus = $request->input('new_gia_cu', []);
            $new_gia_mois = $request->input('new_gia_moi', []);
            foreach ($new_gia_cus as $index => $gia_cu) {
                if (isset($new_gia_mois[$index]) && $gia_cu == $new_gia_mois[$index]) {
                    $validator->errors()->add("new_gia_moi.$index", 'Giá mới không được trùng với giá cũ .');
                }
            }
        });

        //  Nếu có lỗi -> trả về
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $datasanpham = $request->only([
            'ma_san_pham',
            'ten_san_pham',
            'danh_muc_id',
            'anh_san_pham',
            'mo_ta'
        ]);
        if ($datasanpham['ten_san_pham']) {
            $datasanpham['ten_san_pham'] = ucfirst(mb_strtolower(trim($datasanpham['ten_san_pham'])));
        }
        if ($request['anh_san_pham']) {
            $path_anh_san_pham = $request->file('anh_san_pham')->store('thumbnail', 'public');
            $datasanpham['anh_san_pham'] = 'storage/' . $path_anh_san_pham;
            if ($old_anh_san_pham) {
                if (file_exists($old_anh_san_pham)) {
                    unlink($old_anh_san_pham);
                }
            }
        }
        $sanpham->update($datasanpham);
        // ảnh sản phẩm
        $deletedImageIds = explode(',', $request->input('deleted_images', '')); // Chia chuỗi các ID ảnh đã xóa thành mảng
        // Xóa ảnh đã được chỉ đỉnh để xóa
        if (!empty($deletedImageIds)) {
            foreach ($deletedImageIds as $imageId) {
                $image = HinhAnhSanPham::find($imageId); // Tìm ảnh theo id
                if ($image) {
                    $filePath = $image->hinh_anh; // Lấy đường dẫn ảnh
                    // Kiểm tra xem đường dẫn file có hợp lệ trước khi xóa
                    $filePath = str_replace('storage/', '', $filePath);
                    if ($filePath && Storage::exists($filePath)) {
                        Storage::delete($filePath);
                    }
                    // xóa bản ghi ảnh khỏi cơ sở dữ liệu
                    $image->delete();
                }
            }
        }

        // Xử lý các ảnh mới được tải lên
        if ($request->hasFile('hinh_anh')) {
            foreach ($request->file('hinh_anh') as $hinh_anh) {
                $path = $hinh_anh->store('albums', 'public');
                HinhAnhSanPham::create([
                    'san_pham_id' => $sanpham->id,
                    'hinh_anh' => 'storage/' . $path,
                ]);
            }
        }

        // Biến thể sản phẩm cũ
        $dungLuongIds = $request->input('dung_luong_id', []);
        $mauSacIds = $request->input('mau_sac_id', []);
        $giaCu = $request->input('gia_cu', []);
        $giaMoi = $request->input('gia_moi', []);
        $soLuong = $request->input('so_luong', []);
        $variantIds = $request->input('variant_id', []);
        $trangthai = $request->input('trangthai', []);
        // Mảng để theo dõi các biến thể đã tồn tại
        $existingVariantIds = [];
        foreach ($variantIds as $index => $idbienthe) {
            $bienthe = BienTheSanPham::withTrashed()->find($idbienthe);
            if ($bienthe) {
                // Tạo Khóa duy nhất cho dung lượng và màu sắc
                $key = $dungLuongIds[$index] . '-' . $mauSacIds[$index];
                //Kiểm tra sự tồn tại của mảng
                if (!in_array($key, $existingVariantIds)) {
                    // Kiểm tra sự tồn tại trong cơ sở dữ liệu
                    $exists = BienTheSanPham::where('san_pham_id', $sanpham['id'])
                        ->where('dung_luong_id', $dungLuongIds[$index])
                        ->where('mau_sac_id', $mauSacIds[$index])
                        ->when($bienthe->id, function ($query) use ($bienthe) {
                            return $query->where('id', '!=', $bienthe->id);
                        })
                        ->exists();

                    if (!$exists) {
                        // Cập nhật biến thể
                        $bienthe->update([
                            'dung_luong_id' => $dungLuongIds[$index],
                            'mau_sac_id' => $mauSacIds[$index],
                            'gia_cu' => $giaCu[$index],
                            'gia_moi' => $giaMoi[$index],
                            'so_luong' => $soLuong[$index],
                        ]);

                        // Thêm khóa vào mảng các biến thể đã tồn tại
                        $existingVariantIds[] = $key;

                        // Kiểm tra trạng thái
                        if (isset($trangthai[$index]) && $trangthai[$index] == 0) {
                            $bienthe->delete(); // Xóa biến thể
                        } else {
                            $bienthe->restore(); // Khôi phục biến thể
                        }
                    } else {
                        return redirect()->back()->with('error', 'Cập nhật biến thể sản phẩm thất bại. Có biến thể trùng lặp!');
                    }
                } else {
                    return redirect()->back()->with('error', 'Cập nhật biến thể sản phẩm thất bại. Có biến thể trùng lặp!');
                }
            }
        }
        $flag = true;
        if ($request->has('new_dung_luong_id')) {
            // Lấy dữ liệu biế thể mới
            $databienthesanphammois = $request->only([
                'new_dung_luong_id',
                'new_mau_sac_id',
                'new_gia_cu',
                'new_gia_moi',
                'new_so_luong',
            ]);
            // Lặp qua các dung lượng mới
            foreach ($databienthesanphammois['new_dung_luong_id'] as $index => $new_dung_luong_id) {
                // Kiểm tra xem biến thể đã tồn tại chưa
                $exists = BienTheSanPham::where('san_pham_id', $sanpham['id'])
                    ->where("dung_luong_id", $new_dung_luong_id)
                    ->where("mau_sac_id", $databienthesanphammois['new_mau_sac_id'][$index])
                    ->exists();

                //Nếu biến thể chưa tồn tại, thêm mới
                if (!$exists) {
                    BienTheSanPham::create([
                        'san_pham_id' => $sanpham['id'],
                        'so_luong' => $databienthesanphammois['new_so_luong'][$index],
                        'gia_cu' => $databienthesanphammois['new_gia_cu'][$index],
                        'gia_moi' => $databienthesanphammois['new_gia_moi'][$index],
                        'dung_luong_id' => $new_dung_luong_id,
                        'mau_sac_id' => $databienthesanphammois['new_mau_sac_id'][$index],
                    ]);
                } else {
                    $flag = false;
                }
            }
        }

        //tags
        $newTags = $request->input('new_tags', []);
        if (!is_array($newTags)) {
            $newTags = [];
        }
        DB::transaction(function () use ($sanpham, $newTags) {
            // Sử dụng sync để thêm hoặc xóa tag
            $sanpham->tags()->sync($newTags);
        });
        $sanphamUpdates = BienTheSanPham::where('san_pham_id', $sanpham['id'])->get();
        $checkTrangThaiS = 0;
        foreach ($sanphamUpdates as $sanphamUpdate) {
            if ($sanphamUpdate->deleted_at != null) {
                $checkTrangThaiS++;
            }
        }
        if ($checkTrangThaiS >= count($sanphamUpdates)) {
            $sanpham->delete();
        }
        if (!$flag) {
            return redirect()->back()->with('success', 'Cập nhập sản phẩm thành công. Biến thể trùng sẽ không được thêm!');
        }
        return redirect()->back()->with('success', 'Cập nhập sản phẩm thành công');
    }

    public function destroy(string $id)
    {
        $sanpham = Sanpham::withTrashed()->find($id);
        if (!$sanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        // tắt is hot sản phẩm
        $sanpham->is_hot = false;
        $sanpham->save();
        $sanpham->delete();
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }

    public function restore(string $id)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if (!$sanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $bienthesanphams = BienTheSanPham::where('san_pham_id', $id)->get();
        if (count($bienthesanphams) > 0) {
            $sanpham->restore();
            return redirect()->back()->with('success', 'Khôi phục sản phẩm thành công');
        } else {
            return redirect()->back()->with('error', 'Vui lòng khôi phục biến thể');
        }
    }
}
