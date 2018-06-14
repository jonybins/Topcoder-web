-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-02-23 14:22:41
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `topcoder`
--

-- --------------------------------------------------------

--
-- 表的结构 `tc_adminuser`
--

CREATE TABLE IF NOT EXISTS `tc_adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户表：包括后台管理员、商家会员和普通会员',
  `name` varchar(20) NOT NULL COMMENT '登陆账号',
  `uname` varchar(10) DEFAULT NULL COMMENT '昵称',
  `pwd` varchar(50) NOT NULL COMMENT 'MD5密码',
  `qx` tinyint(4) NOT NULL DEFAULT '5' COMMENT '权限 4超级管理员 5普通管理员',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建日期',
  `del` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `tc_adminuser`
--

INSERT INTO `tc_adminuser` (`id`, `name`, `uname`, `pwd`, `qx`, `addtime`, `del`) VALUES
(1, 'admin', '超级管理员', '14e1b600b1fd579f47433b88e8d85291', 4, 1375086480, 0),
(2, 'ceshi', '普通管理员', '14e1b600b1fd579f47433b88e8d85291', 5, 1493262002, 0),
(3, 'ceshi2', '普通管理员', '550e1bafe077ff0b0b67f4e32f29d751', 5, 1493262042, 0),
(4, 'test', '普通管理员', '14e1b600b1fd579f47433b88e8d85291', 5, 1498634942, 1),
(5, 'hxxy2003', '普通管理员', '14e1b600b1fd579f47433b88e8d85291', 5, 1498636731, 0),
(6, 'fdsafd', '普通管理员', '9055a12518dc6631ab421d03003f0f9c', 5, 1498636738, 0),
(7, 'fdsafsda', '普通管理员', '07cd3d179cab8fdc94cb3c08766a4713', 5, 1498636758, 0),
(8, 'asaa', '普通管理员', '4c2f0934fa62306c76a89477e563f7ce', 5, 1498636767, 0),
(9, 'tretre', '普通管理员', '280179d97a5f8877b93b3537ca69e908', 5, 1498636775, 0),
(10, 'fdsafdsa', '普通管理员', '07cd3d179cab8fdc94cb3c08766a4713', 5, 1498636786, 0),
(11, 'fdsafdsafdsa', '普通管理员', '07cd3d179cab8fdc94cb3c08766a4713', 5, 1498636793, 0),
(12, 'fdsafdsafdsaf', '普通管理员', '36c97f6a8b2beb254581ebb46369a3ae', 5, 1498636810, 0),
(13, '123', '普通管理员', '14e1b600b1fd579f47433b88e8d85291', 5, 1519391347, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tc_bbs`
--

CREATE TABLE IF NOT EXISTS `tc_bbs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '帖主的id',
  `pid` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL COMMENT '回帖人的姓名',
  `tc_group` varchar(5) NOT NULL COMMENT '回帖人的组别',
  `grade` varchar(5) NOT NULL COMMENT '回帖人的年级',
  `conf` varchar(5) DEFAULT NULL COMMENT '是否允许评论',
  `title` varchar(40) NOT NULL COMMENT '标题',
  `content` varchar(300) NOT NULL COMMENT '内容',
  `date` date NOT NULL COMMENT '时间',
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='回贴信息' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tc_bbs`
--

INSERT INTO `tc_bbs` (`id`, `pid`, `name`, `tc_group`, `grade`, `conf`, `title`, `content`, `date`) VALUES
(3, 0, 'xubin', '项目组', '2014级', 'on', '这是第三个贴纸', '文章内容是的当时的的三分到手的\r\n						                ', '2017-04-25'),
(4, 0, 'xubin', '项目组', '2014级', NULL, 'sdfsd风格豆腐干反对', '文章内容豆腐干豆腐干豆腐干豆腐干风格豆腐干\r\n						                ', '0000-00-00'),
(5, 0, 'xubin', '项目组', '2014级', NULL, 'sdfsd风格豆腐干反对', '尔特瑞特瑞特瑞特瑞特瑞特热\r\n						                ', '0000-00-00'),
(6, 0, 'xubin', '项目组', '2014级', NULL, 'dfgfd', '文章内容\r\n			dfgsdfgsdfgsdfgsdfg			                ', '0000-00-00');

