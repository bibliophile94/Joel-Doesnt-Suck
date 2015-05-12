-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2015 at 01:15 PM
-- Server version: 5.5.23
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tablets`
--
create Database tablets;
-- --------------------------------------------------------
use tablets;
--
-- Table structure for table `actualperson`
--

CREATE TABLE IF NOT EXISTS `actualperson` (
  `ActualPersonID` int(11) NOT NULL,
  `PersonalName` varchar(20) DEFAULT NULL,
  `GrandFatherName` varchar(20) DEFAULT NULL,
  `Surname` varchar(15) DEFAULT NULL,
  `Occupation` varchar(15) DEFAULT NULL,
  `Title` varchar(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actualperson`
--

INSERT INTO `actualperson` (`ActualPersonID`, `PersonalName`, `GrandFatherName`, `Surname`, `Occupation`, `Title`) VALUES
(1, 'Bob', 'Bobert', 'Marley', 'Singer', 'Mr.'),
(2, 'George', 'Bill', 'Washington', 'President', 'Mr.'),
(3, 'Ringo', 'Mark', 'Starr', 'Drummer', 'Mr.'),
(4, 'John', 'Jim', 'Gacy', 'Clown', 'Mr.'),
(5, 'Emily', 'Grandma', 'Dickenson', 'Poet', 'Ms.'),
(6, 'Martha', 'Bob', 'Stewart', 'Criminal', 'Mrs.'),
(7, 'Jimi', 'Uncle', 'Hendrix', 'Rocker', 'Mr.'),
(8, 'Freddy', 'Frank', 'Mercury', 'Rocker', 'Mr.'),
(9, 'Griffin', 'Fred', 'Polonus', 'IronMan', 'Mr.'),
(10, 'Nick', 'Grandpa', 'Schreiner', 'TeamLeader', 'Mr.');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `GoodsID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `Description` text
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`GoodsID`, `TypeID`, `Description`) VALUES
(2, 1, 'Griffin bought a 500 gallon drum of lube'),
(1, 2, 'Several apples'),
(3, 5, '400 halves of pieces of bacon'),
(4, 4, '5.5 children'),
(5, 3, '6 internets'),
(6, 2, '3 project team leaders'),
(7, 1, '80 facebook friends'),
(8, 3, '9001 power levels'),
(9, 4, ''),
(10, 1, '2 many youtube videos');

-- --------------------------------------------------------

--
-- Table structure for table `goodsperson`
--

CREATE TABLE IF NOT EXISTS `goodsperson` (
  `GoodsPersonID` int(11) NOT NULL,
  `GoodsID` int(11) NOT NULL,
  `toPersonID` int(11) DEFAULT NULL,
  `fromPersonID` int(11) DEFAULT NULL,
  `PersonID` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goodsperson`
--

INSERT INTO `goodsperson` (`GoodsPersonID`, `GoodsID`, `toPersonID`, `fromPersonID`, `PersonID`) VALUES
(1, 1, 4, 3, 5),
(2, 4, 7, 8, 10),
(3, 3, 3, 7, 2),
(4, 7, 7, 2, 5),
(5, 8, 9, 1, 6),
(6, 2, 8, 3, 10),
(7, 6, 6, 10, 3),
(8, 10, 4, 7, 3),
(9, 9, 7, 5, 4),
(10, 5, 8, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `PersonID` int(11) NOT NULL,
  `ActualPersonID` int(11) NOT NULL,
  `PersonalName` varchar(20) DEFAULT NULL,
  `FatherName` varchar(20) DEFAULT NULL,
  `GrandFatherName` varchar(20) DEFAULT NULL,
  `Surname` varchar(15) DEFAULT NULL,
  `Occupation` varchar(15) DEFAULT NULL,
  `Title` varchar(10) DEFAULT NULL,
  `TabletInfoID` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`PersonID`, `ActualPersonID`, `PersonalName`, `FatherName`, `GrandFatherName`, `Surname`, `Occupation`, `Title`, `TabletInfoID`, `Role`) VALUES
(1, 1, 'Bob', 'Tony', 'Bobert', 'Marley', 'Singer', 'Mr.', 1, 'Bread'),
(2, 2, 'George', 'Rich', 'Bill', 'Washington', 'President', 'Mr.', 2, 'Stand-in'),
(3, 3, 'Ringo', 'Bill', 'Mark', 'Starr', 'Drummer', 'Mr.', 3, 'Bad Song Writer'),
(4, 4, 'John', 'Father', 'Jim', 'Gacy', 'Clown', 'Mr.', 1, 'Role Model'),
(5, 5, 'Emily', 'Dad', 'Grandma', 'Dickenson', 'Poet', 'Ms.', 2, 'Dead'),
(6, 6, 'Martha', 'Joe', 'Bob', 'Stewart', 'Criminal', 'Mrs.', 2, 'Mother'),
(7, 7, 'Jimi', 'Dad', 'Uncle', 'Hendrix', 'Rocker', 'Mr.', 3, 'Musician'),
(8, 8, 'Freddy', 'Dale', 'Frank', 'Mercury', 'Rocker', 'Mr.', 1, 'Awesome'),
(9, 9, 'Griffin', 'Todd', 'Fred', 'Polonus', 'IronMan', 'Mr.', 2, 'Philanthropist'),
(10, 10, 'Nick', 'Vinny', 'Grandpa', 'Schreiner', 'TeamLeader', 'Mr.', 3, 'Victory!');

