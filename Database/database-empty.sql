-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2020 at 04:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empty`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_box`
--

CREATE TABLE `tbl_ads_box` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci,
  `size` text COLLATE utf8_persian_ci NOT NULL,
  `position` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `url` text COLLATE utf8_persian_ci NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL DEFAULT 'draft',
  `sort` int(11) NOT NULL DEFAULT '1',
  `create_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_plan`
--

CREATE TABLE `tbl_ads_plan` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `price` int(11) NOT NULL,
  `day` int(11) DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_request`
--

CREATE TABLE `tbl_ads_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `mode` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `transaction` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

CREATE TABLE `tbl_article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `pre_text` text COLLATE utf8_persian_ci NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `mode` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `view` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article_rate`
--

CREATE TABLE `tbl_article_rate` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balance_log`
--

CREATE TABLE `tbl_balance_log` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci,
  `description` text COLLATE utf8_persian_ci,
  `type` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `account` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `exporter_id` int(11) DEFAULT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_category`
--

CREATE TABLE `tbl_blog_category` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_comments`
--

CREATE TABLE `tbl_blog_comments` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` text COLLATE utf8_persian_ci,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_persian_ci,
  `post_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_posts`
--

CREATE TABLE `tbl_blog_posts` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `pre_content` text COLLATE utf8_persian_ci,
  `content` text COLLATE utf8_persian_ci,
  `category_id` int(11) DEFAULT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) DEFAULT NULL,
  `tags` text COLLATE utf8_persian_ci,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents`
--

CREATE TABLE `tbl_contents` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci,
  `content` text COLLATE utf8_persian_ci,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `support` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `document` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `post` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `price` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `price_post` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `private` int(11) DEFAULT '0',
  `request` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `prerequisite` text COLLATE utf8_persian_ci,
  `tag` text COLLATE utf8_persian_ci,
  `view` int(11) NOT NULL DEFAULT '0',
  `support_rate` int(11) NOT NULL DEFAULT '0',
  `create_at` int(11) NOT NULL,
  `update_at` int(11) DEFAULT NULL,
  `download` int(1) NOT NULL DEFAULT '1',
  `price_3` float DEFAULT NULL,
  `price_6` float DEFAULT NULL,
  `price_9` float DEFAULT NULL,
  `price_12` float DEFAULT NULL,
  `subscribe_3` text COLLATE utf8_persian_ci,
  `subscribe_6` text COLLATE utf8_persian_ci,
  `subscribe_9` text COLLATE utf8_persian_ci,
  `subscribe_12` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_category`
--

CREATE TABLE `tbl_contents_category` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci,
  `image` text COLLATE utf8_persian_ci,
  `parent_id` int(11) DEFAULT NULL,
  `class` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `commision` int(11) DEFAULT NULL,
  `color` varchar(20) COLLATE utf8_persian_ci NOT NULL DEFAULT '#FFAB00',
  `background` text COLLATE utf8_persian_ci,
  `icon` text COLLATE utf8_persian_ci,
  `req_icon` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_category_filter`
--

CREATE TABLE `tbl_contents_category_filter` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `filter` text COLLATE utf8_persian_ci NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_category_filter_tag`
--

