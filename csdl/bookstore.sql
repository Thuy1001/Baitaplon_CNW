-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 05:32 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `ad_id` int(11) UNSIGNED NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_password` varchar(50) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_phone` varchar(15) DEFAULT NULL,
  `ad_address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(10) NOT NULL,
  `cate_title` varchar(100) NOT NULL,
  `pruduct` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_title`, `pruduct`) VALUES
(1, 'Tôn Giáo', 0),
(2, 'Truyện Ngắn', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `pro_qty` varchar(100) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `order_date` date NOT NULL,
  `confirm` tinyint(4) NOT NULL DEFAULT 0,
  `delivery` tinyint(4) NOT NULL DEFAULT 0,
  `pro_id` int(11) NOT NULL,
  `pro_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `pro_qty`, `total_amount`, `order_date`, `confirm`, `delivery`, `pro_id`, `pro_user`) VALUES
(1, '1', '100.000', '2021-10-27', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `item_number` varchar(50) NOT NULL,
  ` account_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_gross` float NOT NULL,
  `pay_status` varchar(20) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`pay_id`, `item_number`, ` account_number`, `pay_gross`, `pay_status`, `pro_id`) VALUES
(1, '1', '1900567382659', 100000, 'Bank account', 1),
(2, '2', '1474378487597', 200000, 'Credit', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_code` varchar(11) NOT NULL,
  `pro_cat` int(100) NOT NULL,
  `pro_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pro_status` int(11) NOT NULL DEFAULT 1,
  `pro_desc` text NOT NULL,
  `feature_image` text NOT NULL,
  `Quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `pro_code`, `pro_cat`, `pro_title`, `pro_price`, `pro_status`, `pro_desc`, `feature_image`, `Quantity`) VALUES
(1, 'BS001', 1, 'Giận', '100.000', 1, '&lt;span style=&quot;color: rgb(44, 62, 80); font-family: Lato, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 15px;&quot;&gt;Mathematics 9 is written by Dr. Karamat H. Dar and Prof. Irfan-ul-Haq and this book is published by Carvan Book House, Lahore, Pakistan. This book consist of 302 pages and there are 17 units. Notes of Unit 1 and 3 are provided by&amp;nbsp;&lt;/span&gt;&lt;b style=&quot;color: rgb(44, 62, 80); font-family: Lato, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 15px;&quot;&gt;&lt;a href=&quot;https://www.mathcity.org/people/moin&quot; class=&quot;wikilink1&quot; title=&quot;people:moin&quot; data-wiki-id=&quot;people:moin&quot; style=&quot;color: rgb(24, 188, 156); text-decoration-line: none;&quot;&gt;Engr. Moin Latif&lt;/a&gt;&lt;/b&gt;&lt;span style=&quot;color: rgb(44, 62, 80); font-family: Lato, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif; font-size: 15px;&quot;&gt;. We are very thankful to him for providing these notes.&lt;/span&gt;', 'gian.jpg', 90),
(2, 'BS002', 1, 'Muốn an được an', '100.000', 1, '&lt;p style=&quot;margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(246, 246, 246);&quot;&gt;Free download the Book&amp;nbsp;&lt;span style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(0, 0, 0);&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;&quot;&gt;Physics&lt;/b&gt;&lt;/span&gt;&amp;nbsp;is for 10th class. This book is published by Malik Sirajuddin &amp;amp; Sons and authors of the book are Dr. Azmat Iqbal and Dr. Ghulam Murtaza.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(246, 246, 246);&quot;&gt;Ostensibly the best sci-fi “endeavor” of the twentieth century, “Star Trek” has caught the creative energies of millions since it debuted as a TV arrangement in 1966. As we watch the group of the Star-ship Endeavor experience life on different planets and attempt to coexist with outsider species, we start to perceive any reason why Quality Roddenberry’s “Wagon Prepare to the Stars” has produced three extra television arrangement, seven films, and a dedicated, bad-to-the-bone fan base. Star Trek inspires us to consider a future for mankind that is loaded with expectation and potential. It likewise takes advantage of the unconventionally American brand of idealism. From scene to scene, Skippers Kirk and Picard explore the Endeavor and its team out of apparently obstinate circumstances utilizing their creativity and cleverness.&lt;/p&lt', 'muonanduocan.jpg', 100),
(3, 'BS003', 2, 'Hai số phận', '100.000', 1, '&lt;p style=&quot;margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(246, 246, 246);&quot;&gt;Free download the book Physics 9th Class&lt;b style=&quot;margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;&quot;&gt;&amp;nbsp;&lt;/b&gt;English medium students. This book is by&amp;nbsp;&lt;a href=&quot;http://www.ptb.gop.pk/&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; text-decoration-line: none; color: rgb(227, 87, 38); transition: background-color 0s ease 0s, color 0.2s linear 0s; -webkit-tap-highlight-color: rgb(255, 94, 153);&quot;&gt;Punjab Curriculum and Textbook Board&lt;/a&gt;, Lahore, and published by Caravan Book House, Lahore.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(246, 246, 246);&quot;&gt;The authors of the book are Prof. Tahir Hassan and Prof. Muhammad Naeem Anwar.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 20px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(246, 246, 246);&quot;&gt;The Case for Physics&lt;br&gt;Trefil refers back to the “physics first” technique presented through 1988 Nobel Laureate Leon Lederman in his Chicago-based instructional reforms.&lt;/p&gt;', 'haisophan.jpg', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `user_regis_date` datetime DEFAULT current_timestamp(),
  `mobile` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_regis_date`, `mobile`, `address`, `user_code`) VALUES
(1, 'Thuha2001', 'thuha@gmail.com', 'Thuha2001', '2021-10-27 09:25:51', '0978758934', 'Hà Nội', ''),
(2, 'Hongthang2001', 'Hthang@gmail.com', 'Hthang2001', '2021-10-27 09:30:13', '0347884893', 'Thái Bình', ''),
(3, 'Thuy2001', 'Hthuy@gmail.com', 'Thuy2001', '2021-10-27 09:30:58', '0947848747', 'Hòa Bình', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ad_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `ad_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
