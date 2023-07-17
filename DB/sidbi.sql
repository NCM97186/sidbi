-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2022 at 07:48 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adtuk_users`
--

CREATE TABLE `adtuk_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adtuk_users`
--

INSERT INTO `adtuk_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$Bzl67tEIF8xUsxBVBMde0MnS1CBUf2.', 'admin', 'niravalldonetech@gmail.com', 'https://ukac.uk.com', '2020-08-06 06:00:59', '', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `docid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `taskid` int(11) DEFAULT NULL,
  `isverified` tinyint(3) NOT NULL DEFAULT 0,
  `isapproved` tinyint(3) NOT NULL DEFAULT 0,
  `isrejected` tinyint(3) NOT NULL DEFAULT 0,
  `verifyby` text DEFAULT NULL,
  `approvedby` text DEFAULT NULL,
  `rejectedby` text DEFAULT NULL,
  `verifydate` varchar(100) DEFAULT NULL,
  `rejecteddate` varchar(100) DEFAULT NULL,
  `approvedate` varchar(100) DEFAULT NULL,
  `document` text DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`docid`, `userid`, `taskid`, `isverified`, `isapproved`, `isrejected`, `verifyby`, `approvedby`, `rejectedby`, `verifydate`, `rejecteddate`, `approvedate`, `document`, `remarks`, `lastupdated`) VALUES