-- --------------------------------------------------------

--
-- Table structure for table `tablet`
--

CREATE TABLE IF NOT EXISTS `tablet` (
  `TabletID` int(11) NOT NULL,
  `MuseumNumber` varchar(15) NOT NULL,
  `TextNumber` char(15) DEFAULT NULL,
  `Publication` varchar(20) DEFAULT NULL,
  `Notes` text,
  `TabletInfoID` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablet`
--

INSERT INTO `tablet` (`TabletID`, `MuseumNumber`, `TextNumber`, `Publication`, `Notes`, `TabletInfoID`) VALUES
(1, '43', '23', 'Things Publication', 'Two men share a banana split.', 1),
(2, '62', '65', 'Stuff  Publication', 'NOTES NOTES NOTES NOTES NOTES', 3),
(3, '789', '7586', 'Griffin  Publication', 'Ham was eaten.', 2),
(4, '465', '234', '370  Publication', 'Things were completed. Hands were shaked.', 3),
(5, '312', '098', 'Babylonian Times', 'Babylon was killed in a knife fight.', 1),
(6, '916', '87', 'Wonderboy Monthly', 'The ice creamtender pulls out a wind up banana, which, after a few cranks, begins to play Scott Joplin''s classic, "The Entertainer". The banana then jumps up into the air, does a flip, and lands in a perfect split.\r\nThe patrons all erupt in applause, and, more than satisfied, the man leaves the banana and the creamtender a $20 tip.\r\nNot knowing whether the joke is over, the man and banana stand around awkwardly, kicking at the floor. "Would you like to come back to my place?" the man asks. "I thought you''d never ask," answers the banana, and they leave together, living the rest of their lives knowing that the joke is over because it says: happily ever after.', 2),
(7, '016', '47', 'Cougars for Lyf', 'Death to the dead!', 3),
(8, '4985', '357', 'Magazine Publication', 'The other one says "Oh my god a talking Muffin!"\r\nThe oven says "That''s not possible! They haven''t turned me on!"\r\nThe fridge says "Why would they leave two muffins inside a cold oven?"\r\nThe microwave says "There''s still a three day old meal inside me, I think the owner of this house is dead."\r\nThe old woman that lived in this house is coincidentally at the gates of heaven.\r\nSt Peter asks her "Tell me what you did in life that makes you worthy of coming in."\r\nShe replied boldly, "I made sure every one of my household appliances was sentient."\r\nSt Peter raised an eyebrow, before saying "A muffin is not a household appliance." and sending her to hell.', 2),
(9, '165', '231', 'Number 9', 'Booker T Washington was right.', 1),
(10, '166', '567', 'Done!', 'Mexican food tastes the best on boat rides', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabletinfo`
--

CREATE TABLE IF NOT EXISTS `tabletinfo` (
  `TabletInfoID` int(11) NOT NULL,
  `Translation` varchar(30) DEFAULT NULL,
  `Transliteration` varchar(30) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `Terms` varchar(20) DEFAULT NULL,
  `King` varchar(15) DEFAULT NULL,
  `KingYear` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Month` int(11) DEFAULT NULL,
  `Day` int(11) DEFAULT NULL,
  `Summary` text
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabletinfo`
--

INSERT INTO `tabletinfo` (`TabletInfoID`, `Translation`, `Transliteration`, `Type`, `Terms`, `King`, `KingYear`, `Year`, `Month`, `Day`, `Summary`) VALUES
(1, 'English', 'Sanskrit', '1', 'Accepted', 'Nebekenezzer', 1910, 1920, 12, 30, 'The best tablet info'),
(2, 'Sanskrit', 'English', '1', 'Declined', 'Dolins', 1920, 1930, 5, 12, 'The second best tablet info'),
(3, 'British', 'English', '1', 'Unknown', 'Your Mom', 9001, 9002, 8, 8, 'The absolute worst tablet info.');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `TypeID` int(11) NOT NULL,
  `Type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `Type`) VALUES
(1, 'The typiest'),
(2, 'the typier'),
(3, 'More typier'),
(4, 'More typiest'),
(5, 'Stop typing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actualperson`
--
ALTER TABLE `actualperson`
  ADD PRIMARY KEY (`ActualPersonID`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`GoodsID`), ADD KEY `RefType81` (`TypeID`);

--
-- Indexes for table `goodsperson`
--
ALTER TABLE `goodsperson`
  ADD PRIMARY KEY (`GoodsPersonID`), ADD KEY `RefPerson61` (`PersonID`), ADD KEY `RefGoods71` (`GoodsID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PersonID`), ADD KEY `RefActualPerson41` (`ActualPersonID`), ADD KEY `RefTabletInfo51` (`TabletInfoID`);

--
-- Indexes for table `tablet`
--
ALTER TABLE `tablet`
  ADD PRIMARY KEY (`TabletID`), ADD KEY `RefTabletInfo11` (`TabletInfoID`);

--
-- Indexes for table `tabletinfo`
--
ALTER TABLE `tabletinfo`
  ADD PRIMARY KEY (`TabletInfoID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actualperson`
--
ALTER TABLE `actualperson`
  MODIFY `ActualPersonID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `GoodsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `goodsperson`
--
ALTER TABLE `goodsperson`
  MODIFY `GoodsPersonID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `TabletID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tabletinfo`
--
ALTER TABLE `tabletinfo`
  MODIFY `TabletInfoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
