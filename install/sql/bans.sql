CREATE TABLE `bans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bantype` enum('user','ip','machine') NOT NULL DEFAULT 'user',
  `value` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `expire` double NOT NULL DEFAULT '0',
  `added_by` varchar(50) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `appeal_state` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`) USING BTREE,
  KEY `bantype` (`bantype`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;