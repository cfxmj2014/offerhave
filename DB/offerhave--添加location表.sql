-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 04 月 09 日 10:38
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
-- 表的结构 `of_application`
--

CREATE TABLE IF NOT EXISTS `of_application` (
  `aId` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `uId` int(8) NOT NULL COMMENT '用户ID',
  `totalPrice` int(30) NOT NULL COMMENT '总价',
  `message` varchar(1024) CHARACTER SET utf8 NOT NULL COMMENT '订单留言',
  `time` int(10) NOT NULL COMMENT '提交时间',
  `tag` int(8) NOT NULL COMMENT '0：未交钱 1：定金 2：全额',
  `status` varchar(50) NOT NULL COMMENT '订单状态',
  PRIMARY KEY (`aId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `of_application`
--

INSERT INTO `of_application` (`aId`, `uId`, `totalPrice`, `message`, `time`, `tag`, `status`) VALUES
(1, 1, 10200, '000', 1427352908, 0, ''),
(2, 1, 10200, '000', 1427352911, 0, ''),
(3, 1, 10200, '000', 1427352911, 0, ''),
(4, 1, 10200, '000', 1427352911, 0, ''),
(5, 1, 16200, '000', 1427352922, 0, ''),
(6, 1, 7700, '000', 1427352929, 0, ''),
(7, 1, 7700, '000', 1427352930, 0, ''),
(8, 1, 7700, '000', 1427352930, 0, ''),
(9, 1, 7700, '000', 1427352930, 0, ''),
(10, 1, 43200, '000', 1427353046, 0, ''),
(11, 1, 50700, '000', 1427353133, 0, ''),
(12, 1, 50700, '', 1427357214, 0, ''),
(13, 1, 21600, '', 1427449638, 0, ''),
(14, 1, 11900, '', 1427684926, 0, ''),
(15, 4, 8000, '', 1427863414, 0, ''),
(16, 4, 5700, '测试', 1428546730, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `of_applicationdetail`
--

CREATE TABLE IF NOT EXISTS `of_applicationdetail` (
  `aId` int(8) NOT NULL COMMENT '订单ID',
  `svId` int(8) NOT NULL COMMENT '服务ID',
  `cstId` int(8) NOT NULL COMMENT '顾问ID',
  `count` int(8) NOT NULL COMMENT '数量',
  PRIMARY KEY (`aId`,`svId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `of_applicationdetail`
--

INSERT INTO `of_applicationdetail` (`aId`, `svId`, `cstId`, `count`) VALUES
(1, 1, 2, 1),
(1, 2, 2, 2),
(1, 4, 2, 5),
(2, 1, 2, 1),
(2, 2, 2, 2),
(2, 4, 2, 5),
(3, 1, 2, 1),
(3, 2, 2, 2),
(3, 4, 2, 5),
(4, 1, 2, 1),
(4, 2, 2, 2),
(4, 4, 2, 5),
(5, 1, 2, 1),
(5, 2, 2, 2),
(5, 4, 2, 11),
(6, 1, 1, 1),
(6, 2, 1, 2),
(6, 3, 1, 1),
(6, 4, 1, 1),
(7, 1, 1, 1),
(7, 2, 1, 2),
(7, 3, 1, 1),
(7, 4, 1, 1),
(8, 1, 1, 1),
(8, 2, 1, 2),
(8, 3, 1, 1),
(8, 4, 1, 1),
(9, 1, 1, 1),
(9, 2, 1, 2),
(9, 3, 1, 1),
(9, 4, 1, 1),
(10, 1, 1, 6),
(10, 2, 1, 6),
(10, 3, 1, 6),
(10, 4, 1, 6),
(11, 1, 1, 6),
(11, 2, 1, 6),
(11, 3, 1, 6),
(11, 4, 1, 11),
(12, 1, 1, 6),
(12, 2, 1, 6),
(12, 3, 1, 6),
(12, 4, 1, 11),
(13, 1, 1, 3),
(13, 2, 1, 3),
(13, 3, 1, 3),
(13, 4, 1, 3),
(14, 1, 1, 2),
(14, 2, 1, 2),
(14, 3, 1, 1),
(14, 4, 1, 1),
(15, 1, 5, 2),
(16, 1, 2, 1),
(16, 2, 2, 1),
(16, 4, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `of_choose`
--

CREATE TABLE IF NOT EXISTS `of_choose` (
  `ChSchool` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '中国学校类别',
  `AverageScore` int(4) NOT NULL COMMENT '平均成绩',
  `ReSchool` varchar(16) NOT NULL COMMENT '推荐学校类别',
  `SafeSchool` varchar(16) NOT NULL COMMENT '保底学校'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `of_choose`
--

INSERT INTO `of_choose` (`ChSchool`, `AverageScore`, `ReSchool`, `SafeSchool`) VALUES
('985', 90, '1', '2'),
('985', 85, '1', '2'),
('985', 80, '1#2', '3'),
('985', 75, '2', '3'),
('985', 74, '3', '4'),
('211', 90, '1', '2'),
('211', 85, '1', '2#3'),
('211', 80, '2#3', '4'),
('211', 75, '3', '4'),
('211', 74, '3#4', '5'),
('general', 90, '2', '3'),
('general', 85, '2', '3'),
('general', 80, '3', '4'),
('general', 75, '4', '5'),
('general', 74, '4', '5');

-- --------------------------------------------------------

--
-- 表的结构 `of_config`
--

CREATE TABLE IF NOT EXISTS `of_config` (
  `Conf` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '配置项',
  `Val` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '配置值'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `of_config`
--

INSERT INTO `of_config` (`Conf`, `Val`) VALUES
('RecommendNum', '4'),
('SafeNum', '2');

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
(1, 'Christina Efrosini1', '/offerhave/Data/Images/Consultant/cst-1.jpg', '英国', 1, '工科', 'Native／硕士', '英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(2, 'Christina Efrosini2', '/offerhave/Data/Images/Consultant/cst-2.jpg', '英国', 1, '工科', 'Native／硕士', '英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(3, 'Christina Efrosini3', '/offerhave/Data/Images/Consultant/cst-4.jpg', '英国', 2, '工科', 'Native／硕士', '英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(4, 'Christina Efrosini4', '/offerhave/Data/Images/Consultant/cst-3.jpg', '英国', 2, '经济金融', '海外留学生/博士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(5, 'Christina Efrosini5', '/offerhave/Data/Images/Consultant/cst-4.jpg', '英国', 3, '经济金融', '海外留学生/硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(6, 'Christina Efrosini6', '/offerhave/Data/Images/Consultant/s-1.jpg', '英国', 3, '商科', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(7, 'Christina Efrosini7', '/offerhave/Data/Images/Consultant/s-2.jpg', '英国', 4, '经济金融', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(8, 'Christina Efrosini8', '/offerhave/Data/Images/Consultant/s-3.jpg', '英国', 4, '工科', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0),
(9, 'Christina Efrosini9', '/offerhave/Data/Images/Consultant/s-4.jpg', '英国', 5, '工科', '海外留学生／硕士', '汉语/英语', 'Hi there! My name is Christina and I am a master student in University College London majoring in Marketing Management. With a professional skill working on personal statement and willing to help more Chinese students, I feel so pleased to help you on application to UK universities. I am looking forward to talk with you guys!!!', 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `of_location`
--

CREATE TABLE IF NOT EXISTS `of_location` (
  `lId` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `uId` int(8) NOT NULL COMMENT '用户ID',
  `abroadTime` int(10) NOT NULL COMMENT '计划出国时间',
  `gradeNow` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '目前就读年级',
  `planItem` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '计划就读项',
  `schoolNow` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '目前就读学校',
  `schoolType` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '现在学校类型',
  `majorNow` varchar(16) CHARACTER SET utf8 NOT NULL COMMENT '现在学习的专业',
  `averageScore` float NOT NULL COMMENT '平均分',
  `expectMajor` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '期望专业',
  PRIMARY KEY (`lId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `of_location`
--

INSERT INTO `of_location` (`lId`, `uId`, `abroadTime`, `gradeNow`, `planItem`, `schoolNow`, `schoolType`, `majorNow`, `averageScore`, `expectMajor`) VALUES
(1, 0, 0, '', '', '', '', '', 0, '');

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
  `Esort` int(4) NOT NULL COMMENT '英国排名',
  `Wsort` int(4) NOT NULL COMMENT '世界排名',
  `Csort` int(4) NOT NULL COMMENT '中国排名',
  `Category` int(4) NOT NULL COMMENT '用于筛选学校类别',
  `Advantage` varchar(256) CHARACTER SET utf8 NOT NULL COMMENT '学校优势',
  `image` varchar(64) NOT NULL COMMENT '图片路径',
  PRIMARY KEY (`sId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `of_school`
--

INSERT INTO `of_school` (`sId`, `sName`, `eName`, `sMajor`, `sort`, `Esort`, `Wsort`, `Csort`, `Category`, `Advantage`, `image`) VALUES
(1, '剑桥大学', 'University of Cambridge', '', 1, 0, 0, 0, 1, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/Cambridge.jpg'),
(2, '伦敦大学学院', 'University College London', '', 2, 0, 0, 0, 2, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/UCL.jpg'),
(3, '伦敦政治经济学院', 'London School of Economics and Political Science', '', 3, 0, 0, 0, 3, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/LSE.jpg'),
(4, '帝国理工学院', 'Imperial College London', '', 4, 0, 0, 0, 4, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/IC.jpg'),
(5, '伦敦国王学院', 'King''s College London', '', 5, 0, 0, 0, 5, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/KCL.jpg'),
(6, '剑桥大学-T', 'University of Cambridge', '', 1, 0, 0, 0, 1, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/Cambridge.jpg'),
(7, '伦敦大学学院-T', 'University College London', '', 2, 0, 0, 0, 2, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/UCL.jpg'),
(8, '伦敦政治经济学院-T', 'London School of Economics and Political Science', '', 3, 0, 0, 0, 3, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/LSE.jpg'),
(9, '帝国理工学院-T', 'Imperial College London', '', 4, 0, 0, 0, 4, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/IC.jpg'),
(10, '伦敦国王学院-T', 'King''s College London', '', 5, 0, 0, 0, 5, '国内认同／教学质量／地理位置／世界排名／专业优势', '/offerhave/Data/Images/School/KCL.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `of_service`
--

CREATE TABLE IF NOT EXISTS `of_service` (
  `svId` int(10) NOT NULL AUTO_INCREMENT,
  `sName` varchar(32) NOT NULL,
  `sType` varchar(50) NOT NULL,
  `sImage` varchar(64) NOT NULL COMMENT '图片路径',
  `sInfo` varchar(64) NOT NULL COMMENT '服务介绍',
  `sTag` varchar(64) NOT NULL COMMENT '收费标准',
  PRIMARY KEY (`svId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `of_service`
--

INSERT INTO `of_service` (`svId`, `sName`, `sType`, `sImage`, `sInfo`, `sTag`) VALUES
(1, '个人陈述文书', '文书', '__PUBLIC__/images/p-3.png', '展示自己，扬长避短，这个最关键。冲击名校，实现梦想，就靠它啦！', ''),
(2, '教授推荐信', '文书', '__PUBLIC__/images/p-4.png', '教授英语很捉急？别怕，我来帮你！', '(每篇)'),
(3, 'Essay 代写', '文书', '__PUBLIC__/images/p-5.png', '假期玩儿High了，来不及写essay了？没事儿，名校学霸帮你搞定！', '(每1000字)'),
(4, 'CV个人简历书', '文书', '__PUBLIC__/images/p-6.png', '加上CV提高申请成功率？这儿也有！', ''),
(5, '一站式服务', '套餐', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `of_servicedetail`
--

CREATE TABLE IF NOT EXISTS `of_servicedetail` (
  `svId` int(30) NOT NULL,
  `cstId` int(30) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`svId`,`cstId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `of_servicedetail`
--

INSERT INTO `of_servicedetail` (`svId`, `cstId`, `price`) VALUES
(1, 1, '4200'),
(1, 2, '4200'),
(1, 3, '4200'),
(1, 4, '4100'),
(1, 5, '4000'),
(1, 6, '4200'),
(1, 7, '4100'),
(1, 8, '4000'),
(1, 9, '4000'),
(2, 1, '500'),
(2, 2, '500'),
(2, 6, '500'),
(3, 1, '1000'),
(4, 1, '1500'),
(4, 2, '1000'),
(5, 0, '8000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `of_user`
--

INSERT INTO `of_user` (`uId`, `uNick`, `pwd`, `uName`, `email`, `phone`, `lastloginip`, `lastvisittime`, `regtime`, `isDelete`) VALUES
(1, 'XQ', 'e10adc3949ba59abbe56e057f20f883e', 'xqnssa', 'xqnssa@qq.com', 2147483647, 127, 1427868254, '', 0),
(2, 'xqnssa', '12e83b7076695d26a869500e1de9f257', '111', 'xqnssa@163.com', 222, 10, 1427682300, '', 0),
(3, '123', 'e10adc3949ba59abbe56e057f20f883e', '111', 'xq@q.com', 222, 10, 1427682300, '', 0),
(4, '我要去留学啊', '96e79218965eb72c92a549dd5a330112', '陈发', 'test@qq.com', 2147483647, 10, 1428546646, '', 0),
(5, '手机测试注册', '96e79218965eb72c92a549dd5a330112', '111', 'mobile@qq.com', 222, 10, 1427682300, '', 0),
(6, '我要去留学啊啊', '96e79218965eb72c92a549dd5a330112', '111', 'test@163.com', 222, 10, 1427682300, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
