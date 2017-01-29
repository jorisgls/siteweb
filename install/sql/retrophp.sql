CREATE TABLE IF NOT EXISTS `retrophp_abonnement` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `abonnement` enum('Classic','Premium') DEFAULT NULL,
  `timestamp_activated` int(11) NOT NULL,
  `timestamp_expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `retrophp_abonnement`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `retrophp_abonnement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `retrophp_badges` (
`id` int(11) NOT NULL,
  `badge_id` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `retrophp_badges` (`id`, `badge_id`, `titre`, `description`, `prix`) VALUES
(1, 'FR038', 'Badge Trèfle', 'Que la chance soit avec toi !', 1);

ALTER TABLE `retrophp_badges`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `retrophp_badges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

CREATE TABLE IF NOT EXISTS `retrophp_ipstaff` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `actif` enum('0','1') NOT NULL DEFAULT '1',
  `code` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `retrophp_ipstaff`
 ADD PRIMARY KEY (`id`);

 ALTER TABLE `retrophp_ipstaff`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `retrophp_news` (
`id` int(11) unsigned NOT NULL,
  `id_page` text COLLATE latin1_general_ci NOT NULL,
  `title` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `snippet` text COLLATE latin1_general_ci,
  `body` text COLLATE latin1_general_ci,
  `topstory_image` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `mini_text` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'En savoir plus',
  `auteur` text COLLATE latin1_general_ci,
  `date` double DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

ALTER TABLE `retrophp_news`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `retrophp_news`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

CREATE TABLE IF NOT EXISTS `retrophp_payment` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `statut` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nombres` int(11) NOT NULL DEFAULT '0',
  `type` enum('jetons','diamants','duckets') COLLATE latin1_general_ci NOT NULL,
  `code` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `operation` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `remis` enum('0','1') COLLATE latin1_general_ci NOT NULL,
  `date` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

ALTER TABLE `retrophp_payment`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `retrophp_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `retrophp_settings` (
`id` int(6) NOT NULL,
  `Name` varchar(255) NOT NULL DEFAULT 'Habbo',
  `Nickname` varchar(255) NOT NULL DEFAULT 'Habbo',
  `Url` varchar(255) NOT NULL DEFAULT 'http://localhost/',
  `Court_Url` varchar(255) NOT NULL DEFAULT 'http://localhost/',
  `Url_Images` varchar(255) NOT NULL DEFAULT 'http://localhost/web-gallery',
  `C_Images` varchar(255) NOT NULL,
  `Avatarimage` varchar(255) NOT NULL DEFAULT 'http://www.habbo.fr/habbo-imaging/',
  `Logo` varchar(255) DEFAULT 'habbologo_whiteR.out.png',
  `Help_Link` text NOT NULL,
  `Maintenance` enum('true','false') NOT NULL DEFAULT 'false',
  `Hotel` enum('true','false','reboot') NOT NULL DEFAULT 'false',
  `Emulator` enum('Phoenix','Butterfly','Mercury','Azure') NOT NULL DEFAULT 'Phoenix',
  `Facebook` text NOT NULL,
  `Twitter` text NOT NULL,
  `Youtube` text NOT NULL,
  `APP_ID` varchar(255) NOT NULL,
  `APP_SECRET` varchar(255) NOT NULL,
  `IDP` varchar(50) NOT NULL,
  `IDP_2` varchar(50) NOT NULL,
  `IDD` varchar(50) NOT NULL,
  `IDD_2` varchar(50) NOT NULL,
  `Prix_1` int(11) NOT NULL,
  `Prix_2` int(11) NOT NULL,
  `Prix_1_Euro` varchar(255) NOT NULL,
  `Prix_2_Euro` varchar(255) NOT NULL,
  `Prix_VIP` int(11) NOT NULL,
  `Prix_VIP_2` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Keyword` text NOT NULL,
  `Build` varchar(255) NOT NULL DEFAULT 'RetroPHP',
  `Fondateur` text NOT NULL,
  `Lang` varchar(50) NOT NULL DEFAULT 'fr_FR',
  `Contact` varchar(255) NOT NULL DEFAULT 'community@retrophp.com',
  `Credits` varchar(255) NOT NULL DEFAULT '90000',
  `Pixels` int(11) NOT NULL DEFAULT '2',
  `Jetons` int(11) NOT NULL DEFAULT '0',
  `Mission` text NOT NULL,
  `Rank` int(11) NOT NULL DEFAULT '1',
  `Look_Boy` varchar(255) NOT NULL DEFAULT 'sh-295-62.hr-831-45.ch-215-92.hd-180-3.lg-280-64',
  `Look_Girl` varchar(255) NOT NULL DEFAULT 'hr-3012-45.sh-730-92.ch-824-92.hd-600-3.lg-710-64'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

ALTER TABLE `retrophp_settings`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `retrophp_settings`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

CREATE TABLE IF NOT EXISTS `retrophp_stafflog` (
`id` int(11) unsigned NOT NULL,
  `pseudo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `action` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

ALTER TABLE `retrophp_stafflog`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `retrophp_stafflog`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `retrophp_swfs` (
`id` int(11) NOT NULL,
  `Host` text COLLATE latin1_general_ci,
  `Port` text COLLATE latin1_general_ci,
  `Mus` text COLLATE latin1_general_ci,
  `Variables` text COLLATE latin1_general_ci,
  `Texts` text COLLATE latin1_general_ci,
  `Override` text COLLATE latin1_general_ci NOT NULL,
  `Productdata` text COLLATE latin1_general_ci,
  `Furnidata` text COLLATE latin1_general_ci,
  `Banner` text COLLATE latin1_general_ci,
  `Base` text COLLATE latin1_general_ci,
  `Habbo` text COLLATE latin1_general_ci
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

INSERT INTO `retrophp_swfs` (`id`, `Host`, `Port`, `Mus`, `Variables`, `Texts`, `Override`, `Productdata`, `Furnidata`, `Banner`, `Base`, `Habbo`) VALUES
(1, '127.0.0.1', '30000', '30001', 'http://localhost/gamedata/external_variables.txt', 'http://localhost/gamedata/external_flash_texts.txt', 'http://localhost/gamedata/external_override_variables.txt', 'http://localhost/gamedata/productdata.txt', 'http://localhost/gamedata/furnidata.txt', 'http://localhost/gamedata/supersecret.php', 'http://localhost/gordon/', 'http://localhost/gamedata/habbo.swf');


ALTER TABLE `retrophp_swfs`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `retrophp_swfs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

CREATE TABLE IF NOT EXISTS `retrophp_visites` (
`id` int(11) unsigned NOT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `retrophp_visites`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `ip` (`ip`);

ALTER TABLE `retrophp_visites`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

CREATE TABLE IF NOT EXISTS `retrophp_visites` (
`id` int(11) unsigned NOT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `retrophp_visites`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `ip` (`ip`);

 CREATE TABLE IF NOT EXISTS `ranks` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `badgeid` varchar(20) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `ranks` (`id`, `name`, `badgeid`) VALUES
(1, 'Membre', NULL),
(2, 'VIP Classic', 'VIP'),
(3, 'VIP Premium', 'VIP'),
(4, 'Pubeur', 'PBR'),
(5, 'Helpeur', 'HLP'),
(6, 'Grade speciale', NULL),
(7, 'Moderateur', 'MOD'),
(8, 'Game Manager', 'ADM'),
(9, 'Hotel Manager', 'ADM'),
(10, 'Fondateur', 'ADM');

ALTER TABLE `retrophp_visites`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `users` DROP `last_offline`;

ALTER TABLE `users` ADD `last_offline` DOUBLE NOT NULL;

ALTER TABLE `users`  
ADD `hote_id` INT(11) NOT NULL , 
ADD `avatars` INT(11) NOT NULL DEFAULT '49';

CREATE TABLE IF NOT EXISTS `retrophp_users` (
`uid` int(11) unsigned NOT NULL,
  `facebook` enum('0','1') NOT NULL DEFAULT '0',
  `facebook_id` varchar(255) NOT NULL,
  `user_key` varchar(255) NOT NULL,
  `renamed` enum('0','1') NOT NULL DEFAULT '0',
  `gender_register` enum('0','1') NOT NULL DEFAULT '0',
  `statistiques` int(11) NOT NULL DEFAULT '0',
  `newsletter` enum('0','1') NOT NULL DEFAULT '0',
  `disabled_home` enum('0','1') NOT NULL DEFAULT '0',
  `mail_verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `retrophp_users`
 ADD PRIMARY KEY (`uid`);

 CREATE TABLE IF NOT EXISTS `retrophp_fansites` (
`id` int(11) unsigned NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `retrophp_fansites`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `retrophp_fansites`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `retrophp_users`
MODIFY `uid` int(11) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `retrophp_users` ADD `register_mail` ENUM('0','1') NOT NULL DEFAULT '0';

ALTER TABLE `server_status` ADD `record_connect` INT(11) NOT NULL DEFAULT '0' AFTER `users_online`;

CREATE TABLE IF NOT EXISTS `retrophp_hk` (
`id` int(11) unsigned NOT NULL,
  `pagename` varchar(25) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '7',
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `retrophp_hk` (`id`, `pagename`, `rank`, `nom`) VALUES
(1, 'hk', 7, 'Accueil'),
(2, 'bans', 7, 'Banni'),
(3, 'chatlogs', 7, 'Chatlog'),
(4, 'delete_new', 8, 'Gestion d''article'),
(5, 'logs', 7, 'Historique'),
(6, 'new', 8, 'Post d''article'),
(7, 'config', 10, 'Configuration'),
(8, 'grade', 9, 'Rank'),
(9, 'users', 7, 'Utilisateur');

ALTER TABLE `retrophp_hk`
 ADD PRIMARY KEY (`id`);
 
ALTER TABLE `retrophp_hk`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;