-- --------------------------------------------------------

--
-- 表的结构 `tc_bbscof`
--

CREATE TABLE IF NOT EXISTS `tc_bbscof` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(15) NOT NULL,
  `uid` int(15) NOT NULL COMMENT '帖子内容',
  `name` varchar(15) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `tc_group` varchar(5) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='写帖人信息' AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `tc_bbscof`
--

INSERT INTO `tc_bbscof` (`id`, `pid`, `uid`, `name`, `grade`, `tc_group`, `content`, `date`) VALUES
(18, 0, 1, '桂荣珍', '2015级', '项目组', '111111111111', '2017-04-11'),
(19, 18, 1, '桂荣珍', '2015级', '项目组', '2222222222222', '2017-04-07'),
(20, 19, 1, '桂荣珍', '2015级', '项目组', '333333333333333333', '2017-04-24'),
(21, 20, 1, '桂荣珍', '2015级', '项目组', '444444444444444', '2017-04-24'),
(22, 0, 2, 'xubin', '2014级', '项目组', 'hha哈哈哈哈哈哈哈哈哈', '2017-04-24'),
(23, 0, 3, 'xubin', '2014级', '项目组', '士大夫士大夫', '2017-04-24'),
(24, 0, 3, 'xubin', '2014级', '项目组', '士大夫似的', '2017-04-15'),
(25, 23, 3, 'xubin', '2014级', '项目组', 'sdfsdfsd', '0000-00-00');

-- --------------------------------------------------------

--
-- 表的结构 `tc_brand`
--

CREATE TABLE IF NOT EXISTS `tc_brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品品牌表',
  `name` varchar(100) NOT NULL COMMENT '品牌名称',
  `photo` varchar(100) DEFAULT NULL COMMENT '图片',
  `type` tinyint(2) DEFAULT '0' COMMENT '是否推荐',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `shop_id` int(11) unsigned DEFAULT '0' COMMENT '店铺id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `tc_brand`
--

INSERT INTO `tc_brand` (`id`, `name`, `photo`, `type`, `addtime`, `shop_id`) VALUES
(11, 'TC活动', 'UploadFiles/brand/20180223/1519350825330758.jpg', 0, 1519350825, 0),
(10, '国庆集训', 'UploadFiles/brand/20180222/1519268365326296.jpg', 0, 1519268365, 0),
(9, '工作室聚餐', 'UploadFiles/brand/20180222/1519268248961764.jpg', 0, 1519268249, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tc_category`
--

