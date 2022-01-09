-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 03:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `Building_id` int(11) NOT NULL,
  `Building_name` varchar(50) NOT NULL,
  `Building_physical_location` varchar(50) NOT NULL,
  `Building_floor_count` int(11) NOT NULL,
  `Building_room_count` int(11) NOT NULL,
  `Building_Owner_id` int(11) NOT NULL,
  `Building_Property_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`Building_id`, `Building_name`, `Building_physical_location`, `Building_floor_count`, `Building_room_count`, `Building_Owner_id`, `Building_Property_type_id`) VALUES
(2000, 'Jubilee', 'Nairobi CBD', 40, 500, 8, 1006),
(2002, 'Fort Tress', 'Nairobi', 30, 300, 6, 1006),
(2003, '680', 'Nairobi', 50, 630, 6, 1006);

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `Land_id` int(11) NOT NULL,
  `Land_longitudes` varchar(20) NOT NULL,
  `Land_Latitudes` varchar(20) NOT NULL,
  `Land_current_market_price` int(10) NOT NULL,
  `Land_physical_location` varchar(20) NOT NULL,
  `Land_nearest_landmark` varchar(20) NOT NULL,
  `Land_Size` int(10) NOT NULL,
  `Land_Title_no` varchar(30) NOT NULL,
  `Land_Owner_id` int(11) NOT NULL,
  `Land_Property_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`Land_id`, `Land_longitudes`, `Land_Latitudes`, `Land_current_market_price`, `Land_physical_location`, `Land_nearest_landmark`, `Land_Size`, `Land_Title_no`, `Land_Owner_id`, `Land_Property_type_id`) VALUES
(2, '37', '56', 2000000, 'Maimahiu', 'Big Stone', 30, '12349876', 6, 1003),
(3, '34', '35', 2300000, 'Nakuru', 'Lake Naivasha', 26, '564319', 3, 1003),
(3000, '45.8', '32.34', 3000000, 'Narok', 'Forest', 17, 'A2R674E21', 4, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Login_id` int(11) NOT NULL,
  `Login_user_name` varchar(255) NOT NULL,
  `Login_password` varchar(300) NOT NULL,
  `Login_rank` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Login_id`, `Login_user_name`, `Login_password`, `Login_rank`) VALUES
