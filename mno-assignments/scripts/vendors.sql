DROP TABLE IF EXISTS vendors;
CREATE TABLE vendors 
(
    `id` int(3) NOT NULL,
    `description` varchar(80),
    `amount` int(80),
    `status` char(1),
    `phone` varchar(80),
    `email` varchar(80),
      PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (100, 'vendorOne', 100, 'A', '678-1234', 'mickey@qwe.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (101, 'vendortwo', 200, 'A', '766-2345', 'mickey@wer.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (102, 'vendor3', 300, 'A', '475-3456', 'mickey@ert.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (103, 'vendor4', 400, 'A', '123-4567', 'mickey@rty.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (104, 'vendor5', 500, 'A', '766-5678', 'mickey@tyu.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (105, 'vendor6', 600, 'D', '234-6789', 'mickey@yui.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (106, 'vendor7', 700, 'A', '567-7891', 'mickey@uio.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (107, 'vendor8', 800, 'D', '766-1123', 'mickey@asd.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (108, 'vendor9', 900, 'A', '543-2123', 'mickey@sdf.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (109, 'vendor10', 1000, 'A', '766-4123', 'mickey@dfg.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (110, 'vendor11', 1100, 'A', '456-5234', 'mickey@fgh.com');
INSERT INTO vendors (id, description, amount, status, phone, email) VALUES (111, 'vendor12', 1200, 'A', '766-6345', 'mickey@ghj.com');