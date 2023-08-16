-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 06:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `butterfly`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountcategory_tbl`
--

CREATE TABLE `accountcategory_tbl` (
  `id` int(100) NOT NULL,
  `accountcategory_id` varchar(250) NOT NULL,
  `accountcategory_name` varchar(250) NOT NULL,
  `accountcategory_date` date NOT NULL,
  `accountcategory_desc` varchar(2000) NOT NULL,
  `accountcategory_type` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(250) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `payer` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `card_no` varchar(250) NOT NULL,
  `cheque_no` varchar(250) NOT NULL,
  `cheque_dt` varchar(250) NOT NULL,
  `trans_no` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `subinvoice_no` varchar(250) NOT NULL,
  `bank_account` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`id`, `autoid`, `company_id`, `branch_id`, `date`, `type`, `amount`, `payer`, `category`, `payment_mode`, `card_no`, `cheque_no`, `cheque_dt`, `trans_no`, `description`, `invoice_no`, `subinvoice_no`, `bank_account`, `sort_order`, `status`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'pay-6', 'com-1', 'bra-1', '2019-05-10', 'debit', '0.00', 'Zipzapshoppy', 'purchase', 'cash', '', '', '', '', '', 'ZZ-1', '', '', 0, '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', 'AD01', ''),
(2, 'pay-7', 'com-1', 'bra-1', '2019-05-10', 'debit', '0.00', 'Zipzapshoppy', 'purchase', 'cash', '', '', '', '', '', '2', '', '', 0, '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', 'AD01', ''),
(3, 'pay-8', 'com-1', 'bra-1', '2019-05-10', 'debit', '0.00', 'Zipzapshoppy', 'purchase', 'cash', '', '', '', '', '', '3', '', '', 0, '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', 'AD01', ''),
(4, 'pay-9', 'com-1', 'bra-1', '2019-05-10', 'credit', '990.00', 'Santhosh', 'sales', 'cash', '', '', '', '', '', 'INV/2019-2020/1', '', '', 0, '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', 'AD01', ''),
(5, 'pay-10', 'com-1', 'bra-1', '2019-05-13', 'credit', '0.00', 'Santhosh', 'sales', 'cash', '', '', '', '', '', 'INV/2019-2020/2', '', '', 0, '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', 'AD01', ''),
(6, 'pay-11', 'com-1', 'bra-1', '2019-05-13', 'credit', '0.00', 'Santhosh', 'sales', 'cash', '', '', '', '', '', 'INV/2019-2020/2', '', '', 0, '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', 'AD01', ''),
(7, 'pay-12', 'com-1', 'bra-1', '2019-05-14', 'credit', '0.00', 'Santhosh', 'sales', '', '', '', '', '', '', 'INV/2019-2020/4', '', '', 0, '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', 'AD01', ''),
(9, 'pay-13', 'com-1', '', '2021-04-28', 'credit', '0.00', 'Santhosh', 'sales', '', '', '', '', '', '', 'inv-5', '', '', 0, '', '27.5.179.10', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `advance_tbl`
--

CREATE TABLE `advance_tbl` (
  `id` int(100) NOT NULL,
  `advance_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `employee_id` varchar(250) NOT NULL,
  `employee_name` varchar(250) NOT NULL,
  `advance_amount` decimal(20,2) NOT NULL,
  `advance_date` date NOT NULL,
  `advance_type` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allowance`
--

CREATE TABLE `allowance` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `emp_id` varchar(55) NOT NULL,
  `emp_name` varchar(55) NOT NULL,
  `allowance_type` varchar(55) NOT NULL,
  `title` varchar(225) NOT NULL,
  `type` varchar(55) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `approved_by` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `allowance`
--

INSERT INTO `allowance` (`id`, `autoid`, `emp_id`, `emp_name`, `allowance_type`, `title`, `type`, `amount`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'ALL-1', 'EMP00-1', 'Vaishu', 'Non Taxable', 'Test', 'Percentage', '1000', '127.0.0.1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-01 10:58:40', 'AD01', '', '', 0),
(2, 'ALL-2', 'EMP00-2', 'Meena', 'Non Taxable', 'Test', 'Fixed', '500', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 17:33:19', 'AD01', '', '', 0),
(3, 'ALL-3', 'EMP00-2', 'Meena', 'Non Taxable', 'Test', 'Fixed', '500', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 17:59:26', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `allowance_option_tbl`
--

CREATE TABLE `allowance_option_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `approved_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowance_option_tbl`
--

