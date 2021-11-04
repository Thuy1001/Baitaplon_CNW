-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 07:18 PM
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
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_pass` varchar(50) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_phone` varchar(15) DEFAULT NULL,
  `ad_address` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`ad_id`, `ad_name`, `ad_pass`, `ad_email`, `ad_phone`, `ad_address`) VALUES
(6, 'phamhong', '21232f297a57a5a743894a0e4a801fc3', 'phamhong@gmail.com', '057837821', 'Thái Nguyên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(100) NOT NULL,
  `cate_title` varchar(100) NOT NULL,
  `cate_url` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_title`, `cate_url`) VALUES
(1, 'Tôn Giáo', 'tongiao.php'),
(2, 'Truyện ngắn', 'truyenngan.php');

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
  `acc_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_gross` float NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `pay_status` varchar(20) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`pay_id`, `item_number`, `acc_number`, `pay_gross`, `currency_code`, `pay_status`, `pro_id`) VALUES
(1, '1', '1900567382659', 100000, '', 'Bank account', 1),
(2, '2', '1474378487597', 200000, '', 'Credit', 2);

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
  `pro_desc` text NOT NULL,
  `feature_image` text NOT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `pro_code`, `pro_cat`, `pro_title`, `pro_price`, `pro_desc`, `feature_image`, `quantity`) VALUES
(1, 'BS001', 1, 'Giận', '100.000', 'Giận là một cuốn sách hay của Thiền sư Thích Nhất Hạnh, nó mở ra cho ta những khả năng kỳ diệu, nhưng lại rất dễ thực hành để ta tự mình từng bướ thoát khỏi cơn giận và sống đẹp với xã hội quanh mình.', 'gian.jpg', 90),
(2, 'BS002', 1, 'Muốn an được an', '100.000', 'Mỗi ngày chúng ta có rất nhiều cảm thọ. Khi thì hạnh phúc, lúc thì buồn khổ. Các cảm thọ cứ lần lượt đến với ta như một dòng sông. Rõ ràng việc thực tập thiền là rất quan trọng. Hành thiền để ý thức được, ghi nhận từng cảm thọ, thậm chí ôm ấp từng cảm thọ. Tôi luôn nhắc mình thực tập như vậy. Tôi biết điều này bởi thiền sư Thích Nhất Hạnh đã hướng dẫn chúng tôi cách đây tròn 10 năm, từ 2005 khi tôi may mắn được biết đến Thầy. Nhờ Thầy mà tôi dần biết cách tìm bình an trong chính mình.\r\n\r\nTôi đã nhận ra rằng thiền rất giản đơn, có thể thiền tập ở bất cứ đâu và bất cứ giờ nào trong ngày. Thiền không có nghĩa là vào rừng ẩn tu hay trốn tránh xã hội. Nếu như chúng ta cùng nhắc nhau thiền mỗi ngày thì đời sống đẹp biết nhường nào và xã hội sẽ tươi mát vô cùng.\r\n\r\nNgày chủ nhật và cũng là ngày cuối cùng của tháng 11 năm 2014 tôi nhận được bản thảo cuốn sách Muốn an được an của thiền sư Thích Nhất Hạnh đã được sư cô Hội Nghiêm dịch ra tiếng Việt từ bản nguyên gốc tiếng anh Being peace. Tôi ngồi vào bàn rồi đọc ngay tức khắc.', 'muonanduocan.jpg', 9),
(18, 'BS004', 2, 'Hai số phận', '80000', '“Hai số phận” không chỉ đơn thuần là một cuốn tiểu thuyết, đây có thể xem là “thánh kinh” cho những người đọc và suy ngẫm, những ai không dễ dãi, không chấp nhận lối mòn.\r\n\r\n“Hai số phận” làm rung động mọi trái tim quả cảm, nó có thể làm thay đổi cả cuộc đời bạn. Đọc cuốn sách này, bạn sẽ bị chi phối bởi cá tính của hai nhân vật chính, hoặc bạn là Kane, hoặc sẽ là Abel, không thể nào nhầm lẫn. Và điều đó sẽ khiến bạn thấy được chính mình.\r\n\r\nKhi bạn yêu thích tác phẩm này, người ta sẽ nhìn ra cá tính và tâm hồn thú vị của bạn!\r\n\r\n“Nếu có giải thưởng Nobel về khả năng kể chuyện, giải thưởng đó chắc chắn sẽ thuộc về Archer.”\r\n\r\n– Daily Telegraph-', 'haisophan.jpg', 7),
(20, 'BS004', 2, 'Hoàng tử bé', '130000', ' Hoàng tử bé', 'hoangtube.jpg', 3),
(21, 'BS005', 1, 'Tĩnh lặng', '70000', ' Tĩnh lặng', 'tinhlang.jpg', 5),
(23, 'BS007', 2, 'Tự yêu', '65000', ' Nếu bạn đã một đôi lần thấy lòng đồng cảm với những dòng suy nghĩ, chiêm nghiệm của Du Phong, bạn đã từng hỏi vì sao những câu chữ kia có thể đúng với bản thân mình như vậy, như là nói lộ tâm tư của mình, như là trả lời câu hỏi bấy lâu nay mình vẫn tìm kiếm... thì bạn sẽ tìm thấy chính mình nhiều hơn, khai phá bản thân mình sâu hơn khi đọc cuốn sách TỰ YÊU. Bởi trong sách là tất cả những gì bạn muốn nói, bạn không thể nói, hoặc bạn muốn giấu đi.', 'tuyeu.jpg', 10),
(24, 'BS008', 2, 'Quê nội', '50000', ' Khi nói về cuốn sách Quê Nội của Võ Quảng người ta thường bảo: Đây là một loại Tom Sawyer của Việt Nam. (Một tác phẩm được nhiều người ưa thích). Nhưng sau khi làm quen với tác phẩm của Võ Quảng, bạn sẽ cảm thấy mình còn thích các nhân vật Cục và Cù Lao hơn.\r\n\r\nVõ Quảng đã đặt câu chuyện xảy ra tại chính quê hương mình, ấy là làng Hòa Phước, tỉnh Quảng Nam, Một tỉnh nằm giữa nước Việt Nam. Ở đây các sự kiện nhỏ đặt liền nhau, khăng khít nhau tạo nên câu chuyện. Câu chuyện bắt đầu sau Cách mạng Tháng Tám, sau ngày lễ tuyên bố độc lập của nước Việt Nam năm 1945, một thời kỳ mà mãi đến nay vẫn còn để lại dấu tích trong nền văn học Việt Nam.', 'quenoi.jpg', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'phammai1', '827ccb0eea8a706c4c34a16891f84e7b', 'mai1');

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
  ADD KEY `Khóa` (`pro_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `Test` (`pro_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_cat` (`pro_cat`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Khóa` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `Test` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pro_cat`) REFERENCES `categories` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
