-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 04:57 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cucisepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_customer`
--

CREATE TABLE `cs_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `phone_number` varchar(256) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_customer`
--

INSERT INTO `cs_customer` (`customer_id`, `customer_name`, `phone_number`, `address`) VALUES
(1, 'Tes1', '01', 'Tes1'),
(2, 'Tes2', 'Tes2', 'Tes2'),
(3, 'Tes4', 'tes4', 'tes4'),
(4, 'Tes5', 'tes5', 'tes5'),
(5, 'Tes5', 'tes5', 'tes5'),
(6, 'Tes', 'Tes', 'Tes'),
(7, 'TesC', 'TesC', 'TesC'),
(8, 'Jess', '08293', 'Malang'),
(9, 'Jess Limit', '031', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `cs_detail_transaction`
--

CREATE TABLE `cs_detail_transaction` (
  `detail_transaction_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_detail_transaction`
--

INSERT INTO `cs_detail_transaction` (`detail_transaction_id`, `transaction_id`, `shoes_id`, `treatment_id`, `note`) VALUES
(1, 1, 1, 1, '-'),
(2, 1, 2, 2, '-'),
(3, 2, 3, 1, '-'),
(4, 3, 4, 1, '-'),
(5, 3, 5, 2, '-'),
(6, 4, 6, 1, '-'),
(7, 4, 7, 2, '-'),
(8, 5, 8, 1, '-'),
(9, 5, 9, 1, '-'),
(10, 6, 10, 1, '-'),
(11, 6, 11, 3, '-'),
(12, 7, 12, 1, '-'),
(13, 7, 13, 2, '-'),
(14, 7, 14, 3, '-'),
(15, 7, 15, 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `cs_shoes`
--

CREATE TABLE `cs_shoes` (
  `shoes_id` int(11) NOT NULL,
  `shoes_code` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `color` varchar(256) NOT NULL,
  `size` varchar(256) NOT NULL,
  `type_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_shoes`
--

INSERT INTO `cs_shoes` (`shoes_id`, `shoes_code`, `brand`, `color`, `size`, `type_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SHOA3EFBEBA1', 'Tes1', 'Tes1', 'Tes1', 1, 'Tes1', 4, '2021-01-28 13:47:04', '2021-01-28 14:14:44'),
(2, 'SHOA3EFBEBA2', 'Tes1.1', 'Tes1.1', 'Tes1.1', 1, 'Tes1.1', 4, '2021-01-28 13:47:04', '2021-01-29 13:55:11'),
(3, 'SHO384804DE3', 'Tes2', 'Tes2', 'Tes2', 1, 'Tes2', 4, '2021-01-28 19:35:12', '2021-01-28 20:52:00'),
(4, 'SHO39E798E44', 'tes4', 'tes4', 'tes4', 1, 'tes4', 4, '2021-01-28 19:57:25', '2021-01-28 21:14:24'),
(5, 'SHO39E798E45', 'tes4', 'tes4', 'tes4', 1, 'tes4', 1, '2021-01-28 19:57:25', '2021-01-28 19:57:25'),
(6, 'SHO5B0311FB6', 'Tes', 'Tes', 'Tes', 1, 'Tes', 4, '2021-01-29 13:00:23', '2021-01-29 13:12:07'),
(7, 'SHO5B0311FB7', 'Tes', 'Tes', 'Tes', 1, 'Tes', 1, '2021-01-29 13:00:23', '2021-01-29 13:00:23'),
(8, 'SHOBC03A8A48', 'TesC', 'TesC', 'TesC', 1, 'TesC', 4, '2021-01-29 13:02:07', '2021-01-29 13:52:59'),
(9, 'SHOBC03A8A49', 'TesC', 'TesC', 'TesC', 1, 'TesC', 4, '2021-01-29 13:02:08', '2021-01-29 13:14:05'),
(10, 'SHOB1AB28EB10', 'Adidas', 'Hitam', '48', 1, 'Hati hati', 1, '2021-01-31 15:06:21', '2021-01-31 15:06:21'),
(11, 'SHOB1AB28EB11', 'Converse Low', 'Putih', '48', 1, 'Hati Hati', 1, '2021-01-31 15:06:22', '2021-01-31 15:06:22'),
(12, 'SHOE2E8788712', 'Converse Low', 'Hitam, Putih', '42', 1, 'Hai', 1, '2021-01-31 15:08:57', '2021-01-31 15:08:57'),
(13, 'SHOE2E8788713', 'Adidas', 'Hitam', '48', 1, 'Hai', 1, '2021-01-31 15:08:57', '2021-01-31 15:08:57'),
(14, 'SHOE2E8788714', 'Adidas', 'Putih', '48', 1, 'Hai', 1, '2021-01-31 15:08:57', '2021-01-31 15:08:57'),
(15, 'SHOE2E8788715', 'Converse', 'Hijau', '48', 1, 'Hai', 1, '2021-01-31 15:08:57', '2021-01-31 15:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `cs_transaction`
--

CREATE TABLE `cs_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_code` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status_paid` int(11) NOT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `total` varchar(256) NOT NULL,
  `delivery` int(11) NOT NULL DEFAULT 0,
  `created_transaction` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_transaction` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_transaction`
--

INSERT INTO `cs_transaction` (`transaction_id`, `transaction_code`, `user_id`, `customer_id`, `status_paid`, `bayar`, `kembalian`, `total`, `delivery`, `created_transaction`, `updated_transaction`) VALUES
(1, 'TRXA6565983', 1, 1, 1, 77500, 0, '77500', 0, '2021-01-28 13:47:04', '2021-01-28 13:47:04'),
(2, 'TRX214D9DA3', 1, 2, 2, 40000, 2500, '75000', 1, '2021-01-28 19:35:11', '2021-01-28 19:35:11'),
(3, 'TRX654868D9', 1, 3, 1, 80000, 2500, '77500', 1, '2021-01-28 19:57:25', '2021-01-28 19:57:25'),
(4, 'TRX1C84245C', 1, 6, 2, NULL, NULL, '140000', 0, '2021-01-29 13:00:23', '2021-01-29 13:00:23'),
(5, 'TRX76418E80', 2, 7, 1, 70000, 2500, '67500', 1, '2021-01-29 13:02:07', '2021-01-29 13:02:07'),
(6, 'TRXA25BA296', 1, 8, 1, 300000, 170000, '130000', 0, '2021-01-31 15:06:21', '2021-01-31 15:06:21'),
(7, 'TRXE20C0CB4', 1, 9, 2, NULL, NULL, '270000', 0, '2021-01-31 15:08:57', '2021-01-31 15:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `cs_treatment`
--

CREATE TABLE `cs_treatment` (
  `treatment_id` int(11) NOT NULL,
  `treatment_name` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `estimated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_treatment`
--

INSERT INTO `cs_treatment` (`treatment_id`, `treatment_name`, `price`, `estimated_time`) VALUES
(1, 'Deep Clean', '60000', 3),
(2, 'Fast Clean', '80000', 1),
(3, 'Unyellow', '70000', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cs_type`
--

CREATE TABLE `cs_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_type`
--

INSERT INTO `cs_type` (`type_id`, `type_name`) VALUES
(1, 'Sneakers'),
(2, 'Boots'),
(3, 'Classic Canvas');

-- --------------------------------------------------------

--
-- Table structure for table `cs_user`
--

CREATE TABLE `cs_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 = admin, 2 = cashier, 3 = kangcuci',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active, 0 = blocked',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs_user`
--

INSERT INTO `cs_user` (`user_id`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$xgs3D9ypwrcm.cYwsVIgd.6LQR5BI1Ic7AlL9UfgL4CqL.iMjEIV6', 1, 1, '2021-01-09 21:55:58', '2021-01-09 21:57:28'),
(2, 'kasir', '$2y$10$GpYQlth/H2kdI2bet7HdTOKkSwsTiQexNLU1SinIZJ8mCMCpY1nau', 2, 1, '2021-01-10 18:48:15', '2021-01-22 19:48:40'),
(3, 'kangcuci', '$2y$10$10Yp4e6d0C4REYECvPE.uuR5CLL2m1QDpkX6lHdyx4SHgDDu4srqi', 3, 1, '2021-01-09 22:00:09', '2021-01-20 15:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `ok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cs_customer`
--
ALTER TABLE `cs_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cs_detail_transaction`
--
ALTER TABLE `cs_detail_transaction`
  ADD PRIMARY KEY (`detail_transaction_id`);

--
-- Indexes for table `cs_shoes`
--
ALTER TABLE `cs_shoes`
  ADD PRIMARY KEY (`shoes_id`);

--
-- Indexes for table `cs_transaction`
--
ALTER TABLE `cs_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `cs_treatment`
--
ALTER TABLE `cs_treatment`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `cs_type`
--
ALTER TABLE `cs_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `cs_user`
--
ALTER TABLE `cs_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cs_customer`
--
ALTER TABLE `cs_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cs_detail_transaction`
--
ALTER TABLE `cs_detail_transaction`
  MODIFY `detail_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cs_shoes`
--
ALTER TABLE `cs_shoes`
  MODIFY `shoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cs_transaction`
--
ALTER TABLE `cs_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cs_treatment`
--
ALTER TABLE `cs_treatment`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cs_type`
--
ALTER TABLE `cs_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cs_user`
--
ALTER TABLE `cs_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
