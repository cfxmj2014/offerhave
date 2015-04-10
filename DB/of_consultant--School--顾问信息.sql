-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 03 月 19 日 10:19
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `offerhave`
--

-- --------------------------------------------------------

--
-- 表的结构 `of_consultant`
--

CREATE TABLE IF NOT EXISTS `of_consultant` (
  `cstId` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `cstName` varchar(64) NOT NULL COMMENT '名字',
  `image` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '图片路径',
  `country` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '国家',
  `sId` int(8) NOT NULL COMMENT '学校ID',
  `cstMajor` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '顾问研究方向',
  `cstType` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '提供服务类型',
  `language` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '语言',
  `introduction` varchar(1024) CHARACTER SET utf8 NOT NULL COMMENT '简介',
  `phone` int(11) NOT NULL COMMENT '手机号',
  `email` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `sort` int(8) NOT NULL COMMENT '排序',
  PRIMARY KEY (`cstId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `of_consultant`
--

INSERT INTO `of_consultant` (`cstId`, `cstName`, `image`, `country`, `sId`, `cstMajor`, `cstType`, `language`, `introduction`, `phone`, `email`, `sort`) VALUES
(1, 'Christina Efrosini1', '/offerhave/Data/Images/Consultant/cst-1.jpg', '英国', 0, '工科', 'Native／硕士', '英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(2, 'Christina Efrosini2', '/offerhave/Data/Images/Consultant/cst-2.jpg', '英国', 0, '工科', 'Native／硕士', '英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(3, 'Christina Efrosini3', '/offerhave/Data/Images/Consultant/cst-4.jpg', '英国', 0, '工科', 'Native／硕士', '英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(4, 'Christina Efrosini4', '/offerhave/Data/Images/Consultant/cst-3.jpg', '英国', 0, '经济金融', '海外留学生/博士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(5, 'Christina Efrosini5', '/offerhave/Data/Images/Consultant/cst-4.jpg', '英国', 0, '经济金融', '海外留学生/硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(6, 'Christina Efrosini6', '/offerhave/Data/Images/Consultant/s-1.jpg', '英国', 0, '商科', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(7, 'Christina Efrosini7', '/offerhave/Data/Images/Consultant/s-2.jpg', '英国', 0, '经济金融', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(8, 'Christina Efrosini8', '/offerhave/Data/Images/Consultant/s-3.jpg', '英国', 0, '工科', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(9, 'Christina Efrosini9', '/offerhave/Data/Images/Consultant/s-4.jpg', '英国', 0, '工科', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
