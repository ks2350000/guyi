-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-15 02:24:33
-- 服务器版本： 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guyi`
--

-- --------------------------------------------------------

--
-- 表的结构 `sc_access`
--

DROP TABLE IF EXISTS `sc_access`;
CREATE TABLE IF NOT EXISTS `sc_access` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '权限名称',
  `urls` varchar(1000) NOT NULL COMMENT 'json 数组',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` timestamp NOT NULL COMMENT '最后一次更新时间',
  `created_time` timestamp NOT NULL COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限详情表';

-- --------------------------------------------------------

--
-- 表的结构 `sc_access_log`
--

DROP TABLE IF EXISTS `sc_access_log`;
CREATE TABLE IF NOT EXISTS `sc_access_log` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '对应操作人员',
  `ip` varchar(40) NOT NULL COMMENT 'ip地址',
  `note` varchar(1000) NOT NULL COMMENT '做了什么',
  `created_time` timestamp NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_address`
--

DROP TABLE IF EXISTS `sc_address`;
CREATE TABLE IF NOT EXISTS `sc_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收货地址id',
  `uid` int(11) NOT NULL COMMENT '用户名id',
  `name` varchar(200) NOT NULL COMMENT '收货人',
  `phone` int(16) NOT NULL COMMENT '手机号',
  `dizhi` varchar(200) NOT NULL COMMENT '收货地址',
  `youbian` int(16) NOT NULL COMMENT '邮政编码',
  `clos` int(11) NOT NULL DEFAULT '1' COMMENT '默认1，删除0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_buy`
--

DROP TABLE IF EXISTS `sc_buy`;
CREATE TABLE IF NOT EXISTS `sc_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购买记录id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `coid` int(11) NOT NULL COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_category`
--

DROP TABLE IF EXISTS `sc_category`;
CREATE TABLE IF NOT EXISTS `sc_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品种类id',
  `name` varchar(200) NOT NULL COMMENT '种类名称',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '父级种类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_collect`
--

DROP TABLE IF EXISTS `sc_collect`;
CREATE TABLE IF NOT EXISTS `sc_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收藏id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `coid` int(11) NOT NULL COMMENT '商品id',
  `clos` int(11) NOT NULL DEFAULT '1' COMMENT '取消收藏0，默认1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_commodity`
--

DROP TABLE IF EXISTS `sc_commodity`;
CREATE TABLE IF NOT EXISTS `sc_commodity` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `cid` int(11) NOT NULL COMMENT '商品种类',
  `name` varchar(200) NOT NULL COMMENT '商品名字',
  `money` int(32) NOT NULL COMMENT '原价格',
  `dmoney` int(32) DEFAULT NULL COMMENT '现价格',
  `introduce` varchar(500) NOT NULL COMMENT '商品简介',
  `comimgs` varchar(500) NOT NULL COMMENT '商品图片',
  `num` int(200) NOT NULL COMMENT '商品数量',
  `year` int(32) NOT NULL COMMENT '年代',
  `writer` varchar(50) DEFAULT NULL COMMENT '作家',
  `sizes` varchar(32) DEFAULT NULL COMMENT '尺寸/大小',
  `caizhi` varchar(200) DEFAULT NULL COMMENT '材质',
  `state` int(11) DEFAULT '1' COMMENT '商品状态，1上架，0下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_rec`
--

DROP TABLE IF EXISTS `sc_rec`;
CREATE TABLE IF NOT EXISTS `sc_rec` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '推荐表id',
  `coid` int(11) NOT NULL COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_role`
--

DROP TABLE IF EXISTS `sc_role`;
CREATE TABLE IF NOT EXISTS `sc_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` timestamp NOT NULL COMMENT '最后一次更新时间',
  `created_time` timestamp NOT NULL COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户角色表';

--
-- 转存表中的数据 `sc_role`
--

INSERT INTO `sc_role` (`id`, `name`, `status`, `updated_time`, `created_time`) VALUES
(1, '超级管理员', 1, '2018-03-11 11:49:02', '2018-03-11 11:49:02'),
(2, '普通管理员', 1, '2018-03-11 11:49:02', '2018-03-11 11:49:02'),
(3, '编辑管理员', 1, '2018-03-11 12:29:52', '2018-03-11 12:29:52');

-- --------------------------------------------------------

--
-- 表的结构 `sc_role_access`
--

DROP TABLE IF EXISTS `sc_role_access`;
CREATE TABLE IF NOT EXISTS `sc_role_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `access_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限id',
  `created_time` int(11) NOT NULL COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

--
-- 转存表中的数据 `sc_role_access`
--

INSERT INTO `sc_role_access` (`id`, `role_id`, `access_id`, `created_time`) VALUES
(1, 1, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sc_shopping`
--

DROP TABLE IF EXISTS `sc_shopping`;
CREATE TABLE IF NOT EXISTS `sc_shopping` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `coid` int(11) NOT NULL COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_special`
--

DROP TABLE IF EXISTS `sc_special`;
CREATE TABLE IF NOT EXISTS `sc_special` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '专场id',
  `name` varchar(200) NOT NULL COMMENT '专场名字',
  `coid` int(11) NOT NULL COMMENT '商品id',
  `scid` int(11) NOT NULL COMMENT '对应专场id',
  `clos` int(11) NOT NULL DEFAULT '1' COMMENT '开启1，关闭0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sc_user`
--

DROP TABLE IF EXISTS `sc_user`;
CREATE TABLE IF NOT EXISTS `sc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(40) NOT NULL COMMENT '密码',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是超级管理员 1表示是 0 表示不是',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` int(11) DEFAULT NULL COMMENT '最后一次更新时间',
  `created_time` int(11) DEFAULT NULL COMMENT '插入时间',
  `phone` varchar(50) NOT NULL COMMENT '手机号',
  `sex` tinyint(1) DEFAULT '1' COMMENT '性别 1：男 0：女',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `sc_user`
--

INSERT INTO `sc_user` (`id`, `name`, `password`, `email`, `is_admin`, `status`, `updated_time`, `created_time`, `phone`, `sex`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'yth178@163.com', 1, 1, 1520927471, 1520927471, '15063782826', 1),
(2, '面包', '65d79295c87e452cb6dabf5cd7427084', NULL, 0, 1, 1520927471, 1520927471, '18301467476', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