(11, 'slala', '388ec3e3fa4983032b4f3e7d8fcb65ad', 1),
(12, 'jcena', '5af0588973c798ad5b60e33248c85410', 1),
(13, 'mkatami', '11df1ae29d6893e69b5eb99e224d4a21', 1),
(15, 'motieno', '34afc98da14b2fcd3dc29c979701f2c5', 1),
(16, 'admin', '5af0588973c798ad5b60e33248c85410', 1),
(17, 'gngumba', '1a1dc91c907325c69271ddf0c944bc72', 1),
(22, 'jklopp', 'c47d187067c6cf953245f128b5fde62a', 2),
(23, 'mjuma', 'd2b875464b1dbe5f78c6adbb289c098d', 2),
(24, 'mcuban', '1a1dc91c907325c69271ddf0c944bc72', 2),
(25, 'lih', '1a1dc91c907325c69271ddf0c944bc72', 1);

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE `machinery` (
  `Machinery_id` int(11) NOT NULL,
  `Machinery_name` varchar(50) NOT NULL,
  `Machinery_acquisition_date` date NOT NULL,
  `Machinery_inspection_date` date NOT NULL,
  `Machinery_purpose` text NOT NULL,
  `Machinery_Ref_no` varchar(50) NOT NULL,
  `Machinery_manufucturer` varchar(255) NOT NULL,
  `Machinery_year_of_manufucturing` date NOT NULL,
  `Machinery_Owner_id` int(11) NOT NULL,
  `Machinery_Property_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machinery`
--

INSERT INTO `machinery` (`Machinery_id`, `Machinery_name`, `Machinery_acquisition_date`, `Machinery_inspection_date`, `Machinery_purpose`, `Machinery_Ref_no`, `Machinery_manufucturer`, `Machinery_year_of_manufucturing`, `Machinery_Owner_id`, `Machinery_Property_type_id`) VALUES
(4000, 'Harvester', '2021-07-27', '2019-07-10', 'Harvesting', 'AS56ER321', 'Oxford', '0000-00-00', 8, 1005),
(4001, 'Tractor', '2014-06-05', '2020-04-01', 'Farming', '34568876', 'Oxford', '2012-01-12', 4, 1005);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Owner_id` int(11) NOT NULL,
  `Owner_first_name` varchar(20) NOT NULL,
  `Owner_last_name` varchar(20) NOT NULL,
  `Owner_contact` varchar(15) NOT NULL,
  `Owner_email` varchar(100) NOT NULL,
  `Owner_national_id` varchar(10) NOT NULL,
  `Owner_Login_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_id`, `Owner_first_name`, `Owner_last_name`, `Owner_contact`, `Owner_email`, `Owner_national_id`, `Owner_Login_id`) VALUES
(2, 'Lala', 'Salama', '2345678', 'slala@gmail.com', '234567', 11),
(3, 'John', 'Cena', '0715342375', 'johncena@gmail.com', '23456531', 12),
(4, 'Morris', 'Katami', '071234566', 'mkatami@gmail.com', '89341234', 13),
(6, 'Michael', 'Otieno', '0988765453', 'motieno@gmail.com', '23564123', 15),
(7, 'Super', 'Admin', '0717856432', 'admin@localhostcom', '56432123', 16),
(8, 'Gravin', 'Ngumba', '0722946750', 'ngumba@gmail.com', '35809345', 17),
(10, 'Lih', 'Ingabo', '0716909935', 'ustadhlee17@gmail.com', '36467492', 25);

-- --------------------------------------------------------

--
-- Table structure for table `property_inspection`
--

CREATE TABLE `property_inspection` (
  `Inspection_id` int(11) NOT NULL,
  `Inspection_date` date NOT NULL DEFAULT current_timestamp(),
  `Inspection_Provider_id` int(11) NOT NULL,
  `Inspection_property_type_id` int(11) NOT NULL,
  `Inspection_Machinery_id` int(11) DEFAULT NULL,
  `Inspection_Building_id` int(11) DEFAULT NULL,
  `Inspection_Land_id` int(11) DEFAULT NULL,
  `Inspection_Vehicle_id` int(11) DEFAULT NULL,
  `Inspection_report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_inspection`
--

INSERT INTO `property_inspection` (`Inspection_id`, `Inspection_date`, `Inspection_Provider_id`, `Inspection_property_type_id`, `Inspection_Machinery_id`, `Inspection_Building_id`, `Inspection_Land_id`, `Inspection_Vehicle_id`, `Inspection_report`) VALUES
(5, '2021-07-27', 5, 1002, 4000, 2000, 3, 5000, 'Inspected All Property'),
(10, '2021-07-27', 4, 1002, NULL, NULL, NULL, 5000, 'Good Condition'),
(11, '2021-07-27', 6, 1003, NULL, NULL, 3, NULL, 'Land in Nakuru is in good condition'),
(12, '2021-07-27', 5, 1005, 4001, NULL, NULL, NULL, 'Tractor not road worthy');

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `Property_type_id` int(11) NOT NULL,
  `Property_type_name` varchar(50) NOT NULL,
  `Property_type_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`Property_type_id`, `Property_type_name`, `Property_type_desc`) VALUES
(1002, 'vehicle', 'Commercial vehicles'),
(1003, 'land', 'Commercial land'),
(1005, 'machinery', 'Commercial machinery'),
(1006, 'building', 'Commercial Buildings'),
(1007, 'all', 'ALL PROPERTY');

-- --------------------------------------------------------

--
-- Table structure for table `property_valuation`
--

CREATE TABLE `property_valuation` (
  `Valuation_id` int(11) NOT NULL,
  `Valuation_date` date NOT NULL DEFAULT current_timestamp(),
  `Valuation_Provider_id` int(11) NOT NULL,
  `Valuation_property_type_id` int(11) NOT NULL,
  `Valuation_Machinery_id` int(11) DEFAULT NULL,
  `Valuation_Building_id` int(11) DEFAULT NULL,
  `Valuation_Land_id` int(11) DEFAULT NULL,
  `Valuation_Vehicle_id` int(11) DEFAULT NULL,
  `Valuation_report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_valuation`
--

INSERT INTO `property_valuation` (`Valuation_id`, `Valuation_date`, `Valuation_Provider_id`, `Valuation_property_type_id`, `Valuation_Machinery_id`, `Valuation_Building_id`, `Valuation_Land_id`, `Valuation_Vehicle_id`, `Valuation_report`) VALUES
(4, '2021-07-27', 5, 1005, 4000, NULL, NULL, NULL, 'Harvester is in perfect condition');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_id` int(11) NOT NULL,
  `Service_name` varchar(50) NOT NULL,
  `Service_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_id`, `Service_name`, `Service_desc`) VALUES
(2, 'Inspection', 'Inspection of Property'),
(3, 'Valuation', 'Valuation of property');

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `Provider_id` int(11) NOT NULL,
  `Provider_company_name` varchar(50) NOT NULL,
  `Provider_contact_person` varchar(50) NOT NULL,
  `Provider_email` varchar(50) NOT NULL,
  `Provider_mobile_no` varchar(15) NOT NULL,
  `Provider_location` varchar(20) NOT NULL,
  `Provider_Login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`Provider_id`, `Provider_company_name`, `Provider_contact_person`, `Provider_email`, `Provider_mobile_no`, `Provider_location`, `Provider_Login_id`) VALUES
