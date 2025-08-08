-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2025 at 01:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wd77(1)`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_phan_hois`
--

CREATE TABLE `admin_phan_hois` (
  `id` bigint UNSIGNED NOT NULL,
  `lien_hes_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_phan_hois`
--

INSERT INTO `admin_phan_hois` (`id`, `lien_hes_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Chào Bạn', '2025-08-01 08:43:52', '2025-08-01 08:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `bai_viets`
--

CREATE TABLE `bai_viets` (
  `id` bigint UNSIGNED NOT NULL,
  `tieu_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_bai_viet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `danh_muc_id` bigint UNSIGNED NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anh_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_lien_ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `vi_tri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `ten_banner`, `anh_banner`, `url_lien_ket`, `ngay_bat_dau`, `ngay_ket_thuc`, `vi_tri`, `trang_thai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Test', 'banners/1753426085-Ahri.png', 'http://127.0.0.1:8000/admin/sanphams/14/show', NULL, NULL, 'header', 1, '2025-07-24 23:48:05', '2025-07-24 23:48:05', NULL),
(5, 'Test 2', 'banners/1753426244-Yasuo Nightbringer.jpg', 'http://127.0.0.1:8000/admin/sanphams/14/show', NULL, NULL, 'header', 1, '2025-07-24 23:50:44', '2025-07-24 23:50:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bien_the_san_phams`
--

CREATE TABLE `bien_the_san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `so_luong` int UNSIGNED NOT NULL,
  `gia_cu` int UNSIGNED NOT NULL,
  `gia_moi` int UNSIGNED DEFAULT NULL,
  `dung_luong_id` bigint UNSIGNED NOT NULL,
  `mau_sac_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bien_the_san_phams`
--

INSERT INTO `bien_the_san_phams` (`id`, `san_pham_id`, `so_luong`, `gia_cu`, `gia_moi`, `dung_luong_id`, `mau_sac_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 12000, 3000, 1, 1, NULL, '2025-06-23 02:14:58', '2025-07-03 10:39:18'),
(2, 1, 13, 12000000, 11000000, 1, 1, NULL, '2025-06-23 02:17:34', '2025-07-24 09:31:56'),
(3, 3, 10, 12000000, 2000000, 1, 1, NULL, '2025-06-23 02:19:18', '2025-07-18 01:07:17'),
(5, 6, 9, 8000000, 9000000, 1, 1, NULL, '2025-06-23 03:13:22', '2025-07-18 00:59:30'),
(6, 7, 13, 1000000, 11000000, 1, 1, NULL, '2025-06-27 07:16:28', '2025-07-18 01:00:11'),
(7, 8, 15, 1000000, 2000000, 1, 1, NULL, '2025-07-02 12:53:30', '2025-07-18 01:00:41'),
(8, 9, 23, 30000000, NULL, 1, 1, NULL, '2025-07-04 11:30:13', '2025-07-04 11:30:13'),
(9, 10, 22, 20000000, 15000000, 1, 1, NULL, '2025-07-04 11:30:50', '2025-07-18 01:46:09'),
(10, 11, 22, 20000000, 25000000, 1, 1, NULL, '2025-07-04 13:01:41', '2025-07-18 01:47:44'),
(11, 12, 23, 20000000, 200000, 1, 1, NULL, '2025-07-09 07:05:58', '2025-07-09 07:05:58'),
(12, 13, 17, 12000000, 13000000, 1, 1, NULL, '2025-07-10 10:24:41', '2025-07-17 18:29:20'),
(13, 14, 0, 2000000, 3000000, 1, 1, NULL, '2025-07-18 01:13:59', '2025-07-18 01:23:45'),
(14, 14, 15, 3000000, 4000000, 3, 2, NULL, '2025-07-18 01:13:59', '2025-07-18 01:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `staff_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `customer_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2025-08-01 08:35:13', '2025-08-01 08:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_dons`
--

CREATE TABLE `chi_tiet_hoa_dons` (
  `id` bigint UNSIGNED NOT NULL,
  `bien_the_san_pham_id` bigint UNSIGNED NOT NULL,
  `hoa_don_id` bigint UNSIGNED NOT NULL,
  `so_luong` int UNSIGNED NOT NULL,
  `don_gia` bigint UNSIGNED NOT NULL,
  `thanh_tien` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_hoa_dons`
--

INSERT INTO `chi_tiet_hoa_dons` (`id`, `bien_the_san_pham_id`, `hoa_don_id`, `so_luong`, `don_gia`, `thanh_tien`, `created_at`, `updated_at`) VALUES
(78, 12, 98, 2, 13000000, 26000000, '2025-07-17 16:53:12', '2025-07-17 16:53:12'),
(79, 12, 99, 1, 13000000, 13000000, '2025-07-17 16:55:55', '2025-07-17 16:55:55'),
(80, 12, 100, 1, 13000000, 13000000, '2025-07-17 17:09:13', '2025-07-17 17:09:13'),
(81, 12, 101, 1, 13000000, 13000000, '2025-07-17 17:29:29', '2025-07-17 17:29:29'),
(82, 12, 102, 1, 13000000, 13000000, '2025-07-17 17:31:46', '2025-07-17 17:31:46'),
(83, 12, 103, 1, 13000000, 13000000, '2025-07-17 18:26:29', '2025-07-17 18:26:29'),
(84, 3, 104, 1, 2000000, 2000000, '2025-07-18 01:07:17', '2025-07-18 01:07:17'),
(85, 13, 105, 30, 3000000, 90000000, '2025-07-18 01:23:45', '2025-07-18 01:23:45'),
(86, 14, 105, 5, 4000000, 20000000, '2025-07-18 01:23:45', '2025-07-18 01:23:45'),
(87, 9, 106, 1, 15000000, 15000000, '2025-07-18 01:46:09', '2025-07-18 01:46:09'),
(88, 10, 107, 1, 25000000, 25000000, '2025-07-18 01:47:44', '2025-07-18 01:47:44'),
(89, 2, 108, 2, 11000000, 22000000, '2025-07-24 09:31:56', '2025-07-24 09:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia_san_phams`
--

CREATE TABLE `danh_gia_san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `diem_so` int UNSIGNED NOT NULL,
  `nhan_xet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gia_san_phams`
--

INSERT INTO `danh_gia_san_phams` (`id`, `user_id`, `san_pham_id`, `diem_so`, `nhan_xet`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 5, 'Đẹp, chất lượng', '2025-07-04 11:08:07', NULL),
(2, 2, 14, 4, 'chất lượng tốt', '2025-07-18 01:44:50', '2025-07-18 01:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_danh_muc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, 'Máy tính hp', 'storage/danhmucs/1751626549_666ad33c90b7c3001de29d45.jpg', NULL, '2025-07-04 10:55:49', '2025-07-04 10:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `diem_danhs`
--

CREATE TABLE `diem_danhs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `diem` int NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diem_danhs`
--

INSERT INTO `diem_danhs` (`id`, `user_id`, `ngay`, `diem`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-07-31', 10, '2025-07-31 14:57:02', '2025-07-31 14:57:02'),
(2, 5, '2025-07-31', 10, '2025-07-31 15:08:14', '2025-07-31 15:08:14'),
(3, 5, '2025-08-01', 10, '2025-08-01 08:44:33', '2025-08-01 08:44:33'),
(4, 2, '2025-08-03', 10, '2025-08-03 11:53:51', '2025-08-03 11:53:51'),
(5, 2, '2025-08-04', 10, '2025-08-04 14:14:40', '2025-08-04 14:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `doi_quas`
--

CREATE TABLE `doi_quas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `khuyen_mai_id` bigint UNSIGNED NOT NULL,
  `diem_su_dung` int NOT NULL,
  `ngay_doi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'thanh_cong',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dung_luongs`
--

CREATE TABLE `dung_luongs` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_dung_luong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `hinh_anh`, `created_at`, `updated_at`) VALUES
(1, 1, 'storage/albums/sYQwu0DK7LIuyj2TasOzSrR7563UwB4UNL3b0JhD.jpg', '2025-06-23 02:14:04', '2025-06-23 02:14:04'),
(2, 1, 'storage/albums/LmcnxVMjZw5Hqa0SbIz8g4nkx3m4oHXvg8WIt69u.jpg', '2025-06-23 02:14:04', '2025-06-23 02:14:04'),
(3, 2, 'storage/albums/VjNJdTcHyp5m98uFYtsdWFu4aDHBNHzkC3IOQ4TV.jpg', '2025-06-23 02:14:58', '2025-06-23 02:14:58'),
(4, 2, 'storage/albums/wbgW1avu30SDDt6tz3bOyiaWLCmlN1rJQqJyC8gA.jpg', '2025-06-23 02:14:58', '2025-06-23 02:14:58'),
(5, 2, 'storage/albums/c5HUwyBKJvRh60nKg2dDsJuDqcCvJJNEQPWJVeTX.jpg', '2025-06-23 02:14:58', '2025-06-23 02:14:58'),
(6, 3, 'storage/albums/4As7iOY29BT8Jwz20LevC24ynFmdPC8FsEmBCgwW.jpg', '2025-06-23 02:19:18', '2025-06-23 02:19:18'),
(7, 3, 'storage/albums/oD5ygw3dxoA4fYQbTMVuRqDNvCFgKfGtTgrNPfRr.jpg', '2025-06-23 02:19:18', '2025-06-23 02:19:18'),
(8, 3, 'storage/albums/r6Xw7F0RiSElzcRZF0Xbu9HQ7R90kWfyq7vbO0Ed.jpg', '2025-06-23 02:19:18', '2025-06-23 02:19:18'),
(17, 6, 'storage/albums/zJa0gJlZQA9ucm4v7eRFZDrT9Nua5ndSKV2kN1ms.jpg', '2025-06-23 03:13:22', '2025-06-23 03:13:22'),
(18, 6, 'storage/albums/5uAoDwrb5RzVpzIZK2PcIlWcG8hmggl4SgShnOHh.jpg', '2025-06-23 03:13:22', '2025-06-23 03:13:22'),
(19, 6, 'storage/albums/KW2BnicLWPJc7jyFhzaBDCijOGSMlXWvBLuSMEDT.jpg', '2025-06-23 03:13:22', '2025-06-23 03:13:22'),
(20, 7, 'storage/albums/Rv4Cp2MQekItefEJR3oFETYzCA1tswMGSWNF8Mm3.jpg', '2025-06-27 07:16:28', '2025-06-27 07:16:28'),
(21, 7, 'storage/albums/012cBWg3tqTQVlzqDNZuIJdNZsv8W8GkpENqymYh.jpg', '2025-06-27 07:16:28', '2025-06-27 07:16:28'),
(22, 7, 'storage/albums/QZIj3QbBprJohPv1J6uXvBR2B5ywIgcXhgMRuGJz.jpg', '2025-06-27 07:16:28', '2025-06-27 07:16:28'),
(23, 8, 'storage/albums/jhmtkx9nTDu4SITlN6Wwxcbo5NangRszXXSVAHRm.jpg', '2025-07-02 12:53:30', '2025-07-02 12:53:30'),
(24, 8, 'storage/albums/GiWnfcXb9bJgjgGwbRB5YLb0xR0XyWUgKzsI4dd8.jpg', '2025-07-02 12:53:30', '2025-07-02 12:53:30'),
(25, 9, 'storage/albums/66DGSchIGaZR1FcCAllX64LeEEwgTKv0QJWPiRIz.jpg', '2025-07-04 11:30:13', '2025-07-04 11:30:13'),
(26, 9, 'storage/albums/xEp9rK92ydFhEkJNkQO25YQUDyHzp8FdS4Pw6uLV.jpg', '2025-07-04 11:30:13', '2025-07-04 11:30:13'),
(27, 9, 'storage/albums/KOq3YQ9k4vUtqto6TGL10nilqyoBpMliN1gqxCNB.jpg', '2025-07-04 11:30:13', '2025-07-04 11:30:13'),
(28, 10, 'storage/albums/n7VwdFFVTArDvQ1Df9OEfdLebEunN4NyPm6T3blO.jpg', '2025-07-04 11:30:50', '2025-07-04 11:30:50'),
(29, 10, 'storage/albums/PnW6TapX98WxmLU4xF8yvg3l57BQFuG3USnvERtk.jpg', '2025-07-04 11:30:50', '2025-07-04 11:30:50'),
(30, 11, 'storage/albums/ZyCPpzPMY5118cPi7dOgn9bRhoY6zQL4NN9S18MW.jpg', '2025-07-04 13:01:41', '2025-07-04 13:01:41'),
(31, 11, 'storage/albums/JYQrOrbK5WI59BsXiPpuhBo3aGE7W6A1vosS6mqG.jpg', '2025-07-04 13:01:41', '2025-07-04 13:01:41'),
(32, 12, 'storage/albums/UB9XaGTUh2NlUyAuRQotRPjixQOE1FsU38oAQz3N.jpg', '2025-07-09 07:05:58', '2025-07-09 07:05:58'),
(33, 13, 'storage/albums/mAk9cDT6m0nEBgaxT8PWohMmF5mUC1saqeLVjxWe.jpg', '2025-07-10 10:24:41', '2025-07-10 10:24:41'),
(34, 14, 'storage/albums/2KmZuE1yxdVHDWTm2N4hoi5u7dINEPyrX52Hqpa7.jpg', '2025-07-18 01:13:59', '2025-07-18 01:13:59'),
(35, 14, 'storage/albums/PbUZRiYnM8t7JoHz2kvmcijt3NB8YmAJiWmSXJdH.jpg', '2025-07-18 01:13:59', '2025-07-18 01:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_dons`
--

CREATE TABLE `hoa_dons` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `giam_gia` bigint UNSIGNED NOT NULL DEFAULT '0',
  `ma_khuyen_mai` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tong_tien` bigint UNSIGNED NOT NULL,
  `dia_chi_nhan_hang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `thoi_gian_giao_dich` timestamp NULL DEFAULT NULL,
  `thoi_gian_het_han` timestamp NULL DEFAULT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phuong_thuc_thanh_toan` enum('Thanh toán khi nhận hàng','Thanh toán qua chuyển khoản ngân hàng') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thanh toán khi nhận hàng',
  `trang_thai` int NOT NULL DEFAULT '1',
  `trang_thai_thanh_toan` enum('Đã thanh toán','Thanh toán thất bại','Chưa thanh toán') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa thanh toán',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ma_hoa_don` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoa_dons`
--

INSERT INTO `hoa_dons` (`id`, `user_id`, `giam_gia`, `ma_khuyen_mai`, `tong_tien`, `dia_chi_nhan_hang`, `email`, `so_dien_thoai`, `ten_nguoi_nhan`, `ngay_dat_hang`, `thoi_gian_giao_dich`, `thoi_gian_het_han`, `ghi_chu`, `phuong_thuc_thanh_toan`, `trang_thai`, `trang_thai_thanh_toan`, `created_at`, `updated_at`, `ma_hoa_don`, `deleted_at`) VALUES
(98, 2, 50000, 'YGQWF6AJ', 26000000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-17', '2025-07-17 16:53:35', '2025-07-18 16:53:12', NULL, 'Thanh toán qua chuyển khoản ngân hàng', 6, 'Đã thanh toán', '2025-07-17 16:53:12', '2025-07-17 18:29:17', '250717387240', NULL),
(99, 2, 0, NULL, 13050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-17', '2025-07-17 16:55:55', '2025-07-18 16:55:55', NULL, 'Thanh toán khi nhận hàng', 6, 'Đã thanh toán', '2025-07-17 16:55:55', '2025-07-17 18:29:13', '250717855133', NULL),
(100, 2, 0, NULL, 13050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-18', '2025-07-17 17:09:13', '2025-07-18 17:09:13', NULL, 'Thanh toán khi nhận hàng', 6, 'Đã thanh toán', '2025-07-17 17:09:13', '2025-07-17 18:29:10', '25071893193', NULL),
(101, 2, 0, NULL, 13050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-18', '2025-07-17 17:29:56', '2025-07-18 17:29:29', NULL, 'Thanh toán qua chuyển khoản ngân hàng', 6, 'Đã thanh toán', '2025-07-17 17:29:29', '2025-07-17 18:29:07', '250718619567', NULL),
(102, 2, 0, NULL, 13050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-18', '2025-07-17 17:32:09', '2025-07-18 17:31:46', NULL, 'Thanh toán qua chuyển khoản ngân hàng', 6, 'Đã thanh toán', '2025-07-17 17:31:46', '2025-07-17 18:29:03', '250718566674', NULL),
(103, 2, 0, NULL, 13050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-18', '2025-07-17 18:26:52', '2025-07-18 18:26:29', NULL, 'Thanh toán qua chuyển khoản ngân hàng', 6, 'Đã thanh toán', '2025-07-17 18:26:29', '2025-07-17 18:28:28', '250718358453', NULL),
(104, 1, 0, NULL, 2050000, 'Hà Nội', 'admin@gmail.com', '0123456789', 'admin', '2025-07-18', '2025-07-18 01:07:56', '2025-07-19 01:07:17', NULL, 'Thanh toán qua chuyển khoản ngân hàng', 1, 'Đã thanh toán', '2025-07-18 01:07:17', '2025-07-18 01:07:56', '250718372327', NULL),
(105, 2, 0, NULL, 110050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-18', '2025-07-18 01:24:19', '2025-07-19 01:23:45', NULL, 'Thanh toán qua chuyển khoản ngân hàng', 7, 'Đã thanh toán', '2025-07-18 01:23:45', '2025-07-18 01:39:04', '250718153204', NULL),
(106, 2, 0, NULL, 15050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-18', '2025-07-18 01:46:09', '2025-07-19 01:46:09', NULL, 'Thanh toán khi nhận hàng', 1, 'Đã thanh toán', '2025-07-18 01:46:09', '2025-07-18 01:46:09', '250718333670', NULL),
(107, 2, 0, NULL, 25050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-18', '2025-07-18 01:47:44', '2025-07-19 01:47:44', NULL, 'Thanh toán khi nhận hàng', 1, 'Đã thanh toán', '2025-07-18 01:47:44', '2025-07-18 01:47:44', '250718171092', NULL),
(108, 2, 0, NULL, 22050000, 'phương canh', 'client@gmail.com', '0398030877', 'Quân1', '2025-07-24', NULL, '2025-07-25 09:31:56', NULL, 'Thanh toán khi nhận hàng', 1, 'Chưa thanh toán', '2025-07-24 09:31:56', '2025-07-24 09:31:56', '250724161981', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_khuyen_mai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phan_tram_khuyen_mai` int UNSIGNED NOT NULL,
  `giam_toi_da` decimal(8,2) DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `da_su_dung` int NOT NULL DEFAULT '0',
  `loai_ma` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cong_khai',
  `diem_can` int NOT NULL DEFAULT '0',
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
(93, 'Test', 10, '50000.00', NULL, 10, 0, 'cong_khai', 0, '2025-08-04 20:59:00', '2025-08-29 20:59:00', 1, '2025-08-04 13:59:54', '2025-08-04 13:59:54', NULL),
(94, 'Ma Doi', 10, '100000.00', NULL, 8, 0, 'ma_doi_qua', 200, '2025-08-04 21:06:00', '2025-08-31 21:06:00', 1, '2025-08-04 14:06:51', '2025-08-07 12:45:22', NULL),
(95, 'Ma Doi', 10, '100000.00', 2, NULL, 0, 'ca_nhan', 200, '2025-08-04 21:06:00', '2025-08-31 21:06:00', 1, '2025-08-04 14:07:02', '2025-08-04 14:07:02', NULL),
(96, 'TzASQ6Se0y', 10, '100000.00', 5, NULL, 0, 'ca_nhan', 200, '2025-08-04 21:06:00', '2025-08-31 21:06:00', 1, '2025-08-07 12:45:22', '2025-08-07 12:45:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lich_su_diems`
--

CREATE TABLE `lich_su_diems` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `thay_doi` int NOT NULL,
  `loai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten_nguoi_gui` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_nhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `trang_thai_phan_hoi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `created_at`, `updated_at`, `ten_nguoi_gui`, `tin_nhan`, `user_id`, `trang_thai_phan_hoi`, `deleted_at`) VALUES
(1, '2025-06-26 02:06:44', '2025-06-26 02:06:44', 'quan', 'uuhuhu', 2, 'pending', NULL),
(2, '2025-06-26 02:06:45', '2025-06-26 02:06:45', 'quan', 'uuhuhu', 2, 'pending', NULL),
(3, '2025-06-26 09:14:27', '2025-06-26 09:14:27', 'quan', 'uhuhh', 1, 'pending', NULL),
(4, '2025-06-26 09:14:28', '2025-06-26 09:14:28', 'quan', 'uhuhh', 1, 'pending', NULL),
(5, '2025-08-01 08:43:30', '2025-08-01 08:44:00', 'NDT', '123123', 5, 'resolved', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_mau_sac` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_mau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `chat_room_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('file','text') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_room_id`, `sender_id`, `message`, `is_read`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 5, 'Xin Chào', 1, '2025-08-01 08:35:13', '2025-08-01 08:35:21', 'text'),
(2, 1, 5, 'Xin Chào', 1, '2025-08-01 08:35:15', '2025-08-01 08:35:21', 'text'),
(3, 1, 5, 'Xin Chào', 1, '2025-08-01 08:35:16', '2025-08-01 08:35:21', 'text'),
(4, 1, 5, 'Xin Chào', 1, '2025-08-01 08:35:17', '2025-08-01 08:35:21', 'text'),
(5, 1, 5, 'Xin Chào', 1, '2025-08-01 08:35:18', '2025-08-01 08:35:21', 'text'),
(6, 1, 5, 'Xin Chào', 1, '2025-08-01 08:35:19', '2025-08-01 08:35:21', 'text'),
(7, 1, 5, 'Xin Chào', 1, '2025-08-01 08:35:20', '2025-08-01 08:35:21', 'text'),
(8, 1, 5, '1', 1, '2025-08-01 08:35:33', '2025-08-01 08:35:40', 'text'),
(9, 1, 5, '1', 1, '2025-08-01 08:35:34', '2025-08-01 08:35:40', 'text'),
(10, 1, 5, '1', 1, '2025-08-01 08:35:36', '2025-08-01 08:35:40', 'text'),
(11, 1, 5, '1', 1, '2025-08-01 08:35:37', '2025-08-01 08:35:40', 'text'),
(12, 1, 5, '1', 1, '2025-08-01 08:35:38', '2025-08-01 08:35:40', 'text'),
(13, 1, 5, '1', 1, '2025-08-01 08:35:39', '2025-08-01 08:35:40', 'text'),
(14, 1, 5, '1', 1, '2025-08-01 08:35:41', '2025-08-01 08:35:42', 'text'),
(15, 1, 5, '1', 1, '2025-08-01 08:35:43', '2025-08-01 08:35:44', 'text'),
(16, 1, 1, '1', 0, '2025-08-01 08:39:13', '2025-08-01 08:39:13', 'text'),
(17, 1, 1, '1', 0, '2025-08-01 08:39:16', '2025-08-01 08:39:16', 'text'),
(18, 1, 5, '123', 1, '2025-08-01 08:40:07', '2025-08-01 08:40:14', 'text'),
(19, 1, 5, '123', 1, '2025-08-01 08:40:08', '2025-08-01 08:40:14', 'text'),
(20, 1, 5, '123', 1, '2025-08-01 08:40:09', '2025-08-01 08:40:14', 'text'),
(21, 1, 5, '123', 1, '2025-08-01 08:40:10', '2025-08-01 08:40:14', 'text'),
(22, 1, 5, '123', 1, '2025-08-01 08:40:11', '2025-08-01 08:40:14', 'text'),
(23, 1, 5, '123', 1, '2025-08-01 08:40:13', '2025-08-01 08:40:14', 'text'),
(24, 1, 5, '123', 1, '2025-08-01 08:42:20', '2025-08-01 08:42:21', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(54, '2025_07_29_110117_add_is_online_to_users_table', 7),
(55, '2025_07_29_200343_add_type_to_messages_table', 7),
(56, '2025_07_29_203622_add_last_ping_at_to_users_table', 7),
(57, '2025_07_29_215257_add_is_read_to_messages_table', 7),
(58, '2025_07_31_214638_create_diem_danhs_table', 8),
(59, '2025_07_31_214654_add_diem_tich_luy_to_users_table', 8),
(60, '2025_08_03_184147_create_doi_quas_table', 9),
(61, '2025_08_03_184248_add_diem_so_luong_to_khuyen_mais_table', 9),
(62, '2025_08_03_184438_create_lich_su_doi_quas_table', 9),
(63, '2025_08_07_204327_rename_lich_su_diem_table_to_lich_su_diems', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
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
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_id` bigint UNSIGNED NOT NULL,
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
(67, 'hoa_don', 108, 0, '2025-07-24 09:31:56', '2025-07-24 09:31:56'),
(68, 'user', 5, 0, '2025-07-31 15:07:58', '2025-07-31 15:07:58'),
(69, 'lien_he', 5, 0, '2025-08-01 08:43:30', '2025-08-01 08:43:30'),
(70, 'user', 7, 0, '2025-08-03 12:07:35', '2025-08-03 12:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `danh_muc_id` bigint UNSIGNED NOT NULL,
  `anh_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `luot_xem` bigint UNSIGNED NOT NULL,
  `da_ban` bigint UNSIGNED NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `danh_muc_id`, `anh_san_pham`, `mo_ta`, `luot_xem`, `da_ban`, `is_hot`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SP002', 'Laptop dell 2025', 1, 'storage/thumbnail/E7Mb8hXXLqWilSROhpjXW5pGGlDSnF8LBOC8vi6i.jpg', '<p>ASUS ExpertBook B1 B1402CV i7 1355U, 24GB RAM, 512GB SSD l&agrave; một trong những sản phẩm nổi bật thuộc ph&acirc;n kh&uacute;c doanh nghiệp tầm trung, kết hợp giữa thiết kế bền bỉ v&agrave; hiệu năng ổn định. Với bộ vi xử l&yacute; Intel Core i7-1355U thế hệ 13, RAM 24GB RAM v&agrave; ổ cứng SSD 512GB, thiết bị n&agrave;y hướng đến đối tượng người d&ugrave;ng chuy&ecirc;n nghiệp cần sự di động v&agrave; độ tin cậy cao. Tuy nhi&ecirc;n, m&agrave;n h&igrave;nh sử dụng tấm nền TN c&ugrave;ng một số hạn chế về khả năng n&acirc;ng cấp đặt ra c&acirc;u hỏi về t&iacute;nh c&acirc;n bằng giữa gi&aacute; th&agrave;nh v&agrave; trải nghiệm. B&agrave;i viết n&agrave;y ph&acirc;n t&iacute;ch s&acirc;u từng kh&iacute;a cạnh của sản phẩm, cung cấp c&aacute;i nh&igrave;n to&agrave;n diện cho người d&ugrave;ng tiềm năng.</p>\r\n\r\n<h2>1. Thiết kế v&agrave; độ bền</h2>\r\n\r\n<p>ASUS ExpertBook B1 B1402CVA-NK0157W sở hữu vẻ ngo&agrave;i tối giản với t&ocirc;ng m&agrave;u Star Black chủ đạo, ph&ugrave; hợp với m&ocirc;i trường c&ocirc;ng sở. Vỏ m&aacute;y l&agrave;m từ nhựa cao cấp c&oacute; khả năng chống b&aacute;m v&acirc;n tay, duy tr&igrave; t&iacute;nh thẩm mỹ qua thời gian sử dụng. C&aacute;c đường n&eacute;t vu&ocirc;ng vức c&ugrave;ng độ d&agrave;y 1.99 cm v&agrave; trọng lượng 1.46kg cho thấy sự c&acirc;n đối giữa t&iacute;nh di động v&agrave; độ cứng c&aacute;p.</p>\r\n\r\n<p>Điểm nhấn đ&aacute;ng ch&uacute; &yacute; nhất của d&ograve;ng ExpertBook B1 l&agrave; chứng nhận độ bền theo ti&ecirc;u chuẩn qu&acirc;n sự MIL-STD 810H. Thiết bị đ&atilde; vượt qua c&aacute;c b&agrave;i kiểm tra khắc nghiệt về rung lắc, nhiệt độ (-20&deg;C đến 60&deg;C), độ ẩm (95% ở 40&deg;C) v&agrave; va đập. Bản lề m&agrave;n h&igrave;nh được thiết kế để chịu được 30,000 lần đ&oacute;ng mở, trong khi c&aacute;c cổng kết nối được gia cố để đảm bảo độ bền sau 5,000 lần cắm/r&uacute;t. B&agrave;n ph&iacute;m chống nước IP53 l&agrave; t&iacute;nh năng thiết thực, giảm thiểu rủi ro từ c&aacute;c sự cố đổ chất lỏng thường gặp.</p>\r\n\r\n<h2>2. Hiệu năng v&agrave; cấu h&igrave;nh phần cứng</h2>\r\n\r\n<p>Tr&aacute;i tim của m&aacute;y l&agrave; CPU Intel Core i7-1355U thuộc thế hệ Raptor Lake, sở hữu kiến tr&uacute;c lai (hybrid) với 2 nh&acirc;n hiệu suất (P-core) v&agrave; 8 nh&acirc;n tiết kiệm điện (E-core). Xung nhịp cơ bản đạt 1.7GHz, c&oacute; thể tăng l&ecirc;n 5.0GHz nhờ c&ocirc;ng nghệ Turbo Boost. Với 12 luồng xử l&yacute;, con chip n&agrave;y xử l&yacute; mượt m&agrave; c&aacute;c t&aacute;c vụ văn ph&ograve;ng cơ bản đến đa nhiệm phức tạp. Trong b&agrave;i kiểm tra Cinebench R23, i7-1355U đạt 1,528 điểm đơn nh&acirc;n v&agrave; 7,892 điểm đa nh&acirc;n, vượt trội so với c&aacute;c đối thủ c&ugrave;ng ph&acirc;n kh&uacute;c.</p>\r\n\r\n<p>M&aacute;y được trang bị sẵn 24GB RAM DDR4-3200MHz h&agrave;n trực tiếp tr&ecirc;n bo mạch chủ, hỗ trợ n&acirc;ng cấp l&ecirc;n tối đa 40GB th&ocirc;ng qua khe SO-DIMM. Việc th&ecirc;m RAM kh&ocirc;ng chỉ cải thiện hiệu năng đa nhiệm m&agrave; c&ograve;n k&iacute;ch hoạt chế độ dual-channel cho card đồ họa t&iacute;ch hợp. Ổ cứng SSD NVMe PCIe 4.0 512GB mang lại tốc độ đọc/ghi lần lượt đạt 3,500MB/s v&agrave; 3,000MB/s, r&uacute;t ngắn thời gian khởi động hệ thống v&agrave; tải ứng dụng.</p>\r\n\r\n<p>Card đồ họa Intel UHD Graphics t&iacute;ch hợp ph&ugrave; hợp cho c&aacute;c t&aacute;c vụ xử l&yacute; văn bản, duyệt web v&agrave; xem video độ ph&acirc;n giải cao. Trong b&agrave;i thử nghiệm 3DMark Night Raid, card n&agrave;y đạt 4,102 điểm, đủ sức xử l&yacute; c&aacute;c ứng dụng đồ họa nhẹ như Photoshop nhưng kh&ocirc;ng ph&ugrave; hợp cho game hoặc render 3D chuy&ecirc;n s&acirc;u.</p>\r\n\r\n<h2>3. M&agrave;n h&igrave;nh v&agrave; trải nghiệm h&igrave;nh ảnh</h2>\r\n\r\n<p>M&agrave;n h&igrave;nh 14 inch độ ph&acirc;n giải Full HD (1920&times;1080) sử dụng tấm nền TN cho g&oacute;c nh&igrave;n hẹp 45/45/15/35 độ. Độ s&aacute;ng tối đa 250 nits v&agrave; độ tương phản 600:1 khiến h&igrave;nh ảnh thiếu chiều s&acirc;u trong điều kiện &aacute;nh s&aacute;ng mạnh. Lớp phủ chống ch&oacute;i giảm thiểu phản chiếu nhưng ảnh hưởng đến độ r&otilde; n&eacute;t khi l&agrave;m việc ngo&agrave;i trời.</p>\r\n\r\n<p>Điểm yếu lớn nhất của ExpertBook B1 nằm ở chất lượng m&agrave;n h&igrave;nh. Kết quả đo m&agrave;u bằng SpyderX Elite cho thấy độ phủ m&agrave;u chỉ đạt 57.39% sRGB v&agrave; 41.11% DCI-P3, kh&ocirc;ng đ&aacute;p ứng được nhu cầu chỉnh sửa ảnh chuy&ecirc;n nghiệp. Nhiều người d&ugrave;ng phản &aacute;nh cảm gi&aacute;c mỏi mắt sau 2-3 giờ l&agrave;m việc li&ecirc;n tục do c&ocirc;ng nghệ PWM điều chỉnh độ s&aacute;ng ở tần số thấp.</p>\r\n\r\n<h2>4. Hệ thống kết nối v&agrave; cổng giao tiếp</h2>\r\n\r\n<p>ASUS trang bị đầy đủ cổng kết nối cho nhu cầu doanh nghiệp:</p>\r\n\r\n<ul>\r\n	<li>2 cổng USB 3.2 Gen 2 Type-C hỗ trợ Power Delivery v&agrave; DisplayPort Alt Mode</li>\r\n	<li>1 cổng USB 3.2 Gen 1 Type-A</li>\r\n	<li>1 cổng USB 2.0 Type-A d&agrave;nh cho thiết bị ngoại vi</li>\r\n	<li>HDMI 1.4 output 4K@30Hz</li>\r\n	<li>RJ45 Gigabit Ethernet</li>\r\n	<li>Jack tai nghe 3.5mm combo</li>\r\n</ul>\r\n\r\n<p>Module Wi-Fi 6E (802.11ax) hỗ trợ băng tần 6GHz mới, giảm tắc nghẽn mạng trong m&ocirc;i trường đ&ocirc;ng thiết bị. Bluetooth 5.3 cải thiện độ ổn định khi kết nối với chuột kh&ocirc;ng d&acirc;y hoặc tai nghe. C&ocirc;ng nghệ ASUS WiFi Master đảm bảo t&iacute;n hiệu ổn định trong phạm vi 15m, ph&ugrave; hợp cho c&aacute;c ph&ograve;ng họp quy m&ocirc; vừa.</p>\r\n\r\n<h2>5. Pin v&agrave; khả năng di động</h2>\r\n\r\n<p>Dung lượng pin 42Wh cung cấp thời lượng sử dụng khoảng 6-8 giờ cho t&aacute;c vụ văn ph&ograve;ng, giảm xuống 4-5 giờ khi sử dụng ứng dụng nặng. C&ocirc;ng nghệ sạc nhanh 65W gi&uacute;p nạp 60% pin trong 49 ph&uacute;t, đ&aacute;p ứng nhu cầu sử dụng khẩn cấp. Adapter USB-C nhỏ gọn tương th&iacute;ch với c&aacute;c thiết bị di động kh&aacute;c, giảm tải phụ kiện cần mang theo.</p>\r\n\r\n<p>Chế độ ASUS Battery Health Charging cho ph&eacute;p giới hạn mức sạc tối đa ở 80% để k&eacute;o d&agrave;i tuổi thọ pin. C&ocirc;ng nghệ ICEcool giữ nhiệt độ b&agrave;n ph&iacute;m dưới 36&deg;C ngay cả khi sử dụng li&ecirc;n tục, đảm bảo trải nghiệm g&otilde; ph&iacute;m thoải m&aacute;i.</p>\r\n\r\n<h2>6. Bảo mật v&agrave; t&iacute;nh năng doanh nghiệp</h2>\r\n\r\n<p>M&aacute;y t&iacute;ch hợp cảm biến v&acirc;n tay tr&ecirc;n touchpad c&ugrave;ng camera hồng ngoại IR hỗ trợ Windows Hello. Chip bảo mật TPM 2.0 m&atilde; h&oacute;a dữ liệu theo chuẩn FIPS 140-2, trong khi nắp che camera vật l&yacute; ngăn chặn nguy cơ gi&aacute;m s&aacute;t tr&aacute;i ph&eacute;p.</p>\r\n\r\n<p>ASUS Control Center cho ph&eacute;p IT Admin quản l&yacute; tập trung c&aacute;c thiết bị qua mạng, cập nhật firmware v&agrave; ph&acirc;n quyền truy cập. Ch&iacute;nh s&aacute;ch bảo h&agrave;nh 3 năm to&agrave;n diện bao gồm cả hư hỏng do va đập v&agrave; chất lỏng, với dịch vụ tại chỗ trong 48 giờ l&agrave;m việc.</p>\r\n\r\n<h2>7. Bảng th&ocirc;ng số kỹ thuật chi tiết</h2>\r\n\r\n<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Th&ocirc;ng số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>B1402CVA-NK0157W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Windows 11 Home SL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Intel Core i7-1355U (10 nh&acirc;n, 12 luồng, 1.7GHz-5.0GHz)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>24GB DDR4-3200MHz (N&acirc;ng cấp tối đa 40GB)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ổ cứng</td>\r\n			<td>512GB PCIe 4.0 NVMe SSD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đồ họa</td>\r\n			<td>Intel UHD Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh</td>\r\n			<td>14&Prime; FHD (1920&times;1080) TN, 250nits, Anti-glare</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kết nối</td>\r\n			<td>Wi-Fi 6E, Bluetooth 5.3, 2xUSB-C, HDMI 1.4, RJ45</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pin</td>\r\n			<td>42Wh 3-cell Li-ion</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước</td>\r\n			<td>326.9 x 214.5 x 19.9mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>1.46kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo mật</td>\r\n			<td>V&acirc;n tay, TPM 2.0, Kensington Lock</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2>8. Đ&aacute;nh gi&aacute; ưu nhược điểm</h2>\r\n\r\n<h3><em>Ưu điểm nổi bật</em></h3>\r\n\r\n<ul>\r\n	<li>Thiết kế bền bỉ đạt chuẩn qu&acirc;n sự, ph&ugrave; hợp m&ocirc;i trường l&agrave;m việc khắc nghiệt</li>\r\n	<li>Hệ thống cổng kết nối đa dạng, bao gồm Ethernet v&agrave; USB-C PD</li>\r\n	<li>Khả năng n&acirc;ng cấp RAM linh hoạt, hỗ trợ tối đa 40GB</li>\r\n	<li>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh ưu việt với dịch vụ tại chỗ</li>\r\n</ul>\r\n\r\n<h3><em>Hạn chế cần lưu &yacute;</em></h3>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh TN chất lượng thấp, g&oacute;c nh&igrave;n hẹp v&agrave; độ phủ m&agrave;u hạn chế</li>\r\n	<li>RAM 24GB ti&ecirc;u chuẩn chưa đ&aacute;p ứng nhu căng đa nhiệm nặng</li>\r\n	<li>Dung lượng pin khi&ecirc;m tốn so với đối thủ c&ugrave;ng ph&acirc;n kh&uacute;c</li>\r\n	<li>Thiếu khe cắm SSD thứ hai cho n&acirc;ng cấp lưu trữ</li>\r\n</ul>\r\n\r\n<p>ASUS ExpertBook B1 B1402CVA-NK0157W l&agrave; lựa chọn hợp l&yacute; cho doanh nghiệp vừa v&agrave; nhỏ cần thiết bị bền bỉ với chi ph&iacute; vận h&agrave;nh thấp. M&aacute;y ph&aacute;t huy tốt trong m&ocirc;i trường văn ph&ograve;ng truyền thống nhưng cần c&acirc;n nhắc kỹ về trải nghiệm m&agrave;n h&igrave;nh nếu sử dụng l&acirc;u d&agrave;i. Đối với người d&ugrave;ng c&aacute; nh&acirc;n, việc đầu tư th&ecirc;m m&agrave;n h&igrave;nh ngo&agrave;i v&agrave; n&acirc;ng cấp RAM sẽ tối ưu h&oacute;a hiệu quả l&agrave;m việc. Sản phẩm xứng đ&aacute;ng được xem x&eacute;t trong ph&acirc;n kh&uacute;c dưới 20 triệu đồng khi ưu ti&ecirc;n độ tin cậy v&agrave; dịch vụ hậu m&atilde;i.</p>', 36, 0, 0, NULL, '2025-06-23 02:14:03', '2025-08-01 08:38:06'),
(2, 'SP001', 'Laptop dell 2025', 1, 'storage/thumbnail/oICaBTN88FswZZUzeeuzAq7dQ59dznfYVgZQn7Kx.jpg', '<p>ASUS ExpertBook B1 B1402CV i7 1355U, 24GB RAM, 512GB SSD l&agrave; một trong những sản phẩm nổi bật thuộc ph&acirc;n kh&uacute;c doanh nghiệp tầm trung, kết hợp giữa thiết kế bền bỉ v&agrave; hiệu năng ổn định. Với bộ vi xử l&yacute; Intel Core i7-1355U thế hệ 13, RAM 24GB RAM v&agrave; ổ cứng SSD 512GB, thiết bị n&agrave;y hướng đến đối tượng người d&ugrave;ng chuy&ecirc;n nghiệp cần sự di động v&agrave; độ tin cậy cao. Tuy nhi&ecirc;n, m&agrave;n h&igrave;nh sử dụng tấm nền TN c&ugrave;ng một số hạn chế về khả năng n&acirc;ng cấp đặt ra c&acirc;u hỏi về t&iacute;nh c&acirc;n bằng giữa gi&aacute; th&agrave;nh v&agrave; trải nghiệm. B&agrave;i viết n&agrave;y ph&acirc;n t&iacute;ch s&acirc;u từng kh&iacute;a cạnh của sản phẩm, cung cấp c&aacute;i nh&igrave;n to&agrave;n diện cho người d&ugrave;ng tiềm năng.</p>\r\n\r\n<h2>1. Thiết kế v&agrave; độ bền</h2>\r\n\r\n<p>ASUS ExpertBook B1 B1402CVA-NK0157W sở hữu vẻ ngo&agrave;i tối giản với t&ocirc;ng m&agrave;u Star Black chủ đạo, ph&ugrave; hợp với m&ocirc;i trường c&ocirc;ng sở. Vỏ m&aacute;y l&agrave;m từ nhựa cao cấp c&oacute; khả năng chống b&aacute;m v&acirc;n tay, duy tr&igrave; t&iacute;nh thẩm mỹ qua thời gian sử dụng. C&aacute;c đường n&eacute;t vu&ocirc;ng vức c&ugrave;ng độ d&agrave;y 1.99 cm v&agrave; trọng lượng 1.46kg cho thấy sự c&acirc;n đối giữa t&iacute;nh di động v&agrave; độ cứng c&aacute;p.</p>\r\n\r\n<p>Điểm nhấn đ&aacute;ng ch&uacute; &yacute; nhất của d&ograve;ng ExpertBook B1 l&agrave; chứng nhận độ bền theo ti&ecirc;u chuẩn qu&acirc;n sự MIL-STD 810H. Thiết bị đ&atilde; vượt qua c&aacute;c b&agrave;i kiểm tra khắc nghiệt về rung lắc, nhiệt độ (-20&deg;C đến 60&deg;C), độ ẩm (95% ở 40&deg;C) v&agrave; va đập. Bản lề m&agrave;n h&igrave;nh được thiết kế để chịu được 30,000 lần đ&oacute;ng mở, trong khi c&aacute;c cổng kết nối được gia cố để đảm bảo độ bền sau 5,000 lần cắm/r&uacute;t. B&agrave;n ph&iacute;m chống nước IP53 l&agrave; t&iacute;nh năng thiết thực, giảm thiểu rủi ro từ c&aacute;c sự cố đổ chất lỏng thường gặp.</p>\r\n\r\n<h2>2. Hiệu năng v&agrave; cấu h&igrave;nh phần cứng</h2>\r\n\r\n<p>Tr&aacute;i tim của m&aacute;y l&agrave; CPU Intel Core i7-1355U thuộc thế hệ Raptor Lake, sở hữu kiến tr&uacute;c lai (hybrid) với 2 nh&acirc;n hiệu suất (P-core) v&agrave; 8 nh&acirc;n tiết kiệm điện (E-core). Xung nhịp cơ bản đạt 1.7GHz, c&oacute; thể tăng l&ecirc;n 5.0GHz nhờ c&ocirc;ng nghệ Turbo Boost. Với 12 luồng xử l&yacute;, con chip n&agrave;y xử l&yacute; mượt m&agrave; c&aacute;c t&aacute;c vụ văn ph&ograve;ng cơ bản đến đa nhiệm phức tạp. Trong b&agrave;i kiểm tra Cinebench R23, i7-1355U đạt 1,528 điểm đơn nh&acirc;n v&agrave; 7,892 điểm đa nh&acirc;n, vượt trội so với c&aacute;c đối thủ c&ugrave;ng ph&acirc;n kh&uacute;c.</p>\r\n\r\n<p>M&aacute;y được trang bị sẵn 24GB RAM DDR4-3200MHz h&agrave;n trực tiếp tr&ecirc;n bo mạch chủ, hỗ trợ n&acirc;ng cấp l&ecirc;n tối đa 40GB th&ocirc;ng qua khe SO-DIMM. Việc th&ecirc;m RAM kh&ocirc;ng chỉ cải thiện hiệu năng đa nhiệm m&agrave; c&ograve;n k&iacute;ch hoạt chế độ dual-channel cho card đồ họa t&iacute;ch hợp. Ổ cứng SSD NVMe PCIe 4.0 512GB mang lại tốc độ đọc/ghi lần lượt đạt 3,500MB/s v&agrave; 3,000MB/s, r&uacute;t ngắn thời gian khởi động hệ thống v&agrave; tải ứng dụng.</p>\r\n\r\n<p>Card đồ họa Intel UHD Graphics t&iacute;ch hợp ph&ugrave; hợp cho c&aacute;c t&aacute;c vụ xử l&yacute; văn bản, duyệt web v&agrave; xem video độ ph&acirc;n giải cao. Trong b&agrave;i thử nghiệm 3DMark Night Raid, card n&agrave;y đạt 4,102 điểm, đủ sức xử l&yacute; c&aacute;c ứng dụng đồ họa nhẹ như Photoshop nhưng kh&ocirc;ng ph&ugrave; hợp cho game hoặc render 3D chuy&ecirc;n s&acirc;u.</p>\r\n\r\n<h2>3. M&agrave;n h&igrave;nh v&agrave; trải nghiệm h&igrave;nh ảnh</h2>\r\n\r\n<p>M&agrave;n h&igrave;nh 14 inch độ ph&acirc;n giải Full HD (1920&times;1080) sử dụng tấm nền TN cho g&oacute;c nh&igrave;n hẹp 45/45/15/35 độ. Độ s&aacute;ng tối đa 250 nits v&agrave; độ tương phản 600:1 khiến h&igrave;nh ảnh thiếu chiều s&acirc;u trong điều kiện &aacute;nh s&aacute;ng mạnh. Lớp phủ chống ch&oacute;i giảm thiểu phản chiếu nhưng ảnh hưởng đến độ r&otilde; n&eacute;t khi l&agrave;m việc ngo&agrave;i trời.</p>\r\n\r\n<p>Điểm yếu lớn nhất của ExpertBook B1 nằm ở chất lượng m&agrave;n h&igrave;nh. Kết quả đo m&agrave;u bằng SpyderX Elite cho thấy độ phủ m&agrave;u chỉ đạt 57.39% sRGB v&agrave; 41.11% DCI-P3, kh&ocirc;ng đ&aacute;p ứng được nhu cầu chỉnh sửa ảnh chuy&ecirc;n nghiệp. Nhiều người d&ugrave;ng phản &aacute;nh cảm gi&aacute;c mỏi mắt sau 2-3 giờ l&agrave;m việc li&ecirc;n tục do c&ocirc;ng nghệ PWM điều chỉnh độ s&aacute;ng ở tần số thấp.</p>\r\n\r\n<h2>4. Hệ thống kết nối v&agrave; cổng giao tiếp</h2>\r\n\r\n<p>ASUS trang bị đầy đủ cổng kết nối cho nhu cầu doanh nghiệp:</p>\r\n\r\n<ul>\r\n	<li>2 cổng USB 3.2 Gen 2 Type-C hỗ trợ Power Delivery v&agrave; DisplayPort Alt Mode</li>\r\n	<li>1 cổng USB 3.2 Gen 1 Type-A</li>\r\n	<li>1 cổng USB 2.0 Type-A d&agrave;nh cho thiết bị ngoại vi</li>\r\n	<li>HDMI 1.4 output 4K@30Hz</li>\r\n	<li>RJ45 Gigabit Ethernet</li>\r\n	<li>Jack tai nghe 3.5mm combo</li>\r\n</ul>\r\n\r\n<p>Module Wi-Fi 6E (802.11ax) hỗ trợ băng tần 6GHz mới, giảm tắc nghẽn mạng trong m&ocirc;i trường đ&ocirc;ng thiết bị. Bluetooth 5.3 cải thiện độ ổn định khi kết nối với chuột kh&ocirc;ng d&acirc;y hoặc tai nghe. C&ocirc;ng nghệ ASUS WiFi Master đảm bảo t&iacute;n hiệu ổn định trong phạm vi 15m, ph&ugrave; hợp cho c&aacute;c ph&ograve;ng họp quy m&ocirc; vừa.</p>\r\n\r\n<h2>5. Pin v&agrave; khả năng di động</h2>\r\n\r\n<p>Dung lượng pin 42Wh cung cấp thời lượng sử dụng khoảng 6-8 giờ cho t&aacute;c vụ văn ph&ograve;ng, giảm xuống 4-5 giờ khi sử dụng ứng dụng nặng. C&ocirc;ng nghệ sạc nhanh 65W gi&uacute;p nạp 60% pin trong 49 ph&uacute;t, đ&aacute;p ứng nhu cầu sử dụng khẩn cấp. Adapter USB-C nhỏ gọn tương th&iacute;ch với c&aacute;c thiết bị di động kh&aacute;c, giảm tải phụ kiện cần mang theo.</p>\r\n\r\n<p>Chế độ ASUS Battery Health Charging cho ph&eacute;p giới hạn mức sạc tối đa ở 80% để k&eacute;o d&agrave;i tuổi thọ pin. C&ocirc;ng nghệ ICEcool giữ nhiệt độ b&agrave;n ph&iacute;m dưới 36&deg;C ngay cả khi sử dụng li&ecirc;n tục, đảm bảo trải nghiệm g&otilde; ph&iacute;m thoải m&aacute;i.</p>\r\n\r\n<h2>6. Bảo mật v&agrave; t&iacute;nh năng doanh nghiệp</h2>\r\n\r\n<p>M&aacute;y t&iacute;ch hợp cảm biến v&acirc;n tay tr&ecirc;n touchpad c&ugrave;ng camera hồng ngoại IR hỗ trợ Windows Hello. Chip bảo mật TPM 2.0 m&atilde; h&oacute;a dữ liệu theo chuẩn FIPS 140-2, trong khi nắp che camera vật l&yacute; ngăn chặn nguy cơ gi&aacute;m s&aacute;t tr&aacute;i ph&eacute;p.</p>\r\n\r\n<p>ASUS Control Center cho ph&eacute;p IT Admin quản l&yacute; tập trung c&aacute;c thiết bị qua mạng, cập nhật firmware v&agrave; ph&acirc;n quyền truy cập. Ch&iacute;nh s&aacute;ch bảo h&agrave;nh 3 năm to&agrave;n diện bao gồm cả hư hỏng do va đập v&agrave; chất lỏng, với dịch vụ tại chỗ trong 48 giờ l&agrave;m việc.</p>\r\n\r\n<h2>7. Bảng th&ocirc;ng số kỹ thuật chi tiết</h2>\r\n\r\n<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Th&ocirc;ng số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>B1402CVA-NK0157W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Windows 11 Home SL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Intel Core i7-1355U (10 nh&acirc;n, 12 luồng, 1.7GHz-5.0GHz)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>24GB DDR4-3200MHz (N&acirc;ng cấp tối đa 40GB)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ổ cứng</td>\r\n			<td>512GB PCIe 4.0 NVMe SSD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đồ họa</td>\r\n			<td>Intel UHD Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh</td>\r\n			<td>14&Prime; FHD (1920&times;1080) TN, 250nits, Anti-glare</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kết nối</td>\r\n			<td>Wi-Fi 6E, Bluetooth 5.3, 2xUSB-C, HDMI 1.4, RJ45</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pin</td>\r\n			<td>42Wh 3-cell Li-ion</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước</td>\r\n			<td>326.9 x 214.5 x 19.9mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>1.46kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo mật</td>\r\n			<td>V&acirc;n tay, TPM 2.0, Kensington Lock</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2>8. Đ&aacute;nh gi&aacute; ưu nhược điểm</h2>\r\n\r\n<h3><em>Ưu điểm nổi bật</em></h3>\r\n\r\n<ul>\r\n	<li>Thiết kế bền bỉ đạt chuẩn qu&acirc;n sự, ph&ugrave; hợp m&ocirc;i trường l&agrave;m việc khắc nghiệt</li>\r\n	<li>Hệ thống cổng kết nối đa dạng, bao gồm Ethernet v&agrave; USB-C PD</li>\r\n	<li>Khả năng n&acirc;ng cấp RAM linh hoạt, hỗ trợ tối đa 40GB</li>\r\n	<li>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh ưu việt với dịch vụ tại chỗ</li>\r\n</ul>\r\n\r\n<h3><em>Hạn chế cần lưu &yacute;</em></h3>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh TN chất lượng thấp, g&oacute;c nh&igrave;n hẹp v&agrave; độ phủ m&agrave;u hạn chế</li>\r\n	<li>RAM 24GB ti&ecirc;u chuẩn chưa đ&aacute;p ứng nhu căng đa nhiệm nặng</li>\r\n	<li>Dung lượng pin khi&ecirc;m tốn so với đối thủ c&ugrave;ng ph&acirc;n kh&uacute;c</li>\r\n	<li>Thiếu khe cắm SSD thứ hai cho n&acirc;ng cấp lưu trữ</li>\r\n</ul>\r\n\r\n<p>ASUS ExpertBook B1 B1402CVA-NK0157W l&agrave; lựa chọn hợp l&yacute; cho doanh nghiệp vừa v&agrave; nhỏ cần thiết bị bền bỉ với chi ph&iacute; vận h&agrave;nh thấp. M&aacute;y ph&aacute;t huy tốt trong m&ocirc;i trường văn ph&ograve;ng truyền thống nhưng cần c&acirc;n nhắc kỹ về trải nghiệm m&agrave;n h&igrave;nh nếu sử dụng l&acirc;u d&agrave;i. Đối với người d&ugrave;ng c&aacute; nh&acirc;n, việc đầu tư th&ecirc;m m&agrave;n h&igrave;nh ngo&agrave;i v&agrave; n&acirc;ng cấp RAM sẽ tối ưu h&oacute;a hiệu quả l&agrave;m việc. Sản phẩm xứng đ&aacute;ng được xem x&eacute;t trong ph&acirc;n kh&uacute;c dưới 20 triệu đồng khi ưu ti&ecirc;n độ tin cậy v&agrave; dịch vụ hậu m&atilde;i.</p>', 23, 0, 0, '2025-07-18 00:56:25', '2025-06-23 02:14:58', '2025-07-18 00:56:25'),
(3, 'SP00222', 'Laptop 2027', 2, 'storage/thumbnail/tXzWjSVQt732Y4QBTGLYR4Kg8ePY634ObZRIwpdi.jpg', '<p><em><strong>Laptop Acer Aspire Lite 16 AL16-52P-572A nổi bật với thiết kế mỏng nhẹ, hiệu năng mạnh mẽ từ chip Intel&reg; Core&trade; i5-1334U v&agrave; m&agrave;n h&igrave;nh FHD+ 16 inch sắc n&eacute;t. Sản phẩm ph&ugrave; hợp cho sinh vi&ecirc;n, d&acirc;n văn ph&ograve;ng với RAM 16GB DDR5 v&agrave; SSD 512GB. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng trong ph&acirc;n kh&uacute;c laptop tầm trung.</strong></em></p>\r\n\r\n<h2><strong>Thiết kế sang trọng, bền bỉ v&agrave; di động</strong></h2>\r\n\r\n<p><a href=\"https://hacom.vn/laptop\" target=\"_blank\">Laptop</a>&nbsp;Acer Aspire Lite 16 AL16-52P-572A sở hữu thiết kế hiện đại với lớp vỏ nhựa ABS cao cấp m&agrave;u bạc, mang đến vẻ ngo&agrave;i sang trọng v&agrave; tinh tế. Với trọng lượng chỉ 1,7kg v&agrave; độ d&agrave;y 18,9mm, chiếc laptop n&agrave;y dễ d&agrave;ng mang theo khi di chuyển, ph&ugrave; hợp cho sinh vi&ecirc;n hoặc d&acirc;n văn ph&ograve;ng thường xuy&ecirc;n l&agrave;m việc ở nhiều địa điểm kh&aacute;c nhau. Vỏ nhựa ABS kh&ocirc;ng chỉ đảm bảo độ bền m&agrave; c&ograve;n gi&uacute;p tăng tuổi thọ của m&aacute;y, chống chịu tốt trước c&aacute;c va chạm nhẹ trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p>Điểm nhấn trong thiết kế của Acer Aspire Lite 16 l&agrave; sự tối giản nhưng vẫn to&aacute;t l&ecirc;n vẻ chuy&ecirc;n nghiệp. C&aacute;c đường n&eacute;t được gia c&ocirc;ng cẩn thận, tạo cảm gi&aacute;c chắc chắn v&agrave; cao cấp. Đ&acirc;y l&agrave; một lựa chọn l&yacute; tưởng cho những ai y&ecirc;u th&iacute;ch sự kết hợp giữa thẩm mỹ v&agrave; t&iacute;nh thực dụng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/06-03-2025/87090_laptop_acer_aspire_lite_16_al16_52p_572a_nx_j2ssv_004_i5_1334u_16gb_ram_512gb_ssd_16__1_.png\" style=\"height:734px; width:850px\" /></p>\r\n\r\n<h2><strong>Hiệu năng vượt trội với Intel&reg; Core&trade; i5-1334U</strong></h2>\r\n\r\n<p>Laptop Acer Aspire Lite 16 được trang bị bộ vi xử l&yacute; Intel&reg; Core&trade; i5-1334U, một con chip mạnh mẽ với 10 nh&acirc;n (2 P-Cores đạt xung nhịp tối đa 4,6GHz v&agrave; 8 E-Cores đạt 3,4GHz) v&agrave; 12 luồng. Bộ nhớ đệm 12MB Intel&reg; Smart Cache gi&uacute;p tối ưu h&oacute;a hiệu suất xử l&yacute;, đặc biệt khi thực hiện c&aacute;c t&aacute;c vụ đa nhiệm như chạy nhiều ứng dụng văn ph&ograve;ng, chỉnh sửa h&igrave;nh ảnh hoặc xem video độ ph&acirc;n giải cao.</p>\r\n\r\n<p>Kết hợp với RAM 16GB DDR5 tốc độ 4800MHz, chiếc laptop n&agrave;y mang đến khả năng xử l&yacute; nhanh ch&oacute;ng v&agrave; mượt m&agrave;. Người d&ugrave;ng c&oacute; thể dễ d&agrave;ng mở nhiều tab tr&igrave;nh duyệt, sử dụng phần mềm văn ph&ograve;ng hoặc thậm ch&iacute; chạy c&aacute;c ứng dụng đồ họa cơ bản m&agrave; kh&ocirc;ng lo giật lag. Điểm đặc biệt l&agrave; m&aacute;y hỗ trợ n&acirc;ng cấp RAM tối đa l&ecirc;n đến 64GB, mang lại sự linh hoạt cho những ai c&oacute; nhu cầu sử dụng cao hơn trong tương lai.</p>\r\n\r\n<p>Ổ cứng SSD PCIe NVMe 512GB kh&ocirc;ng chỉ cung cấp kh&ocirc;ng gian lưu trữ rộng r&atilde;i m&agrave; c&ograve;n đảm bảo tốc độ khởi động v&agrave; truy xuất dữ liệu vượt trội. Ngo&agrave;i ra, khả năng n&acirc;ng cấp SSD l&ecirc;n đến 2TB l&agrave; một lợi thế lớn, gi&uacute;p người d&ugrave;ng thoải m&aacute;i lưu trữ t&agrave;i liệu, h&igrave;nh ảnh v&agrave; video m&agrave; kh&ocirc;ng lo thiếu dung lượng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/06-03-2025/i5.png\" style=\"height:600px; width:900px\" /></p>\r\n\r\n<h2><strong>M&agrave;n h&igrave;nh FHD+ 16 inch trải nghiệm h&igrave;nh ảnh sống động</strong></h2>\r\n\r\n<p>Một trong những điểm nổi bật của Acer Aspire Lite<strong>&nbsp;</strong>l&agrave; m&agrave;n h&igrave;nh 16 inch với độ ph&acirc;n giải FHD+ (1920x1200), tỷ lệ 16:10. C&ocirc;ng nghệ IPS kết hợp độ s&aacute;ng 300 nits v&agrave; g&oacute;c nh&igrave;n rộng l&ecirc;n đến 170 độ mang lại h&igrave;nh ảnh sắc n&eacute;t, m&agrave;u sắc ch&acirc;n thực. C&ocirc;ng nghệ Acer ComfyView&trade; gi&uacute;p giảm ch&oacute;i s&aacute;ng, bảo vệ mắt người d&ugrave;ng trong thời gian sử dụng l&acirc;u, đặc biệt ph&ugrave; hợp với những ai thường xuy&ecirc;n l&agrave;m việc li&ecirc;n tục tr&ecirc;n m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>M&agrave;n h&igrave;nh lớn 16 inch kh&ocirc;ng chỉ mang lại kh&ocirc;ng gian l&agrave;m việc thoải m&aacute;i m&agrave; c&ograve;n l&yacute; tưởng cho việc xem phim, chỉnh sửa nội dung hoặc thuyết tr&igrave;nh. Với độ phủ m&agrave;u 45% NTSC, đ&acirc;y l&agrave; lựa chọn ph&ugrave; hợp cho c&aacute;c t&aacute;c vụ văn ph&ograve;ng v&agrave; giải tr&iacute; cơ bản, d&ugrave; kh&ocirc;ng phải l&agrave; m&agrave;n h&igrave;nh chuy&ecirc;n dụng cho thiết kế đồ họa chuy&ecirc;n s&acirc;u.</p>\r\n\r\n<h2><strong>Đồ họa Intel&reg; Iris&reg; Xe: Hỗ trợ tốt c&aacute;c t&aacute;c vụ đồ họa</strong></h2>\r\n\r\n<p>Laptop Acer Aspire Lite 16 AL16-52P-572A được t&iacute;ch hợp card đồ họa Intel&reg; Iris&reg; Xe Graphics, mang lại hiệu suất đồ họa ổn định cho c&aacute;c t&aacute;c vụ như chỉnh sửa h&igrave;nh ảnh, video cơ bản hoặc chơi c&aacute;c tựa game nhẹ. D&ugrave; kh&ocirc;ng phải l&agrave; GPU chuy&ecirc;n dụng cho chơi game nặng, Intel&reg; Iris&reg; Xe vẫn đ&aacute;p ứng tốt nhu cầu sử dụng h&agrave;ng ng&agrave;y của người d&ugrave;ng phổ th&ocirc;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/30-05-2025/laptop-acer-aspire-lite-16-al16-52p-572a-1.jpg\" style=\"height:1280px; width:1280px\" /></p>\r\n\r\n<h2><strong>Kết nối hiện đại, đa dạng</strong></h2>\r\n\r\n<p>Về khả năng kết nối, Acer Aspire Lite 16 được trang bị đầy đủ c&aacute;c cổng cần thiết để đ&aacute;p ứng nhu cầu sử dụng đa dạng. M&aacute;y sở hữu:</p>\r\n\r\n<ul>\r\n	<li><strong>1 cổng USB Type-C</strong>&nbsp;hỗ trợ USB 3.2 Gen 2 (tốc độ l&ecirc;n đến 10 Gbps), DisplayPort qua USB-C v&agrave; sạc nhanh.</li>\r\n	<li><strong>3 cổng USB Standard-A</strong>&nbsp;hỗ trợ USB 3.2 Gen 1.</li>\r\n	<li><strong>1 cổng HDMI 1.4</strong>&nbsp;với hỗ trợ HDCP.</li>\r\n	<li><strong>1 khe cắm thẻ MicroSD</strong>&nbsp;hỗ trợ dung lượng l&ecirc;n đến 512GB.</li>\r\n	<li><strong>1 jack tai nghe 3.5mm</strong>&nbsp;hỗ trợ tai nghe c&oacute; micro t&iacute;ch hợp.</li>\r\n</ul>\r\n\r\n<p>Về kết nối kh&ocirc;ng d&acirc;y, m&aacute;y hỗ trợ Wi-Fi 6 AX201 với băng tần k&eacute;p (2.4GHz v&agrave; 5GHz) v&agrave; c&ocirc;ng nghệ 2x2 MU-MIMO, đảm bảo tốc độ kết nối nhanh v&agrave; ổn định. Bluetooth 5.1 cho ph&eacute;p kết nối dễ d&agrave;ng với c&aacute;c thiết bị ngoại vi như tai nghe, chuột kh&ocirc;ng d&acirc;y hoặc loa Bluetooth.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hacom.vn/media/lib/30-05-2025/laptop-acer-aspire-lite-16-al16-52p-572a-2.jpg\" style=\"height:1280px; width:1280px\" /></p>\r\n\r\n<h2><strong>Pin v&agrave; hệ điều h&agrave;nh</strong></h2>\r\n\r\n<p>Laptop Acer Aspire Lite 16 được trang bị pin 3 cell 58WHrs, đi k&egrave;m adapter sạc 65W qua cổng Type-C. Dung lượng pin n&agrave;y đủ để đ&aacute;p ứng nhu cầu sử dụng li&ecirc;n tục trong khoảng 6-8 giờ với c&aacute;c t&aacute;c vụ cơ bản như lướt web, soạn thảo văn bản hoặc xem video. M&aacute;y được c&agrave;i sẵn Windows 11 Home SL, mang đến giao diện hiện đại v&agrave; nhiều t&iacute;nh năng tiện &iacute;ch.</p>\r\n\r\n<h2><strong>&Acirc;m thanh v&agrave; b&agrave;n ph&iacute;m</strong></h2>\r\n\r\n<p>Hệ thống &acirc;m thanh của m&aacute;y bao gồm hai loa stereo v&agrave; hai micro t&iacute;ch hợp, mang lại chất lượng &acirc;m thanh r&otilde; r&agrave;ng, ph&ugrave; hợp cho hội họp trực tuyến hoặc giải tr&iacute; cơ bản. B&agrave;n ph&iacute;m kh&ocirc;ng c&oacute; đ&egrave;n nền nhưng được t&iacute;ch hợp b&agrave;n ph&iacute;m số, hỗ trợ nhập liệu nhanh ch&oacute;ng, đặc biệt hữu &iacute;ch cho người d&ugrave;ng l&agrave;m việc với số liệu. Touchpad cảm ứng đa điểm nhạy, hỗ trợ c&aacute;c thao t&aacute;c cuộn, ph&oacute;ng to/thu nhỏ mượt m&agrave;.</p>\r\n\r\n<p>Laptop Acer Aspire Lite 16 AL16-52P-572A&nbsp;l&agrave; một sản phẩm đ&aacute;ng c&acirc;n nhắc trong ph&acirc;n kh&uacute;c laptop tầm trung. Với thiết kế mỏng nhẹ, hiệu năng mạnh mẽ từ chip Intel&reg; Core&trade; i5-1334U, RAM 16GB DDR5, SSD 512GB v&agrave; m&agrave;n h&igrave;nh FHD+ 16 inch sắc n&eacute;t&hellip; đ&aacute;p ứng tốt nhu cầu học tập, l&agrave;m việc văn ph&ograve;ng v&agrave; giải tr&iacute; cơ bản. Điểm cộng lớn l&agrave; khả năng n&acirc;ng cấp linh hoạt v&agrave; c&aacute;c cổng kết nối hiện đại, gi&uacute;p sản phẩm ph&ugrave; hợp với nhiều đối tượng người d&ugrave;ng.</p>\r\n\r\n<p>Sản phẩm hiện được ph&acirc;n phối ch&iacute;nh h&atilde;ng bởi&nbsp;<a href=\"https://hacom.vn/\" target=\"_blank\">HACOM</a>, đảm bảo chất lượng v&agrave; dịch vụ hậu m&atilde;i uy t&iacute;n.</p>', 41, 0, 0, NULL, '2025-06-23 02:19:18', '2025-08-01 08:38:15'),
(6, 'SP009', 'Laptop dell 2026', 2, 'storage/thumbnail/ebW9teTFNnMjfPQ9bxUyX99ELNdy1dQJBsJmmaaF.jpg', '<p>đẹp</p>', 27, 0, 0, NULL, '2025-06-23 03:13:22', '2025-07-17 16:29:35'),
(7, 'SP0019', 'Laptop dell 2028', 1, 'storage/thumbnail/kPfdd6q3EoJTqXDd5psyAtsHiLDLb7Mi4wF2c4DA.jpg', NULL, 25, 0, 0, NULL, '2025-06-27 07:16:28', '2025-07-25 06:28:03'),
(8, 'SP01', 'Dell chất', 1, 'storage/thumbnail/0kwff2INa8rp8nnzgw2N2D8Fst4HoBcdkYgQWMaO.jpg', NULL, 61, 0, 0, NULL, '2025-07-02 12:53:30', '2025-07-25 06:44:30'),
(9, 'SP003', 'Laptop hp', 4, 'storage/thumbnail/grihsEJX5mTb7cGJxdLRyDY6bVT1KizFLH3r7P9J.jpg', '<p>Đẹp chất lượng</p>', 17, 0, 0, NULL, '2025-07-04 11:30:13', '2025-07-13 14:44:56'),
(10, 'SP004', 'Laptop hp 2', 4, 'storage/thumbnail/u0116V77GglQicG1JNp3r7i2x8YNDC1GgOY3IJvN.jpg', '<p>Đẹp</p>', 47, 0, 0, NULL, '2025-07-04 11:30:50', '2025-07-25 06:46:29'),
(11, 'SP008', 'Laptop hp 3', 4, 'storage/thumbnail/BdFvJG7Si1tE7uJ3IrnBZccG0e7grPeepjBIEual.jpg', '<p>Đẹp</p>', 8, 0, 0, NULL, '2025-07-04 13:01:41', '2025-07-25 06:49:16'),
(12, 'SP000', 'Laptop hp 4', 1, 'storage/thumbnail/FeztRJeAimoOKCYPDOXztJ8r65rCGAXtgDmJNS56.jpg', '<p>đcd</p>', 0, 0, 0, '2025-07-09 07:06:23', '2025-07-09 07:05:58', '2025-07-09 07:06:23'),
(13, 'SP00227', 'Laptop 2031', 1, 'storage/thumbnail/ItSzUceiGZJ3L3yo0N63iuYU81dS5FxoS11jgwfK.jpg', '<p>đẹp</p>', 45, 0, 0, NULL, '2025-07-10 10:24:41', '2025-07-25 06:43:27'),
(14, 'SP005', 'Laptop dell12', 1, 'storage/thumbnail/ZLJKwwf1rwnSBAzDHM4MdsStN9JRlQ4UcGTOABrt.jpg', '<p>Chất lượng</p>', 18, 0, 0, NULL, '2025-07-18 01:13:59', '2025-07-25 06:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8cMBEVSp6pTvVOXrksYc02qEgqA8dXjNM84yn0c1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEdiMnBmNDg4SGYzZHVIU2RaSkVFSVlUVGhaY2dJZDJlRnJxUjRFbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754568945),
('WpA2CTQOIRScV2eHg1AaNvz26w0dTf9z6YdMXIvT', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOUZLWTRxYWpDSTlhdVQ3S3JmQWY3UkZ0a3ptNUJ5dVNvYnNnaVdrSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kb2lxdWEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1754574924);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag_san_phams`
--

CREATE TABLE `tag_san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tra_lois`
--

CREATE TABLE `tra_lois` (
  `id` bigint UNSIGNED NOT NULL,
  `danh_gia_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diem_tich_luy` int NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_dai_dien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vai_tro` enum('admin','staff','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ngay_sinh` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  `last_ping_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten`, `diem_tich_luy`, `email`, `email_verified_at`, `mat_khau`, `so_dien_thoai`, `anh_dai_dien`, `vai_tro`, `dia_chi`, `ngay_sinh`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `is_online`, `last_ping_at`) VALUES
(1, 'admin\r\n', 0, 'admin@gmail.com', NULL, '$2y$12$BMUGb8yIdmbyn0UWNE6.7eb277yayaOtCzW6ifS3cmZMc/anu7d.G', '0123456789', NULL, 'admin', 'Hà Nội', '2004-06-12', NULL, NULL, '2025-06-20 06:16:43', '2025-08-04 14:22:00', 1, '2025-08-04 14:22:00'),
(2, 'Quân1', 999220, 'client@gmail.com', NULL, '$2y$12$rrcfAq2Jhzq84dKHysHCC.8LvN7I.FccXzukOKhY139VE6Z0uK.66', '0398030888', NULL, 'user', NULL, '2025-06-17', NULL, NULL, '2025-06-23 02:03:11', '2025-08-04 14:14:40', 0, NULL),
(5, 'Nguyễn Đức Thắng', 19480, 'NDT@gmail.com', NULL, '$2y$12$GiGNEqCAJYzJWvkrhTxVgeLO0ymxrYZFOSyEBq7YyFkP9boeJGaUa', '0399999999', NULL, 'user', NULL, '2005-02-17', NULL, NULL, '2025-07-31 15:07:58', '2025-08-07 12:45:22', 0, NULL),
(7, 'Duc Thang', 0, 'NDT172@gmail.com', NULL, '$2y$12$ubDwwcIwGXsT668KT9hVQO7Y/7ifhjU5hvTAwbNw3BeV2BUpRZ2VC', '039999999', NULL, 'user', NULL, '2025-08-03', NULL, NULL, '2025-08-03 12:07:35', '2025-08-03 12:07:35', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yeu_thichs`
--

CREATE TABLE `yeu_thichs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
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
  ADD KEY `lich_su_diem_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bai_viets`
--
ALTER TABLE `bai_viets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `danh_gia_san_phams`
--
ALTER TABLE `danh_gia_san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diem_danhs`
--
ALTER TABLE `diem_danhs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doi_quas`
--
ALTER TABLE `doi_quas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dung_luongs`
--
ALTER TABLE `dung_luongs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `lich_su_diems`
--
ALTER TABLE `lich_su_diems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag_san_phams`
--
ALTER TABLE `tag_san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tra_lois`
--
ALTER TABLE `tra_lois`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `yeu_thichs`
--
ALTER TABLE `yeu_thichs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `lich_su_diem_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
