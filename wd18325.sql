-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 08:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wd18325`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `position` int(5) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `position`, `creation_date`, `updation_date`) VALUES
(1, 'Đồng hồ', 'Mô tả Đồng hồ ', 2, '2023-09-25 10:14:14', '2023-09-25 10:14:14'),
(2, 'Laptop', 'Mô tả Laptop', 3, '2023-09-25 10:14:14', '2023-09-25 10:14:14'),
(3, 'Điện thoại', 'Mô tả Điện thoại', 1, '2023-09-25 10:14:58', '2023-09-25 10:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `comment`, `creation_date`) VALUES
(2, 3, 3, 'Comment 01', '2023-10-09 11:03:41'),
(3, 3, 3, 'Comment 2', '2023-10-09 11:06:42'),
(4, 3, 3, 'Comment 03', '2023-10-09 11:06:48'),
(5, 1, 3, 'Comment 04', '2023-10-09 11:07:26'),
(6, 1, 6, 'Comment 01', '2023-10-09 11:08:05'),
(7, 4, 3, 'good', '2023-10-12 18:19:19'),
(8, 4, 4, 'good', '2023-10-12 18:19:30'),
(9, 4, 4, 'good', '2023-10-12 18:22:25'),
(10, 4, 1, 'hmmm', '2023-10-13 13:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_paid` int(1) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` double(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `price`, `name`, `description`, `image`, `quantity`, `creation_date`, `updation_date`) VALUES
(1, 1, 60.00, 'Đồng hồ Orient 41.8 mm Nam RA-AA0810N19B', 'Orient\r\nSang trọng và đẳng cấp\r\nĐồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.\r\n\r\n', '../view/images/watch_2.jpg', 10, '2023-10-12 20:27:58', '2023-10-12 20:27:58'),
(2, 2, 160.00, 'Laptop Acer nitro 5 ', 'Khám phá thế giới đồ họa và gaming cực mượt với laptop Acer Aspire 5 Gaming A515 58GM 51LB i5 13420H (NX.KQ4SV.002), là sản phẩm đa năng với khả năng xử lý mạnh mẽ và hiệu suất đồ họa ấn tượng. Chiếc laptop đi kèm nhiều tính năng hiện đại cùng sự kết hợp hoàn hảo của công nghệ và thiết kế tinh tế là trợ thủ đắc lực cho công việc hàng ngày và thời gian giải trí, cho bạn trải nghiệm thú vị.', '../view/images/laptop_1.jpg', 10, '2023-10-12 20:35:41', '2023-10-12 20:35:41'),
(3, 1, 100.00, 'Đồng hồ', 'Mô tả Đồng hồ', '../view/images/watch_1.jpg', 10, '2023-09-25 10:25:47', '2023-09-25 10:25:47'),
(4, 3, 20.00, 'Xiaomi', 'xiaomi mi11', '../view/images/phone_4.jpg', 20, '2023-09-25 10:25:47', '2023-09-25 10:25:47'),
(5, 3, 100.00, 'Iphone 15 Pro Max', 'iPhone 15 Pro Max là một trong những chiếc điện thoại thông minh cao cấp nằm trong bộ sản phẩm iPhone 15 series của Apple, sở hữu nhiều tính năng và công nghệ tiên tiến. Nếu bạn đang có ý định mua iPhone 15 Pro Max, Điện máy XANH là một lựa chọn đáng cân nhắc.\r\n\r\n• Sản phẩm chính hãng, chất lượng cao: Điện máy XANH cam kết cung cấp sản phẩm iPhone 15 Pro Max chính hãng, có nguồn gốc xuất xứ rõ ràng, được kiểm tra kỹ lưỡng trước khi bán ra thị trường.\r\n\r\n• Giá cả cạnh tranh: Điện máy XANH thường xuyên có các chương trình khuyến mãi, giảm giá và tặng quà kèm theo khi mua iPhone 15 Pro Max. Điều này giúp bạn tiết kiệm chi phí khi mua sắm.\r\n\r\n• Dịch vụ hậu mãi chu đáo: Điện máy XANH cung cấp dịch vụ bảo hành chính hãng cho iPhone 15 Pro Max với thời gian dài lâu. Ngoài ra, bạn còn có thể sử dụng dịch vụ sửa chữa, hỗ trợ kỹ thuật chuyên nghiệp của Điện máy XANH.\r\n\r\n• Tùy chọn trả góp linh hoạt: Điện máy XANH cung cấp các lựa chọn trả góp phù hợp với nhu cầu và khả năng tài chính của bạn. Điều này giúp bạn mua được sản phẩm mong muốn mà không cần thanh toán toàn bộ số tiền một lúc.', '../view/images/laptop_1.jpg', 10, '2023-10-12 20:38:04', '2023-10-12 20:38:04'),
(6, 2, 20.00, 'Đồng hồ', 'Mô tả Đồng hồ', '../view/images/3.jpg', 20, '2023-09-25 10:25:47', '2023-09-25 10:25:47'),
(7, 2, 160.00, 'Acer Aspire 3', 'Khám phá thế giới đồ họa và gaming cực mượt với laptop Acer Aspire 5 Gaming A515 58GM 51LB i5 13420H (NX.KQ4SV.002), là sản phẩm đa năng với khả năng xử lý mạnh mẽ và hiệu suất đồ họa ấn tượng. Chiếc laptop đi kèm nhiều tính năng hiện đại cùng sự kết hợp hoàn hảo của công nghệ và thiết kế tinh tế là trợ thủ đắc lực cho công việc hàng ngày và thời gian giải trí, cho bạn trải nghiệm thú vị.', '../view/images/laptop_2.jpg', 10, '2023-10-12 20:40:19', '2023-10-12 20:40:19'),
(8, 3, 110.00, 'Redmi Note 11', 'OPPO A78 mẫu điện thoại mới nhất được nhà OPPO cho lên kệ trong tháng 07/2023. Lần ra mắt này máy sở hữu lối thiết kế đẹp mắt, hiệu năng ổn định đi cùng với đó là màn hình hiển thị sắc nét.\r\nThiết kế tinh tế thu hút ánh nhìn\r\nMột lối thiết kế trẻ trung hiện đại được OPPO khoác lên A78 làm tôn lên vẻ ngoài cũng như tạo điểm nhấn khi sử dụng. Mặt lưng của máy tạo nên bởi thủy tinh hữu cơ và được bảo vệ xung quanh bằng khung hợp kim tạo nên vẻ bóng bẩy và sang trọng cho điện thoại.', '../view/images/phone_3.jpg', 10, '2023-10-12 21:55:33', '2023-10-12 21:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `full_name`, `phone`, `shipping_address`, `shipping_city`, `billing_address`, `billing_city`, `register_date`, `updation_date`, `is_admin`) VALUES
(1, 'hnpsolution', '5b5e3fe660892fd8007df5810c07acc1', 'hnpsolution@gmail.com', 'hnpsolution', '0986265254', '123/3B THC34', 'HCMC', '123/3B THC34', '123/3B THC34', '2023-10-02 10:12:17', '2023-10-02 10:12:17', 0),
(2, 'lephuong1979', 'aa65f6af4371be204f97d1bde156dd16', 'lephuong1979@gmail.com', 'lephuong1979', '0986265254', '123/3B THC34', 'HCMC', '123/3B THC34', '123/3B THC34', '2023-10-02 10:15:10', '2023-10-02 10:15:10', 0),
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'hnpsolution@gmail.com', 'admin', '0986265254', '123/3B THC34', 'HCMC', '123/3B THC34', '123/3B THC34', '2023-10-02 10:12:17', '2023-10-02 10:12:17', 1),
(4, 'thefox235', '766328bfa8a253bb81f6823d0e9c1b10', 'thanhduyhf2@gmail.com', 'kirixasu16.5', '0999999999', 'hcm', 'Long An', 'hcm', 'hcm', '2023-10-12 15:34:36', '2023-10-12 15:34:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users` (`user_id`),
  ADD KEY `fk_comments_products` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_user` (`user_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_detail_orders` (`order_id`),
  ADD KEY `fk_orders_detail_products` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `fk_orders_detail_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_orders_detail_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