(4, 'Britam', 'Jurgen Klopptain', 'klopp@gmail.com', '0978546345', 'Nairobi CBD', 22),
(5, 'NSSF', 'Musa Juma', 'juma@yahoo.com', '0978564323', 'Kitale', 23),
(6, 'Jubilee', 'Mark Cuban', 'cuban@gmail.com', '0978546674', 'Thika Road', 24);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_services`
--

CREATE TABLE `service_provider_services` (
  `Provider_Services_id` int(11) NOT NULL,
  `Provider_Services_PROVIDER_ID` int(11) NOT NULL,
  `Provider_Services_SERVICE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider_services`
--

INSERT INTO `service_provider_services` (`Provider_Services_id`, `Provider_Services_PROVIDER_ID`, `Provider_Services_SERVICE_ID`) VALUES
(3, 4, 2),
(4, 5, 3),
(5, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_id` int(11) NOT NULL,
  `Vehicle_model` varchar(20) NOT NULL,
  `Vehicle_registration_no` varchar(50) NOT NULL,
  `Vehicle_brand` varchar(50) NOT NULL,
  `Vehicle_color` varchar(20) NOT NULL,
  `Vehicle_current_mileage` int(11) NOT NULL,
  `Vehicle_date_received` date NOT NULL,
  `Vehicle_current_market_price` varchar(10) NOT NULL,
  `Vehicle_year_of_manufucturing` date NOT NULL,
  `Vehicle_CHasis_no` varchar(50) NOT NULL,
  `Vehicle_Owner_id` int(11) NOT NULL,
  `Vehicle_Property_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_id`, `Vehicle_model`, `Vehicle_registration_no`, `Vehicle_brand`, `Vehicle_color`, `Vehicle_current_mileage`, `Vehicle_date_received`, `Vehicle_current_market_price`, `Vehicle_year_of_manufucturing`, `Vehicle_CHasis_no`, `Vehicle_Owner_id`, `Vehicle_Property_type_id`) VALUES
