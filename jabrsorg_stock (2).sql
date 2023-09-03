-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 06:15 PM
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
-- Database: `jabrsorg_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_num` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_num`, `category_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 10, 'مباني	', 'salah', NULL, '2021-11-22 04:49:42', NULL),
(20, 20, 'أثاث ومفروشات	', 'salah', NULL, '2021-11-22 04:48:20', NULL),
(30, 30, 'أجهزة كهربائية	', 'salah', NULL, '2021-11-22 04:49:27', NULL),
(40, 40, 'أجهزة الكترونية	', 'salah', NULL, '2021-11-22 04:50:02', NULL),
(50, 50, 'أجهزة تكييف	', 'salah', NULL, '2021-11-22 04:50:19', NULL),
(55, 55, 'ضيافة', 'salah', NULL, '2021-12-16 07:01:02', NULL),
(60, 60, 'محروقات', 'salah', NULL, '2021-12-16 02:15:45', NULL),
(65, 65, 'قرطاسية وادوات تنشيط', 'salah', NULL, '2022-01-17 03:52:52', NULL),
(70, 70, 'مستلزمات صحية و نظافة ', 'salah', NULL, '2021-12-16 06:46:32', NULL),
(75, 75, 'مساعدات عينية', 'salah', NULL, '2022-02-06 04:24:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custodies`
--

CREATE TABLE `custodies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `sub_department_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `custody_num` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custody_products`
--

CREATE TABLE `custody_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custody_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_num` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_num`, `department_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'الحاسوب', NULL, NULL, '2023-05-23 11:03:23', '2023-05-23 11:03:23'),
(2, 2, 'مدرسة الصم', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(3, 3, 'السمعيات', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(4, 4, 'النطق', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(5, 5, 'المحاسبة', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(6, 6, 'مركز تعزيز القدرات', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(7, 7, 'ادارة الجمعية', 'salah', NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_num` int(11) NOT NULL,
  `sub_department_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `employee_num`, `sub_department_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'مشرفة المدرسة نسرين أبو غالي', 10, 2, 'salah', '0000-00-00 00:00:00', NULL),
(2, 'هنادي الكسيح ', 11, 2, 'salah', '0000-00-00 00:00:00', NULL),
(3, 'هبة زقوت ', 12, 2, 'salah', '0000-00-00 00:00:00', NULL),
(4, 'نهيل أبو زينة ', 13, 2, 'salah', '0000-00-00 00:00:00', NULL),
(5, 'نائل تمراز ', 14, 2, 'salah', '0000-00-00 00:00:00', NULL),
(6, 'ميرفت أبو منصور ', 15, 2, 'salah', '0000-00-00 00:00:00', NULL),
(7, 'ليلى نصر ', 16, 2, 'salah', '0000-00-00 00:00:00', NULL),
(8, 'كوثر أبو جبل', 17, 2, 'salah', '0000-00-00 00:00:00', NULL),
(9, 'فدوى حجازي ', 18, 2, 'salah', '0000-00-00 00:00:00', NULL),
(10, 'خديجة النجار ', 19, 2, 'salah', '0000-00-00 00:00:00', NULL),
(11, 'تهاني المقادمة ', 20, 2, 'salah', '0000-00-00 00:00:00', NULL),
(12, 'ألفت الزويدي ', 21, 2, 'salah', '0000-00-00 00:00:00', NULL),
(13, 'إيمان تمراز ', 22, 2, 'salah', '0000-00-00 00:00:00', NULL),
(14, 'إيمان أبو حسنة', 23, 2, 'salah', '0000-00-00 00:00:00', NULL),
(15, 'إيمان الصباغ ', 24, 2, 'salah', '0000-00-00 00:00:00', NULL),
(16, 'جهاد عزام', 25, 2, 'salah', '0000-00-00 00:00:00', NULL),
(17, 'شهرزاد المصري', 26, 2, 'salah', '0000-00-00 00:00:00', NULL),
(18, 'صابر طشطاش', 9, 1, 'salah', '0000-00-00 00:00:00', NULL),
(19, 'يوسف الشامي', 50, 6, 'salah', '0000-00-00 00:00:00', NULL),
(20, 'سميرة التري', 8, 5, 'salah', '0000-00-00 00:00:00', NULL),
(21, 'المجتمع المحلي', 100, 7, 'salah', '0000-00-00 00:00:00', NULL),
(22, 'أمنة البيك', 7, 7, 'salah', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_date` date NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `cash_discount` double(8,2) DEFAULT NULL,
  `percentage_discount` double(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_exports`
--

CREATE TABLE `invoice_exports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(255) NOT NULL,
  `voucher_date` date NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `sub_department_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_export_products`
--

CREATE TABLE `invoice_export_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_export_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `item_num` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `open_balance` int(11) NOT NULL,
  `low_limit` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `unit_id`, `item_num`, `item_name`, `open_balance`, `low_limit`, `balance`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 20, 4, 2001001, 'طاولة اجتماعات6 قطع لون بني فاتح على شكل بيضاوي , ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', '2023-05-23 12:40:04'),
