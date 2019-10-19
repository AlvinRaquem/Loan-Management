-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2019 at 04:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_requirements`
--

CREATE TABLE `loan_requirements` (
  `loanID` int(11) NOT NULL,
  `requirementID` int(11) NOT NULL,
  `DateSubmitted` datetime NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_requirements`
--

INSERT INTO `loan_requirements` (`loanID`, `requirementID`, `DateSubmitted`, `img`) VALUES
(1, 17, '2019-10-19 04:17:34', '1571451454office5.jpg'),
(1, 18, '2019-10-19 04:17:47', '1571451467camera.jpg'),
(1, 16, '2019-10-19 04:17:54', '1571451474asian-furniture-250x250.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl_data`
--

CREATE TABLE `loan_tbl_data` (
  `IDno` int(11) NOT NULL,
  `DepositDate` datetime NOT NULL,
  `DepositType` varchar(100) NOT NULL,
  `SystemSN` varchar(100) NOT NULL,
  `SystemID` varchar(100) NOT NULL,
  `Customer` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Zone` varchar(100) NOT NULL,
  `BranchID` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `UserID` varchar(100) NOT NULL,
  `Banknote_Quantity` varchar(100) NOT NULL,
  `Banknote_Amount` varchar(100) NOT NULL,
  `Coin_Quantity` varchar(100) NOT NULL,
  `Coin_Amount` varchar(100) NOT NULL,
  `Other_Total` varchar(100) NOT NULL,
  `Total_Amount` varchar(100) NOT NULL,
  `Deposit_No` varchar(100) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `ModifiedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl_fileformat`
--

CREATE TABLE `loan_tbl_fileformat` (
  `idno` int(11) NOT NULL,
  `orderno` int(10) NOT NULL,
  `position` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `lengthvalue` int(10) NOT NULL,
  `masking` varchar(10) NOT NULL,
  `defaultvalue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_tbl_fileformat`
--

INSERT INTO `loan_tbl_fileformat` (`idno`, `orderno`, `position`, `description`, `lengthvalue`, `masking`, `defaultvalue`) VALUES
(9, 1, 'Header', 'Record Type', 1, 'NO', '1'),
(10, 2, 'Header', 'Creation Date (YYYYMMDD)', 8, 'NO', ''),
(11, 1, 'Body', 'Record Type', 1, 'YES', '2'),
(12, 2, 'Body', 'Transaction Type', 2, 'YES', 'GL'),
(14, 3, 'Body', 'Account Number / Company ID', 16, 'YES', ''),
(15, 4, 'Body', 'Branch Code', 4, 'NO', ''),
(16, 5, 'Body', 'Transaction Type', 5, 'NO', '1408'),
(17, 6, 'Body', 'Transaction Date (YYYYMMDD)', 8, 'NO', ''),
(18, 7, 'Body', 'Debit/Credit Flag', 1, 'NO', 'C'),
(19, 8, 'Body', 'Value Date(YYYYMMDD)', 8, 'NO', ''),
(20, 9, 'Body', 'Transaction Currency', 5, 'NO', 'PHP'),
(21, 10, 'Body', 'Amount in Local Currency ', 14, 'YES', ''),
(22, 11, 'Body', 'Amount in Transaction currency ', 14, 'YES', ''),
(23, 12, 'Body', 'Conversion Rate', 8, 'NO', ''),
(24, 13, 'Body', 'Reference Number', 40, 'NO', ''),
(25, 14, 'Body', 'Document number', 12, 'NO', ''),
(26, 15, 'Body', 'Transaction Description', 40, 'NO', ''),
(27, 16, 'Body', 'Beneficiary IC', 16, 'NO', ''),
(28, 17, 'Body', 'Beneficiary name', 120, 'NO', ''),
(29, 18, 'Body', 'Beneficiary Address', 35, 'NO', ''),
(30, 19, 'Body', 'Beneficiary Address2', 35, 'NO', ''),
(31, 20, 'Body', 'Beneficiary Address3', 35, 'NO', ''),
(32, 21, 'Body', 'City', 35, 'NO', ''),
(33, 22, 'Body', 'State', 35, 'NO', ''),
(34, 23, 'Body', 'Country', 35, 'NO', ''),
(35, 24, 'Body', 'Zip Code', 35, 'NO', ''),
(36, 25, 'Body', 'Option Flag', 2, 'NO', ''),
(37, 26, 'Body', 'Issuer Code', 5, 'NO', ''),
(38, 27, 'Body', 'Payable Branch', 4, 'NO', ''),
(39, 28, 'Body', 'Future dated flag', 1, 'NO', 'N'),
(40, 29, 'Body', 'MIS Code', 16, 'NO', ''),
(41, 30, 'Body', 'UDT1 start * followed 59 spaces EDCYYYYXXXXX999999', 60, 'NO', ''),
(42, 1, 'Footer', 'Record Type', 1, 'NO', '3'),
(43, 2, 'Footer', 'Number of Debits', 9, 'NO', ''),
(44, 3, 'Footer', 'Total Debit Amouny in Local Currency', 15, 'YES', ''),
(45, 4, 'Footer', 'Number of Credits', 9, 'NO', ''),
(46, 5, 'Footer', 'Total Credit Amount in Local Amount', 15, 'YES', '');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl_loan`
--

CREATE TABLE `loan_tbl_loan` (
  `refno` int(4) UNSIGNED ZEROFILL NOT NULL,
  `appID` varchar(50) NOT NULL,
  `idno` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `dateloan` date NOT NULL,
  `typeOthers` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) NOT NULL,
  `loanAmount` double NOT NULL,
  `termMonth` int(10) NOT NULL,
  `interest` float NOT NULL,
  `payment` varchar(50) NOT NULL,
  `ttlAmount` double NOT NULL,
  `interestIncome` double NOT NULL,
  `montlyPayment` double NOT NULL,
  `startPay` date NOT NULL,
  `requirementDocs` text NOT NULL,
  `requirementRemarks` varchar(50) NOT NULL,
  `requirementResult` varchar(50) NOT NULL,
  `ciRemarks` text NOT NULL,
  `ciResult` varchar(50) NOT NULL,
  `voucherNo` varchar(50) NOT NULL,
  `bookingNo` varchar(50) NOT NULL,
  `amountReleased` double NOT NULL,
  `dateReleased` date NOT NULL,
  `voucherStatus` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `balance` double NOT NULL,
  `lastPay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_tbl_loan`
--

INSERT INTO `loan_tbl_loan` (`refno`, `appID`, `idno`, `type`, `dateloan`, `typeOthers`, `purpose`, `loanAmount`, `termMonth`, `interest`, `payment`, `ttlAmount`, `interestIncome`, `montlyPayment`, `startPay`, `requirementDocs`, `requirementRemarks`, `requirementResult`, `ciRemarks`, `ciResult`, `voucherNo`, `bookingNo`, `amountReleased`, `dateReleased`, `voucherStatus`, `status`, `balance`, `lastPay`) VALUES
(0001, '', '000001', 'Personal', '2019-10-19', NULL, 'personal bills', 10000, 12, 3, 'Salary Deduction', 13600, 3600, 1133.3333333333, '2019-10-19', '', 'complete requirements', 'COMPLETE', 'ci passed', 'PASSED', 'CHECK00001', 'BOOK00001', 10000, '2019-10-19', 'RELEASED', '1', 13600, '0000-00-00'),
(0002, '', '000001', 'Motorcycle', '2019-10-19', NULL, 'motorcyle', 20000, 24, 3, 'Salary Deduction', 34400, 14400, 1433.3333333333, '0000-00-00', '', '', '', '', '', '', '', 0, '0000-00-00', '', '0', 34400, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl_month`
--

CREATE TABLE `loan_tbl_month` (
  `idno` int(11) NOT NULL,
  `mValue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_tbl_month`
--

INSERT INTO `loan_tbl_month` (`idno`, `mValue`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl_payment`
--

CREATE TABLE `loan_tbl_payment` (
  `payid` int(6) UNSIGNED ZEROFILL NOT NULL,
  `refno` varchar(50) NOT NULL,
  `loantype` varchar(50) NOT NULL,
  `idno` varchar(50) NOT NULL,
  `ornumber` varchar(50) NOT NULL,
  `ordate` date NOT NULL,
  `amount` double NOT NULL,
  `bank` varchar(50) NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `principal` double NOT NULL,
  `interest` double NOT NULL,
  `paymonth` date NOT NULL,
  `dst` double NOT NULL,
  `insurance` double NOT NULL,
  `penalty` double NOT NULL,
  `total` double NOT NULL,
  `created` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `isDelete` int(11) NOT NULL,
  `LastModifiedby` varchar(255) NOT NULL,
  `LastModifiedDate` datetime NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl_personalinfo`
--

CREATE TABLE `loan_tbl_personalinfo` (
  `idno` int(6) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `permanentAddress` varchar(255) NOT NULL,
  `permanentOwnership` varchar(50) NOT NULL,
  `permanentYears` varchar(50) NOT NULL,
  `provinceAdd` varchar(255) NOT NULL,
  `provinceOwnership` varchar(50) NOT NULL,
  `provinceYears` varchar(50) NOT NULL,
  `homeLandline` varchar(50) NOT NULL,
  `mobileNos` varchar(50) NOT NULL,
  `emailAdd` varchar(50) NOT NULL,
  `dateBirth` date NOT NULL,
  `placeBirth` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `educational` varchar(50) NOT NULL,
  `educationalOther` varchar(100) NOT NULL,
  `residency` varchar(50) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `noChildren` varchar(50) NOT NULL,
  `agesChildren` varchar(50) NOT NULL,
  `tinNo` varchar(50) NOT NULL,
  `sssNo` varchar(50) NOT NULL,
  `otherID` varchar(50) NOT NULL,
  `employerName` varchar(50) NOT NULL,
  `employerAdd` varchar(100) NOT NULL,
  `employerLandline` varchar(50) NOT NULL,
  `employerPosition` varchar(50) NOT NULL,
  `employerRank` varchar(50) NOT NULL,
  `employerYrsService` varchar(50) NOT NULL,
  `employerGross` varchar(50) NOT NULL,
  `employerBenefits` varchar(50) NOT NULL,
  `employerSuperior` varchar(50) NOT NULL,
  `selfBusinessName` varchar(100) NOT NULL,
  `selfBusinessType` varchar(50) NOT NULL,
  `selfBusinessNature` varchar(50) NOT NULL,
  `selffBussinessAddress` varchar(255) NOT NULL,
  `selfBusinessTelephone` varchar(50) NOT NULL,
  `selfBusinessPosition` varchar(50) NOT NULL,
  `selfBusinessOperation` varchar(50) NOT NULL,
  `selfBusinessGross` varchar(50) NOT NULL,
  `selfBusinessNet` varchar(50) NOT NULL,
  `selfBusinessOtherIncome` varchar(50) NOT NULL,
  `spouseName` varchar(50) NOT NULL,
  `spouseBirth` date NOT NULL,
  `spouseChildren` varchar(50) NOT NULL,
  `spouseEmployer` varchar(50) NOT NULL,
  `spouseAddress` varchar(255) NOT NULL,
  `spousePosition` varchar(50) NOT NULL,
  `spouseRank` varchar(50) NOT NULL,
  `spouseGross` varchar(50) NOT NULL,
  `spouseOfcNo` varchar(50) NOT NULL,
  `spouseLandline` varchar(50) NOT NULL,
  `spouseEmail` varchar(50) NOT NULL,
  `spouseSSS` varchar(50) NOT NULL,
  `spouseTin` varchar(50) NOT NULL,
  `coName` varchar(50) NOT NULL,
  `coAddress` varchar(255) NOT NULL,
  `coContactNos` varchar(50) NOT NULL,
  `coDateBirth` date NOT NULL,
  `coTinNo` varchar(50) NOT NULL,
  `coSSother` varchar(50) NOT NULL,
  `coStatus` varchar(50) NOT NULL,
  `coRelationship` varchar(50) NOT NULL,
  `coEmployerName` varchar(50) NOT NULL,
  `coEmployerAdd` varchar(100) NOT NULL,
  `coEmployerLandline` varchar(50) NOT NULL,
  `coEmployerPosition` varchar(50) NOT NULL,
  `coEmployerRank` varchar(50) NOT NULL,
  `coEmployerService` varchar(50) NOT NULL,
  `coEmployerGross` varchar(50) DEFAULT NULL,
  `coEmployerBenefits` varchar(50) NOT NULL,
  `coSelfName` varchar(50) NOT NULL,
  `coSelfType` varchar(50) NOT NULL,
  `coSelfNature` varchar(50) NOT NULL,
  `coSelfAddress` varchar(255) NOT NULL,
  `coSelfTelephone` varchar(50) NOT NULL,
  `coSelfPosition` varchar(50) NOT NULL,
  `coSelfOperation` varchar(50) NOT NULL,
  `coSelfAnnual` varchar(50) NOT NULL,
  `coSelfNet` varchar(50) NOT NULL,
  `coSelfOtherIncome` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_tbl_personalinfo`
--

INSERT INTO `loan_tbl_personalinfo` (`idno`, `firstname`, `middlename`, `surname`, `permanentAddress`, `permanentOwnership`, `permanentYears`, `provinceAdd`, `provinceOwnership`, `provinceYears`, `homeLandline`, `mobileNos`, `emailAdd`, `dateBirth`, `placeBirth`, `gender`, `nationality`, `educational`, `educationalOther`, `residency`, `civilStatus`, `noChildren`, `agesChildren`, `tinNo`, `sssNo`, `otherID`, `employerName`, `employerAdd`, `employerLandline`, `employerPosition`, `employerRank`, `employerYrsService`, `employerGross`, `employerBenefits`, `employerSuperior`, `selfBusinessName`, `selfBusinessType`, `selfBusinessNature`, `selffBussinessAddress`, `selfBusinessTelephone`, `selfBusinessPosition`, `selfBusinessOperation`, `selfBusinessGross`, `selfBusinessNet`, `selfBusinessOtherIncome`, `spouseName`, `spouseBirth`, `spouseChildren`, `spouseEmployer`, `spouseAddress`, `spousePosition`, `spouseRank`, `spouseGross`, `spouseOfcNo`, `spouseLandline`, `spouseEmail`, `spouseSSS`, `spouseTin`, `coName`, `coAddress`, `coContactNos`, `coDateBirth`, `coTinNo`, `coSSother`, `coStatus`, `coRelationship`, `coEmployerName`, `coEmployerAdd`, `coEmployerLandline`, `coEmployerPosition`, `coEmployerRank`, `coEmployerService`, `coEmployerGross`, `coEmployerBenefits`, `coSelfName`, `coSelfType`, `coSelfNature`, `coSelfAddress`, `coSelfTelephone`, `coSelfPosition`, `coSelfOperation`, `coSelfAnnual`, `coSelfNet`, `coSelfOtherIncome`, `status`, `img`) VALUES
(000001, 'Alvin', 'Sison', 'Raquem', 'Taguig City Philippines', 'Owned', '23', '', 'Owned', '', '', '', '', '0000-00-00', '', 'Male', '', 'College Graduate', '', 'Resident/Citizen', 'Single', '', '', '', '', '', '', '', '', '', 'Senior Officer/AVP up', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'Senior Officer/AVP up', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '157145136827610432a232051db121b7b3bda859d0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tbl_requirementlist`
--

CREATE TABLE `loan_tbl_requirementlist` (
  `idno` int(11) NOT NULL,
  `requirement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_tbl_requirementlist`
--

INSERT INTO `loan_tbl_requirementlist` (`idno`, `requirement`) VALUES
(16, 'SSS'),
(17, 'PAGIBIG'),
(18, 'PHILHEALTH');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tb_user`
--

CREATE TABLE `loan_tb_user` (
  `IDno` int(3) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `userlevel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_tb_user`
--

INSERT INTO `loan_tb_user` (`IDno`, `user_name`, `full_name`, `pass_word`, `email_add`, `userlevel`) VALUES
(1, 'admin', 'Administrator', 'admin', 'admin@gmail.com', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_tbl_fileformat`
--
ALTER TABLE `loan_tbl_fileformat`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `loan_tbl_loan`
--
ALTER TABLE `loan_tbl_loan`
  ADD PRIMARY KEY (`refno`);

--
-- Indexes for table `loan_tbl_payment`
--
ALTER TABLE `loan_tbl_payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `loan_tbl_personalinfo`
--
ALTER TABLE `loan_tbl_personalinfo`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `loan_tbl_requirementlist`
--
ALTER TABLE `loan_tbl_requirementlist`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `loan_tb_user`
--
ALTER TABLE `loan_tb_user`
  ADD PRIMARY KEY (`IDno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_tbl_fileformat`
--
ALTER TABLE `loan_tbl_fileformat`
  MODIFY `idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `loan_tbl_loan`
--
ALTER TABLE `loan_tbl_loan`
  MODIFY `refno` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_tbl_payment`
--
ALTER TABLE `loan_tbl_payment`
  MODIFY `payid` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_tbl_personalinfo`
--
ALTER TABLE `loan_tbl_personalinfo`
  MODIFY `idno` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_tbl_requirementlist`
--
ALTER TABLE `loan_tbl_requirementlist`
  MODIFY `idno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `loan_tb_user`
--
ALTER TABLE `loan_tb_user`
  MODIFY `IDno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
