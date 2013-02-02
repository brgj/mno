DROP TABLE IF EXISTS inventory;
CREATE TABLE inventory
(
 `id`  int   NOT NULL,
 `model` varchar(40) NOT NULL,
 `brand` varchar(20) NOT NULL,
 `type`  varchar(20) NOT NULL,
 `quantity` int,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO inventory (id, model, brand, type, quantity)
 VALUES (1001,'Lexus','Toyota','Car',6);
INSERT INTO inventory (id, model, brand, type, quantity)
 VALUES (1002,'Sienna','Toyota','Minivan',2);
INSERT INTO inventory (id, model, brand, type, quantity)
 VALUES (1003,'Venza','Toyota','SUV',1);
INSERT INTO inventory (id, model, brand, type, quantity)
 VALUES (1004,'Pilot','Honda','SUV',10);
INSERT INTO inventory (id, model, brand, type, quantity)
 VALUES (1005,'SantaFe','Hyundai','Minivan',2);