
CREATE TABLE IF NOT EXISTS `p_onlinetrans` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_persian_ci NOT NULL,
  `email` varchar(60) collate utf8_persian_ci NOT NULL,
  `desc` varchar(255) collate utf8_persian_ci NOT NULL,
  `au` varchar(50) collate utf8_persian_ci NOT NULL,
  `amount` varchar(100) collate utf8_persian_ci NOT NULL,
  `date` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `p_products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(70) collate utf8_persian_ci NOT NULL,
  `description` varchar(255) collate utf8_persian_ci NOT NULL,
  `url` varchar(255) collate utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `publish_order` int(11) NOT NULL default '0',
  `publish` tinyint(4) NOT NULL default '1' COMMENT '1 pubish, 0 dont publish',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `p_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(150) collate utf8_persian_ci NOT NULL,
  `address` text collate utf8_persian_ci NOT NULL,
  `phonenum` varchar(50) collate utf8_persian_ci NOT NULL,
  `desc` text collate utf8_persian_ci NOT NULL,
  `mail_address` varchar(30) collate utf8_persian_ci NOT NULL,
  `mail_title` varchar(30) collate utf8_persian_ci NOT NULL,
  `send_email` tinyint(1) NOT NULL,
  `website` varchar(60) collate utf8_persian_ci NOT NULL,
  `pin` varchar(36) collate utf8_persian_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;


INSERT INTO `p_settings` (`id`, `name`, `address`, `phonenum`, `desc`, `mail_address`, `mail_title`, `send_email`, `website`, `pin`) VALUES
(1, 'نام سایت', '', '', '', 'info@yousitename.com', 'سامانه ساده پرداز', 1, 'http://pay.sitename.com.com', 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');



CREATE TABLE IF NOT EXISTS `p_users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(35) collate utf8_persian_ci NOT NULL,
  `password` varchar(255) collate utf8_persian_ci NOT NULL,
  `name` varchar(50) collate utf8_persian_ci NOT NULL,
  `role` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;


INSERT INTO `p_users` (`id`, `email`, `password`, `name`, `role`) VALUES
(1, 'you@yoursite.com', '130a4c96a6f4fa86f4a7f781224c1cf04d0d80a9', 'مدير سايت', 4);
