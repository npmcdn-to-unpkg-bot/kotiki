/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50530
Source Host           : localhost:3306
Source Database       : pfdb

Target Server Type    : MYSQL
Target Server Version : 50530
File Encoding         : 65001

Date: 2016-06-11 09:08:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cards
-- ----------------------------
DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hdr_card` text,
  `desc_card` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cards
-- ----------------------------
INSERT INTO `cards` VALUES ('1', 'Заголовок карты1', 'Текст карты');
INSERT INTO `cards` VALUES ('2', 'Заголовок карты2', 'Текст карты');
INSERT INTO `cards` VALUES ('3', 'Заголовок карты3', 'Текст карты');
INSERT INTO `cards` VALUES ('4', 'Заголовок карты4', 'Текст карты');
INSERT INTO `cards` VALUES ('5', 'Заголовок карты5', 'Текст карты');
INSERT INTO `cards` VALUES ('6', 'Заголовок карты6', 'Текст карты');
INSERT INTO `cards` VALUES ('7', 'Заголовок карты7', 'Текст карты');
INSERT INTO `cards` VALUES ('8', 'Заголовок карты8', 'Текст карты');
INSERT INTO `cards` VALUES ('9', 'Заголовок карты9', 'Текст карты');
INSERT INTO `cards` VALUES ('10', 'Заголовок карты10', 'Текст карты');

-- ----------------------------
-- Table structure for fils
-- ----------------------------
DROP TABLE IF EXISTS `fils`;
CREATE TABLE `fils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proj` int(11) DEFAULT NULL,
  `fpath` text,
  `ftitle` text,
  `fhref` text,
  `whtuse` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fils
-- ----------------------------
INSERT INTO `fils` VALUES ('1', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('2', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('3', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('4', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('5', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('6', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('7', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('8', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('9', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('10', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('11', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('12', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('13', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('14', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('15', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('16', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('17', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('18', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('19', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');
INSERT INTO `fils` VALUES ('20', null, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', '0');

-- ----------------------------
-- Table structure for imgs
-- ----------------------------
DROP TABLE IF EXISTS `imgs`;
CREATE TABLE `imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proj` int(11) DEFAULT NULL,
  `fpath` text,
  `ftitle` text,
  `fhref` text,
  `whtuse` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imgs
-- ----------------------------
INSERT INTO `imgs` VALUES ('1', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('2', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('3', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('4', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('5', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('6', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('7', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('8', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('9', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('10', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('11', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('12', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('13', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('14', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('15', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('16', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('17', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('18', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('19', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');
INSERT INTO `imgs` VALUES ('20', '1', 'files/img.jpg', 'Заголовок картинки', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', '0');

-- ----------------------------
-- Table structure for proj
-- ----------------------------
DROP TABLE IF EXISTS `proj`;
CREATE TABLE `proj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hdr_shrt` text,
  `desc_shrt` text,
  `hdr_ful` text,
  `desc_ful` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proj
-- ----------------------------
INSERT INTO `proj` VALUES ('1', 'Короткий заголовок проекта111', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне', 'Полное описание проекта в отдельном окне');
INSERT INTO `proj` VALUES ('2', 'Короткий заголовок проекта2', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне', 'Полное описание проекта в отдельном окне');
INSERT INTO `proj` VALUES ('4', 'Короткий заголовок проекта4', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне', 'Полное описание проекта в отдельном окне');
INSERT INTO `proj` VALUES ('5', 'Короткий заголовок проекта5', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне', 'Полное описание проекта в отдельном окне');
INSERT INTO `proj` VALUES ('6', 'Короткий заголовок проекта6', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне', 'Полное описание проекта в отдельном окне');
INSERT INTO `proj` VALUES ('7', 'Короткий заголовок проекта71', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне', 'Полное описание проекта в отдельном окне');
INSERT INTO `proj` VALUES ('26', '111', '222', '333', '444');
INSERT INTO `proj` VALUES ('32', '11111', '1', '11', '1');
INSERT INTO `proj` VALUES ('33', '2', '2', '2', '2');
INSERT INTO `proj` VALUES ('34', '3', '3', '3', '3');
INSERT INTO `proj` VALUES ('35', '4', '4', '4', '4');
INSERT INTO `proj` VALUES ('36', '1', '1', '1', '1');
INSERT INTO `proj` VALUES ('37', '1', '1', '1', '1');
INSERT INTO `proj` VALUES ('38', '2', '2', '2', '2');

-- ----------------------------
-- Table structure for proj_cards
-- ----------------------------
DROP TABLE IF EXISTS `proj_cards`;
CREATE TABLE `proj_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proj` int(11) DEFAULT NULL,
  `id_card` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proj_cards
-- ----------------------------
INSERT INTO `proj_cards` VALUES ('1', '1', '1', '1');
INSERT INTO `proj_cards` VALUES ('2', '2', '1', '4');
INSERT INTO `proj_cards` VALUES ('4', '4', '1', '2');
INSERT INTO `proj_cards` VALUES ('5', '5', '3', '1');
INSERT INTO `proj_cards` VALUES ('6', '6', '3', '2');
INSERT INTO `proj_cards` VALUES ('7', '7', '5', '1');
INSERT INTO `proj_cards` VALUES ('14', '26', '1', '5');
INSERT INTO `proj_cards` VALUES ('20', '32', '2', '1');
INSERT INTO `proj_cards` VALUES ('21', '33', '2', '1');
INSERT INTO `proj_cards` VALUES ('22', '34', '2', '1');
INSERT INTO `proj_cards` VALUES ('23', '35', '2', '1');
INSERT INTO `proj_cards` VALUES ('24', '36', '4', '1');
INSERT INTO `proj_cards` VALUES ('25', '37', '6', '1');
INSERT INTO `proj_cards` VALUES ('26', '38', '6', '1');

-- ----------------------------
-- Table structure for proj_tags
-- ----------------------------
DROP TABLE IF EXISTS `proj_tags`;
CREATE TABLE `proj_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proj` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proj_tags
-- ----------------------------
INSERT INTO `proj_tags` VALUES ('1', '1', '1');
INSERT INTO `proj_tags` VALUES ('2', '1', '1');
INSERT INTO `proj_tags` VALUES ('3', '1', '1');
INSERT INTO `proj_tags` VALUES ('4', '1', '1');
INSERT INTO `proj_tags` VALUES ('5', '1', '1');
INSERT INTO `proj_tags` VALUES ('6', '1', '1');
INSERT INTO `proj_tags` VALUES ('7', '1', '1');
INSERT INTO `proj_tags` VALUES ('8', '1', '1');
INSERT INTO `proj_tags` VALUES ('9', '1', '1');
INSERT INTO `proj_tags` VALUES ('10', '1', '1');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_id` int(11) DEFAULT NULL,
  `tag` text,
  `tag_pri` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('2', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('3', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('4', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('5', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('6', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('7', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('8', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('9', '1', 'javascript', '0');
INSERT INTO `tags` VALUES ('10', '1', 'javascript', '0');

-- ----------------------------
-- Table structure for usr_admin
-- ----------------------------
DROP TABLE IF EXISTS `usr_admin`;
CREATE TABLE `usr_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text,
  `pass` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usr_admin
-- ----------------------------
INSERT INTO `usr_admin` VALUES ('1', 'email@gmail.com', '123');
