-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 18, 2024 at 08:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `marathon`
--

CREATE TABLE `marathon` (
  `MarathonID` int(11) NOT NULL,
  `RaceName` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `ImagePath` varchar(255) NOT NULL DEFAULT '../admin/assets/img/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marathon`
--

INSERT INTO `marathon` (`MarathonID`, `RaceName`, `Date`, `ImagePath`) VALUES
(2, 'Hanoi Marathon 1', '2024-12-16', '../admin/assets/img/1.jpg'),
(123, 'Hanoi Marathon', '2024-12-25', '../admin/assets/img/2.jpg'),
(31231, 'Hanoi Marathon 21', '2024-12-18', '../admin/assets/img/default.jpg'),
(124215, 'Hanoi Autumn Marathon', '2024-01-15', '../admin/assets/img/3.jpg'),
(124216, 'Hanoi Spring Marathon', '2024-03-20', '../admin/assets/img/4.jpg'),
(124217, 'Hanoi Charity Run', '2024-05-10', '../admin/assets/img/5.jpg'),
(124218, 'Hanoi International Challenge', '2024-06-18', '../admin/assets/img/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `BestRecord` time DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `PassportNO` varchar(50) DEFAULT NULL,
  `Sex` enum('Male','Female','Other') DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`UserID`, `Name`, `BestRecord`, `Nationality`, `PassportNO`, `Sex`, `Age`, `Email`, `Phone`, `Address`) VALUES
(5, 'Nam', '12:20:20', '123', '213213', 'Male', 18, 'lenam20092003@gmail.com', '0866030920', '1'),
(6, 'Mai Anh', '00:00:00', '', '', 'Male', 0, '', '', ''),
(10, 'Nguyen Thi Mai Anh', '01:20:30', 'Vietnam', '2183127', 'Female', 20, '22110103@st.vju.ac.vn', '0866030920', 'Hanoi'),
(11, 'Melvin McKechnie', '01:20:30', 'Philippines', '2', 'Male', 29, 'mmckechnie1@cnn.com', '4176444618', '877 Pine View Junction'),
(12, 'Elbertine Umpleby', '01:20:30', 'Indonesia', '79', 'Female', 42, 'eumpleby2@dropbox.com', '6502409223', '7195 Maryland Crossing'),
(13, 'Kesley Origin', '01:20:30', 'Philippines', '21', 'Female', 99, 'korigin3@shop-pro.jp', '4035739508', '40 Bayside Place'),
(14, 'Nadya Kayser', '01:20:30', 'China', '10', 'Female', 59, 'nkayser4@mlb.com', '5905233067', '11132 Sage Lane'),
(15, 'Danya Mc Corley', '01:20:30', 'Canada', '4', 'Female', 79, 'dmc5@who.int', '2886037639', '8 Mayfield Alley'),
(16, 'Anderea Sotheron', '01:20:30', 'China', '83', 'Female', 25, 'asotheron6@macromedia.com', '6875673432', '69740 Twin Pines Plaza'),
(17, 'Earlie Paton', '01:20:30', 'Peru', '75', 'Male', 36, 'epaton7@tamu.edu', '3857038134', '0147 Schmedeman Pass'),
(18, 'Darline Madison', '01:20:30', 'Philippines', '78', 'Female', 54, 'dmadison8@reddit.com', '9428334421', '154 Crowley Way'),
(19, 'Whittaker Kubas', '01:20:30', 'Argentina', '87', 'Male', 55, 'wkubas9@craigslist.org', '5915877957', '2 Holy Cross Way'),
(20, 'Drusy Dmitr', '01:20:30', 'Mexico', '83', 'Female', 79, 'ddmitra@hhs.gov', '6734703392', '44327 Northport Terrace'),
(21, 'Natassia Ballard', '01:20:30', 'China', '41', 'Female', 50, 'nballardb@quantcast.com', '5823231238', '8 Ludington Hill'),
(22, 'Elliott Traill', '01:20:30', 'Indonesia', '76', 'Male', 53, 'etraillc@goo.gl', '6031802595', '98801 Fisk Center'),
(23, 'Valera Calderhead', '01:20:30', 'Mexico', '2', 'Female', 47, 'vcalderheadd@chicagotribune.com', '1622955577', '04879 Mariners Cove Street'),
(24, 'Isidora Helder', '01:20:30', 'Norway', '97', 'Female', 33, 'iheldere@about.me', '4586710029', '1 Blackbird Alley'),
(25, 'Ashlin Denson', '01:20:30', 'Albania', '56', 'Male', 96, 'adensonf@cdc.gov', '3776558205', '8515 Prairieview Road'),
(26, 'Geoffry Van Der Vlies', '01:20:30', 'Greece', '17', 'Male', 72, 'gvang@google.fr', '9059244486', '21 Mcguire Parkway'),
(27, 'Hobart Mar', '01:20:30', 'Dominican Republic', '24', 'Male', 40, 'hmarh@gizmodo.com', '9215221816', '89 Tony Lane'),
(28, 'Melonie Stenton', '01:20:30', 'France', '21', 'Female', 92, 'mstentoni@samsung.com', '1441364725', '95 Pierstorff Center'),
(29, 'Daisi Baden', '01:20:30', 'Russia', '99', 'Female', 37, 'dbadenj@chronoengine.com', '4056675606', '5 Hoepker Center'),
(30, 'Arleyne Rizzolo', '01:20:30', 'Brazil', '16', 'Female', 94, 'arizzolok@ihg.com', '3244761826', '89 Westerfield Plaza'),
(31, 'Eleanore Lesek', '01:20:30', 'Hungary', '88', 'Female', 26, 'elesekl@rakuten.co.jp', '6107519604', '304 Sheridan Parkway'),
(32, 'Alexandr Bartosch', '01:20:30', 'Indonesia', '38', 'Male', 37, 'abartoschm@seattletimes.com', '5924919106', '877 Sundown Terrace'),
(33, 'Klement Daborne', '01:20:30', 'Argentina', '22', 'Male', 81, 'kdabornen@wix.com', '2238860818', '5114 Nobel Parkway'),
(34, 'Wilone Bumphries', '01:20:30', 'Palestinian Territory', '59', 'Female', 20, 'wbumphrieso@bbc.co.uk', '5955660377', '586 Randy Street'),
(35, 'Keeley Alexsandrovich', '01:20:30', 'Russia', '18', 'Female', 69, 'kalexsandrovichp@vkontakte.ru', '2733262380', '447 Morrow Parkway'),
(36, 'Delphinia Hubach', '01:20:30', 'China', '66', 'Female', 21, 'dhubachq@reference.com', '6428354585', '25 Prairieview Place'),
(37, 'Matthaeus Pavlasek', '01:20:30', 'Colombia', '55', 'Male', 88, 'mpavlasekr@cam.ac.uk', '7197361437', '3 Old Gate Park'),
(38, 'Diannne MacGowing', '01:20:30', 'Indonesia', '70', 'Female', 54, 'dmacgowings@ameblo.jp', '1244708762', '3276 Westend Way'),
(39, 'Caterina Poure', '01:20:30', 'Indonesia', '56', 'Female', 37, 'cpouret@simplemachines.org', '6377437323', '1 Mandrake Point'),
(40, 'Early Wheeler', '01:20:30', 'China', '16', 'Male', 68, 'ewheeleru@linkedin.com', '7899088241', '9 Manufacturers Center'),
(41, 'Juanita Saffer', '01:20:30', 'Russia', '72', 'Female', 49, 'jsafferv@goo.gl', '1129906658', '79886 Crescent Oaks Place'),
(42, 'Luci Epton', '01:20:30', 'China', '27', 'Female', 47, 'leptonw@g.co', '4288088965', '18865 Golden Leaf Trail'),
(43, 'Jany Carlesi', '01:20:30', 'Lesotho', '98', 'Female', 26, 'jcarlesix@cmu.edu', '2968678722', '9484 6th Way'),
(44, 'Lori Blenkinsopp', '01:20:30', 'Afghanistan', '51', 'Female', 33, 'lblenkinsoppy@nba.com', '2762911200', '450 Bonner Court'),
(45, 'Kate Ithell', '01:20:30', 'South Africa', '27', 'Female', 92, 'kithellz@engadget.com', '3066095245', '3504 Heffernan Alley'),
(46, 'Trudie Kirkam', '01:20:30', 'Colombia', '30', 'Female', 78, 'tkirkam10@godaddy.com', '3158675479', '979 Darwin Crossing'),
(47, 'Bette Satch', '01:20:30', 'Mexico', '40', 'Female', 57, 'bsatch11@furl.net', '6606808483', '5213 Bartelt Place'),
(48, 'Brandy Franklen', '01:20:30', 'Philippines', '90', 'Male', 88, 'bfranklen12@soup.io', '4392539363', '2 Randy Terrace'),
(49, 'Laurent Lunge', '01:20:30', 'Czech Republic', '6', 'Male', 76, 'llunge13@tumblr.com', '9916214347', '6 Novick Point'),
(50, 'Henri Seyers', '01:20:30', 'Latvia', '82', 'Male', 34, 'hseyers14@list-manage.com', '2632891682', '51634 Mendota Place'),
(51, 'Bonita Pinilla', '01:20:30', 'Argentina', '91', 'Female', 27, 'bpinilla15@reuters.com', '5372490290', '61475 Reinke Place'),
(52, 'Jacenta Jickles', '01:20:30', 'Norway', '17', 'Female', 27, 'jjickles16@rambler.ru', '9331866626', '59956 Lakeland Center'),
(53, 'Shepard Meany', '01:20:30', 'Russia', '38', 'Male', 41, 'smeany17@narod.ru', '1621144930', '533 Vahlen Place'),
(54, 'Ketti Caillou', '01:20:30', 'Ireland', '85', 'Female', 70, 'kcaillou18@tuttocitta.it', '1876838106', '7 Graceland Lane'),
(55, 'Gordie Crowder', '01:20:30', 'Philippines', '39', 'Male', 34, 'gcrowder19@gov.uk', '5322347248', '9285 Canary Lane'),
(56, 'Marni Yakunchikov', '01:20:30', 'Ukraine', '20', 'Female', 56, 'myakunchikov1a@topsy.com', '5614504828', '22892 Loomis Circle'),
(57, 'Markos O\'Scannill', '01:20:30', 'Vietnam', '78', 'Male', 88, 'moscannill1b@blogger.com', '5811548734', '84 Kenwood Court'),
(58, 'Simmonds Alexandersen', '01:20:30', 'Indonesia', '85', 'Male', 90, 'salexandersen1c@usgs.gov', '1314990823', '254 Independence Terrace'),
(59, 'Elise Delacourt', '01:20:30', 'Philippines', '93', 'Female', 77, 'edelacourt1d@fastcompany.com', '4553701507', '3906 Nelson Circle'),
(60, 'Lennard Phelps', '01:20:30', 'Mexico', '20', 'Male', 77, 'lphelps1e@bravesites.com', '5362957218', '7151 Bunting Hill');

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

CREATE TABLE `participate` (
  `MarathonID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EntryNO` int(11) NOT NULL,
  `Hotel` varchar(255) DEFAULT NULL,
  `TimeRecord` time DEFAULT NULL,
  `Standings` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participate`
--

INSERT INTO `participate` (`MarathonID`, `UserID`, `EntryNO`, `Hotel`, `TimeRecord`, `Standings`) VALUES
(123, 10, 1, NULL, '01:30:20', '1'),
(124215, 10, 1, NULL, '01:20:30', '2'),
(124215, 15, 6, NULL, '01:20:31', '3'),
(124215, 20, 11, NULL, '01:20:32', '4'),
(124215, 22, 13, NULL, '01:20:33', '5'),
(124215, 26, 17, NULL, '01:20:34', '6'),
(124215, 32, 23, NULL, '01:20:35', '7'),
(124215, 35, 26, NULL, '01:20:36', '8'),
(124215, 37, 28, NULL, '01:20:37', '9'),
(124215, 41, 32, NULL, '01:20:38', '10'),
(124215, 42, 33, NULL, '01:20:39', '11'),
(124215, 45, 36, NULL, '01:20:40', '12'),
(124215, 50, 41, NULL, '01:20:41', '13'),
(124215, 56, 47, NULL, '01:20:52', '14'),
(124215, 59, 50, NULL, '01:20:21', '1'),
(124216, 11, 2, NULL, NULL, NULL),
(124216, 14, 5, NULL, NULL, NULL),
(124216, 16, 7, NULL, NULL, NULL),
(124216, 24, 15, NULL, NULL, NULL),
(124216, 30, 21, NULL, NULL, NULL),
(124216, 34, 25, NULL, NULL, NULL),
(124216, 38, 29, NULL, NULL, NULL),
(124216, 43, 34, NULL, NULL, NULL),
(124216, 47, 38, NULL, NULL, NULL),
(124216, 54, 45, NULL, NULL, NULL),
(124216, 57, 48, NULL, NULL, NULL),
(124216, 58, 49, NULL, NULL, NULL),
(124217, 23, 14, NULL, NULL, NULL),
(124217, 27, 18, NULL, NULL, NULL),
(124217, 28, 19, NULL, NULL, NULL),
(124217, 29, 20, NULL, NULL, NULL),
(124217, 31, 22, NULL, NULL, NULL),
(124217, 40, 31, NULL, NULL, NULL),
(124217, 48, 39, NULL, NULL, NULL),
(124217, 49, 40, NULL, NULL, NULL),
(124217, 52, 43, NULL, NULL, NULL),
(124217, 55, 46, NULL, NULL, NULL),
(124217, 60, 51, NULL, NULL, NULL),
(124218, 12, 3, NULL, NULL, NULL),
(124218, 13, 4, NULL, NULL, NULL),
(124218, 17, 8, NULL, NULL, NULL),
(124218, 18, 9, NULL, NULL, NULL),
(124218, 19, 10, NULL, NULL, NULL),
(124218, 21, 12, NULL, NULL, NULL),
(124218, 25, 16, NULL, NULL, NULL),
(124218, 33, 24, NULL, NULL, NULL),
(124218, 36, 27, NULL, NULL, NULL),
(124218, 39, 30, NULL, NULL, NULL),
(124218, 44, 35, NULL, NULL, NULL),
(124218, 46, 37, NULL, NULL, NULL),
(124218, 51, 42, NULL, NULL, NULL),
(124218, 53, 44, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Is_Admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Is_Admin`) VALUES
(5, '123', '$2y$10$1/fdGHqPprJE18DSDSROv.E2LCHh5XkCTPiYw.nnju9T2epeVHD4C', 0),
(6, 'admin', '$2y$10$zUKIa075vmUAV030NiE1I.J5gC69NbYSGgswqYllt8XKUQK/9ZTxi', 1),
(7, 'admin1', '$2y$10$oiT/T1TscP8d0/yN6QYlmOP8RqHPwonIdwZsj2XhwFNq..yviSe5S', 1),
(10, 'user', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(11, 'lhanaford0', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(12, 'wortmann1', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(13, 'tlannon2', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(14, 'kbannon3', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(15, 'gcongreve4', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(16, 'dcudbird5', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(17, 'cditer6', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(18, 'rcandlish7', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(19, 'wdunk8', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(20, 'hzamora9', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(21, 'bguidia', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(22, 'rhelgassb', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(23, 'mbischofc', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(24, 'rsandyfordd', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(25, 'rmcilherane', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(26, 'vdumphriesf', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(27, 'agaudong', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(28, 'sbriarh', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(29, 'ecampbelli', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(30, 'gcawoodj', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(31, 'rkeppink', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(32, 'bblaneyl', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(33, 'ctrothm', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(34, 'gmellern', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(35, 'pfashiono', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(36, 'dmeriguetp', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(37, 'amardlinq', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(38, 'chearnamanr', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(39, 'ncashfords', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(40, 'gwinspert', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(41, 'challyboneu', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(42, 'zunderhillv', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(43, 'ddinehartw', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(44, 'bdemogex', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(45, 'rshilitony', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(46, 'obowsz', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(47, 'cjacob10', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(48, 'ifeifer11', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(49, 'lvautier12', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(50, 'droyal13', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(51, 'estollenbeck14', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(52, 'chadaway15', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(53, 'lwodham16', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(54, 'sflores17', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(55, 'dgood18', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(56, 'ggaley19', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(57, 'ldonoghue1a', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(58, 'dwodham1b', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(59, 'psackett1c', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(60, 'mcantwell1d', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(61, 'eshavel1e', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(62, 'ssturgis1f', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(63, 'dfremantle1g', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(64, 'alenglet1h', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(65, 'ekeddie1i', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(66, 'lmolyneux1j', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(67, 'mfockes1k', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(68, 'ckraut1l', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(69, 'syakobovicz1m', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(70, 'fsemonin1n', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(71, 'bkira1o', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(72, 'uhassan1p', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(73, 'clints1q', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(74, 'fmorrell1r', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(75, 'cbrumhead1s', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(76, 'tswatheridge1t', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(77, 'croux1u', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(78, 'iwaulker1v', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(79, 'taizikovich1w', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(80, 'dconnick1x', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(81, 'jseywood1y', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(82, 'hcaught1z', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(83, 'blatus20', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(84, 'moulner21', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(85, 'bmoxham22', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(86, 'emarginson23', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(87, 'kpresland24', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(88, 'rmccarrick25', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(89, 'kmardle26', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(90, 'ekahen27', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(91, 'plebatteur28', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(92, 'kemig29', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(93, 'kdainty2a', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(94, 'kdyble2b', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(95, 'abohlsen2c', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(96, 'bspurman2d', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(97, 'tgilbane2e', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(98, 'elevey2f', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(99, 'pbaccas2g', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(100, 'pcolebeck2h', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(101, 'lstefi2i', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(102, 'beake2j', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(103, 'emcilenna2k', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(104, 'rflade2l', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(105, 'ebeebe2m', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(106, 'elevins2n', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(107, 'apatullo2o', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(108, 'slynch2p', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(109, 'doneil2q', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0),
(110, 'dburfoot2r', '$2y$10$Yb7c9M7hJT.FHPoNIaWv7uboO2AKUIYPG/F0R59AXvk5pdITr186y', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marathon`
--
ALTER TABLE `marathon`
  ADD PRIMARY KEY (`MarathonID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`MarathonID`,`UserID`,`EntryNO`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marathon`
--
ALTER TABLE `marathon`
  MODIFY `MarathonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124219;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_ibfk_1` FOREIGN KEY (`MarathonID`) REFERENCES `marathon` (`MarathonID`),
  ADD CONSTRAINT `participate_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `participant` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
