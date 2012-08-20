DROP DATABASE IF EXISTS Midterm;

CREATE DATABASE Midterm;

USE Midterm;

DROP TABLE IF EXISTS Question;

CREATE TABLE Question (
	QuestionID 	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	Name				VARCHAR(80) NOT NULL,
	Email				VARCHAR(100) NOT NULL,
	Question		TEXT NOT NULL,
	PRIMARY KEY (QuestionID)
);

CREATE USER 'add'@'localhost' IDENTIFIED BY 'php1234';

GRANT INSERT ON Midterm.Question TO 'add'@'localhost';