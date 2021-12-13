-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 06:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omwebsolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `country`, `state`, `city`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'name', 'email@gmaail.cm', 'india', 'gujarat', 'rajkot', 'test', 'message demo', '2021-11-29 12:14:31', '2021-11-29 12:14:31'),
(2, 'chk', 'chk@gmal.com', 'ccc', 'ssss', 'ctctc', 'vhjh', 'bjhbjbkj', '2021-11-29 12:16:19', '2021-11-29 12:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=active,0=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `pid`, `uid`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 'do you have youtube page?', 'Yes, we have', 1, '2021-12-01 10:40:40', '2021-12-01 11:38:59'),
(2, 13, 1, 'can u send project report??', 'yes , give your mail id', 1, '2021-12-01 10:43:36', '2021-12-01 11:41:16'),
(3, 13, 1, 'update session is not working how to solve this issue', NULL, 0, '2021-12-01 10:44:12', '2021-12-01 10:44:12'),
(4, 13, 1, 'plz Give me username and password', NULL, 0, '2021-12-01 10:44:48', '2021-12-01 10:44:48'),
(5, 13, 1, 'do you have android app for this system ?', NULL, 0, '2021-12-01 10:45:48', '2021-12-01 10:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$oA/sSBWc2j2fr8gkT8C1.e/Afz8B6t90qXVL1C0ew28NhhGZPIO2O', '2021-11-23 11:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technology` text NOT NULL,
  `can_be_used` text NOT NULL,
  `modules` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `technology`, `can_be_used`, `modules`, `images`, `price`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Event Management System using PHP MySQL with Source Codes', 'The Event Management System is a simple PHP/MySQL project that will help an event organizing company or business manage their client event details and market the client event also. This system market also the venue list of the event organizing company\'s selected possible venue for an event. This event management system allows possible event audiences to register online with the use of the company\'s website. The audience registration will only serve as a request at first until the system admin or management will reach back to the possible audience to talk or verify the audience registry confirmation for the event and settle the payments if necessary. The system allows also the possible clients to inquire about the client\'s desired venue in which they possibly place their event.', 'HTML, AJAX,JQUERY,JAVASCRIPT,PHP,MYSQL', 'Diploma, Degree, MCA', 'Dashboard: In this section, admin can see all detail in brief like listed categories, Sponsors, Total Events, Total Registered Users, Total Booking, Total New Booking, Total Confirmed Booking and Total Cancelled Booking.\r\nCategory: In this section, admin manage event category (add and update).\r\nManage Sponsors: In this section, admin can add sponsors and manage sponsors details (Add/Update/Delete).', '[\"73a7292ccd89ef7bba2992a92c5cf03b.jpg\",\"DSC_0001_1-1.jpg\",\"exclusive-wedding.png\"]', 1500, 1, '2021-11-27 23:56:42', '2021-11-29 09:46:49'),
(12, 'Online Examination System in PHP', 'Online examination system is a non removable examination pattern of today’s life. We need more time saving and more accurate examination system as the number of applicants is increasing day by day. For all IT students and professionals, it is very important to have some basic understanding about the online examination system.', 'HTML, CSS, JavaScript, PHP, MySQL', 'alll.....', '2 Steps Installation process / Free Installation support\r\nFree/Paid Exams and Exam Series with detailed time analysis on each question\r\nNew:Sectional exams and Practice exams\r\nNew:Questions display in 2 languages\r\nNew:Practice Exams before login', '[\"online-testing-banner-concept-elearning-260nw-1781648378.jpg\"]', 3500, 1, '2021-11-30 19:18:05', '2021-11-30 19:18:05'),
(13, 'Online Tours and Travels Project in PHP', 'Online Tours and Travels Project in PHP : This is an online project developed using PHP and MySQL. Online Tours and Travels Project in PHP : The purpose of this project is to provide the complete information about the vehicles available for a tour. There are 2 different types of users. First the customer visits the site and enters the place from where to where he wishes to travel. He also provides the date as when he would like to travel.', 'HTML, AJAX,JQUERY,JAVASCRIPT,PHP,MYSQL', 'Diploma, Degree, MCA', 'Online Tours and Travels Project in PHP : - Faster processing time and more accurate data for travel requests and reimbursements\r\nOnline Tours and Travels Project in PHP : -Ability for travelers to track authorization and reimbursement request status through the system rather than via phone calls or campus mail\r\nOnline Tours and Travels Project in PHP : -Major technological upgrades to the current travel system', '[\"cc9932ba483613147d70a3746923e1e4.jpg\"]', 5000, 1, '2021-11-30 19:28:22', '2021-11-30 19:28:22'),
(14, 'School Management System in php mysql', 'School Management System WordPress Plugins\r\nThe main purpose using School Management System Project is to avoid manual problems and also documentation storage problem we can’t maintain long period data that’s why we used computerized system to overcome all problem related to school’s data storing and other arias.', 'HTML, AJAX,JQUERY,JAVASCRIPT,PHP,MYSQL', 'Diploma, Degree, MCA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '[\"Components-of-School-Management-System.png\",\"download.png\",\"school-management-software-keyfeatures.jpg\",\"school-managment1.png\"]', 3521, 1, '2021-11-30 19:33:26', '2021-11-30 19:33:26'),
(15, 'Online Attendance System in PHP MYSQL', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'HTML, AJAX,JQUERY,JAVASCRIPT,PHP,MYSQL', 'Diploma, Degree, MCA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '[\"104f8d2da0cc97402be97c0c25588f26.png\",\"a66f09f7e3386c73b6672f1502c55c29.png\",\"attendance software.png\"]', 6413, 1, '2021-11-30 19:39:44', '2021-11-30 19:39:44'),
(16, 'Online Admission System in PHP MYSQL', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'HTML, AJAX,JQUERY,JAVASCRIPT,PHP,MYSQL', 'Diploma, Degree, MCA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '[\"admission-500x500.jpg\",\"online-admission-system-software.png\",\"process-for-online-admission.jpg\",\"system-online-admission-management.jpg\"]', 1166, 1, '2021-11-30 19:41:28', '2021-11-30 19:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0-inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `email`, `password`, `phone`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$HVJBSRIlwfPKvCkYSDnT9eNI.6eMR7lZ3LMtrB91FnJSNR0p0u3SS', '9630251487', 'Female', 1, '2021-11-30 12:03:43', '2021-11-30 18:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$otqCFHcar8W1wH1IJTNZ5O8li7qOVZpryo0xQnX99hY1I5L44el5K', 'yl0vvuAKApyql2Cuba8oU80IpHJnNANi5GeHJe6LVpVmqIleqUYlynttV8Zs', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
