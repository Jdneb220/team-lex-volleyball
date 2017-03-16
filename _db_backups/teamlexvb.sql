-- MySQL dump 10.13  Distrib 5.5.19, for Linux (x86_64)
--
-- Host: 68.178.142.16    Database: teamlexvb
-- ------------------------------------------------------
-- Server version	5.0.96-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL auto_increment,
  `list_order` int(4) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `body` varchar(4500) NOT NULL,
  `data_theme` char(1) NOT NULL,
  UNIQUE KEY `announcement_id_2` (`announcement_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (2,-2,'Welcome to Team Lex Volleyball','<i>Team Lex Volleyball offers a fun and friendly atmosphere for recreational and competitive volleyball among Lexington\'s gay, lesbian, bisexual and transgender community.</i> <br /><br /> More info about <a href=\"more.html\">Team Lex Volleyball</a><br /><br />Directions to the <a href=\"http://goo.gl/maps/Am8hb\">Bluegrass Volleyball Center</a>\r\n</p>','a');
INSERT INTO `announcements` VALUES (12,0,'Pilot Competitive Division','<a href=\"https://www.dropbox.com/s/21i4nn70on4obuy/TLVBF14Comp.pdf?dl=0\">Competitive Division Teams and Schedule</a><br><br>\r\nThis season, Team Lex will be testing out a new competitive division from 5:15-5:45pm on Court 2. Open play will still be offered the remaining weeks unless otherwise noted on the schedule.<br><br>\r\nPlayers must have a 2.75 evaluation score or higher to be eligible for the test cycle. We will survey all members at the end of the season to gauge satisfaction with the new structure and potential for implementing the new division for next season. The hope is to provide a venue for players of all skill levels to play to their full potential, learn the game, and grow our league and interest in volleyball!','f');
INSERT INTO `announcements` VALUES (11,10,'Spring 2016 Registration','<center>Fees and <a href=\"http://www.teamlexvb.com/registration.pdf\" target=_blank rel=external>registration forms</a> are due <b>Tuesday \r\nJanuary 26</b> to get placed on a team.<br><br> Please contact the TLVB board at <a href=\"mailto:teamlexvb@gmail.com\">teamlexvb@gmail.com</a> with any questions.<br><br><form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_blank\">\r\n<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\r\n<table>\r\n<tbody><tr><td><input type=\"hidden\" name=\"on0\" value=\"Spring 2016 Registration\">Spring 2016 Registration</td></tr><tr><td><select name=\"os0\">\r\n	<option value=\"Adult\">Adult $46.65 USD</option>\r\n	<option value=\"Student\">Student $36.35 USD</option>\r\n</select></tr>\r\n</tbody></table>\r\n<input type=\"hidden\" name=\"currency_code\" value=\"USD\">\r\n<input type=\"hidden\" name=\"encrypted\" value=\"-----BEGIN PKCS7-----MIIH+QYJKoZIhvcNAQcEoIIH6jCCB+YCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAfeQip/f20EwHt6134FAHzCPngPooUI8+v/bwk7mgUPvFgJoI7e4t3d+WYMVxaqWtsjiUWOXRma2G0oug5aGL904ukdps5FnReVSL6wR5hLjHK8rzCBx++Qp2XPzk9TNKach/2i9XorY4+yiMecHaE3+82NFpCbFnfoXX1d9Ya0TELMAkGBSsOAwIaBQAwggF1BgkqhkiG9w0BBwEwFAYIKoZIhvcNAwcECEu2TeEN21TrgIIBUMRI4wxR8Vm8v/9pFCc6DmtAi4OPhf64MAf3KaXlZ2vXauEboL4PEQwgY0Tqe0PUETmIBqiQGth3PcE85fusxJjfEmJMBIZHvBDH2Hiwjh3T2DO0ClyjRmSFXHPDBB6A6jFFYiXpg0CYlOoQvRePqqJRLrTliby4YmZ0sFqcag8OlnS0vcLLltr8l77ijLpv6cmh9SdQAV50cUqWL2wU55ZhUNgrydVuEkoNxoEQ4hE2ydIy0grb741uQFmRF5Yh9tSa+V7cLCTFjCFidNxAzNKqeNC3pXCNV2OePYD7FwuU7iJZn3p/2X4VZL9A0h09apDT6/ULnlsFKkMS6o8UM0VudXOZ9ZRKZLrk1/icO5Y4vlwGDHZhObr4y8EgPhdlbLAawOhJxGkAA+HrgYzATlLjLzQkTOFjAQgIoFtOgU1vtsqwt4h8ylhVv5aChXFccqCCA4cwggODMIIC7KADAgECAgEAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTAeFw0wNDAyMTMxMDEzMTVaFw0zNTAyMTMxMDEzMTVaMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAwUdO3fxEzEtcnI7ZKZL412XvZPugoni7i7D7prCe0AtaHTc97CYgm7NsAtJyxNLixmhLV8pyIEaiHXWAh8fPKW+R017+EmXrr9EaquPmsVvTywAAE1PMNOKqo2kl4Gxiz9zZqIajOm1fZGWcGS0f5JQ2kBqNbvbg2/Za+GJ/qwUCAwEAAaOB7jCB6zAdBgNVHQ4EFgQUlp98u8ZvF71ZP1LXChvsENZklGswgbsGA1UdIwSBszCBsIAUlp98u8ZvF71ZP1LXChvsENZklGuhgZSkgZEwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tggEAMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADgYEAgV86VpqAWuXvX6Oro4qJ1tYVIT5DgWpE692Ag422H7yRIr/9j/iKG4Thia/Oflx4TdL+IFJBAyPK9v6zZNZtBgPBynXb048hsP16l2vi0k5Q2JKiPDsEfBhGI+HnxLXEaUWAcVfCsQFvd2A1sxRr67ip5y2wwBelUecP3AjJ+YcxggGaMIIBlgIBATCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwCQYFKw4DAhoFAKBdMBgGCSqGSIb3DQEJAzELBgkqhkiG9w0BBwEwHAYJKoZIhvcNAQkFMQ8XDTE1MDgyMTE1MDM0NFowIwYJKoZIhvcNAQkEMRYEFB3Ig+qNdqJEwSK319Ej/i9hz24TMA0GCSqGSIb3DQEBAQUABIGAXM8EqJUe6Kw8ZHoXXSr0hoiJu6gMZhXgWi7V6PDOK0hT51BppVdva0ZCfiwilvh60K3BwdGOozX7XGCK4t8b+mbpABhYU9njdgI8DJGFIqXrh74MxL2SwcRH7AlyAzDhNb5UKY/zGQUWtJ8QjoIJXYRYP5kKLdmwF4x52e48Wc8=-----END PKCS7-----\r\n\">\r\n<input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\r\n<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\r\n</form>\r\n\r\n','d');
INSERT INTO `announcements` VALUES (26,0,'Summer Break','Thanks for checking out Team Lex Volleyball!  We will return to regularly scheduled league play sometime in mid-September.  Be sure to join our <a href=\"contact.html\">contact list</a> and <a href=\"https://www.facebook.com/groups/492904774102678/\">Facebook group</a> to stay up-to-date with the latest Team Lex happenings','d');
INSERT INTO `announcements` VALUES (27,0,'','<img src=\"http://www.teamlexvb.com/includes/images/butterball.png\" style=\"width:100%\"><br>\r\nGobble gobble gobble! Grab a partner and join us for our annual hardcourt partner scramble! Compete with different teams throughout the day and help raise funds for Team Lex Volleyball. $50 per pair, limited to the first 48 total players. Email teamlexvb@gmail.com if you need help finding a partner. Registration deadline is Wednesday November 18.<br><br>\r\n\r\nRegister today at:<br>\r\n<a href=\"https://teamlexvb.wufoo.com/forms/tlvb-butterball-volleyball-tournament/\" target=_blank>https://teamlexvb.wufoo.com/forms/tlvb-butterball-volleyball-tournament/</a>','k');
INSERT INTO `announcements` VALUES (17,-3,'Documents','<ul style=\'list-style-type: none;\'>\r\n<li><a title=\'TLVB By-Laws\' href=\"https://www.dropbox.com/s/2cn36wdon6zioct/TLVB%20By-Laws%202.26.14.docx\" target=_blank>By-Laws</a></li><li><a title=\'How to Officiate\' href=\"https://www.dropbox.com/s/zrgw42kc496vceu/howto.pdf\" target=_blank>How to Officiate</a></li><li><a title=\'Hand Signals\' href=\"https://www.dropbox.com/s/5ewa27tdqs4qt4j/signals.pdf\" target=_blank>Referee Hand Signals</a></li><li><a title=\'Current Season Evaluations\' href=\"https://www.dropbox.com/s/l25tm6jaulx0x0s/CurrentSeasonEvals.pdf?dl=0\" target=_blank>Current Season Evaluations</a></li><li><a title=\'Rating Rubric\' href=\"https://www.dropbox.com/s/6zan0fwlbqt5qjt/Rating%20Rubric.pdf\" target=_blank>Rating Rubric</a></li><li><a title=\'Facebook Group\' href=\"https://www.facebook.com/groups/492904774102678/\" target=_blank>Facebook</a></li><li><a title=\'Lexington Herald Article\' href=\"http://www.kentucky.com/2013/05/14/2639598/lexingtons-first-gay-volleyball.html\" target=_blank>Herald Leader Article</a></li><li><a title=\'Progress Lex Article\' href=\"http://www.progresslex.org/2013/04/25/team-lex-volleyball-kicks-off-tonight/\" target=_blank>Progress Lex Article</a></li></ul>\r\n','e');
INSERT INTO `announcements` VALUES (21,3,'Rainbow Volleyball','Looking for more LGBT volleyball here in Lexington?  Check out <a href=\"https://www.facebook.com/groups/121419584593243/\">Rainbow Volleyball</a> on Sunday prior to Team Lex!<br><br>\r\nWhen: EVERY Sunday from 1/3/16 through 3/20/15. <br>\r\nTime: 1:00pm-4:00pm<br>\r\nWhere: 545 N. Upper Street (Old Dunbar Gym)<br>\r\nLexington, Kentucky 40508<br>\r\nPrice: $30 for the season or $5 each Sunday you play.','f');
INSERT INTO `announcements` VALUES (19,0,'End of Season Survey','<p>\r\n    Give us your feedback on the Fall 2014 season by filling out <a href=\"https://docs.google.com/forms/d/1WUzfj4OHniAvRnOI_SWcIt9g4igNU70mGZt8jATQB78/viewform\" target=\"_blank\">this survey</a>. You can also email us at teamlexvb@gmail.com with any feedback on your experience with Team Lex!\r\n</p>','k');
INSERT INTO `announcements` VALUES (18,2,'Upcoming Events','<iframe id=\"homecalendar\" src=\"https://www.google.com/calendar/embed?showTitle=0&showNav=1&showDate=1&showPrint=0&showTz=0&mode=AGENDA&height=600&wkst=1&bgcolor=%23FFFFFF&src=teamlexvb%40gmail.com&color=%232952A3&ctz=America%2FNew_York\" style=\"border-width: 0;\" width=\"100%\" height=\"300\" frameborder=\"0\" scrolling=\"no\"></iframe>','b');
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches` (
  `ID` int(11) NOT NULL auto_increment,
  `Season` int(11) NOT NULL,
  `Week` int(11) NOT NULL,
  `Court` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `Home` int(11) NOT NULL,
  `Away` int(11) NOT NULL,
  `Ref` int(11) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=355 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (1,1,2,1,'19:15:00',1,2,5);
INSERT INTO `matches` VALUES (2,1,2,2,'19:15:00',3,4,5);
INSERT INTO `matches` VALUES (3,1,2,1,'20:00:00',5,1,4);
INSERT INTO `matches` VALUES (4,1,2,2,'20:00:00',2,3,4);
INSERT INTO `matches` VALUES (5,1,2,2,'20:45:00',4,5,3);
INSERT INTO `matches` VALUES (6,1,3,1,'19:15:00',2,4,1);
INSERT INTO `matches` VALUES (7,1,3,2,'19:15:00',3,5,1);
INSERT INTO `matches` VALUES (9,1,3,1,'20:00:00',1,3,4);
INSERT INTO `matches` VALUES (15,1,4,1,'19:15:00',2,3,1);
INSERT INTO `matches` VALUES (16,1,3,2,'20:00:00',2,5,4);
INSERT INTO `matches` VALUES (17,1,3,1,'20:45:00',1,4,2);
INSERT INTO `matches` VALUES (18,1,4,2,'19:15:00',4,5,1);
INSERT INTO `matches` VALUES (19,1,4,1,'20:00:00',1,2,5);
INSERT INTO `matches` VALUES (20,1,4,2,'20:00:00',3,4,5);
INSERT INTO `matches` VALUES (21,1,4,1,'20:45:00',5,1,3);
INSERT INTO `matches` VALUES (22,1,5,1,'19:15:00',3,5,2);
INSERT INTO `matches` VALUES (23,1,5,2,'19:15:00',1,4,2);
INSERT INTO `matches` VALUES (24,1,5,1,'20:00:00',4,2,5);
INSERT INTO `matches` VALUES (25,1,5,2,'20:00:00',3,1,5);
INSERT INTO `matches` VALUES (26,1,5,1,'20:45:00',2,5,1);
INSERT INTO `matches` VALUES (27,1,6,1,'18:30:00',2,3,1);
INSERT INTO `matches` VALUES (28,1,6,2,'18:30:00',4,5,1);
INSERT INTO `matches` VALUES (29,1,6,1,'19:00:00',1,2,5);
INSERT INTO `matches` VALUES (30,1,6,2,'19:00:00',3,4,5);
INSERT INTO `matches` VALUES (31,1,6,1,'19:30:00',1,5,3);
INSERT INTO `matches` VALUES (34,1,6,1,'20:00:00',1,3,4);
INSERT INTO `matches` VALUES (33,1,6,2,'19:30:00',2,4,3);
INSERT INTO `matches` VALUES (35,1,6,2,'20:00:00',2,5,4);
INSERT INTO `matches` VALUES (36,1,6,1,'20:30:00',1,4,2);
INSERT INTO `matches` VALUES (37,1,6,2,'20:30:00',3,5,2);
INSERT INTO `matches` VALUES (42,1,7,1,'19:15:00',1,3,2);
INSERT INTO `matches` VALUES (39,1,7,1,'18:30:00',5,3,1);
INSERT INTO `matches` VALUES (43,1,7,2,'19:15:00',5,4,2);
INSERT INTO `matches` VALUES (41,1,7,2,'18:30:00',4,2,1);
INSERT INTO `matches` VALUES (44,1,7,1,'20:00:00',3,2,5);
INSERT INTO `matches` VALUES (45,1,7,2,'20:00:00',4,1,5);
INSERT INTO `matches` VALUES (46,1,7,2,'20:45:00',3,4,1);
INSERT INTO `matches` VALUES (47,1,7,1,'21:10:00',2,4,3);
INSERT INTO `matches` VALUES (48,2,2,1,'19:00:00',9,10,11);
INSERT INTO `matches` VALUES (50,2,2,1,'19:30:00',11,12,15);
INSERT INTO `matches` VALUES (51,2,2,1,'20:00:00',15,9,10);
INSERT INTO `matches` VALUES (52,2,2,1,'20:30:00',10,11,12);
INSERT INTO `matches` VALUES (53,2,2,1,'21:00:00',12,15,9);
INSERT INTO `matches` VALUES (54,2,4,1,'19:15:00',9,11,12);
INSERT INTO `matches` VALUES (55,2,5,1,'20:00:00',10,12,11);
INSERT INTO `matches` VALUES (56,2,3,1,'20:45:00',15,11,10);
INSERT INTO `matches` VALUES (58,2,4,1,'20:00:00',15,12,10);
INSERT INTO `matches` VALUES (59,2,8,1,'20:45:00',12,9,11);
INSERT INTO `matches` VALUES (60,2,4,1,'20:45:00',10,12,15);
INSERT INTO `matches` VALUES (61,2,5,1,'19:15:00',15,11,12);
INSERT INTO `matches` VALUES (62,2,6,1,'20:00:00',10,15,9);
INSERT INTO `matches` VALUES (64,2,3,1,'19:15:00',9,12,15);
INSERT INTO `matches` VALUES (65,2,3,1,'20:00:00',10,15,9);
INSERT INTO `matches` VALUES (66,2,5,1,'20:45:00',9,11,10);
INSERT INTO `matches` VALUES (67,2,6,1,'19:15:00',9,10,15);
INSERT INTO `matches` VALUES (69,2,6,1,'20:45:00',11,12,10);
INSERT INTO `matches` VALUES (70,2,8,1,'19:15:00',9,15,12);
INSERT INTO `matches` VALUES (72,2,8,1,'20:00:00',10,11,9);
INSERT INTO `matches` VALUES (73,2,7,1,'20:00:00',12,9,11);
INSERT INTO `matches` VALUES (75,2,7,1,'19:30:00',10,15,12);
INSERT INTO `matches` VALUES (77,2,7,1,'19:00:00',9,11,10);
INSERT INTO `matches` VALUES (78,2,7,1,'20:30:00',11,15,9);
INSERT INTO `matches` VALUES (80,2,7,1,'21:00:00',10,12,15);
INSERT INTO `matches` VALUES (84,2,9,1,'19:15:00',12,9,10);
INSERT INTO `matches` VALUES (83,2,9,1,'18:30:00',15,10,11);
INSERT INTO `matches` VALUES (86,2,9,1,'20:00:00',11,15,12);
INSERT INTO `matches` VALUES (87,2,9,1,'20:45:00',11,9,15);
INSERT INTO `matches` VALUES (94,3,3,1,'17:45:00',16,19,17);
INSERT INTO `matches` VALUES (89,3,2,1,'17:45:00',16,17,20);
INSERT INTO `matches` VALUES (90,3,2,2,'17:45:00',18,19,20);
INSERT INTO `matches` VALUES (91,3,2,1,'18:25:00',16,18,19);
INSERT INTO `matches` VALUES (92,3,2,2,'18:25:00',17,20,19);
INSERT INTO `matches` VALUES (93,3,2,1,'19:05:00',19,20,18);
INSERT INTO `matches` VALUES (96,3,3,2,'17:45:00',18,20,17);
INSERT INTO `matches` VALUES (97,3,3,1,'18:25:00',16,20,18);
INSERT INTO `matches` VALUES (98,3,3,2,'18:25:00',17,19,18);
INSERT INTO `matches` VALUES (100,3,3,1,'19:05:00',17,18,16);
INSERT INTO `matches` VALUES (101,3,4,1,'17:45:00',17,20,16);
INSERT INTO `matches` VALUES (103,3,4,2,'17:45:00',18,19,16);
INSERT INTO `matches` VALUES (104,3,4,2,'18:25:00',16,19,20);
INSERT INTO `matches` VALUES (105,3,4,1,'18:25:00',17,18,20);
INSERT INTO `matches` VALUES (106,3,4,1,'19:05:00',16,20,19);
INSERT INTO `matches` VALUES (107,3,5,2,'17:45:00',16,18,19);
INSERT INTO `matches` VALUES (108,3,5,1,'17:45:00',17,20,19);
INSERT INTO `matches` VALUES (110,3,5,1,'18:25:00',19,20,18);
INSERT INTO `matches` VALUES (111,3,5,2,'18:25:00',16,17,18);
INSERT INTO `matches` VALUES (113,3,5,1,'19:05:00',19,18,17);
INSERT INTO `matches` VALUES (114,3,6,1,'17:15:00',16,17,20);
INSERT INTO `matches` VALUES (115,3,6,2,'17:15:00',18,19,20);
INSERT INTO `matches` VALUES (116,3,6,2,'17:40:00',16,20,19);
INSERT INTO `matches` VALUES (117,3,6,1,'17:40:00',17,18,19);
INSERT INTO `matches` VALUES (118,3,6,1,'18:05:00',16,19,18);
INSERT INTO `matches` VALUES (120,3,6,2,'18:05:00',17,20,18);
INSERT INTO `matches` VALUES (121,3,6,1,'18:30:00',16,18,17);
INSERT INTO `matches` VALUES (122,3,6,2,'18:30:00',19,20,17);
INSERT INTO `matches` VALUES (123,3,6,1,'18:55:00',17,19,16);
INSERT INTO `matches` VALUES (124,3,6,2,'18:55:00',18,20,16);
INSERT INTO `matches` VALUES (125,3,7,1,'17:45:00',18,20,17);
INSERT INTO `matches` VALUES (126,3,7,1,'17:45:00',16,19,17);
INSERT INTO `matches` VALUES (127,3,7,1,'18:25:00',16,20,19);
INSERT INTO `matches` VALUES (128,3,7,2,'18:25:00',17,18,19);
INSERT INTO `matches` VALUES (129,3,7,1,'19:05:00',17,19,20);
INSERT INTO `matches` VALUES (139,3,9,2,'17:15:00',19,20,17);
INSERT INTO `matches` VALUES (137,3,9,1,'17:15:00',16,18,17);
INSERT INTO `matches` VALUES (140,3,9,1,'17:45:00',18,17,19);
INSERT INTO `matches` VALUES (142,3,9,2,'17:45:00',16,20,19);
INSERT INTO `matches` VALUES (143,3,9,1,'18:15:00',18,19,16);
INSERT INTO `matches` VALUES (144,3,9,2,'18:15:00',20,17,16);
INSERT INTO `matches` VALUES (145,3,9,1,'18:40:00',18,17,20);
INSERT INTO `matches` VALUES (146,3,9,1,'19:05:00',19,18,17);
INSERT INTO `matches` VALUES (147,3,9,1,'19:45:00',18,19,17);
INSERT INTO `matches` VALUES (148,5,1,1,'17:45:00',22,23,24);
INSERT INTO `matches` VALUES (150,5,1,2,'17:45:00',26,27,28);
INSERT INTO `matches` VALUES (151,5,1,1,'18:10:00',24,25,22);
INSERT INTO `matches` VALUES (152,5,1,2,'18:10:00',28,29,26);
INSERT INTO `matches` VALUES (153,5,1,1,'18:35:00',22,26,25);
INSERT INTO `matches` VALUES (154,5,1,2,'18:35:00',23,27,29);
INSERT INTO `matches` VALUES (155,5,1,1,'19:00:00',24,28,23);
INSERT INTO `matches` VALUES (156,5,1,2,'19:00:00',25,29,27);
INSERT INTO `matches` VALUES (159,5,1,1,'19:25:00',22,27,24);
INSERT INTO `matches` VALUES (160,5,1,2,'19:25:00',23,26,28);
INSERT INTO `matches` VALUES (161,5,1,1,'19:50:00',24,29,22);
INSERT INTO `matches` VALUES (163,5,1,2,'19:50:00',25,28,26);
INSERT INTO `matches` VALUES (164,5,2,1,'17:45:00',22,24,25);
INSERT INTO `matches` VALUES (166,5,2,2,'17:45:00',26,28,29);
INSERT INTO `matches` VALUES (167,5,2,1,'18:25:00',23,25,24);
INSERT INTO `matches` VALUES (168,5,2,2,'18:25:00',27,29,28);
INSERT INTO `matches` VALUES (169,5,2,1,'19:05:00',22,25,23);
INSERT INTO `matches` VALUES (170,5,2,2,'19:05:00',26,29,27);
INSERT INTO `matches` VALUES (171,5,3,1,'17:45:00',23,24,22);
INSERT INTO `matches` VALUES (173,5,3,2,'17:45:00',27,28,29);
INSERT INTO `matches` VALUES (174,5,3,1,'18:25:00',22,29,23);
INSERT INTO `matches` VALUES (175,5,3,2,'18:25:00',25,26,27);
INSERT INTO `matches` VALUES (176,5,3,1,'19:05:00',23,28,29);
INSERT INTO `matches` VALUES (177,5,3,2,'19:05:00',24,27,25);
INSERT INTO `matches` VALUES (178,5,4,1,'17:45:00',22,23,24);
INSERT INTO `matches` VALUES (180,5,4,2,'17:45:00',26,27,28);
INSERT INTO `matches` VALUES (181,5,4,1,'18:25:00',26,24,25);
INSERT INTO `matches` VALUES (182,5,4,2,'18:25:00',22,28,27);
INSERT INTO `matches` VALUES (183,5,4,1,'19:05:00',25,24,26);
INSERT INTO `matches` VALUES (184,5,4,2,'19:05:00',29,28,22);
INSERT INTO `matches` VALUES (185,5,5,1,'17:45:00',27,22,25);
INSERT INTO `matches` VALUES (186,5,5,2,'17:45:00',23,26,29);
INSERT INTO `matches` VALUES (187,5,5,1,'18:25:00',28,25,23);
INSERT INTO `matches` VALUES (188,5,5,2,'18:25:00',24,29,27);
INSERT INTO `matches` VALUES (189,5,5,1,'19:05:00',29,25,28);
INSERT INTO `matches` VALUES (190,5,5,2,'19:05:00',27,23,24);
INSERT INTO `matches` VALUES (191,5,6,1,'17:45:00',22,26,28);
INSERT INTO `matches` VALUES (192,5,6,2,'17:45:00',25,27,23);
INSERT INTO `matches` VALUES (193,5,6,1,'18:25:00',29,23,22);
INSERT INTO `matches` VALUES (194,5,6,2,'18:25:00',28,24,26);
INSERT INTO `matches` VALUES (195,5,6,1,'19:05:00',27,26,24);
INSERT INTO `matches` VALUES (196,5,6,1,'19:05:00',23,22,29);
INSERT INTO `matches` VALUES (197,5,7,1,'17:45:00',24,22,28);
INSERT INTO `matches` VALUES (198,5,7,2,'17:45:00',25,29,27);
INSERT INTO `matches` VALUES (199,5,7,1,'18:25:00',24,25,22);
INSERT INTO `matches` VALUES (200,5,7,2,'18:25:00',28,29,23);
INSERT INTO `matches` VALUES (201,5,7,1,'19:05:00',28,27,29);
INSERT INTO `matches` VALUES (202,5,7,2,'19:05:00',23,26,24);
INSERT INTO `matches` VALUES (203,5,8,1,'17:45:00',29,22,28);
INSERT INTO `matches` VALUES (205,5,8,2,'17:45:00',23,27,26);
INSERT INTO `matches` VALUES (206,5,8,1,'18:25:00',28,24,29);
INSERT INTO `matches` VALUES (207,5,8,2,'18:25:00',26,25,23);
INSERT INTO `matches` VALUES (208,5,8,1,'19:05:00',22,26,24);
INSERT INTO `matches` VALUES (209,5,8,2,'19:05:00',27,28,25);
INSERT INTO `matches` VALUES (210,5,9,1,'17:15:00',29,25,26);
INSERT INTO `matches` VALUES (211,5,9,2,'17:15:00',23,24,28);
INSERT INTO `matches` VALUES (213,5,9,1,'17:45:00',22,27,25);
INSERT INTO `matches` VALUES (214,5,9,2,'17:45:00',28,29,24);
INSERT INTO `matches` VALUES (215,5,9,2,'18:05:00',26,23,28);
INSERT INTO `matches` VALUES (216,5,9,2,'18:25:00',29,26,23);
INSERT INTO `matches` VALUES (217,5,9,2,'18:45:00',22,29,26);
INSERT INTO `matches` VALUES (219,5,9,2,'19:15:00',29,27,22);
INSERT INTO `matches` VALUES (220,6,1,1,'17:15:00',30,31,34);
INSERT INTO `matches` VALUES (222,6,1,2,'17:15:00',32,33,34);
INSERT INTO `matches` VALUES (223,6,1,1,'17:35:00',34,30,33);
INSERT INTO `matches` VALUES (224,6,1,2,'17:35:00',31,32,33);
INSERT INTO `matches` VALUES (225,6,1,1,'17:55:00',33,34,31);
INSERT INTO `matches` VALUES (226,6,1,2,'17:55:00',30,32,31);
INSERT INTO `matches` VALUES (227,6,1,1,'18:15:00',31,33,30);
INSERT INTO `matches` VALUES (228,6,1,2,'18:15:00',32,34,30);
INSERT INTO `matches` VALUES (229,6,1,1,'18:35:00',30,33,32);
INSERT INTO `matches` VALUES (230,6,1,2,'18:35:00',31,34,32);
INSERT INTO `matches` VALUES (231,6,1,1,'18:55:00',35,36,37);
INSERT INTO `matches` VALUES (232,6,1,1,'19:20:00',37,35,36);
INSERT INTO `matches` VALUES (233,6,1,1,'19:45:00',36,37,35);
INSERT INTO `matches` VALUES (234,6,2,1,'17:15:00',35,36,37);
INSERT INTO `matches` VALUES (236,6,2,1,'17:55:00',37,35,36);
INSERT INTO `matches` VALUES (237,6,2,1,'19:00:00',30,33,34);
INSERT INTO `matches` VALUES (238,6,2,2,'19:00:00',32,31,34);
INSERT INTO `matches` VALUES (239,6,2,1,'19:40:00',34,30,32);
INSERT INTO `matches` VALUES (240,6,2,2,'19:40:00',31,33,32);
INSERT INTO `matches` VALUES (241,6,3,1,'17:40:00',34,31,30);
INSERT INTO `matches` VALUES (243,6,3,2,'17:40:00',33,32,30);
INSERT INTO `matches` VALUES (245,6,3,1,'18:20:00',30,32,31);
INSERT INTO `matches` VALUES (246,6,3,2,'18:20:00',34,33,31);
INSERT INTO `matches` VALUES (247,6,3,1,'19:00:00',36,37,35);
INSERT INTO `matches` VALUES (248,6,3,1,'19:40:00',35,36,37);
INSERT INTO `matches` VALUES (249,6,4,1,'17:15:00',37,35,36);
INSERT INTO `matches` VALUES (250,6,4,1,'17:55:00',36,37,35);
INSERT INTO `matches` VALUES (251,6,4,1,'19:00:00',30,31,33);
INSERT INTO `matches` VALUES (252,6,4,2,'19:00:00',34,32,33);
INSERT INTO `matches` VALUES (253,6,4,1,'19:40:00',30,33,34);
INSERT INTO `matches` VALUES (254,6,4,2,'19:40:00',31,32,34);
INSERT INTO `matches` VALUES (255,6,5,1,'17:40:00',34,30,32);
INSERT INTO `matches` VALUES (257,6,5,2,'17:40:00',31,33,32);
INSERT INTO `matches` VALUES (259,6,5,1,'18:20:00',34,31,30);
INSERT INTO `matches` VALUES (260,6,5,2,'18:20:00',33,32,30);
INSERT INTO `matches` VALUES (261,6,5,1,'19:00:00',35,36,37);
INSERT INTO `matches` VALUES (262,6,5,1,'19:40:00',37,35,36);
INSERT INTO `matches` VALUES (263,6,6,1,'17:15:00',36,37,35);
INSERT INTO `matches` VALUES (264,6,6,1,'17:55:00',35,36,37);
INSERT INTO `matches` VALUES (265,6,6,1,'19:00:00',30,32,31);
INSERT INTO `matches` VALUES (266,6,6,2,'19:00:00',34,33,31);
INSERT INTO `matches` VALUES (267,6,6,1,'19:40:00',30,31,33);
INSERT INTO `matches` VALUES (268,6,6,2,'19:40:00',34,32,33);
INSERT INTO `matches` VALUES (269,6,7,1,'18:20:00',32,34,31);
INSERT INTO `matches` VALUES (270,6,7,1,'17:40:00',34,30,32);
INSERT INTO `matches` VALUES (271,6,7,2,'17:40:00',31,33,32);
INSERT INTO `matches` VALUES (272,6,7,1,'17:15:00',30,33,34);
INSERT INTO `matches` VALUES (273,6,7,2,'17:15:00',31,32,34);
INSERT INTO `matches` VALUES (274,6,7,1,'19:00:00',37,35,36);
INSERT INTO `matches` VALUES (275,6,7,1,'19:40:00',36,37,35);
INSERT INTO `matches` VALUES (311,8,1,1,'17:45:00',44,45,48);
INSERT INTO `matches` VALUES (278,7,1,2,'19:00:00',41,42,43);
INSERT INTO `matches` VALUES (279,7,1,1,'19:40:00',38,40,39);
INSERT INTO `matches` VALUES (281,7,1,2,'19:40:00',41,43,42);
INSERT INTO `matches` VALUES (282,7,2,1,'19:00:00',39,40,38);
INSERT INTO `matches` VALUES (284,7,2,2,'19:00:00',42,43,41);
INSERT INTO `matches` VALUES (285,7,2,1,'19:40:00',40,41,39);
INSERT INTO `matches` VALUES (286,7,2,2,'19:40:00',38,43,42);
INSERT INTO `matches` VALUES (287,7,3,1,'19:00:00',38,41,40);
INSERT INTO `matches` VALUES (288,7,3,2,'19:00:00',39,42,43);
INSERT INTO `matches` VALUES (289,7,3,1,'19:40:00',39,43,38);
INSERT INTO `matches` VALUES (291,7,3,2,'19:40:00',42,40,41);
INSERT INTO `matches` VALUES (292,7,4,1,'19:00:00',40,43,39);
INSERT INTO `matches` VALUES (293,7,4,2,'19:00:00',38,42,41);
INSERT INTO `matches` VALUES (294,7,4,1,'19:40:00',42,43,38);
INSERT INTO `matches` VALUES (295,7,4,2,'19:40:00',39,41,40);
INSERT INTO `matches` VALUES (296,7,5,1,'19:00:00',38,40,39);
INSERT INTO `matches` VALUES (297,7,5,2,'19:00:00',41,43,42);
INSERT INTO `matches` VALUES (298,7,5,1,'19:40:00',38,39,40);
INSERT INTO `matches` VALUES (299,7,5,2,'19:40:00',41,42,43);
INSERT INTO `matches` VALUES (300,7,6,1,'19:00:00',39,40,42);
INSERT INTO `matches` VALUES (301,7,6,2,'19:00:00',43,38,41);
INSERT INTO `matches` VALUES (303,7,6,1,'19:40:00',39,42,38);
INSERT INTO `matches` VALUES (304,7,6,2,'19:40:00',40,41,43);
INSERT INTO `matches` VALUES (306,7,1,1,'19:00:00',38,39,40);
INSERT INTO `matches` VALUES (313,8,1,1,'18:25:00',45,46,47);
INSERT INTO `matches` VALUES (312,8,1,2,'17:45:00',46,47,48);
INSERT INTO `matches` VALUES (314,8,1,2,'18:25:00',44,48,47);
INSERT INTO `matches` VALUES (315,8,1,1,'19:05:00',47,48,44);
INSERT INTO `matches` VALUES (317,8,2,1,'17:45:00',45,47,44);
INSERT INTO `matches` VALUES (319,8,2,2,'17:45:00',46,48,44);
INSERT INTO `matches` VALUES (320,8,2,1,'18:25:00',47,44,46);
INSERT INTO `matches` VALUES (321,8,2,2,'18:25:00',48,45,46);
INSERT INTO `matches` VALUES (323,8,2,1,'19:05:00',44,46,45);
INSERT INTO `matches` VALUES (324,8,4,1,'17:45:00',46,45,47);
INSERT INTO `matches` VALUES (325,8,4,2,'17:45:00',48,44,47);
INSERT INTO `matches` VALUES (326,8,4,1,'18:25:00',45,44,48);
INSERT INTO `matches` VALUES (327,8,4,2,'18:25:00',47,46,48);
INSERT INTO `matches` VALUES (328,8,4,1,'19:05:00',47,48,46);
INSERT INTO `matches` VALUES (329,8,5,1,'17:45:00',48,47,45);
INSERT INTO `matches` VALUES (330,8,5,2,'17:45:00',46,44,45);
INSERT INTO `matches` VALUES (331,8,5,1,'18:25:00',47,45,44);
INSERT INTO `matches` VALUES (333,8,5,2,'18:25:00',48,46,44);
INSERT INTO `matches` VALUES (335,8,5,1,'19:05:00',45,44,48);
INSERT INTO `matches` VALUES (336,8,6,1,'17:45:00',45,48,46);
INSERT INTO `matches` VALUES (338,8,6,2,'17:45:00',44,47,46);
INSERT INTO `matches` VALUES (339,8,6,1,'18:25:00',48,46,45);
INSERT INTO `matches` VALUES (340,8,6,2,'18:25:00',47,44,45);
INSERT INTO `matches` VALUES (341,8,6,1,'19:05:00',45,46,47);
INSERT INTO `matches` VALUES (343,8,8,1,'17:45:00',44,46,48);
INSERT INTO `matches` VALUES (345,8,8,2,'17:45:00',45,47,48);
INSERT INTO `matches` VALUES (346,8,8,1,'18:25:00',46,47,44);
INSERT INTO `matches` VALUES (347,8,8,2,'18:25:00',45,48,44);
INSERT INTO `matches` VALUES (348,8,8,1,'19:05:00',44,48,47);
INSERT INTO `matches` VALUES (349,8,10,1,'17:45:00',48,47,46);
INSERT INTO `matches` VALUES (351,8,10,2,'17:45:00',44,45,46);
INSERT INTO `matches` VALUES (352,8,10,1,'18:25:00',46,45,48);
INSERT INTO `matches` VALUES (353,8,10,2,'18:25:00',47,44,48);
INSERT INTO `matches` VALUES (354,8,10,1,'19:05:00',48,46,44);
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `other_content`
--

DROP TABLE IF EXISTS `other_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `other_content` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `the_content` varchar(499) NOT NULL,
  `extra` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_content`
--

LOCK TABLES `other_content` WRITE;
/*!40000 ALTER TABLE `other_content` DISABLE KEYS */;
INSERT INTO `other_content` VALUES (1,'homePhotoURL','http://www.teamlexvb.com/includes/images/bg2015S.png','');
INSERT INTO `other_content` VALUES (2,'siteSeason','8','');
INSERT INTO `other_content` VALUES (3,'hideStandings','0','https://www.dropbox.com/s/eczod0d08ilvo3c/F15Bracket.pdf?dl=0');
/*!40000 ALTER TABLE `other_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `ID` int(11) NOT NULL auto_increment,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(99) default NULL,
  `Paid` int(11) default NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'Ben dJ','scvlben@gmail.com',45);
INSERT INTO `players` VALUES (2,'Robert C','YelpacTrebor@yahoo.com',NULL);
INSERT INTO `players` VALUES (3,'Adam E','adam.evans21@gmail.com',NULL);
INSERT INTO `players` VALUES (4,'Gil B','gilbagang@gmail.com',NULL);
INSERT INTO `players` VALUES (5,'Justin S','jasmal01@moreheadstate.edu',NULL);
INSERT INTO `players` VALUES (6,'Casey Shadix','coshadix@gmail.com',35);
INSERT INTO `players` VALUES (7,'Eddie M','donot@email.com',NULL);
INSERT INTO `players` VALUES (49,'Adam Stuart','adamstu@gmail.com',NULL);
INSERT INTO `players` VALUES (12,'Scott P','pittmanscott77@yahoo.com',NULL);
INSERT INTO `players` VALUES (13,'Kristi NW','no@email.com',NULL);
INSERT INTO `players` VALUES (14,'Ryan Hartsock','ryan.m.hartsock@gmail.com',45);
INSERT INTO `players` VALUES (20,'TJ','no@email.com',NULL);
INSERT INTO `players` VALUES (19,'Nathan Dickerson','nathandickerson@gmail.com',45);
INSERT INTO `players` VALUES (21,'Steve Hatton','ukfan1979@gmail.com',NULL);
INSERT INTO `players` VALUES (22,'Matthew Gilley','gi113y@gmail.com',NULL);
INSERT INTO `players` VALUES (23,'Rob Stromquist','rob.stromquist@gmail.com',NULL);
INSERT INTO `players` VALUES (24,'Blake Flaugher','jbflau2.0@gmail.com',NULL);
INSERT INTO `players` VALUES (25,'Alan Morgan','edward.a.morgan@gmail.com',NULL);
INSERT INTO `players` VALUES (26,'Jim Prince','jprince@mac.com',NULL);
INSERT INTO `players` VALUES (27,'Justin Ray','g4justin13@yahoo.com',NULL);
INSERT INTO `players` VALUES (28,'Justin Sumner','juz10@me.com',NULL);
INSERT INTO `players` VALUES (29,'Monica King','mmmoak@gmail.com',NULL);
INSERT INTO `players` VALUES (30,'Clay Wahlsmith','clayboy21@yahoo.com',NULL);
INSERT INTO `players` VALUES (48,'Janet Owen','skatingrainbow@yahoo.com',NULL);
INSERT INTO `players` VALUES (32,'Brandi Jones','bpj1910@aol.com',NULL);
INSERT INTO `players` VALUES (33,'John Rhyne','jp.rhyne@sbcglobal.net',35);
INSERT INTO `players` VALUES (34,'Rudy S','rudolphscott@hotmail.com',NULL);
INSERT INTO `players` VALUES (35,'Jenna Martin','jen.martin@uky.edu',NULL);
INSERT INTO `players` VALUES (36,'Joe W','jweigel84@aol.com',NULL);
INSERT INTO `players` VALUES (37,'Michael Birchett','mdbirchett@hotmail.com',NULL);
INSERT INTO `players` VALUES (38,'Joey Maldonado','jojomo1986@aol.com',NULL);
INSERT INTO `players` VALUES (39,'Cameron Stalcup','cameron.stalcup@uky.edu',NULL);
INSERT INTO `players` VALUES (40,'Cameron James','camtodd90@yahoo.com',NULL);
INSERT INTO `players` VALUES (41,'James Grant Wilson','jamesgrantwilson@uky.edu',NULL);
INSERT INTO `players` VALUES (42,'Stephanie Oghia','stephanieoghia@gmail.com',NULL);
INSERT INTO `players` VALUES (43,'Kenneth Hicks','no@email.com',NULL);
INSERT INTO `players` VALUES (44,'Gregg Jones','gforcegj888@yahoo.com',NULL);
INSERT INTO `players` VALUES (45,'Ruba Khader','rubakhader@gmail.com',NULL);
INSERT INTO `players` VALUES (46,'Jessie B','jessica@imagoconnection.com',NULL);
INSERT INTO `players` VALUES (47,'Michael Gordon','michaelgordon91@comcast.net',NULL);
INSERT INTO `players` VALUES (71,'Alaina Matthews','alaina.matthews@gmail.com',NULL);
INSERT INTO `players` VALUES (51,'Billy Whitaker','btodd405@gmail.com',NULL);
INSERT INTO `players` VALUES (52,'Jason J','jason_jackson@live.com',45);
INSERT INTO `players` VALUES (53,'Dusty Coyle','dusty.coyle@icloud.com',NULL);
INSERT INTO `players` VALUES (54,'Meghan B','m.buell@hotmail.com',NULL);
INSERT INTO `players` VALUES (55,'Matthew W','mwstbrk@gmail.com',NULL);
INSERT INTO `players` VALUES (56,'Kolby R','kolbyrobinson543@gmail.com',NULL);
INSERT INTO `players` VALUES (57,'Amber D','amber.devers@gmail.com',NULL);
INSERT INTO `players` VALUES (58,'Brad Poer','bradpoer1980@gmail.com',NULL);
INSERT INTO `players` VALUES (59,'Nicole Sand','nicolesand33@gmail.com',NULL);
INSERT INTO `players` VALUES (60,'Bridgette Kanz','bridgettekanz@gmail.com',NULL);
INSERT INTO `players` VALUES (61,'Valentina K','valentinakharitonova@yahoo.com',NULL);
INSERT INTO `players` VALUES (62,'Todd T','donot@email.com',NULL);
INSERT INTO `players` VALUES (66,'Morgan M','morganCmiddleton@yahoo.com',NULL);
INSERT INTO `players` VALUES (127,'Melanie W','womensvball76@aol.com',NULL);
INSERT INTO `players` VALUES (65,'Madison Furman','Madisonfurman@yahoo.com',NULL);
INSERT INTO `players` VALUES (67,'Daniel Danger Niblick','dtniblick@gmail.com',NULL);
INSERT INTO `players` VALUES (68,'Suliman shalash','sjshalash@gmail.com',NULL);
INSERT INTO `players` VALUES (69,'Nathan Baker','nathan_baker13@yahoo.com',NULL);
INSERT INTO `players` VALUES (72,'Micheal Rodgers','michealr1970@hotmail.com',NULL);
INSERT INTO `players` VALUES (73,'Matt Hissey','matthissey@me.com',NULL);
INSERT INTO `players` VALUES (74,'Dewayne Cooper','dewayne@insightbb.com',NULL);
INSERT INTO `players` VALUES (75,'Kenneth R Warlick','kwarlick@gmail.com',NULL);
INSERT INTO `players` VALUES (76,'Mitch Estepp','no@email.com',NULL);
INSERT INTO `players` VALUES (77,'Janice Vranicar','jmvranicar@gmail.com',NULL);
INSERT INTO `players` VALUES (78,'Markus Cross','equusfarm1@yahoo.com',45);
INSERT INTO `players` VALUES (79,'Michael Shaver','mcshaverartist@yahoo.com',NULL);
INSERT INTO `players` VALUES (80,'Tabatha Davidson','tabatha1215@yahoo.com',NULL);
INSERT INTO `players` VALUES (81,'Marian Mays','marianmays22@gmail.com',NULL);
INSERT INTO `players` VALUES (82,'Shannon Oltmann','shannon.oltmann@uky.edu',NULL);
INSERT INTO `players` VALUES (83,'Nicholas Adkins','nadkins81@gmail.com',45);
INSERT INTO `players` VALUES (85,'Evan S','',NULL);
INSERT INTO `players` VALUES (87,'Stephanie L','lynchfamily03@gmail.com',NULL);
INSERT INTO `players` VALUES (93,'Pete Olsen','polsen84@yahoo.com',45);
INSERT INTO `players` VALUES (90,'Chris Eisaman','ceisaman@yahoo.com',NULL);
INSERT INTO `players` VALUES (95,'Rogelio','tito-obi@hotmail.com',NULL);
INSERT INTO `players` VALUES (96,'Joshua Rogers','rogers.joshuac@gmail.com',45);
INSERT INTO `players` VALUES (97,'Cade Cummins','xencade@gmail.com',NULL);
INSERT INTO `players` VALUES (98,'Ivo','idenev@yahoo.com',NULL);
INSERT INTO `players` VALUES (99,'Denise Schaeffer','dschaeffer09@outlook.com',NULL);
INSERT INTO `players` VALUES (100,'Ashley Bryant Cheney','bryant.cheney@gmail.com',45);
INSERT INTO `players` VALUES (101,'Jenn Smith','jennsmith2121@gmail.com',NULL);
INSERT INTO `players` VALUES (102,'James \"Jimmy\" Lee','coachjames.lee4ever@gmail.com',45);
INSERT INTO `players` VALUES (103,'Lauren Shaw','elsa418@hotmail.com',NULL);
INSERT INTO `players` VALUES (104,'Mark Campbell','mallen2819@gmail.com',NULL);
INSERT INTO `players` VALUES (105,'Michael Ortman','mjor223@g.uky.edu',NULL);
INSERT INTO `players` VALUES (106,'Nathan Jones','nathanj439@gmail.com',NULL);
INSERT INTO `players` VALUES (107,'Rachel Von Nieda','rachel.vonnieda@uky.edu',NULL);
INSERT INTO `players` VALUES (108,'Grant Webb','grant_webb_1985@yahoo.com',NULL);
INSERT INTO `players` VALUES (109,'Mollie Stewart','mmstewart88@gmail.com',NULL);
INSERT INTO `players` VALUES (110,'Beth Cahoon','bcahoon04@yahoo.com',NULL);
INSERT INTO `players` VALUES (111,'Eric Shock','eric.shock@uky.edu',NULL);
INSERT INTO `players` VALUES (112,'Brian Zinser','brianzinser@gmail.com',NULL);
INSERT INTO `players` VALUES (113,'Chad Ford','chad.ford@uky.edu',NULL);
INSERT INTO `players` VALUES (114,'Paul Angulo','paul.angulo@uky.edu',NULL);
INSERT INTO `players` VALUES (115,'Brianna Harfmann','harfmannbd@gmail.com',35);
INSERT INTO `players` VALUES (129,'Matthew Savage','matthewsavage@uky.edu',45);
INSERT INTO `players` VALUES (130,'Brittany Barron','volleyballkills10@yahoo.com',NULL);
INSERT INTO `players` VALUES (116,'Jenn Fischer','jenn.fischer@uky.edu',NULL);
INSERT INTO `players` VALUES (131,'Bea Cameron','beacameron06@gmail.com',35);
INSERT INTO `players` VALUES (118,'Liz Siereveld','esiereveld@hotmail.com',NULL);
INSERT INTO `players` VALUES (119,'Paco Bueno','esiereveld@hotmail.com',NULL);
INSERT INTO `players` VALUES (120,'Brian Slate','brian@brianslate.com',NULL);
INSERT INTO `players` VALUES (121,'James Hawkins','jcha7192@gmail.com',NULL);
INSERT INTO `players` VALUES (122,'Tyler Denham','tyler.denham@uky.edu',NULL);
INSERT INTO `players` VALUES (128,'Samuel Miller','sboatwrightmiller@gmail.com',NULL);
INSERT INTO `players` VALUES (123,'Crystal','ckcana2@twc.com',NULL);
INSERT INTO `players` VALUES (124,'Alan Thacker','alan.thacker@unifiedtrust.com',45);
INSERT INTO `players` VALUES (125,'Dylan Kremer','dylanjkremer@gmail.com',NULL);
INSERT INTO `players` VALUES (132,'Elizabeth Baker','elsa418@hotmail.com',NULL);
INSERT INTO `players` VALUES (133,'Paul Prater','yeslexky68@yahoo.com',NULL);
INSERT INTO `players` VALUES (134,'Derek Bayer','bayerderek05@gmail.com',45);
INSERT INTO `players` VALUES (135,'Adam Schwartz','adam.schwartz@uky.edu',NULL);
INSERT INTO `players` VALUES (136,'Ashley Ruderman','ashley.ruderman@uky.edu',35);
INSERT INTO `players` VALUES (137,'Jenna Goldsmith','goldsmith.jenna@gmail.com',NULL);
INSERT INTO `players` VALUES (138,'Leah Riggs','leahriggs09@gmail.com',NULL);
INSERT INTO `players` VALUES (139,'Chrissandrea Mullins','chris33mullins@hotmail.com',NULL);
INSERT INTO `players` VALUES (140,'Richard S','accounting@risesystems.com',NULL);
INSERT INTO `players` VALUES (141,'Tyler Yeary','twister1002@gmail.com',NULL);
INSERT INTO `players` VALUES (142,'Carrie Witt','crwitt87@aol.com',NULL);
INSERT INTO `players` VALUES (180,'Nolan Boatwright','nolanboat@gmail.com',45);
INSERT INTO `players` VALUES (143,'Cate Gooch','categ.25@gmail.com',35);
INSERT INTO `players` VALUES (144,'Daniel Cooper','delcooper11@gmail.com',NULL);
INSERT INTO `players` VALUES (145,'Christopher Corcoran','clcorcoran@gmail.com',NULL);
INSERT INTO `players` VALUES (178,'Mark Barker','barker@email.uky.edu',45);
INSERT INTO `players` VALUES (146,'Danielle Lillie','climbergirl32@gmail.com',45);
INSERT INTO `players` VALUES (147,'Haviland Argo','havilandargo@gmail.com',45);
INSERT INTO `players` VALUES (148,'Jasmine Newman','jasmine.newman@uky.edu',NULL);
INSERT INTO `players` VALUES (149,'Jay Shelton','harmonshelton@hotmail.com',NULL);
INSERT INTO `players` VALUES (176,'Hannah Ruehl','ruehlh@gmail.com',NULL);
INSERT INTO `players` VALUES (150,'Joshua Miller','joshuamiller1@hotmail.com',NULL);
INSERT INTO `players` VALUES (151,'Kris Back','krishalk28@gmail.com',NULL);
INSERT INTO `players` VALUES (152,'Leah Padgett','leampadgett@gmail.com',NULL);
INSERT INTO `players` VALUES (153,'Lindsey Thorner','thornerla@vcu.edu',NULL);
INSERT INTO `players` VALUES (154,'Melissa Weil','melissa.weil@uky.edu',NULL);
INSERT INTO `players` VALUES (155,'Monica Magdangal','monica.magdangal@gmail.com',NULL);
INSERT INTO `players` VALUES (156,'Rhogene Labata','rlabata041891@gmail.com',NULL);
INSERT INTO `players` VALUES (157,'Rick Warner','riksir@aol.com',NULL);
INSERT INTO `players` VALUES (158,'Sarah W','aledrina@live.com',NULL);
INSERT INTO `players` VALUES (159,'Scott Austin','ScottFlip1@yahoo.com',45);
INSERT INTO `players` VALUES (160,'Stephen Lake','stephen_lake.2010@yahoo.com',NULL);
INSERT INTO `players` VALUES (161,'Terrence Tichenor','terrence.tichenor@gmail.com',NULL);
INSERT INTO `players` VALUES (179,'Mark Elpers','markelp@yahoo.com',45);
INSERT INTO `players` VALUES (173,'Amanda Rau','raua@mail.gvsu.edu',NULL);
INSERT INTO `players` VALUES (174,'Ben Payne','ben.payne@lrc.ky.gov',NULL);
INSERT INTO `players` VALUES (169,'Bryan Campbell','bryanca888@hotmail.com',NULL);
INSERT INTO `players` VALUES (162,'Muhrl Searcy','mlsearcy@yahoo.com',NULL);
INSERT INTO `players` VALUES (163,'Monica Magdangal','',NULL);
INSERT INTO `players` VALUES (164,'Luke Padgett','lapadgett@gmail.com',NULL);
INSERT INTO `players` VALUES (165,'Luke Padgett','',NULL);
INSERT INTO `players` VALUES (177,'Kristin Abboud','btrbirth@hotmail.com',45);
INSERT INTO `players` VALUES (166,'Devrah Anne','daarndt@gmail.com',NULL);
INSERT INTO `players` VALUES (167,'Caitlyn Kogge','caitlyn.kogge@danville.kyschools.us',NULL);
INSERT INTO `players` VALUES (168,'Katie Pauly','katiepauly88@gmail.com',45);
INSERT INTO `players` VALUES (175,'Celine Lamb','celine.c.lamb@gmail.com',35);
INSERT INTO `players` VALUES (172,'Alexandria Boatwright','alexandria.hagan91@gmail.com',35);
INSERT INTO `players` VALUES (170,'Lisa Krause','Lrkrause88@yahoo.com',NULL);
INSERT INTO `players` VALUES (171,'Adam Hulette','funforall2313@gmail.com',NULL);
INSERT INTO `players` VALUES (181,'Jim Haden','no@email.com',45);
INSERT INTO `players` VALUES (184,'Suzanne Haberek','smhabe@gmail.com',NULL);
INSERT INTO `players` VALUES (185,'Cindy Covey','ccovey2horses@yahoo.com',NULL);
INSERT INTO `players` VALUES (187,'Chris Baker','christophoolery@hotmail.com',45);
INSERT INTO `players` VALUES (188,'Sarah Fraser-Jones','sfj.milc@gmail.com',NULL);
INSERT INTO `players` VALUES (189,'Abbey Love','abs48884@yahoo.com',NULL);
INSERT INTO `players` VALUES (190,'Justin Smallwood','',NULL);
INSERT INTO `players` VALUES (191,'Cory Cameron','ccamer26@student.scad.edu',45);
INSERT INTO `players` VALUES (192,'John-Michael Criswell','johnmichaelcriswell@gmail.com',45);
INSERT INTO `players` VALUES (193,'Joshua Abboud ','jmabboud@gmail.com',45);
INSERT INTO `players` VALUES (194,'Jumpei Iiyama','jumpeioregon@gmail.com',45);
INSERT INTO `players` VALUES (195,'Justice Adams','japollo@msn.com',35);
INSERT INTO `players` VALUES (196,'Justin Aulds','justin.aulds95@gmail.com',35);
INSERT INTO `players` VALUES (197,'Katie Waddell','kwaddell1228@gmail.com',35);
INSERT INTO `players` VALUES (198,'Kristen Lough','knloug2@g.uky.edu',45);
INSERT INTO `players` VALUES (200,'Megan Adams','dorothymeeg@gmail.com',45);
INSERT INTO `players` VALUES (201,'Megan Loof','megan.looff@gmail.com',45);
INSERT INTO `players` VALUES (202,'Nichole Caprio','nacaprio@aol.com',35);
INSERT INTO `players` VALUES (203,'Susannah Crouch','susannah.crouch17@gmail.com',35);
INSERT INTO `players` VALUES (204,'Bianca V.','',35);
INSERT INTO `players` VALUES (205,'Steven B.','',45);
INSERT INTO `players` VALUES (206,'Maegan Pirtle','mcpirtle11@gmail.com',NULL);
INSERT INTO `players` VALUES (207,'Cassandra Vazquez','cvazquez0004@gmail.com',NULL);
INSERT INTO `players` VALUES (208,'Jasper WQ','jasper.waugh@gmail.com',NULL);
INSERT INTO `players` VALUES (209,'Courtney Banschbach','CourtneyMarie0919@gmail.com',NULL);
INSERT INTO `players` VALUES (210,'Lauren Moore','ozzietd@gmail.com',NULL);
INSERT INTO `players` VALUES (211,'Joanna Cruze','joanna.cruze@gmail.com',NULL);
INSERT INTO `players` VALUES (212,'Philip Crum','philip.crum05@gmail.com',NULL);
INSERT INTO `players` VALUES (213,'Adam Ghoweri','Aghoweri@yahoo.com',NULL);
INSERT INTO `players` VALUES (214,'Luis Martinez','gambiteluis@msn.com',NULL);
INSERT INTO `players` VALUES (215,'Chelsea Cutright','c.cutright@uky.edu',NULL);
INSERT INTO `players` VALUES (216,'Mackenzie Simpson','',NULL);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rosters`
--

DROP TABLE IF EXISTS `rosters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rosters` (
  `ID` int(11) NOT NULL auto_increment,
  `Team` int(11) NOT NULL,
  `Player` int(11) NOT NULL,
  `Captain` tinyint(4) NOT NULL,
  `PT` tinyint(4) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=382 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rosters`
--

LOCK TABLES `rosters` WRITE;
/*!40000 ALTER TABLE `rosters` DISABLE KEYS */;
INSERT INTO `rosters` VALUES (9,1,65,0,0);
INSERT INTO `rosters` VALUES (8,1,19,1,0);
INSERT INTO `rosters` VALUES (7,1,43,0,0);
INSERT INTO `rosters` VALUES (43,4,71,0,1);
INSERT INTO `rosters` VALUES (10,1,33,0,0);
INSERT INTO `rosters` VALUES (11,1,46,0,0);
INSERT INTO `rosters` VALUES (12,1,62,0,1);
INSERT INTO `rosters` VALUES (13,2,44,0,0);
INSERT INTO `rosters` VALUES (14,2,5,0,0);
INSERT INTO `rosters` VALUES (15,2,20,1,0);
INSERT INTO `rosters` VALUES (16,2,66,0,0);
INSERT INTO `rosters` VALUES (87,18,3,0,0);
INSERT INTO `rosters` VALUES (18,2,35,0,0);
INSERT INTO `rosters` VALUES (19,2,45,0,1);
INSERT INTO `rosters` VALUES (20,2,53,0,1);
INSERT INTO `rosters` VALUES (21,3,60,1,0);
INSERT INTO `rosters` VALUES (22,3,1,0,0);
INSERT INTO `rosters` VALUES (45,3,85,0,0);
INSERT INTO `rosters` VALUES (24,3,49,0,0);
INSERT INTO `rosters` VALUES (25,3,12,0,0);
INSERT INTO `rosters` VALUES (26,3,48,0,0);
INSERT INTO `rosters` VALUES (27,3,32,0,1);
INSERT INTO `rosters` VALUES (28,4,25,0,0);
INSERT INTO `rosters` VALUES (29,4,58,1,0);
INSERT INTO `rosters` VALUES (30,4,56,0,0);
INSERT INTO `rosters` VALUES (44,4,47,0,0);
INSERT INTO `rosters` VALUES (33,4,57,0,0);
INSERT INTO `rosters` VALUES (34,4,6,0,1);
INSERT INTO `rosters` VALUES (35,5,7,1,0);
INSERT INTO `rosters` VALUES (36,5,14,0,0);
INSERT INTO `rosters` VALUES (37,5,36,0,0);
INSERT INTO `rosters` VALUES (38,5,52,0,0);
INSERT INTO `rosters` VALUES (39,5,59,0,0);
INSERT INTO `rosters` VALUES (40,5,54,0,1);
INSERT INTO `rosters` VALUES (41,5,55,0,0);
INSERT INTO `rosters` VALUES (42,1,67,0,0);
INSERT INTO `rosters` VALUES (47,15,3,0,1);
INSERT INTO `rosters` VALUES (48,10,100,0,0);
INSERT INTO `rosters` VALUES (49,10,1,0,0);
INSERT INTO `rosters` VALUES (50,9,110,0,0);
INSERT INTO `rosters` VALUES (51,15,58,1,0);
INSERT INTO `rosters` VALUES (52,11,120,0,0);
INSERT INTO `rosters` VALUES (53,11,115,0,0);
INSERT INTO `rosters` VALUES (54,15,113,0,0);
INSERT INTO `rosters` VALUES (55,9,30,0,0);
INSERT INTO `rosters` VALUES (56,12,67,0,1);
INSERT INTO `rosters` VALUES (57,9,99,0,0);
INSERT INTO `rosters` VALUES (58,9,7,0,1);
INSERT INTO `rosters` VALUES (59,15,111,0,0);
INSERT INTO `rosters` VALUES (60,12,48,0,0);
INSERT INTO `rosters` VALUES (61,11,52,0,0);
INSERT INTO `rosters` VALUES (62,12,116,0,0);
INSERT INTO `rosters` VALUES (63,15,101,0,0);
INSERT INTO `rosters` VALUES (64,10,46,0,0);
INSERT INTO `rosters` VALUES (65,10,102,1,0);
INSERT INTO `rosters` VALUES (66,10,33,0,0);
INSERT INTO `rosters` VALUES (67,11,96,0,0);
INSERT INTO `rosters` VALUES (68,12,5,1,0);
INSERT INTO `rosters` VALUES (69,15,103,0,0);
INSERT INTO `rosters` VALUES (70,11,118,1,0);
INSERT INTO `rosters` VALUES (71,9,104,0,0);
INSERT INTO `rosters` VALUES (72,9,47,0,0);
INSERT INTO `rosters` VALUES (73,11,105,0,0);
INSERT INTO `rosters` VALUES (74,12,66,0,0);
INSERT INTO `rosters` VALUES (75,9,19,1,0);
INSERT INTO `rosters` VALUES (76,12,106,0,0);
INSERT INTO `rosters` VALUES (77,11,119,0,0);
INSERT INTO `rosters` VALUES (78,10,93,1,0);
INSERT INTO `rosters` VALUES (79,15,107,0,0);
INSERT INTO `rosters` VALUES (80,10,34,0,0);
INSERT INTO `rosters` VALUES (81,12,14,0,0);
INSERT INTO `rosters` VALUES (82,9,12,0,0);
INSERT INTO `rosters` VALUES (83,15,21,0,0);
INSERT INTO `rosters` VALUES (84,12,114,0,0);
INSERT INTO `rosters` VALUES (85,10,122,0,0);
INSERT INTO `rosters` VALUES (86,11,108,0,0);
INSERT INTO `rosters` VALUES (88,18,135,0,0);
INSERT INTO `rosters` VALUES (89,18,25,0,0);
INSERT INTO `rosters` VALUES (90,20,124,0,0);
INSERT INTO `rosters` VALUES (91,16,100,0,0);
INSERT INTO `rosters` VALUES (92,18,136,0,0);
INSERT INTO `rosters` VALUES (93,16,1,0,1);
INSERT INTO `rosters` VALUES (94,19,58,0,0);
INSERT INTO `rosters` VALUES (95,20,115,0,0);
INSERT INTO `rosters` VALUES (96,16,130,0,0);
INSERT INTO `rosters` VALUES (97,20,6,0,0);
INSERT INTO `rosters` VALUES (98,19,113,0,0);
INSERT INTO `rosters` VALUES (99,17,139,0,0);
INSERT INTO `rosters` VALUES (100,19,131,0,1);
INSERT INTO `rosters` VALUES (101,16,67,0,0);
INSERT INTO `rosters` VALUES (102,17,134,1,0);
INSERT INTO `rosters` VALUES (103,20,102,0,0);
INSERT INTO `rosters` VALUES (104,18,48,0,0);
INSERT INTO `rosters` VALUES (105,16,137,0,0);
INSERT INTO `rosters` VALUES (106,18,33,1,0);
INSERT INTO `rosters` VALUES (107,20,96,1,0);
INSERT INTO `rosters` VALUES (108,17,5,0,1);
INSERT INTO `rosters` VALUES (109,19,103,0,0);
INSERT INTO `rosters` VALUES (110,19,129,0,0);
INSERT INTO `rosters` VALUES (111,20,127,0,0);
INSERT INTO `rosters` VALUES (112,19,47,0,0);
INSERT INTO `rosters` VALUES (113,18,105,0,0);
INSERT INTO `rosters` VALUES (114,16,19,0,0);
INSERT INTO `rosters` VALUES (115,16,83,1,0);
INSERT INTO `rosters` VALUES (116,17,114,0,0);
INSERT INTO `rosters` VALUES (117,17,133,0,0);
INSERT INTO `rosters` VALUES (118,19,93,1,0);
INSERT INTO `rosters` VALUES (119,17,107,0,0);
INSERT INTO `rosters` VALUES (120,17,140,0,0);
INSERT INTO `rosters` VALUES (121,20,14,0,0);
INSERT INTO `rosters` VALUES (122,16,141,0,0);
INSERT INTO `rosters` VALUES (123,18,128,0,1);
INSERT INTO `rosters` VALUES (124,20,132,0,0);
INSERT INTO `rosters` VALUES (125,19,138,0,0);
INSERT INTO `rosters` VALUES (126,17,142,0,0);
INSERT INTO `rosters` VALUES (127,18,22,0,0);
INSERT INTO `rosters` VALUES (128,27,135,0,1);
INSERT INTO `rosters` VALUES (129,23,25,1,0);
INSERT INTO `rosters` VALUES (130,25,124,0,1);
INSERT INTO `rosters` VALUES (131,23,100,0,0);
INSERT INTO `rosters` VALUES (132,27,136,0,0);
INSERT INTO `rosters` VALUES (133,23,1,0,0);
INSERT INTO `rosters` VALUES (134,29,24,0,0);
INSERT INTO `rosters` VALUES (135,29,115,0,0);
INSERT INTO `rosters` VALUES (136,27,143,0,0);
INSERT INTO `rosters` VALUES (137,24,145,0,0);
INSERT INTO `rosters` VALUES (138,25,141,1,0);
INSERT INTO `rosters` VALUES (139,29,161,0,0);
INSERT INTO `rosters` VALUES (140,25,160,0,0);
INSERT INTO `rosters` VALUES (141,29,159,0,1);
INSERT INTO `rosters` VALUES (142,28,158,0,0);
INSERT INTO `rosters` VALUES (143,22,14,0,0);
INSERT INTO `rosters` VALUES (144,28,157,0,0);
INSERT INTO `rosters` VALUES (145,24,156,0,0);
INSERT INTO `rosters` VALUES (146,25,107,0,0);
INSERT INTO `rosters` VALUES (147,28,93,1,0);
INSERT INTO `rosters` VALUES (148,24,114,0,0);
INSERT INTO `rosters` VALUES (149,28,119,0,0);
INSERT INTO `rosters` VALUES (150,28,83,0,0);
INSERT INTO `rosters` VALUES (151,29,19,1,0);
INSERT INTO `rosters` VALUES (152,26,162,0,0);
INSERT INTO `rosters` VALUES (153,28,66,0,0);
INSERT INTO `rosters` VALUES (154,24,155,0,0);
INSERT INTO `rosters` VALUES (155,27,47,0,0);
INSERT INTO `rosters` VALUES (156,27,154,0,0);
INSERT INTO `rosters` VALUES (157,29,129,0,0);
INSERT INTO `rosters` VALUES (158,25,118,0,0);
INSERT INTO `rosters` VALUES (159,29,153,0,0);
INSERT INTO `rosters` VALUES (160,23,151,0,0);
INSERT INTO `rosters` VALUES (161,24,5,0,0);
INSERT INTO `rosters` VALUES (162,24,96,0,0);
INSERT INTO `rosters` VALUES (163,27,150,0,0);
INSERT INTO `rosters` VALUES (164,22,33,0,0);
INSERT INTO `rosters` VALUES (165,26,137,0,0);
INSERT INTO `rosters` VALUES (166,22,149,1,0);
INSERT INTO `rosters` VALUES (167,26,52,0,0);
INSERT INTO `rosters` VALUES (168,22,148,0,0);
INSERT INTO `rosters` VALUES (169,25,102,0,0);
INSERT INTO `rosters` VALUES (170,23,147,0,0);
INSERT INTO `rosters` VALUES (171,26,134,1,0);
INSERT INTO `rosters` VALUES (172,23,146,0,0);
INSERT INTO `rosters` VALUES (173,26,144,0,0);
INSERT INTO `rosters` VALUES (174,24,152,1,0);
INSERT INTO `rosters` VALUES (181,28,95,0,0);
INSERT INTO `rosters` VALUES (176,27,12,1,0);
INSERT INTO `rosters` VALUES (177,25,164,0,0);
INSERT INTO `rosters` VALUES (178,22,167,0,0);
INSERT INTO `rosters` VALUES (179,22,166,0,1);
INSERT INTO `rosters` VALUES (180,26,168,0,0);
INSERT INTO `rosters` VALUES (182,22,169,0,0);
INSERT INTO `rosters` VALUES (183,23,170,0,0);
INSERT INTO `rosters` VALUES (185,32,171,0,0);
INSERT INTO `rosters` VALUES (186,30,135,1,0);
INSERT INTO `rosters` VALUES (187,34,124,0,0);
INSERT INTO `rosters` VALUES (188,32,172,0,0);
INSERT INTO `rosters` VALUES (189,33,173,0,0);
INSERT INTO `rosters` VALUES (190,34,100,0,0);
INSERT INTO `rosters` VALUES (191,31,136,0,0);
INSERT INTO `rosters` VALUES (192,30,1,0,0);
INSERT INTO `rosters` VALUES (193,32,174,0,0);
INSERT INTO `rosters` VALUES (194,30,115,0,0);
INSERT INTO `rosters` VALUES (195,33,6,0,0);
INSERT INTO `rosters` VALUES (196,31,143,0,0);
INSERT INTO `rosters` VALUES (197,32,175,0,0);
INSERT INTO `rosters` VALUES (198,30,144,0,0);
INSERT INTO `rosters` VALUES (199,33,146,0,0);
INSERT INTO `rosters` VALUES (200,32,147,0,0);
INSERT INTO `rosters` VALUES (201,30,137,0,0);
INSERT INTO `rosters` VALUES (202,37,181,0,0);
INSERT INTO `rosters` VALUES (203,37,177,0,0);
INSERT INTO `rosters` VALUES (230,30,178,0,0);
INSERT INTO `rosters` VALUES (205,31,179,0,0);
INSERT INTO `rosters` VALUES (206,33,180,0,0);
INSERT INTO `rosters` VALUES (207,32,133,0,0);
INSERT INTO `rosters` VALUES (208,35,12,0,0);
INSERT INTO `rosters` VALUES (209,33,189,0,0);
INSERT INTO `rosters` VALUES (210,31,24,0,0);
INSERT INTO `rosters` VALUES (211,34,187,0,0);
INSERT INTO `rosters` VALUES (212,35,185,0,1);
INSERT INTO `rosters` VALUES (213,36,134,0,0);
INSERT INTO `rosters` VALUES (214,32,166,0,0);
INSERT INTO `rosters` VALUES (215,31,176,0,0);
INSERT INTO `rosters` VALUES (216,33,33,0,0);
INSERT INTO `rosters` VALUES (217,33,96,1,0);
INSERT INTO `rosters` VALUES (218,34,168,0,0);
INSERT INTO `rosters` VALUES (219,31,129,1,0);
INSERT INTO `rosters` VALUES (220,35,19,0,0);
INSERT INTO `rosters` VALUES (221,31,83,1,0);
INSERT INTO `rosters` VALUES (222,34,93,0,0);
INSERT INTO `rosters` VALUES (249,37,107,0,0);
INSERT INTO `rosters` VALUES (224,35,14,0,0);
INSERT INTO `rosters` VALUES (225,34,188,0,0);
INSERT INTO `rosters` VALUES (226,37,159,0,1);
INSERT INTO `rosters` VALUES (227,36,184,0,1);
INSERT INTO `rosters` VALUES (228,30,141,0,0);
INSERT INTO `rosters` VALUES (229,34,190,1,0);
INSERT INTO `rosters` VALUES (231,35,0,0,0);
INSERT INTO `rosters` VALUES (232,35,1,0,0);
INSERT INTO `rosters` VALUES (233,35,0,0,0);
INSERT INTO `rosters` VALUES (234,35,0,0,0);
INSERT INTO `rosters` VALUES (235,35,0,0,0);
INSERT INTO `rosters` VALUES (236,35,96,0,0);
INSERT INTO `rosters` VALUES (237,35,143,0,0);
INSERT INTO `rosters` VALUES (238,35,168,0,0);
INSERT INTO `rosters` VALUES (239,36,129,0,0);
INSERT INTO `rosters` VALUES (240,36,5,0,0);
INSERT INTO `rosters` VALUES (241,36,175,0,0);
INSERT INTO `rosters` VALUES (242,36,6,0,0);
INSERT INTO `rosters` VALUES (243,36,141,1,0);
INSERT INTO `rosters` VALUES (244,37,133,0,0);
INSERT INTO `rosters` VALUES (248,37,0,0,0);
INSERT INTO `rosters` VALUES (246,37,93,1,0);
INSERT INTO `rosters` VALUES (247,37,52,0,0);
INSERT INTO `rosters` VALUES (250,34,139,0,0);
INSERT INTO `rosters` VALUES (251,31,132,0,0);
INSERT INTO `rosters` VALUES (252,30,0,0,0);
INSERT INTO `rosters` VALUES (253,30,0,0,0);
INSERT INTO `rosters` VALUES (254,33,0,0,0);
INSERT INTO `rosters` VALUES (255,30,0,0,0);
INSERT INTO `rosters` VALUES (256,36,0,0,0);
INSERT INTO `rosters` VALUES (257,31,0,0,0);
INSERT INTO `rosters` VALUES (258,31,0,0,0);
INSERT INTO `rosters` VALUES (259,36,0,0,0);
INSERT INTO `rosters` VALUES (260,36,0,0,0);
INSERT INTO `rosters` VALUES (261,34,0,0,0);
INSERT INTO `rosters` VALUES (262,37,0,0,0);
INSERT INTO `rosters` VALUES (263,35,0,0,0);
INSERT INTO `rosters` VALUES (264,35,0,0,0);
INSERT INTO `rosters` VALUES (265,32,0,0,0);
INSERT INTO `rosters` VALUES (266,30,0,0,0);
INSERT INTO `rosters` VALUES (267,38,129,1,0);
INSERT INTO `rosters` VALUES (268,38,197,0,0);
INSERT INTO `rosters` VALUES (269,38,143,0,0);
INSERT INTO `rosters` VALUES (270,38,96,0,0);
INSERT INTO `rosters` VALUES (271,38,147,0,0);
INSERT INTO `rosters` VALUES (272,38,180,0,0);
INSERT INTO `rosters` VALUES (273,38,33,0,0);
INSERT INTO `rosters` VALUES (274,39,146,0,0);
INSERT INTO `rosters` VALUES (275,39,78,0,0);
INSERT INTO `rosters` VALUES (276,39,177,0,0);
INSERT INTO `rosters` VALUES (277,39,192,0,0);
INSERT INTO `rosters` VALUES (278,39,14,1,0);
INSERT INTO `rosters` VALUES (279,39,100,0,0);
INSERT INTO `rosters` VALUES (280,39,195,0,1);
INSERT INTO `rosters` VALUES (281,40,115,0,0);
INSERT INTO `rosters` VALUES (282,40,178,0,0);
INSERT INTO `rosters` VALUES (283,40,83,0,0);
INSERT INTO `rosters` VALUES (284,40,194,0,0);
INSERT INTO `rosters` VALUES (285,40,52,0,0);
INSERT INTO `rosters` VALUES (286,40,168,0,0);
INSERT INTO `rosters` VALUES (287,40,198,0,0);
INSERT INTO `rosters` VALUES (288,41,181,0,0);
INSERT INTO `rosters` VALUES (289,41,1,0,0);
INSERT INTO `rosters` VALUES (290,41,19,0,0);
INSERT INTO `rosters` VALUES (291,41,136,1,0);
INSERT INTO `rosters` VALUES (292,41,201,0,0);
INSERT INTO `rosters` VALUES (293,41,193,0,0);
INSERT INTO `rosters` VALUES (294,41,203,0,0);
INSERT INTO `rosters` VALUES (295,42,6,0,0);
INSERT INTO `rosters` VALUES (296,42,202,0,0);
INSERT INTO `rosters` VALUES (297,42,134,0,0);
INSERT INTO `rosters` VALUES (298,42,175,0,0);
INSERT INTO `rosters` VALUES (299,42,159,0,0);
INSERT INTO `rosters` VALUES (300,42,131,0,0);
INSERT INTO `rosters` VALUES (301,42,93,1,0);
INSERT INTO `rosters` VALUES (302,43,200,0,0);
INSERT INTO `rosters` VALUES (303,43,191,0,0);
INSERT INTO `rosters` VALUES (304,43,102,1,0);
INSERT INTO `rosters` VALUES (305,43,196,0,0);
INSERT INTO `rosters` VALUES (306,43,179,0,0);
INSERT INTO `rosters` VALUES (307,43,172,1,0);
INSERT INTO `rosters` VALUES (308,43,124,0,1);
INSERT INTO `rosters` VALUES (310,41,0,0,0);
INSERT INTO `rosters` VALUES (311,43,187,0,0);
INSERT INTO `rosters` VALUES (312,42,0,0,0);
INSERT INTO `rosters` VALUES (313,43,0,0,0);
INSERT INTO `rosters` VALUES (314,42,0,0,0);
INSERT INTO `rosters` VALUES (315,42,204,0,0);
INSERT INTO `rosters` VALUES (316,39,205,0,0);
INSERT INTO `rosters` VALUES (317,41,0,0,0);
INSERT INTO `rosters` VALUES (318,39,0,0,0);
INSERT INTO `rosters` VALUES (319,38,0,0,0);
INSERT INTO `rosters` VALUES (320,40,0,0,0);
INSERT INTO `rosters` VALUES (321,45,172,1,0);
INSERT INTO `rosters` VALUES (322,44,100,0,0);
INSERT INTO `rosters` VALUES (323,45,136,0,0);
INSERT INTO `rosters` VALUES (324,45,134,0,0);
INSERT INTO `rosters` VALUES (325,45,196,0,0);
INSERT INTO `rosters` VALUES (326,45,194,0,0);
INSERT INTO `rosters` VALUES (379,45,0,0,0);
INSERT INTO `rosters` VALUES (328,45,0,0,0);
INSERT INTO `rosters` VALUES (329,45,0,0,0);
INSERT INTO `rosters` VALUES (330,45,0,0,0);
INSERT INTO `rosters` VALUES (331,45,0,0,0);
INSERT INTO `rosters` VALUES (332,45,206,0,0);
INSERT INTO `rosters` VALUES (333,45,207,0,0);
INSERT INTO `rosters` VALUES (334,44,19,0,1);
INSERT INTO `rosters` VALUES (335,44,93,0,0);
INSERT INTO `rosters` VALUES (336,44,96,0,1);
INSERT INTO `rosters` VALUES (337,44,143,0,0);
INSERT INTO `rosters` VALUES (338,44,0,0,0);
INSERT INTO `rosters` VALUES (373,44,0,0,0);
INSERT INTO `rosters` VALUES (340,44,99,1,0);
INSERT INTO `rosters` VALUES (341,44,158,0,0);
INSERT INTO `rosters` VALUES (342,44,208,0,0);
INSERT INTO `rosters` VALUES (343,44,0,0,0);
INSERT INTO `rosters` VALUES (344,46,83,0,0);
INSERT INTO `rosters` VALUES (345,46,14,0,0);
INSERT INTO `rosters` VALUES (346,46,33,1,0);
INSERT INTO `rosters` VALUES (347,46,213,0,0);
INSERT INTO `rosters` VALUES (348,46,209,0,0);
INSERT INTO `rosters` VALUES (349,46,210,0,0);
INSERT INTO `rosters` VALUES (350,46,211,0,0);
INSERT INTO `rosters` VALUES (351,46,212,0,0);
INSERT INTO `rosters` VALUES (352,47,146,0,0);
INSERT INTO `rosters` VALUES (353,47,175,0,0);
INSERT INTO `rosters` VALUES (354,47,195,0,0);
INSERT INTO `rosters` VALUES (355,47,193,0,0);
INSERT INTO `rosters` VALUES (356,47,187,0,0);
INSERT INTO `rosters` VALUES (357,47,214,0,0);
INSERT INTO `rosters` VALUES (358,47,133,1,0);
INSERT INTO `rosters` VALUES (359,47,215,0,0);
INSERT INTO `rosters` VALUES (360,48,6,1,0);
INSERT INTO `rosters` VALUES (361,48,168,0,0);
INSERT INTO `rosters` VALUES (362,48,197,0,0);
INSERT INTO `rosters` VALUES (363,48,177,0,0);
INSERT INTO `rosters` VALUES (364,48,102,0,1);
INSERT INTO `rosters` VALUES (365,48,180,0,0);
INSERT INTO `rosters` VALUES (366,48,192,0,0);
INSERT INTO `rosters` VALUES (369,47,151,0,1);
INSERT INTO `rosters` VALUES (368,48,216,0,0);
INSERT INTO `rosters` VALUES (371,46,0,0,0);
INSERT INTO `rosters` VALUES (372,45,200,0,0);
INSERT INTO `rosters` VALUES (374,44,181,0,0);
INSERT INTO `rosters` VALUES (375,46,105,0,1);
INSERT INTO `rosters` VALUES (376,47,0,0,0);
INSERT INTO `rosters` VALUES (377,45,0,0,0);
INSERT INTO `rosters` VALUES (378,46,0,0,0);
INSERT INTO `rosters` VALUES (380,44,0,0,0);
INSERT INTO `rosters` VALUES (381,48,0,0,0);
/*!40000 ALTER TABLE `rosters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `MatchID` int(11) NOT NULL,
  `Home1` int(11) NOT NULL,
  `Home2` int(11) NOT NULL,
  `Home3` int(11) NOT NULL,
  `Away1` int(11) NOT NULL,
  `Away2` int(11) NOT NULL,
  `Away3` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (1,19,22,0,21,23,0);
INSERT INTO `scores` VALUES (2,19,21,0,21,18,0);
INSERT INTO `scores` VALUES (3,17,10,0,21,21,0);
INSERT INTO `scores` VALUES (4,19,21,0,21,12,0);
INSERT INTO `scores` VALUES (5,21,11,0,15,21,0);
INSERT INTO `scores` VALUES (6,21,21,0,23,17,0);
INSERT INTO `scores` VALUES (7,21,17,0,12,21,0);
INSERT INTO `scores` VALUES (9,11,23,0,21,22,0);
INSERT INTO `scores` VALUES (15,21,19,0,15,21,0);
INSERT INTO `scores` VALUES (16,21,21,0,13,18,0);
INSERT INTO `scores` VALUES (17,7,21,0,21,12,0);
INSERT INTO `scores` VALUES (18,21,21,0,14,15,0);
INSERT INTO `scores` VALUES (19,21,21,0,17,18,0);
INSERT INTO `scores` VALUES (20,11,12,0,21,21,0);
INSERT INTO `scores` VALUES (21,21,22,0,15,23,0);
INSERT INTO `scores` VALUES (22,21,21,0,19,17,0);
INSERT INTO `scores` VALUES (23,21,21,0,13,17,0);
INSERT INTO `scores` VALUES (24,16,15,0,21,21,0);
INSERT INTO `scores` VALUES (25,13,22,0,21,23,0);
INSERT INTO `scores` VALUES (26,21,22,0,16,20,0);
INSERT INTO `scores` VALUES (27,20,0,0,25,0,0);
INSERT INTO `scores` VALUES (28,25,0,0,17,0,0);
INSERT INTO `scores` VALUES (29,20,0,0,25,0,0);
INSERT INTO `scores` VALUES (30,17,0,0,25,0,0);
INSERT INTO `scores` VALUES (31,25,0,0,22,0,0);
INSERT INTO `scores` VALUES (34,25,0,0,20,0,0);
INSERT INTO `scores` VALUES (33,20,0,0,25,0,0);
INSERT INTO `scores` VALUES (35,25,0,0,20,0,0);
INSERT INTO `scores` VALUES (36,25,0,0,14,0,0);
INSERT INTO `scores` VALUES (37,25,0,0,13,0,0);
INSERT INTO `scores` VALUES (42,12,16,0,21,21,0);
INSERT INTO `scores` VALUES (39,7,19,0,21,21,0);
INSERT INTO `scores` VALUES (43,18,0,0,21,0,0);
INSERT INTO `scores` VALUES (41,19,21,11,21,16,15);
INSERT INTO `scores` VALUES (44,23,20,11,22,22,15);
INSERT INTO `scores` VALUES (45,21,0,0,16,0,0);
INSERT INTO `scores` VALUES (46,14,0,0,21,0,0);
INSERT INTO `scores` VALUES (47,21,17,15,15,21,8);
INSERT INTO `scores` VALUES (48,25,0,0,17,0,0);
INSERT INTO `scores` VALUES (50,17,0,0,25,0,0);
INSERT INTO `scores` VALUES (51,16,0,0,25,0,0);
INSERT INTO `scores` VALUES (52,21,0,0,25,0,0);
INSERT INTO `scores` VALUES (53,25,0,0,22,0,0);
INSERT INTO `scores` VALUES (54,20,21,0,22,23,0);
INSERT INTO `scores` VALUES (55,15,19,0,21,21,0);
INSERT INTO `scores` VALUES (56,19,17,0,21,21,0);
INSERT INTO `scores` VALUES (58,17,21,0,21,19,0);
INSERT INTO `scores` VALUES (59,21,21,0,17,16,0);
INSERT INTO `scores` VALUES (60,8,8,0,21,21,0);
INSERT INTO `scores` VALUES (61,17,20,0,21,22,0);
INSERT INTO `scores` VALUES (62,21,15,0,18,21,0);
INSERT INTO `scores` VALUES (64,13,21,0,21,15,0);
INSERT INTO `scores` VALUES (65,21,21,0,11,16,0);
INSERT INTO `scores` VALUES (66,16,18,0,21,21,0);
INSERT INTO `scores` VALUES (67,21,22,0,14,20,0);
INSERT INTO `scores` VALUES (69,21,11,0,12,21,0);
INSERT INTO `scores` VALUES (70,17,21,0,21,12,0);
INSERT INTO `scores` VALUES (72,14,17,0,21,21,0);
INSERT INTO `scores` VALUES (73,25,0,0,4,0,0);
INSERT INTO `scores` VALUES (75,5,0,0,25,0,0);
INSERT INTO `scores` VALUES (77,25,0,0,15,0,0);
INSERT INTO `scores` VALUES (78,13,0,0,25,0,0);
INSERT INTO `scores` VALUES (80,15,0,0,25,0,0);
INSERT INTO `scores` VALUES (84,17,11,0,21,21,0);
INSERT INTO `scores` VALUES (83,21,21,0,14,17,0);
INSERT INTO `scores` VALUES (86,21,21,0,15,15,0);
INSERT INTO `scores` VALUES (87,21,21,0,15,11,0);
INSERT INTO `scores` VALUES (94,21,20,0,16,22,0);
INSERT INTO `scores` VALUES (89,21,11,0,16,21,0);
INSERT INTO `scores` VALUES (90,21,15,0,6,21,0);
INSERT INTO `scores` VALUES (91,15,21,0,21,15,0);
INSERT INTO `scores` VALUES (92,21,21,0,8,13,0);
INSERT INTO `scores` VALUES (93,19,18,0,21,21,0);
INSERT INTO `scores` VALUES (96,17,14,0,21,21,0);
INSERT INTO `scores` VALUES (97,13,12,0,21,21,0);
INSERT INTO `scores` VALUES (98,14,17,0,21,21,0);
INSERT INTO `scores` VALUES (100,21,21,0,10,14,0);
INSERT INTO `scores` VALUES (101,21,21,0,9,18,0);
INSERT INTO `scores` VALUES (103,16,21,0,21,8,0);
INSERT INTO `scores` VALUES (104,17,18,0,21,21,0);
INSERT INTO `scores` VALUES (105,21,21,0,12,16,0);
INSERT INTO `scores` VALUES (106,22,21,0,23,19,0);
INSERT INTO `scores` VALUES (107,19,23,0,21,22,0);
INSERT INTO `scores` VALUES (108,21,21,0,17,17,0);
INSERT INTO `scores` VALUES (110,21,15,0,18,21,0);
INSERT INTO `scores` VALUES (111,19,15,0,21,21,0);
INSERT INTO `scores` VALUES (113,21,19,0,19,21,0);
INSERT INTO `scores` VALUES (114,14,0,0,25,0,0);
INSERT INTO `scores` VALUES (115,18,0,0,25,0,0);
INSERT INTO `scores` VALUES (116,25,0,0,15,0,0);
INSERT INTO `scores` VALUES (117,25,0,0,20,0,0);
INSERT INTO `scores` VALUES (118,25,0,0,23,0,0);
INSERT INTO `scores` VALUES (120,25,0,0,12,0,0);
INSERT INTO `scores` VALUES (121,23,0,0,25,0,0);
INSERT INTO `scores` VALUES (122,25,0,0,16,0,0);
INSERT INTO `scores` VALUES (123,25,0,0,18,0,0);
INSERT INTO `scores` VALUES (124,25,0,0,22,0,0);
INSERT INTO `scores` VALUES (125,8,11,0,21,21,0);
INSERT INTO `scores` VALUES (126,19,21,0,21,18,0);
INSERT INTO `scores` VALUES (127,15,15,0,21,21,0);
INSERT INTO `scores` VALUES (128,21,21,0,14,15,0);
INSERT INTO `scores` VALUES (129,21,21,0,15,18,0);
INSERT INTO `scores` VALUES (139,21,18,15,13,21,8);
INSERT INTO `scores` VALUES (137,11,21,8,21,18,15);
INSERT INTO `scores` VALUES (140,21,21,0,19,18,0);
INSERT INTO `scores` VALUES (142,17,0,0,25,0,0);
INSERT INTO `scores` VALUES (143,16,21,8,21,18,15);
INSERT INTO `scores` VALUES (144,8,0,0,25,0,0);
INSERT INTO `scores` VALUES (145,25,0,0,23,0,0);
INSERT INTO `scores` VALUES (146,21,19,0,23,21,0);
INSERT INTO `scores` VALUES (147,25,0,0,20,0,0);
INSERT INTO `scores` VALUES (148,17,0,0,21,0,0);
INSERT INTO `scores` VALUES (150,21,0,0,18,0,0);
INSERT INTO `scores` VALUES (151,14,0,0,21,0,0);
INSERT INTO `scores` VALUES (152,13,0,0,21,0,0);
INSERT INTO `scores` VALUES (153,11,0,0,21,0,0);
INSERT INTO `scores` VALUES (154,21,0,0,17,0,0);
INSERT INTO `scores` VALUES (155,15,0,0,21,0,0);
INSERT INTO `scores` VALUES (156,11,0,0,21,0,0);
INSERT INTO `scores` VALUES (159,17,0,0,21,0,0);
INSERT INTO `scores` VALUES (160,21,0,0,14,0,0);
INSERT INTO `scores` VALUES (161,13,0,0,21,0,0);
INSERT INTO `scores` VALUES (163,19,0,0,21,0,0);
INSERT INTO `scores` VALUES (164,21,16,0,17,21,0);
INSERT INTO `scores` VALUES (166,21,16,0,18,21,0);
INSERT INTO `scores` VALUES (167,19,21,0,21,15,0);
INSERT INTO `scores` VALUES (168,21,21,0,19,13,0);
INSERT INTO `scores` VALUES (169,14,17,0,21,21,0);
INSERT INTO `scores` VALUES (170,21,23,0,13,22,0);
INSERT INTO `scores` VALUES (171,21,21,0,10,14,0);
INSERT INTO `scores` VALUES (173,13,11,0,21,21,0);
INSERT INTO `scores` VALUES (174,21,23,0,17,22,0);
INSERT INTO `scores` VALUES (175,21,19,0,17,21,0);
INSERT INTO `scores` VALUES (176,21,21,0,19,15,0);
INSERT INTO `scores` VALUES (177,15,22,0,21,20,0);
INSERT INTO `scores` VALUES (178,15,18,0,21,21,0);
INSERT INTO `scores` VALUES (180,15,21,0,21,13,0);
INSERT INTO `scores` VALUES (181,21,21,0,14,19,0);
INSERT INTO `scores` VALUES (182,10,18,0,21,21,0);
INSERT INTO `scores` VALUES (183,11,17,0,21,21,0);
INSERT INTO `scores` VALUES (184,21,21,0,19,4,0);
INSERT INTO `scores` VALUES (185,21,21,0,13,18,0);
INSERT INTO `scores` VALUES (186,19,21,0,21,12,0);
INSERT INTO `scores` VALUES (187,19,21,0,21,19,0);
INSERT INTO `scores` VALUES (188,21,21,0,14,10,0);
INSERT INTO `scores` VALUES (189,21,21,0,16,19,0);
INSERT INTO `scores` VALUES (190,21,21,0,14,17,0);
INSERT INTO `scores` VALUES (191,21,21,0,16,15,0);
INSERT INTO `scores` VALUES (192,16,21,0,21,14,0);
INSERT INTO `scores` VALUES (193,21,21,0,18,14,0);
INSERT INTO `scores` VALUES (194,12,21,0,21,19,0);
INSERT INTO `scores` VALUES (195,19,14,0,21,21,0);
INSERT INTO `scores` VALUES (196,14,20,0,21,22,0);
INSERT INTO `scores` VALUES (197,14,7,0,21,21,0);
INSERT INTO `scores` VALUES (198,11,10,0,21,21,0);
INSERT INTO `scores` VALUES (199,21,15,0,17,21,0);
INSERT INTO `scores` VALUES (200,21,14,0,19,21,0);
INSERT INTO `scores` VALUES (201,22,21,0,20,14,0);
INSERT INTO `scores` VALUES (202,17,21,0,21,12,0);
INSERT INTO `scores` VALUES (203,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (205,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (206,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (207,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (208,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (209,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (210,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (211,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (213,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (214,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (215,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (216,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (217,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (219,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (220,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (222,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (223,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (224,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (225,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (226,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (227,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (228,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (229,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (230,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (231,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (232,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (233,0,0,0,0,0,0);
INSERT INTO `scores` VALUES (234,24,10,0,26,12,0);
INSERT INTO `scores` VALUES (236,18,25,0,25,21,0);
INSERT INTO `scores` VALUES (237,22,21,0,23,16,0);
INSERT INTO `scores` VALUES (238,21,20,0,17,22,0);
INSERT INTO `scores` VALUES (239,11,19,0,21,21,0);
INSERT INTO `scores` VALUES (240,21,21,0,18,19,0);
INSERT INTO `scores` VALUES (241,21,22,0,19,20,0);
INSERT INTO `scores` VALUES (243,19,21,0,21,15,0);
INSERT INTO `scores` VALUES (245,21,19,0,19,15,0);
INSERT INTO `scores` VALUES (246,20,16,0,22,21,0);
INSERT INTO `scores` VALUES (247,16,18,0,25,25,0);
INSERT INTO `scores` VALUES (248,25,25,0,12,16,0);
INSERT INTO `scores` VALUES (249,25,8,0,23,25,0);
INSERT INTO `scores` VALUES (250,25,22,0,17,25,0);
INSERT INTO `scores` VALUES (251,13,21,0,21,19,0);
INSERT INTO `scores` VALUES (252,13,6,0,21,21,0);
INSERT INTO `scores` VALUES (253,15,21,0,21,16,0);
INSERT INTO `scores` VALUES (254,13,21,0,21,13,0);
INSERT INTO `scores` VALUES (255,21,21,0,19,15,0);
INSERT INTO `scores` VALUES (257,17,21,0,21,16,0);
INSERT INTO `scores` VALUES (259,11,22,0,21,20,0);
INSERT INTO `scores` VALUES (260,10,19,0,21,21,0);
INSERT INTO `scores` VALUES (261,25,25,0,10,18,0);
INSERT INTO `scores` VALUES (262,17,20,0,25,25,0);
INSERT INTO `scores` VALUES (263,17,17,0,25,25,0);
INSERT INTO `scores` VALUES (264,25,25,0,9,13,0);
INSERT INTO `scores` VALUES (265,21,21,0,14,11,0);
INSERT INTO `scores` VALUES (266,21,12,0,17,21,0);
INSERT INTO `scores` VALUES (267,18,21,0,21,14,0);
INSERT INTO `scores` VALUES (268,17,15,0,21,21,0);
INSERT INTO `scores` VALUES (269,21,21,0,16,16,0);
INSERT INTO `scores` VALUES (270,21,19,0,18,21,0);
INSERT INTO `scores` VALUES (271,21,21,0,14,17,0);
INSERT INTO `scores` VALUES (272,16,17,0,21,21,0);
INSERT INTO `scores` VALUES (273,13,12,0,21,21,0);
INSERT INTO `scores` VALUES (274,25,25,0,18,15,0);
INSERT INTO `scores` VALUES (275,24,8,0,26,25,0);
INSERT INTO `scores` VALUES (311,19,21,0,21,11,0);
INSERT INTO `scores` VALUES (278,15,17,0,21,21,0);
INSERT INTO `scores` VALUES (279,17,21,0,21,17,0);
INSERT INTO `scores` VALUES (281,21,21,0,14,18,0);
INSERT INTO `scores` VALUES (282,17,23,0,21,22,0);
INSERT INTO `scores` VALUES (284,21,22,0,17,20,0);
INSERT INTO `scores` VALUES (285,21,21,0,19,12,0);
INSERT INTO `scores` VALUES (286,21,21,0,19,16,0);
INSERT INTO `scores` VALUES (287,21,16,0,19,21,0);
INSERT INTO `scores` VALUES (288,14,11,0,21,21,0);
INSERT INTO `scores` VALUES (289,21,15,0,15,21,0);
INSERT INTO `scores` VALUES (291,21,21,0,19,14,0);
INSERT INTO `scores` VALUES (292,10,16,0,21,21,0);
INSERT INTO `scores` VALUES (293,18,10,0,21,21,0);
INSERT INTO `scores` VALUES (294,15,21,0,21,18,0);
INSERT INTO `scores` VALUES (295,21,21,0,16,19,0);
INSERT INTO `scores` VALUES (296,16,19,0,21,21,0);
INSERT INTO `scores` VALUES (297,21,21,0,12,19,0);
INSERT INTO `scores` VALUES (298,14,21,0,21,18,0);
INSERT INTO `scores` VALUES (299,23,21,0,22,15,0);
INSERT INTO `scores` VALUES (300,21,21,0,12,14,0);
INSERT INTO `scores` VALUES (301,21,14,0,19,21,0);
INSERT INTO `scores` VALUES (303,21,22,0,23,20,0);
INSERT INTO `scores` VALUES (304,14,21,0,21,19,0);
INSERT INTO `scores` VALUES (306,13,16,0,21,21,0);
INSERT INTO `scores` VALUES (313,23,21,0,21,16,0);
INSERT INTO `scores` VALUES (312,15,9,0,21,21,0);
INSERT INTO `scores` VALUES (314,21,15,0,14,21,0);
INSERT INTO `scores` VALUES (315,21,18,0,19,21,0);
INSERT INTO `scores` VALUES (317,21,21,0,19,15,0);
INSERT INTO `scores` VALUES (319,16,13,0,21,21,0);
INSERT INTO `scores` VALUES (320,21,21,0,19,17,0);
INSERT INTO `scores` VALUES (321,17,15,0,21,21,0);
INSERT INTO `scores` VALUES (323,21,21,0,5,10,0);
INSERT INTO `scores` VALUES (324,22,23,0,23,22,0);
INSERT INTO `scores` VALUES (325,22,22,0,23,23,0);
INSERT INTO `scores` VALUES (326,22,22,0,23,23,0);
INSERT INTO `scores` VALUES (327,23,22,0,22,23,0);
INSERT INTO `scores` VALUES (328,23,22,0,22,23,0);
INSERT INTO `scores` VALUES (329,19,19,0,21,21,0);
INSERT INTO `scores` VALUES (330,11,12,0,21,21,0);
INSERT INTO `scores` VALUES (331,16,17,0,21,21,0);
INSERT INTO `scores` VALUES (333,19,21,0,21,18,0);
INSERT INTO `scores` VALUES (335,17,21,0,21,14,0);
INSERT INTO `scores` VALUES (336,21,22,0,17,23,0);
INSERT INTO `scores` VALUES (338,11,21,0,21,14,0);
INSERT INTO `scores` VALUES (339,17,21,0,21,12,0);
INSERT INTO `scores` VALUES (340,17,11,0,21,21,0);
INSERT INTO `scores` VALUES (341,21,21,0,18,10,0);
INSERT INTO `scores` VALUES (343,22,22,0,23,23,0);
INSERT INTO `scores` VALUES (345,12,21,0,21,18,0);
INSERT INTO `scores` VALUES (346,21,17,0,9,21,0);
INSERT INTO `scores` VALUES (347,12,13,0,21,21,0);
INSERT INTO `scores` VALUES (348,22,22,0,23,23,0);
INSERT INTO `scores` VALUES (349,21,23,0,18,21,0);
INSERT INTO `scores` VALUES (351,21,21,0,16,8,0);
INSERT INTO `scores` VALUES (352,14,21,0,21,14,0);
INSERT INTO `scores` VALUES (353,12,21,0,21,9,0);
INSERT INTO `scores` VALUES (354,18,18,0,21,21,0);
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seasons` (
  `ID` int(11) NOT NULL auto_increment,
  `Name` varchar(50) NOT NULL,
  `FreeWeek` varchar(100) NOT NULL,
  `Divisions` int(11) default '1',
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seasons`
--

LOCK TABLES `seasons` WRITE;
/*!40000 ALTER TABLE `seasons` DISABLE KEYS */;
INSERT INTO `seasons` VALUES (1,'Spring 2013','',1);
INSERT INTO `seasons` VALUES (2,'Fall 2013','',1);
INSERT INTO `seasons` VALUES (3,'Spring 2014','',1);
INSERT INTO `seasons` VALUES (5,'Fall 2014','',1);
INSERT INTO `seasons` VALUES (6,'Spring 2015','',2);
INSERT INTO `seasons` VALUES (7,'Fall 2015','September 20 & 27',1);
INSERT INTO `seasons` VALUES (8,'Spring 2016','January 24',1);
/*!40000 ALTER TABLE `seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `ID` int(11) NOT NULL auto_increment,
  `Name` varchar(50) NOT NULL,
  `Data_Theme` varchar(2) NOT NULL,
  `Season` int(11) NOT NULL,
  `Division` int(11) NOT NULL,
  `Wins` int(11) NOT NULL,
  `Loss` int(11) NOT NULL,
  `Spread` int(11) NOT NULL,
  `PWin` double NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Wolfpack','j',1,0,14,9,16,0.60869565217391);
INSERT INTO `teams` VALUES (2,'Da Graze','i',1,0,19,10,53,0.6551724137931);
INSERT INTO `teams` VALUES (3,'Vitamin C','c',1,0,14,14,4,0.5);
INSERT INTO `teams` VALUES (4,'Big Digs','e',1,0,16,13,22,0.55172413793103);
INSERT INTO `teams` VALUES (5,'Sloppy Sets','a',1,0,3,20,-95,0.1304347826087);
INSERT INTO `teams` VALUES (9,'Justice League of America','a',2,0,6,10,-11,0.375);
INSERT INTO `teams` VALUES (10,'Passionate Sets','f',2,0,3,11,-53,0.21428571428571);
INSERT INTO `teams` VALUES (11,'Liquid Hustle','k',2,0,15,1,62,0.9375);
INSERT INTO `teams` VALUES (12,'Wrecking Balls','j',2,0,9,5,34,0.64285714285714);
INSERT INTO `teams` VALUES (15,'What does the Fox say?','b',2,0,5,11,-32,0.3125);
INSERT INTO `teams` VALUES (16,'Alpha Q','j',3,0,8,16,-46,0.33333333333333);
INSERT INTO `teams` VALUES (17,'Taste the Rainbow','f',3,0,21,3,136,0.875);
INSERT INTO `teams` VALUES (18,'Pocket Monsters','g',3,0,7,17,-68,0.29166666666667);
INSERT INTO `teams` VALUES (19,'Naughty Piners','h',3,0,12,12,-13,0.5);
INSERT INTO `teams` VALUES (20,'Pure Energy','b',3,0,12,12,-9,0.5);
INSERT INTO `teams` VALUES (22,'Ace Down, Pass up','b',5,0,9,9,0,0.5);
INSERT INTO `teams` VALUES (23,'Killer Beyzzzz','c',5,0,9,9,21,0.5);
INSERT INTO `teams` VALUES (24,'Domdiggerz','d',5,0,8,10,-14,0.44444444444444);
INSERT INTO `teams` VALUES (25,'Digging Divas','g',5,0,7,11,-29,0.38888888888889);
INSERT INTO `teams` VALUES (26,'Served Hot','a',5,0,11,7,2,0.61111111111111);
INSERT INTO `teams` VALUES (27,'Aqua-scuse Me?','k',5,0,9,9,-4,0.5);
INSERT INTO `teams` VALUES (28,'Hips Don\'t Lie','h',5,0,10,8,4,0.55555555555556);
INSERT INTO `teams` VALUES (29,'Olivia Pope & Associates','j',5,0,9,9,20,0.5);
INSERT INTO `teams` VALUES (30,'PASSive Aggressive','a',6,0,11,9,18,0.55);
INSERT INTO `teams` VALUES (31,'Joy of Sets','b',6,0,10,10,4,0.5);
INSERT INTO `teams` VALUES (32,'Black Widows','d',6,0,13,7,48,0.65);
INSERT INTO `teams` VALUES (33,'I WANT YOUR SETS','e',6,0,9,11,-8,0.45);
INSERT INTO `teams` VALUES (34,'Flaming Heart-ons','f',6,0,7,13,-62,0.35);
INSERT INTO `teams` VALUES (35,'Ummm It\'s a Hard Pass','g',6,1,10,6,82,0.625);
INSERT INTO `teams` VALUES (36,'Felicia\'s Travel Agency','h',6,1,3,13,-114,0.1875);
INSERT INTO `teams` VALUES (37,'Leave it, It\'s Beaver','j',6,1,11,5,32,0.6875);
INSERT INTO `teams` VALUES (38,'Spike Girls','a',7,0,6,10,-29,0.375);
INSERT INTO `teams` VALUES (39,'Ace the Rainbow','b',7,0,10,6,20,0.625);
INSERT INTO `teams` VALUES (40,'BOOMSHAKALAKA','c',7,0,7,9,-25,0.4375);
INSERT INTO `teams` VALUES (41,'TriceraTOPS','d',7,0,8,8,8,0.5);
INSERT INTO `teams` VALUES (42,'1-900-SETS-4NOW','e',7,0,12,4,46,0.75);
INSERT INTO `teams` VALUES (43,'F-Ugh This!','f',7,0,5,11,-20,0.3125);
INSERT INTO `teams` VALUES (44,'The Marvel-Us Nine','a',8,0,17,11,72,0.60714285714286);
INSERT INTO `teams` VALUES (45,'Shade Throwers','b',8,0,16,12,3,0.57142857142857);
INSERT INTO `teams` VALUES (46,'International Sets Appeal','c',8,0,10,18,-88,0.35714285714286);
INSERT INTO `teams` VALUES (47,'Killer Aces','d',8,0,13,15,-5,0.46428571428571);
INSERT INTO `teams` VALUES (48,'New Weave','e',8,0,14,14,18,0.5);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weeks`
--

DROP TABLE IF EXISTS `weeks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weeks` (
  `ID` int(11) NOT NULL auto_increment,
  `weekNum` int(11) NOT NULL,
  `seasonNum` int(11) NOT NULL,
  `dateName` varchar(20) NOT NULL,
  `weekNotes` varchar(1000) NOT NULL,
  `scrim` tinyint(4) NOT NULL,
  `Extra1` varchar(200) default NULL,
  `Extra2` varchar(200) default NULL,
  `ExtraStartTime` time default '17:15:00',
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weeks`
--

LOCK TABLES `weeks` WRITE;
/*!40000 ALTER TABLE `weeks` DISABLE KEYS */;
INSERT INTO `weeks` VALUES (1,2,2,'September 22','Games tonight will be 1 set to 25 (cap at 27) and will not count towards season standings.',1,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (2,3,2,'September 29','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (3,5,2,'October 13','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (4,6,2,'October 20','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (5,7,2,'November 3','Games tonight will be 1 set to 25 (cap at 27) and will not count towards season standings.',1,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (6,8,2,'November 10','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (7,4,2,'October 6','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (8,9,2,'November 17','Single Elimination Tournament.  Winner bracket matches are best of 3, first two sets to 21 cap at 23.  If third set needed, 15 with no cap.',1,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (9,2,1,'May 2','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (10,3,1,'May 9','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (11,4,1,'May 16','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (12,5,1,'May 23','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (13,6,1,'May 30','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (14,7,1,'June 6','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (16,2,3,'February 9','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (17,3,3,'February 16','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (18,4,3,'February 23','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (19,5,3,'March 2','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (20,6,3,'March 9','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (21,7,3,'March 23','',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (22,8,3,'March 30','Team Lex\'ers,\r\n\r\nJoin us tonight at BVC to celebrate the UK Men\'s Basketball team making the Elite 8!  Starting at 5pm watch the game upstairs on BVC\'s flat screens, grab a beer, share a pizza, and cheer on our Cats with Team Lex!\r\n\r\nOur regularly scheduled league matches have been cancelled, but for $5 enjoy open play all night.  So stick around after the game and get your Sunday night volleyball on!',0,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (23,9,3,'April 13','<a href=\"https://www.dropbox.com/s/yupcrhl0lrz1r3t/TLVB%20Spring%202014%20Tournament.pdf\">Double Elimination Tournament</a>  Winner bracket matches are best of 3, first two sets to 21 cap at 23.  If third set needed, 15 with no cap.  Loser bracket match is 1 set to 21 with no cap.',1,NULL,NULL,'17:15:00');
INSERT INTO `weeks` VALUES (24,1,5,'September 14','Games this week will be one set to 21 cap 23 and will not count towards your season record.',1,'Skills Clinic: How to Warm Up and Position on the Court','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (25,2,5,'September 21','',0,'Skills Clinic: Passing, Covering the Court, Serving','<a href=\"https://www.dropbox.com/s/21i4nn70on4obuy/TLVBF14Comp.pdf?dl=0\">Pilot Competitive Division</a>','17:15:00');
INSERT INTO `weeks` VALUES (26,3,5,'September 28','',0,'Skills Clinic: Forearm Pass, Overhand Set','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (27,4,5,'October 5','',0,'Skills Clinic: Attack Drills, Standing Attack','<a href=\"https://www.dropbox.com/s/21i4nn70on4obuy/TLVBF14Comp.pdf?dl=0\">Pilot Competitive Division</a>','17:15:00');
INSERT INTO `weeks` VALUES (28,5,5,'October 12','',0,'Skills Clinic: Attack Drills, Footwork, Moving between Offense and Defense','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (29,6,5,'October 19','Join us at 5pm at BVC for pictures with your teammates and tie dying our Fall 2014 t-shirts!',0,'Open Play','<a href=\"https://www.dropbox.com/s/21i4nn70on4obuy/TLVBF14Comp.pdf?dl=0\">Pilot Competitive Division</a>','17:15:00');
INSERT INTO `weeks` VALUES (30,7,5,'November 2','',0,'Skills Clinic: Offensive Systems (4-2, 5-1, 6-2), How When and Why to \"Stack\"','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (31,8,5,'November 9','<a href=\"https://www.dropbox.com/s/yp7d1y163o6hz4l/F14tournament.pdf?dl=0\">Double Elimination Tournament</a> begins at 5:45pm. Winner bracket matches are best of 3, first two sets to 21 cap at 23. If third set needed, 15 with no cap. Loser bracket match is 1 set to 21 with no cap.	',1,'Open Play','<a href=\"https://www.dropbox.com/s/21i4nn70on4obuy/TLVBF14Comp.pdf?dl=0\">Pilot Competitive Division</a>','17:15:00');
INSERT INTO `weeks` VALUES (32,9,5,'November 16','<a href=\"https://www.dropbox.com/s/yp7d1y163o6hz4l/F14tournament.pdf?dl=0\">Double Elimination Tournament</a> begins at <b>5:15pm</b>.  Winner bracket matches are best of 3, first two sets to 21 cap at 23. If third set needed, 15 with no cap.  Loser bracket match is 1 set to 21 with no cap.',1,'','','17:15:00');
INSERT INTO `weeks` VALUES (33,1,6,'January 25','Rec division matches are 1 set to 15<br>\r\nComp division matches are 1 set to 30',1,'','','00:00:00');
INSERT INTO `weeks` VALUES (34,2,6,'February 1','Rec matches are 2 sets to 21, cap 23<br>\r\nComp matches are 2 sets to 25, cap 27',0,'Skills Clinic: Passing Fundamentals','Open Play','18:35:00');
INSERT INTO `weeks` VALUES (35,3,6,'February 8','Rec matches are 2 sets to 21, cap 23<br>\r\nComp matches are 2 sets to 25, cap 27',0,'Skills Clinic: Serving and Serve Receive','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (36,4,6,'February 15','Rec matches are 2 sets to 21, cap 23<br>\r\nComp matches are 2 sets to 25, cap 27',0,'Skills Clinic: Attacking','Open Play','18:35:00');
INSERT INTO `weeks` VALUES (37,5,6,'February 22','Rec matches are 2 sets to 21, cap 23<br>\r\nComp matches are 2 sets to 25, cap 27',0,'Skills Clinic: Setting','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (38,6,6,'March 1','Rec matches are 2 sets to 21, cap 23<br>\r\nComp matches are 2 sets to 25, cap 27',0,'Skills Clinic: Defense Systems, Off the Net Transition','Open Play','18:35:00');
INSERT INTO `weeks` VALUES (39,7,6,'March 8','Rec matches are 2 sets to 21, cap 23<br>\r\nComp matches are 2 sets to 25, cap 27',0,'','','00:00:00');
INSERT INTO `weeks` VALUES (40,8,6,'March 15','<h3>Rec Division Double Elimination Tournament begins at 5:15pm.</h3> <a href=\"https://www.dropbox.com/s/ct733tvlc212ih9/S15Brackets.pdf?dl=0\" target=_blank>Tournament Bracket</a><br><br>Winner bracket matches are best of 3, first two sets to 21 cap at 23. If third set needed, 15 with no cap. Loser bracket match is 1 set to 21 with no cap.	',1,'','','00:00:00');
INSERT INTO `weeks` VALUES (41,9,6,'March 22','<h3>Comp Division Double Elimination Tournament begins at 5:15pm.</h3> \r\n<a href=\"https://www.dropbox.com/s/ct733tvlc212ih9/S15Brackets.pdf?dl=0\" target=_blank>Tournament Bracket</a><br><br>Winner bracket matches are best of 3, first two sets to 25 cap at 27. If third set needed, 15 with no cap. Loser bracket match is 1 set to 25 with no cap.	',1,'','','00:00:00');
INSERT INTO `weeks` VALUES (42,1,7,'October 4','',0,'Skill Clinic: Fundamentals of Passing','Competitive Open Play','18:30:00');
INSERT INTO `weeks` VALUES (43,2,7,'October 11','',0,'All Level Open Play','Competitive Open Play','18:30:00');
INSERT INTO `weeks` VALUES (44,3,7,'October 18','',0,'Skills Clinic: Setting and Attacking','Competitive Open Play','18:30:00');
INSERT INTO `weeks` VALUES (45,4,7,'November 1','',0,'All Level Open Play','Competitive Open Play','18:30:00');
INSERT INTO `weeks` VALUES (46,5,7,'November 8','',0,'Skills Clinic: Defense and Offense Systems','Competitive Open Play','18:30:00');
INSERT INTO `weeks` VALUES (47,6,7,'November 15','',0,'All Level Open Play','Competitive Open Play','18:30:00');
INSERT INTO `weeks` VALUES (48,7,7,'November 22','<h3>Team Pictures and Turkey Tussle Scrimmage Tournament (all teams will have a double header)</h3>',1,'','','00:00:00');
INSERT INTO `weeks` VALUES (49,8,7,'December 6','<h3>Single Elimination Tournament</h3>\r\n<h4><a href=\"https://www.dropbox.com/s/eczod0d08ilvo3c/F15Bracket.pdf?dl=0\" target=_blank>Tournament Bracket</a></h4>\r\nWinner bracket matches are best of 3, first two sets to 21 cap at 23. If third set needed, 15 with no cap.',1,'','','00:00:00');
INSERT INTO `weeks` VALUES (50,1,8,'January 31','Matches are 2 sets to 21, cap 23.  Teams scheduled to referee are responsible for both matches and must provide two up-refs and four line judges split between the two courts. Remaining players may be used for score keeping or substitutes as needed. Substitutes may only be used when a competing team has less than six players in attendance.',0,'Skills Clinic: How to Warm Up and Court Position','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (51,2,8,'February 7','Matches are 2 sets to 21, cap 23. Teams scheduled to referee are responsible for both matches and must provide two up-refs and four line judges split between the two courts. Remaining players may be used for score keeping or substitutes as needed. Substitutes may only be used when a competing team has less than six players in attendance. ',0,'Skills Clinic','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (52,3,8,'February 14','No matches this week. Contact the Bluegrass Volleyball Center for open play availability.',0,'','','00:00:00');
INSERT INTO `weeks` VALUES (53,4,8,'February 21','Matches are 2 sets to 21, cap 23. Teams scheduled to referee are responsible for both matches and must provide two up-refs and four line judges split between the two courts. Remaining players may be used for score keeping or substitutes as needed. Substitutes may only be used when a competing team has less than six players in attendance. ',0,'Skills Clinic','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (54,5,8,'February 28','Matches are 2 sets to 21, cap 23. Teams scheduled to referee are responsible for both matches and must provide two up-refs and four line judges split between the two courts. Remaining players may be used for score keeping or substitutes as needed. Substitutes may only be used when a competing team has less than six players in attendance. ',0,'Skills Clinic','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (55,6,8,'March 6','Matches are 2 sets to 21, cap 23. Teams scheduled to referee are responsible for both matches and must provide two up-refs and four line judges split between the two courts. Remaining players may be used for score keeping or substitutes as needed. Substitutes may only be used when a competing team has less than six players in attendance. ',0,'Skills Clinic','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (56,7,8,'March 13','No matches this week. Contact the Bluegrass Volleyball Center for open play availability.',0,'','','00:00:00');
INSERT INTO `weeks` VALUES (57,8,8,'March 20','Matches are 2 sets to 21, cap 23. Teams scheduled to referee are responsible for both matches and must provide two up-refs and four line judges split between the two courts. Remaining players may be used for score keeping or substitutes as needed. Substitutes may only be used when a competing team has less than six players in attendance. ',0,'Skills Clinic','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (58,9,8,'March 27','No matches this week. Contact the Bluegrass Volleyball Center for open play availability.',0,'','','00:00:00');
INSERT INTO `weeks` VALUES (59,10,8,'April 3','Matches are 2 sets to 21, cap 23. Teams scheduled to referee are responsible for both matches and must provide two up-refs and four line judges split between the two courts. Remaining players may be used for score keeping or substitutes as needed. Substitutes may only be used when a competing team has less than six players in attendance. ',0,'Skills Clinic','Open Play','17:15:00');
INSERT INTO `weeks` VALUES (60,11,8,'April 10','End of Season Tournament',0,'','','17:15:00');
/*!40000 ALTER TABLE `weeks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-18  6:05:10
