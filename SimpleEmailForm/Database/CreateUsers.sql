-- Databases/CreateUsers.sql
DROP USER 'add_email'@'localhost';

CREATE USER 'add_email'@'localhost'
	IDENTIFIED BY 'html1234';
	
GRANT INSERT ON Newsletter.Subscriber
	TO 'add_email'@'localhost';