-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 03 月 19 日 04:13
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
  `cstMajor` varchar(32) NOT NULL COMMENT '顾问研究方向',
  `cstType` varchar(32) NOT NULL COMMENT '提供服务类型',
  `language` varchar(64) NOT NULL COMMENT '语言',
  `introduction` varchar(1024) NOT NULL COMMENT '简介',
  `phone` int(11) NOT NULL COMMENT '手机号',
  `email` varchar(64) NOT NULL COMMENT '邮箱',
  `sort` int(8) NOT NULL COMMENT '排序',
  PRIMARY KEY (`cstId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `of_school`
--

CREATE TABLE IF NOT EXISTS `of_school` (
  `sId` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `sName` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '学校中文名',
  `eName` varchar(128) NOT NULL COMMENT '学校英文名',
  `sMajor` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '学校专业',
  `sort` int(8) NOT NULL COMMENT '学校排名（用于首页展示效果）',
  `image` varchar(64) NOT NULL COMMENT '图片路径',
  PRIMARY KEY (`sId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `of_school`
--

INSERT INTO `of_school` (`sId`, `sName`, `eName`, `sMajor`, `sort`, `image`) VALUES
(1, '剑桥大学', 'University of Cambridge', '', 1, '/offerhave/Data/Images/School/Cambridge.jpg'),
(2, '伦敦大学学院', 'University College London', '', 2, '/offerhave/Data/Images/School/Cambridge.jpg/UCL.jpg'),
(3, '伦敦政治经济学院', 'London School of Economics and Political Science', '', 3, '/offerhave/Data/Images/School/LSE.jpg'),
(4, '帝国理工学院', 'Imperial College London', '', 4, '/offerhave/Data/Images/School/IC.jpg'),
(5, '伦敦国王学院', 'King''s College London', '', 5, '/offerhave/Data/Images/School/KCL.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `of_user`
--

CREATE TABLE IF NOT EXISTS `of_user` (
  `uId` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `uNick` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '昵称',
  `pwd` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '密码',
  `uName` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '真实姓名',
  `email` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `phone` int(11) NOT NULL COMMENT '手机号',
  `lastloginip` int(10) NOT NULL COMMENT '最后登录IP地址',
  `lastvisittime` int(10) NOT NULL COMMENT '最后登录时间',
  `regtime` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '注册时间',
  `isDelete` int(1) NOT NULL COMMENT '逻辑删除',
  PRIMARY KEY (`uId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `of_user`
--

INSERT INTO `of_user` (`uId`, `uNick`, `pwd`, `uName`, `email`, `phone`, `lastloginip`, `lastvisittime`, `regtime`, `isDelete`) VALUES
(1, 'XQ', 'e10adc3949ba59abbe56e057f20f883e', '', 'xqnssa@qq.com', 0, 127, 1426576410, '', 0),
(2, 'xqnssa', '12e83b7076695d26a869500e1de9f257', '', 'xqnssa@163.com', 0, 0, 0, '', 0),
(3, '123', 'e10adc3949ba59abbe56e057f20f883e', '', 'xq@q.com', 0, 0, 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
