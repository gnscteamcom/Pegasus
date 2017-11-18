<?php
$ms_sql['p_categorias'] = "CREATE TABLE IF NOT EXISTS `ms_generos` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_nombre` varchar(180) NOT NULL,
  `g_seo` varchar(180) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['w_link'] = "CREATE TABLE IF NOT EXISTS `ms_links` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_nombre` varchar(180) NOT NULL,
  `l_url` varchar(200) NOT NULL,
  `l_online` int(1) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['p_peliculas'] = "CREATE TABLE IF NOT EXISTS `ms_peliculas` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_titulo` varchar(180) NOT NULL,
  `p_seo` varchar(180) NOT NULL,
  `p_sinopsis` text NOT NULL,
  `p_ano` int(4) NOT NULL,
  `p_genero` int(11) NOT NULL,
  `p_idioma` varchar(180) NOT NULL,
  `p_calidad` varchar(180) NOT NULL,
  `p_estreno` int(1) NOT NULL,
  `p_date` int(10) NOT NULL,
  `p_online` int(1) NOT NULL,
  `p_hits` int(11) NOT NULL DEFAULT '0',
  `p_votos` int(11) NOT NULL DEFAULT '0',
  `p_reports` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['p_user'] = "CREATE TABLE IF NOT EXISTS `ms_users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(180) NOT NULL,
  `u_password` varchar(180) NOT NULL,
  `u_email` varchar(180) NOT NULL,
  `u_rango` int(1) NOT NULL,
  `u_hash` varchar(180) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['w_config'] = "CREATE TABLE IF NOT EXISTS `ms_config` (
  `w_id` int(1) NOT NULL AUTO_INCREMENT,
  `w_titulo` varchar(180) NOT NULL,
  `w_slogan` varchar(180) NOT NULL,
  `w_url` varchar(180) NOT NULL,
  `w_tema` varchar(180) NOT NULL,
  `w_mail` varchar(180) NOT NULL,
  `w_offline` int(1) NOT NULL,
  `w_txtoff` varchar(180) NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['ms_descargas'] = "CREATE TABLE `ms_descargas` (
  `d_id` int(11) NOT NULL auto_increment,
  `p_id` int(11) NOT NULL,
  `d_links` text,
  `d_online` int(1) default NULL,
  PRIMARY KEY  (`d_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['ms_videos'] = "CREATE TABLE IF NOT EXISTS `ms_videos` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `v_source` text NOT NULL,
  `v_titulo` varchar(180) NOT NULL,
  `v_online` int(1) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['ms_publicidad'] = "CREATE TABLE IF NOT EXISTS `ms_publicidad` (
  `ad_key` varchar(180) NOT NULL,
  `ad_code` text
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

$ms_sql['pv_publicidad'] = "INSERT INTO `ms_publicidad` VALUES 
('728x90', ''),
('300x250', ''),
('120x600', ''),
('fb', 'http://www.facebook.com/marco.blog');";

$ms_sql['wv_config'] = "INSERT INTO `ms_config` VALUES (1, 'Movie Script', 'Tu pelicula online', 'http://localhost/beta', 'default', 'marco.fbb@gmail.com', 0, 'Estamos en matenimiento');";

$ms_sql['pv_categorias'] = "INSERT INTO `ms_generos` VALUES 
(1, 'Accion', 'accion'),
(2, 'Animacion', 'animacion'),
(3, 'Aventura', 'aventura'),
(4, 'Ciencia Ficcion', 'ciencia-ficcion'),
(5, 'Comedia', 'comedia'),
(6, 'Deporte', 'deporte'),
(7, 'Drama', 'drama'),
(8, 'Fantasia', 'fantasia'),
(9, 'Infantil', 'infantil'),
(10, 'Musical', 'musical'),
(11, 'Romance', 'romance'),
(12, 'Suspenso', 'suspenso'),
(13, 'Terror', 'terror'),
(14, 'Series', 'series');";

?>