CREATE TABLE IF NOT EXISTS `tc_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT '父级分类id',
  `name` varchar(50) NOT NULL COMMENT '栏目名称',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `concent` varchar(255) DEFAULT NULL COMMENT '栏目简介',
  `bz_1` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `bz_2` varchar(255) DEFAULT NULL COMMENT '备注字段',
  `bz_3` varchar(100) DEFAULT NULL COMMENT '图标',
  `bz_4` tinyint(2) NOT NULL DEFAULT '0' COMMENT '备用字段',
  `bz_5` varchar(100) DEFAULT NULL COMMENT '推荐略缩图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `tc_category`
--

INSERT INTO `tc_category` (`id`, `tid`, `name`, `sort`, `addtime`, `concent`, `bz_1`, `bz_2`, `bz_3`, `bz_4`, `bz_5`) VALUES
(1, 0, '产品分类（系统分类，不要删除）', 0, 0, '', '', NULL, '', 0, NULL),
(2, 1, '手机', 1, 1493188517, '手机', 'UploadFiles/category/20170630/1498815628850398.png', '0', NULL, 0, NULL),
(3, 1, '笔记本', 2, 1493188587, '笔记本', 'UploadFiles/category/20170630/1498816659516131.png', '1', NULL, 0, NULL),
(4, 1, '智能硬件', 3, 1493188655, '智能硬件', 'UploadFiles/category/20170630/1498817044193439.png', NULL, NULL, 0, NULL),
(5, 4, '路由器', 1, 1493188735, '路由器', 'UploadFiles/category/20170630/1498817235977098.png', '1', NULL, 0, NULL),
(12, 1, '周边配件', 5, 1495694783, '周边配件', 'UploadFiles/category/20170630/1498817466248911.jpg', NULL, NULL, 0, NULL),
(8, 2, '红米', 1, 1494211044, '红米', 'UploadFiles/category/20170630/1498816164528404.png', NULL, NULL, 0, NULL),
(9, 3, '电脑', 1, 1494211080, '电脑', 'UploadFiles/category/20170630/1498816738489391.png', NULL, NULL, 0, NULL),
(13, 12, '耳机', 1, 1495694905, '耳机', 'UploadFiles/category/20170630/1498817567512643.jpg', NULL, NULL, 0, NULL),
(19, 12, '手环', 0, 1498818093, '手环', 'UploadFiles/category/20170630/1498818092623976.jpg', NULL, NULL, 0, NULL),
(15, 2, '小米', 2, 1495694950, '小米', 'UploadFiles/category/20170630/1498816223479651.png', NULL, NULL, 0, NULL),
(16, 4, '净化器', 2, 1495698002, '净化器', 'UploadFiles/category/20170630/1498817327332325.png', NULL, NULL, 0, NULL),
(17, 3, '鼠标', 2, 1495698212, '鼠标', 'UploadFiles/category/20170630/1498816813257929.png', NULL, NULL, 0, NULL),
(18, 2, '平板', 90, 1498640233, '平板', 'UploadFiles/category/20170630/1498816577371393.png', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tc_greatest`
--

CREATE TABLE IF NOT EXISTS `tc_greatest` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `sex` text NOT NULL,
  `grade` text NOT NULL,
  `groups` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `wechat` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL COMMENT '电子邮件',
  `address` text NOT NULL COMMENT '工作地址',
  `l_exp` text NOT NULL COMMENT '学习经验',
  `w_exp` text NOT NULL COMMENT '工作经验',
  `motto` text NOT NULL COMMENT '寄语',
  `status` varchar(4) NOT NULL DEFAULT 'on',
  `class` varchar(6) NOT NULL DEFAULT 'common' COMMENT '等级',
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tc_greatest`
--

INSERT INTO `tc_greatest` (`id`, `username`, `name`, `password`, `sex`, `grade`, `groups`, `phone`, `qq`, `wechat`, `email`, `address`, `l_exp`, `w_exp`, `motto`, `status`, `class`, `date`) VALUES
(5, '456', 'xubin', '456', '男', '2014级', '项目组', '13213767383', '910820818', 'xb910820818', '910820818@qq.com', '北京', '说是道非', '', '士大夫士大夫', 'pass', 'manage', '2017-04-18 05:46:34'),
(6, '789', '852', '789', '女', '2011级', '项目组', '14585478965', '2456987413', '14585478965', '2456987413@qq.com', '警告', '减肥', '', '看完', 'die', 'super', '2017-04-18 05:58:38'),
(7, '147', '桂荣珍', '147', 'female', '2015级', '项目组', '13462507449', '2634682912', '13462507449', '2634682912@qq.com', 'null', 'TC', '', '全力以赴追求卓越\r\n', 'on', '', '2017-04-18 06:03:42'),
(8, '369', '369', '', 'female', '2019级', '算法组', '13456895689', '5895566', '5896589', '5689856@qq.com', '56', '556', '', '15', '', '', '2017-04-18 07:08:21'),
(10, '654', '', '654', '', '', '', '', '', '', '654@qq.com', '', '', '', '', 'pass', 'common', '2017-04-20 02:37:23');

-- --------------------------------------------------------

--
-- 表的结构 `tc_guanggao`
--

CREATE TABLE IF NOT EXISTS `tc_guanggao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '子页广告管理表',
  `name` varchar(20) DEFAULT NULL COMMENT '广告名称',
  `photo` varchar(100) DEFAULT NULL COMMENT '图片',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `sort` int(11) NOT NULL DEFAULT '0',
  `type` enum('product','news','partner','index') DEFAULT 'index' COMMENT '广告类型',
  `action` varchar(255) NOT NULL COMMENT '链接值',
  `position` tinyint(2) unsigned DEFAULT '1' COMMENT '广告位置 1首页轮播',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tc_guanggao`
--

INSERT INTO `tc_guanggao` (`id`, `name`, `photo`, `addtime`, `sort`, `type`, `action`, `position`) VALUES
(2, '滚动广告图2', 'UploadFiles/adv/20170524/1495589027693993.jpg', 0, 2, '', '', 1),
(5, '首页轮播', 'UploadFiles/adv/20170525/1495684434521009.jpg', 0, 3, '', '', 1),
(9, '首页轮播', 'UploadFiles/adv/20170524/1495589261959572.jpg', 0, 1, '', '', 1),
(10, '首页轮播', 'UploadFiles/adv/20170524/1495588800716222.jpg', 1493349922, 4, '', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tc_image`
--

