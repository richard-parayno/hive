-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2017 at 05:15 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afxtrim`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_done`
--

CREATE TABLE `action_done` (
  `ActiondoneID` int(11) NOT NULL,
  `TTSPIDno` int(11) NOT NULL,
  `WoodTreatment` varchar(45) DEFAULT NULL,
  `SoilTreatment` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area_infection`
--

CREATE TABLE `area_infection` (
  `AI_ID` int(11) NOT NULL,
  `HHID` int(11) NOT NULL,
  `Area_Infection` int(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area_type`
--

CREATE TABLE `area_type` (
  `area_type_id` int(11) NOT NULL,
  `area` varchar(45) NOT NULL,
  `HHID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `audit_table_inventory`
--

CREATE TABLE `audit_table_inventory` (
  `Audit_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Product_name` varchar(45) NOT NULL,
  `Brand_Name` varchar(45) NOT NULL,
  `Quantity_Used` int(11) NOT NULL,
  `Date_Used` date NOT NULL,
  `Audit_Table_Inventorycol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `idContract` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Supervisedby` int(11) NOT NULL,
  `JobOrder` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `TimeSigned` time NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ContactNo` varchar(11) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `CustomerStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeNo` int(8) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ContactNo` varchar(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `EmployeePosition` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeNo`, `Name`, `ContactNo`, `StartDate`, `EndDate`, `EmployeePosition`) VALUES
(1, 'Sheila Facuri', '09278697137', '2017-03-30', '2017-12-31', 'Accountant'),
(2, 'Mary Jane Botona', '09178239118', '2017-03-30', '2017-12-31', 'Supervisor'),
(3, 'Deanne Baldemor', '0917123456', '2017-03-30', '2017-12-31', 'Supervisor'),
(4, 'Paul Galang', '09278697137', '2017-03-30', '2017-12-31', 'Worker'),
(5, 'Alex Espiritu', '0917123457', '2017-03-30', '2017-12-31', 'Worker'),
(6, 'Manuel Toleran', '0927123456', '2017-03-30', '2017-12-31', 'Worker'),
(7, 'Ana Laid', '0917123491', '2017-03-30', '2017-12-31', 'Worker'),
(8, 'Hanz Arce', '0917123123', '2017-03-30', '2017-12-31', 'Worker'),
(9, 'Paula Casas', '0917833456', '2017-03-30', '2017-12-31', 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `findings`
--

CREATE TABLE `findings` (
  `Findings_ID` int(11) NOT NULL,
  `HHID` int(11) NOT NULL,
  `Finding` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general_services`
--

CREATE TABLE `general_services` (
  `GeneralServiceID` int(11) NOT NULL,
  `JobOrder_JONumber` int(11) NOT NULL,
  `Service_Type` varchar(45) NOT NULL,
  `pending_order` int(11) DEFAULT NULL,
  `TeamID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `householdpesttreatment`
--

CREATE TABLE `householdpesttreatment` (
  `ControlNumber` int(11) NOT NULL,
  `JobOrder_JONumber` int(11) NOT NULL,
  `inventory_ProductID` int(11) DEFAULT NULL,
  `qtytobeused` int(11) DEFAULT NULL,
  `teamId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `householdpms_report`
--

CREATE TABLE `householdpms_report` (
  `HPMSRIDNo` int(11) NOT NULL,
  `Timestarted` time NOT NULL,
  `Timefinished` time NOT NULL,
  `CustomerRepresentative` int(11) NOT NULL,
  `HousholdCaseIDNO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `household_details`
--

CREATE TABLE `household_details` (
  `householddetails` int(11) NOT NULL,
  `hhpmr` int(11) NOT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `clientremarks` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(45) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Volume` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `ItemBrand` varchar(45) NOT NULL,
  `Reason_for_removal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `ControlNumber` int(11) NOT NULL,
  `inventory_ProductID` int(11) NOT NULL,
  `TermiteIDno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE `job_order` (
  `JONumber` int(11) NOT NULL,
  `AEinCharge` int(11) DEFAULT NULL,
  `Supervisor` int(8) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `CustomerId` int(11) NOT NULL,
  `OCCULAR_ID` int(11) DEFAULT NULL,
  `Total_Payment` decimal(9,2) DEFAULT NULL,
  `Structure_Type` varchar(45) DEFAULT NULL,
  `job_type` varchar(45) DEFAULT NULL,
  `job_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `occular_visits`
--

CREATE TABLE `occular_visits` (
  `Occular_ID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Area_Infection` varchar(45) DEFAULT NULL,
  `Date` datetime NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Area_Size` int(11) DEFAULT NULL,
  `LF_At_Site` varchar(45) NOT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `Findings` varchar(100) DEFAULT NULL,
  `SupervisedBy` int(11) DEFAULT NULL,
  `Call_Received_By` int(11) DEFAULT NULL,
  `pending_order` int(11) DEFAULT NULL,
  `Recommendation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `pending_order_Id` int(11) NOT NULL,
  `Job_order_type` varchar(45) NOT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `employee_recieved` int(8) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `customerType` int(11) DEFAULT NULL,
  `Area_type` varchar(45) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `remarks` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_job_type`
--

CREATE TABLE `ref_job_type` (
  `job_type_id` int(11) NOT NULL,
  `job_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_recommendation`
--

CREATE TABLE `ref_recommendation` (
  `Recommendation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Services_ID` int(11) NOT NULL,
  `HHID` int(11) NOT NULL,
  `Services` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TeamIDno` int(11) NOT NULL,
  `JobOrder_NO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `EmployeeNo` int(8) NOT NULL,
  `TeamIdNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `termiteteammembers`
--

CREATE TABLE `termiteteammembers` (
  `TermiteTeamID` int(11) NOT NULL,
  `EmployeeNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `termitetreatment_serviceperformance`
--

CREATE TABLE `termitetreatment_serviceperformance` (
  `TTSPIDNO` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Acknowledgedby` varchar(45) DEFAULT NULL,
  `Receivedby` varchar(45) DEFAULT NULL,
  `PictureName` varchar(50) DEFAULT NULL,
  `JobORderNo` int(11) NOT NULL,
  `TeamID` int(11) DEFAULT NULL,
  `FindingsIdNO` int(11) DEFAULT NULL,
  `ActionsIDNO` int(11) DEFAULT NULL,
  `ContractID` int(11) DEFAULT NULL,
  `Time_Started` time DEFAULT NULL,
  `Time_Ended` time DEFAULT NULL,
  `Img_Path` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `termite_details`
--

CREATE TABLE `termite_details` (
  `FindingsIDNO` int(11) NOT NULL,
  `TTSPIDNO` int(11) NOT NULL,
  `Damage` varchar(50) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `partsdamaged` tinyint(1) NOT NULL,
  `Recommendation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `termite_team`
--

CREATE TABLE `termite_team` (
  `TeamID` int(11) NOT NULL,
  `TTMSPIDno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserIdno` int(8) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `UserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserIdno`, `Username`, `Password`, `UserType`) VALUES
(2, 'operations', 'pass123!', 2),
(1, 'sales', 'pass123!', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_done`
--
ALTER TABLE `action_done`
  ADD PRIMARY KEY (`ActiondoneID`,`TTSPIDno`),
  ADD KEY `fk_Actiondone_termite treatment service performance1_idx` (`TTSPIDno`);

--
-- Indexes for table `area_infection`
--
ALTER TABLE `area_infection`
  ADD PRIMARY KEY (`AI_ID`),
  ADD KEY `fk_householdDetailsID_idx` (`HHID`);

--
-- Indexes for table `area_type`
--
ALTER TABLE `area_type`
  ADD PRIMARY KEY (`area_type_id`);

--
-- Indexes for table `audit_table_inventory`
--
ALTER TABLE `audit_table_inventory`
  ADD PRIMARY KEY (`Audit_ID`,`Product_ID`),
  ADD KEY `fk_Audit_Table_Inventory_INVENTORY1_idx` (`Product_ID`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`idContract`),
  ADD KEY `fk_Contract_job order1_idx` (`JobOrder`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeNo`);

--
-- Indexes for table `findings`
--
ALTER TABLE `findings`
  ADD PRIMARY KEY (`Findings_ID`),
  ADD KEY `fk_household_details_ID_idx` (`HHID`);

--
-- Indexes for table `general_services`
--
ALTER TABLE `general_services`
  ADD PRIMARY KEY (`GeneralServiceID`),
  ADD KEY `fk_General Services_Job Order1_idx` (`JobOrder_JONumber`),
  ADD KEY `fK_pending_order_idx` (`pending_order`),
  ADD KEY `fk_TeamID_idx` (`TeamID`);

--
-- Indexes for table `householdpesttreatment`
--
ALTER TABLE `householdpesttreatment`
  ADD PRIMARY KEY (`ControlNumber`),
  ADD KEY `fk_Household Pest Treatment_Job Order1_idx` (`JobOrder_JONumber`),
  ADD KEY `fk_household pest treatment_inventory1_idx` (`inventory_ProductID`),
  ADD KEY `fk_teamID_idx` (`teamId`);

--
-- Indexes for table `householdpms_report`
--
ALTER TABLE `householdpms_report`
  ADD PRIMARY KEY (`HPMSRIDNo`),
  ADD KEY `fk_HOUSEHOLDPMS_REPORT_HOUSEHOLDPESTTREATMENT1_idx` (`HousholdCaseIDNO`);

--
-- Indexes for table `household_details`
--
ALTER TABLE `household_details`
  ADD PRIMARY KEY (`householddetails`,`hhpmr`),
  ADD KEY `fk_Householddetails_household pest management service repor_idx` (`hhpmr`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`ControlNumber`,`inventory_ProductID`),
  ADD KEY `fk_itemlist_inventory1_idx` (`inventory_ProductID`),
  ADD KEY `fk_itemlist_termite treatment service performance1_idx` (`TermiteIDno`);

--
-- Indexes for table `job_order`
--
ALTER TABLE `job_order`
  ADD PRIMARY KEY (`JONumber`),
  ADD KEY `fk_job order_customer1_idx` (`CustomerId`),
  ADD KEY `fk_job order_employee2_idx` (`Supervisor`),
  ADD KEY `fk_JOB_ORDER_OCCULAR_VISITS1_idx` (`OCCULAR_ID`),
  ADD KEY `fk_JOB_ORDER_EMPLOYEE1_idx` (`AEinCharge`);

--
-- Indexes for table `occular_visits`
--
ALTER TABLE `occular_visits`
  ADD PRIMARY KEY (`Occular_ID`),
  ADD KEY `fk_Occular Visits_customer1_idx` (`CustomerID`),
  ADD KEY `fk_OCCULAR_VISITS_EMPLOYEE1_idx` (`SupervisedBy`),
  ADD KEY `fk_OCCULAR_VISITS_EMPLOYEE2_idx` (`Call_Received_By`),
  ADD KEY `pending_order_idx` (`pending_order`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`pending_order_Id`),
  ADD KEY `_idx` (`employee_recieved`);

--
-- Indexes for table `ref_job_type`
--
ALTER TABLE `ref_job_type`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `ref_recommendation`
--
ALTER TABLE `ref_recommendation`
  ADD PRIMARY KEY (`Recommendation`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Services_ID`,`HHID`),
  ADD KEY `fk_household_details_id_idx` (`HHID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TeamIDno`),
  ADD KEY `fk_Team_Job Order1_idx` (`JobOrder_NO`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`EmployeeNo`,`TeamIdNo`),
  ADD KEY `fk_TEAMMEMBERS_Employee_idx` (`EmployeeNo`),
  ADD KEY `fk__team1_idx` (`TeamIdNo`);

--
-- Indexes for table `termiteteammembers`
--
ALTER TABLE `termiteteammembers`
  ADD PRIMARY KEY (`TermiteTeamID`,`EmployeeNo`),
  ADD KEY `fk_Termite Team Members_employee1_idx` (`EmployeeNo`);

--
-- Indexes for table `termitetreatment_serviceperformance`
--
ALTER TABLE `termitetreatment_serviceperformance`
  ADD PRIMARY KEY (`TTSPIDNO`),
  ADD KEY `fk_termite treatment service performance_Termite Team1_idx` (`TeamID`),
  ADD KEY `fk_termite treatment service performance_job order1_idx` (`JobORderNo`),
  ADD KEY `fk_termite treatment service performance_Actiondone1_idx` (`ActionsIDNO`),
  ADD KEY `fk_termite treatment service performance_TermiteDetails1_idx` (`FindingsIdNO`),
  ADD KEY `fk_termite treatment service performance_Contract1_idx` (`ContractID`);

--
-- Indexes for table `termite_details`
--
ALTER TABLE `termite_details`
  ADD PRIMARY KEY (`FindingsIDNO`,`TTSPIDNO`),
  ADD KEY `fk_Findings_termite treatment service performance1_idx` (`TTSPIDNO`),
  ADD KEY `fk_Findings_Ref_Recommendation1_idx` (`Recommendation`);

--
-- Indexes for table `termite_team`
--
ALTER TABLE `termite_team`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `fk_TERMITE_TEAM_TERMITETREATMENT_SERVICEPERFORMANCE1_idx` (`TTMSPIDno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `fk_Users_employee1` (`UserIdno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_done`
--
ALTER TABLE `action_done`
  MODIFY `ActiondoneID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `area_infection`
--
ALTER TABLE `area_infection`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `area_type`
--
ALTER TABLE `area_type`
  MODIFY `area_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `audit_table_inventory`
--
ALTER TABLE `audit_table_inventory`
  MODIFY `Audit_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `idContract` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeNo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `findings`
--
ALTER TABLE `findings`
  MODIFY `Findings_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_services`
--
ALTER TABLE `general_services`
  MODIFY `GeneralServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `householdpesttreatment`
--
ALTER TABLE `householdpesttreatment`
  MODIFY `ControlNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `householdpms_report`
--
ALTER TABLE `householdpms_report`
  MODIFY `HPMSRIDNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `household_details`
--
ALTER TABLE `household_details`
  MODIFY `householddetails` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_list`
--
ALTER TABLE `item_list`
  MODIFY `ControlNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_order`
--
ALTER TABLE `job_order`
  MODIFY `JONumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `occular_visits`
--
ALTER TABLE `occular_visits`
  MODIFY `Occular_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `pending_order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Services_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TeamIDno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `termiteteammembers`
--
ALTER TABLE `termiteteammembers`
  MODIFY `TermiteTeamID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termitetreatment_serviceperformance`
--
ALTER TABLE `termitetreatment_serviceperformance`
  MODIFY `TTSPIDNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `termite_details`
--
ALTER TABLE `termite_details`
  MODIFY `FindingsIDNO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termite_team`
--
ALTER TABLE `termite_team`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserIdno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_done`
--
ALTER TABLE `action_done`
  ADD CONSTRAINT `fk_Actiondone_termite treatment service performance1` FOREIGN KEY (`TTSPIDno`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `area_infection`
--
ALTER TABLE `area_infection`
  ADD CONSTRAINT `fk_householdDetailsID` FOREIGN KEY (`HHID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `audit_table_inventory`
--
ALTER TABLE `audit_table_inventory`
  ADD CONSTRAINT `fk_Audit_Table_Inventory_INVENTORY1` FOREIGN KEY (`Product_ID`) REFERENCES `inventory` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `fk_Contract_job order1` FOREIGN KEY (`JobOrder`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `findings`
--
ALTER TABLE `findings`
  ADD CONSTRAINT `fk_household_details_ID` FOREIGN KEY (`HHID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `general_services`
--
ALTER TABLE `general_services`
  ADD CONSTRAINT `fK_pending_order` FOREIGN KEY (`pending_order`) REFERENCES `pending_order` (`pending_order_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_General Services_Job Order1` FOREIGN KEY (`JobOrder_JONumber`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TeamID` FOREIGN KEY (`TeamID`) REFERENCES `team` (`TeamIDno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `householdpesttreatment`
--
ALTER TABLE `householdpesttreatment`
  ADD CONSTRAINT `fk_Household Pest Treatment_Job Order1` FOREIGN KEY (`JobOrder_JONumber`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_household pest treatment_inventory1` FOREIGN KEY (`inventory_ProductID`) REFERENCES `inventory` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_team` FOREIGN KEY (`teamId`) REFERENCES `team` (`TeamIDno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `householdpms_report`
--
ALTER TABLE `householdpms_report`
  ADD CONSTRAINT `fk_HOUSEHOLDPMS_REPORT_HOUSEHOLDPESTTREATMENT1` FOREIGN KEY (`HousholdCaseIDNO`) REFERENCES `householdpesttreatment` (`ControlNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `household_details`
--
ALTER TABLE `household_details`
  ADD CONSTRAINT `fk_Householddetails_household pest management service report1` FOREIGN KEY (`hhpmr`) REFERENCES `householdpms_report` (`HPMSRIDNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `fk_itemlist_inventory1` FOREIGN KEY (`inventory_ProductID`) REFERENCES `inventory` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itemlist_termite treatment service performance1` FOREIGN KEY (`TermiteIDno`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job_order`
--
ALTER TABLE `job_order`
  ADD CONSTRAINT `fk_JOB_ORDER_EMPLOYEE1` FOREIGN KEY (`AEinCharge`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_JOB_ORDER_OCCULAR_VISITS1` FOREIGN KEY (`OCCULAR_ID`) REFERENCES `occular_visits` (`Occular_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_job order_customer1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`CustomerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_job order_employee2` FOREIGN KEY (`Supervisor`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `occular_visits`
--
ALTER TABLE `occular_visits`
  ADD CONSTRAINT `fk_OCCULAR_VISITS_EMPLOYEE1` FOREIGN KEY (`SupervisedBy`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OCCULAR_VISITS_EMPLOYEE2` FOREIGN KEY (`Call_Received_By`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Occular Visits_customer1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pending_order` FOREIGN KEY (`pending_order`) REFERENCES `pending_order` (`pending_order_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD CONSTRAINT `employee` FOREIGN KEY (`employee_recieved`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_householdDetails_ID` FOREIGN KEY (`HHID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `fk_Team_Job Order1` FOREIGN KEY (`JobOrder_NO`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `fk_TEAMMEMBERS_Employee` FOREIGN KEY (`EmployeeNo`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk__team1` FOREIGN KEY (`TeamIdNo`) REFERENCES `team` (`TeamIDno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `termiteteammembers`
--
ALTER TABLE `termiteteammembers`
  ADD CONSTRAINT `fk_Termite Team Members_Termite Team1` FOREIGN KEY (`TermiteTeamID`) REFERENCES `termite_team` (`TeamID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Termite Team Members_employee1` FOREIGN KEY (`EmployeeNo`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `termitetreatment_serviceperformance`
--
ALTER TABLE `termitetreatment_serviceperformance`
  ADD CONSTRAINT `fk_termite treatment service performance_Actiondone1` FOREIGN KEY (`ActionsIDNO`) REFERENCES `action_done` (`ActiondoneID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_termite treatment service performance_Contract1` FOREIGN KEY (`ContractID`) REFERENCES `contract` (`idContract`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_termite treatment service performance_Termite Team1` FOREIGN KEY (`TeamID`) REFERENCES `termite_team` (`TeamID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_termite treatment service performance_TermiteDetails1` FOREIGN KEY (`FindingsIdNO`) REFERENCES `termite_details` (`FindingsIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_termite treatment service performance_job order1` FOREIGN KEY (`JobORderNo`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `termite_details`
--
ALTER TABLE `termite_details`
  ADD CONSTRAINT `fk_Findings_Ref_Recommendation1` FOREIGN KEY (`Recommendation`) REFERENCES `ref_recommendation` (`Recommendation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Findings_termite treatment service performance1` FOREIGN KEY (`TTSPIDNO`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `termite_team`
--
ALTER TABLE `termite_team`
  ADD CONSTRAINT `fk_TERMITE_TEAM_TERMITETREATMENT_SERVICEPERFORMANCE1` FOREIGN KEY (`TTMSPIDno`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_employee1` FOREIGN KEY (`UserIdno`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
