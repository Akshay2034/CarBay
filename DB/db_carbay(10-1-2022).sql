-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2022 at 10:11 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_carbay`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_details` varchar(5000) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_status` varchar(50) NOT NULL,
  `complaint_reply` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ctype_id` int(11) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_details`, `complaint_date`, `complaint_status`, `complaint_reply`, `user_id`, `ctype_id`) VALUES
(1, '', 'delay in response', '2022-01-10', '1', 'sorry for wasting your valueable time', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `ctype_id` int(11) NOT NULL auto_increment,
  `ctype_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`ctype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`ctype_id`, `ctype_name`) VALUES
(1, 'Slow in Response');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(21, 'Ernakulam'),
(22, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_date` date NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL auto_increment,
  `model_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `model_name`) VALUES
(2, 'BMW'),
(3, 'MARUTHI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL auto_increment,
  `package_name` varchar(100) NOT NULL,
  `package_duration` varchar(100) NOT NULL,
  `package_amt` varchar(100) NOT NULL,
  PRIMARY KEY  (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `package_duration`, `package_amt`) VALUES
(1, '180 Day package', '180', '2000'),
(2, '360 Day Package', '360', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(50) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(16, 'Kottarakara', 6),
(17, 'Kottamkara', 7),
(18, 'Konni', 8),
(19, 'Kuttanad', 9),
(20, 'Ettumanoor', 10),
(21, 'Adimali', 11),
(22, 'Piravom', 12),
(23, 'Guruvayur', 13),
(24, 'Alathur', 15),
(25, 'Nilamboor', 16),
(26, 'Thamarassery', 17),
(28, 'Pulpally', 18),
(30, 'Iritty', 19),
(31, 'Bekal', 20),
(32, 'Muvattupuzha', 21),
(33, '', 0),
(34, 'Thodupuzha', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productbooking`
--

