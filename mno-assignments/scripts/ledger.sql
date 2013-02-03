DROP TABLE IF EXISTS ledger;
CREATE TABLE ledger 
(
`accountno` varchar(4) NOT NULL,
`accountname` varchar(80) NOT NULL,
`debit` varchar(20) NOT NULL,
`credit` varchar(20) NOT NULL,
  PRIMARY KEY (`accountno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('110', 'Bank', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('120', 'Receivables', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('140', 'Inventory on hand', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('210', 'Payables', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('299', 'Equity', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('310', 'Product Sales', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('315', 'Cost of goods sold', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('320', 'Services', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('410', 'Supplies', '0', '0');
INSERT INTO ledger (accountno, accountname, debit, credit) 
	VALUES ('420', 'Outsourced', '0', '0');