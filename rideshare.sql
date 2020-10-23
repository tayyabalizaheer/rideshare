-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2020 at 02:22 PM
-- Server version: 10.1.41-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Jemkaptransport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `login_time` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `mobile`, `image`, `status`, `login_time`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'do-not-reply@thesoftking.com', '+01234567896666', 'admin_1551272993.jpg', 1, '2018-05-04 14:36:07', '$2y$12$6chsxniaNNEJFyiEMAMIP.yrektLoUt0yaXZVgm9oV8NLlZA1uy72', 's2QLTuqWrjRFzofwy2z5TmEjVDuF4Q0m64paIkio8bMo4fxLvnA0LCjcTHsF', '2018-03-26 06:08:23', '2019-02-27 13:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(11,2) DEFAULT '0.00',
  `document_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `balance`, `document_id`, `company_name`, `pic_document`, `picture`, `present_address`, `permanent_address`, `city`, `zip_code`, `country`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nsn', 'nns', 'agent', 'agent@gmail.com', '12345678', 1000.00, NULL, 'jemkap', NULL, NULL, 'hdhjd', 'hdhhd', 'Abuja', '900123', 'Nigeria', 1, '$2y$10$.GXMfZ5L.feuktxYKxo7h.eXYmNrnwQWVZNgQkNxz5TxGc6EWHiL.', 'ZapC1Hbx6dT0kffDspBCXVzO511NHn2rehiSzdK5awknyD8BYeoel9fL6w2l', '2019-12-02 19:21:11', '2019-12-08 17:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sym` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification` tinyint(1) NOT NULL DEFAULT '0',
  `sms_verification` tinyint(1) NOT NULL DEFAULT '0',
  `email_notification` tinyint(1) NOT NULL DEFAULT '0',
  `sms_notification` tinyint(4) NOT NULL DEFAULT '0',
  `withdraw_status` tinyint(1) NOT NULL DEFAULT '0',
  `withdraw_charge` double DEFAULT '0',
  `captcha` tinyint(4) NOT NULL DEFAULT '0',
  `decimal` int(2) NOT NULL,
  `addtime` int(11) DEFAULT '0',
  `cancel_endtime` int(11) DEFAULT '10',
  `agent_com` decimal(11,2) DEFAULT '0.00',
  `adminWallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refcom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `privacy` longtext COLLATE utf8mb4_unicode_ci,
  `google_map` text COLLATE utf8mb4_unicode_ci,
  `terms` blob,
  `copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright_text` text COLLATE utf8mb4_unicode_ci,
  `fb_comment` text COLLATE utf8mb4_unicode_ci,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_text` text COLLATE utf8mb4_unicode_ci,
  `about_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_about` longtext COLLATE utf8mb4_unicode_ci,
  `popular_tour_h` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular_tour_p` text COLLATE utf8mb4_unicode_ci,
  `popular_destination_h` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular_destination_p` text COLLATE utf8mb4_unicode_ci,
  `why_us_h` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_us_p` text COLLATE utf8mb4_unicode_ci,
  `news_h` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_p` text COLLATE utf8mb4_unicode_ci,
  `enquiry_h` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enquiry_p` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `sitename`, `color`, `phone`, `email`, `address`, `currency`, `currency_sym`, `registration`, `email_verification`, `sms_verification`, `email_notification`, `sms_notification`, `withdraw_status`, `withdraw_charge`, `captcha`, `decimal`, `addtime`, `cancel_endtime`, `agent_com`, `adminWallet`, `latitude`, `longitude`, `refcom`, `about`, `privacy`, `google_map`, `terms`, `copyright`, `copyright_text`, `fb_comment`, `rate`, `breadcrumb_text`, `about_video`, `short_about`, `popular_tour_h`, `popular_tour_p`, `popular_destination_h`, `popular_destination_p`, `why_us_h`, `why_us_p`, `news_h`, `news_p`, `enquiry_h`, `enquiry_p`, `created_at`, `updated_at`) VALUES
