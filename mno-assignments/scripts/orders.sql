DROP TABLE IF EXISTS orders;
CREATE TABLE orders 
(
`vID` int(10) NOT NULL,
`vendor` varchar(12) NOT NULL,
`orderID` int(20) NOT NULL,
`orderDate` DATE NOT NULL,
  PRIMARY KEY (`vID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO orders (vID, vendor, orderID, orderDate) 
 VALUES ('1212', 'Coca-Cola', '5440', '1992-06-04');
INSERT INTO orders (vID, vendor, orderID, orderDate)
 VALUES ('1213', 'Vector Inc', '699605', '1993-12-12');
INSERT INTO orders (vID, vendor, orderID, orderDate)
 VALUES ('1214', 'Mann Co', '3', '2012-12-12');
