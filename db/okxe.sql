/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : okxe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-03 01:01:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `id_employee` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('1', 'Aprilia', '1', null, null, null);
INSERT INTO `brand` VALUES ('2', 'Bajaj', '1', null, null, null);
INSERT INTO `brand` VALUES ('3', 'Daelim', '1', null, null, null);
INSERT INTO `brand` VALUES ('4', 'Honda', '1', null, null, null);
INSERT INTO `brand` VALUES ('5', 'Kawasaki', '1', null, null, null);
INSERT INTO `brand` VALUES ('6', 'PGO', '1', null, null, null);
INSERT INTO `brand` VALUES ('7', 'Piaggio', '1', null, null, null);
INSERT INTO `brand` VALUES ('8', 'Suzuki', '1', null, null, null);
INSERT INTO `brand` VALUES ('9', 'SYM', '1', null, null, null);
INSERT INTO `brand` VALUES ('10', 'Yamaha', '1', null, null, null);
INSERT INTO `brand` VALUES ('11', 'Xe các hiệu khác', '1', null, null, null);

-- ----------------------------
-- Table structure for brand_clone
-- ----------------------------
DROP TABLE IF EXISTS `brand_clone`;
CREATE TABLE `brand_clone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of brand_clone
-- ----------------------------

-- ----------------------------
-- Table structure for county_clone
-- ----------------------------
DROP TABLE IF EXISTS `county_clone`;
CREATE TABLE `county_clone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of county_clone
-- ----------------------------
INSERT INTO `county_clone` VALUES ('1', 'Quận Ba Đình');
INSERT INTO `county_clone` VALUES ('2', 'Quận Hoàn Kiếm');
INSERT INTO `county_clone` VALUES ('3', 'Quận Tây Hồ');
INSERT INTO `county_clone` VALUES ('4', 'Quận Long Biên');
INSERT INTO `county_clone` VALUES ('5', 'Quận Cầu Giấy');
INSERT INTO `county_clone` VALUES ('6', 'Quận Đống Đa');
INSERT INTO `county_clone` VALUES ('7', 'Quận Hai Bà Trưng');
INSERT INTO `county_clone` VALUES ('8', 'Quận Hoàng Mai');
INSERT INTO `county_clone` VALUES ('9', 'Quận Thanh Xuân');
INSERT INTO `county_clone` VALUES ('16', 'Huyện Sóc Sơn');
INSERT INTO `county_clone` VALUES ('17', 'Huyện Đông Anh');
INSERT INTO `county_clone` VALUES ('18', 'Huyện Gia Lâm');
INSERT INTO `county_clone` VALUES ('19', 'Quận Nam Từ Liêm');
INSERT INTO `county_clone` VALUES ('20', 'Huyện Thanh Trì');
INSERT INTO `county_clone` VALUES ('21', 'Quận Bắc Từ Liêm');
INSERT INTO `county_clone` VALUES ('25', 'Quận Hà Đông');
INSERT INTO `county_clone` VALUES ('26', 'Huyện Mê Linh');
INSERT INTO `county_clone` VALUES ('27', 'Thị xã Sơn Tây');
INSERT INTO `county_clone` VALUES ('28', 'Huyện Ba Vì');
INSERT INTO `county_clone` VALUES ('29', 'Huyện Phúc Thọ');
INSERT INTO `county_clone` VALUES ('30', 'Huyện Đan Phượng');
INSERT INTO `county_clone` VALUES ('31', 'Huyện Hoài Đức');
INSERT INTO `county_clone` VALUES ('32', 'Huyện Quốc Oai');
INSERT INTO `county_clone` VALUES ('33', 'Huyện Thạch Thất');
INSERT INTO `county_clone` VALUES ('34', 'Huyện Chương Mỹ');
INSERT INTO `county_clone` VALUES ('35', 'Huyện Thanh Oai');
INSERT INTO `county_clone` VALUES ('36', 'Huyện Thường Tín');
INSERT INTO `county_clone` VALUES ('37', 'Huyện Phú Xuyên');
INSERT INTO `county_clone` VALUES ('38', 'Huyện Ứng Hòa');
INSERT INTO `county_clone` VALUES ('39', 'Huyện Mỹ Đức');

-- ----------------------------
-- Table structure for image_clone
-- ----------------------------
DROP TABLE IF EXISTS `image_clone`;
CREATE TABLE `image_clone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cover` tinyint(1) DEFAULT '0',
  `base64` text,
  `size` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1534170 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of image_clone