INSERT INTO `allowance_option_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`) VALUES
(1, 'AT-1', 'Non Taxable', '2023-08-14', 'AD01', ''),
(2, 'AT-2', 'Taxables', '2023-08-14', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_tbl`
--

CREATE TABLE `announcement_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `employee` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_tbl`
--

INSERT INTO `announcement_tbl` (`id`, `autoid`, `title`, `branch`, `department`, `employee`, `start_date`, `end_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'ANN-1', 'WE WANT TO EARN YOUR DEEPEST TRUST.', 'bra-1', 'dep-1', '', '2023-08-02', '2023-08-05', 'New hire announcement', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 16:01:07', 'AD01', ''),
(2, 'ANN-2', 'My New Businesss', 'bra-1', 'dep-1', '', '2023-08-11', '2023-08-12', 'Organizational changes announcement', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 16:08:40', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE `appraisal` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `employee` varchar(55) NOT NULL,
  `branch` varchar(55) NOT NULL,
  `department` varchar(55) NOT NULL,
  `designation` varchar(55) NOT NULL,
  `business_process` varchar(25) NOT NULL,
  `allocating_resource` varchar(25) NOT NULL,
  `oral_communication` varchar(25) NOT NULL,
  `project_management` varchar(25) NOT NULL,
  `leadership` varchar(25) NOT NULL,
  `overall` varchar(55) NOT NULL,
  `remark` text NOT NULL,
  `appraisal_date` varchar(55) NOT NULL,
  `added_by` varchar(55) NOT NULL,
  `created_at` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appraisal`
--

INSERT INTO `appraisal` (`id`, `autoid`, `employee`, `branch`, `department`, `designation`, `business_process`, `allocating_resource`, `oral_communication`, `project_management`, `leadership`, `overall`, `remark`, `appraisal_date`, `added_by`, `created_at`, `status`) VALUES
(1, ' APP-1 ', 'EMP00-1', 'bra-1', 'dep-1', 'Sales Manager', '4', '2', '4', '4', '2', '3.2', 'Test', '2023-08', 'Butterfly Paints', 'Aug 09,2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `e_id` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `descrip` varchar(250) NOT NULL,
  `daystatus` varchar(250) NOT NULL,
  `late` time NOT NULL,
  `yearly_leaving` time NOT NULL,
  `overtime` time NOT NULL,
  `branch` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `count` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance_tbl`
--

INSERT INTO `attendance_tbl` (`id`, `autoid`, `e_id`, `date`, `in_time`, `out_time`, `name`, `email`, `descrip`, `daystatus`, `late`, `yearly_leaving`, `overtime`, `branch`, `department`, `count`, `ip_address`, `browser`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(245, 'ATT-1', 'EMP00-1', '2023-08-01', '08:00:00', '19:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:29:42', '2023-08-01 19:57:05'),
(246, 'ATT-246', 'EMP00-1', '2023-08-02', '08:00:00', '20:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:29:42', '2023-08-01 19:57:05'),
(247, 'ATT-247', 'EMP00-1', '2023-08-03', '08:00:00', '20:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:29:42', '2023-08-01 19:57:05'),
(248, 'ATT-248', 'EMP00-1', '2023-08-04', '08:00:00', '20:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:29:42', '2023-08-01 19:57:05'),
(262, 'ATT-249', 'EMP00-2', '2023-08-01', '08:00:00', '20:00:00', '', '', '', 'Leave', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:57:05', '0000-00-00 00:00:00'),
(263, 'ATT-263', 'EMP00-2', '2023-08-02', '08:00:00', '20:00:00', '', '', '', 'Leave', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:57:05', '0000-00-00 00:00:00'),
(264, 'ATT-264', 'EMP00-2', '2023-08-03', '08:00:00', '20:00:00', '', '', '', 'Leave', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:57:05', '0000-00-00 00:00:00'),
(265, 'ATT-265', 'EMP00-2', '2023-08-04', '08:00:00', '20:00:00', '', '', '', 'Leave', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-01 19:57:05', '0000-00-00 00:00:00'),
(266, 'ATT-266', 'EMP00-1', '2023-08-05', '09:00:00', '18:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '', '', '2023-08-02 20:58:39', '0000-00-00 00:00:00'),
(267, 'ATT-267', 'EMP00-2', '2023-08-05', '09:00:00', '13:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '', '', '2023-08-02 20:58:39', '0000-00-00 00:00:00'),
(268, 'ATT-268', 'EMP00-1', '2023-08-06', '09:00:00', '18:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '', '', '2023-08-02 21:00:55', '0000-00-00 00:00:00'),
(269, 'ATT-269', 'EMP00-2', '2023-08-06', '09:00:00', '13:00:00', '', '', '', 'Present', '00:00:00', '00:00:00', '00:00:00', 'bra-1', 'dep-1', '', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '', '', '2023-08-02 21:00:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `award_tbl`
--

CREATE TABLE `award_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `award_type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `gift` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `award_tbl`
--

INSERT INTO `award_tbl` (`id`, `autoid`, `employee`, `award_type`, `date`, `gift`, `description`, `created_at`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'AW-1', 'EMP00-1', 'Certificate', '2023-08-04', 'Leadership Medal', 'Recognize employees who have displayed exceptional leadership skills, inspiring and guiding their team members towards success.	\r\n', '2023-08-03', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `award_type_tbl`
--

CREATE TABLE `award_type_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bankdeposit_tbl`
--

CREATE TABLE `bankdeposit_tbl` (
  `id` int(100) NOT NULL,
  `bankdeposite_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `sub_invoice` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_tbl`
--

CREATE TABLE `bank_tbl` (
  `id` int(100) NOT NULL,
  `bank_id` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `acc_type` varchar(250) NOT NULL,
  `acc_name` varchar(250) NOT NULL,
  `acc_no` varchar(250) NOT NULL,
  `hom_branch` varchar(250) NOT NULL,
  `ifsc_code` varchar(250) NOT NULL,
  `swift_code` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `nostro_code` varchar(250) NOT NULL,
  `opening_bal` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcode_tbl`
--

CREATE TABLE `barcode_tbl` (
  `id` int(100) NOT NULL,
  `barcode_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `barcode_url` varchar(2000) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barcode_tbl`
--

INSERT INTO `barcode_tbl` (`id`, `barcode_id`, `company_id`, `branch_id`, `product_id`, `productcode`, `barcode`, `barcode_url`, `product_name`, `qty`, `batch_no`, `expiry_date`, `mrp_price`, `selling_price`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'sto-1', 'com-1', 'bra-1', 'pro-1', '1', '1234', 'barcode/generator/1234_06-05-2023_1241110424.png', 'Product1', '10.00', '110', '2023-05-26', '150.00', '180.00', 'active', '106.198.82.177', 'Your browser: Mozilla Firefox 112.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x6', '2023-05-06 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

CREATE TABLE `branch_tbl` (
  `id` int(100) NOT NULL,
  `branch_id` varchar(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `branch_type` varchar(250) NOT NULL,
  `branch_address` varchar(500) NOT NULL,
  `branch_country` varchar(250) NOT NULL,
  `branch_state` varchar(250) NOT NULL,
  `branch_district` varchar(250) NOT NULL,
  `branch_city` varchar(250) NOT NULL,
  `branch_area` varchar(250) NOT NULL,
  `branch_pincode` varchar(250) NOT NULL,
  `reg_type` varchar(250) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `branch_pan_no` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `branch_email_id` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `account_bank` varchar(250) NOT NULL,
  `account_branch` varchar(250) NOT NULL,
  `account_ifsc` varchar(250) NOT NULL,
  `account_number` varchar(250) NOT NULL,
  `account_type` varchar(250) NOT NULL,
  `account_swift` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`id`, `branch_id`, `company_id`, `branch_name`, `branch_type`, `branch_address`, `branch_country`, `branch_state`, `branch_district`, `branch_city`, `branch_area`, `branch_pincode`, `reg_type`, `reg_date`, `reg_no`, `branch_pan_no`, `gst_no`, `branch_email_id`, `phone_number`, `account_name`, `account_bank`, `account_branch`, `account_ifsc`, `account_number`, `account_type`, `account_swift`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'bra-1', 'com-1', 'Annanagar', 'company', 'No 63, 1st floor, SRB Nagar, Kolathur, Chennai', 'India', 'Tamil Nadu', 'Thiruvallur', 'Chennai', 'Villivakkam', '600049', 'msme', '2019-04-07', '1234', '123456', '33AAHCS3989E1Z5', 'santhoshvijendran@gmail.com', '9962856406', 'Raga Designers', 'Indian Bank', 'Chennai', '123', '123', 'CA', '123', '2019-04-07 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', ''),
(2, 'bra-2', 'com-1', 'boi', 'company', 'test', '', '', '', '', 'Villivakkam', '600049', 'msme', '2023-07-05', '123', '12356', '234', 'meena@gmail.com', '1234567890', 'meena', 'boi', 'test', 'IF', '123', 'savings', '1234', '2023-07-10 00:00:00', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', ''),
(3, 'bra-3', '', 'India', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10 17:27:41', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `id` int(100) NOT NULL,
  `brand_id` varchar(250) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_desc` varchar(2000) NOT NULL,
  `brand_logo` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`id`, `brand_id`, `brand_name`, `brand_desc`, `brand_logo`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'bra-1', 'ITC', 'ITC', 'uploads/brand_logo/ITC_Brands_U-5.jpg', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', '', 'active', 1),
(2, 'bra-2', 'test', 'desc', 'uploads/brand_logo/logo_U-12.png', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-10 00:00:00', 'AD01', '', 'active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `id` int(100) NOT NULL,
  `category_id` varchar(250) DEFAULT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `category_desc` varchar(250) DEFAULT NULL,
  `category_img` varchar(2000) DEFAULT NULL,
  `sort_order` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `category_id`, `category_name`, `category_desc`, `category_img`, `sort_order`, `status`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'cat-1', 'Grocery Category', 'All The Grocery Items', 'assets/uploads/category_img/grocery_U-3.jpg', '1', 'active', '2019-04-08 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_tbl`
--

CREATE TABLE `cheque_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `payer` varchar(250) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `cheque_no` varchar(250) NOT NULL,
  `cheque_date` date NOT NULL,
  `description` varchar(2000) NOT NULL,
  `category` varchar(250) NOT NULL,
  `bank_account` varchar(250) NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `sub_invoice` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city_tbl`
--

CREATE TABLE `city_tbl` (
  `id` int(100) NOT NULL,
  `country_id` varchar(250) NOT NULL,
  `state_id` varchar(250) NOT NULL,
  `district_id` varchar(250) NOT NULL,
  `city_id` varchar(250) NOT NULL,
  `city_code` varchar(250) NOT NULL,
  `city_name` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city_tbl`
--

INSERT INTO `city_tbl` (`id`, `country_id`, `state_id`, `district_id`, `city_id`, `city_code`, `city_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(0, 'cou-1', 'sta-1', 'dis-1', 'cit-3', 'xvxcv', 'sdfsdf', '        sdfsd', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-05 00:00:00', 'AD01', '', 'active', 4),
(1, 'cou-1', 'sta-1', 'dis-1', 'cit-1', 'CH', 'Chennai', 'Chennai				', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-06 00:00:00', 'AD01', '', 'active', 1),
(2, 'cou-1', 'sta-1', 'dis-1', 'cit-2', 'MA', 'Madurai', 'Madurai', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-06 00:00:00', 'AD01', '', 'active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `emp_id` varchar(55) NOT NULL,
  `emp_name` varchar(55) NOT NULL,
  `title` varchar(225) NOT NULL,
  `type` varchar(55) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `approved_by` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `autoid`, `emp_id`, `emp_name`, `title`, `type`, `amount`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, '', 'EMP00-1', 'Vaishu', 'Test', 'Fixed', '500', '127.0.0.1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-01 13:41:11', 'AD01', '', '', 0),
(2, 'COM-2', 'EMP00-2', 'Meena', 'Test', 'Fixed', '500', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 18:05:48', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `industry` varchar(250) NOT NULL,
  `company_type` varchar(250) NOT NULL,
  `company_address` varchar(500) NOT NULL,
  `company_country` varchar(250) NOT NULL,
  `company_state` varchar(250) NOT NULL,
  `company_district` varchar(250) NOT NULL,
  `company_city` varchar(250) NOT NULL,
  `company_area` varchar(250) NOT NULL,
  `company_pincode` varchar(250) NOT NULL,
  `reg_type` varchar(250) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `company_email_id` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `company_url` varchar(250) NOT NULL,
  `facebook_link` varchar(250) NOT NULL,
  `twitter_link` varchar(250) NOT NULL,
  `youtube_link` varchar(250) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `account_bank` varchar(250) NOT NULL,
  `account_branch` varchar(250) NOT NULL,
  `account_ifsc` varchar(250) NOT NULL,
  `account_number` varchar(250) NOT NULL,
  `account_type` varchar(250) NOT NULL,
  `account_swift` varchar(250) NOT NULL,
  `branches` int(100) NOT NULL,
  `warehouse` int(100) NOT NULL,
  `logo` varchar(2000) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`id`, `company_id`, `company_name`, `industry`, `company_type`, `company_address`, `company_country`, `company_state`, `company_district`, `company_city`, `company_area`, `company_pincode`, `reg_type`, `reg_date`, `reg_no`, `pan_no`, `gst_no`, `company_email_id`, `phone_number`, `company_url`, `facebook_link`, `twitter_link`, `youtube_link`, `account_name`, `account_bank`, `account_branch`, `account_ifsc`, `account_number`, `account_type`, `account_swift`, `branches`, `warehouse`, `logo`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'Raga Designers', 'Food', 'private limited company', 'flat no 1231', 'India', 'Tamil Nadu', 'Thiruvallur', 'Chennai', 'Villivakkam', '600049', 'msme', '2019-04-07', '1234', '1234', '33AAHCS3989E1Z4', 'santhoshvijendran@gmail.com', '9962856406', 'http://www.ragadesigners.com', 'http://www.ragadesigners.com', 'http://www.ragadesigners.com', 'http://www.ragadesigners.com', 'Raga Designers', 'Indian Bank', 'Ethiraj Salai', '1234', '123456789', 'CA', '12345', 1, 1, 'uploads/logo/logo2_U-1.png', '2019-04-07 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `competencies_tbl`
--

CREATE TABLE `competencies_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competencies_tbl`
--

INSERT INTO `competencies_tbl` (`id`, `autoid`, `name`, `type`, `date`, `created_by`, `approved_by`) VALUES
(1, 'COM-1', 'Allocating Resources', 'TER-1', '2023-08-14', 'AD01', ''),
(2, 'COM-2', 'Leadership', 'TER-2', '2023-08-14', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `complain_tbl`
--

CREATE TABLE `complain_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `complaint_from` varchar(200) NOT NULL,
  `complaint_against` varchar(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `complaint_date` date NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complain_tbl`
--

INSERT INTO `complain_tbl` (`id`, `autoid`, `complaint_from`, `complaint_against`, `title`, `complaint_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'RES-1', 'EMP00-1', 'EMP00-2', 'Work Reason', '2023-08-01', 'Workload and stress', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-04', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `country_tbl`
--

CREATE TABLE `country_tbl` (
  `id` int(100) NOT NULL,
  `country_id` varchar(250) NOT NULL,
  `country_code` varchar(250) NOT NULL,
  `country_name` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country_tbl`
--

INSERT INTO `country_tbl` (`id`, `country_id`, `country_code`, `country_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'cou-1', 'IND', 'India', 'India				', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-06 00:00:00', 'AD01', '', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_tbl`
--

CREATE TABLE `coupon_tbl` (
  `id` int(100) NOT NULL,
  `coupon_id` varchar(250) NOT NULL,
  `coupon_name` varchar(250) NOT NULL,
  `coupon_code` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `discount` decimal(20,2) NOT NULL,
  `min_amount` decimal(20,2) NOT NULL,
  `customer_login` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `cat_id` varchar(250) NOT NULL,
  `subcat_id` varchar(250) NOT NULL,
  `childcat_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_coupon` int(100) NOT NULL,
  `used_coupon` int(100) NOT NULL,
  `use_per_coupon` int(100) NOT NULL,
  `use_per_customer` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency_tbl`
--

CREATE TABLE `currency_tbl` (
  `id` int(100) NOT NULL,
  `currency_id` varchar(250) NOT NULL,
  `currency_name` varchar(250) NOT NULL,
  `currency_code` varchar(250) NOT NULL,
  `currency_symbol` varchar(250) NOT NULL,
  `currency_default` int(100) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `currency_tbl`
--

INSERT INTO `currency_tbl` (`id`, `currency_id`, `currency_name`, `currency_code`, `currency_symbol`, `currency_default`, `country`, `state`, `city`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'cur-1', 'Rupees', 'INR', 'inr', 0, 'India', 'Tamil Nadu', 'sdfsdf', '        INR Description', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-10 00:00:00', 'AD01', '', 'active', 11);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `id` int(100) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `age` int(100) NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(250) NOT NULL,
  `marriage_date` date NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `alter_email_id` varchar(250) NOT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `alter_number` varchar(250) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `profile` varchar(2000) NOT NULL,
  `balance` decimal(20,2) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`id`, `customer_id`, `customer_name`, `first_name`, `last_name`, `address`, `country`, `state`, `district`, `city`, `area`, `pincode`, `gender`, `age`, `dob`, `marital_status`, `marriage_date`, `email_id`, `alter_email_id`, `mobile_number`, `alter_number`, `pan_no`, `gst_no`, `profile`, `balance`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'cus-1', 'Santhosh', 'Santhosh', 'V', 'Flat no 1231 anjali apartment, MTH Road, Villivakkam				', 'India', 'Tamil Nadu', 'Thiruvallur', 'Chennai', 'Villivakkam', '600049', 'male', 30, '1989-04-17', 'no', '0000-00-00', 'santhoshvijendran@gmail.com', 'santhoshvijendran@gmail.com', '9962856406', '', '123456', '33AAHCS3989E1Z6', 'uploads/profile/logo2_U-6.png', '0.00', '2019-04-08 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', ''),
(2, 'cus-2', 'Sandhya', 'Sandhya', 'T', 'flat no 1231, anjali apartment, MTH Road, Villivakkam', 'India', 'Tamil Nadu', 'Thiruvallur', 'Chennai', 'Villivakkam', '600049', 'male', 30, '1989-08-26', 'no', '0000-00-00', 'sandhyathirugnanam@gmail.com', 'sandhyathirugnanam@gmail.com', '9962856406', '', '123456', '33AAHCS3989E1Z7', 'uploads/profile/logo2_U-7.png', '0.00', '2019-04-08 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', ''),
(3, 'cus-3', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '0.00', '2021-02-17 14:58:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `damagedetails_tbl`
--

CREATE TABLE `damagedetails_tbl` (
  `id` int(100) NOT NULL,
  `damagedetails_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `damage_id` varchar(250) NOT NULL,
  `damage_date` date NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `po_date` date NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `invoice_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `line_discount_type` varchar(250) NOT NULL,
  `line_discount` decimal(20,2) NOT NULL,
  `line_discount_total` decimal(20,2) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `tax_total` decimal(20,2) NOT NULL,
  `line_total` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damage_tbl`
--

CREATE TABLE `damage_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `damage_id` varchar(250) DEFAULT NULL,
  `damage_date` date DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `vendor_id` varchar(250) DEFAULT NULL,
  `vendor_name` varchar(250) DEFAULT NULL,
  `financial_year` varchar(250) DEFAULT NULL,
  `total_lineitems` int(100) DEFAULT NULL,
  `total_qty` int(100) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `total_linediscount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `flatrate_discount` decimal(20,2) DEFAULT NULL,
  `percentage_discount` decimal(20,2) DEFAULT NULL,
  `total_overalldiscount` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `balance_amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `emp_id` varchar(55) NOT NULL,
  `emp_name` varchar(55) NOT NULL,
  `deduction_option` varchar(55) NOT NULL,
  `title` varchar(225) NOT NULL,
  `type` varchar(55) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `approved_by` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`id`, `autoid`, `emp_id`, `emp_name`, `deduction_option`, `title`, `type`, `amount`, `reason`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'DED-1', 'EMP00-1', 'Vaishu', 'Mutual Fund', 'Test', 'Percentage', '1000', '', '127.0.0.1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-01 14:20:13', 'AD01', '', '', 0),
(2, 'DED-2', 'EMP00-2', 'Meena', 'Mutual Fund', 'Test', 'Fixed', '500', '', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 18:20:36', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deduction_option_tbl`
--

CREATE TABLE `deduction_option_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deduction_option_tbl`
--

INSERT INTO `deduction_option_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`) VALUES
(1, 'LO-1', 'Mutual Fund', '2023-08-14', 'AD01', ''),
(2, 'LO-2', 'Social Security System', '2023-08-14', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `deliverypartner_tbl`
--

CREATE TABLE `deliverypartner_tbl` (
  `id` int(100) NOT NULL,
  `auto_id` varchar(250) NOT NULL,
  `deliverypartner_name` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `alter_email_id` varchar(250) NOT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deliverypartner_tbl`
--

INSERT INTO `deliverypartner_tbl` (`id`, `auto_id`, `deliverypartner_name`, `address`, `country`, `state`, `district`, `city`, `area`, `pincode`, `email_id`, `alter_email_id`, `mobile_number`, `status`, `sort_order`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'del-1', 'Swiggy', 'Swiggy Delivery Partner', 'cou-1', 'sta-1', 'dis-1', 'Chennai', 'Villivakkam', '600049', 'santhoshvijendran@gmail.com', 'santhoshvijendran@gmail.com', '9962856406', 'active', 1, '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `id` int(100) NOT NULL,
  `department_id` varchar(250) NOT NULL,
  `department_name` varchar(250) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department_id`, `department_name`, `branch`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(3, 'dep-2', 'Financials', 'bra-1', '2023-08-05 00:00:00', 'AD01', '', 'active', 2),
(4, 'dep-4', 'Telecommunications', 'bra-3', '2023-08-10 18:02:48', 'AD01', '', 'active', 3),
(5, 'dep-5', 'Health care', 'bra-1', '2023-08-10 17:55:56', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `designation_tbl`
--

CREATE TABLE `designation_tbl` (
  `id` int(100) NOT NULL,
  `designation_id` varchar(250) NOT NULL,
  `department_id` varchar(250) DEFAULT NULL,
  `designation_name` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designation_tbl`
--

INSERT INTO `designation_tbl` (`id`, `designation_id`, `department_id`, `designation_name`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(7, 'des-1', 'dep-2', 'Chartered', '2023-08-11 11:43:04', 'AD01', '', '', 0),
(9, 'des-8', 'dep-2', 'Teaching', '2023-08-11 11:42:59', 'AD01', '', '', 0),
(10, 'des-10', 'dep-2', 'Manager', '2023-08-11 11:37:34', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `district_tbl`
--

CREATE TABLE `district_tbl` (
  `id` int(100) NOT NULL,
  `country_id` varchar(250) NOT NULL,
  `state_id` varchar(250) NOT NULL,
  `district_id` varchar(250) NOT NULL,
  `district_code` varchar(250) NOT NULL,
  `district_name` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `district_tbl`
--

INSERT INTO `district_tbl` (`id`, `country_id`, `state_id`, `district_id`, `district_code`, `district_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'cou-1', 'sta-1', 'dis-1', 'TH', 'Thiruvallur', 'Thiruvallur', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-06 00:00:00', 'AD01', '', 'active', 1),
(2, 'cou-1', 'sta-1', 'dis-2', 'KA', 'Kanchipuram', '                Kanchipuram				', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-05 00:00:00', 'AD01', '', 'active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `document_tbl`
--

CREATE TABLE `document_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `file` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_tbl`
--

INSERT INTO `document_tbl` (`id`, `autoid`, `name`, `role`, `file`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'DU-1', 'meena', '6', 'uploads/document/7647686322user-4.jpg', 'test', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-09', 'AD01', ''),
(3, 'DU-2', 'meena', '5', 'uploads/document/1429689629Free Letter C Logo Design.png', 'asdf', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-09', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `document_type_tbl`
--

CREATE TABLE `document_type_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `required` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `document_type_tbl`
--

INSERT INTO `document_type_tbl` (`id`, `autoid`, `name`, `required`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'DT-1', 'Certificate', '1', '2023-08-11 12:26:34', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_tbl`
--

CREATE TABLE `email_tbl` (
  `id` int(100) NOT NULL,
  `auto_id` varchar(200) NOT NULL,
  `from` varchar(250) NOT NULL,
  `to` varchar(250) NOT NULL,
  `cc` varchar(250) NOT NULL,
  `bcc` varchar(250) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `msg` longtext NOT NULL,
  `attachment` varchar(2000) NOT NULL,
  `page` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(55) NOT NULL,
  `name` varchar(225) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `address` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `branch` varchar(55) NOT NULL,
  `department` varchar(55) NOT NULL,
  `designation` varchar(55) NOT NULL,
  `doj` varchar(25) NOT NULL,
  `certificate` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `resume` varchar(225) NOT NULL,
  `acc_holder` varchar(100) NOT NULL,
  `acc_no` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_ifsc` varchar(55) NOT NULL,
  `branch_location` varchar(100) NOT NULL,
  `tax_payer` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `name`, `phone`, `dob`, `gender`, `address`, `email`, `branch`, `department`, `designation`, `doj`, `certificate`, `photo`, `resume`, `acc_holder`, `acc_no`, `bank_name`, `bank_ifsc`, `branch_location`, `tax_payer`, `status`) VALUES
(1, 'EMP00-1', 'Vaishu', '9887394633', '2023-07-21', 'Female', 'trichy', 'vaishu@gmail.com', 'bra-1', 'dep-1', 'Sales Manager', '2023-06-28', 'uploads/employee/certificate/Beneficiary_U-2.pdf', 'uploads/employee/photo/2_U-2.png', 'uploads/employee/resume/HTML material_U-2.docx', 'Vaishu', '876877587567', 'KVB', 'kvb329', 'Trichy', '2323', 0),
(2, 'EMP00-2', 'Meena', '987876553', '1999-06-10', 'Female', 'Trichy', 'meena@gmail.com', 'bra-1', 'dep-1', 'Sales Manager', '2023-07-20', 'uploads/employee/certificate/download_U-3.pdf', 'uploads/employee/photo/avatar2_U-3.png', 'uploads/employee/resume/download_U-3.pdf', 'Meena', '987683668', 'BOI', '3874892', 'Trichy', '43232', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `id` int(100) NOT NULL,
  `employee_id` varchar(250) NOT NULL,
  `employement_type` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `area` varchar(200) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `current_address` varchar(200) NOT NULL,
  `current_country` varchar(150) NOT NULL,
  `current_state` varchar(150) NOT NULL,
  `current_district` varchar(150) NOT NULL,
  `current_city` varchar(150) NOT NULL,
  `current_area` varchar(100) NOT NULL,
  `current_pincode` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `marriage_date` varchar(20) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `alter_email_id` varchar(150) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `alter_number` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `skill_sets` text NOT NULL,
  `course_details` text NOT NULL,
  `designation` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `resume` varchar(500) NOT NULL,
  `document` varchar(500) NOT NULL,
  `signature` varchar(500) NOT NULL,
  `probation_duration` varchar(200) NOT NULL,
  `doj` date NOT NULL,
  `dor` date NOT NULL,
  `increment_date` text NOT NULL,
  `working_hours` varchar(50) NOT NULL,
  `working_days` varchar(50) NOT NULL,
  `ctc` decimal(20,2) NOT NULL,
  `monthly_salary` decimal(20,2) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `account_name` varchar(200) NOT NULL,
  `account_bank` varchar(200) NOT NULL,
  `account_branch` varchar(200) NOT NULL,
  `account_ifsc` varchar(200) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `account_type` varchar(200) NOT NULL,
  `account_swift` varchar(200) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `balance` text NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `browser` varchar(300) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `employee_id`, `employement_type`, `first_name`, `last_name`, `address`, `country`, `state`, `district`, `city`, `area`, `pincode`, `current_address`, `current_country`, `current_state`, `current_district`, `current_city`, `current_area`, `current_pincode`, `gender`, `dob`, `marital_status`, `marriage_date`, `email_id`, `alter_email_id`, `mobile_number`, `alter_number`, `religion`, `education`, `skill_sets`, `course_details`, `designation`, `department`, `experience`, `resume`, `document`, `signature`, `probation_duration`, `doj`, `dor`, `increment_date`, `working_hours`, `working_days`, `ctc`, `monthly_salary`, `pan_no`, `account_name`, `account_bank`, `account_branch`, `account_ifsc`, `account_number`, `account_type`, `account_swift`, `profile`, `balance`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'emp1', '', 'meena', 's', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '0.00', '0.00', '', '', '', '', '', '', '', '', '', '', '2023-07-17 16:28:04', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_asset_tbl`
--

CREATE TABLE `emp_asset_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(200) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `supported_date` date NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_asset_tbl`
--

INSERT INTO `emp_asset_tbl` (`id`, `autoid`, `employee`, `name`, `amount`, `purchase_date`, `supported_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'EA-1', 'EMP00-1', 'Onboarding and orientation', '1000.00', '2023-08-09', '2023-08-10', 'Onboarding and orientation', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-09', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `color` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`id`, `autoid`, `branch`, `department`, `employee`, `title`, `start_date`, `end_date`, `color`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, '', '', '', '', 'test123', '2023-08-01', '2023-08-04', 'event-warning', 'test desc1', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-08', 'AD01', ''),
(5, 'EV-2', 'bra-1', 'dep-1', 'EMP00-1', 'ssdsdf', '2023-08-08', '2023-08-10', 'event-info', 'sdsdfg fght34ert', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-08', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `floor_tbl`
--

CREATE TABLE `floor_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `floor_id` varchar(250) NOT NULL,
  `floor_name` varchar(250) NOT NULL,
  `floor_desc` varchar(2000) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `floor_tbl`
--

INSERT INTO `floor_tbl` (`id`, `company_id`, `branch_id`, `floor_id`, `floor_name`, `floor_desc`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'bra-1', 'flo-1', 'Floor1', 'Test				', 1, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', ''),
(2, 'com-1', 'bra-1', 'flo-2', 'Floor2', 'Test		', 2, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `goal_tracking`
--

CREATE TABLE `goal_tracking` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `employee` varchar(25) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `goal_type` varchar(25) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` varchar(25) NOT NULL,
  `subject` text NOT NULL,
  `target` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(55) NOT NULL,
  `rating` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goal_tracking`
--

INSERT INTO `goal_tracking` (`id`, `autoid`, `employee`, `branch`, `goal_type`, `start_date`, `end_date`, `subject`, `target`, `description`, `status`, `rating`) VALUES
(1, '', 'EMP00-1', 'bra-1', 'In Progress', '2023-08-01', '2023-08-31', 'Test', 'Demo', 'Test', 'In Progress', '3');

-- --------------------------------------------------------

--
-- Table structure for table `goal_type_tbl`
--

CREATE TABLE `goal_type_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goal_type_tbl`
--

INSERT INTO `goal_type_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`) VALUES
(1, 'GO-1', 'Event Goal', 2147483647, 'AD01', ''),
(2, 'GO-2', 'Invoice Goal', 2147483647, 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `holdorders_tbl`
--

CREATE TABLE `holdorders_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `mobile_number` int(250) NOT NULL,
  `order_type` varchar(250) NOT NULL,
  `layout_no` varchar(250) NOT NULL,
  `table_no` varchar(250) NOT NULL,
  `tag_no` varchar(250) NOT NULL,
  `order_no` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL,
  `financial_year` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(2000) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `avail_stock` int(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `discount` decimal(20,2) NOT NULL,
  `discounttotal` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `taxtotal` decimal(20,2) NOT NULL,
  `linetotal` decimal(20,2) NOT NULL,
  `status` varchar(250) NOT NULL,
  `order_status` varchar(250) NOT NULL,
  `section_status` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday_tbl`
--

CREATE TABLE `holiday_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(200) NOT NULL,
  `occasion` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holiday_tbl`
--

INSERT INTO `holiday_tbl` (`id`, `autoid`, `occasion`, `start_date`, `end_date`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'H-1', 'Rangwali Holi', '2023-08-04', '2023-08-06', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05', 'AD01', ''),
(2, 'H-2', 'Good Friday', '2023-08-01', '2023-08-03', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `employee` varchar(55) NOT NULL,
  `branch` varchar(55) NOT NULL,
  `department` varchar(55) NOT NULL,
  `designation` varchar(55) NOT NULL,
  `business_process` varchar(25) NOT NULL,
  `allocating_resource` varchar(25) NOT NULL,
  `oral_communication` varchar(25) NOT NULL,
  `project_management` varchar(25) NOT NULL,
  `leadership` varchar(25) NOT NULL,
  `overall` varchar(55) NOT NULL,
  `added_by` varchar(55) NOT NULL,
  `created_at` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indicator`
--

INSERT INTO `indicator` (`id`, `autoid`, `employee`, `branch`, `department`, `designation`, `business_process`, `allocating_resource`, `oral_communication`, `project_management`, `leadership`, `overall`, `added_by`, `created_at`, `status`) VALUES
(1, ' IND-1 ', 'EMP00-1', 'bra-1', 'dep-1', 'Sales Manager', '3', '3', '3', '3', '3', '3', 'Butterfly Paints', 'Aug 09,2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `industry_tbl`
--

CREATE TABLE `industry_tbl` (
  `id` int(100) NOT NULL,
  `industry_id` varchar(250) NOT NULL,
  `industry_name` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `industry_tbl`
--

INSERT INTO `industry_tbl` (`id`, `industry_id`, `industry_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'ind-1', 'Food', 'Food Industry', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-06 00:00:00', 'AD01', '', 'active', 1),
(2, 'ind-2', 'test', '        test', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-05 00:00:00', 'AD01', '', 'active', 1),
(3, 'ind-2', 'test', '        test', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-05 00:00:00', 'AD01', '', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_tbl`
--

CREATE TABLE `ingredient_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `ingredient_id` varchar(250) NOT NULL,
  `ingredientcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `ingredient_name` varchar(500) NOT NULL,
  `ingredient_desc` varchar(2000) NOT NULL,
  `ingredient_img` varchar(2000) NOT NULL,
  `category` varchar(250) NOT NULL,
  `sub_category` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `brand_id` varchar(250) NOT NULL,
  `hsn_sac_code` varchar(250) NOT NULL,
  `batch_stock` varchar(250) NOT NULL,
  `lowstock_alert` int(100) NOT NULL,
  `expirydays_alert` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `stockable` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ingredient_tbl`
--

INSERT INTO `ingredient_tbl` (`id`, `company_id`, `branch_id`, `ingredient_id`, `ingredientcode`, `barcode`, `ingredient_name`, `ingredient_desc`, `ingredient_img`, `category`, `sub_category`, `unit`, `tax`, `brand_id`, `hsn_sac_code`, `batch_stock`, `lowstock_alert`, `expirydays_alert`, `status`, `stockable`, `sort_order`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'bra-1', 'ing-1', '1234', '1234', 'Salt', 'Salt', 'uploads/ingredient_img/IMG_20190515_170829_U-8.jpg', 'Grocery Category', 'Drinks', 'KG', '5.00', 'bra-1', 'HSN1234', 'yes', 10, 30, 'active', 'yes', 0, '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-23 00:00:00', 'AD01', ''),
(2, 'com-1', 'bra-1', 'ing-2', '12345', '12345', 'Sugar', 'Sugar', 'uploads/ingredient_img/IMG_20190515_170829_U-9.jpg', 'Grocery Category', 'Drinks', 'KG', '10.00', 'bra-1', 'HSN234', 'no', 10, 10, 'active', 'yes', 0, '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-23 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `autoid`, `title`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'JC-1', 'Accounting Jobs', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-10', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_stage`
--

CREATE TABLE `job_stage` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_stage`
--

INSERT INTO `job_stage` (`id`, `autoid`, `title`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(3, 'JS-1', 'Applied', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-14', 'AD01', ''),
(4, 'JS-4', 'Phone Screen', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-14', 'AD01', ''),
(5, 'JS-5', 'Interview', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-14', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `layout_tbl`
--

CREATE TABLE `layout_tbl` (
  `id` int(100) NOT NULL,
  `layout_id` varchar(250) DEFAULT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `layout_name` varchar(250) DEFAULT NULL,
  `sort_order` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `layout_tbl`
--

INSERT INTO `layout_tbl` (`id`, `layout_id`, `company_id`, `branch_id`, `layout_name`, `sort_order`, `status`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'lay-1', 'com-1', 'bra-1', 'Layout1', '1', 'active', '2018-07-17 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', ''),
(2, 'lay-2', 'com-1', 'bra-1', 'Layout2', '2', 'active', '2018-07-17 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `leave_type` varchar(100) NOT NULL,
  `start_date` text NOT NULL,
  `end_date` date NOT NULL,
  `leave_reason` text NOT NULL,
  `total_days` varchar(20) NOT NULL,
  `remark` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_address` varchar(50) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `autoid`, `employee`, `leave_type`, `start_date`, `end_date`, `leave_reason`, `total_days`, `remark`, `status`, `created_date`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(2, 'EMPL-2', 'EMP00-1', 'Casual Leave (6)', '2023-07-02', '2023-07-03', 'test', '1 days', 'test1', '1', '2023-08-03 14:22:19', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-03', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type_tbl`
--

CREATE TABLE `leave_type_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `leave_type` varchar(250) NOT NULL,
  `days` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leave_type_tbl`
--

INSERT INTO `leave_type_tbl` (`id`, `autoid`, `leave_type`, `days`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'LVT-1', 'Casual Leave', '6', '2023-08-11 22:13:02', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `emp_id` varchar(55) NOT NULL,
  `emp_name` varchar(55) NOT NULL,
  `loan_option` varchar(55) NOT NULL,
  `title` varchar(225) NOT NULL,
  `type` varchar(55) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `approved_by` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `autoid`, `emp_id`, `emp_name`, `loan_option`, `title`, `type`, `amount`, `reason`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'LON-1', 'EMP00-1', 'Vaishu', 'Health Insurance', 'Test', 'Percentage', '1000', 'Testing', '127.0.0.1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-01 13:45:32', 'AD01', '', '', 0),
(2, 'LON-2', 'EMP00-2', 'Meena', 'Health Insurance', 'Test', 'Fixed', '500', 'Medical', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 18:23:09', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_option_tbl`
--

CREATE TABLE `loan_option_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_option_tbl`
--

INSERT INTO `loan_option_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`) VALUES
(1, 'LO-1', 'Health Insurance', '2023-08-14', 'AD01', ''),
(2, 'LO-2', 'Other Insurance', '2023-08-14', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE `log_tbl` (
  `id` int(100) NOT NULL,
  `log_id` varchar(250) NOT NULL,
  `log_url` varchar(250) NOT NULL,
  `log_page` varchar(250) NOT NULL,
  `log_date` datetime NOT NULL,
  `log_description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_tbl`
--

CREATE TABLE `meeting_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting_tbl`
--

INSERT INTO `meeting_tbl` (`id`, `autoid`, `branch`, `department`, `employee`, `title`, `description`, `date`, `time`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'M-1', 'bra-1', 'dep-1', 'EMP00-1', 'test ttt', 'test tttttttttt', '2023-08-10', '14:24', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-09', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_tbl`
--

CREATE TABLE `menu_tbl` (
  `id` int(100) NOT NULL,
  `menu_id` varchar(250) NOT NULL,
  `parent` varchar(250) NOT NULL,
  `submenu` varchar(250) NOT NULL,
  `childmenu` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu_tbl`
--

INSERT INTO `menu_tbl` (`id`, `menu_id`, `parent`, `submenu`, `childmenu`, `link`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'men-1', 'test', 'sdf', 'sdf', 'sdf', '2023-07-17 00:00:00', '', '', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification_tbl`
--

CREATE TABLE `notification_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `userid` varchar(250) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `status` int(10) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_tbl`
--

CREATE TABLE `offer_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `offer_id` varchar(250) NOT NULL,
  `offer_name` varchar(250) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_Date` datetime NOT NULL,
  `offer_desc` varchar(2000) NOT NULL,
  `offer_type` varchar(250) NOT NULL,
  `offer_value` decimal(20,2) NOT NULL,
  `category` varchar(2000) NOT NULL,
  `sub_category` varchar(2000) NOT NULL,
  `child_category` varchar(2000) NOT NULL,
  `product_id` varchar(2000) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_payment`
--

CREATE TABLE `other_payment` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `emp_id` varchar(55) NOT NULL,
  `emp_name` varchar(55) NOT NULL,
  `title` varchar(225) NOT NULL,
  `type` varchar(55) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `approved_by` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `other_payment`
--

INSERT INTO `other_payment` (`id`, `autoid`, `emp_id`, `emp_name`, `title`, `type`, `amount`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'OTH-1', 'EMP00-1', 'Vaishu', 'Test', 'Percentage', '2500', '127.0.0.1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-01 14:23:15', 'AD01', '', '', 0),
(2, 'OTH-2', 'EMP00-2', 'Meena', 'Test', 'Fixed', '500', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 18:26:45', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `autoid` varchar(55) NOT NULL,
  `emp_id` varchar(55) NOT NULL,
  `emp_name` varchar(55) NOT NULL,
  `title` varchar(225) NOT NULL,
  `days` varchar(55) NOT NULL,
  `hours` varchar(55) NOT NULL,
  `rate` varchar(55) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `approved_by` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `autoid`, `emp_id`, `emp_name`, `title`, `days`, `hours`, `rate`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'OVR-1', 'EMP00-1', 'Vaishu', 'Test', '1', '1', '500', '127.0.0.1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-01 19:25:46', 'AD01', '', '', 0),
(2, 'OVR-1', 'EMP00-2', 'Meena', 'Test', '1', '1', '500', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-05 18:29:01', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `id` int(100) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `payment_type` varchar(250) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `payment_amount` decimal(20,2) NOT NULL,
  `payment_due_date` date DEFAULT NULL,
  `card_no` varchar(250) NOT NULL,
  `card_type` varchar(250) NOT NULL,
  `card_operator` varchar(250) NOT NULL,
  `cheque_no` varchar(250) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `cheque_bank` varchar(250) NOT NULL,
  `trans_no` varchar(250) DEFAULT NULL,
  `ref_no` varchar(250) NOT NULL,
  `payment_status` varchar(250) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`id`, `payment_id`, `company_id`, `branch_id`, `payment_type`, `invoice_no`, `payment_date`, `payment_mode`, `payment_amount`, `payment_due_date`, `card_no`, `card_type`, `card_operator`, `cheque_no`, `cheque_date`, `cheque_bank`, `trans_no`, `ref_no`, `payment_status`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(4, 'pay-1', '', '', 'sales', 'INV/2019-2020/3', '2019-04-02', 'card', '1575.00', '0000-00-00', '123456789', 'Debit Card', 'Visa Card', '', '0000-00-00', '', '1234', '', '', 'Single Payment', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-02 00:00:00', 'AD01', ''),
(5, 'pay-5', '', '', 'sales', 'INV/2019-2020/2', '2019-04-04', 'cash', '3225.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-04 00:00:00', 'AD01', ''),
(6, 'pay-6', 'com-1', 'bra-1', 'purchase', 'ZZ-1', '2019-05-10', 'cash', '0.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(7, 'pay-7', 'com-1', 'bra-1', 'purchase', '2', '2019-05-10', 'cash', '0.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(8, 'pay-8', 'com-1', 'bra-1', 'purchase', '3', '2019-05-10', 'cash', '0.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(9, 'pay-9', 'com-1', 'bra-1', 'sales', 'INV/2019-2020/1', '2019-05-10', 'cash', '990.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(10, 'pay-10', 'com-1', 'bra-1', 'sales', 'INV/2019-2020/2', '2019-05-13', 'cash', '0.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-13 00:00:00', 'AD01', ''),
(11, 'pay-11', 'com-1', 'bra-1', 'sales', 'INV/2019-2020/2', '2019-05-13', 'cash', '0.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-13 00:00:00', 'AD01', ''),
(12, 'pay-12', 'com-1', '', 'sales', 'inv-4', '2021-04-26', 'cash', '1673.00', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `payslip_tbl`
--

CREATE TABLE `payslip_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `emp_name` varchar(250) NOT NULL,
  `payroll_type` varchar(55) NOT NULL,
  `salary` int(11) NOT NULL,
  `ctc` int(11) NOT NULL,
  `salary_slip` varchar(55) NOT NULL,
  `sort_order` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payslip_tbl`
--

INSERT INTO `payslip_tbl` (`id`, `autoid`, `emp_id`, `emp_name`, `payroll_type`, `salary`, `ctc`, `salary_slip`, `sort_order`, `status`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'PAY-1', 'EMP00-1', 'Vaishu', 'Monthly Payslip', 50000, 2500, '2023-08', '', 'Unpaid', '2023-08-05 17:33:19', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', ''),
(2, 'PAY-2', 'EMP00-2', 'Meena', 'Monthly Payslip', 50000, 1500, '2023-08', '', 'Paid', '2023-08-05 15:05:58', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payslip_type_tbl`
--

CREATE TABLE `payslip_type_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payslip_type_tbl`
--

INSERT INTO `payslip_type_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'PT-1', 'Hourly Payslip', '2023-08-14 12:16:24', 'AD01', '', '', 0),
(2, 'PT-2', 'Monthly Payslip', '2023-08-14 12:16:39', 'AD01', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `performance_type_tbl`
--

CREATE TABLE `performance_type_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_type_tbl`
--

INSERT INTO `performance_type_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`) VALUES
(1, 'TER-1', 'Behavioural Competencies', '2023-08-14', 'AD01', ''),
(2, 'TER-2', 'Organizational Competencies', '2023-08-14', 'AD01', ''),
(3, 'TER-3', 'Technical Competencies', '2023-08-14', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `pincode_tbl`
--

CREATE TABLE `pincode_tbl` (
  `id` int(100) NOT NULL,
  `pincode_id` varchar(250) NOT NULL,
  `country_id` varchar(250) NOT NULL,
  `state_id` varchar(250) NOT NULL,
  `district_id` varchar(250) NOT NULL,
  `city_id` varchar(250) NOT NULL,
  `area_name` varchar(250) NOT NULL,
  `pin_code` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pincode_tbl`
--

INSERT INTO `pincode_tbl` (`id`, `pincode_id`, `country_id`, `state_id`, `district_id`, `city_id`, `area_name`, `pin_code`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'pin-1', 'cou-1', 'sta-1', 'dis-1', 'cit-1', 'Villivakkam', '600049', 'Villivakkam				', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-07 00:00:00', 'AD01', '', 'active', 1),
(2, 'pin-2', 'cou-1', 'sta-1', 'dis-1', 'cit-1', 'Annanagar', '600096', 'Annanagar				', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-07 00:00:00', 'AD01', '', 'active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `policy_tbl`
--

CREATE TABLE `policy_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(200) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(500) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy_tbl`
--

INSERT INTO `policy_tbl` (`id`, `autoid`, `branch`, `title`, `description`, `file`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'CP-1', 'bra-1', 'test', 'Performance management and disciplinary procedures', 'uploads/policy/72902431702141663948slider1.jpg', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-10', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `productingredient_tbl`
--

CREATE TABLE `productingredient_tbl` (
  `id` int(100) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `ingredient_id` varchar(250) NOT NULL,
  `ingredient_name` varchar(250) NOT NULL,
  `ingredient_qty` varchar(250) NOT NULL,
  `ingredient_unit` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `productingredient_tbl`
--

INSERT INTO `productingredient_tbl` (`id`, `product_id`, `productcode`, `barcode`, `product_name`, `ingredient_id`, `ingredient_name`, `ingredient_qty`, `ingredient_unit`, `status`, `sort_order`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'pro-3', '123456', '123456', 'New Product', 'ing-1', 'Salt', '1', 'KG', 'active', 1, '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-23 00:00:00', 'AD01', ''),
(2, 'pro-3', '123456', '123456', 'New Product', 'ing-2', 'Sugar', '1', 'KG', 'active', 1, '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-23 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_desc` varchar(2000) NOT NULL,
  `product_img` varchar(2000) NOT NULL,
  `category` varchar(250) NOT NULL,
  `sub_category` varchar(250) NOT NULL,
  `brand_id` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `hsn_sac_code` varchar(250) NOT NULL,
  `batch_stock` varchar(250) NOT NULL,
  `stockable` varchar(250) NOT NULL,
  `price_changeable` varchar(250) NOT NULL,
  `lowstock_alert` int(100) NOT NULL,
  `expirydays_alert` int(100) NOT NULL,
  `show` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `company_id`, `branch_id`, `product_id`, `productcode`, `barcode`, `product_name`, `product_desc`, `product_img`, `category`, `sub_category`, `brand_id`, `unit`, `tax`, `hsn_sac_code`, `batch_stock`, `stockable`, `price_changeable`, `lowstock_alert`, `expirydays_alert`, `show`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'bra-1', 'pro-1', '1', '1234', 'Product1', 'Testing                ', 'uploads/product_img/meals.png', 'Grocery Category', 'Drinks', 'B2', 'KG', '5.00', 'HSN123', 'no', 'no', 'no', 1, 1, 'yes', 1, 'active', '127.0.0.1', '', '2019-03-25 00:00:00', 'AD01', 'AD01'),
(2, 'com-1', 'bra-1', 'pro-2', '2', 'abcd-1234-01', 'Product2', 'Testing                ', 'uploads/product_img/meals.png', 'Grocery Category', 'Drinks', 'B2', 'KG', '10.00', 'HSN1234', 'yes', 'yes', 'yes', 1, 1, 'yes', 1, 'active', '127.0.0.1', '', '2019-03-25 00:00:00', 'AD01', 'AD01'),
(3, 'com-1', 'bra-1', 'pro-3', '123456', '123456', 'New Product', 'New Product', 'uploads/product_img/IMG_20190515_170829_U-10.jpg', 'Grocery Category', 'Drinks', 'bra-1', 'PCS', '0.00', 'HSN123', 'yes', 'yes', 'no', 10, 1, 'yes', 1, 'active', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-23 00:00:00', 'AD01', ''),
(4, 'com-1', 'bra-1', 'pro-4', '3', '1234567', 'New Product1', 'New Product1', 'uploads/product_img/IMG_20190515_170829_U-11.jpg', 'Grocery Category', 'Drinks', 'bra-1', 'KG', '0.00', 'HSN1234', 'yes', 'yes', 'yes', 1, 1, 'yes', 1, 'active', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-23 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_tbl`
--

CREATE TABLE `promotion_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `promotion_title` varchar(300) NOT NULL,
  `promotion_date` date NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion_tbl`
--

INSERT INTO `promotion_tbl` (`id`, `autoid`, `employee`, `designation`, `promotion_title`, `promotion_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(6, 'RES-6', 'EMP00-1', 'des-1', 'Teaching', '2023-08-03', 'test', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-04', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails_tbl`
--

CREATE TABLE `purchasedetails_tbl` (
  `id` int(100) NOT NULL,
  `purchasedetails_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `purchase_id` varchar(250) NOT NULL,
  `purchase_date` date NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `po_date` date NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `invoice_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `line_discount_type` varchar(250) NOT NULL,
  `line_discount` decimal(20,2) NOT NULL,
  `line_discount_total` decimal(20,2) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `tax_total` decimal(20,2) NOT NULL,
  `line_total` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchasedetails_tbl`
--

INSERT INTO `purchasedetails_tbl` (`id`, `purchasedetails_id`, `company_id`, `branch_id`, `purchase_id`, `purchase_date`, `po_no`, `po_date`, `invoice_no`, `invoice_date`, `vendor_id`, `vendor_name`, `product_id`, `productcode`, `barcode`, `product_name`, `qty`, `rate`, `unit`, `line_discount_type`, `line_discount`, `line_discount_total`, `mrp_price`, `cost_price`, `selling_price`, `wholesale_price`, `tax`, `tax_total`, `line_total`, `batch_no`, `expiry_date`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'pd-1', 'com-1', 'bra-1', 'pur-1', '2019-05-10', '1', '2019-05-10', 'ZZ-1', '2019-05-10', 'ven-1', 'Zipzapshoppy', 'pro-1', '1', '1234', 'Product1', '10.00', '500.00', 'KG', 'no discount', '0.00', '0.00', '800.00', '0.00', '650.00', '600.00', '5.00', '25.00', '5250.00', '1', '2019-05-10', 0, 'active', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(2, 'pd-2', 'com-1', 'bra-1', 'pur-2', '2019-05-10', '2', '2019-05-10', '2', '2019-05-10', 'ven-1', 'Zipzapshoppy', 'pro-2', '2', '12345', 'Product2', '10.00', '650.00', 'KG', 'no discount', '0.00', '0.00', '1000.00', '0.00', '900.00', '850.00', '10.00', '65.00', '7150.00', '1', '2019-06-10', 0, 'active', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(3, 'pd-3', 'com-1', 'bra-1', 'pur-3', '2019-05-10', '3', '2019-05-10', '3', '2019-05-10', 'ven-1', 'Zipzapshoppy', 'pro-2', '2', '12345', 'Product2', '20.00', '650.00', 'KG', 'no discount', '0.00', '0.00', '1000.00', '0.00', '900.00', '850.00', '10.00', '65.00', '14300.00', '2', '2019-06-10', 0, 'active', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseingredientdetails_tbl`
--

CREATE TABLE `purchaseingredientdetails_tbl` (
  `id` int(100) NOT NULL,
  `purchaseingredientdetails_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `purchaseingredient_id` varchar(250) NOT NULL,
  `purchaseingredient_date` date NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `po_date` date NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `invoice_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `line_discount_type` varchar(250) NOT NULL,
  `line_discount` decimal(20,2) NOT NULL,
  `line_discount_total` decimal(20,2) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `tax_total` decimal(20,2) NOT NULL,
  `line_total` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseingredientreturndetails_tbl`
--

CREATE TABLE `purchaseingredientreturndetails_tbl` (
  `id` int(100) NOT NULL,
  `purchaseingredientreturndetails_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `purchaseingredientreturn_id` varchar(250) NOT NULL,
  `purchaseingredientreturn_date` date NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `po_date` date NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `invoice_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `ingredient_id` varchar(250) NOT NULL,
  `ingredientcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `ingredient_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `line_discount_type` varchar(250) NOT NULL,
  `line_discount` decimal(20,2) NOT NULL,
  `line_discount_total` decimal(20,2) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `tax_total` decimal(20,2) NOT NULL,
  `line_total` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseingredientreturn_tbl`
--

CREATE TABLE `purchaseingredientreturn_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `purchaseingredientreturn_id` varchar(250) DEFAULT NULL,
  `purchaseingredientreturn_date` date DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `invoice_barcode` varchar(2000) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `vendor_id` varchar(250) DEFAULT NULL,
  `vendor_name` varchar(250) DEFAULT NULL,
  `financial_year` varchar(250) DEFAULT NULL,
  `total_lineitems` int(100) DEFAULT NULL,
  `total_qty` int(100) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `total_linediscount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `flatrate_discount` decimal(20,2) DEFAULT NULL,
  `percentage_discount` decimal(20,2) DEFAULT NULL,
  `total_overalldiscount` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `balance_amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseingredient_tbl`
--

CREATE TABLE `purchaseingredient_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `purchaseingredient_id` varchar(250) DEFAULT NULL,
  `purchaseingredient_date` date DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `invoice_barcode` varchar(2000) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `vendor_id` varchar(250) DEFAULT NULL,
  `vendor_name` varchar(250) DEFAULT NULL,
  `financial_year` varchar(250) DEFAULT NULL,
  `total_lineitems` int(100) DEFAULT NULL,
  `total_qty` int(100) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `total_linediscount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `flatrate_discount` decimal(20,2) DEFAULT NULL,
  `percentage_discount` decimal(20,2) DEFAULT NULL,
  `total_overalldiscount` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `balance_amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetails_tbl`
--

CREATE TABLE `purchaseorderdetails_tbl` (
  `id` int(100) NOT NULL,
  `purchaseorderdetails_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `purchaseorder_id` varchar(250) NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `po_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `line_discount_type` varchar(250) NOT NULL,
  `line_discount` decimal(20,2) NOT NULL,
  `line_discount_total` decimal(20,2) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `tax_total` decimal(20,2) NOT NULL,
  `line_total` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder_tbl`
--

CREATE TABLE `purchaseorder_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `purchaseorder_id` varchar(250) DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_barcode` varchar(2000) NOT NULL,
  `po_date` date DEFAULT NULL,
  `vendor_id` varchar(250) DEFAULT NULL,
  `vendor_name` varchar(250) DEFAULT NULL,
  `financial_year` varchar(250) DEFAULT NULL,
  `total_lineitems` int(100) DEFAULT NULL,
  `total_qty` int(100) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `total_linediscount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `flatrate_discount` decimal(20,2) DEFAULT NULL,
  `percentage_discount` decimal(20,2) DEFAULT NULL,
  `total_overalldiscount` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `balance_amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturndetails_tbl`
--

CREATE TABLE `purchasereturndetails_tbl` (
  `id` int(100) NOT NULL,
  `purchasereturndetails_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `purchasereturn_id` varchar(250) NOT NULL,
  `purchasereturn_date` date NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `po_date` date NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `invoice_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `line_discount_type` varchar(250) NOT NULL,
  `line_discount` decimal(20,2) NOT NULL,
  `line_discount_total` decimal(20,2) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `tax_total` decimal(20,2) NOT NULL,
  `line_total` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturn_tbl`
--

CREATE TABLE `purchasereturn_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `purchasereturn_id` varchar(250) DEFAULT NULL,
  `purchasereturn_date` date DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `invoice_barcode` varchar(2000) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `vendor_id` varchar(250) DEFAULT NULL,
  `vendor_name` varchar(250) DEFAULT NULL,
  `financial_year` varchar(250) DEFAULT NULL,
  `total_lineitems` int(100) DEFAULT NULL,
  `total_qty` int(100) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `total_linediscount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `flatrate_discount` decimal(20,2) DEFAULT NULL,
  `percentage_discount` decimal(20,2) DEFAULT NULL,
  `total_overalldiscount` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `balance_amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_tbl`
--

CREATE TABLE `purchase_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `purchase_id` varchar(250) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `invoice_barcode` varchar(2000) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `vendor_id` varchar(250) DEFAULT NULL,
  `vendor_name` varchar(250) DEFAULT NULL,
  `financial_year` varchar(250) DEFAULT NULL,
  `total_lineitems` int(100) DEFAULT NULL,
  `total_qty` int(100) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `total_linediscount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `flatrate_discount` decimal(20,2) DEFAULT NULL,
  `percentage_discount` decimal(20,2) DEFAULT NULL,
  `total_overalldiscount` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `balance_amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_tbl`
--

INSERT INTO `purchase_tbl` (`id`, `company_id`, `branch_id`, `purchase_id`, `purchase_date`, `po_no`, `po_date`, `invoice_no`, `invoice_barcode`, `invoice_date`, `vendor_id`, `vendor_name`, `financial_year`, `total_lineitems`, `total_qty`, `total_tax`, `total_linediscount`, `sub_total`, `flatrate_discount`, `percentage_discount`, `total_overalldiscount`, `grand_total`, `paid_amount`, `payment_id`, `balance_amount`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'bra-1', 'pur-1', '2019-05-10', '1', '2019-05-10', 'ZZ-1', '', '2019-05-10', 'ven-1', 'Zipzapshoppy', '2019-2020', 1, 10, '25.00', '0.00', '5250.00', '0.00', '0.00', '0.00', '5250.00', '0.00', 'pay-6', '5250.00', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(2, 'com-1', 'bra-1', 'pur-2', '2019-05-10', '2', '2019-05-10', '2', '', '2019-05-10', 'ven-1', 'Zipzapshoppy', '2019-2020', 1, 10, '65.00', '0.00', '7150.00', '0.00', '0.00', '0.00', '7150.00', '0.00', 'pay-7', '7150.00', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(3, 'com-1', 'bra-1', 'pur-3', '2019-05-10', '3', '2019-05-10', '3', '', '2019-05-10', 'ven-1', 'Zipzapshoppy', '2019-2020', 1, 20, '65.00', '0.00', '14300.00', '0.00', '0.00', '0.00', '14300.00', '0.00', 'pay-8', '14300.00', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `resignation_tbl`
--

CREATE TABLE `resignation_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `resignation_date` date NOT NULL,
  `last_working_date` date NOT NULL,
  `reason` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resignation_tbl`
--

INSERT INTO `resignation_tbl` (`id`, `autoid`, `employee`, `resignation_date`, `last_working_date`, `reason`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'RES-1', 'EMP00-1', '2023-08-04', '2023-08-31', 'test', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-04', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `runningorders_tbl`
--

CREATE TABLE `runningorders_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `mobile_number` int(250) NOT NULL,
  `order_type` varchar(250) NOT NULL,
  `layout_no` varchar(250) NOT NULL,
  `table_no` varchar(250) NOT NULL,
  `tag_no` varchar(250) NOT NULL,
  `order_no` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL,
  `financial_year` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(2000) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `avail_stock` int(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `discount` decimal(20,2) NOT NULL,
  `discounttotal` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `taxtotal` decimal(20,2) NOT NULL,
  `linetotal` decimal(20,2) NOT NULL,
  `status` varchar(250) NOT NULL,
  `order_status` varchar(250) NOT NULL,
  `section_status` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `runningorders_tbl`
--

INSERT INTO `runningorders_tbl` (`id`, `company_id`, `branch_id`, `customer_id`, `customer_name`, `mobile_number`, `order_type`, `layout_no`, `table_no`, `tag_no`, `order_no`, `order_date`, `financial_year`, `product_id`, `productcode`, `barcode`, `product_name`, `batch_no`, `mrp_price`, `expiry_date`, `avail_stock`, `qty`, `rate`, `unit`, `discount`, `discounttotal`, `tax`, `taxtotal`, `linetotal`, `status`, `order_status`, `section_status`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', '', '', 'santhosh', 2147483647, 'Dine In', 'lay-1,Layout1', 'tab-3,Table3', 'Tag1', 'ord-1', '2019-07-21 00:00:00', '2019-2020', 'pro-1', '1', '123', 'Product1', '1', '50.00', '2018-07-20', 10, 1, '45.00', 'KG', '0.00', '0.00', '5.00', '2.25', '47.25', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-21 00:00:00', 'AD01', ''),
(2, 'com-1', '', '', 'santhosh', 2147483647, 'Dine In', 'lay-1,Layout1', 'tab-3,Table3', 'Tag1', 'ord-1', '2019-07-21 00:00:00', '2019-2020', 'pro-2', '2', '1234', 'North Indian Meals', '', '0.00', '0000-00-00', 0, 2, '70.00', 'KG', '0.00', '0.00', '0.00', '0.00', '140.00', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-21 00:00:00', 'AD01', ''),
(3, 'com-1', '', '', 'Santhosh', 2147483647, 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-04-26 00:00:00', '2021-2022', 'pro-1', '1', '1234', 'Product1', '2', '1000.00', '2019-06-10', 20, 1, '650.00', 'KG', '0.00', '0.00', '5.00', '32.50', '682.50', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(4, 'com-1', '', '', 'Santhosh', 2147483647, 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-04-26 00:00:00', '2021-2022', 'pro-2', '2', 'abcd-1234-01', 'Product2', '', '0.00', '0000-00-00', 0, 1, '900.00', 'KG', '0.00', '0.00', '10.00', '90.00', '990.00', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(5, 'com-1', '', '', 'Santhosh', 2147483647, 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-04-26 00:00:00', '2021-2022', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(6, 'com-1', '', '', 'Santhosh', 2147483647, 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-04-26 00:00:00', '2021-2022', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `salarydetails_tbl`
--

CREATE TABLE `salarydetails_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `employee_id` varchar(250) NOT NULL,
  `employee_name` varchar(250) NOT NULL,
  `payroll_type` varchar(55) NOT NULL,
  `salary_structure` int(11) NOT NULL,
  `ctc` int(11) NOT NULL,
  `sort_order` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salarydetails_tbl`
--

INSERT INTO `salarydetails_tbl` (`id`, `autoid`, `employee_id`, `employee_name`, `payroll_type`, `salary_structure`, `ctc`, `sort_order`, `status`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'SAL-1', 'EMP00-1', 'Vaishu', 'Monthly Payslip', 50000, 50000, '', 0, '2023-07-27 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', ''),
(2, 'SAL-2', 'EMP00-2', 'Meena', 'Monthly Payslip', 50000, 50000, '', 0, '2023-08-05 00:00:00', '::1', 'Your browser: Google Chrome 109.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', ''),
(3, 'SAL-3', 'EMP00-1', 'Vaishu', 'Monthly Payslip', 10000, 10000, '', 0, '2023-08-08 00:00:00', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `salesdetails_tbl`
--

CREATE TABLE `salesdetails_tbl` (
  `id` int(100) NOT NULL,
  `salesdetails_id` varchar(500) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `sales_id` varchar(500) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `mobile_number` int(250) NOT NULL,
  `invoice_no` varchar(500) NOT NULL,
  `invoice_date` date NOT NULL,
  `order_type` varchar(250) NOT NULL,
  `layout_no` varchar(250) NOT NULL,
  `table_no` varchar(250) NOT NULL,
  `tag_no` varchar(250) NOT NULL,
  `order_no` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL,
  `financial_year` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(2000) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `avail_stock` int(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `discount` decimal(20,2) NOT NULL,
  `discounttotal` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `taxtotal` decimal(20,2) NOT NULL,
  `linetotal` decimal(20,2) NOT NULL,
  `status` varchar(250) NOT NULL,
  `order_status` varchar(250) NOT NULL,
  `section_status` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salesdetails_tbl`
--

INSERT INTO `salesdetails_tbl` (`id`, `salesdetails_id`, `company_id`, `branch_id`, `sales_id`, `customer_id`, `customer_name`, `mobile_number`, `invoice_no`, `invoice_date`, `order_type`, `layout_no`, `table_no`, `tag_no`, `order_no`, `order_date`, `financial_year`, `product_id`, `productcode`, `barcode`, `product_name`, `batch_no`, `mrp_price`, `expiry_date`, `avail_stock`, `qty`, `rate`, `unit`, `discount`, `discounttotal`, `tax`, `taxtotal`, `linetotal`, `status`, `order_status`, `section_status`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'pd-1', 'com-1', '', 'sal-1', 'cust-1', 'santhosh', 2147483647, 'inv-1', '2019-07-20', 'Dine In', 'lay-1,Layout1', 'tab-3,Table3', 'Tag1', 'ord-1', '2019-07-20 00:00:00', '2019-2020', 'pro-1', '', '', 'South Indian Meals', '', '0.00', '0000-00-00', 0, 3, '45.00', '', '10.00', '13.50', '5.00', '6.75', '128.25', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-20 00:00:00', 'AD01', ''),
(2, 'pd-2', 'com-1', '', 'sal-1', 'cust-1', 'santhosh', 2147483647, 'inv-1', '2019-07-20', 'Dine In', 'lay-1,Layout1', 'tab-3,Table3', 'Tag1', 'ord-1', '2019-07-20 00:00:00', '2019-2020', 'pro-2', '', '', 'North Indian Meals', '', '0.00', '0000-00-00', 0, 2, '70.00', '', '5.00', '7.00', '5.00', '7.00', '140.00', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-20 00:00:00', 'AD01', ''),
(3, 'pd-3', 'com-1', '', 'sal-2', 'cust-1', 'santhosh', 2147483647, 'inv-2', '2019-07-20', 'Dine In', 'lay-2,Layout2', 'tab-5,Table12', 'Tag1', 'ord-2', '2019-07-20 00:00:00', '2019-2020', 'pro-1', '', '', 'Product1', '2', '55.00', '2018-07-20', 10, 1, '50.00', '', '0.00', '0.00', '5.00', '2.50', '52.50', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-20 00:00:00', 'AD01', ''),
(4, 'pd-4', 'com-1', '', 'sal-2', 'cust-1', 'santhosh', 2147483647, 'inv-2', '2019-07-20', 'Dine In', 'lay-2,Layout2', 'tab-5,Table12', 'Tag1', 'ord-2', '2019-07-20 00:00:00', '2019-2020', 'pro-2', '', '', 'North Indian Meals', '', '0.00', '0000-00-00', 0, 2, '70.00', '', '5.00', '7.00', '0.00', '0.00', '133.00', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-20 00:00:00', 'AD01', ''),
(5, 'pd-5', 'com-1', '', 'sal-3', 'cus-3', '', 0, 'inv-3', '2021-02-17', 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-02-17 00:00:00', '2020-2021', 'pro-1', '1', '1234', 'Product1', '2', '1000.00', '2019-06-10', 20, 1, '650.00', 'KG', '0.00', '0.00', '5.00', '32.50', '682.50', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Mozilla Firefox 85.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64', '2021-02-17 00:00:00', 'AD01', ''),
(6, 'pd-6', 'com-1', '', 'sal-3', 'cus-3', '', 0, 'inv-3', '2021-02-17', 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-02-17 00:00:00', '2020-2021', 'pro-2', '2', 'abcd-1234-01', 'Product2', '', '0.00', '0000-00-00', 0, 1, '900.00', 'KG', '0.00', '0.00', '10.00', '90.00', '990.00', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Mozilla Firefox 85.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64', '2021-02-17 00:00:00', 'AD01', ''),
(7, 'pd-7', 'com-1', '', 'sal-3', 'cus-3', '', 0, 'inv-3', '2021-02-17', 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-02-17 00:00:00', '2020-2021', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Mozilla Firefox 85.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64', '2021-02-17 00:00:00', 'AD01', ''),
(8, 'pd-8', 'com-1', '', 'sal-3', 'cus-3', '', 0, 'inv-3', '2021-02-17', 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-02-17 00:00:00', '2020-2021', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '127.0.0.1', 'Your browser: Mozilla Firefox 85.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64', '2021-02-17 00:00:00', 'AD01', ''),
(9, 'pd-9', 'com-1', '', 'sal-4', 'cus-1', 'Santhosh', 2147483647, 'inv-4', '2021-04-26', 'Take Away', ',', ',', 'Tag1', 'ord-4', '2021-04-26 00:00:00', '2021-2022', 'pro-1', '1', '1234', 'Product1', '2', '1000.00', '2019-06-10', 20, 1, '650.00', 'KG', '0.00', '0.00', '5.00', '32.50', '682.50', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(10, 'pd-10', 'com-1', '', 'sal-4', 'cus-1', 'Santhosh', 2147483647, 'inv-4', '2021-04-26', 'Take Away', ',', ',', 'Tag1', 'ord-4', '2021-04-26 00:00:00', '2021-2022', 'pro-2', '2', 'abcd-1234-01', 'Product2', '', '0.00', '0000-00-00', 0, 1, '900.00', 'KG', '0.00', '0.00', '10.00', '90.00', '990.00', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(11, 'pd-11', 'com-1', '', 'sal-4', 'cus-1', 'Santhosh', 2147483647, 'inv-4', '2021-04-26', 'Take Away', ',', ',', 'Tag1', 'ord-4', '2021-04-26 00:00:00', '2021-2022', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(12, 'pd-12', 'com-1', '', 'sal-4', 'cus-1', 'Santhosh', 2147483647, 'inv-4', '2021-04-26', 'Take Away', ',', ',', 'Tag1', 'ord-4', '2021-04-26 00:00:00', '2021-2022', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(13, 'pd-13', 'com-1', '', 'sal-5', 'cus-1', 'Santhosh', 2147483647, 'inv-5', '2021-04-28', 'Take Away', ',', ',', 'Tag1', 'ord-5', '2021-04-28 00:00:00', '2021-2022', 'pro-1', '1', '1234', 'Product1', '2', '1000.00', '2019-06-10', 20, 1, '650.00', 'KG', '0.00', '0.00', '5.00', '32.50', '682.50', 'active', 'Pending', '', '', '27.5.179.10', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-28 00:00:00', 'AD01', ''),
(14, 'pd-14', 'com-1', '', 'sal-5', 'cus-1', 'Santhosh', 2147483647, 'inv-5', '2021-04-28', 'Take Away', ',', ',', 'Tag1', 'ord-5', '2021-04-28 00:00:00', '2021-2022', 'pro-2', '2', 'abcd-1234-01', 'Product2', '', '0.00', '0000-00-00', 0, 1, '900.00', 'KG', '0.00', '0.00', '10.00', '90.00', '990.00', 'active', 'Pending', '', '', '27.5.179.10', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-28 00:00:00', 'AD01', ''),
(15, 'pd-15', 'com-1', '', 'sal-5', 'cus-1', 'Santhosh', 2147483647, 'inv-5', '2021-04-28', 'Take Away', ',', ',', 'Tag1', 'ord-5', '2021-04-28 00:00:00', '2021-2022', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '27.5.179.10', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-28 00:00:00', 'AD01', ''),
(16, 'pd-16', 'com-1', '', 'sal-5', 'cus-1', 'Santhosh', 2147483647, 'inv-5', '2021-04-28', 'Take Away', ',', ',', 'Tag1', 'ord-5', '2021-04-28 00:00:00', '2021-2022', '', '', '', '', '', '0.00', '0000-00-00', 0, 0, '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', 'active', 'Pending', '', '', '27.5.179.10', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-28 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `salesreturndetails_tbl`
--

CREATE TABLE `salesreturndetails_tbl` (
  `id` int(100) NOT NULL,
  `salesreturndetails_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `salesreturn_id` varchar(250) NOT NULL,
  `salesreturn_date` date NOT NULL,
  `po_no` varchar(250) NOT NULL,
  `po_date` date NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `hsn_sac_code` varchar(2000) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `line_discount_type` varchar(250) NOT NULL,
  `line_discount` decimal(20,2) NOT NULL,
  `line_discount_total` decimal(20,2) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `tax_total` decimal(20,2) NOT NULL,
  `line_total` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesreturn_tbl`
--

CREATE TABLE `salesreturn_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) DEFAULT NULL,
  `branch_id` varchar(250) DEFAULT NULL,
  `salesreturn_id` varchar(250) DEFAULT NULL,
  `salesreturn_date` date DEFAULT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `invoice_barcode` varchar(2000) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `customer_id` varchar(250) DEFAULT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `financial_year` varchar(250) DEFAULT NULL,
  `total_lineitems` int(100) DEFAULT NULL,
  `total_qty` int(100) DEFAULT NULL,
  `total_tax` decimal(20,2) DEFAULT NULL,
  `total_linediscount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `flatrate_discount` decimal(20,2) DEFAULT NULL,
  `percentage_discount` decimal(20,2) DEFAULT NULL,
  `total_overalldiscount` decimal(20,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `balance_amount` decimal(20,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `approved_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_tbl`
--

CREATE TABLE `sales_tbl` (
  `id` int(100) NOT NULL,
  `sales_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `mobile_number` int(250) NOT NULL,
  `invoice_no` varchar(500) NOT NULL,
  `invoice_barcode` varchar(2000) NOT NULL,
  `invoice_date` date NOT NULL,
  `order_type` varchar(250) NOT NULL,
  `layout_no` varchar(250) NOT NULL,
  `table_no` varchar(250) NOT NULL,
  `tag_no` varchar(250) NOT NULL,
  `order_no` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL,
  `financial_year` varchar(250) NOT NULL,
  `total_lineitems` int(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `total_tax` decimal(20,2) NOT NULL,
  `total_linediscount` decimal(20,2) NOT NULL,
  `sub_total` decimal(20,2) NOT NULL,
  `flatrate_discount` decimal(20,2) NOT NULL,
  `percentage_discount` decimal(20,2) NOT NULL,
  `total_overalldiscount` decimal(20,2) NOT NULL,
  `grand_total` decimal(20,2) NOT NULL,
  `paid_amount` decimal(20,2) NOT NULL,
  `balance_amount` decimal(20,2) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `payment_id` varchar(500) NOT NULL,
  `order_status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales_tbl`
--

INSERT INTO `sales_tbl` (`id`, `sales_id`, `company_id`, `branch_id`, `customer_id`, `customer_name`, `mobile_number`, `invoice_no`, `invoice_barcode`, `invoice_date`, `order_type`, `layout_no`, `table_no`, `tag_no`, `order_no`, `order_date`, `financial_year`, `total_lineitems`, `total_qty`, `total_tax`, `total_linediscount`, `sub_total`, `flatrate_discount`, `percentage_discount`, `total_overalldiscount`, `grand_total`, `paid_amount`, `balance_amount`, `description`, `payment_id`, `order_status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'sal-1', 'com-1', '', 'cust-1', 'santhosh', 2147483647, 'inv-1', 'barcode/sales/sal-1_20-07-2019_28844.png', '2019-07-20', 'Dine In', 'lay-1,Layout1', 'tab-3,Table3', 'Tag1', 'ord-1', '2019-07-20 00:00:00', '2019-2020', 2, 5, '0.00', '0.00', '268.25', '0.00', '0.00', '0.00', '268.25', '268.25', '0.00', '', 'pay-1', 'Pending', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-20 00:00:00', 'AD01', ''),
(2, 'sal-2', 'com-1', '', 'cust-1', 'santhosh', 2147483647, 'inv-2', 'barcode/sales/sal-2_20-07-2019_27008.png', '2019-07-20', 'Dine In', 'lay-2,Layout2', 'tab-5,Table12', 'Tag1', 'ord-2', '2019-07-20 00:00:00', '2019-2020', 2, 3, '0.00', '0.00', '185.50', '0.00', '0.00', '0.00', '185.50', '185.50', '0.00', '', 'pay-1', 'Pending', '127.0.0.1', 'Your browser: Google Chrome 75.0.3770.142 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-07-20 00:00:00', 'AD01', ''),
(3, 'sal-3', 'com-1', '', 'cus-3', '', 0, 'inv-3', 'barcode/sales/sal-3_17-02-2021_2818.png', '2021-02-17', 'Dine In', 'lay-1,Layout1', 'tab-1,Table1', 'Tag1', 'ord-3', '2021-02-17 00:00:00', '2020-2021', 2, 2, '0.00', '0.00', '1672.50', '0.00', '0.00', '0.00', '1672.50', '0.00', '1672.50', '', 'pay-12', 'Pending', '127.0.0.1', 'Your browser: Mozilla Firefox 85.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64', '2021-02-17 00:00:00', 'AD01', ''),
(4, 'sal-4', 'com-1', '', 'cus-1', 'Santhosh', 2147483647, 'inv-4', 'barcode/sales/sal-4_26-04-2021_452008569.png', '2021-04-26', 'Take Away', ',', ',', 'Tag1', 'ord-4', '2021-04-26 00:00:00', '2021-2022', 2, 2, '0.00', '0.00', '1672.50', '0.00', '0.00', '0.00', '1672.50', '1673.00', '-0.50', '', 'pay-12', 'Pending', '27.5.234.150', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-26 00:00:00', 'AD01', ''),
(5, 'sal-5', 'com-1', '', 'cus-1', 'Santhosh', 2147483647, 'inv-5', 'barcode/sales/sal-5_28-04-2021_947085104.png', '2021-04-28', 'Take Away', ',', ',', 'Tag1', 'ord-5', '2021-04-28 00:00:00', '2021-2022', 2, 2, '0.00', '0.00', '1672.50', '0.00', '0.00', '0.00', '1672.50', '0.00', '1672.50', '', 'pay-13', 'Pending', '27.5.179.10', 'Your browser: Mozilla Firefox 88.0 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64; x64;', '2021-04-28 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `section_id` varchar(250) NOT NULL,
  `section_name` varchar(250) NOT NULL,
  `section_type` varchar(250) NOT NULL,
  `section_desc` varchar(2000) NOT NULL,
  `floor_id` varchar(250) NOT NULL,
  `layout_id` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `sub_category` varchar(250) NOT NULL,
  `printer_ip` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`id`, `company_id`, `branch_id`, `section_id`, `section_name`, `section_type`, `section_desc`, `floor_id`, `layout_id`, `category`, `sub_category`, `printer_ip`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'bra-1', 'sec-1', 'Kitchen1', 'kitchen', '        Test				', 'flo-1', 'lay-1', 'Grocery Category', 'test1', '192.168.1.32', 1, 'active', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-17 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings_tbl`
--

CREATE TABLE `settings_tbl` (
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_tbl`
--

CREATE TABLE `shift_tbl` (
  `id` int(100) NOT NULL,
  `shift_id` varchar(250) NOT NULL,
  `shift_date` date NOT NULL,
  `shift_intime` datetime NOT NULL,
  `shift_outtime` datetime NOT NULL,
  `employee_id` varchar(250) NOT NULL,
  `employee_name` varchar(250) NOT NULL,
  `opening_balance` decimal(20,2) NOT NULL,
  `total_sales` decimal(20,2) NOT NULL,
  `taxes` decimal(20,2) NOT NULL,
  `discount` decimal(20,2) NOT NULL,
  `rounded` decimal(20,2) NOT NULL,
  `net_sales` decimal(20,2) NOT NULL,
  `creditcard_sales` decimal(20,2) NOT NULL,
  `credit_sales` decimal(20,2) NOT NULL,
  `total_cash` decimal(20,2) NOT NULL,
  `cash_in` decimal(20,2) NOT NULL,
  `cash_out` decimal(20,2) NOT NULL,
  `cash_received` decimal(20,2) NOT NULL,
  `net_cash` decimal(20,2) NOT NULL,
  `cashin_draw` decimal(20,2) NOT NULL,
  `close_balance` decimal(20,2) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_tbl`
--

CREATE TABLE `sms_tbl` (
  `id` int(100) NOT NULL,
  `sms_id` varchar(250) NOT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `sms_msg` varchar(250) NOT NULL,
  `page` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state_tbl`
--

CREATE TABLE `state_tbl` (
  `id` int(100) NOT NULL,
  `country_id` varchar(250) NOT NULL,
  `state_id` varchar(250) NOT NULL,
  `state_code` varchar(250) NOT NULL,
  `state_name` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_tbl`
--

INSERT INTO `state_tbl` (`id`, `country_id`, `state_id`, `state_code`, `state_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'cou-1', 'sta-1', 'TN', 'Tamil Nadu', 'Tamil Nadu				', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-06 00:00:00', 'AD01', '', 'active', 1),
(2, 'cou-1', 'sta-2', 'KL', 'Kerala', 'Kerala', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-06 00:00:00', 'AD01', '', 'active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_tbl`
--

CREATE TABLE `status_tbl` (
  `id` int(100) NOT NULL,
  `status_id` varchar(250) NOT NULL,
  `status_name` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockingredient_tbl`
--

CREATE TABLE `stockingredient_tbl` (
  `id` int(100) NOT NULL,
  `stockingredient_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `ingredient_id` varchar(250) NOT NULL,
  `ingredientcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `ingredient_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `offer_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_tbl`
--

CREATE TABLE `stock_tbl` (
  `id` int(100) NOT NULL,
  `stock_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `productcode` varchar(250) NOT NULL,
  `barcode` varchar(250) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `expiry_date` date NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `mrp_price` decimal(20,2) NOT NULL,
  `cost_price` decimal(20,2) NOT NULL,
  `selling_price` decimal(20,2) NOT NULL,
  `offer_price` decimal(20,2) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stock_tbl`
--

INSERT INTO `stock_tbl` (`id`, `stock_id`, `company_id`, `branch_id`, `product_id`, `productcode`, `barcode`, `product_name`, `qty`, `batch_no`, `expiry_date`, `vendor_id`, `vendor_name`, `mrp_price`, `cost_price`, `selling_price`, `offer_price`, `wholesale_price`, `tax`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'sto-1', 'com-1', 'bra-1', 'pro-1', '1', '1234', 'Product1', '10.00', '1', '2019-05-10', 'ven-1', 'Zipzapshoppy', '800.00', '500.00', '650.00', '0.00', '600.00', '5.00', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(2, 'sto-2', 'com-1', 'bra-1', 'pro-2', '2', '12345', 'Product2', '10.00', '1', '2019-06-10', 'ven-1', 'Zipzapshoppy', '1000.00', '650.00', '900.00', '0.00', '850.00', '10.00', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', ''),
(3, 'sto-3', 'com-1', 'bra-1', 'pro-2', '2', '12345', 'Product2', '20.00', '2', '2019-06-10', 'ven-1', 'Zipzapshoppy', '1000.00', '650.00', '900.00', '0.00', '850.00', '10.00', '', '127.0.0.1', 'Your browser: Google Chrome 74.0.3729.131 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win6', '2019-05-10 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_tbl`
--

CREATE TABLE `subcategory_tbl` (
  `id` int(100) NOT NULL,
  `category_id` varchar(250) NOT NULL,
  `subcategory_id` varchar(250) NOT NULL,
  `subcategory_name` varchar(250) NOT NULL,
  `subcategory_desc` varchar(250) NOT NULL,
  `subcategory_img` varchar(2000) NOT NULL,
  `sort_order` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory_tbl`
--

INSERT INTO `subcategory_tbl` (`id`, `category_id`, `subcategory_id`, `subcategory_name`, `subcategory_desc`, `subcategory_img`, `sort_order`, `status`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(7, 'cat-1', 'sub-1', 'test1', 'desc', 'uploads/subcategory_img/logo_U-12.png', '1', 'active', '2023-07-10 00:00:00', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_tbl`
--

CREATE TABLE `table_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `floor_id` varchar(250) NOT NULL,
  `layout_id` varchar(250) NOT NULL,
  `table_id` varchar(250) NOT NULL,
  `table_no` varchar(250) NOT NULL,
  `table_name` varchar(250) NOT NULL,
  `table_desc` varchar(2000) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_tbl`
--

INSERT INTO `table_tbl` (`id`, `company_id`, `branch_id`, `floor_id`, `layout_id`, `table_id`, `table_no`, `table_name`, `table_desc`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'bra-1', 'flo-1', 'lay-1', 'tab-1', '1', 'Table1', 'Test', 1, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', ''),
(2, 'com-1', 'bra-1', 'flo-1', 'lay-1', 'tab-2', '2', 'Table2', 'Test', 2, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', ''),
(3, 'com-1', 'bra-1', 'flo-1', 'lay-1', 'tab-3', '3', 'Table3', 'Test				', 3, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', ''),
(4, 'com-1', 'bra-1', 'flo-2', 'lay-2', 'tab-4', '11', 'Table11', 'Test', 1, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', ''),
(5, 'com-1', 'bra-1', 'flo-2', 'lay-2', 'tab-5', '12', 'Table12', 'Test				', 12, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `tag_tbl`
--

CREATE TABLE `tag_tbl` (
  `id` int(100) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `layout_id` varchar(250) NOT NULL,
  `tag_id` varchar(250) NOT NULL,
  `tag_no` varchar(250) NOT NULL,
  `tag_name` varchar(250) NOT NULL,
  `tag_desc` varchar(2000) NOT NULL,
  `tag_status` varchar(250) DEFAULT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tag_tbl`
--

INSERT INTO `tag_tbl` (`id`, `company_id`, `branch_id`, `layout_id`, `tag_id`, `tag_no`, `tag_name`, `tag_desc`, `tag_status`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'com-1', 'bra-1', 'lay-1', 'tag-1', '1', 'Tag1', 'Test				', '', 1, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', ''),
(2, 'com-1', 'bra-1', 'lay-1', 'tag-2', '2', 'Tag2', 'Test				', '', 2, 'active', '127.0.0.1', 'Your browser: Google Chrome 67.0.3396.99 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2018-07-17 00:00:00', 'AD01', ''),
(3, 'com-1', 'bra-1', 'lay-1', 'tag-3', '123', 'test', 'test', '', 1, 'active', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-07-17 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tax_tbl`
--

CREATE TABLE `tax_tbl` (
  `id` int(100) NOT NULL,
  `tax_id` varchar(250) NOT NULL,
  `tax_name` varchar(250) NOT NULL,
  `tax_value` decimal(20,2) NOT NULL,
  `tax_desc` varchar(2000) NOT NULL,
  `country` varchar(2000) NOT NULL,
  `state` varchar(2000) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tax_tbl`
--

INSERT INTO `tax_tbl` (`id`, `tax_id`, `tax_name`, `tax_value`, `tax_desc`, `country`, `state`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'tax-1', 'GST @ 0%', '0.00', 'GST @ 0%', 'India', 'Tamil Nadu', 1, 'active', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', ''),
(2, 'tax-2', 'GST @ 5%', '5.00', 'GST @ 5%', 'India', 'Tamil Nadu', 2, 'active', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', ''),
(3, 'tax-3', 'GST @ 12%', '12.00', 'GST @ 12%', 'India', 'Tamil Nadu', 3, 'active', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', ''),
(4, 'tax-4', 'GST @ 18%', '18.00', 'GST @ 18%', 'India', 'Tamil Nadu', 4, 'active', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', ''),
(5, 'tax-5', 'GST @ 28%', '28.00', 'GST @ 28%', 'India', 'Tamil Nadu', 5, 'active', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `termination_tbl`
--

CREATE TABLE `termination_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(200) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `termination_type` varchar(200) NOT NULL,
  `notice_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termination_tbl`
--

INSERT INTO `termination_tbl` (`id`, `autoid`, `employee`, `termination_type`, `notice_date`, `termination_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'TM-1', 'EMP00-2', 'Voluntary Termination', '2023-08-03', '2023-08-03', 'test', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-04', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `termination_type_tbl`
--

CREATE TABLE `termination_type_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termination_type_tbl`
--

INSERT INTO `termination_type_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`) VALUES
(1, 'TER-1', 'Voluntary Termination', '2023-08-14', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_list_tbl`
--

CREATE TABLE `trainer_list_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(20) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `trainer_option` varchar(50) NOT NULL,
  `training_type` varchar(50) NOT NULL,
  `trainer` varchar(50) NOT NULL,
  `trainer_cost` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL,
  `performance` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer_list_tbl`
--

INSERT INTO `trainer_list_tbl` (`id`, `autoid`, `branch`, `trainer_option`, `training_type`, `trainer`, `trainer_cost`, `employee`, `start_date`, `end_date`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `performance`, `status`, `remarks`) VALUES
(1, 'TRL-1', 'bra-1', 'Internal', 'Job Training', 'TR-1', '12222', 'EMP00-1', '2023-07-08', '2023-07-15', 'test', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '2023-07-28', 'AD01', '', 'Average', 'Started', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_tbl`
--

CREATE TABLE `trainer_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `expertise` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer_tbl`
--

INSERT INTO `trainer_tbl` (`id`, `autoid`, `branch`, `first_name`, `last_name`, `contact`, `email`, `expertise`, `address`, `sort_order`, `status`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`) VALUES
(1, 'TR-1', 'bra-1', 'meena', 's', '123', 'meenapsk274@gmail.com', 'test1', 'trichy', 0, '', '::1', 'Your browser: Google Chrome 114.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '2023-07-28', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `training_type_tbl`
--

CREATE TABLE `training_type_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_type_tbl`
--

INSERT INTO `training_type_tbl` (`id`, `autoid`, `name`, `date`, `created_by`, `approved_by`) VALUES
(1, 'GO-1', 'Job Training', 2147483647, 'AD01', ''),
(2, 'GO-2', 'Workshop', 2147483647, 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_tbl`
--

CREATE TABLE `transfer_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `transfer_date` text NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer_tbl`
--

INSERT INTO `transfer_tbl` (`id`, `autoid`, `employee`, `branch`, `department`, `transfer_date`, `description`, `ip_address`, `browser`, `created_by`, `approved_by`, `created_at`) VALUES
(1, 'TR-1', 'EMP00-1', 'bra-2', 'dep-1', '2023-08-05', 'test desc1', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', 'AD01', '', '2023-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `trip_tbl`
--

CREATE TABLE `trip_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(50) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose_of_trip` varchar(500) NOT NULL,
  `country` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_tbl`
--

INSERT INTO `trip_tbl` (`id`, `autoid`, `employee`, `start_date`, `end_date`, `purpose_of_trip`, `country`, `reason`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(4, 'RES-1', 'EMP00-1', '2023-08-01', '2023-08-04', 'just talk', 'India', 'desc', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-04', 'AD01', ''),
(5, 'RES-5', 'EMP00-2', '2023-08-04', '2023-08-10', 'just talk', 'India', 'fsd', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-04', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `unit_tbl`
--

CREATE TABLE `unit_tbl` (
  `id` int(100) NOT NULL,
  `unit_id` varchar(250) NOT NULL,
  `unit_name` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `unit_tbl`
--

INSERT INTO `unit_tbl` (`id`, `unit_id`, `unit_name`, `description`, `ip_address`, `browser`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'uni-1', 'PCS', 'Measured in PCS', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', '', 'active', 1),
(2, 'uni-2', 'KG', 'Measured in Kilo Gram', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', '2019-04-08 00:00:00', 'AD01', '', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `upload_tbl`
--

CREATE TABLE `upload_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(500) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `sno` int(200) NOT NULL,
  `upload_type` varchar(500) NOT NULL,
  `upload_location` varchar(2000) NOT NULL,
  `page` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload_tbl`
--

INSERT INTO `upload_tbl` (`id`, `autoid`, `userid`, `sno`, `upload_type`, `upload_location`, `page`, `title`, `date`, `ip_address`) VALUES
(1, 'U-1', '', 0, 'png', 'uploads/logo/logo2_U-1.png', '', '', '2019-04-07 19:05:41', ''),
(2, 'U-2', '', 0, 'png', 'uploads/logo/logo2_U-2.png', '', '', '2019-04-07 20:04:22', ''),
(3, 'U-3', '', 0, 'jpg', 'uploads/category_img/grocery_U-3.jpg', '', '', '2019-04-08 10:28:38', ''),
(4, 'U-4', '', 0, 'jpg', 'uploads/subcategory_img/softdrinks_U-4.jpg', '', '', '2019-04-08 10:34:02', ''),
(5, 'U-5', '', 0, 'jpg', 'uploads/brand_logo/ITC_Brands_U-5.jpg', '', '', '2019-04-08 10:48:22', ''),
(6, 'U-6', '', 0, 'png', 'uploads/profile/logo2_U-6.png', '', '', '2019-04-08 14:29:39', ''),
(7, 'U-7', '', 0, 'png', 'uploads/profile/logo2_U-7.png', '', '', '2019-04-08 14:32:27', ''),
(8, 'U-8', '', 0, 'jpg', 'uploads/ingredient_img/IMG_20190515_170829_U-8.jpg', '', '', '2019-07-23 22:28:34', ''),
(9, 'U-9', '', 0, 'jpg', 'uploads/ingredient_img/IMG_20190515_170829_U-9.jpg', '', '', '2019-07-23 22:29:09', ''),
(10, 'U-10', '', 0, 'jpg', 'uploads/product_img/IMG_20190515_170829_U-10.jpg', '', '', '2019-07-23 22:41:45', ''),
(11, 'U-11', '', 0, 'jpg', 'uploads/product_img/IMG_20190515_170829_U-11.jpg', '', '', '2019-07-23 22:45:53', '');

-- --------------------------------------------------------

--
-- Table structure for table `userrights_tbl`
--

CREATE TABLE `userrights_tbl` (
  `id` int(100) NOT NULL,
  `userrights_id` varchar(200) NOT NULL,
  `desi_id` varchar(250) NOT NULL,
  `dept_id` varchar(250) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `parent` varchar(250) NOT NULL,
  `submenu` varchar(250) NOT NULL,
  `childmenu` varchar(250) NOT NULL,
  `read` int(10) NOT NULL,
  `write` int(10) NOT NULL,
  `menu_id` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sort_order` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userrights_tbl`
--

INSERT INTO `userrights_tbl` (`id`, `userrights_id`, `desi_id`, `dept_id`, `emp_id`, `parent`, `submenu`, `childmenu`, `read`, `write`, `menu_id`, `date`, `created_by`, `approved_by`, `status`, `sort_order`) VALUES
(1, 'use-1', 'des-1', 'dep-1', 'emp1', 'test', 'sdf', 'sdf', 0, 0, 'men-1', '2023-07-17 00:00:00', '', '', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(100) NOT NULL,
  `autoid` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `md5_id` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `alter_email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `user_level` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `users_ip` varchar(250) NOT NULL,
  `approved` varchar(250) NOT NULL,
  `activation_code` varchar(250) NOT NULL,
  `banned` varchar(250) NOT NULL,
  `ckey` varchar(250) NOT NULL,
  `ctime` varchar(250) NOT NULL,
  `last_access` datetime NOT NULL,
  `profile_pic` varchar(2000) NOT NULL DEFAULT 'dist/img/user.jpg',
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `autoid`, `company_id`, `md5_id`, `first_name`, `user_name`, `user_email`, `alter_email`, `mobile`, `user_level`, `pwd`, `date`, `users_ip`, `approved`, `activation_code`, `banned`, `ckey`, `ctime`, `last_access`, `profile_pic`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'AD01', 'com-1', '', 'Admin', 'admin', 'admin@ragadesigners.com', 'santhosh@ragadesigners.com', '9962856406', '5', '40894897e11c6dc664d0959083ead8ad356923acab2cdd0b3', '2018-07-18', '', '1', '1234', '0', '06ztkef', '1691994371', '0000-00-00 00:00:00', 'dist/img/user.jpg', '127.0.0.1', 'Chrome', 'AD01', 'AD01');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_tbl`
--

CREATE TABLE `vendor_tbl` (
  `id` int(100) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `alter_email_id` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(250) NOT NULL,
  `alter_number` varchar(250) NOT NULL,
  `experience` int(100) NOT NULL,
  `industry` varchar(250) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `profile` varchar(2000) NOT NULL,
  `balance` decimal(20,2) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vendor_tbl`
--

INSERT INTO `vendor_tbl` (`id`, `vendor_id`, `first_name`, `last_name`, `company_name`, `address`, `country`, `state`, `district`, `city`, `area`, `pincode`, `gender`, `dob`, `email_id`, `alter_email_id`, `mobile_number`, `alter_number`, `experience`, `industry`, `pan_no`, `gst_no`, `profile`, `balance`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'ven-1', 'Santhosh', 'V', 'Zipzapshoppy', 'Flat No 1231', 'India', 'Tamil Nadu', 'Thiruvallur', 'Chennai', 'Villivakkam', '600049', 'Male', '2019-04-19', 'zipzapshoppy@gmail.com', NULL, '9962856406', '', 0, '', '12345', '123456', '', '0.00', '2019-04-19 00:00:00', '', '', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_tbl`
--

CREATE TABLE `warehouse_tbl` (
  `id` int(100) NOT NULL,
  `warehouse_id` varchar(250) NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `warehouse_name` varchar(250) NOT NULL,
  `warehouse_type` varchar(250) NOT NULL,
  `warehouse_address` varchar(500) NOT NULL,
  `warehouse_country` varchar(250) NOT NULL,
  `warehouse_state` varchar(250) NOT NULL,
  `warehouse_district` varchar(250) NOT NULL,
  `warehouse_city` varchar(250) NOT NULL,
  `warehouse_area` varchar(250) NOT NULL,
  `warehouse_pincode` varchar(250) NOT NULL,
  `reg_type` varchar(250) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `warehouse_pan_no` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `warehouse_email_id` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `logo` varchar(2000) NOT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `approved_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `warehouse_tbl`
--

INSERT INTO `warehouse_tbl` (`id`, `warehouse_id`, `company_id`, `branch_id`, `warehouse_name`, `warehouse_type`, `warehouse_address`, `warehouse_country`, `warehouse_state`, `warehouse_district`, `warehouse_city`, `warehouse_area`, `warehouse_pincode`, `reg_type`, `reg_date`, `reg_no`, `warehouse_pan_no`, `gst_no`, `warehouse_email_id`, `phone_number`, `logo`, `date`, `ip_address`, `browser`, `created_by`, `approved_by`) VALUES
(1, 'war-1', 'com-1', 'bra-1', 'Warehouse', 'company', 'Test				', 'India', 'Tamil Nadu', 'Thiruvallur', 'Chennai', 'Villivakkam', '600049', 'msme', '2019-04-07', '1234', '12345', '1234', 'warehouse@gmail.com', '123456789', 'uploads/logo/logo2_U-2.png', '2019-04-07 00:00:00', '127.0.0.1', 'Your browser: Google Chrome 73.0.3683.86 on windows reports: <br >Mozilla/5.0 (Windows NT 6.1; Win64', 'AD01', '');

-- --------------------------------------------------------

--
-- Table structure for table `warning_tbl`
--

CREATE TABLE `warning_tbl` (
  `id` int(11) NOT NULL,
  `autoid` varchar(200) NOT NULL,
  `warning_by` varchar(200) NOT NULL,
  `warning_to` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `warning_date` date NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warning_tbl`
--

INSERT INTO `warning_tbl` (`id`, `autoid`, `warning_by`, `warning_to`, `subject`, `warning_date`, `description`, `ip_address`, `browser`, `created_at`, `created_by`, `approved_by`) VALUES
(1, 'RES-1', 'EMP00-1', 'EMP00-2', 'Attendance and punctuality issues', '2023-08-03', 'test', '::1', 'Your browser: Google Chrome 115.0.0.0 on windows reports: <br >Mozilla/5.0 (Windows NT 10.0; Win64; ', '2023-08-04', 'AD01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountcategory_tbl`
--
ALTER TABLE `accountcategory_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accountcategory_id` (`accountcategory_id`);

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `advance_tbl`
--
ALTER TABLE `advance_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advance_id` (`advance_id`);

--
-- Indexes for table `allowance`
--
ALTER TABLE `allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowance_option_tbl`
--
ALTER TABLE `allowance_option_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `appraisal`
--
ALTER TABLE `appraisal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `award_tbl`
--
ALTER TABLE `award_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `award_type_tbl`
--
ALTER TABLE `award_type_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `bankdeposit_tbl`
--
ALTER TABLE `bankdeposit_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bankdeposite_id` (`bankdeposite_id`);

--
-- Indexes for table `bank_tbl`
--
ALTER TABLE `bank_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bank_id` (`bank_id`);

--
-- Indexes for table `barcode_tbl`
--
ALTER TABLE `barcode_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_id` (`branch_id`);

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `cheque_tbl`
--
ALTER TABLE `cheque_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `city_tbl`
--
ALTER TABLE `city_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_id` (`city_id`),
  ADD UNIQUE KEY `city_code` (`city_code`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_id` (`company_id`);

--
-- Indexes for table `competencies_tbl`
--
ALTER TABLE `competencies_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `complain_tbl`
--
ALTER TABLE `complain_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_tbl`
--
ALTER TABLE `country_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_id` (`country_id`),
  ADD UNIQUE KEY `country_code` (`country_code`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Indexes for table `coupon_tbl`
--
ALTER TABLE `coupon_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_id` (`coupon_id`),
  ADD UNIQUE KEY `coupon_name` (`coupon_name`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `currency_tbl`
--
ALTER TABLE `currency_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_id` (`currency_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `damagedetails_tbl`
--
ALTER TABLE `damagedetails_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `damagedetails_id` (`damagedetails_id`);

--
-- Indexes for table `damage_tbl`
--
ALTER TABLE `damage_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `damage_id` (`damage_id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_option_tbl`
--
ALTER TABLE `deduction_option_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverypartner_tbl`
--
ALTER TABLE `deliverypartner_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auto_id` (`auto_id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_id` (`department_id`);

--
-- Indexes for table `designation_tbl`
--
ALTER TABLE `designation_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation_id` (`designation_id`);

--
-- Indexes for table `district_tbl`
--
ALTER TABLE `district_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district_id` (`district_id`),
  ADD UNIQUE KEY `district_code` (`district_code`);

--
-- Indexes for table `document_tbl`
--
ALTER TABLE `document_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `document_type_tbl`
--
ALTER TABLE `document_type_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `email_tbl`
--
ALTER TABLE `email_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auto_id` (`auto_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_asset_tbl`
--
ALTER TABLE `emp_asset_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `floor_tbl`
--
ALTER TABLE `floor_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `floor_id` (`floor_id`),
  ADD UNIQUE KEY `floor_name` (`floor_name`);

--
-- Indexes for table `goal_tracking`
--
ALTER TABLE `goal_tracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `goal_type_tbl`
--
ALTER TABLE `goal_type_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday_tbl`
--
ALTER TABLE `holiday_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `indicator`
--
ALTER TABLE `indicator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `industry_tbl`
--
ALTER TABLE `industry_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_tbl`
--
ALTER TABLE `ingredient_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `job_stage`
--
ALTER TABLE `job_stage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `leave_type_tbl`
--
ALTER TABLE `leave_type_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_option_tbl`
--
ALTER TABLE `loan_option_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_tbl`
--
ALTER TABLE `meeting_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_tbl`
--
ALTER TABLE `menu_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_payment`
--
ALTER TABLE `other_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslip_tbl`
--
ALTER TABLE `payslip_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslip_type_tbl`
--
ALTER TABLE `payslip_type_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `performance_type_tbl`
--
ALTER TABLE `performance_type_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `pincode_tbl`
--
ALTER TABLE `pincode_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_tbl`
--
ALTER TABLE `policy_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `productingredient_tbl`
--
ALTER TABLE `productingredient_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_tbl`
--
ALTER TABLE `promotion_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `purchasedetails_tbl`
--
ALTER TABLE `purchasedetails_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseingredientdetails_tbl`
--
ALTER TABLE `purchaseingredientdetails_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseingredientreturndetails_tbl`
--
ALTER TABLE `purchaseingredientreturndetails_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseingredientreturn_tbl`
--
ALTER TABLE `purchaseingredientreturn_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseingredient_tbl`
--
ALTER TABLE `purchaseingredient_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseorderdetails_tbl`
--
ALTER TABLE `purchaseorderdetails_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseorder_tbl`
--
ALTER TABLE `purchaseorder_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasereturndetails_tbl`
--
ALTER TABLE `purchasereturndetails_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasereturn_tbl`
--
ALTER TABLE `purchasereturn_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_tbl`
--
ALTER TABLE `purchase_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resignation_tbl`
--
ALTER TABLE `resignation_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salarydetails_tbl`
--
ALTER TABLE `salarydetails_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_tbl`
--
ALTER TABLE `sms_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_tbl`
--
ALTER TABLE `state_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tbl`
--
ALTER TABLE `status_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_tbl`
--
ALTER TABLE `stock_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory_tbl`
--
ALTER TABLE `subcategory_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_tbl`
--
ALTER TABLE `table_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_tbl`
--
ALTER TABLE `tag_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_tbl`
--
ALTER TABLE `tax_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termination_tbl`
--
ALTER TABLE `termination_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `termination_type_tbl`
--
ALTER TABLE `termination_type_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `trainer_list_tbl`
--
ALTER TABLE `trainer_list_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `trainer_tbl`
--
ALTER TABLE `trainer_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `training_type_tbl`
--
ALTER TABLE `training_type_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- Indexes for table `transfer_tbl`
--
ALTER TABLE `transfer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_tbl`
--
ALTER TABLE `trip_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrights_tbl`
--
ALTER TABLE `userrights_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_tbl`
--
ALTER TABLE `warehouse_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning_tbl`
--
ALTER TABLE `warning_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoid` (`autoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountcategory_tbl`
--
ALTER TABLE `accountcategory_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `allowance_option_tbl`
--
ALTER TABLE `allowance_option_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appraisal`
--
ALTER TABLE `appraisal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `award_tbl`
--
ALTER TABLE `award_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `award_type_tbl`
--
ALTER TABLE `award_type_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_tbl`
--
ALTER TABLE `bank_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `competencies_tbl`
--
ALTER TABLE `competencies_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complain_tbl`
--
ALTER TABLE `complain_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_tbl`
--
ALTER TABLE `country_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency_tbl`
--
ALTER TABLE `currency_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deduction_option_tbl`
--
ALTER TABLE `deduction_option_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliverypartner_tbl`
--
ALTER TABLE `deliverypartner_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designation_tbl`
--
ALTER TABLE `designation_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `district_tbl`
--
ALTER TABLE `district_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_tbl`
--
ALTER TABLE `document_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document_type_tbl`
--
ALTER TABLE `document_type_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_asset_tbl`
--
ALTER TABLE `emp_asset_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `floor_tbl`
--
ALTER TABLE `floor_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goal_tracking`
--
ALTER TABLE `goal_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goal_type_tbl`
--
ALTER TABLE `goal_type_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holiday_tbl`
--
ALTER TABLE `holiday_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industry_tbl`
--
ALTER TABLE `industry_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ingredient_tbl`
--
ALTER TABLE `ingredient_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_stage`
--
ALTER TABLE `job_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_type_tbl`
--
ALTER TABLE `leave_type_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_option_tbl`
--
ALTER TABLE `loan_option_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meeting_tbl`
--
ALTER TABLE `meeting_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_tbl`
--
ALTER TABLE `menu_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `other_payment`
--
ALTER TABLE `other_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payslip_tbl`
--
ALTER TABLE `payslip_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payslip_type_tbl`
--
ALTER TABLE `payslip_type_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `performance_type_tbl`
--
ALTER TABLE `performance_type_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pincode_tbl`
--
ALTER TABLE `pincode_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `policy_tbl`
--
ALTER TABLE `policy_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productingredient_tbl`
--
ALTER TABLE `productingredient_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotion_tbl`
--
ALTER TABLE `promotion_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchasedetails_tbl`
--
ALTER TABLE `purchasedetails_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchaseingredientdetails_tbl`
--
ALTER TABLE `purchaseingredientdetails_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseingredientreturndetails_tbl`
--
ALTER TABLE `purchaseingredientreturndetails_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseingredientreturn_tbl`
--
ALTER TABLE `purchaseingredientreturn_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseingredient_tbl`
--
ALTER TABLE `purchaseingredient_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorderdetails_tbl`
--
ALTER TABLE `purchaseorderdetails_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorder_tbl`
--
ALTER TABLE `purchaseorder_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasereturndetails_tbl`
--
ALTER TABLE `purchasereturndetails_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasereturn_tbl`
--
ALTER TABLE `purchasereturn_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_tbl`
--
ALTER TABLE `purchase_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resignation_tbl`
--
ALTER TABLE `resignation_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salarydetails_tbl`
--
ALTER TABLE `salarydetails_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sms_tbl`
--
ALTER TABLE `sms_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_tbl`
--
ALTER TABLE `state_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_tbl`
--
ALTER TABLE `status_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_tbl`
--
ALTER TABLE `stock_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory_tbl`
--
ALTER TABLE `subcategory_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_tbl`
--
ALTER TABLE `table_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag_tbl`
--
ALTER TABLE `tag_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tax_tbl`
--
ALTER TABLE `tax_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `termination_tbl`
--
ALTER TABLE `termination_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `termination_type_tbl`
--
ALTER TABLE `termination_type_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainer_list_tbl`
--
ALTER TABLE `trainer_list_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainer_tbl`
--
ALTER TABLE `trainer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_type_tbl`
--
ALTER TABLE `training_type_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transfer_tbl`
--
ALTER TABLE `transfer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip_tbl`
--
ALTER TABLE `trip_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userrights_tbl`
--
ALTER TABLE `userrights_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse_tbl`
--
ALTER TABLE `warehouse_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warning_tbl`
--
ALTER TABLE `warning_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