CREATE TABLE IF NOT EXISTS `tc_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(8) NOT NULL,
  `img_name` varchar(10) NOT NULL DEFAULT 'TC',
  `path` varchar(10) NOT NULL COMMENT '文件夹位置',
  `src_image` varchar(50) NOT NULL COMMENT '原图',
  `content` varchar(100) NOT NULL COMMENT '图片详情',
  `del` int(2) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `is_show` int(2) NOT NULL DEFAULT '1' COMMENT '是否展示',
  `addtime` int(20) NOT NULL,
  `del_time` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `tc_image`
--

INSERT INTO `tc_image` (`id`, `user`, `img_name`, `path`, `src_image`, `content`, `del`, `is_show`, `addtime`, `del_time`, `updatetime`) VALUES
(32, 'admin', 'adfsd', 'pic2', 'Public/images/pic2/58704e506636c.jpg', 'Public/images/pic2/small_58704e506636c.jpg', 0, 1, 2147483647, 0, 0),
(34, 'admin', 'sdf', 'pic1', 'Public/images/pic1/58719ba2224de.jpg', 'Public/images/pic1/small_58719ba2224de.jpg', 0, 1, 2147483647, 0, 0),
(35, 'admin', 'gdf', 'pic1', 'Public/images/pic1/58719be58e5b6.jpg', 'Public/images/pic1/small_58719be58e5b6.jpg', 1, 1, 2147483647, 1519313241, 0),
(36, 'admin', 'sadgd', 'pic1', 'Public/images/pic1/58719bf070f1b.jpg', 'Public/images/pic1/small_58719bf070f1b.jpg', 0, 1, 2147483647, 0, 0),
(37, 'admin', 'sdfsdf', 'pic1', 'Public/images/pic1/58719c0b00194.jpg', 'Public/images/pic1/small_58719c0b00194.jpg', 0, 1, 2147483647, 0, 0),
(41, 'admin', 'TC', '9', 'UploadFiles/product/20180222/1519311978322696.JPG', '法规的法规水电费', 0, 0, 1519311978, 0, 1519311978),
(42, 'admin', 'TC', '10', 'UploadFiles/product/20180222/1519292017129713.jpg', '的发生的发生的发', 1, 1, 1519292017, 1519313108, 1519292017),
(43, 'admin', '玩儿玩儿', '9', 'UploadFiles/product/20180222/1519292142491157.jpg', '水电费is度', 0, 1, 1519292142, 0, 1519292142);

-- --------------------------------------------------------

--
-- 表的结构 `tc_newstudent`
--

CREATE TABLE IF NOT EXISTS `tc_newstudent` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `n_name` text NOT NULL COMMENT '姓名',
  `n_sno` int(15) NOT NULL COMMENT '学号',
  `n_grade` text NOT NULL COMMENT '班级',
  `n_qq` int(25) NOT NULL COMMENT 'QQ',
  `n_phone` int(15) NOT NULL COMMENT '手机号',
  `n_why` text NOT NULL COMMENT '原因',
  `n_sta` int(2) NOT NULL DEFAULT '0' COMMENT '新生报名状态：0待审核，1审核通过，2拉黑',
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='新生信息' AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `tc_newstudent`
--

INSERT INTO `tc_newstudent` (`id`, `n_name`, `n_sno`, `n_grade`, `n_qq`, `n_phone`, `n_why`, `n_sta`, `addtime`) VALUES
(5, '123', 123, '123', 123, 123, '123', 0, 0),
(7, '456', 456, '456', 456, 456, '456', 0, 0),
(8, '987', 987, '987', 987, 987, '987', 0, 0),
(9, '申请代付', 123144, '顺德区', 53433234, 2147483647, '4243214', 0, 0),
(10, '姓名', 0, '班级', 0, 552, '12\r\n8', 0, 0),
(11, '258', 258, '258', 258, 258, '258', 0, 0),
(12, 'g', 0, 'g', 0, 0, 'g', 0, 0),
(13, 'g', 0, 'g', 0, 0, 'g', 0, 0),
(14, 'g', 0, 'g', 0, 0, 'g', 0, 0),
(15, '姓名', 0, '班级', 0, 0, 'k,', 0, 0),
(16, '姓名', 0, '班级', 0, 0, 'k,', 0, 0),
(17, '徐彬', 1, '1', 2, 3, '4', 0, 0),
(18, '哈哈', 1, '班级', 2, 2147483647, '发水电费撒的发生的发三东方闪电地方撒旦法规和规范和规范说我而特特东方故事电饭锅水电费根深蒂固发生的风格是的弗格森大范甘迪', 0, 0),
(19, '哈哈', 1, '班级', 2, 2147483647, '是的法师打发我二维二维若无切尔去玩儿我去额也让他还有容光焕发电饭锅是电饭锅分割', 1, 0),
(20, '嗯嗯', 2222, '玩儿', 232323, 2147483647, '玩儿玩儿翁王夫人翁让我耳闻二翁让我耳闻二', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tc_program`
--

