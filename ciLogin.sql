-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2020 at 09:31 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciLogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_fk_mug_id` int(11) DEFAULT NULL,
  `usr_patient_id` int(11) NOT NULL,
  `usr_firstname` varchar(255) DEFAULT NULL,
  `usr_lastname` varchar(255) DEFAULT NULL,
  `usr_email` varchar(255) DEFAULT NULL,
  `usr_degree` varchar(255) NOT NULL,
  `usr_password` varchar(255) DEFAULT NULL,
  `usr_temp_pass` varchar(255) DEFAULT NULL,
  `usr_birthdate` varchar(255) DEFAULT NULL,
  `usr_gender` int(11) DEFAULT NULL COMMENT '1=Male,  2=Female, 3=Other',
  `usr_education` varchar(255) DEFAULT NULL,
  `usr_bio` text,
  `usr_medical_msg` text,
  `usr_default_address` int(11) DEFAULT NULL COMMENT '1=Address_home,2=Address_office',
  `usr_phone` varchar(255) DEFAULT NULL,
  `usr_extension` varchar(255) DEFAULT NULL,
  `usr_pt_license` varchar(255) DEFAULT NULL,
  `usr_expiry_date` varchar(255) DEFAULT NULL,
  `usr_expiry_date_status` int(11) NOT NULL DEFAULT '0' COMMENT '1=Less then 15',
  `usr_pt_license_file` varchar(255) DEFAULT NULL,
  `usr_carrier_name` varchar(255) DEFAULT NULL,
  `usr_insurance_policy` varchar(255) DEFAULT NULL,
  `usr_insurance_limits` varchar(255) DEFAULT NULL,
  `usr_other_limit` varchar(255) NOT NULL,
  `usr_validity_date` varchar(255) DEFAULT NULL,
  `usr_validity_date_status` int(11) NOT NULL DEFAULT '0' COMMENT '1=Less then 15',
  `usr_pt_insurance_file` varchar(255) DEFAULT NULL,
  `usr_language` text,
  `usr_specialty` text,
  `usr_image` varchar(255) DEFAULT NULL,
  `is_medicare` int(11) NOT NULL DEFAULT '0' COMMENT '1=Yes,  2=No',
  `usr_parent_name` varchar(255) DEFAULT NULL,
  `usr_parent_phone` varchar(255) DEFAULT NULL,
  `usr_p_extension` varchar(255) DEFAULT NULL,
  `usr_parent_email` varchar(255) DEFAULT NULL,
  `usr_minors` varchar(255) DEFAULT NULL,
  `usr_personally` varchar(255) DEFAULT NULL,
  `usr_financially` varchar(255) DEFAULT NULL,
  `usr_hippa_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Not, 1=Yes',
  `usr_status` int(11) DEFAULT '0' COMMENT '0=Active, 1=Deactive',
  `usr_deleated` int(11) DEFAULT '0' COMMENT '0=Active, 1=Delete',
  `usr_created` varchar(255) DEFAULT NULL,
  `usr_updated` datetime DEFAULT NULL,
  `usr_last_login` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_fk_mug_id`, `usr_patient_id`, `usr_firstname`, `usr_lastname`, `usr_email`, `usr_degree`, `usr_password`, `usr_temp_pass`, `usr_birthdate`, `usr_gender`, `usr_education`, `usr_bio`, `usr_medical_msg`, `usr_default_address`, `usr_phone`, `usr_extension`, `usr_pt_license`, `usr_expiry_date`, `usr_expiry_date_status`, `usr_pt_license_file`, `usr_carrier_name`, `usr_insurance_policy`, `usr_insurance_limits`, `usr_other_limit`, `usr_validity_date`, `usr_validity_date_status`, `usr_pt_insurance_file`, `usr_language`, `usr_specialty`, `usr_image`, `is_medicare`, `usr_parent_name`, `usr_parent_phone`, `usr_p_extension`, `usr_parent_email`, `usr_minors`, `usr_personally`, `usr_financially`, `usr_hippa_status`, `usr_status`, `usr_deleated`, `usr_created`, `usr_updated`, `usr_last_login`) VALUES
(1, 1, 0, 'admin', 'admin', 'admin@gmail.com', '', '0e7517141fb53f21ee439b355b5a1d0a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, '1580810300'),
(52, NULL, 0, NULL, NULL, 'rahul@yopmail.com', '', '0e7517141fb53f21ee439b355b5a1d0a', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1581608857', NULL, '1581608857'),
(53, NULL, 0, NULL, NULL, 'ansh@yopmail.com', '', '0e7517141fb53f21ee439b355b5a1d0a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1581609086', NULL, '1581609086'),
(54, NULL, 0, NULL, NULL, 'anu@yopmail.com', '', '0e7517141fb53f21ee439b355b5a1d0a', 'd6a2d3da338ae22beed2b81e4e79da1a5311ff6f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '1581609226', NULL, '1581609226');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `ua_id` int(11) NOT NULL,
  `ua_fk_usr_id` int(11) DEFAULT NULL,
  `ua_type` int(11) DEFAULT NULL COMMENT '1=Home,  2=Office, 3=Other',
  `ua_unit` varchar(255) DEFAULT NULL,
  `ua_address` varchar(255) DEFAULT NULL,
  `ua_country` varchar(255) DEFAULT NULL,
  `ua_state` varchar(255) DEFAULT NULL,
  `ua_city` varchar(255) DEFAULT NULL,
  `ua_zip` varchar(255) DEFAULT NULL,
  `ua_lat` varchar(255) DEFAULT NULL,
  `ua_lng` varchar(255) DEFAULT NULL,
  `ua_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`ua_id`, `ua_fk_usr_id`, `ua_type`, `ua_unit`, `ua_address`, `ua_country`, `ua_state`, `ua_city`, `ua_zip`, `ua_lat`, `ua_lng`, `ua_status`) VALUES
