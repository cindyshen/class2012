
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Appetizers'),
(2, 'Soup'),
(3, 'Rice'),
(4, 'Noodles'),
(5, 'Beef'),
(6, 'Chicken'),
(7, 'Pork'),
(8, 'Seafood'),
(9, 'Chow Mein'),
(10, 'Egg Foo Young'),
(11, 'Vegetable Delight'),
(12, 'Beverages');