CREATE TABLE IF NOT EXISTS `tc_program` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(20) NOT NULL COMMENT '名称',
  `name` varchar(20) NOT NULL COMMENT '负责人',
  `describe` varchar(200) DEFAULT NULL COMMENT '简单描述',
  `logo` varchar(100) DEFAULT NULL COMMENT 'logo',
  `copyright` varchar(100) DEFAULT NULL COMMENT '新生群QQ',
  `service_wx` varchar(50) DEFAULT NULL COMMENT '平台客服微信号',
  `tel` varchar(20) DEFAULT NULL COMMENT '平台客服电话',
  `email` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `uptime` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tc_program`
--

INSERT INTO `tc_program` (`id`, `title`, `name`, `describe`, `logo`, `copyright`, `service_wx`, `tel`, `email`, `uptime`) VALUES
(1, 'Topcoder工作室', '徐彬', '3333', 'UploadFiles/logo/1495530723265238.png', 'https://jq.qq.com/?_wv=1027&k=5ZnxAiH', '', '13213767383', '601962781', 1518935923);

-- --------------------------------------------------------

--
-- 表的结构 `tc_user`
--

CREATE TABLE IF NOT EXISTS `tc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户表：包括后台管理员、商家会员和普通会员',
  `name` varchar(20) NOT NULL COMMENT '登陆账号',
  `uname` varchar(10) DEFAULT NULL COMMENT '昵称',
  `pwd` varchar(50) NOT NULL COMMENT 'MD5密码',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建日期',
  `photo` varchar(255) DEFAULT NULL COMMENT '头像',
  `tel` char(15) DEFAULT NULL COMMENT '可用积分',
  `qq_id` varchar(20) NOT NULL DEFAULT '0' COMMENT '发起组团',
  `email` varchar(50) DEFAULT NULL COMMENT '参团积分',
  `sex` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别',
  `del` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `openid` varchar(50) NOT NULL COMMENT '授权ID',
  `source` varchar(10) NOT NULL COMMENT '第三方平台(微信，QQ)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `tc_user`
--