(1, 74, 78, 1, 1, 0, '74', '74', NULL, '02-06-2022 07:13:47 PM', NULL, '02-06-2022 07:14:19 PM', 'Screens.pdf', 'test remark', '2022-06-02 13:44:19'),
(2, 74, 73, 0, 0, 1, NULL, NULL, '74', NULL, 'Document not in the format~~02-06-2022 07:30:02 PM', NULL, 'Screens_0.2.pdf', 'Document not in the format', '2022-06-02 14:00:02'),
(3, 74, 79, 0, 0, 1, NULL, NULL, '74', NULL, 'test reject~~03-06-2022 11:47:29 AM', NULL, '320.jpg', 'test reject', '2022-06-03 06:17:29'),
(4, 74, 79, 1, 0, 1, '74', NULL, '74', '03-06-2022 11:52:31 AM', 'test approved~~03-06-2022 11:53:44 AM', NULL, 'kk-653x435.jpg', 'test approved', '2022-06-03 06:23:44'),
(5, 74, 84, 1, 0, 0, '109', NULL, NULL, '13-07-2022 03:13:29 PM', NULL, NULL, 'pexels-photo-220453.jpeg', 'sa', '2022-07-13 09:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `tcbp`
--

CREATE TABLE `tcbp` (
  `id` int(11) NOT NULL,
  `parenttask` int(11) DEFAULT 0,
  `state` varchar(255) DEFAULT NULL,
  `tcbptype` varchar(50) DEFAULT NULL,
  `tcbp_states` varchar(255) DEFAULT NULL,
  `pmumanager` varchar(255) DEFAULT NULL,
  `ba` varchar(255) DEFAULT NULL,
  `sno` varchar(255) DEFAULT NULL,
  `taskname` varchar(255) DEFAULT NULL,
  `totalparticipants` int(11) DEFAULT 10,
  `documentupload` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `userid` int(11) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tcbp`
--

INSERT INTO `tcbp` (`id`, `parenttask`, `state`, `tcbptype`, `tcbp_states`, `pmumanager`, `ba`, `sno`, `taskname`, `totalparticipants`, `documentupload`, `status`, `userid`, `last_updated`) VALUES
(1, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Training and capacity Building', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(2, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Training and Capacity Building Programmes to leverage GOI schemes in the state', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(3, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Training programs on SFURTI', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(4, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Training and Awareness Programme on Innovative cluster and sector specific financial products', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(5, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Training and capacity Building Programmes for state schemes', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(6, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Training and capacity building  programmes on Onboarding to digital platforms /marketing', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(7, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'others', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(8, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Cluster Identification & Infrastructure GAP Analysis', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(9, 8, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Evaluated Potential for infrastructure projects for MSMEs in Clusters', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(10, 8, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Guidance and Support provided for MSECDP /SFURTI', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(11, 8, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Support provided for CFC', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(12, 8, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Support provided for Cluster Financing', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(13, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Policy & Advocacy', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(14, 13, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'State Policy /Schemes /product designed for MSME', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(15, 13, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Studies on existing framework of schemes / interventions and  suggested modificatiosn', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(16, 13, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Assistance on conducting training sessions on implementation of the interventions planned', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(17, 17, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Others', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(18, 17, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Facilitate in development of Model Industry Association', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(19, 17, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Any other  programmes/events/activities facilitating state govt', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(20, 17, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Support to organize programmes/events/activities planned by SIDBI', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(21, 17, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Repository of work done', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(22, 17, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Other', 100, NULL, 1, 74, '2021-11-30 09:32:12'),
(25, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Enhancing credit flow to the MSME sector', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(26, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Convergence - Strengthening infrastructure for MSME through State scheme / twinning with GoI schemes', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(27, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Partnership of State Govts & State level Industry Associations with strategic BDS', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(28, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Institutional Strengthening & Capacity Building of stakeholders', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(29, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Entrepreneurship Development and employment generation', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(30, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Improved Governance framework / policy advocacy', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(31, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Cluster Financing- Facilitate credit inflow to MSMEs in the cluster', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(32, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Promotion of BMO / IA for development of local / regional MSME ecosystem', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(33, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'SCDF related intervention', 100, NULL, 1, 83, '2021-11-30 09:32:12'),
(35, 25, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of MSMEs benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(36, 25, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of stakeholders benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(37, 25, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Key initiatives to enhance credit flow to MSMEs', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(38, 26, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Stakeholders consultation/Field visits', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(39, 26, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Preparation of DSR', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(40, 26, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Preparation of DPR', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(41, 26, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Stakeholder validation', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(42, 26, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Submission of proposals to the concerned authority', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(43, 26, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Others- specify', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(44, 27, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of MSMEs benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(45, 27, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of stakeholders benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(46, 27, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Key initiatives to bridge the BDS gap', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(47, 28, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Key initiatives to bridge the BDS gap                     On ground training/ workshop etc- numbers', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(48, 28, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Virtual webinar/seinar/training etc', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(49, 28, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of MSMEs benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(50, 28, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of stakeholders benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(51, 28, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Area/themes / of programs', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(52, 29, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of MSMEs benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(53, 29, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of stakeholders benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(54, 29, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Key initiatives to enhance Entrepreneurship Development & Employment Generation', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(55, 30, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of MSMEs benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(56, 30, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of stakeholders benefited', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(57, 30, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Key initiatives to improve Improved Governance framework / policy advocacy   MSMEs', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(58, 31, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Name of cluster', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(59, 31, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Cluster members (number)', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(60, 31, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Line of activity', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(61, 31, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Credit gap – working capital and term loan', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(62, 32, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Name IA', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(63, 32, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Number of IA members', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(64, 32, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Key line of activity', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(65, 32, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Key initiatives to be undertaking', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(66, 33, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Project identified & communicated by State gov', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(67, 33, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Priority matrix submitted', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(68, 33, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Project DPR submitted', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(69, 33, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Application form along with annex. Submitted by respective state fin department submitted', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(70, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'subtask', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(71, 25, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Others- specify', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(72, 28, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Others- specify', 50, NULL, 1, 74, '2021-11-30 09:32:12'),
(73, 1, NULL, 'goi', 'Gujarat', NULL, NULL, NULL, 'Test_Sidbi', 10, NULL, 1, 74, '2022-06-02 09:59:00'),
(74, 0, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Reports', 10000, NULL, 1, 74, '2022-06-02 11:14:41'),
(75, 74, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'FPR', 10000, NULL, 1, 74, '2022-06-02 11:17:20'),
(76, 74, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Bimonthly', 10000, NULL, 1, 74, '2022-06-02 11:17:37'),
(77, 74, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'Annually', 1000, NULL, 1, 74, '2022-06-02 11:17:51'),
(78, 1, NULL, 'goi', 'Gujarat', NULL, NULL, NULL, 'Test_Task', 10, NULL, 1, 74, '2022-06-02 13:40:08'),
(79, 1, NULL, 'goi', 'Delhi', NULL, NULL, NULL, 'test_sidbi', 100, NULL, 1, 74, '2022-06-03 06:10:01'),
(80, 1, NULL, 'goi', 'UP', NULL, NULL, NULL, '<h1>test</h1>', 2, NULL, 1, 82, '2022-07-13 08:36:26'),
(81, 1, NULL, 'goi', 'UP', NULL, NULL, NULL, '<h1><u>Test12</u></h1>', 2, NULL, 1, 109, '2022-07-13 08:38:38'),
(82, 1, NULL, 'goi', 'UP', NULL, NULL, NULL, '\"><scrIpt>alert(\'xss\');</scRipt>', 1, NULL, 1, 109, '2022-07-13 08:39:04'),
(83, 1, NULL, 'goi', 'Gujarat', NULL, NULL, NULL, '\"><scrIpt>alert(\'xss\');</scRipt>', 3, NULL, 1, 109, '2022-07-13 08:40:25'),
(84, 1, NULL, 'goi', 'Gujarat', NULL, NULL, NULL, '<iframe src=\" https://www.mqasglobal.com/\" title=\"description\"></iframe>', 4, NULL, 1, 109, '2022-07-13 08:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 NOT NULL,
  `emp_code` bigint(15) NOT NULL,
  `sha_key` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_group_id` int(11) NOT NULL DEFAULT 4,
  `name` varchar(255) NOT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `profile_img` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `zipcode` varchar(8) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `emp_code`, `sha_key`, `user_group_id`, `name`, `organization`, `profile_img`, `state`, `city`, `address`, `mobile`, `phone`, `zipcode`, `gender`, `branch`, `status`, `last_modified`) VALUES
(74, 'rishi.kumar@netcreativemind.com', 'd2ad3544dd044bd527209fe99b85b1e6e0833a63', 5, '16249669986059e1bf6813f6.84790348', 3, 'Rishi Kumar', NULL, '', 'Gujarat', 'Amdavad', 'xyz', '', '', '380050', 'male', NULL, '1', '2021-10-12 06:40:04'),
(76, 'nirav@netcreativemind.com', '106a88583262a22eecf9799294dcb14dd414cf32', 0, '802540881625f932aba3016.14134693', 2, 'nirav chauhan', NULL, '', 'Gujarat', '', NULL, '8866718265', '8866718265', '', 'male', NULL, '1', '2022-04-20 04:59:22'),
(105, 'shubham@netcreativemind.com', 'fc3d3ae19e0fbb80a3f2b67a61b9868951027feb', 0, '1303324015625f92250e0241.54202889', 4, 'shubham', 'SIDBI', '', 'Haryana', '', NULL, '9876543210', '9876543210', '', 'male', NULL, '1', '2022-04-20 04:55:01'),
(78, 'shekhar@netcreativemind.com', '11e28a0397d3715c7f73dcdd2214644f8445dbc4', 0, '2557812626136e44683bc11.38533271', 1, 'shekhar', NULL, '', 'Rajasthan', '', NULL, '9711119799', '9711119799', '', 'male', 'Branch A', '1', '2021-09-07 04:02:14'),
(79, 'Navdeep@gmail.com', 'a59d67b6c1ddbe460c8fdf4f2ec0ee46cad49a10', 0, '8374775076136efe251fde7.65468842', 1, 'Navdeep', NULL, '', 'Rajasthan', '', NULL, '9876543212', '9876543212', '', 'male', 'Branch A', '1', '2021-09-07 04:51:46'),
(80, 'Prashantncm@gmail.com', 'df18d4b1bff6a9ecd32fe088e2ef7b1637fb0c10', 0, '8547908736136f086d9a7d7.82633539', 1, 'prashant', NULL, '', 'UP', '', NULL, '9876543214', '9876543214', '', 'male', 'Branch A', '1', '2021-09-07 04:54:30'),
(82, 'ravi.kumar@netcreativemind.com', 'de53fbb8a07bf988ae4429e2bd1ccaa961517aea', 0, '1731432151625f92a2573ec1.61615108', 1, 'RAVI', NULL, '', 'Haryana', '', NULL, '9718604081', '9718604081', '', 'male', NULL, '1', '2022-04-20 04:57:06'),
(94, 'mariya@gmail.com', 'e15e0728a2966055300b61edd2e61c7342fb750a', 0, '11337934626163c66d1cde58.24899993', 1, 'Mariya', 'SIDBI', '', 'Andhra Pradesh', '', NULL, '9876543210', '9876543210', '', 'male', NULL, '1', '2021-10-11 05:06:53'),
(108, 'prashanthmishra074@gmail.com', '0051832a64f1653a5db25ab08ed8f630717cda57', 0, '75520877061764bba973502.41110114', 4, 'Prashanth Mishra', 'Grant Thornton', '', 'UP', '', NULL, '8826516384', '8826516384', '', 'male', NULL, '1', '2021-10-25 06:16:26'),
(86, 'harsh.trivedi@in.gt.com', 'e9c5265842e95f75d42203575ccd845927490dcf', 0, '471992055614783588a05e2.15405598', 1, 'harsh', 'Grant Thornton', '', 'Maharashtra', '', NULL, '9870628428', '9870628428', '', 'male', NULL, '1', '2021-09-19 18:37:12'),
(87, 'divya.jain@in.gt.com', '935ea2de104cc454d98d617d87f2ea26d122e631', 0, '16458420766148081d403be0.28950871', 1, 'Divya Jain', 'Grant Thornton', '', 'Rajasthan', '', NULL, '09610203759', '09610203759', '', 'male', NULL, '1', '2021-09-20 04:03:41'),
(107, 'mohammad.zaidi@in.gt.com', '98764210fdb743feff289c5e6a9c38ec5a7ebabf', 0, '19620305456168143b390d24.39119818', 1, 'Mohammad Zaidi', 'Grant Thornton', '', 'Uttarakhand', '', NULL, '9167696324', '9167696324', '', 'male', NULL, '1', '2021-10-19 06:50:08'),
(89, 'Neeraj.Sharma1@gt.in.com', '136e0647b3249e156904e7ea6bd5a466c3ef69f3', 0, '1079819463614813f66195e8.22971593', 1, 'Neeraj Sharma', 'Grant Thornton', '', 'Gujarat', '', NULL, '8149624104', '8149624104', '', 'male', NULL, '1', '2021-09-20 04:54:14'),
(106, 'prashanth@gmail.com', 'ad0dd791d398b407915ef23c046e47915be47b24', 0, '170141985861680aa35223c4.88689327', 2, 'Prashanth', 'SIDBI', '', 'Uttarakhand', '', NULL, '9425786551', '9425786551', '', 'male', NULL, '1', '2021-10-14 10:54:44'),
(91, 'nabinirvan@gmail.com', '45e672b709933cc2235af5a6a1fb5b81bb92c17b', 0, '1005563177614af4b3acd212.96156244', 1, 'Navdeep Kumar', 'Grant Thornton', '', 'Gujarat', '', NULL, '09650770549', '09650770549', '', 'male', NULL, '1', '2021-09-22 09:17:39'),
(92, 'nabinirvan@mail.com', 'c549dfe468744bf48ec88f97b2a43bff595f39b3', 0, '1736901964614af5b90190e2.28417717', 1, 'Navdeep', 'Grant Thornton', '', 'Gujarat', '', NULL, '9650770549', '9650770549', '', 'male', NULL, '1', '2021-09-22 09:22:01'),
(104, 'niravalldonetech@gmail.com', '3fc8dc85974f5ebc38d5425dc13d84cd19d2dd37', 0, '3521134796167dfa498c9f2.44727924', 2, 'nirav chauhan', 'Grant Thornton', '', 'Haryana', '', NULL, '8866718265', '8866718265', '', 'male', NULL, '1', '2021-10-14 07:43:32'),
(100, 'testalldonetech@gmail.com', 'bcd06facc53a7b9e9e8bb11170aa77473526a944', 0, '14400253406163ce451be0d4.05102868', 4, 'test', 'Grant Thornton', '', 'Gujarat', '', NULL, '8866718265', '8866718265', '', 'male', NULL, '1', '2021-10-11 05:40:21'),
(101, 'chandresh.devloper@gmail.com', '0add19ee2771ce9ce8694cf6b334b95b820af375', 0, '199614428761656edfde3ac9.24969493', 1, 'chandresh', 'SIDBI', '', 'Rajasthan', '', NULL, '5254654124', '5254654124', '', 'male', NULL, '1', '2021-10-14 07:26:12'),
(103, 'shubham.sharma@netcreativemind.com', '0d5ba2c314b8752ba32d3e37d57715b1236ffbf4', 0, '30525293261657001decd96.02883332', 4, 'shubham1', 'SIDBI', '', 'Delhi', '', NULL, '9876543210', '9876543210', '', 'male', NULL, '1', '2021-10-12 11:22:41'),
(109, 'nirav.chauhan@netcreativemind.com', '4dca122e8749faad1b3677ec8de6fc3ca765d1b3', 0, '117207240462ce83a1e9aad8.92472470', 0, 'Nirav Hareshbhai Chauhan', 'Grant Thornton', '', 'Gujarat', '', NULL, '8866718265', '8866718265', '', 'male', NULL, '1', '2022-07-13 08:34:41'),
(110, 'saurabh.sharma2@in.gt.com', '9b77a1a2b7f43a28fadc1fe98d5dbfbf362daa28', 0, '1944848275629741f515aea3.42554267', 4, 'Saurabh Sharma', 'Grant Thornton', '', 'Uttarakhand', '', NULL, '7988450193', '7988450193', '', 'male', NULL, '1', '2022-06-01 10:39:49'),
(111, 'kaushik.nandy@in.gt.com', '7cbf4ce74db4c3408386e011b74ab72e7e94c01a', 0, '1798118699629745c1901774.62847306', 4, 'Kaushik Kumar Nandy ', 'Grant Thornton', '', 'Uttarakhand', '', NULL, '7260899350', '7260899350', '', 'male', NULL, '1', '2022-06-01 10:56:01'),
(112, 'Rudraneel.Ghose@IN.GT.COM', 'e87c98fae21dbd14eb515b661f49e4f7bd1fe973', 0, '913201180629747138f56b1.04433890', 4, 'Rudraneel Ghose', 'Grant Thornton', '', 'Karnataka', '', NULL, '9163989671', '9163989671', '', 'male', NULL, '1', '2022-06-01 11:01:39'),
(113, 'Neeraj.Sharma1@in.gt.com', '214a8e5f1c7379ec521f5d8b73240574d8ebef9c', 0, '1501399136297478030f824.43567918', 4, 'Neeraj Sharma ', 'Grant Thornton', '', 'Gujarat', '', NULL, '8149624104', '8149624104', '', 'male', NULL, '1', '2022-06-01 11:03:28'),
(114, 'gurudas.pilankar@in.gt.com', '4c66c39267b653cf2f43ba5235ed10bac3aea097', 0, '10788830976297487163bd83.76086548', 4, 'Gurudas Pilankar', 'Grant Thornton', '', 'Maharashtra', '', NULL, '9920058504', '9920058504', '', 'male', NULL, '1', '2022-06-01 11:07:29'),
(115, 'ganesh.p@in.gt.com', 'a3199e2f4856c801196d52726cf4c5a40891214d', 0, '209398832662974ab58433f6.00487632', 4, 'Ganesh P', 'Grant Thornton', '', 'TamilNadu', '', NULL, '9003096600', '9003096600', '', 'male', NULL, '1', '2022-06-01 11:17:09'),
(116, 'swati.industry2021@gmail.com', 'cf70eef1abfec61a021b84a442791a7b0b11f152', 0, '1232488637629752811ab8e7.13647143', 4, 'Swati Singh', 'Grant Thornton', '', 'Delhi', '', NULL, '7070391620', '7070391620', '', 'male', NULL, '1', '2022-06-01 11:50:25'),
(117, 'ashish.kumar6@in.gt.com', '6b17b60eb626449cee2b6f3255f2b5f43bb35ecb', 0, '7207865646297c454a52331.62149431', 4, 'Ashish Kumar', 'Grant Thornton', '', 'Rajasthan', '', NULL, '8298525340', '8298525340', '', 'male', NULL, '1', '2022-06-01 19:56:04'),
(118, 'abhay.ravetkar@in.gt.com', '8228b920ce5bf88ea8c1f117a862766b35323216', 0, '1465192252629849cded1230.77649009', 4, 'Abhay Ravetkar', 'Grant Thornton', '', 'Karnataka', '', NULL, '9860261267', '9860261267', '', 'male', NULL, '1', '2022-06-02 05:25:33'),
(119, 'navdeep.kumar@IN.GT.COM', 'd7b773dc5fd49d8eacac65635b31e3b317c09bf2', 0, '62564176262988ec6955033.46733062', 4, 'Navdeep Kumar', 'Grant Thornton', '', 'Gujarat', '', NULL, '9650770549', '9650770549', '', 'male', NULL, '1', '2022-06-02 10:19:50'),
(120, 'foo-bar@example.com', 'c1dc18370ce455b38a17c9286d7fe0f4ff540ad2', 0, '19419065662ce6ab3068170.01635107', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:19'),
(121, 'c:/Windows/system.ini', '13e180d0827a46cc0fcfc008e646014df9aee827', 0, '165271062762ce6ab7a5f835.51961020', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:23'),
(122, '../../../../../../../../../../../../../../../../Windows/system.ini', 'c0de1efcb9b829ac893d588a30ba52c16050620a', 0, '121685145762ce6ab7b8e727.11857263', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:23'),
(123, 'c:\\Windows\\system.ini', '1149f3d71664c38002944aae2279496f535d4fea', 0, '88685947262ce6ab7cb78b9.13274793', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:23'),
(124, '..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\Windows\\system.ini', '9e2963c42ac45f3741197c4f71814f6010386e00', 0, '141375325962ce6ab7d6cb57.49645276', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:23'),
(125, '/etc/passwd', 'd56641ddcd7490cdab033bdcc9a52644c1e05393', 0, '197637629762ce6ab7e48d28.26099907', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:23'),
(126, '../../../../../../../../../../../../../../../../etc/passwd', '0aac179e3ad2c3273dc4b1ad1238b0f4af28b562', 0, '127692092862ce6ab80084a8.91801504', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(127, 'c:/', 'ab008617c6151b51d6cf0678533473b9fca38201', 0, '120523647562ce6ab815cd54.44213676', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(128, '/', '81a9418e93dd57b222ba87b6404ebf8b5caaa312', 0, '41775664162ce6ab8262f73.12883524', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(129, '../../../../../../../../../../../../../../../../', '4df89ff5054f213abd5ba9bcd06e68a85789f1c1', 0, '39238194462ce6ab85fdb35.89913361', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(130, 'WEB-INF/web.xml', 'f52a92389daad7a1e6049c659c9fceefe33077d7', 0, '159124328062ce6ab87849c9.89489788', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(131, 'WEB-INF\\web.xml', '579ee01f4d53b52c2a3b343277a4159439a1ec74', 0, '12733045662ce6ab8887492.48744517', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(132, '/WEB-INF/web.xml', '57ffc3031f546e72ca4852de87cf90344709f1bb', 0, '70103190562ce6ab89a7c50.09356641', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(133, '\\WEB-INF\\web.xml', '4e91c6406d9d3a2a23b022ff619ed552f77766d4', 0, '2362205162ce6ab8af1b83.18777559', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(134, 'thishouldnotexistandhopefullyitwillnot', '18c531e2e37ed84978779d4a0b2cf7794f37eaad', 0, '62752931162ce6ab8c2e1d1.22835152', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:24'),
(135, 'http://www.google.com/', 'b3d30945c6b5b6c26ba7adfe353117750d03adb2', 0, '51345285162ce6ac2b41c26.62584580', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:34'),
(136, '2703396674509780614.owasp.org', 'c92e1ffc1e838f0e126a0bdd3f35eb23b3f11715', 0, '114662246762ce6ac9c148c0.16749294', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:41'),
(137, 'http://2703396674509780614.owasp.org', 'a10e522136acfd76596c5dc233095967067e67c1', 0, '1491952262ce6ac9d18e21.41030096', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:41'),
(138, 'https://2703396674509780614.owasp.org', '7b0fc17ca782d6305942c2928d0a011cf9b3ca7e', 0, '13345140962ce6ac9e74c60.01789187', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:41'),
(139, 'http:\\\\2703396674509780614.owasp.org', 'd42fbe4f007d12a2b3c42d1403787e1ce4a374d0', 0, '118786147862ce6aca047da4.95253403', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:42'),
(140, 'https:\\\\2703396674509780614.owasp.org', '6217670d60952bcd31209b2689e27e5c5d3b725a', 0, '93240104362ce6aca147a14.35382680', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:42'),
(141, '//2703396674509780614.owasp.org', '895546418fa8a8c2b62c9aec6a20edb1e0ce8aad', 0, '25714235462ce6aca272959.23683355', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:42'),
(142, '\\\\2703396674509780614.owasp.org', '6418d9e0f3cbd4524a1f4968f3888cc2751726d8', 0, '18201600762ce6aca3733f2.27444593', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:42'),
(143, '0W45pz4p', '0f8251f1cd6b18a5213da6b5022c0d85f10703c5', 0, '79307938662ce6ad6db6e68.53702886', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:54'),
(144, 'foo-bar@example.com0W45pz4p', '8cb361397bddb58b9725ae6c55f658f3ff60ab7b', 0, '175377643362ce6ad6effda1.58650125', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:54'),
(145, 'zApPX2sS', '9e66540b9a72ce583c567ff059f1118c7fc22816', 0, '15636695262ce6adb5cf2e1.01838715', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:48:59'),
(146, '\'', '38a0e7aa7f1847e32233f3357bbfe7e8e50ff3fc', 0, '146071394362ce6ae9ba8004.50354987', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:13'),
(147, 'foo-bar@example.com\'', '87ba07f4a435ec9277fd7b83a36bc2b408c5b9de', 0, '165963510562ce6ae9c78b15.68647257', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:13'),
(148, ';', '71bfeb82ca4076f3269a163f7c6e86f6cba1d710', 0, '178239029162ce6aea6b7666.55829035', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:14'),
(149, 'foo-bar@example.com;', '06112bf40470faf8cacf46cf4e58d6f4a28dbbe8', 0, '82670389762ce6aea7ce216.09474336', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:14'),
(150, '\'(', '35ea3be42b6a11570f0de3ff56afae499db16e74', 0, '37007276862ce6aea909a71.29741041', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:14'),
(151, 'foo-bar@example.com\'(', '498b826e5cdc8f4181b3fda9d86fb566d327326e', 0, '202629594062ce6aeaa50a74.53387889', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:14'),
(152, 'foo-bar@example.com AND 1=1 -- ', '31b88a5efeb8622b4705a2956034e43d62c03218', 0, '176681870262ce6aeace3971.71792957', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:14'),
(153, 'foo-bar@example.com AND 1=2 -- ', 'f171907aedcc3bf55f5c687c207519268d7d3379', 0, '139169405662ce6aead9b840.69058523', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:14'),
(154, 'foo-bar@example.com OR 1=1 -- ', '6c0b730a4af1bbaf805c03e18cacf7999add97b4', 0, '26260727462ce6aeaed19a4.92936003', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:14'),
(155, 'foo-bar@example.com\' AND \'1\'=\'1\' -- ', 'b1dd36b2f67c82d2c18ac8c70b91d18db12caa2d', 0, '197800834562ce6aeb2ccf43.98149838', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:15'),
(156, 'foo-bar@example.com\' AND \'1\'=\'2\' -- ', '0dd256b0bf374dcc1e956d263d2e069e2308f45a', 0, '73798404062ce6aeb416a17.73295154', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:15'),
(157, 'foo-bar@example.com\' OR \'1\'=\'1\' -- ', 'eacf65766624828bd92ceb59211d7288649bc717', 0, '188510646862ce6aeb546dd0.61253642', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:15'),
(158, 'foo-bar@example.com UNION ALL select NULL -- ', 'cfd6d45d6a24294cdf6572c927857e18e0209f68', 0, '123799128262ce6aeb8d36d8.96991353', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:15'),
(159, 'foo-bar@example.com\' UNION ALL select NULL -- ', '8141663a1aa1a295928f862e226dc9b4f2cff1d1', 0, '152653850262ce6aeba47264.14262651', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:15'),
(160, '\';print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));$var=\'', '77308e8139279be63b6c5b64473c3e8844320272', 0, '193368177862ce6af9608500.02571395', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:29'),
(161, '${@print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110))}', 'dbe6bb0c20e8486250cfefd9de238f2e65d77891', 0, '63518290962ce6af9744467.09744726', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:29'),
(162, ';print(chr(122).chr(97).chr(112).chr(95).chr(116).chr(111).chr(107).chr(101).chr(110));', '571be991b22c9c990e8ec3dacc2848bf47651fff', 0, '67911327862ce6af9ead082.91969969', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:29'),
(163, '+response.write({0}*{1})+', 'f1713ac106c3fdb6694e1e0c6e110abb102eda3b', 0, '118513988862ce6afa4723e8.47640377', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:30'),
(164, 'response.write(761,023*218,026)', 'e18b2a1f99afdff66c3b18b814875c73864bc808', 0, '3595425862ce6afa575366.79254260', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:30'),
(165, 'cat /etc/passwd', '1b21c7d7932f8d2c5ec76eab3df8958ab6d23251', 0, '144472662062ce6b02accd58.34753110', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:38'),
(166, 'foo-bar@example.com&cat /etc/passwd&', '2b740dd6bc37a047947f17214a5c926943efe8e4', 0, '66302634962ce6b02bed189.97465444', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:38'),
(167, 'foo-bar@example.com;cat /etc/passwd;', 'e9548fd29424eefd0ac508a6432b115a61c34bf3', 0, '164195679062ce6b02cdc217.10986537', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:38'),
(168, 'foo-bar@example.com\'&cat /etc/passwd&\'', 'a532a54c5c944ed7ac403cd4d1f261fa4a223015', 0, '173755829862ce6b03760112.07203894', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:39'),
(169, 'foo-bar@example.com\';cat /etc/passwd;\'', 'ddd4167d32e121fafc6078f57b2cb284d03442aa', 0, '143644494862ce6b03814ba2.35146946', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:39'),
(170, 'foo-bar@example.com&sleep 15&', '539bdff3929b0437b8fd45ecd4960bc64e4f66b1', 0, '110645188462ce6b038f1660.91730640', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:39'),
(171, 'foo-bar@example.com;sleep 15;', 'a309b460c32d955fc1d63e1b64b95f4dc22c1e27', 0, '84887340662ce6b039d9f94.05231527', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:39'),
(172, 'foo-bar@example.com\'&sleep 15&\'', '025e0b99b5e93d3abdd2d067f7260515852bd28c', 0, '34092281762ce6b04183af4.94515369', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(173, 'foo-bar@example.com\';sleep 15;\'', 'c0b6722c03341d865bdffe26baab2223df0ea7ad', 0, '166328820862ce6b04243073.18103452', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(174, 'type %SYSTEMROOT%\\win.ini', 'd277f3f8749897d49e10fd1c482593c487c9ee29', 0, '192484296862ce6b04300866.03170848', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(175, 'foo-bar@example.com&type %SYSTEMROOT%\\win.ini', '0cdda256e5352596ee31989fb0f92d6f57df185d', 0, '8668575962ce6b0441e2d8.82625813', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(176, 'foo-bar@example.com|type %SYSTEMROOT%\\win.ini', 'a7d5aa76f036a66e723e480f9ed731236c8f060c', 0, '200145007362ce6b0454fbc7.30007838', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(177, 'foo-bar@example.com\'&type %SYSTEMROOT%\\win.ini&\'', '92f5f6ac7d81ba7c63e8bf7463c1463777f0927d', 0, '147543090862ce6b04c27894.07949014', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(178, 'foo-bar@example.com\'|type %SYSTEMROOT%\\win.ini', '69ab48611ba1e90552dde547852f89649b7fc755', 0, '98723346062ce6b04d39e55.42713526', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(179, 'foo-bar@example.com&timeout /T 15', '97a9fc85ed70775f35177d66ef1f98fc2dccd115', 0, '89153233762ce6b04dee510.55430813', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(180, 'foo-bar@example.com|timeout /T 15', 'dcb0b01b4b62b5366c421d112726d93e9064d2c9', 0, '125172993662ce6b04efb422.78553479', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:40'),
(181, 'foo-bar@example.com\'&timeout /T 15&\'', '78b8775a35eee19dc9c411ca8ee7f5a8e7314b48', 0, '95280928162ce6b055169c2.15263943', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:41'),
(182, 'foo-bar@example.com\'|timeout /T 15', 'bef3e0ebc44730ee7a27696d2f820abafb4fec2e', 0, '51440994262ce6b055e4bc6.60884236', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:41'),
(183, 'get-help', 'a0a6d12a7926f3269c1fdeda8bbd74714ded122a', 0, '176937618762ce6b056eb7a2.08620024', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:41'),
(184, 'foo-bar@example.com;get-help', '044ecd447893f4219597b9febbfeab5695a6c5a7', 0, '129853269062ce6b057cabd7.77659669', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:41'),
(185, 'foo-bar@example.com\';get-help', 'b9487e5e0eb7cb0242d3deedbc07cdef20edb135', 0, '46687042462ce6b05ae40e7.12107657', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:41'),
(186, 'foo-bar@example.com;get-help #', '392081f0a206c13cf2b6f7b7de3e2f2ec36970d9', 0, '70375688862ce6b05bcb187.69763196', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:41'),
(187, 'foo-bar@example.com;start-sleep -s 15', '911444c5d30f5980df4308a2456a3ccfd6aad97f', 0, '201392463162ce6b05c9c797.63017114', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:41'),
(188, 'foo-bar@example.com\';start-sleep -s 15', '8522f7bbb7c4386fc33551fb3a9b14a63929f9c7', 0, '109241203662ce6b0608dd41.77609622', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:42'),
(189, 'foo-bar@example.com;start-sleep -s 15 #', 'c8c956267f024fb9bc3d3f0a96f735decb690512', 0, '39209036562ce6b0615b365.76807469', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:49:42'),
(190, 'tZPgAGKTlqGtXYMAKYxIPMUywNHroRbUnrbUNMvaNMbTLPOhuxBklTYCsjZYHBvxjZXkehIclfFEcdEyhJmiCMCtacWgJyaZWIAsUSCWLQSUTutgOdvbuvyKcYOhjqIhdcSQJZCmBpYdpmePqtuGbIvbRIeRAenmjEwpdWZXaBWVJNhSSLVWXnchTHneobBQOoglNycvDFhdKxBgeKYfayqcvRGiHOqntWcUEayQfXZhoNSyRsbLmqAitsggRya', '2422c278cfc8961caf5a77048db886ec0c7e8ce5', 0, '47519196562ce6b1a44d821.26753478', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:02'),
(191, 'ZAP', 'e0c3819c76e71be84fee36f567de00fa1708a5f1', 0, '84443215262ce6b1f656ba6.73532263', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:07'),
(192, 'Set-cookie: Tamper=2f830cf2-5576-4e15-a54f-b1433a9fdf49', '629d14ebf9daf6db819cdbf4bfdae89d4f35ccfd', 0, '173732870362ce6b253a1df0.27118229', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:13'),
(193, 'any\r\nSet-cookie: Tamper=2f830cf2-5576-4e15-a54f-b1433a9fdf49', '0584aa8de263d6ede08894e78bc8a0dd885fbeb9', 0, '44068763062ce6b254e9151.60375979', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:13'),
(194, 'any?\r\nSet-cookie: Tamper=2f830cf2-5576-4e15-a54f-b1433a9fdf49', '74b81cb934d7ad4eca16471680f6bd1bda39354c', 0, '153972710562ce6b2558fa99.52784082', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:13'),
(195, 'any\nSet-cookie: Tamper=2f830cf2-5576-4e15-a54f-b1433a9fdf49', '44eba13e793a88ad93dd1b4699aa9ab30d97a973', 0, '140185036662ce6b25658cc3.36858836', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:13'),
(196, 'any?\nSet-cookie: Tamper=2f830cf2-5576-4e15-a54f-b1433a9fdf49', '17c91197eff16aa9e6af4c999329cc202829cd75', 0, '198027637462ce6b25744915.19815203', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:13'),
(197, 'any\r\nSet-cookie: Tamper=2f830cf2-5576-4e15-a54f-b1433a9fdf49\r\n', 'f0ffda879404798a3cfd0195618bb2333a87fe11', 0, '49756832562ce6b258a5446.88290587', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:13'),
(198, 'any?\r\nSet-cookie: Tamper=2f830cf2-5576-4e15-a54f-b1433a9fdf49\r\n', 'a7f0232eaa0b2bdbc226130876d5352f765cda04', 0, '208669986262ce6b259edd75.45421686', 4, 'ZAP', 'Grant Thornton', '', 'Andhra Pradesh', '', NULL, '9999999999', '9999999999', '', 'male', NULL, '1', '2022-07-13 06:50:13'),
(199, 'test12@gmail.com', '4b0d2e9a7cd37dce8e008bd89ed4c84cf6e51537', 0, '115700884062ce86c9c67d52.44390004', 4, 'testss', 'Grant Thornton', '', 'UP', '', NULL, '7037225100', '7037225100', '', 'male', NULL, '1', '2022-07-13 08:48:09'),
(200, 'ram@gmail.com', '6ca4ab57bb492e74bb46444a02fbacfcf5da6e91', 0, '129296784562ce87f4661003.72493860', 4, 'Ram', 'Grant Thornton', '', 'UP', '', NULL, '9899256762', '9899256762', '', 'male', NULL, '1', '2022-07-13 08:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_assignment`
--

CREATE TABLE `user_assignment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `group_type` varchar(100) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `group_type`, `last_modified`) VALUES
(1, 'verifier', '2021-10-06 06:17:54'),
(2, 'approver', '2021-10-06 06:17:51'),
(3, 'admin', '2021-10-06 06:16:51'),
(4, 'visitor', '2021-10-06 06:17:05'),
(5, 'Stock Control', '2013-11-19 08:21:48'),
(6, 'Manager', '2013-11-19 08:22:35'),
(11, 'employee', '2015-09-22 03:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adtuk_users`
--
ALTER TABLE `adtuk_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`docid`);

--
-- Indexes for table `tcbp`
--
ALTER TABLE `tcbp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `user_assignment`
--
ALTER TABLE `user_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adtuk_users`
--
ALTER TABLE `adtuk_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tcbp`
--
ALTER TABLE `tcbp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `user_assignment`
--
ALTER TABLE `user_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
