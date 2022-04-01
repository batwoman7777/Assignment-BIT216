-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 01:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpaid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Name`, `Password`) VALUES
('Siva', 'Sivanesan ', 'siva'),
('Fatima', 'Fatima', 'fatima'),
('Selina', 'Selina', 'selina'),
('Sarah', 'Sarah', 'sarah');

-- --------------------------------------------------------

--
-- Table structure for table `appeals`
--

CREATE TABLE `appeals` (
  `appealID` int(11) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `outcome` varchar(250) DEFAULT NULL,
  `OrganizationName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appeals`
--

INSERT INTO `appeals` (`appealID`, `fromDate`, `toDate`, `description`, `outcome`, `OrganizationName`) VALUES
(1, '2022-03-25', '2022-04-22', 'Food needed, money needed', 'NOT ACTIVE{amount: 320, channel: Cash, reference: AE3457879, description: Maggie, estimated value: 5 packs}', 'KELAB BELL BELIA TAMIL PETALIN'),
(2, '2022-03-31', '2022-04-21', 'Pay hospital bills for a family', 'ACTIVE', 'KELAB BELL BELIA TAMIL PETALIN'),
(3, '2022-04-07', '2022-04-27', 'Food Needed for elderly people', 'ACTIVE', 'SARAWAK HEALTH AID'),
(4, '2022-03-17', '2022-03-25', 'Food needed, money needed', 'ACTIVE', 'ABCD Life 2'),
(5, '2022-03-24', '2022-03-30', 'Food needed, money needed', 'ACTIVE', 'Wesabilillah'),
(6, '2022-03-30', '2022-04-14', 'Medical Bills Needed', 'ACTIVE', 'SARAWAK HEALTH AID'),
(7, '2022-03-24', '2022-04-20', 'Bedsheets needed, Food needed', 'ACTIVE', 'MOTHER TERESA foundation'),
(8, '2022-03-18', '2022-03-24', 'Money needed for cardiac surgery for elderly', 'ACTIVE', 'MOTHER TERESA foundation'),
(9, '2022-03-30', '2022-04-13', 'Money needed', 'ACTIVE', 'ABCD Life 2'),
(10, '2022-03-30', '2022-04-21', 'Money needed, Food needed', 'ACTIVE', 'Accelerate Lifestyle'),
(16, '2022-03-30', '2022-04-21', 'Money needed, Food needed', 'ACTIVE', 'Accelerate Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `ID` varchar(30) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `MobileNo` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Income` mediumint(7) NOT NULL,
  `Organization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`ID`, `Fullname`, `Email`, `MobileNo`, `Address`, `Income`, `Organization`) VALUES
('BL2630493', 'Najwa binti Wan Idham', 'new.fauzi@yahoo.com', '+6015-552 1904 ', '336, Lorong 2/9W, Lembah Flora, 89223 Ranau, Sabah', 30, 'MOTHER TERESA foundation'),
('CE1191089 ', 'S. A. Kasthuriraani', 'erostam@hotmail.com', '+609-217 4270', '3O-43, Jln Bukit Aman 4/8, Taman Casa, 46551 Subang, Selangor Darul Ehsan', 200, 'KELAB BELL BELIA TAMIL PETALIN'),
('IC75188283', 'Muhammed Nik Radzuan bin Tasripin', 'qzakir@yahoo.com', '+6015-165 9772 ', 'No. 5D-65, Jln S.P. Seenivasagam 1, Damansara Selatan, 59026 Temerloh, Pahang', 50, 'KELAB BELL BELIA TAMIL PETALIN'),
('MY0878388', 'Paramjit a/l Weeratunge', 'iding@bahrodin.biz', '+6017-389 7069', '5U-79, Jln 8/9W, Apartment Tropika, 52397 Sungai Besi, WP Kuala Lumpur ', 300, 'ABCD Life 2'),
('MY25705073', 'Viatilingam Suppiah a/l Naraina Rajendran', 'khaleeda.chan@gmail.com', '+605-238 7710', '1, Jalan 2/7, PJS91F, 23524 Ajil, Terengganu', 254, 'ABCD Life 2'),
('MY3836717', 'Faizah binti Nazmi', 'shanti.faizah@hotmail.com', '+604-803 6892', '54, Lorong Jelutong, PJS86, 75514 Ramuan China, Melaka', 300, 'Wesabilillah'),
('MY49698135', 'Muhammet Syed Sakri Awal', 'haiqal.angie@gmail.com', '+6017-389 7069', '70, Jln Conlay 97C, USJ 2, 06714 Kuah, Kedah', 345, 'MOTHER TERESA foundation'),
('MY708517355', 'N. Saraswati', 'imran38@nurnaim.com', '+606-934 8610', '8, Jalan Sultan Sulaiman, Taman Desa Mutiara, 02164 Mata Ayer, Perlis Indera Kayangan ', 48, 'ABCD Life 2'),
('QKIY63546', 'Wen Pin Pin', 'danell40@hazrol.com', '+6014-352 1895', 'No. 61, Lorong 5/8, Taman Delima, 01769 Arau, Perlis Indera Kayangan', 200, 'Wesabilillah'),
('VH8761003644', 'Yugendran Vello a/l Sooryapparad', 'poh.devamany@gmail.com', '+6015-604 7836 ', '6, Jln 1/19Z, Kota Utara, 87025 Kiamsam, Labuan', 45, 'Polaris SSDN Net');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `contribution_ID` int(10) NOT NULL,
  `CashAmount` int(7) DEFAULT NULL,
  `PaymentVia` varchar(50) DEFAULT NULL,
  `ReferenceNo` varchar(50) DEFAULT NULL,
  `receivedDate` varchar(35) NOT NULL,
  `OrganizationName` varchar(100) NOT NULL,
  `appealID` int(11) NOT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `EstimatedValue` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`contribution_ID`, `CashAmount`, `PaymentVia`, `ReferenceNo`, `receivedDate`, `OrganizationName`, `appealID`, `Description`, `EstimatedValue`) VALUES
(1, 400, 'Credit Card', 'RWV565465', '30th March 2022, Wednesday', 'ABCD Life 2', 9, 'Rice', '2 Bags');

-- --------------------------------------------------------

--
-- Table structure for table `disbursements`
--

CREATE TABLE `disbursements` (
  `DisbursementID` int(11) NOT NULL,
  `DisbursementDate` date NOT NULL,
  `CashAmount` mediumint(7) NOT NULL,
  `GoodsDisbursed` varchar(250) NOT NULL,
  `appealID` int(11) NOT NULL,
  `applicantID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disbursements`
--

INSERT INTO `disbursements` (`DisbursementID`, `DisbursementDate`, `CashAmount`, `GoodsDisbursed`, `appealID`, `applicantID`) VALUES
(1, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(2, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(3, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(4, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(5, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(6, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(7, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(8, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(9, '2022-03-27', 50, '2 Farm Fresh Milk Cartons', 4, 'MY25705073'),
(10, '2022-03-27', 400, '1 masterbed bedsheet', 7, 'BL2630493'),
(11, '2022-03-31', 1000, '', 8, 'BL2630493'),
(12, '2022-03-31', 1000, '', 8, 'MY49698135');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `title` varchar(100) NOT NULL,
  `applicantID` varchar(30) NOT NULL,
  `content` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`title`, `applicantID`, `content`) VALUES
('195472788_957010445048620_6699081967958008272_n.jpg', 'IC75188283', 195472788),
('45th-anniversary-of-the-chipko-movement-4881238832709632-2x.jpg', 'IC75188283', 45),
('58384258_442704929812510_9193849067317231616_n.jpg', 'IC75188283', 58384258),
('admin.png', 'MY0878388', 0),
('bangladesh-independence-day-2020-6753651837108332.2-2x.jpg', 'IC75188283', 0),
('bg.jfif', 'MY49698135', 0),
('bh.jpg', 'MY49698135', 0),
('Capture001.png', 'IC75188283', 0),
('contact.jpg', 'MY49698135', 0),
('creative-market.jpg', 'MY3836717', 0),
('designmodo.jpg', 'MY3836717', 0),
('envato.jpg', 'MY3836717', 0),
('Main HELP aid page.docx', 'CE1191089 ', 0),
('Screenshot 2021-08-23 102212.png', 'VH8761003644', 0),
('Screenshot 2021-08-23 120939.png', 'VH8761003644', 0),
('Screenshot 2021-08-23 121553.png', 'VH8761003644', 0),
('Screenshot 2021-12-31 211355.png', 'MY25705073', 0),
('Screenshot 2021-12-31 214950.png', 'MY25705073', 0),
('Screenshot 2022-01-02 235036.png', 'MY25705073', 0),
('Screenshot 2022-01-04 220051.png', 'QKIY63546', 0),
('Screenshot 2022-01-04 221052.png', 'QKIY63546', 0),
('Screenshot 2022-01-04 221220.png', 'QKIY63546', 0),
('Screenshot 2022-01-04 223643.png', 'QKIY63546', 0),
('Screenshot 2022-01-04 224231.png', 'QKIY63546', 0),
('Screenshot 2022-01-04 224524.png', 'QKIY63546', 0),
('Screenshot 2022-01-04 225559.png', 'QKIY63546', 0),
('Screenshot 2022-01-04 230609.png', 'QKIY63546', 0),
('Screenshot 2022-02-23 214055.png', 'MY708517355', 0),
('Screenshot 2022-02-23 214109.png', 'MY708517355', 0),
('Screenshot 2022-02-23 215635.png', 'MY708517355', 0),
('Screenshot 2022-02-23 234621.png', 'MY708517355', 0),
('themeforest.jpg', 'MY3836717', 0),
('WIN_20220109_13_39_43_Pro.jpg', 'IC75188283', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `OrgID` int(11) NOT NULL,
  `organizationName` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`OrgID`, `organizationName`, `Address`) VALUES
(1, 'KELAB BELL BELIA TAMIL PETALIN', 'NO 420, INFITT MALAYSIA, PETALING JAYA'),
(2, 'MOTHER TERESA foundation', 'Jalan Ksah 1, 50490, Kuala Lumpur'),
(3, 'ABCD Life 2', 'Mont Blanc, Penang'),
(4, 'Wesabilillah', 'derikan, medilah, pendalaman'),
(5, 'Action for Help@Selangor', '9, Jalan 4/36L, Puncak Antarabangsa, 71044 Gemas, Negeri Sembilan Darul Khusus'),
(6, '365 Wellness', '54, Jln 17T, Alam Timur, 43837 Pandamaran, Selangor'),
(7, 'Accelerate Lifestyle', '6, Lorong Tun Perak, Kampung Pertama, 01418 Sanglang, Perlis '),
(8, 'Polaris SSDN Net', 'No. A-77-12, Jalan Istana 4K, Puncak Dato Harun, 89572 Kimanis, Sabah '),
(9, 'ABCD Life 3', 'A-96-50, Jalan Sultan Abdul Samad 72I, Kota Selatan, 11348 Balik Pulau, Pulau Pinang');

-- --------------------------------------------------------

--
-- Table structure for table `organization2`
--

CREATE TABLE `organization2` (
  `usr` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `OrganizationName` varchar(30) NOT NULL,
  `MobileNo` varchar(30) NOT NULL,
  `JobTitle` varchar(30) NOT NULL,
  `OrgID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization2`
--

INSERT INTO `organization2` (`usr`, `Password`, `OrganizationName`, `MobileNo`, `JobTitle`, `OrgID`) VALUES
('David', 'david', 'ABCD Life 2', '+6012-634 7785', 'Organization Rep', 3),
('Fatima', 'fatima', 'ABCD Life 2', '+44182756246', 'Organization Rep', 3),
('Muhamad Hj', 'muhammad', 'MOTHER TERESA foundation', '+6012-625 2089', 'Organization Rep', 2),
('Nikki', 'nikki', 'Accelerate Lifestyle', '+6015-604 7836', 'Organization Rep', 7),
('Sarah', 'sarah', 'Wesabilillah', '01934354767', 'Organization Rep', 4),
('Selina', 'selina', 'MOTHER TERESA foundation', '0140000589', 'Organization Rep ', 2),
('Sheikar', 'sheikar', 'Polaris SSDN Net', '+6012-625 2444', 'Organization Rep', 8),
('Siva', 'siva123', 'KELAB BELL BELIA TAMIL PETALIN', '0145236589', 'Organization Rep ', 1),
('Teresa', 'teresa', 'ABCD Life 3', '+6015-264 9638', 'Organization Rep', 9),
('Vanessa', 'vanessa', 'Action for Help@Selangor', '+6014-480 2371', 'Organization Rep', 5),
('Yong', 'yong', 'Action for Help@Selangor', '+6011-1782 4682', 'Organization Rep', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`appealID`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`contribution_ID`),
  ADD KEY `appealID` (`appealID`);

--
-- Indexes for table `disbursements`
--
ALTER TABLE `disbursements`
  ADD PRIMARY KEY (`DisbursementID`),
  ADD KEY `appealID` (`appealID`),
  ADD KEY `applicantID` (`applicantID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`title`),
  ADD KEY `applicantID` (`applicantID`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`OrgID`);