(1, 25, 1, '', 'Patnipura Chauraha, Nanda Nagar, Indore, Madhya Pradesh 452008, India', 'India', 'Madhya Pradesh', 'Indore', '452008', '22.7398763', '75.88093800000001', 0),
(3, 27, 1, '', '94 Olive Street, Brooklyn, New York, USA', 'United States', 'New York', 'Toronto', '11211', '40.7157215', '-73.93887080000002', 0),
(4, 28, 1, '', '15 Olive Street, Brooklyn, NY, USA', 'United States', 'New York', 'Bloomfield', '11211', '40.7129784', '-73.93882880000001', 0),
(5, 25, 2, '', 'Bhawarkua Main Road, Indrapuri Colony, Bhanwar Kuwa, Indore, Madhya Pradesh, India', 'India', 'Madhya Pradesh', 'Indore', '452001', '22.7001285', '75.86347769999998', 0),
(6, 29, 1, '', 'LIG Main, LIG Colony, Indore, Madhya Pradesh, India', 'India', 'Madhya Pradesh', 'Indore', '452001', '22.7362534', '75.88636240000005', 0),
(7, 30, 1, '', '150 Olive Street, Brooklyn, NY, USA', 'United States', 'New York', 'Indore', '11211', '40.7160634', '-73.93901870000002', 0),
(8, 31, 1, '', '5000 New Jersey Turnpike, Newark, Union, NJ, USA', 'United States', 'New Jersey', 'Newark', '08109', '40.7146874', '-74.13937379999999', 0),
(9, 32, 1, '', '500 Broadway, New York, NY, USA', 'United States', 'New York', 'New York', '10012', '40.722002', '-73.9992178', 0),
(10, 32, 2, '', '200 Broadway, New York, NY, USA', 'United States', 'New York', 'New York', '10038', '40.7105274', '-74.00899370000002', 0),
(11, 33, 1, '', '500 Broadway, New York, NY, USA', 'United States', 'New York', 'New York', '10012', '40.722002', '-73.9992178', 0),
(12, 33, 2, '', '200 Broadway, New York, NY, USA', 'United States', 'New York', 'New York', '10038', '40.7105274', '-74.00899370000002', 0),
(13, 36, 1, '', '2000 Broadway, New York, NY, USA', 'United States', 'New York', 'New York', '10023', '40.7753589', '-73.98139600000002', 0),
(14, 36, 2, '', '1995 Broadway, New York, NY, USA', 'United States', 'New York', 'New York', '10023', '40.7754803', '-73.98265859999998', 0),
(16, 39, 1, '', '200 Broadway, New York, NY, USA', 'United States', 'New York', 'New York', '10038', '40.7105274', '-74.00899370000002', 0),
(17, 40, 1, '', '3830 Charthouse Circle, Westlake Village, CA, USA', 'United States', 'California', 'Westlake Village', '91361', '34.141161', '-118.82822729999998', 0),
(18, 41, 1, '', '3828 Charthouse Circle, Westlake Village, CA, USA', 'United States', 'California', 'Westlake Village', '91361', '34.14107389999999', '-118.82802240000001', 0),
(19, 42, 1, '', '200, Indore Bypass Road, County Walk Township, Indore, Madhya Pradesh, India', 'India', 'Madhya Pradesh', '', '', '22.7113985', '75.88319999999999', 0),
(20, 26, 2, '', 'Patnipura Chauraha, Nanda Nagar, Indore, Madhya Pradesh 452008, India', 'India', 'Madhya Pradesh', 'Indore', '452008', '22.7398763', '75.88093800000001', 0),
(21, 26, 3, '', '', 'USA', 'Dubai', 'Dubai', '', '25.2347373', '55.27864299999999', 0),
(23, 26, 1, '', 'BNN College Rd, Dhamankar Naka, Padma Nagar, Bhiwandi, Maharashtra 421302, India', 'India', 'Maharashtra', 'Bhiwandi', '421302', '19.2853064', '73.05518640000003', 0),
(24, 43, 1, '', 'test', 'Germany', 'Berlin', 'Berlin', '06720', '52.5289374', '13.37772330000007', 0),
(25, 43, 2, '', 'Indira Gandhi International T3 Road, New Delhi, Delhi, India', 'India', 'Delhi', 'New Delhi', '110037', '28.5535361', '77.09868289999997', 0),
(26, 43, 3, '', '', 'USA', 'Berlin', 'Berlin', '452011', '52.5289374', '13.37772330000007', 0),
(27, 44, 1, '', 'Indore Bypass Rd, Sampat Farms, Bicholi Mardana, Indore, Madhya Pradesh, India', 'India', 'Madhya Pradesh', 'Indore', '500081', '22.7027304', '75.92032089999998', 0),
(30, 44, 2, '', 'TT16 Tam ??o, Ph??ng 15, Qu?n 10, H? Chí Minh, Vietnam', 'Vietnam', 'H? Chí Minh', 'Roma', '', '10.779575', '106.66329300000007', 0),
(31, 44, 3, '', 'Het t\'Straatje, 6923 AL Groessen, Netherlands', 'Netherlands', 'Gelderland', 'Groessen', '6923 AL', '51.9315148', '6.02691470000002', 0),
(32, 45, 1, '', 'Patnipura Chauraha, Nanda Nagar, Indore, Madhya Pradesh 452008, India', 'India', 'Madhya Pradesh', 'Indore', '452008', '22.7398763', '75.88093800000001', 0),
(33, 46, 1, '', 'MR 10 Rd, Jawahar Nagar, DDU Nagar, Indore, Madhya Pradesh, India', 'India', 'Madhya Pradesh', 'Indore', '', '22.7642358', '75.87048460000005', 0),
(34, 47, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, 48, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(36, 49, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, 50, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(38, 51, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(39, 52, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(40, 53, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, 54, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`ua_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `ua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
