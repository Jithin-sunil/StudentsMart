-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 08:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_studentsmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, ' Ananthu', ' ananthu999@gmail.com', '36900'),
(2, 'Solomon', 'solomonsolo2552@gmail.com', 'solo'),
(4, 'Akshay', 'ak745@gmail.com', 'banno'),
(9, 'swarna', 'gold916@gmail.com', 'swarna'),
(10, ' Sagar', ' saga@gmail.com', '23456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(50) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `user_id`, `booking_status`, `booking_amount`) VALUES
(4, '2024-08-29', 3, 4, '1200000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(50) NOT NULL,
  `cart_quantity` int(11) NOT NULL DEFAULT 1,
  `product_id` int(50) NOT NULL,
  `booking_id` int(50) NOT NULL,
  `cart_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `product_id`, `booking_id`, `cart_status`) VALUES
(1, 1, 4, 1, '1'),
(2, 1, 5, 1, '1'),
(6, 1, 4, 3, ''),
(8, 1, 6, 2, '1'),
(9, 1, 6, 4, '1'),
(10, 1, 6, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Electronic'),
(2, 'Stationary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(50) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_content` varchar(500) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `product_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `complaint_reply`, `complaint_status`, `product_id`, `user_id`) VALUES
(7, 'Battery Damage', 'Doesnt have long battery span', '2009-01-04', 'Okay clear it soon', 2, 0, 3),
(8, 'Display Problem', 'Bad display experience', '2009-01-04', 'We will do it\r\n', 2, 0, 3),
(9, 'Material issue', 'The material used to make the bag is too bad', '2024-08-29', 'Will provide a replacement soon', 2, 0, 3),
(12, 'Material issue', 'Too Bad Material', '2024-08-29', 'Will do necessary ', 2, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Alappuzha'),
(2, 'Ernakulam'),
(3, 'Idukki'),
(4, 'Kannur'),
(5, 'Kasaragod'),
(6, 'Kollam'),
(7, 'Kottayam'),
(8, 'Kozhikode'),
(9, 'Malappuram'),
(10, 'Palakkad'),
(11, 'Pathanamthitta'),
(12, 'Thiruvananthapuram'),
(13, 'Thrissur'),
(14, 'Wayanad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newuser`
--

CREATE TABLE `tbl_newuser` (
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_dateofjoin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_newuser`
--

INSERT INTO `tbl_newuser` (`user_id`, `place_id`, `user_name`, `user_gender`, `user_address`, `user_contact`, `user_email`, `user_password`, `user_photo`, `user_dateofjoin`) VALUES
(7, 20, 'Sandra Peter', 'female', 'Thanikuzhiyil \r\nSrappilly', '8075911569', 'sandraponnu2004@gmail.com', 'sandra', 'sql.png', '2024-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` varchar(10) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(7, 'Aluva', '	683101', 0),
(8, 'Aluva', '683101', 2),
(9, 'Brahmapuram', '682303', 2),
(10, 'Chottanikkara', '682312', 2),
(11, 'Desom', '683102', 2),
(12, 'Edapally', '682024', 2),
(13, 'Gothuruthy', '683516', 2),
(14, 'Hmt Colony', '683503', 2),
(15, 'Irimbanam', '682309', 2),
(16, 'Kakkanad', '682030', 2),
(17, 'Mamala', '682305', 2),
(18, 'Nadakkavu', '682307', 2),
(19, 'Onakkoor', '686667', 2),
(20, 'Puthencruz', '682308', 2),
(21, 'Ramamangalam', '683545', 2),
(22, 'South Paravoor', '682307', 2),
(23, 'Thalacode', '682314', 2),
(24, 'Udayamperoor', '682307', 2),
(25, 'Vadacode', '682021', 0),
(26, 'Willingdon Island', '682003', 2),
(27, 'Yordhanapuram', '683574', 2),
(28, 'Alapad', '680641', 13),
(29, 'Brahmakulam', '680104', 13),
(30, 'Chittilapilly', '680551', 13),
(31, 'Desamangalam', '679532', 13),
(32, 'Edassery', '680569', 13),
(33, 'Guruvayoor', '680101', 13),
(34, 'Irinjalakuda', '680121', 13),
(35, 'Kanjani', '680612', 13),
(36, 'Lokamaleswaram North', '680664', 13),
(37, 'Mangad', '680542', 13),
(38, 'Nalukettu', '680308', 13),
(39, 'Ollur', '680306', 13),
(40, 'Pullu', '680641', 13),
(41, 'Ramavarmapuram', '680631', 13),
(42, 'Srinngapuram', '680664', 13),
(43, 'Tali', '680585', 13),
(44, 'Urakam', '680562', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(40) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `subcategory_id` int(40) NOT NULL,
  `seller_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_photo`, `subcategory_id`, `seller_id`) VALUES
(4, 'HP Laptop', '50000', 'image3.jpg', 2, 5),
(5, 'iPhone 15', '10000000', 'image4.jpg', 1, 5),
(6, 'iPhone 12 pro max', '1200000', 'iphone 12pro max blue.jpg', 1, 4),
(7, 'Sky Bags', '1500', 'psst.png', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_review` varchar(500) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_rating` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `product_id`, `user_review`, `user_name`, `user_rating`) VALUES
(1, '2024-08-26 12:05:54', 4, 'ghghgh', 'hi', '3'),
(2, '2024-08-26 14:07:31', 4, 'Great ', 'sarath', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(40) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_address` varchar(100) NOT NULL,
  `seller_contact` varchar(50) NOT NULL,
  `seller_password` varchar(50) NOT NULL,
  `seller_photo` varchar(100) NOT NULL,
  `seller_proof` varchar(300) NOT NULL,
  `seller_dateofjoin` varchar(50) NOT NULL,
  `seller_status` int(11) NOT NULL DEFAULT 0,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_email`, `seller_address`, `seller_contact`, `seller_password`, `seller_photo`, `seller_proof`, `seller_dateofjoin`, `seller_status`, `place_id`) VALUES
(1, 'Fake Friend', 'fake@gmail.com', 'Jawahar Nagar\r\nKaloor', '8086228969', '123456789', 'image4.jpg', 'image6.jpg', '', 0, 0),
(3, 'Sandra Peter', 'sandraponnu2004@gmail.com', 'Thanikuzhiyil\r\nSrappilly\r\n', ' 8086228969 ', '246800', 'image3.jpg', 'image8.jpg', '', 0, 0),
(4, 'SR Traders', 'sr@gmail.com', 'Muvattupuzha', '8086228969', '123456', 'image1.jpg', 'image2.jpg', '', 1, 7),
(5, 'Arun', 'arun@gmail.com', 'Arunavilasm', '24680021', 'arun', 'image5.jpg', 'image6.jpg', '', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(50) NOT NULL,
  `stock_quantity` varchar(100) NOT NULL,
  `product_id` int(50) NOT NULL,
  `stock_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `product_id`, `stock_date`) VALUES
(7, '50', 0, ''),
(8, '40', 0, ''),
(11, '10', 4, ''),
(12, '10', 5, '2024-08-17'),
(16, '5', 6, '2024-08-26'),
(17, '10', 7, '2024-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Mobile Phones', 1),
(2, 'Laptops', 1),
(3, 'Pendrives', 1),
(4, 'Bags', 2),
(5, 'Water Bottle', 2),
(6, 'Hard Disk', 1),
(16, 'Pencil Box', 2),
(17, 'Instrument Box', 2),
(18, 'Pens', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_newuser`
--
ALTER TABLE `tbl_newuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_newuser`
--
ALTER TABLE `tbl_newuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
