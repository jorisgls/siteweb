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