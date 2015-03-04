-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 05:47 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iziweb_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `izi_attribute`
--

CREATE TABLE IF NOT EXISTS `izi_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `default_value` varchar(255) NOT NULL,
  `attr_group_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `izi_attribute`
--

INSERT INTO `izi_attribute` (`id`, `name`, `default_value`, `attr_group_id`) VALUES
(1, 'Kích thước màn hình', '', 3),
(2, 'Card đồ họa', '', 3),
(3, 'Loại bàn phím', '', 3),
(4, 'Khối lượng', '', 3),
(5, 'Ngày phát hành', '', 2),
(6, 'Ngày sản xuất', '', 2),
(7, 'Tác giả', 'Khuyết danh', 2),
(8, 'Ngày xuất bản', '', 2),
(9, 'Size', '', 1),
(10, 'Màu sắc', '', 1),
(11, 'Chất liệu vải', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_attr_group`
--

CREATE TABLE IF NOT EXISTS `izi_attr_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `izi_attr_group`
--

INSERT INTO `izi_attr_group` (`id`, `name`) VALUES
(1, 'Thời trang'),
(2, 'Sách'),
(3, 'Máy tính'),
(4, 'Nội thất');

-- --------------------------------------------------------

--
-- Table structure for table `izi_category`
--

CREATE TABLE IF NOT EXISTS `izi_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `tag_title` varchar(255) NOT NULL,
  `tag_description` text NOT NULL,
  `tag_keywords` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `izi_category`
--

INSERT INTO `izi_category` (`id`, `name`, `slug`, `show_in_menu`, `sort_order`, `parent_id`, `tag_title`, `tag_description`, `tag_keywords`, `status`) VALUES
(1, 'Thời trang', 'thoi-trang', 0, 1, 0, '', '', '', 1),
(2, 'Dien tu', 'dien-tu', 1, 2, 0, 'thoi trang', 'thoi trang', 'thoi trang', 1),
(3, 'Nội thất', 'noi-that', 1, 3, 0, 'Nội thất', 'Nội thất', 'Nội thất', 1),
(4, 'Quần', '', 1, 0, 1, '', '', '', 1),
(5, 'Áo', 'ao', 1, 0, 1, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_comment`
--

CREATE TABLE IF NOT EXISTS `izi_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_time` datetime NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `content` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `izi_comment`
--

INSERT INTO `izi_comment` (`id`, `comment_time`, `username`, `email`, `phone`, `content`, `status`, `product_id`) VALUES
(1, '2015-02-09 00:00:00', 'nhan say', 'nhansay@gmail.com', NULL, 'San pham nay tot vuot tren mong doi', 1, 1),
(2, '2015-02-28 18:23:40', 'xxx', 'xxx', NULL, 'xxxx', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_config`
--

CREATE TABLE IF NOT EXISTS `izi_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_customer`
--

CREATE TABLE IF NOT EXISTS `izi_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `full_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `izi_customer`
--

INSERT INTO `izi_customer` (`id`, `username`, `password`, `full_name`, `email`, `phone`, `address`, `status`) VALUES
(1, 'kh1', '021fe13b92c973486e1024fad211785f', 'xxx', NULL, NULL, NULL, 0),
(2, 'kh2', '03063630e16af1b6a633db313db0c9f1', 'yyy', NULL, NULL, NULL, 0),
(3, 'dfdfd', 'c6f057b86584942e415435ffb1fa93d4', 'dfdf', 'dfdf@gmail.com', 'fdfafa', 'fadfa', 1),
(4, 'c', '8638096e4ddb49a0dd6592c57d9f50ab', 'nhansay', 'nhansaycus@gmail.com', '099', 'hauthanh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `izi_menu`
--

CREATE TABLE IF NOT EXISTS `izi_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `object_id` int(10) unsigned NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_online`
--

CREATE TABLE IF NOT EXISTS `izi_online` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `on_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_order`
--

CREATE TABLE IF NOT EXISTS `izi_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_time` datetime NOT NULL,
  `amount` decimal(15,0) NOT NULL DEFAULT '0',
  `customer_id` int(11) unsigned NOT NULL DEFAULT '0',
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_info` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `izi_order`
--

INSERT INTO `izi_order` (`id`, `order_time`, `amount`, `customer_id`, `full_name`, `email`, `phone`, `address`, `order_info`, `status`) VALUES
(1, '2015-01-15 00:00:00', '40000000', 2, 'Member Normal', 'membernormal@gmail.com', '0125468754', 'Ha Noi ', 'thong tin them', 1),
(2, '2015-01-08 00:00:00', '20000000', 1, 'Admin', 'admin@gmail.com', '01234567890', 'Ha Noi - Viet Nam', 'user info', 0),
(3, '2015-03-09 05:15:15', '900000', 1, 'Nguyen Nhan', 'nhansay@gmail.com', '0922922922', 'Ha Noi', 'Thong tin khac', 0);

-- --------------------------------------------------------

--
-- Table structure for table `izi_post`
--

CREATE TABLE IF NOT EXISTS `izi_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `post_date` date DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `excerpt` text,
  `content` text,
  `tags` varchar(255) DEFAULT NULL,
  `post_type` varchar(20) DEFAULT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '1',
  `tag_title` varchar(255) DEFAULT NULL,
  `tag_description` varchar(255) DEFAULT NULL,
  `tag_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `topic_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `izi_post`
--

INSERT INTO `izi_post` (`id`, `title`, `post_date`, `author`, `thumbnail`, `excerpt`, `content`, `tags`, `post_type`, `views`, `tag_title`, `tag_description`, `tag_keywords`, `status`, `topic_id`) VALUES
(1, 'Giới thiệu chúng tôi', '2015-02-02', NULL, '/iziweb_cms/assets/plugin/kcfinder/upload/images/4.jpg', 'Giới thiệu trung tâm', '<p>Nội dung b&agrave;i giới thiệu</p>\r\n', NULL, 'page', 0, '', NULL, '', 1, 1),
(2, 'Liên hệ', '2015-02-09', '', '', 'Tóm tắt phần liên hệ', '<p>Nội dung phần li&ecirc;n hệ</p>\r\n', 'lien hej,le hien', 'page', 0, '', NULL, '', 1, 2),
(3, 'fdfdfdf', '0000-00-00', NULL, '', '', '', NULL, 'page', 0, '', NULL, '', 1, 2),
(4, 'Tin tuc ngay hom nay', '2015-02-03', NULL, NULL, 'xxx', 'yyy', NULL, 'post', 0, NULL, NULL, NULL, 1, 1),
(5, 'Bí quyết bán hàng dịp tết', '2015-02-19', 'Tác giả', '/iziweb_cms/assets/plugin/kcfinder/upload/images/24723_0_vostro_5470.jpg', 'Tóm tắt nội dung', '<p>Nội dung chi tiết abc&nbsp;Nội dung chi tiế<strong>t abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi ti</strong>ết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc&nbsp;Nội dung chi tiết abc</p>\r\n', NULL, 'post', 0, '', NULL, '', 1, 1),
(6, 'fdfdf', '0000-00-00', '', '', '', '', 'tafd, fdfdfdfdo dfdf,fdfdfdf dfdfdfl', 'post', 1, '', NULL, '', 1, 1),
(7, 'Bài thơ hay nhất thời đại', '2015-03-04', 'Hà Thanh', '/iziweb_cms/assets/plugin/kcfinder/upload/images/Q-0b0e5.jpg', '<p><strong>Anh c&oacute; v&ocirc; v&agrave;n niềm vui v&agrave; em chẳng thể tin...</strong><br />\r\nAnh nhớ em v&igrave; t&igrave;nh y&ecirc;u hay gần tựa', '<p><strong>Anh c&oacute; v&ocirc; v&agrave;n niềm vui v&agrave; em chẳng thể tin...</strong><br />\r\nAnh nhớ em v&igrave; t&igrave;nh y&ecirc;u hay gần tựa như thế<br />\r\nEm cũng chẳng ghen đ&acirc;u...<br />\r\nV&igrave; v&agrave;i lời người dưng kể<br />\r\nChỉ tho&aacute;ng buồn cho m&igrave;nh... V&agrave; cả anh!</p>\r\n\r\n<p><strong>Em chẳng sai - khi em đ&atilde; tin anh</strong><br />\r\nV&agrave; cố chấp nghĩ anh dễ thay đổi<br />\r\nNhưng em l&agrave; bến đỗ b&igrave;nh y&ecirc;n khi mệt anh gh&eacute; tới...<br />\r\nV&agrave; lại đi khi niềm vui kh&aacute;c gọi mời...</p>\r\n\r\n<p><strong>Em nghĩ rằng nước mắt sẽ chẳng rơi</strong><br />\r\nKhi mỗi ng&agrave;y cứ chờ mong tr&ocirc;ng ng&oacute;ng<br />\r\nN&agrave;o đ&acirc;u em c&oacute; vẽ cho m&igrave;nh ch&uacute;t hy vọng<br />\r\nChỉ v&igrave; một điều... L&agrave; em vẫn y&ecirc;u anh!</p>\r\n\r\n<p><strong>Chỉ tiếc l&agrave; niềm tin qu&aacute; mỏng manh</strong><br />\r\nEm chỉ l&agrave; một sợi tơ trong v&ocirc; v&agrave;n qu&ecirc;n nhớ<br />\r\nỞ nơi anh! Em đ&atilde; qu&ecirc;n mất m&igrave;nh c&ograve;n thở...<br />\r\nV&agrave; t&igrave;nh y&ecirc;u ơi! Nếu như c&ograve;n c&oacute; thể...<br />\r\nAnh c&oacute; thể...<br />\r\nĐi xa em hơn nữa? C&oacute; được kh&ocirc;ng?</p>\r\n', 'bai tho,tho hay,tinh yeu', 'post', 1, '', NULL, '', 1, 2),
(8, 'Bài thơ hay nhất thời đại', '2015-03-04', 'Hà Thanh', '/iziweb_cms/assets/plugin/kcfinder/upload/images/Q-0b0e5.jpg', '<p><strong>Anh c&oacute; v&ocirc; v&agrave;n niềm vui v&agrave; em chẳng thể tin...</strong><br />\r\nAnh nhớ em v&igrave; t&igrave;nh y&ecirc;u hay gần tựa', '<p><strong>Anh c&oacute; v&ocirc; v&agrave;n niềm vui v&agrave; em chẳng thể tin...</strong><br />\r\nAnh nhớ em v&igrave; t&igrave;nh y&ecirc;u hay gần tựa như thế<br />\r\nEm cũng chẳng ghen đ&acirc;u...<br />\r\nV&igrave; v&agrave;i lời người dưng kể<br />\r\nChỉ tho&aacute;ng buồn cho m&igrave;nh... V&agrave; cả anh!</p>\r\n\r\n<p><strong>Em chẳng sai - khi em đ&atilde; tin anh</strong><br />\r\nV&agrave; cố chấp nghĩ anh dễ thay đổi<br />\r\nNhưng em l&agrave; bến đỗ b&igrave;nh y&ecirc;n khi mệt anh gh&eacute; tới...<br />\r\nV&agrave; lại đi khi niềm vui kh&aacute;c gọi mời...</p>\r\n\r\n<p><strong>Em nghĩ rằng nước mắt sẽ chẳng rơi</strong><br />\r\nKhi mỗi ng&agrave;y cứ chờ mong tr&ocirc;ng ng&oacute;ng<br />\r\nN&agrave;o đ&acirc;u em c&oacute; vẽ cho m&igrave;nh ch&uacute;t hy vọng<br />\r\nChỉ v&igrave; một điều... L&agrave; em vẫn y&ecirc;u anh!</p>\r\n\r\n<p><strong>Chỉ tiếc l&agrave; niềm tin qu&aacute; mỏng manh</strong><br />\r\nEm chỉ l&agrave; một sợi tơ trong v&ocirc; v&agrave;n qu&ecirc;n nhớ<br />\r\nỞ nơi anh! Em đ&atilde; qu&ecirc;n mất m&igrave;nh c&ograve;n thở...<br />\r\nV&agrave; t&igrave;nh y&ecirc;u ơi! Nếu như c&ograve;n c&oacute; thể...<br />\r\nAnh c&oacute; thể...<br />\r\nĐi xa em hơn nữa? C&oacute; được kh&ocirc;ng?</p>\r\n', 'bai tho,tho hay,tinh yeu', 'post', 1, '', NULL, '', 1, 2),
(9, 'xxx', '2015-03-05', '', '', '<h2>Kết quả T&igrave;m kiếm</h2>\r\n\r\n<div id="ires" style="padding-top: 6px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: medium; line-height: normal;">\r\n<div id="akp_target">&nbsp;</div>\r\n\r\n<div class="srg">\r\n<ul>\r\n	<li>\r\n	<div', '<h2>Kết quả T&igrave;m kiếm</h2>\r\n\r\n<div id="ires" style="padding-top: 6px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: medium; line-height: normal;">\r\n<div id="akp_target">&nbsp;</div>\r\n\r\n<div class="srg">\r\n<ul>\r\n	<li>\r\n	<div class="rc" style="position: relative;">\r\n	<h3><a href="http://php.net/strip_tags" style="color: rgb(102, 0, 153); cursor: pointer; text-decoration: none;">PHP: strip_tags - Manual</a></h3>\r\n\r\n	<div class="s" style="max-width: 42em; color: rgb(84, 84, 84); line-height: 18px;">\r\n	<div class="f kv _SWb" style="color: rgb(128, 128, 128); height: 17px; line-height: 16px; white-space: nowrap;"><cite><strong>php</strong>.net/strip_<strong>tags</strong></cite>\r\n\r\n	<div class="action-menu ab_ctl" style="display: inline; position: relative; margin: 0px 3px; vertical-align: middle; -webkit-user-select: none;">\r\n	<div class="action-menu-panel ab_dropdown" style="border: 1px solid rgba(0, 0, 0, 0.2); font-size: 13px; padding: 0px; position: absolute; right: auto; top: 12px; z-index: 3; -webkit-transition: opacity 0.218s; transition: opacity 0.218s; -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; left: 0px; visibility: hidden; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<ul>\r\n		<li>&nbsp;</li>\r\n	</ul>\r\n	</div>\r\n	</div>\r\n	<a class="fl" href="http://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=http://php.net/strip_tags&amp;prev=search" style="float: left; text-decoration: none; color: rgb(26, 13, 171); cursor: pointer; font-size: 14px;">Dịch trang n&agrave;y</a></div>\r\n\r\n	<div class="f slp" style="color: rgb(128, 128, 128);">&nbsp;</div>\r\n	This function tries to return a string with all NULL bytes,&nbsp;<strong>HTML</strong>&nbsp;and&nbsp;<strong>PHP tags</strong>&nbsp;stripped.....&nbsp;//prevent strip_tags from&nbsp;<strong>removing html</strong>&nbsp;comments (MS Word introduced&nbsp;&nbsp;...</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="rc" style="position: relative;">\r\n	<h3><a href="http://www.w3schools.com/php/func_string_strip_tags.asp" style="color: rgb(102, 0, 153); cursor: pointer; text-decoration: none;">PHP strip_tags() Function - W3Schools</a></h3>\r\n\r\n	<div class="s" style="max-width: 42em; color: rgb(84, 84, 84); line-height: 18px;">\r\n	<div class="f kv _SWb" style="color: rgb(128, 128, 128); height: 17px; line-height: 16px; white-space: nowrap;"><cite>www.w3schools.com/<strong>php</strong>/func_string_strip_<strong>tags</strong>.asp</cite>\r\n\r\n	<div class="action-menu ab_ctl" style="display: inline; position: relative; margin: 0px 3px; vertical-align: middle; -webkit-user-select: none;">\r\n	<div class="action-menu-panel ab_dropdown" style="border: 1px solid rgba(0, 0, 0, 0.2); font-size: 13px; padding: 0px; position: absolute; right: auto; top: 12px; z-index: 3; -webkit-transition: opacity 0.218s; transition: opacity 0.218s; -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; left: 0px; visibility: hidden; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<ul>\r\n		<li>&nbsp;</li>\r\n		<li>&nbsp;</li>\r\n	</ul>\r\n	</div>\r\n	</div>\r\n	<a class="fl" href="http://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=http://www.w3schools.com/php/func_string_strip_tags.asp&amp;prev=search" style="float: left; text-decoration: none; color: rgb(26, 13, 171); cursor: pointer; font-size: 14px;">Dịch trang n&agrave;y</a></div>\r\n\r\n	<div class="f slp" style="color: rgb(128, 128, 128);">&nbsp;</div>\r\n	The strip_tags() function string</div>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n\r\n<ol>\r\n</ol>\r\n</div>\r\n', '', 'post', 1, '', NULL, '', 1, 1),
(10, 'xxx', '0000-00-00', '', '', '<h2>Kết quả T&igrave;m kiếm</h2>\r\n\r\n<div id="ires" style="padding-top: 6px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: medium; line-height: normal;">\r\n<div id="akp_target">&nbsp;</div>\r\n\r\n<div class="srg">\r\n<ul>\r\n	<li>\r\n	<div', '<h2>Kết quả T&igrave;m kiếm</h2>\r\n\r\n<div id="ires" style="padding-top: 6px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: medium; line-height: normal;">\r\n<div id="akp_target">&nbsp;</div>\r\n\r\n<div class="srg">\r\n<ul>\r\n	<li>\r\n	<div class="rc" style="position: relative;">\r\n	<h3><a href="http://php.net/strip_tags" style="color: rgb(102, 0, 153); cursor: pointer; text-decoration: none;">PHP: strip_tags - Manual</a></h3>\r\n\r\n	<div class="s" style="max-width: 42em; color: rgb(84, 84, 84); line-height: 18px;">\r\n	<div class="f kv _SWb" style="color: rgb(128, 128, 128); height: 17px; line-height: 16px; white-space: nowrap;"><cite><strong>php</strong>.net/strip_<strong>tags</strong></cite>\r\n\r\n	<div class="action-menu ab_ctl" style="display: inline; position: relative; margin: 0px 3px; vertical-align: middle; -webkit-user-select: none;">\r\n	<div class="action-menu-panel ab_dropdown" style="border: 1px solid rgba(0, 0, 0, 0.2); font-size: 13px; padding: 0px; position: absolute; right: auto; top: 12px; z-index: 3; -webkit-transition: opacity 0.218s; transition: opacity 0.218s; -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; left: 0px; visibility: hidden; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<ul>\r\n		<li>&nbsp;</li>\r\n	</ul>\r\n	</div>\r\n	</div>\r\n	<a class="fl" href="http://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=http://php.net/strip_tags&amp;prev=search" style="float: left; text-decoration: none; color: rgb(26, 13, 171); cursor: pointer; font-size: 14px;">Dịch trang n&agrave;y</a></div>\r\n\r\n	<div class="f slp" style="color: rgb(128, 128, 128);">&nbsp;</div>\r\n	This function tries to return a string with all NULL bytes,&nbsp;<strong>HTML</strong>&nbsp;and&nbsp;<strong>PHP tags</strong>&nbsp;stripped.....&nbsp;//prevent strip_tags from&nbsp;<strong>removing html</strong>&nbsp;comments (MS Word introduced&nbsp;&nbsp;...</div>\r\n	</div>\r\n	</li>\r\n	<li>\r\n	<div class="rc" style="position: relative;">\r\n	<h3><a href="http://www.w3schools.com/php/func_string_strip_tags.asp" style="color: rgb(102, 0, 153); cursor: pointer; text-decoration: none;">PHP strip_tags() Function - W3Schools</a></h3>\r\n\r\n	<div class="s" style="max-width: 42em; color: rgb(84, 84, 84); line-height: 18px;">\r\n	<div class="f kv _SWb" style="color: rgb(128, 128, 128); height: 17px; line-height: 16px; white-space: nowrap;"><cite>www.w3schools.com/<strong>php</strong>/func_string_strip_<strong>tags</strong>.asp</cite>\r\n\r\n	<div class="action-menu ab_ctl" style="display: inline; position: relative; margin: 0px 3px; vertical-align: middle; -webkit-user-select: none;">\r\n	<div class="action-menu-panel ab_dropdown" style="border: 1px solid rgba(0, 0, 0, 0.2); font-size: 13px; padding: 0px; position: absolute; right: auto; top: 12px; z-index: 3; -webkit-transition: opacity 0.218s; transition: opacity 0.218s; -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; left: 0px; visibility: hidden; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<ul>\r\n		<li>&nbsp;</li>\r\n		<li>&nbsp;</li>\r\n	</ul>\r\n	</div>\r\n	</div>\r\n	<a class="fl" href="http://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=http://www.w3schools.com/php/func_string_strip_tags.asp&amp;prev=search" style="float: left; text-decoration: none; color: rgb(26, 13, 171); cursor: pointer; font-size: 14px;">Dịch trang n&agrave;y</a></div>\r\n\r\n	<div class="f slp" style="color: rgb(128, 128, 128);">&nbsp;</div>\r\n	The strip_tags() function strip</div>\r\n	</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n\r\n<ol>\r\n</ol>\r\n</div>\r\n', '', 'post', 1, '', NULL, '', 1, 1),
(11, 'xxx', '0000-00-00', '', '', '<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_t<strong>ags() function strips a string from</strong> HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot', '<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_t<strong>ags() function strips a string from</strong> HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n', '', 'post', 1, '', NULL, '', 1, 1),
(12, 'xccv', '0000-00-00', '', '', '<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot', '<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n', '', 'post', 1, '', NULL, '', 1, 1),
(13, 'xxxccc', '0000-00-00', '', '', 'Definition and Usage\r\n\r\nThe strip_tags() function\r\n\r\nDefinition and Usage\r\n\r\nThe strip_tags() function strips a string from HTML, XML, and PHP tags.\r\n\r\nNote:&nbsp;HTML comments are', '<h2>Definition and Usage</h2>\r\n\r\n<p><em>The strip_tags() function</em></p>\r\n\r\n<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n\r\n<p>ML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n', '', 'post', 1, '', NULL, '', 1, 1),
(14, 'test ngay thang dang', '0000-00-00', '', '', 'noi dung bai dang\r\n', '<p>noi dung bai dang</p>\r\n', '', 'post', 1, '', NULL, '', 1, 1),
(15, 'test lan nua', '0000-00-00', '', '', '', '', '', 'post', 1, '', NULL, '', 1, 1),
(16, 'test lan nua', '0000-00-00', '', '', '', '', '', 'post', 1, '', NULL, '', 1, 1),
(17, 'test lan nua', '0000-00-00', '', '', '', '', '', 'post', 1, '', NULL, '', 1, 1),
(18, 'again', '0000-00-00', '', '', '', '', '', 'post', 1, '', NULL, '', 1, 1),
(19, 'final', '2015-03-03', '', '', '', '', '', 'post', 1, '', NULL, '', 1, 1),
(20, 'Su menh cua chung toi', '2015-03-03', 'Tac gia', '', 'Definition and Usage\r\n\r\nThe strip_tags() function strips a string from HTML, XML, and PHP tags.\r\n\r\nNote:&nbsp;HTML comments are always stripped. This cannot', '<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n\r\n<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n\r\n<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n', 'xxx,yyy,uuu,uuz', 'page', 1, '', NULL, '', 1, 0),
(21, 'Su menh cua chung toi', '2015-03-03', 'Tac gia', '', 'Definition and Usage\r\n\r\nThe strip_tags() function strips a string from HTML, XML, and PHP tags.\r\n\r\nNote:&nbsp;HTML comments are always stripped. This cannot', '<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n\r\n<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n\r\n<h2>Definition and Usage</h2>\r\n\r\n<p>The strip_tags() function strips a string from HTML, XML, and PHP tags.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;HTML comments are always stripped. This cannot be changed with the allow parameter.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>\r\n', 'xxx,yyy,uuu,uuz', 'page', 1, '', NULL, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `izi_post_tag`
--

CREATE TABLE IF NOT EXISTS `izi_post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned DEFAULT NULL,
  `tag_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `izi_post_tag`
--

INSERT INTO `izi_post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 8, 1),
(2, 8, 2),
(3, 8, 3),
(4, 21, 4),
(5, 21, 5),
(6, 21, 6),
(7, 21, 7),
(8, 2, 8),
(9, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `izi_product`
--

CREATE TABLE IF NOT EXISTS `izi_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `model` int(11) NOT NULL,
  `price` decimal(15,0) unsigned NOT NULL,
  `sale` decimal(15,0) unsigned NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `tag_title` varchar(255) NOT NULL,
  `tag_description` text NOT NULL,
  `tag_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `izi_product`
--

INSERT INTO `izi_product` (`id`, `name`, `model`, `price`, `sale`, `thumbnail`, `quantity`, `description`, `views`, `sort_order`, `status`, `tag_title`, `tag_description`, `tag_keywords`, `category_id`) VALUES
(1, 'PC Dell Vostro', 0, '15000000', '2000000', '/ci_admin/asset/plugin/kcfinder/upload/images/computer3.jpg', 30, '<p>may tinh de ban</p>\r\n', 1, 0, 1, '', '', '', 1),
(12, 'sp xoas', 0, '27599000', '2000000', '/ci_admin/asset/plugin/kcfinder/upload/images/computer2.jpg', 34, '<p>sdfasdf</p>\r\n', 1, 0, 1, '', '', '', 1),
(13, 'new product', 0, '100000000', '2000000', '/ci_admin/asset/plugin/kcfinder/upload/images/Q-0b0e5.jpg', 3, '<p>ban ghe noi that</p>\r\n', 1, 0, 1, '', '', '', 1),
(15, 'them moi', 0, '15000000', '45', '/ci_admin/asset/plugin/kcfinder/upload/images/example-slide-3.jpg', 34, '<p>sfsdf</p>\r\n', 1, 0, 1, '', '', '', 1),
(16, 'Máy tính thương hiệu SunPower SUNL007', 0, '27599000', '45678', '/ci_admin/asset/plugin/kcfinder/upload/images/250_26011_hncb0123.png', 56, '<p>ferwer</p>\r\n', 1, 0, 1, '', '', '', 1),
(17, 'test san pham', 0, '100000', '0', '/iziweb_cms/assets/plugin/kcfinder/upload/images/computer1.jpg', 0, '', 1, 0, 1, '', '', '', 1),
(18, 'abc', 0, '999', '0', '/iziweb_cms/assets/plugin/kcfinder/upload/images/avata1.jpg', 0, '', 1, 0, 1, '', '', '', 1),
(19, 'dfd', 0, '999', '0', '', 0, '', 1, 0, 1, '', '', '', 1),
(20, 'Máy tính bảng Ipad', 0, '9000000', '999', '/iziweb_cms/assets/plugin/kcfinder/upload/images/computer1.jpg', 20, '<p>M&ocirc; tả sản cm phẩm</p>\r\n', 1, 0, 1, '', '', '', 4),
(23, 'test san pham', 0, '60000', '60000', '/iziweb_cms/assets/plugin/kcfinder/upload/images/1.jpg', 20, '<p>M&ocirc; tả sản phẩm xyz</p>\r\n', 1, 0, 1, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_product_attr`
--

CREATE TABLE IF NOT EXISTS `izi_product_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `izi_product_attr`
--

INSERT INTO `izi_product_attr` (`id`, `product_id`, `attr_id`, `value`) VALUES
(1, 4, 3, '1'),
(2, 4, 4, 'AMD 2G'),
(3, 4, 5, 'Bàn phím số'),
(4, 4, 6, '3 Kg'),
(11, 19, 3, '99'),
(12, 19, 4, 'vga 2g'),
(13, 19, 5, 'lotex'),
(14, 19, 6, '9kg'),
(15, 20, 3, '14'''),
(16, 20, 4, 'VGA 2G'),
(17, 20, 5, 'Lotus'),
(18, 20, 6, '9kg'),
(23, 23, 1, '2GB'),
(24, 23, 2, '300GB'),
(25, 23, 13, 'Canon');

-- --------------------------------------------------------

--
-- Table structure for table `izi_product_img`
--

CREATE TABLE IF NOT EXISTS `izi_product_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `izi_product_img`
--

INSERT INTO `izi_product_img` (`id`, `product_id`, `path`) VALUES
(40, 18, '/iziweb_cms/assets/plugin/kcfinder/upload/images/24723_0_vostro_5470.jpg'),
(41, 18, '/iziweb_cms/assets/plugin/kcfinder/upload/images/250_26011_hncb0123.png'),
(44, 0, '/iziweb_cms/assets/plugin/kcfinder/upload/images/24723_0_vostro_5470.jpg'),
(45, 0, '/iziweb_cms/assets/plugin/kcfinder/upload/images/computer4.jpg'),
(46, 0, '/iziweb_cms/assets/plugin/kcfinder/upload/images/250_26011_hncb0123.png'),
(47, 0, '/iziweb_cms/assets/plugin/kcfinder/upload/images/250_26011_hncb0123.png'),
(48, 0, '/iziweb_cms/assets/plugin/kcfinder/upload/images/24723_0_vostro_5470.jpg'),
(59, 23, '/iziweb_cms/assets/plugin/kcfinder/upload/images/1.jpg'),
(60, 23, '/iziweb_cms/assets/plugin/kcfinder/upload/images/2.jpg'),
(61, 23, '/iziweb_cms/assets/plugin/kcfinder/upload/images/3(1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `izi_product_order`
--

CREATE TABLE IF NOT EXISTS `izi_product_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` decimal(15,4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(15,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `izi_product_order`
--

INSERT INTO `izi_product_order` (`id`, `order_id`, `product_id`, `unit_price`, `quantity`, `total`) VALUES
(1, 1, 15, '15000000.0000', 3, '45000000.0000'),
(2, 1, 16, '200000.0000', 5, '1000000.0000'),
(3, 2, 15, '90000.0000', 3, '270000.0000');

-- --------------------------------------------------------

--
-- Table structure for table `izi_tag`
--

CREATE TABLE IF NOT EXISTS `izi_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `count_used` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `izi_tag`
--

INSERT INTO `izi_tag` (`id`, `name`, `slug`, `count_used`) VALUES
(1, 'bai tho', NULL, 1),
(2, 'tho hay', NULL, 1),
(3, 'tinh yeu', NULL, 1),
(4, 'xxx', 'xxx', 1),
(5, 'yyy', 'yyy', 1),
(6, 'uuu', 'uuu', 1),
(7, 'uuz', 'uuz', 1),
(8, 'lien hej', 'lien-hej', 1),
(9, 'le hien', 'le-hien', 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_topic`
--

CREATE TABLE IF NOT EXISTS `izi_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT '0',
  `tag_title` varchar(255) DEFAULT NULL,
  `tag_description` varchar(255) DEFAULT NULL,
  `tag_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `izi_topic`
--

INSERT INTO `izi_topic` (`id`, `name`, `slug`, `parent_id`, `tag_title`, `tag_description`, `tag_keywords`, `status`) VALUES
(1, 'Tin tức', 'tin-tuc', 0, 'tin tuc', 'tin tuc', 'tin tuc', 1),
(2, 'Sự kiện văn hóa', 'su-kien-van-hoa', 0, 'su kien', 'su kien', 'su kien', 1),
(3, 'Tin trong nước', 'tin-trong-nuoc', 1, 'tin trong nuoc', 'tin trong nuoc', 'tin trong nuoc', 1),
(4, 'Tin quốc tế', 'tin-quoc-te', 1, '', '', '', 1),
(5, 'Tin Hà Nội', 'tin-ha-noi', 3, '', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_user`
--

CREATE TABLE IF NOT EXISTS `izi_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `izi_user`
--

INSERT INTO `izi_user` (`id`, `username`, `password`, `email`, `role`) VALUES
(3, 'admin', '47bce5c74f589f4867dbd57e9ca9f808', 'nhansay@gmail.com', 0),
(4, 'superadmin', 'b706835de79a2b4e80506f582af3676a', 'superadmin@gmail.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