(2, 20, 4, 2001002, 'طاولة بيضاوية  لون اخضر مقاس 75سم*170سم', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(3, 20, 4, 2001003, 'طاولة تلفزيون زجاج اسود', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(4, 20, 4, 2001004, 'طاولة حديد لون أحمر حديد 120× 60', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(5, 20, 4, 2001005, 'طاولة حديد لون أصفر حديد 120× 60', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(6, 20, 4, 2001006, 'طاولة حديد لون سكني  120 ×60 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(7, 20, 4, 2001007, 'طاولة خشب لون أبيض 80×160سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(8, 20, 4, 2001008, 'طاولة خشب لون أخضر 110×55سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(9, 20, 4, 2001009, 'طاولة خشب لون أصفر 110×55سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(10, 20, 4, 2001010, 'طاولة خشب لون بني 120×60سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(11, 20, 4, 2001011, 'طاولة خشب لون بني 150×60سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(12, 20, 4, 2001012, 'طاولة خشب لون سكني  120 ×60 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(13, 20, 4, 2001013, 'طاولة خشب لون سماوي 110×55سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(14, 20, 4, 2001014, 'طاولة خشب لون سماوي 110×70سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(15, 20, 4, 2001015, 'طاولة خشب مستديرة لون أزرق', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(16, 20, 4, 2001016, 'طاولة طالب لون أخضر', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(17, 20, 4, 2001017, 'طاولة طالب لون أزرق سماوي ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(18, 20, 4, 2001018, 'طاولة طالب لون أصفر', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(19, 20, 4, 2001019, 'طاولة طالب لون سكني', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(20, 20, 4, 2001020, 'طاولة طالب لون سماوي', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(21, 20, 4, 2001021, 'طاولة كمبيوتر لون أخضر متر × 60 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(22, 20, 4, 2001022, 'طاولة كمبيوتر لون بني ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(23, 20, 4, 2001023, 'طاولة مستديرة لون بني  خشب ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(24, 20, 4, 2001024, 'طاولة مستديرة لون موف ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(25, 20, 4, 2003001, 'كرسي  بلاستيك أزرق سماوي  فاتح', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(26, 20, 4, 2003002, 'كرسي  بلاستيك أزرق سماوي غامق ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(27, 20, 4, 2003003, 'كرسي  ديقل لون أخضر ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(28, 20, 4, 2003004, 'كرسي  ديقل لون أزرق ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(29, 20, 4, 2003005, 'كرسي  ديقل لون رمادي ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(30, 20, 4, 2003006, 'كرسي  ديقل لون سكني ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(31, 20, 4, 2003007, 'كرسي انتظار حديد مزوج ثابت لون اخضر', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(32, 20, 4, 2003008, 'كرسي بلاستيك بجوانب لون أبيض', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(33, 20, 4, 2003009, 'كرسي بلاستيك بجوانب لون أزرق', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(34, 20, 4, 2003010, 'كرسي بلاستيك بدون جوانب لون أحمر توتي', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(35, 20, 4, 2003011, 'كرسي بلاستيك بدون جوانب لون بني', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(36, 20, 4, 2003012, 'كرسي مكتب جلد لون أسود', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(37, 20, 4, 2003013, 'كرسي مكتب جلد لون بني', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(38, 20, 4, 2003014, 'كرسي مكتب جلد لون زهري', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(39, 20, 4, 2003015, 'كرسي مكتب قماش لون أخضر', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(40, 20, 4, 2003017, 'كرسي مكتب متحرك جلد لون أسود ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(41, 20, 4, 2003018, 'كرسي مكتب متحرك قماش لون أخضر ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(43, 20, 4, 2004001, 'خزانة  صف لون بني ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(44, 20, 4, 2004002, 'خزانة بأدراج ملونة ملونة 12 درج ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(45, 20, 4, 2004003, 'خزانة بدروج عدد 2 لون أخضر خشب ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', '2023-05-17 12:43:31'),
(46, 20, 4, 2004004, 'خزانة ثلاث طبقات 115×125سم', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(47, 20, 4, 2004005, 'خزانة خشب لون بني ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(48, 20, 4, 2004006, 'خزانة خشب لون بني 79سم × 153سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(49, 20, 4, 2004007, 'خزانة صف ثلاث طبقات وأربعة دروج', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(50, 20, 4, 2004008, 'خزانة لحفظ السماعات لون بني ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(51, 20, 4, 2004009, 'خزانة لون بني 2 ضلفة', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(52, 20, 4, 2004010, 'خزانة لون بني بلوح زجاج 158× 2 متر ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(53, 20, 4, 2004011, 'خزانة لون بني عدد 2  خشب 4 طبقات 152سم ×153سم', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(54, 20, 4, 2004012, 'خزانة لون بني عدد 2  خشب 4 طبقات 74× 78سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(55, 20, 4, 2004013, 'خزانة معلمين 12 ظلفة مقاس 30سم*40سملون ابيض', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(56, 20, 4, 2004014, 'خزانة ملفات ضلفتين و6طبقات مقاس 160سم 2 لون بني فا', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(57, 20, 4, 2004015, 'خزانة ملفات طبقة لون أبيض مقاس 70 × 80 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(58, 20, 4, 2004016, 'خزانة ملفات لون أبيض خشب عدد 1 ، 5 طبقات مقاس 160 ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(59, 20, 4, 2004017, 'خزانة ملفات ملونة 2 متر و20 سم × 197سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(60, 20, 4, 2004018, 'درج ملفات 2 دروج', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(61, 20, 4, 2004019, 'درج ملفات 4 دروج', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(62, 20, 4, 2006001, 'سبورة لون أبيض 120 × 100 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(63, 20, 4, 2006002, 'سبورة لون أبيض 120 × 160 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(64, 20, 4, 2006003, 'سبورة لون أبيض 120 × 240 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(65, 20, 4, 2006004, 'سبورة لون أبيض 120 × 80 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(66, 20, 4, 2006005, 'سبورة لون أبيض 140 × 100 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(67, 20, 4, 2006006, 'سبورة لون أبيض 180 × 80 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(68, 20, 4, 2006007, 'سبورة لون أخضر 120 × 220 سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(69, 20, 4, 2007001, 'لوحة اعلانات لون بنى مقاس 160×100سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(70, 20, 4, 2007002, 'لوحة إعلانات لون بني 120×80سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(71, 20, 4, 2007003, 'لوحة إعلانات لون بني 70×80سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(72, 20, 4, 2007004, 'لوحة إعلانات لون بني مقاس 160×90سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(73, 20, 4, 2007005, 'لوحة إعلانات لون بني مقاس 180×80سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(74, 20, 4, 2009001, 'ستاير قماش 4 قطع لون أزرق ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(75, 20, 4, 2009002, 'ستاير قماش قطعتين لون أزرق ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(76, 20, 4, 2009003, 'ستاير قماش قطعتين لون بيج', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(77, 20, 4, 2009004, 'ستاير قماش قطعتين لون توتي ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(78, 20, 4, 2010001, 'سجادة لون أخضر 173×3 م ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(79, 20, 4, 2010002, 'سجادة لون أخضر 220×213', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(80, 20, 4, 2010003, 'سجادة لون أخضر 4 م و90سم × 3 متر و70سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(81, 20, 4, 2010004, 'سجادة لون أخضر إنجيل 4م ×370سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(82, 20, 4, 2010005, 'سجادة لون أخضر إنجيل 7 و30سم × 4متر', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(83, 20, 4, 2010006, 'سجادة لون بني', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(84, 20, 4, 2010007, 'سجادة لون بني 3×3', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(85, 20, 4, 2010008, 'سجادة لون بني 373×370سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(86, 20, 4, 2010009, 'سجادة لون بني 375×380سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(87, 20, 4, 2010010, 'سجادة لون بني 450×60سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(88, 20, 4, 2010011, 'سجادة لون بني مقاس 180×280سم ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(89, 20, 4, 2011001, 'ساعة حائط لون اخضر عليها شعار شركة جوال ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(90, 20, 4, 2011002, 'ساعة حائط لون أبيض', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(91, 20, 4, 2012001, 'صندوق اسعاف اولى لون ابيض', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(92, 20, 4, 2012002, 'صندوق إسعافات أولية ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(93, 20, 4, 2012003, 'صندوق شكاوى ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(94, 20, 4, 2013001, 'طفاية حريق لون أحمر', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(95, 20, 4, 2014001, 'حامل ملفات أسود ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(96, 20, 4, 2015001, 'رف معدني  خمس طبقات مقاس الرف 120سم*32سم لون ابيض', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(97, 30, 4, 3001001, 'مروحة سقف لون أبيض مع مفتاح', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(98, 30, 4, 3001002, 'مراوح مثبتة بالجدران ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(99, 30, 4, 3001003, 'مروحة على البطارية  Lord', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(100, 30, 4, 3003001, 'ثلاجة مياه ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(101, 30, 4, 3004001, 'ترنس كهرباء لون اخضر  KVA AUTOMATIC VOLTAGE 8', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(102, 40, 4, 4001001, 'ماكنة تصوير  AR_M276 /sharp ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(103, 40, 4, 4002001, 'لاب توب LaptopHP250', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(104, 40, 4, 4003001, 'جهاز كمبيوتر Intel® core™2 Duo CPU', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(105, 40, 4, 4003501, 'شاشة كمبيوتر LG FLATRON W1942SE', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(106, 40, 4, 4003502, 'شاشة كمبيوتر SCREEN BC17', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(107, 40, 4, 4003701, 'شاشة تلفزيون TOSHIBA GEGZA  42 INCH', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(108, 40, 4, 4003702, 'شاشة تلفزيون ', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(109, 40, 4, 4004001, 'طابعة HP1320LASER', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(110, 40, 4, 4004002, 'طابعة samsung scx - 4828 fn', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(111, 40, 4, 4005001, 'هب لللإنترنت 24port', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(112, 40, 4, 4009001, 'سماعات مكسر كبيرة لون أسود GiGAMAX', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(113, 40, 4, 4010001, 'تلفون Al Mohands', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(114, 40, 4, 4010501, 'جوال C1', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(115, 50, 4, 5001001, 'مكيف BELCORE CLASSIC  طن2', 0, 1, 0, 1, 'salah', NULL, '0000-00-00 00:00:00', NULL),
(116, 20, 4, 2003016, 'كرسي مكتب قماش لون بني', 0, 1, 0, 1, 'salah', NULL, '2021-11-28 07:03:00', NULL),
(117, 20, 4, 2003101, 'سكنبلة خشب لون بني فاتح مقاس 250سم ×40سم بارتفاع 3', 0, 1, 0, 1, 'salah', NULL, '2021-12-05 02:23:00', NULL),
(120, 60, 7, 6001001, 'سولار اسرائيلي', 960, 100, 810, 1, 'salah', NULL, '2021-01-01 03:15:00', NULL),
(121, 70, 1, 7001001, 'أستون1*10', 0, 1, 2, 1, 'salah', NULL, '2021-12-16 06:47:00', NULL),
(122, 70, 1, 7001005, 'ثلج سريع', 0, 1, 10, 1, 'salah', NULL, '2021-12-16 06:47:00', NULL),
(123, 70, 8, 7001010, 'جل معقم', 0, 1, 0, 1, 'salah', NULL, '2021-12-16 06:48:00', NULL),
(124, 70, 8, 7001015, 'ديتول', 0, 1, 1, 1, 'salah', NULL, '2021-12-16 06:48:00', NULL),
(125, 70, 8, 7001020, 'سائل يد', 0, 1, 1, 1, 'salah', NULL, '2021-12-16 06:49:00', NULL),
(126, 70, 8, 7001025, 'كحول 100مل', 0, 1, 2, 1, 'salah', NULL, '2021-12-16 06:49:00', NULL),
(127, 70, 8, 7001026, 'كحول 500مل', 0, 1, 2, 1, 'salah', NULL, '2021-12-16 06:50:00', NULL),
(128, 70, 1, 7001035, 'كريم جروح', 0, 1, 1, 1, 'salah', NULL, '2021-12-16 06:50:00', NULL),
(129, 70, 8, 7001040, 'مطهر جروح 100مل', 0, 1, 0, 1, 'salah', NULL, '2021-12-16 06:51:00', NULL),
(130, 70, 1, 7001050, 'ورق معطر', 100, 1, 98, 1, 'salah', NULL, '2021-12-16 06:52:00', NULL),
(131, 70, 11, 7002001, 'رباط ضاغط 4.5م*10سم', 0, 1, 10, 1, 'salah', NULL, '2021-12-16 06:53:00', NULL),
(132, 70, 11, 7002002, 'رباط ضاغط 4.5م*8سم', 0, 1, 10, 1, 'salah', NULL, '2021-12-16 06:54:00', NULL),
(133, 70, 11, 7002003, 'رباط ضاغط 4.5م*6سم', 0, 1, 5, 1, 'salah', NULL, '2021-12-16 06:54:00', NULL),
(134, 70, 1, 7002010, 'شاش رول', 0, 1, 4, 1, 'salah', NULL, '2021-12-16 06:55:00', NULL),
(135, 70, 6, 7002015, 'شاش عين', 0, 1, 12, 1, 'salah', NULL, '2021-12-16 06:55:00', NULL),
(136, 70, 1, 7002020, 'شاش معقم', 0, 1, 12, 1, 'salah', NULL, '2021-12-16 06:56:00', NULL),
(137, 70, 1, 7002030, 'قطن طبي', 0, 1, 3, 1, 'salah', NULL, '2021-12-16 06:56:00', NULL),
(138, 70, 1, 7002040, 'كمامات طبية', 0, 1, 99, 1, 'salah', NULL, '2021-12-16 06:58:00', NULL),
(139, 70, 1, 7002050, 'كونتات طبية', 0, 1, 1, 1, 'salah', NULL, '2021-12-16 06:58:00', NULL),
(140, 70, 11, 7002055, 'لاصق جروح', 0, 1, 2, 1, 'salah', NULL, '2021-12-16 06:58:00', NULL),
(141, 70, 11, 7002057, 'لاصق جروح بلاستر 1*100', 0, 1, 3, 1, 'salah', NULL, '2021-12-16 06:59:00', NULL),
(142, 70, 4, 7002060, 'مقص طبي', 0, 1, 3, 1, 'salah', NULL, '2021-12-16 06:59:00', NULL),
(143, 70, 4, 7003001, 'خرطوم محلول', 0, 1, 2, 1, 'salah', NULL, '2021-12-16 07:00:00', NULL),
(144, 55, 4, 5501001, 'عصير', 0, 0, 144, 1, 'salah', NULL, '2021-12-16 07:02:00', NULL),
(145, 55, 4, 5502001, 'كيك', 0, 0, 144, 1, 'salah', NULL, '2021-12-16 07:03:00', NULL),
(150, 70, 12, 7050101, 'اكياس بلاستك شنطة', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:40:00', NULL),
(151, 70, 2, 7050102, 'اكياس بلاستك كيلو', 0, 1, 6, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:40:00', NULL),
(152, 70, 11, 7050103, 'اكياس بلاستك لفة', 0, 1, 8, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:41:00', NULL),
(153, 70, 4, 7051001, 'بشكير حجم صغير', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:44:00', NULL),
(154, 70, 8, 7051501, 'ديتول لتر', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:44:00', NULL),
(155, 70, 8, 7052001, 'سائل جلي', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:46:00', NULL),
(156, 70, 6, 7052010, 'سفنج جلي', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:48:00', NULL),
(157, 70, 4, 7052011, 'ليفة ', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:48:00', NULL),
(158, 70, 8, 7052020, 'فلاش منظف حمامات ', 0, 1, 8, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:49:00', NULL),
(159, 70, 8, 7052021, 'كلور', 0, 1, 9, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:51:00', NULL),
(160, 70, 8, 7052022, 'كلور 4لتر', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:52:00', NULL),
(161, 70, 8, 7052040, 'معطر ارضيات أخضر', 0, 1, 8, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:53:00', NULL),
(162, 70, 8, 7052041, 'معطر اكسبرس وملمع بلاط', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:54:00', NULL),
(163, 70, 8, 7052042, 'معطر جو', 0, 0, 42, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 03:55:00', NULL),
(164, 70, 8, 7052050, 'معطر كرسي حمام', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 05:10:00', NULL),
(165, 70, 8, 7052060, 'ملمع زجاج', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-11 05:11:00', NULL),
(166, 70, 4, 7052065, 'مماسح ارضيات', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:01:00', NULL),
(167, 70, 1, 7052150, 'ورق توليت 1*32', 0, 1, 99, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:02:00', NULL),
(168, 70, 1, 7052160, 'ورق فاين مطبخ 1*2', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:02:00', NULL),
(169, 70, 1, 7052170, 'ورق فاين ناعم ', 0, 1, 8, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:03:00', NULL),
(170, 70, 1, 7052171, 'ورق فاين ناعم حجم صغير', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:03:00', NULL),
(171, 70, 8, 7052175, 'علبة فاين بلاستك', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:13:00', NULL),
(172, 70, 6, 7052501, 'صابو ن هاوي', 0, 4, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:32:00', NULL),
(173, 70, 6, 7052502, 'صابون ديتول', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:50:00', NULL),
(174, 70, 6, 7052503, 'صابون عادي', 0, 1, 92, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:50:00', NULL),
(175, 70, 4, 7053001, 'عصا مكنسة', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:51:00', NULL),
(176, 70, 4, 7053010, 'قشاطة عادية', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:52:00', NULL),
(177, 70, 4, 7053011, 'قشاطة مجلى', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:53:00', NULL),
(178, 70, 4, 7053020, 'مكنسة خشنة', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:53:00', NULL),
(179, 70, 4, 7053021, 'مكنسة موكيت', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:54:00', NULL),
(180, 70, 4, 7053022, 'مكنسة ناعمة', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:54:00', NULL),
(181, 70, 4, 7053101, 'مجرود حديد', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:54:00', NULL),
(182, 70, 4, 7053102, 'مجرود بلاستك', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:55:00', NULL),
(183, 70, 4, 7054001, 'لزيق فئران', 0, 1, 0, 1, 'Maher A. Ghonaim', NULL, '2022-01-12 04:55:00', NULL),
(184, 65, 4, 6527225, 'ورق شفافيات للكتب ', 0, 50, 200, 1, 'salah', NULL, '2022-01-17 03:54:00', NULL),
(185, 65, 4, 6523130, 'لاصق جلاتين كتب 5سم', 0, 0, 4, 1, 'salah', NULL, '2022-01-17 04:00:00', NULL),
(186, 65, 4, 6521130, 'قلم جاف ازرق', 0, 50, 145, 1, 'salah', NULL, '2022-01-17 04:01:00', NULL),
(187, 65, 12, 6527180, 'ورق تصوير ابيض 1*500 a4', 0, 5, 12, 1, 'salah', NULL, '2022-01-17 04:03:00', NULL),
(188, 65, 4, 6524730, 'ملف كلاسير حجم  كبير 5سم', 0, 10, 15, 1, 'salah', NULL, '2022-01-17 04:04:00', NULL),
(192, 65, 4, 6527130, 'ورق برستول ابيض ', 0, 10, 0, 1, 'salah', NULL, '2022-01-25 02:28:00', NULL),
(193, 65, 13, 6520250, 'فلين لميع ملون', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 02:43:00', NULL),
(194, 65, 2, 6512250, 'سيلكون اصابع', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 02:44:00', NULL),
(195, 65, 1, 6521200, 'قلم لوح الوان', 0, 0, 91, 1, 'salah', NULL, '2022-01-25 02:47:00', NULL),
(196, 65, 1, 6521180, 'قلم خط لباد', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 02:49:00', NULL),
(197, 65, 1, 6518100, 'عجينة لاصقة بلوتاك', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 02:51:00', NULL),
(198, 65, 1, 6502150, 'بلالين 1*100', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 02:55:00', NULL),
(199, 65, 4, 6520100, 'فلاش GB16 ', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 02:57:00', NULL),
(200, 65, 1, 6516350, 'طينة اشغال', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 02:58:00', NULL),
(201, 65, 10, 6526110, 'هدايا متنوعة نوته قلم راس قلب تفاحة', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 03:03:00', NULL),
(202, 65, 4, 6526115, 'هدايا مختلفة', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 03:04:00', NULL),
(203, 65, 4, 6526111, 'هدايا مختلفة اكثر من 5شيكل', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 03:06:00', NULL),
(204, 65, 4, 6514251, 'صور للتجميع بارز A4', 0, 0, 0, 1, 'salah', NULL, '2022-01-25 03:09:00', NULL),
(205, 65, 12, 6527190, 'ورق تصوير ملون 1*500 a4', 100, 0, 99, 1, 'salah', NULL, '2022-01-26 02:24:00', NULL),
(206, 65, 4, 6524520, 'مظاريف غير مروسة A5', 100, 50, 90, 1, 'salah', NULL, '2022-01-26 02:29:00', NULL),
(207, 65, 1, 6501201, 'الوان خشب كبير 1*12', 100, 10, 90, 1, 'salah', NULL, '2022-01-26 02:31:00', NULL),
(208, 65, 1, 6501200, 'الوان خشب صغير 1*6', 100, 10, 90, 1, 'salah', NULL, '2022-01-26 02:31:00', NULL),
(209, 65, 4, 6523165, 'لاصق كبير شفاف 5 سم', 100, 2, 96, 1, 'salah', NULL, '2022-01-26 02:39:00', NULL),
(210, 65, 1, 6521170, 'قلم رصاص 1*12', 100, 5, 97, 1, 'salah', NULL, '2022-01-26 02:42:00', NULL),
(211, 65, 4, 6524150, 'محاية رصاص', 200, 10, 174, 1, 'salah', NULL, '2022-01-26 02:44:00', NULL),
(212, 65, 1, 6508130, 'دبابيس كتب', 10, 1, 8, 1, 'salah', NULL, '2022-01-26 02:48:00', NULL),
(213, 65, 4, 6508280, 'دفتر رسم ', 100, 10, 75, 1, 'salah', NULL, '2022-01-26 02:49:00', NULL),
(214, 65, 1, 6501210, 'الوان شمع 1*12 كبير', 100, 10, 90, 1, 'salah', NULL, '2022-01-26 02:50:00', NULL),
(215, 65, 4, 6524750, 'ملف نايلون 1*100', 1000, 50, 895, 1, 'salah', NULL, '2022-01-26 02:52:00', NULL),
(216, 65, 4, 6503150, 'تيبكس قلم', 20, 1, 18, 1, 'salah', NULL, '2022-01-30 02:53:00', NULL),
(217, 65, 4, 6524310, 'مسطرة حجم 30سم', 100, 1, 99, 1, 'salah', NULL, '2022-01-30 02:54:00', NULL),
(218, 65, 1, 6508110, 'دبابيس حجم وسط', 100, 1, 98, 1, 'salah', NULL, '2022-01-30 02:55:00', NULL),
(219, 65, 1, 6524350, 'مشبك حديد كلبسات', 100, 1, 99, 1, 'salah', NULL, '2022-01-30 02:57:00', NULL),
(220, 65, 4, 6524770, 'ملقط حديد صغير', 100, 1, 88, 1, 'salah', NULL, '2022-01-30 02:58:00', NULL),
(221, 75, 8, 7501001, 'مساعدات عينية \" حليب سائل \"', 0, 0, 0, 1, 'salah', NULL, '2022-02-06 04:24:00', NULL),
(222, 55, 7, 550501, 'مياه صحية للشرب', 0, 0, 0, 1, 'salah', NULL, '2022-02-10 03:29:00', NULL),
(223, 65, 4, 6502210, 'بوستر مطبوع', 0, 0, 0, 1, 'salah', NULL, '2022-02-10 03:45:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_03_30_190338_create_units_table', 1),
(5, '2023_03_31_215951_create_categories_table', 1),
(6, '2023_04_01_095719_create_items_table', 1),
(7, '2023_04_01_121541_create_suppliers_table', 1),
(8, '2023_04_01_121557_create_stores_table', 1),
(9, '2023_04_05_180350_create_departments_table', 1),
(10, '2023_04_05_184953_create_sub_departments_table', 1),
(11, '2023_04_05_191100_create_invoices_table', 1),
(12, '2023_04_05_191151_create_invoice_products_table', 1),
(13, '2023_04_06_000000_create_users_table', 1),
(14, '2023_04_10_011957_create_custodies_table', 1),
(15, '2023_04_10_013339_create_custody_products_table', 1),
(16, '2023_04_14_175755_create_invoice_exports_table', 1),
(17, '2023_04_14_175814_create_invoice_export_products_table', 1),
(18, '2023_04_19_124456_create_permission_tables', 1),
(19, '2023_04_30_130409_create_notifications_table', 1),
(20, '2023_05_17_150904_create_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('4f47abd3-5617-43c7-8960-43976d59c9b0', 'App\\Notifications\\InvoiceNotification', 'App\\Models\\User', 1, '{\"invoice_id\":1,\"voucher_no\":\"111\",\"voucher_date\":\"2023-05-23\"}', NULL, '2023-05-23 11:24:03', '2023-05-23 11:24:03'),
('ee61b3bf-4ce7-49a1-b3c9-dbe60dd6099d', 'App\\Notifications\\InvoiceNotification', 'App\\Models\\User', 1, '{\"invoice_id\":2,\"voucher_no\":\"1\",\"voucher_date\":\"2023-05-23\"}', NULL, '2023-05-23 12:01:41', '2023-05-23 12:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'الوحدات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(2, 'عرض الوحدات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(3, 'تعديل الوحدات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(4, 'حذف الوحدات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(5, 'اضافة الوحدات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(6, 'العائلات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(7, 'عرض العائلات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(8, 'تعديل العائلات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(9, 'حذف العائلات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(10, 'اضافة العائلات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(11, 'الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(12, 'عرض الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(13, 'تعديل الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(14, 'حذف الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(15, 'اضافة الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(16, 'المخازن', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(17, 'عرض المخازن', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(18, 'تعديل المخازن', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(19, 'حذف المخازن', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(20, 'اضافة المخازن', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(21, 'الموردين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(22, 'عرض الموردين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(23, 'تعديل الموردين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(24, 'حذف الموردين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(25, 'اضافة الموردين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(26, 'وارد الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(27, 'عرض وارد الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(28, 'تعديل وارد الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(29, 'حذف وارد الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(30, 'اضافة وارد الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(31, 'صادر الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(32, 'عرض صادر الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(33, 'تعديل صادر الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(34, 'حذف صادر الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(35, 'اضافة صادر الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(36, 'العهد', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(37, 'عرض العهد', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(38, 'تعديل العهد', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(39, 'حذف العهد', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(40, 'اضافة العهد', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(41, 'الدائرة', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(42, 'عرض الدائرة', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(43, 'تعديل الدائرة', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(44, 'حذف الدائرة', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(45, 'اضافة الدائرة', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(46, 'القسم', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(47, 'عرض القسم', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(48, 'تعديل القسم', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(49, 'حذف القسم', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(50, 'اضافة القسم', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(51, 'المستخدمين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(52, 'عرض المستخدمين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(53, 'تعديل المستخدمين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(54, 'حذف المستخدمين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(55, 'اضافة المستخدمين', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(56, 'الصلاحيات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(57, 'عرض الصلاحيات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(58, 'تعديل الصلاحيات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(59, 'حذف الصلاحيات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(60, 'اضافة الصلاحيات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(61, 'الأدوار', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(62, 'عرض الأدوار', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(63, 'تعديل الأدوار', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(64, 'حذف الأدوار', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(65, 'اضافة الأدوار', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(66, 'التقارير', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(67, 'تقرير المجاميع', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(68, 'تقرير حركة الأصناف', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(69, 'تقرير الجرد', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(70, 'مدير النظام', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17'),
(71, 'الاعدادات', 'web', NULL, NULL, '2023-05-23 11:03:17', '2023-05-23 11:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'web', '2023-05-23 11:03:35', '2023-05-23 11:03:35'),
(2, 'admin', 'web', '2023-05-23 11:03:36', '2023-05-23 11:03:36'),
(3, 'super_user', 'web', '2023-05-23 13:13:13', '2023-05-23 13:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 2),
(24, 3),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(39, 2),
(39, 3),
(40, 1),
(40, 2),
(40, 3),
(41, 1),
(41, 2),
(41, 3),
(42, 1),
(42, 2),
(42, 3),
(43, 1),
(43, 2),
(43, 3),
(44, 1),
(44, 2),
(44, 3),
(45, 1),
(45, 2),
(45, 3),
(46, 1),
(46, 2),
(46, 3),
(47, 1),
(47, 2),
(47, 3),
(48, 1),
(48, 2),
(48, 3),
(49, 1),
(49, 2),
(49, 3),
(50, 1),
(50, 2),
(50, 3),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(66, 3),
(67, 1),
(67, 2),
(67, 3),
(68, 1),
(68, 2),
(68, 3),
(69, 1),
(69, 2),
(69, 3),
(70, 1),
(70, 2),
(71, 1),
(71, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_num` int(11) NOT NULL,
  `store_name` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_num`, `store_name`, `address`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'مخزن في مبنى المدرسة', 'جمعية جباليا مبنى المدرسة الطابق الأول', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(2, 2, 'مخزن بمدخل الجمعية', 'جمعية جباليا فوق غرفة الحارس', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(3, 6, 'مخزن التعزيز', 'مركز تعزيز القدرات صالة التعزيز', 'salah', NULL, '0000-00-00 00:00:00', NULL),
(4, 4, 'خزان السولار', 'جمعية جباليا ساحة الجمعية', 'salah', NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_departments`
--

CREATE TABLE `sub_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `sub_department_num` int(11) NOT NULL,
  `sub_department_name` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_departments`
--

INSERT INTO `sub_departments` (`id`, `department_id`, `sub_department_num`, `sub_department_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'البرمجة', NULL, NULL, '2023-05-23 11:03:29', '2023-05-23 11:03:29'),
(2, 2, 2, 'مدرسة الصم', 'salah', NULL, NULL, NULL),
(3, 3, 3, 'السمعيات', 'salah', NULL, NULL, NULL),
(4, 4, 4, 'النطق', 'salah', NULL, NULL, NULL),
(5, 5, 5, 'المحاسبة', 'salah', NULL, NULL, NULL),
(6, 6, 6, 'مركز تعزيز القدرات', 'salah', NULL, NULL, NULL),
(7, 7, 7, 'ادارة الجمعية', 'salah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_num` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `ipn` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_num`, `supplier_name`, `address`, `phone`, `ipn`, `logo`, `note`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'الاغاثة الاسلامية', '0', '01', '01', '', '', 'maher', NULL, '2023-05-15 09:55:13', '2023-05-15 10:03:41'),
(3, 2, 'USAID مؤسسة كير', '0', '02', '02', '', '', 'maher', NULL, '2023-05-15 09:56:03', '2023-05-15 10:03:49'),
(4, 3, 'MAP', '0', '03', '03', '', '', 'maher', NULL, '2023-05-15 09:56:24', '2023-05-15 10:04:11'),
(5, 4, 'شركة جوال', '0', '04', '04', '', '', 'maher', NULL, '2023-05-15 09:58:40', '2023-05-15 10:04:04'),
(6, 5, 'وكالة الغوث', '0', '05', '05', '', '', 'maher', NULL, '2023-05-15 09:59:52', '2023-05-15 10:03:57'),
(7, 6, 'شركة الند', '0', '06', '06', '', '', 'maher', NULL, '2023-05-15 10:00:35', '2023-05-15 10:00:35'),
(8, 7, 'شركة تيرنستون', '0', '07', '07', '', '', 'maher', NULL, '2023-05-15 10:01:11', '2023-05-15 10:01:11'),
(9, 8, 'الجمعية', '0', '08', '08', '', '', 'maher', NULL, '2023-05-15 10:02:58', '2023-05-15 10:02:58'),
(10, 9, 'مؤسسة التعاون', '0', '09', '09', '', '', 'maher', NULL, '2023-05-15 10:03:27', '2023-05-15 10:03:27'),
(11, 10, 'الهلال الاحمر', '0', '10', '10', '', '', 'maher', NULL, '2023-05-15 10:05:47', '2023-05-15 10:05:47'),
(12, 11, 'رصيد أول المدة', '0', '0', '11', '', '', 'maher', NULL, '2023-05-15 10:06:35', '2023-05-15 10:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_num` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_num`, `unit_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'باكيت', 'salah', NULL, '2021-12-01 05:44:13', NULL),
(2, 2, 'كيلو', 'salah', NULL, '2021-12-01 05:44:23', NULL),
(3, 3, 'كرتونة', 'salah', NULL, '2021-12-01 05:44:33', NULL),
(4, 4, 'عدد', 'salah', NULL, '2021-11-22 04:20:44', NULL),
(5, 5, 'شريط', 'salah', NULL, '2021-12-01 05:46:33', NULL),
(6, 6, 'قطعة', 'salah', NULL, '2021-12-01 05:46:49', NULL),
(7, 7, 'لتر', 'salah', NULL, '2021-12-01 05:47:09', NULL),
(8, 8, 'عبوة', 'salah', NULL, '2021-12-01 05:47:15', NULL),
(9, 9, 'متر', 'salah', NULL, '2021-12-01 05:47:30', NULL),
(10, 10, 'طقم', 'salah', NULL, '2021-12-01 05:48:05', NULL),
(11, 11, 'لفه', 'salah', NULL, '2021-12-16 06:53:15', NULL),
(12, 12, 'ربطة', 'salah', NULL, '2022-01-11 03:39:14', NULL),
(13, 13, 'فرخ', 'salah', NULL, '2022-01-25 02:38:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `sub_department_id` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_by`, `deleted_at`, `department_id`, `sub_department_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'maher', 'maher@gmail.com', NULL, '$2y$10$Equ8n0UYYPx.MRCJZcOsS.NPiun24GiWzY/KGdCh9DtyuGKt68a3.', NULL, NULL, 1, 'البرمجة', NULL, '2023-05-23 11:03:35', '2023-05-23 11:03:35'),
(2, 'yousef', 'yousef@gmail.com', NULL, '$2y$10$RT2MTr/UNPw6yoF7US2nrez3nmj/k/.7FVltZsQcb3b4cqioipCqS', NULL, NULL, 1, 'البرمجة', NULL, '2023-05-23 11:03:36', '2023-05-23 11:03:36'),
(3, 'salah', 'salah@gmail.com', NULL, '$2y$10$E5DMnfufdChj8Y7/Td3jbubD533pcq2x2uVXIogQ655d.dws/0Xtu', NULL, NULL, 5, 'المحاسبة', NULL, '2023-05-23 13:13:55', '2023-05-23 13:13:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_num_unique` (`category_num`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `custodies`
--
ALTER TABLE `custodies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custodies_department_id_foreign` (`department_id`),
  ADD KEY `custodies_user_id_foreign` (`user_id`);

--
-- Indexes for table `custody_products`
--
ALTER TABLE `custody_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custody_products_custody_id_foreign` (`custody_id`),
  ADD KEY `custody_products_item_id_foreign` (`item_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_sub_department_id_foreign` (`sub_department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_supplier_id_foreign` (`supplier_id`),
  ADD KEY `invoices_store_id_foreign` (`store_id`);

--
-- Indexes for table `invoice_exports`
--
ALTER TABLE `invoice_exports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_exports_store_id_foreign` (`store_id`),
  ADD KEY `invoice_exports_sub_department_id_foreign` (`sub_department_id`);

--
-- Indexes for table `invoice_export_products`
--
ALTER TABLE `invoice_export_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_export_products_invoice_export_id_foreign` (`invoice_export_id`),
  ADD KEY `invoice_export_products_item_id_foreign` (`item_id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_products_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_products_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_item_num_unique` (`item_num`),
  ADD UNIQUE KEY `items_item_name_unique` (`item_name`),
  ADD KEY `items_category_id_foreign` (`category_id`),
  ADD KEY `items_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_store_num_unique` (`store_num`);

--
-- Indexes for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_departments_department_id_foreign` (`department_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_supplier_num_unique` (`supplier_num`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`),
  ADD UNIQUE KEY `suppliers_ipn_unique` (`ipn`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_unit_num_unique` (`unit_num`),
  ADD UNIQUE KEY `units_unit_name_unique` (`unit_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `custodies`
--
ALTER TABLE `custodies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custody_products`
--
ALTER TABLE `custody_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_exports`
--
ALTER TABLE `invoice_exports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_export_products`
--
ALTER TABLE `invoice_export_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_departments`
--
ALTER TABLE `sub_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custodies`
--
ALTER TABLE `custodies`
  ADD CONSTRAINT `custodies_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `custodies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `custody_products`
--
ALTER TABLE `custody_products`
  ADD CONSTRAINT `custody_products_custody_id_foreign` FOREIGN KEY (`custody_id`) REFERENCES `custodies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `custody_products_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_sub_department_id_foreign` FOREIGN KEY (`sub_department_id`) REFERENCES `sub_departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_exports`
--
ALTER TABLE `invoice_exports`
  ADD CONSTRAINT `invoice_exports_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_exports_sub_department_id_foreign` FOREIGN KEY (`sub_department_id`) REFERENCES `sub_departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_export_products`
--
ALTER TABLE `invoice_export_products`
  ADD CONSTRAINT `invoice_export_products_invoice_export_id_foreign` FOREIGN KEY (`invoice_export_id`) REFERENCES `invoice_exports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_export_products_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD CONSTRAINT `invoice_products_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_products_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_departments`
--
ALTER TABLE `sub_departments`
  ADD CONSTRAINT `sub_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
