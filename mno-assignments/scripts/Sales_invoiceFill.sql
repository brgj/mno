DROP TABLE IF EXISTS sales_invoice;
CREATE TABLE sales_invoice 
(
`id` int(3) NOT NULL,
`customer` int(80),
`description` varchar(80),
`status` char(1),
`order_date` varchar(10),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO sales_invoice (id, customer, description, status, order_date) VALUES
('101', '1337', 'Filed a complaint', 'A', '2013.01.22'),
('102', '455', 'Filed a complaint', 'D', '2013.01.22'),
('103', '8008', 'Filed a complaint', 'D', '2013.01.22'),
('104', '8008135', 'Filed a complaint', 'A', '2013.01.22'),
('105', '696969', 'Filed a complaint', 'A', '2013.01.22'),
('106', '17008', 'Filed a complaint', 'A', '2013.01.22'),
('107', '1212', 'Filed a complaint', 'D', '2013.01.22'),
('108', '3244', 'Filed a complaint', 'A', '2013.01.22'),
('109', '6564', 'Filed a complaint', 'D', '2013.01.22'),
('110', '2323', 'Filed a complaint', 'A', '2013.01.22'),
('111', '1424', 'Filed a complaint', 'D', '2013.01.22'),
('112', '1111', 'Filed a complaint', 'A', '2013.01.22');