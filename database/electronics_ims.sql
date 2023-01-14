-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2020 at 09:41 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronics_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(11) NOT NULL,
  `admin_photo` varchar(255) NOT NULL,
  `admin_user_nm` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `Phone_no` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_photo`, `admin_user_nm`, `admin_email`, `Phone_no`, `admin_password`, `code`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(1, 'user2-160x160.jpg', 'Jil Patel', 'jilpatel1299@gmail.com', '7874997882', 'ed4225ba9e427cc65520636fdfc8b74b', 0, '0', '0', '2020-04-28 06:52:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `brand_master`
--

CREATE TABLE `brand_master` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_master`
--

INSERT INTO `brand_master` (`brand_id`, `brand_name`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(1, 'LG', '0', '0', '2020-06-09 07:06:04', ''),
(4, 'DELL', '0', '0', '2020-04-22 10:39:56', ''),
(5, 'Samsung', '0', '0', '2020-04-22 02:47:49', ''),
(6, 'Haier', '0', '0', '2020-04-26 05:02:15', ''),
(7, 'panasonic', '0', '0', '2020-04-26 05:02:42', ''),
(8, 'SONY', '0', '0', '2020-04-26 05:06:38', ''),
(9, 'TOSHIBA', '0', '0', '2020-05-09 06:02:40', ''),
(10, 'SanDisk ', '0', '0', '2020-04-26 05:13:29', ''),
(11, 'HP', '1', '1', '2020-04-26 05:13:37', ''),
(12, 'Philips', '0', '0', '2020-04-26 05:15:11', ''),
(13, 'Bajaj', '0', '0', '2020-04-26 05:30:16', ''),
(14, 'lenovo', '0', '0', '2020-04-26 05:35:16', ''),
(15, 'electro', '1', '1', '2020-04-27 12:58:24', ''),
(16, 'DAIKIN', '0', '0', '2020-06-02 09:52:10', ''),
(17, 'acer', '1', '1', '2020-05-01 07:08:23', ''),
(20, 'LG', '0', '0', '2020-05-09 05:21:25', ''),
(21, 'TCL', '0', '0', '2020-05-09 06:29:25', ''),
(22, 'LLOYD', '0', '0', '2020-05-09 06:30:42', ''),
(23, 'VOLTAS', '0', '0', '2020-05-09 06:32:06', ''),
(24, 'Carrier', '0', '0', '2020-05-09 06:37:42', ''),
(25, 'WEBXINTEGRATORS', '0', '0', '2020-06-09 07:06:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `customer_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_contact` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`customer_id`, `cust_name`, `cust_contact`, `cust_email`, `cust_address`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(1, 'Keyur M. Naik', '9878458212', 'keyurnaik8@email.com', '109, Asha bag, Navsari - 396445', '0', '0', '2020-05-15 11:49:22', ''),
(2, 'Krunal  J. Patel', '9687451968', 'krunalpatel09@gmail.com', '111, Asha bag, Navsari - 396445', '0', '0', '2020-05-28 09:29:46', ''),
(3, 'Yesh Patel', '9985455492', 'yeshpatel9@gmail.com', 'Navsari, Gujarat', '0', '0', '2020-05-28 09:30:23', ''),
(4, 'Nisha Patel', '9099457146', 'nisha@gmail.con', 'Navsari', '0', '0', '2020-06-13 02:03:14', ''),
(5, 'Sahil Patel', '9099457145', 'sahil@gmail.com', 'Asha Nagar Navsari', '0', '0', '2020-06-13 05:34:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `gst_id` int(11) NOT NULL,
  `gst_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`gst_id`, `gst_percentage`) VALUES
(1, 5),
(2, 12),
(3, 18),
(6, 28);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_master`
--

CREATE TABLE `product_categories_master` (
  `pro_cat_id` int(11) NOT NULL,
  `pro_cat_name` varchar(255) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories_master`
--

INSERT INTO `product_categories_master` (`pro_cat_id`, `pro_cat_name`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(1, 'Electronic', '1', '1', '2020-04-23 10:12:34', ''),
(2, 'Electronic', '0', '0', '2020-06-10 19:00:02', '0'),
(3, 'Televisions', '0', '0', '2020-04-26 04:57:11', ''),
(4, ' Air Conditioners', '0', '0', '2020-04-26 04:57:46', ''),
(5, 'Home Appliances', '0', '0', '2020-04-26 04:57:58', ''),
(6, 'Microwave Ovens', '0', '0', '2020-04-26 04:58:14', ''),
(7, 'Washers', '0', '0', '2020-04-26 04:58:26', ''),
(8, ' Kitchen Appliances', '0', '0', '2020-04-26 04:58:39', ''),
(9, 'Refrigerators', '0', '0', '2020-04-26 04:58:56', ''),
(10, 'Audio Systems', '0', '0', '2020-04-26 04:59:16', ''),
(11, 'Computer', '0', '0', '2020-04-26 05:33:12', ''),
(12, 'Moto', '1', '1', '2020-06-09 07:08:27', ''),
(13, 'abc', '0', '0', '2020-06-10 04:59:18', '0'),
(14, 'abcd', '0', '0', '2020-06-10 05:00:08', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `pro_cat_id` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_id`, `brand_id`, `pro_cat_id`, `product_image`, `product_name`, `product_code`, `price`, `stock`, `unit_id`, `vendor_id`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(2, 6, 7, 'Haier 8 kg Fully-Automatic Front LoadingHAIER-HW80-BD12756NZP-MAIN-300x300.jpeg', 'Washing machine', '#453', '37500', '908', 2, 2, '0', '0', '2020-05-24 04:30:57', ''),
(3, 20, 9, 'gc-l247clav-na-lg-original-imaf9rexrzccyunz.jpeg', 'LG  Side-by-Side Refrigerator (SBS)', 'LG688', '125500.00', '58', 2, 2, '0', '0', '2020-06-09 07:04:33', ''),
(4, 20, 4, 'LG-LSQ18KNZA-MAIN.jpg', 'Split AC LG 1.5 Ton 5 Star ', 'Q18KNZA', '43750', '28', 2, 1, '0', '0', '2020-05-28 02:27:55', ''),
(5, 20, 4, 'LG-KS-Q18BWZD-MAIN.jpeg', 'Split AC  LG 1.5 Ton 5 Star', 'Q18BWZD', '44000', '106', 2, 1, '0', '0', '2020-05-28 02:28:15', ''),
(6, 5, 3, 'Samsung-QA65Q6FNAKXXL-Main.jpg', 'QLED TVs Samsung  163 cm (65 Inches) 4K Ultra HD Smart LED TV', 'QA65Q6FNAKXXL', '160,000', '46', 2, 2, '0', '0', '2020-05-28 02:28:36', ''),
(7, 5, 3, 'Samsung-QA43Q60RAKXXL-Main.jpg', 'QLED TVs Samsung 108 cm (43 Inches) 4K Ultra HD Smart QLED TV', 'QA43Q60RAKXXL', '67,000', '1', 2, 2, '0', '0', '2020-05-28 02:29:03', ''),
(8, 5, 3, 'Samsung-QA55Q60RAKXXL-Main.jpg', 'QLED TVs  Samsung 138 cm (55 Inches) 4K Ultra HD Smart LED TV', 'QA55Q60RAKXXL', '105,000', '1', 2, 2, '0', '0', '2020-05-24 06:13:03', ''),
(9, 5, 2, 'lenovo-g580.jpg', 'Lenovo g580', '123', '25000', '197', 2, 4, '0', '0', '2020-06-08 02:51:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_detail_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buying_qty` int(11) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `short_item` int(11) NOT NULL,
  `actual_quantity` int(11) NOT NULL,
  `buying_price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_detail_id`, `purchase_id`, `vendor_id`, `product_id`, `buying_qty`, `unit_price`, `short_item`, `actual_quantity`, `buying_price`) VALUES
(1, 1, 2, 3, 1, '125500.00', 0, 1, '0.00'),
(2, 1, 2, 2, 1, '37500.00', 0, 1, '37500.00'),
(3, 1, 2, 2, 1, '37500.00', 0, 1, '37500.00'),
(4, 4, 2, 4, 1, '43750.00', 0, 1, '43750.00'),
(5, 5, 3, 4, 1, '43750.00', 0, 1, '43750.00'),
(6, 6, 3, 5, 1, '44000.00', 0, 1, '44000.00'),
(7, 7, 1, 4, 1, '43750.00', 0, 1, '43750.00'),
(8, 8, 1, 4, 1, '43750.00', 0, 1, '43750.00'),
(9, 13, 1, 4, 1, '43750.00', 0, 1, '43750.00'),
(10, 14, 1, 4, 1, '43750.00', 0, 1, '43750.00'),
(12, 16, 1, 2, 10, '375000.00', 0, 10, '375000.00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `purchase_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `challan` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `bill_amount` decimal(15,2) NOT NULL,
  `GST` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`purchase_id`, `vendor_id`, `challan`, `purchase_date`, `bill_amount`, `GST`, `discount`, `shipping`, `total_amount`, `payment_status`, `order_status`, `received_by`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `temp_Flag`) VALUES
(1, 2, 'PO-2949', '2020-05-25', '125500.00', '18%', '0%', '500', '127800', 'paid', 'deleivered', 'Het Desai', '0', '0', '2020-05-24 05:00:01', ''),
(2, 2, 'PO-1415', '2020-05-25', '37500.00', '18%', '0%', '200', '39500', 'unpaid', 'dispatch', 'Pooja Patel', '0', '0', '2020-05-24 05:14:20', ''),
(3, 1, 'PO-1273', '2020-05-26', '37500.00', '18%', '0%', '500', '39800', 'paid', 'deleivered', 'Pooja Patel', '0', '0', '2020-05-25 10:57:21', ''),
(4, 2, 'PO-3284', '2020-05-26', '43750.00', '18%', '0%', '100', '45650', 'paid', 'pending', 'krunal Patel', '0', '0', '2020-05-25 11:08:44', ''),
(5, 3, 'PO-7872', '2020-05-26', '43750.00', '18%', '0%', '100', '456500', 'paid', 'Delivered', 'Parth Patel', '0', '0', '2020-05-28 10:35:43', ''),
(6, 3, 'PO-1692', '2020-05-26', '44000.00', '18%', '0%', '100', '459000', 'paid', 'Delivered', 'Parth Patel', '0', '0', '2020-05-28 10:48:29', ''),
(7, 1, 'PO-1393', '2020-05-27', '43750.00', '18%', '0%', '100', '456500', 'paid', 'pending', 'Parth Patel', '0', '0', '2020-05-28 10:49:42', ''),
(8, 1, 'PO-1393', '2020-05-27', '43750.00', '18%', '0%', '100', '456500', 'paid', 'pending', 'Parth Patel', '0', '0', '2020-05-28 10:50:47', ''),
(13, 1, 'PO-1309', '2020-05-28', '43750.00', '18%', '0%', '100', '456500', 'paid', 'Delivered', 'Parth Patel', '0', '0', '2020-05-28 10:56:59', ''),
(14, 1, 'PO-5486', '2020-05-28', '43750.00', '18%', '0%', '100', '456500', 'paid', 'Delivered', 'Parth Patel', '0', '0', '2020-05-28 10:57:54', ''),
(16, 1, 'PO-1843', '2020-06-18', '375000.00', '28%', '10%', '0', '442500', 'unpaid', 'Delivered', 'Ahihant', '0', '0', '2020-06-18 02:36:37', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders_detail`
--

CREATE TABLE `sales_orders_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `sales_price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_orders_detail`
--

INSERT INTO `sales_orders_detail` (`order_detail_id`, `order_id`, `customer_id`, `product_id`, `sales_quantity`, `sales_price`) VALUES
(1, 1, 1, 5, 1, '44000.00'),
(2, 2, 3, 4, 1, '43750.00'),
(3, 3, 4, 9, 1, '25000.00'),
(4, 4, 4, 2, 1, '37500.00'),
(5, 5, 4, 2, 5, '187500.00'),
(6, 6, 4, 2, 10, '375000.00'),
(7, 6, 4, 9, 10, '250000.00'),
(8, 7, 4, 2, 25, '937500.00'),
(9, 7, 4, 9, 10, '250000.00'),
(10, 8, 4, 2, 25, '937500.00'),
(11, 8, 4, 9, 10, '250000.00'),
(12, 9, 5, 2, 2, '75000.00'),
(13, 10, 4, 2, 100, '3750000.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders_master`
--

CREATE TABLE `sales_orders_master` (
  `order_id` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `bill_amount` varchar(255) NOT NULL,
  `GST` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `receive_by` varchar(255) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_orders_master`
--

INSERT INTO `sales_orders_master` (`order_id`, `customer_id`, `receipt_no`, `order_date`, `bill_amount`, `GST`, `discount`, `shipping`, `total_amount`, `payment_status`, `order_status`, `receive_by`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(1, 1, '0', '2020-05-28', '44000', '18%', '0%', '100', '45900', 'paid', '4', 'Keyur Naik', '0', '0', '2020-05-28 10:32:27', ''),
(2, 3, 'SO-3324', '2020-05-28', '43750', '18%', '0%', '100', '45650', 'paid', 'Delivered', 'Yash patel', '0', '0', '2020-05-28 11:09:32', ''),
(3, 4, 'SO-4520', '2020-06-09', '25000', '18%', '5%', '50', '26350', 'paid', 'Pending', 'Card', '0', '0', '2020-06-09 07:30:56', ''),
(4, 4, 'SO-1949', '2020-06-09', '37500', '28%', '5%', '350', '40150', '', '', 'Sagar', '0', '0', '2020-06-09 08:21:34', ''),
(5, 4, 'SO-8968', '2020-06-12', '187500', '28%', '0', '500', '190800', 'paid', 'Delivered', 'Abhi', '0', '0', '2020-06-13 02:05:17', ''),
(6, 4, 'SO-9800', '2020-06-13', '625000', '18%', '0', '0', '626800', 'paid', 'Delivered', 'abc', '0', '0', '2020-06-13 02:40:14', ''),
(7, 4, 'SO-6657', '2020-06-13', '1187500', '18%', '100', '200', '1189300', 'paid', 'Delivered', 'abc', '0', '0', '2020-06-13 02:41:29', ''),
(8, 4, '', '2020-06-13', '1187500', '18%', '0', '0', '1189300', 'paid', 'Delivered', 'abc', '0', '0', '2020-06-13 02:43:33', ''),
(9, 5, 'SO-5437', '2020-06-13', '75000', '18%', '5%', '1000', '77300', 'paid', 'Delivered', 'Alay', '0', '0', '2020-06-13 05:41:54', ''),
(10, 4, 'SO-1542', '2020-06-18', '3750000', '28%', '5%', '10000', '4622500', 'paid', 'Delivered', 'Hari', '0', '0', '2020-06-18 02:42:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

CREATE TABLE `unit_master` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(30) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`unit_id`, `unit_name`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(1, 'KGS', '0', '0', '2020-06-09 07:10:03', ''),
(2, 'PCS', '0', '0', '2020-05-29 12:53:59', ''),
(3, 'LITERS', '1', '1', '2020-06-09 07:19:20', ''),
(4, 'PAIRS', '0', '0', '2020-06-13 05:23:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_master`
--

CREATE TABLE `vendor_master` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `vendor_contact` varchar(255) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `ven_com_name` varchar(255) NOT NULL,
  `ven_com_email` varchar(255) NOT NULL,
  `ven_com_contact` varchar(255) NOT NULL,
  `ven_com_address` varchar(255) NOT NULL,
  `Is_Actived` varchar(1) NOT NULL,
  `Is_Deleted` varchar(1) NOT NULL,
  `Insert_At` datetime NOT NULL,
  `Temp_Flag` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_master`
--

INSERT INTO `vendor_master` (`vendor_id`, `vendor_name`, `vendor_email`, `vendor_contact`, `vendor_address`, `ven_com_name`, `ven_com_email`, `ven_com_contact`, `ven_com_address`, `Is_Actived`, `Is_Deleted`, `Insert_At`, `Temp_Flag`) VALUES
(1, 'Ankit Patel', 'ankitpatel14@email.com', '9997812441', 'Eru Char Rasta, Nvasari -  396445', 'PEEDEE Electronics', 'pdelect@email.com', '787499222', 'National Highway 8, Navsari, Gujarat – 396424', '0', '0', '2020-05-09 03:26:49', ''),
(2, 'Bhavin Mehta', 'bhavinmehta8@co.in', '7473215533', '011. Asha bag, Navsari, Gujarat - 396445', 'PEEDEE Electronics', 'pdelect@email.com', '02637240403', '9, Rachna - 3, Railway Station Rd, Navsari, Gujarat 396445', '0', '0', '2020-05-25 11:30:57', ''),
(3, 'parth patel', 'parthpatel@gmil.com', '809880943', '011. Asha bag, Navsari, Gujarat - 396445', 'PEEDEE Electronics', 'pdelect@email.com', '02637240403', '9, Rachna - 3, Railway Station Rd, Navsari, Gujara', '0', '0', '2020-05-25 11:26:49', ''),
(4, 'Abhishek Patel', 'abhishekgandhi63@gmail.com', '9979550407', 'Rana Society', 'webxintegrators', 'info@webxintegrators.com', '9979550407', 'Rana Society', '1', '1', '2020-06-09 07:36:59', ''),
(5, 'Abhi Ahir', 'abhishekgandhi63@gmail.com', '9979550407', 'NVS', 'webxintegrators', 'abc@gmail.com', '9979550408', 'NVS', '0', '0', '2020-06-09 07:53:49', ''),
(6, 'Amrita', 'anmmu@gmail.com', '9876543210', 'Surat Gujarat', 'abc Pvt Ltd.', 'info@abc.com', '9876541230', 'Surat Gujarat', '0', '0', '2020-06-13 05:45:33', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand_master`
--
ALTER TABLE `brand_master`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`gst_id`);

--
-- Indexes for table `product_categories_master`
--
ALTER TABLE `product_categories_master`
  ADD PRIMARY KEY (`pro_cat_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`purchase_detail_id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sales_orders_detail`
--
ALTER TABLE `sales_orders_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `sales_orders_master`
--
ALTER TABLE `sales_orders_master`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `unit_master`
--
ALTER TABLE `unit_master`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `vendor_master`
--
ALTER TABLE `vendor_master`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_master`
--
ALTER TABLE `brand_master`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `gst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_categories_master`
--
ALTER TABLE `product_categories_master`
  MODIFY `pro_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `purchase_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales_orders_detail`
--
ALTER TABLE `sales_orders_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales_orders_master`
--
ALTER TABLE `sales_orders_master`
  MODIFY `order_id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unit_master`
--
ALTER TABLE `unit_master`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_master`
--
ALTER TABLE `vendor_master`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