-- ----------------------------
INSERT INTO `image_clone` VALUES ('1534163', '18', null, '0', null, null, 'public/images/2018-08-08/okxe_18_10446026_348247681989429_3852309148307758203_o.jpg', '2018-08-08 10:56:23', '2018-08-08 10:56:23');
INSERT INTO `image_clone` VALUES ('1534164', '18', null, '0', null, null, 'public/images/2018-08-08/okxe_18_33022260_1725497707571763_245590447643164672_o.jpg', '2018-08-08 10:56:23', '2018-08-08 10:56:23');
INSERT INTO `image_clone` VALUES ('1534165', '18', null, '0', null, null, 'public/images/2018-08-08/okxe_18_anh-girl-xinh-2k-6.jpg', '2018-08-08 10:56:23', '2018-08-08 10:56:23');
INSERT INTO `image_clone` VALUES ('1534166', '19', null, '0', null, null, 'public/images/2018-08-08/okxe_19_10446026_348247681989429_3852309148307758203_o.jpg', '2018-08-08 10:59:49', '2018-08-08 10:59:49');
INSERT INTO `image_clone` VALUES ('1534167', '19', null, '0', null, null, 'public/images/2018-08-08/okxe_19_33022260_1725497707571763_245590447643164672_o.jpg', '2018-08-08 10:59:49', '2018-08-08 10:59:49');
INSERT INTO `image_clone` VALUES ('1534168', '19', null, '0', null, null, 'public/images/2018-08-08/okxe_19_anh-girl-xinh-2k-6.jpg', '2018-08-08 10:59:49', '2018-08-08 10:59:49');
INSERT INTO `image_clone` VALUES ('1534169', '20', null, '0', null, null, 'public/images/2018-10-10/okxe_20_anh-girl-xinh-2k-6.jpg', '2018-10-10 07:47:40', '2018-10-10 07:47:40');

-- ----------------------------
-- Table structure for item_clone
-- ----------------------------
DROP TABLE IF EXISTS `item_clone`;
CREATE TABLE `item_clone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_county` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(12) NOT NULL,
  `cost` int(12) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_model` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `km_range` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Tay Côn/Moto','xe sô','Tay ga') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imported` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of item_clone