(1, 'Jemkap Transport', '3842fb', '+23408123445677', 'Info@jemkaptransport.com', 'Worldmart Plaza, Plot 591/592, Cadastral Zone B02, Durumi Area 1, Garki Abuja', 'NGN', '₦', 1, 0, 0, 1, 0, 1, 1.5, 0, 2, 5, 1440, 2.00, '3H4X31j1pHswncoeasRjJt7TKBJLZz6ABE', '9.0269342', '7.4673982', '0', '<div><b>Jemkap Transport </b>is a top notch transport and logistics company which seeks to serve different cadres of customers. Our desire is to make it comfortable for our customers to travel by road.With an ultramodern terminal at our headquarter in Abuja and six destinations(<b>Lagos</b>, <b>Enugu</b>, <b>Owerri</b>, <b>Awka</b>, <b>Asaba</b>, <b>Awka</b>), we are committed to an excellent service delivery to our clients.&nbsp; Our services includes Intercity transport, courier services,Haulage, Diplomatic escorts. <br></div><div><b>Headquarter Address:</b> Plot 591/592, Cadastral Zone BO2 Durumi Beside Conoil Area 1, Garki, Abuja</div><div align=\"center\"><b><br></b></div><div align=\"center\"><b>Our Mission</b><br></div><div>To provide safe, reliable, continuous, and cost effective service through a strong support team of logistic associates dedicated to our customers needs and commitment to excellence.</div><div><br></div><div><div align=\"center\"><b>Vision</b><br></div>To be the market leader in specialised logistics and transportation and related services in Nigeria . We will earn our customers\' enthusiasm through continuous improvement driven by the integrity, teamwork, and innovation of our people.<br></div><div align=\"left\"><div align=\"center\"><br></div></div><div align=\"left\">&nbsp; <br></div><div align=\"center\"><br></div>', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><div><br></div>', NULL, 0x3c70207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d626f74746f6d3a20313570783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b20746578742d616c69676e3a206a7573746966793b20636f6c6f723a2072676228302c20302c2030293b20666f6e742d66616d696c793a202671756f743b4f70656e2053616e732671756f743b2c20417269616c2c2073616e732d73657269663b223e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e3c6469763e3c70207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d626f74746f6d3a20313570783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b20746578742d616c69676e3a206a7573746966793b20636f6c6f723a2072676228302c20302c2030293b20666f6e742d66616d696c793a202671756f743b4f70656e2053616e732671756f743b2c20417269616c2c2073616e732d73657269663b223e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e3c2f6469763e3c6469763e3c70207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d626f74746f6d3a20313570783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b20746578742d616c69676e3a206a7573746966793b20636f6c6f723a2072676228302c20302c2030293b20666f6e742d66616d696c793a202671756f743b4f70656e2053616e732671756f743b2c20417269616c2c2073616e732d73657269663b223e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e3c2f6469763e3c6469763e3c70207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d626f74746f6d3a20313570783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b20746578742d616c69676e3a206a7573746966793b20636f6c6f723a2072676228302c20302c2030293b20666f6e742d66616d696c793a202671756f743b4f70656e2053616e732671756f743b2c20417269616c2c2073616e732d73657269663b223e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e3c2f6469763e3c6469763e3c62723e3c2f6469763e, 'We have over 15 years of experienceaa', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.aa', '<div id=\"fb-root\"></div>\r\n<script>\r\n    (function(d, s, id) {\r\n        var js, fjs = d.getElementsByTagName(s)[0];\r\n        if (d.getElementById(id)) return;\r\n        js = d.createElement(s); js.id = id;\r\n        js.src = \'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=205856110142667&autoLogAppEvents=1\';\r\n        fjs.parentNode.insertBefore(js, fjs);\r\n    }(document, \'script\', \'facebook-jssdk\'));\r\n</script>', '1', 'Ronnie Lorem ipsum dolor sit amet, con sectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore.Lorem ipsum dolor sit ame con sectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.\r\naa', 'https://www.youtube.com/watch?v=ZM1vaHflxFE', 'Lorem ipsum dolor sit amet, con sectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore.', 'Our Terminals', NULL, 'Popular Destinations', NULL, 'Our Services', NULL, 'Latest Post', NULL, 'Enquiry', 'We are here for you.', NULL, '2020-01-12 23:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tech', 1, '2019-12-08 16:06:38', '2019-12-10 12:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `ticket_booking_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `try` int(11) NOT NULL DEFAULT '0',
  `role` tinyint(4) DEFAULT NULL COMMENT '1 => user, 2 => agent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `ticket_booking_id`, `amount`, `charge`, `usd`, `btc_amo`, `btc_wallet`, `trx`, `status`, `try`, `role`, `created_at`, `updated_at`) VALUES
(2, 1, 107, NULL, '100', '2', '51', '0', '', 'TRX-64258350720', 0, 0, 2, '2019-12-03 16:23:29', '2019-12-03 16:23:29'),
(3, 1, 107, 8, '10000.00', '101', '5050.5', '0', '', 'sjJqMEZCVJklUGqD', 0, 0, NULL, '2019-12-03 23:16:12', '2019-12-03 23:16:12'),
(4, 1, 108, 8, '10000.00', '101', '10101', '0', '', 'VXmT6ycffCVPC4Sg', 0, 0, NULL, '2019-12-03 23:16:26', '2019-12-03 23:16:26'),
(5, 1, 107, 8, '10000.00', '101', '5050.5', '0', '', 'VcXQHRI8ew9ayBU3', 0, 0, NULL, '2019-12-04 13:04:00', '2019-12-04 13:04:00'),
(6, 1, 107, 8, '10000.00', '101', '5050.5', '0', '', 'jnoGszHUKAD1oP9M', 0, 0, NULL, '2019-12-04 13:05:54', '2019-12-04 13:05:54'),
(7, 1, 107, 9, '10000.00', '101', '5050.5', '0', '', 'SS9ArXPK57n9qAhi', 0, 0, NULL, '2019-12-04 13:43:52', '2019-12-04 13:43:52'),
(8, 1, 107, 13, '10000.00', '101', '5050.5', '0', '', '2ywEt8AYZhPh6gZc', 0, 0, NULL, '2019-12-05 00:03:11', '2019-12-05 00:03:11'),
(9, 1, 107, 13, '10000.00', '101', '10101', '0', '', 'JTD8qft7qE1BFkDR', 0, 0, NULL, '2019-12-05 00:15:11', '2019-12-05 00:15:11'),
(10, 1, 107, 13, '10000.00', '0', '10000', '0', '', '3pfb9839094MKX6S', 0, 0, NULL, '2019-12-05 00:16:32', '2019-12-05 00:16:32'),
(11, 1, 107, 13, '10000.00', '0', '10000', '0', '', '7iOFiqoK0GvdxpFc', 0, 0, NULL, '2019-12-05 00:21:38', '2019-12-05 00:21:38'),
(12, 1, 107, 15, '10000.00', '0', '10000', '0', '', '5xnWtWBW8v5eL0bp', 1, 0, NULL, '2019-12-06 00:36:52', '2019-12-06 00:37:19'),
(13, 1, 107, 16, '40000.00', '0', '40000', '0', '', 'llkIZDvROj6ojVb6', 1, 0, NULL, '2019-12-06 00:47:54', '2019-12-06 00:48:17'),
(14, NULL, 107, 24, '1222.00', '0', '1222', '0', '', 't3FO0sKOCPBiNdct', 1, 0, NULL, '2019-12-09 15:08:53', '2019-12-09 15:09:15'),
(15, NULL, 107, 30, '10000.00', '750', '10750', '0', '', 'Je7UDwyNC8rzmiZn', 1, 0, NULL, '2019-12-09 21:11:46', '2019-12-09 21:12:32'),
(16, 1, 107, 31, '8000.00', '600', '8600', '0', '', 'Zuqt85NspiwURBc3', 1, 0, NULL, '2019-12-10 01:09:24', '2019-12-10 01:09:43'),
(17, 1, 107, 32, '8000.00', '600', '8600', '0', '', 'wcrCg51fkzll0l9m', 1, 0, NULL, '2019-12-10 01:14:21', '2019-12-10 01:14:37'),
(18, 1, 107, 33, '8000.00', '600', '8600', '0', '', '7KfwuqPlNH6EhZQV', 0, 0, NULL, '2019-12-10 01:18:23', '2019-12-10 01:18:23'),
(19, 1, 107, 33, '8000.00', '600', '8600', '0', '', 'NXpN9dQOE22tqZB4', 0, 0, NULL, '2019-12-10 01:18:23', '2019-12-10 01:18:23'),
(20, NULL, 107, 40, '10000.00', '750', '10750', '0', '', '1B6FUchnYk1d8k2A', 0, 0, NULL, '2020-01-14 03:33:52', '2020-01-14 03:33:52'),
(21, NULL, 107, 41, '20000.00', '1500', '21500', '0', '', '50CeOcUcFGbOTKTD', 1, 0, NULL, '2020-01-27 12:38:41', '2020-01-27 12:39:04'),
(22, 1, 107, 43, '10000.00', '750', '10750', '0', '', 'HFMzrnLQySxIRK3M', 1, 0, NULL, '2020-02-01 13:50:38', '2020-02-01 13:51:21'),
(23, NULL, 107, 44, '10000.00', '750', '10750', '0', '', 'FcpYrbI74g7gOTS3', 0, 0, NULL, '2020-02-03 14:44:42', '2020-02-03 14:44:42'),
(24, 1, 107, 45, '10000.00', '750', '10750', '0', '', 'xQoDwj8pQCK24tky', 1, 0, NULL, '2020-02-03 14:48:37', '2020-02-03 14:48:59'),
(25, NULL, 107, 47, '10000.00', '750', '10750', '0', '', '60zMZ0canCri6HXj', 1, 0, NULL, '2020-03-14 22:16:47', '2020-03-14 22:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enquiry` text COLLATE utf8mb4_unicode_ci,
  `read_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `reply` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `ip`, `enquiry`, `read_by`, `read`, `reply`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Kennethdut', 'raphaebovicle@gmail.com', '82721153624', '37.120.156.27', 'Hi!  jemkaptransport.com \r\n \r\nDid you know that it is possible to send request utterly legit? \r\nWe offer a new way of sending business offer through contact forms. Such forms are located on many sites. \r\nWhen such requests are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nAlso, messages sent through feedback Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis letter is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - feedbackform@make-success.com', NULL, 0, NULL, 0, NULL, '2020-01-07 06:13:26', '2020-01-07 06:13:26'),
(7, 'Aurelio Hickle', 'info@internist-moabit.de', '904.929.2356 x74720', '185.220.101.46', 'Unbranded Concrete Towels', NULL, 0, NULL, 0, NULL, '2020-01-14 15:19:14', '2020-01-14 15:19:14'),
(8, 'Xavier Zboncak IV', 'coufperenoel@gmail.com', '1-538-417-0491', '5.199.130.188', 'Ball', NULL, 0, NULL, 0, NULL, '2020-01-20 03:50:05', '2020-01-20 03:50:05'),
(9, 'Kennethdut', 'raphaebovicle@gmail.com', '81367849193', '84.17.60.52', 'Good day!  jemkaptransport.com \r\n \r\nDid you know that it is possible to send business offer fully lawfully? \r\nWe provide a new legal way of sending letter through contact forms. Such forms are located on many sites. \r\nWhen such requests are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nAlso, messages sent through communication Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - feedbackform@make-success.com', NULL, 1, NULL, 0, NULL, '2020-01-20 22:55:36', '2020-02-03 14:36:26'),
(10, 'Mikel Hand', 'mlpeleschak@gmail.com', '296.400.2043 x5855', '185.220.101.79', 'green', NULL, 0, NULL, 0, NULL, '2020-01-21 01:30:05', '2020-01-21 01:30:05'),
(11, 'Madge Wisozk', 'lauradecker25@charter.net', '1-488-552-3394', '185.225.17.179', 'Gloves', NULL, 1, NULL, 0, NULL, '2020-01-23 19:54:54', '2020-02-03 14:36:08'),
(12, 'Elta Howell', 'pmelampy@gmail.com', '616-495-2362', '185.220.101.74', 'District', NULL, 0, NULL, 0, NULL, '2020-01-24 03:09:29', '2020-01-24 03:09:29'),
(13, 'Kevin Rath DDS', 'missarchana88@gmail.com', '116-744-2222 x598', '176.10.99.200', 'Steel', NULL, 1, NULL, 0, NULL, '2020-01-24 14:58:07', '2020-02-03 14:35:54'),
(14, 'Erika Barrows V', 'lindsey.warner@takata.com', '(045) 226-7760', '46.165.230.5', 'Incredible', NULL, 1, NULL, 0, NULL, '2020-01-27 22:59:05', '2020-02-03 14:35:49'),
(15, 'Cooper Kreiger', 'limitedderbi@gmail.com', '1-562-708-7032 x9991', '109.70.100.28', 'Ethiopian Birr', NULL, 0, NULL, 0, NULL, '2020-02-06 06:17:06', '2020-02-06 06:17:06'),
(16, 'Jackson Emmerich', 'kimkirker@cox.net', '1-768-183-1685 x2954', '185.220.101.25', 'Avon', NULL, 0, NULL, 0, NULL, '2020-02-06 19:26:37', '2020-02-06 19:26:37'),
(17, 'Mr. Wilfred Wiegand', 'st-lage@t-online.de', '1-409-973-2941 x477', '194.40.240.96', 'Dale', NULL, 0, NULL, 0, NULL, '2020-02-07 16:53:26', '2020-02-07 16:53:26'),
(18, 'Alexandrine Bosco', 'judyakers98@yahoo.com', '232.146.9679 x90708', '185.220.101.30', 'Data', NULL, 0, NULL, 0, NULL, '2020-02-11 07:57:29', '2020-02-11 07:57:29'),
(19, 'Reilly Murphy', 'hexianyi96@gmail.com', '(443) 094-2556 x541', '167.86.94.107', 'evolve', NULL, 0, NULL, 0, NULL, '2020-02-12 04:59:18', '2020-02-12 04:59:18'),
(20, 'Walton Barton', 'miquana77@yahoo.com', '125.224.5945', '185.220.101.70', 'Executive', NULL, 0, NULL, 0, NULL, '2020-02-13 02:54:30', '2020-02-13 02:54:30'),
(21, 'Orval Von', 'info@bulkbuddy.co', '856-183-7856 x9357', '23.129.64.230', 'Central', NULL, 0, NULL, 0, NULL, '2020-02-13 23:26:47', '2020-02-13 23:26:47'),
(22, 'Carley Abbott', 'bkoiner18@gmail.com', '(305) 993-0515', '185.220.101.30', 'User-centric', NULL, 0, NULL, 0, NULL, '2020-02-14 06:58:02', '2020-02-14 06:58:02'),
(23, 'Jeromeeduff', 'no-reply@hilkom-digital.de', '83365577147', '37.120.143.60', 'hi there \r\nI have just checked jemkaptransport.com for the ranking keywords and seen that your SEO metrics could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', NULL, 0, NULL, 0, NULL, '2020-02-18 02:25:00', '2020-02-18 02:25:00'),
(24, 'Sandra Murphy', 'sydms1110@yahoo.com', '(963) 792-1514', '185.220.101.77', 'deposit', NULL, 0, NULL, 0, NULL, '2020-02-18 12:44:14', '2020-02-18 12:44:14'),
(25, 'Lorine Baumbach', 'gvalenzuela562@gmail.com', '337.856.4564 x1717', '217.79.178.53', 'Gorgeous Metal Shirt', NULL, 0, NULL, 0, NULL, '2020-02-18 19:52:40', '2020-02-18 19:52:40'),
(26, 'Monica Brown', 'm.brown@explainthebiz.online', '84882451129', '37.120.143.59', 'I messaged previously about how explainer videos became an absolute must for every website in 2020. Driving relevant traffic to your site is hard enough, you must capture this traffic and engage them! \r\n \r\n \r\nAs you know, Google is constantly changing its SEO algorithm. The only thing that has remained consistent is that adding an explainer video increases website rank and most importantly keeps customers on your page for longer, increasing conversions ratios. \r\n \r\n \r\nMy team has created thousands of marketing videos including dozens in your field. Simplify your pitch, increase website traffic, and close more business. \r\n \r\n \r\nShould I send over some industry-specific samples? \r\n \r\n \r\n-- Monica Brown \r\n \r\n \r\nEmail: M.Brown@explainthebiz.online \r\nWebsite: http://explainthebiz.online', NULL, 0, NULL, 0, NULL, '2020-02-19 22:31:29', '2020-02-19 22:31:29'),
(27, 'Litzy Jaskolski', 'paulrbeer@yahoo.com', '231-300-4094', '199.19.224.107', 'JSON', NULL, 0, NULL, 0, NULL, '2020-02-22 11:03:46', '2020-02-22 11:03:46'),
(28, 'Blair Effertz', 'smgoon@gmail.com', '(062) 008-7744 x839', '185.195.237.25', 'Supervisor', NULL, 0, NULL, 0, NULL, '2020-02-28 02:30:37', '2020-02-28 02:30:37'),
(29, 'Anthonyecofe', 'raphaebovicle@gmail.com', '83623148313', '84.17.51.72', 'Good day!  jemkaptransport.com \r\n \r\nDo you know the best way to point out your product or services? Sending messages exploitation feedback forms can allow you to easily enter the markets of any country (full geographical coverage for all countries of the world).  The advantage of such a mailing  is that the emails that will be sent through it\'ll find yourself within the mailbox that is intended for such messages. Sending messages using Contact forms is not blocked by mail systems, which means it is sure to reach the client. You\'ll be ready to send your provide to potential customers who were previously unavailable thanks to email filters. \r\nWe offer you to test our service without charge. We are going to send up to 50,000 message for you. \r\nThe cost of sending one million messages is us $ 49. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nEmail - make-success@mail.ru', NULL, 0, NULL, 0, NULL, '2020-03-06 09:36:07', '2020-03-06 09:36:07'),
(30, 'Mr. Nyah Wehner', 'patrickstomlinson@gmail.com', '(417) 983-2784 x542', '158.69.172.231', 'invoice', NULL, 0, NULL, 0, NULL, '2020-03-07 08:30:18', '2020-03-07 08:30:18'),
(31, 'Philip Anderson', 'storybitestudio14@gmail.com', '84164148885', '190.2.149.159', 'Hi there, I just visited jemkaptransport.com and thought I would reach out to you. \r\n \r\nI run an animation studio that makes animated explainer videos helping companies to better explain their offering and why potential customers should work with them over the competition. \r\n \r\nWatch some of our work here: http://www.story-bite.com/ - pretty good right? \r\n \r\nOur team works out of Denmark to create high quality videos made from scratch, designed to make your business stand out and get results. No templates, no cookie cutter animation that tarnishes your brand. \r\n \r\nI really wanted to make you a super awesome animated video explaining what your company does and the value behind it. \r\n \r\nWe have a smooth production process and handle everything needed for a high-quality video that typically takes us 6 weeks to produce from start to finish. \r\n \r\nFirst, we nail the script, design storyboards you can’t wait to see animated. Voice actors in your native language that capture your brand and animation that screams premium with sound design that brings it all together. \r\n \r\nIf you’re interested in learning more visit our website or please get in touch on the email below: \r\nEmail: storybiteanimations@gmail.com \r\n \r\nThanks for taking the time to read this.', NULL, 0, NULL, 0, NULL, '2020-03-12 12:03:51', '2020-03-12 12:03:51'),
(32, 'WilliamEnarf', 'no-reply@ghostdigital.co', '84518842586', '84.17.47.62', 'Increase your jemkaptransport.com ranks with quality web2.0 Article links. \r\nGet 500 permanent web2.0 for only $39. \r\n \r\nMore info about our new service: \r\nhttps://www.ghostdigital.co/web2/', NULL, 0, NULL, 0, NULL, '2020-03-18 04:00:39', '2020-03-18 04:00:39'),
(33, 'Mariam Abshire', 'ph4yp@gmx.de', '301-451-6962 x2994', '87.120.254.98', 'driver', NULL, 0, NULL, 0, NULL, '2020-03-18 04:37:42', '2020-03-18 04:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etemplates`
--

INSERT INTO `etemplates` (`id`, `esender`, `mobile`, `emessage`, `smsapi`, `created_at`, `updated_at`) VALUES
(1, 'no-reply@jemkaptransport.com', '+01234567890', '<br><br>\r\n	<div class=\"contents\" style=\"max-width: 600px; margin: 0 auto; border: 2px solid #000036;\">\r\n\r\n<div class=\"header\" style=\"background-color: #000036; padding: 15px; text-align: center;\">\r\n	<div class=\"logo\" style=\"width: 260px;text-align: center; margin: 0 auto;\">\r\n		<img src=\"https://i.imgur.com/4NN55uD.png\" alt=\"THESOFTKING\" style=\"width: 100%;\">\r\n	</div>\r\n</div>\r\n\r\n<div class=\"mailtext\" style=\"padding: 30px 15px; background-color: #f0f8ff; font-family: \'Open Sans\', sans-serif; font-size: 16px; line-height: 26px;\">\r\n\r\nHi {{name}},\r\n<br><br>\r\n{{message}}\r\n<br><br>\r\n<br><br>\r\n</div>\r\n\r\n<div class=\"footer\" style=\"background-color: #000036; padding: 15px; text-align: center;\">\r\n<a href=\"https://thesoftking.com/\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\">Website</a>\r\n<a href=\"https://thesoftking.com/products\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\">Products</a>\r\n<a href=\"https://thesoftking.com/contact\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\">Contact</a>\r\n</div>\r\n\r\n\r\n<div class=\"footer\" style=\"background-color: #000036; padding: 15px; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.2);\">\r\n\r\n<strong style=\"color: #fff;\">© 2019 Jemkap Transport. All Rights Reserved.</strong>\r\n<p style=\"color: #ddd;\">Jemkap Transport is not partnered with any other \r\ncompany or person. <br></p>\r\n\r\n\r\n</div>\r\n\r\n	</div>\r\n<br><br>', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=****&sender=BlueBUS&SMSText={{message}}&GSM={{number}}&type=longSMS', '2018-01-09 23:45:09', '2019-12-10 00:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'How much luggage i am entitled to carry?', 'The maximum weight of luggage you are entitled to carry is 10kg, additional kg will attract extra charges.', '2019-12-09 00:13:36', '2019-12-09 00:13:36'),
(2, 'Do all your buses have AC unit?', 'Yes, all our buses have AC unit unless stated otherwise at the terminal.', '2019-12-09 00:15:09', '2019-12-09 00:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `fleet_facilities`
--

CREATE TABLE `fleet_facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fleet_facilities`
--

INSERT INTO `fleet_facilities` (`id`, `title`, `details`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Free BreakFast', 'Free BreakFast', 1, NULL, '2019-12-02 14:29:16', '2019-12-10 02:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `fleet_registrations`
--

CREATE TABLE `fleet_registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fleet_type_id` int(11) DEFAULT NULL,
  `engine_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chasis_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `lastseat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_numbers` text COLLATE utf8mb4_unicode_ci,
  `fleet_facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ac_available` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fleet_registrations`
--

INSERT INTO `fleet_registrations` (`id`, `reg_no`, `fleet_type_id`, `engine_no`, `model_no`, `chasis_no`, `layout`, `total_seat`, `lastseat`, `seat_numbers`, `fleet_facilities`, `owner`, `company`, `ac_available`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1424242', 1, '2626262', '535353', '3636363636', 'vip', 6, '0', 'A1 ,B2 ,B3 ,C4 ,C5 ,C6 ,', 'free food', NULL, NULL, 1, 1, NULL, '2019-12-02 14:30:28', '2019-12-11 18:18:02'),
(2, '123443', 2, '321321', '12312', '23123', 'luxury', 13, '0', '1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9 ,10 ,11 ,12 ,13 ,', 'free food', NULL, NULL, 1, 1, NULL, '2019-12-04 20:31:18', '2019-12-09 22:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `fleet_types`
--

CREATE TABLE `fleet_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `fleet_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fleet_types`
--

INSERT INTO `fleet_types` (`id`, `name`, `status`, `fleet_img`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'VIP', 1, '1575890091.jpg', NULL, '2019-12-02 14:28:45', '2019-12-09 16:15:37'),
(2, 'Luxury', 1, '1575890035.jpg', NULL, '2019-12-04 20:21:15', '2019-12-09 21:09:16'),
(4, 'test', 1, '1575850527.jpg', NULL, '2019-12-09 04:46:53', '2019-12-09 05:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Website',
  `val4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Industry Type',
  `val5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Channel ID',
  `val6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction URL',
  `val7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction Status URL',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `status`, `created_at`, `updated_at`) VALUES
(101, 'PayPal', 'PayPal', '1', '1000', '0.511', '2.52', '1', 'rexrifat636@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-05 00:23:48'),
(102, 'PerfectMoney', 'Perfect Money', '1', '20000', '2', '1', '1', 'U5376900', 'G079qn4Q7XATZBqyoCkBteGRg', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-05 00:23:57'),
(103, 'Stripe', 'Credit Card', '1', '50000', '3', '3', '1', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-05 00:24:07'),
(104, 'Skrill', 'Skrill', '1', '50000', '3', '3', '1', 'merchant@skrill', 'TheSoftKing', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-05 00:24:16'),
(105, 'PayTM', 'PayTM', '1', '10000', '1', '1', '1', 'PoojaE46324372286132', 'JAKMX9PVoj208dMq', 'WEB_STAGINGb', 'Retail', 'WEB', 'https://pguat.paytm.com/oltp-web/processTransaction', 'https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp', 0, NULL, '2019-12-05 00:24:27'),
(106, 'Payeer', 'Payeer', '1', '10000', '1', '1', '1', '627881897', 'Admin727096', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-05 00:24:34'),
(107, 'PayStack', 'PayStack', '6000', '15000', '0', '7.5', '1', 'pk_test_f568875f4610c18143fedf1bbb18d3e84c05b7c8', 'sk_test_d5361f1302a183a18ab86e780cbcfa7e441ce281', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-02-18 13:39:31'),
(108, 'VoguePay', 'VoguePay', '1', '10000', '1', '1', '1', 'demo', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-09 00:19:36'),
(501, 'Blockchain.info', 'BitCoin', '1', '20000', '1', '0.5', '1', '3965f52f-ec19-43af-90ed-d613dc60657eSSS', 'xpub6DREmHywjNizvs9b4hhNekcjFjvL4rshJjnrHHgtLNCSbhhx5jKFRgqdmXAecLAddEPudDZY4xoDbV1NVHSCeDp1S7NumPCNNjbxB7sGasY0000', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:41:38'),
(502, 'block.io - BTC', 'BitCoin', '1', '99999', '1', '0.5', '1', '1658-8015-2e5e-9afb', '09876softk', NULL, NULL, NULL, NULL, NULL, 0, '2018-01-27 18:00:00', '2019-12-02 14:41:43'),
(503, 'block.io - LTC', 'LiteCoin', '1', '10000', '0.4', '1', '1', 'cb91-a5bc-69d7-1c27', '09876softk', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:41:48'),
(504, 'block.io - DOGE', 'DogeCoin', '1', '50000', '0.51', '2.52', '1', '2daf-d165-2135-5951', '09876softk', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:41:53'),
(505, 'CoinPayment - BTC', 'BitCoin', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:41:57'),
(506, 'CoinPayment - ETH', 'Etherium', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:42:02'),
(507, 'CoinPayment - BCH', 'Bitcoin Cash', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:42:06'),
(508, 'CoinPayment - DASH', 'DASH', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:42:11'),
(509, 'CoinPayment - DOGE', 'DOGE', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:42:16'),
(510, 'CoinPayment - LTC', 'LTC', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:42:24'),
(512, 'CoinGate', 'CoinGate', '1', '10000', '05', '5', '1', 'Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-07-08 18:00:00', '2019-12-02 14:42:28'),
(513, 'CoinPayment-ALL', 'Coin Payment', '1', '10000', '05', '5', '1', 'db1d9f12444e65c921604e289a281c56', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-02 14:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_pdfs`
--

CREATE TABLE `log_pdfs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `pdf_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_pdfs`
--

INSERT INTO `log_pdfs` (`id`, `ticket_id`, `pdf_name`, `token`, `created_at`, `updated_at`) VALUES
(1, 12, '9FZFFS5NPKHP_1575476226.pdf', 'ogqvymexjhntpw9mnnd4y6jexltzt3wyd0rfq1ni8w4qfogwfclu6xok73ye', '2019-12-04 21:17:06', '2019-12-04 21:17:06'),
(2, 15, 'JFGAPQBCZT33_1575574640.pdf', 'lplzutan4qtpoocntiax26o8oan5mklk69pb82pnrdx8dyuhdtnubfpkfwmh', '2019-12-06 00:37:20', '2019-12-06 00:37:20'),
(3, 16, 'VMESIOGZLRFE_1575575297.pdf', 'rgahf4ghwl9llw2kqahijp2zm2k3utc4oo08afyhicywrfhmdmqhogby6oba', '2019-12-06 00:48:17', '2019-12-06 00:48:17'),
(4, 17, 'V36LSDCFRXLC_1575763956.pdf', 'pobrgtcuqfyqpfbwlhl9uvhtreahkrej03weksg76v2ygctdyj3r38ehdryy', '2019-12-08 05:12:36', '2019-12-08 05:12:36'),
(5, 18, 'WUNOGBM71HGE_1575806325.pdf', 'sladvywlteiiywzz88glvlrby6t1ee4bufaawyxktnxo6tubckjekk50ohjb', '2019-12-08 16:58:45', '2019-12-08 16:58:45'),
(6, 19, 'AMU0X84SWBGQ_1575806946.pdf', 'vhvl7f33bfsvlywiatoq4hebo6vj9wj0xt4s1yupiclntzemresinhzs5njf', '2019-12-08 17:09:06', '2019-12-08 17:09:06'),
(7, 20, 'YM9WCB6ITNWI_1575807670.pdf', 'sdjiih4qrqgcaf8ahpwofwduden2c80dpmpoaxnzp6rygbx5lzvhazfef9cw', '2019-12-08 17:21:10', '2019-12-08 17:21:10'),
(8, 21, 'SZ7XBGJ65EVM_1575808561.pdf', 'uah0vj8zi1goxjnpqvkzrbfusmwew9iwcp4jnecc0wm3g1pzvwrbsohrjoxu', '2019-12-08 17:36:01', '2019-12-08 17:36:01'),
(9, 24, 'GTRG6WVE3WX5_1575886155.pdf', 'jqxda050oknidk5qmc8xuz8slr3cgtfadyykluegfr9kki2bjeuqjbzl7tes', '2019-12-09 15:09:15', '2019-12-09 15:09:15'),
(10, 27, 'COKXFYH473DU_1575894453.pdf', 'ejmlrug7pxikfht9hkkpyqq1rx1uvvyv4lzwahpvv9bvjzlhevgerzhzf8gq', '2019-12-09 17:27:33', '2019-12-09 17:27:33'),
(11, 28, '6MKIULM6HBE2_1575894625.pdf', 'uxmrysiolxpng0ekmyhfufapxo8rri50duxnhvq9wzbixv35uwmqhpbzirwu', '2019-12-09 17:30:25', '2019-12-09 17:30:25'),
(12, 29, 'WGQTPCP9IXTT_1575903568.pdf', 'n9ndcgugdxzri2srtktjwktvj9khxu1ngot2yfblk0s33jl2eexjbppeq7lq', '2019-12-09 19:59:28', '2019-12-09 19:59:28'),
(13, 30, 'NHSIGI9RFWUM_1575907952.pdf', 'msdqxtojsgmnhqcff0uutqmfvo8gcmx8ajvyxqpazuouujzotfe9s0ulzfek', '2019-12-09 21:12:32', '2019-12-09 21:12:32'),
(14, 31, '86MCMNOKTXSX_1575922183.pdf', 'a0d0r27pt0a9prxzmvydujfkrweab3vwcmxopzevs7u0g6uk9ojjffhyewtn', '2019-12-10 01:09:43', '2019-12-10 01:09:43'),
(15, 32, '15R7JZEKETN2_1575922477.pdf', 'h87yqlbtvsx0ejsxbd0aq6rm6tdmktvti7e21iegktb3lejqttgjybnvys2j', '2019-12-10 01:14:37', '2019-12-10 01:14:37'),
(16, 34, '77PUYLBD5QQJ_1576021312.pdf', '6su8ruylgbfbloxbtlfh4jvoezmn3iqslghh46kgeezruuifeaal2fd0wxgm', '2019-12-11 04:41:52', '2019-12-11 04:41:52'),
(17, 35, 'NMPY4TOSMLWV_1576021949.pdf', 'tlgmml00eghvp8dfphiuzmxfrhd9e0mdqqercmmsmia8psvesdc2wnyobsxa', '2019-12-11 04:52:29', '2019-12-11 04:52:29'),
(18, 36, 'H2P5FCQSZF6J_1576070338.pdf', 'hngg3ngd6qh1yy3bfbfgn94mqjraib6vmjxdjyfonhyowyg06u0vvmsf5v1r', '2019-12-11 18:18:58', '2019-12-11 18:18:58'),
(19, 41, 'JQ2RDTPHDNYK_1580110744.pdf', 'lg8ep1dgenrelw9nprvz5qllzff0izuj1ho59l1rn8hsocdpkjwizflkq98a', '2020-01-27 12:39:04', '2020-01-27 12:39:04'),
(20, 43, 'EASZ5DMNCMZC_1580547081.pdf', 'ltwzki6qx7f4nebheirj7bgcclfvqusfvpq0ngjivi0yakfhngnb2yfb3wvi', '2020-02-01 13:51:21', '2020-02-01 13:51:21'),
(21, 45, '1U5S7131ZCMY_1580723340.pdf', 'yxp6qi1hzhn4vh3nfrlcmz0efawntzye7w6jtk0edvsdyf9xerdbm5l7spqt', '2020-02-03 14:49:00', '2020-02-03 14:49:00'),
(22, 47, 'WT6YBDD0WGI5_1584206250.pdf', 'scjaxztzegpctqdyqvgv5h92mayoc5mzq4fcqnavecqfgnlebdtlm4fsszvn', '2020-03-14 22:17:30', '2020-03-14 22:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_01_15_074551_create_agents_table', 2),
(6, '2019_01_16_052518_create_enquiries_table', 3),
(9, '2019_01_16_091539_create_fitnesses_table', 5),
(10, '2019_01_16_100841_create_fleet_types_table', 6),
(11, '2019_01_19_100807_create_fleet_facilities_table', 7),
(12, '2019_01_19_105902_create_fleet_registrations_table', 8),
(13, '2019_01_20_084932_create_trip_locations_table', 9),
(15, '2019_01_20_120845_create_trip_routes_table', 11),
(16, '2019_01_21_062726_create_trip_assigns_table', 12),
(17, '2019_01_22_065657_create_ticket_prices_table', 13),
(18, '2019_01_31_092631_create_ticket_bookings_table', 14),
(19, '2019_02_10_065746_create_ticket_cancels_table', 15),
(20, '2019_02_14_162056_create_popular_tours_table', 16),
(21, '2019_02_14_162310_create_popular_destinations_table', 16),
(22, '2019_02_14_183812_create_why_uses_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'anchimere@gmail.com', '6iVswVrd0oMAOn2jPe8cTIS5KLMXXT', '2019-12-10 00:52:11'),
(2, 'anchimere@gmail.com', 'DQvmJOy5YMCBuvBiXi03R4dliTkPjX', '2019-12-10 00:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `popular_destinations`
--

CREATE TABLE `popular_destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_destinations`
--

INSERT INTO `popular_destinations` (`id`, `name`, `image`, `designation`, `details`, `created_at`, `updated_at`) VALUES
(2, 'Lagos', 'destination_1575397132.jpg', NULL, NULL, '2019-12-03 23:18:52', '2019-12-03 23:18:52'),
(3, 'Enugu', 'destination_1575397190.jpg', NULL, NULL, '2019-12-03 23:19:50', '2019-12-03 23:19:50'),
(4, 'Owerri', 'destination_1575397389.jpg', NULL, NULL, '2019-12-03 23:23:09', '2019-12-03 23:23:09'),
(5, 'Awka', 'destination_1575397510.jpg', NULL, NULL, '2019-12-03 23:25:10', '2019-12-03 23:25:10'),
(6, 'Asaba', 'destination_1575397574.jpg', NULL, NULL, '2019-12-03 23:26:14', '2019-12-03 23:26:14'),
(7, 'Abuja', 'destination_1575397674.jpg', NULL, NULL, '2019-12-03 23:27:54', '2019-12-03 23:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `popular_tours`
--

CREATE TABLE `popular_tours` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_tours`
--

INSERT INTO `popular_tours` (`id`, `name`, `image`, `designation`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Owerri', 'tour_1575488393.jpg', NULL, 'address', '2019-12-05 00:39:53', '2019-12-05 00:43:56'),
(2, 'Lagos', 'tour_1575488439.jpg', NULL, 'address', '2019-12-05 00:40:39', '2019-12-05 00:44:14'),
(3, 'Abuja', 'tour_1575488477.jpg', NULL, 'address', '2019-12-05 00:41:17', '2019-12-05 00:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `hit` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `title`, `image`, `thumb`, `details`, `status`, `hit`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test 1', 'post_1575967866.jpg', 'post_thumb1575967866.jpg', 'Lorem ipsum dolor sit amit<br>', 1, 27, '2019-12-10 13:49:27', '2020-03-17 00:20:20'),
(2, 1, 'Test 2', 'post_1578852334.jpg', 'post_thumb1578852335.jpg', 'Lorem ipsum dolor sit amit', 1, 16, '2020-01-12 23:05:35', '2020-03-16 17:42:30'),
(3, 1, 'Test 3', 'post_1578852475.jpg', 'post_thumb1578852475.jpg', 'Lorem ipsum dolor sit amit', 1, 11, '2020-01-12 23:07:55', '2020-03-21 17:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Ticket of Your Desired Destinations', 'Cheap and Easy', 'Find cheap bus tickets for your next trip', NULL, '2020-02-18 13:19:05', '2020-02-18 13:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@example.com', 1, '2019-12-10 12:36:00', '2019-12-10 12:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_bookings`
--

CREATE TABLE `ticket_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_route_id` int(11) DEFAULT NULL,
  `fleet_registration_id` int(11) DEFAULT NULL,
  `trip_assign_id_no` int(11) DEFAULT NULL,
  `fleet_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `id_no` int(11) DEFAULT NULL,
  `pnr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boarding` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `total_fare` decimal(8,2) DEFAULT NULL,
  `seat_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `commission` decimal(10,0) DEFAULT '0',
  `admin_get` decimal(10,0) DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=> confirm',
  `status` tinyint(11) NOT NULL DEFAULT '0' COMMENT '0 => Default, 1 => Trip closed, -1 => Trip Cancel',
  `cancel_req` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 => default, 1 => request to cancel',
  `passenger_name` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_name` text COLLATE utf8mb4_unicode_ci,
  `next_of_kin_phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL COMMENT 'Date For Trip',
  `pay_endtime` datetime DEFAULT NULL COMMENT 'Payment End Time',
  `cancel_endtime` datetime DEFAULT NULL COMMENT 'Cancel Request End Time',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_bookings`
--

INSERT INTO `ticket_bookings` (`id`, `trip_route_id`, `fleet_registration_id`, `trip_assign_id_no`, `fleet_type_id`, `user_id`, `id_no`, `pnr`, `boarding`, `price`, `total_seat`, `total_fare`, `seat_number`, `agent_id`, `commission`, `admin_get`, `date`, `payment_status`, `status`, `cancel_req`, `passenger_name`, `email`, `phone`, `next_of_kin_name`, `next_of_kin_phone`, `booking_date`, `pay_endtime`, `cancel_endtime`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, 1575279403, 'ODXJOWJENDT2', '', 10000.00, 1, 10000.00, '2,', NULL, 0, 0, NULL, 0, 0, 0, 'Anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-03 08:00:00', '2019-12-02 15:48:11', '2019-12-02 08:00:00', NULL, '2019-12-02 14:38:11', '2019-12-02 14:45:46'),
(2, 1, 1, 1, 1, NULL, 1575279403, 'VWP2R5XNP1L0', '', 10000.00, 1, 10000.00, '2,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-03 08:00:00', '2019-12-02 15:48:11', '2019-12-02 08:00:00', NULL, '2019-12-02 14:38:11', '2019-12-02 14:38:11'),
(3, 1, 1, 1, 1, NULL, 1575279403, 'H9QIY5GGMDUD', '', 10000.00, 1, 10000.00, '5,', NULL, 0, 0, NULL, 0, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-03 08:00:00', '2019-12-02 15:57:05', '2019-12-02 08:00:00', NULL, '2019-12-02 14:47:05', '2019-12-02 14:47:41'),
(4, 1, 1, 1, 1, NULL, 1575279403, 'JOM3YZXXJFUY', '', 10000.00, 1, 10000.00, '4,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-03 08:00:00', '2019-12-02 16:01:28', '2019-12-02 08:00:00', NULL, '2019-12-02 14:51:28', '2019-12-02 14:51:28'),
(5, 1, 1, 1, 1, NULL, 1575279403, 'QMSYZLUQNLWB', '', 10000.00, 1, 10000.00, '6,', NULL, 0, 0, NULL, 0, 0, 0, 'dhhddhdh sns', 'anchimere@gmail.com', '23456789', NULL, NULL, '2019-12-03 08:00:00', '2019-12-02 16:01:52', '2019-12-02 08:00:00', NULL, '2019-12-02 14:51:52', '2019-12-02 14:52:18'),
(6, 1, 1, 1, 1, NULL, 1575279403, 'YRF4WDZ6NVEN', '', 10000.00, 1, 10000.00, '3,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-03 08:00:00', '2019-12-03 16:46:50', '2019-12-02 08:00:00', NULL, '2019-12-03 15:36:50', '2019-12-03 15:36:50'),
(7, 1, 1, 1, 1, NULL, 1575279403, 'J86H4NSM9C5S', '', 10000.00, 1, 10000.00, '1,', NULL, 0, 0, NULL, 0, 0, 0, 'mere chi', 'anchimer@gmail.com', '1234565677', NULL, NULL, '2019-12-03 08:00:00', '2019-12-03 16:48:49', '2019-12-02 08:00:00', NULL, '2019-12-03 15:38:49', '2019-12-03 15:39:31'),
(8, 1, 1, 2, 1, 1, 1575396930, 'JQ64FQ9GLT2R', '', 10000.00, 1, 10000.00, '1,', NULL, 0, 0, NULL, 0, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-04 08:00:00', '2019-12-04 00:25:55', '2019-12-03 08:00:00', '2019-12-05 00:01:43', '2019-12-03 23:15:55', '2019-12-05 00:01:43'),
(9, 1, 1, 2, 1, 1, 1575396930, 'KFYBOUS5XJ1Y', '', 10000.00, 1, 10000.00, '2,', NULL, 0, 0, NULL, 0, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-04 08:00:00', '2019-12-04 14:53:44', '2019-12-03 08:00:00', '2019-12-05 00:01:38', '2019-12-04 13:43:44', '2019-12-05 00:01:38'),
(10, 1, 1, 2, 1, NULL, 1575396930, 'LKYGY1LWMXCC', '', 10000.00, 1, 10000.00, '4,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-04 08:00:00', '2019-12-04 15:52:14', '2019-12-03 08:00:00', NULL, '2019-12-04 14:42:14', '2019-12-04 14:42:14'),
(11, 3, 1, 3, 1, NULL, 1575472952, 'PM3VIGIZVEYL', '', 0.00, 1, 0.00, '2,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-04 20:22:00', '2019-12-04 21:33:29', '2019-12-03 20:22:00', NULL, '2019-12-04 20:23:29', '2019-12-04 20:23:29'),
(13, 1, 1, 2, 1, 1, 1575396930, 'K0EBLFEFGJAI', '', 10000.00, 1, 10000.00, '2,', NULL, 0, 0, NULL, 0, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-04 08:00:00', '2019-12-05 01:13:00', '2019-12-03 08:00:00', '2019-12-06 00:36:01', '2019-12-05 00:03:00', '2019-12-06 00:36:01'),
(14, 1, 1, 5, 1, NULL, 1575574504, 'KTYVWG5GOIAP', '', 10000.00, 1, 10000.00, '1,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-06 20:34:00', '2019-12-06 01:45:32', '2019-12-05 20:34:00', NULL, '2019-12-06 00:35:32', '2019-12-06 00:35:32'),
(15, 1, 1, 5, 1, 1, 1575574504, 'JFGAPQBCZT33', '', 10000.00, 1, 10000.00, '2,', NULL, 0, 0, NULL, 1, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-06 20:34:00', '2019-12-06 01:46:41', '2019-12-05 20:34:00', NULL, '2019-12-06 00:36:41', '2019-12-06 00:37:19'),
(16, 1, 1, 5, 1, 1, 1575574504, 'VMESIOGZLRFE', '', 10000.00, 4, 40000.00, '3, 4, 5, 6,', NULL, 0, 0, NULL, 1, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-06 20:34:00', '2019-12-06 01:57:42', '2019-12-05 20:34:00', NULL, '2019-12-06 00:47:42', '2019-12-06 00:48:17'),
(21, 3, 2, 4, 2, NULL, 1575473605, 'SZ7XBGJ65EVM', '', 1222.00, 1, 1222.00, 'A1,', 1, 24, 1198, NULL, 1, 0, 0, 'test', 'test@g.com', '2356789786553423', NULL, NULL, '2019-12-08 20:33:00', '2019-12-08 18:38:01', '2019-12-07 20:33:00', NULL, '2019-12-08 17:36:01', '2019-12-08 17:36:01'),
(22, 3, 2, 4, 2, NULL, 1575473605, 'AOLTPCK6Y3Q4', '', 1222.00, 1, 1222.00, 'C5,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-08 20:33:00', '2019-12-09 01:33:20', '2019-12-07 20:33:00', NULL, '2019-12-09 00:23:20', '2019-12-09 00:23:20'),
(23, 3, 2, 4, 2, NULL, 1575473605, 'JYCKVFV8TFSR', '', 1222.00, 1, 1222.00, 'B3,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-08 20:33:00', '2019-12-09 16:16:51', '2019-12-07 20:33:00', NULL, '2019-12-09 15:06:51', '2019-12-09 15:06:51'),
(24, 3, 2, 4, 2, NULL, 1575473605, 'GTRG6WVE3WX5', '', 1222.00, 1, 1222.00, 'B2,', NULL, 0, 0, NULL, 1, 0, 0, 'mere henry', 'abujajak@gmail.com', '081233233233', NULL, NULL, '2019-12-08 20:33:00', '2019-12-09 16:18:15', '2019-12-07 20:33:00', NULL, '2019-12-09 15:08:15', '2019-12-09 15:09:15'),
(25, 3, 2, 4, 2, NULL, 1575473605, 'JGCJ6NRSHY7U', '', 1222.00, 1, 1222.00, 'C4,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-08 20:33:00', '2019-12-09 16:36:52', '2019-12-07 20:33:00', NULL, '2019-12-09 15:26:52', '2019-12-09 15:26:52'),
(29, 7, 2, 7, 2, NULL, 1575837239, 'WGQTPCP9IXTT', '', 0.00, 1, 0.00, 'B2,', 1, 0, 0, NULL, 1, 0, 0, 'hgg', 'abc@mail.com', '12346', NULL, NULL, '2019-12-09 01:33:00', '2019-12-09 21:01:28', '2019-12-08 01:33:00', NULL, '2019-12-09 19:59:28', '2019-12-09 19:59:28'),
(30, 1, 1, 9, 1, NULL, 1575907004, 'NHSIGI9RFWUM', '', 10000.00, 1, 10000.00, '1,', NULL, 0, 0, NULL, 1, 0, 0, 'sxsj sjsjs', 'ajajaj@gmail.com', '12334456', NULL, NULL, '2019-12-10 08:00:00', '2019-12-09 22:21:26', '2019-12-09 08:00:00', NULL, '2019-12-09 21:11:26', '2019-12-09 21:12:32'),
(31, 5, 1, 10, 1, 1, 1575922055, '86MCMNOKTXSX', '', 8000.00, 1, 8000.00, '2,', NULL, 0, 0, NULL, 1, -1, 1, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-11 21:07:00', '2019-12-10 02:14:12', '2019-12-10 21:07:00', NULL, '2019-12-10 01:09:12', '2019-12-10 01:11:13'),
(32, 5, 1, 10, 1, 1, 1575922055, '15R7JZEKETN2', '', 8000.00, 1, 8000.00, '2,', NULL, 0, 0, NULL, 1, -1, 1, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-11 21:07:00', '2019-12-10 02:19:11', '2019-12-10 21:07:00', NULL, '2019-12-10 01:14:11', '2019-12-10 01:16:45'),
(33, 5, 1, 10, 1, 1, 1575922055, 'IVKNIGTYUZDK', '', 8000.00, 1, 8000.00, '1,', NULL, 0, 0, NULL, 0, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2019-12-11 21:07:00', '2019-12-10 02:23:14', '2019-12-10 21:07:00', '2019-12-10 02:19:58', '2019-12-10 01:18:14', '2019-12-10 02:19:58'),
(34, 5, 1, 10, 1, NULL, 1575922055, '77PUYLBD5QQJ', '', 8000.00, 1, 8000.00, '3,', 1, 160, 7840, NULL, 1, 0, 0, 'test', 'test@gmail.com', '23489283409', NULL, NULL, '2019-12-11 21:07:00', '2019-12-11 05:43:52', '2019-12-10 21:07:00', NULL, '2019-12-11 04:41:52', '2019-12-11 04:41:52'),
(35, 5, 1, 10, 1, NULL, 1575922055, 'NMPY4TOSMLWV', 'Enugu 1', 8000.00, 1, 8000.00, '1,', 1, 160, 7840, NULL, 1, 0, 0, 'est', 'test@mail.com', '1345655', NULL, NULL, '2019-12-11 21:07:00', '2019-12-11 05:54:29', '2019-12-10 21:07:00', NULL, '2019-12-11 04:52:29', '2019-12-11 04:52:29'),
(36, 5, 1, 10, 1, NULL, 1575922055, 'H2P5FCQSZF6J', 'Enugu 1', 8000.00, 1, 8000.00, 'C6,', 1, 160, 7840, NULL, 1, 0, 0, 'test', 'tes@mail.com', '234234234234', NULL, NULL, '2019-12-11 21:07:00', '2019-12-11 19:20:58', '2019-12-10 21:07:00', NULL, '2019-12-11 18:18:58', '2019-12-11 18:18:58'),
(37, 1, 1, 12, 1, NULL, 1578852609, 'FLAXSS7A0PUI', '', 10000.00, 1, 10000.00, 'A1,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-01-13 06:00:00', '2020-01-13 17:33:08', '2020-01-12 06:00:00', NULL, '2020-01-13 16:28:08', '2020-01-13 16:28:08'),
(38, 1, 1, 12, 1, NULL, 1578852609, 'COTXVRMZDFM5', '', 10000.00, 1, 10000.00, 'B3,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-01-13 06:00:00', '2020-01-13 17:35:55', '2020-01-12 06:00:00', NULL, '2020-01-13 16:30:55', '2020-01-13 16:30:55'),
(39, 1, 1, 12, 1, NULL, 1578852609, 'BRJ7QHUG89P6', '', 10000.00, 1, 10000.00, 'B2,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-01-13 06:00:00', '2020-01-13 17:48:12', '2020-01-12 06:00:00', NULL, '2020-01-13 16:43:12', '2020-01-13 16:43:12'),
(40, 1, 1, 12, 1, NULL, 1578852609, 'RMCRUN3TN3SD', '', 10000.00, 1, 10000.00, 'C5,', NULL, 0, 0, NULL, 0, 0, 0, 'test', 'test@gmailc.om', '6024585516', NULL, NULL, '2020-01-13 06:00:00', '2020-01-14 04:38:24', '2020-01-12 06:00:00', NULL, '2020-01-14 03:33:24', '2020-01-14 03:33:52'),
(41, 1, 1, 15, 1, NULL, 1580110612, 'JQ2RDTPHDNYK', '', 10000.00, 2, 20000.00, 'A1, B3,', NULL, 0, 0, NULL, 1, 0, 0, 'Obi dan', 'afdsa@gmail.com', '12346567788', NULL, NULL, '2020-01-28 08:00:00', '2020-01-27 13:43:00', '2020-01-27 08:00:00', NULL, '2020-01-27 12:38:00', '2020-01-27 12:39:04'),
(42, 1, 1, 16, 1, NULL, 1580546910, 'BIGHKIT58EBX', '', 10000.00, 1, 10000.00, 'A1,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-02-02 08:00:00', '2020-02-01 14:54:19', '2020-02-01 08:00:00', NULL, '2020-02-01 13:49:19', '2020-02-01 13:49:19'),
(43, 1, 1, 16, 1, 1, 1580546910, 'EASZ5DMNCMZC', '', 10000.00, 1, 10000.00, 'B2,', NULL, 0, 0, NULL, 1, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2020-02-02 08:00:00', '2020-02-01 14:55:29', '2020-02-01 08:00:00', NULL, '2020-02-01 13:50:29', '2020-02-01 13:51:21'),
(44, 1, 1, 17, 1, NULL, 1580721704, '1EPAN6Q194UW', '', 10000.00, 1, 10000.00, 'A1,', NULL, 0, 0, NULL, 0, 0, 0, 'henry brown', 'sdjdjdjdj@gmail.com', '123456789', NULL, NULL, '2020-02-04 08:00:00', '2020-02-03 15:49:12', '2020-02-03 08:00:00', NULL, '2020-02-03 14:44:12', '2020-02-03 14:44:42'),
(45, 1, 1, 17, 1, 1, 1580721704, '1U5S7131ZCMY', '', 10000.00, 1, 10000.00, 'B2,', NULL, 0, 0, NULL, 1, 0, 0, 'anyiam chimere', 'anchimere@gmail.com', '08138006519', NULL, NULL, '2020-02-04 08:00:00', '2020-02-03 15:53:27', '2020-02-03 08:00:00', NULL, '2020-02-03 14:48:27', '2020-02-03 14:49:00'),
(46, 1, 1, 21, 1, NULL, 1583234814, 'Z2RRPURFX4VA', '', 10000.00, 2, 20000.00, 'A1, B3,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-03-04 09:00:00', '2020-03-08 22:43:20', '2020-03-03 09:00:00', NULL, '2020-03-08 21:38:20', '2020-03-08 21:38:20'),
(47, 1, 1, 21, 1, NULL, 1583234814, 'WT6YBDD0WGI5', '', 10000.00, 1, 10000.00, 'C5,', NULL, 0, 0, NULL, 1, 0, 0, 'Shalok rjrjr', 'bullet110011@gmail.com', '1234567890', NULL, NULL, '2020-03-04 09:00:00', '2020-03-14 23:20:18', '2020-03-03 09:00:00', NULL, '2020-03-14 22:15:18', '2020-03-14 22:17:30'),
(48, 1, 1, 21, 1, NULL, 1583234814, 'OYAF7MFJUSR2', '', 10000.00, 1, 10000.00, 'C4,', NULL, 0, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-03-04 09:00:00', '2020-03-14 23:28:30', '2020-03-03 09:00:00', NULL, '2020-03-14 22:23:30', '2020-03-14 22:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_cancels`
--

CREATE TABLE `ticket_cancels` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_booking_id` int(11) NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `charge` decimal(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=> pending, 1 => active, -1 => rejected',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_cancels`
--

INSERT INTO `ticket_cancels` (`id`, `user_id`, `ticket_booking_id`, `amount`, `charge`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 31, 6500.00, 1500.00, 1, NULL, '2019-12-10 01:10:15', '2019-12-10 01:11:13'),
(2, 1, 32, 8000.00, 0.00, 1, NULL, '2019-12-10 01:15:28', '2019-12-10 01:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_prices`
--

CREATE TABLE `ticket_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_route_id` int(11) DEFAULT NULL,
  `fleet_type_id` int(11) DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_prices`
--

INSERT INTO `ticket_prices` (`id`, `trip_route_id`, `fleet_type_id`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10000.00, NULL, '2019-12-02 14:37:23', '2020-03-18 15:48:54'),
(2, 2, 1, 10000.00, NULL, '2019-12-02 14:37:40', '2020-03-18 15:48:41'),
(3, 3, 2, 1222.00, NULL, '2019-12-04 20:25:36', '2020-03-18 15:46:11'),
(4, 3, 2, 500.00, NULL, '2019-12-04 20:25:56', '2020-03-18 15:46:01'),
(5, 2, 4, 10000.00, NULL, '2019-12-09 16:19:28', '2020-03-18 15:45:55'),
(6, 1, 2, 8000.00, NULL, '2019-12-09 21:07:41', '2020-03-18 15:45:49'),
(7, 5, 1, 8000.00, NULL, '2019-12-10 01:08:54', '2020-03-18 15:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `trip_assigns`
--

CREATE TABLE `trip_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_no` int(11) DEFAULT NULL,
  `fleet_registration_id` int(11) DEFAULT NULL,
  `trip_route_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `sold_ticket` int(11) DEFAULT '0',
  `total_income` decimal(8,2) DEFAULT '0.00',
  `total_expense` decimal(8,2) DEFAULT '0.00',
  `total_fuel` decimal(8,2) DEFAULT '0.00',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=> deactive, 1=> active, 2=> close',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_assigns`
--

INSERT INTO `trip_assigns` (`id`, `id_no`, `fleet_registration_id`, `trip_route_id`, `start_date`, `end_date`, `sold_ticket`, `total_income`, `total_expense`, `total_fuel`, `comment`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1575279403, 1, 1, '2019-12-03 08:00:00', '2019-12-03 16:00:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-02 14:36:43', '2019-12-02 14:36:43'),
(2, 1575396930, 1, 1, '2019-12-04 08:00:00', '2019-12-04 19:15:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-03 23:15:30', '2019-12-03 23:15:30'),
(3, 1575472952, 1, 3, '2019-12-04 20:22:00', '2019-12-04 20:22:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-04 20:22:32', '2019-12-04 20:22:32'),
(4, 1575473605, 2, 3, '2019-12-08 20:33:00', '2019-12-14 20:33:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-04 20:33:25', '2019-12-08 03:46:49'),
(5, 1575574504, 1, 1, '2019-12-06 20:34:00', '2019-12-06 20:34:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-06 00:35:04', '2019-12-06 00:35:04'),
(6, 1575741612, 2, 3, '2019-12-07 22:59:00', '2019-12-07 22:59:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-07 23:00:12', '2019-12-07 23:00:12'),
(7, 1575837239, 2, 7, '2019-12-09 01:33:00', '2019-12-09 01:33:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-09 01:33:59', '2019-12-09 01:33:59'),
(8, 1575891984, 2, 1, '2019-12-10 08:00:00', '2019-12-10 12:45:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-09 16:46:24', '2019-12-09 16:46:24'),
(9, 1575907004, 1, 1, '2019-12-10 08:00:00', '2019-12-10 16:56:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-09 20:56:44', '2019-12-09 20:56:44'),
(10, 1575922055, 1, 5, '2019-12-11 21:07:00', '2019-12-11 21:07:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-10 01:07:35', '2019-12-10 01:07:35'),
(11, 1575967138, 2, 5, '2019-12-12 08:00:00', '2019-12-12 18:00:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2019-12-10 13:38:58', '2019-12-10 13:38:58'),
(12, 1578852609, 1, 1, '2020-01-13 06:00:00', '2020-01-13 19:10:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-01-12 23:10:09', '2020-01-12 23:10:09'),
(13, 1578852663, 2, 1, '2020-01-13 08:00:00', '2020-01-13 19:10:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-01-12 23:11:03', '2020-01-12 23:11:03'),
(14, 1578939771, 1, 1, '2020-01-17 23:22:00', '2020-01-17 23:22:00', 0, 0.00, 0.00, 0.00, NULL, 2, NULL, '2020-01-13 23:22:51', '2020-01-14 17:32:13'),
(15, 1580110612, 1, 1, '2020-01-28 08:00:00', '2020-01-28 11:36:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-01-27 12:36:52', '2020-01-27 12:36:52'),
(16, 1580546910, 1, 1, '2020-02-02 08:00:00', '2020-02-02 10:30:00', 0, 0.00, 0.00, 0.00, NULL, 2, NULL, '2020-02-01 13:48:30', '2020-02-01 13:58:29'),
(17, 1580721704, 1, 1, '2020-02-04 08:00:00', '2020-02-04 11:00:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-02-03 14:21:44', '2020-02-03 14:31:47'),
(18, 1580721723, 2, 1, '2020-02-04 08:00:00', '2020-02-04 23:00:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-02-03 14:22:03', '2020-02-03 14:32:34'),
(19, 1582013765, 1, 1, '2020-02-19 08:00:00', '2020-02-19 18:00:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-02-18 13:16:05', '2020-02-18 13:16:05'),
(20, 1582013811, 2, 1, '2020-02-19 08:00:00', '2020-02-19 18:00:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-02-18 13:16:51', '2020-02-18 13:16:51'),
(21, 1583234814, 1, 1, '2020-03-04 09:00:00', '2020-03-04 18:25:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-03-03 16:26:54', '2020-03-08 21:20:00'),
(22, 1583234852, 2, 1, '2020-03-04 07:00:00', '2020-03-04 06:00:00', 0, 0.00, 0.00, 0.00, NULL, 1, NULL, '2020-03-03 16:27:32', '2020-03-08 21:19:21'),
(23, 1584527798, 2, 2, '2020-03-18 15:07:00', '2020-03-19 15:07:00', 0, 0.00, 0.00, 0.00, NULL, 0, NULL, '2020-03-18 15:36:38', '2020-03-18 15:36:38'),
(24, 1584527921, 1, 4, '2020-03-18 15:07:00', '2020-03-18 15:07:00', 0, 0.00, 0.00, 0.00, NULL, 0, NULL, '2020-03-18 15:38:41', '2020-03-18 15:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `trip_locations`
--

CREATE TABLE `trip_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `google_map` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_locations`
--

INSERT INTO `trip_locations` (`id`, `name`, `description`, `google_map`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Abuja', NULL, NULL, NULL, 1, NULL, '2019-12-02 14:30:54', '2019-12-02 14:30:54'),
(2, 'Lagos', NULL, NULL, NULL, 1, NULL, '2019-12-02 14:31:07', '2019-12-02 14:31:07'),
(3, 'Owerri', NULL, NULL, NULL, 1, NULL, '2019-12-04 20:16:26', '2019-12-05 01:16:39'),
(4, 'Awka', NULL, NULL, NULL, 1, NULL, '2019-12-09 00:00:26', '2019-12-09 00:00:26'),
(5, 'Enugu', NULL, NULL, NULL, 1, NULL, '2019-12-09 00:00:48', '2019-12-09 00:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `trip_routes`
--

CREATE TABLE `trip_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_point` int(11) DEFAULT NULL,
  `start_point_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_point` int(11) DEFAULT NULL,
  `end_point_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stoppage` text COLLATE utf8mb4_unicode_ci,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approximate_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_routes`
--

INSERT INTO `trip_routes` (`id`, `name`, `start_point`, `start_point_name`, `end_point`, `end_point_name`, `stoppage`, `distance`, `approximate_time`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Abuja - Lagos', 1, 'Abuja', 2, 'Lagos', 'Area 1', '300', '5', 1, NULL, '2019-12-02 14:32:56', '2019-12-02 14:32:56'),
(2, 'Lagos - Abuja', 2, 'Lagos', 1, 'Abuja', 'Lagos 1', '300', '5', 1, NULL, '2019-12-02 14:35:05', '2019-12-02 14:35:05'),
(3, 'Owerri - Lagos', 3, 'Owerri', 2, 'Lagos', 'Owerri', '500', '5', 1, NULL, '2019-12-04 20:18:33', '2019-12-05 01:17:16'),
(4, 'Abuja - Enugu', 1, 'Abuja', 5, 'Enugu', 'Area 1', '300', '5', 1, NULL, '2019-12-09 00:03:04', '2019-12-09 00:03:04'),
(5, 'Enugu - Abuja', 5, 'Enugu', 1, 'Abuja', 'Enugu 1', '300', '5', 1, NULL, '2019-12-09 00:04:44', '2019-12-09 00:04:44'),
(6, 'Abuja - Owerri', 1, 'Abuja', 3, 'Owerri', 'Area 1', '300', '5', 1, NULL, '2019-12-09 00:08:04', '2019-12-09 00:08:04'),
(7, 'Owerri - Abuja', 3, 'Owerri', 1, 'Abuja', 'owerri 1', '300', '5', 1, NULL, '2019-12-09 00:08:59', '2019-12-09 00:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `trxes`
--

CREATE TABLE `trxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `main_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL COMMENT '1 => user, 2 => agent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxes`
--

INSERT INTO `trxes` (`id`, `user_id`, `email`, `amount`, `main_amo`, `charge`, `type`, `title`, `trx`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '10', '10', '0', '+', 'Deposit Via Credit Card', 'TRX-363530273410', 2, '2019-12-02 20:06:01', '2019-12-02 20:06:01'),
(2, 1, NULL, '1222', '-1212', '0', '-', 'Oman - Lagos ( 04 Dec 2019 08:33 PM ) Seats: A2,', 'TRX-917190981146', 2, '2019-12-04 21:17:06', '2019-12-04 21:17:06'),
(3, 1, NULL, '24.44', '-1187.56', '0', '+', 'Commission From Oman - Lagos ( 04 Dec 2019 08:33 PM ) Seats: A2,', 'TRX-958846629541', 2, '2019-12-04 21:17:06', '2019-12-04 21:17:06'),
(4, 1, 'anchimere@gmail.com', '10000.00', NULL, '0', '+', 'Payment Paid Via PayStack', '5xnWtWBW8v5eL0bp', NULL, '2019-12-06 00:37:19', '2019-12-06 00:37:19'),
(5, 1, 'anchimere@gmail.com', '40000.00', NULL, '0', '+', 'Payment Paid Via PayStack', 'llkIZDvROj6ojVb6', NULL, '2019-12-06 00:48:17', '2019-12-06 00:48:17'),
(6, 1, NULL, '1222', '-34.44', '0', '-', 'Owerri - Lagos ( 08 Dec 2019 08:33 PM ) Seats: 2,', 'TRX-707144590479', 2, '2019-12-08 05:12:36', '2019-12-08 05:12:36'),
(14, 0, 'abujajak@gmail.com', '1222.00', NULL, '0', '+', 'Payment Paid Via PayStack', 't3FO0sKOCPBiNdct', NULL, '2019-12-09 15:09:15', '2019-12-09 15:09:15'),
(15, 0, 'ajajaj@gmail.com', '10000.00', NULL, '0', '+', 'Payment Paid Via PayStack', 'Je7UDwyNC8rzmiZn', NULL, '2019-12-09 21:12:32', '2019-12-09 21:12:32'),
(16, 1, 'anchimere@gmail.com', '8000.00', NULL, '0', '+', 'Payment Paid Via PayStack', 'Zuqt85NspiwURBc3', NULL, '2019-12-10 01:09:43', '2019-12-10 01:09:43'),
(17, 1, NULL, '6500', '6500', '1500', '+', 'Wed 11 Dec 2019 09:07 PM (Enugu-Abuja) Trip has been Cancelled <br> PNR: 86MCMNOKTXSX', 'TRX-92444806900', 1, '2019-12-10 01:11:13', '2019-12-10 01:11:13'),
(18, 1, 'anchimere@gmail.com', '8000.00', NULL, '0', '+', 'Payment Paid Via PayStack', 'wcrCg51fkzll0l9m', NULL, '2019-12-10 01:14:37', '2019-12-10 01:14:37'),
(19, 1, NULL, '8000', '14500', '0', '+', 'Wed 11 Dec 2019 09:07 PM (Enugu-Abuja) Trip has been Cancelled <br> PNR: 15R7JZEKETN2', 'TRX-994935589008', 1, '2019-12-10 01:16:46', '2019-12-10 01:16:46'),
(20, 0, 'afdsa@gmail.com', '20000.00', NULL, '0', '+', 'Payment Paid Via PayStack', '50CeOcUcFGbOTKTD', NULL, '2020-01-27 12:39:04', '2020-01-27 12:39:04'),
(21, 1, 'anchimere@gmail.com', '10000.00', NULL, '0', '+', 'Payment Paid Via PayStack', 'HFMzrnLQySxIRK3M', NULL, '2020-02-01 13:51:21', '2020-02-01 13:51:21'),
(22, 1, 'anchimere@gmail.com', '10000.00', NULL, '0', '+', 'Payment Paid Via PayStack', 'xQoDwj8pQCK24tky', NULL, '2020-02-03 14:49:00', '2020-02-03 14:49:00'),
(23, 0, 'bullet110011@gmail.com', '10000.00', NULL, '0', '+', 'Payment Paid Via PayStack', '60zMZ0canCri6HXj', NULL, '2020-03-14 22:17:30', '2020-03-14 22:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verify` tinyint(4) NOT NULL DEFAULT '0',
  `email_verify` tinyint(4) NOT NULL DEFAULT '0',
  `email_time` datetime DEFAULT NULL,
  `phone_time` datetime DEFAULT NULL,
  `refer` int(11) NOT NULL DEFAULT '0',
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `login_time` datetime DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` text COLLATE utf8mb4_unicode_ci,
  `doc_verify` int(11) NOT NULL DEFAULT '0',
  `tauth` int(11) DEFAULT '0',
  `tfver` int(11) DEFAULT '1',
  `secretcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `image`, `password`, `verification_code`, `sms_code`, `phone_verify`, `email_verify`, `email_time`, `phone_time`, `refer`, `level`, `reference`, `balance`, `status`, `login_time`, `address`, `city`, `zip_code`, `country`, `provider`, `provider_id`, `doc_verify`, `tauth`, `tfver`, `secretcode`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anyiam', 'chimere', 'mere212', 'anchimere@gmail.com', '08138006519', NULL, '$2y$10$qKTPkGEPCIe5L9sARCcPA.fd7IXLFSSEr0hJj1ARlKcxggTvWlOyi', '397684', '137638', 1, 1, '2019-12-04 00:12:57', '2019-12-04 00:12:57', 0, 0, NULL, '14500', 1, '2020-02-03 15:47:14', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, 'uQ9aaBZstATnf11LThKiw0GrEXzJMcNyVswr6W6K2pBK8qeZ6ptAkTm4j4PA', '2019-12-03 23:07:57', '2020-02-03 14:47:14'),
(2, 'Aimal', 'Miakhel', 'aimal', 'aimal_gul@yahoo.com', '+93772844220', NULL, '$2y$10$FNkvPV8Bpt7h8uvoElxNtuCnan9AS1hq7Sn4ma5xjePcfg2COC2Ai', '534903', '604555', 1, 1, '2020-03-18 16:26:14', '2020-03-18 16:26:14', 0, 0, NULL, '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, 'DAtk5mXYH8bckbbr5EQmkxuKCV9mKmpEA2JKlYe9ogRdQraVHByHqwWPGb4G', '2020-03-18 15:21:15', '2020-03-18 15:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `location`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, '165.73.240.84', NULL, NULL, '2019-12-03 23:13:05', '2019-12-03 23:13:05'),
(2, 1, '197.242.123.18', NULL, NULL, '2019-12-04 13:03:36', '2019-12-04 13:03:36'),
(3, 1, '180.210.221.34', NULL, NULL, '2019-12-04 13:39:09', '2019-12-04 13:39:09'),
(4, 1, '154.118.90.138', NULL, NULL, '2019-12-05 00:01:20', '2019-12-05 00:01:20'),
(5, 1, '165.73.240.84', NULL, NULL, '2019-12-06 00:35:49', '2019-12-06 00:35:49'),
(6, 1, '41.217.39.244', NULL, NULL, '2019-12-09 01:33:55', '2019-12-09 01:33:55'),
(7, 1, '197.210.70.42', NULL, NULL, '2019-12-09 15:10:24', '2019-12-09 15:10:24'),
(8, 1, '197.210.70.42', NULL, NULL, '2019-12-09 15:10:45', '2019-12-09 15:10:45'),
(9, 1, '197.210.70.42', NULL, NULL, '2019-12-09 15:28:26', '2019-12-09 15:28:26'),
(10, 1, '41.217.16.195', NULL, NULL, '2019-12-10 01:06:38', '2019-12-10 01:06:38'),
(11, 1, '197.210.52.129', NULL, NULL, '2020-02-01 13:49:42', '2020-02-01 13:49:42'),
(12, 1, '209.95.56.51', NULL, NULL, '2020-02-03 14:47:14', '2020-02-03 14:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `why_uses`
--

CREATE TABLE `why_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_uses`
--

INSERT INTO `why_uses` (`id`, `name`, `icon`, `image`, `designation`, `details`, `created_at`, `updated_at`) VALUES
(2, 'Parcel Service', '<i class=\"fa fa-bus\"></i>', NULL, NULL, 'There are many variations of the is a passages of Lorem Ipsum that available majority.', '2019-12-02 21:54:35', '2019-12-02 21:54:35'),
(3, 'Haulage', '<i class=\"fa fa-bus\"></i>', NULL, NULL, 'There are many variations of the is a passages of Lorem Ipsum that available majority.', '2019-12-02 21:55:33', '2019-12-02 21:55:33'),
(4, 'Logistics Services', '<i class=\"fa fa-bus\"></i>', NULL, NULL, 'There are many variations of the is a passages of Lorem Ipsum that available majority.', '2019-12-02 21:55:56', '2020-01-27 12:31:27'),
(5, 'Diplomatic Escort', '<i class=\"fa fa-bus\"></i>', NULL, NULL, 'There are many variations of the is a passages of Lorem Ipsum that available majority.', '2019-12-02 21:56:39', '2019-12-02 21:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_logs`
--

CREATE TABLE `withdraw_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1=> Users, 2 => Agent',
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_details` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=> Pending, 2 =>Approved, -2 => Refunded',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdraw_min` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_max` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleet_facilities`
--
ALTER TABLE `fleet_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleet_registrations`
--
ALTER TABLE `fleet_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleet_types`
--
ALTER TABLE `fleet_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_pdfs`
--
ALTER TABLE `log_pdfs`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `popular_destinations`
--
ALTER TABLE `popular_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_tours`
--
ALTER TABLE `popular_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_bookings`
--
ALTER TABLE `ticket_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_cancels`
--
ALTER TABLE `ticket_cancels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_assigns`
--
ALTER TABLE `trip_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_locations`
--
ALTER TABLE `trip_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_routes`
--
ALTER TABLE `trip_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trxes`
--
ALTER TABLE `trxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_uses`
--
ALTER TABLE `why_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_logs`
--
ALTER TABLE `withdraw_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fleet_facilities`
--
ALTER TABLE `fleet_facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fleet_registrations`
--
ALTER TABLE `fleet_registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fleet_types`
--
ALTER TABLE `fleet_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_pdfs`
--
ALTER TABLE `log_pdfs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `popular_destinations`
--
ALTER TABLE `popular_destinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `popular_tours`
--
ALTER TABLE `popular_tours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_bookings`
--
ALTER TABLE `ticket_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ticket_cancels`
--
ALTER TABLE `ticket_cancels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trip_assigns`
--
ALTER TABLE `trip_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `trip_locations`
--
ALTER TABLE `trip_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trip_routes`
--
ALTER TABLE `trip_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trxes`
--
ALTER TABLE `trxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `why_uses`
--
ALTER TABLE `why_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdraw_logs`
--
ALTER TABLE `withdraw_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
