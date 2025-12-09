
DROP TABLE IF EXISTS `member2`;

CREATE TABLE IF NOT EXISTS `member2` (
    `username` varchar(15) NOT NULL,
    `password` varchar(15) NOT NULL,
    `name` varchar(100) NOT NULL,
    `address` varchar(255) NOT NULL,
    `mobile` varchar(30) NOT NULL,
    `email` varchar(30) DEFAULT NULL,
    `role` ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `member2` (`username`, `password`, `name`, `address`, `mobile`, `email`, `role`) VALUES
('somsak', '1899', 'สมศักดิ์ สุรเสถียร', '174 ถ.มิตรภาพ จ.ขอนแก่น', '', 'somsak@gmail.com', 'admin'),
('baramee', 'aafff1', 'บารมี บุญหลาย', '123 ถ.วิภาวดีรังสิต กรุงเทพฯ', '08-9446-9955', 'baramee@gmail.com', 'user'),
('metasit', 'm345', 'เมธาสิทธิ์ สอนสั่ง', '98/9 ถ.ศรีจันทร์ จ.ขอนแก่น', '08-4456-9877', 'metasit@outlook.com', 'user');
