DROP TABLE IF EXISTS orders;
CREATE TABLE orders 
(
`vID` int(10) NOT NULL,
`vendor` varchar(12) NOT NULL,
`orderID` int(20) NOT NULL,
  PRIMARY KEY (`vID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO orders (vID, vendor, orderID) 
 VALUES ('1212', 'Coca-Cola', '5440');
INSERT INTO orders (vID, vendor, orderID)
 VALUES ('1213', 'Vector Inc', '699605');
INSERT INTO orders (vID, vendor, orderID)
 VALUES ('1214', 'Mann Co', '3');