CREATE TABLE `tbl_productbooking` (
  `pbooking_id` int(11) NOT NULL auto_increment,
  `pbooking_date` date NOT NULL,
  `pbooking_qty` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pbooking_status` int(50) NOT NULL default '0',
  `pbooking_amt` bigint(11) NOT NULL,
  PRIMARY KEY  (`pbooking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_productbooking`
--

INSERT INTO `tbl_productbooking` (`pbooking_id`, `pbooking_date`, `pbooking_qty`, `product_id`, `user_id`, `pbooking_status`, `pbooking_amt`) VALUES
(2, '2021-12-09', 10, '4', 5, 1, 85000),
(3, '2022-01-10', 2, '4', 6, 1, 17000),
(4, '2022-01-10', 1, '4', 4, 0, 8500),
(5, '2022-01-10', 2, '4', 4, 0, 17000),
(6, '2022-01-10', 3, '4', 4, 0, 25500),
(7, '2022-01-10', 4, '5', 6, 1, 6000),
(8, '2022-01-10', 2, '5', 6, 0, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productrating`
--

CREATE TABLE `tbl_productrating` (
  `rating_id` int(11) NOT NULL auto_increment,
  `productbooking_id` int(11) NOT NULL,
  `rating_count` varchar(50) NOT NULL,
  `rating_caption` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`rating_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_productrating`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicerate`
--

CREATE TABLE `tbl_servicerate` (
  `service_rate` bigint(20) NOT NULL,
  `servicetype_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_servicerate`
--

INSERT INTO `tbl_servicerate` (`service_rate`, `servicetype_id`, `workshop_id`, `service_id`) VALUES
(850, 1, 4, 3),
(452, 2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicerequest`
--

CREATE TABLE `tbl_servicerequest` (
  `request_subject` varchar(1100) NOT NULL,
  `request_message` varchar(1100) NOT NULL,
  `request_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL auto_increment,
  `request_status` int(11) NOT NULL default '0',
  `request_replay` varchar(5000) NOT NULL,
  PRIMARY KEY  (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_servicerequest`
--

INSERT INTO `tbl_servicerequest` (`request_subject`, `request_message`, `request_date`, `user_id`, `service_id`, `request_id`, `request_status`, `request_replay`) VALUES
('dfdsf', 'dfd', '2021-12-09', 5, 3, 1, 0, ''),
('engine oil', 'engine oil replaced', '2022-01-10', 6, 3, 2, 0, ''),
('cleaning', 'air conditioning', '2022-01-10', 6, 3, 3, 0, ''),
('cleaning', 'cleaning', '2022-01-10', 6, 3, 4, 1, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicetype`
--

CREATE TABLE `tbl_servicetype` (
  `servicetype_id` int(11) NOT NULL auto_increment,
  `servicetype_name` varchar(110) NOT NULL,
  PRIMARY KEY  (`servicetype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_servicetype`
--

INSERT INTO `tbl_servicetype` (`servicetype_id`, `servicetype_name`) VALUES
(1, 'Cleaning'),
(2, 'Air Checking'),
(3, 'Alignment'),
(4, 'Engine oil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shoprating`
--

CREATE TABLE `tbl_shoprating` (
  `rating_id` int(11) NOT NULL auto_increment,
  `shopbooking_id` int(11) NOT NULL,
  `rating_count` varchar(50) NOT NULL,
  `rating_caption` varchar(50) NOT NULL,
  `user_i8d` int(11) NOT NULL,
  PRIMARY KEY  (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_shoprating`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_sparecategory`
--

CREATE TABLE `tbl_sparecategory` (
  `sparecat_id` int(11) NOT NULL auto_increment,
  `sparecat_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`sparecat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_sparecategory`
--

INSERT INTO `tbl_sparecategory` (`sparecat_id`, `sparecat_name`) VALUES
(2, 'Engine'),
(3, 'Tyre'),
(4, 'Brakes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sparesubcategory`
--

CREATE TABLE `tbl_sparesubcategory` (
  `sparesubcat_id` int(11) NOT NULL auto_increment,
  `sparesubcat_name` varchar(50) NOT NULL,
  `sparecat_id` int(11) NOT NULL,
  PRIMARY KEY  (`sparesubcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_sparesubcategory`
--

INSERT INTO `tbl_sparesubcategory` (`sparesubcat_id`, `sparesubcat_name`, `sparecat_id`) VALUES
(3, 'Front Tyre', 3),
(4, 'Bike Engine', 2),
(6, 'Disc brakes', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL auto_increment,
  `stock_date` date NOT NULL,
  `stock_qty` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  PRIMARY KEY  (`stock_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_stock`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(50) NOT NULL,
  `user_contact` varchar(110) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_doj` date NOT NULL,
  `user_isactive` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `place_id`, `user_password`, `user_doj`, `user_isactive`) VALUES
(5, 'Rahul Raj', '9446418775', 'rahulraj@gmail.com', 'Muvattupuzha', 32, '123456', '2021-12-09', '0'),
(6, 'Karthik', '8921399746', 'karthikbabu3026@gmail.com', 'thachethukandathil (H) piravom p.o pazhoor', 32, '1234', '2022-01-10', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshop`
--

CREATE TABLE `tbl_workshop` (
  `workshop_id` int(11) NOT NULL auto_increment,
  `workshop_name` varchar(50) NOT NULL,
  `workshop_contact` varchar(110) NOT NULL,
  `workshop_email` varchar(50) NOT NULL,
  `workshop_address` varchar(50) NOT NULL,
  `place_id` varchar(50) NOT NULL,
  `workshop_status` varchar(50) NOT NULL,
  `workshop_password` varchar(50) NOT NULL,
  `workshop_proof` varchar(50) NOT NULL,
  `workshop_photo` varchar(50) NOT NULL,
  `workshop_doj` date NOT NULL,
  `package_id` int(11) NOT NULL default '0',
  `date` date NOT NULL,
  PRIMARY KEY  (`workshop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_workshop`
--

INSERT INTO `tbl_workshop` (`workshop_id`, `workshop_name`, `workshop_contact`, `workshop_email`, `workshop_address`, `place_id`, `workshop_status`, `workshop_password`, `workshop_proof`, `workshop_photo`, `workshop_doj`, `package_id`, `date`) VALUES
(4, 'Regal Garage', '9446418552', 'regal@gmail.com', 'Muvattupuzha', '32', '1', '123456', 'Gaia.ico', 'Gaia.ico', '2021-12-09', 0, '0000-00-00'),
(5, 'hedger', '8330830962', 'hedger@gmail.com', 'Kudakuthiyankal House', '34', '1', '12345', 'image.jpg', 'ASWATHY.jpg', '2022-01-10', 1, '2022-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshopproduct`
--

CREATE TABLE `tbl_workshopproduct` (
  `product_id` int(11) NOT NULL auto_increment,
  `product_details` varchar(50) NOT NULL,
  `sparesubcat_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_rate` int(11) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_workshopproduct`
--

INSERT INTO `tbl_workshopproduct` (`product_id`, `product_details`, `sparesubcat_id`, `product_name`, `product_rate`, `product_photo`, `workshop_id`) VALUES
(4, 'Good', 4, 'Bike Engine', 8500, 'Dapino-Office-Women-Eyes-office-women-red.ico', 4),
(5, 'fully functioning stabilised brakes', 6, 'MRF disc brakes', 1500, 'image.jpg', 4);
