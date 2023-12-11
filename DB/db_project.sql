-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2008 at 10:19 PM
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
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookservice`
--

CREATE TABLE `tbl_bookservice` (
  `booking_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `workshopservice_id` int(11) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `booking_date&time` date NOT NULL,
  PRIMARY KEY  (`booking_id`,`workshopservice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_bookservice`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(50) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_status` varchar(50) NOT NULL,
  `complaint_reply` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_complaint`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_district`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_model`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(50) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_place`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_productbooking`
--

CREATE TABLE `tbl_productbooking` (
  `booking_id` int(11) NOT NULL auto_increment,
  `booking_date&time` date NOT NULL,
  `booking_qty` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `booking_amount` int(11) NOT NULL,
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_productbooking`
--


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
-- Table structure for table `tbl_sparecat`
--

CREATE TABLE `tbl_sparecat` (
  `sparecat_id` int(11) NOT NULL auto_increment,
  `sparecat_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`sparecat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_sparecat`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_sparesubcat`
--

CREATE TABLE `tbl_sparesubcat` (
  `sparesubcat_id` int(11) NOT NULL auto_increment,
  `sparesubcat_name` varchar(50) NOT NULL,
  `sparecat_id` int(11) NOT NULL,
  PRIMARY KEY  (`sparesubcat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_sparesubcat`
--


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
  `user_contact` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_uname` varchar(50) NOT NULL,
  `user_upassword` varchar(50) NOT NULL,
  `user_pancard` varchar(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_proof` varchar(50) NOT NULL,
  `user_isactive` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshop`
--

CREATE TABLE `tbl_workshop` (
  `workshop_id` int(11) NOT NULL auto_increment,
  `workshop_name` varchar(50) NOT NULL,
  `workshop_contact` int(11) NOT NULL,
  `workshop_email` varchar(50) NOT NULL,
  `workshop_address` varchar(50) NOT NULL,
  `place_id` varchar(50) NOT NULL,
  `workshop_vstatus` varchar(50) NOT NULL,
  `workshop_password` varchar(50) NOT NULL,
  `workshop_proof` varchar(50) NOT NULL,
  `workshop_photo` varchar(50) NOT NULL,
  `workshop_isactive` varchar(50) NOT NULL,
  PRIMARY KEY  (`workshop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_workshop`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshopproduct`
--

CREATE TABLE `tbl_workshopproduct` (
  `workshopproduct_id` int(11) NOT NULL auto_increment,
  `product_details` varchar(50) NOT NULL,
  `sparesubcat_id` int(11) NOT NULL,
  PRIMARY KEY  (`workshopproduct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_workshopproduct`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshopservice`
--

CREATE TABLE `tbl_workshopservice` (
  `workshopservice_id` int(11) NOT NULL auto_increment,
  `workshop_id` int(11) NOT NULL,
  `workshopservice_title` varchar(50) NOT NULL,
  `workshopservice_description` varchar(50) NOT NULL,
  `service_amount` varchar(50) NOT NULL,
  PRIMARY KEY  (`workshopservice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_workshopservice`
--

