-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2017 at 09:12 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appdev`
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
-- Table structure for table `areas_treated`
--

CREATE TABLE `areas_treated` (
  `AreaTreatedID` int(11) NOT NULL,
  `HouseholdIDdetails` int(11) NOT NULL,
  `Area` varchar(45) NOT NULL
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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerId`, `Name`, `ContactNo`, `Address`, `CustomerStatus`) VALUES
(1, 'Francis Lozada', '9165324489', 'cainta', 'Active'),
(2, 'Yuri D. Banawa', '09172816271', 'Bellagio', 'Active'),
(3, 'Sean Coronel', '123131', '21 gakkegi', 'very awesome'),
(4, 'Ads', '123', '31231', ''),
(5, 'prewrwe', '213131', '', '1231'),
(6, 'Richard', '132312312', '21 sa', ''),
(7, 'Richard', '132312312', '21 sa', ''),
(8, 'Richard', '132312312', '21 sa', ''),
(9, 'Richard', '132312312', '21 sa', ''),
(10, 'Richard', '132312312', '21 sa', ''),
(11, 'Sir Yu', '09175694', '21 eda', ''),
(12, 'Sir Yu', '09175694', '21 eda', ''),
(13, 'Sir Yu', '09175694', '21 eda', ''),
(14, 'Sir Yu', '09175694', '21 eda', ''),
(15, 'Sir Yu', '09175694', '21 eda', ''),
(16, 'Sir Yu', '09175694', '21 eda', ''),
(17, 'Sir Yu', '09175694', '21 eda', ''),
(18, 'Sir Yu', '09175694', '21 eda', ''),
(19, 'ARE', '2131241', 'sds', ''),
(20, 'ARE', '2131241', 'sds', ''),
(21, 'ARE', '2131241', 'sds', ''),
(22, 'Manuel Toleran', '9151725420', 'DLSU', ''),
(23, 'Alex Espiritu', '09159999999', 'DLSU', ''),
(24, 'Richard Lance G. Parayno', '09151725420', '#28 Gallego Street Camp Aguinaldo', ''),
(25, 'Parayno', '09151725420', '#29 Gallego Street', ''),
(26, 'Lance Parayno', '9133277', '#28 Gallego Street', ''),
(27, 'Helping Hands', '1234567', 'Manila Residences Tower 2', '');

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
(1, 'Sheila Facuri', '09171234567', '2016-11-01', '2016-12-31', 'Accountant'),
(2, 'Mary Jane Botona', '09178239118', '2016-11-01', '2016-12-31', 'Supervisor'),
(3, 'Richard Parayno', '09171111111', '2016-11-01', '2016-12-31', 'Supervisor'),
(4, 'Deanne Baldemor', '09182736453', '2016-11-01', '2016-12-31', 'Supervisor'),
(5, 'Paul Galang', '09172836472', '2016-11-01', '2016-12-31', 'Worker'),
(6, 'Alex Espiritu', '09172837461', '2016-11-01', '2016-12-31', 'Worker'),
(7, 'Manuel Toleran', '09172837465', '2016-11-01', '2016-12-31', 'Worker'),
(8, 'Ana Laid', '09172839401', '2016-11-01', '2016-12-31', 'Worker'),
(9, 'Hanz Arce', '09172837465', '2016-11-01', '2016-12-31', 'Worker'),
(10, 'Paula Casas', '09172834321', '2016-11-01', '2016-12-31', 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `findings`
--

CREATE TABLE `findings` (
  `idFindings` int(11) NOT NULL,
  `Finding` varchar(45) DEFAULT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `HHID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_services`
--

CREATE TABLE `general_services` (
  `GeneralServiceID` int(11) NOT NULL,
  `JobOrder_JONumber` int(11) NOT NULL,
  `Service_Type` varchar(45) NOT NULL,
  `pending_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `householdpesttreatment`
--

CREATE TABLE `householdpesttreatment` (
  `ControlNumber` int(11) NOT NULL,
  `JobOrder_JONumber` int(11) NOT NULL,
  `inventory_ProductID` int(11) NOT NULL,
  `qtytobeused` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `householdpesttreatment`
--

INSERT INTO `householdpesttreatment` (`ControlNumber`, `JobOrder_JONumber`, `inventory_ProductID`, `qtytobeused`) VALUES
(1, 2, 1, 10);

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
  `ServicesID` int(11) NOT NULL,
  `AreasTreated` int(11) NOT NULL,
  `Findings` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `clientremarks` varchar(45) DEFAULT NULL,
  `TrapsID` int(11) DEFAULT NULL
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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ProductID`, `ProductName`, `Quantity`, `Volume`, `Description`, `Status`, `ItemBrand`, `Reason_for_removal`) VALUES
(1, 'Premise', 420, 100, 'This chemical is used for...', 'Available', 'Hanes Phil. Inc.,', NULL),
(2, 'Lindrex', 200, 100, 'This chemical is used for...', 'Available', 'Hanes Phil. Inc.,', NULL),
(3, 'Chem3', 20, 100, 'This chemical is used for...', 'Critical', 'Hanes Phil. Inc.,', NULL),
(4, 'Chem4', 200, 100, 'This chemical is used for...', 'Available', 'Hanes Phil. Inc.,', NULL);

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
  `AEinCharge` int(11) NOT NULL,
  `Supervisor` int(8) NOT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `CustomerId` int(11) NOT NULL,
  `OCCULAR_ID` int(11) DEFAULT NULL,
  `Total_Payment` decimal(9,2) DEFAULT NULL,
  `Structure_Type` varchar(45) DEFAULT NULL,
  `job_type` varchar(45) DEFAULT NULL,
  `job_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`JONumber`, `AEinCharge`, `Supervisor`, `StartDate`, `EndDate`, `CustomerId`, `OCCULAR_ID`, `Total_Payment`, `Structure_Type`, `job_type`, `job_status`) VALUES
(1, 1, 3, '2016-12-03 00:00:00', '2017-12-03 00:00:00', 1, 1, NULL, 'Residence ', NULL, NULL),
(2, 1, 4, '2016-12-04 00:00:00', '2016-12-04 00:00:00', 1, 1, NULL, 'Residence ', NULL, NULL),
(3, 1, 2, '2016-12-02 00:00:00', '2016-12-02 00:00:00', 2, NULL, '500.00', 'Residence', NULL, NULL),
(4, 1, 3, '2016-12-02 00:00:00', '2016-12-02 00:00:00', 3, 1, '600.00', 'Restaurant', 'Household', 'Ongoing'),
(5, 2, 3, '2016-12-02 00:00:00', '2016-12-02 00:00:00', 2, 1, '5321.00', 'Warehouse', 'Household', 'Ongoing'),
(6, 1, 3, '2017-04-24 00:00:00', '2017-04-24 00:00:00', 4, NULL, '342.00', 'Household', 'General Services', 'Ongoing'),
(7, 1, 4, '2017-04-23 00:00:00', '2017-04-23 00:00:00', 5, NULL, '32.00', 'Household', 'General Services', 'Ongoing'),
(8, 1, 2, '2017-04-26 00:00:00', '2017-04-26 00:00:00', 6, NULL, '213.00', 'Office Area', 'General Services', 'Ongoing'),
(9, 1, 3, '2017-04-26 00:00:00', '2017-04-26 00:00:00', 7, NULL, '213.00', 'Office Area', 'General Services', 'Ongoing'),
(10, 1, 2, '2017-05-26 00:00:00', '2018-04-26 00:00:00', 12, NULL, NULL, 'Restaurant', 'Termite Treatment', 'Ongoing'),
(11, 1, 2, '2017-06-26 00:00:00', '2018-07-26 00:00:00', 13, NULL, NULL, 'Warehouse', 'Termite Treatment', 'Ongoing'),
(12, 1, 2, '2017-05-26 00:00:00', '2017-05-26 00:00:00', 14, NULL, NULL, 'Office Area', 'Household Services', 'Ongoing'),
(13, 1, 3, '2017-05-26 00:00:00', '2017-05-26 00:00:00', 15, NULL, NULL, 'Warehouse', 'Household Services', 'Ongoing');

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
  `Time_Agreed` time NOT NULL,
  `LF_At_Site` varchar(45) NOT NULL,
  `Remarks` varchar(45) DEFAULT NULL,
  `Findings` varchar(45) DEFAULT NULL,
  `SupervisedBy` int(11) NOT NULL,
  `Call_Received_By` int(11) NOT NULL,
  `pending_order` int(11) DEFAULT NULL,
  `Recommendation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occular_visits`
--

INSERT INTO `occular_visits` (`Occular_ID`, `CustomerID`, `Area_Infection`, `Date`, `Status`, `Area_Size`, `Time_Agreed`, `LF_At_Site`, `Remarks`, `Findings`, `SupervisedBy`, `Call_Received_By`, `pending_order`, `Recommendation`) VALUES
(1, 1, 'Heavy', '2016-12-02 00:00:00', 'Active', 500, '14:00:00', 'Francis ', NULL, 'omg', 2, 1, NULL, NULL),
(2, 2, 'Mild', '2016-12-02 00:00:00', 'Active', 600, '14:00:00', 'Francis', NULL, NULL, 2, 1, 6, NULL),
(3, 12, 'Mild', '2017-04-21 00:00:00', 'Active', 600, '14:00:00', 'Damien', NULL, NULL, 2, 1, 25, 'Termite Treatment'),
(4, 13, 'Mild', '2017-04-20 00:00:00', 'Active', 600, '14:00:00', 'Gar', NULL, NULL, 2, 1, 26, 'Termite Treatment'),
(5, 14, 'Heavy', '2017-04-19 00:00:00', 'Active', 600, '14:00:00', 'Roy', NULL, NULL, 2, 1, 27, 'Household Services'),
(6, 15, 'Heavy', '2017-04-25 00:00:00', 'Active', 600, '14:00:00', 'Kal', NULL, NULL, 2, 1, 28, 'Household Services');

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
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pending_order`
--

INSERT INTO `pending_order` (`pending_order_Id`, `Job_order_type`, `Address`, `customer`, `employee_recieved`, `date`, `customerType`, `Area_type`, `status`) VALUES
(1, '$radior', '$Area', 7, NULL, NULL, 1, '$atype', 'Pending'),
(2, 'Termite Treatment', '21 eda', 15, 3, NULL, 1, 'Household', 'Pending'),
(3, 'Termite Treatment', '21 eda', 16, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(4, 'Termite Treatment', '21 eda', 17, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(5, 'Termite Treatment', '21 eda', 18, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(6, '', 'sds', 19, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(7, '', 'sds', 20, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(8, 'Household Services', 'sds', 21, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(9, 'Household Services', '2131', 4, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(10, 'Household Services', '2131', 4, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(11, 'Household Services', 'sfdsf', 5, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(12, 'Termite Treatment', 'Sa bahay ni fracnis', 1, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(13, 'Termite Treatment', 'Sa bahay ni fracnis', 1, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(14, '', 'Sycsa', 4, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(15, '', 'Sycsa', 4, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(16, '', 'Sycsa', 4, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(17, 'General Services', 'Sycsa', 4, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(18, 'General Services', 'Sycsa', 4, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(19, 'General Services', 'adadsadadas', 1, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(20, 'General Services', 'adadsadadas', 1, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(21, 'Termite Treatment', 'I know this will work', 3, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(22, 'General Services', '21 Gallego St', 4, NULL, '2017-04-24', 1, 'Household', 'Pending'),
(23, 'General Services', '28 Gallego St', 5, NULL, '2017-04-23', 1, 'Household', 'Pending'),
(24, 'General Services', '19 triosian Palace', 6, NULL, '2017-04-26', 1, 'Office Area', 'Deactivated'),
(25, 'Termite Treatment', 'Quezon City', 12, NULL, '2017-04-21', 2, 'Restaurant', 'Pending'),
(26, 'Termite Treatment', 'New Manila', 13, NULL, '2017-04-20', 2, 'Warehouse', 'Pending'),
(27, 'Household Services', 'Taft avenue', 14, NULL, '2017-04-19', 2, 'Office Area', 'Pending'),
(28, 'Household Services', 'Whiteplains', 15, NULL, '2017-04-25', 2, 'Warehouse', 'Pending'),
(29, '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(30, '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(31, 'General Services', '19 triosian palace', 6, 3, '2017-09-10', NULL, NULL, 'Deactivated'),
(36, 'General Services', '19 triosian palace', 6, 3, '2017-09-10', NULL, NULL, 'Deactivated'),
(37, 'General Services', '19 triosian palace', 6, 3, '2017-09-10', NULL, NULL, 'Deactivated'),
(38, 'General Services', '19 triosian palace', 6, 3, '2017-07-27', NULL, NULL, 'Activated'),
(39, 'Termite Treatment', 'DLSU', 22, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(40, 'Termite Treatment', 'DLSU', 23, NULL, '0000-00-00', 1, 'Household', 'Pending'),
(41, 'General Services', 'DLSU', 1, NULL, '2017-02-28', 2, 'Household', 'Pending'),
(42, 'General Services', 'DLSU', 1, NULL, '2017-03-15', 2, 'Household', 'Pending'),
(43, 'Termite Treatment', '#28 Gallego Street Camp Aguinaldo', 24, 3, '2017-03-08', 1, 'Household', 'Deactivated'),
(44, 'Household Services', '#29 Gallego Street', 24, NULL, '2017-04-13', 2, 'Office Area', 'Deactivated'),
(50, 'Termite Treatment', '#28 Gallego Street Camp Aguinaldo', 24, 3, '2017-03-10', 1, 'Household', 'Deactivated'),
(51, 'Termite Treatment', '#28 Gallego Street Camp Aguinaldo', 24, 3, '2017-03-11', 1, 'Household', 'Deactivated'),
(52, 'Termite Treatment', '#28 Gallego Street Camp Aguinaldo', 24, 3, '2017-03-15', 1, 'Household', 'Activated'),
(54, 'Termite Treatment', '#29 Gallego Street', 25, 3, '2017-03-06', 1, 'Household', 'Deactivated'),
(56, 'Termite Treatment', '#29 Gallego Street', 25, 3, '2017-03-08', 1, 'Household', 'Deactivated'),
(57, 'Termite Treatment', '#29 Gallego Street', 25, 3, '2017-03-09', 1, 'Household', 'Pending'),
(59, 'Household Services', '#28 Gallego Street', 26, 3, '2017-03-23', 1, 'Household', 'Pending'),
(60, 'General Services', 'Manila Residences Tower 2', 27, 3, '2017-03-16', 1, 'Household', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ref_area_type`
--

CREATE TABLE `ref_area_type` (
  `area_type_id` int(11) NOT NULL,
  `area` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_area_type`
--

INSERT INTO `ref_area_type` (`area_type_id`, `area`) VALUES
(1, 'warehouse'),
(2, 'Office Area'),
(3, 'Household'),
(4, 'Restaurant'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `ref_job_type`
--

CREATE TABLE `ref_job_type` (
  `job_type_id` int(11) NOT NULL,
  `job_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_job_type`
--

INSERT INTO `ref_job_type` (`job_type_id`, `job_type`) VALUES
(1, 'Termite Treatment'),
(2, 'Household Services'),
(3, 'General Services');

-- --------------------------------------------------------

--
-- Table structure for table `ref_recommendation`
--

CREATE TABLE `ref_recommendation` (
  `Recommendation` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_service_type`
--

CREATE TABLE `ref_service_type` (
  `Service_Type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servicesID` int(11) NOT NULL,
  `HouseholddetailID` int(11) NOT NULL,
  `ServicesRendered` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Dumping data for table `termiteteammembers`
--

INSERT INTO `termiteteammembers` (`TermiteTeamID`, `EmployeeNo`) VALUES
(1, 2),
(1, 5),
(1, 6),
(1, 7);

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

--
-- Dumping data for table `termitetreatment_serviceperformance`
--

INSERT INTO `termitetreatment_serviceperformance` (`TTSPIDNO`, `Date`, `Acknowledgedby`, `Receivedby`, `PictureName`, `JobORderNo`, `TeamID`, `FindingsIdNO`, `ActionsIDNO`, `ContractID`, `Time_Started`, `Time_Ended`, `Img_Path`, `status`) VALUES
(1, '2016-12-03 00:00:00', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2017-01-02 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2017-02-01 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2017-03-03 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2017-04-02 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2017-05-02 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2017-06-01 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2017-07-01 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2017-07-31 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2017-08-30 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2017-09-29 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2017-10-29 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2017-11-28 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `termite_team`
--

INSERT INTO `termite_team` (`TeamID`, `TTMSPIDno`) VALUES
(1, 1);

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
-- Indexes for table `areas_treated`
--
ALTER TABLE `areas_treated`
  ADD PRIMARY KEY (`AreaTreatedID`,`HouseholdIDdetails`),
  ADD KEY `fk_AreasTreated_Householddetails1_idx` (`HouseholdIDdetails`);

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
  ADD PRIMARY KEY (`idFindings`,`HHID`),
  ADD KEY `fk_Findings_Householddetails2_idx` (`HHID`);

--
-- Indexes for table `general_services`
--
ALTER TABLE `general_services`
  ADD PRIMARY KEY (`GeneralServiceID`),
  ADD KEY `fk_General Services_Job Order1_idx` (`JobOrder_JONumber`),
  ADD KEY `fk_GENERAL_SERVICES_Ref_Service_type1_idx` (`Service_Type`),
  ADD KEY `fK_pending_order_idx` (`pending_order`);

--
-- Indexes for table `householdpesttreatment`
--
ALTER TABLE `householdpesttreatment`
  ADD PRIMARY KEY (`ControlNumber`),
  ADD KEY `fk_Household Pest Treatment_Job Order1_idx` (`JobOrder_JONumber`),
  ADD KEY `fk_household pest treatment_inventory1_idx` (`inventory_ProductID`);

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
  ADD KEY `fk_Householddetails_household pest management service repor_idx` (`hhpmr`),
  ADD KEY `fk_Householddetails_Findings1_idx` (`Findings`);

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
-- Indexes for table `ref_area_type`
--
ALTER TABLE `ref_area_type`
  ADD PRIMARY KEY (`area_type_id`);

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
-- Indexes for table `ref_service_type`
--
ALTER TABLE `ref_service_type`
  ADD PRIMARY KEY (`Service_Type`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`servicesID`,`HouseholddetailID`),
  ADD KEY `fk_Services_Householddetails1_idx` (`HouseholddetailID`);

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
-- AUTO_INCREMENT for table `areas_treated`
--
ALTER TABLE `areas_treated`
  MODIFY `AreaTreatedID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeNo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `findings`
--
ALTER TABLE `findings`
  MODIFY `idFindings` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_services`
--
ALTER TABLE `general_services`
  MODIFY `GeneralServiceID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item_list`
--
ALTER TABLE `item_list`
  MODIFY `ControlNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_order`
--
ALTER TABLE `job_order`
  MODIFY `JONumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `occular_visits`
--
ALTER TABLE `occular_visits`
  MODIFY `Occular_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `pending_order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `ref_area_type`
--
ALTER TABLE `ref_area_type`
  MODIFY `area_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servicesID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `TeamIDno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termiteteammembers`
--
ALTER TABLE `termiteteammembers`
  MODIFY `TermiteTeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `termitetreatment_serviceperformance`
--
ALTER TABLE `termitetreatment_serviceperformance`
  MODIFY `TTSPIDNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `termite_details`
--
ALTER TABLE `termite_details`
  MODIFY `FindingsIDNO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termite_team`
--
ALTER TABLE `termite_team`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- Constraints for table `areas_treated`
--
ALTER TABLE `areas_treated`
  ADD CONSTRAINT `fk_AreasTreated_Householddetails1` FOREIGN KEY (`HouseholdIDdetails`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_Findings_Householddetails2` FOREIGN KEY (`HHID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `general_services`
--
ALTER TABLE `general_services`
  ADD CONSTRAINT `fK_pending_order` FOREIGN KEY (`pending_order`) REFERENCES `pending_order` (`pending_order_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_GENERAL_SERVICES_Ref_Service_type1` FOREIGN KEY (`Service_Type`) REFERENCES `ref_service_type` (`Service_Type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_General Services_Job Order1` FOREIGN KEY (`JobOrder_JONumber`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `householdpesttreatment`
--
ALTER TABLE `householdpesttreatment`
  ADD CONSTRAINT `fk_Household Pest Treatment_Job Order1` FOREIGN KEY (`JobOrder_JONumber`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_household pest treatment_inventory1` FOREIGN KEY (`inventory_ProductID`) REFERENCES `inventory` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `householdpms_report`
--
ALTER TABLE `householdpms_report`
  ADD CONSTRAINT `fk_HOUSEHOLDPMS_REPORT_HOUSEHOLDPESTTREATMENT1` FOREIGN KEY (`HousholdCaseIDNO`) REFERENCES `householdpesttreatment` (`ControlNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `household_details`
--
ALTER TABLE `household_details`
  ADD CONSTRAINT `fk_Householddetails_Findings1` FOREIGN KEY (`Findings`) REFERENCES `findings` (`idFindings`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fk_Services_Householddetails1` FOREIGN KEY (`HouseholddetailID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
