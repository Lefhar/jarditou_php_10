--sql users 
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `u_nom` varchar(10) NOT NULL COMMENT 'nom',
  `u_prenom` varchar(10) NOT NULL COMMENT 'prénom',
  `u_adresse` varchar(50) NOT NULL COMMENT 'adresse postal',
  `u_cp` int(5) DEFAULT NULL COMMENT 'code postal',
  `u_city` varchar(10) DEFAULT NULL COMMENT 'ville',
  `u_tel` int(10) DEFAULT NULL COMMENT 'téléphone',
  `u_sexe` enum('h','f','null') DEFAULT NULL,
  `u_mail` varchar(254) NOT NULL COMMENT 'email ',
  `role` int(1) NOT NULL DEFAULT '0' COMMENT 'role 0 client 1 vendeur',
  `u_password` varchar(60) NOT NULL COMMENT 'mot de passe',
  `u_d_hash` char(12) NOT NULL COMMENT 'sel',
  `u_jeton_connect` char(12) NOT NULL COMMENT 'jeton de connexion',
  `u_d_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de création du compte',
  `u_d_connect` datetime DEFAULT NULL COMMENT 'date de connection',
  `u_d_test_connect` datetime DEFAULT NULL COMMENT 'date de teste de connection si échoué',
  `u_essai_connect` int(1) NOT NULL DEFAULT '0' COMMENT 'nombre essai connexion',
  `u_d_reset` datetime DEFAULT NULL COMMENT 'date de reste password',
  `u_reset_hash` char(12) DEFAULT NULL COMMENT 'hash reset  mot de passe',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_id` (`u_id`),
  UNIQUE KEY `u_mail` (`u_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;