(1, 'a8', 'KDF 007F', 'Audi', 'black', 45, '2021-06-27', '4000000', '2000-08-11', '83517452904527843', 6, 1002),
(5000, '2012', 'KBT-007Y', 'mazda', 'blue', 45, '2020-05-03', '1200000', '2012-05-03', '67431267890543275', 6, 1002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`Building_id`),
  ADD KEY `Building_Owner_id` (`Building_Owner_id`),
  ADD KEY `Building_Property_type_id` (`Building_Property_type_id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`Land_id`),
  ADD KEY `Land_Owner_id` (`Land_Owner_id`),
  ADD KEY `Land_Property_type_id` (`Land_Property_type_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `machinery`
--
ALTER TABLE `machinery`
  ADD PRIMARY KEY (`Machinery_id`),
  ADD KEY `Machinery_Owner_id` (`Machinery_Owner_id`),
  ADD KEY `Machinery_Property_type_id` (`Machinery_Property_type_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Owner_id`),
  ADD KEY `Owner_Login_id` (`Owner_Login_id`);

--
-- Indexes for table `property_inspection`
--
ALTER TABLE `property_inspection`
  ADD PRIMARY KEY (`Inspection_id`),
  ADD KEY `Inspection_Building_id` (`Inspection_Building_id`),
  ADD KEY `Inspection_Land_id` (`Inspection_Land_id`),
  ADD KEY `Inspection_Machinery_id` (`Inspection_Machinery_id`),
  ADD KEY `Inspection_property_type_id` (`Inspection_property_type_id`),
  ADD KEY `Inspection_Provider_id` (`Inspection_Provider_id`),
  ADD KEY `Inspection_Vehicle_id` (`Inspection_Vehicle_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`Property_type_id`);

--
-- Indexes for table `property_valuation`
--
ALTER TABLE `property_valuation`
  ADD PRIMARY KEY (`Valuation_id`),
  ADD KEY `Valuation_Building_id` (`Valuation_Building_id`),
  ADD KEY `Valuation_Land_id` (`Valuation_Land_id`),
  ADD KEY `Valuation_Machinery_id` (`Valuation_Machinery_id`),
  ADD KEY `Valuation_property_type_id` (`Valuation_property_type_id`),
  ADD KEY `Valuation_Provider_id` (`Valuation_Provider_id`),
  ADD KEY `Valuation_Vehicle_id` (`Valuation_Vehicle_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`Provider_id`),
  ADD KEY `Provider_Login_id` (`Provider_Login_id`);

--
-- Indexes for table `service_provider_services`
--
ALTER TABLE `service_provider_services`
  ADD PRIMARY KEY (`Provider_Services_id`),
  ADD KEY `Provider_Services_PROVIDER_ID` (`Provider_Services_PROVIDER_ID`),
  ADD KEY `Provider_Services_SERVICE_ID` (`Provider_Services_SERVICE_ID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_id`),
  ADD KEY `Vehicle_Owner_id` (`Vehicle_Owner_id`),
  ADD KEY `Vehicle_Property_type_id` (`Vehicle_Property_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `Building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;

--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `Land_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3001;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `machinery`
--
ALTER TABLE `machinery`
  MODIFY `Machinery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4002;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `Owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_inspection`
--
ALTER TABLE `property_inspection`
  MODIFY `Inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `Property_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `property_valuation`
--
ALTER TABLE `property_valuation`
  MODIFY `Valuation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `Provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_provider_services`
--
ALTER TABLE `service_provider_services`
  MODIFY `Provider_Services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `Vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5001;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`Building_Owner_id`) REFERENCES `owner` (`Owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `building_ibfk_2` FOREIGN KEY (`Building_Property_type_id`) REFERENCES `property_type` (`Property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `land`
--
ALTER TABLE `land`
  ADD CONSTRAINT `land_ibfk_1` FOREIGN KEY (`Land_Owner_id`) REFERENCES `owner` (`Owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `land_ibfk_2` FOREIGN KEY (`Land_Property_type_id`) REFERENCES `property_type` (`Property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `machinery`
--
ALTER TABLE `machinery`
  ADD CONSTRAINT `machinery_ibfk_1` FOREIGN KEY (`Machinery_Owner_id`) REFERENCES `owner` (`Owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `machinery_ibfk_2` FOREIGN KEY (`Machinery_Property_type_id`) REFERENCES `property_type` (`Property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`Owner_Login_id`) REFERENCES `login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_inspection`
--
ALTER TABLE `property_inspection`
  ADD CONSTRAINT `property_inspection_ibfk_1` FOREIGN KEY (`Inspection_Building_id`) REFERENCES `building` (`Building_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_inspection_ibfk_2` FOREIGN KEY (`Inspection_Land_id`) REFERENCES `land` (`Land_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_inspection_ibfk_3` FOREIGN KEY (`Inspection_Machinery_id`) REFERENCES `machinery` (`Machinery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_inspection_ibfk_4` FOREIGN KEY (`Inspection_property_type_id`) REFERENCES `property_type` (`Property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_inspection_ibfk_5` FOREIGN KEY (`Inspection_Provider_id`) REFERENCES `service_providers` (`Provider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_inspection_ibfk_6` FOREIGN KEY (`Inspection_Vehicle_id`) REFERENCES `vehicle` (`Vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_valuation`
--
ALTER TABLE `property_valuation`
  ADD CONSTRAINT `property_valuation_ibfk_1` FOREIGN KEY (`Valuation_Building_id`) REFERENCES `building` (`Building_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_valuation_ibfk_2` FOREIGN KEY (`Valuation_Land_id`) REFERENCES `land` (`Land_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_valuation_ibfk_3` FOREIGN KEY (`Valuation_Machinery_id`) REFERENCES `machinery` (`Machinery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_valuation_ibfk_4` FOREIGN KEY (`Valuation_property_type_id`) REFERENCES `property_type` (`Property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_valuation_ibfk_5` FOREIGN KEY (`Valuation_Provider_id`) REFERENCES `service_providers` (`Provider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_valuation_ibfk_6` FOREIGN KEY (`Valuation_Vehicle_id`) REFERENCES `vehicle` (`Vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD CONSTRAINT `service_providers_ibfk_1` FOREIGN KEY (`Provider_Login_id`) REFERENCES `login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_provider_services`
--
ALTER TABLE `service_provider_services`
  ADD CONSTRAINT `service_provider_services_ibfk_1` FOREIGN KEY (`Provider_Services_PROVIDER_ID`) REFERENCES `service_providers` (`Provider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_provider_services_ibfk_2` FOREIGN KEY (`Provider_Services_SERVICE_ID`) REFERENCES `services` (`Service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`Vehicle_Owner_id`) REFERENCES `owner` (`Owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`Vehicle_Property_type_id`) REFERENCES `property_type` (`Property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
