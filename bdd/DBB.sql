CREATE TABLE `users` (
 `id` tinyint(4) NOT NULL AUTO_INCREMENT,
 `username` varchar(10) NOT NULL,
 `password` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

insert into users (username, password) values ('sup_user', MD5('supcarlos'));