--
-- Indexes for table `organization2`
--
ALTER TABLE `organization2`
  ADD PRIMARY KEY (`usr`),
  ADD KEY `OrgID` (`OrgID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appeals`
--
ALTER TABLE `appeals`
  MODIFY `appealID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `contribution_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disbursements`
--
ALTER TABLE `disbursements`
  MODIFY `DisbursementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `OrgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contribution`
--
ALTER TABLE `contribution`
  ADD CONSTRAINT `contribution_ibfk_1` FOREIGN KEY (`appealID`) REFERENCES `appeals` (`appealID`),
  ADD CONSTRAINT `contribution_ibfk_2` FOREIGN KEY (`appealID`) REFERENCES `appeals` (`appealID`);

--
-- Constraints for table `disbursements`
--
ALTER TABLE `disbursements`
  ADD CONSTRAINT `disbursements_ibfk_1` FOREIGN KEY (`appealID`) REFERENCES `appeals` (`appealID`),
  ADD CONSTRAINT `disbursements_ibfk_2` FOREIGN KEY (`applicantID`) REFERENCES `applicant` (`ID`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`applicantID`) REFERENCES `applicant` (`ID`);

--
-- Constraints for table `organization2`
--
ALTER TABLE `organization2`
  ADD CONSTRAINT `organization2_ibfk_1` FOREIGN KEY (`OrgID`) REFERENCES `organization` (`OrgID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
