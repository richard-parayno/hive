-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: testcase
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `action_done`
--

DROP TABLE IF EXISTS `action_done`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_done` (
  `ActiondoneID` int(11) NOT NULL AUTO_INCREMENT,
  `TTSPIDno` int(11) NOT NULL,
  `WoodTreatment` varchar(45) DEFAULT NULL,
  `SoilTreatment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ActiondoneID`,`TTSPIDno`),
  KEY `fk_Actiondone_termite treatment service performance1_idx` (`TTSPIDno`),
  CONSTRAINT `fk_Actiondone_termite treatment service performance1` FOREIGN KEY (`TTSPIDno`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_done`
--

LOCK TABLES `action_done` WRITE;
/*!40000 ALTER TABLE `action_done` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_done` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_infection`
--

DROP TABLE IF EXISTS `area_infection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_infection` (
  `AI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HHID` int(11) NOT NULL,
  `Area_Infection` int(230) NOT NULL,
  PRIMARY KEY (`AI_ID`),
  KEY `fk_householdDetailsID_idx` (`HHID`),
  CONSTRAINT `fk_householdDetailsID` FOREIGN KEY (`HHID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_infection`
--

LOCK TABLES `area_infection` WRITE;
/*!40000 ALTER TABLE `area_infection` DISABLE KEYS */;
/*!40000 ALTER TABLE `area_infection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_type`
--

DROP TABLE IF EXISTS `area_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_type` (
  `area_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(45) NOT NULL,
  `HHID` int(11) NOT NULL,
  PRIMARY KEY (`area_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_type`
--

LOCK TABLES `area_type` WRITE;
/*!40000 ALTER TABLE `area_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `area_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_table_inventory`
--

DROP TABLE IF EXISTS `audit_table_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_table_inventory` (
  `Audit_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(11) NOT NULL,
  `Product_name` varchar(45) NOT NULL,
  `Brand_Name` varchar(45) NOT NULL,
  `Quantity_Used` int(11) NOT NULL,
  `Date_Used` date NOT NULL,
  `Audit_Table_Inventorycol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Audit_ID`,`Product_ID`),
  KEY `fk_Audit_Table_Inventory_INVENTORY1_idx` (`Product_ID`),
  CONSTRAINT `fk_Audit_Table_Inventory_INVENTORY1` FOREIGN KEY (`Product_ID`) REFERENCES `inventory` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_table_inventory`
--

LOCK TABLES `audit_table_inventory` WRITE;
/*!40000 ALTER TABLE `audit_table_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_table_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract` (
  `idContract` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) NOT NULL,
  `Supervisedby` int(11) NOT NULL,
  `JobOrder` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `TimeSigned` time NOT NULL,
  `EndDate` date NOT NULL,
  PRIMARY KEY (`idContract`),
  KEY `fk_Contract_job order1_idx` (`JobOrder`),
  CONSTRAINT `fk_Contract_job order1` FOREIGN KEY (`JobOrder`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contract`
--

LOCK TABLES `contract` WRITE;
/*!40000 ALTER TABLE `contract` DISABLE KEYS */;
/*!40000 ALTER TABLE `contract` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `CustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `ContactNo` varchar(11) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `CustomerStatus` varchar(45) NOT NULL,
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Richard Parayno','09151725420','#28 Gallego Street, Camp Aguinaldo, Quezon City',''),(2,'Sean Coronel','123456','99 Whiteplains Sarangaya','Active'),(3,'Yuri Banawa','567890','Taft Manila','Active'),(4,'','','',''),(5,'','','',''),(6,'','','',''),(7,'','','','');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `EmployeeNo` int(8) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `ContactNo` varchar(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `EmployeePosition` varchar(45) NOT NULL,
  PRIMARY KEY (`EmployeeNo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Sheila Facuri','09171234567','2016-11-01','2016-12-31','Accountant'),(2,'Mary Jane Botona','09178239118','2016-11-01','2016-12-31','Supervisor'),(3,'Richard Parayno','09171111111','2016-11-01','2016-12-31','Supervisor'),(4,'Deanne Baldemor','09182736453','2016-11-01','2016-12-31','Supervisor'),(5,'Paul Galang','09172836472','2016-11-01','2016-12-31','Worker'),(6,'Alex Espiritu','09172837461','2016-11-01','2016-12-31','Worker'),(7,'Manuel Toleran','09172837465','2016-11-01','2016-12-31','Worker'),(8,'Ana Laid','09172839401','2016-11-01','2016-12-31','Worker'),(9,'Hanz Arce','09172837465','2016-11-01','2016-12-31','Worker'),(10,'Paula Casas','09172834321','2016-11-01','2016-12-31','Worker');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `findings`
--

DROP TABLE IF EXISTS `findings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `findings` (
  `Findings_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HHID` int(11) NOT NULL,
  `Finding` varchar(50) NOT NULL,
  PRIMARY KEY (`Findings_ID`),
  KEY `fk_household_details_ID_idx` (`HHID`),
  CONSTRAINT `fk_household_details_ID` FOREIGN KEY (`HHID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `findings`
--

LOCK TABLES `findings` WRITE;
/*!40000 ALTER TABLE `findings` DISABLE KEYS */;
/*!40000 ALTER TABLE `findings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_services`
--

DROP TABLE IF EXISTS `general_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_services` (
  `GeneralServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `JobOrder_JONumber` int(11) NOT NULL,
  `Service_Type` varchar(45) NOT NULL,
  `pending_order` int(11) DEFAULT NULL,
  `TeamID` int(11) DEFAULT NULL,
  PRIMARY KEY (`GeneralServiceID`),
  KEY `fk_General Services_Job Order1_idx` (`JobOrder_JONumber`),
  KEY `fK_pending_order_idx` (`pending_order`),
  KEY `fk_TeamID_idx` (`TeamID`),
  CONSTRAINT `fK_pending_order` FOREIGN KEY (`pending_order`) REFERENCES `pending_order` (`pending_order_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_General Services_Job Order1` FOREIGN KEY (`JobOrder_JONumber`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TeamID` FOREIGN KEY (`TeamID`) REFERENCES `team` (`TeamIDno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_services`
--

LOCK TABLES `general_services` WRITE;
/*!40000 ALTER TABLE `general_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `general_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `household_details`
--

DROP TABLE IF EXISTS `household_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `household_details` (
  `householddetails` int(11) NOT NULL AUTO_INCREMENT,
  `hhpmr` int(11) NOT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `clientremarks` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`householddetails`,`hhpmr`),
  KEY `fk_Householddetails_household pest management service repor_idx` (`hhpmr`),
  CONSTRAINT `fk_Householddetails_household pest management service report1` FOREIGN KEY (`hhpmr`) REFERENCES `householdpms_report` (`HPMSRIDNo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `household_details`
--

LOCK TABLES `household_details` WRITE;
/*!40000 ALTER TABLE `household_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `household_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `householdpesttreatment`
--

DROP TABLE IF EXISTS `householdpesttreatment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `householdpesttreatment` (
  `ControlNumber` int(11) NOT NULL AUTO_INCREMENT,
  `JobOrder_JONumber` int(11) NOT NULL,
  `inventory_ProductID` int(11) DEFAULT NULL,
  `qtytobeused` int(11) DEFAULT NULL,
  `teamId` int(11) DEFAULT NULL,
  PRIMARY KEY (`ControlNumber`),
  KEY `fk_Household Pest Treatment_Job Order1_idx` (`JobOrder_JONumber`),
  KEY `fk_household pest treatment_inventory1_idx` (`inventory_ProductID`),
  KEY `fk_teamID_idx` (`teamId`),
  CONSTRAINT `fk_Household Pest Treatment_Job Order1` FOREIGN KEY (`JobOrder_JONumber`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_household pest treatment_inventory1` FOREIGN KEY (`inventory_ProductID`) REFERENCES `inventory` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_team` FOREIGN KEY (`teamId`) REFERENCES `team` (`TeamIDno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `householdpesttreatment`
--

LOCK TABLES `householdpesttreatment` WRITE;
/*!40000 ALTER TABLE `householdpesttreatment` DISABLE KEYS */;
INSERT INTO `householdpesttreatment` VALUES (1,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `householdpesttreatment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `householdpms_report`
--

DROP TABLE IF EXISTS `householdpms_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `householdpms_report` (
  `HPMSRIDNo` int(11) NOT NULL AUTO_INCREMENT,
  `Timestarted` time NOT NULL,
  `Timefinished` time NOT NULL,
  `CustomerRepresentative` int(11) NOT NULL,
  `HousholdCaseIDNO` int(11) NOT NULL,
  PRIMARY KEY (`HPMSRIDNo`),
  KEY `fk_HOUSEHOLDPMS_REPORT_HOUSEHOLDPESTTREATMENT1_idx` (`HousholdCaseIDNO`),
  CONSTRAINT `fk_HOUSEHOLDPMS_REPORT_HOUSEHOLDPESTTREATMENT1` FOREIGN KEY (`HousholdCaseIDNO`) REFERENCES `householdpesttreatment` (`ControlNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `householdpms_report`
--

LOCK TABLES `householdpms_report` WRITE;
/*!40000 ALTER TABLE `householdpms_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `householdpms_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(45) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Volume` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `ItemBrand` varchar(45) NOT NULL,
  `Reason_for_removal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_list`
--

DROP TABLE IF EXISTS `item_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_list` (
  `ControlNumber` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_ProductID` int(11) NOT NULL,
  `TermiteIDno` int(11) NOT NULL,
  PRIMARY KEY (`ControlNumber`,`inventory_ProductID`),
  KEY `fk_itemlist_inventory1_idx` (`inventory_ProductID`),
  KEY `fk_itemlist_termite treatment service performance1_idx` (`TermiteIDno`),
  CONSTRAINT `fk_itemlist_inventory1` FOREIGN KEY (`inventory_ProductID`) REFERENCES `inventory` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemlist_termite treatment service performance1` FOREIGN KEY (`TermiteIDno`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_list`
--

LOCK TABLES `item_list` WRITE;
/*!40000 ALTER TABLE `item_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_order`
--

DROP TABLE IF EXISTS `job_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_order` (
  `JONumber` int(11) NOT NULL AUTO_INCREMENT,
  `AEinCharge` int(11) DEFAULT NULL,
  `Supervisor` int(8) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `CustomerId` int(11) NOT NULL,
  `OCCULAR_ID` int(11) DEFAULT NULL,
  `Total_Payment` decimal(9,2) DEFAULT NULL,
  `Structure_Type` varchar(45) DEFAULT NULL,
  `job_type` varchar(45) DEFAULT NULL,
  `job_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`JONumber`),
  KEY `fk_job order_customer1_idx` (`CustomerId`),
  KEY `fk_job order_employee2_idx` (`Supervisor`),
  KEY `fk_JOB_ORDER_OCCULAR_VISITS1_idx` (`OCCULAR_ID`),
  KEY `fk_JOB_ORDER_EMPLOYEE1_idx` (`AEinCharge`),
  CONSTRAINT `fk_JOB_ORDER_EMPLOYEE1` FOREIGN KEY (`AEinCharge`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_JOB_ORDER_OCCULAR_VISITS1` FOREIGN KEY (`OCCULAR_ID`) REFERENCES `occular_visits` (`Occular_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_job order_customer1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`CustomerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_job order_employee2` FOREIGN KEY (`Supervisor`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_order`
--

LOCK TABLES `job_order` WRITE;
/*!40000 ALTER TABLE `job_order` DISABLE KEYS */;
INSERT INTO `job_order` VALUES (1,NULL,NULL,'2017-03-18 00:00:00','2017-03-18 00:00:00',1,2,0.00,'Resident','Household Service','Accomplished');
/*!40000 ALTER TABLE `job_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `occular_visits`
--

DROP TABLE IF EXISTS `occular_visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `occular_visits` (
  `Occular_ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Recommendation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Occular_ID`),
  KEY `fk_Occular Visits_customer1_idx` (`CustomerID`),
  KEY `fk_OCCULAR_VISITS_EMPLOYEE1_idx` (`SupervisedBy`),
  KEY `fk_OCCULAR_VISITS_EMPLOYEE2_idx` (`Call_Received_By`),
  KEY `pending_order_idx` (`pending_order`),
  CONSTRAINT `fk_OCCULAR_VISITS_EMPLOYEE1` FOREIGN KEY (`SupervisedBy`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OCCULAR_VISITS_EMPLOYEE2` FOREIGN KEY (`Call_Received_By`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Occular Visits_customer1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pending_order` FOREIGN KEY (`pending_order`) REFERENCES `pending_order` (`pending_order_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `occular_visits`
--

LOCK TABLES `occular_visits` WRITE;
/*!40000 ALTER TABLE `occular_visits` DISABLE KEYS */;
INSERT INTO `occular_visits` VALUES (1,1,NULL,'2017-04-01 00:00:00','Active',NULL,'Sean Coronel',NULL,NULL,NULL,NULL,1,NULL),(2,1,NULL,'2017-03-29 00:00:00','Active',NULL,'Marc Allen',NULL,NULL,4,3,2,'HouseHold Service');
/*!40000 ALTER TABLE `occular_visits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_order`
--

DROP TABLE IF EXISTS `pending_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_order` (
  `pending_order_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Job_order_type` varchar(45) NOT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `employee_recieved` int(8) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `customerType` int(11) DEFAULT NULL,
  `Area_type` varchar(45) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `remarks` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`pending_order_Id`),
  KEY `_idx` (`employee_recieved`),
  CONSTRAINT `employee` FOREIGN KEY (`employee_recieved`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_order`
--

LOCK TABLES `pending_order` WRITE;
/*!40000 ALTER TABLE `pending_order` DISABLE KEYS */;
INSERT INTO `pending_order` VALUES (1,'Termite Treatment','#28 Gallego Street, Camp Aguinaldo, Quezon Ci',1,3,'2017-03-31',1,'Household','Pending',''),(2,'HouseHold Services','Cup Fiction Whiteplains',2,1,'2017-03-31',1,'Resident','Active',''),(3,'','',4,3,'0000-00-00',1,'','Pending',''),(4,'','',5,3,'0000-00-00',1,'','Pending',''),(5,'','',6,3,'0000-00-00',1,'','Pending',''),(6,'','',7,3,'0000-00-00',1,'','Pending','');
/*!40000 ALTER TABLE `pending_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_job_type`
--

DROP TABLE IF EXISTS `ref_job_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_job_type` (
  `job_type_id` int(11) NOT NULL,
  `job_type` varchar(45) NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_job_type`
--

LOCK TABLES `ref_job_type` WRITE;
/*!40000 ALTER TABLE `ref_job_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_job_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_recommendation`
--

DROP TABLE IF EXISTS `ref_recommendation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_recommendation` (
  `Recommendation` varchar(45) NOT NULL,
  PRIMARY KEY (`Recommendation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_recommendation`
--

LOCK TABLES `ref_recommendation` WRITE;
/*!40000 ALTER TABLE `ref_recommendation` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_recommendation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `Services_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HHID` int(11) NOT NULL,
  `Services` varchar(50) NOT NULL,
  PRIMARY KEY (`Services_ID`,`HHID`),
  KEY `fk_household_details_id_idx` (`HHID`),
  CONSTRAINT `fk_householdDetails_ID` FOREIGN KEY (`HHID`) REFERENCES `household_details` (`householddetails`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `TeamIDno` int(11) NOT NULL AUTO_INCREMENT,
  `JobOrder_NO` int(11) DEFAULT NULL,
  PRIMARY KEY (`TeamIDno`),
  KEY `fk_Team_Job Order1_idx` (`JobOrder_NO`),
  CONSTRAINT `fk_Team_Job Order1` FOREIGN KEY (`JobOrder_NO`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_members` (
  `EmployeeNo` int(8) NOT NULL,
  `TeamIdNo` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeNo`,`TeamIdNo`),
  KEY `fk_TEAMMEMBERS_Employee_idx` (`EmployeeNo`),
  KEY `fk__team1_idx` (`TeamIdNo`),
  CONSTRAINT `fk_TEAMMEMBERS_Employee` FOREIGN KEY (`EmployeeNo`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk__team1` FOREIGN KEY (`TeamIdNo`) REFERENCES `team` (`TeamIDno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `termite_details`
--

DROP TABLE IF EXISTS `termite_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `termite_details` (
  `FindingsIDNO` int(11) NOT NULL AUTO_INCREMENT,
  `TTSPIDNO` int(11) NOT NULL,
  `Damage` varchar(50) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `partsdamaged` tinyint(1) NOT NULL,
  `Recommendation` varchar(45) NOT NULL,
  PRIMARY KEY (`FindingsIDNO`,`TTSPIDNO`),
  KEY `fk_Findings_termite treatment service performance1_idx` (`TTSPIDNO`),
  KEY `fk_Findings_Ref_Recommendation1_idx` (`Recommendation`),
  CONSTRAINT `fk_Findings_Ref_Recommendation1` FOREIGN KEY (`Recommendation`) REFERENCES `ref_recommendation` (`Recommendation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Findings_termite treatment service performance1` FOREIGN KEY (`TTSPIDNO`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `termite_details`
--

LOCK TABLES `termite_details` WRITE;
/*!40000 ALTER TABLE `termite_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `termite_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `termite_team`
--

DROP TABLE IF EXISTS `termite_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `termite_team` (
  `TeamID` int(11) NOT NULL AUTO_INCREMENT,
  `TTMSPIDno` int(11) NOT NULL,
  PRIMARY KEY (`TeamID`),
  KEY `fk_TERMITE_TEAM_TERMITETREATMENT_SERVICEPERFORMANCE1_idx` (`TTMSPIDno`),
  CONSTRAINT `fk_TERMITE_TEAM_TERMITETREATMENT_SERVICEPERFORMANCE1` FOREIGN KEY (`TTMSPIDno`) REFERENCES `termitetreatment_serviceperformance` (`TTSPIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `termite_team`
--

LOCK TABLES `termite_team` WRITE;
/*!40000 ALTER TABLE `termite_team` DISABLE KEYS */;
/*!40000 ALTER TABLE `termite_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `termiteteammembers`
--

DROP TABLE IF EXISTS `termiteteammembers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `termiteteammembers` (
  `TermiteTeamID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployeeNo` int(11) NOT NULL,
  PRIMARY KEY (`TermiteTeamID`,`EmployeeNo`),
  KEY `fk_Termite Team Members_employee1_idx` (`EmployeeNo`),
  CONSTRAINT `fk_Termite Team Members_Termite Team1` FOREIGN KEY (`TermiteTeamID`) REFERENCES `termite_team` (`TeamID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Termite Team Members_employee1` FOREIGN KEY (`EmployeeNo`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `termiteteammembers`
--

LOCK TABLES `termiteteammembers` WRITE;
/*!40000 ALTER TABLE `termiteteammembers` DISABLE KEYS */;
/*!40000 ALTER TABLE `termiteteammembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `termitetreatment_serviceperformance`
--

DROP TABLE IF EXISTS `termitetreatment_serviceperformance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `termitetreatment_serviceperformance` (
  `TTSPIDNO` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`TTSPIDNO`),
  KEY `fk_termite treatment service performance_Termite Team1_idx` (`TeamID`),
  KEY `fk_termite treatment service performance_job order1_idx` (`JobORderNo`),
  KEY `fk_termite treatment service performance_Actiondone1_idx` (`ActionsIDNO`),
  KEY `fk_termite treatment service performance_TermiteDetails1_idx` (`FindingsIdNO`),
  KEY `fk_termite treatment service performance_Contract1_idx` (`ContractID`),
  CONSTRAINT `fk_termite treatment service performance_Actiondone1` FOREIGN KEY (`ActionsIDNO`) REFERENCES `action_done` (`ActiondoneID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_termite treatment service performance_Contract1` FOREIGN KEY (`ContractID`) REFERENCES `contract` (`idContract`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_termite treatment service performance_Termite Team1` FOREIGN KEY (`TeamID`) REFERENCES `termite_team` (`TeamID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_termite treatment service performance_TermiteDetails1` FOREIGN KEY (`FindingsIdNO`) REFERENCES `termite_details` (`FindingsIDNO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_termite treatment service performance_job order1` FOREIGN KEY (`JobORderNo`) REFERENCES `job_order` (`JONumber`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `termitetreatment_serviceperformance`
--

LOCK TABLES `termitetreatment_serviceperformance` WRITE;
/*!40000 ALTER TABLE `termitetreatment_serviceperformance` DISABLE KEYS */;
INSERT INTO `termitetreatment_serviceperformance` VALUES (1,'2017-03-23 00:00:00','1','2',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `termitetreatment_serviceperformance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserIdno` int(8) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `UserType` int(11) NOT NULL,
  PRIMARY KEY (`Username`),
  KEY `fk_Users_employee1` (`UserIdno`),
  CONSTRAINT `fk_Users_employee1` FOREIGN KEY (`UserIdno`) REFERENCES `employee` (`EmployeeNo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'operations','pass123!',2),(1,'sales','pass123!',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'testcase'
--

--
-- Dumping routines for database 'testcase'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28 13:36:38
