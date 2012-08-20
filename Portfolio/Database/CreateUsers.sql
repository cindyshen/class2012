-- CreateUsers.sql

CREATE USER 'add_msg'@'localhost'
IDENTIFIED BY 'php1234';

GRANT INSERT ON Contact.Message
TO 'add_msg'@'localhost';