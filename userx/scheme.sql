--
-- MySQL 5.5.46
-- Sun, 01 Nov 2015 20:52:30 +0000
--

CREATE TABLE `user` (
   `user_id` int(10) unsigned not null auto_increment,
   `login` varchar(50) not null,
   `password` varchar(64) not null,
   `email` varchar(64) not null,
   `date_logged` datetime not null,
   PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `user` (`user_id`, `login`, `password`, `email`, `date_logged`) VALUES 
('1', 'admin', 'ŒivåµA½é½Mîß±g©ÈsüK¸¨o*´H©', 'admin@gmail.com', '0000-00-00 00:00:00');