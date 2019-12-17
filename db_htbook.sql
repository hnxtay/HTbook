-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 09:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_htbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) NOT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(51, 63, '2019-12-17', 330000, 'ATM', 'Nhà em gần nhà anh', 'Chờ lấy hàng', '2019-12-17 06:14:17', '2019-12-17 06:14:17'),
(49, 61, '2019-12-17', 900000, 'ATM', 'Ship nhanh len dcmmm', 'Chờ lấy hàng', '2019-12-16 21:16:55', '2019-12-16 21:16:55'),
(50, 62, '2019-12-17', 330000, 'ATM', 'Nhà em gần nhà anh', 'Chờ lấy hàng', '2019-12-17 06:12:47', '2019-12-17 06:12:47'),
(48, 60, '2019-12-17', 590000, 'COD', 'Ship trong ngày mai nha shop :3', 'Chờ lấy hàng', '2019-12-16 20:35:58', '2019-12-16 20:35:58'),
(47, 59, '2019-12-17', 270000, 'COD', 'Giao nhanh nha', 'Chờ lấy hàng', '2019-12-16 19:50:23', '2019-12-16 19:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(67, 51, 66, 1, 50000, '2019-12-17 06:14:17', '2019-12-17 06:14:17'),
(66, 51, 68, 1, 280000, '2019-12-17 06:14:17', '2019-12-17 06:14:17'),
(65, 50, 66, 1, 50000, '2019-12-17 06:12:48', '2019-12-17 06:12:48'),
(64, 50, 68, 1, 280000, '2019-12-17 06:12:47', '2019-12-17 06:12:47'),
(63, 49, 63, 10, 10000, '2019-12-16 21:16:55', '2019-12-16 21:16:55'),
(62, 48, 63, 1, 50000, '2019-12-16 20:35:58', '2019-12-16 20:35:58'),
(61, 48, 2, 2, 270000, '2019-12-16 20:35:58', '2019-12-16 20:35:58'),
(60, 47, 2, 1, 270000, '2019-12-16 19:50:23', '2019-12-16 19:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_post` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_post`, `username`, `comment`, `updated_at`, `created_at`) VALUES
(6, '63', 'Tây', 'Sản phẩm này rất tốt', '2019-12-15 09:52:12', '2019-12-15 09:52:12'),
(7, '2', 'Dinh', 'Giao hang nhanh, chat luong tot', '2019-12-15 10:11:28', '2019-12-15 10:11:28'),
(8, '2', 'Giang', 'Hay mà ta', '2019-12-15 11:31:42', '2019-12-15 11:31:42'),
(14, '63', 'Thien', 'Rat ok', '2019-12-16 00:59:12', '2019-12-16 00:59:12'),
(17, '2', 'Ben', 'Hang chat luong khong tot ', '2019-12-16 12:43:26', '2019-12-16 12:42:29'),
(18, '68', 'Mai', 'Hàng khá chất lượng , vừa lòng', '2019-12-16 18:55:39', '2019-12-16 18:55:39'),
(19, '2', 'Ben', 'Giao hàng chậm, gói không cẩn thận gì hết', '2019-12-16 20:41:47', '2019-12-16 20:40:42'),
(21, '2', 'Huy', '...', '2019-12-16 22:57:16', '2019-12-16 22:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `id_user`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(63, 11, 'Hồ Nguyễn Xuân Tây', 'Nam', 'hnxtay.18it3@sict.udn.vn', 'Nam kì khởi nghĩa', '0354122241', 'Nhà em gần nhà anh', '2019-12-17 06:14:17', '2019-12-17 06:14:17'),
(62, 11, 'Hồ Nguyễn Xuân Tây', 'Nam', 'hnxtay.18it3@sict.udn.vn', 'Nam kì khởi nghĩa', '0354122241', 'Nhà em gần nhà anh', '2019-12-17 06:12:47', '2019-12-17 06:12:47'),
(61, 19, 'Dinh Nguyen', 'Nam', 'dinhdz@vcl.dcm', '1234 Bay Tam Chin Muoi', '0999999999', 'Ship nhanh len dcmmm', '2019-12-16 21:16:55', '2019-12-16 21:16:55'),
(59, 7, 'Hồ Nguyễn Xuân Tây', 'Nam', 'mactutunhen@gmail.com', 'Nam kì khởi nghĩa', '0354122241', 'Giao nhanh nha', '2019-12-16 19:50:23', '2019-12-16 19:50:23'),
(60, 18, 'Mai Văn Đông', 'Nam', 'maivandong@gmail.com', 'quận Ngũ Hành Sơn, Đà Nẵng', '0983311441', 'Ship trong ngày mai nha shop :3', '2019-12-16 20:35:58', '2019-12-16 20:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_product`) VALUES
(2, 2),
(3, 64);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `author`, `id_type`, `description`, `unit_price`, `promotion_price`, `quantity`, `new`, `created_at`, `updated_at`) VALUES
(2, 'Sherlock Holmes', 'Arthur Conan Doyle', 2, '<p>Sherlock Holmes là một nhân vật thám tử hư cấu vào cuối thể kỉ 19 và đầu thế kỉ 20, xuất hiện lần đầu trong tác phẩm của nhà văn Arthur Conan Doyle xuất bản năm 1887. Ông là một thám tử tư ở Luân Đôn nổi tiếng nhờ trí thông minh, khả năng suy diễn logic và quan sát tinh tường trong khi phá những vụ án mà cảnh sát phải bó tay. Nhiều người cho rằng Sherlock Holmes là nhân vật thám tử hư cấu nổi tiếng nhất trong lịch sử văn học và là một trong những nhân vật văn học được biết đến nhiều nhất toàn thế giới.</p><div class=\"selection_bubble_root\" style=\"visibility: hidden;\"><span id=\"speaken\">X</span></div><div id=\"image_search\" class=\"selection_img_search\" style=\"visibility: hidden;\">&nbsp;</div>', 300000, 270000, '97', 1, NULL, '2019-12-16 20:35:58'),
(63, 'Your Name', 'Shinkai Makoto', 3, NULL, 50000, 0, '89', 1, NULL, '2019-12-16 21:16:55'),
(64, 'Tớ Thích Cậu Hơn Cả Harvard', 'Lan Rùa', 3, NULL, 50000, 0, '100', 1, NULL, '2019-12-15 12:01:06'),
(66, 'Xin chào ngày xưa ấy', 'Bát Nguyệt Tràng An', 3, NULL, 50000, 0, '92', 1, NULL, '2019-12-17 06:25:34'),
(67, 'Đời Ngắn Đừng Ngủ Dài', 'Robin Sharma', 1, '<p>Thước đo cuộc đời không phải ở chỗ nó dài hay nó ngắn, mà ở chỗ bạn đã sử dụng nó như thế nào.</p><p>X</p><p>&nbsp;</p><p>X</p><p>&nbsp;</p><p>X</p><p>&nbsp;</p><p>X</p><p>&nbsp;</p><p>X</p><p>&nbsp;</p><div class=\"selection_bubble_root\" style=\"visibility: hidden;\"><span id=\"speaken\">X</span></div><div id=\"image_search\" class=\"selection_img_search\" style=\"visibility: hidden;\">&nbsp;</div>', 130000, 100000, '100', 1, NULL, '2019-12-16 18:09:50'),
(68, 'Peter Pan', 'James Matthew Barrie', 3, 'J. M. Barrie (1860 – 1937) là nhà soạn kịch và tiểu thuyết gia nổi tiếng người Scotland được biết đến nhiều nhất với vai trò cha đẻ của nhân vật Peter Pan. Cậu bé tinh nghịch này lần đầu xuất hiện trong tiểu thuyết Chú chim trắng bé con xuất bản năm 1902 và sau đó là trong tác phẩm nổi tiếng nhất của ông', 350000, 280000, '92', 1, NULL, '2019-12-17 06:25:34'),
(69, 'Muôn Dặm Đường Hoa', 'Trần Thùy Linh', 4, 'Tập sách văn hóa, trải nghiệm về các loài hoa đặc trưng cho từng vùng đất cả ở Việt Nam lẫn trên thế giới. Mỗi một vùng đất thường có một loài hoa gắn liền, nó “đẫm hồn đất, hồn người và ẩn chứa biết bao điều về văn hóa của một dân tộc”', 99000, 80000, '50', 1, NULL, NULL),
(70, 'Hòm Thư Số 110', 'Yi Doo Woo', 3, 'Viết về những con người gần gũi trong cuộc đời bình dị, những người lớn dù đã khoác lên mình lớp vỏ trưởng thành song vẫn còn vô số khuyết điểm cũng như nhược điểm, ngày ngày vẫn đối mặt với nỗi cô đơn', 200000, 127200, '50', 1, NULL, NULL),
(71, 'Tình Biển Nghĩa Sông', 'Hoàng Thoại Châu', 3, 'Tưởng đâu khóc tình là tiếng khóc ảo não nhất rồi, nhưng khóc quê hương mới muôn phần xót xa, đau đớn! Nỗi đau ấy dằng dặc thời gian...', 98000, 71000, '20', 1, NULL, '2019-12-12 07:46:45'),
(72, 'Lũ Đầu Mùa', 'Trương Anh Quốc', 4, 'Tình yêu hiện lên trong từng trang viết của tác giả. Nội dung và bối cảnh vẫn xoay quanh đời sống của những thủy thủ trên đại dương mênh mông', 20000, 16000, '50', 1, NULL, NULL),
(73, 'Tôi Và Em', 'Meggie Phạm', 3, 'Tình yêu nồng ấm trong sự chu đáo, lãng mạn trong từng cánh hoa, lâu bền mãi không phai nhạt của anh - một doanh nhân tài ba luôn là điều mơ của mọi phụ nữ, trừ nàng', 99000, 79000, '50', 1, NULL, NULL),
(74, 'Gặp Gỡ Ở La Pan Tẩn', 'Ma Văn Kháng', 4, 'Nếu ở những chương đầu của Đồng bạc trắng hoa xòe, ông tuân thủ lối viết của người kể chuyện...', 92000, 7100, '100', 1, NULL, '2019-12-16 15:39:29'),
(75, 'Ngựa Thép', 'Phan Hồn Nhiên', 4, 'Ngựa Thép đạt được sự hài hòa điêu luyện giữa tính chất trình diễn của một nghệ sĩ và sự khéo léo tỉ mỉ của một nghệ nhân. Đây là một tiểu thuyết đầy đặn, vững chãi và sâu sắc của một trong những nhà văn trẻ có đam mê và ý thức rõ ràng về việc phải làm gì để hòa nhập với dòng chảy văn chương đương đại trong nước và thế giới', 95000, 76000, '20', 1, NULL, '2019-12-12 07:48:01'),
(76, 'Miền Hoang', 'Sương Nguyệt Minh', 3, 'Miền hoang là câu chuyện về một nhóm người bị lạc trong rừng Miên gồm một Ông Lớn, một chiến sĩ và một cô y tá câm thuộc lính Pol Pot và một tù binh quân tình nguyện Việt Nam. Cả nhóm sau một trận kịch chiến trong vùng rừng hoang Tây Bắc Campuchia vào những ngày cuối cùng cuộc chiến tranh trước khi bộ đội tình nguyện Việt Nam rút quân về nước. Cả nhóm bị lạc trong rừng với những ngày chống chọi với đói khát và với việc mất phương hướng tìm về đơn vị', 135000, 100000, '50', 1, NULL, NULL),
(77, 'Doraemon', 'Fujiko Fujio', 12, 'Nguyên mẫu Doraemon gồm 826 truyện ngắn do chính tác giả Fujiko.F.Fujio chọn lọc. Bộ truyện đã mang đến tiếng cười và gắn liền với kỷ niệm thời thơ ấu của biết bao thế hệ độc giả. Cuốn sách này tập hợp những câu chuyện vô cùng thú vị về chú mèo máy Doraemon. Trong bộ truyện Doraemon, ta thấy có không ít những mẩu truyện khiến cho ta cảm động và nhận ra rằng thiên nhiên, sinh mệnh một con người hay bạn bè đều là những điều ta đáng phải trân trọng. Chính những thông điệp đầy ý nghĩa từ chú mèo máy Doraemon hiền lành, tốt bụng và các bạn đã chạm tới trái tim của các bạn độc giả một cách nhẹ nhàng, tinh tế.', 100000, 0, '100', 1, '2019-12-13 15:22:04', '2019-12-16 15:39:29'),
(82, 'Đừng Lựa Chọn An Nhàn Khi Còn Trẻ', 'Cảnh Thiên', 3, '<p>Trong độ xuân xanh phơi phới ngày ấy, bạn không dám mạo hiểm, không dám nỗ lực để kiếm học bổng, không chịu tìm tòi những thử thách trong công việc, không phấn đấu hướng đến ước mơ của mình. Bạn mơ mộng rằng làm việc xong sẽ vào làm ở một công ty nổi tiếng, làm một thời gian sẽ thăng quan tiến chức. Mơ mộng rằng khởi nghiệp xong sẽ lập tức nhận được tiền đầu tư, cầm được tiền đầu tư là sẽ niêm yết trên sàn chứng khoán. Mơ mộng rằng muốn gì sẽ có đó, không thiếu tiền cũng chẳng thiếu tình, an hưởng những năm tháng êm đềm trong cuộc đời mình. Nhưng vì sao bạn lại nghĩ rằng bạn chẳng cần bỏ ra chút công sức nào, cuộc sống sẽ dâng đến tận miệng những thứ bạn muốn? Bạn cần phải hiểu rằng: Hấp tấp muốn mau chóng thành công rất dễ khiến chúng ta đi vào mê lộ. Thanh xuân là khoảng thời gian đẹp đẽ nhất trong đời, cũng là những năm tháng then chốt có thể quyết định tương lai của một người. Nếu bạn lựa chọn an nhàn trong 10 năm, tương lai sẽ buộc bạn phải vất vả trong 50 năm để bù đắp lại. Nếu bạn bươn chải vất vả trong 10 năm, thứ mà bạn chắc chắn có được là 50 năm hạnh phúc. Điều quý giá nhất không phải là tiền mà là tiền bạc. Thế nên, bạn à, đừng lựa chọn an nhàn khi còn trẻ.</p>', 80000, 55000, '100', 1, '2019-12-16 20:02:11', '2019-12-16 20:02:11'),
(83, 'Thế giới ba không', 'Muhammad Yunus', 2, '<p>&ldquo;Chúng ta đủ may mắn khi được sinh ra trong một thời đại của các cơ hội lớn &ndash; thời đại của công nghệ kỳ diệu, của cải to lớn và năng lực vô hạn của con người. Giờ đây giải pháp cho nhiều vấn đề căng thẳng của thế giới &ndash; bao gồm các vấn đề như đói, nghèo và bệnh tật đã huỷ hoại loài người trước cả bình minh của lịch sử &ndash; đang ở trong tầm tay. Hầu hết các giải pháp này có thể được gia tốc bằng việc xây dựng một trật tự kinh tế mới có tính đến công cụ mạnh mẽ là doanh nghiệp xã hội.<br />Trong một thế giới dường như đang sinh ra ngày càng nhiều những tin tức phiền muộn, chúng ta có thể tạo ra một nguồn hy vọng mạnh mẽ, chứng minh rằng tinh thần bất khuất của con người không bao giờ cúi đầu trước chán chường và thất vọng. Mục đích của cuộc sống của con người trên hành tinh này không chỉ là sống sót mà là sống với sự tao nhã, cái đẹp và hạnh phúc. Chính chúng ta phải làm cho điều đó thành hiện thực. Chúng ta cần tạo nên một nền văn minh mới không dựa vào lòng tham mà dựa vào một tập hợp đầy đủ các giá trị nhân bản. Hãy bắt đầu từ hôm nay.&rdquo; &ndash; Muhammad Yunus</p><div class=\"selection_bubble_root\" style=\"visibility: hidden;\"><span id=\"speaken\">X</span></div><div id=\"image_search\" class=\"selection_img_search\" style=\"visibility: hidden;\">&nbsp;</div>', 130000, 100000, '69', 1, '2019-12-16 21:22:44', '2019-12-16 21:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(5, '', 'banner1.jpg'),
(6, '', 'banner2.jpg'),
(7, '', 'banner3.jpg'),
(8, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Sách Khoa Học', '2019-11-17 17:00:00', NULL),
(2, 'Sách Trinh Thám', '2019-11-17 17:00:00', NULL),
(3, 'Tiểu Thuyết', NULL, NULL),
(4, 'Sách Văn Học', NULL, NULL),
(12, 'Truyện tranh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `birthday`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Hồ Nguyễn Xuân Tây', 'mactutunhen@gmail.com', '2000-08-15', '$2y$10$WsMJO79Sqh5K0NDFtf1o7eDjO8FTUq/2M6oXSJjCmtEEa1PtJY.GG', '0354122241', 'Nam kì khởi nghĩa', NULL, '2019-11-30 10:45:51', '2019-11-30 10:45:51'),
(10, 'Hồ Nguyễn Xuân Tây', 'admin@gmail.com', '2019-12-16', '$2y$10$WsMJO79Sqh5K0NDFtf1o7eDjO8FTUq/2M6oXSJjCmtEEa1PtJY.GG', '', '', NULL, '2019-11-30 10:45:51', '2019-11-30 10:45:51'),
(11, 'Hồ Nguyễn Xuân Tây', 'hnxtay.18it3@sict.udn.vn', '2000-08-15', '$2y$10$Szrt0AhTycCmA5pfa7ZsHO4SQhqD01yDW3mxWAygvqVUU6KXv4nOa', '0354122241', 'Nam kì khởi nghĩa', NULL, '2019-12-16 09:02:56', '2019-12-16 09:45:26'),
(12, 'Nguyên Anh', 'tsnanh0812@gmail.com', NULL, '$2y$10$rD4mSEA2Gr7GwneZZ8cRA.mqbtPQXnPaFxQOZ6aPGbUY55aluR37m', '0839874501', 'Hue', NULL, '2019-12-16 12:50:03', '2019-12-16 12:50:03'),
(13, 'Trần Nhật Huy', 'tnhuy.18it3@sict.udn.vn', NULL, '$2y$10$J24aYR05gGQiHbddiu/pD.r8BartNmkq7vb50F7m8JVUrjcmUsqee', '0789123456', 'Huế', NULL, '2019-12-16 15:37:31', '2019-12-16 15:37:31'),
(14, 'Huy', 'nqhuyz17@gmail.com', NULL, '$2y$10$jnX9bQ0K1su3wWi6.7n7ve0ZEktB.dE7E/8HTPcvKN/MQfkSwcmiq', '0366716006', 'Đà Nẵng', NULL, '2019-12-16 18:49:41', '2019-12-16 18:49:41'),
(15, 'Nguyen', 'abcdefgh@gmail.com', NULL, '$2y$10$jAPuvAymcItjWmlkgrlPhufqx3QdYJMhHZlNXgtldHUqQ1xkJ6Bd2', '0366423666', 'Đà Nẵng', NULL, '2019-12-16 18:51:09', '2019-12-16 18:51:09'),
(17, 'Ashdksks', 'duonghienluong1@gmail.com', NULL, '$2y$10$ooZk2IDxjp6TC1YXLycFF.jmanMi1.fJy6/rBpOWE3lNysvwnJRYK', '019287373728', 'Sjskesmsm', NULL, '2019-12-16 20:28:59', '2019-12-16 20:28:59'),
(18, 'Mai Văn Đông', 'maivandong@gmail.com', NULL, '$2y$10$DYoES2/LKuXuspM2HX8Rt.vhgOK0bvVYjierB3Jwll3G7VwBQJXoO', '0983311441', 'Phường Hòa Quý, quận Ngũ Hành Sơn, Đà Nẵng', NULL, '2019-12-16 20:33:55', '2019-12-16 20:33:55'),
(19, 'Dinh Nguyen', 'dinhdz@vcl.dcm', NULL, '$2y$10$P0/GcBAhjiDDdNvtPT1YiuHnyx73cPVs6KQfZSzRlNnytCerV4WLq', '0999999999', '1234 Bay Tam Chin Muoi', NULL, '2019-12-16 21:15:52', '2019-12-16 21:15:52'),
(20, 'Lý Ngọc Trâm', 'lttram@gmail.com', NULL, '$2y$10$jNnG04nJ/hj6g3yalXAe.e/oSePhnnPvf93cdlDaDmuuYdlIbAh1K', '0912923309', 'Lâm Đồng', NULL, '2019-12-16 23:51:03', '2019-12-16 23:51:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
