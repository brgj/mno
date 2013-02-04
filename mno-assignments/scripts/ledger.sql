DROP TABLE IF EXISTS ledger;
CREATE TABLE ledger 
(
`accountno` varchar(4) NOT NULL,
`accountname` varchar(80) NOT NULL,
`debit` varchar(20) NOT NULL,
`credit` varchar(20) NOT NULL,
`status` char(1) NOT NULL,
  PRIMARY KEY (`accountno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('110', 'Bank', '15000', '0', 'A');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('120', 'Receivables', '37000', '0', 'D');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('140', 'Inventory on hand', '6000', '0', 'A');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('210', 'Payables', '0', '54000', 'D');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('299', 'Equity', '0', '100000', 'A');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('310', 'Product Sales', '0', '45000', 'D');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('315', 'Cost of goods sold', '0', '12000', 'A');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('320', 'Services', '0', '36000', 'D');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('410', 'Supplies', '65000', '0', 'A');
INSERT INTO ledger (accountno, accountname, debit, credit, status) 
	VALUES ('420', 'Outsourced', '4000', '0', 'D');
