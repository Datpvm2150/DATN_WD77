-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2025 at 02:31 AM
-- Server version: 5.7.44
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wd77`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_phan_hois`
--

CREATE TABLE `admin_phan_hois` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lien_hes_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_phan_hois`
--

INSERT INTO `admin_phan_hois` (`id`, `lien_hes_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'huhu', '2025-08-01 05:08:40', '2025-08-01 05:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `bai_viets`
--

CREATE TABLE `bai_viets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_bai_viet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `danh_muc_id` bigint(20) UNSIGNED NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bai_viets`
--

INSERT INTO `bai_viets` (`id`, `tieu_de`, `noi_dung`, `anh_bai_viet`, `user_id`, `danh_muc_id`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '15 Ý Tưởng & 7 Mẫu Content Laptop Thu Hút Khách Hàng', '<h1 class=\"ql-align-center\">15 Ý Tưởng &amp; 7 Mẫu Content Laptop Thu Hút Khách Hàng</h1><p class=\"ql-align-center\">bởi&nbsp;<a href=\"https://abcdigi.marketing/author/huynh-quoc-cuong/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(0, 45, 94); background-color: transparent;\">Huỳnh Quốc Cường</a>&nbsp;|&nbsp;<span style=\"background-color: transparent;\">02.07.2024</span>&nbsp;|&nbsp;<a href=\"https://abcdigi.marketing/content-marketing/y-tuong-mau-content-hay/content-nganh-nghe-san-pham/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(0, 45, 94); background-color: transparent;\">Content theo ngành nghề và sản phẩm</a></p><p class=\"ql-align-justify\">Việc có nhiều ý tưởng và mẫu content laptop có thể giúp bạn đa dạng hóa nội dung cho doanh nghiệp. Điều này có thể giúp thu hút khách hàng, gia tăng tương tác và gia tăng doanh số cho thương hiệu. Hãy cùng&nbsp;<strong style=\"background-color: transparent;\">ABC Digi</strong>&nbsp;khám phá&nbsp;<strong style=\"background-color: transparent;\">15 ý tưởng và 7 mẫu content laptop</strong>&nbsp;qua bài viết này nhé!.<a href=\"https://abcdigi.marketing/elearning/khoa-hoc-abc-content-marketing-mien-phi/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(197, 0, 0); background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/04/Khoa-hoc-mien-phi-abcdigi-abc-content-2.gif?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;resize=600%2C450&amp;ssl=1\" alt=\"Khóa học miễn phí content marketing cho người mới bắt đầu\" height=\"450\" width=\"600\"></a></p><h2 class=\"ql-align-justify\"><strong>I. 15 Ý tưởng content laptop hấp dẫn</strong></h2><p class=\"ql-align-justify\"><strong style=\"background-color: transparent;\">Hướng dẫn chọn laptop theo nhu cầu</strong>: Tạo series bài viết hoặc video hướng dẫn người dùng chọn laptop phù hợp với các nhu cầu khác nhau như học tập, công việc, chơi game, thiết kế đồ họa,…&nbsp;<strong style=\"background-color: transparent;\">So sánh các dòng laptop</strong>: Đánh giá và so sánh chi tiết các dòng laptop phổ biến trên thị trường, ví dụ như MacBook vs. Dell XPS, Lenovo ThinkPad vs. HP Spectre.&nbsp;<strong style=\"background-color: transparent;\">Review chi tiết sản phẩm</strong>: Viết các bài review chuyên sâu về từng mẫu laptop mới ra mắt, kèm theo video unboxing và đánh giá thực tế.&nbsp;<strong style=\"background-color: transparent;\">Case study khách hàng</strong>: Chia sẻ câu chuyện thành công của khách hàng sử dụng laptop của bạn để giải quyết công việc, học tập hoặc các nhu cầu đặc biệt.&nbsp;<strong style=\"background-color: transparent;\">Hướng dẫn bảo dưỡng và tối ưu hóa laptop</strong>: Cung cấp các mẹo và thủ thuật để bảo dưỡng laptop, từ việc vệ sinh máy, cập nhật phần mềm, đến việc nâng cấp linh kiện. I<strong style=\"background-color: transparent;\">nfographic về lịch sử phát triển laptop</strong>: Tạo infographic trực quan về lịch sử phát triển của laptop từ những ngày đầu tiên đến hiện tại.&nbsp;<strong style=\"background-color: transparent;\">Giải đáp thắc mắc</strong>: Tạo mục hỏi đáp (FAQ) hoặc livestream để giải đáp thắc mắc của khách hàng về các vấn đề liên quan đến&nbsp;laptop.</p><blockquote class=\"ql-align-justify\"><em style=\"background-color: transparent;\">Xem thêm: 10+ Mẫu&nbsp;</em><a href=\"https://abcdigi.marketing/blog/content-phu-kien-trang-suc/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(197, 0, 0);\"><em>Content Về Trang Sức Phụ Kiện</em></a><em style=\"background-color: transparent;\">&nbsp;Hấp Dẫn Khách Hàng</em></blockquote><p class=\"ql-align-justify\"><strong style=\"background-color: transparent;\">Video hướng dẫn sử dụng phần mềm</strong>: Hướng dẫn cài đặt và sử dụng các phần mềm phổ biến, từ phần mềm văn phòng, thiết kế đồ họa, đến các công cụ lập trình.&nbsp;<strong style=\"background-color: transparent;\">Bài viết về công nghệ mới</strong>: Cập nhật thông tin về các công nghệ mới nhất trong ngành laptop như chip xử lý mới, màn hình OLED, pin siêu bền,…&nbsp;<strong style=\"background-color: transparent;\">Khuyến mãi và ưu đãi đặc biệt</strong>: Thông báo về các chương trình khuyến mãi, giảm giá, hoặc quà tặng kèm theo khi mua laptop.&nbsp;<strong style=\"background-color: transparent;\">Mẹo tiết kiệm pin và tăng tuổi thọ laptop</strong>: Chia sẻ các mẹo giúp tiết kiệm pin và tăng tuổi thọ của laptop trong quá trình sử dụng.&nbsp;<strong style=\"background-color: transparent;\">Phân tích xu hướng thị trường laptop</strong>: Đưa ra những phân tích, dự đoán về xu hướng thị trường laptop trong tương lai dựa trên dữ liệu và nghiên cứu.&nbsp;<strong style=\"background-color: transparent;\">Blog về phong cách làm việc di động</strong>: Viết blog về các xu hướng làm việc từ xa, học tập online, và cách laptop đóng vai trò quan trọng trong xu hướng này.&nbsp;<strong style=\"background-color: transparent;\">Tổ chức cuộc thi hoặc giveaway</strong>: Tổ chức các cuộc thi hoặc chương trình giveaway trên mạng xã hội để tăng tương tác và thu hút sự chú ý của khách hàng.&nbsp;<strong style=\"background-color: transparent;\">Bảng xếp hạng laptop tốt nhất theo tháng/quý/năm</strong>: Tạo bảng xếp hạng những mẫu laptop tốt nhất theo từng khoảng thời gian, giúp người dùng dễ dàng lựa&nbsp;chọn.</p><blockquote class=\"ql-align-justify\"><em style=\"background-color: transparent;\">Xem thêm: 6 Mẫu&nbsp;</em><a href=\"https://abcdigi.marketing/content-do-gia-dung/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(197, 0, 0);\"><em>Content Đồ Gia Dụng</em></a><em style=\"background-color: transparent;\">&nbsp;Chất Lượng Giúp Tăng Tỷ lệ Chuyển Đổi</em></blockquote><h2 class=\"ql-align-justify\"><strong>II. 7 mẫu content laptop thu hút khách hàng</strong></h2><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 1</strong></h3><p class=\"ql-align-justify\"><span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-6.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 6\" height=\"525\" width=\"301\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;1</em></p><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 2</strong></h3><p class=\"ql-align-justify\">🌟 Top những sản phẩm khẳng định Laptop88 là Trùm Giá Rẻ ✔️ Laptop chính hãng chỉ từ 8 triệu ✅ Phụ kiện giá cực rẻ chỉ từ 75k 🎁 Quà tặng hấp dẫn lên đến 3 triệu ✨ Giá hời như này lựa ngay đi kẻo hết!!! Săn thêm nhiều deal NGON tại đây 👉 https://laptop88.vn/ ——————————– MUA HÀNG TRỰC TIẾP ✆ Liên hệ hotline – 0247.106.9999 – nhánh 2 ✆ Nhắn tin: https://m.me/laptop88.vn ✆ Website: https://laptop88.vn/ ✆ Tiktok: https://www.tiktok.com/@88shareitvn Địa chỉ: ✣ 125 Trần Đại Nghĩa, Hai Bà Trưng, Hà Nội ✣ 34 Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội ✣ LK3C5 Nguyễn Văn Lộc, Hà Đông, Hà Nội (đầu đường Nguyễn Trãi đi vào 200m)&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-10.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 10\" height=\"399\" width=\"475\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;2</em></p><p class=\"ql-align-justify\">Mẫu content laptop 3 Laptop AMD RAM 16GB GIÁ DƯỚI 11 TRIỆU Laptop Lenovo V15 G4 AMN giảm ngay 800K: https://bit.ly/FPTShop_LaptopLenovoV15G4AMN Sở hữu laptop AMD RAM 16GB mà giá chỉ từ 10.69 triệu thì quá là hời luôn luôn. Chưa kể còn có những ưu đãi xịn chỉ có ở FPT Shop: 🔸 Trả góp 0% 🔸 Giảm thêm 2% + Tặng 1 năm bảo hành (áp dụng cho HS – SV) 🔸 Tặng PMH 400K mua LCD MSI, Viewsonic, Xiaomi,Samsung 🔸 Tặng Balo Laptop 🔸 Tặng PMH 200K mua Office Home &amp; Student 2021 khi mua kèm MTXT/Macbook/Ipad/PC Chọn laptop xịn không lo xẹp ví, đến ngay FPT Shop #FPTShop #laptopchinhhang #Lenovo #tragop&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-12.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 12\" height=\"495\" width=\"546\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;3</em></p><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 4</strong></h3><p class=\"ql-align-justify\">ĐÂY LÀ LAPTOP AI ĐÁNG MUA NHẤT THÁNG 5 Một chiếc laptop có thể giúp bạn: ⚜️ Dịch ngôn ngữ trong vòng 10s ⚜️ Phân tích và sử dụng lượng lớn thông tin nhanh chóng và hiệu quả ⚜️ Tối ưu hóa đồ họa và video ⚜️ Trợ lý ảo thông minh ⚜️ Cải thiện đồ họa game tuyệt đỉnh thông qua AI ⚜️ Nhận diện giọng nói và tương tác Laptop MSI Gaming Cyborg 15 AI A1VE-053VN Ultra 7 là một trong những sự lựa chọn được ưa thích nhất khi chọn laptop AI tại FPT Shop. Trải nghiệm ngay: https://bit.ly/FPTShop_MSIGamingCyborg15AI #FPTShop #LaptopRam16GB #Dealhotlaptop #Laptop_Đầyhàng_đủgiá #LaptopAI&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-2.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 2\" height=\"491\" width=\"552\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;4</em></p><blockquote class=\"ql-align-justify\"><em style=\"background-color: transparent;\">Xem thêm: 10 Ý Tưởng &amp; 6 Mẫu&nbsp;</em><a href=\"https://abcdigi.marketing/content-nha-hang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(197, 0, 0);\"><em>Content Nhà Hàng Hay</em></a><em style=\"background-color: transparent;\">&nbsp;Và Thu Hút Khách Hàng</em></blockquote><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 5</strong></h3><p class=\"ql-align-justify\">👻 Cuối tháng tậu Laptop Gaming – TGDĐ có deal cực đỉnh 👻 💥 Cuối tháng sắm ngay laptop gaming ới vô vàn deal hấp dẫn: – Chỉ góp 50k/ngày – Không lãi xuất – Không trả trước 💥 Nhanh tay “giật deal” ngay kẻo lỡ tại: 👉 https://www.thegioididong.com/laptop?g=laptop-gaming #TGDĐ #Laptopgaming #laptop #Backtoschool&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-3.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 3\" height=\"483\" width=\"548\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;5</em></p><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 6</strong></h3><p class=\"ql-align-justify\">🔥Lenovo GeekPro G5000 2024 – Siêu Phẩm Quay Lại Lợi Hại Hơn Xưa🔥 🎁Giảm cực lớn khi đặt mua ngay hôm nay ———-💎💎💎———- ✅Thiết kế đơn giản, thanh lịch, tinh tế ✅Cấu hình mạnh mẽ, đáp ứng đầy đủ các tác vụ nặng ✅Đồ họa mượt mà – Giải trí thả ga ✅Màn hình chân thực, sắc nét ️🎯Đặc biệt: Mức giá “cực mềm” đi kèm khuyến mại cực đỉnh #laptopgaming #lenovo #laptopgiare #geekpro #g5000 #khuyenmailon&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-4-2.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 4 2\" height=\"670\" width=\"1000\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;6</em></p><h1 class=\"ql-align-center\">15 Ý Tưởng &amp; 7 Mẫu Content Laptop Thu Hút Khách Hàng</h1><p class=\"ql-align-center\">bởi&nbsp;<a href=\"https://abcdigi.marketing/author/huynh-quoc-cuong/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(0, 45, 94); background-color: transparent;\">Huỳnh Quốc Cường</a>&nbsp;|&nbsp;<span style=\"background-color: transparent;\">02.07.2024</span>&nbsp;|&nbsp;<a href=\"https://abcdigi.marketing/content-marketing/y-tuong-mau-content-hay/content-nganh-nghe-san-pham/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(0, 45, 94); background-color: transparent;\">Content theo ngành nghề và sản phẩm</a></p><p class=\"ql-align-justify\">Việc có nhiều ý tưởng và mẫu content laptop có thể giúp bạn đa dạng hóa nội dung cho doanh nghiệp. Điều này có thể giúp thu hút khách hàng, gia tăng tương tác và gia tăng doanh số cho thương hiệu. Hãy cùng&nbsp;<strong style=\"background-color: transparent;\">ABC Digi</strong>&nbsp;khám phá&nbsp;<strong style=\"background-color: transparent;\">15 ý tưởng và 7 mẫu content laptop</strong>&nbsp;qua bài viết này nhé!.<a href=\"https://abcdigi.marketing/elearning/khoa-hoc-abc-content-marketing-mien-phi/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(197, 0, 0); background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/04/Khoa-hoc-mien-phi-abcdigi-abc-content-2.gif?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;resize=600%2C450&amp;ssl=1\" alt=\"Khóa học miễn phí content marketing cho người mới bắt đầu\" height=\"450\" width=\"600\"></a></p><h2 class=\"ql-align-justify\"><strong>I. 15 Ý tưởng content laptop hấp dẫn</strong></h2><p class=\"ql-align-justify\"><strong style=\"background-color: transparent;\">Hướng dẫn chọn laptop theo nhu cầu</strong>: Tạo series bài viết hoặc video hướng dẫn người dùng chọn laptop phù hợp với các nhu cầu khác nhau như học tập, công việc, chơi game, thiết kế đồ họa,…&nbsp;<strong style=\"background-color: transparent;\">So sánh các dòng laptop</strong>: Đánh giá và so sánh chi tiết các dòng laptop phổ biến trên thị trường, ví dụ như MacBook vs. Dell XPS, Lenovo ThinkPad vs. HP Spectre.&nbsp;<strong style=\"background-color: transparent;\">Review chi tiết sản phẩm</strong>: Viết các bài review chuyên sâu về từng mẫu laptop mới ra mắt, kèm theo video unboxing và đánh giá thực tế.&nbsp;<strong style=\"background-color: transparent;\">Case study khách hàng</strong>: Chia sẻ câu chuyện thành công của khách hàng sử dụng laptop của bạn để giải quyết công việc, học tập hoặc các nhu cầu đặc biệt.&nbsp;<strong style=\"background-color: transparent;\">Hướng dẫn bảo dưỡng và tối ưu hóa laptop</strong>: Cung cấp các mẹo và thủ thuật để bảo dưỡng laptop, từ việc vệ sinh máy, cập nhật phần mềm, đến việc nâng cấp linh kiện. I<strong style=\"background-color: transparent;\">nfographic về lịch sử phát triển laptop</strong>: Tạo infographic trực quan về lịch sử phát triển của laptop từ những ngày đầu tiên đến hiện tại.&nbsp;<strong style=\"background-color: transparent;\">Giải đáp thắc mắc</strong>: Tạo mục hỏi đáp (FAQ) hoặc livestream để giải đáp thắc mắc của khách hàng về các vấn đề liên quan đến&nbsp;laptop.</p><blockquote class=\"ql-align-justify\"><em style=\"background-color: transparent;\">Xem thêm: 10+ Mẫu&nbsp;</em><a href=\"https://abcdigi.marketing/blog/content-phu-kien-trang-suc/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(197, 0, 0);\"><em>Content Về Trang Sức Phụ Kiện</em></a><em style=\"background-color: transparent;\">&nbsp;Hấp Dẫn Khách Hàng</em></blockquote><p class=\"ql-align-justify\"><strong style=\"background-color: transparent;\">Video hướng dẫn sử dụng phần mềm</strong>: Hướng dẫn cài đặt và sử dụng các phần mềm phổ biến, từ phần mềm văn phòng, thiết kế đồ họa, đến các công cụ lập trình.&nbsp;<strong style=\"background-color: transparent;\">Bài viết về công nghệ mới</strong>: Cập nhật thông tin về các công nghệ mới nhất trong ngành laptop như chip xử lý mới, màn hình OLED, pin siêu bền,…&nbsp;<strong style=\"background-color: transparent;\">Khuyến mãi và ưu đãi đặc biệt</strong>: Thông báo về các chương trình khuyến mãi, giảm giá, hoặc quà tặng kèm theo khi mua laptop.&nbsp;<strong style=\"background-color: transparent;\">Mẹo tiết kiệm pin và tăng tuổi thọ laptop</strong>: Chia sẻ các mẹo giúp tiết kiệm pin và tăng tuổi thọ của laptop trong quá trình sử dụng.&nbsp;<strong style=\"background-color: transparent;\">Phân tích xu hướng thị trường laptop</strong>: Đưa ra những phân tích, dự đoán về xu hướng thị trường laptop trong tương lai dựa trên dữ liệu và nghiên cứu.&nbsp;<strong style=\"background-color: transparent;\">Blog về phong cách làm việc di động</strong>: Viết blog về các xu hướng làm việc từ xa, học tập online, và cách laptop đóng vai trò quan trọng trong xu hướng này.&nbsp;<strong style=\"background-color: transparent;\">Tổ chức cuộc thi hoặc giveaway</strong>: Tổ chức các cuộc thi hoặc chương trình giveaway trên mạng xã hội để tăng tương tác và thu hút sự chú ý của khách hàng.&nbsp;<strong style=\"background-color: transparent;\">Bảng xếp hạng laptop tốt nhất theo tháng/quý/năm</strong>: Tạo bảng xếp hạng những mẫu laptop tốt nhất theo từng khoảng thời gian, giúp người dùng dễ dàng lựa&nbsp;chọn.</p><blockquote class=\"ql-align-justify\"><em style=\"background-color: transparent;\">Xem thêm: 6 Mẫu&nbsp;</em><a href=\"https://abcdigi.marketing/content-do-gia-dung/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(197, 0, 0);\"><em>Content Đồ Gia Dụng</em></a><em style=\"background-color: transparent;\">&nbsp;Chất Lượng Giúp Tăng Tỷ lệ Chuyển Đổi</em></blockquote><h2 class=\"ql-align-justify\"><strong>II. 7 mẫu content laptop thu hút khách hàng</strong></h2><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 1</strong></h3><p class=\"ql-align-justify\"><span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-6.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 6\" height=\"525\" width=\"301\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;1</em></p><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 2</strong></h3><p class=\"ql-align-justify\">🌟 Top những sản phẩm khẳng định Laptop88 là Trùm Giá Rẻ ✔️ Laptop chính hãng chỉ từ 8 triệu ✅ Phụ kiện giá cực rẻ chỉ từ 75k 🎁 Quà tặng hấp dẫn lên đến 3 triệu ✨ Giá hời như này lựa ngay đi kẻo hết!!! Săn thêm nhiều deal NGON tại đây 👉 https://laptop88.vn/ ——————————– MUA HÀNG TRỰC TIẾP ✆ Liên hệ hotline – 0247.106.9999 – nhánh 2 ✆ Nhắn tin: https://m.me/laptop88.vn ✆ Website: https://laptop88.vn/ ✆ Tiktok: https://www.tiktok.com/@88shareitvn Địa chỉ: ✣ 125 Trần Đại Nghĩa, Hai Bà Trưng, Hà Nội ✣ 34 Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội ✣ LK3C5 Nguyễn Văn Lộc, Hà Đông, Hà Nội (đầu đường Nguyễn Trãi đi vào 200m)&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-10.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 10\" height=\"399\" width=\"475\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;2</em></p><p class=\"ql-align-justify\">Mẫu content laptop 3 Laptop AMD RAM 16GB GIÁ DƯỚI 11 TRIỆU Laptop Lenovo V15 G4 AMN giảm ngay 800K: https://bit.ly/FPTShop_LaptopLenovoV15G4AMN Sở hữu laptop AMD RAM 16GB mà giá chỉ từ 10.69 triệu thì quá là hời luôn luôn. Chưa kể còn có những ưu đãi xịn chỉ có ở FPT Shop: 🔸 Trả góp 0% 🔸 Giảm thêm 2% + Tặng 1 năm bảo hành (áp dụng cho HS – SV) 🔸 Tặng PMH 400K mua LCD MSI, Viewsonic, Xiaomi,Samsung 🔸 Tặng Balo Laptop 🔸 Tặng PMH 200K mua Office Home &amp; Student 2021 khi mua kèm MTXT/Macbook/Ipad/PC Chọn laptop xịn không lo xẹp ví, đến ngay FPT Shop #FPTShop #laptopchinhhang #Lenovo #tragop&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-12.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 12\" height=\"495\" width=\"546\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;3</em></p><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 4</strong></h3><p class=\"ql-align-justify\">ĐÂY LÀ LAPTOP AI ĐÁNG MUA NHẤT THÁNG 5 Một chiếc laptop có thể giúp bạn: ⚜️ Dịch ngôn ngữ trong vòng 10s ⚜️ Phân tích và sử dụng lượng lớn thông tin nhanh chóng và hiệu quả ⚜️ Tối ưu hóa đồ họa và video ⚜️ Trợ lý ảo thông minh ⚜️ Cải thiện đồ họa game tuyệt đỉnh thông qua AI ⚜️ Nhận diện giọng nói và tương tác Laptop MSI Gaming Cyborg 15 AI A1VE-053VN Ultra 7 là một trong những sự lựa chọn được ưa thích nhất khi chọn laptop AI tại FPT Shop. Trải nghiệm ngay: https://bit.ly/FPTShop_MSIGamingCyborg15AI #FPTShop #LaptopRam16GB #Dealhotlaptop #Laptop_Đầyhàng_đủgiá #LaptopAI&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-2.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 2\" height=\"491\" width=\"552\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;4</em></p><blockquote class=\"ql-align-justify\"><em style=\"background-color: transparent;\">Xem thêm: 10 Ý Tưởng &amp; 6 Mẫu&nbsp;</em><a href=\"https://abcdigi.marketing/content-nha-hang/\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: rgb(197, 0, 0);\"><em>Content Nhà Hàng Hay</em></a><em style=\"background-color: transparent;\">&nbsp;Và Thu Hút Khách Hàng</em></blockquote><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 5</strong></h3><p class=\"ql-align-justify\">👻 Cuối tháng tậu Laptop Gaming – TGDĐ có deal cực đỉnh 👻 💥 Cuối tháng sắm ngay laptop gaming ới vô vàn deal hấp dẫn: – Chỉ góp 50k/ngày – Không lãi xuất – Không trả trước 💥 Nhanh tay “giật deal” ngay kẻo lỡ tại: 👉 https://www.thegioididong.com/laptop?g=laptop-gaming #TGDĐ #Laptopgaming #laptop #Backtoschool&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-3.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 3\" height=\"483\" width=\"548\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;5</em></p><h3 class=\"ql-align-justify\"><strong>Mẫu content laptop 6</strong></h3><p class=\"ql-align-justify\">🔥Lenovo GeekPro G5000 2024 – Siêu Phẩm Quay Lại Lợi Hại Hơn Xưa🔥 🎁Giảm cực lớn khi đặt mua ngay hôm nay ———-💎💎💎———- ✅Thiết kế đơn giản, thanh lịch, tinh tế ✅Cấu hình mạnh mẽ, đáp ứng đầy đủ các tác vụ nặng ✅Đồ họa mượt mà – Giải trí thả ga ✅Màn hình chân thực, sắc nét ️🎯Đặc biệt: Mức giá “cực mềm” đi kèm khuyến mại cực đỉnh #laptopgaming #lenovo #laptopgiare #geekpro #g5000 #khuyenmailon&nbsp;<span style=\"background-color: transparent;\"><img src=\"https://e83rrxtpkpf.exactdn.com/wp-content/uploads/2024/06/content-laptop-4-2.jpg?strip=all&amp;lossy=1&amp;quality=85&amp;webp=80&amp;avif=70&amp;sharp=1&amp;ssl=1\" alt=\"content laptop 4 2\" height=\"670\" width=\"1000\"></span></p><p class=\"ql-align-center\"><em style=\"background-color: transparent;\">Mẫu content laptop&nbsp;6</em></p><p><br></p>', 'baiviets/Pn6Wpe0XlTMeQyHC6ezIt0NffPdNhIvyIZ8wsXc7.jpg', 1, 1, 1, '2025-06-24 05:33:45', '2025-06-24 05:34:09', NULL);
INSERT INTO `bai_viets` (`id`, `tieu_de`, `noi_dung`, `anh_bai_viet`, `user_id`, `danh_muc_id`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Cách chọn mua laptop phù hợp nhu cầu sử dụng', '<p><em>Có thể bạn là sinh viên, người làm việc văn phòng, thiết kế đồ họa, lập trình, chơi game,... thì để sở hữu chọn mua 1 chiếc laptop phù hợp với nhu cầu sử dụng rất quan trọng, việc này giúp ích bạn tối ưu tiết kiệm chi phí và mục đích sử dụng. Qua bài viết này, Thinkpro sẽ mách bạn kinh nghiệm&nbsp;</em><a href=\"https://thinkpro.vn/noi-dung/bat-mi-cach-chon-mua-laptop-phu-hop-nhu-cau-su-dung\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\"><em>cách chọn mua laptop</em></a><em>&nbsp;phù hợp với nhu cầu của bạn, mời bạn đọc thêm nhé!</em></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/cach_chon_mua_laptop_1715880012614.png\" alt=\"Bật mí cách chọn mua laptop \"></p><p>Bật mí cách chọn mua laptop</p><p><strong>Mục lục bài viết</strong></p><h2><strong style=\"color: rgb(0, 0, 0);\">I. Tìm hiểu và xác định nhu cầu sử dụng</strong></h2><h3><span style=\"color: rgb(0, 0, 0);\">1. Laptop học tập dành cho sinh viên</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Nếu bạn là sinh viên đang cần sở hữu 1 chiếc laptop, việc bạn cần quan tâm đến các yếu tố chính cần được ưu tiên như: ngân sách chi phí, thời lượng sử dụng pin, tính di động. Mình sẽ chi tiết các yếu tố trên cụ thể như sau:</span></p><ul><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Ngân sách chi phí:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Có nhiều mức giá cho 1 chiếc laptop sinh viên, mức giao động từ&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">10 triệu - 20 triệu&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">hoặc cũng có thể hơn. Tuy nhiên thì vẫn tùy thuộc vào ngành học của bạn là gì, có đòi hỏi cấu hình cao hay thấp, thì lúc này bạn sẽ xác định được gói ngân sách phù hợp với bạn.</span></li></ul><p><span style=\"color: rgb(0, 0, 0);\">Ở đây mình có thể ví dụ, nếu bạn đang theo học ngành thiết kế đồ họa, cần phải sử dụng các phần như Photoshop, AI, Premiere,.. thì đòi hỏi cấu hình cần phải có CPU và Card đồ họa cao cũng như RAM cần lớn để đáp ứng được các tác vụ đa nhiệm. Lúc này ngân sách để mua chiếc laptop sẽ giao động tối thiểu từ&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">15 triệu - 25 triệu</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;hoặc có thể hơn. Nếu bạn có dư ngân sách bạn có thể lựa chọn các cấu hình tốt hơn.</span></p><p><strong style=\"color: rgb(0, 0, 0);\">Xem thêm:</strong>Top 10&nbsp;<a href=\"https://thinkpro.vn/noi-dung/top-10-laptop-cho-sinh-vien-cong-nghe-thong-tin-gia-tot-dang-mua\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">laptop cho sinh viên công nghệ thông tin</a>&nbsp;giá tốt, đáng mua</p><ul><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Thời lượng pin:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Khi bạn là sinh viên, việc di chuyển đi học hằng ngày là bắt buộc, cho nên để chọn mua chiếc laptop bạn nên quan tâm đến dung lượng pin. Có nhiều laptop có dung lượng sử dụng liên tiếp 6-8 tiếng mà không cần sạc, đây là gợi ý tư vấn của mình dành đến bạn nên lựa chọn những chiếc laptop có dung lượng pin lớn.</span></li></ul><p class=\"ql-align-justify\"><strong>Xem thêm:</strong>&nbsp;<a href=\"https://thinkpro.vn/noi-dung/cach-kiem-tra-pin-laptop-dung-luong-tinh-trang-va-do-chai-pin\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">Cách kiểm tra pin Laptop</a>: Dung lượng, tình trạng và độ chai Pin</p><ul><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Tính di động:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Vì tính chất phải mang theo bên mình đến trường lớp thì yếu tố nhỏ gọn để di chuyển cũng rất là quan trọng. Bạn có thể cân nhắc lựa chọn các mẫu laptop nhỏ gọn để di chuyển đến lớp học nha. Ở đây mình có thể gợi ý bạn các mẫu laptop có kích thước&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">13 inch</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;nếu bạn theo học ngành báo chí, còn nếu bạn theo học ngành đồ họa thì sử dụng kích thước lớn hơn là&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">15 inch</strong><span style=\"color: rgb(0, 0, 0);\">.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Các mẫu laptop như&nbsp;</span><a href=\"https://thinkpro.vn/laptop/dell-xps-13-plus-9320\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>Dell XPS 13</u></a><span style=\"color: rgb(0, 0, 0);\">,&nbsp;</span><a href=\"https://thinkpro.vn/laptop/macbook-air-15-inch-2023\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>MacBook Air</u></a><span style=\"color: rgb(0, 0, 0);\">&nbsp;và&nbsp;</span><a href=\"https://thinkpro.vn/laptop/hp-envy-14-2-in-1-2023\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>HP Envy</u></a><span style=\"color: rgb(0, 0, 0);\">&nbsp;đều cung cấp sự cân bằng tốt giữa hiệu suất và với cấu hình mạnh mẽ, thiết kế gọn nhẹ và thời lượng pin ấn tượng.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/laptop_danh_cho_sinh_vien_1715880293613.jpg\" alt=\"Cách chọn mua laptop cho sinh viên\"></p><p>Cách chọn mua laptop cho sinh viên</p><h3><span style=\"color: rgb(0, 0, 0);\">2. Laptop văn phòng dành cho người đi làm</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Khi tìm kiếm laptop cho mục đích sử dụng đi làm thì bạn cần quan tâm đến cấu hình có hiệu suất cao, các tính năng bảo mật, gọn nhẹ, ngân sách chi phí, cổng kết nối,... Mình sẽ tư vấn cụ thể các yếu tố mà bạn cần nên quan tâm và xác định:</span></p><ul><li class=\"ql-align-justify\"><strong>Ngân sách:&nbsp;</strong>Laptop dành cho người đi làm có nhiều phân khúc khác nhau từ giá rẻ dưới 10 triệu cho đến cao cấp trên 30 triệu. Cho nên, việc đầu tiên bạn cần xác định xem mình có thể chi trả cho chiếc laptop bạn cần mua là bao nhiêu, rồi từ đó bạn có thể tập trung thu hẹp được phạm vi lựa chọn mẫu laptop cho phù hợp.</li><li class=\"ql-align-justify\"><strong>Kích thước trọng lượng:&nbsp;</strong>Có nhiều mẫu laptop có nhiều kích thước trọng lượng khác nhau từ&nbsp;<strong>13 inch - 15.6 inch</strong>, mình sẽ tư vấn chia ra thành 2 dạng nhu cầu cho bạn như sau:</li><li class=\"ql-indent-1 ql-align-justify\">Công việc đòi hỏi&nbsp;<strong>di chuyển nhiều</strong>&nbsp;thì nên lựa chọn mẫu laptop có kích thước&nbsp;<strong>13-14 inch</strong>&nbsp;và trọng lượng nhẹ trung bình tối thiếu dưới&nbsp;<strong>1.5kg</strong></li><li class=\"ql-indent-1 ql-align-justify\">Công việc&nbsp;<strong>không yêu cầu di chuyển nhiều&nbsp;</strong>thì bạn có thể lựa chọn các mẫu máy laptop có kích thước màn hình lớn như&nbsp;<strong>15.6 inch</strong>&nbsp;chẳng hạn, để hỗ trợ bạn làm việc thoải mái hơn.</li><li class=\"ql-align-justify\"><strong>Cấu hình:&nbsp;</strong><span style=\"color: rgb(13, 13, 13);\">Dựa vào mục tiêu và công việc cụ thể mà bạn sẽ thực hiện trên máy tính, bạn có thể chọn được cấu hình phù hợp nhất để đảm bảo hiệu suất làm việc tối ưu.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nếu công việc chủ yếu của bạn tập trung vào các nhiệm vụ văn phòng cơ bản như soạn thảo văn bản, tạo bảng tính hay trình diễn PowerPoint, một cấu hình tầm trung với RAM từ 4GB đến 8GB sẽ là lựa chọn phù hợp.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nếu công việc của bạn đòi hỏi sự sáng tạo và chỉnh sửa đồ họa, video hay hình ảnh, thì bạn cần tìm đến một cấu hình mạnh mẽ hơn. RAM có dung lượng từ 8GB trở lên sẽ giúp xử lý các tác vụ đòi hỏi nhiều tài nguyên một cách nhanh chóng và hiệu quả.</span></p><ul><li class=\"ql-align-justify\"><strong>Màn hình:&nbsp;</strong><span style=\"color: rgb(13, 13, 13);\">Việc chọn kích thước màn hình phù hợp sẽ là một yếu tố quyết định đối với trải nghiệm làm việc của bạn. Kích thước màn hình không chỉ ảnh hưởng đến sự thoải mái khi sử dụng mà còn đem lại hiệu suất làm việc tối ưu.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nếu công việc của bạn thường xuyên của bạn là tiếp xúc với số liệu, nhập liệu hoặc thiết kế thì bạn nên việc chọn một chiếc laptop với màn hình 15.6 inch.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nếu công việc của bạn thường xuyên đòi hỏi sự di chuyển và gặp gỡ khách hàng thì việc chọn một chiếc laptop với màn hình nhỏ hơn như 13.3 inch hoặc 14 inch sẽ là sự lựa chọn thông minh.</span></p><ul><li class=\"ql-align-justify\"><strong>Bàn phím và touchpad:&nbsp;</strong><span style=\"color: rgb(13, 13, 13);\">Với tính chất công việc đòi hỏi nhiều sự tập trung và làm việc với các con số, các con chữ thì bạn nên chọn một chiếc laptop được trang bị bàn phím rộng và có độ nảy tốt, điều này sẽ mang lại trải nghiệm gõ phím một cách thoải mái và hiệu quả nhất.</span></li><li class=\"ql-align-justify\"><strong>Thời lượng pin:&nbsp;</strong><span style=\"color: rgb(13, 13, 13);\">Trong quá trình chọn mua laptop, bạn nên tìm kiếm các model có thể hoạt động từ 5 đến 8 tiếng mà không cần phải cắm sạc. Điều này sẽ đảm bảo rằng bạn có đủ thời gian để hoàn thành công việc một cách liền mạch mà không cần phải lo lắng về việc hết pin giữa chừng cũng như mang lại sự thuận tiện khi bạn không cần phải mang theo dây sạc khi cần phải di chuyển trong văn phòng.</span></li><li class=\"ql-align-justify\"><strong>Cổng kết nối:&nbsp;</strong>Làm việc văn phòng chắc chắn không thể thiếu<span style=\"color: rgb(13, 13, 13);\">&nbsp;thuyết trình hay chuyển dữ liệu, vì vậy việc chọn một chiếc laptop được trang bị các cổng kết nối đa dạng sẽ là một yếu tố quan trọng không thể bỏ qua. Các cổng như USB, HDMI, đầu đọc thẻ nhớ, Ethernet có thể giúp bạn dễ dàng kết nối được với các thiết bị ngoại vi, máy chiếu hoặc mạng internet vô cùng tiện lợi.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Ví dụ đối với những người làm việc trong lĩnh vực thiết kế hoặc lập trình, các mẫu laptop như&nbsp;</span><a href=\"https://thinkpro.vn/laptop/macbook-pro-13-apple-m2\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>MacBook Pro</u></a><span style=\"color: rgb(0, 0, 0);\">,&nbsp;</span><a href=\"https://thinkpro.vn/laptop/dell-xps-15-9520\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>Dell XPS 15</u></a><span style=\"color: rgb(0, 0, 0);\">&nbsp;và&nbsp;</span><a href=\"https://thinkpro.vn/laptop-thinkpad-x1-carbon\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>Lenovo ThinkPad X1 Carbon</u></a><span style=\"color: rgb(0, 0, 0);\">&nbsp;nổi bật nhờ cấu hình mạnh mẽ với bộ vi xử lý hiệu năng cao,&nbsp;</span><a href=\"https://thinkpro.vn/ram\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>RAM</u></a><span style=\"color: rgb(0, 0, 0);\">&nbsp;lớn và ổ cứng SSD tốc độ nhanh, bạn có thể tham khảo thêm các sản phẩm trên đang được Thinkpro kinh doanh nha.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/16/cach_chon_mua_laptop_van_phong_1715878549765.jpg\" alt=\"Cách chọn mua laptop văn phòng\"></p><p>Cách chọn mua laptop văn phòng dành cho người đi làm</p><h3><span style=\"color: rgb(0, 0, 0);\">3. Laptop chơi game, giải trí</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Khi lựa chọn laptop chơi game đòi hỏi khả năng đồ họa, tốc độ bộ vi xử lý CPU, card đồ họa và hệ thống làm mát là những yếu tố quan trọng hàng đầu.</span></p><ul><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Card đồ họa (GPU):</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;mạnh mẽ như NVIDIA GeForce RTX hoặc AMD Radeon RX đảm bảo hình ảnh đồ họa được nét chất lượng cao, chân thực, giúp bạn có trải nghiệm chơi game giải trí được tốt nhất.</span></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Bộ vi xử lý (CPU):</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Mình gợi ý cho bạn nên lựa chọn Intel Core i7/i9 hoặc AMD Ryzen 7/9 sẽ mang lại hiệu suất xử lý vượt trội, giảm thiểu độ trễ trong các trò chơi đòi hỏi cao về cấu hình của các game AAA ở mức cài đặt cao (max setting).</span></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Hệ thống làm mát, quạt tản nhiệt:</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;Giúp duy trì nhiệt độ ổn định cho các thiết bị bên trong máy được mát trong suốt quá trình chơi game giải trí, ngăn chặn hiện tượng quá nhiệt và cũng như là bảo vệ duy trì tuổi thọ các linh kiện bên trong máy được lâu hơn.</span></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">RAM:&nbsp;</strong>Mức RAM 8GB có thể đáp ứng được nhu cầu cơ bản khi chơi game, nhưng để có trải nghiệm chơi game mượt mà và tối ưu nhất thì bạn có thể cân nhắc đến những chiếc laptop với dung lượng RAM 16GB sẽ mang lại hiệu quả và tiện lợi hơn trong việc thỏa mãn đam mê game của bạn.</li><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Ổ cứng:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Việc lựa chọn ổ cứng kết hợp giữ SSD và HDD&nbsp;</span><span style=\"color: rgb(13, 13, 13);\">là một lựa chọn thông minh giúp tối ưu hiệu suất và tiết kiệm chi phí. Với ổ cứng SSD, người chơi có thể lưu trữ hàng trăm GB dung lượng game PC khủng một cách nhanh chóng và dễ dàng. Tuy nhiên, ổ cứng SSD thuộc phân khúc giá cao cấp, vì vậy để tối ưu chi phí thì bạn nên chọn kết hợp cùng HDD. Bởi vì, SSD sẽ đảm bảo tốc độ truy cập nhanh chóng và mượt mà, trong khi HDD sẽ cung cấp dung lượng lưu trữ lớn và chi phí hợp lý.</span></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Màn hình:&nbsp;</strong><span style=\"color: rgb(0, 0, 0);\">Để chơi game, giải trí tốt nhất, bạn nên chọn những chiếc laptop có kích thước màn hình từ 15 - 16 inch trở lên. Kích thước này sẽ không chỉ đáp ứng được nhu cầu chơi game, giải trí của người dùng mà còn thuận tiện để mang theo bên mình. Chất lượng hiển thị màn hình Full HD phần nào đã có thể đáp ứng được sự tương đối và đủ dùng dành cho người chơi. Tuy nhiên, nếu bạn muốn hình ảnh hiện thị đẹp và sống động hơn thì bạn có thể sử dụng những chiếc laptop có chất lượng màn hình 3K hoặc 4K.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Những mẫu laptop nổi tiếng về hiệu suất chơi game như:&nbsp;</span><a href=\"https://thinkpro.vn/laptop-gigabyte-gaming\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">Asus ROG Gaming, GIGABYTE Gaming</a>,&nbsp;<a href=\"https://thinkpro.vn/laptop-acer-nitro\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">Acer Nitro</a><span style=\"color: rgb(0, 0, 0);\">,... đều được đánh giá cao nhờ cấu hình mạnh mẽ, khả năng làm mát tốt và thiết kế cực ngầu theo phong cách gaming, đáp ứng tốt nhu cầu của game thủ chuyên nghiệp.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/cac_chon_mua_laptop_choi_game_1715880409752.jpg\" alt=\"Cách chọn mua laptop chơi game\"></p><p>Cách chọn mua laptop chơi game, giải trí.</p><h2><strong style=\"color: rgb(0, 0, 0);\">II. Các thông số kỹ thuật chính khi chọn mua laptop</strong></h2><h3><span style=\"color: rgb(0, 0, 0);\">1</span><span style=\"color: inherit;\">. Tìm hiểu chi tiết về bộ vi xử lý (CPU)</span></h3><p><span style=\"color: rgb(0, 0, 0);\">Trên thị trường hiện nay, bộ vi xử lý thông dụng được nhiều người tin tưởng lựa chọn đến từ 2 thương hiệu lớn là Intel và AMD. Mình sẽ tạo bảng so sánh đánh giá chung, để bạn có thể tìm hiểu thêm về 2 thương hiệu cung cấp CPU này nhằm phụ vụ cho việc bạn lựa chọn mua chiếc laptop cho phù hợp với nhu cầu của mình nhé.</span></p><p><strong style=\"color: rgb(0, 0, 0);\">Bảng so sánh - đánh giá CPU của Intel và AMD:</strong></p><p class=\"ql-align-center\"><strong style=\"color: rgb(13, 13, 13);\">Tiêu chí</strong></p><p class=\"ql-align-center\"><strong style=\"color: rgb(13, 13, 13);\">Intel</strong></p><p class=\"ql-align-center\"><strong style=\"color: rgb(13, 13, 13);\">AMD</strong></p><p><span style=\"color: rgb(13, 13, 13);\">Hiệu suất</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Đa dạng các dòng CPU như i3, i5, i7, i9 có nhiều lựa chọn cho các nhu cầu sử dụng khác nhau. Intel thường có hiệu suất tốt hơn trong một số ứng dụng nhất định, nhưng giá thành cao hơn.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">AMD cung cấp hiệu suất mạnh mẽ với giá cả hợp lý hơn so với Intel. Các dòng CPU Ryzen mới nhất thường có hiệu suất đối đầu với Intel và giá thường rẻ hơn.</span></p><p><span style=\"color: rgb(13, 13, 13);\">Giá cả</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường có giá cao hơn so với các sản phẩm tương đương của AMD.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường có giá rẻ hơn so với Intel cho cùng một cấu hình và hiệu suất tương đương.</span></p><p><span style=\"color: rgb(13, 13, 13);\">Tiết kiệm năng lượng</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Có các dòng CPU tiết kiệm năng lượng nhưng có thể không hiệu quả bằng các dòng CPU của AMD.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Có các dòng CPU tiết kiệm năng lượng với hiệu suất tốt, đặc biệt là dòng&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">Ryzen 4000 series</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;trên laptop.</span></p><p><span style=\"color: rgb(13, 13, 13);\">Tương thích phần cứng</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường tương thích tốt hơn với các loại phần cứng khác nhau như card đồ họa và các thiết bị ngoại vi.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Cũng tương thích tốt với nhiều loại phần cứng, nhưng có thể gặp một số vấn đề với một số thiết bị cũ hoặc không được hỗ trợ rộng rãi như của Intel.</span></p><p><span style=\"color: rgb(13, 13, 13);\">Công nghệ mới nhất</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường có sự ra mắt sớm hơn các công nghệ mới như&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">Wi-Fi 6E</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;và&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">Thunderbolt 4</strong><span style=\"color: rgb(13, 13, 13);\">.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường hỗ trợ các công nghệ mới nhất như&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">PCIe 4.0</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;và&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">USB 4.0</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;với mức giá tốt hơn so với Intel.</span></p><p><span style=\"color: rgb(13, 13, 13);\">Hỗ trợ kỹ thuật và bảo hành</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Có một mạng lưới rộng lớn của các nhà sản xuất laptop và trung tâm bảo hành trên toàn thế giới.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Cũng có một mạng lưới hỗ trợ khá mạnh mẽ, nhưng không rộng rãi như của Intel.</span></p><p class=\"ql-align-justify\">Trên thực tế, quyết định giữa Intel và AMD phụ thuộc vào nhu cầu cụ thể bạn và ngân sách. AMD thường được đánh giá cao về giá trị và hiệu suất, trong khi Intel thường được xem là lựa chọn an toàn với hiệu suất ổn định và tương thích tốt hơn.</p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/16/so_sanh_intel_voi_amd_1715878752922.jpg\" alt=\"So sánh Intel và AMD\"></p><p><br></p><h3>2. Cân nhắc việc lựa chọn bộ nhớ đệm (RAM)</h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">RAM đóng vai trò quan trọng trong hiệu suất của một chiếc laptop, ảnh hưởng trực tiếp đến khả năng xử lý nhiều tác vụ cùng lúc.</span></p><ul><li class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Đối với người dùng chủ yếu duyệt web và thực hiện các tác vụ cơ bản,&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">8GB RAM</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;là đủ để đảm bảo trải nghiệm mượt mà.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Nếu bạn thường xuyên sử dụng trình đa nhiệm, tức là mở nhiều ứng dụng hoặc làm việc với các tệp lớn mình gợi ý&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">16GB RAM trở lên</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;sẽ giúp duy trì hiệu suất ổn định mà không gặp hiện tượng chậm máy.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Đối với game thủ hoặc những người làm việc với các ứng dụng đồ họa nặng thì&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">32GB RAM hoặc hơn</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;sẽ cung cấp dung lượng bộ nhớ đệm cần thiết để xử lý các trò chơi đòi hỏi dung lượng cao và các phần mềm chuyên nghiệp mà không gặp hiện tượng giật lag hay bị đứng máy.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Tóm lại, lựa chọn lượng RAM phù hợp với nhu cầu sử dụng sẽ giúp bạn tận dụng tối đa hiệu suất của chiếc laptop.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Xem thêm:</strong><a href=\"https://thinkpro.vn/noi-dung/ram-la-gi-ram-may-tinh-dong-vai-tro-gi-quan-trong\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">RAM là gì? RAM máy tính đóng vai trò gì quan trọng?</a></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/cach_chon_mua_laptop_theo_nhu_cau_su_dung_1715936813543.jpg\" alt=\"Cách mua laptop phù hợp với nhu cầu sử dụng - lựa chọn dung lượng RAM\"></p><p>Cách mua laptop phù hợp với nhu cầu sử dụng - lựa chọn dung lượng RAM</p><h3><span style=\"color: inherit;\">3. Giải pháp lưu trữ: sử dụng ổ cứng lữu trữ dữ liệu</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">SSD và HDD có sự khác biệt rõ rệt về tốc độ truy cập dữ liệu, độ bền và giá cả. Mình sẽ so sánh đến bạn ở bảng dưới đây để bạn tham khảo và có góc nhìn trực quan hơn.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Bảng so sánh SSD và HDD:</strong></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Tiêu chí</strong></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">SSD</strong></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">HDD</strong></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Tốc độ truy cập</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Cao hơn đáng kể, với tốc độ đọc/ghi dữ liệu nhanh hơn.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Chậm hơn so với SSD, có thời gian truy cập dữ liệu lâu hơn.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Độ bền</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường có tuổi thọ cao hơn do không có bộ phận cơ học, ít bị hỏng hóc do va đập hoặc rung động.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Dễ bị hỏng hóc do chứa các bộ phận cơ học, đặc biệt khi di chuyển hoạt động.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Tiết kiệm năng lượng</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Tiêu thụ ít điện năng hơn so với HDD, giúp tiết kiệm pin cho laptop và giảm chi phí điện năng.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Tiêu thụ nhiều điện năng hơn so với SSD, làm tăng nhiệt độ và tiêu hao pin.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Trọng lượng</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nhẹ hơn, phù hợp cho laptop di động và thiết bị nhỏ gọn.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nặng hơn do có các bộ phận cơ học, không phù hợp cho thiết bị di động.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Dung lượng</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Có sẵn dung lượng lớn hơn, từ vài GB đến nhiều TB.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Có dung lượng lớn hơn, giá thành thấp hơn cho dung lượng cao.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Giá cả</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường đắt hơn so với HDD, nhưng giảm dần theo thời gian.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường rẻ hơn so với SSD, phù hợp cho người dùng có ngân sách hạn chế.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Nếu bạn ưu tiên hiệu suất và tốc độ, nên chọn SSD. Ngược lại, nếu bạn cần dung lượng lưu trữ lớn với ngân sách hạn chế, HDD sẽ là lựa chọn phù hợp. Để tận dụng cả hai, bạn có thể sử dụng kết hợp SSD cho hệ điều hành và ứng dụng, cùng với HDD để lưu trữ dữ liệu.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/so_sanh_o_cung_ssd_va_hdd_1715881183293.jpg\" alt=\"So sánh ổ cứng SSD và HDD\"></p><p>So sánh ổ cứng SSD và HDD</p><h2 class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">III. Thiết kế và tính di dộng có thể dễ di chuyển khi mua laptop</strong></h2><h3 class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">1. Đánh giá trọng lượng và kích thước laptop</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Kích thước và trọng lượng của laptop có tác động lớn đến việc di chuyển mang theo bên mình khi nhu cầu của bạn phải di chuyển thường xuyên đến nhiều nơi. Một chiếc laptop nhẹ và mỏng dễ dàng mang theo sẽ là sự lựa chọn lý tưởng cho bạn.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Các laptop với màn hình&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">13-14 inch</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;thường cân đối tốt giữa tính di động và không gian làm việc, phù hợp cho các tác vụ văn phòng và giải trí cơ bản.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Ngược lại, nếu bạn cần một màn hình lớn hơn&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">15-17 inch</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;để thiết kế đồ họa, lập trình hoặc chơi game, hãy cân nhắc trọng lượng và kích thước lớn hơn sẽ ảnh hưởng đến sự tiện lợi khi mang theo.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Lựa chọn laptop phù hợp với nhu cầu di chuyển của bạn là rất quan trọng để cân bằng giữa hiệu suất và tính tiện d</span>ụng của nó.</p><p class=\"ql-align-justify\"><strong>Xem thêm:</strong>&nbsp;<a href=\"https://thinkpro.vn/noi-dung/tong-hop-cac-kich-thuoc-man-hinh-laptop-thong-dung-hien-nay\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">Tổng hợp các kích thước màn hình laptop thông dụng hiện nay</a></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/trong_luong_va_kich_thuoc_laptop_1715881125273.jpg\" alt=\"Đánh giá trọng lượng và kích thước laptop\"></p><p>Đánh giá trọng lượng và kích thước laptop cho phù hợp với nhu cầu sử dụng của bạn.</p><h3 class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">2. Lưu ý thời lượng pin</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Thời lượng pin là yếu tố quan trọng mà bạn cần xem xét ưu tiên khi chọn mua laptop, đặc biệt dựa trên nhu cầu sử dụng của bạn.&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">Đối với sinh viên hoặc người làm việc từ xa</strong><span style=\"color: rgb(0, 0, 0);\">, laptop có thời lượng pin từ&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">8-12 giờ</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;là lý tưởng, nó có thể đảm bảo cho bạn học tập và làm việc cả ngày mà không cần sạc.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Đối với những người dùng thường xuyên di chuyển</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;như doanh nhân, nên tìm kiếm các mẫu có thể kéo dài từ&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">12-16 giờ</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;để đảm bảo luôn sẵn sàng công việc được suôn sẻ xử lý kịp thời.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Một số laptop nổi bật với pin bền lâu mà mình có thể ý đề xuất:</span></p><ul><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Từ 8-12 giờ:&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/asus-rog-zephyrus-g14-2023\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Asus ROG Zephyrus G14</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/dell-xps-14-9440\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">Dell XPS 14</a>,&nbsp;<a href=\"https://thinkpro.vn/laptop-thinkpad-x1-carbon\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>ThinkPad X1 Carbon</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/dell-latitude-7300\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Dell Latitude E6430</strong></a></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Từ 12-16 giờ:</strong><a href=\"https://thinkpro.vn/laptop/lg-gram-16-2023\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">LG Gram 16</a></li></ul><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/thoi_luong_pin_cua_laptop_1715881215435.jpg\" alt=\"Thời lượng pin laptop\"></p><p>Nên quan tâm đến thời lượng pin khi chọn mua laptop</p><h2 class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">IV. Hệ điều hành của laptop nên sử dụng cho phù hợp nhu cầu</strong></h2><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Để sử dụng được laptop yêu cầu đòi hỏi thiết yếu rằng chiếc laptop phải có hệ điều hành, trên thị trường hiện nay, có 3 hệ điều hành phổ biến:&nbsp;</span><strong style=\"color: rgb(0, 0, 0);\">Windows, macOS, Linux</strong><span style=\"color: rgb(0, 0, 0);\">. Thông qua bài viết này, mình có tạo bảng so sáng các tiêu chí ưu nhược điểm của 3 hệ điều hành này, để bạn có thể lựa chọn cho phù hợp khi mua laptop mới.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Bảng so sánh hệ điều hành Windows, macOS, Linux:</strong></p><p class=\"ql-align-justify\"><strong>Tiêu chí</strong></p><p class=\"ql-align-justify\"><strong>Windows</strong></p><p class=\"ql-align-justify\"><strong>macOS</strong></p><p class=\"ql-align-justify\"><strong>Linux</strong></p><p class=\"ql-align-justify\"><strong>Giao diện người dùng</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thân thiện, dễ sử dụng, phổ biến với nhiều người dùng.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Giao diện trực quan, thiết kế đẹp, mượt mà. Tối ưu hóa trải nghiệm người dùng.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Giao diện đa dạng, tùy biến cao, nhiều giao diện khác nhau (GNOME, KDE, XFCE, v.v.), kén người sử dụng và đòi hỏi người có chuyên môn trong ngành IT.</span></p><p class=\"ql-align-justify\"><strong>Phần mềm và ứng dụng</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hỗ trợ nhiều ứng dụng phổ biến, đặc biệt là phần mềm chuyên dụng và game.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Tương thích tốt với các ứng dụng sáng tạo như Final Cut Pro, Logic Pro, kén chọn các ứng dụng cũng như đòi hỏi phải cài đặt ứng dụng có bản quyền.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nhiều phần mềm mã nguồn mở, thường phải cài đặt qua terminal hoặc trình quản lý gói.</span></p><p class=\"ql-align-justify\"><strong>Bảo mật</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thường xuyên cập nhật bảo mật nhưng dễ bị tấn công nếu không bảo vệ tốt.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Bảo mật cao, ít bị malware và virus nhắm đến.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Bảo mật tốt, ít bị tấn công, người dùng có thể kiểm soát hoàn toàn hệ thống.</span></p><p class=\"ql-align-justify\"><strong>Hiệu suất</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hiệu suất ổn định, nhưng có thể bị chậm nếu không tối ưu hóa.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hiệu suất mượt mà, tối ưu hóa tốt cho phần cứng của Apple.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hiệu suất cao, nhẹ, có thể tối ưu hóa theo nhu cầu cá nhân.</span></p><p class=\"ql-align-justify\"><strong>Tính tùy biến</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Tùy biến được, nhưng không linh hoạt bằng Linux.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hạn chế tùy biến, tập trung vào trải nghiệm người dùng cố định.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Tùy biến cực cao, người dùng có thể thay đổi hầu hết mọi thứ trong hệ thống.</span></p><p class=\"ql-align-justify\"><strong>Khả năng tương thích phần cứng</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Tương thích với hầu hết các phần cứng máy tính.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Chỉ tương thích với phần cứng của Apple.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Tương thích với nhiều phần cứng, nhưng cần chọn đúng bản phân phối để tối ưu.</span></p><p class=\"ql-align-justify\"><strong>Hỗ trợ kỹ thuật</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nhiều tài liệu hỗ trợ, cộng đồng người dùng lớn, dịch vụ hỗ trợ của Microsoft.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hỗ trợ chuyên nghiệp từ Apple, tài liệu hỗ trợ tốt.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Cộng đồng lớn, tài liệu nhiều nhưng phân tán, cần tự tìm hiểu và giải quyết.</span></p><p class=\"ql-align-justify\"><strong>Giá cả</strong></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Phải mua bản quyền, có các phiên bản miễn phí cho học sinh, sinh viên.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Đi kèm với thiết bị của Apple, không phải mua riêng hệ điều hành.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Miễn phí, mã nguồn mở.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Khi chọn hệ điều hành phù hợp, bạn nên xem xét nhu cầu sử dụng của mình. Nếu bạn cần một hệ điều hành phổ biến, hỗ trợ nhiều phần mềm chuyên dụng và game thì Windows là lựa chọn tốt.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">macOS sẽ là lựa chọn lý tưởng cho những ai làm việc trong lĩnh vực sáng tạo và muốn một hệ điều hành ổn định, mượt mà và có tính bảo mật cao.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Linux phù hợp với những người yêu thích sự tùy biến, bảo mật cao và không ngại việc tự tìm hiểu, cài đặt hệ thống.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/windows_vs_apple_vs_linux_1715881727238.jpg\" alt=\"So sánh các hệ điều hành Windows vs macOS vs Linux\"></p><p>So sánh các hệ điều hành Windows vs macOS vs Linux</p><h2 class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">V. Cách chọn mua laptop theo ngân sách</strong></h2><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Các mức giá khác nhau của laptop thường tương ứng với các tính năng và hiệu suất cấu hình khác nhau, phục vụ cho từng nhu cầu sử dụng của bạn. Dưới đây là những nhận định tư vấn cho từng phân khúc mức giá mà Thinkpro dành cho bạn tham khảo:</span></p><h3><span style=\"color: rgb(0, 0, 0);\">1. Phân khúc laptop có mức giá thấp</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Ở phân khúc giá rẻ, bạn có thể mong đợi các laptop cung cấp hiệu suất cơ bản cho các nhu cầu duyệt web, làm việc văn phòng cơ bản như Microsoft Software: Excel, Docs, PowerPoint, và giải trí nhẹ nhàng như xem phim, nghe nhạc. Tuy nhiên, chúng thường có cấu hình và thiết kế giản dị, không đáp ứng được các yêu cầu cao cấp như đồ họa hoặc game nặng.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Một số laptop phân khúc giá rẻ:&nbsp;</span><a href=\"https://thinkpro.vn/laptop/dell-inspiron-15-3511\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(23, 23, 23);\">Dell Inspiron 15</a>,&nbsp;<a href=\"https://thinkpro.vn/laptop/msi-modern-15-b12m\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>MSI Modern 15 B12M</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/dell-inspiron-15-3511\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Dell Inspiron 15</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/dell-inspiron-13-5310\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Dell Inspiron 13 5310</strong></a>...</p><h3><span style=\"color: rgb(0, 0, 0);\">2. Phân khúc laptop có mức giá trung bình</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Ở phân khúc laptop có mức giá tầm trung, bạn có thể mong đợi các laptop có hiệu suất tốt hơn, phục vụ cho các nhu cầu làm việc văn phòng, đồ họa, chỉnh sửa video và chơi game nhẹ đến trung bình. Chúng thường có cấu hình mạnh mẽ hơn, bao gồm bộ xử lý và card đồ họa tốt hơn, RAM lớn hơn và dung lượng lưu trữ cao hơn.</span></p><p class=\"ql-align-justify\"><strong style=\"color: rgb(0, 0, 0);\">Một số laptop phân khúc tầm trung</strong><span style=\"color: rgb(0, 0, 0);\">:&nbsp;</span><a href=\"https://thinkpro.vn/laptop/macbook-air-2022-apple-m2\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>MacBook Air 2022</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop-thinkpad-x1-carbon\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Lenovo ThinkPad X1 Carbon</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop-dell-xps-13\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Dell XPS 13</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop-asus-zenbook-14\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>ASUS Zenbook 14</strong></a><strong>...</strong></p><h3><span style=\"color: rgb(0, 0, 0);\">3. Phân khúc laptop cao cấp</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Ở mức giá cao cấp, bạn có thể mong đợi các laptop với hiệu suất cực kỳ mạnh mẽ, đáp ứng được mọi nhu cầu sử dụng, từ đồ họa, chỉnh sửa video chuyên nghiệp đến chơi game đòi hỏi tốn nhiều tài nguyên. Chúng thường có cấu hình hàng đầu, bao gồm bộ xử lý và card đồ họa cao cấp, RAM lớn và ổ cứng SSD nhanh.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Do đó, khi đầu tư vào một mẫu máy cao cấp, người dùng cần xem xét nhu cầu sử dụng và mức độ quan trọng của hiệu suất trong công việc hàng ngày để chọn lựa một cách hợp lý và đáp ứng được yêu cầu của mình.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Một số laptop phân khúc cao cấp:&nbsp;</span><a href=\"https://thinkpro.vn/laptop-dell-inspiron-16\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Dell Inspiron 16</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/dell-precision-5470-intel-gen-12th\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Dell Precision 5470</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/lenovo-yoga-slim-9i-gen-7-2022\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>Lenovo Yoga Slim 9i Gen 7</strong></a><strong>,&nbsp;</strong><a href=\"https://thinkpro.vn/laptop/asus-rog-zephyrus-g14-2023\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: inherit;\"><strong>ASUS ROG Zephyrus G14</strong></a><strong>...</strong></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/cach_chon_mua_laptop_theo_nhu_cau_su_dung_voi_muc_gia_phan_khuc_khac_nhau_1715938804471.jpg\" alt=\"Chọn mua laptop phù hợp với các mức ngân sách khác nhau\"></p><p>Chọn mua laptop phù hợp với các mức ngân sách khác nhau</p><h2><strong style=\"color: rgb(0, 0, 0);\">VI. Những chiếc laptop mà bạn không nên bỏ qua trong năm 2024</strong></h2><p class=\"ql-align-justify\"><span style=\"color: rgb(0, 0, 0);\">Dưới đây là một số laptop được đánh giá cao nhất trong năm nay 2024, dựa trên ý kiến của đại đa số người dùng cũng như là những sản phẩm hot đang bán chạy tại Thinkpro:</span></p><h3><span style=\"color: rgb(0, 0, 0);\">1. MacBook</span></h3><p class=\"ql-align-justify\"><a href=\"https://thinkpro.vn/laptop-apple-macbook\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>MacBook</u></a><span style=\"color: rgb(13, 13, 13);\">&nbsp;là một sản phẩm đáng chú ý của Apple, nổi bật với chip mạnh mẽ mang lại hiệu suất ấn tượng và tiết kiệm pin vượt trội.</span></p><ul><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Khả năng xử lý mượt mà các tác vụ từ cơ bản đến phức tạp, bao gồm cả chỉnh sửa video và đồ họa.</span></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Thiết kế mỏng nhẹ</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;giúp bạn có thể dễ dàng mang theo, lý tưởng cho người dùng thường xuyên di chuyển.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thời lượng pin kéo dài lên đến&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">18 giờ</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;cũng là một điểm cộng lớn, giúp bạn làm việc suốt cả ngày mà không cần sạc.</span></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Màn hình Retina</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;sắc nét và hệ thống âm thanh tốt mang đến trải nghiệm giải trí tuyệt vời.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nếu bạn đang tìm kiếm một chiếc laptop vừa mạnh mẽ, vừa tiện lợi cho nhu cầu làm việc và giải trí hàng ngày, MacBook Air (M1) là một lựa chọn không thể bỏ qua.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/macbook_air_m1_1715881283188.jpeg\" alt=\"MacBook Air (M1)\"></p><p>Sản phẩm laptop Macbook của Apple bạn không nên bỏ qua khi sử dụng để mang đi học và làm việc</p><h3><span style=\"color: rgb(0, 0, 0);\">2. Dell XPS 13</span></h3><p class=\"ql-align-justify\"><a href=\"https://thinkpro.vn/laptop-dell-xps-13\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>Dell XPS 13</u></a><span style=\"color: rgb(13, 13, 13);\">&nbsp;là một trong những laptop cao cấp hàng đầu, nổi bật với thiết kế sang trọng.</span></p><ul><li class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Màn hình InfinityEdge</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;gần như không viền, mang lại trải nghiệm hình ảnh sống động và chi tiết.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hiệu suất mạnh mẽ nhờ vi xử lý&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">Intel Core</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;thế hệ mới, đảm bảo khả năng xử lý mượt mà các tác vụ đa nhiệm và ứng dụng đòi hỏi cao.</span></li><li class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Thời lượng pin dà</strong><span style=\"color: rgb(13, 13, 13);\">i giúp bạn làm việc suốt cả ngày mà không lo gián đoạn.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Bàn phím thoải mái và touchpad chính xác cũng là những điểm đáng khen ngợi, giúp tăng hiệu quả làm việc.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nếu bạn cần một chiếc laptop vừa mạnh mẽ, vừa di động với thiết kế tinh tế, Dell XPS 13 là một lựa chọn xuất sắc.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/laptop_dell_xps_13_1715881307326.jpg\" alt=\"Dell XPS 13\"></p><p>Dell XPS 13 là lựa chọn hợp lý khi chọn mua laptop với nhu cầu sử dụng đi làm</p><h3><span style=\"color: rgb(0, 0, 0);\">3. HP Spectre x360 14</span></h3><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">HP Spectre x360 14 là một chiếc laptop 2 trong 1 tuyệt vời, nổi bật với thiết kế tinh tế và linh hoạt.</span></p><ul><li class=\"ql-align-justify\"><strong style=\"color: rgb(13, 13, 13);\">Màn hình OLED 3K2K</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;tuyệt đẹp, mang lại hình ảnh sắc nét và màu sắc sống động, lý tưởng cho công việc sáng tạo và giải trí.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Hiệu suất của máy cũng đáng kể với vi xử lý&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">Intel Core thế hệ 11</strong><span style=\"color: rgb(13, 13, 13);\">, giúp xử lý mượt mà các tác vụ nặng và đa nhiệm.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thời lượng pin ấn tượng lên đến&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">10 giờ</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;sử dụng liên tục và tính năng sạc nhanh giúp người dùng không lo lắng về năng lượng khi di chuyển.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Bàn phím và touchpad được thiết kế tối ưu, mang lại trải nghiệm gõ phím thoải mái và chính xác.</span></li></ul><p class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Nếu bạn cần một laptop mạnh mẽ, linh hoạt và đẹp mắt thì&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">HP Spectre x360 14</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;là lựa chọn lý tưởng.</span></p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/laptop_hp_spectre_x360_14_1715881407650.jpg\" alt=\"HP Spectre x360 14\"></p><p><span style=\"color: rgb(13, 13, 13);\">HP Spectre x360 14 2 in 1 là laptop nổi bật với thiết kế tinh tế và linh hoạt.</span></p><h3><span style=\"color: rgb(0, 0, 0);\">4. Asus ROG Zephyrus G14</span></h3><p class=\"ql-align-justify\"><a href=\"https://thinkpro.vn/laptop/asus-rog-zephyrus-g14-2023\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>Asus ROG Zephyrus G14</u></a>&nbsp;là một trong những laptop chơi game xuất sắc nhất hiện nay, nổi bật với sự cân bằng hoàn hảo giữa hiệu suất mạnh mẽ và tính di động.</p><ul><li class=\"ql-align-justify\">Được trang bị vi xử lý&nbsp;<strong>AMD Ryzen 9</strong>&nbsp;và card đồ họa&nbsp;<strong>NVIDIA GeForce RTX 3060</strong>, Zephyrus G14 mang đến hiệu suất chơi game và xử lý đồ họa ấn tượng trong một thiết kế nhỏ gọn.</li><li class=\"ql-align-justify\">Màn hình&nbsp;<strong>14 inch</strong>&nbsp;với tần số quét lên đến&nbsp;<strong>120Hz</strong>, cho hình ảnh mượt mà và sắc nét, đáp ứng tốt cả nhu cầu chơi game và công việc sáng tạo.</li><li class=\"ql-align-justify\">Thời lượng pin kéo dài và tính năng sạc nhanh cũng là điểm mạnh, giúp máy duy trì hiệu suất trong thời gian dài.</li><li class=\"ql-align-justify\">Bàn phím có đèn nền và hệ thống làm mát tiên tiến đảm bảo trải nghiệm chơi game thoải mái và ổn định.</li></ul><p class=\"ql-align-justify\">Nếu bạn đang tìm kiếm một laptop chơi game mạnh mẽ nhưng vẫn dễ dàng di chuyển, Asus ROG Zephyrus G14 là một lựa chọn đáng cân nhắc.</p><p><img src=\"https://d28jzcg6y4v9j1.cloudfront.net/media/social/2024/05/17/laptop_asus_ROG_Zephyrus_G14_1715881332401.jpg\" alt=\"Asus ROG Zephyrus G14\"></p><p>Asus ROG Zephyrus G14 là một lựa chọn đáng cân nhắc dùng để chơi game giải trí</p><h3><span style=\"color: rgb(0, 0, 0);\">5. Lenovo ThinkPad X1 Carbon</span></h3><p class=\"ql-align-justify\"><a href=\"https://thinkpro.vn/laptop-thinkpad-x1-carbon\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"color: rgb(17, 85, 204);\"><u>Lenovo ThinkPad X1 Carbon</u></a><span style=\"color: rgb(13, 13, 13);\">&nbsp;là một trong những laptop doanh nhân hàng đầu, nổi bật với thiết kế siêu mỏng nhẹ và độ bền ấn tượng.</span></p><ul><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Được trang bị vi xử lý&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">Intel Core i7</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;thế hệ mới, mang lại hiệu suất mạnh mẽ cho các tác vụ từ văn phòng đến quản lý dữ liệu phức tạp.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Màn hình&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">14 inch</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;với tùy chọn độ&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">phân giải 4K</strong><span style=\"color: rgb(13, 13, 13);\">, hình ảnh sắc nét và sống động, cùng khả năng tái tạo màu sắc tuyệt vời, phù hợp cho công việc sáng tạo.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Thời lượng pin kéo dài lên đến&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">15 giờ</strong><span style=\"color: rgb(13, 13, 13);\">&nbsp;và tính năng sạc nhanh đảm bảo máy luôn sẵn sàng cho những ngày làm việc dài.</span></li><li class=\"ql-align-justify\"><span style=\"color: rgb(13, 13, 13);\">Bàn phím chống tràn, tích hợp bảo mật vân tay và camera hồng ngoại cho đăng nhập khuôn mặt tăng cường bảo mật, là những điểm mạnh khác của&nbsp;</span><strong style=\"color: rgb(13, 13, 13);\">ThinkPad X1.</strong></li></ul><p class=\"ql-align-justify\"><em>Việc lựa chọn một chiếc laptop phù hợp không chỉ giúp bạn tối ưu hóa chi phí mà còn mang lại hiệu quả tối đa trong công việc, học tập, hay giải trí. Hy vọng rằng qua những gợi ý và thông tin được chia sẻ, bạn sẽ dễ dàng xác định được sản phẩm đáp ứng đúng nhu cầu và mong muốn của mình.</em></p><p><br></p>', 'baiviets/uKiQ0wXnksHa8nFVylQQIWWAH2BIlgw1gvRzpFu7.png', 1, 1, 1, '2025-07-31 06:08:34', '2025-07-31 06:09:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anh_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_lien_ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `vi_tri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `ten_banner`, `anh_banner`, `url_lien_ket`, `ngay_bat_dau`, `ngay_ket_thuc`, `vi_tri`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laptop', 'banners/ORWAjjk2dq64BBmI8PQ1q1jL0VK6yoadcpmzwWpI.jpg', 'http://127.0.0.1:8000/admin/sanphams/2/show', NULL, NULL, 'header', 1, '2025-06-24 05:31:58', '2025-07-04 12:15:30', NULL),
(2, 'Laptop', 'banners/1751631380-bannerlaptopthang12_800x450.png', 'http://127.0.0.1:8000/admin/sanphams/9/show', NULL, NULL, 'header', 1, '2025-07-04 12:16:20', '2025-07-04 12:16:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bien_the_san_phams`
--

CREATE TABLE `bien_the_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `gia_cu` int(10) UNSIGNED NOT NULL,
  `gia_moi` int(10) UNSIGNED DEFAULT NULL,
  `dung_luong_id` bigint(20) UNSIGNED NOT NULL,
  `mau_sac_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bien_the_san_phams`
--

INSERT INTO `bien_the_san_phams` (`id`, `san_pham_id`, `so_luong`, `gia_cu`, `gia_moi`, `dung_luong_id`, `mau_sac_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 19190000, 15290000, 1, 1, NULL, '2025-06-23 02:14:58', '2025-08-15 17:34:36'),
(2, 1, 31, 16690000, 15990000, 1, 1, NULL, '2025-06-23 02:17:34', '2025-08-21 02:23:41'),
(3, 3, 23, 12000000, 12000, 1, 1, NULL, '2025-06-23 02:19:18', '2025-08-19 10:00:01'),
(5, 6, 3, 12990000, 12690000, 1, 1, NULL, '2025-06-23 03:13:22', '2025-08-20 16:28:30'),
(6, 7, 5, 11290000, 8990000, 1, 1, NULL, '2025-06-27 07:16:28', '2025-08-19 13:46:12'),
(7, 8, 53, 23690000, 21990000, 1, 1, NULL, '2025-07-02 12:53:30', '2025-08-19 10:00:01'),
(8, 9, 23, 19990000, NULL, 1, 1, NULL, '2025-07-04 11:30:13', '2025-07-31 05:52:26'),
(9, 10, 21, 14890000, 12190000, 1, 1, NULL, '2025-07-04 11:30:50', '2025-08-01 08:16:38'),
(10, 11, 21, 24090000, 20690000, 1, 1, NULL, '2025-07-04 13:01:41', '2025-08-01 08:59:33'),
(11, 12, 12, 20000000, 200000, 3, 1, NULL, '2025-07-09 07:05:58', '2025-08-20 17:01:19'),
(12, 13, 15, 16690000, 15900000, 1, 1, NULL, '2025-07-10 10:24:41', '2025-08-01 08:02:04'),
(13, 14, 13, 13990000, NULL, 1, 1, NULL, '2025-07-18 01:13:59', '2025-08-01 07:48:48'),
(14, 14, 14, 3000000, 4000000, 3, 2, NULL, '2025-07-18 01:13:59', '2025-08-08 14:14:48'),
(15, 15, 28, 15290000, 11690000, 1, 1, NULL, '2025-07-24 16:45:22', '2025-07-31 05:18:41'),
(16, 1, 1, 12000000, NULL, 3, 2, NULL, '2025-07-25 13:04:09', '2025-08-20 09:07:02'),
(17, 16, 12, 12490000, 10090000, 1, 1, NULL, '2025-07-28 09:22:37', '2025-07-31 05:21:28'),
(18, 16, 12, 2000000, NULL, 3, 2, NULL, '2025-07-28 09:22:37', '2025-07-28 09:22:37'),
(19, 17, 12, 22090000, 18490000, 1, 1, NULL, '2025-07-28 09:27:42', '2025-07-31 05:26:17'),
(20, 17, 12, 300000, NULL, 3, 2, '2025-07-31 05:26:17', '2025-07-28 09:27:42', '2025-07-31 05:26:17'),
(21, 17, 12, 120000, 130000, 3, 1, '2025-07-31 05:26:17', '2025-07-28 09:27:42', '2025-07-31 05:26:17'),
(22, 17, 12, 1, 140000, 1, 2, '2025-07-31 05:26:17', '2025-07-28 09:28:37', '2025-07-31 05:26:17'),
(23, 18, 12, 18590000, NULL, 1, 1, NULL, '2025-07-28 10:42:39', '2025-08-20 06:36:44'),
(24, 19, 17, 17690000, 15990000, 1, 1, NULL, '2025-07-30 04:20:22', '2025-07-31 05:33:49'),
(25, 20, 12, 13000, NULL, 1, 1, NULL, '2025-08-17 06:00:00', '2025-08-20 06:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_dons`
--

CREATE TABLE `chi_tiet_hoa_dons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bien_the_san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `ten_san_pham` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_dung_luong` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_mau_sac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoa_don_id` bigint(20) UNSIGNED NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `don_gia` bigint(20) UNSIGNED NOT NULL,
  `thanh_tien` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia_san_phams`
--

CREATE TABLE `danh_gia_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `diem_so` int(10) UNSIGNED NOT NULL,
  `nhan_xet` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gia_san_phams`
--

INSERT INTO `danh_gia_san_phams` (`id`, `user_id`, `san_pham_id`, `diem_so`, `nhan_xet`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 5, 'Đẹp, chất lượng', '2025-07-04 11:08:07', NULL),
(2, 2, 14, 4, 'chất lượng tốt', '2025-07-18 01:44:50', '2025-07-18 01:44:50'),
(3, 2, 14, 3, 'đẹp', '2025-07-30 14:41:36', '2025-07-30 14:41:36'),
(4, 2, 14, 4, NULL, '2025-07-30 14:41:56', '2025-07-30 14:41:56'),
(5, 2, 14, 5, NULL, '2025-07-30 14:53:35', '2025-07-30 14:53:35'),
(6, 2, 14, 5, 'Quá chất lượng', '2025-07-30 14:54:07', '2025-07-30 14:54:07'),
(7, 2, 14, 5, 'Quá chất lượng', '2025-07-30 14:54:15', '2025-07-30 14:54:15'),
(8, 1, 10, 5, 'chất lượng', '2025-07-30 14:59:51', '2025-07-30 14:59:51'),
(9, 2, 8, 5, 'Sản phẩm chất lượng quá shop ưi', '2025-07-30 15:01:38', '2025-07-30 15:01:38'),
(10, 2, 8, 5, 'Quá đẹp ạ', '2025-07-30 15:01:52', '2025-07-30 15:01:52'),
(11, 2, 1, 5, 'đẹp', '2025-08-15 13:58:47', '2025-08-15 13:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `anh_danh_muc`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'LapTop DEll', 'storage/danhmucs/1751626401_dell-logo-inkythuatso-4-01-30-10-17-55.jpg', NULL, '2025-06-23 02:09:31', '2025-07-04 10:53:21'),
(2, 'LapTop acer', 'storage/danhmucs/1751626410_logo-acer-inkythuatso-2-01-27-15-49-45.jpg', NULL, '2025-06-23 02:10:11', '2025-07-04 10:53:30'),
(3, 'Máy tính asus', 'storage/danhmucs/1751626448_logo-asus-inkythuatso-2-01-26-09-12-02.jpg', NULL, '2025-07-04 10:54:08', '2025-07-04 10:54:08'),
(4, 'Máy tính hp', 'storage/danhmucs/1751626549_666ad33c90b7c3001de29d45.jpg', NULL, '2025-07-04 10:55:49', '2025-07-04 10:55:49'),
(5, 'LapTop DEll12', 'storage/danhmucs/1753452808_acer-nitro-v-15-anv15-41-r2up-r5-nhqpgsv004-638774737367845195-600x600.jpg', '2025-07-25 14:13:33', '2025-07-25 14:13:28', '2025-07-25 14:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `diem_danhs`
--

CREATE TABLE `diem_danhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `diem` int(11) NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diem_danhs`
--

INSERT INTO `diem_danhs` (`id`, `user_id`, `ngay`, `diem`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-08-01', 10, '2025-08-01 04:34:09', '2025-08-01 04:34:09'),
(2, 2, '2025-08-04', 10, '2025-08-04 15:33:49', '2025-08-04 15:33:49'),
(3, 1, '2025-08-04', 10, '2025-08-04 15:59:08', '2025-08-04 15:59:08'),
(4, 2, '2025-08-05', 10, '2025-08-05 08:08:19', '2025-08-05 08:08:19'),
(5, 2, '2025-08-06', 10, '2025-08-06 06:09:52', '2025-08-06 06:09:52'),
(6, 5, '2025-08-06', 10, '2025-08-06 15:58:25', '2025-08-06 15:58:25'),
(7, 2, '2025-08-07', 10, '2025-08-07 07:02:45', '2025-08-07 07:02:45'),
(8, 2, '2025-08-08', 10, '2025-08-08 11:40:27', '2025-08-08 11:40:27'),
(9, 2, '2025-08-15', 10, '2025-08-15 10:26:17', '2025-08-15 10:26:17'),
(10, 2, '2025-08-16', 10, '2025-08-15 17:26:24', '2025-08-15 17:26:24'),
(11, 2, '2025-08-17', 10, '2025-08-17 16:41:06', '2025-08-17 16:41:06'),
(12, 2, '2025-08-19', 10, '2025-08-19 13:54:40', '2025-08-19 13:54:40'),
(13, 2, '2025-08-20', 10, '2025-08-20 06:28:45', '2025-08-20 06:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `doi_quas`
--

CREATE TABLE `doi_quas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `khuyen_mai_id` bigint(20) UNSIGNED NOT NULL,
  `diem_su_dung` int(11) NOT NULL,
  `ngay_doi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'thanh_cong',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doi_quas`
--

INSERT INTO `doi_quas` (`id`, `user_id`, `khuyen_mai_id`, `diem_su_dung`, `ngay_doi`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 2, 92, 10, '2025-08-04 16:03:01', 'thanh_cong', '2025-08-04 16:03:01', '2025-08-04 16:03:01'),
(2, 2, 96, 10, '2025-08-06 15:44:47', 'thanh_cong', '2025-08-06 15:44:47', '2025-08-06 15:44:47'),
(3, 5, 99, 10, '2025-08-06 16:00:09', 'thanh_cong', '2025-08-06 16:00:09', '2025-08-06 16:00:09'),
(4, 2, 99, 10, '2025-08-06 16:10:10', 'thanh_cong', '2025-08-06 16:10:10', '2025-08-06 16:10:10'),
(5, 2, 103, 10, '2025-08-07 16:35:42', 'thanh_cong', '2025-08-07 16:35:42', '2025-08-07 16:35:42'),
(6, 2, 107, 10, '2025-08-15 10:27:57', 'thanh_cong', '2025-08-15 10:27:57', '2025-08-15 10:27:57'),
(7, 2, 111, 10, '2025-08-15 12:41:43', 'thanh_cong', '2025-08-15 12:41:43', '2025-08-15 12:41:43'),
(8, 2, 126, 10, '2025-08-18 14:57:22', 'thanh_cong', '2025-08-18 14:57:22', '2025-08-18 14:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `dung_luongs`
--

CREATE TABLE `dung_luongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_dung_luong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dung_luongs`
--

INSERT INTO `dung_luongs` (`id`, `ten_dung_luong`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1T-2T', 1, '2025-06-23 02:11:08', '2025-06-26 02:12:39', NULL),
(3, '8GB-128GB', 1, '2025-06-23 02:11:36', '2025-06-23 02:11:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `hinh_anh`, `created_at`, `updated_at`) VALUES
(6, 3, 'storage/albums/4As7iOY29BT8Jwz20LevC24ynFmdPC8FsEmBCgwW.jpg', '2025-06-23 02:19:18', '2025-06-23 02:19:18'),
(7, 3, 'storage/albums/oD5ygw3dxoA4fYQbTMVuRqDNvCFgKfGtTgrNPfRr.jpg', '2025-06-23 02:19:18', '2025-06-23 02:19:18'),
(8, 3, 'storage/albums/r6Xw7F0RiSElzcRZF0Xbu9HQ7R90kWfyq7vbO0Ed.jpg', '2025-06-23 02:19:18', '2025-06-23 02:19:18'),
(32, 12, 'storage/albums/UB9XaGTUh2NlUyAuRQotRPjixQOE1FsU38oAQz3N.jpg', '2025-07-09 07:05:58', '2025-07-09 07:05:58'),
(33, 13, 'storage/albums/mAk9cDT6m0nEBgaxT8PWohMmF5mUC1saqeLVjxWe.jpg', '2025-07-10 10:24:41', '2025-07-10 10:24:41'),
(36, 15, 'storage/albums/dRAnwmf6vSICU47nQ9T8O9KCO9DoplyFqrLYiHTu.jpg', '2025-07-24 16:45:22', '2025-07-24 16:45:22'),
(42, 18, 'storage/albums/80h58vGaMHPQnFsr28aSwnmLpg5M4mlDQfwu0R1x.jpg', '2025-07-28 10:42:39', '2025-07-28 10:42:39'),
(45, 1, 'storage/albums/toqWtqdzAWQNbr24QcENbsFRYIryzitIxxnGPXV7.webp', '2025-07-31 05:05:50', '2025-07-31 05:05:50'),
(46, 1, 'storage/albums/3xPHddYigDJvt3BDKGwFUKJSWnplyn4RYYbtQmJS.webp', '2025-07-31 05:05:50', '2025-07-31 05:05:50'),
(47, 1, 'storage/albums/PjFl7Bi74pHBh4Pok3pJKB1a4htiAgoArSSQiO5X.webp', '2025-07-31 05:05:50', '2025-07-31 05:05:50'),
(48, 1, 'storage/albums/m3wh8bGHBVv2p7WCciri4JYLMsQ02E5wwHvzcHhU.webp', '2025-07-31 05:05:50', '2025-07-31 05:05:50'),
(49, 10, 'storage/albums/hLyHh2uD0zIRmfk9ubYJlJPuCZpff41vUfdIsKSN.webp', '2025-07-31 05:08:43', '2025-07-31 05:08:43'),
(50, 10, 'storage/albums/kHU3CzE7uL2dEY4U6ZlXaEwO7OPZ4rWYdhlwlh3h.webp', '2025-07-31 05:08:43', '2025-07-31 05:08:43'),
(51, 10, 'storage/albums/LHQJlj3MHf6uIan7L5hmZimIEpOLw1skVZWBJz5r.webp', '2025-07-31 05:08:43', '2025-07-31 05:08:43'),
(52, 10, 'storage/albums/QkToQQOJbURvDYNnLbXskJdibte6wUUvIJyufLQA.webp', '2025-07-31 05:08:43', '2025-07-31 05:08:43'),
(53, 11, 'storage/albums/5FeaSDI4bgpEDd1WAW4L6A3LTuGBknxpod6H5h7u.webp', '2025-07-31 05:11:57', '2025-07-31 05:11:57'),
(54, 11, 'storage/albums/mDW89xcDusyynwyiTmqBfAr4nONePQnclHNz9D9l.webp', '2025-07-31 05:11:57', '2025-07-31 05:11:57'),
(55, 11, 'storage/albums/AbX3M9l4yw96RWdqGcFg0QCViMCACIdgGY2KCkN3.webp', '2025-07-31 05:11:57', '2025-07-31 05:11:57'),
(56, 11, 'storage/albums/9XKk5WtWPOXhQfvTv9QZDbslZhHwXSMelAmyRInt.webp', '2025-07-31 05:11:57', '2025-07-31 05:11:57'),
(57, 13, 'storage/albums/VrfCG3heAVjUZtTF9xJVVaSglE9f6SxnFla1YXFV.webp', '2025-07-31 05:14:37', '2025-07-31 05:14:37'),
(58, 13, 'storage/albums/hI1nrGIS34PMOwpYcT6oXhbZQEt2h6c14YlHmOzy.webp', '2025-07-31 05:14:37', '2025-07-31 05:14:37'),
(59, 13, 'storage/albums/d2IcKD5vT5a3DKgA8p4kPNOBu6VPv9LXa02kQHXp.webp', '2025-07-31 05:14:37', '2025-07-31 05:14:37'),
(60, 13, 'storage/albums/wCF35Q74H95AfnBsel7CFdnDwSwTlhJsymCTNUSI.webp', '2025-07-31 05:14:37', '2025-07-31 05:14:37'),
(61, 15, 'storage/albums/njcEvxpgLJZBhbaln3dAUuLeX5HBPIrgTAgXJ4Ze.webp', '2025-07-31 05:18:41', '2025-07-31 05:18:41'),
(62, 15, 'storage/albums/1IGLN8JjFOH0tkrH5sn0RTvnZbPyR7NXI5C41Lkq.webp', '2025-07-31 05:18:41', '2025-07-31 05:18:41'),
(63, 15, 'storage/albums/E63wWqVnDM0OrjW9yJ8wW11ceGCzp5VZ4K8Ii1F8.webp', '2025-07-31 05:18:41', '2025-07-31 05:18:41'),
(64, 15, 'storage/albums/xzMDCT2Lpt6zn36kYSoGg3oOYWW2gsoX0McJldqq.webp', '2025-07-31 05:18:41', '2025-07-31 05:18:41'),
(65, 16, 'storage/albums/G6XOh6jkYHRHfkTlzkNunTujzyt1Qt0V4XGIARs5.webp', '2025-07-31 05:21:28', '2025-07-31 05:21:28'),
(66, 16, 'storage/albums/VNEoKLJv8X9JFIOCGwJBHIcTZvCWtxlbznHKPEwH.webp', '2025-07-31 05:21:28', '2025-07-31 05:21:28'),
(67, 16, 'storage/albums/iM991tVBE2kXFU98xxbRIjmQTDKYeAaFE9vBG6VX.webp', '2025-07-31 05:21:28', '2025-07-31 05:21:28'),
(68, 16, 'storage/albums/c5q0jTW46ECjjZoRLeQElNwNpjiDePTHyNErdbxM.webp', '2025-07-31 05:21:28', '2025-07-31 05:21:28'),
(69, 17, 'storage/albums/T8amSHrncnu0fSBCZEh2FhxUWTxb9OudtrNiauc8.webp', '2025-07-31 05:25:18', '2025-07-31 05:25:18'),
(70, 17, 'storage/albums/YxUujWoetUw1rgPlMj5F4Ktwte9C6O9V0XYhTTEY.webp', '2025-07-31 05:25:18', '2025-07-31 05:25:18'),
(71, 17, 'storage/albums/M77DPfZjDWilAfdbHsJTJBXQVYX94eFambVpYnar.webp', '2025-07-31 05:25:18', '2025-07-31 05:25:18'),
(72, 17, 'storage/albums/rFLLgmVY5PbWlzoscjN2OdwJb8UGeeUTUlL5hi7D.webp', '2025-07-31 05:25:18', '2025-07-31 05:25:18'),
(73, 18, 'storage/albums/0LClMQlWzA5J2GYdwDROWS3JOnmHK3Stj97YAqFz.webp', '2025-07-31 05:29:31', '2025-07-31 05:29:31'),
(74, 18, 'storage/albums/EImHhUSecB3kgZ4KJg2WztPBcxDMHATi0yyqK0FN.webp', '2025-07-31 05:29:31', '2025-07-31 05:29:31'),
(75, 18, 'storage/albums/z8c4ZslF1IXY9Fh9QJD3Q6TID8z2qk8suqoi13VV.webp', '2025-07-31 05:29:31', '2025-07-31 05:29:31'),
(76, 18, 'storage/albums/CwzU9NtBGibjsUUvm32vTSEg7X9rzbyue4FViXG4.webp', '2025-07-31 05:29:31', '2025-07-31 05:29:31'),
(78, 19, 'storage/albums/0IacC5UCQ3TEDNvWpyF2t9qD98tm4NpOBuLCsl8s.webp', '2025-07-31 05:33:49', '2025-07-31 05:33:49'),
(79, 19, 'storage/albums/kDTwBANBcigtM81XG5a6Y78s6XOAWfJe8yWQ65UD.webp', '2025-07-31 05:33:49', '2025-07-31 05:33:49'),
(80, 19, 'storage/albums/cNANTgkXRfmiHMxf0olW3TnbPc9lEvXMjMZDn5Mg.webp', '2025-07-31 05:33:49', '2025-07-31 05:33:49'),
(81, 19, 'storage/albums/uK5WnrRpesP51S9q9GC04N0zYXUKM6iz0Yj4oquF.webp', '2025-07-31 05:33:49', '2025-07-31 05:33:49'),
(82, 2, 'storage/albums/f94WGxqT113e0D5UmxiMxZ3oEDqTHuE8F4v83aEa.webp', '2025-07-31 05:38:26', '2025-07-31 05:38:26'),
(83, 2, 'storage/albums/khQFURb8EyB05gTtXx892sPp6oPQaapCd6eNOdeE.webp', '2025-07-31 05:38:26', '2025-07-31 05:38:26'),
(84, 2, 'storage/albums/26H2oymGo7a5Ok8ycS6TtLBpCUHlWcMJ6jjrgRfU.webp', '2025-07-31 05:38:26', '2025-07-31 05:38:26'),
(85, 6, 'storage/albums/pzeIZg0amxbZUvyPTr30oBzxRwUJvshkSah1uF5u.webp', '2025-07-31 05:42:53', '2025-07-31 05:42:53'),
(86, 6, 'storage/albums/m663SwBP3Cabk0m9fpBS3fdPbw8grPZBps0FmgAY.webp', '2025-07-31 05:42:53', '2025-07-31 05:42:53'),
(87, 6, 'storage/albums/ZkzOh3cZuwssB7mOYw0sdR4YGp0q5qdkM08M2973.webp', '2025-07-31 05:42:53', '2025-07-31 05:42:53'),
(88, 6, 'storage/albums/OF66PUJK1q2b3pgeB0v9RSuh3HQ0Muxc31Woqz6V.webp', '2025-07-31 05:42:53', '2025-07-31 05:42:53'),
(89, 7, 'storage/albums/VGVCaJkwauKoXaUmFZ2SwLOQsnL08wLayyxm5Uog.webp', '2025-07-31 05:45:23', '2025-07-31 05:45:23'),
(90, 7, 'storage/albums/PoFkTJdyHv3qzaGjgYnLc88sz3NPXvEOCzFwMeKO.webp', '2025-07-31 05:45:23', '2025-07-31 05:45:23'),
(91, 7, 'storage/albums/tqgKtTkVOfQ6tuJzQzDxpAYbVX4mx3nT1mqlZggD.webp', '2025-07-31 05:45:23', '2025-07-31 05:45:23'),
(92, 7, 'storage/albums/cBXewVDB9FeW8zOfStNoVEjUNNTONpBfMHIPQtSa.webp', '2025-07-31 05:45:23', '2025-07-31 05:45:23'),
(93, 8, 'storage/albums/FCIirqTOXHT4dBXR7Shumbf13l7QNBnRjA63rLSX.webp', '2025-07-31 05:49:38', '2025-07-31 05:49:38'),
(94, 8, 'storage/albums/I6eASV1EldVDwC88CcVkgFxhyQIAUUpgZhgGyXzk.webp', '2025-07-31 05:49:38', '2025-07-31 05:49:38'),
(95, 8, 'storage/albums/xW6sBRi4MFENPLzJgRZ7e1AghMd24lIepujtlWBp.webp', '2025-07-31 05:49:38', '2025-07-31 05:49:38'),
(96, 8, 'storage/albums/os1Hsib7wfs8yMUXg3narjh77sh9zTfvl9oGwRnj.webp', '2025-07-31 05:49:38', '2025-07-31 05:49:38'),
(97, 9, 'storage/albums/vf9XNckOF7xwtmggJedl7LDR8jwSnGIq0yHWWmkt.webp', '2025-07-31 05:52:26', '2025-07-31 05:52:26'),
(98, 9, 'storage/albums/lzaq1cw0LQ05dpMulKn0sBRfTCt56inZS8j7Igrs.webp', '2025-07-31 05:52:26', '2025-07-31 05:52:26'),
(99, 9, 'storage/albums/iX7p0dczfkpjQbWa2fCV5PoYcytIT0GwygQC4byg.webp', '2025-07-31 05:52:26', '2025-07-31 05:52:26'),
(100, 9, 'storage/albums/sCFsVUTwOHS5KDaausCcMWm9K402cJoxMa5AXQRb.webp', '2025-07-31 05:52:26', '2025-07-31 05:52:26'),
(101, 14, 'storage/albums/E9fMi6Da8r1zjZE8KRfxDcqhjz3vvARQk22TcOHS.webp', '2025-07-31 05:55:45', '2025-07-31 05:55:45'),
(102, 14, 'storage/albums/A1lzOYVfv3AKUPe6SZGhaHMycGJFomIyOQLLWOOA.webp', '2025-07-31 05:55:45', '2025-07-31 05:55:45'),
(103, 14, 'storage/albums/t1lyqE2cUMzAtxzyiGFtNczuD9ISTNSLdPvZRHDB.webp', '2025-07-31 05:55:45', '2025-07-31 05:55:45'),
(104, 14, 'storage/albums/OQAluEHui1VudEkijmRF4SDz7G5BPIVDz78Jaqjz.webp', '2025-07-31 05:55:45', '2025-07-31 05:55:45'),
(105, 20, 'storage/albums/hJZzPhPkXwdQ9lHYMCyOej3BA94Ssw4s2fB9ydMk.png', '2025-08-17 06:00:00', '2025-08-17 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_dons`
--

CREATE TABLE `hoa_dons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `giam_gia` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `ma_khuyen_mai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tong_tien` bigint(20) UNSIGNED NOT NULL,
  `dia_chi_nhan_hang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `thoi_gian_giao_dich` timestamp NULL DEFAULT NULL,
  `thoi_gian_het_han` timestamp NULL DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `ly_do_huy` text COLLATE utf8mb4_unicode_ci,
  `phuong_thuc_thanh_toan` enum('Thanh toán khi nhận hàng','Thanh toán qua chuyển khoản ngân hàng') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thanh toán khi nhận hàng',
  `trang_thai` int(11) NOT NULL DEFAULT '1',
  `trang_thai_thanh_toan` enum('Đã thanh toán','Thanh toán thất bại','Chưa thanh toán') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa thanh toán',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ma_hoa_don` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"895ee5a7-d18e-42e2-b863-b72acab943e4\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:142:\\\"http:\\/\\/127.0.0.1:8000\\/customer\\/reset-password\\/439e61d93977f36d0bde1b1dcedc7a7dbe72004e862a3b2d521d380337cad4a1?email=quandmph50159%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"3b39344e-fa38-47e6-86ec-310d3d229dc0\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754550428,\"delay\":null}', 0, NULL, 1754550428, 1754550428),
(2, 'default', '{\"uuid\":\"ef580508-88cd-43d5-8251-b4522d69646c\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:135:\\\"http:\\/\\/127.0.0.1:8000\\/customer\\/reset-password\\/37edbd712e41fad4f9c4fcc126a0748e753ab8abe318f50afdf024a457fb53ad?email=client%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"aecef476-1664-4917-b094-bb019234e41a\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754550500,\"delay\":null}', 0, NULL, 1754550500, 1754550500),
(3, 'default', '{\"uuid\":\"c9b3c5ea-d64f-44eb-bda5-35de472b9210\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:142:\\\"http:\\/\\/127.0.0.1:8000\\/customer\\/reset-password\\/155d21cefb761800c9d15802953e1238fde6048ad02b7e74fb34e95b248d99bf?email=quandmph50159%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"abfa60e3-3a20-42f6-a778-b3f6522f3321\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754550516,\"delay\":null}', 0, NULL, 1754550516, 1754550516),
(4, 'default', '{\"uuid\":\"a7a3ef3b-69aa-4047-b4a3-6cefcd11cf2b\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:142:\\\"http:\\/\\/127.0.0.1:8000\\/customer\\/reset-password\\/3b62e79cfd443430952388648a837de387f20f23474e525ffde0b88935f6ce91?email=quandmph50159%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"6c037d13-734b-479a-9163-edd11b755c19\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754550876,\"delay\":null}', 0, NULL, 1754550876, 1754550876),
(5, 'default', '{\"uuid\":\"febe1dc9-1d81-4f15-accd-fcd91d5342d9\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:142:\\\"http:\\/\\/127.0.0.1:8000\\/customer\\/reset-password\\/064ba4014c2fe1e1723fb3924cb1bbc20c1b72430ba59a7cc8c7da29fa057208?email=quandmph50159%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"07a39a86-b94d-48ef-8493-89716f31c92c\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754581644,\"delay\":null}', 0, NULL, 1754581644, 1754581644),
(6, 'default', '{\"uuid\":\"9b6a0276-6845-4108-9a0e-45b2914a9256\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:142:\\\"http:\\/\\/localhost:8000\\/customer\\/reset-password\\/6625abd8437b440f45f04167631ad68ddc619622f4ede64dd622ef30fb55fc81?email=quandmph50159%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"198772f2-81dc-453a-a5aa-e848b378caf9\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754814828,\"delay\":null}', 0, NULL, 1754814828, 1754814828),
(7, 'default', '{\"uuid\":\"ab08125f-ad1c-441a-9332-6e133a6ad1c4\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:142:\\\"http:\\/\\/127.0.0.1:8000\\/customer\\/reset-password\\/a28b8bf8db8d25eba445783484277c0798db121d52635b4c8328103430495bb2?email=quandmph50159%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"fe1b58f7-bce0-4736-93c7-2586c20b7a22\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754817546,\"delay\":null}', 0, NULL, 1754817546, 1754817546),
(8, 'default', '{\"uuid\":\"a5735c2c-7b8f-424a-a38c-303b7ab00c95\",\"displayName\":\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":3:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:6;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:44:\\\"App\\\\Notifications\\\\CustomerForgotPasswordNoti\\\":2:{s:4:\\\"path\\\";s:142:\\\"http:\\/\\/127.0.0.1:8000\\/customer\\/reset-password\\/833df8a863aab94a2519f5e0c651d65fda161f141e46af6cff67e38704ff9981?email=quandmph50159%40gmail.com\\\";s:2:\\\"id\\\";s:36:\\\"ef065b99-7a34-44c0-aa1b-9a94839f26e7\\\";}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}}\"},\"createdAt\":1754819076,\"delay\":null}', 0, NULL, 1754819076, 1754819076);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_khuyen_mai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phan_tram_khuyen_mai` int(10) UNSIGNED NOT NULL,
  `giam_toi_da` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `da_su_dung` int(11) NOT NULL DEFAULT '0',
  `loai_ma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cong_khai',
  `diem_can` int(11) NOT NULL DEFAULT '0',
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khuyen_mais`
--

INSERT INTO `khuyen_mais` (`id`, `ma_khuyen_mai`, `phan_tram_khuyen_mai`, `giam_toi_da`, `user_id`, `so_luong`, `da_su_dung`, `loai_ma`, `diem_can`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(67, 'EFMCIFER', 5, 500000, 2, 1, 0, 'ca_nhan', 0, '2025-07-30 21:56:21', '2025-08-06 21:56:21', 0, '2025-07-30 14:56:21', '2025-08-06 14:57:00', NULL),
(68, 'makhuyenmai', 30, 500000, NULL, 12, 4, 'cong_khai', 0, '2025-07-31 13:04:00', '2025-08-07 13:04:00', 0, '2025-07-31 06:04:33', '2025-08-07 06:52:01', NULL),
(70, 'EFONW4PN', 5, 500000, 2, 1, 0, 'ca_nhan', 0, '2025-08-01 11:36:43', '2025-08-08 11:36:43', 0, '2025-08-01 04:36:43', '2025-08-08 06:53:29', NULL),
(84, 'Z7KOEJQI', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:14:47', '2025-08-08 15:14:47', 0, '2025-08-01 08:14:47', '2025-08-08 10:08:12', NULL),
(85, '0LK9ECQ7', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:17:54', '2025-08-08 15:17:54', 0, '2025-08-01 08:17:54', '2025-08-08 10:08:12', NULL),
(86, 'EGMBSO74', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:20:47', '2025-08-08 15:20:47', 0, '2025-08-01 08:20:47', '2025-08-08 10:08:12', NULL),
(87, 'DWX0JSBO', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:26:33', '2025-08-08 15:26:33', 0, '2025-08-01 08:26:33', '2025-08-08 10:08:12', NULL),
(88, 'AKNKUGSI', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:28:44', '2025-08-08 15:28:44', 0, '2025-08-01 08:28:44', '2025-08-08 10:08:12', NULL),
(89, 'PLM1N3YI', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:34:59', '2025-08-08 15:34:59', 0, '2025-08-01 08:34:59', '2025-08-08 10:08:12', NULL),
(90, 'N1OTH7XJ', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:55:14', '2025-08-08 15:55:14', 0, '2025-08-01 08:55:14', '2025-08-08 10:08:12', NULL),
(91, 'GCSJBG0F', 5, 500000, 1, 1, 0, 'ca_nhan', 0, '2025-08-01 15:57:00', '2025-08-08 15:57:00', 0, '2025-08-01 08:57:00', '2025-08-04 16:01:30', '2025-08-04 16:01:30'),
(92, 'madoiqua', 10, 50000, NULL, NULL, 0, 'ma_doi_qua', 10, '2025-08-04 23:01:00', '2025-08-05 23:02:00', 0, '2025-08-04 16:02:31', '2025-08-04 16:06:52', '2025-08-04 16:06:52'),
(93, 'madoiqua', 10, 50000, 2, NULL, 0, 'ca_nhan', 10, '2025-08-04 23:01:00', '2025-08-05 23:02:00', 0, '2025-08-04 16:03:01', '2025-08-06 03:39:32', NULL),
(94, 'OJXCLKK0', 5, 500000, 2, 1, 1, 'ca_nhan', 0, '2025-08-05 14:50:35', '2025-08-12 14:50:35', 0, '2025-08-05 07:50:35', '2025-08-05 07:57:21', NULL),
(95, 'U96Q9HE8', 10, 1000000, 2, 1, 0, 'ca_nhan', 0, '2025-08-05 15:03:00', '2025-08-15 15:03:00', 0, '2025-08-05 08:03:00', '2025-08-06 16:13:32', NULL),
(96, 'madoiqua1', 40, 100000, NULL, 0, 2, 'ma_doi_qua', 10, '2025-08-06 22:43:00', '2025-08-07 22:43:00', 0, '2025-08-06 15:43:39', '2025-08-06 15:49:18', NULL),
(97, 'madoiqua1', 40, 100000, 2, NULL, 0, 'ca_nhan', 10, '2025-08-06 22:43:00', '2025-08-07 22:43:00', 0, '2025-08-06 15:44:47', '2025-08-06 16:13:21', NULL),
(98, 'QGPVNSSJ', 10, 1000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-06 22:47:22', '2025-08-16 22:47:22', 0, '2025-08-06 15:47:22', '2025-08-08 14:14:48', NULL),
(99, 'madoiqua13', 30, 100000, NULL, 0, 2, 'ma_doi_qua', 10, '2025-08-06 22:59:00', '2025-08-07 22:59:00', 0, '2025-08-06 15:59:26', '2025-08-07 16:31:25', NULL),
(100, 'madoiqua3', 30, 100000, 5, NULL, 0, 'ca_nhan', 10, '2025-08-06 22:59:00', '2025-08-07 22:59:00', 0, '2025-08-06 16:00:09', '2025-08-07 16:31:25', NULL),
(101, 'TBJAWFCC', 10, 1000000, 5, 1, 0, 'ca_nhan', 0, '2025-08-06 23:03:43', '2025-08-16 23:03:43', 0, '2025-08-06 16:03:43', '2025-08-17 05:39:45', NULL),
(102, 'madoiqua13', 30, 100000, 2, NULL, 2, 'ca_nhan', 10, '2025-08-06 22:59:00', '2025-08-07 22:59:00', 0, '2025-08-06 16:10:10', '2025-08-07 16:31:25', NULL),
(103, 'madoiqua17', 15, 20000, NULL, 1, 0, 'ma_doi_qua', 10, '2025-08-07 23:33:00', '2025-08-08 23:33:00', 0, '2025-08-07 16:35:18', '2025-08-09 14:43:02', NULL),
(104, '1zMvmlaQbA', 15, 20000, 2, 1, 1, 'ca_nhan', 10, '2025-08-07 23:33:00', '2025-08-08 23:33:00', 0, '2025-08-07 16:35:42', '2025-08-07 16:37:25', NULL),
(105, 'magiamgia', 30, 100000, NULL, 11, 0, 'cong_khai', 0, '2025-08-08 19:15:00', '2025-08-09 19:15:00', 0, '2025-08-08 12:15:42', '2025-08-09 14:43:02', NULL),
(106, 'magiamgia12', 10, 100000, NULL, 2, 2, 'cong_khai', 0, '2025-08-15 13:35:00', '2025-08-17 13:35:00', 0, '2025-08-15 06:35:33', '2025-08-15 14:20:50', NULL),
(107, 'MA01doi', 50, 100000, NULL, NULL, 0, 'ma_doi_qua', 10, '2025-08-15 17:27:00', '2025-08-16 17:27:00', 0, '2025-08-15 10:27:24', '2025-08-16 10:27:47', NULL),
(108, 'tcYQpImDum', 50, 100000, 2, 1, 1, 'ca_nhan', 10, '2025-08-15 17:27:00', '2025-08-16 17:27:00', 0, '2025-08-15 10:27:57', '2025-08-15 11:43:06', NULL),
(109, 'ma00', 30, 50000, NULL, 14, 1, 'cong_khai', 0, '2025-08-15 17:30:00', '2025-08-16 17:30:00', 0, '2025-08-15 10:30:20', '2025-08-16 10:31:06', NULL),
(110, 'IH3ATS7U', 10, 1000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-15 18:43:09', '2025-08-25 18:43:09', 0, '2025-08-15 11:43:09', '2025-08-15 16:30:05', NULL),
(111, 'magiamgia1', 40, 120000, NULL, NULL, 0, 'ma_doi_qua', 10, '2025-08-15 19:41:00', '2025-08-16 19:41:00', 0, '2025-08-15 12:41:27', '2025-08-17 05:39:45', NULL),
(112, 'zS7c6hrIC0', 40, 120000, 2, 1, 1, 'ca_nhan', 10, '2025-08-15 19:41:00', '2025-08-16 19:41:00', 0, '2025-08-15 12:41:43', '2025-08-15 16:33:03', NULL),
(113, 'EDLKB2EB', 15, 2000000, 2, 1, 2, 'ca_nhan', 0, '2025-08-15 20:50:09', '2025-08-30 20:50:09', 0, '2025-08-15 13:50:09', '2025-08-17 15:35:44', NULL),
(114, '9WKB3303', 10, 1000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-15 20:56:59', '2025-08-25 20:56:59', 0, '2025-08-15 13:56:59', '2025-08-18 08:42:03', NULL),
(115, 'VHHHZSWB', 10, 1000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-15 21:19:34', '2025-08-25 21:19:34', 0, '2025-08-15 14:19:34', '2025-08-15 16:57:42', NULL),
(116, 'HXO7SBZJ', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-15 21:20:54', '2025-08-30 21:20:54', 0, '2025-08-15 14:20:54', '2025-08-18 13:48:43', NULL),
(117, 'EC0P9DD0', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-15 21:23:15', '2025-08-30 21:23:15', 0, '2025-08-15 14:23:15', '2025-08-15 14:31:29', NULL),
(118, 'B6IDFAGG', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-15 21:31:33', '2025-08-30 21:31:33', 0, '2025-08-15 14:31:33', '2025-08-18 07:41:15', NULL),
(119, 'FGLYUUDZ', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-15 23:57:47', '2025-08-30 23:57:47', 0, '2025-08-15 16:57:47', '2025-08-18 08:30:57', NULL),
(120, 'RSX35M9V', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-16 17:21:09', '2025-08-31 17:21:09', 0, '2025-08-16 10:21:09', '2025-08-19 13:47:11', NULL),
(121, 'DZXJ1BSK', 15, 2000000, 1, 1, 0, 'ca_nhan', 0, '2025-08-17 21:51:02', '2025-09-01 21:51:02', 1, '2025-08-17 14:51:02', '2025-08-17 14:51:02', NULL),
(122, 'C2ZKTTVM', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-17 22:35:50', '2025-09-01 22:35:50', 0, '2025-08-17 15:35:50', '2025-08-20 06:52:02', NULL),
(123, '84GSJXOX', 5, 500000, 2, 1, 1, 'ca_nhan', 0, '2025-08-17 23:39:32', '2025-08-24 23:39:32', 0, '2025-08-17 16:39:32', '2025-08-19 13:43:32', NULL),
(124, 'EB8B1I0X', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-18 20:48:51', '2025-09-02 20:48:51', 0, '2025-08-18 13:48:51', '2025-08-20 06:04:44', NULL),
(125, 'YMRY270J', 5, 500000, 2, 1, 2, 'ca_nhan', 0, '2025-08-18 21:49:21', '2025-08-25 21:49:21', 0, '2025-08-18 14:49:21', '2025-08-20 09:10:02', NULL),
(126, 'ma111', 12, 12000, NULL, NULL, 0, 'ma_doi_qua', 10, '2025-08-18 21:56:00', '2025-08-19 21:57:00', 0, '2025-08-18 14:57:06', '2025-08-20 06:01:32', NULL),
(127, 'eOPBpokvPQ', 12, 12000, 2, 1, 0, 'ca_nhan', 10, '2025-08-18 21:56:00', '2025-08-19 21:57:00', 0, '2025-08-18 14:57:22', '2025-08-20 06:01:32', NULL),
(128, 'Y1EFFH8P', 15, 2000000, 2, 1, 1, 'ca_nhan', 0, '2025-08-19 14:43:56', '2025-09-03 14:43:56', 0, '2025-08-19 07:43:56', '2025-08-20 14:37:37', NULL),
(129, 'RX41Y9U8', 5, 500000, 2, 1, 1, 'ca_nhan', 0, '2025-08-20 13:08:46', '2025-08-27 13:08:46', 0, '2025-08-20 06:08:46', '2025-08-21 02:23:32', NULL),
(130, 'TRSWKCTU', 5, 500000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 16:10:06', '2025-08-27 16:10:06', 1, '2025-08-20 09:10:06', '2025-08-20 09:10:06', NULL),
(131, 'PQVIBHLS', 10, 1000000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 22:13:12', '2025-08-30 22:13:12', 1, '2025-08-20 15:13:12', '2025-08-20 15:13:12', NULL),
(132, 'IJ50MNMN', 15, 2000000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 22:35:38', '2025-09-04 22:35:38', 1, '2025-08-20 15:35:38', '2025-08-20 15:35:38', NULL),
(133, 'IRTS44QE', 15, 2000000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 22:40:04', '2025-09-04 22:40:04', 1, '2025-08-20 15:40:04', '2025-08-20 15:40:04', NULL),
(134, 'RIT3BNBY', 10, 1000000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 22:45:10', '2025-08-30 22:45:10', 1, '2025-08-20 15:45:10', '2025-08-20 15:45:10', NULL),
(135, 'GH7PH2MG', 10, 1000000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 23:10:58', '2025-08-30 23:10:58', 1, '2025-08-20 16:10:58', '2025-08-20 16:10:58', NULL),
(136, 'FIFPXI6X', 5, 500000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 23:34:04', '2025-08-27 23:34:04', 1, '2025-08-20 16:34:04', '2025-08-20 16:34:04', NULL),
(137, '8I7FVOVL', 5, 500000, 2, 1, 0, 'ca_nhan', 0, '2025-08-20 23:34:32', '2025-08-27 23:34:32', 1, '2025-08-20 16:34:32', '2025-08-20 16:34:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lich_su_diems`
--

CREATE TABLE `lich_su_diems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `khuyen_mai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `thay_doi` int(11) NOT NULL,
  `loai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lich_su_diems`
--

INSERT INTO `lich_su_diems` (`id`, `user_id`, `khuyen_mai_id`, `thay_doi`, `loai`, `noi_dung`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, -10, 'doi_diem', 'Đổi quà: 1zMvmlaQbA', '2025-08-07 16:35:42', '2025-08-07 16:35:42'),
(2, 2, NULL, -10, 'doi_diem', 'Đổi quà: tcYQpImDum', '2025-08-15 10:27:57', '2025-08-15 10:27:57'),
(3, 2, 112, -10, 'doi_diem', 'Đổi quà: zS7c6hrIC0', '2025-08-15 12:41:43', '2025-08-15 12:41:43'),
(4, 2, 127, -10, 'doi_diem', 'Đổi quà: eOPBpokvPQ', '2025-08-18 14:57:22', '2025-08-18 14:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten_nguoi_gui` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_nhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trang_thai_phan_hoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `created_at`, `updated_at`, `ten_nguoi_gui`, `tin_nhan`, `user_id`, `trang_thai_phan_hoi`, `deleted_at`) VALUES
(1, '2025-06-26 02:06:44', '2025-08-01 05:08:47', 'quan', 'uuhuhu', 2, 'resolved', NULL),
(2, '2025-06-26 02:06:45', '2025-06-26 02:06:45', 'quan', 'uuhuhu', 2, 'pending', NULL),
(3, '2025-06-26 09:14:27', '2025-06-26 09:14:27', 'quan', 'uhuhh', 1, 'pending', NULL),
(4, '2025-06-26 09:14:28', '2025-06-26 09:14:28', 'quan', 'uhuhh', 1, 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_mau_sac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_mau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mau_sacs`
--

INSERT INTO `mau_sacs` (`id`, `ten_mau_sac`, `ma_mau`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Màu đỏ', '#f00f0f', 1, '2025-06-23 02:12:05', '2025-06-23 02:12:18', NULL),
(2, 'Màu đen', '#000000', 1, '2025-06-23 02:12:40', '2025-06-23 02:12:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_room_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('file','text') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_26_064005_create_personal_access_tokens_table', 1),
(5, '2025_05_26_064117_create_danh_mucs_table', 1),
(6, '2025_05_26_064221_create_mau_sacs_table', 1),
(7, '2025_05_26_064337_create_dung_luongs_table', 1),
(8, '2025_05_26_064419_create_tags_table', 1),
(9, '2025_05_26_064451_create_khuyen_mais_table', 1),
(10, '2025_05_26_064528_create_banners_table', 1),
(11, '2025_05_26_064636_create_bai_viets_table', 1),
(12, '2025_05_26_064732_create_san_phams_table', 1),
(13, '2025_05_26_064820_create_bien_the_san_phams_table', 1),
(14, '2025_05_26_064930_create_hinh_anh_san_phams_table', 1),
(15, '2025_05_26_065028_create_tag_san_phams_table', 1),
(16, '2025_05_26_065109_create_yeu_thichs_table', 1),
(17, '2025_05_26_065148_create_hoa_dons_table', 1),
(18, '2025_05_26_065243_create_chi_tiet_hoa_dons_table', 1),
(19, '2025_05_26_065418_create_danh_gia_san_phams_table', 1),
(20, '2025_05_26_065826_add_columns_to_banners_table', 1),
(21, '2025_05_26_065908_add_ma_mau_to_mau_sacs_table', 1),
(22, '2025_05_26_065946_add_ma_hoa_don_to_hoa_dons_table', 1),
(23, '2025_05_26_070524_update_phuong_thuc_thanh_toan_in_hoa_dons_table', 1),
(24, '2025_05_26_070603_create_lien_hes_table', 1),
(25, '2025_05_26_070642_update_lien_hes_table', 1),
(26, '2025_05_26_070803_add_trang_thai_thanh_toan_to_hoa_dons_table', 1),
(27, '2025_05_26_070858_add_giam_toi_da_to_khuyen_mais_table', 1),
(28, '2025_05_26_071023_add_user_id_to_lien_hes_table', 1),
(29, '2025_05_26_071134_update_khuyen_mais_add_datetime_columns', 1),
(30, '2025_05_26_071210_create_admin_phan_hois_table', 1),
(31, '2025_05_26_071307_add_thoi_gian_het_han_to_hoa_dons_table', 1),
(32, '2025_05_26_071350_add_deleted_at_to_mau_sacs_table', 1),
(33, '2025_05_26_071420_add_thoi_gian_giao_dich_to_hoa_dons_table', 1),
(34, '2025_05_26_071703_remove_column_form_lien_hes', 1),
(35, '2025_05_26_071737_add_soft_deletes_to_tags_table', 1),
(36, '2025_05_26_071824_create_tra_lois_table', 1),
(37, '2025_05_26_071857_add_deleted_at_to_hoa_dons_table', 1),
(38, '2025_05_26_071924_add_status_to_lien_hes_table', 1),
(39, '2025_05_26_072012_add_is_hot_to_san_phams_table', 1),
(40, '2025_05_26_072049_add_trang_thai_phan_hoi_and_softdeletes_to_lien_hes_table', 1),
(41, '2025_06_20_060721_add_deleted_at_to_bai_viets_table', 1),
(42, '2025_06_20_061113_add_deleted_at_to_banners_table', 1),
(43, '2025_06_20_061250_add_deleted_at_to_khuyen_mais_table', 1),
(44, '2025_06_20_061427_add_deleted_at_to_dung_luongs_table', 1),
(45, '2025_07_02_192842_add_user_id_to_khuyen_mais_table', 2),
(46, '2025_07_06_132221_create_notifications_table', 3),
(47, '2025_07_06_132720_add_deleted_at_to_tag_san_phams_table', 3),
(48, '2025_07_06_162014_add_user_id_to_admin_phan_hois_table', 3),
(49, '2025_07_16_162251_add_loai_ma_to_khuyen_mais_table', 4),
(50, '2025_07_16_231009_add_ma_khuyen_mai_to_hoa_dons_table', 5),
(51, '2025_07_11_200648_create_permission_tables', 6),
(52, '2025_07_25_185829_create_chat_rooms_table', 7),
(53, '2025_07_25_185840_create_messages_table', 7),
(54, '2025_07_29_110117_add_is_online_to_users_table', 8),
(55, '2025_07_29_200343_add_type_to_messages_table', 8),
(56, '2025_07_29_203622_add_last_ping_at_to_users_table', 8),
(57, '2025_07_29_215257_add_is_read_to_messages_table', 8),
(58, '2025_07_31_214638_create_diem_danhs_table', 9),
(59, '2025_07_31_214654_add_diem_tich_luy_to_users_table', 9),
(60, '2025_08_03_184147_create_doi_quas_table', 10),
(61, '2025_08_03_184248_add_diem_so_luong_to_khuyen_mais_table', 10),
(62, '2025_08_03_184438_create_lich_su_doi_quas_table', 10),
(63, '2025_08_07_204327_rename_lich_su_diem_table_to_lich_su_diems', 11),
(64, '2025_08_09_215804_add_google_columns_to_users_table', 12),
(65, '2025_08_08_193005_add_ten_san_pham_to_chi_tiet_hoa_dons_table', 13),
(66, '2025_08_08_193519_add_ten_dung_luong_and_ten_mau_sac_to_chi_tiet_hoa_dons_table', 13),
(67, '2025_08_09_212917_update_so_dien_thoai_nullable_in_users_table', 13),
(68, '2025_08_09_221522_update_ngay_sinh_nullable_in_users_table', 13),
(69, '2025_08_15_192139_add_ly_do_huy_to_hoa_dons_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_id` bigint(20) UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `data_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'hoa_don', 43, 0, '2025-07-09 08:17:38', '2025-07-09 08:17:38'),
(2, 'hoa_don', 44, 0, '2025-07-09 08:20:30', '2025-07-09 08:20:30'),
(3, 'hoa_don', 45, 0, '2025-07-09 08:30:47', '2025-07-09 08:30:47'),
(4, 'hoa_don', 46, 0, '2025-07-09 08:31:56', '2025-07-09 08:31:56'),
(5, 'hoa_don', 47, 0, '2025-07-09 08:32:37', '2025-07-09 08:32:37'),
(6, 'hoa_don', 48, 0, '2025-07-09 08:32:55', '2025-07-09 08:32:55'),
(7, 'hoa_don', 49, 0, '2025-07-09 10:18:24', '2025-07-09 10:18:24'),
(8, 'hoa_don', 50, 0, '2025-07-09 10:19:00', '2025-07-09 10:19:00'),
(9, 'hoa_don', 51, 0, '2025-07-10 09:17:39', '2025-07-10 09:17:39'),
(10, 'hoa_don', 52, 0, '2025-07-10 09:18:23', '2025-07-10 09:18:23'),
(11, 'hoa_don', 53, 0, '2025-07-10 09:25:07', '2025-07-10 09:25:07'),
(12, 'hoa_don', 54, 0, '2025-07-10 09:30:07', '2025-07-10 09:30:07'),
(13, 'hoa_don', 55, 0, '2025-07-10 09:31:46', '2025-07-10 09:31:46'),
(14, 'hoa_don', 56, 0, '2025-07-11 04:59:06', '2025-07-11 04:59:06'),
(15, 'hoa_don', 57, 0, '2025-07-11 05:02:43', '2025-07-11 05:02:43'),
(16, 'hoa_don', 58, 0, '2025-07-11 05:29:04', '2025-07-11 05:29:04'),
(17, 'hoa_don', 59, 0, '2025-07-11 05:34:30', '2025-07-11 05:34:30'),
(18, 'hoa_don', 60, 0, '2025-07-11 05:49:41', '2025-07-11 05:49:41'),
(19, 'hoa_don', 61, 0, '2025-07-11 06:07:56', '2025-07-11 06:07:56'),
(20, 'hoa_don', 62, 0, '2025-07-13 14:46:06', '2025-07-13 14:46:06'),
(21, 'hoa_don', 63, 0, '2025-07-13 14:50:45', '2025-07-13 14:50:45'),
(22, 'hoa_don', 64, 0, '2025-07-16 09:39:12', '2025-07-16 09:39:12'),
(23, 'hoa_don', 65, 0, '2025-07-16 09:44:35', '2025-07-16 09:44:35'),
(24, 'hoa_don', 66, 0, '2025-07-16 09:57:22', '2025-07-16 09:57:22'),
(25, 'hoa_don', 67, 0, '2025-07-16 10:16:09', '2025-07-16 10:16:09'),
(26, 'hoa_don', 68, 0, '2025-07-16 10:20:36', '2025-07-16 10:20:36'),
(27, 'hoa_don', 69, 0, '2025-07-16 10:22:31', '2025-07-16 10:22:31'),
(28, 'hoa_don', 70, 0, '2025-07-16 10:46:48', '2025-07-16 10:46:48'),
(29, 'hoa_don', 71, 0, '2025-07-16 11:04:50', '2025-07-16 11:04:50'),
(30, 'hoa_don', 72, 0, '2025-07-16 16:23:20', '2025-07-16 16:23:20'),
(31, 'hoa_don', 73, 0, '2025-07-16 16:25:11', '2025-07-16 16:25:11'),
(32, 'hoa_don', 74, 0, '2025-07-16 16:48:00', '2025-07-16 16:48:00'),
(33, 'hoa_don', 75, 0, '2025-07-16 18:30:49', '2025-07-16 18:30:49'),
(34, 'hoa_don', 76, 0, '2025-07-17 08:26:36', '2025-07-17 08:26:36'),
(35, 'hoa_don', 77, 0, '2025-07-17 08:59:08', '2025-07-17 08:59:08'),
(36, 'hoa_don', 78, 0, '2025-07-17 09:02:23', '2025-07-17 09:02:23'),
(37, 'hoa_don', 79, 0, '2025-07-17 09:04:28', '2025-07-17 09:04:28'),
(38, 'hoa_don', 80, 0, '2025-07-17 09:07:48', '2025-07-17 09:07:48'),
(39, 'hoa_don', 81, 0, '2025-07-17 09:10:30', '2025-07-17 09:10:30'),
(40, 'hoa_don', 82, 0, '2025-07-17 13:11:36', '2025-07-17 13:11:36'),
(41, 'hoa_don', 83, 0, '2025-07-17 13:12:23', '2025-07-17 13:12:23'),
(42, 'hoa_don', 84, 0, '2025-07-17 13:19:54', '2025-07-17 13:19:54'),
(43, 'hoa_don', 85, 0, '2025-07-17 13:21:25', '2025-07-17 13:21:25'),
(44, 'hoa_don', 86, 0, '2025-07-17 13:31:16', '2025-07-17 13:31:16'),
(45, 'hoa_don', 87, 0, '2025-07-17 15:23:57', '2025-07-17 15:23:57'),
(46, 'hoa_don', 88, 0, '2025-07-17 15:35:29', '2025-07-17 15:35:29'),
(47, 'hoa_don', 89, 0, '2025-07-17 16:05:17', '2025-07-17 16:05:17'),
(48, 'hoa_don', 90, 0, '2025-07-17 16:27:37', '2025-07-17 16:27:37'),
(49, 'hoa_don', 91, 0, '2025-07-17 16:30:29', '2025-07-17 16:30:29'),
(50, 'hoa_don', 92, 0, '2025-07-17 16:32:45', '2025-07-17 16:32:45'),
(51, 'hoa_don', 93, 0, '2025-07-17 16:34:47', '2025-07-17 16:34:47'),
(52, 'hoa_don', 94, 0, '2025-07-17 16:37:28', '2025-07-17 16:37:28'),
(53, 'hoa_don', 95, 0, '2025-07-17 16:38:21', '2025-07-17 16:38:21'),
(54, 'hoa_don', 96, 0, '2025-07-17 16:42:12', '2025-07-17 16:42:12'),
(55, 'hoa_don', 97, 0, '2025-07-17 16:49:39', '2025-07-17 16:49:39'),
(56, 'hoa_don', 98, 0, '2025-07-17 16:53:12', '2025-07-17 16:53:12'),
(57, 'hoa_don', 99, 0, '2025-07-17 16:55:55', '2025-07-17 16:55:55'),
(58, 'hoa_don', 100, 0, '2025-07-17 17:09:13', '2025-07-17 17:09:13'),
(59, 'hoa_don', 101, 0, '2025-07-17 17:29:29', '2025-07-17 17:29:29'),
(60, 'hoa_don', 102, 0, '2025-07-17 17:31:46', '2025-07-17 17:31:46'),
(61, 'hoa_don', 103, 0, '2025-07-17 18:26:29', '2025-07-17 18:26:29'),
(62, 'hoa_don', 104, 0, '2025-07-18 01:07:17', '2025-07-18 01:07:17'),
(63, 'hoa_don', 105, 0, '2025-07-18 01:23:45', '2025-07-18 01:23:45'),
(64, 'danh_gia', 2, 0, '2025-07-18 01:44:50', '2025-07-18 01:44:50'),
(65, 'hoa_don', 106, 0, '2025-07-18 01:46:09', '2025-07-18 01:46:09'),
(66, 'hoa_don', 107, 0, '2025-07-18 01:47:44', '2025-07-18 01:47:44'),
(67, 'hoa_don', 108, 0, '2025-07-22 14:02:22', '2025-07-22 14:02:22'),
(68, 'hoa_don', 109, 0, '2025-07-24 06:37:12', '2025-07-24 06:37:12'),
(69, 'hoa_don', 110, 0, '2025-07-24 08:18:18', '2025-07-24 08:18:18'),
(70, 'hoa_don', 111, 0, '2025-07-24 08:23:10', '2025-07-24 08:23:10'),
(71, 'hoa_don', 112, 0, '2025-07-24 09:13:43', '2025-07-24 09:13:43'),
(72, 'hoa_don', 113, 0, '2025-07-24 09:40:50', '2025-07-24 09:40:50'),
(73, 'hoa_don', 114, 0, '2025-07-24 09:54:10', '2025-07-24 09:54:10'),
(74, 'hoa_don', 115, 0, '2025-07-24 10:08:28', '2025-07-24 10:08:28'),
(75, 'hoa_don', 116, 0, '2025-07-24 10:11:35', '2025-07-24 10:11:35'),
(76, 'hoa_don', 117, 0, '2025-07-24 10:16:19', '2025-07-24 10:16:19'),
(77, 'hoa_don', 118, 0, '2025-07-24 17:02:14', '2025-07-24 17:02:14'),
(78, 'hoa_don', 119, 0, '2025-07-25 08:38:30', '2025-07-25 08:38:30'),
(79, 'hoa_don', 120, 0, '2025-07-25 12:03:24', '2025-07-25 12:03:24'),
(80, 'hoa_don', 121, 0, '2025-07-25 12:05:16', '2025-07-25 12:05:16'),
(81, 'hoa_don', 122, 0, '2025-07-25 12:15:20', '2025-07-25 12:15:20'),
(82, 'hoa_don', 123, 0, '2025-07-25 12:24:36', '2025-07-25 12:24:36'),
(83, 'hoa_don', 124, 0, '2025-07-25 12:30:14', '2025-07-25 12:30:14'),
(84, 'hoa_don', 125, 0, '2025-07-25 12:31:13', '2025-07-25 12:31:13'),
(85, 'hoa_don', 126, 0, '2025-07-25 12:34:39', '2025-07-25 12:34:39'),
(86, 'hoa_don', 127, 0, '2025-07-25 12:37:04', '2025-07-25 12:37:04'),
(87, 'hoa_don', 128, 0, '2025-07-25 12:43:06', '2025-07-25 12:43:06'),
(88, 'hoa_don', 129, 0, '2025-07-25 12:44:13', '2025-07-25 12:44:13'),
(89, 'hoa_don', 130, 0, '2025-07-28 15:31:54', '2025-07-28 15:31:54'),
(90, 'hoa_don', 131, 0, '2025-07-30 04:23:04', '2025-07-30 04:23:04'),
(91, 'danh_gia', 3, 0, '2025-07-30 14:41:36', '2025-07-30 14:41:36'),
(92, 'danh_gia', 4, 0, '2025-07-30 14:41:56', '2025-07-30 14:41:56'),
(93, 'danh_gia', 5, 0, '2025-07-30 14:53:35', '2025-07-30 14:53:35'),
(94, 'danh_gia', 6, 0, '2025-07-30 14:54:07', '2025-07-30 14:54:07'),
(95, 'danh_gia', 7, 0, '2025-07-30 14:54:15', '2025-07-30 14:54:15'),
(96, 'hoa_don', 132, 0, '2025-07-30 14:55:44', '2025-07-30 14:55:44'),
(97, 'danh_gia', 8, 0, '2025-07-30 14:59:51', '2025-07-30 14:59:51'),
(98, 'danh_gia', 9, 0, '2025-07-30 15:01:38', '2025-07-30 15:01:38'),
(99, 'danh_gia', 10, 0, '2025-07-30 15:01:52', '2025-07-30 15:01:52'),
(100, 'hoa_don', 133, 0, '2025-07-31 06:18:21', '2025-07-31 06:18:21'),
(101, 'hoa_don', 134, 0, '2025-08-01 04:36:06', '2025-08-01 04:36:06'),
(102, 'hoa_don', 135, 0, '2025-08-01 06:57:49', '2025-08-01 06:57:49'),
(103, 'hoa_don', 136, 0, '2025-08-01 07:02:52', '2025-08-01 07:02:52'),
(104, 'hoa_don', 137, 0, '2025-08-01 07:10:21', '2025-08-01 07:10:21'),
(105, 'hoa_don', 138, 0, '2025-08-01 07:12:55', '2025-08-01 07:12:55'),
(106, 'hoa_don', 139, 0, '2025-08-01 07:15:50', '2025-08-01 07:15:50'),
(107, 'hoa_don', 140, 0, '2025-08-01 07:17:34', '2025-08-01 07:17:34'),
(108, 'hoa_don', 141, 0, '2025-08-01 07:40:45', '2025-08-01 07:40:45'),
(109, 'hoa_don', 142, 0, '2025-08-01 07:48:48', '2025-08-01 07:48:48'),
(110, 'hoa_don', 143, 0, '2025-08-01 07:49:43', '2025-08-01 07:49:43'),
(111, 'hoa_don', 144, 0, '2025-08-01 07:51:00', '2025-08-01 07:51:00'),
(112, 'hoa_don', 145, 0, '2025-08-01 08:02:04', '2025-08-01 08:02:04'),
(113, 'hoa_don', 146, 0, '2025-08-01 08:09:56', '2025-08-01 08:09:56'),
(114, 'hoa_don', 147, 0, '2025-08-01 08:13:41', '2025-08-01 08:13:41'),
(115, 'hoa_don', 148, 0, '2025-08-01 08:17:21', '2025-08-01 08:17:21'),
(116, 'hoa_don', 149, 0, '2025-08-01 08:19:11', '2025-08-01 08:19:11'),
(117, 'hoa_don', 150, 0, '2025-08-01 08:26:06', '2025-08-01 08:26:06'),
(118, 'hoa_don', 151, 0, '2025-08-01 08:28:08', '2025-08-01 08:28:08'),
(119, 'hoa_don', 152, 0, '2025-08-01 08:29:33', '2025-08-01 08:29:33'),
(120, 'hoa_don', 153, 0, '2025-08-01 08:34:06', '2025-08-01 08:34:06'),
(121, 'hoa_don', 154, 0, '2025-08-01 08:54:09', '2025-08-01 08:54:09'),
(122, 'hoa_don', 155, 0, '2025-08-01 08:56:25', '2025-08-01 08:56:25'),
(123, 'hoa_don', 156, 0, '2025-08-01 08:59:33', '2025-08-01 08:59:33'),
(124, 'hoa_don', 157, 0, '2025-08-05 07:49:55', '2025-08-05 07:49:55'),
(125, 'hoa_don', 158, 0, '2025-08-05 07:57:21', '2025-08-05 07:57:21'),
(126, 'hoa_don', 159, 0, '2025-08-05 08:01:16', '2025-08-05 08:01:16'),
(127, 'hoa_don', 160, 0, '2025-08-06 15:46:35', '2025-08-06 15:46:35'),
(128, 'hoa_don', 161, 0, '2025-08-06 15:49:18', '2025-08-06 15:49:18'),
(129, 'user', 5, 0, '2025-08-06 15:56:57', '2025-08-06 15:56:57'),
(130, 'hoa_don', 162, 0, '2025-08-06 16:03:04', '2025-08-06 16:03:04'),
(131, 'hoa_don', 163, 0, '2025-08-06 16:05:10', '2025-08-06 16:05:10'),
(132, 'hoa_don', 164, 0, '2025-08-06 16:36:18', '2025-08-06 16:36:18'),
(133, 'hoa_don', 165, 0, '2025-08-06 16:41:07', '2025-08-06 16:41:07'),
(134, 'hoa_don', 166, 0, '2025-08-06 16:45:06', '2025-08-06 16:45:06'),
(135, 'hoa_don', 167, 0, '2025-08-06 16:50:13', '2025-08-06 16:50:13'),
(136, 'hoa_don', 168, 0, '2025-08-06 16:53:20', '2025-08-06 16:53:20'),
(137, 'hoa_don', 169, 0, '2025-08-06 17:04:00', '2025-08-06 17:04:00'),
(138, 'user', 6, 0, '2025-08-07 07:06:53', '2025-08-07 07:06:53'),
(139, 'hoa_don', 170, 0, '2025-08-07 16:37:25', '2025-08-07 16:37:25'),
(140, 'hoa_don', 171, 0, '2025-08-08 14:14:48', '2025-08-08 14:14:48'),
(141, 'hoa_don', 172, 0, '2025-08-08 14:25:20', '2025-08-08 14:25:20'),
(142, 'hoa_don', 173, 0, '2025-08-10 11:04:11', '2025-08-10 11:04:11'),
(143, 'hoa_don', 174, 0, '2025-08-12 12:14:55', '2025-08-12 12:14:55'),
(144, 'hoa_don', 175, 0, '2025-08-14 13:43:16', '2025-08-14 13:43:16'),
(145, 'hoa_don', 176, 0, '2025-08-14 13:48:08', '2025-08-14 13:48:08'),
(146, 'hoa_don', 177, 0, '2025-08-14 14:48:52', '2025-08-14 14:48:52'),
(147, 'hoa_don', 178, 0, '2025-08-15 11:42:37', '2025-08-15 11:42:37'),
(148, 'hoa_don', 179, 0, '2025-08-15 13:49:13', '2025-08-15 13:49:13'),
(149, 'hoa_don', 180, 0, '2025-08-15 13:53:05', '2025-08-15 13:53:05'),
(150, 'danh_gia', 11, 0, '2025-08-15 13:58:47', '2025-08-15 13:58:47'),
(151, 'hoa_don', 181, 0, '2025-08-15 14:18:48', '2025-08-15 14:18:48'),
(152, 'hoa_don', 182, 0, '2025-08-15 14:20:23', '2025-08-15 14:20:23'),
(153, 'hoa_don', 183, 0, '2025-08-15 14:22:40', '2025-08-15 14:22:40'),
(154, 'hoa_don', 184, 0, '2025-08-15 14:30:38', '2025-08-15 14:30:38'),
(155, 'hoa_don', 185, 0, '2025-08-15 15:35:45', '2025-08-15 15:35:45'),
(156, 'hoa_don', 186, 0, '2025-08-15 16:30:05', '2025-08-15 16:30:05'),
(157, 'hoa_don', 187, 0, '2025-08-15 16:33:03', '2025-08-15 16:33:03'),
(158, 'hoa_don', 188, 0, '2025-08-15 16:56:15', '2025-08-15 16:56:15'),
(159, 'hoa_don', 189, 0, '2025-08-15 17:34:36', '2025-08-15 17:34:36'),
(160, 'hoa_don', 190, 0, '2025-08-16 10:20:30', '2025-08-16 10:20:30'),
(161, 'hoa_don', 191, 0, '2025-08-17 14:50:13', '2025-08-17 14:50:13'),
(162, 'hoa_don', 192, 0, '2025-08-17 16:38:50', '2025-08-17 16:38:50'),
(163, 'hoa_don', 193, 0, '2025-08-17 16:48:07', '2025-08-17 16:48:07'),
(164, 'hoa_don', 194, 0, '2025-08-18 07:41:15', '2025-08-18 07:41:15'),
(165, 'hoa_don', 195, 0, '2025-08-18 08:30:57', '2025-08-18 08:30:57'),
(166, 'hoa_don', 196, 0, '2025-08-18 08:34:39', '2025-08-18 08:34:39'),
(167, 'hoa_don', 197, 0, '2025-08-18 08:42:03', '2025-08-18 08:42:03'),
(168, 'hoa_don', 198, 0, '2025-08-18 13:47:58', '2025-08-18 13:47:58'),
(169, 'hoa_don', 199, 0, '2025-08-18 14:48:43', '2025-08-18 14:48:43'),
(170, 'hoa_don', 200, 0, '2025-08-18 15:44:56', '2025-08-18 15:44:56'),
(171, 'hoa_don', 201, 0, '2025-08-18 15:46:35', '2025-08-18 15:46:35'),
(172, 'hoa_don', 202, 0, '2025-08-19 07:43:15', '2025-08-19 07:43:15'),
(173, 'hoa_don', 203, 0, '2025-08-19 13:43:32', '2025-08-19 13:43:32'),
(174, 'hoa_don', 204, 0, '2025-08-19 13:45:25', '2025-08-19 13:45:25'),
(175, 'hoa_don', 205, 0, '2025-08-19 13:47:11', '2025-08-19 13:47:11'),
(176, 'hoa_don', 206, 0, '2025-08-19 13:49:33', '2025-08-19 13:49:33'),
(177, 'hoa_don', 207, 0, '2025-08-20 06:04:44', '2025-08-20 06:04:44'),
(178, 'hoa_don', 208, 0, '2025-08-20 06:07:01', '2025-08-20 06:07:01'),
(179, 'hoa_don', 209, 0, '2025-08-20 06:52:02', '2025-08-20 06:52:02'),
(180, 'hoa_don', 210, 0, '2025-08-20 09:07:02', '2025-08-20 09:07:02'),
(181, 'hoa_don', 211, 0, '2025-08-20 14:37:37', '2025-08-20 14:37:37'),
(182, 'hoa_don', 212, 0, '2025-08-20 14:54:15', '2025-08-20 14:54:15'),
(183, 'hoa_don', 213, 0, '2025-08-20 15:12:29', '2025-08-20 15:12:29'),
(184, 'hoa_don', 214, 0, '2025-08-20 15:35:02', '2025-08-20 15:35:02'),
(185, 'hoa_don', 215, 0, '2025-08-20 15:39:28', '2025-08-20 15:39:28'),
(186, 'hoa_don', 216, 0, '2025-08-20 15:44:36', '2025-08-20 15:44:36'),
(187, 'hoa_don', 217, 0, '2025-08-20 15:47:20', '2025-08-20 15:47:20'),
(188, 'hoa_don', 218, 0, '2025-08-20 15:56:36', '2025-08-20 15:56:36'),
(189, 'hoa_don', 219, 0, '2025-08-20 16:12:34', '2025-08-20 16:12:34'),
(190, 'hoa_don', 220, 0, '2025-08-20 16:13:20', '2025-08-20 16:13:20'),
(191, 'hoa_don', 221, 0, '2025-08-20 16:28:30', '2025-08-20 16:28:30'),
(192, 'hoa_don', 222, 0, '2025-08-20 16:40:51', '2025-08-20 16:40:51'),
(193, 'hoa_don', 223, 0, '2025-08-20 16:49:30', '2025-08-20 16:49:30'),
(194, 'hoa_don', 224, 0, '2025-08-20 17:01:19', '2025-08-20 17:01:19'),
(195, 'hoa_don', 225, 0, '2025-08-21 02:23:32', '2025-08-21 02:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-07-17 15:54:11', '2025-07-17 15:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danh_muc_id` bigint(20) UNSIGNED NOT NULL,
  `anh_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `luot_xem` bigint(20) UNSIGNED NOT NULL,
  `da_ban` bigint(20) UNSIGNED NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `danh_muc_id`, `anh_san_pham`, `mo_ta`, `luot_xem`, `da_ban`, `is_hot`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SP002', 'Laptop dell inspiron 15 3520 i5 1235u/16gb/512gb/15.6\"fhd/win11/office hs24/os365', 1, 'storage/thumbnail/hDgnl1SqTBqpGQyidnTufAOGNyuCnYdyZwjeu6it.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Phi&ecirc;n bản Dell Inspiron 15 3520 l&agrave; sản phẩm c&acirc;n bằng tốt giữa ba yếu tố: gi&aacute; th&agrave;nh cạnh tranh, thương hiệu tốt v&agrave; hiệu năng đ&aacute;p ứng tốt nhu cầu giới văn ph&ograve;ng. Mẫu laptop n&agrave;y l&ecirc;n kệ với m&agrave;u Đen lịch thiệp, được c&agrave;i đặt sẵn Windows 11 Home bản quyền v&agrave; trang bị Office Home and Student phục vụ cho c&ocirc;ng việc.</strong></p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 71054775 (1)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_i5_1235u_9_39df23b1ee.jpg\" /></p>\r\n\r\n<h2><strong>Hiệu năng tốt, vận h&agrave;nh ổn định v&agrave; mượt m&agrave;</strong></h2>\r\n\r\n<p>Được trang bị vi xử l&yacute; Intel Core i5-1235U thuộc thế hệ Alder Lake, Dell Inspiron 3520 cho thấy khả năng xử l&yacute; vượt trội với 10 nh&acirc;n 12 luồng, xung nhịp tối đa 4.4GHz. D&ugrave; l&agrave; l&agrave;m việc văn ph&ograve;ng, chỉnh sửa h&igrave;nh ảnh, bi&ecirc;n tập video hay chơi game eSports, thiết bị vẫn vận h&agrave;nh trơn tru kh&ocirc;ng giật lag.</p>\r\n\r\n<p>Điểm s&aacute;ng của d&ograve;ng chip Alder Lake nằm ở khả năng tối ưu điện năng, gi&uacute;p thiết bị vận h&agrave;nh ổn định trong thời gian d&agrave;i m&agrave; kh&ocirc;ng qu&aacute; nhiệt. Nhờ vậy, sản phẩm cung cấp trải nghiệm l&agrave;m việc thoải m&aacute;i, kh&ocirc;ng bị giảm s&uacute;t về hiệu suất hay gặp hiện tượng n&oacute;ng l&ecirc;n nhanh ch&oacute;ng.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 71054775 (2)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_i5_1235u_8_466f4b7c69.jpg\" /></p>\r\n\r\n<h2><strong>Thoải m&aacute;i đa nhiệm, kh&ocirc;ng lo giật lag</strong></h2>\r\n\r\n<p>Kh&ocirc;ng cần bận t&acirc;m về t&igrave;nh trạng giật lag khi mở nhiều tab tr&igrave;nh duyệt hay chạy c&aacute;c phần mềm nặng, Dell Inspiron 3520 được trang bị bộ nhớ RAM 16GB gi&uacute;p bạn xử l&yacute; c&ocirc;ng việc một c&aacute;ch mượt m&agrave;. Từ d&acirc;n văn ph&ograve;ng, designer đến lập tr&igrave;nh vi&ecirc;n, ai cũng đều h&agrave;i l&ograve;ng trước tốc độ phản hồi nhanh ch&oacute;ng, n&acirc;ng cao hiệu suất l&agrave;m việc đ&aacute;ng kể.</p>\r\n\r\n<p>Với RAM 16GB, bạn ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m khi chuyển đổi li&ecirc;n tục giữa c&aacute;c ứng dụng tr&ecirc;n&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>, đảm bảo hiệu suất tối ưu ngay cả khi chạy c&aacute;c phần mềm y&ecirc;u cầu t&agrave;i nguy&ecirc;n cao.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 71054775 (3)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_i5_1235u_3_047b3f150b.jpg\" /></p>\r\n\r\n<h2><strong>Khởi động tức th&igrave; v&agrave; lưu trữ thỏa th&iacute;ch</strong></h2>\r\n\r\n<p>Lợi thế m&agrave; ổ cứng SSD PCIe M.2 512GB đem lại gi&uacute;p Inspiron 3520 khởi động hệ thống chỉ trong v&agrave;i gi&acirc;y, đồng thời tối ưu h&oacute;a tốc độ mở ứng dụng v&agrave; sao ch&eacute;p dữ liệu. Với tốc độ truy xuất cực nhanh, mọi t&aacute;c vụ từ đơn giản đến phức tạp đều được thực hiện trong chớp mắt.</p>\r\n\r\n<p>Dung lượng 512GB cũng l&agrave; một điểm cộng lớn, cho ph&eacute;p bạn lưu trữ h&agrave;ng ng&agrave;n t&agrave;i liệu, h&igrave;nh ảnh, video m&agrave; kh&ocirc;ng lo thiếu kh&ocirc;ng gian. Nhờ đ&oacute;, Dell Inspiron 3520 thể hiện sự kết hợp tối ưu giữa tốc độ vận h&agrave;nh v&agrave; dung lượng lưu trữ, đ&aacute;p ứng tốt cả những đ&ograve;i hỏi trong c&ocirc;ng việc v&agrave; giải tr&iacute;.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 71054775 (4)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_i5_1235u_6_f12b37bea7.jpg\" /></p>\r\n\r\n<h2><strong>Tận hưởng những khu&ocirc;n h&igrave;nh chi tiết, đ&atilde; mắt</strong></h2>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell\">Dell</a>&nbsp;đ&atilde; đưa l&ecirc;n sản phẩm Inspiron 3520 m&agrave;n h&igrave;nh 15.6 inch Full HD với tần số qu&eacute;t 120Hz cho trải nghiệm hiển thị vượt trội. So với m&agrave;n h&igrave;nh 60Hz th&ocirc;ng thường, tấm nền 120Hz gi&uacute;p mọi chuyển động trở n&ecirc;n mượt m&agrave; gấp đ&ocirc;i, từ cuộn trang web, chỉnh sửa t&agrave;i liệu đến xem phim v&agrave; chơi game.</p>\r\n\r\n<p>Độ s&aacute;ng cao, độ tương phản tốt gi&uacute;p h&igrave;nh ảnh hiển thị sống động v&agrave; ch&acirc;n thực, ngay cả khi l&agrave;m việc trong m&ocirc;i trường c&oacute; &aacute;nh s&aacute;ng mạnh. Nếu bạn đang kiếm t&igrave;m một mẫu laptop vừa phục vụ tốt cho c&ocirc;ng việc, vừa cung cấp trải nghiệm giải tr&iacute; đỉnh cao th&igrave; Inspiron 3520 ch&iacute;nh l&agrave; lựa chọn đ&aacute;ng c&acirc;n nhắc.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 71054775 (5)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_i5_1235u_1_42014f2867.jpg\" /></p>\r\n\r\n<h2><strong>Đầy đủ cổng kết nối, nhanh ch&oacute;ng v&agrave; tiện lợi</strong></h2>\r\n\r\n<p>Inspiron 3520 được trang bị đầy đủ c&aacute;c cổng kết nối hiện đại, tạo điều kiện để bạn dễ d&agrave;ng gh&eacute;p nối laptop với c&aacute;c thiết bị ngoại vi v&agrave; truyền tải dữ liệu nhanh ch&oacute;ng. Ba cổng USB (bao gồm hai cổng USB 3.2 Gen 1) cho ph&eacute;p bạn sao ch&eacute;p tệp tin tốc độ cao.</p>\r\n\r\n<p>Ngo&agrave;i ra, cổng USB-C gi&uacute;p kết nối dễ d&agrave;ng với điện thoại, tablet v&agrave; c&aacute;c thiết bị kh&aacute;c. Wi-Fi mạnh mẽ c&ugrave;ng Bluetooth 5.0 đảm bảo kết nối kh&ocirc;ng d&acirc;y ổn định, gi&uacute;p qu&aacute; tr&igrave;nh trải nghiệm laptop mỗi ng&agrave;y trở n&ecirc;n linh hoạt hơn bao giờ hết.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 71054775 (6)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_i5_1235u_2_673f2bfedc.jpg\" /></p>\r\n\r\n<h2><strong>Ho&agrave;n thiện chỉn chu, thiết kế bền bỉ sang trọng</strong></h2>\r\n\r\n<p>Sở hữu thiết kế thanh lịch, được ho&agrave;n thiện chỉn chu với gam m&agrave;u Đen sang trọng,&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell-inspiron\">Dell Inspiron</a>&nbsp;khoe d&aacute;ng với diện mạo hiện đại v&agrave; chuy&ecirc;n nghiệp. M&aacute;y c&oacute; trọng lượng chỉ 1.9kg v&agrave; độ mỏng 18.9mm, đủ linh hoạt để bạn mang theo khi đi l&agrave;m, đi học hay c&ocirc;ng t&aacute;c xa.</p>\r\n\r\n<p>Viền m&agrave;n h&igrave;nh tương đối mỏng gi&uacute;p tối ưu kh&ocirc;ng gian hiển thị, mang đến trải nghiệm thị gi&aacute;c rộng mở hơn. Chất liệu cao cấp c&ugrave;ng độ ho&agrave;n thiện tỉ mỉ gi&uacute;p Inspiron 3520 ghi điểm về thẩm mỹ v&agrave; bền bỉ theo thời gian, đảm bảo sự ổn định l&acirc;u d&agrave;i.</p>', 491, 0, 1, NULL, '2025-06-23 02:14:03', '2025-08-21 02:23:04'),
(2, 'SP001', 'Laptop hp 14-ep0112tu i5 1335u/16gb/512gb/14\'fhd/win11', 4, 'storage/thumbnail/fGDCJ1nmPuU21o0hkot7SdQWCbW2V0XrEK7nhHq1.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/hp-14-ep0112tu-i5-1335u\"><strong>HP 14-ep0112TU</strong></a><strong>&nbsp;thuộc d&ograve;ng laptop mỏng nhẹ với thiết kế tinh tế, thanh lịch. Đồng thời, sản phẩm cũng sở hữu cấu h&igrave;nh mạnh mẽ nổi bật trong ph&acirc;n kh&uacute;c với những trang bị ấn tượng gồm vi xử l&yacute; Intel Core i5 1335U, 16GB RAM v&agrave; ổ cứng SSD 512GB, đảm bảo đ&aacute;p ứng đa dạng nhu cầu của người d&ugrave;ng, c&oacute; thể d&ugrave;ng để học tập, l&agrave;m việc v&agrave; cả giải tr&iacute;.</strong></p>\r\n\r\n<h3><strong>Thiết kế si&ecirc;u mỏng nhẹ, thời thượng</strong></h3>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/hp\">Laptop HP</a>&nbsp;lu&ocirc;n g&acirc;y ấn tượng với thiết kế mỏng nhẹ, đảm bảo t&iacute;nh cơ động cao v&agrave; HP 14-ep0112TU cũng vậy. M&aacute;y c&oacute; trọng lượng chỉ 1.4kg, d&agrave;y 1.79cm để bạn c&oacute; thể mang theo đi bất cứ đ&acirc;u. Kiểu d&aacute;ng thanh mảnh với c&aacute;c g&oacute;c v&agrave; cạnh được bo cong mềm mại, gi&uacute;p tổng thể th&ecirc;m phần thanh lịch nhưng kh&ocirc;ng k&eacute;m phần sang trọng. Phi&ecirc;n bản m&agrave;u bạc thời trang, ph&ugrave; hợp với mọi đối tượng v&agrave; kh&ocirc;ng lỗi mốt theo thời gian.</p>\r\n\r\n<p><img alt=\"Laptop HP 14-ep0112TU sở hữu thiết kế mỏng nhẹ, thanh lịch\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/PC/hp-14-ep0112tu-i5-1335u-1.jpg\" /></p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh Full HD sắc n&eacute;t, cho trải nghiệm h&igrave;nh ảnh xuất sắc</strong></h3>\r\n\r\n<p>M&agrave;n h&igrave;nh laptop HP c&oacute; k&iacute;ch thước 14 inch với c&aacute;c viền xung quanh được l&agrave;m mỏng theo thiết kế micro-edge để tối ưu tỷ lệ m&agrave;n h&igrave;nh so với th&acirc;n m&aacute;y l&agrave; 84.01%. Bạn sẽ c&oacute; khung h&igrave;nh đủ rộng để hiển thị r&otilde; r&agrave;ng mọi nội dung, kể cả những bảng t&iacute;nh nhiều cột, th&iacute;ch hợp cho cả khi học tập, l&agrave;m việc hay xem phim, chơi game.</p>\r\n\r\n<p><img alt=\"Laptop HP 14-ep0112TU xuất hiện với màn hình 14 inch, FHD\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/PC/hp-14-ep0112tu-i5-1335u-2.jpg\" /></p>\r\n\r\n<p>Độ ph&acirc;n giải FHD (1920 x 1080 pixels), độ phủ m&agrave;u 62.5% sRGB đem đến những h&igrave;nh ảnh sắc n&eacute;t v&agrave; m&agrave;u sắc ch&acirc;n thực, sống động. M&agrave;n h&igrave;nh m&aacute;y cũng c&oacute; khả năng chống ch&oacute;i v&agrave; chống nhấp nh&aacute;y để hiển thị tốt ở những nơi c&oacute; &aacute;nh s&aacute;ng mạnh, đồng thời đem đến sự thoải m&aacute;i cho đ&ocirc;i mắt trong suốt qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<h3><strong>N&acirc;ng tầm hiệu năng, xử l&yacute; t&aacute;c vụ mượt m&agrave;</strong></h3>\r\n\r\n<p>Cung cấp hiệu năng cho laptop HP 14-ep0112TU l&agrave; vi xử l&yacute; Intel Core i5 1335U, sản xuất tr&ecirc;n tiến tr&igrave;nh 10nm ti&ecirc;n tiến, gồm 10 nh&acirc;n 12 luồng, tốc độ tối đa l&ecirc;n đến 4.6GHz. Những th&ocirc;ng số n&agrave;y cho thấy con chip Core i5 c&ograve;n mạnh hơn một số chip Intel Core i7 đời đầu.&nbsp;</p>\r\n\r\n<p><img alt=\"Laptop HP 14-ep0112TU được trang bị chip Intel Core i5 1335U\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/PC/hp-14-ep0112tu-i5-1335u-3.jpg\" /></p>\r\n\r\n<p>Chưa kể, với việc được t&iacute;ch hợp GPU Intel Iris Xe Graphics, chip Intel Core i5 1335U cho ph&eacute;p laptop HP c&oacute; thể xử l&yacute; được mọi t&aacute;c vụ tr&ecirc;n những ứng dụng văn ph&ograve;ng cơ bản cho tới thiết kế đồ họa, chỉnh sửa ảnh, edit video tr&ecirc;n một số phần mềm chuy&ecirc;n nghiệp, hay thậm ch&iacute; l&agrave; chơi game eSports.</p>\r\n\r\n<h3><strong>Kh&ocirc;ng gian đa nhiệm thoải m&aacute;i</strong></h3>\r\n\r\n<p>Laptop HP 14-ep0112TU sở hữu 2 thanh RAM DDR4 8GB, tổng dung lượng RAM 16GB mở ra kh&ocirc;ng gian đa nhiệm mượt m&agrave; v&agrave; thoải m&aacute;i. Bạn c&oacute; thể tự tin xử l&yacute; nhiều t&aacute;c vụ c&ugrave;ng l&uacute;c tr&ecirc;n nhiều phần mềm, mở h&agrave;ng chục tab tr&ecirc;n tr&igrave;nh duyệt, ho&agrave;n to&agrave;n kh&ocirc;ng lo t&igrave;nh trạng giật lag hay phản hồi chậm.</p>\r\n\r\n<p><img alt=\"Laptop HP 14-ep0112TU sở hữu 16GB RAM cho hoạt động đa nhiệm mượt mà\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/PC/hp-14-ep0112tu-i5-1335u-4.jpg\" /></p>\r\n\r\n<p>C&ugrave;ng với đ&oacute; c&ograve;n c&oacute; ổ cứng SSD PCIe&nbsp;Gen4 NVMe&nbsp;M.2 512GB kh&ocirc;ng chỉ bền vững, lưu trữ dữ liệu thoải m&aacute;i m&agrave; c&ograve;n tăng tốc độ khởi động, mở ứng dụng, di chuyển/sao ch&eacute;p dữ liệu. Những trang bị n&agrave;y sẽ gi&uacute;p bạn ho&agrave;n th&agrave;nh c&ocirc;ng việc nhanh hơn, hiệu quả hơn v&agrave; tiết kiệm thời gian tối ưu.</p>\r\n\r\n<h3><strong>Hỗ trợ hội họp từ xa hiệu quả</strong></h3>\r\n\r\n<p>Với việc được trang bị webcam HP True Vision 720p HD c&ugrave;ng micro k&eacute;p c&oacute; khả năng giảm tiếng ồn, bạn c&oacute; thể tham gia v&agrave;o c&aacute;c buổi họp v&agrave; học trực tuyến từ xa thuận tiện, tương t&aacute;c với mọi người tốt hơn, đảm bảo về cả chất lượng &acirc;m thanh v&agrave; h&igrave;nh ảnh.</p>\r\n\r\n<h3><strong>Đầy đủ cổng kết nối h&agrave;ng đầu</strong></h3>\r\n\r\n<p>HP 14-ep0112TU được trang bị đầy đủ những cổng kết nối phổ biến h&agrave;ng đầu hiện nay, đồng thời hỗ trợ phương thức kết nối kh&ocirc;ng d&acirc;y qua Bluetooth 5.3 ti&ecirc;n tiến. Ở hai b&ecirc;n sườn m&aacute;y, bạn sẽ thấy c&aacute;c cổng giao tiếp gồm&nbsp;cổng USB Type-A,&nbsp;cổng USB Type-C,&nbsp;cổng HDMI 1.4 v&agrave; jack tai nghe/mic 3.5mm.&nbsp;</p>\r\n\r\n<p><img alt=\"Laptop HP 14-ep0112TU được trang bị nhiều cổng giao tiếp thông dụng\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/PC/hp-14-ep0112tu-i5-1335u-5.jpg\" /></p>\r\n\r\n<p>C&aacute;c cổng USB đều c&oacute; tốc độ truyền t&iacute;n hiệu l&ecirc;n tới 5Gbps, gi&uacute;p sao ch&eacute;p, di chuyển dữ liệu cực nhanh. Nhờ đ&oacute;, bạn c&oacute; thể kết nối laptop HP với c&aacute;c thiết bị ngoại vi như m&aacute;y in, m&aacute;y chiếu, loa, tivi,... dễ d&agrave;ng m&agrave; kh&ocirc;ng cần lo lắng về khả năng tương th&iacute;ch.</p>\r\n\r\n<h3><strong>Bảo mật cao</strong></h3>\r\n\r\n<p>H&igrave;nh thức bảo mật bằng mật khẩu gi&uacute;p bạn bảo vệ dữ liệu an to&agrave;n hơn khi cần thiết. Đồng thời, webcam của m&aacute;y cũng c&oacute; m&agrave;n trập để ngăn chặn t&igrave;nh trạng x&acirc;m nhập h&igrave;nh ảnh tr&aacute;i ph&eacute;p. Chưa kết, HP 14-ep0112TU cũng được c&agrave;i đặt con chip bảo mật cấp thương mại Trusted Platform Module, gi&uacute;p lưu trữ v&agrave; m&atilde; h&oacute;a mật khẩu của bạn an to&agrave;n.</p>\r\n\r\n<h3><strong>Thời lượng pin d&agrave;i</strong></h3>\r\n\r\n<p>B&ecirc;n trong laptop HP 14-ep0112TU l&agrave; vi&ecirc;n pin 3 Cell 41Wh gi&uacute;p m&aacute;y hoạt động bền bỉ với hiệu suất ổn định l&ecirc;n đến 9 giờ đồng hồ m&agrave; kh&ocirc;ng cần sạc lại. Nhờ vậy, những cuộc họp quan trọng hay việc sử dụng&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;trong một chuyến bay d&agrave;i đều sẽ được đ&aacute;p ứng một c&aacute;ch hiệu quả</p>', 93, 0, 0, NULL, '2025-06-23 02:14:58', '2025-08-20 09:51:40'),
(3, 'SP00222', 'Laptop acer aspire lite 16 al16-52p-572a', 2, 'storage/thumbnail/tXzWjSVQt732Y4QBTGLYR4Kg8ePY634ObZRIwpdi.jpg', '<p><em><strong>Laptop Acer Aspire Lite 16 AL16-52P-572A nổi bật với thiết kế mỏng nhẹ, hiệu năng mạnh mẽ từ chip Intel&reg; Core&trade; i5-1334U v&agrave; m&agrave;n h&igrave;nh FHD+ 16 inch sắc n&eacute;t. Sản phẩm ph&ugrave; hợp cho sinh vi&ecirc;n, d&acirc;n văn ph&ograve;ng với RAM 16GB DDR5 v&agrave; SSD 512GB. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng trong ph&acirc;n kh&uacute;c laptop tầm trung.</strong></em></p>\r\n\r\n<h2><strong>Thiết kế sang trọng, bền bỉ v&agrave; di động</strong></h2>\r\n\r\n<p><a href=\"https://hacom.vn/laptop\" target=\"_blank\">Laptop</a>&nbsp;Acer Aspire Lite 16 AL16-52P-572A sở hữu thiết kế hiện đại với lớp vỏ nhựa ABS cao cấp m&agrave;u bạc, mang đến vẻ ngo&agrave;i sang trọng v&agrave; tinh tế. Với trọng lượng chỉ 1,7kg v&agrave; độ d&agrave;y 18,9mm, chiếc laptop n&agrave;y dễ d&agrave;ng mang theo khi di chuyển, ph&ugrave; hợp cho sinh vi&ecirc;n hoặc d&acirc;n văn ph&ograve;ng thường xuy&ecirc;n l&agrave;m việc ở nhiều địa điểm kh&aacute;c nhau. Vỏ nhựa ABS kh&ocirc;ng chỉ đảm bảo độ bền m&agrave; c&ograve;n gi&uacute;p tăng tuổi thọ của m&aacute;y, chống chịu tốt trước c&aacute;c va chạm nhẹ trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p>Điểm nhấn trong thiết kế của Acer Aspire Lite 16 l&agrave; sự tối giản nhưng vẫn to&aacute;t l&ecirc;n vẻ chuy&ecirc;n nghiệp. C&aacute;c đường n&eacute;t được gia c&ocirc;ng cẩn thận, tạo cảm gi&aacute;c chắc chắn v&agrave; cao cấp. Đ&acirc;y l&agrave; một lựa chọn l&yacute; tưởng cho những ai y&ecirc;u th&iacute;ch sự kết hợp giữa thẩm mỹ v&agrave; t&iacute;nh thực dụng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/06-03-2025/87090_laptop_acer_aspire_lite_16_al16_52p_572a_nx_j2ssv_004_i5_1334u_16gb_ram_512gb_ssd_16__1_.png\" style=\"height:734px; width:850px\" /></p>\r\n\r\n<h2><strong>Hiệu năng vượt trội với Intel&reg; Core&trade; i5-1334U</strong></h2>\r\n\r\n<p>Laptop Acer Aspire Lite 16 được trang bị bộ vi xử l&yacute; Intel&reg; Core&trade; i5-1334U, một con chip mạnh mẽ với 10 nh&acirc;n (2 P-Cores đạt xung nhịp tối đa 4,6GHz v&agrave; 8 E-Cores đạt 3,4GHz) v&agrave; 12 luồng. Bộ nhớ đệm 12MB Intel&reg; Smart Cache gi&uacute;p tối ưu h&oacute;a hiệu suất xử l&yacute;, đặc biệt khi thực hiện c&aacute;c t&aacute;c vụ đa nhiệm như chạy nhiều ứng dụng văn ph&ograve;ng, chỉnh sửa h&igrave;nh ảnh hoặc xem video độ ph&acirc;n giải cao.</p>\r\n\r\n<p>Kết hợp với RAM 16GB DDR5 tốc độ 4800MHz, chiếc laptop n&agrave;y mang đến khả năng xử l&yacute; nhanh ch&oacute;ng v&agrave; mượt m&agrave;. Người d&ugrave;ng c&oacute; thể dễ d&agrave;ng mở nhiều tab tr&igrave;nh duyệt, sử dụng phần mềm văn ph&ograve;ng hoặc thậm ch&iacute; chạy c&aacute;c ứng dụng đồ họa cơ bản m&agrave; kh&ocirc;ng lo giật lag. Điểm đặc biệt l&agrave; m&aacute;y hỗ trợ n&acirc;ng cấp RAM tối đa l&ecirc;n đến 64GB, mang lại sự linh hoạt cho những ai c&oacute; nhu cầu sử dụng cao hơn trong tương lai.</p>\r\n\r\n<p>Ổ cứng SSD PCIe NVMe 512GB kh&ocirc;ng chỉ cung cấp kh&ocirc;ng gian lưu trữ rộng r&atilde;i m&agrave; c&ograve;n đảm bảo tốc độ khởi động v&agrave; truy xuất dữ liệu vượt trội. Ngo&agrave;i ra, khả năng n&acirc;ng cấp SSD l&ecirc;n đến 2TB l&agrave; một lợi thế lớn, gi&uacute;p người d&ugrave;ng thoải m&aacute;i lưu trữ t&agrave;i liệu, h&igrave;nh ảnh v&agrave; video m&agrave; kh&ocirc;ng lo thiếu dung lượng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/06-03-2025/i5.png\" style=\"height:600px; width:900px\" /></p>\r\n\r\n<h2><strong>M&agrave;n h&igrave;nh FHD+ 16 inch trải nghiệm h&igrave;nh ảnh sống động</strong></h2>\r\n\r\n<p>Một trong những điểm nổi bật của Acer Aspire Lite<strong>&nbsp;</strong>l&agrave; m&agrave;n h&igrave;nh 16 inch với độ ph&acirc;n giải FHD+ (1920x1200), tỷ lệ 16:10. C&ocirc;ng nghệ IPS kết hợp độ s&aacute;ng 300 nits v&agrave; g&oacute;c nh&igrave;n rộng l&ecirc;n đến 170 độ mang lại h&igrave;nh ảnh sắc n&eacute;t, m&agrave;u sắc ch&acirc;n thực. C&ocirc;ng nghệ Acer ComfyView&trade; gi&uacute;p giảm ch&oacute;i s&aacute;ng, bảo vệ mắt người d&ugrave;ng trong thời gian sử dụng l&acirc;u, đặc biệt ph&ugrave; hợp với những ai thường xuy&ecirc;n l&agrave;m việc li&ecirc;n tục tr&ecirc;n m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>M&agrave;n h&igrave;nh lớn 16 inch kh&ocirc;ng chỉ mang lại kh&ocirc;ng gian l&agrave;m việc thoải m&aacute;i m&agrave; c&ograve;n l&yacute; tưởng cho việc xem phim, chỉnh sửa nội dung hoặc thuyết tr&igrave;nh. Với độ phủ m&agrave;u 45% NTSC, đ&acirc;y l&agrave; lựa chọn ph&ugrave; hợp cho c&aacute;c t&aacute;c vụ văn ph&ograve;ng v&agrave; giải tr&iacute; cơ bản, d&ugrave; kh&ocirc;ng phải l&agrave; m&agrave;n h&igrave;nh chuy&ecirc;n dụng cho thiết kế đồ họa chuy&ecirc;n s&acirc;u.</p>\r\n\r\n<h2><strong>Đồ họa Intel&reg; Iris&reg; Xe: Hỗ trợ tốt c&aacute;c t&aacute;c vụ đồ họa</strong></h2>\r\n\r\n<p>Laptop Acer Aspire Lite 16 AL16-52P-572A được t&iacute;ch hợp card đồ họa Intel&reg; Iris&reg; Xe Graphics, mang lại hiệu suất đồ họa ổn định cho c&aacute;c t&aacute;c vụ như chỉnh sửa h&igrave;nh ảnh, video cơ bản hoặc chơi c&aacute;c tựa game nhẹ. D&ugrave; kh&ocirc;ng phải l&agrave; GPU chuy&ecirc;n dụng cho chơi game nặng, Intel&reg; Iris&reg; Xe vẫn đ&aacute;p ứng tốt nhu cầu sử dụng h&agrave;ng ng&agrave;y của người d&ugrave;ng phổ th&ocirc;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/30-05-2025/laptop-acer-aspire-lite-16-al16-52p-572a-1.jpg\" style=\"height:1280px; width:1280px\" /></p>\r\n\r\n<h2><strong>Kết nối hiện đại, đa dạng</strong></h2>\r\n\r\n<p>Về khả năng kết nối, Acer Aspire Lite 16 được trang bị đầy đủ c&aacute;c cổng cần thiết để đ&aacute;p ứng nhu cầu sử dụng đa dạng. M&aacute;y sở hữu:</p>\r\n\r\n<ul>\r\n	<li><strong>1 cổng USB Type-C</strong>&nbsp;hỗ trợ USB 3.2 Gen 2 (tốc độ l&ecirc;n đến 10 Gbps), DisplayPort qua USB-C v&agrave; sạc nhanh.</li>\r\n	<li><strong>3 cổng USB Standard-A</strong>&nbsp;hỗ trợ USB 3.2 Gen 1.</li>\r\n	<li><strong>1 cổng HDMI 1.4</strong>&nbsp;với hỗ trợ HDCP.</li>\r\n	<li><strong>1 khe cắm thẻ MicroSD</strong>&nbsp;hỗ trợ dung lượng l&ecirc;n đến 512GB.</li>\r\n	<li><strong>1 jack tai nghe 3.5mm</strong>&nbsp;hỗ trợ tai nghe c&oacute; micro t&iacute;ch hợp.</li>\r\n</ul>\r\n\r\n<p>Về kết nối kh&ocirc;ng d&acirc;y, m&aacute;y hỗ trợ Wi-Fi 6 AX201 với băng tần k&eacute;p (2.4GHz v&agrave; 5GHz) v&agrave; c&ocirc;ng nghệ 2x2 MU-MIMO, đảm bảo tốc độ kết nối nhanh v&agrave; ổn định. Bluetooth 5.1 cho ph&eacute;p kết nối dễ d&agrave;ng với c&aacute;c thiết bị ngoại vi như tai nghe, chuột kh&ocirc;ng d&acirc;y hoặc loa Bluetooth.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/30-05-2025/laptop-acer-aspire-lite-16-al16-52p-572a-2.jpg\" style=\"height:1280px; width:1280px\" /></p>\r\n\r\n<h2><strong>Pin v&agrave; hệ điều h&agrave;nh</strong></h2>\r\n\r\n<p>Laptop Acer Aspire Lite 16 được trang bị pin 3 cell 58WHrs, đi k&egrave;m adapter sạc 65W qua cổng Type-C. Dung lượng pin n&agrave;y đủ để đ&aacute;p ứng nhu cầu sử dụng li&ecirc;n tục trong khoảng 6-8 giờ với c&aacute;c t&aacute;c vụ cơ bản như lướt web, soạn thảo văn bản hoặc xem video. M&aacute;y được c&agrave;i sẵn Windows 11 Home SL, mang đến giao diện hiện đại v&agrave; nhiều t&iacute;nh năng tiện &iacute;ch.</p>\r\n\r\n<h2><strong>&Acirc;m thanh v&agrave; b&agrave;n ph&iacute;m</strong></h2>\r\n\r\n<p>Hệ thống &acirc;m thanh của m&aacute;y bao gồm hai loa stereo v&agrave; hai micro t&iacute;ch hợp, mang lại chất lượng &acirc;m thanh r&otilde; r&agrave;ng, ph&ugrave; hợp cho hội họp trực tuyến hoặc giải tr&iacute; cơ bản. B&agrave;n ph&iacute;m kh&ocirc;ng c&oacute; đ&egrave;n nền nhưng được t&iacute;ch hợp b&agrave;n ph&iacute;m số, hỗ trợ nhập liệu nhanh ch&oacute;ng, đặc biệt hữu &iacute;ch cho người d&ugrave;ng l&agrave;m việc với số liệu. Touchpad cảm ứng đa điểm nhạy, hỗ trợ c&aacute;c thao t&aacute;c cuộn, ph&oacute;ng to/thu nhỏ mượt m&agrave;.</p>\r\n\r\n<p>Laptop Acer Aspire Lite 16 AL16-52P-572A&nbsp;l&agrave; một sản phẩm đ&aacute;ng c&acirc;n nhắc trong ph&acirc;n kh&uacute;c laptop tầm trung. Với thiết kế mỏng nhẹ, hiệu năng mạnh mẽ từ chip Intel&reg; Core&trade; i5-1334U, RAM 16GB DDR5, SSD 512GB v&agrave; m&agrave;n h&igrave;nh FHD+ 16 inch sắc n&eacute;t&hellip; đ&aacute;p ứng tốt nhu cầu học tập, l&agrave;m việc văn ph&ograve;ng v&agrave; giải tr&iacute; cơ bản. Điểm cộng lớn l&agrave; khả năng n&acirc;ng cấp linh hoạt v&agrave; c&aacute;c cổng kết nối hiện đại, gi&uacute;p sản phẩm ph&ugrave; hợp với nhiều đối tượng người d&ugrave;ng.</p>\r\n\r\n<p>Sản phẩm hiện được ph&acirc;n phối ch&iacute;nh h&atilde;ng bởi&nbsp;<a href=\"https://hacom.vn/\" target=\"_blank\">HACOM</a>, đảm bảo chất lượng v&agrave; dịch vụ hậu m&atilde;i uy t&iacute;n.</p>', 129, 0, 0, NULL, '2025-06-23 02:19:18', '2025-08-19 13:47:55'),
(6, 'SP009', 'Laptop acer aspire lite 15 al15-41p-r3u5 r7 5700u/16gb/512gb/15.6\"fhd/win11', 2, 'storage/thumbnail/uPYkaQjLRYawLqXkiAB6AdtWYGu0Nm74ZOD4SUTc.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Ph&aacute;t huy những gi&aacute; trị l&agrave;m n&ecirc;n t&ecirc;n tuổi của d&ograve;ng Aspire Lite, phi&ecirc;n bản&nbsp;</strong><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/acer-aspire-lite-15-al15-41p-r3u5-r7-5700u\"><strong>Acer Aspire Lite 15 AL15-41P-R3U5</strong></a><strong>&nbsp;trở th&agrave;nh lựa chọn h&agrave;ng đầu trong tầm gi&aacute; dưới 15 triệu đồng. Sản phẩm sở hữu thiết kế mỏng nhẹ thanh lịch, m&agrave;n h&igrave;nh Full HD sắc n&eacute;t, hiệu năng mạnh mẽ nhờ chip Ryzen 7 5700U, RAM 16GB, SSD 512GB v&agrave; hệ thống cổng kết nối phong ph&uacute;.&nbsp;</strong></p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 15 AL15-41P-R3U5 (1)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_15_al15_41p_r3u5_3_e052486faf.jpg\" /></p>\r\n\r\n<h2><strong>Gọn nhẹ, thanh lịch v&agrave; hết sức trang nh&atilde;</strong></h2>\r\n\r\n<p>Ng&ocirc;n ngữ thiết kế thanh lịch pha lẫn vẻ hiện đại của Acer Aspire Lite 15 AL15-41P-R3U5 được x&acirc;y dựng bởi c&aacute;c đường n&eacute;t tinh tế c&ugrave;ng m&agrave;u Bạc lịch thiệp. Viền m&agrave;n h&igrave;nh được l&agrave;m mỏng tối đa, gi&uacute;p k&iacute;ch cỡ tổng thể sản phẩm được gọn g&agrave;ng, linh hoạt.</p>\r\n\r\n<p>Với trọng lượng chỉ 1,7kg c&ugrave;ng độ mỏng 18.95mm, Acer Aspire Lite 15 l&agrave; một trong những mẫu laptop 15,6 inch nhẹ nhất thị trường hiện tại. Đ&acirc;y l&agrave; lợi thế cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng mang m&aacute;y theo b&ecirc;n m&igrave;nh m&agrave; kh&ocirc;ng cảm thấy cồng kềnh, ph&ugrave; hợp với những ai thường xuy&ecirc;n di chuyển để l&agrave;m việc hoặc học tập.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 15 AL15-41P-R3U5 (2)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_15_al15_41p_r3u5_5_b11c4e6b13.jpg\" /></p>\r\n\r\n<h2><strong>Kh&ocirc;ng gian hiển thị tr&agrave;n viền v&agrave; sắc n&eacute;t</strong></h2>\r\n\r\n<p>Chiếc&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;sở hữu m&agrave;n h&igrave;nh 15,6 inch độ ph&acirc;n giải Full HD (1920x1080 pixels), cung cấp chất lượng hiển thị sắc sảo với m&agrave;u sắc trung thực. Ba cạnh viền bao quanh si&ecirc;u mỏng tạo hiệu ứng thị gi&aacute;c tr&agrave;n viền, mở rộng tầm nh&igrave;n, gi&uacute;p bạn l&agrave;m việc hiệu quả hơn v&agrave; c&oacute; được trải nghiệm giải tr&iacute; sống động hơn.</p>\r\n\r\n<p>Ngo&agrave;i ra, Acer Aspire Lite 15 c&ograve;n t&iacute;ch hợp c&ocirc;ng nghệ Acer BlueLightShield nhằm giảm thiểu &aacute;nh s&aacute;ng xanh g&acirc;y hại cho mắt. Nhờ đ&oacute;, người d&ugrave;ng c&oacute; thể l&agrave;m việc hoặc giải tr&iacute; trong thời gian d&agrave;i m&agrave; kh&ocirc;ng bị mỏi mắt.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 15 AL15-41P-R3U5 (3)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_15_al15_41p_r3u5_1_8fe79ecd31.jpg\" /></p>\r\n\r\n<h2><strong>Sở hữu chip xử l&yacute; mạnh mẽ đắc lực</strong></h2>\r\n\r\n<p>Sức mạnh hiệu năng của Acer Aspire Lite 15 AL15-41P-R3U5 đến từ bộ vi xử l&yacute; AMD Ryzen 7 5700U. Đ&acirc;y l&agrave; con chip 8 nh&acirc;n 16 luồng, đạt xung nhịp tối đa 4.3 GHz, c&oacute; khả năng xử l&yacute; mượt m&agrave; c&aacute;c t&aacute;c vụ văn ph&ograve;ng như lướt web, học tập trực tuyến v&agrave; thậm ch&iacute; l&agrave; chỉnh sửa ảnh, video nhẹ.</p>\r\n\r\n<p>Th&ecirc;m v&agrave;o đ&oacute; GPU t&iacute;ch hợp AMD Radeon Graphics cung cấp hiệu suất đồ họa vượt trội so với c&aacute;c d&ograve;ng card onboard th&ocirc;ng thường kh&aacute;c. Nhờ vậy, bạn c&oacute; thể chạy c&aacute;c phần mềm thiết kế cơ bản như Photoshop, Illustrator, xem phim chất lượng cao hoặc thoải m&aacute;i tận hưởng c&aacute;c tựa game eSports như FIFA Online hoặc Li&ecirc;n Minh Huyền Thoại.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 15 AL15-41P-R3U5 (4)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_15_al15_41p_r3u5_2_b5fa8357ff.jpg\" /></p>\r\n\r\n<h2><strong>Thỏa sức đa nhiệm v&agrave; lưu trữ th&ocirc;ng tin</strong></h2>\r\n\r\n<p>Acer trang bị sẵn cho phi&ecirc;n bản Aspire Lite n&agrave;y bộ RAM 16GB &ndash; th&ocirc;ng số tương đối ấn tượng trong ph&acirc;n kh&uacute;c laptop tầm trung. Nhờ dung lượng RAM lớn, người d&ugrave;ng c&oacute; thể mở nhiều tab tr&igrave;nh duyệt khi lướt web, thoải m&aacute;i l&agrave;m việc với c&aacute;c phần mềm nặng m&agrave; kh&ocirc;ng lo giật lag.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n được trang bị sẵn ổ cứng SSD 512GB PCIe NVMe, cho tốc độ đọc/ghi dữ liệu nhanh gấp nhiều lần so với HDD truyền thống. Đ&acirc;y l&agrave; yếu tố gi&uacute;p laptop khởi động, mở ứng dụng v&agrave; sao ch&eacute;p dữ liệu cực nhanh, n&acirc;ng cao hiệu suất l&agrave;m việc cho bạn.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 15 AL15-41P-R3U5 (5)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_15_al15_41p_r3u5_8_b7d3af7b55.jpg\" /></p>\r\n\r\n<h2><strong>Đầy đủ c&aacute;c phương thức kết nối m&agrave; bạn cần</strong></h2>\r\n\r\n<p>D&ugrave; sở hữu thiết kế mỏng nhẹ, Acer Aspire Lite 15 vẫn được trang bị đầy đủ c&aacute;c cổng kết nối cần thiết gồm 3 cổng USB-A, 1 cổng USB-C 3.2 Gen 2, 1 cổng xuất h&igrave;nh HDMI 1.4, jack cắm tai nghe 3.5mm v&agrave; khe đọc thẻ MicroSD.</p>\r\n\r\n<p>Ngo&agrave;i ra,&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/acer-aspire\">laptop Acer Aspire</a>&nbsp;c&ograve;n sở hữu kết nối Wi-Fi tiện dụng v&agrave; Bluetooth 5.1, cho ph&eacute;p duy tr&igrave; t&iacute;n hiệu tương t&aacute;c ổn định, hiệu quả để bạn thoải m&aacute;i l&agrave;m việc v&agrave; giải tr&iacute;.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 15 AL15-41P-R3U5 (6)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_15_al15_41p_r3u5_9_a83115bf15.jpg\" /></p>\r\n\r\n<h2><strong>Sở hữu b&agrave;n ph&iacute;m v&agrave; touchpad tiện dụng</strong></h2>\r\n\r\n<p>Laptop Acer Aspire Lite 15 AL15-41P-R3U5 được trang bị b&agrave;n ph&iacute;m c&oacute; k&iacute;ch thước ti&ecirc;u chuẩn với h&agrave;nh tr&igrave;nh ph&iacute;m hợp l&yacute;, mang lại trải nghiệm g&otilde; ph&iacute;m thoải m&aacute;i. Ngo&agrave;i ra, touchpad rộng r&atilde;i với độ nhạy cao gi&uacute;p thao t&aacute;c mượt m&agrave;, kh&ocirc;ng cần sử dụng tới chuột ngo&agrave;i.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 15 AL15-41P-R3U5 (7)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_15_al15_41p_r3u5_6_43d91dcdd7.jpg\" /></p>\r\n\r\n<h2><strong>Thời lượng pin bền bỉ, sạc nhanh tiện lợi</strong></h2>\r\n\r\n<p>Với vi&ecirc;n pin dung lượng lớn, laptop Acer Aspire Lite 15 c&oacute; thể vận h&agrave;nh bền bỉ li&ecirc;n tục trong nhiều giờ m&agrave; kh&ocirc;ng cần kết nối với nguồn điện. C&ocirc;ng nghệ sạc nhanh gi&uacute;p nạp lại năng lượng nhanh ch&oacute;ng, đảm bảo bạn lu&ocirc;n c&oacute; thể tiếp tục c&ocirc;ng việc, tr&aacute;nh bị gi&aacute;n đoạn trải nghiệm ở những thời điểm quan trọng cần thiết.</p>', 167, 0, 0, NULL, '2025-06-23 03:13:22', '2025-08-20 16:28:13'),
(7, 'SP0019', 'Laptop acer aspire lite 14 gen2 al14-52m-32kv i3-1305u/8gb/256gb/14\" wuxga/win11', 2, 'storage/thumbnail/SA7X9rT4k8GunSPFtkwSqtz9KBE93M9ZDsZNolLW.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/acer-aspire-lite-14-gen-2-al14-52m-32kv\"><strong>Acer Aspire Lite 14 Gen 2 AL14-52M-32KV</strong></a><strong>&nbsp;l&agrave; chiếc laptop gi&aacute; rẻ được đ&aacute;nh gi&aacute; cao bởi t&iacute;nh linh động v&agrave; t&iacute;nh ứng dụng cao, đ&aacute;p ứng nhiều nhu cầu từ học tập, l&agrave;m việc đến giải tr&iacute;. M&aacute;y được trang bị con chip c&oacute; hiệu năng ổn định, m&agrave;n h&igrave;nh sắc n&eacute;t v&agrave; ổ cứng dung lượng cao, mang tới trải nghiệm ho&agrave;n hảo.</strong></p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 14 Gen 2 AL14-52M-32KV i3 1305U (hình 1)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_14_gen_2_al14_52m_32kv_3_9bff83bc33.png\" /></p>\r\n\r\n<h3><strong>Thiết kế thời trang, c&aacute; t&iacute;nh</strong></h3>\r\n\r\n<p>Laptop Acer Aspire Lite 14 Gen 2 AL14-52M-32KV mang thiết kế mới với sự năng động, c&aacute; t&iacute;nh. Mặt ngo&agrave;i của m&aacute;y sử dụng họa tiết tạo điểm nhấn kh&aacute;c biệt so với thế hệ tiền nhiệm. Logo Acer được dịch chuyển sang g&oacute;c phải thay v&igrave; đặt ở giữa như thường thấy ở c&aacute;c sản phẩm trước đ&acirc;y.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 14 Gen 2 AL14-52M-32KV i3 1305U (hình 2)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_14_gen_2_al14_52m_32kv_5_052ee04184.png\" /></p>\r\n\r\n<p>K&iacute;ch thước tổng thể của laptop Acer l&agrave; 313.3 x 218 x 16.9 mm (D&agrave;i x Rộng x D&agrave;y) v&agrave; nặng 1.5kg. Sự nhỏ gọn v&agrave; mỏng nhẹ đảm bảo t&iacute;nh linh động, cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng mang theo&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">m&aacute;y t&iacute;nh</a>&nbsp;mỗi khi cần thiết, chẳng hạn như đi l&agrave;m, đi học, đi c&ocirc;ng t&aacute;c,... Sắc Bạc trẻ trung đem đến diện mạo thời trang nhưng vẫn thanh lịch, ph&ugrave; hợp với gu thẩm mỹ của người d&ugrave;ng hiện đại.</p>\r\n\r\n<h3><strong>Hiệu năng ổn định với vi xử l&yacute; Intel Core i3-1305U</strong></h3>\r\n\r\n<p>Cung cấp hiệu năng cho&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/acer\">laptop Acer</a>&nbsp;l&agrave; vi xử l&yacute; Intel Core i3-1305U sản xuất tr&ecirc;n tiến tr&igrave;nh 10nm với 5 l&otilde;i, 6 luồng, xung nhịp cực đại 4.5GHz nhờ c&ocirc;ng nghệ Turbo Boost. Với cấu h&igrave;nh n&agrave;y, m&aacute;y t&iacute;nh c&oacute; khả năng xử l&yacute; mượt m&agrave; c&aacute;c t&aacute;c vụ văn ph&ograve;ng như soạn thảo t&agrave;i liệu, quản l&yacute; dữ liệu, thậm ch&iacute; chạy c&aacute;c phần mềm quản l&yacute; doanh nghiệp. Kh&ocirc;ng chỉ vậy, GPU Intel UHD Graphics t&iacute;ch hợp cung cấp hiệu suất đồ họa tương đối ổn định, gi&uacute;p bạn dễ d&agrave;ng l&agrave;m việc với c&aacute;c phần mềm chỉnh sửa h&igrave;nh ảnh, dựng video cơ bản hay chơi c&aacute;c tựa game nhẹ một c&aacute;ch mượt m&agrave;.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 14 Gen 2 AL14-52M-32KV i3 1305U (hình 3)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_14_gen_2_al14_52m_32kv_2_b3af407bbf.png\" /></p>\r\n\r\n<h3><strong>Đa nhiệm tốt, lưu trữ dữ liệu thoải m&aacute;i</strong></h3>\r\n\r\n<p>Ở laptop Acer Aspire Lite 14 Gen 2 AL14-52M-32KV c&oacute; sự kết hợp giữa 8GB RAM DDR5 v&agrave; 256GB ổ SSD. Với những trang bị n&agrave;y, m&aacute;y c&oacute; thể đ&aacute;p ứng nhu cầu đa nhiệm v&agrave; lưu trữ dữ liệu của sinh vi&ecirc;n v&agrave; d&acirc;n văn ph&ograve;ng b&igrave;nh thường. Người d&ugrave;ng thoải m&aacute;i mở c&ugrave;ng l&uacute;c nhiều tab tr&ecirc;n tr&igrave;nh duyệt hoặc chạy đồng thời một số phần mềm, đảm bảo qu&aacute; tr&igrave;nh chuyển đổi lu&ocirc;n mượt m&agrave;. B&ecirc;n cạnh đ&oacute;, dung lượng bộ nhớ 256GB cũng cho ph&eacute;p tải xuống c&aacute;c t&agrave;i liệu h&igrave;nh ảnh, video v&agrave; tệp để truy cập ngay khi cần thiết. Với những người c&oacute; nhu cầu cao, m&aacute;y hỗ trợ n&acirc;ng cấp RAM l&ecirc;n tối đa 64GB v&agrave; bộ nhớ tối đa 1TB.</p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh WUXGA si&ecirc;u sắc n&eacute;t</strong></h3>\r\n\r\n<p>Thuộc ph&acirc;n kh&uacute;c gi&aacute; rẻ, laptop Acer Aspire Lite 14 Gen 2 AL14-52M-32KV ghi điểm với m&agrave;n h&igrave;nh c&oacute; độ ph&acirc;n giải WUXGA (1920 x 1200 pixels) dường như chỉ thấy tr&ecirc;n c&aacute;c ph&acirc;n kh&uacute;c cao cấp hơn. Nhờ đ&oacute;, m&aacute;y sẽ cung cấp h&igrave;nh ảnh sắc n&eacute;t để n&acirc;ng cao trải nghiệm quan s&aacute;t, cả khi học tập v&agrave; giải tr&iacute;. Tần số qu&eacute;t 60Hz đảm bảo tốc độ phản hồi nhanh ch&oacute;ng khi thực hiện c&aacute;c t&aacute;c vụ th&ocirc;ng thường như lướt web, xem phim, cuộn trang,...&nbsp;</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 14 Gen 2 AL14-52M-32KV i3 1305U (hình 4)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_14_gen_2_al14_52m_32kv_1_e79c63811b.png\" /></p>\r\n\r\n<p>Acer trang bị cho sản phẩm tấm nền IPS mở ra g&oacute;c nh&igrave;n rộng 178 độ, c&ugrave;ng với độ phủ m&agrave;u 45% NTSC, diễn đạt m&agrave;u sắc sống động, rực rỡ. Điểm cộng tiếp theo về m&agrave;n h&igrave;nh của Acer Aspire 14 Gen 2 AL14-52M-32KV l&agrave; cả 4 viền xung quanh đều được l&agrave;m si&ecirc;u mỏng để tối ưu khung h&igrave;nh 14 inch, tạo hiệu ứng về khu vực hiển thị rộng r&atilde;i hơn. Đ&acirc;y l&agrave; điều m&agrave; nhiều sản phẩm kh&aacute;c c&ugrave;ng ph&acirc;n kh&uacute;c chưa l&agrave;m được. Bạn thoải m&aacute;i theo d&otilde;i c&aacute;c th&ocirc;ng tin từ văn bản đến h&igrave;nh ảnh, v&ocirc; c&ugrave;ng r&otilde; r&agrave;ng.</p>\r\n\r\n<h3><strong>Kết nối linh hoạt trong mọi t&igrave;nh huống</strong></h3>\r\n\r\n<p>Laptop Acer Aspire Lite 14 Gen 2 AL14-52M-32KV được trang bị hệ thống cổng kết nối hiện đại, đ&aacute;p ứng tối đa nhu cầu l&agrave;m việc v&agrave; giải tr&iacute;. M&aacute;y hỗ trợ cổng USB Type-C cho ph&eacute;p kết nối với m&agrave;n h&igrave;nh ngo&agrave;i v&agrave; truyền dữ liệu tốc độ cao, cổng USB-A để kết nối với c&aacute;c phụ kiện như&nbsp;<a href=\"https://fptshop.com.vn/phu-kien-lap-top/chuot\">chuột</a>&nbsp;v&agrave;&nbsp;<a href=\"https://fptshop.com.vn/phu-kien-laptop/ban-phim\">b&agrave;n ph&iacute;m</a>, cổng HDMI 1.4 gi&uacute;p kết nối dễ d&agrave;ng với tivi hoặc&nbsp;<a href=\"https://fptshop.com.vn/may-chieu\">m&aacute;y chiếu</a>, c&ugrave;ng khe cắm thẻ microSD gi&uacute;p mở rộng kh&ocirc;ng gian lưu trữ một c&aacute;ch tiện lợi.</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 14 Gen 2 AL14-52M-32KV i3 1305U (hình 5)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_14_gen_2_al14_52m_32kv_4_44e7eea03a.png\" /></p>\r\n\r\n<p>D&agrave;nh cho những người d&ugrave;ng thường xuy&ecirc;n di chuyển, Acer Aspire Lite 14 Gen 2 c&ograve;n t&iacute;ch hợp c&ocirc;ng nghệ Wi-Fi 6 v&agrave; Bluetooth 5.1, mang đến kết nối kh&ocirc;ng d&acirc;y nhanh ch&oacute;ng, ổn định trong mọi t&igrave;nh huống. Với hệ thống kết nối đa dạng, bạn c&oacute; thể l&agrave;m việc linh hoạt, mở rộng kh&ocirc;ng gian hiển thị v&agrave; kết nối nhiều thiết bị một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<h3><strong>Sử dụng bền bỉ với pin 58Wh</strong></h3>\r\n\r\n<p>B&ecirc;n trong laptop Acer Aspire Lite 14 Gen 2 AL14-52M-32KV được trang bị vi&ecirc;n pin Li-ion 3 cell 58Wh, cung cấp nguồn năng lượng dồi d&agrave;o để người d&ugrave;ng c&oacute; trải nghiệm liền mạch mỗi ng&agrave;y. Bạn sẽ y&ecirc;n t&acirc;m hơn mỗi khi sử dụng ở những nơi kh&ocirc;ng sẵn ổ điện, thậm ch&iacute; l&agrave; kh&ocirc;ng cần đem theo phụ kiện sạc khi cần d&ugrave;ng m&aacute;y t&iacute;nh ở ngo&agrave;i.&nbsp;</p>\r\n\r\n<p><img alt=\"Acer Aspire Lite 14 Gen 2 AL14-52M-32KV i3 1305U (hình 6)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_lite_14_gen_2_al14_52m_32kv_6_c91701a952.png\" /></p>', 54, 0, 0, NULL, '2025-06-27 07:16:28', '2025-08-19 13:49:05'),
(8, 'SP01', 'Laptop acer aspire 7 gaming a715-59g-73lb i7 12650h 16gb/512gb/15.6\"fhd/rtx 3050 6gb/win11', 2, 'storage/thumbnail/OUkl44Fj8TLZvSU5UtH1HU3GzJFazYnxzwEnD7sJ.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Với cấu h&igrave;nh vượt trội, khả năng n&acirc;ng cấp linh hoạt v&agrave; m&agrave;n h&igrave;nh 144Hz sắc n&eacute;t,&nbsp;</strong><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/acer-aspire-7-gaming-a715-59g-73lb-i7-12650h\"><strong>Acer Aspire 7 Gaming A715-59G-73LB</strong></a><strong>&nbsp;xứng đ&aacute;ng l&agrave; lựa chọn số một cho những ai đang t&igrave;m kiếm laptop &quot;đa năng&quot; thực thụ. D&ugrave; l&agrave; sinh vi&ecirc;n chuy&ecirc;n ng&agrave;nh kỹ thuật, nh&acirc;n vi&ecirc;n văn ph&ograve;ng cần sức mạnh đồ họa hay game thủ y&ecirc;u th&iacute;ch sự gọn nhẹ linh hoạt, Aspire 7 đều c&oacute; thể đ&aacute;p ứng v&agrave; vượt qua mong đợi.</strong></p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-a.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_a_fed2aa7a81.jpg\" /></p>\r\n\r\n<h2><strong>Hiệu năng mạnh mẽ để l&agrave;m việc hiệu quả</strong></h2>\r\n\r\n<p>Điểm s&aacute;ng đầu ti&ecirc;n ở Aspire 7 A715-59G-73LB ch&iacute;nh l&agrave; hiệu suất mạnh mẽ đến từ bộ vi xử l&yacute; Intel Core i7-12650H thế hệ 12. Con chip n&agrave;y sở hữu tới 10 nh&acirc;n 16 luồng, được x&acirc;y dựng dựa tr&ecirc;n kiến tr&uacute;c lai ti&ecirc;n tiến, kết hợp giữa c&aacute;c nh&acirc;n hiệu suất cao (P-cores) v&agrave; nh&acirc;n tiết kiệm điện (E-cores).</p>\r\n\r\n<p>Nhờ đ&oacute;, Aspire 7 vừa c&oacute; thể xử l&yacute; trơn tru c&aacute;c t&aacute;c vụ nặng như lập tr&igrave;nh, thiết kế đồ họa, dựng video, vừa tiết kiệm pin hiệu quả khi thực hiện c&aacute;c c&ocirc;ng việc nhẹ nh&agrave;ng hơn như lướt web, l&agrave;m việc văn ph&ograve;ng. Xung nhịp tối đa l&ecirc;n đến 4.7GHz c&ugrave;ng bộ nhớ đệm lớn gi&uacute;p m&aacute;y dễ d&agrave;ng chinh phục c&aacute;c phần mềm chuy&ecirc;n dụng v&agrave; thực hiện đa nhiệm mượt m&agrave; trong mọi t&igrave;nh huống.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-1.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_1_3267ab8916.jpg\" /></p>\r\n\r\n<h2><strong>Kh&ocirc;ng gian lưu trữ rộng v&agrave; truy xuất cực nhanh</strong></h2>\r\n\r\n<p>Acer Aspire 7 được trang bị 16GB RAM hỗ trợ đa nhiệm tốt trong qu&aacute; tr&igrave;nh l&agrave;m việc, cho ph&eacute;p người d&ugrave;ng thoải m&aacute;i mở nhiều tab tr&igrave;nh duyệt khi duyệt web nhằm tạo sự tiện lợi tối đa.</p>\r\n\r\n<p>Ngo&agrave;i ra, chiếc&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;c&ograve;n sở hữu ổ cứng SSD 512GB cho ph&eacute;p n&acirc;ng cấp ổ cứng tối đa l&ecirc;n tới 4TB khi cần, mang lại kh&ocirc;ng gian lưu trữ rộng lớn v&agrave; tốc độ truy xuất dữ liệu cực nhanh. Đ&acirc;y l&agrave; yếu tố đặc biệt hữu &iacute;ch với những ai l&agrave;m c&ocirc;ng việc s&aacute;ng tạo nội dung hoặc thường xuy&ecirc;n cần lưu trữ th&ocirc;ng tin c&ocirc;ng việc cho c&aacute;c dự &aacute;n lớn.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-3.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_3_cc175b6b7f.jpg\" /></p>\r\n\r\n<h2><strong>Sức mạnh đồ họa tuyệt vời để l&agrave;m việc v&agrave; giải tr&iacute;</strong></h2>\r\n\r\n<p>B&ecirc;n cạnh sức mạnh CPU, Aspire 7 A715-59G-73LB c&ograve;n được trang bị card đồ họa rời NVIDIA GeForce RTX 3050 với 6GB bộ nhớ VRAM - nh&acirc;n tố quyết định gi&uacute;p m&aacute;y đ&aacute;p ứng tốt nhu cầu học tập, l&agrave;m việc v&agrave; mang lại trải nghiệm giải tr&iacute; đỉnh cao.</p>\r\n\r\n<p>Với RTX 3050, Aspire 7 dễ d&agrave;ng vận h&agrave;nh mượt m&agrave; c&aacute;c tựa game eSports phổ biến như Valorant, CS:GO, League of Legends ở mức thiết lập cao, đồng thời đủ sức chiến những tựa game AAA y&ecirc;u cầu khắt khe với thiết lập hợp l&yacute;. C&ocirc;ng nghệ Ray Tracing v&agrave; DLSS từ NVIDIA cũng gi&uacute;p t&aacute;i tạo &aacute;nh s&aacute;ng, đổ b&oacute;ng ch&acirc;n thực, tăng cường hiệu suất v&agrave; đem lại h&igrave;nh ảnh sống động hơn trong cả game v&agrave; phần mềm đồ họa.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-b.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_b_cf3204c58d.jpg\" /></p>\r\n\r\n<h2><strong>Kết hợp 2 quạt l&agrave;m m&aacute;t c&ugrave;ng 4 ống dẫn nhiệt</strong></h2>\r\n\r\n<p>Để vận h&agrave;nh ổn định trong thời gian d&agrave;i, Aspire 7 được&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/acer\">Acer</a>&nbsp;t&iacute;ch hợp hệ thống tản nhiệt tối ưu với 2 quạt l&agrave;m m&aacute;t v&agrave; 4 ống dẫn nhiệt. B&ecirc;n cạnh đ&oacute;, thiết kế b&agrave;n ph&iacute;m t&iacute;ch hợp khe h&uacute;t gi&oacute; th&ocirc;ng minh gi&uacute;p cải thiện luồng kh&ocirc;ng kh&iacute; v&agrave; tăng hiệu quả tản nhiệt th&ecirc;m 10%.</p>\r\n\r\n<p>Nhờ vậy, Aspire 7 lu&ocirc;n duy tr&igrave; mức nhiệt độ hợp l&yacute;, hạn chế hiện tượng giảm xung nhịp (thermal throttling), k&eacute;o d&agrave;i tuổi thọ linh kiện v&agrave; mang đến trải nghiệm sử dụng mượt m&agrave; ngay cả khi l&agrave;m việc hay chơi game li&ecirc;n tục trong nhiều giờ liền.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-2.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_2_07281c0831.jpg\" /></p>\r\n\r\n<h2><strong>Kiểu d&aacute;ng tinh tế, ph&ugrave; hợp nhiều đối tượng sử dụng</strong></h2>\r\n\r\n<p>Về mặt thiết kế, Aspire 7 A715-59G-73LB sở hữu diện mạo hiện đại với lớp vỏ m&agrave;u Titanium Black tinh tế, ph&ugrave; hợp với nhiều đối tượng người d&ugrave;ng từ sinh vi&ecirc;n, nh&acirc;n vi&ecirc;n văn ph&ograve;ng cho tới game thủ. M&aacute;y c&oacute; độ d&agrave;y chỉ 22.9mm v&agrave; trọng lượng khoảng 2.07kg, đủ gọn nhẹ để người d&ugrave;ng dễ d&agrave;ng mang theo b&ecirc;n m&igrave;nh mỗi ng&agrave;y. Vỏ ngo&agrave;i bằng hợp kim nh&ocirc;m được gia c&ocirc;ng chắc chắn, cho cảm gi&aacute;c cầm nắm cứng c&aacute;p, đồng thời đảm bảo độ bền bỉ cao trong suốt qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-9.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_9_ea09f69ca2.jpg\" /></p>\r\n\r\n<h2><strong>B&agrave;n ph&iacute;m chuy&ecirc;n nghiệp với đ&egrave;n nền RGB 1 v&ugrave;ng</strong></h2>\r\n\r\n<p>Một chi tiết th&uacute; vị kh&aacute;c l&agrave; Aspire 7 sở hữu b&agrave;n ph&iacute;m c&oacute; đ&egrave;n nền RGB 1 v&ugrave;ng, với 15 t&ugrave;y chọn m&agrave;u sắc kh&aacute;c nhau. Đ&acirc;y l&agrave; điểm nhấn gi&uacute;p tăng th&ecirc;m vẻ c&aacute; t&iacute;nh cho chiếc laptop, đồng thời hỗ trợ người d&ugrave;ng dễ d&agrave;ng l&agrave;m việc, giải tr&iacute; trong điều kiện thiếu s&aacute;ng, mang lại sự tiện lợi v&agrave; linh hoạt tối đa.</p>\r\n\r\n<h2><strong>Kh&ocirc;ng gian hiển thị sắc n&eacute;t đầy ấn tượng</strong></h2>\r\n\r\n<p>Aspire 7 sẽ l&agrave;m người d&ugrave;ng h&agrave;i l&ograve;ng trước những khu&ocirc;n h&igrave;nh m&atilde;n nh&atilde;n. M&aacute;y được trang bị m&agrave;n h&igrave;nh 15.6 inch sử dụng tấm nền IPS cho g&oacute;c nh&igrave;n rộng, độ ph&acirc;n giải Full HD sắc n&eacute;t c&ugrave;ng độ phủ m&agrave;u cao. Đặc biệt, tần số qu&eacute;t 144Hz gi&uacute;p mọi chuyển động tr&ecirc;n m&agrave;n h&igrave;nh trở n&ecirc;n si&ecirc;u mượt, giảm thiểu hiện tượng x&eacute; h&igrave;nh, giật h&igrave;nh khi chơi game tốc độ cao.</p>\r\n\r\n<p>Đ&acirc;y ch&iacute;nh l&agrave; lợi thế lớn trong c&aacute;c tựa game cần phản xạ nhanh như FPS hoặc thể thao điện tử, gi&uacute;p người chơi nắm bắt t&igrave;nh huống nhanh ch&oacute;ng v&agrave; tăng cơ hội chiến thắng. Viền m&agrave;n h&igrave;nh mỏng tinh tế gi&uacute;p tổng thể m&aacute;y nhỏ gọn hơn, đồng thời mang lại trải nghiệm thị gi&aacute;c đắm ch&igrave;m hơn bao giờ hết.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-5.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_5_696c7ee5a5.jpg\" /></p>\r\n\r\n<h2><strong>Cổng kết nối đa dạng v&agrave; tương t&aacute;c hiệu quả</strong></h2>\r\n\r\n<p>Hệ thống kết nối đầy đủ của Acer Aspire 7 Gaming A715-59G-73LB dễ d&agrave;ng đ&aacute;p ứng tốt mọi nhu cầu học tập, l&agrave;m việc v&agrave; giải tr&iacute;. M&aacute;y sở hữu c&aacute;c cổng kết nối phổ biến như USB 3.2 Gen 1 Type-A, USB 3.2 Gen 2 Type-C, HDMI 2.1, LAN RJ-45 v&agrave; jack &acirc;m thanh 3.5mm, cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng kết nối với ổ cứng ngo&agrave;i, m&agrave;n h&igrave;nh rời, tai nghe hay chuột gaming.</p>\r\n\r\n<p>Ngo&agrave;i ra, chuẩn Wi-Fi 6E tốc độ cao mang lại khả năng kết nối mạng nhanh, ổn định hơn, giảm độ trễ khi chơi game online hoặc tham gia c&aacute;c cuộc họp trực tuyến. Bluetooth 5.2 cũng gi&uacute;p gh&eacute;p nối nhanh ch&oacute;ng với c&aacute;c thiết bị kh&ocirc;ng d&acirc;y như loa, tai nghe hoặc b&agrave;n ph&iacute;m rời.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-6.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_6_fb5b24b643.jpg\" /></p>\r\n\r\n<h2><strong>Hỗ trợ nhiều t&iacute;nh năng th&ocirc;ng minh tiện lợi</strong></h2>\r\n\r\n<p>B&ecirc;n cạnh phần cứng mạnh mẽ, phi&ecirc;n bản&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/acer-aspire-gaming\">Acer Asipire Gaming</a>&nbsp;n&agrave;y c&ograve;n t&iacute;ch hợp nhiều t&iacute;nh năng th&ocirc;ng minh nhằm n&acirc;ng cao trải nghiệm người d&ugrave;ng. C&ocirc;ng nghệ Acer PurifiedVoice sử dụng tr&iacute; tuệ nh&acirc;n tạo AI để lọc tiếng ồn, mang lại chất lượng đ&agrave;m thoại r&otilde; r&agrave;ng hơn khi học online, họp trực tuyến hay tr&ograve; chuyện với bạn b&egrave;.</p>\r\n\r\n<p>Hệ thống &acirc;m thanh DTS:X Ultra giả lập &acirc;m thanh v&ograve;m 3D, gi&uacute;p t&aacute;i tạo kh&ocirc;ng gian &acirc;m thanh ch&acirc;n thực, sống động, cho bạn đắm ch&igrave;m v&agrave;o từng trận game căng thẳng hay những bộ phim bom tấn hấp dẫn.</p>\r\n\r\n<p><img alt=\"acer-aspire-7-a715-59g-57tu-8.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/acer_aspire_7_a715_59g_57tu_8_b719795a2b.jpg\" /></p>', 95, 0, 0, NULL, '2025-07-02 12:53:30', '2025-08-19 13:48:56');
INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `danh_muc_id`, `anh_san_pham`, `mo_ta`, `luot_xem`, `da_ban`, `is_hot`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'SP003', 'Laptop dell inspiron 14 n5440 i5 1334u/16gb/512gb/14\"fhd+/win11/office hs21', 1, 'storage/thumbnail/Tkxh9ba90rZ1haz28xpLV9ucAxLPMX9v4QnLB9mB.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Sở hữu thiết kế cơ động v&agrave; lịch thiệp, Dell Inspiron 14 5440 l&agrave; mẫu laptop doanh nh&acirc;n to&aacute;t l&ecirc;n vẻ đẳng cấp trong mọi kh&iacute;a cạnh. Phi&ecirc;n bản bạn đang theo d&otilde;i sở hữu cấu h&igrave;nh nổi bật với chip xử l&yacute; Intel Core i5 1334U, 16GB RAM v&agrave; ổ cứng SSD 512GB. M&agrave;n h&igrave;nh sắc n&eacute;t với bộ lọc &aacute;nh s&aacute;ng xanh gi&uacute;p người d&ugrave;ng l&agrave;m việc nhiều giờ li&ecirc;n tục m&agrave; kh&ocirc;ng lo hại mắt.</strong></p>\r\n\r\n<p><img alt=\"Dell Inspiron 5440\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_14_n5440_i5_1334u_1_013a1ce381.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Kiểu d&aacute;ng lịch thiệp với độ ho&agrave;n thiện cao</strong></h2>\r\n\r\n<p>Chiếc laptop Inspiron 14 5440 cho thấy kỹ nghệ chế t&aacute;c sản phẩm h&agrave;ng đầu thị trường của Dell. Cấu tr&uacute;c khung vỏ sản phẩm được l&agrave;m từ c&aacute;c chất liệu th&acirc;n thiện với m&ocirc;i trường như nh&ocirc;m t&aacute;i chế, th&eacute;p t&aacute;i chế v&agrave; nhựa t&aacute;i chế, thể hiện độ ho&agrave;n thiện tỉ mỉ trong từng g&oacute;c cạnh v&agrave; đem lại cảm gi&aacute;c cầm nắm hết sức vững v&agrave;ng, chắc chắn.</p>\r\n\r\n<p>Ng&ocirc;n ngữ thiết kế của chiếc laptop đi theo hướng tối giản v&agrave; lịch thiệp, mỗi g&oacute;c m&aacute;y đều được bo tr&ograve;n mềm mại, th&acirc;n thiện. Gam m&agrave;u Xanh nhẹ nh&agrave;ng cực kỳ h&ograve;a hợp với kiểu d&aacute;ng tối giản m&agrave; Dell mang tới. Với k&iacute;ch thước tổng thể l&agrave; 31.40 x 22.62 x 1.99 cm c&ugrave;ng trọng lượng 1.54 kg, người d&ugrave;ng sẽ dễ d&agrave;ng di chuyển v&agrave; sắp xếp gọn g&agrave;ng chiếc laptop trong balo, t&uacute;i x&aacute;ch để mang theo b&ecirc;n m&igrave;nh.</p>\r\n\r\n<p><img alt=\"Thiết kế Dell Inspiron 5440\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_14_n5440_i5_1334u_8_2883c8fe91.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<h2><strong>M&agrave;n h&igrave;nh sắc n&eacute;t v&agrave; hiển thị chuy&ecirc;n nghiệp</strong></h2>\r\n\r\n<p>Dell Inspiron 5440 sử dụng m&agrave;n h&igrave;nh 14 inch gọn g&agrave;ng với tỉ lệ 16:10 v&agrave; c&oacute; độ ph&acirc;n giải cực sắc n&eacute;t l&agrave; 1.920 x 1.200 pixels. Hệ thống viền bezel si&ecirc;u mỏng gi&uacute;p người d&ugrave;ng tập trung hơn v&agrave;o th&ocirc;ng tin tr&ecirc;n m&agrave;n h&igrave;nh, đồng thời đem lại trải nghiệm ấn tượng, ch&acirc;n thực khi quan s&aacute;t. Tấm nền cao cấp với độ s&aacute;ng cao v&agrave; g&oacute;c tr&ocirc;ng ảnh rộng gi&uacute;p người d&ugrave;ng thoải m&aacute;i quan s&aacute;t dưới điều kiện &aacute;nh s&aacute;ng ngo&agrave;i trời.</p>\r\n\r\n<p>Đặc biệt, đội ngũ&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell\">Dell</a>&nbsp;c&ograve;n ứng dụng c&ocirc;ng nghệ ComfortView Plus để giảm ph&aacute;t thải &aacute;nh s&aacute;ng xanh g&acirc;y hại v&agrave; gi&uacute;p mắt thoải m&aacute;i hơn khi người d&ugrave;ng l&agrave;m việc h&agrave;ng giờ liền trước m&aacute;y t&iacute;nh. Inspiron 14 5440 đạt chứng nh&acirc;n của T&Uuml;V Rheinland về khả năng hiển thị h&igrave;nh ảnh th&acirc;n thiện với thị gi&aacute;c người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"Màn hình Dell Inspiron 5440\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_14_n5440_i5_1334u_7_071aa5ea72.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Mạnh mẽ về hiệu năng, hiệu quả khi đa nhiệm</strong></h2>\r\n\r\n<p>Về cấu h&igrave;nh, Dell Inspiron 5440 sử dụng con chip thế hệ mới l&agrave; Intel Core i5 1334U với xung nhịp tối đa 4.6GHz, kết hợp c&ugrave;ng 16GB RAM DDR5 v&agrave; ổ cứng SSD dung lượng 512GB. Trong đ&oacute;, bộ vi xử l&yacute; thế hệ mới gi&uacute;p hệ thống c&oacute; thể chạy mượt c&aacute;c t&aacute;c vụ nặng như thiết kế ảnh, dựng video, lập tr&igrave;nh v&agrave; chơi game.</p>\r\n\r\n<p>Dung lượng RAM cao tạo điều kiện cho người d&ugrave;ng mở c&ugrave;ng l&uacute;c nhiều ứng dụng m&agrave; kh&ocirc;ng c&oacute; dấu hiệu giật lag. Ổ cứng SSD 512GB r&uacute;t ngắn thời gian mở m&aacute;y v&agrave; k&iacute;ch hoạt ứng dụng/phần mềm. Nhờ đ&oacute;, Dell Inspiron 14 5440 gi&uacute;p bạn tiết kiệm nhiều thời gian khi l&agrave;m việc v&agrave; tối ưu h&oacute;a hiệu suất sử dụng.</p>\r\n\r\n<p><img alt=\"Hiệu năng Dell Inspiron 5440\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_14_n5440_i5_1334u_4_ecb2c49631.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Soạn thảo mượt m&agrave; tr&ecirc;n b&agrave;n ph&iacute;m chuy&ecirc;n nghiệp</strong></h2>\r\n\r\n<p>B&agrave;n ph&iacute;m chiclet m&agrave; Dell t&iacute;ch hợp l&ecirc;n laptop Inspiron 14 5440 cung cấp trải nghiệm g&otilde; &ecirc;m tay với độ ch&iacute;nh x&aacute;c cao, gi&uacute;p người d&ugrave;ng thao t&aacute;c nhanh ch&oacute;ng v&agrave; soạn thảo văn bản thoải m&aacute;i suốt thời gian d&agrave;i l&agrave;m việc. Kh&ocirc;ng chỉ vậy, hệ thống ph&iacute;m bấm n&agrave;y c&ograve;n được thiết kế nhằm giảm thiểu &acirc;m thanh ph&aacute;t ra khi g&otilde;, gi&uacute;p x&acirc;y dựng m&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp v&agrave; y&ecirc;n tĩnh.</p>\r\n\r\n<p>Ẩn b&ecirc;n dưới mỗi ph&iacute;m bấm l&agrave; đ&egrave;n LED đơn sắc thanh lịch, vừa g&acirc;y dấu ấn về t&iacute;nh thẩm mỹ, vừa gi&uacute;p người d&ugrave;ng soạn thảo văn bản dễ&nbsp; d&agrave;ng trong đ&ecirc;m. Ngo&agrave;i ra, sản phẩm cũng sử dụng mặt cảm ứng rộng r&atilde;i, phản hồi cực nhanh mọi thao t&aacute;c vuốt chạm cực kỳ mượt m&agrave; v&agrave; ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p><img alt=\"Bàn phím Dell Inspiron 5440\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_14_n5440_i5_1334u_6_b5e44a659e.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Bảo mật ti&ecirc;n tiến, đem lại sự an t&acirc;m tuyệt đối</strong></h2>\r\n\r\n<p>Sử dụng laptop Dell Inspiron 14 5440 i5 1334U, bạn sẽ ho&agrave;n to&agrave;n an t&acirc;m rằng mọi th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; dữ liệu c&ocirc;ng việc của m&igrave;nh đều được bảo mật tuyệt đối. Sản phẩm sử dụng cơ chế cảm biến v&acirc;n tay t&iacute;ch hợp ngay tr&ecirc;n n&uacute;t nguồn để đem đến phương &aacute;n đăng nhập nhanh v&agrave; an to&agrave;n, tiết kiệm thời gian cho người d&ugrave;ng.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ vậy, chip bảo mật TPM 2.0 m&agrave; Dell t&iacute;ch hợp trong chiếc&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;gi&uacute;p m&atilde; h&oacute;a dữ liệu v&agrave; bảo vệ th&ocirc;ng tin người d&ugrave;ng khỏi c&aacute;c cuộc tấn c&ocirc;ng của hacker cũng như sự r&igrave;nh rập từ những loại m&atilde; độc nguy hại khi duyệt web.</p>\r\n\r\n<p><img alt=\"Bảo mật Dell Inspiron 5440\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_14_n5440_i5_1334u_2_ebdf0e5aac.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Trải nghiệm trợ l&yacute; AI c&aacute; nh&acirc;n của ri&ecirc;ng bạn</strong></h2>\r\n\r\n<p>Laptop Inspiron 14 5440 được c&agrave;i đặt sẵn hệ điều h&agrave;nh Windows 11 bản quyền với thiết kế hiện đại v&agrave; nhiều c&ocirc;ng cụ đa nhiệm, đem lại trải nghiệm người d&ugrave;ng hiệu quả, chuy&ecirc;n nghiệp, thoải m&aacute;i n&acirc;ng cấp trong nhiều năm sử dụng.</p>\r\n\r\n<p>Điểm đặc biệt của thế hệ Inspiron 14 5440 i5 1334U l&agrave; việc sản phẩm được t&iacute;ch hợp th&ecirc;m ph&iacute;m gọi Copilot tr&ecirc;n Windows, đ&acirc;y l&agrave; trợ l&yacute; AI c&aacute; nh&acirc;n do Microsoft ph&aacute;t triển, sẽ hỗ trợ giải đ&aacute;p c&aacute;c thắc mắc v&agrave; cung cấp th&ocirc;ng tin hữu &iacute;ch cho người d&ugrave;ng trong qu&aacute; tr&igrave;nh giải quyết c&ocirc;ng việc.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 5440 trải nghiệm AI\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_14_n5440_i5_1334u_5_0cfe85b3f1.jpg\" style=\"height:535.662px; width:804px\" /></p>', 30, 0, 0, NULL, '2025-07-04 11:30:13', '2025-08-17 16:40:30'),
(10, 'SP004', 'Laptop hp 14s-em0086au r5 7520u/16gb/512gb/14\'fhd/amd radeon graphics/win11', 4, 'storage/thumbnail/7KxFQaClxLPTaaIWPhzdsyI40PgQbxBEisztkH6m.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Với việc trang bị sẵn tới 16GB RAM v&agrave; bộ vi xử l&yacute; Ryzen 5 7520 thuộc thế hệ AMD 7000 series mới nhất, HP 14s-em0086AU tự tin c&ugrave;ng bạn vượt qua mọi thử th&aacute;ch trong học tập, c&ocirc;ng việc. Kiểu d&aacute;ng nhỏ gọn, bền bỉ sẽ gi&uacute;p laptop dễ d&agrave;ng để đồng h&agrave;nh b&ecirc;n bạn đi khắp mu&ocirc;n nơi.</strong></p>\r\n\r\n<p><strong><img alt=\"HP 14s-em0086AU (ảnh 1)\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/0511/hp-14s-2023-14.jpg\" /></strong></p>\r\n\r\n<h3><strong>Cấu h&igrave;nh đột ph&aacute; trong tầm gi&aacute; với Ryzen 7000 series</strong></h3>\r\n\r\n<p>HP 14s-em0086AU l&agrave; chiếc&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;c&oacute; hiệu năng xuất sắc nhất trong tầm gi&aacute; với những linh kiện ti&ecirc;n tiến, mạnh mẽ h&agrave;ng đầu. Laptop trang bị bộ vi xử l&yacute; Ryzen 5 7520U thuộc thế hệ 7000 series. Đ&acirc;y l&agrave; con chip thuộc d&ograve;ng CPU mới nhất từ nh&agrave; AMD, sản xuất tr&ecirc;n tiến tr&igrave;nh 6nm hiện đại, hiệu suất ho&agrave;n hảo với 4 nh&acirc;n 8 luồng, tốc độ tối đa l&ecirc;n đến 4.3GHz. Kết quả l&agrave; m&aacute;y sẽ hoạt động rất nhanh ch&oacute;ng, đồng thời tiết kiệm pin. HP 14s ho&agrave;n hảo cho cả nhu cầu học tập, c&ocirc;ng việc văn ph&ograve;ng, b&aacute;n h&agrave;ng online.</p>\r\n\r\n<p><img alt=\"HP 14s-em0086AU (ảnh 2)\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/0511/hp-14s-2023-2.jpg\" /></p>\r\n\r\n<h3><strong>Thoải m&aacute;i kh&ocirc;ng gian l&agrave;m việc với 16GB RAM DDR5</strong></h3>\r\n\r\n<p>Sở hữu 16GB RAM v&agrave; 512GB SSD, HP 14s-em0086AU đảm bảo cho bạn c&oacute; những linh kiện h&agrave;ng đầu để tốc độ nhanh hơn bao giờ hết. Kh&ocirc;ng chỉ dung lượng lớn 16GB, RAM tr&ecirc;n HP 14s-em0086AU c&ograve;n l&agrave; chuẩn RAM DDR5 với tốc độ băng th&ocirc;ng vượt trội, mang đến kh&ocirc;ng gian đa nhiệm thoải m&aacute;i. Trong khi đ&oacute; 512GB PCIe NVMe M.2 SSD l&agrave; ổ cứng cao cấp kh&ocirc;ng chỉ bền vững m&agrave; c&ograve;n gi&uacute;p tăng tốc độ khởi động, mở ứng dụng, di chuyển sao ch&eacute;p dữ liệu. Bạn sẽ được tận hưởng sự mượt m&agrave;, nhanh ch&oacute;ng khi sử dụng HP 14s.</p>\r\n\r\n<p><img alt=\"HP 14s-em0086AU (ảnh 3)\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/0511/hp-14s-2023-15.jpg\" /></p>\r\n\r\n<h3><strong>Thiết kế mỏng nhẹ, cơ động</strong></h3>\r\n\r\n<p>HP 14s-em0086AU c&oacute; một thiết kế đầy thanh lịch v&agrave; kh&ocirc;ng k&eacute;m phần sang trọng. Laptop sở hữu kiểu d&aacute;ng thanh mảnh, tinh tế với những đường bo cong mềm mại. Phần viền m&agrave;n h&igrave;nh thu hẹp si&ecirc;u mỏng gi&uacute;p cho k&iacute;ch thước tổng thể v&ocirc; c&ugrave;ng nhỏ gọn, mang đến t&iacute;nh di động tối ưu. M&aacute;y rất nhẹ nh&agrave;ng để bạn mang đi bất cứ đ&acirc;u với trọng lượng chỉ 1,4kg c&ugrave;ng độ mỏng 1,79cm. Phi&ecirc;n bản m&agrave;u bạc thời trang, kh&ocirc;ng bao giờ lỗi thời cho bạn th&ecirc;m phần cảm hứng khi l&agrave;m việc.</p>\r\n\r\n<p><img alt=\"HP 14s-em0086AU (ảnh 4)\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/0511/hp-14s-2023-8.jpg\" /></p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh Full HD sắc n&eacute;t</strong></h3>\r\n\r\n<p>M&agrave;n h&igrave;nh HP 14s c&oacute; k&iacute;ch thước ti&ecirc;u chuẩn 14 inch, độ ph&acirc;n giải Full HD sắc n&eacute;t, m&agrave;u sắc sống động, viền mỏng micro-edge, mang đến trải nghiệm m&agrave;n h&igrave;nh tr&agrave;n viền hấp dẫn, gi&uacute;p bạn l&agrave;m việc tập trung hơn v&agrave; giải tr&iacute; th&uacute; vị hơn. Đặc biệt, m&agrave;n h&igrave;nh n&agrave;y trang bị c&ocirc;ng nghệ chống l&oacute;a v&agrave; chống nhấp nh&aacute;y fliker-free, gi&uacute;p bạn kh&ocirc;ng bị mỏi mắt d&ugrave; sử dụng trong thời gian d&agrave;i, an to&agrave;n v&agrave; dễ chịu cho mắt.</p>\r\n\r\n<p><img alt=\"HP 14s-em0086AU (ảnh 5)\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/0511/hp-14s-2023-1.jpg\" /></p>\r\n\r\n<h3><strong>Đầy đủ những kết nối h&agrave;ng đầu</strong></h3>\r\n\r\n<p>HP 14s-em0086AU tập hợp những kết nối nhanh bậc nhất hiện nay ở cả kh&ocirc;ng d&acirc;y v&agrave; c&oacute; d&acirc;y. Laptop hỗ trợ mạng Wi-Fi 6 v&agrave; Bluetooth 5.2, cho tốc độ kết nối Wi-Fi ổn định, cũng như tương th&iacute;ch với hầu hết c&aacute;c thiết bị Bluetooth hiện đại. Bạn cũng sẽ c&oacute; đủ c&aacute;c cổng kết nối th&ocirc;ng dụng như 2 cổng USB Type-A; cổng USB Type-C; cổng HDMI 1.4 v&agrave; jack tai nghe/mic 3.5mm. C&aacute;c cổng USB đều c&oacute; tốc độ truyền t&iacute;n hiệu l&ecirc;n tới 5Gbps, gi&uacute;p sao ch&eacute;p, di chuyển dữ liệu cực nhanh.</p>\r\n\r\n<p><img alt=\"HP 14s-em0086AU (ảnh 6)\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/0511/hp-14s-2023-7.jpg\" /></p>\r\n\r\n<h3><strong>Thời lượng pin ấn tượng</strong></h3>\r\n\r\n<p>Với bộ vi xử l&yacute; mới tiết kiệm năng lượng hơn c&ugrave;ng vi&ecirc;n pin 3 Cell 41Wh gi&uacute;p thời lượng pin của laptop HP 14s-em0086AU được k&eacute;o d&agrave;i hơn đ&aacute;ng kể. M&aacute;y t&iacute;nh c&oacute; thể sử dụng trong khoảng 9 giờ li&ecirc;n tục m&agrave; kh&ocirc;ng cần đến nguồn sạc. Nhờ vậy, những cuộc họp quan trọng hay việc sử dụng laptop trong một chuyến bay d&agrave;i đều sẽ được đ&aacute;p ứng một c&aacute;ch hiệu quả. Ngo&agrave;i ra, laptop c&ograve;n c&oacute; t&iacute;nh năng sạc nhanh, gi&uacute;p sạc đầy 50% pin chỉ sau 45 ph&uacute;t, nhanh ch&oacute;ng đủ năng lượng để bạn tiếp tục sử dụng.</p>\r\n\r\n<p><img alt=\"HP 14s-em0086AU (ảnh 7)\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/0511/hp-14s-2023-12.jpg\" /></p>', 53, 0, 1, NULL, '2025-07-04 11:30:50', '2025-08-15 13:45:47'),
(11, 'SP008', 'Laptop hp gaming victus 15-fa2731tx i5-13420h/16gb/512gb/15.6\"fhd/rtx 3050 6gb/win11_b85lnpa', 4, 'storage/thumbnail/ppDW7DuYmj46jU4HysHySD5AvypDcXc0FvktgX4G.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Với phi&ecirc;n bản&nbsp;</strong><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/hp-gaming-victus-15-fa2731tx-i5-13420h-b85lnpa\"><strong>Victus 15-fa2731TX</strong></a><strong>, HP đ&atilde; tạo ra một thiết bị đ&aacute;p ứng tốt cả nhu cầu gaming v&agrave; c&aacute;c t&aacute;c vụ c&ocirc;ng việc h&agrave;ng ng&agrave;y. Sản phẩm được trang bị chip Intel Core i5-13420H, c&oacute; card đồ họa RTX 3050 6GB v&agrave; m&agrave;n h&igrave;nh 144Hz. Hệ thống tản nhiệt hiệu quả gi&uacute;p duy tr&igrave; hiệu suất ổn định trong nhiều giờ trải nghiệm li&ecirc;n tục.</strong></p>\r\n\r\n<h2><strong>Chip H-series mạnh mẽ đ&aacute;p ứng mọi nhu cầu</strong></h2>\r\n\r\n<p>Phi&ecirc;n bản Victus 15-fa2731TX B85LNPA sử dụng chip Intel Core i5-13420H thuộc d&ograve;ng chip H series mạnh mẽ từ Intel. Với cấu tr&uacute;c 8 nh&acirc;n 12 luồng gồm 4 nh&acirc;n hiệu năng v&agrave; 4 nh&acirc;n tiết kiệm điện, bộ vi xử l&yacute; hướng đến sự c&acirc;n bằng giữa hiệu suất v&agrave; mức ti&ecirc;u thụ điện năng hợp l&yacute;.</p>\r\n\r\n<p>Xung nhịp tối đa 4.6GHz kết hợp c&ugrave;ng bộ nhớ đệm 12MB gi&uacute;p xử l&yacute; nhanh c&aacute;c t&aacute;c vụ cơ bản như chỉnh sửa ảnh, bi&ecirc;n tập video mức độ nhẹ v&agrave; chơi game phổ biến. Khi sử dụng kết hợp với c&aacute;c phần mềm văn ph&ograve;ng, học trực tuyến hoặc l&agrave;m đồ họa tầm trung, Intel Core i5-13420H thể hiện tốc độ phản hồi mượt v&agrave; kh&ocirc;ng bị giật lag khi đa nhiệm.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-a.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_a_0c0941c7fd.jpg\" /></p>\r\n\r\n<h2><strong>Hỗ trợ chơi game ở mức cấu h&igrave;nh cao</strong></h2>\r\n\r\n<p>Chiếc&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;n&agrave;y sử dụng card đồ họa rời NVIDIA GeForce RTX 3050 phi&ecirc;n bản 6GB GDDR6. Việc tăng dung lượng VRAM l&ecirc;n 6GB mở ra khả năng vận h&agrave;nh ổn định hơn ở c&aacute;c tựa game mới, nhất l&agrave; khi bật c&aacute;c thiết lập h&igrave;nh ảnh trung b&igrave;nh đến cao.</p>\r\n\r\n<p>RTX 3050 c&oacute; khả năng xử l&yacute; Ray Tracing v&agrave; hỗ trợ c&ocirc;ng nghệ DLSS, tận dụng tr&iacute; tuệ nh&acirc;n tạo nhằm tăng tốc độ khung h&igrave;nh trong game. Nhờ vậy, việc trải nghiệm c&aacute;c tr&ograve; chơi như Warzone, Apex Legends, Cyberpunk 2077 hay Valorant sẽ trở n&ecirc;n mượt m&agrave; hơn, nhất l&agrave; trong c&aacute;c pha giao tranh đ&ograve;i hỏi khung h&igrave;nh ổn định. Ngo&agrave;i chơi game, card đồ họa n&agrave;y c&ograve;n hỗ trợ tốt cho c&aacute;c phần mềm thiết kế 2D, 3D, chỉnh sửa video ở mức b&aacute;n chuy&ecirc;n.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-2.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_2_42f19f53f8.jpg\" /></p>\r\n\r\n<h2><strong>M&agrave;n h&igrave;nh IPS 144H si&ecirc;u mượt v&agrave; hiển thị ổn định</strong></h2>\r\n\r\n<p>HP trang bị cho Victus 15-fa2731TX m&agrave;n h&igrave;nh 15.6 inch độ ph&acirc;n giải Full HD (1920 x 1080 pixels). Tấm nền IPS cho g&oacute;c nh&igrave;n rộng v&agrave; khả năng t&aacute;i tạo m&agrave;u sắc tốt, duy tr&igrave; chất lượng h&igrave;nh ảnh ổn định d&ugrave; quan s&aacute;t từ nhiều hướng. Lớp phủ chống ch&oacute;i gi&uacute;p người d&ugrave;ng sử dụng trong m&ocirc;i trường &aacute;nh s&aacute;ng phức tạp m&agrave; kh&ocirc;ng bị ch&oacute;i l&oacute;a hay l&oacute;a m&agrave;u.</p>\r\n\r\n<p>Đặc biệt, tần số qu&eacute;t 144Hz l&agrave; yếu tố then chốt gi&uacute;p tăng trải nghiệm chơi game. H&igrave;nh ảnh chuyển động mượt, phản hồi nhanh gi&uacute;p game thủ nắm bắt t&igrave;nh huống ch&iacute;nh x&aacute;c hơn, đặc biệt trong c&aacute;c tựa game y&ecirc;u cầu phản xạ nhanh như FPS hoặc eSports.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-6.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_6_35f637e61c.jpg\" /></p>\r\n\r\n<h2><strong>Khả năng đa nhiệm tốt, truy xuất dữ liệu cực nhanh</strong></h2>\r\n\r\n<p>Cấu h&igrave;nh bộ nhớ bao gồm RAM 16GB v&agrave; cho ph&eacute;p n&acirc;ng cấp l&ecirc;n mức tối đa l&agrave; 32GB khi cần. Với mức RAM n&agrave;y, người d&ugrave;ng c&oacute; thể mở nhiều ứng dụng c&ugrave;ng l&uacute;c, xử l&yacute; đồng thời c&aacute;c tab tr&igrave;nh duyệt, phần mềm đồ họa hoặc stream game m&agrave; kh&ocirc;ng bị giật.</p>\r\n\r\n<p>Ổ cứng SSD 512GB PCIe NVMe cho tốc độ đọc ghi vượt trội so với HDD truyền thống. Từ thao t&aacute;c khởi động m&aacute;y, load game, mở ứng dụng cho đến việc truy xuất dữ liệu nặng đều được r&uacute;t ngắn thời gian đ&aacute;ng kể. Chuẩn PCIe hiện đại n&agrave;y ph&ugrave; hợp với xu hướng l&agrave;m việc nhanh v&agrave; hiệu quả tr&ecirc;n laptop hiện nay.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-3.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_3_4c999be2e6.jpg\" /></p>\r\n\r\n<h2><strong>Thiết kế thực dụng với phong c&aacute;ch trung t&iacute;nh</strong></h2>\r\n\r\n<p>HP Gaming Victus 15-fa2731TX sở hữu thiết kế đơn giản, chắc chắn v&agrave; ph&ugrave; hợp với cả m&ocirc;i trường học tập lẫn chơi game. M&aacute;y được ho&agrave;n thiện với t&ocirc;ng m&agrave;u đen chủ đạo, mặt lưng phẳng, logo chữ &ldquo;V&rdquo; nổi bật nhưng kh&ocirc;ng qu&aacute; ph&ocirc; trương. C&aacute;c đường n&eacute;t sắc sảo tạo cảm gi&aacute;c cứng c&aacute;p v&agrave; gọn g&agrave;ng.</p>\r\n\r\n<p>Trọng lượng khoảng 2.3kg v&agrave; độ d&agrave;y 2.35cm vừa phải cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng mang m&aacute;y theo b&ecirc;n m&igrave;nh khi cần. Cấu tr&uacute;c khung vỏ chắc chắn c&ugrave;ng bản lề ổn định gi&uacute;p người d&ugrave;ng y&ecirc;n t&acirc;m sử dụng h&agrave;ng ng&agrave;y m&agrave; kh&ocirc;ng cần bận t&acirc;m về độ bền.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-c.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_c_172855ec5e.jpg\" /></p>\r\n\r\n<h2><strong>B&agrave;n ph&iacute;m full-size, touchpad nhạy v&agrave; rộng r&atilde;i</strong></h2>\r\n\r\n<p>HP trang bị b&agrave;n ph&iacute;m full-size tr&ecirc;n Victus 15-fa2731TX với bố cục hợp l&yacute;, h&agrave;nh tr&igrave;nh ph&iacute;m vừa đủ v&agrave; độ nảy tốt. Trải nghiệm g&otilde; ph&iacute;m thoải m&aacute;i, hỗ trợ tốt cho cả soạn thảo văn bản lẫn chơi game trong thời gian d&agrave;i. C&aacute;c ph&iacute;m mũi t&ecirc;n được thiết kế t&aacute;ch biệt v&agrave; dễ nhận biết, gi&uacute;p cải thiện thao t&aacute;c điều hướng trong game.</p>\r\n\r\n<p>Touchpad c&oacute; diện t&iacute;ch rộng, bề mặt mịn v&agrave; hỗ trợ cảm ứng đa điểm ch&iacute;nh x&aacute;c. Khi kh&ocirc;ng sử dụng chuột rời, người d&ugrave;ng vẫn c&oacute; thể điều khiển nhanh ch&oacute;ng c&aacute;c t&aacute;c vụ cơ bản hoặc thao t&aacute;c k&eacute;o thả tiện lợi.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-1.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_1_f8ed315a7f.jpg\" /></p>\r\n\r\n<h2><strong>Tản nhiệt hiệu quả v&agrave; khả năng vận h&agrave;nh &ecirc;m &aacute;i</strong></h2>\r\n\r\n<p>Hệ thống tản nhiệt tr&ecirc;n HP Gaming Victus 15-fa2731TX được bố tr&iacute; với hai quạt l&agrave;m m&aacute;t v&agrave; c&aacute;c khe th&ocirc;ng gi&oacute; lớn. Cấu tr&uacute;c luồng kh&iacute; được tối ưu gi&uacute;p duy tr&igrave; hiệu suất ngay cả khi chơi game nặng hoặc sử dụng li&ecirc;n tục trong nhiều giờ.</p>\r\n\r\n<p>Hệ thống quạt vận h&agrave;nh kh&aacute; &ecirc;m, &iacute;t g&acirc;y tiếng ồn lớn trong điều kiện sử dụng b&igrave;nh thường. Đ&acirc;y l&agrave; điểm c&oacute; lợi cho m&ocirc;i trường học tập hoặc l&agrave;m việc y&ecirc;n tĩnh. Đồng thời, hệ thống gi&uacute;p hạn chế t&igrave;nh trạng tụ nhiệt v&agrave; giữ hiệu suất m&aacute;y ở mức ổn định sau nhiều giờ vận h&agrave;nh li&ecirc;n tục.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-b.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_b_ede70d5069.jpg\" /></p>\r\n\r\n<h2><strong>&Acirc;m thanh sắc sảo, chế độ lọc tạp &acirc;m hiệu quả</strong></h2>\r\n\r\n<p>HP đưa l&ecirc;n mẫu&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/gaming-do-hoa\">laptop gaming</a>&nbsp;n&agrave;y hệ thống &acirc;m thanh c&oacute; khả năng t&aacute;i tạo tốt c&aacute;c dải tần d&ugrave; bạn sử dụng loa ngo&agrave;i hay tai nghe. &Acirc;m bass v&agrave; treble được c&acirc;n bằng hợp l&yacute;, mang lại trải nghiệm giải tr&iacute; hoặc chơi game r&otilde; r&agrave;ng, kh&ocirc;ng bị r&egrave; khi tăng &acirc;m lượng.</p>\r\n\r\n<p>C&ocirc;ng nghệ lọc tiếng ồn AI gi&uacute;p cải thiện chất lượng đ&agrave;m thoại trong c&aacute;c cuộc gọi video, học online hoặc họp trực tuyến. Giọng n&oacute;i của bạn được t&aacute;ch bạch với tiếng ồn xung quanh, n&acirc;ng cao chất lượng giao tiếp ngay cả khi l&agrave;m việc tại kh&ocirc;ng gian mở hoặc tối ưu hiệu quả k&ecirc;u gọi đồng đội khi bạn chơi game trong những căn ph&ograve;ng đ&ocirc;ng người.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-8.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_8_80904602a2.jpg\" /></p>\r\n\r\n<h2><strong>Kết nối đa dạng để học tập v&agrave; chơi game hiệu quả</strong></h2>\r\n\r\n<p>HP Gaming Victus 15-fa2731TX cung cấp đầy đủ c&aacute;c cổng kết nối thiết yếu cho c&aacute;c nhu cầu sử dụng h&agrave;ng ng&agrave;y. Người d&ugrave;ng c&oacute; thể sử dụng cổng USB Type-C tốc độ 10Gbps để truyền dữ liệu nhanh hoặc xuất h&igrave;nh ảnh qua chuẩn DisplayPort 1.4. Hai cổng USB Type-A 5Gbps tiện dụng khi kết nối chuột,&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/ban-phim\">b&agrave;n ph&iacute;m</a>&nbsp;hoặc&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/o-cung-di-dong\">ổ cứng di động</a>.</p>\r\n\r\n<p>M&aacute;y c&ograve;n được trang bị cổng HDMI 2.1 để kết nối với m&agrave;n h&igrave;nh ngo&agrave;i, cổng LAN RJ-45 duy tr&igrave; t&iacute;n hiệu mạng ổn định khi chơi game online jack tai nghe t&iacute;ch hợp mic 3.5mm cho c&aacute;c nhu cầu &acirc;m thanh. Cổng nguồn AC nằm ở vị tr&iacute; thuận tiện, dễ cắm v&agrave; th&aacute;o.</p>\r\n\r\n<p><img alt=\"hp-gaming-victus-15-fa2731tx-5.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/hp_gaming_victus_15_fa2731tx_5_8d6f2cc296.jpg\" /></p>', 13, 0, 1, NULL, '2025-07-04 13:01:41', '2025-08-06 11:07:50'),
(12, 'SP000', 'Laptop hp 5', 1, 'storage/thumbnail/FeztRJeAimoOKCYPDOXztJ8r65rCGAXtgDmJNS56.jpg', '<p>đcd</p>', 35, 0, 1, NULL, '2025-07-09 07:05:58', '2025-08-20 17:01:01'),
(13, 'SP00227', 'Laptop dell inspiron 15 3520 i5 1235u/16gb/512gb/15.6\"fhd/win11/office hs24/os365', 1, 'storage/thumbnail/1Wwr31RSjEGNlAt3i9LRPI4L9fK0CXYayQw69JLa.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Dell Inspiron 15 3520 l&agrave; lựa chọn l&yacute; tưởng cho người d&ugrave;ng văn ph&ograve;ng, sinh vi&ecirc;n v&agrave; những ai y&ecirc;u cầu cao về năng lực đa nhiệm. Sở hữu chip Intel Core i5 thế hệ 12, RAM 16GB, ổ cứng SSD 512GB c&ugrave;ng m&agrave;n h&igrave;nh 120Hz, sản phẩm n&agrave;y l&agrave; minh chứng cho xu hướng laptop đa năng, hiệu quả m&agrave; vẫn giữ t&iacute;nh cơ động cao.</strong></p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 8D10NK\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_8d10nk_2_aa4dea5503.jpg\" /></p>\r\n\r\n<h2><strong>Sức mạnh bền bỉ từ chip Intel Core i5 thế hệ 12</strong></h2>\r\n\r\n<p>Yếu tố then chốt quyết định hiệu suất hoạt động của Dell Inspiron 15 3520 l&agrave; chip Intel Core i5 1235U thuộc thế hệ Alder Lake mới nhất. Bộ vi xử l&yacute; sở hữu kiến tr&uacute;c hybrid ti&ecirc;n tiến với 10 nh&acirc;n v&agrave; 12 luồng, cho tốc độ tối đa 4.40 GHz, gi&uacute;p thiết bị dễ d&agrave;ng xử l&yacute; trơn tru mọi c&ocirc;ng việc từ cơ bản đến n&acirc;ng cao.</p>\r\n\r\n<p>Ngo&agrave;i việc đ&aacute;p ứng tốt c&aacute;c t&aacute;c vụ văn ph&ograve;ng như soạn thảo, bảng t&iacute;nh, thuyết tr&igrave;nh hay họp trực tuyến, bộ vi xử l&yacute; c&ograve;n đ&aacute;p ứng mượt m&agrave; c&aacute;c nhu cầu chỉnh sửa ảnh, dựng video cơ bản, thậm ch&iacute; c&oacute; thể chơi c&aacute;c tựa game Esports phổ biến nhờ GPU t&iacute;ch hợp Intel Iris Xe. Nhờ vậy,&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell-inspiron\">Dell Inspiron</a>&nbsp;sẽ h&oacute;a th&acirc;n th&agrave;nh cỗ m&aacute;y đa nhiệm đ&aacute;p ứng to&agrave;n diện cho nhu cầu học tập, l&agrave;m việc v&agrave; giải tr&iacute;.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 8D10NK i5 1235U\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_8d10nk_9_7cb11d9ebc.jpg\" /></p>\r\n\r\n<h2><strong>Đa nhiệm mượt m&agrave; với dung lượng RAM 16GB</strong></h2>\r\n\r\n<p>Một trong những n&acirc;ng cấp đ&aacute;ng gi&aacute; tr&ecirc;n Dell Inspiron 15 3520 so với c&aacute;c mẫu laptop văn ph&ograve;ng th&ocirc;ng thường l&agrave; dung lượng RAM l&ecirc;n đến 16GB. Việc sở hữu một bộ nhớ RAM lớn cho ph&eacute;p người d&ugrave;ng mở nhiều ứng dụng c&ugrave;ng l&uacute;c m&agrave; kh&ocirc;ng gặp hiện tượng lag, đơ hay giật h&igrave;nh. Từ việc sử dụng c&aacute;c tr&igrave;nh duyệt nhiều tab, ứng dụng văn ph&ograve;ng, phần mềm chỉnh sửa ảnh cho đến c&aacute;c phần mềm hỗ trợ học tập, tất cả đều được xử l&yacute; trơn tru.</p>\r\n\r\n<p>Trong bối cảnh c&aacute;c ứng dụng ng&agrave;y c&agrave;ng ngốn nhiều t&agrave;i nguy&ecirc;n, RAM 16GB sẽ l&agrave; lợi thế đảm bảo thiết bị vận h&agrave;nh ổn định trong nhiều năm tới m&agrave; kh&ocirc;ng phải n&acirc;ng cấp sớm.&nbsp;</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 8D10NK 16GB RAM\" src=\"https://cdn2.fptshop.com.vn/small/dell_inspiron_15_3520_8d10nk_8_17386612c4.jpg\" /></p>\r\n\r\n<h2><strong>Ổ cứng SSD 512GB nhanh ch&oacute;ng v&agrave; rộng r&atilde;i</strong></h2>\r\n\r\n<p>Ngo&agrave;i sự mạnh mẽ ở chip xử l&yacute; v&agrave; RAM, Dell Inspiron 3520 c&ograve;n g&acirc;y ấn tượng với ổ cứng thể rắn SSD PCIe M.2 dung lượng 512GB. Nhờ c&ocirc;ng nghệ lưu trữ hiện đại, laptop mang đến tốc độ đọc ghi vượt trội, gi&uacute;p khởi động m&aacute;y chỉ trong v&agrave;i gi&acirc;y, mở phần mềm cực nhanh, đồng thời tăng tốc độ sao lưu v&agrave; truy xuất dữ liệu đ&aacute;ng kể.</p>\r\n\r\n<p>Dung lượng 512GB cũng đủ để bạn lưu trữ thoải m&aacute;i t&agrave;i liệu, h&igrave;nh ảnh, video, phần mềm học tập v&agrave; l&agrave;m việc m&agrave; kh&ocirc;ng lo tr&agrave;n bộ nhớ. Đ&acirc;y l&agrave; điểm cộng lớn gi&uacute;p Dell Inspiron 15 3520 trở th&agrave;nh chiếc laptop l&yacute; tưởng cho người d&ugrave;ng năng động.</p>\r\n\r\n<h2><strong>M&agrave;n h&igrave;nh 120Hz hết sức mượt m&agrave;, sống động</strong></h2>\r\n\r\n<p>Kh&ocirc;ng gian hiển thị l&agrave; ch&igrave;a kh&oacute;a quyết định trải nghiệm thị gi&aacute;c, v&agrave; Dell Inspiron 15 3520 đ&atilde; l&agrave;m rất tốt ở kh&iacute;a cạnh n&agrave;y. Thiết bị được t&iacute;ch hợp m&agrave;n h&igrave;nh 15.6 inch độ ph&acirc;n giải Full HD, cho h&igrave;nh ảnh sắc n&eacute;t, chi tiết v&agrave; diễn đạt m&agrave;u sắc trung thực. Đặc biệt, tần số qu&eacute;t 120Hz l&agrave; điểm nổi bật hiếm thấy trong ph&acirc;n kh&uacute;c laptop văn ph&ograve;ng.</p>\r\n\r\n<p>Tần số qu&eacute;t cao gi&uacute;p h&igrave;nh ảnh chuyển động mượt m&agrave; hơn khi lướt web, xem video hay sử dụng phần mềm đồ họa, đồng thời hỗ trợ chơi game tốt hơn v&agrave; phản hồi nhanh hơn. D&ugrave; bạn l&agrave; người l&agrave;m việc chuy&ecirc;n m&ocirc;n hay đơn giản chỉ muốn tận hưởng h&igrave;nh ảnh chất lượng, m&agrave;n h&igrave;nh của Dell 3520 đều đ&aacute;p ứng tốt nhu cầu.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 8D10NK 120Hz\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_8d10nk_3_d7785e2a28.jpg\" /></p>\r\n\r\n<h2><strong>Thiết kế m&agrave;u bạc tinh tế, chuy&ecirc;n nghiệp v&agrave; cơ động</strong></h2>\r\n\r\n<p>Về mặt thiết kế, Dell Inspiron 15 3520 phi&ecirc;n bản m&agrave;u bạc to&aacute;t l&ecirc;n vẻ ngo&agrave;i thanh lịch v&agrave; hiện đại, ph&ugrave; hợp với nhiều m&ocirc;i trường sử dụng từ văn ph&ograve;ng c&ocirc;ng sở, giảng đường cho đến l&agrave;m việc tại nh&agrave;. Vỏ ngo&agrave;i m&agrave;u bạc s&aacute;ng b&oacute;ng kết hợp c&ugrave;ng c&aacute;c đường n&eacute;t cứng c&aacute;p tạo n&ecirc;n tổng thể h&agrave;i h&ograve;a giữa sự chuy&ecirc;n nghiệp v&agrave; thời thượng.</p>\r\n\r\n<p>Với trọng lượng chỉ khoảng 1.6kg v&agrave; độ mỏng 17.5mm, chiếc&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;dễ d&agrave;ng cất gọn trong balo, t&uacute;i x&aacute;ch, phục vụ tốt cho những người hay di chuyển. D&ugrave; l&agrave; sinh vi&ecirc;n, nh&acirc;n vi&ecirc;n văn ph&ograve;ng hay người l&agrave;m việc tự do, bạn đều c&oacute; thể y&ecirc;n t&acirc;m sử dụng thiết bị mọi l&uacute;c mọi nơi.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 8D10NK màu bạc tinh tế\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_8d10nk_5_27fb5a0663.jpg\" /></p>\r\n\r\n<h2><strong>Kết nối đa dạng v&agrave; hỗ trợ tối đa cho c&ocirc;ng việc</strong></h2>\r\n\r\n<p>Dell Inspiron 15 3520 được trang bị đầy đủ c&aacute;c cổng kết nối thiết yếu, gi&uacute;p bạn l&agrave;m việc linh hoạt hơn m&agrave; kh&ocirc;ng cần mang theo nhiều thiết bị chuyển đổi. Cụ thể, bạn sẽ t&igrave;m thấy tr&ecirc;n sản phẩm 2 cổng USB 3.2 Gen 1 tốc độ cao; 1 cổng USB 2.0 để kết nối với chuột v&agrave; b&agrave;n ph&iacute;m; 1 cổng HDMI để kết nối với m&aacute;y chiếu hoặc m&agrave;n h&igrave;nh phụ; khe đọc thẻ nhớ SD gi&uacute;p truy xuất dữ liệu từ thiết bị lưu trữ v&agrave; jack &acirc;m thanh 3.5mm hỗ trợ tai nghe hoặc micro.</p>\r\n\r\n<p>Ngo&agrave;i ra, m&aacute;y c&ograve;n hỗ trợ Wi-Fi 5 v&agrave; Bluetooth 5.0 nhằm đảm bảo kết nối mạng ổn định v&agrave; khả năng li&ecirc;n kết với c&aacute;c thiết bị ngoại vi kh&ocirc;ng d&acirc;y tiện lợi.</p>\r\n\r\n<h2><strong>Chế độ chờ th&ocirc;ng minh vận h&agrave;nh linh hoạt</strong></h2>\r\n\r\n<p>Một t&iacute;nh năng đ&aacute;ng gi&aacute; kh&aacute;c tr&ecirc;n Dell Inspiron 3520 l&agrave; chế độ chờ th&ocirc;ng minh. Cơ chế n&agrave;y gi&uacute;p chiếc&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/dell\">laptop Dell</a>&nbsp;lu&ocirc;n sẵn s&agrave;ng hoạt động ngay khi bạn mở m&aacute;y hoặc nhấn n&uacute;t nguồn, gi&uacute;p tiết kiệm thời gian chờ đợi v&agrave; giảm thiểu mức ti&ecirc;u thụ năng lượng, g&oacute;p phần k&eacute;o d&agrave;i thời lượng pin đồng thời n&acirc;ng cao hiệu quả l&agrave;m việc.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những cải tiến nhỏ nhưng lại mang đến sự tiện lợi lớn trong qu&aacute; tr&igrave;nh sử dụng h&agrave;ng ng&agrave;y, đặc biệt với ai thường xuy&ecirc;n phải mở m&aacute;y để kiểm tra c&ocirc;ng việc, email hoặc t&agrave;i liệu.</p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 3520 8D10NK chế độ chờ thông minh\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/dell_inspiron_15_3520_8d10nk_1_3bc3a56310.jpg\" /></p>', 67, 0, 1, NULL, '2025-07-10 10:24:41', '2025-08-16 10:44:51'),
(14, 'SP005', 'Laptop asus vivobook x1502va-bq885w i5-13420h/16gb/512gb/15.6\" fhd/win11', 3, 'storage/thumbnail/zVyaJxTsmqimvM04l8rQYNEpR98q7hSVt82vLlMt.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Với thiết kế hiện đại, trọng lượng nhẹ, hiệu năng mạnh mẽ từ CPU Core i5-13420H, RAM 16GB, SSD 512GB c&ugrave;ng m&agrave;n h&igrave;nh Full HD sắc n&eacute;t,&nbsp;</strong><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook-x1502va-bq885w-i5-13420h\"><strong>Asus Vivobook 15 X1502VA-BQ885W</strong></a><strong>&nbsp;l&agrave; mẫu laptop đa năng, xứng đ&aacute;ng nằm trong danh s&aacute;ch ưu ti&ecirc;n của những ai đang t&igrave;m kiếm một thiết bị ổn định để học tập v&agrave; l&agrave;m việc.</strong></p>\r\n\r\n<p><img alt=\"asus-vivobook-x1502va-bq885w-2.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1502va_bq885w_2_1e83e9253a.jpg\" /></p>\r\n\r\n<h2><strong>Thiết kế thanh lịch, hiện đại v&agrave; dễ mang theo</strong></h2>\r\n\r\n<p>Asus Vivobook 15 X1502VA-BQ885W được chế t&aacute;c với vẻ ngo&agrave;i tối giản nhưng vẫn to&aacute;t l&ecirc;n vẻ chuy&ecirc;n nghiệp v&agrave; sang trọng. Lớp vỏ ngo&agrave;i m&agrave;u bạc thanh lịch c&ugrave;ng bề mặt được xử l&yacute; tinh tế gi&uacute;p hạn chế b&aacute;m dấu v&acirc;n tay. Với k&iacute;ch thước tổng thể chỉ khoảng 35.97 x 23.25 x 1.99 cm, m&aacute;y giữ được độ mỏng gọn l&yacute; tưởng cho những ai cần di chuyển thường xuy&ecirc;n.</p>\r\n\r\n<p>Trọng lượng của m&aacute;y cũng l&agrave; một điểm cộng lớn. Khi bao gồm pin, phi&ecirc;n bản&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook\">Vivobook</a>&nbsp;n&agrave;y cũng chỉ nặng 1.70 kg, cho ph&eacute;p người d&ugrave;ng dễ d&agrave;ng mang theo b&ecirc;n m&igrave;nh, d&ugrave; l&agrave; đi học, đi l&agrave;m hay đi c&ocirc;ng t&aacute;c.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1502va-bq885w-1.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1502va_bq885w_1_fbd8fe4514.jpg\" /></p>\r\n\r\n<h2><strong>Hiệu suất ổn định với chip Intel Core i5 thế hệ 13</strong></h2>\r\n\r\n<p>L&agrave;m n&ecirc;n sức mạnh hiệu năng cho Asus Vivobook 15 X1502VA-BQ885W l&agrave; chip Intel Core i5-13420H. Đ&acirc;y l&agrave; d&ograve;ng CPU hiệu năng cao thuộc thế hệ thứ 13 của Intel, được thiết kế với 8 nh&acirc;n v&agrave; 12 luồng xử l&yacute;, k&egrave;m theo bộ nhớ đệm l&ecirc;n đến 12MB. Tốc độ xung nhịp c&oacute; thể đạt tới 4.6 GHz gi&uacute;p xử l&yacute; c&aacute;c t&aacute;c vụ văn ph&ograve;ng nặng như l&agrave;m b&aacute;o c&aacute;o, dựng file Excel lớn, xử l&yacute; đồ họa 2D nhẹ, chỉnh sửa ảnh hoặc bi&ecirc;n tập video cơ bản một c&aacute;ch mượt m&agrave;.</p>\r\n\r\n<p>RAM 16GB cho ph&eacute;p người d&ugrave;ng thoải m&aacute;i mở h&agrave;ng chục tab tr&igrave;nh duyệt, chạy phần mềm nặng như Adobe Photoshop, Premiere Pro hoặc sử dụng ứng dụng học tập v&agrave; họp trực tuyến m&agrave; kh&ocirc;ng xảy ra t&igrave;nh trạng giật lag. Ổ cứng SSD 512GB chuẩn M.2 NVMe PCIe 4.0 cho tốc độ đọc/ghi si&ecirc;u nhanh. Người d&ugrave;ng sẽ nhận thấy sự kh&aacute;c biệt r&otilde; rệt trong thời gian khởi động m&aacute;y, mở phần mềm hoặc sao ch&eacute;p dữ liệu lớn.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1502va-bq885w-6.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1502va_bq885w_6_2900893046.jpg\" /></p>\r\n\r\n<h2><strong>M&agrave;n h&igrave;nh Full HD 15.6 inch chống ch&oacute;i, bảo vệ mắt</strong></h2>\r\n\r\n<p>Về năng lực hiển thị, Asus Vivobook 15 X1502VA-BQ885W được trang bị m&agrave;n h&igrave;nh chất lượng cao với k&iacute;ch thước 15.6 inch, độ ph&acirc;n giải Full HD (1920 x 1080) v&agrave; tỷ lệ khung h&igrave;nh ti&ecirc;u chuẩn 16:9. Tấm nền IPS cho khả năng hiển thị m&agrave;u sắc ch&iacute;nh x&aacute;c v&agrave; g&oacute;c nh&igrave;n rộng, gi&uacute;p người d&ugrave;ng l&agrave;m việc, học tập hoặc giải tr&iacute; với trải nghiệm h&igrave;nh ảnh r&otilde; n&eacute;t v&agrave; dễ chịu hơn.</p>\r\n\r\n<p>Lớp chống ch&oacute;i Anti-Glare gi&uacute;p giảm thiểu hiện tượng l&oacute;a, phản chiếu &aacute;nh s&aacute;ng khi sử dụng trong điều kiện c&oacute; &aacute;nh s&aacute;ng mạnh, như trong lớp học, văn ph&ograve;ng hoặc ngo&agrave;i trời. Đặc biệt, m&agrave;n h&igrave;nh c&ograve;n đạt chứng nhận T&Uuml;V Rheinland về năng giảm thiểu &aacute;nh s&aacute;ng xanh &ndash; t&aacute;c nh&acirc;n g&acirc;y mỏi mắt khi sử dụng&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;trong thời gian d&agrave;i.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1502va-bq885w-5.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1502va_bq885w_5_fc53dbb5ee.jpg\" /></p>\r\n\r\n<h2><strong>Thời lượng pin tốt, sạc nhanh v&agrave; an to&agrave;n</strong></h2>\r\n\r\n<p>Asus trang bị cho model n&agrave;y vi&ecirc;n pin 3 cell dung lượng 42WHrs, với c&ocirc;ng nghệ Li-ion bền bỉ v&agrave; an to&agrave;n. Pin được thiết kế theo cấu tr&uacute;c 3S1P, c&acirc;n bằng giữa trọng lượng v&agrave; hiệu suất nhằm k&eacute;o d&agrave;i thời gian sử dụng. Với mức dung lượng n&agrave;y, người d&ugrave;ng c&oacute; thể y&ecirc;n t&acirc;m l&agrave;m việc nửa ng&agrave;y ở c&aacute;c t&aacute;c vụ văn ph&ograve;ng th&ocirc;ng thường trước khi cần sạc lại.</p>\r\n\r\n<p>Bộ sạc đi k&egrave;m c&ocirc;ng suất 65W hoạt động ổn định trong dải điện &aacute;p rộng từ 100 đến 240V, gi&uacute;p sạc nhanh hơn v&agrave; ph&ugrave; hợp với hầu hết chuẩn điện lưới tại Việt Nam.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1502va-bq885w-3.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1502va_bq885w_3_3b65592227.jpg\" /></p>\r\n\r\n<h2><strong>Windows bản quyền v&agrave; t&iacute;nh năng hỗ trợ học tập</strong></h2>\r\n\r\n<p>Laptop Vivobook 15 X1502VA-BQ885W được c&agrave;i sẵn Windows 11 Home bản quyền, người d&ugrave;ng kh&ocirc;ng cần mất th&ecirc;m chi ph&iacute; để mua hoặc c&agrave;i lại hệ điều h&agrave;nh. Giao diện hiện đại của nền tảng được thiết kế tối ưu cho cả l&agrave;m việc v&agrave; giải tr&iacute;. Ngo&agrave;i ra, m&aacute;y c&ograve;n hỗ trợ phần mềm quản l&yacute; hệ thống độc quyền MyASUS gi&uacute;p cập nhật driver, tối ưu pin, điều khiển quạt th&ocirc;ng minh v&agrave; kết nối nhanh với điện thoại.</p>\r\n\r\n<p>Ngo&agrave;i ra, m&aacute;y cũng t&iacute;ch hợp webcam HD, microphone chống ồn AI v&agrave; khả năng mở kh&oacute;a bằng v&acirc;n tay (t&ugrave;y phi&ecirc;n bản) nhằm đảm bảo t&iacute;nh bảo mật v&agrave; tiện lợi cho việc học online hay họp từ xa.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1502va-bq885w-8.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1502va_bq885w_8_f6849b5a9a.jpg\" /></p>\r\n\r\n<h2><strong>Kết nối đầy đủ v&agrave; chất lượng &acirc;m thanh trung thực</strong></h2>\r\n\r\n<p>Asus Vivobook 15 X1502VA-BQ885W được trang bị đầy đủ c&aacute;c cổng kết nối phổ biến, đảm bảo khả năng mở rộng v&agrave; li&ecirc;n kết với c&aacute;c thiết bị ngoại vi. Cụ thể, m&aacute;y sở hữu: 1 cổng USB 2.0 Type-A, 2 cổng USB 3.2 Gen 1 Type-A, 1 cổng USB 3.2 Gen 1 Type-C, 1 cổng HDMI 1.4 v&agrave; 1 jack tai nghe 3.5mm t&iacute;ch hợp cả micro.</p>\r\n\r\n<p>&Acirc;m thanh tr&ecirc;n m&aacute;y được xử l&yacute; bởi c&ocirc;ng nghệ SonicMaster của&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus\">Asus</a>, mang lại trải nghiệm &acirc;m thanh ch&acirc;n thực v&agrave; trong trẻo hơn. &Acirc;m lượng to, kh&ocirc;ng bị r&egrave; khi mở lớn, ph&ugrave; hợp để nghe nhạc, xem phim hay học tập trực tuyến. Hệ thống loa k&eacute;p t&iacute;ch hợp cho &acirc;m thanh r&otilde; r&agrave;ng ở cả m&ocirc;i trường trong nh&agrave; cũng như kh&ocirc;ng gian mở. Micro thu &acirc;m tốt phục vụ đắc lực trong qu&aacute; tr&igrave;nh giao tiếp khi họp h&agrave;nh, học tập hoặc thực hiện video call.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1502va-bq885w-9.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1502va_bq885w_9_76843157bd.jpg\" /></p>', 114, 0, 1, NULL, '2025-07-18 01:13:59', '2025-08-16 10:17:57'),
(15, 'SP221', 'Laptop hp 245 g10 (a20tfpt) r5-7530u/16gb/256gb/14\" fhd/win11', 4, 'storage/thumbnail/NgVx0uyb31vokbh9VEWA2zkX011CMSxQjNAD0BHT.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>HP 245 G10 (A20TFPT) với mức gi&aacute; phải chăng nhưng lại c&oacute; sự kết hợp giữa thiết kế đẹp, mỏng nhẹ c&ugrave;ng hiệu năng mạnh mẽ từ chip AMD R5. D&ugrave; bạn l&agrave; sinh vi&ecirc;n, nh&acirc;n vi&ecirc;n văn ph&ograve;ng hay doanh nh&acirc;n, HP 245 G10 (A20TFPT) vẫn đ&aacute;p ứng xuất sắc nhu cầu sử dụng.</strong></p>\r\n\r\n<h3><strong>Thiết kế thanh tho&aacute;t, thời trang</strong></h3>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/hp-245-g10-a20tfpt-r5-7530u\">HP 245 G10</a>&nbsp;sở hữu thiết kế nhỏ gọn, thanh tho&aacute;t với lớp vỏ bằng nhựa, gi&uacute;p giảm trọng lượng tổng thể, chỉ c&ograve;n 1.36kg, thuận tiện cho việc di chuyển v&agrave; mang theo đến mọi nơi. Sản phẩm sẽ đồng h&agrave;nh c&ugrave;ng bạn đi l&agrave;m mỗi ng&agrave;y hoặc đến qu&aacute;n cafe, l&ecirc;n thư viện hoặc thậm ch&iacute; l&ecirc;n những chuyến bay đi c&ocirc;ng t&aacute;c.</p>\r\n\r\n<p><img alt=\"Laptop HP 245 G10 (A20TFPT) (hình 1)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/laptop_hp_245_g10_a20tfpt_r5_7530u_2_eff9b8f37f.png\" /></p>\r\n\r\n<p>M&aacute;y vẫn giữ nguy&ecirc;n ng&ocirc;n ngữ thiết kế tinh giản ở những thế hệ tiền nhiệm. Điều n&agrave;y thể hiện ở việc tối giản c&aacute;c chi tiết tr&ecirc;n mặt lưng, chỉ c&oacute; logo HP b&oacute;ng lo&aacute;ng nổi bật nằm ch&iacute;nh giữa. D&ugrave; vậy, t&iacute;nh thẩm mỹ vẫn được đảm bảo nhờ gam m&agrave;u bạc thời thượng c&ugrave;ng bề mặt c&oacute; khả năng chống b&aacute;m bụi, dễ d&agrave;ng lau ch&ugrave;i. X&eacute;t đến mặt ph&iacute;a trong, c&aacute;c ph&iacute;m tr&ecirc;n b&agrave;n ph&iacute;m sử dụng gam m&agrave;u đen, tạo n&ecirc;n n&eacute;t &ldquo;nhấn nh&aacute;&rdquo; cho tổng thể m&aacute;y.</p>\r\n\r\n<h3><strong>L&agrave;m việc hiệu quả với chip AMD Ryzen 5 7530U</strong></h3>\r\n\r\n<p>Laptop HP 245 G10 (A20TFPT) hứa hẹn khả năng đ&aacute;p ứng mọi nhu cầu sử dụng của bạn nhờ hiệu năng mạnh mẽ đến từ vi xử l&yacute; AMD Ryzen 5 7530U. Con chip thuộc thế hệ 7000 series từ nh&agrave; AMD sở hữu 6 nh&acirc;n 12 luồng v&agrave; tốc độ xung nhịp tối đa l&ecirc;n tới 4.5GHz c&oacute; thể chạy mượt mọi ứng dụng văn ph&ograve;ng để xử l&yacute; c&aacute;c c&ocirc;ng việc thường ng&agrave;y. CPU n&agrave;y cũng t&iacute;ch hợp GPU AMD Radeon Graphics, n&acirc;ng cao khả năng xử l&yacute; t&aacute;c vụ đồ họa cơ bản v&agrave; cho ph&eacute;p chơi mượt m&agrave; nhiều game Online/eSports.</p>\r\n\r\n<p><img alt=\"Laptop HP 245 G10 (A20TFPT) (hình 2)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/laptop_hp_245_g10_a20tfpt_r5_7530u_3_dd029ca588.png\" /></p>\r\n\r\n<h3><strong>RAM 16GB đa nhiệm ho&agrave;n hảo</strong></h3>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/hp\">Laptop HP</a>&nbsp;đi k&egrave;m 16GB RAM, đảm bảo khả năng đa nhiệm mượt m&agrave;. Chuẩn RAM DDR4 tốc độ 3200MHz n&agrave;y thường thấy tr&ecirc;n nhiều d&ograve;ng laptop văn ph&ograve;ng tầm trung, loại bỏ t&igrave;nh trạng load lại trang khi mở nhiều tab tr&ecirc;n tr&igrave;nh duyệt web hoặc t&igrave;nh trạng chạy chậm khi l&agrave;m việc đồng thời tr&ecirc;n nhiều ứng dụng.</p>\r\n\r\n<p>M&aacute;y cũng được trang bị ổ cứng SSD cho tốc độ đọc ghi, truy xuất dữ liệu ấn tượng hơn loại ổ HDD truyền thống. Bộ nhớ 256GB cung cấp kh&ocirc;ng gian lưu trữ kh&aacute; thoải m&aacute;i trong suốt một thời gian d&agrave;i m&agrave; kh&ocirc;ng cần x&oacute;a bớt khi muốn lưu những dữ liệu mới.</p>\r\n\r\n<p><img alt=\"Laptop HP 245 G10 (A20TFPT) (hình 3)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/laptop_hp_245_g10_a20tfpt_r5_7530u_4_47abc39c5f.png\" /></p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh 14 inch viền mỏng</strong></h3>\r\n\r\n<p>Laptop HP lu&ocirc;n g&acirc;y ấn tượng với phần viền m&agrave;n h&igrave;nh mỏng v&agrave; HP 245 G10 (A20TFPT) cũng kh&ocirc;ng phải l&agrave; một ngoại lệ. Cụ thể, m&agrave;n h&igrave;nh m&aacute;y sở hữu k&iacute;ch thước 14 inch với tỷ lệ m&agrave;n h&igrave;nh tr&ecirc;n th&acirc;n m&aacute;y l&agrave; 84%. Bạn thoải m&aacute;i l&agrave;m việc với Word, Excel v&agrave; c&aacute;c ứng dụng, phần mềm kh&aacute;c, đảm bảo văn bản v&agrave; h&igrave;nh ảnh lu&ocirc;n hiển thị r&otilde; r&agrave;ng v&agrave; chi tiết để kh&ocirc;ng gặp kh&oacute; khăn trong việc đọc hay quan s&aacute;t.</p>\r\n\r\n<p><img alt=\"Laptop HP 245 G10 (A20TFPT) (hình 4)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/laptop_hp_245_g10_a20tfpt_r5_7530u_5_39d23c77c6.png\" /></p>\r\n\r\n<p>M&agrave;n h&igrave;nh m&aacute;y được trang bị tấm nền IPS cho g&oacute;c nh&igrave;n rộng 178 độ, độ ph&acirc;n giải FHD t&aacute;i hiện h&igrave;nh ảnh sắc n&eacute;t v&agrave; độ phủ m&agrave;u 45% NTSC gi&uacute;p m&agrave;u sắc hiển thị ch&iacute;nh x&aacute;c, sống động hơn. Lớp phủ chống ch&oacute;i đem đến sự thoải m&aacute;i cho mắt khi l&agrave;m việc với&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">m&aacute;y t&iacute;nh</a>&nbsp;nhưng kh&ocirc;ng l&agrave;m sai lệch m&agrave;u sắc của nội dung đang hiển thị.</p>\r\n\r\n<h3><strong>Camera v&agrave; micro k&eacute;p hỗ trợ học/họp trực tuyến</strong></h3>\r\n\r\n<p>Laptop HP 245 G10 (A20TFPT) sở hữu HD webcam (720p) v&agrave; micro k&eacute;p t&iacute;ch hợp khả năng giảm tiếng ồn AI. Đ&acirc;y ch&iacute;nh l&agrave; hai trang bị cần thiết để bạn c&oacute; những buổi học/họp trực tuyến hiệu quả. Nhờ đ&oacute;, h&igrave;nh ảnh của bạn sẽ lu&ocirc;n sắc n&eacute;t v&agrave; chất lượng, đồng thời giọng n&oacute;i sẽ được thu &acirc;m v&agrave; truyền đạt r&otilde; r&agrave;ng để những người kh&aacute;c c&oacute; thể nghe m&agrave; kh&ocirc;ng lẫn tạp &acirc;m xung quanh.</p>\r\n\r\n<h3><strong>Kết nối c&oacute; d&acirc;y v&agrave; kh&ocirc;ng d&acirc;y đầy đủ</strong></h3>\r\n\r\n<p>HP 245 G10 (A20TFPT) t&iacute;ch hợp hệ thống cổng tương t&aacute;c đa dạng gồm 1 cổng USB Type-C, 2 cổng USB Type-A, 1 cổng HDMI 1.4b, 1 cổng sạc v&agrave; jack tai nghe/micro combo. C&aacute;c cổng USB đều c&oacute; tốc độ truyền t&iacute;n hiệu l&ecirc;n tới 5Gbps, gi&uacute;p bạn sao ch&eacute;p, di chuyển dữ liệu cực nhanh. Với c&aacute;c cổng giao tiếp n&agrave;y, bạn c&oacute; thể kết nối laptop HP với phụ kiện v&agrave; nhiều loại thiết bị ngoại vi như m&aacute;y in, m&aacute;y chiếu, loa, tivi,... dễ d&agrave;ng m&agrave; kh&ocirc;ng cần lo lắng về khả năng tương th&iacute;ch. B&ecirc;n cạnh đ&oacute;, Bluetooth 5.3 v&agrave; mạng Wi-Fi 6 cho ph&eacute;p kết nối kh&ocirc;ng d&acirc;y nhanh ch&oacute;ng, ổn định với khả năng thu s&oacute;ng v&agrave; tốc độ vượt trội.&nbsp;</p>\r\n\r\n<p><img alt=\"Laptop HP 245 G10 (A20TFPT) (hình 5)\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/laptop_hp_245_g10_a20tfpt_r5_7530u_6_66dcc4e376.png\" /></p>', 8, 0, 1, NULL, '2025-07-24 16:45:22', '2025-08-06 11:21:28');
INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `danh_muc_id`, `anh_san_pham`, `mo_ta`, `luot_xem`, `da_ban`, `is_hot`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 'SP100', 'Laptop asus vivobook x1605va-mb1826w i3-1315u /8gb/512gb/16\" wuxga/win11', 3, 'storage/thumbnail/S43zVNZ4eKDrP2E8HzQs4cLxPuwZyWYkZKueOIHJ.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Với sản phẩm&nbsp;</strong><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook-x1605va-mb1826w\"><strong>Vivobook X1605VA-MB1826W</strong></a><strong>, đội ngũ Asus đ&atilde; tạo n&ecirc;n một mẫu laptop đạt được sự c&acirc;n bằng giữa hiệu suất tốt, thiết kế hiện đại v&agrave; mức gi&aacute; dễ tiếp cận. Nhờ vậy, người d&ugrave;ng c&oacute; được phương &aacute;n l&agrave;m việc v&agrave; giải tr&iacute; tiện lợi m&agrave; kh&ocirc;ng cần đầu tư qu&aacute; nhiều về chi ph&iacute;. Phi&ecirc;n bản Vivobook 16 n&agrave;y sở hữu chip Intel Core i3-1315U, c&oacute; 8GB RAM v&agrave; ổ cứng SSD 512GB.</strong></p>\r\n\r\n<p><img alt=\"asus-vivobook-x1605va-mb1795w-1.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1605va_mb1795w_1_1d6d764fa5.jpg\" /></p>\r\n\r\n<h2><strong>Tinh tế, tiện dụng, đề cao sự thanh lịch</strong></h2>\r\n\r\n<p>Sử dụng bản lề duỗi thẳng 180&deg;, Vivobook X1605VA-MB1826W gi&uacute;p bạn dễ d&agrave;ng chia sẻ th&ocirc;ng tin tr&ecirc;n&nbsp;<a href=\"https://fptshop.com.vn/man-hinh\">m&agrave;n h&igrave;nh</a>&nbsp;khi l&agrave;m việc nh&oacute;m hoặc tr&igrave;nh b&agrave;y &yacute; tưởng. Th&acirc;n m&aacute;y được chế t&aacute;c tỉ mỉ, mặt A nhẵn mịn tạo cảm gi&aacute;c tối giản thanh lịch trong phong c&aacute;ch thẩm mỹ. Với trọng lượng nhẹ v&agrave; độ mỏng 1.9 cm, bạn c&oacute; thể dễ d&agrave;ng mang theo chiếc Vivobook b&ecirc;n m&igrave;nh m&agrave; kh&ocirc;ng cảm thấy nặng nề hay cồng kềnh.</p>\r\n\r\n<p>Đặc biệt, lớp phủ Antimicrobial Guard Plus tr&ecirc;n c&aacute;c bề mặt tiếp x&uacute;c thường xuy&ecirc;n với người d&ugrave;ng chắc chắn sẽ cực kỳ cần thiết với những ai đề cao yếu tố sức khỏe. Cụ thể, c&ocirc;ng nghệ n&agrave;y sẽ ức chế sự ph&aacute;t triển của vi khuẩn, bảo vệ bạn khỏi những nguy cơ tiềm t&agrave;ng trong qu&aacute; tr&igrave;nh sử dụng laptop l&acirc;u d&agrave;i.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1605va-mb1795w-3.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1605va_mb1795w_3_5aa709055f.jpg\" /></p>\r\n\r\n<h2><strong>Trải nghiệm m&agrave;n h&igrave;nh NanoEdge tỉ lệ 16:10</strong></h2>\r\n\r\n<p>Phi&ecirc;n bản&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook\">Vivobook</a>&nbsp;bạn đang quan t&acirc;m sử dụng m&agrave;n h&igrave;nh 16 inch với tỷ lệ khung h&igrave;nh 16:10 gi&uacute;p gia tăng kh&ocirc;ng gian hiển thị đ&aacute;ng kể so với m&agrave;n h&igrave;nh 16:9 truyền thống. Phong c&aacute;ch thiết kế viền si&ecirc;u mỏng NanoEdge tạo hiệu ứng thị gi&aacute;c đ&atilde; mắt khi sử dụng trong thực tế. Với độ ph&acirc;n giải Full HD+ v&agrave; độ s&aacute;ng cao, sản phẩm sẽ gi&uacute;p bạn l&agrave;m việc hiệu quả hơn, dễ d&agrave;ng xử l&yacute; văn bản, chỉnh sửa ảnh hoặc thưởng thức c&aacute;c bộ phim với h&igrave;nh ảnh sống động.</p>\r\n\r\n<p>Đặc biệt, m&agrave;n h&igrave;nh của Vivobook 16 đạt chứng nhận T&Uuml;V Rheinland về mức ph&aacute;t s&aacute;ng xanh dương thấp, gi&uacute;p bảo vệ mắt, giảm t&igrave;nh trạng mỏi mắt khi l&agrave;m việc trong thời gian d&agrave;i.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1605va-mb1795w-5.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1605va_mb1795w_5_a28b8429b9.jpg\" /></p>\r\n\r\n<h2><strong>Hiệu năng đ&aacute;p ứng tốt mọi nhu cầu thường ng&agrave;y</strong></h2>\r\n\r\n<p>Sức mạnh của Vivobook 16 đến từ Intel Core i3-1315U &ndash; con chip thế hệ thứ 13 sở hữu 6 nh&acirc;n 8 luồng, kết hợp với 8GB RAM gi&uacute;p xử l&yacute; mượt m&agrave; c&aacute;c t&aacute;c vụ đa nhiệm, từ c&ocirc;ng việc văn ph&ograve;ng, học tập đến chơi c&aacute;c tựa game giải tr&iacute; nhẹ nh&agrave;ng. Ổ cứng SSD 512GB mang lại tốc độ đọc/ghi nhanh, gi&uacute;p&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus\">laptop Asus</a>&nbsp;khởi động trong chớp mắt v&agrave; cung cấp kh&ocirc;ng gian lưu trữ rộng r&atilde;i cho t&agrave;i liệu, phần mềm c&ugrave;ng c&aacute;c tệp tin quan trọng.</p>\r\n\r\n<p>Ngo&agrave;i ra, Vivobook 16 c&ograve;n được trang bị WiFi 6E với tốc độ kết nối internet nhanh hơn v&agrave; ổn định hơn, gi&uacute;p bạn l&agrave;m việc online, xem video hay tải xuống dữ liệu một c&aacute;ch nhanh ch&oacute;ng v&agrave; mượt m&agrave;.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1605va-mb1795w-2.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1605va_mb1795w_2_36fd626dfb.jpg\" /></p>\r\n\r\n<h2><strong>Hệ thống tản nhiệt IceBlade hiệu quả v&agrave; &ecirc;m &aacute;i</strong></h2>\r\n\r\n<p>B&iacute; quyết gi&uacute;p Vivobook X1605VA-MB1826W duy tr&igrave; hiệu suất ổn định đến từ hệ thống l&agrave;m m&aacute;t độc quyền. Cụ thể, Asus trang bị cho chiếc laptop n&agrave;y quạt IceBlade với lỗ tho&aacute;t kh&iacute; k&eacute;p v&agrave; ống dẫn nhiệt hiệu quả trong th&acirc;n m&aacute;y. Nhờ vậy, nhiệt độ của m&aacute;y lu&ocirc;n được kiểm so&aacute;t tốt, đảm bảo hiệu suất hoạt động cao m&agrave; kh&ocirc;ng g&acirc;y ra những tiếng ồn kh&oacute; chịu.</p>\r\n\r\n<h2><strong>Đắm ch&igrave;m trong &acirc;m thanh Dirac v&agrave; Audio Booster</strong></h2>\r\n\r\n<p>Hệ thống &acirc;m thanh tr&ecirc;n Vivobook 16 được tinh chỉnh bởi Dirac &ndash; nh&agrave; cung cấp giải ph&aacute;p &acirc;m thanh chuy&ecirc;n nghiệp, mang đến trải nghiệm &acirc;m thanh c&acirc;n bằng, trong trẻo v&agrave; sống động. C&ocirc;ng nghệ Asus Audio Booster gi&uacute;p tăng &acirc;m lượng l&ecirc;n tới 1,5 lần m&agrave; kh&ocirc;ng bị m&eacute;o tiếng, gi&uacute;p bạn tận hưởng những bản nhạc, bộ phim hay hội họp online với chất lượng &acirc;m thanh tốt nhất.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1605va-mb1795w-6.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1605va_mb1795w_6_04e7ba5d2e.jpg\" /></p>\r\n\r\n<h2><strong>B&agrave;n ph&iacute;m ErgoSense v&agrave; Touchpad rộng r&atilde;i</strong></h2>\r\n\r\n<p>Asus trang bị cho Vivobook X1605VA-MB1826W hệ thống b&agrave;n ph&iacute;m ErgoSense được t&iacute;nh to&aacute;n tỉ mỉ từ h&agrave;nh tr&igrave;nh ph&iacute;m, độ s&acirc;u mũ ph&iacute;m v&agrave; khoảng c&aacute;ch giữa c&aacute;c ph&iacute;m nhằm mang lại cảm gi&aacute;c g&otilde; ph&iacute;m thoải m&aacute;i nhất. Tốc độ phản hồi nhanh gi&uacute;p gia tăng hiệu suất l&agrave;m việc. B&ecirc;n cạnh đ&oacute;, mặt cảm ứng lớn gi&uacute;p thao t&aacute;c mượt m&agrave; hơn, đặc biệt hữu &iacute;ch khi bạn kh&ocirc;ng sử dụng chuột rời.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1605va-mb1795w-8.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1605va_mb1795w_8_130af7769b.jpg\" /></p>\r\n\r\n<h2><strong>Cơ chế bảo mật c&ugrave;ng loạt t&iacute;nh năng th&ocirc;ng minh</strong></h2>\r\n\r\n<p>Vivobook 16 ch&uacute; trọng đến sự an to&agrave;n v&agrave; quyền ri&ecirc;ng tư của người d&ugrave;ng với c&aacute;c t&iacute;nh năng bảo mật ti&ecirc;n tiến. Chiếc laptop được trang bị nắp che&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/webcam\">webcam</a>&nbsp;vật l&yacute; gi&uacute;p bảo vệ bạn khỏi nguy cơ bị x&acirc;m phạm quyền ri&ecirc;ng tư khi kh&ocirc;ng sử dụng camera. Ngo&agrave;i ra, cảm biến v&acirc;n tay t&iacute;ch hợp tr&ecirc;n touchpad hỗ trợ người d&ugrave;ng đăng nhập nhanh ch&oacute;ng v&agrave; an to&agrave;n hơn m&agrave; kh&ocirc;ng cần nhập mật khẩu.</p>\r\n\r\n<p>C&ocirc;ng nghệ giảm nhiễu AI (AI Noise-Canceling) gi&uacute;p lọc bỏ tiếng ồn xung quanh, đảm bảo chất lượng &acirc;m thanh trong c&aacute;c cuộc gọi video v&agrave; hội họp trực tuyến.</p>\r\n\r\n<h2><strong>Kết nối đa dạng c&ugrave;ng c&ocirc;ng nghệ sạc nhanh</strong></h2>\r\n\r\n<p>Bạn sẽ t&igrave;m thấy ở laptop Vivobook X1605VA-MB1826W đầy đủ c&aacute;c cổng kết nối, bao gồm 1 cổng USB-C 3.2 Gen 1 hỗ trợ sạc nhanh v&agrave; truyền dữ liệu tốc độ cao; 2 cổng USB 3.2 Gen 1 Type-A; 1 cổng USB 2.0; 1 cổng HDMI v&agrave; 1 jack &acirc;m thanh 3.5mm.</p>\r\n\r\n<p>Đặc biệt, c&ocirc;ng nghệ sạc nhanh gi&uacute;p laptop c&oacute; thể t&aacute;i tạo 60% pin chỉ trong 49 ph&uacute;t, hỗ trợ tối đa cho c&ocirc;ng việc v&agrave; học tập li&ecirc;n tục m&agrave; kh&ocirc;ng lo gi&aacute;n đoạn.</p>\r\n\r\n<p><img alt=\"asus-vivobook-x1605va-mb1795w-9.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_x1605va_mb1795w_9_91b8059765.jpg\" /></p>', 8, 0, 1, NULL, '2025-07-28 09:22:37', '2025-08-16 10:25:48'),
(17, 'SP00', 'Laptop asus vivobook gaming k3605vc-rp431w i5-13420h/16gb/512gb/16\" wuxga/rtx 3050 4gb/w11', 3, 'storage/thumbnail/IwfFeEqVHgaEdozTtcp5YoCxOC1QOdHYHmpnBLqb.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook-gaming-k3605vc-rp431w-i5-13420h\"><strong>Asus Vivobook Gaming K3605VC-RP431W</strong></a><strong>&nbsp;với sự kết hợp của CPU Intel Core i5 13420H c&ugrave;ng card đồ họa rời NVIDIA GeForce RTX 3050 sẽ gi&uacute;p bạn ho&agrave;n th&agrave;nh mọi c&ocirc;ng việc phức tạp cũng như giải tr&iacute; h&agrave;ng ng&agrave;y. Đặc biệt, chiếc laptop n&agrave;y v&ocirc; c&ugrave;ng mỏng nhẹ v&agrave; thời trang, đảm bảo t&iacute;nh di động trong cuộc sống hiện đại.</strong></p>\r\n\r\n<p><img alt=\"Asus Vivobook K3605VC-RP431W\" src=\"https://cdn2.fptshop.com.vn/unsafe/ASUS_Vivobook_16_X_K3605_4_61e10b6de4.jpg\" style=\"height:535.287px; width:804px\" /></p>\r\n\r\n<h2><strong>Xử l&yacute; trơn tru những t&aacute;c vụ phức tạp</strong></h2>\r\n\r\n<p>Asus Vivobook Gaming K3605VC-RP431W được trang bị bộ vi xử l&yacute; Intel Core i5 13420H thế hệ 13 với 8 nh&acirc;n 12 luồng, cho ph&eacute;p&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;xử l&yacute; hiệu quả c&aacute;c tựa game đời mới v&agrave; cả những dự &aacute;n đ&ograve;i hỏi cao về cấu h&igrave;nh. Kể cả khi cần l&agrave;m việc đồng thời với nhiều phần mềm, hiệu năng của Vivobook 16X vẫn giữ được độ ổn định đ&aacute;ng tin cậy. Khi cần tăng tốc, chế độ hiệu năng c&oacute; thể n&acirc;ng c&ocirc;ng suất xử l&yacute; l&ecirc;n tới TDP 50W, hỗ trợ người d&ugrave;ng ho&agrave;n th&agrave;nh c&ocirc;ng việc nhanh ch&oacute;ng hơn.</p>\r\n\r\n<p><img alt=\"Asus Vivobook K3605VC-RP431W i5 13420H\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/ASUS_Vivobook_16_X_K3605_1_1fca01e79b.jpg\" style=\"height:536.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Cỗ m&aacute;y đồng h&agrave;nh cho những &yacute; tưởng t&aacute;o bạo</strong></h2>\r\n\r\n<p>GPU NVIDIA GeForce RTX 3050 c&oacute; mặt tr&ecirc;n Vivobook 16X K3605VC với kiến tr&uacute;c Ada Lovelace thời thượng, đ&aacute;p ứng tốt cả nhu cầu chơi game, thiết kế, kết xuất h&igrave;nh ảnh chuy&ecirc;n nghiệp hay ph&aacute;t trực tiếp. D&ugrave; bạn mới bắt đầu h&agrave;nh tr&igrave;nh s&aacute;ng tạo hay đ&atilde; l&agrave; người d&ugrave;ng c&oacute; kinh nghiệm, chiếc laptop n&agrave;y vẫn c&oacute; đủ c&ocirc;ng cụ cần thiết để xử l&yacute; những t&aacute;c vụ đồ họa nặng. NVIDIA Studio Driver được t&iacute;ch hợp gi&uacute;p tối ưu hiệu suất cho c&aacute;c phần mềm s&aacute;ng tạo phổ biến.</p>\r\n\r\n<p><img alt=\"Asus Vivobook K3605VC-RP431W RTX 3050\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/ASUS_Vivobook_16_X_K3605_2_a7bc4544b0.jpg\" style=\"height:536.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Chuyển đổi linh hoạt hiệu năng nhờ MUX Switch</strong></h2>\r\n\r\n<p>ASUS Vivobook 16X hỗ trợ c&ocirc;ng nghệ MUX Switch, cho ph&eacute;p người d&ugrave;ng lựa chọn giữa hai chế độ GPU. Khi cần hiệu năng cao như l&uacute;c chơi game hay l&agrave;m đồ họa, bạn c&oacute; thể chuyển sang chế độ GPU rời để tận hưởng độ trễ thấp v&agrave; tốc độ tối ưu. Ngược lại, chế độ Kết hợp sẽ l&agrave; lựa chọn ph&ugrave; hợp khi bạn cần thời lượng pin d&agrave;i hơn cho c&ocirc;ng việc h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Ổn định nhiệt độ, giữ vững hiệu suất</strong></h2>\r\n\r\n<p>Để đảm bảo hiệu năng lu&ocirc;n được duy tr&igrave; ở mức tối ưu, ASUS Vivobook 16X K3605VC-RP431W sử dụng hệ thống tản nhiệt ASUS IceCool với ba ống dẫn nhiệt k&iacute;ch thước 8 mm, 6 mm v&agrave; 4 mm. Kết hợp c&ugrave;ng quạt IceBlade gồm 87 c&aacute;nh l&agrave;m từ polymer tinh thể lỏng, hệ thống n&agrave;y tăng cường khả năng dẫn nhiệt m&agrave; vẫn đảm bảo độ &ecirc;m &aacute;i khi vận h&agrave;nh. Nhờ đ&oacute;, CPU v&agrave; GPU c&oacute; thể đạt TDP tổng cộng l&ecirc;n tới 70W ở chế độ hiệu năng m&agrave; kh&ocirc;ng lo hiện tượng &ldquo;nghẽn cổ chai&rdquo;.</p>\r\n\r\n<p><img alt=\"Asus Vivobook K3605VC-RP431W tản nhiệt hiệu quả\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/ASUS_Vivobook_16_X_K3605_8_18d1e8b355.jpg\" style=\"height:536.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Khung h&igrave;nh rộng, chuyển động mượt m&agrave;</strong></h2>\r\n\r\n<p>ASUS Vivobook 16X sở hữu m&agrave;n h&igrave;nh Full HD+ với tần số qu&eacute;t 144 Hz, tỷ lệ 16:10, cho kh&ocirc;ng gian hiển thị thoải m&aacute;i v&agrave; khả năng t&aacute;i tạo m&agrave;u sắc ch&acirc;n thực. H&igrave;nh ảnh hiển thị mượt m&agrave;, m&agrave;u sắc sống động gi&uacute;p bạn thỏa sức đắm ch&igrave;m trong game h&agrave;nh động hoặc c&ocirc;ng việc thiết kế. M&agrave;n h&igrave;nh đạt chứng nhận T&Uuml;V Rheinland, giảm ph&aacute;t s&aacute;ng xanh dương v&agrave; loại bỏ t&igrave;nh trạng nhấp nh&aacute;y, bảo vệ mắt tốt hơn trong thời gian sử dụng d&agrave;i.</p>\r\n\r\n<p><img alt=\"Asus Vivobook K3605VC-RP431W Full HD 144Hz\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/ASUS_Vivobook_16_X_K3605_10_a1ecc59a14.jpg\" style=\"height:536.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Trải nghiệm &acirc;m thanh sống động vượt mong đợi</strong></h2>\r\n\r\n<p>&Acirc;m thanh tr&ecirc;n ASUS Vivobook 16X K3605VC được tinh chỉnh bởi chuy&ecirc;n gia Dirac, mang lại kh&ocirc;ng gian &acirc;m thanh rộng mở, độ chi tiết cao v&agrave; c&acirc;n bằng tốt. D&ugrave; bạn đang xem phim, nghe nhạc hay họp trực tuyến, chất lượng &acirc;m thanh lu&ocirc;n đảm bảo sự r&otilde; r&agrave;ng v&agrave; l&ocirc;i cuốn, gi&uacute;p bạn cảm nhận đầy đủ từng tầng &acirc;m sắc.</p>\r\n\r\n<p><img alt=\"asus-vivobook-gaming-k3605vc-rp431w-i5-13420h-1.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_gaming_k3605vc_rp431w_i5_13420h_1_d08c1a30e4.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Tối ưu cho l&agrave;m việc từ xa</strong></h2>\r\n\r\n<p>Laptop Vivobook 16X sở hữu hệ thống camera AI hiện đại c&ugrave;ng c&ocirc;ng nghệ khử tiếng ồn th&ocirc;ng minh. Camera ASUS AiSense gi&uacute;p bạn lu&ocirc;n xuất hiện tươi tắn trong c&aacute;c cuộc gọi video, trong khi thuật to&aacute;n khử tiếng ồn AI hai chiều gi&uacute;p giảm tạp &acirc;m cả ở đầu v&agrave;o v&agrave; đầu ra, đảm bảo c&aacute;c cuộc hội thoại diễn ra mạch lạc v&agrave; hiệu quả.</p>\r\n\r\n<h2><strong>Ng&ocirc;n ngữ thiết kế đậm c&aacute; t&iacute;nh</strong></h2>\r\n\r\n<p>ASUS Vivobook 16X g&acirc;y ấn tượng với phần logo Vivobook nh&ocirc; cao tr&ecirc;n nắp m&aacute;y kim loại c&ugrave;ng ph&iacute;m Enter viền nổi bật ph&aacute; c&aacute;ch. T&ocirc;ng m&agrave;u Đen Indie mang đến vẻ ngo&agrave;i chững chạc, hiện đại, ph&ugrave; hợp với cả m&ocirc;i trường c&ocirc;ng sở lẫn giảng đường hay cả qu&aacute;n caf&eacute;.</p>\r\n\r\n<p><img alt=\"Asus Vivobook K3605VC-RP431W thiết kế cá tính\" src=\"https://cdn2.fptshop.com.vn/unsafe/ASUS_Vivobook_16_X_K3605_3_1583ce3b9b.jpg\" style=\"height:536.525px; width:804px\" /></p>\r\n\r\n<h2><strong>Sẵn s&agrave;ng kết nối mọi l&uacute;c, mọi nơi</strong></h2>\r\n\r\n<p>Được trang bị đầy đủ cổng kết nối gồm Thunderbolt 4, hai cổng USB 3.2 Gen 1 Type-A, HDMI 2.1, đầu đọc thẻ SD v&agrave; jack &acirc;m thanh combo, Vivobook 16X K3605VC c&oacute; thể dễ d&agrave;ng kết nối với m&agrave;n h&igrave;nh ngo&agrave;i, thiết bị lưu trữ hay tai nghe, gi&uacute;p bạn lu&ocirc;n sẵn s&agrave;ng cho mọi t&igrave;nh huống c&ocirc;ng việc v&agrave; giải tr&iacute;.</p>\r\n\r\n<p><img alt=\"Asus Vivobook K3605VC-RP431W kết nối đa dạng\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/ASUS_Vivobook_16_X_K3605_5_51b3708af3.jpg\" style=\"height:535.662px; width:804px\" /></p>\r\n\r\n<h2><strong>Độ bền ti&ecirc;u chuẩn qu&acirc;n đội, an t&acirc;m d&agrave;i l&acirc;u</strong></h2>\r\n\r\n<p>Asus Vivobook Gaming K3605VC-RP431W đ&aacute;p ứng ti&ecirc;u chuẩn độ bền MIL-STD-810H của qu&acirc;n đội Mỹ. Trải qua 12 phương thức kiểm tra v&agrave; 26 quy tr&igrave;nh thử nghiệm khắt khe, chiếc m&aacute;y n&agrave;y kh&ocirc;ng chỉ bền bỉ m&agrave; c&ograve;n mang lại sự tin cậy tuyệt đối trong mọi điều kiện sử dụng. Bạn ho&agrave;n to&agrave;n c&oacute; thể y&ecirc;n t&acirc;m mang theo laptop đồng h&agrave;nh trong c&ocirc;ng việc, học tập hay giải tr&iacute; l&acirc;u d&agrave;i.</p>\r\n\r\n<p><img alt=\"asus-vivobook-gaming-k3605vc-rp431w-i5-13420h-2.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/asus_vivobook_gaming_k3605vc_rp431w_i5_13420h_2_80446ef7d3.jpg\" style=\"height:535.662px; width:804px\" /></p>', 28, 0, 1, NULL, '2025-07-28 09:27:42', '2025-08-16 10:45:59'),
(18, 'SP00q', 'Laptop asus vivobook x1504va-nj526w i5 1335u/16gb/512gb ssd/15.6\" fhd/win11', 3, 'storage/thumbnail/edtlysOHr4qVB2JXfzHc430yA7WZulPnfGzZdQbc.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><strong>Với nhiều t&iacute;nh năng nổi bật, Asus Vivobook X1504VA-NJ526W&nbsp;</strong><strong>sẽ trở th&agrave;nh một lựa chọn l&yacute; tưởng cho cả c&ocirc;ng việc v&agrave; giải tr&iacute;, đặc biệt ph&ugrave; hợp với những người cần một m&aacute;y t&iacute;nh x&aacute;ch tay mạnh mẽ, đa năng nhưng vẫn gọn nhẹ v&agrave; tiện lợi để mang theo.</strong></p>\r\n\r\n<h3><strong>Hiệu suất mạnh mẽ với&nbsp;</strong><strong>chip Intel Core i5-1335U</strong></h3>\r\n\r\n<p>Khi n&oacute;i đến hiệu suất, Asus Vivobook X1504VA-NJ526W thực sự nổi bật với bộ vi xử l&yacute; Intel Core i5-1335U. Sản phẩm được thiết kế để đ&aacute;p ứng nhu cầu ng&agrave;y c&agrave;ng cao của người d&ugrave;ng hiện đại, bộ vi xử l&yacute; n&agrave;y c&oacute; tốc độ cơ bản 1.3 GHz v&agrave; khả năng tăng tốc l&ecirc;n tới 4.6 GHz, mang lại trải nghiệm sức mạnh đ&aacute;ng kinh ngạc.</p>\r\n\r\n<p>Với 10 l&otilde;i v&agrave; 12 luồng, CPU Intel Core i5-1335U sẽ gi&uacute;p&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\">laptop</a>&nbsp;c&oacute; thể xử l&yacute; mượt m&agrave; c&aacute;c t&aacute;c vụ đa nhiệm từ l&agrave;m việc văn ph&ograve;ng đến chỉnh sửa video chuy&ecirc;n nghiệp, thậm ch&iacute; l&agrave; chơi những tựa game hiện đại.</p>\r\n\r\n<p><img alt=\"Asus Vivobook X1504VA-NJ526W\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/16/10-asus-vivobook-x1504va-nj526w-i5-1335u-01.jpg\" /></p>\r\n\r\n<h3><strong>Bộ nhớ v&agrave; lưu trữ lớn</strong></h3>\r\n\r\n<p>Kh&ocirc;ng chỉ g&acirc;y ấn tượng với bộ vi xử l&yacute; mạnh mẽ, Asus Vivobook X1504VA-NJ526W c&ograve;n nổi bật với bộ nhớ v&agrave; lưu trữ lớn. Với 16GB RAM 3200MHz, m&aacute;y t&iacute;nh n&agrave;y sẽ mang đến khả năng đa nhiệm tuyệt vời, cho ph&eacute;p bạn chạy nhiều ứng dụng c&ugrave;ng l&uacute;c m&agrave; kh&ocirc;ng lo ngại về t&igrave;nh trạng giật lag hay chậm trễ. Điều n&agrave;y đặc biệt quan trọng đối với những người d&ugrave;ng chuy&ecirc;n nghiệp hoặc những ai cần một m&aacute;y t&iacute;nh c&oacute; thể xử l&yacute; nhanh ch&oacute;ng v&agrave; hiệu quả c&aacute;c t&aacute;c vụ nặng.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, Asus Vivobook X1504VA-NJ526W c&ograve;n được trang bị ổ cứng SSD M.2 NVMe PCIe 4.0 với dung lượng 512GB, mang lại kh&ocirc;ng gian lưu trữ khổng lồ cho người d&ugrave;ng để lưu trữ v&agrave; c&agrave;i đặt mọi thứ y&ecirc;u th&iacute;ch. Với tốc độ truyền tải dữ liệu cao, ổ SSD n&agrave;y cũng gi&uacute;p cải thiện đ&aacute;ng kể thời gian khởi động v&agrave; tải ứng dụng để n&acirc;ng cao trải nghiệm l&agrave;m việc v&agrave; giải tr&iacute;.</p>\r\n\r\n<p><img alt=\"Bộ nhớ Asus Vivobook X1504VA-NJ526W\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/16/10-asus-vivobook-x1504va-nj526w-i5-1335u-02.jpg\" /></p>\r\n\r\n<h3><strong>M&agrave;n&nbsp;</strong><strong>h&igrave;nh FHD&nbsp;</strong><strong>sắc&nbsp;</strong><strong>n&eacute;t</strong></h3>\r\n\r\n<p>M&agrave;n h&igrave;nh l&agrave; một trong những yếu tố quan trọng nhất của một chiếc laptop v&agrave; Asus Vivobook X1504VA-NJ526W sẽ kh&ocirc;ng l&agrave;m bạn thất vọng. Với m&agrave;n h&igrave;nh FHD 15.6-inch c&oacute; độ ph&acirc;n giải 1920 x 1080 pixels c&ugrave;ng tỷ lệ khung h&igrave;nh 16:9, laptop n&agrave;y hứa hẹn sẽ mang lại h&igrave;nh ảnh sắc n&eacute;t, cũng như đảm bảo rằng mọi chi tiết đều được hiển thị một c&aacute;ch ch&acirc;n thực v&agrave; sống động.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, m&agrave;n h&igrave;nh của Vivobook X1504VA-NJ526W cũng c&oacute; tần số qu&eacute;t 60Hz, đảm bảo mọi h&igrave;nh ảnh sẽ lu&ocirc;n chuyển động mượt m&agrave;, giảm thiểu hiện tượng nh&ograve;e hay giật h&igrave;nh. Ngo&agrave;i ra, m&agrave;n h&igrave;nh n&agrave;y c&ograve;n c&oacute; dải m&agrave;u rộng v&agrave; lớp phủ chống ch&oacute;i để bạn thoải m&aacute;i sử dụng m&aacute;y t&iacute;nh ngo&agrave;i trời hay trong m&ocirc;i trường &aacute;nh s&aacute;ng mạnh m&agrave; kh&ocirc;ng gặp phải vấn đề phản chiếu kh&oacute; chịu.</p>\r\n\r\n<p><img alt=\"Màn hình Asus Vivobook X1504VA-NJ526W\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/16/10-asus-vivobook-x1504va-nj526w-i5-1335u-03.jpg\" /></p>\r\n\r\n<h3><strong>Đồ họa t&iacute;ch hợp Intel Iris X</strong><strong>e</strong></h3>\r\n\r\n<p>Asus Vivobook X1504VA-NJ526W được trang bị đồ họa Intel Iris Xe t&iacute;ch hợp v&agrave;o CPU Intel Core i5-1335U. D&ugrave; kh&ocirc;ng phải l&agrave; card đồ họa chuy&ecirc;n dụng, Intel Iris Xe vẫn đủ mạnh mẽ để xử l&yacute; c&aacute;c t&aacute;c vụ đồ họa nhẹ v&agrave; chơi game với cấu h&igrave;nh kh&ocirc;ng qu&aacute; cao, mang lại trải nghiệm mượt m&agrave; v&agrave; ổn định.</p>\r\n\r\n<p>Điều n&agrave;y l&agrave;m cho Vivobook X1504VA-NJ526W trở th&agrave;nh một lựa chọn l&yacute; tưởng cho những người cần một m&aacute;y t&iacute;nh x&aacute;ch tay c&oacute; khả năng đ&aacute;p ứng trải nghiệm đồ họa rất tốt trong ph&acirc;n kh&uacute;c tầm trung.</p>\r\n\r\n<p><img alt=\"Đồ họa Asus Vivobook X1504VA-NJ526W\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/16/10-asus-vivobook-x1504va-nj526w-i5-1335u-04.jpg\" /></p>\r\n\r\n<h3><strong>Thiết kế mỏng nhẹ</strong></h3>\r\n\r\n<p>Asus Vivobook X1504VA-NJ526W đ&atilde; định nghĩa lại kh&aacute;i niệm về một chiếc laptop mỏng nhẹ th&ocirc;ng qua thiết kế ấn tượng của m&igrave;nh. Với độ mỏng chỉ 1.79 cm v&agrave; trọng lượng 1.70 kg, sản phẩm kh&ocirc;ng chỉ dễ d&agrave;ng vừa vặn trong hầu hết c&aacute;c t&uacute;i x&aacute;ch m&agrave; c&ograve;n đủ nhẹ để bạn c&oacute; thể mang theo mọi l&uacute;c mọi nơi m&agrave; kh&ocirc;ng cảm thấy cồng kềnh. Lợi thế n&agrave;y biến chiếc laptop của&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus\">Asus</a>&nbsp;trở th&agrave;nh lựa chọn l&yacute; tưởng cho những người d&ugrave;ng thường xuy&ecirc;n di chuyển, như sinh vi&ecirc;n, nh&acirc;n vi&ecirc;n văn ph&ograve;ng hay những người l&agrave;m việc tự do.</p>\r\n\r\n<p><img alt=\"Thiết kế Asus Vivobook X1504VA-NJ526W\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/16/10-asus-vivobook-x1504va-nj526w-i5-1335u-05.jpg\" /></p>\r\n\r\n<h3><strong>Kết nối&nbsp;</strong><strong>đa dạng v&agrave; bảo mật</strong></h3>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook\">Asus Vivobook</a>&nbsp;sẽ đ&aacute;p ứng mọi nhu cầu kết nối của bạn với bộ sưu tập đa dạng c&aacute;c cổng kết nối. Từ USB Type-C đa năng cho đến HDMI, m&aacute;y t&iacute;nh x&aacute;ch tay n&agrave;y cung cấp đủ mọi lựa chọn để bạn c&oacute; thể kết nối với mọi thiết bị ngoại vi một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<p>Vivobook X1504VA-NJ526W cũng c&oacute; những giải ph&aacute;p kết nối kh&ocirc;ng d&acirc;y hiện đại như Wi-Fi 6E v&agrave; Bluetooth 5, gi&uacute;p bạn lu&ocirc;n kết nối mạng kh&ocirc;ng d&acirc;y với tốc độ cao v&agrave; ổn định, đồng thời dễ d&agrave;ng kết nối với c&aacute;c thiết bị Bluetooth như tai nghe, loa, chuột kh&ocirc;ng d&acirc;y... Ngo&agrave;i ra, m&aacute;y t&iacute;nh n&agrave;y c&ograve;n được trang bị cảm biến v&acirc;n tay một chạm v&agrave; camera HD 720p với tấm che ri&ecirc;ng tư, đảm bảo t&iacute;nh an to&agrave;n v&agrave; bảo mật cho dữ liệu của bạn.</p>\r\n\r\n<p><img alt=\"Kết nối Asus Vivobook X1504VA-NJ526W\" src=\"https://cdn2.fptshop.com.vn/unsafe/564x0/filters:quality(80)/Uploads/images/2015/Tin-Tuc/10/16/10-asus-vivobook-x1504va-nj526w-i5-1335u-06.jpg\" /></p>', 13, 0, 1, NULL, '2025-07-28 10:42:39', '2025-08-20 06:37:33'),
(19, 'SP00q1', 'Laptop asus vivobook 15 x1502va-bq886w i7-13620h/16gb/512gb/15.6\" fhd/win11', 3, 'storage/thumbnail/PeJRLFAxB4JgqRKuDTqraTcQ9JQ7Tnub78saLDmI.webp', '<h2>M&ocirc; tả sản phẩm</h2>\r\n\r\n<p><a href=\"https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook-15-x1502va-bq886w-i7-13620h\"><strong>Vivobook 15 X1502VA-BQ886W</strong></a><strong>&nbsp;l&agrave; mẫu laptop tầm trung nổi bật với cấu h&igrave;nh mạnh mẽ v&agrave; thiết kế hiện đại. Sản phẩm được trang bị chip Intel Core i7-13620H 10 nh&acirc;n 16 luồng, đi k&egrave;m 16GB RAM v&agrave; ổ cứng SSD 512GB, mang lại hiệu suất mượt m&agrave; cho cả c&ocirc;ng việc lẫn giải tr&iacute;. M&agrave;n h&igrave;nh 15.6 inch Full HD viền mỏng đạt chứng nhận T&Uuml;V Rheinland gi&uacute;p bảo vệ mắt, kết hợp với hệ thống tản nhiệt IceBlade v&agrave; b&agrave;n ph&iacute;m ErgoSense &ecirc;m &aacute;i, tạo n&ecirc;n trải nghiệm thoải m&aacute;i, ổn định mỗi ng&agrave;y.</strong></p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-8.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_8_e0fc61291e.jpg\" /></p>\r\n\r\n<h2><strong>Kiểu d&aacute;ng thanh lịch, bản lề 180 độ linh hoạt</strong></h2>\r\n\r\n<p>Ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n, Vivobook 15 X1502VA-BQ886W đ&atilde; tạo ấn tượng với vẻ ngo&agrave;i tối giản nhưng tinh tế. M&aacute;y sở hữu lớp vỏ m&agrave;u bạc trang nh&atilde;, ph&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; m&ocirc;i trường l&agrave;m việc kh&aacute;c nhau. C&aacute;c đường n&eacute;t h&igrave;nh học được thiết kế sắc sảo, h&agrave;i h&ograve;a với tổng thể thanh mảnh của m&aacute;y, gi&uacute;p thiết bị trở n&ecirc;n nổi bật m&agrave; kh&ocirc;ng qu&aacute; ph&ocirc; trương.</p>\r\n\r\n<p>Điểm cộng lớn trong thiết kế của Vivobook 15 ch&iacute;nh l&agrave; bản lề mở rộng 180 độ. Với cơ chế n&agrave;y, người d&ugrave;ng c&oacute; thể dễ d&agrave;ng chia sẻ nội dung tr&ecirc;n m&agrave;n h&igrave;nh với đồng nghiệp hoặc bạn b&egrave; m&agrave; kh&ocirc;ng cần xoay m&aacute;y. Đ&acirc;y l&agrave; chi tiết nhỏ nhưng rất thực tiễn, đặc biệt hữu &iacute;ch trong c&aacute;c buổi họp nh&oacute;m hay thuyết tr&igrave;nh.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-9.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_9_6febf01e39.jpg\" /></p>\r\n\r\n<h2><strong>Hiệu năng mạnh mẽ từ vi xử l&yacute; Intel thế hệ 13</strong></h2>\r\n\r\n<p>Asus trang bị cho Vivobook 15 bộ vi xử l&yacute; Intel Core i7-13620H, con chip thuộc d&ograve;ng H-Series cao cấp với 10 nh&acirc;n 16 luồng, cho khả năng xử l&yacute; mạnh mẽ v&agrave; đa nhiệm mượt m&agrave;. Với tốc độ tối đa l&ecirc;n đến 4.9GHz nhờ c&ocirc;ng nghệ Turbo Boost, chiếc laptop n&agrave;y đủ sức đ&aacute;p ứng mọi t&aacute;c vụ từ văn ph&ograve;ng, chỉnh sửa ảnh cho tới lập tr&igrave;nh hay l&agrave;m việc đa cửa sổ.</p>\r\n\r\n<p>Đi k&egrave;m với đ&oacute; l&agrave; 16GB RAM gi&uacute;p bạn thoải m&aacute;i mở nhiều ứng dụng, tab tr&igrave;nh duyệt m&agrave; kh&ocirc;ng lo giật lag. Bộ nhớ trong 512GB SSD NVMe mang lại tốc độ truy xuất dữ liệu nhanh ch&oacute;ng, r&uacute;t ngắn thời gian khởi động m&aacute;y v&agrave; mở ứng dụng đ&aacute;ng kể. Sự kết hợp giữa CPU thế hệ mới, RAM dung lượng lớn v&agrave; ổ SSD tốc độ cao gi&uacute;p Vivobook 15 X1502VA-BQ886W lu&ocirc;n vận h&agrave;nh ổn định, đ&aacute;p ứng tốt nhu cầu l&agrave;m việc đa nhiệm cũng như giải tr&iacute; nhẹ nh&agrave;ng.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-3.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_3_48bdef97f3.jpg\" /></p>\r\n\r\n<h2><strong>Kh&ocirc;ng gian hiển thị 15.6 inch sắc n&eacute;t, chống mỏi mắt</strong></h2>\r\n\r\n<p>Vivobook 15 X1502VA-BQ886W sở hữu m&agrave;n h&igrave;nh 15.6 inch Full HD (1.920 x 1.080 pixels) với tấm nền chống ch&oacute;i v&agrave; g&oacute;c nh&igrave;n rộng 178 độ, đem lại trải nghiệm h&igrave;nh ảnh r&otilde; n&eacute;t v&agrave; trung thực trong nhiều điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau. Viền m&agrave;n h&igrave;nh mỏng NanoEdge gi&uacute;p mở rộng kh&ocirc;ng gian hiển thị, đồng thời mang đến cảm gi&aacute;c hiện đại v&agrave; tinh tế.</p>\r\n\r\n<p>Điểm đ&aacute;ng ch&uacute; &yacute; l&agrave;&nbsp;<a href=\"https://fptshop.com.vn/man-hinh\">m&agrave;n h&igrave;nh</a>&nbsp;n&agrave;y đạt chứng nhận T&Uuml;V Rheinland, gi&uacute;p giảm thiểu &aacute;nh s&aacute;ng xanh g&acirc;y hại &ndash; nguy&ecirc;n nh&acirc;n ch&iacute;nh g&acirc;y mỏi mắt khi sử dụng m&aacute;y t&iacute;nh thời gian d&agrave;i. Người d&ugrave;ng c&oacute; thể y&ecirc;n t&acirc;m l&agrave;m việc, học tập hoặc xem phim li&ecirc;n tục m&agrave; kh&ocirc;ng cảm thấy kh&oacute; chịu.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-5.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_5_27408a04d9.jpg\" /></p>\r\n\r\n<h2><strong>Tản nhiệt tối ưu với quạt IceBlade kh&iacute; động học</strong></h2>\r\n\r\n<p>Asus đ&atilde; đưa l&ecirc;n phi&ecirc;n bản mới nhất của d&ograve;ng Vivobook hệ thống tản nhiệt IceBlade ti&ecirc;n tiến nhằm duy tr&igrave; hiệu năng ổn định trong thời gian d&agrave;i. M&aacute;y sử dụng quạt 87 c&aacute;nh IceBlade được l&agrave;m từ polymer tinh thể lỏng, gi&uacute;p c&aacute;nh quạt nhẹ v&agrave; mỏng chỉ 0.2mm, từ đ&oacute; gia tăng hiệu suất l&agrave;m m&aacute;t.</p>\r\n\r\n<p>Thiết kế kh&iacute; động học uốn cong 3D cho ph&eacute;p luồng gi&oacute; lưu th&ocirc;ng tốt hơn, giảm nhiệt độ nhanh ch&oacute;ng trong qu&aacute; tr&igrave;nh xử l&yacute; nặng như render video hay đa nhiệm nhiều ứng dụng nặng c&ugrave;ng l&uacute;c. Hệ thống n&agrave;y cũng vận h&agrave;nh &ecirc;m &aacute;i nhờ trục quạt sử dụng chất lỏng động lực học, gi&uacute;p giảm tiếng ồn đ&aacute;ng kể v&agrave; mang đến trải nghiệm l&agrave;m việc y&ecirc;n tĩnh, kh&ocirc;ng g&acirc;y mất tập trung.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-6.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_6_dac6614e3b.jpg\" /></p>\r\n\r\n<h2><strong>B&agrave;n ph&iacute;m ErgoSense v&agrave; touchpad thoải m&aacute;i</strong></h2>\r\n\r\n<p>Trải nghiệm g&otilde; ph&iacute;m tr&ecirc;n Vivobook 15 thực sự kh&aacute;c biệt nhờ b&agrave;n ph&iacute;m Asus ErgoSense được tối ưu về độ nảy v&agrave; khoảng c&aacute;ch ph&iacute;m. H&agrave;nh tr&igrave;nh 1.4mm vừa đủ để tạo cảm gi&aacute;c phản hồi tốt m&agrave; kh&ocirc;ng g&acirc;y mỏi tay, rất l&yacute; tưởng cho những người thường xuy&ecirc;n soạn thảo văn bản.</p>\r\n\r\n<p>Touchpad của m&aacute;y rộng r&atilde;i, nhạy b&eacute;n, gi&uacute;p di chuyển con trỏ ch&iacute;nh x&aacute;c v&agrave; dễ d&agrave;ng thao t&aacute;c c&aacute;c cử chỉ điều khiển. Ngo&agrave;i ra, Asus c&ograve;n t&iacute;ch hợp th&ecirc;m hệ thống ph&iacute;m số ở cạnh b&ecirc;n nhằm hỗ trợ người d&ugrave;ng tốt hơn trong qu&aacute; tr&igrave;nh l&agrave;m c&aacute;c c&ocirc;ng việc li&ecirc;n quan đến nhập liệu, bảng biểu.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-d.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_d_2a843aaa37.jpg\" /></p>\r\n\r\n<h2><strong>Bảo vệ sức khỏe người d&ugrave;ng với lớp phủ kh&aacute;ng khuẩn</strong></h2>\r\n\r\n<p>Một điểm cộng kh&aacute;c của Vivobook 15 l&agrave; lớp phủ Antibacterial Guard. Đ&acirc;y l&agrave; c&ocirc;ng nghệ bảo vệ độc quyền từ Asus gi&uacute;p ức chế sự ph&aacute;t triển của vi khuẩn l&ecirc;n đến 99% chỉ sau 24 giờ. Yếu tố n&agrave;y đặc biệt quan trọng trong thời đại người d&ugrave;ng ng&agrave;y c&agrave;ng quan t&acirc;m tới việc vệ sinh thiết bị c&aacute; nh&acirc;n. Nhờ lớp phủ n&agrave;y, c&aacute;c bề mặt thường xuy&ecirc;n tiếp x&uacute;c như&nbsp;<a href=\"https://fptshop.com.vn/phu-kien/ban-phim\">b&agrave;n ph&iacute;m</a>&nbsp;v&agrave; touchpad sẽ lu&ocirc;n sạch sẽ v&agrave; an to&agrave;n hơn khi sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-a.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_a_1b51db58e7.jpg\" /></p>\r\n\r\n<h2><strong>&Acirc;m thanh ấn tượng với DTS Audio Processing</strong></h2>\r\n\r\n<p>Tr&ecirc;n phi&ecirc;n bản Vivobook 15 X1502VA-BQ886W, Asus kh&ocirc;ng qu&ecirc;n chăm ch&uacute;t trải nghiệm nghe nh&igrave;n. M&aacute;y t&iacute;ch hợp c&ocirc;ng nghệ SonicMaster kết hợp DTS Audio Processing mang đến &acirc;m thanh r&otilde; r&agrave;ng, sống động, kh&ocirc;ng bị m&eacute;o tiếng d&ugrave; ở mức &acirc;m lượng lớn. &Acirc;m bass được t&aacute;i tạo s&acirc;u hơn gi&uacute;p trải nghiệm giải tr&iacute; th&ecirc;m phần đắm ch&igrave;m, d&ugrave; bạn đang xem phim, nghe nhạc hay họp trực tuyến.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, c&ocirc;ng nghệ AI Noise-Canceling cũng g&oacute;p phần lọc bỏ tiếng ồn nền trong c&aacute;c cuộc gọi video, gi&uacute;p &acirc;m thanh giọng n&oacute;i r&otilde; r&agrave;ng hơn, n&acirc;ng cao chất lượng giao tiếp từ xa.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-b.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_b_62f1907455.jpg\" /></p>\r\n\r\n<h2><strong>Kết nối đầy đủ, sẵn s&agrave;ng cho mọi nhu cầu</strong></h2>\r\n\r\n<p>Ở hai cạnh b&ecirc;n của laptop Vivobook 15 X1502VA-BQ886W được trang bị đầy đủ c&aacute;c cổng kết nối thiết yếu bao gồm 1 cổng USB 2.0 Type-A, 1 cổng USB 3.2 Gen 1 Type-C, 2 cổng USB 3.2 Gen 1 Type-A, 1 cổng HDMI 1.4, 1 jack &acirc;m thanh 3.5mm v&agrave; 1 cổng DC-in.</p>\r\n\r\n<p>Với hệ thống cổng n&agrave;y, người d&ugrave;ng c&oacute; thể dễ d&agrave;ng kết nối với nhiều thiết bị ngoại vi như&nbsp;<a href=\"https://fptshop.com.vn/may-chieu\">m&aacute;y chiếu</a>, m&agrave;n h&igrave;nh ngo&agrave;i, ổ cứng hay tai nghe m&agrave; kh&ocirc;ng cần mang theo hub chuyển đổi. Ngo&agrave;i ra, m&aacute;y c&ograve;n hỗ trợ Wi-Fi 6E v&agrave; Bluetooth 5.3 tốc độ cao cho những t&aacute;c vụ tương t&aacute;c kh&ocirc;ng d&acirc;y.</p>\r\n\r\n<p><img alt=\"vivobook-15-x1502-bq886w-c.jpg\" src=\"https://cdn2.fptshop.com.vn/unsafe/800x0/vivobook_15_x1502_bq886w_c_44fcee17c5.jpg\" /></p>', 27, 0, 0, NULL, '2025-07-30 04:20:22', '2025-08-06 10:43:55'),
(20, '111', 'Spmoi', 1, 'storage/thumbnail/s6J1pJOUpZkBAxolI22bNjO1bjr35IK4fvcgSK4R.png', '<p>đẹp</p>', 8, 0, 0, NULL, '2025-08-17 06:00:00', '2025-08-20 15:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IbF14q1XIAjjfKSo8hrVjkw32rzQIJiNsAfmwkhb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTEZvV0NRRThGY3FCQldoRDdSeGtMN1V5b3pjY2F1eDFLUVduV0U5USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2hvYWRvbnMiO319', 1755743416),
('UCeLfEYWxBibcqPkKhHGYGtzIKj4yPFZH5bD6Bwj', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGlTRmlLVHZ3N1FrWFZmdW42cU84UFlqdmE2ODN6WXFlZ1JUR3RMSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lci9kb25oYW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1755743461);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `ten_tag`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'LAPTOP DELL', 1, '2025-07-31 06:23:24', '2025-07-31 06:23:24', NULL),
(2, 'LAPTOP HP', 1, '2025-07-31 06:23:34', '2025-07-31 06:23:34', NULL),
(3, 'LAPTOP ASUS', 1, '2025-07-31 06:24:35', '2025-07-31 06:24:35', NULL),
(4, 'LAPTOP ACER', 1, '2025-07-31 06:25:46', '2025-07-31 06:25:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_san_phams`
--

CREATE TABLE `tag_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tra_lois`
--

CREATE TABLE `tra_lois` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `danh_gia_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tra_lois`
--

INSERT INTO `tra_lois` (`id`, `danh_gia_id`, `user_id`, `noi_dung`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'oke', '2025-07-30 11:01:03', '2025-07-30 11:01:03'),
(2, 2, 1, 'oke', '2025-07-30 11:01:24', '2025-07-30 11:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diem_tich_luy` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anh_dai_dien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vai_tro` enum('admin','staff','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `dia_chi` text COLLATE utf8mb4_unicode_ci,
  `ngay_sinh` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  `last_ping_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten`, `diem_tich_luy`, `email`, `email_verified_at`, `mat_khau`, `google_id`, `so_dien_thoai`, `anh_dai_dien`, `vai_tro`, `dia_chi`, `ngay_sinh`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `is_online`, `last_ping_at`) VALUES
(1, 'admin\r\n', 10, 'admin@gmail.com', NULL, '$2y$12$BMUGb8yIdmbyn0UWNE6.7eb277yayaOtCzW6ifS3cmZMc/anu7d.G', NULL, '0123456789', NULL, 'admin', 'Hà Nội', '2004-06-12', NULL, NULL, '2025-06-20 06:16:43', '2025-08-19 10:03:45', 1, '2025-08-19 10:03:45'),
(2, 'Quân1', 40, 'client@gmail.com', NULL, '$2y$12$Se1ymjq5YIppJ0g6safXHuqBjuCGkZM.cOaZb.VZe5n29No2BWJb6', NULL, '0398030877', NULL, 'user', NULL, '2025-06-17', NULL, NULL, '2025-06-23 02:03:11', '2025-08-20 06:28:45', 0, '2025-08-01 04:40:36'),
(3, 'quan', 0, 'admin1@gmail.com', NULL, '$2y$12$ieVcEuQad1M7VKeW7e2iRuidm3TO5nvnCi4z918ZYynBG6CvrRTOK', NULL, '0398030877', 'avatars/zM0VzFkbxqR127kVNvNd1Sm2ohULref0Rm5UTi6u.jpg', 'admin', 'Thị trấn Đông Anh, Huyện Đông Anh, Thành phố Hà Nội', '2025-07-22', NULL, NULL, '2025-07-17 15:52:46', '2025-07-17 15:52:46', 0, NULL),
(4, 'quan', 0, 'admindz@gmail.com', NULL, '$2y$12$FiKmr.dUWw7Zvd3/21lJk.3WVqjjnV/cVbCjzVmgrA4myYlA89zfi', NULL, '0398030877', NULL, 'admin', 'Thị trấn Đông Anh, Huyện Đông Anh, Thành phố Hà Nội', '2025-07-22', NULL, NULL, '2025-07-17 15:55:22', '2025-07-17 15:55:22', 0, NULL),
(5, 'quan12', 0, 'quan@gmail.com', NULL, '$2y$12$xTEfBMmzT.8IXwEE72CHo.klqwpRBuvU9UGaLSD/gArXre684i196', NULL, '0398030991', NULL, 'user', NULL, '2025-08-07', NULL, NULL, '2025-08-06 15:56:57', '2025-08-06 16:00:09', 0, NULL),
(6, 'Dương Minh Quân PH 5 0 1 5 9', 0, 'quandmph50159@gmail.com', '2025-08-15 13:15:25', '$2y$12$j5q7tbE46vMpbNKyfZy9W.Bco0Fte9dDGLZlLgO3O5XWr7DroasdK', '112430481133084405124', '0398030877', 'https://lh3.googleusercontent.com/a/ACg8ocIqaqICpAT2Jmma5Q2yMai5cSQW9X9-22aKLEipEPCf0UaNqTk=s96-c', 'user', NULL, '2025-08-13', NULL, NULL, '2025-08-07 07:06:53', '2025-08-15 13:15:25', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yeu_thichs`
--

CREATE TABLE `yeu_thichs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_phan_hois`
--
ALTER TABLE `admin_phan_hois`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_phan_hois_lien_hes_id_foreign` (`lien_hes_id`);

--
-- Indexes for table `bai_viets`
--
ALTER TABLE `bai_viets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bai_viets_user_id_foreign` (`user_id`),
  ADD KEY `bai_viets_danh_muc_id_foreign` (`danh_muc_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bien_the_san_phams_san_pham_id_foreign` (`san_pham_id`),
  ADD KEY `bien_the_san_phams_dung_luong_id_foreign` (`dung_luong_id`),
  ADD KEY `bien_the_san_phams_mau_sac_id_foreign` (`mau_sac_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_rooms_customer_id_foreign` (`customer_id`),
  ADD KEY `chat_rooms_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_hoa_dons_bien_the_san_pham_id_foreign` (`bien_the_san_pham_id`),
  ADD KEY `chi_tiet_hoa_dons_hoa_don_id_foreign` (`hoa_don_id`);

--
-- Indexes for table `danh_gia_san_phams`
--
ALTER TABLE `danh_gia_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_gia_san_phams_user_id_foreign` (`user_id`),
  ADD KEY `danh_gia_san_phams_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diem_danhs`
--
ALTER TABLE `diem_danhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diem_danhs_user_id_ngay_unique` (`user_id`,`ngay`);

--
-- Indexes for table `doi_quas`
--
ALTER TABLE `doi_quas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doi_quas_user_id_foreign` (`user_id`),
  ADD KEY `doi_quas_khuyen_mai_id_foreign` (`khuyen_mai_id`);

--
-- Indexes for table `dung_luongs`
--
ALTER TABLE `dung_luongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinh_anh_san_phams_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hoa_dons_ma_hoa_don_unique` (`ma_hoa_don`),
  ADD KEY `hoa_dons_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khuyen_mais_user_id_foreign` (`user_id`);

--
-- Indexes for table `lich_su_diems`
--
ALTER TABLE `lich_su_diems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lich_su_diem_user_id_foreign` (`user_id`),
  ADD KEY `lich_su_diems_khuyen_mai_id_foreign` (`khuyen_mai_id`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lien_hes_user_id_foreign` (`user_id`);

--
-- Indexes for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_chat_room_id_foreign` (`chat_room_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_phams_danh_muc_id_foreign` (`danh_muc_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_san_phams`
--
ALTER TABLE `tag_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_san_phams_tag_id_foreign` (`tag_id`),
  ADD KEY `tag_san_phams_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `tra_lois`
--
ALTER TABLE `tra_lois`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tra_lois_danh_gia_id_foreign` (`danh_gia_id`),
  ADD KEY `tra_lois_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yeu_thichs`
--
ALTER TABLE `yeu_thichs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yeu_thichs_user_id_foreign` (`user_id`),
  ADD KEY `yeu_thichs_san_pham_id_foreign` (`san_pham_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_phan_hois`
--
ALTER TABLE `admin_phan_hois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bai_viets`
--
ALTER TABLE `bai_viets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `danh_gia_san_phams`
--
ALTER TABLE `danh_gia_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diem_danhs`
--
ALTER TABLE `diem_danhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doi_quas`
--
ALTER TABLE `doi_quas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dung_luongs`
--
ALTER TABLE `dung_luongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `lich_su_diems`
--
ALTER TABLE `lich_su_diems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag_san_phams`
--
ALTER TABLE `tag_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tra_lois`
--
ALTER TABLE `tra_lois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `yeu_thichs`
--
ALTER TABLE `yeu_thichs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_phan_hois`
--
ALTER TABLE `admin_phan_hois`
  ADD CONSTRAINT `admin_phan_hois_lien_hes_id_foreign` FOREIGN KEY (`lien_hes_id`) REFERENCES `lien_hes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bai_viets`
--
ALTER TABLE `bai_viets`
  ADD CONSTRAINT `bai_viets_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bai_viets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  ADD CONSTRAINT `bien_the_san_phams_dung_luong_id_foreign` FOREIGN KEY (`dung_luong_id`) REFERENCES `dung_luongs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bien_the_san_phams_mau_sac_id_foreign` FOREIGN KEY (`mau_sac_id`) REFERENCES `mau_sacs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bien_the_san_phams_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD CONSTRAINT `chat_rooms_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_rooms_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  ADD CONSTRAINT `chi_tiet_hoa_dons_bien_the_san_pham_id_foreign` FOREIGN KEY (`bien_the_san_pham_id`) REFERENCES `bien_the_san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_hoa_dons_hoa_don_id_foreign` FOREIGN KEY (`hoa_don_id`) REFERENCES `hoa_dons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `danh_gia_san_phams`
--
ALTER TABLE `danh_gia_san_phams`
  ADD CONSTRAINT `danh_gia_san_phams_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_gia_san_phams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diem_danhs`
--
ALTER TABLE `diem_danhs`
  ADD CONSTRAINT `diem_danhs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doi_quas`
--
ALTER TABLE `doi_quas`
  ADD CONSTRAINT `doi_quas_khuyen_mai_id_foreign` FOREIGN KEY (`khuyen_mai_id`) REFERENCES `khuyen_mais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doi_quas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `hinh_anh_san_phams_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD CONSTRAINT `hoa_dons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD CONSTRAINT `khuyen_mais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lich_su_diems`
--
ALTER TABLE `lich_su_diems`
  ADD CONSTRAINT `lich_su_diem_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lich_su_diems_khuyen_mai_id_foreign` FOREIGN KEY (`khuyen_mai_id`) REFERENCES `khuyen_mais` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD CONSTRAINT `lien_hes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_chat_room_id_foreign` FOREIGN KEY (`chat_room_id`) REFERENCES `chat_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_san_phams`
--
ALTER TABLE `tag_san_phams`
  ADD CONSTRAINT `tag_san_phams_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_san_phams_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tra_lois`
--
ALTER TABLE `tra_lois`
  ADD CONSTRAINT `tra_lois_danh_gia_id_foreign` FOREIGN KEY (`danh_gia_id`) REFERENCES `danh_gia_san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tra_lois_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `yeu_thichs`
--
ALTER TABLE `yeu_thichs`
  ADD CONSTRAINT `yeu_thichs_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yeu_thichs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
