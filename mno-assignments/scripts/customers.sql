DROP TABLE IF EXISTS customers;
CREATE TABLE customers (
  `id` int(3) NOT NULL,
  `cust_name` varchar(800) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO customers (id, cust_name, status)
    VALUES
    ('510','Noble Six','A'),
    ('511','Master Cheif','A'),
    ('512','Jacob Keyes','A'),
    ('513','Sarah Palmer','A'),
    ('514','Thomas Lasky','A'),
    ('515','Chatherine Halsey','A');