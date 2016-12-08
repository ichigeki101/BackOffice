DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50),
  `password` varchar(50),
  `active` tinyint(1),
  `created` datetime DEFAULT now(),
  PRIMARY KEY(`id`)
)
ENGINE=INNODB
CHARACTER SET utf8 ;