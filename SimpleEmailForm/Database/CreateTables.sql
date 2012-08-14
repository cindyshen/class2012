-- CreateTables.sql

DROP TABLE IF EXISTS Subscriber;

CREATE TABLE Subscriber (
	SubscriberID 	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	Email 				VARCHAR(80) NOT NULL,
	PRIMARY KEY 	(SubscriberID),
	UNIQUE				(Email)
);