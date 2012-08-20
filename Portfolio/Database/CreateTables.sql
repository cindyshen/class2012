-- CreateTables.sql

DROP TABLE IF EXISTS Message;

CREATE TABLE Message (
	MessageID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	Name			VARCHAR(80) NOT NULL,
	Email			VARCHAR(100) NOT NULL,
	Phone			VARCHAR(10) NULL,
	Message		TEXT NOT NULL,
	Submitted	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (MessageID)
);