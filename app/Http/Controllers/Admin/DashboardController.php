<?php
namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SanPham;
use App\Models\HoaDon;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ChiTietHoaDon;
use App\Models\DanhGiaSanPham;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $filter = $request->get('filter', 'today');
        $startInput = $request->input('start_date');
        $endInput = $request->input('end_date');

        if ($startInput && $endInput) {
            $startDate = Carbon::parse($startInput)->startOfSecond();
            $endDate = Carbon::parse($endInput)->endOfSecond();
            $filter = 'custom'; // Ghi nhớ là đang dùng thời gian tùy chỉnh
        } else {
            switch ($filter) {
                case 'week':
                    $startDate = Carbon::now()->startOfWeek();
                    $endDate = Carbon::now()->endOfWeek();
                    break;
                case 'month':
                    $startDate = Carbon::now()->startOfMonth();
                    $endDate = Carbon::now()->endOfMonth();
                    break;
                case 'year':
                    $startDate = Carbon::now()->startOfYear();
                    $endDate = Carbon::now()->endOfYear();
                    break;
                default: // 'today'
                    $startDate = Carbon::today();
                    $endDate = Carbon::now()->endOfDay();
                    break;
            }
        }

        // Lọc dữ liệu
        $tong_san_pham = ChiTietHoaDon::whereHas('hoaDon', function ($query) {
            $query->where('trang_thai', 7);
        })
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('so_luong');

        $tong_don_hang = HoaDon::whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $tong_doanh_thu = HoaDon::where('trang_thai', 7)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('tong_tien');

        $tong_don_hang_da_xu_ly = HoaDon::where('trang_thai', 7)  // Lọc các đơn hàng đã xử lý
            ->whereBetween('created_at', [$startDate, $endDate])  // Lọc các đơn hàng tạo trong hôm nay
            ->count();  // Đếm số lượng đơn hàng đã xử lý trong hôm nay

        $tong_don_hang_chua_xu_ly = HoaDon::whereIn('trang_thai', [1, 2, 3, 4, 5])  // Lọc các đơn hàng chưa xử lý
            ->whereBetween('created_at', [$startDate, $endDate])  // Lọc các đơn hàng tạo trong hôm nay
            ->count();  // Đếm số lượng đơn hàng chưa xử lý trong hôm nay

        $tong_nguoi_dung = User::whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $san_pham_ban_chay = SanPham::select(
            'san_phams.id',
            'san_phams.ten_san_pham',
            'danh_mucs.ten_danh_muc',
            'san_phams.anh_san_pham',
            DB::raw('SUM(chi_tiet_hoa_dons.so_luong) as tong_so_luong_ban'),
            DB::raw('SUM(chi_tiet_hoa_dons.so_luong *
            CASE
                WHEN bien_the_san_phams.gia_moi IS NOT NULL AND bien_the_san_phams.gia_moi > 0
                    THEN bien_the_san_phams.gia_moi
                ELSE bien_the_san_phams.gia_cu
            END
        ) as tong_doanh_thu')
        )
            ->join('bien_the_san_phams', 'san_phams.id', '=', 'bien_the_san_phams.san_pham_id')
            ->join('chi_tiet_hoa_dons', 'bien_the_san_phams.id', '=', 'chi_tiet_hoa_dons.bien_the_san_pham_id')
            ->join('hoa_dons', 'chi_tiet_hoa_dons.hoa_don_id', '=', 'hoa_dons.id')
            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->where('hoa_dons.trang_thai', 7)
            ->whereBetween('chi_tiet_hoa_dons.created_at', [$startDate, $endDate])
            ->groupBy('san_phams.id', 'san_phams.ten_san_pham', 'san_phams.anh_san_pham', 'danh_mucs.ten_danh_muc')
            ->orderBy('tong_so_luong_ban', 'desc')
            ->take(5)
            ->get();
        $reviews = DanhGiaSanPham::whereBetween('created_at', [$startDate, $endDate]) // Lọc theo khoảng thời gian
            ->latest()
            ->take(7) // Lấy 7 bản ghi mới nhất
            ->get();

        // 2. Thống kê người dùng đăng ký theo ngày trong tháng hiện tại
        $nguoiDungTheoNgay = User::selectRaw('DATE(created_at) as ngay, COUNT(id) as so_luong_nguoi_dung')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        // 4. Thống kê doanh thu trung bình và hôm nay
        $ngay_hien_tai = today();
        $ngay_dau_tien_hoa_don = HoaDon::where('trang_thai', 7)->min('created_at');
        $so_ngay_hoa_don = $ngay_dau_tien_hoa_don ? $ngay_hien_tai->diffInDays(Carbon::parse($ngay_dau_tien_hoa_don)) + 1 : 0;
        $doanh_thu_hom_nay = HoaDon::where('trang_thai', 7)
            ->whereDate('created_at', $ngay_hien_tai)
            ->sum('tong_tien');

        // 5. Thống kê doanh thu theo ngày trong tháng hiện tại
        $doanhThuTheoNgay = HoaDon::selectRaw('DATE(created_at) as ngay, SUM(tong_tien) as tong_doanh_thu')
            ->where('trang_thai', 7)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();


        $doanhThuNgayData = $doanhThuTheoNgay->pluck('tong_doanh_thu')->toArray();
        $ngayLabels = $doanhThuTheoNgay->pluck('ngay')->map(function ($date) {
            return date('d/m', strtotime($date));
        })->toArray();

        // 6. Thống kê doanh thu theo tháng
        $doanh_thu_theo_thang = HoaDon::selectRaw('YEAR(created_at) as nam, MONTH(created_at) as thang, SUM(tong_tien) as doanh_thu')
            ->where('trang_thai', 7)
            ->groupBy('nam', 'thang')
            ->orderBy('nam', 'desc')
            ->orderBy('thang', 'desc')
            ->get();


        $doanh_thu_data = $doanh_thu_theo_thang->pluck('doanh_thu')->toArray();
        $thang_labels = $doanh_thu_theo_thang->map(function ($item) {
            return $item->thang . '/' . $item->nam;
        })->toArray();

        // 8. Thống kê số lượng đơn hàng
        $ngay_dau_tien_don_hang = HoaDon::min('created_at');
        $so_ngay_don_hang = $ngay_dau_tien_don_hang ? $ngay_hien_tai->diffInDays(Carbon::parse($ngay_dau_tien_don_hang)) + 1 : 0;
        $don_hang_hom_nay = HoaDon::whereDate('created_at', $ngay_hien_tai)->count();
        // Thống kê đơn hàng theo ngày
        $donTheoNgay = HoaDon::selectRaw('DATE(created_at) as ngay, COUNT(id) as so_luong_don')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        $donNgayData = $donTheoNgay->pluck('so_luong_don')->toArray();
        $donNgayLabels = $donTheoNgay->pluck('ngay')->map(function ($date) {
            return date('d/m', strtotime($date));
        })->toArray();
        // 9. Thống kê số lượng sản phẩm theo danh mục từ bảng biến thể sản phẩm
        $danhMucSanPham = DB::table('bien_the_san_phams')
            ->join('san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->select('danh_mucs.ten_danh_muc', DB::raw('SUM(bien_the_san_phams.so_luong) as so_luong_san_pham'))
            ->groupBy('danh_mucs.ten_danh_muc')
            ->orderBy('so_luong_san_pham', 'desc')
            ->get();

        $labelsDanhMuc = $danhMucSanPham->pluck('ten_danh_muc')->toArray();
        $dataDanhMuc = $danhMucSanPham->pluck('so_luong_san_pham')->toArray();


        // Lấy danh sách sản phẩm và số lượng tồn kho từ bảng biến thể
        $products = DB::table('bien_the_san_phams')
            ->join('san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
            ->select('san_phams.ten_san_pham', DB::raw('SUM(bien_the_san_phams.so_luong) as so_luong'))
            ->groupBy('san_phams.ten_san_pham')
            ->get();

        // Lọc sản phẩm theo số lượng tồn kho
        $inStockProducts = $products->filter(function ($product) {
            return $product->so_luong >= 10; // Còn nhiều hàng
        });

        $lowStockProducts = $products->filter(function ($product) {
            return $product->so_luong > 0 && $product->so_luong < 10; // Sắp hết hàng
        });

        $outOfStockProducts = $products->filter(function ($product) {
            return $product->so_luong == 0; // Hết hàng
        });

        // Tạo mảng dữ liệu để hiển thị trên biểu đồ
        $labelsSanPham = $products->pluck('ten_san_pham')->toArray(); // Tên các sản phẩm
        $dataInStock = $inStockProducts->pluck('so_luong')->toArray(); // Sản phẩm còn hàng
        $dataLowStock = $lowStockProducts->pluck('so_luong')->toArray(); // Sản phẩm sắp hết hàng
        $dataOutOfStock = $outOfStockProducts->pluck('so_luong')->toArray();
        // Sản phẩm hết hàng// Đảm bảo rằng các mảng dữ liệu đều có cùng độ dài
        // 12. Trả về view
        return view('admins.dashboard', compact(
            'tong_doanh_thu',
            'tong_nguoi_dung',
            'tong_san_pham',
            'tong_don_hang',
            'doanh_thu_data',
            'thang_labels',
            'san_pham_ban_chay',
            'doanhThuNgayData',
            'ngayLabels',
            'donNgayData',
            'donNgayLabels',
            'labelsDanhMuc',
            'dataDanhMuc',
            'labelsSanPham',
            'dataInStock',
            'dataLowStock',
            'dataOutOfStock',
            'tong_don_hang_da_xu_ly',
            'tong_don_hang_chua_xu_ly',
            'filter',
            'reviews'

        ));
    }


    public function sanPhamBanChay(Request $request)
{
    $thoiGian = $request->input('thoi_gian', 'day'); // Mặc định lọc theo ngày
    $danhMucId = $request->input('danh_muc_id', null); // Lọc theo danh mục nếu có
    $startDate = $request->input('start_date'); // Ngày bắt đầu
    $endDate = $request->input('end_date');     // Ngày kết thúc

    $danhmucs = DanhMuc::all();

    $query = DB::table('chi_tiet_hoa_dons')
        ->join('hoa_dons', 'hoa_dons.id', '=', 'chi_tiet_hoa_dons.hoa_don_id')
        ->join('bien_the_san_phams', 'bien_the_san_phams.id', '=', 'chi_tiet_hoa_dons.bien_the_san_pham_id')
        ->join('san_phams', 'san_phams.id', '=', 'bien_the_san_phams.san_pham_id')
        ->join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.danh_muc_id')
        ->select(
            'san_phams.id',
            'san_phams.ten_san_pham',
            'danh_mucs.ten_danh_muc as danh_muc',
            DB::raw('SUM(chi_tiet_hoa_dons.so_luong) as so_luong_ban'),
            DB::raw('SUM(chi_tiet_hoa_dons.so_luong *
                CASE
                    WHEN bien_the_san_phams.gia_moi IS NOT NULL AND bien_the_san_phams.gia_moi > 0
                        THEN bien_the_san_phams.gia_moi
                    ELSE bien_the_san_phams.gia_cu
                END
            ) as tong_tien')
        )
        ->where('hoa_dons.trang_thai', 7)
        ->groupBy('san_phams.id', 'san_phams.ten_san_pham', 'danh_mucs.ten_danh_muc');

    // 1. Nếu chọn lọc theo khoảng ngày
    if ($startDate && $endDate) {
        $query->whereBetween('hoa_dons.ngay_dat_hang', [
            Carbon::parse($startDate)->startOfDay(),
            Carbon::parse($endDate)->endOfDay()
        ]);
    } else {
        // 2. Nếu không có custom date → dùng filter sẵn có
        if ($thoiGian === 'day') {
            $query->whereDate('hoa_dons.ngay_dat_hang', Carbon::today());
        } elseif ($thoiGian === 'week') {
            $query->whereBetween('hoa_dons.ngay_dat_hang', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($thoiGian === 'month') {
            $query->whereMonth('hoa_dons.ngay_dat_hang', Carbon::now()->month)
                  ->whereYear('hoa_dons.ngay_dat_hang', Carbon::now()->year);
        }
    }

    // Lọc theo danh mục sản phẩm nếu có
    if ($danhMucId) {
        $query->where('danh_mucs.id', $danhMucId);
    }

    // Lấy 5 sản phẩm bán chạy nhất
    $sanPhamBanChay = $query->orderBy('so_luong_ban', 'desc')
        ->take(5)
        ->get();

    return view('admins.dashboard.tk-spbc', compact(
        'sanPhamBanChay',
        'thoiGian',
        'danhMucId',
        'danhmucs',
        'startDate',
        'endDate'
    ));
}

    public function sanPhamBanKho(Request $request)
    {
        // Lấy từ khóa tìm kiếm và trạng thái lọc
        $search = $request->input('search');
        $filterStatus = $request->input('status'); // Lọc theo trạng thái tồn kho

        // Lấy danh sách sản phẩm và biến thể tồn kho
        $query = DB::table('bien_the_san_phams')
            ->join('san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
            ->join('mau_sacs', 'bien_the_san_phams.mau_sac_id', '=', 'mau_sacs.id') // Bảng màu sắc
            ->join('dung_luongs', 'bien_the_san_phams.dung_luong_id', '=', 'dung_luongs.id') // Bảng dung lượng
            ->select(
                'san_phams.ten_san_pham',
                'mau_sacs.ten_mau_sac',
                'dung_luongs.ten_dung_luong',
                'bien_the_san_phams.so_luong',
                'bien_the_san_phams.id as bien_the_id'
            );

        if ($search) {
            $query->where('san_phams.ten_san_pham', 'LIKE', '%' . $search . '%');
        }

        // Lọc theo trạng thái tồn kho
        $variants = $query->get();
        if ($filterStatus) {
            switch ($filterStatus) {
                case 'in_stock':
                    $variants = $variants->filter(fn($variant) => $variant->so_luong >= 10);
                    break;
                case 'low_stock':
                    $variants = $variants->filter(fn($variant) => $variant->so_luong > 0 && $variant->so_luong < 10);
                    break;
                case 'out_of_stock':
                    $variants = $variants->filter(fn($variant) => $variant->so_luong == 0);
                    break;
            }
        }

        // Phân loại trạng thái tồn kho
        $outOfStockVariants = $variants->filter(fn($variant) => $variant->so_luong == 0);
        $lowStockVariants = $variants->filter(fn($variant) => $variant->so_luong > 0 && $variant->so_luong < 10);
        $inStockVariants = $variants->filter(fn($variant) => $variant->so_luong >= 10);

        // Trả dữ liệu sang view
        return view('admins.dashboard.tk-kho', compact(
            'variants',
            'inStockVariants',
            'lowStockVariants',
            'outOfStockVariants',
            'search',
            'filterStatus'
        ));
    }
public function user()
   {
        return view('admins.taikhoans.index');
     }
}
