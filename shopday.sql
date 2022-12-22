-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 15, 2022 lúc 01:33 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopday`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`) VALUES
(14, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(15, 'User', 'user1@gmail.com', '202cb962ac59075b964b07152d234b70', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `preview_text` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `name`, `img`, `content`, `preview_text`, `created_at`) VALUES
(1, 'Bộ 3 Lens Sigma Khẩu F1.4 cho máy ảnh Fujifilm X-Mount Sigma 16mm, Sigma 30, Sigma 56mm', 'hinhanh-1649983963sigma-cho-fujifilm.jpg', 'Đặc điểm nổi bật\r\n-Là một phần của dòng ống kính Contemporary trong dòng sản phẩm Global Vision của Sigma, ống kính này được thiết kế để đạt độ cân bằng giữa tính tiện nghi và hiệu suất, kết hợp thiết kế nhỏ gọn, nhẹ và - thao tác linh động với các khả năng quang học đáng chú ý.\r\n-Là ống kính prime góc rộng được thiết kế cho dòng Mirrorless Fujifilm với tiêu cự tương đương 32mm trên Full Frame.\r\n-Khẩu độ f/1.4 nhanh nâng cao khả năng chụp trong các điều kiện thiếu sáng cũng như tăng khả năng kiểm soát độ sâu trường ảnh để đạt được hiệu ứng nét chọn.\r\n-Lớp tráng phủ Super Multi-Layer Coating được áp dụng trên mỗi thấu kính giúp giảm bóng ma và lóa sáng, cho ảnh giàu tương phản và trung hòa màu sắc, kể cả trong điều kiện ngược sáng.\r\n-Động cơ AF chuyển động bước hữu dụng với cả chụp ảnh và quay video với hiệu suất nhanh, chính xác và gần như không gây tiếng ồn.\r\n-9 lá khẩu tròn cho hiệu ứng Bokeh hài hòa, đẹp mắt.\r\n-Ngàm bayonet đồng giúp cải thiện khả năng kết nối chính xác và cứng cáp với máy ảnh. Bên cạnh đó, lớp Seal cao su kết hợp trong thiết kế ngàm giúp ngàm chống bụi, chống nước văng hiệu quả.\r\nĐây là ống kính DN đầu tiên được xếp vào dòng Contemporary với kích thước nhỏ gọn 65 x 73mm và trọng lượng chỉ 265 Gram. Ống kính có thiết kế bóng bẩy với vỏ màu đen thay vì màu bạc như các ống DN khác. Đường kính filter của ống kính này có kích thước 52mm phổ biến.\r\nỐng kính có tiêu cự 30mm, cho góc nhìn tương đương 45mm trên cảm biến Full Frame khi gắn trên cảm biến APS-C và tương đương 60mm khi gắn trên cảm biến M43. Sigma cho biết cấu trúc quang học của ống kính bao gồm 9 thấu kính gom thành 7 nhóm, trong đó có 1 thấu kính phi cầu và 1 thấu kính phi cầu kép hai mặt, cho chất lượng hình ảnh tương đương với dòng ống kính ART. Ống kính này sử dụng motor lấy nét nước Stepping Motor và khoảng cách lấy nét gần nhất của ống kính này là 30cm. Khẩu độ của ống kính có độ mở lên đến f//1.4 với 9 lá khẩu tròn, cho Bokeh đẹp, tròn.', 'Sigma vừa cho ra mắt bộ 3 ống kính fix khẩu lớn F1.4 cho hệ máy ảnh Fujifilm X-Mount gồm ống kính Sigma 16mm F1.4 cho Fujifilm, Sigma 30mm F1.4 cho Fujifilm, Sigma 56mm F1.4 Cho fujifilm ', '2022-04-15 00:52:43'),
(2, 'Canon EOS R5 C : Video 8K không giới hạn', 'hinhanh-1649984087canon-r5c.png', 'Có vẻ như R5C là giải pháp toàn diện cho điện ảnh hơn là một thiết bị máy ảnh thông thường.\r\nR5C có cảm biến FullFrame kết hợp tính năng ổn định hình ảnh trong thân máy (IBIS) và một hệ thống làm mát chạy bằng quạt mang lại khả năng quay Video 8K gần như vô hạn, chỉ cần bạn đủ pin và thẻ nhớ đủ dung lượng.\r\n\r\nCanon EOS R5 C cũng có các chế độ chụp ảnh và Video tĩnh. Khi đang ở chế độ ẢNH, bạn hoàn toàn không thể quay Video và ngược lại. Thay vào đó, khi chuyển đổi giữa hai chế độ này, máy ảnh sẽ tắt và khởi động lại vào chế độ mà bạn đã chọn. R5 C có khả năng quay Video thô 8K / 25p RAW trong 50 phút hoặc Video 4K / 50p trong 35-40 phút.\r\nMáy sử dụng một thẻ CFexpress Loại B 512GB và một khe thẻ SD tiêu chuẩn. Người dùng có tùy chọn các định dạng như Cinema Raw Light, một định dạng nén để quay Video lâu hơn. Nếu cắm điện, EOS R5 C thậm chí có thể quay Video 8K / 60p.\r\nEOS R5 dùng ngàm ống kính RF, cảm biến CMOS 45MP, kính ngắm điện tử 5,76 triệu điểm và màn hình cảm ứng phía sau 3,2 inch. Bộ xử lý dùng chung Digic X nhưng Canon có tinh chỉnh một chút cho mỗi máy.\r\nCác chế độ lấy nét tự động của EOS R5 C thay đổi tùy thuộc vào việc bạn đang chụp ảnh tĩnh hay quay Video. Ở chế độ ảnh, bạn có Dual Pixel CMOS AF II thông thường nhưng ở chế độ Video, nó sẽ chuyển sang Dual Pixel CMOS AF tiêu chuẩn giống Canon EOS C70, nó sẽ thiếu khả năng theo dõi động vật hoặc đua xe do những nhà làm phim chuyên nghiệp họ vốn chẳng cần tính năng lấy nét tự động trong những tình huống này.', 'Canon EOS R5 C là một chiếc EOS R5 có kích thước siêu lớn với khả năng làm mát tối ưu quay Video 8K không giới hạn.', '2022-04-15 00:54:47'),
(3, 'Máy quay Gopro Hero 10 Black với cảm biến là 23MP, quay video 4k120, 1080p Live Streaming', 'hinhanh-1649984281hero-10-1.jpg', 'Máy Quay GoPro Hero 10 được xem là chiếc Action Camera tốt nhất hiện nay sở hữu con chip GP2 thế hệ mới nhất, cho khả năng quay video ở độ phân giải 5K, ảnh 23MP, sắc nét và chân thực ngay cả trong tình trạng thiếu sáng. Công nghệ chống rung HyperSmooth 4.0 ngang ngửa những chiếc Gimbal hiện đại. Khả năng chống thấm nước, chịu bền dưới thời tiết khắc nghiệt ở mọi chế độ giúp tạo ra những khung hình chất lượng cao.\r\nBộ xử lý chip GP2 thế hệ mới\r\nGoPro Hero 10 sở hữu con chip GP2  đời mới nhất vô cùng mạnh mẽ, cho phép máy hoạt động ổn định, êm ái với hiệu năng cao nhất từ trước đến nay của dòng GoPro. Chiếc camera hành trình này cho phép tăng gấp đôi tốc độ khung hình cho cảnh quay mượt mà, đồng thời tốc độ điều khiển cảm ứng cũng được tăng độ nhạy, khắc phục hoàn toàn tình trạng phản hồi chậm đã từng xảy ra trên GoPro 9.\r\nQuay Video độ phân giải 5K\r\nGoPro Hero 10 được nâng cấp về chất lượng hình ảnh vượt trội hơn hẳn người anh em GoPro 9 trước đó. Với độ phân giải cảm biến là 23MP, độ phân giải Video đạt 5.3K ở tốc độ 60 khung hình/giây, GoPro Hero 10 có khả năng tăng gấp đôi tốc độ khung hình cho chuyển động mượt mà, hình ảnh sắc nét đáng kinh ngạc. Bên cạnh đó, GoPro Hero 10 cũng được trang bị tính năng quay chậm 8x Slo-Mo ở độ phân giải 2.7K. Đặc biệt hơn, chiếc action camera này còn cho phép người dùng tạm dừng video và chuyển sang chế độ chụp ảnh tĩnh chất lượng 15.8MP từ video độ phân giải 5.3K, đảm bảo hình ảnh của bạn vẫn giữ được độ sắc nét cực cao. ', 'Nâng cấp những tính năng mới hơn, mạnh hơn, GoPro Hero 10 với những cải tiến mạnh mẽ không chỉ là kiểu dáng thiết kế mà còn là những tính năng hỗ trợ quay phim, chụp ảnh, đặc biệt là các hoạt động Selfie hoặc quay Vlog.', '2022-04-15 00:58:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cat`
--

INSERT INTO `cat` (`id`, `name`, `id_parent`) VALUES
(1, 'Máy ảnh', 0),
(2, 'Ống kính', 0),
(3, 'Phụ Kiện', 0),
(4, 'Đồ chơi công nghệ', 0),
(5, 'Máy ảnh Canon', 1),
(6, 'Máy ảnh Nikon', 1),
(7, 'Máy ảnh Sony', 1),
(8, 'Ống kinh Canon', 2),
(9, 'Ống kính Sony', 2),
(10, 'Ống kính Sigma', 2),
(11, 'Ống kính Tamron', 2),
(12, 'Bảng Vẽ Điện Tử', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `content`) VALUES
(66, 'Đức', 'duc@gmail.com', '0911354558', ''),
(67, 'Đức', 'duc@gmail.com', '0911354558', ''),
(68, 'Đức', 'duc@gmail.com', '0999999999', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`) VALUES
(3, 'Đức', 'duc@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_products`
--

CREATE TABLE `img_products` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `img_products`
--

INSERT INTO `img_products` (`id`, `id_sp`, `img`) VALUES
(1, 0, 'hinhanh-1649950151a1.png'),
(2, 0, 'hinhanh-1649950151a2.jpg'),
(3, 0, 'hinhanh-1649950151a3.jpg'),
(4, 0, 'hinhanh-1649950151a4.jpg'),
(5, 1, 'hinhanh-1649950687a1.png'),
(6, 1, 'hinhanh-1649950687a2.jpg'),
(7, 1, 'hinhanh-1649950687a3.jpg'),
(8, 1, 'hinhanh-1649950687a4.jpg'),
(9, 2, 'hinhanh-1649950988'),
(10, 2, '1649951125canon-eos-6d-mark-ii.jpg'),
(11, 2, '1649951125may-anh-canon-6d-ii.jpg'),
(12, 2, '1649951125may-anh-canon-6d-mark-ii.jpg'),
(13, 2, '1649951125nap-the-canon-6d-2.jpg'),
(14, 3, 'hinhanh-1649951249s1.jpg'),
(15, 3, 'hinhanh-1649951249s2.jpg'),
(16, 3, 'hinhanh-1649951249s3.jpg'),
(17, 3, 'hinhanh-1649951249s4.jpg'),
(18, 3, 'hinhanh-1649951249s5.jpg'),
(19, 4, 'hinhanh-1649951386c1.jpg'),
(20, 4, 'hinhanh-1649951386c2.jpg'),
(21, 4, 'hinhanh-1649951386c3.jpg'),
(22, 4, 'hinhanh-1649951386c4.jpg'),
(23, 5, 'hinhanh-1649951528z1.jpg'),
(24, 5, 'hinhanh-1649951528z2.jpg'),
(25, 5, 'hinhanh-1649951528z3.jpg'),
(26, 5, 'hinhanh-1649951528z4.jpg'),
(27, 6, 'hinhanh-1649951657zz1.jpg'),
(28, 6, 'hinhanh-1649951657zz2.jpg'),
(29, 6, 'hinhanh-1649951657zz3.jpg'),
(30, 6, 'hinhanh-1649951657zz4.jpg'),
(31, 6, 'hinhanh-1649951657zz5.jpg'),
(32, 7, 'hinhanh-1649951777aa1.jpg'),
(33, 7, 'hinhanh-1649951777aa2.jpg'),
(34, 7, 'hinhanh-1649951777aa3.jpg'),
(35, 7, 'hinhanh-1649951777aa4.jpg'),
(36, 8, 'hinhanh-1649951889dd1.jpg'),
(37, 8, 'hinhanh-1649951889dd2.jpg'),
(38, 8, 'hinhanh-1649951889dd3.jpg'),
(39, 8, 'hinhanh-1649951889dd4.jpg'),
(40, 9, 'hinhanh-1649952006x1.jpg'),
(41, 9, 'hinhanh-1649952006x2.jpg'),
(42, 9, 'hinhanh-1649952006x3.jpg'),
(43, 9, 'hinhanh-1649952006x4.jpg'),
(44, 10, 'hinhanh-1649952111n1.jpg'),
(45, 10, 'hinhanh-1649952111n2.jpg'),
(46, 10, 'hinhanh-1649952111n3.jpg'),
(47, 10, 'hinhanh-1649952111n4.jpg'),
(48, 11, 'hinhanh-1649952281nk1.jpg'),
(49, 11, 'hinhanh-1649952281nk2.jpg'),
(50, 11, 'hinhanh-1649952281nk3.jpg'),
(51, 11, 'hinhanh-1649952281nk4.jpg'),
(52, 12, 'hinhanh-1649952393sn1.jpg'),
(53, 12, 'hinhanh-1649952393sn2.png'),
(54, 12, 'hinhanh-1649952393sn3.png'),
(55, 12, 'hinhanh-1649952393sn4.jpg'),
(56, 13, 'hinhanh-1649981415sony-a1.jpg'),
(57, 13, 'hinhanh-1649981415sony-a2.jpg'),
(58, 13, 'hinhanh-1649981415sony-a3.jpg'),
(59, 13, 'hinhanh-1649981415sony-a4.jpg'),
(60, 14, 'hinhanh-1649981588sony-aa7.jpg'),
(61, 14, 'hinhanh-1649981588sony-ab7.jpg'),
(62, 14, 'hinhanh-1649981588sony-ac7.jpg'),
(63, 14, 'hinhanh-1649981588sony-ad7.jpeg'),
(64, 15, 'hinhanh-1649981749q1.jpg'),
(65, 15, 'hinhanh-1649981749q2.png'),
(66, 15, 'hinhanh-1649981749q3.png'),
(67, 15, 'hinhanh-1649981749q4.png'),
(68, 16, 'hinhanh-1649981870f1.jpg'),
(69, 16, 'hinhanh-1649981870f2.png'),
(70, 16, 'hinhanh-1649981870f3.jpg'),
(71, 16, 'hinhanh-1649981870f4.jpg'),
(72, 17, 'hinhanh-1649982033sony-a6000-trang.jpg'),
(73, 17, 'hinhanh-1649982033sony-a6000-trang1.jpg'),
(74, 17, 'hinhanh-1649982033sony-a6000-trang2.jpg'),
(75, 17, 'hinhanh-1649982033sony-a6000-trang3.jpg'),
(76, 18, 'hinhanh-1649982188ok1.jpg'),
(77, 18, 'hinhanh-1649982188ok2.jpg'),
(78, 18, 'hinhanh-1649982188ok3.jpg'),
(79, 18, 'hinhanh-1649982188ok4.jpg'),
(80, 0, 'hinhanh-1649982301l1.jpg'),
(81, 0, 'hinhanh-1649982301l2.jpg'),
(82, 0, 'hinhanh-1649982301l3.jpg'),
(83, 0, 'hinhanh-1649982301l4.jpg'),
(84, 0, 'hinhanh-1649982387l1.jpg'),
(85, 0, 'hinhanh-1649982387l2.jpg'),
(86, 0, 'hinhanh-1649982387l3.jpg'),
(87, 0, 'hinhanh-1649982387l4.jpg'),
(88, 0, 'hinhanh-1649982456l1.jpg'),
(89, 0, 'hinhanh-1649982456l2.jpg'),
(90, 0, 'hinhanh-1649982456l3.jpg'),
(91, 0, 'hinhanh-1649982456l4.jpg'),
(92, 19, 'hinhanh-1649982585canon-50-stm-va-ngam-viltrox.jpeg'),
(93, 19, 'hinhanh-1649982585canon-50-stm-va-ngam-viltrox1.jpg'),
(94, 19, 'hinhanh-1649982585canon-50-stm-va-ngam-viltrox2.jpg'),
(95, 19, 'hinhanh-1649982585canon-50-stm-va-ngam-viltrox3.jpg'),
(96, 20, 'hinhanh-1649982740canon-100-400.jpg'),
(97, 20, 'hinhanh-1649982740canon-100-4002.jpg'),
(98, 20, 'hinhanh-1649982740canon-100-4003.jpg'),
(99, 20, 'hinhanh-1649982740canon-100-4005.jpg'),
(100, 0, 'hinhanh-1649982893nikon-z-28-75mm.jpg'),
(101, 0, 'hinhanh-1649982893nikon-z-28-75mm-1.jpg'),
(102, 0, 'hinhanh-1649982893nikon-z-28-75mm-2.jpg'),
(103, 21, 'hinhanh-1649983055sigma-30mm-for-sony-emount.jpg'),
(104, 21, 'hinhanh-1649983055sigma-30mm-for-sony-emount1.png'),
(105, 21, 'hinhanh-1649983055sigma-30mm-for-sony-emount2.jpg'),
(106, 22, 'hinhanh-1649983183sigma-18-50-cho-sony.jpeg'),
(107, 22, 'hinhanh-1649983183sigma-18-50-cho-sony2.jpg'),
(108, 22, 'hinhanh-1649983183sigma-18-50-cho-sony3.jpg'),
(109, 22, 'hinhanh-1649983183sigma-18-50-cho-sony4.jpg'),
(110, 0, 'hinhanh-1649983348tamron-35-f-1-4-di-usd.jpg'),
(111, 0, 'hinhanh-1649983348tamron-35-f-1-4-di-usd1.jpg'),
(112, 0, 'hinhanh-1649983348tamron-35-f-1-4-di-usd2.jpg'),
(113, 0, 'hinhanh-1649983348tamron-35-f-1-4-di-usd3.jpg'),
(114, 23, 'hinhanh-1649983613sigma-30mm-for-sony-emount1.png'),
(115, 23, 'hinhanh-1649983613sigma-30mm-for-sony-emount2.jpg'),
(116, 23, 'hinhanh-1649983613tamron-35-f-1-4-di-usd.jpg'),
(117, 0, 'hinhanh-1649983709sigma-30mm-for-sony-emount.jpg'),
(118, 0, 'hinhanh-1649983709sigma-30mm-for-sony-emount1.png'),
(119, 0, 'hinhanh-1649983709sigma-30mm-for-sony-emount2.jpg'),
(120, 0, 'hinhanh-1649983776sigma-30mm-for-sony-emount1.png'),
(121, 0, 'hinhanh-1649983776sigma-30mm-for-sony-emount2.jpg'),
(122, 0, 'hinhanh-1649983776tamron-35-f-1-4-di-usd3.jpg'),
(123, 24, 'hinhanh-1649983852xp-pen-deco-03.jpg'),
(124, 24, 'hinhanh-1649983852xp-pen-deco-03-1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `id_customer`, `phone`, `address`, `created_at`, `status`) VALUES
(1, 3, '0999999999', 'việt nam', '2022-04-15 01:20:12', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_sp`, `qty`, `price`) VALUES
(1, 24, 1, 42000000),
(1, 10, 1, 31600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `sp_hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_cat`, `name_product`, `image`, `price`, `qty`, `preview`, `detail`, `sp_hot`) VALUES
(1, 5, 'Canon EOS M200 + Kit 15-45mm, Mới 99% / Fullbox', 'hinhanh-1649950687a1.png', 10990000, 101, 'Bảo hành:\r\n06 tháng (Bao test đổi trả trong 07 ngày đầu)\r\nPhụ kiện đi kèm:\r\nThân máy, Ống kính, Pin, Sạc, Dây đeo, Cáp usb, Cáp AV, Hộp, Sách', '- Cảm biến APS-C CMOS 24,1MP\r\n- Bộ xử lý hình ảnh DIGIC 8\r\n- Tốc độ chụp liên tiếp tối đa tới 6,1 hình/giây\r\n- Màn hình LCD cảm ứng 3\" 1.04 triệu điểm, lật lên 180 độ\r\n- Quay phim 4K lên đến 25 fps, FHD 60p, HD 120p\r\n- Hệ thống lấy nét tự động Dual Pixel CMOS AF, tối đa tới 143 điểm AF\r\n- ISO 100-25600 (mở rộng đến 51200)\r\n- Cổng kết nối: Mini HDMI, Mini USB\r\n- Thẻ SD\r\n- Pin: LP-E12, chụp tối đa tới 305 hình khi sạc đầy pin\r\n- Tích hợp Wi-Fi và Bluetooth\r\n- Kích thước: 108 x 67 x 35 mm\r\n- Trọng lượng: 299g', 1),
(2, 5, 'Canon 6D Mark II (Body), Mới 100%', 'hinhanh-1649951124may-anh-canon-6d-mark-ii.jpg', 35000000, 10, 'Bảo hành:\r\n24 tháng chính hãng LBM\r\nPhụ kiện đi kèm:\r\nThân máy, Pin, sạc, dây đeo, hộp, sách, cáp USB, cáp AV', 'Bộ cảm biến CMOS 26.2MP Fullframe \r\nBộ xử lý hình ảnh DIGIC 7\r\nHệ thống AF 45 điểm\r\nVideo Full HD ở tốc độ 60 khung hình/giây\r\nMàn hình cảm ứng LCD 3.0 inch\r\nISO 40.000, được mở rộng theo lên 102.400\r\nChụp 6.5 khung hình/giây\r\nCó Wi-Fi với NFC và GPS, Bluetooth tích hợp', 1),
(3, 5, 'Canon M50 Mark II + 15-45mm (Màu đen), Mới 100%', 'hinhanh-1649951249s1.jpg', 20000000, 10, 'Bảo hành:\r\n24 tháng Chính Hãng Lê Bảo Minh\r\nPhụ kiện đi kèm:\r\nThân máy, Pin, Sạc, Dây đeo, hộp, sách, dĩa', '\r\nCảm biến CMOS APS-C 24.1MP, (1.6x Crop Factor)\r\nChip xử lý DIGIC 8\r\nLấy nét Dual Pixel CMOS AF với Eye Detect AF\r\nQuay video UHD 4K, HD 720p120, FullHD, SloMotion 120p\r\nTốc Độ Màn Trập : 1/4000 - 30s\r\nTốc Độ Chụp Liên Tục : 10 fps - 24.2 MP\r\nChống Rung quang học IBIS Digital, 5-Axis\r\nISO : 100-25600\r\nSố Điểm Lấy Nét : 143\r\nKính EVF 0.39\" với 2,360,000 điểm ảnh bao phủ 100%\r\nMàn hình LCD xoay lật cảm ứng 3inch 1,040,000 điểm ảnh\r\nKhe Cắm Thẻ Nhớ : SD/SDHC/SDXC (UHS-I)\r\nWi-Fi, Bluetooth\r\nPin Lithium-ion LP-E12, 7.2 VDC, 875 mAh chụp được 235 file\r\nKích Thước : 116.3 * 88.1 * 58.7 mm\r\nTrọng Lượng : 387Gram', 1),
(4, 5, 'Canon EOS M6 Mark II + 15-45mm STM, Mới 100%', 'hinhanh-1649951386c1.jpg', 23000000, 10, 'Bảo hành:\r\n24 tháng chính hãng Lê Bảo Minh\r\nPhụ kiện đi kèm:\r\nThân máy, Pin, Sạc, Dây đeo, Hộp, Sách, Dĩa', '\r\nCảm biến : CMOS APS-C 32.5MP\r\nBộ xử lý hình ảnh : Digic 8\r\nChụp liên tiếp : 14fps (AE/AF), 30fps RAW \r\nDải ISO : 100-26500\r\nQuay video : 4K/30p, 1080/120p Slow Motion\r\nDual Pixel AF với nhận diện mắt Eye Detection\r\nEye AF\r\nAF có khả năng giảm xuống -5 EV\r\nKính ngắm OLED có thể tháo rời\r\nKích thước : 119.6 x 70.0 x 49.2 mm\r\nTrọng lượng Body : 408Gr', 1),
(5, 5, 'Canon EOS M6 Mark II (Body), Mới 100%', 'hinhanh-1649951528z1.jpg', 20000000, 10, 'Bảo hành:\r\n24 tháng chính hãng LBM\r\nPhụ kiện đi kèm:\r\nThân máy, Pin, Sạc, Dây đeo, Hộp, Sách, Dĩa', 'Cảm biến : CMOS APS-C 32.5MP\r\nBộ xử lý hình ảnh : Digic 8\r\nChụp liên tiếp : 14fps (AE/AF), 30fps RAW \r\nDải ISO : 100-26500\r\nQuay video : 4K/30p, 1080/120p Slow Motion\r\nDual Pixel AF với nhận diện mắt Eye Detection\r\nEye AF\r\nAF có khả năng giảm xuống -5 EV\r\nKính ngắm OLED có thể tháo rời\r\nKích thước : 119.6 x 70.0 x 49.2 mm\r\nTrọng lượng Body : 408Gr', 1),
(6, 5, 'Canon EOS M3 + 15-45mm IS STM, Mới 95%, Màu Đen', 'hinhanh-1649951657zz1.jpg', 12555000, 10, 'Bảo hành:\r\n06 tháng (Bao test đổi trả trong 07 ngày đầu)\r\nPhụ kiện đi kèm:\r\nThân máy, Ống kính M14-45STM, Pin, Sạc, Dây đeo', 'Cảm biến CMOS APS-C 24.2MP,  DIGIC 6\r\nMàn hình cảm ứng LCD 3.0\" 1.040k-Dot\r\nQuay phim Full HD 1080p tại 24/24/30fps\r\nTích hợp kết nối NFC và Wifi\r\nCông nghệ lấy nét Hybrid CMOS AF với 49 điểm\r\nISO 100-12800, mở rộng 25600', 1),
(7, 6, 'Nikon D750 (Body), Mới 100%', 'hinhanh-1649951777aa1.jpg', 17900000, 10, 'Bảo hành:\r\n12 tháng Chính Hãng VIC Vietnam\r\nPhụ kiện đi kèm:\r\nThân máy, Pin lithium-lon, Sạc pin, Dây đeo, hộp, sách', 'Màn hình RGB 3.2-inch, 1.2 triệu điểm ảnh hỗ trợ lật xoay nghiêng\r\nVỏ thiết kế chống nước, bụi bặm - Mới, hệ thống gương mới toanh, cơ cấu màn trập cũng mới\r\n51 điểm lấy nét - Hệ thống đo sáng RGB sensor với 91,000 pixels\r\nTốc độ chụp 6.5 frames/s\r\n24.3-megapixel FX-format CMOS sensor\r\nBộ xử lý ảnh mới nhất EXPEED 4 - Dải ISO 100-12,800 (mở rộng 50-51200)', 1),
(8, 6, 'Nikon D780, Mới 100% (Chính hãng VIC)', 'hinhanh-1649951889dd1.jpg', 49000000, 10, 'Bảo hành:\r\n12 tháng chính hãng Nikon VIC\r\nPhụ kiện đi kèm:\r\nBody Nikon D780, Pin, Sạc, Dây Đeo, Hộp, Sách', 'Cảm biến cải tiến 24MP BSI FX\r\nMàn hình LCD cảm ứng nghiêng 3,2\" với 2.100.000 điểm\r\nBộ xử lý hình ảnh EXPEED 6 mạnh mẽ\r\nHiệu suất ISO được cải thiện\r\nKhe cắm thẻ SD kép UHS-II\r\nCải thiện chụp ảnh RAW fps\r\n4K UHD ở 24-30 khung hình/giây, 1080p ở 24-120 khung hình/ giây\r\nWi-Fi và Bluetooth tích hợp\r\nPin sạc Lithium-Ion EN-EL15b\r\nKích thước : 143.5 x 115.5 x 76 mm\r\nTrọng lượng : 840 Gram', 0),
(9, 6, 'Nikon Z50 (Body), Mới 100%', 'hinhanh-1649952006x1.jpg', 21490000, 10, 'Bảo hành:\r\n12 tháng tại Mayanh24h.\r\nPhụ kiện đi kèm:\r\nBody Nikon Z50, Pin, Sạc, Dây Đeo, Hộp, Sách', 'Định dạng : Nikon APS-C Z-Mount\r\nCảm biến : CMOS DX 20,9MP\r\nBộ xử lý hình ảnh EXPEED 6\r\nKính ngắm điện tử EVF OLED 2.360K Dot\r\nHệ thống Hybrid AF 209 điểm bao phủ 90% khung ảnh\r\nISO : 100-51,200\r\nVideo 4K 30fps & Full HD 1080\r\nMàn hình LCD 3\" lật 180° cảm ứng 1040k-Dot\r\nEye AF thông minh\r\nChụp liên tục 11 fps/giây\r\n1 khe thẻ SD, Wifi, Bluetooth\r\nPin sạc Lithium EN-EL25 dung lượng 1.120 mAh\r\nKích thước : 126.5 x 93.5 x 60 mm\r\nTrọng lượng : 395Gram\r\n ', 1),
(10, 6, 'Nikon Z6 + FTZ Mount Adapter, Mới 100%', 'hinhanh-1649952111n1.jpg', 31600000, 10, 'Bảo hành:\r\n12 tháng chính hãng Nikon VIC\r\nPhụ kiện đi kèm:\r\nThân máy Nikon Z6, Pin Nikon EL-15b, Sạc MH-25A, Dây đeo AN-DC19, Cáp USB, Hộp, Sách, Phiếu bảo hành', 'Cảm biến backside illuminated CMOS 35.9×23.9mm (Nikon FX format).\r\nĐộ phân giải: 24.5MP Số điểm lấy nét: 273 AF.\r\nTốc độ chụp liên tục: 12 fps ISO: 100-51200.\r\nMàn hình 3.2\" cảm ứng, 2.1triệu điểm ảnh xoay nghiêng, góc nhìn 170°.\r\nChống rung 5 trục : Hybrid PDAF.\r\nQuay video : 4K UHD 30p Video, 8K time lapse, FullHD 120p.\r\nPin theo máy: EN-EL15b, Sử dụng thẻ nhớ XQD.\r\nTích hợp Wi-Fi, Bluetooth, Khả năng chống chịu thời tiết.\r\nTrọng lượng :  675 g.', 1),
(11, 6, 'Nikon D850 (Body), Mới 100%', 'hinhanh-1649952281nk1.jpg', 64000000, 10, 'Bảo hành:\r\n12 tháng chính hãng Nikon VIC\r\nPhụ kiện đi kèm:\r\nThân máy, Pin, Sạc, Dây đeo, Hộp, Sách, Dĩa', 'Bộ cảm biến CMOS FX-Format BMP 45.7MP\r\nBộ xử lý hình ảnh EXPEED 5 \r\nMàn hình cảm ứng LCD 3.2 \"2.36m-Dot\r\nVideo 4K UHD ở tốc độ 30 khung hình/giây, time-lapse 8K\r\nHệ thống AFF 153 điểm đa điểm CAM 20K\r\nTiêu chuẩn ISO: 64-25600, mở rộng: 32-102400\r\n7 khung hình / giây cho 51 khung hình với AE / AF\r\nTích hợp SnapBridge Bluetooth và Wi-Fi', 0),
(12, 7, 'Sony A7C (Màu đen), Mới 98%', 'hinhanh-1649952393sn1.jpg', 38500000, 10, 'Bảo hành:\r\n12 tháng Chính hãng Sony VN\r\nPhụ kiện đi kèm:\r\nThân máy, Pin, Sạc, Dây đeo, Hộp, Sách, Đĩa, Cáp USB, Nắp Body', 'Cảm biến Exmor R BSI 24.2MP Full-Frame, Chip BIONZ X\r\nVideo UHD 4K30p với Gammas HLG & S-Log3\r\nĐộ phân giải : 6000 x 4000\r\nISO : 100-51200 (mở rộng 50-204800)\r\nChống rung : 5 trục\r\nLấy nét tự động : Tương phản, Theo pha, Chạm, AF Tracking, Live View....\r\nSố điểm lấy nét theo pha : 693, điểm ảnh tương phản : 425\r\nMàn hình xoay lật, TFT LCD cảm ứng 921,600 Diot\r\nKhung ngắm điện tử, độ phủ 100%\r\nTốc độ màn trập tối đa : 1/4000 giây, màn trập điện tử : 1/8000 giây\r\nChụp liên tục : 10hình / giây\r\nĐịnh dạng video : MPEG-4, XAVC S, H.264, UHD 4K, Full HD\r\nThẻ nhớ hỗ trợ : SD/SDHC/SDXC\r\nKết nối : USB, HDMI, Micro HDMI, Wifi + Bluetooth + NFC\r\nChất liệu Body : Hợp kim Magie, Thiết kế chống chịu thời tiết\r\nPin Lithium-ion NP-FZ100, thời lượng : 740 ảnh\r\nKích thước : 124 x 71 x 60 mm\r\nTrọng lượng : 509Gram', 1),
(13, 7, 'Sony Alpha A9 Mark II, Mới 100%', 'hinhanh-1649981415sony-a1.jpg', 99990000, 10, 'Bảo hành:\r\n24 tháng Chính hãng Sony VN\r\nPhụ kiện đi kèm:\r\nBody Sony Alpha A9 II, Pin, Sạc, Dây đeo, Cáp Micro USB, Hướng dẫn sử dụng', 'Định dạng : Sony E-Mount FullFrame\r\nĐiểm ảnh Thực tế : 28,3 MP\r\nCảm biến Stacked BSI-CMOS, Bộ xử lý hình ảnh BIONZ X & LSI Front-End\r\n693 điểm lấy nét theo pha, 425 điểm tương phản bao phủ 94% cảm biến\r\nChống rung 5 trục\r\nISO : 100 - 51,2009 (Mở rộng đến 204,800)\r\nChụp liên tục : Lên đến 20 khung hình / giây ở 24,2 MP\r\nMàn hình LCD cảm ứng lật 3\" 1,440K Dot\r\nTốc độ đồng bộ tối đa: 1/250s\r\nVideo : UHD 4K XAVC, AVCHD, Full HD\r\nChế độ lấy nét : AF-C, AF-S, DMF, M\r\nBluetooth, Wi-Fi\r\nPin sạc Lithium-Ion NP-FZ100 7.2 VDC, 2280 mAh (xấp xỉ 500 Shots)\r\nKích thước : 128,9 x 96,4 x 77,5 mm\r\nTrọng lượng : 678 Gram', 0),
(14, 7, 'Sony Alpha A7 Mark II + FE 28-70mm OSS', 'hinhanh-1649981588sony-aa7.jpg', 29900000, 10, 'Bảo hành:\r\n24 Tháng Chính Hãng Sony VN\r\nPhụ kiện đi kèm:\r\nThân máy, ống kính 28-70mm, Pin, adapter sạc, cáp usb, hộp, sách, dĩa', '\r\nCảm biến CMOS Exmor 24.3MP Fulframe\r\nBộ xử lý hình ảnh BIONZ X\r\nVideo XAVC S 50 Mbps, AVCHD 2.0 28 Mbps, 1.920 x 1.080pixel\r\nChụp liên tiếp: 2,5 hình/giây đến 5 hình/giây\r\nTích hợp Wi-Fi và công nghệ NFC\r\nISO 100-25.600 (mở rộng tới ISO 50-51.200)\r\nTích hợp kết nối Wi-Fi ', 1),
(15, 7, 'Sony alpha A1, Mới 100% (Chính Hãng)', 'hinhanh-1649981749q1.jpg', 155000000, 10, 'Bảo hành:\r\n24 tháng (Chính hãng Sony Việt Nam)\r\nPhụ kiện đi kèm:\r\nThân máy, Pin, Sạc, Dây đeo, Hộp, Sách', 'Cảm biến Fullframe 50PM Exmor RS BSI CMOS Sensor\r\nBộ xử lý hình ảnh BIONZ X & LSI Front-End\r\nDynamic range 15-stop\r\nISO : 100–32000 ( mở rộng lên đến 102400)\r\nChống rung quang học 5,5 trục\r\nChụp 30 khung hình / giây với theo dõi AF / AE đầy đủ\r\nHệ thống lấy nét theo pha 759 điểm\r\nReal time Eye AF (Ảnh tĩnh / quay phim / người / động vật)\r\nReaal time tracking\r\nQuay phim 8K30p Video, 4K 120p Video in 10-Bit\r\n4.3K 16-Bit Raw Video Output, S-Cinetone\r\nKính ngắm điện tử : OLED UXGA 1.3cm 9,437,184 Diot\r\nMàn hình LCD cảm ứng nghiêng\r\nKhe thẻ kép : CFexpress, SD\r\nPin FZ100, tuổi thọ : 430 Shot\r\nWi-Fi tốc độ cao, Bluetooth, PC Remote, truyền file FTP, USB.....\r\nNâng cấp khả năng chống bụi và chống ẩm\r\nKích thước : 128,9 * 96,9 * 69,7 mm\r\nTrọng lượng : 737Gram', 0),
(16, 7, 'Sony FX3, Mới 100% ( Chính hãng )', 'hinhanh-1649981870f1.jpg', 92490000, 10, 'Bảo hành:\r\n24 tháng chính hãng Sony\r\nPhụ kiện đi kèm:\r\nThân máy, pin, Sạc, Dây đeo, Hộp, Sách', 'Cảm biến Full-Frame CMOS Exmor R 10.2MP\r\nUHD 4K 120 | 1080p 240\r\n10-Bit 4:2:2 XAVC S-I,16-Bit Raw Output\r\nISO : 80-102.400, mở rộng đến 409.600\r\nChống rung 5 trục\r\nS-Log 3 với 15 Stop trên dải động rộng\r\nVideo 4K 60p liên tục nhờ hệ thống thông gió và quạt làm mát\r\nPicture Profile S-Cinetone\r\n627 điểm lấy nét tự động khi quay Video\r\nGiảm hiệu ứng màn trập rung lắc\r\nĐiều khiển thân thiện với người dùng\r\nĐèn kiểm soát lấy nét\r\nĐầu vào âm thanh XLR\r\nTay cầm XLR đi kèm\r\nBộ điều chỉnh zoom chuyên dụng\r\nKích thước : 129.7 * 84.5 * 77.8 mm\r\nTrọng lượng : 640Gram', 0),
(17, 5, 'Sony A6000 + Kit 16-50mm (Màu trắng)', 'hinhanh-1649982033sony-a6000-trang.jpg', 10900000, 10, 'Bảo hành:\r\n12 tháng Sony VN (Bao test đổi trả trong 07 ngày đầu)\r\nPhụ kiện đi kèm:\r\nThân máy, Ống kính 16-50mm, adapter sạc, Pin, Hộp, Sách', '\r\nCảm biến 24,3MP HD CMOS\r\nLấy nét siêu nhanh chỉ 0,06 giây nhờ hệ thống Hybrid AF\r\nĐược nâng cấp lên 11fps ở chế độ chụp liên tiếp\r\nSử dụng pin NP-FW50\r\nSử dụng dual-format card slot cùng với khả năng kết nối wifi, NFC và HDMI\r\nChip xử lý BIONZ X', 1),
(18, 8, 'Canon EF 40mm f/2.8 STM, Mới 100%', 'hinhanh-1649982188ok1.jpg', 3900000, 10, 'Bảo hành:\r\n12 Tháng\r\nPhụ kiện đi kèm:\r\nỐng kính, Cáp Trước, Cáp Sau', 'Tiêu cự: 40mm, Khẩu độ lớn nhất: F2.8\r\nSố lá khẩu: 7, Đường kính filter: 52mm\r\nLấy nét trong bằng Stepper Motor\r\nKhoảng lấy nét gần nhấn: 30cm\r\nCó lớp tráng \"Super spectra coatings\" giúp giảm hiện tượng bóng ma, lóa', 0),
(19, 8, 'Canon EF 50mm f/1.8 STM', 'hinhanh-1649982585canon-50-stm-va-ngam-viltrox.jpeg', 42000000, 10, 'Phụ kiện đi kèm:\r\nỐng kính, Cáp trước, Cáp sau, Hộp, Sách, Ngàm Viltrox EOS M', 'Ống kính Canon 50STM cùng Ngàm Viltrox sử dụng tốt lấy nét tự động trên các dòng máy Canon EOS M (M3, M10, M5, M50...)\r\nNgàm EF sử dụng cho Fullframe và Crop\r\nKhẩu mở lớn nhất F1.8\r\nLớp phủ ống kính được tối ưu hóa cho hình ảnh chất lượng\r\nHổ trợ AF và quay movie nhanh với STM\r\nNgàm tiếp xúc với máy ảnh bằng kim loại', 0),
(20, 8, 'Canon EF 100-400mm F4.5-5.6L IS II USM', 'hinhanh-1649982740canon-100-400.jpg', 31600000, 10, 'Phụ kiện đi kèm:\r\nỐng Kính, Cáp Trước, Cáp Sau, Hood Zin, Túi Zin, Hộp, Sách', 'Ngàm EF / Full frame\r\nKhẩu độ : f/4.5 - f/38\r\n9 lá khẩu tròn\r\nCấu tạo quang học : 21 thấu kính / 16 nhóm\r\nGồm 1 thấu kính Fluorite & 1 thấu kính Super UD\r\nTráng phủ Air Sphere\r\nHệ thống Motor AF Ultrasonic dạng vòng\r\nỔn định hình ảnh quang học\r\nVòng xoay zoom & torque\r\nCấu trúc kháng thời tiết, phủ Fluorine\r\nĐế Cola Ring xoay, tháo rời được\r\nĐường kính Filter : 77mm\r\nKích thước : 94 x 193mm\r\nTrọng lượng : 1640Gram', 0),
(21, 10, 'Sigma 30mm f/1.4 DC DN Contemporary for Fujifilm', 'hinhanh-1649983055sigma-30mm-for-sony-emount.jpg', 6100000, 10, 'Bảo hành:\r\n24 Tháng Chính Hãng Shriro\r\nPhụ kiện đi kèm:\r\nỐng kính, Cáp trước, Cáp sau, Hood, Hộp, Sách', 'Định dạng : Fujifilm X-Mount, Thể loại Lens góc rộng\r\nMotor lấy nét bước AF\r\nLớp phủ Multi Coating \r\nKhẩu độ : f/1.4 - f/16\r\n9 lá khẩu tròn\r\nGóc nhìn: 50.7°\r\nCấu tạo : 9 thấu kính gom thành 7 nhóm, 3 thấu kính phi cầu Aspherical\r\nĐộ phóng đại : 0.14x\r\nKhoảng cách lấy nét tối thiểu : 30cm\r\nChất liệu TSC bền bĩ, chống trầy xước\r\nĐường kính Filter : ø52mm\r\nKích thước:  65 x 73mm\r\nTrọng lượng  :  265 Gram', 0),
(22, 10, 'Sigma 18-50mm f/2.8 DC DN Contemporary for Sony APS-C', 'hinhanh-1649983183sigma-18-50-cho-sony.jpeg', 11900000, 10, 'Phụ kiện đi kèm:\r\nỐng kính, Cap trước sau, Hộp', 'Định dạng : Sony E-Mount APS-C\r\nTiêu cự : 18 - 50mm (tương đương 27 - 75mm ở định dạng 35mm)\r\nKhẩu độ : f/2.8 - f/22\r\nGóc nhìn : 76.5° - 31.7°\r\nKhoảng cách lấy nét tối thiểu : 12.1 cm\r\nĐộ phóng đại : 0.36x\r\nTỷ lệ Macro : 1:2.8\r\nCấu trúc quang học : 13 thấu kính / 10 nhóm\r\n3 thấu kính phi cầu Aspherial\r\nNhóm thấu kính phân tán SLD\r\nĐộng cơ lấy nét bước hoạt động êm ái\r\nĐộng cơ bước hỗ trợ lấy nét nhanh\r\n7 lá khẩu tròn\r\nAutofocus\r\nĐường kính Filter : φ55cm\r\nKích thước : φ64.5 * 74.5 mm\r\nTrọng lượng : 290 Gram', 0),
(23, 9, 'Sony Carl Zeiss T* FE 55mm f/1.8 ZA', 'hinhanh-1649983613sigma-30mm-for-sony-emount1.png', 23000000, 10, 'Bảo hành:\r\n12 tháng chính hãng Sony VN\r\nPhụ kiện đi kèm:\r\nỐng kính, cáp trước,cáp sau, hood, túi đựng lens', 'Ống kính prime ZEISS Cho Sony E-Mount full frame\r\nKhẩu độ tối đa F1.8\r\nLớp phủ chống phản xạ ZEISS T* giảm độ chói\r\nĐường kính Filter 49 mm\r\nKhẩu độ tròn 9 lá đem lại các hiệu ứng làm mờ đẹp mắt', 0),
(24, 12, 'Bảng Vẽ Điện Tử XP-Pen Deco 03 Wireless', 'hinhanh-1649983852xp-pen-deco-03.jpg', 42000000, 10, 'Phụ kiện đi kèm:\r\nBảng vẽ XP-Pen Deco 03, Bút PN05, 8 Ngòi bút dự phòng, Cáp USB, Đế dựng bút, Găng tay họa sĩ, Hộp', 'Kích thước vùng hoạt động : 10 x 5.62 inch (254 x 143 mm)\r\nBút cảm ứng P05 không cần pin hay sạc\r\nĐộ phân giải : 5080 LPI\r\nPhím tắt : 6 phím bấm + 1 vòng xoay Dial\r\nĐộ phản hồi : 266 RPI\r\nĐộ chính xác : 0.01 inch\r\nLực nhấn bút : 8192 level\r\nKhoảng cách nhận tín hiệu bút : 10 mm\r\nKết nối : USB Type-C\r\nTương thích : Windows 7/8/10, MacOS 10.8 trở lên\r\nChứng nhận chất lượng : FCC, CE, ROHS, Giteki, BIS, Nom', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_cmt`
--

CREATE TABLE `product_cmt` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_cmt`
--

INSERT INTO `product_cmt` (`id`, `id_customer`, `id_sp`, `content`, `date`) VALUES
(1, 3, 14, 'ok', '2022-04-15 01:09:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `img_products`
--
ALTER TABLE `img_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_cmt`
--
ALTER TABLE `product_cmt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `img_products`
--
ALTER TABLE `img_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `product_cmt`
--
ALTER TABLE `product_cmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