CREATE TABLE `tbl_contents_category_filter_tag` (
  `id` bigint(20) NOT NULL,
  `filter_id` bigint(20) NOT NULL,
  `tag` text COLLATE utf8_persian_ci NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_category_filter_tag_relation`
--

CREATE TABLE `tbl_contents_category_filter_tag_relation` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_category_relation`
--

CREATE TABLE `tbl_contents_category_relation` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_comment`
--

CREATE TABLE `tbl_contents_comment` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` text COLLATE utf8_persian_ci,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_persian_ci,
  `content_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_meta`
--

CREATE TABLE `tbl_contents_meta` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `option` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `value` text COLLATE utf8_persian_ci,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_part`
--

CREATE TABLE `tbl_contents_part` (
  `id` bigint(20) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `content_id` int(11) NOT NULL,
  `upload_video` text COLLATE utf8_persian_ci,
  `upload_image` text COLLATE utf8_persian_ci,
  `upload_screen` text COLLATE utf8_persian_ci,
  `duration` varchar(20) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `size` varchar(20) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `video` text COLLATE utf8_persian_ci,
  `image` text COLLATE utf8_persian_ci,
  `screen` text COLLATE utf8_persian_ci,
  `view` int(11) NOT NULL DEFAULT '0',
  `free` int(1) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `server` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `request` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `create_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_support`
--

CREATE TABLE `tbl_contents_support` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `supporter_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_persian_ci,
  `content_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '1',
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents_vip`
--

CREATE TABLE `tbl_contents_vip` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `first_date` int(11) NOT NULL,
  `last_date` int(11) NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_rate`
--

CREATE TABLE `tbl_content_rate` (
  `id` bigint(20) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `off` int(11) NOT NULL,
  `off_id` int(11) DEFAULT NULL,
  `first_date` int(11) NOT NULL,
  `last_date` int(11) NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emails_template`
--

CREATE TABLE `tbl_emails_template` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `template` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL,
  `type` text NOT NULL,
  `mode` text,
  `user_id` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorite`
--

CREATE TABLE `tbl_favorite` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow`
--

CREATE TABLE `tbl_follow` (
  `id` bigint(20) NOT NULL,
  `follower` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gifts`
--

CREATE TABLE `tbl_gifts` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `msg` text COLLATE utf8_persian_ci,
  `code` varchar(64) COLLATE utf8_persian_ci DEFAULT NULL,
  `off` int(11) DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `create_at` int(11) NOT NULL,
  `expire_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` text,
  `updated_at` text,
  `created_at_sh` int(11) DEFAULT NULL,
  `updated_at_sh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `msg` text COLLATE utf8_persian_ci,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `title` text COLLATE utf8_persian_ci,
  `mode` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `recipent_type` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `recipent_list` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_status`
--

CREATE TABLE `tbl_notification_status` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_template`
--

CREATE TABLE `tbl_notification_template` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `template` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE `tbl_option` (
  `id` int(11) NOT NULL,
  `option` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `value` text COLLATE utf8_persian_ci,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`id`, `option`, `value`, `mode`) VALUES
(5, 'site_email', 'mail@yourdomain.eu', ''),
(6, 'site_title', 'Proacademy', ''),
(7, 'blog_comment', '1', NULL),
(8, 'blog_post_count', '6', NULL),
(10, 'main_page_popular_container', '1', NULL),
(11, 'category_content_count', '9', NULL),
(12, 'main_page_newest_container', '1', NULL),
(13, 'category_most_sell_container', '1', NULL),
(15, 'main_page_blog_post_count', '2', NULL),
(16, 'video_watermark', '/bin/admin/files/cmsdef/gray.png', NULL),
(17, 'content_terms', '<p>Read terms & rules before using Proacademy.</p>', NULL),
(18, 'chart_day_count', '15', NULL),
(20, 'site_income', '50', NULL),
(21, 'user_register_mode', 'deactive', NULL),
(22, 'user_register_active_email', '4', NULL),
(23, 'user_register_wellcome_email', '5', NULL),
(24, 'site_withdraw_price', '25000', NULL),
(25, 'factor_watermark', '/bin/admin/files/cmsdef/logo-small.png', NULL),
(26, 'factor_seconder', 'John', NULL),
(27, 'factor_approver', 'Albert', NULL),
(28, 'site_disable', '0', NULL),
(29, 'site_popup', '0', NULL),
(30, 'popup_image', '/bin/admin/files/feastival.png', NULL),
(31, 'popup_url', '/', NULL),
(32, 'main_page_slider_content', '22', NULL),
(33, 'multiselect', '22', NULL),
(34, 'main_page_slider_timer', '9000', NULL),
(35, 'footer_col1_title', 'About Proacademy', NULL),
(36, 'footer_col1_content', '<p style=\"text-align:left\">Pro Academy is very professional learning &amp; teaching platform. You can simply upload your courses &amp; learn from professional educators online. Pro Academy has many built-in features that can resolve all your needs.</p>', NULL),
(37, 'footer_col2_title', 'Links', NULL),
(38, 'footer_col2_content', '<ul>\r\n	<li style=\"text-align:justify\">About Us</li>\r\n	<li style=\"text-align:justify\">Contact Us</li>\r\n	<li style=\"text-align:justify\">Terms &amp; Rules</li>\r\n	<li style=\"text-align:justify\">FAQ</li>\r\n	<li style=\"text-align:justify\">Knowledgebase</li>\r\n	<li style=\"text-align:justify\">Vendors Panel</li>\r\n	<li style=\"text-align:justify\">Start Learning</li>\r\n</ul>', NULL),
(39, 'footer_col3_title', 'Payment Gateways', NULL),
(40, 'footer_col3_content', '<p style=\"text-align: left;\"><img src=\"data:image/png;base64,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\" data-filename=\"paypal.png\" style=\"width: 128px;\"><br></p>', NULL),
(41, 'footer_col4_title', 'Guaranty', NULL),
(42, 'footer_col4_content', '<p><img src=\"data:image/png;base64,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\" data-filename=\"shield (1).png\" style=\"width: 128px;\"><br></p>', NULL),
(43, 'site_logo', '/bin/admin/files/cmsdef/main-logo.png', NULL),
(44, 'site_logo_type', '/bin/admin/files/cmsdef/logotype.png', NULL),
(45, 'request_page_icon', '/bin/admin/files/10-min.png', NULL),
(46, 'request_term', '<p>Before send your request, read term and rules.</p>', NULL),
(47, 'site_videoads', '0', NULL),
(48, 'site_videoads_source', 'https://vast.richmediaads.com/vast.php?xmlpath=taggenerator/vast-xml/DBM1572679627325.xml&pageLoadId=${CACHEBUSTER}&cb=${CACHEBUSTER}&dsp=dbm&exchange=${EXCHANGE_ID}&inventory=${SOURCE_URL}&uniqueId=&ct=${CLICK_URL}', NULL),
(49, 'site_videoads_poster', '/bin/admin/files/cmsdef/preroll-ads-cover.jpg', NULL),
(50, 'site_videoads_url', '', NULL),
(51, 'site_videoads_time', '7', NULL),
(52, 'seller_not_apply', 'Dear user, your financial & identity information not verified. It can cause a delay in the payout process.', NULL),
(53, 'notification_template_change_group', '7', NULL),
(54, 'notification_template_get_medal', '8', NULL),
(55, 'notification_template_delete_medal', '9', NULL),
(56, 'notification_template_content_pre_publish', '10', NULL),
(57, 'notification_template_content_publish', '11', NULL),
(58, 'notification_template_content_change', '11', NULL),
(59, 'notification_template_content_delete', '13', NULL),
(60, 'notification_template_content_comment_new', '14', NULL),
(61, 'notification_template_content_support_new', '15', NULL),
(62, 'notification_template_request_get', '16', NULL),
(63, 'notification_template_request_publish', '17', NULL),
(64, 'notification_template_request_draft', '18', NULL),
(65, 'notification_template_request_req', '19', NULL),
(66, 'notification_template_request_follow', '20', NULL),
(67, 'notification_template_ticket_new', '21', NULL),
(68, 'notification_template_ticket_reply', '22', NULL),
(69, 'notification_template_withdraw_new', '23', NULL),
(70, 'notification_template_withdraw_pay', '24', NULL),
(71, 'notification_template_buy_new', '25', NULL),
(72, 'notification_template_sell_new', '26', NULL),
(73, 'notification_template_feedback_new', '27', NULL),
(74, 'notification_template_buy_post_withdraw', NULL, NULL),
(75, 'article_post_count', '6', NULL),
(76, 'main_page_article_post_count', '4', NULL),
(77, 'main_page_slide', '/bin/admin/files/cover(7).jpg', NULL),
(78, 'upload_page_background', '/bin/admin/files/cmsdef/upload.jpg', NULL),
(79, 'main_js', NULL, NULL),
(80, 'main_css', NULL, NULL),
(81, 'login_page_background', '/bin/admin/files/cmsdef/login3.jpg', NULL),
(82, 'pages_content_delete', '<p>Sample page</p>', NULL),
(83, 'pages_terms', '<p dir=\"RTL\" style=\"\">Terms & rules goes here.</p><ul>\r\n</ul>', NULL),
(84, 'pages_contact', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"/bin/admin/images/Capture11.png\" style=\"height:467px; width:600px\"></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><img alt=\"\" src=\"https://www.shareicon.net/data/32x32/2016/09/10/828132_gps_400x512.png\" style=\"height:16px; width:16px\">&nbsp;Address goes here</span></p>\r\n\r\n<p><span style=\"font-size:18px\"><img alt=\"\" src=\"https://www.shareicon.net/data/32x32/2016/02/05/714409_phone_512x512.png\" style=\"height:18px; width:18px\">&nbsp;+1-283 526236</span></p>\r\n\r\n<p><span style=\"font-size:18px\"><img alt=\"\" src=\"https://www.shareicon.net/data/32x32/2015/12/30/695303_email_512x512.png\" style=\"height:18px; width:18px\">&nbsp;sales@proacademy.eu</span></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">&nbsp;</p>', NULL),
(85, 'pages_about', '<p style=\"\"><span style=\"text-align: center;\">Pro Academy is a very professional learning &amp; teaching platform. You can simply upload your courses &amp; learn from professional educators online. Pro Academy has many built-in features that can resolve all your needs.</span><br></p>', NULL),
(86, 'pages_help', '<p>Help and tips go here.</p>', NULL),
(87, 'pages_content_update', '<p>Sample page</p>', NULL),
(88, 'site_income_private', '30', NULL),
(89, 'main_page_slide_title', 'Professional Learning & Teaching Platform', NULL),
(90, 'main_page_slide_text', 'Pro Academy is very professional learning & teaching platform. You can simply upload your courses & learn from professional educators online. Pro Academy has many built-in features that can resolve all your needs.', NULL),
(91, 'main_page_slide_btn_1_text', 'Start Learning', NULL),
(92, 'main_page_slide_btn_2_text', 'Start Teaching', NULL),
(93, 'main_page_slide_btn_1_url', '/category/', NULL),
(94, 'main_page_slide_btn_2_url', '/user/content/new', NULL),
(95, 'main_page_vip_container', '1', NULL),
(96, 'default_avatar', '/bin/admin/files/10179153.jpg', NULL),
(97, 'default_user_avatar', '/bin/admin/files/boy.svg', NULL),
(98, 'default_user_cover', '/bin/admin/files/ctest4.jpg', NULL),
(99, 'default_chanel_icon', '/bin/admin/files/cmsdef/default-channel.svg', NULL),
(100, 'default_chanel_cover', '/bin/admin/files/ctest4.jpg', NULL),
(101, 'user_register_rest_email', NULL, NULL),
(102, 'user_register_new_password_email', '7', NULL),
(103, 'user_register_reset_email', '6', NULL),
(104, 'triangle-banner-top-image', NULL, NULL),
(105, 'triangle-banner-top-url', NULL, NULL),
(106, 'triangle-banner-bottom-image', NULL, NULL),
(107, 'triangle-banner-bottom-url', '#test', NULL),
(108, 'banner-html-box', NULL, NULL),
(109, 'email_notification_template', '8', NULL),
(110, 'currency', 'USD', NULL),
(111, 'site_rtl', '0', NULL),
(112, 'site_videoads_title', 'test', NULL),
(113, 'site_videoads_roll_type', 'preRoll', NULL),
(114, 'site_description', 'description', NULL),
(115, 'gateway_paypal', '0', NULL),
(116, 'gateway_paytm', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_point`
--

CREATE TABLE `tbl_point` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `preferential_id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_record`
--

CREATE TABLE `tbl_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci,
  `description` text COLLATE utf8_persian_ci,
  `mode` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_record_fans`
--

CREATE TABLE `tbl_record_fans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `category_id` int(11) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_fans`
--

CREATE TABLE `tbl_request_fans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_suggestion`
--

CREATE TABLE `tbl_request_suggestion` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sells`
--

CREATE TABLE `tbl_sells` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `post_code` varchar(60) COLLATE utf8_persian_ci DEFAULT NULL,
  `post_code_date` bigint(20) DEFAULT NULL,
  `post_confirm` text COLLATE utf8_persian_ci,
  `post_feedback` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `create_at` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `remain_time` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sells_rate`
--

CREATE TABLE `tbl_sells_rate` (
  `id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci,
  `link` text COLLATE utf8_persian_ci,
  `icon` text COLLATE utf8_persian_ci,
  `sort` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets`
--

CREATE TABLE `tbl_tickets` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL DEFAULT '0',
  `update_at` int(11) DEFAULT '0',
  `mode` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `position` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `attach` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets_category`
--

CREATE TABLE `tbl_tickets_category` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets_msg`
--

CREATE TABLE `tbl_tickets_msg` (
  `id` bigint(20) NOT NULL,
  `ticket_id` bigint(20) NOT NULL,
  `title` text COLLATE utf8_persian_ci,
  `msg` text COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mode` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `attach` text COLLATE utf8_persian_ci,
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets_user`
--

CREATE TABLE `tbl_tickets_user` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_content` float DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `authority` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL DEFAULT '0',
  `bank` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `income` float NOT NULL DEFAULT '0',
  `gift` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `balance_id` int(11) NOT NULL DEFAULT '0',
  `remain_time` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_charge`
--

CREATE TABLE `tbl_transaction_charge` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `authority` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL DEFAULT '0',
  `bank` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usage`
--

CREATE TABLE `tbl_usage` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at_sh` bigint(20) NOT NULL,
  `updated_at_sh` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `name` text COLLATE utf8_persian_ci,
  `email` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci,
  `income` float NOT NULL DEFAULT '0',
  `credit` float NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `mode` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `admin` int(1) NOT NULL,
  `token` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `create_at` int(11) NOT NULL,
  `update_at` int(11) DEFAULT NULL,
  `last_view` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `rate_point` varchar(5) COLLATE utf8_persian_ci DEFAULT NULL,
  `rate_count` int(11) NOT NULL DEFAULT '0',
  `vendor` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `name`, `email`, `address`, `income`, `credit`, `category_id`, `mode`, `admin`, `token`, `create_at`, `update_at`, `last_view`, `view`, `rate_point`, `rate_count`, `vendor`) VALUES
(3, 'admin', 'eyJpdiI6Ikw4UkhmXC9maVFITHNScyt1UExHa1NnPT0iLCJ2YWx1ZSI6IkdMNDhDbm44WFJUZFNFUHJPeXZGNkE9PSIsIm1hYyI6IjYwNzQ2NGMxMzEzMzA2OTg1NDhmNDA5ZjFkMjQyZjlhNDM1MTkxYjM4NTFhZjQ1YTk5NDUwNDFjMTM5NGJjMGEifQ==', 'Admin', 'proacademy@gmail.com', '', 0, 0, 1, 'active', 1, '', 1494577990, 0, 1583513518, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_category`
--

CREATE TABLE `tbl_users_category` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `off` int(11) DEFAULT NULL,
  `commision` int(11) DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `catability` text COLLATE utf8_persian_ci,
  `image` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_meta`
--

CREATE TABLE `tbl_users_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `option` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `value` text COLLATE utf8_persian_ci,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_users_meta`
--

INSERT INTO `tbl_users_meta` (`id`, `user_id`, `option`, `value`, `mode`) VALUES
(297, 109, 'biography', 'Android programmer at Balovin company', NULL),
(298, 109, 'short_biography', 'Android programmer at Balovin company', NULL),
(299, 109, 'state', 'Michigan', NULL),
(300, 109, 'city', 'Saginaw', NULL),
(301, 109, 'birthday', NULL, NULL),
(302, 109, 'old', NULL, NULL),
(310, 115, 'avatar', '/bin/James%20Smith/0_JS176272969.jpg', NULL),
(311, 115, 'profile_image', NULL, NULL),
(319, 107, 'biography', 'Hey, I\'m Ben. I am a Graphic Artist from Brisbane, Australia.\r\n\r\nOver the past twenty years or so I\'ve been passionately sketching, drawing, painting and digitally crafting my own brand of cartooning and kawaii styled characters. \r\n\r\nI love teaching kids and adults to draw. I believe that drawing is a skill for life which brings so much joy to family and friends. I also specialise in business branding and design. This line of work allows me free time to share my cartooning secrets with people like you.\r\n\r\nYou won\'t believe the creative freedom that being able to draw offers. Sign up and find out for yourself why so many people are taking and recommending this course. I genuinely believe it\'s the best cute cartoon drawing course on the market and if you don\'t agree, I\'ll happily refund your money. \r\n\r\nSign up to How to Draw Cute Cartoon Characters and join me in this amazing adventure, today.', NULL),
(320, 107, 'short_biography', 'Graphic Artist and Instructor\r\nHey, I\'m Ben. I am a Graphic Artist from Brisbane, Australia.', NULL),
(326, 117, 'biography', 'After several rounds of antibiotics, he was finally cured with Homeopathy. He has never had to use antibiotics again, and for the past 12 years, he has been successfully treated with homeopathy for all of his illnesses.\r\n\r\nUp to that point I had embraced western medicine, but this experience caused me to question its non-holistic approach and effectiveness, particularly when I observed how detrimental the treatment was for my son.\r\n\r\nI had been working in Silicon Valley as an electrical engineer and in product marketing for 15 years and was wanting to make a career change. After further success using Homeopathy for myself and my family, I became convinced of the need for safe and effective holistic treatment for common illnesses, and out of this concern and passion came my decision to pursue Homeopathy as a career.\r\n\r\nI left a position in Sun Microsystems Product Marketing and enrolled in the Institute of Classical Homeopathy (ICH) in San Francisco in September, 1996. I have practiced Classical Homeopathy in the San Francisco Bay Area since 2000. I also taught Homeopathy at the ICH for 3 years. In the past 10 years I have given many classes on Homeopathy at health clubs, junior colleges, yoga studios and alternative pharmacies. I currently teach at the Academy of Classical Homeopathy and have a thriving practice in Los Altos, CA.', NULL),
(327, 117, 'short_biography', 'Classical Homeopathic Practitioner\r\nMy personal experience with the remarkable effects of homeopathy is what led me to pursue a career as a professional homeopath. My son was diagnosed with strep throat five times in six months.', NULL),
(328, 117, 'state', NULL, NULL),
(329, 117, 'city', 'Finland', NULL),
(330, 117, 'birthday', NULL, NULL),
(331, 117, 'old', NULL, NULL),
(332, 117, 'phone', NULL, NULL),
(333, 112, 'biography', 'I currently have 70 Courses with 20,280+ Minutes of Content (338 hours in total) with 100,000+ Satisfied Students enrolled. That’s 14+ days of learning material!\r\n\r\nI am a Financial Trader who learned the hard way. I have a strong focus on Financial markets and investments strategies. \r\n\r\nI am teaching so that others know what is the difference between them and Hedge fund or high network traders and how to become one. If even one person through my Courses becomes a successful person then I have achieved an important milestone.\r\n\r\nNow a days I am learning & teaching other skills that help my investment companies to expand.', NULL),
(334, 112, 'short_biography', 'I currently have 70 Courses with 20,280+ Minutes of Content (338 hours in total) with 100,000+ Satisfied Students enrolled. That’s 14+ days of learning material!', NULL),
(336, 112, 'city', NULL, NULL),
(337, 112, 'birthday', NULL, NULL),
(338, 112, 'old', NULL, NULL),
(339, 112, 'phone', NULL, NULL),
(340, 112, 'submit', 'Save', NULL),
(341, 112, 'avatar', '/bin/Drake%20Malone/5b8d51419125f.png', NULL),
(342, 112, 'profile_image', NULL, NULL),
(344, 107, 'postalcode', '48607', NULL),
(346, 108, 'city', 'Paris', NULL),
(347, 108, 'address', NULL, NULL),
(348, 108, 'postalcode', 'Richrad Street', NULL),
(349, 108, 'biography', NULL, NULL),
(350, 108, 'short_biography', NULL, NULL),
(351, 108, 'birthday', NULL, NULL),
(352, 108, 'old', NULL, NULL),
(353, 108, 'phone', NULL, NULL),
(354, 117, 'trip_mode', '1', NULL),
(355, 117, 'trip_mode_date', '1580527800', NULL),
(356, 117, 'trip_mode_date_t', NULL, NULL),
(357, 117, 'address', 'Test', NULL),
(358, 117, 'postalcode', '125', NULL),
(359, 122, 'capatibility', 'a:4:{i:0;s:6:\"report\";i:1;s:4:\"user\";i:2;s:7:\"channel\";i:3;s:7:\"buysell\";}', NULL),
(360, 109, 'address', '4898  Robinson Court', NULL),
(361, 109, 'postalcode', '48607', NULL),
(362, 115, 'state', 'Michigan', NULL),
(363, 115, 'city', 'Saginaw', NULL),
(364, 115, 'address', '4898  Robinson Court', NULL),
(365, 115, 'postalcode', '48607', NULL),
(366, 107, 'avatar', '/bin/Dustin%20Pitan/22654-6-man.png', NULL),
(367, 107, 'profile_image', NULL, NULL),
(368, 107, 'submit', 'Save', NULL),
(369, 117, 'avatar', '/bin/Lili%20Taylor/chin-implant-vs-fillers-best-for-improving-profile-bellevue-washington-chin-surgery.jpg', NULL),
(370, 117, 'profile_image', NULL, NULL),
(371, 117, 'submit', 'Save', NULL),
(372, 109, 'avatar', '/bin/Andy%20Field/images.jpg', NULL),
(373, 109, 'profile_image', NULL, NULL),
(374, 109, 'submit', 'Save', NULL),
(375, 115, 'submit', 'Save', NULL),
(376, 107, 'state', 'Michigan', NULL),
(377, 107, 'city', 'Saginaw', NULL),
(378, 107, 'address', '4898  Robinson Court', NULL),
(379, 125, 'blockDate', '12600', NULL),
(380, 115, 'blockDate', '12600', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_rate`
--

CREATE TABLE `tbl_users_rate` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `mode` text COLLATE utf8_persian_ci NOT NULL,
  `value` text COLLATE utf8_persian_ci NOT NULL,
  `gift` int(11) NOT NULL,
  `commision` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_channel`
--

CREATE TABLE `tbl_user_channel` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `formal` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `image` text COLLATE utf8_persian_ci,
  `avatar` text COLLATE utf8_persian_ci,
  `attach` text COLLATE utf8_persian_ci,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_channel_request`
--

CREATE TABLE `tbl_user_channel_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `attach` text COLLATE utf8_persian_ci,
  `mode` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_channel_video`
--

CREATE TABLE `tbl_user_channel_video` (
  `id` bigint(20) NOT NULL,
  `mode` text COLLATE utf8_persian_ci,
  `content_id` int(11) DEFAULT NULL,
  `chanel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rate_relation`
--

CREATE TABLE `tbl_user_rate_relation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `mode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ads_box`
--
ALTER TABLE `tbl_ads_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ads_plan`
--
ALTER TABLE `tbl_ads_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ads_request`
--
ALTER TABLE `tbl_ads_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_article_rate`
--
ALTER TABLE `tbl_article_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_balance_log`
--
ALTER TABLE `tbl_balance_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_comments`
--
ALTER TABLE `tbl_blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_posts`
--
ALTER TABLE `tbl_blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_category`
--
ALTER TABLE `tbl_contents_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_category_filter`
--
ALTER TABLE `tbl_contents_category_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_category_filter_tag`
--
ALTER TABLE `tbl_contents_category_filter_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_category_filter_tag_relation`
--
ALTER TABLE `tbl_contents_category_filter_tag_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_category_relation`
--
ALTER TABLE `tbl_contents_category_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_comment`
--
ALTER TABLE `tbl_contents_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_meta`
--
ALTER TABLE `tbl_contents_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_part`
--
ALTER TABLE `tbl_contents_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_support`
--
ALTER TABLE `tbl_contents_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents_vip`
--
ALTER TABLE `tbl_contents_vip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_content_rate`
--
ALTER TABLE `tbl_content_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_emails_template`
--
ALTER TABLE `tbl_emails_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification_status`
--
ALTER TABLE `tbl_notification_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification_template`
--
ALTER TABLE `tbl_notification_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_option`
--
ALTER TABLE `tbl_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_point`
--
ALTER TABLE `tbl_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_record`
--
ALTER TABLE `tbl_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_record_fans`
--
ALTER TABLE `tbl_record_fans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request_fans`
--
ALTER TABLE `tbl_request_fans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request_suggestion`
--
ALTER TABLE `tbl_request_suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sells`
--
ALTER TABLE `tbl_sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sells_rate`
--
ALTER TABLE `tbl_sells_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tickets_category`
--
ALTER TABLE `tbl_tickets_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tickets_msg`
--
ALTER TABLE `tbl_tickets_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tickets_user`
--
ALTER TABLE `tbl_tickets_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction_charge`
--
ALTER TABLE `tbl_transaction_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usage`
--
ALTER TABLE `tbl_usage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_users_category`
--
ALTER TABLE `tbl_users_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_meta`
--
ALTER TABLE `tbl_users_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_rate`
--
ALTER TABLE `tbl_users_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_channel`
--
ALTER TABLE `tbl_user_channel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_user_channel_request`
--
ALTER TABLE `tbl_user_channel_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_channel_video`
--
ALTER TABLE `tbl_user_channel_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_rate_relation`
--
ALTER TABLE `tbl_user_rate_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ads_box`
--
ALTER TABLE `tbl_ads_box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ads_plan`
--
ALTER TABLE `tbl_ads_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ads_request`
--
ALTER TABLE `tbl_ads_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_article`
--
ALTER TABLE `tbl_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_article_rate`
--
ALTER TABLE `tbl_article_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_balance_log`
--
ALTER TABLE `tbl_balance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog_comments`
--
ALTER TABLE `tbl_blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog_posts`
--
ALTER TABLE `tbl_blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_category`
--
ALTER TABLE `tbl_contents_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_category_filter`
--
ALTER TABLE `tbl_contents_category_filter`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_category_filter_tag`
--
ALTER TABLE `tbl_contents_category_filter_tag`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_category_filter_tag_relation`
--
ALTER TABLE `tbl_contents_category_filter_tag_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_category_relation`
--
ALTER TABLE `tbl_contents_category_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_comment`
--
ALTER TABLE `tbl_contents_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_meta`
--
ALTER TABLE `tbl_contents_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_part`
--
ALTER TABLE `tbl_contents_part`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_support`
--
ALTER TABLE `tbl_contents_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contents_vip`
--
ALTER TABLE `tbl_contents_vip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_content_rate`
--
ALTER TABLE `tbl_content_rate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_emails_template`
--
ALTER TABLE `tbl_emails_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notification_status`
--
ALTER TABLE `tbl_notification_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notification_template`
--
ALTER TABLE `tbl_notification_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_option`
--
ALTER TABLE `tbl_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tbl_point`
--
ALTER TABLE `tbl_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_record`
--
ALTER TABLE `tbl_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_record_fans`
--
ALTER TABLE `tbl_record_fans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request_fans`
--
ALTER TABLE `tbl_request_fans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request_suggestion`
--
ALTER TABLE `tbl_request_suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sells`
--
ALTER TABLE `tbl_sells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sells_rate`
--
ALTER TABLE `tbl_sells_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tickets_category`
--
ALTER TABLE `tbl_tickets_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tickets_msg`
--
ALTER TABLE `tbl_tickets_msg`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tickets_user`
--
ALTER TABLE `tbl_tickets_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transaction_charge`
--
ALTER TABLE `tbl_transaction_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_usage`
--
ALTER TABLE `tbl_usage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_users_category`
--
ALTER TABLE `tbl_users_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users_meta`
--
ALTER TABLE `tbl_users_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `tbl_users_rate`
--
ALTER TABLE `tbl_users_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_channel`
--
ALTER TABLE `tbl_user_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_channel_request`
--
ALTER TABLE `tbl_user_channel_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_channel_video`
--
ALTER TABLE `tbl_user_channel_video`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_rate_relation`
--
ALTER TABLE `tbl_user_rate_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
