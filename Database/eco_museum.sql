-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 07:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco_museum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Braceles'),
(2, 'Game&Toys'),
(3, 'Keyrings'),
(4, 'Necklaces');

-- --------------------------------------------------------

--
-- Table structure for table `category_explore`
--

CREATE TABLE `category_explore` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_explore`
--

INSERT INTO `category_explore` (`id`, `name`) VALUES
(4, 'Ao Dai'),
(5, 'Art'),
(6, 'Jurassic'),
(7, 'Takeoff');

-- --------------------------------------------------------

--
-- Table structure for table `explore`
--

CREATE TABLE `explore` (
  `id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(700) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category_explore_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explore`
--

INSERT INTO `explore` (`id`, `title`, `description`, `thumbnail`, `category_explore_id`) VALUES
(28, 'Black Juried Art Exihibition', 'See dynamic works from both professional and amateur African American artists from around the country.\nThis longest-running exhibition of African American art has been displayed annually at MSI since 1970. Black Creativity Juried Art Exhibition features paintings, drawings, fine art prints, sculpture, mixed-media, ceramics and photography by African Americans, including youth artists between the ages of 14 and 17.', 'asset/img/art.jpg', 4),
(33, 'Ao Dai Exhibition In Sai Gon', 'Ao Dai Exhibition honours the proudful traditional beauty of the Vienamese national costume Through more than 100 original and restored artifacts exhibited formally, visitors have a thorough knowledge of the formation and development of the Vietnamese Ao Dai in each historical period. Ao Dai Exhibition is located at the 2nd floor of Saigon House, a cultural house on Nguyen Hue Pedestrian Street.', 'asset/img/aodai.jpg', 5),
(34, 'Explore the Jurassic Period.', 'See dynamic works from both professional and amateur African American artists from around the country.\nThis longest-running exhibition of African American art has been displayed annually at MSI since 1970. Black Creativity Juried Art Exhibition features paintings, drawings, fine art prints, sculpture, mixed-media, ceramics and photography by African Americans, including youth artists between the ages of 14 and 17.\nThis exhibition is now open through April 23, 2023 and is included in Museum Entry.\nEXPO Chicago\nSee Black Creativity on display at EXPO Chicago at Navy Pier from April 13-16, 2023.', 'asset/img/jurassic.jpg', 6),
(35, 'Prepare To Be Taken Off', 'The Boeing 727 returns to its 1960s glamour to take you on a tour of modern aviation.\n\nIt’s been more than 25 years since the 727 landed at MSI. Turns out that was just the beginning. In a newly reimagined exhibit, Take Flight celebrates the historic United Airlines plane and explores how the airline industry connects people around the world.', 'asset/img/plane.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `explore_thumbnails`
--

CREATE TABLE `explore_thumbnails` (
  `id` int(11) NOT NULL,
  `explore_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explore_thumbnails`
--

INSERT INTO `explore_thumbnails` (`id`, `explore_id`, `thumbnail`) VALUES
(31, 28, 'asset/photo/1.jpg'),
(32, 28, 'asset/photo/2.jpg'),
(33, 28, 'asset/photo/3.jpg'),
(45, 33, 'asset/photo/4.jpg'),
(46, 33, 'asset/photo/5.jpg'),
(47, 33, 'asset/photo/6.jpg'),
(48, 34, 'asset/photo/7.jpg'),
(49, 34, 'asset/photo/8.jpg'),
(50, 34, 'asset/photo/9.jpg'),
(51, 35, 'asset/photo/10.jpg'),
(52, 35, 'asset/photo/11.jpg'),
(53, 35, 'asset/photo/12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `subject_name` varchar(250) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES
(10, 'Hồ', 'Quang', 'hominhquang01@gmail.com', '0965649531', 'Check khóa học', 'asdasd', '2023-04-11 14:30:16', '2023-04-11 14:30:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `user_id`, `email`, `phone_number`, `address`, `order_date`, `status`, `total_money`, `code`, `note`) VALUES
(42, 'Hoang Quan', 2, 'quanhps25481@fpt.edu.vn', '033356935', 'Chung cu 675 Nguyen Kiem', '2023-04-11 13:14:07', 0, 87, 'ECO1681211647', 'Giao hang gio hanh chinh'),
(43, 'Hồ Minh Quang', 3, 'quanhps25481@fpt.edu.vn', 'qqwqwe', '0965649531', '2023-04-11 15:06:18', 0, 195, 'ECO1681218378', 'qweqweqewq'),
(44, 'Hồ Minh Quang', 3, 'quanhps25481@fpt.edu.vn', '12312312', '0965649531', '2023-04-11 16:15:29', 0, 245, 'ECO1681222529', 'ww'),
(45, 'Hồ Minh Quang', 3, 'quanhps25481@fpt.edu.vn', '12312312', '0965649531', '2023-04-11 16:20:53', 0, 0, 'ECO1681222853', 'ww'),
(46, 'Hồ Minh Quang', 3, 'quanhps25481@fpt.edu.vn', '1313', '0965649531', '2023-04-11 16:24:55', 0, 49, 'ECO1681223095', '123132'),
(47, 'Hồ Minh Quang', 3, 'quanhps25481@fpt.edu.vn', '312312', '0965649531', '2023-04-11 16:34:37', 0, 138, 'ECO1681223677', '123123123'),
(48, 'Hồ Minh Quang', 3, 'quanhps25481@fpt.edu.vn', '213124', '0965649531', '2023-04-11 16:38:07', 0, 98, 'ECO1681223887', 'àasfasf'),
(49, 'Hồ Minh Quang', 3, 'quanhps25481@fpt.edu.vn', '123123', '0965649531', '2023-04-11 16:42:04', 0, 98, 'ECO1681224124', 'ádsadad'),
(50, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '0964524611', '0965649531', '2023-04-11 20:47:59', 0, 98, 'ECO1681238879', 'jj'),
(51, 'Linh Lợn', 1, 'vuongkhanhlinh99@gmail.com', '0964524611', '109/11/7A duong so 8 Linh Trung Thu Duc', '2023-04-12 11:03:37', 0, 305, 'ECO1681290217', 'Tôi là Linh lợn'),
(56, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '123123', '0965649531', '2023-04-12 12:39:06', 0, 130, 'ECO1681295946', '12321'),
(57, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '0965649531', '0965649531', '2023-04-12 12:46:59', 0, 98, 'ECO1681296419', '2123'),
(58, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '12312412', '0965649531', '2023-04-12 14:04:07', 0, 345, 'ECO1681301047', '123123'),
(60, 'Hoang Quan', 6, 'quanhps25481@fpt.edu.vn', '123123', '1211', '2023-04-12 14:22:04', 0, 87, 'ECO1681302124', '123123'),
(61, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '0965649531', '0965649531', '2023-04-12 16:48:12', 0, 463, 'ECO1681310892', 'jggjhb'),
(62, 'Hồ Minh Quang', 1, 'hominhquang01@gmail.com', '7578', '0965649531', '2023-04-12 16:52:00', 0, 224, 'ECO1681311120', 'jy');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(26, 42, 61, 19, 2, 38),
(27, 42, 44, 49, 1, 49),
(28, 43, 35, 65, 3, 195),
(29, 44, 44, 49, 3, 147),
(30, 44, 47, 49, 2, 98),
(31, 46, 47, 49, 1, 49),
(32, 47, 73, 69, 2, 138),
(33, 48, 44, 49, 2, 98),
(34, 49, 43, 49, 2, 98),
(35, 50, 63, 29, 1, 29),
(36, 50, 73, 69, 1, 69),
(37, 51, 65, 69, 3, 207),
(38, 51, 44, 49, 2, 98),
(39, 56, 35, 65, 2, 130),
(40, 57, 47, 49, 2, 98),
(41, 58, 39, 69, 5, 345),
(42, 60, 63, 29, 3, 87),
(43, 61, 49, 29, 2, 58),
(44, 61, 57, 19, 2, 38),
(45, 61, 71, 69, 2, 138),
(46, 61, 36, 75, 2, 150),
(47, 61, 34, 79, 1, 79),
(48, 62, 53, 39, 1, 39),
(49, 62, 49, 29, 1, 29),
(50, 62, 50, 49, 1, 49),
(51, 62, 65, 69, 1, 69),
(52, 62, 61, 19, 1, 19),
(53, 62, 56, 19, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(350) DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `discount`, `category_id`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'GLORIOUS GMMK PRO', 199000, 100000, 4, 'asset/photo/452039.jpg', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\"><b>THÔNG SỐ KỸ THUẬT</b></font></p><p>\r\nTên bàn phím cơ: Glorious GMMK Pro\r\nCỡ 75', '2023-04-03 14:44:25', '2023-04-08 14:57:56', 1),
(2, 'PLANCK MECHANICAL', 350000, 200000, 4, 'asset/photo/452039.jpg', 'Các thông số chi tiết\r\nNgười thiết kế: Jack Humbert (OLKB)\r\nSản xuất bởi: Drop\r\nPCBA làm bởi OLKB\r\nVỏ nhôm CNC được anod hóa\r\nDùng switch hot-swap của', '2023-02-19 09:20:46', '2023-03-30 10:59:32', 1),
(3, 'THE WHITEFOX KEYBOARD', 190000, 100000, 2, 'asset/photo/banphim4.jpg', '<p><b>THÔNG SỐ KỸ THUẬT </b></p><p><span style=\"font-size: 1rem;\">Tên bàn phím cơ: WhiteFox\r\nCỡ 65% layout\r\nCase CNC anod hóa\r\nKeycap PBT Dye-sub', '2022-12-05 09:41:50', '2023-04-08 14:57:57', 1),
(4, 'NYM96 BAREBONES', 149000, 59000, 2, 'asset/photo/banphim5.jpg', 'THÔNG SỐ KỸ THUẬT\r\n96 phím\r\nCase và plate chất liệu Aluminum 6063\r\nKết nối USB-C\r\nChân đứng cao su\r\nKích thước (bản đã ráp) : 15 x 5.5 x 1.7 in (38.1', '2022-11-18 10:35:43', '2023-04-08 14:57:59', 1),
(5, 'Rezo HT03', 250000, 100000, 4, 'asset/photo/tainghe4.jpg', 'Với mắt cảm biến, DareU trang bị cho mẫu chuột của họ cảm biến quang nâng cao Razer 5G với thông số độ nhạy đạt 16000 DPI, 450 IPS tracking speed cùng', '2022-11-18 09:53:21', '2023-04-08 14:58:01', 1),
(6, 'Razer Barracuda X', 300000, 250000, 4, 'asset/photo/tainghe1.jpg', 'C (không dây, có dây)\r\nPlayStation (không dây, có dây)\r\nNintendo Switch (không dây, có dây)\r\nThiết bị Android (không dây, có dây)\r\nXbox (có dây)\r\nPhụ ', '2022-11-18 08:58:28', '2023-04-08 14:58:02', 1),
(7, 'Sony WH-CH510', 360000, 240000, 4, 'asset/photo/tainghe3.jpg', 'Sony vừa mới cho ra mắt chiếc tai nghe bluetooth Sony WH-CH510 có thiết kế gọn nhẹ và dễ dàng gập bẻ. Ngoài ra, điểm đặc biệt của chiếc tai nghe chùm ', '2022-11-18 08:08:32', '2023-03-30 10:25:38', 1),
(8, 'OPPO ENCO Air 2 ETE11', 100000, 50000, 4, 'asset/photo/tainghe6.jpg', 'Chuột không dây Logitech  M300 kết nối không dây qua USB Receiver 2.4GHz hoặc Bluetooth 3.0, 4.0. Logitech  M300 là một trong những dòng chuột máy tín', '2022-11-18 09:58:20', '2023-04-08 14:58:04', 1),
(9, 'Asus TUF VG279Q1R | 24inch', 3200000, 3000000, 1, 'asset/photo/manhinh_item1-removebg-preview.png', 'Tên sản phẩm: Màn hình Asus TUF VG279Q1R\r\nKích thước: 27 inch\r\nĐộ phân giải: FHD (1920 x 1080)\r\nTỷ lệ màn hình: 16:9\r\nTấm nền: IPS\r\nĐộ sáng: 250 nit', '2022-11-18 10:36:22', '2023-04-08 14:58:05', 1),
(10, 'LG 34WN750-B | 34inch', 9490000, 8990000, 1, 'asset/photo/manhinh_item2-removebg-preview.png', 'Tên sản phẩm: Màn hình LG 34WN750-B\r\nKích thước: 34 inch\r\nĐộ phân giải: UW-QHD (3440 x 1440)\r\nTỷ lệ màn hình: 21:9\r\nTấm nền: IPS\r\nĐộ sáng: 300 nits\r\nM', '2022-11-18 10:11:02', '2023-04-08 14:58:07', 1),
(11, 'Asus VZ249HEG1R | 24 inch', 3690000, 3470000, 1, 'asset/photo/manhinh_item7.jpg', 'Tên sản phẩm: Màn Asus VZ249HEG1R\r\nKích thước: 24 inch\r\nĐộ phân giải: FHD (1920 x 1080)\r\nTỷ lệ màn hình: 16:9\r\nTấm nền: IPS\r\nĐộ sáng: 250 nits\r\nMàu hi', '2022-11-18 16:41:10', '2023-04-08 14:58:08', 1),
(12, 'LG 24GN60R-B | 24 inch', 4890000, 4280000, 1, 'asset/photo/manhinh_item6-removebg-preview.png', 'Tên sản phẩm: Màn hình LG 24GN60R-B\r\nKích thước: 24 inch\r\nĐộ phân giải: FHD (1920 x 1080)\r\nTỷ lệ màn hình: 16:9\r\nTấm nền: IPS\r\nĐộ sáng: 300 nits\r\nMàu', '2022-11-18 10:05:05', '2023-04-08 14:58:10', 1),
(13, 'IQUNIX F97 Graffiti Diary', 6000000, 5900000, 2, 'asset/photo/banphim_item1.jpg', 'Tên sản phẩm: Bàn phím IQUNIX F97 Graffiti Diar\r\nKích thước phím: 96% - 100 phím\r\nKeycap: PBT Dye Sublimation  Keycaps\r\nCase: Aluminum Frame\r\nKhả năng', '2022-11-18 10:19:07', '2023-04-08 14:58:16', 1),
(14, 'IQUNIX ZX75 Camping', 6000000, 5089000, 2, 'asset/photo/banphim_item2.jpg', 'Tên sản phẩm: Bàn phím IQUNIX ZX75 Camping \r\nLayout: 75%\r\nSố phím: 81\r\nSwitch: Cherry Sw \r\nKeycap: PBT Double Shot\r\nProfile Keycap: Cherry \r\nKết nối: ', '2022-11-18 10:02:09', '2023-04-08 14:58:19', 1),
(15, 'Newmen GM980 Starry Gasket', 1790000, 1690000, 2, 'asset/photo/banphim_item4.jpg', 'Tên sản phẩm: Bàn phím không dây Newmen GM680 Jungle Dual Mode \r\nLoại sản phẩm : bàn phím cơ chế độ kép không dây bluetooth 5.0/3.0, wireless 2.4 và c', '2022-11-18 10:52:42', '2023-04-08 14:58:23', 1),
(17, 'Newmen GM980 Nebula Gasket', 3050000, 2890000, 2, 'asset/photo/banphim_item5.jpg', 'Tên sản phẩm: Bàn phím Newmen GM980 Nebula Gasket\r\nLayout: 98 phím\r\nCase phím: Acrylic trong suốt\r\nKết nối: 3 chế độ (USB-C/ Bluetooth/ Wireless)\r\nSwi', '2022-11-18 10:02:13', '2023-04-08 14:58:38', 1),
(18, 'DareU A950 Star Black', 2022000, 1088000, 3, 'asset/photo/chuot_item1.jpg', 'Tên sản phẩm: Chuột DareU A950 Star Black\r\nKhả năng kết nối: 3 MODE (Type-C/ Bluetooth/ 2.4G)\r\nSwitch: Micro Switch (50 million)\r\nCảm Biến: CX52850\r\nM', '2022-11-18 10:13:16', '2023-04-03 12:55:27', 1),
(19, 'Fuhlen D90s Wireless White', 600000, 540000, 3, 'asset/photo/chuot_item2.jpg', 'Tên sản phẩm: Chuột Fuhlen D90s Wireless White\r\nThiết kế: đối xứng\r\nMàu sắc: Trắng\r\nKết nối: USB Type-C + wireless 2.4G.\r\nSwitch: Huano\r\nMắt cảm biến:', '2022-11-18 10:21:17', '2023-03-30 10:59:37', 1),
(20, 'DareU A950 Candy Pink', 2016000, 1088000, 3, 'asset/photo/chuot_item3.jpg', 'Tên sản phẩm: Chuột DareU A950 Candy Pink\r\nKhả năng kết nối: 3 MODE (Type-C/ Bluetooth/ 2.4G)\r\nSwitch: Micro Switch (50 million)\r\nCảm Biến: CX52850\r\nM', '2022-11-18 10:18:18', '2023-03-30 10:53:30', 1),
(21, 'Motospeed V100', 780000, 650000, 3, 'asset/photo/chuot_item4.jpg', '1. Cảm biến Pixart 3327 NEW\r\n2. Nút bấm huano độ bền 20 triệu lần\r\n3. Dây tín hiệu bọc dù mềm độ dài 1.5m, chống nhiễu, đầu cắm USB mạ vàng\r\n4. Chân đ', '2022-11-18 16:24:28', '2023-03-30 10:52:32', 1),
(32, 'Byzantine Peacocks Bracelet', 59, 49, 4, 'asset/photo/Byzantine Peacocks Bracelet.jpg', '<div class=\"description-tab\" style=\"width: 789.6px; max-width: 100%; padding: 0px; margin: 0px 0px 15px; float: left; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\"><section id=\"content1\" style=\"padding: 20px 0px; border-top: 1px solid rgb(229, 229, 229); border-bottom: 1px solid rgb(229, 229, 229); margin-bottom: 30px;\"><div data-content-type=\"row\" data-appearance=\"contained\" data-element=\"main\" style=\"max-width: 1280px; margin-left: auto !important; margin-right: auto !important;\"><div data-enable-parallax=\"0\" data-parallax-speed=\"0.5\" data-background-images=\"{}\" data-background-type=\"image\" data-video-loop=\"true\" data-video-play-only-visible=\"true\" data-video-lazy-load=\"true\" data-video-fallback-src=\"\" data-element=\"inner\" data-pb-style=\"6239BF731960B\" style=\"padding: 10px; justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px 0px 10px;\"><div data-content-type=\"text\" data-appearance=\"default\" data-element=\"main\" data-pb-style=\"6239BF7319632\" style=\"overflow-wrap: break-word; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px; padding: 0px;\"><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">A gold-plated necklace featuring a decorative “D” pendant with a Celtic-inspired design.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">This gorgeous alphabet pendant is plated with 18 carat gold and finished with intricate enamelled detailing. The vibrant green and burgundy pendant takes its inspiration from historic illuminated manuscripts, such as the Book of Kells which is now housed in Trinity College, Dublin, and features the intricate knotted designs typical of Celtic art.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">A stunning and personal gift for a lover of Celtic art.</p><div><br></div></div></div></div><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\"></p></section></div><div class=\"mobile-tab-wrapper\" style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\"><div class=\"mobile-accordion\"></div></div><div class=\"product info detailed\" style=\"clear: both; margin-bottom: 0px; padding-bottom: 0px; border: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\"><div class=\"product data items\" role=\"tablist\" style=\"margin: 0px; padding: 0px; list-style: none none; border: 0px; position: relative; z-index: 1;\"><div class=\"data item title active\" data-role=\"collapsible\" id=\"tab-label-upselltab\" role=\"tab\" data-collapsible=\"true\" aria-controls=\"upselltab\" aria-selected=\"false\" aria-expanded=\"t', '2023-04-12 14:26:46', '2023-04-12 14:26:46', 0),
(33, 'Egyptian Cat Head Bracelet', 99, 69, 4, 'asset/photo/Egyptian Cat Head Bracelet.jpg', '<div class=\"description-tab\" style=\"width: 789.6px; max-width: 100%; padding: 0px; margin: 0px 0px 15px; float: left; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\"><section id=\"content1\" style=\"padding: 20px 0px; border-top: 1px solid rgb(229, 229, 229); border-bottom: 1px solid rgb(229, 229, 229); margin-bottom: 30px;\"><div data-content-type=\"row\" data-appearance=\"contained\" data-element=\"main\" style=\"max-width: 1280px; margin-left: auto !important; margin-right: auto !important;\"><div data-enable-parallax=\"0\" data-parallax-speed=\"0.5\" data-background-images=\"{}\" data-background-type=\"image\" data-video-loop=\"true\" data-video-play-only-visible=\"true\" data-video-lazy-load=\"true\" data-video-fallback-src=\"\" data-element=\"inner\" data-pb-style=\"6239BF7244834\" style=\"padding: 10px; justify-content: flex-start; display: flex; flex-direction: column; background-position: left top; background-size: cover; background-repeat: no-repeat; background-attachment: scroll; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px 0px 10px;\"><div data-content-type=\"text\" data-appearance=\"default\" data-element=\"main\" data-pb-style=\"6239BF724485A\" style=\"overflow-wrap: break-word; border-style: none; border-width: 1px; border-radius: 0px; margin: 0px; padding: 0px;\"><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">A pewter openwork necklace set with an amber gemstone, inspired by Celtic jewellery.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">The Celts used knot-work to decorate many of their artefacts. The intricate patterns woven into spirals and knots symbolised the continuity of life.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">Suspended on a steel chain, this elaborate knot pendant has been hand-made in Cornwall, UK and is presented in a gift box.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">Amber is a fossilised tree resin found commonly in Baltic regions. It has been prized as a gemstone for its colour and natural beauty since Neolithic times, and can be seen featured in jewellery worldwide. Although usually recognised for its deep brownish-orange hue, amber occurs in a range of colours, from clear white through yellow, orange, and brown, to near black. Amber often features impurities such as oxygen bubble, veins, fragments of bark or cracks which form when the tree resin hardens. This quality guarantees that every piece of amber is unique.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\">A stunning gift for lovers of Celtic art.</p><div><br></div></div></div></div><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify;\"></p></section></div><div class=\"mobile-tab-wrapper\" style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\"><div', '2023-04-12 14:00:47', '2023-04-12 14:00:47', 0),
(34, 'Greek Palmette Bracelet', 99, 79, 1, 'asset/photo/Greek Palmette Bracelet.jpg', 'Bedeck your neck with one of our exquisite necklaces. From bright sterling silver to precious gemstone pieces, explore our range of contemporary and t', '2023-04-08 14:49:51', '2023-04-08 14:49:51', 0),
(35, 'Hieroglyphs Bangle', 99, 65, 1, 'asset/photo/Hieroglyphs Bangle.jpg', 'Bedeck your neck with one of our exquisite necklaces. From bright sterling silver to precious gemstone pieces, explore our range of contemporary and t', '2023-04-08 14:24:52', '2023-04-08 14:24:52', 0),
(36, 'Lion Head Bracelet', 99, 75, 1, 'asset/photo/Lion Head Bracelet.jpg', '', '2023-04-08 14:50:52', '2023-04-08 14:50:52', 0),
(37, 'Ram Head Cuff Bracelet', 129, 89, 1, 'asset/photo/Ram Head Cuff Bracelet.jpg', 'his unique scarf is made in Italy from 100% silk. The design features the titles of Shakespeare’s most well-known plays under the headers ‘Comedies’ and ‘Tragedies’, bordered by a vibrant stripe of red.  The scarf is designed by Rory Hutton to celebrate William Shakespeare’s First Folio – a collection of 36 plays first published in 1623, seven years after Shakespeare’s death, which included comedies, histories and tragedies. The folio is considered one of the most influential books ever published.  A stunning gift for a literature lover.', '2023-04-08 14:52:54', '2023-04-12 12:06:39', 1),
(39, 'Roman Gold Snake Bracelet', 119, 69, 1, 'asset/photo/Roman Gold Snake Bracelet.jpg', 'Exclusive to the British Museum, a wool silk scarf featuring modern interpretations of the colourful motifs found on Iznik ceramics.  Produced throughout the late 15th to the late 17th centuries, the ceramics of Iznik, Turkey, were among the finest works of art from the Ottoman Empire. Influenced by Ottoman arabesque patterns as well as traditional Chinese design, the pottery was often decorated with flowers and abstract patterns in bright, vivid colours. The technical quality of the pottery, and the beauty of its designs, have long made it one of the most popular art forms in the Islamic world.  Several pieces of Iznik pottery are housed in the British Museum, and can be seen on display in the Islamic galleries.  A stunning gift for an art lover.  ', '2023-04-08 14:26:56', '2023-04-08 14:26:56', 0),
(40, 'Scarab Bead Link Bracelet', 169, 129, 4, 'asset/photo/Scarab Bead Link Bracelet.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify; background-color: rgb(245, 245, 245);\">Amber is a fossilised tree resin found commonly in Baltic regions. It has been prized as a gemstone for its colour and natural beauty since Neolithic times, and can be seen featured in jewellery worldwide. Although usually recognised for its deep brownish-orange hue, amber occurs in a range of colours, from clear white through yellow, orange, and brown, to near black. Amber often features impurities such as oxygen bubble, veins, fragments of bark or cracks which form when the tree resin hardens. This quality guarantees that every piece of amber is unique.</span><br></p>', '2023-04-12 14:12:48', '2023-04-12 14:12:48', 0),
(41, 'Silver Ram Head Bracelet', 129, 89, 1, 'asset/photo/Silver Ram Head Bracelet.jpg', 'Exclusive to the British Museum, a wool silk scarf featuring modern interpretations of the colourful motifs found on Iznik ceramics.  Produced throughout the late 15th to the late 17th centuries, the ceramics of Iznik, Turkey, were among the finest works of art from the Ottoman Empire. Influenced by Ottoman arabesque patterns as well as traditional Chinese design, the pottery was often decorated with flowers and abstract patterns in bright, vivid colours. The technical quality of the pottery, and the beauty of its designs, have long made it one of the most popular art forms in the Islamic world.  Several pieces of Iznik pottery are housed in the British Museum, and can be seen on display in the Islamic galleries.  A stunning gift for an art lover.  ', '2023-04-08 14:14:57', '2023-04-12 10:51:37', 1),
(42, 'Sugar Skull Bracelet Multicolour', 129, 69, 1, 'asset/photo/Sugar Skull Bracelet Multicolour.jpg', 'Exclusive to the British Museum, a wool silk scarf featuring modern interpretations of the colourful motifs found on Iznik ceramics.  Produced throughout the late 15th to the late 17th centuries, the ceramics of Iznik, Turkey, were among the finest works of art from the Ottoman Empire. Influenced by Ottoman arabesque patterns as well as traditional Chinese design, the pottery was often decorated with flowers and abstract patterns in bright, vivid colours. The technical quality of the pottery, and the beauty of its designs, have long made it one of the most popular art forms in the Islamic world.  Several pieces of Iznik pottery are housed in the British Museum, and can be seen on display in the Islamic galleries.  A stunning gift for an art lover.  ', '2023-04-08 14:43:57', '2023-04-12 10:51:35', 1),
(43, 'Anubis Dog Soft Toy', 69, 49, 4, 'asset/photo/Anubis Dog Soft Toy.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify; background-color: rgb(245, 245, 245);\">Amber is a fossilised tree resin found commonly in Baltic regions. It has been prized as a gemstone for its colour and natural beauty since Neolithic times, and can be seen featured in jewellery worldwide. Although usually recognised for its deep brownish-orange hue, amber occurs in a range of colours, from clear white through yellow, orange, and brown, to near black. Amber often features impurities such as oxygen bubble, veins, fragments of bark or cracks which form when the tree resin hardens. This quality guarantees that every piece of amber is unique.</span><br></p>', '2023-04-12 14:21:48', '2023-04-12 14:21:48', 0),
(44, 'Bastet Cat Soft Toy', 69, 49, 4, 'asset/photo/Bastet Cat Soft Toy.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify; background-color: rgb(245, 245, 245);\">Amber is a fossilised tree resin found commonly in Baltic regions. It has been prized as a gemstone for its colour and natural beauty since Neolithic times, and can be seen featured in jewellery worldwide. Although usually recognised for its deep brownish-orange hue, amber occurs in a range of colours, from clear white through yellow, orange, and brown, to near black. Amber often features impurities such as oxygen bubble, veins, fragments of bark or cracks which form when the tree resin hardens. This quality guarantees that every piece of amber is unique.</span><br></p>', '2023-04-12 14:28:48', '2023-04-12 14:28:48', 0),
(45, 'Egyptian Gods Replicas, Set of 4', 89, 69, 4, 'asset/photo/Egyptian Gods Replicas, Set of 4.jpg', '<p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">A pewter openwork necklace set with an amber gemstone, inspired by Celtic jewellery.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">The Celts used knot-work to decorate many of their artefacts. The intricate patterns woven into spirals and knots symbolised the continuity of life.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Suspended on a steel chain, this elaborate knot pendant has been hand-made in Cornwall, UK and is presented in a gift box.</p>', '2023-04-12 14:44:48', '2023-04-12 14:44:48', 0),
(47, 'Greek God Rubber Duck', 69, 49, 4, 'asset/photo/Greek God Rubber Duck.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Brighten up your home with our gorgeous interior furnishings and decorative accessories, inspired by the art and artefacts housed in the British Museum. Browse through seasonal decorations with year-round appeal, Tapestries from Belgium and hand-made Turkish ceramics, vibrant ornaments and intricate glassware, all designed to delight fans of ancient and modern history.</span><br></p>', '2023-04-12 14:33:49', '2023-04-12 14:33:49', 0),
(49, 'Roman Britain Coin Set I', 59, 29, 2, 'asset/photo/Roman Britain Coin Set I.jpg', 'Exclusive to the British Museum, a wool silk scarf featuring modern interpretations of the colourful motifs found on Iznik ceramics.  Produced throughout the late 15th to the late 17th centuries, the ceramics of Iznik, Turkey, were among the finest works of art from the Ottoman Empire. Influenced by Ottoman arabesque patterns as well as traditional Chinese design, the pottery was often decorated with flowers and abstract patterns in bright, vivid colours. The technical quality of the pottery, and the beauty of its designs, have long made it one of the most popular art forms in the Islamic world.  Several pieces of Iznik pottery are housed in the British Museum, and can be seen on display in the Islamic galleries.  A stunning gift for an art lover.  ', '2023-04-08 15:46:01', '2023-04-08 15:46:01', 0),
(50, 'Roman Britain Coin Set III', 89, 49, 2, 'asset/photo/Roman Britain Coin Set III.jpg', 'Exclusive to the British Museum, a wool silk scarf featuring modern interpretations of the colourful motifs found on Iznik ceramics.  Produced throughout the late 15th to the late 17th centuries, the ceramics of Iznik, Turkey, were among the finest works of art from the Ottoman Empire. Influenced by Ottoman arabesque patterns as well as traditional Chinese design, the pottery was often decorated with flowers and abstract patterns in bright, vivid colours. The technical quality of the pottery, and the beauty of its designs, have long made it one of the most popular art forms in the Islamic world.  Several pieces of Iznik pottery are housed in the British Museum, and can be seen on display in the Islamic galleries.  A stunning gift for an art lover.  ', '2023-04-08 15:21:02', '2023-04-08 15:21:02', 0),
(51, 'Roman Gladiator Figures, Set of 4', 129, 79, 4, 'asset/photo/Roman Gladiator Figures, Set of 4.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Keep calm and carry a fabulous bag! Whether you are looking for an environmentally-friendly tote bag featuring historical fine art, a wash bag illustrated with childhood favourite Peter Rabbit, or a purse celebrating the beauty of London, you are sure to find the perfect piece to suit your style. Many of our pieces are exclusive to the British Museum, and are inspired by art and artefacts from the Museum\'s collection.&nbsp;</span><br></p>', '2023-04-12 14:04:50', '2023-04-12 14:04:50', 0),
(52, 'Samurai Rubber Duck', 69, 39, 2, 'asset/photo/Samurai Rubber Duck.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Keep calm and carry a fabulous bag! Whether you are looking for an environmentally-friendly tote bag featuring historical fine art, a wash bag illustrated with childhood favourite Peter Rabbit, or a purse celebrating the beauty of London, you are sure to find the perfect piece to suit your style. Many of our pieces are exclusive to the British Museum, and are inspired by art and artefacts from the Museum\'s collection. </span><br></p>', '2023-04-12 14:11:57', '2023-04-12 14:11:57', 0),
(53, 'Sphinx Rubber Duck', 79, 39, 2, 'asset/photo/Sphinx Rubber Duck.jpg', 'Exclusive to the British Museum, a vibrant wool silk scarf featuring images from Indian paintings in the Museum’s collection.  This scarf forms part of a range accompanying the British Museum exhibition Tantra: enlightenment to revolution.  The beautiful purple scarf is decorated with brightly coloured characters and buildings as well as other details from original Mughal-style prints housed in the British Museum. Dancing men and women are surrounded by tigers, peacocks, lotus flowers and exquisite palaces.    An exceptional gift for a lover of Indian art.', '2023-04-08 15:15:08', '2023-04-08 15:15:08', 0),
(54, 'Astrolabe Keyring', 39, 19, 3, 'asset/photo/Astrolabe Keyring.jpg', 'Exclusive to the British Museum, a vibrant wool silk scarf featuring images from Indian paintings in the Museum’s collection.  This scarf forms part of a range accompanying the British Museum exhibition Tantra: enlightenment to revolution.  The beautiful purple scarf is decorated with brightly coloured characters and buildings as well as other details from original Mughal-style prints housed in the British Museum. Dancing men and women are surrounded by tigers, peacocks, lotus flowers and exquisite palaces.    An exceptional gift for a lover of Indian art.', '2023-04-08 15:47:08', '2023-04-08 15:47:08', 0),
(55, 'Egyptian Cat Keyring', 39, 19, 4, 'asset/photo/Egyptian Cat Keyring.jpg', '<p></p><div class=\"mobile-tab-wrapper\" style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(245,=\"\" 245,=\"\" 245);=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div class=\"mobile-accordion\"></div></div><div class=\"product info detailed\" style=\"clear: both; margin-bottom: 0px; padding-bottom: 0px; border: 0px; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(245,=\"\" 245,=\"\" 245);=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div class=\"product data items\" role=\"tablist\" style=\"margin: 0px; padding: 0px; list-style: none none; border: 0px; position: relative; z-index: 1;\"><div class=\"data item title active\" data-role=\"collapsible\" id=\"tab-label-upselltab\" role=\"tab\" data-collapsible=\"true\" aria-controls=\"upselltab\" aria-selected=\"false\" aria-expanded=\"true\" tabindex=\"0\" style=\"box-sizing: border-box; float: left; width: auto; margin-top: 0px; margin-right: -1px; margin-bottom: 0px; margin-left: 30px !important;\"></div></div></div><p></p><div class=\"description-tab\" style=\"width: 789.6px; max-width: 100%; padding: 0px; margin: 0px 0px 15px; float: left; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(245,=\"\" 245,=\"\" 245);=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><section id=\"content1\" style=\"display: block; padding: 20px 0px; border-top: 1px solid rgb(229, 229, 229); border-bottom: 1px solid rgb(229, 229, 229); margin-bottom: 30px;\"><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">It is likely that around 5,000 prints were made from Hokusai’s woodblock, although many of the originals ', '2023-04-12 14:37:51', '2023-04-12 14:37:51', 0),
(56, 'Egyptian Charms Keyring', 39, 19, 3, 'asset/photo/Egyptian Charms Keyring.jpg', 'Exclusive to the British Museum, a vibrant wool silk scarf featuring images from Indian paintings in the Museum’s collection.  This scarf forms part of a range accompanying the British Museum exhibition Tantra: enlightenment to revolution.  The beautiful purple scarf is decorated with brightly coloured characters and buildings as well as other details from original Mughal-style prints housed in the British Museum. Dancing men and women are surrounded by tigers, peacocks, lotus flowers and exquisite palaces.    An exceptional gift for a lover of Indian art.', '2023-04-08 15:40:09', '2023-04-08 15:40:09', 0),
(57, 'Greek Charms Keyring', 39, 19, 3, 'asset/photo/Greek Charms Keyring.jpg', 'Exclusive to the British Museum, a vibrant wool silk scarf featuring images from Indian paintings in the Museum’s collection.  This scarf forms part of a range accompanying the British Museum exhibition Tantra: enlightenment to revolution.  The beautiful purple scarf is decorated with brightly coloured characters and buildings as well as other details from original Mughal-style prints housed in the British Museum. Dancing men and women are surrounded by tigers, peacocks, lotus flowers and exquisite palaces.    An exceptional gift for a lover of Indian art.', '2023-04-08 15:04:10', '2023-04-08 15:04:10', 0),
(58, 'Lewis Chessmen King Keyring', 39, 19, 3, 'asset/photo/Lewis Chessmen King Keyring.jpg', 'A pair of cosy men’s cotton socks inspired by the ancient Egyptian god Anubis.  The socks are part of a range accompanying the British Museum exhibition Hieroglyphs: unlocking ancient Egypt.  These socks are made from a cotton blend and fit a UK men’s size 6.5-11. The design features an outline figure of Anubis wearing gold armour and carrying a gold spear against a black background.  Anubis is one of the most well-known of the ancient Egyptian gods. Worshipped as the guardian and protector of the dead, Anubis was usually depicted as a jackal (a long-legged wild dog) or a wolf. He is also sometimes depicted as having the body of a man and the head of a dog. Anubis watched over the mummification process before conducting the soul through the underworld. He was present for the Weighing of the Heart ceremony, and determined whether the deceased was worthy to enter the realm of the dead.  A fun clothing gift.', '2023-04-08 15:27:10', '2023-04-08 15:27:10', 0),
(59, 'Lucky Cat Keyring', 39, 19, 3, 'asset/photo/Lucky Cat Keyring.jpg', 'A pair of cosy men’s cotton socks inspired by the ancient Egyptian god Anubis.  The socks are part of a range accompanying the British Museum exhibition Hieroglyphs: unlocking ancient Egypt.  These socks are made from a cotton blend and fit a UK men’s size 6.5-11. The design features an outline figure of Anubis wearing gold armour and carrying a gold spear against a black background.  Anubis is one of the most well-known of the ancient Egyptian gods. Worshipped as the guardian and protector of the dead, Anubis was usually depicted as a jackal (a long-legged wild dog) or a wolf. He is also sometimes depicted as having the body of a man and the head of a dog. Anubis watched over the mummification process before conducting the soul through the underworld. He was present for the Weighing of the Heart ceremony, and determined whether the deceased was worthy to enter the realm of the dead.  A fun clothing gift.', '2023-04-08 15:46:10', '2023-04-08 15:46:10', 0),
(60, 'Medieval Charms Keyring', 39, 19, 4, 'asset/photo/Medieval Charms Keyring.jpg', '<p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Designed exclusively for the British Museum, a&nbsp;packable bag with a design inspired by the iconic Fuji Wave.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Avoid single-use plastic bags by carrying this compact shopper with you. Folding down into a separate pouch, this bag is ideal to keep in your handbag, ready for everyday use.</p>', '2023-04-12 14:02:52', '2023-04-12 14:02:52', 0),
(61, 'Mummy Keyring', 39, 19, 3, 'asset/photo/Mummy Keyring.jpg', 'A pair of cosy men’s cotton socks inspired by the ancient Egyptian god Anubis.  The socks are part of a range accompanying the British Museum exhibition Hieroglyphs: unlocking ancient Egypt.  These socks are made from a cotton blend and fit a UK men’s size 6.5-11. The design features an outline figure of Anubis wearing gold armour and carrying a gold spear against a black background.  Anubis is one of the most well-known of the ancient Egyptian gods. Worshipped as the guardian and protector of the dead, Anubis was usually depicted as a jackal (a long-legged wild dog) or a wolf. He is also sometimes depicted as having the body of a man and the head of a dog. Anubis watched over the mummification process before conducting the soul through the underworld. He was present for the Weighing of the Heart ceremony, and determined whether the deceased was worthy to enter the realm of the dead.  A fun clothing gift.', '2023-04-08 15:25:11', '2023-04-08 15:25:11', 0),
(62, 'Roman Charms Keyring', 39, 29, 3, 'asset/photo/Roman Charms Keyring.jpg', 'A beaded keyring with a design inspired by the classic red London bus.    The design represents the Routemaster double-decker bus, an iconic London symbol. Characterised by its hop-on hop-off design, it was introduced in 1956 and remained in general service until 2005, although its legacy continues.  A fun souvenir of London.', '2023-04-08 15:46:11', '2023-04-08 15:46:11', 0),
(63, 'Rosetta Stone Metal Keyring', 39, 29, 4, 'asset/photo/Rosetta Stone Metal Keyring.jpg', '<p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Designed exclusively for the British Museum, a&nbsp;packable bag with a design inspired by the iconic Fuji Wave.</p><p style=\"margin-top: 0rem; color: rgb(0, 0, 0); text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">Avoid single-use plastic bags by carrying this compact shopper with you. Folding down into a separate pouch, this bag is ideal to keep in your handbag, ready for everyday use.</p>', '2023-04-12 14:24:52', '2023-04-12 14:24:52', 0),
(64, 'Byzantine Triple Crescent Necklace', 99, 69, 4, 'asset/photo/Byzantine Triple Crescent Necklace.jpg', 'From sumptuous silks to wonderful wools, find perfect history-inspired scarves, wraps and shawls for every season. Explore artist Grayson Perry’s whimsical map of the British Museum recreated in silk, or choose a classic tartan from the beautiful Scottish mills, and stay warm in style.', '2023-04-08 15:54:12', '2023-04-08 15:54:12', 0),
(65, 'Gold Labradorite Necklace', 99, 69, 4, 'asset/photo/Gold Labradorite Necklace.jpg', 'From sumptuous silks to wonderful wools, find perfect history-inspired scarves, wraps and shawls for every season. Explore artist Grayson Perry’s whimsical map of the British Museum recreated in silk, or choose a classic tartan from the beautiful Scottish mills, and stay warm in style.', '2023-04-08 15:17:13', '2023-04-08 15:17:13', 0),
(66, 'Greek Bee Pendant Necklace', 99, 69, 4, 'asset/photo/Greek Bee Pendant Necklace.jpg', 'From sumptuous silks to wonderful wools, find perfect history-inspired scarves, wraps and shawls for every season. Explore artist Grayson Perry’s whimsical map of the British Museum recreated in silk, or choose a classic tartan from the beautiful Scottish mills, and stay warm in style.', '2023-04-08 15:37:13', '2023-04-08 15:37:13', 0),
(67, 'Hathor Pink and Teal Pendant Necklace', 99, 69, 4, 'asset/photo/Hathor Pink and Teal Pendant Necklace.jpg', 'From sumptuous silks to wonderful wools, find perfect history-inspired scarves, wraps and shawls for every season. Explore artist Grayson Perry’s whimsical map of the British Museum recreated in silk, or choose a classic tartan from the beautiful Scottish mills, and stay warm in style.', '2023-04-08 15:56:13', '2023-04-08 15:56:13', 0),
(68, 'Indian Peacock Brooch Necklace', 99, 69, 4, 'asset/photo/Indian Peacock Brooch Necklace.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">From sumptuous silks to wonderful wools, find perfect history-inspired scarves, wraps and shawls for every season. Explore artist Grayson Perry’s whimsical map of the British Museum recreated in silk, or choose a classic tartan from the beautiful Scottish mills, and stay warm in style.</span><br></p>', '2023-04-12 14:48:52', '2023-04-12 14:48:52', 0),
(70, 'Lamassu Winged Bull Necklace', 99, 69, 4, 'asset/photo/Lamassu Winged Bull Necklace.jpg', 'From sumptuous silks to wonderful wools, find perfect history-inspired scarves, wraps and shawls for every season. Explore artist Grayson Perry’s whimsical map of the British Museum recreated in silk, or choose a classic tartan from the beautiful Scottish mills, and stay warm in style.', '2023-04-08 15:13:15', '2023-04-08 15:13:15', 0),
(71, 'Medusa Pendant Necklace', 99, 69, 4, 'asset/photo/Medusa Pendant Necklace.jpg', 'his unique scarf is made in Italy from 100% silk. The design features the titles of Shakespeare’s most well-known plays under the headers ‘Comedies’ and ‘Tragedies’, bordered by a vibrant stripe of red.  The scarf is designed by Rory Hutton to celebrate William Shakespeare’s First Folio – a collection of 36 plays first published in 1623, seven years after Shakespeare’s death, which included comedies, histories and tragedies. The folio is considered one of the most influential books ever published.  A stunning gift for a literature lover.', '2023-04-08 15:34:15', '2023-04-08 15:34:15', 0),
(72, 'Persian Lovebird Necklace', 99, 69, 4, 'asset/photo/Persian Lovebird Necklace.jpg', 'his unique scarf is made in Italy from 100% silk. The design features the titles of Shakespeare’s most well-known plays under the headers ‘Comedies’ and ‘Tragedies’, bordered by a vibrant stripe of red.  The scarf is designed by Rory Hutton to celebrate William Shakespeare’s First Folio – a collection of 36 plays first published in 1623, seven years after Shakespeare’s death, which included comedies, histories and tragedies. The folio is considered one of the most influential books ever published.  A stunning gift for a literature lover.', '2023-04-08 15:56:15', '2023-04-08 15:56:15', 0),
(73, 'Thebes Greek Vase Necklace', 99, 69, 4, 'asset/photo/Thebes Greek Vase Necklace.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify; background-color: rgb(245, 245, 245);\">Amber is a fossilised tree resin found commonly in Baltic regions. It has been prized as a gemstone for its colour and natural beauty since Neolithic times, and can be seen featured in jewellery worldwide. Although usually recognised for its deep brownish-orange hue, amber occurs in a range of colours, from clear white through yellow, orange, and brown, to near black. Amber often features impurities such as oxygen bubble, veins, fragments of bark or cracks which form when the tree resin hardens. This quality guarantees that every piece of amber is unique.</span><br></p>', '2023-04-12 14:02:48', '2023-04-12 14:02:48', 0),
(74, 'Winged Scarab Pendant Necklace', 99, 69, 4, 'asset/photo/Winged Scarab Pendant Necklace.jpg', '<p></p><div class=\"mobile-tab-wrapper\" style=\"color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(245,=\"\" 245,=\"\" 245);=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div class=\"mobile-accordion\"></div></div><div class=\"product info detailed\" style=\"clear: both; margin-bottom: 0px; padding-bottom: 0px; border: 0px; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(245,=\"\" 245,=\"\" 245);=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><div class=\"product data items\" role=\"tablist\" style=\"margin: 0px; padding: 0px; list-style: none none; border: 0px; position: relative; z-index: 1;\"><div class=\"data item title active\" data-role=\"collapsible\" id=\"tab-label-upselltab\" role=\"tab\" data-collapsible=\"true\" aria-controls=\"upselltab\" aria-selected=\"false\" aria-expanded=\"true\" tabindex=\"0\" style=\"box-sizing: border-box; float: left; width: auto; margin-top: 0px; margin-right: -1px; margin-bottom: 0px; margin-left: 30px !important;\"></div></div></div><p></p><div class=\"description-tab\" style=\"width: 789.6px; max-width: 100%; padding: 0px; margin: 0px 0px 15px; float: left; color: rgb(51, 51, 51); font-family: \" helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" font-style:=\"\" normal;=\"\" font-variant-ligatures:=\"\" font-variant-caps:=\"\" font-weight:=\"\" 400;=\"\" letter-spacing:=\"\" orphans:=\"\" 2;=\"\" text-align:=\"\" start;=\"\" text-indent:=\"\" 0px;=\"\" text-transform:=\"\" none;=\"\" white-space:=\"\" widows:=\"\" word-spacing:=\"\" -webkit-text-stroke-width:=\"\" background-color:=\"\" rgb(245,=\"\" 245,=\"\" 245);=\"\" text-decoration-thickness:=\"\" initial;=\"\" text-decoration-style:=\"\" text-decoration-color:=\"\" initial;\"=\"\"><section id=\"content1\" style=\"display: block; padding: 20px 0px; border-top: 1px solid rgb(229, 229, 229); border-bottom: 1px solid rgb(229, 229, 229); margin-bottom: 30px;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify; background-color: rgb(245, 245, 245);\">Amber is a fossilised tree resin found commonly in Baltic regions. It has been prized as a gemstone for its colour and n', '2023-04-12 14:49:47', '2023-04-12 14:49:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `qty_childs` int(10) NOT NULL,
  `qty_adults` int(10) NOT NULL,
  `price_total` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(150) NOT NULL,
  `code` varchar(155) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `status`, `qty_childs`, `qty_adults`, `price_total`, `name`, `email`, `telephone`, `code`, `created_at`) VALUES
(1, 2, 1, 2, '70.23', 'Ho Minh Quang', 'quanghmps25806@fpt.edu.vn', '0965649531', 'Hsa79t', '2023-04-03 09:05:47'),
(3, 1, 2, 1, '69.22', 'Huỳnh Hiếu', 'huynhhieupoly@gmail.com', '0985661478', '25dQQY', '2023-04-03 09:57:04'),
(4, 1, 2, 4, '105.7', 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', 'xe21681239429', '2023-04-11 20:57:09'),
(7, 1, 4, 6, '169.5', 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', 'Uxx1681239595', '2023-04-11 20:59:55'),
(8, 1, 4, 5, '148.55', 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', 'sr21681288471', '2023-04-12 10:34:31'),
(9, 1, 3, 2, '74.75', 'Hoang Quan', 'quanhps25481@fpt.edu.vn', '033668952', 'VkE1681291351', '2023-04-12 11:22:31'),
(10, 1, 4, 7, '190.45', 'Hoan', '', '', 'N641681291561', '2023-04-12 11:26:01'),
(11, 1, 6, 9, '254.25', 'Hoang Quan', 'quanhps25481@fpt.edu.vn', '214124111123', 'YVl1681291589', '2023-04-12 11:26:29'),
(12, 1, 4, 3, '106.65', 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', 'odU1681296554', '2023-04-12 12:49:14'),
(13, 1, 1, 2, '52.85', 'Hoang Quan', 'quanhps25481@fpt.edu.vn', '03366795', 'zKd1681296849', '2023-04-12 12:54:09'),
(14, 1, 3, 2, '74.75', 'Quan', 'quanhps25481@fpt.edu.vn', '11232132131231231', 'opM1681302539', '2023-04-12 14:28:59'),
(15, 1, 3, 2, '74.75', 'Quan', 'quanhps25481@fpt.edu.vn', '11232132131231231', '8Oh1681302543', '2023-04-12 14:29:03'),
(16, 1, 3, 2, '74.75', 'Quan', 'quanhps25481@fpt.edu.vn', '11232132131231231', 'v8X1681302547', '2023-04-12 14:29:07'),
(17, 1, 3, 2, '74.75', 'Quan', 'quanhps25481@fpt.edu.vn', '11232132131231231', 'TRW1681302550', '2023-04-12 14:29:10'),
(18, 1, 3, 2, '74.75', 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', 'Xax1681302817', '2023-04-12 14:33:37'),
(19, 1, 3, 2, '74.75', 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', 'AOh1681302821', '2023-04-12 14:33:41'),
(20, 1, 3, 2, '74.75', 'Ho Minh Quang', 'quanhps25481@fpt.edu.vn', '03364899', 'GMl1681304719', '2023-04-12 15:05:19'),
(21, 1, 1, 2, '52.85', 'Vuong Khanh Linh', 'quanhps25481@fpt.edu.vn', '0964524611', 'PCA1681304830', '2023-04-12 15:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`user_id`, `token`, `created_at`) VALUES
(1, 'hominhquang01@gmail.com1680518566', '2023-04-03 12:42:46'),
(1, 'hominhquang01@gmail.com1680801534', '2023-04-06 19:18:54'),
(1, 'hominhquang01@gmail.com1681215845', '2023-04-11 14:24:05'),
(1, 'hominhquang01@gmail.com1681217452', '2023-04-11 14:50:52'),
(1, 'hominhquang01@gmail.com1681232455', '2023-04-11 19:00:55'),
(1, 'hominhquang01@gmail.com1681240508', '2023-04-11 21:15:08'),
(1, 'hominhquang01@gmail.com1681281106', '2023-04-12 08:31:46'),
(1, 'hominhquang01@gmail.com1681295909', '2023-04-12 12:38:29'),
(1, 'hominhquang01@gmail.com1681299237', '2023-04-12 13:33:57'),
(1, 'hominhquang01@gmail.com1681302265', '2023-04-12 14:24:25'),
(1, 'hominhquang01@gmail.com1681303070', '2023-04-12 14:37:50'),
(1, 'hominhquang01@gmail.com1681310691', '2023-04-12 16:44:51'),
(1, 'hominhquang01@gmail.com1681316589', '2023-04-12 18:23:09'),
(2, 'vuongkhanhlinh99@gmail.com1680578141', '2023-04-04 05:15:41'),
(2, 'vuongkhanhlinh99@gmail.com1681215829', '2023-04-11 14:23:49'),
(2, 'vuongkhanhlinh99@gmail.com1681217764', '2023-04-11 14:56:04'),
(3, 'meocao52@gmail.com1680174131', '2023-03-30 13:02:11'),
(3, 'meocao52@gmail.com1680515250', '2023-04-03 11:47:30'),
(3, 'meocao52@gmail.com1680518561', '2023-04-03 12:42:41'),
(3, 'meocao52@gmail.com1681217501', '2023-04-11 14:51:41'),
(3, 'meocao52@gmail.com1681217804', '2023-04-11 14:56:44'),
(3, 'meocao52@gmail.com1681217831', '2023-04-11 14:57:11'),
(3, 'meocao52@gmail.com1681218041', '2023-04-11 15:00:41'),
(5, 'quanhps25481@fpt.edu.vn1681216283', '2023-04-11 14:31:23'),
(5, 'quanhps25481@fpt.edu.vn1681216360', '2023-04-11 14:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  `thumbnail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`, `thumbnail`) VALUES
(1, 'Hồ Minh Quang', 'hominhquang01@gmail.com', '0965649531', '127 Ngô Thì Nhậm, Dĩ An, Dĩ An', '123456', 1, '2022-11-15 16:20:46', '2022-11-15 16:20:46', 0, NULL),
(2, 'Vuong Khanh Linh', 'vuongkhanhlinh99@gmail.com', '0964524611', '109/11/7A đường số 8 Linh Xuân Thủ Đức', '123456', 1, '2022-12-22 13:44:31', '2022-12-22 13:44:31', 0, ''),
(3, 'Vương Khánh Linh', 'meocao52@gmail.com', '0964524611', '109/11/7A duong so 8 Linh Trung Thu Duc', '123456', 2, '2022-12-07 08:35:26', '2022-12-07 08:35:26', 0, NULL),
(5, 'Hoàng Quân', 'quanhps25481@fpt.edu.vn', NULL, NULL, '123456', 2, '2023-04-11 14:31:19', '2023-04-11 14:31:19', 0, NULL),
(6, 'GUEST', 'user@gmail.com', '0965649531', 'adminAddress', '123456', 2, '2023-04-12 19:18:53', '2023-04-12 19:18:53', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_explore`
--
ALTER TABLE `category_explore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explore`
--
ALTER TABLE `explore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_idexplore_catexplore` (`category_explore_id`);

--
-- Indexes for table `explore_thumbnails`
--
ALTER TABLE `explore_thumbnails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`explore_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category_explore`
--
ALTER TABLE `category_explore`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `explore`
--
ALTER TABLE `explore`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `explore_thumbnails`
--
ALTER TABLE `explore_thumbnails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `explore`
--
ALTER TABLE `explore`
  ADD CONSTRAINT `lk_idexplore_catexplore` FOREIGN KEY (`category_explore_id`) REFERENCES `category_explore` (`id`);

--
-- Constraints for table `explore_thumbnails`
--
ALTER TABLE `explore_thumbnails`
  ADD CONSTRAINT `explore_thumbnails_ibfk_1` FOREIGN KEY (`explore_id`) REFERENCES `explore` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `lk_token_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