-- ----------------------------
INSERT INTO `item_clone` VALUES ('1', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('2', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('3', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('4', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('5', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('6', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('7', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('8', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('9', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('10', '3', '2', 'missing item', '123', '1200', 'missing item', '4', '4', '2018', '1000', 'Tay ga', 'missing item', '091232123', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-07-31 17:01:47', '2018-07-31 17:01:47', '2018-08-01 17:01:47', '0');
INSERT INTO `item_clone` VALUES ('11', '3', '3', ' license-management', '12000231', '1000', 'asdfasdf', '5', '26', '1231', '', '', 'phuong nam', '1234123321', 'https://www.facebook.com/profile.php?id=100015377224192&hc_ref=ARSlMaM9SpLbj4Ze32bPt-plepnWHM9ntwZ0Dl58SV4Lwz6Vl14u5xYHh0kkM_Lbbww', '2018-08-08 10:59:43', '2018-08-08 17:06:34', '', '0');
INSERT INTO `item_clone` VALUES ('12', '3', '4', 'THTHTANTH', '12000231', '1000', 'adsfad', '0', '0', '12331', '', '', 'phuong nam', '1234123321', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-08-08 10:59:43', '2018-08-08 17:07:52', '', '0');
INSERT INTO `item_clone` VALUES ('13', '3', '3', 'RockPOS-italy-394-print-more-than-one-receipt', '1300123', '1000', 'adsf', '0', '0', '0', '', '', '', '123123', 'https://www.facebook.com/profile.php?id=100015377224192&hc_ref=ARSlMaM9SpLbj4Ze32bPt-plepnWHM9ntwZ0Dl58SV4Lwz6Vl14u5xYHh0kkM_Lbbww', '2018-08-08 10:59:43', '2018-08-08 17:09:45', '', '0');
INSERT INTO `item_clone` VALUES ('14', '3', '1', 'RockPOS-italy-394-print-more-than-one-receipt', '1300123', '1200', 'asdfasdf', '4', '1', '1231', '5000-9999', '', 'phuong nam', '1234123321', 'https://www.facebook.com/profile.php?id=100015377224192&hc_ref=ARSlMaM9SpLbj4Ze32bPt-plepnWHM9ntwZ0Dl58SV4Lwz6Vl14u5xYHh0kkM_Lbbww', '2018-08-08 10:59:43', '2018-08-06 16:59:24', '', '0');
INSERT INTO `item_clone` VALUES ('17', '1', '2', 'RockPOS-italy-394-print-more-than-one-receipt', '12000231', '100', 'ádf', '0', '0', '0', '', '', 'phuong nam', '1234123321', 'https://xe.chotot.com/quan-cau-giay/mua-ban-oto/43815504.htm#px=SR-stickyad-[PO-1][PL-top]', '2018-08-08 10:59:43', '2018-08-06 19:27:59', null, '0');
INSERT INTO `item_clone` VALUES ('18', '3', '2', 'RockPOS-italy-394-print-more-than-one-receipt', '12000231', '1200', 'asdfasdf', '0', '0', '0', '', '', 'phuong nam', '1234123321', 'chotot.vn/xesh/dangphuongnam/1000', '2018-08-08 10:56:18', '2018-08-08 10:56:18', '', '0');
INSERT INTO `item_clone` VALUES ('19', '3', '4', 'RockPOS-italy-394-print-more-than-one-receipt', '12000231', '1200', 'ghjghjf', '0', '0', '0', '', '', 'phuong nam', '1234123321', 'https://www.facebook.com/profile.php?id=100015377224192&hc_ref=ARSlMaM9SpLbj4Ze32bPt-plepnWHM9ntwZ0Dl58SV4Lwz6Vl14u5xYHh0kkM_Lbbww', '2018-08-08 10:59:43', '2018-08-08 10:59:43', '', '0');
INSERT INTO `item_clone` VALUES ('20', '3', '2', 'style-preview-3 ', '1312312', '1200', 'sfasdf', '4', '5', '123123', '', '', 'phuong nam', '1234123321', 'sdfasdfasdf', '2018-10-10 07:47:35', '2018-10-10 07:47:35', '', '0');
INSERT INTO `item_clone` VALUES ('21', '3', '4', 'style-preview-3 ', '123123', '1200', 'asdfasd', '0', '0', '0', '', '', '', '12312312', 'asdfasdfasdf', '2018-10-10 07:49:28', '2018-10-10 07:49:28', '', '0');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES ('1', '@', '4', '1');
INSERT INTO `model` VALUES ('2', 'Air Blade', '4', '1');
INSERT INTO `model` VALUES ('4', 'Dream', '4', '1');
INSERT INTO `model` VALUES ('5', 'Dylan', '4', '1');
INSERT INTO `model` VALUES ('6', 'Future', '4', '1');
INSERT INTO `model` VALUES ('7', 'PS', '4', '1');
INSERT INTO `model` VALUES ('8', 'Rebel', '4', '1');
INSERT INTO `model` VALUES ('9', 'SCR', '4', '1');
INSERT INTO `model` VALUES ('10', 'SH', '4', '1');
INSERT INTO `model` VALUES ('11', 'SHi', '4', '1');
INSERT INTO `model` VALUES ('12', 'Spacy', '4', '1');
INSERT INTO `model` VALUES ('13', 'Wave', '4', '1');
INSERT INTO `model` VALUES ('14', 'Win', '4', '1');
INSERT INTO `model` VALUES ('15', 'CB', '4', '1');
INSERT INTO `model` VALUES ('16', 'Click', '4', '1');
INSERT INTO `model` VALUES ('17', 'Cub các loại', '4', '1');
INSERT INTO `model` VALUES ('20', 'Honda khác', '4', '1');
INSERT INTO `model` VALUES ('22', 'Lead', '4', '1');
INSERT INTO `model` VALUES ('23', 'PCX', '4', '1');
INSERT INTO `model` VALUES ('24', 'Shadow', '4', '1');
INSERT INTO `model` VALUES ('25', 'Vision', '4', '1');
INSERT INTO `model` VALUES ('26', 'Kawasaki', '5', '1');
INSERT INTO `model` VALUES ('27', 'Kawasaki khác', '5', '1');
INSERT INTO `model` VALUES ('28', 'Excel', '7', '1');
INSERT INTO `model` VALUES ('29', 'Fly', '7', '1');
INSERT INTO `model` VALUES ('30', 'Gosa', '7', '1');
INSERT INTO `model` VALUES ('31', 'Liberty', '7', '1');
INSERT INTO `model` VALUES ('32', 'LX', '7', '1');
INSERT INTO `model` VALUES ('33', 'Piaggio', '7', '1');
INSERT INTO `model` VALUES ('34', 'khác', '7', '1');
INSERT INTO `model` VALUES ('35', 'Vespa', '7', '1');
INSERT INTO `model` VALUES ('36', 'X9', '7', '1');
INSERT INTO `model` VALUES ('37', 'Zip', '7', '1');
INSERT INTO `model` VALUES ('38', 'Amity', '8', '1');
INSERT INTO `model` VALUES ('39', 'GN', '8', '1');
INSERT INTO `model` VALUES ('40', 'Hayate', '8', '1');
INSERT INTO `model` VALUES ('41', 'Raider', '8', '1');
INSERT INTO `model` VALUES ('42', 'RGV', '8', '1');
INSERT INTO `model` VALUES ('43', 'Sport', '8', '1');
INSERT INTO `model` VALUES ('44', 'Suzuki khác', '8', '1');
INSERT INTO `model` VALUES ('46', 'Viva', '8', '1');
INSERT INTO `model` VALUES ('47', 'Attila', '9', '1');
INSERT INTO `model` VALUES ('48', 'Shark', '9', '1');
INSERT INTO `model` VALUES ('49', 'SYM khác', '9', '1');
INSERT INTO `model` VALUES ('50', 'Cuxi', '10', '1');
INSERT INTO `model` VALUES ('51', 'Cygnus', '10', '1');
INSERT INTO `model` VALUES ('52', 'Exciter', '10', '1');
INSERT INTO `model` VALUES ('53', 'Flame', '10', '1');
INSERT INTO `model` VALUES ('54', 'Jupiter', '10', '1');
INSERT INTO `model` VALUES ('55', 'Majesty', '10', '1');
INSERT INTO `model` VALUES ('56', 'Mio', '10', '1');
INSERT INTO `model` VALUES ('57', 'Nouvo', '10', '1');
INSERT INTO `model` VALUES ('58', 'Sirius', '10', '1');
INSERT INTO `model` VALUES ('59', 'Taurus', '10', '1');
INSERT INTO `model` VALUES ('60', 'Yamaha khác', '10', '1');

-- ----------------------------
-- Table structure for model_clone
-- ----------------------------
DROP TABLE IF EXISTS `model_clone`;
CREATE TABLE `model_clone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_brand` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of model_clone
-- ----------------------------

-- ----------------------------
-- Table structure for payment_clone
-- ----------------------------
DROP TABLE IF EXISTS `payment_clone`;
CREATE TABLE `payment_clone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `amount` float NOT NULL,
  `bonus` float DEFAULT NULL,
  `payer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payment_clone
-- ----------------------------
INSERT INTO `payment_clone` VALUES ('1', '3', '10000', null, '0', '2018-08-07 09:02:59', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'admin');
INSERT INTO `role` VALUES ('2', 'user');

-- ----------------------------
-- Table structure for role_clone
-- ----------------------------
DROP TABLE IF EXISTS `role_clone`;
CREATE TABLE `role_clone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_clone
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `threshold` float(11,0) NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiary_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiary_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float(11,0) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'phuong nam', 'namdv32@wru.vn', null, null, null, '0', null, null, null, null, '100', '$2y$10$UCAtZ9xM5u4ksND6PpZz3us7zy51tEuTbrdzXvLqDl.iTm6XyBI1u', 'aqfaBO6jwWiHubTYJZ4envDuWAk40NDNYutyNcEHRSQgpOHEl0QVVF9LBrjl', '2018-07-21 02:18:39', '2018-08-06 19:28:26', '2');
INSERT INTO `users` VALUES ('2', 'Thanh Thao', 'namdv@hamsa.vn', null, null, null, '0', null, null, null, null, '123', '$2y$10$k3e3IbfG61xBMNlhAzchRel6i313utJi2tiEkbTwNZIhX5ckMjkWG', 'woyJNokGHLUrhkbjbveOcWB2vZIUx3hd0oTdQ3mF4eRolSZLR8r5360ATyFO', '2018-07-23 06:18:54', '2018-10-09 09:49:50', '2');
INSERT INTO `users` VALUES ('3', 'Hacker TH1', 'namdv32@gmail.com', null, null, null, '0', null, null, null, null, '1200', '$2y$10$fthSesl2/oKxMqGGRlCH3.Uyu8kpkqJ6OZnegj2yzrjrwJrUYdt..', 'DmVdBxZxjI3k806Aceu4sUwiEtGwekXP1vZm6KgU9fxEZZVPbqSTqR9elX7S', '2018-07-23 16:57:10', '2018-08-06 19:27:18', '1');
INSERT INTO `users` VALUES ('7', 'Dang Phuong Nam', 'admin@hamsa.vn', '0962406525', 'ádfasdfad', 'ádfasdfadsf', '12888321', 'ádfasdf', 'ádfasdf', 'ádfasdf', 'asdfasdf', '1300123', '$2y$10$wuNlQ4iJRjLwTUeDPQGEMu5vIad/RteXPIsl7HkHHZrdhGU0bn01K', 'xkbtggbiSJjWSakEV2vHRNCHpW5B6aw1eZRb72owfmuJZXQpcSWVxgaDKcDk', '2018-07-24 17:20:21', '2018-07-24 17:21:03', '0');