INSERT INTO `tc_user` (`id`, `name`, `uname`, `pwd`, `addtime`, `photo`, `tel`, `qq_id`, `email`, `sex`, `del`, `openid`, `source`) VALUES
(23, '芸芸众生', '芸芸众生', '', 1516177748, 'https://wx.qlogo.cn/mmopen/vi_32/WR5mrHomXWiaGVibTictaiciaTYzN6xGbPcNlM3LYhqzpZDM4y1HrcY7JCqLkibJzbuEPcUiaH6a5rybrcVBDtwBSfF5A/0', NULL, '50', NULL, 1, 0, 'undefined', 'wx'),
(22, '芸芸众生', '芸芸众生', '', 1516176231, 'https://wx.qlogo.cn/mmopen/vi_32/WR5mrHomXWiaGVibTictaiciaTYzN6xGbPcNlM3LYhqzpZDM4y1HrcY7JCqLkibJzbuEPcUiaH6a5rybrcVBDtwBSfF5A/0', NULL, '250', '60', 1, 0, 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 'wx'),
(21, '芸芸众生', '芸芸众生', '', 1512111006, 'https://wx.qlogo.cn/mmopen/vi_32/XY2RttQDBymaHroTIN2RBQO2KQLHiapPDGo27icErmj8L5oNicHNypnAnS6Yd1H3d5WUqX9MEX6XGD00RohdRBa2g/0', NULL, '0', '55', 1, 0, 'o6Hvz0BBfdmlo_vaQ044NY-W5ydM', 'wx'),
(20, '芸芸众生', '芸芸众生', '', 1512112834, 'https://wx.qlogo.cn/mmopen/vi_32/362sFZicFyPB7qmNliaKd6AYQAiaZaR3LFmjDicuOdlMYfPPpfvjM09gYwMSNBRVcwPucyXcfJ7MyteqEyzwuoicDPw/0', NULL, '70', '155', 1, 0, 'oTXAU0V2V669cQgjBP7Fa3C9Tf0U', 'wx'),
(18, '芸芸众生', '芸芸众生', '', 1512111006, 'https://wx.qlogo.cn/mmopen/vi_32/XY2RttQDBymaHroTIN2RBQO2KQLHiapPDGo27icErmj8L5oNicHNypnAnS6Yd1H3d5WUqX9MEX6XGD00RohdRBa2g/0', NULL, '0', '55', 1, 0, 'o6Hvz0BBfdmlo_vaQ044NY-W5ydM', 'wx');

-- --------------------------------------------------------

--
-- 表的结构 `tc_web`
--

CREATE TABLE IF NOT EXISTS `tc_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '单网页信息表：关于我们、客服中心等',
  `pid` int(11) DEFAULT '0' COMMENT 'uid',
  `uname` varchar(255) DEFAULT NULL COMMENT 'prepay_id',
  `ename` varchar(255) DEFAULT NULL COMMENT 'openid',
  `sort` int(11) DEFAULT NULL COMMENT 'limit_time',
  `concent` mediumtext COMMENT '内容介绍',
  `addtime` int(11) DEFAULT '0' COMMENT '发表时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `tc_web`
--

INSERT INTO `tc_web` (`id`, `pid`, `uname`, `ename`, `sort`, `concent`, `addtime`) VALUES
(6, 20, 'the formId is a mock on', 'oTXAU0V2V669cQgjBP7Fa3C9Tf0U', 1512897452, NULL, 1512292652),
(7, 22, 'the formId is a mock on', 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 1516781090, NULL, 1516176290),
(8, 22, 'the formId is a mock on', 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 1516781160, NULL, 1516176360),
(9, 22, 'the formId is a mock on', 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 1516781976, NULL, 1516177176),
(10, 22, 'the formId is a mock on', 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 1516782334, NULL, 1516177534),
(11, 23, 'the formId is a mock on', 'undefined', 1516783194, NULL, 1516178394),
(12, 22, 'the formId is a mock on', 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 1516783668, NULL, 1516178868),
(13, 22, 'the formId is a mock on', 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 1516844535, NULL, 1516239735),
(14, 22, 'the formId is a mock on', 'oTr0U0SEFgzBqBAXd4M_I6aZUKd4', 1516845117, NULL, 1516240317);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
