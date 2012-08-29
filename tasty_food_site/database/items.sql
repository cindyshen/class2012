
CREATE TABLE IF NOT EXISTS `items` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `itemCode` varchar(10) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemDescription` varchar(255) NOT NULL,
  `itemPrice` decimal(10,2) NOT NULL,
  `special_date` tinyint(4) NOT NULL,
  `thumbImage` varchar(100) NOT NULL,
  PRIMARY KEY (`itemID`),
  UNIQUE KEY `itemCode` (`itemCode`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


INSERT INTO `items` (`itemID`, `categoryID`, `itemCode`, `itemName`, `itemDescription`, `itemPrice`, `special_date`, `thumbImage`) VALUES
(1, 1, 'ap_sproll', 'Spring Roll', 'This spring roll is made vegetarian with tofu', 1.70, 1, 'ap_sprigrolls.jpg'),
(2, 1, 'ap_egroll', 'Egg roll', 'This egg roll is made vegetarian with tofu', 1.40, 2, 'ap_eggrolls.jpg'),
(3, 1, 'ap_vegfdum', 'Vegetarian Fried Dumplings', 'This Vegetarian Fried Dumpling is made vegetarian with tofu', 6.50, 3, 'ap_vegfrieddumplings.jpg'),
(4, 1, 'ap_pancake', 'Fried Green Onion Pancake', 'Fried Green Onion Pancakes 6 pieces', 4.50, 4, 'ap_pancake.jpg'),
(5, 1, 'ap_bdumpli', 'Boiled Dumplings ', 'Boiled Dumplings 6 pieces', 5.50, 5, 'ap_bdumpling.jpg'),
(6, 1, 'ap_fries', 'French Fries', 'French Fries', 4.00, 6, 'ap_fries.jpg');

