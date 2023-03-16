-- phpMyAdmin SQL Dump
-- version 5.2.0-dev+20220501.56bbdb7fd7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 10:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sn` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `title` varchar(5) NOT NULL,
  `username` varchar(200) NOT NULL,
  `staff_user_name` varchar(200) NOT NULL,
  `employee_id` varchar(25) NOT NULL,
  `job_description` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `salary_status` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `last_update` varchar(20) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sn`, `fname`, `mname`, `lname`, `gender`, `title`, `username`, `staff_user_name`, `employee_id`, `job_description`, `phone`, `email`, `salary_status`, `level`, `picture`, `department`, `position`, `last_update`, `staff_id`, `role`) VALUES
(7, 'admin', 'admin', 'admin', 'male', '', '7a1e83220aea7623f42dd8bf9cd5d419', 'admin_demo_0001', 'admin_001', 'main_site aministrator ', '', '', '', '', '', '', 'admin', '', 0, '[\"1\",\"2\",\"7\"]'),
(21, 'Dev', '', 'Dev', '', '', '91180a647b39daeac35a951ca6173780', '947af30fc5fd1aaf1e0d8899d5d5baee', 'wwe_admin', 'Dev', '', '', '', '', '', 'Dev', 'subadmin', '', 37, '[\"7\"]');

-- --------------------------------------------------------

--
-- Table structure for table `admin_function`
--

CREATE TABLE `admin_function` (
  `sn` int(11) NOT NULL,
  `function` varchar(70) NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `admin_function`
--

INSERT INTO `admin_function` (`sn`, `function`, `link`, `status`) VALUES
(1, 'manage admin', '<a class=\"list-group-item\" href=\"madmin.php\"><span class=\"glyphicon glyphicon-user\"></span> <span>manage Admin</span></a>', 0),
(2, 'manage staff', '<a class=\"list-group-item\" href=\"mstaff.php\"><span class=\"glyphicon glyphicon-user\"></span> <span>manage staff</span></a>', 0),
(3, 'manage students', '<a class=\"list-group-item\" href=\"m_stu_cat.php\"><span class=\"glyphicon glyphicon-user\"></span> <span>manage student</span></a>', 0),
(4, 'manage fee', '<a class=\"list-group-item\" href=\"mfees.php\"><span class=\"glyphicon glyphicon-usd\"></span> <span>manage fees</span></a>', 0),
(6, 'general announcement', '<a href=\"canoucement.php\" class=\"list-group-item\"><span class=\"glyphicon glyphicon-bullhorn\"></span><span> General announcement</span></a>', 0),
(7, 'calendar', '<a href=\"calendar.php\" class=\"list-group-item\"><span class=\"glyphicon glyphicon-calendar\"></span>  <span>Calendar</span></a>', 0),
(8, 'student performance', '<a href=\"students_performance.php\" class=\"list-group-item\"><span class=\"glyphicon glyphicon-stats\"></span>  <span>Students Performance</span></a>', 0),
(9, 'bulk messages', '<a href=\"bulk_message.php\" class=\"list-group-item\"><span class=\"glyphicon glyphicon-envelope\"></span>  <span>bulk message</span></a>', 0),
(11, 'Manage Faculty', '<a href=\"mcollege.php\" class=\"list-group-item\"><span class=\"glyphicon glyphicon-education\"></span>  <span>Manage College</span></a>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `anoucement`
--

CREATE TABLE `anoucement` (
  `sn` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `dates` varchar(10) NOT NULL,
  `viewers` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `anoucement`
--

INSERT INTO `anoucement` (`sn`, `title`, `content`, `dates`, `viewers`) VALUES
(1, 'Test', 'This is a sample announcement', '13-01-23', 'all'),
(2, 'test2', 'wwwww', '13-01-23', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `sn` int(11) NOT NULL,
  `ass_id` varchar(20) NOT NULL,
  `sbj_id` int(20) NOT NULL,
  `title` varchar(220) NOT NULL,
  `description` text NOT NULL,
  `date_created` varchar(220) NOT NULL,
  `deadline_date` varchar(50) NOT NULL,
  `deadline_time` varchar(50) NOT NULL,
  `file` varchar(220) NOT NULL,
  `created_by` varchar(220) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Table structure for table `ass_sub`
--

CREATE TABLE `ass_sub` (
  `sn` int(11) NOT NULL,
  `ass_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `student` varchar(50) NOT NULL,
  `sub_date` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `sn` int(11) NOT NULL,
  `admission_no` varchar(10) NOT NULL,
  `class` varchar(220) NOT NULL,
  `arm` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `session` varchar(120) NOT NULL,
  `term` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `sn` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `current_semester` varchar(2) NOT NULL,
  `previous_session` varchar(20) NOT NULL,
  `s_start` varchar(10) NOT NULL,
  `s_stop` varchar(10) NOT NULL,
  `t_start` varchar(10) NOT NULL,
  `t_stop` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `school_name` varchar(500) NOT NULL DEFAULT 'First Technical University',
  `pass_mark` int(11) NOT NULL DEFAULT 45
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`sn`, `session`, `current_semester`, `previous_session`, `s_start`, `s_stop`, `t_start`, `t_stop`, `status`, `school_name`, `pass_mark`) VALUES
(1, '2022/2023', '1', '2021/2022', '12/12/2022', '12/12/2022', '05/06/2022', '05/06/2022', 0, 'First Technical University', 45);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `sn` int(11) NOT NULL,
  `class` varchar(220) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`sn`, `class`, `status`) VALUES
(1, 'Class 1', 0),
(2, 'Class2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `sn` int(11) NOT NULL,
  `college_name` varchar(220) NOT NULL,
  `college_code` varchar(220) NOT NULL,
  `dean` varchar(120) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`sn`, `college_name`, `college_code`, `dean`, `status`) VALUES
(1, 'SCHOOL OF COMPUTING', 'SOC', '', 0),
(2, 'SCHOOL OF SCIENCE', 'SOS', '', 0),
(3, 'SCHOOL OF ENGINEERING TECHNOLOGY', 'SEET', '', 0),
(4, 'SCHOOL OF ENVIRONMENTAL SCIENCE', 'SET', '', 0),
(5, 'SCHOOL OF AGRICULTURAL SCIENCE', 'SAAT', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `sn` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `code` varchar(11) NOT NULL,
  `college` varchar(120) NOT NULL,
  `college_code` varchar(120) NOT NULL,
  `department` varchar(15) NOT NULL,
  `dept_code` varchar(120) NOT NULL,
  `level` varchar(20) NOT NULL,
  `semester` varchar(120) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `dates` varchar(10) NOT NULL,
  `unit` varchar(11) NOT NULL,
  `pre` varchar(11) NOT NULL,
  `post` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`sn`, `title`, `code`, `college`, `college_code`, `department`, `dept_code`, `level`, `semester`, `teacher`, `type`, `dates`, `unit`, `pre`, `post`) VALUES
(82, 'Religion', 'vic111', '', '', '', '', '400', '1', 'victor', 'uw', '07-02-22', '1', '', ''),
(84, 'victor', 'vic2111', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '1', 'std/2221', 'uw', '07-02-22', '2', '', ''),
(85, 'Electromagnetic waves', 'EIE111', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '1', 'std/2221', 'dw', '08-02-22', '3', '', ''),
(86, 'English', 'Eng111', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '1', 'std/2221', 'cw', '08-02-22', '3', '', ''),
(87, 'Religion', 'rel111', '', 'COS', 'Mathematics', '', '100', '1', 'std/2221', 'uw', '07-02-22', '3', '', ''),
(88, 'Total Man Concept', 'TMC111', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '1', 'std/2221', 'uw', '03-03-22', '3', '', ''),
(89, 'victor', 'vic1111', 'College of Science', 'COS', 'Mathematics', 'MAT', '90', '1', 'std/2230', 'uw', '07-02-22', '2', '', ''),
(90, 'victor', 'vic11111', 'College of Science', 'COS', 'Mathematics', 'MAT', '90', '1', 'std/2230', 'uw', '07-02-22', '2', '', ''),
(91, 'Total Man Concept II', 'TMC112', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '1', 'std/2221', 'uw', '03-03-22', '1', '', ''),
(92, 'Total Man Concept II', 'TMC122', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '2', 'std/2221', 'uw', '03-03-22', '4', '', ''),
(93, 'Total Man Concept II', 'TMC113', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '1', 'std/2221', 'uw', '03-03-22', '6', '', ''),
(94, 'thermodynamics', 'eie121', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '2', 'std/2221', 'cw', '01-06-22', '2', '', ''),
(95, 'English', 'eng121', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '2', 'std/2221', 'cw', '01-06-22', '2', '', ''),
(96, 'chemistry', 'chm121', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '2', 'std/2221', 'cw', '03-06-22', '3', '', ''),
(97, 'geography ', 'geo121', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '2', 'std/2221', 'uw', '03-06-22', '3', '', ''),
(98, 'Biology', 'bio101', 'College of Science', 'COS', 'Mathematics', 'MAT', '100', '2', 'std/2221', 'dw', '03-06-22', '3', '', ''),
(99, 'Intro to IFT', 'IFT101', 'College of Science', 'COS', 'Mathematics', 'MAT', '200', '1', 'std/2234', 'dw', '13-01-23', '3', '', ''),
(100, 'Into to science', 'CSC102', 'SCHOOL OF COMPUTING', 'SOC', 'INFORMATION TEC', 'IFT', '100', '1', '63C42E49042EA', 'dw', '15-01-23', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_registration`
--

CREATE TABLE `course_registration` (
  `sn` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `matric_no` varchar(20) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` varchar(120) NOT NULL,
  `session` varchar(120) NOT NULL,
  `semester` varchar(220) NOT NULL,
  `unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `course_registration`
--

INSERT INTO `course_registration` (`sn`, `course_code`, `matric_no`, `status`, `created_at`, `updated_at`, `approved`, `session`, `semester`, `unit`) VALUES
(1, 'CSC102', 'mat0005', '0', '2023-01-15 20:41:38', NULL, '', '2022/2023', '1', 2),
(3, 'TMC113', 'mat0005', '0', '2023-01-15 20:44:43', NULL, '', '2022/2023', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `sn` int(11) NOT NULL,
  `course_code` varchar(120) NOT NULL,
  `week` varchar(120) NOT NULL,
  `topic` varchar(220) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(120) NOT NULL,
  `session` varchar(120) NOT NULL,
  `semester` varchar(120) NOT NULL,
  `set_by` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`sn`, `course_code`, `week`, `topic`, `description`, `date`, `session`, `semester`, `set_by`) VALUES
(3, '', '3', 'Good behaviour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(4, '', '3', 'Good behaviour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(5, '', '3', 'Good behaviour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(6, '', '3', 'Good behaviour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(7, '', '3', 'Good behaviour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(8, '', '3', 'Good behaviour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(9, '', '3', 'Good behaviour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(10, '', '1', 'Good behaviour', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(11, '', '2', 'Bad Behaviour', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(12, '', '3', 'Killing behaviour', 'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '15-01-2022', '2021/2022', '2', ''),
(13, 'EIE111', '9', 'Caution Caution Caution ', 'Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution Caution ', '19-02-2022', '2021/2022', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `sn` int(11) NOT NULL,
  `admission_no` varchar(10) NOT NULL,
  `class` varchar(220) NOT NULL,
  `arm` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `report` text NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `sn` int(11) NOT NULL,
  `department` varchar(150) NOT NULL,
  `dept_code` varchar(120) NOT NULL,
  `college` varchar(220) NOT NULL,
  `code` varchar(120) NOT NULL,
  `HOD` varchar(120) NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`sn`, `department`, `dept_code`, `college`, `code`, `HOD`, `status`) VALUES
(1, 'INFORMATION TECHNOLOGY', 'IFT', 'SCHOOL OF COMPUTING', 'SOC', '', ''),
(2, 'BIOLOGY', 'BIO', 'SCHOOL OF SCIENCE', 'SOS', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `elibrary`
--

CREATE TABLE `elibrary` (
  `sn` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(120) NOT NULL,
  `year` varchar(200) NOT NULL,
  `volume` varchar(110) NOT NULL,
  `edition` varchar(120) NOT NULL,
  `category` varchar(120) NOT NULL,
  `sub category` varchar(120) NOT NULL,
  `co author` varchar(120) NOT NULL,
  `picture` varchar(120) NOT NULL,
  `book_file` varchar(120) NOT NULL,
  `descrition` varchar(150) NOT NULL,
  `status` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `sn` int(11) NOT NULL,
  `event` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `venue` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`sn`, `event`, `date`, `time`, `venue`, `status`) VALUES
(2, 'Test Event', '2023-01-31', '02:15', 'Hall', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_access`
--

CREATE TABLE `exam_access` (
  `sn` int(11) NOT NULL,
  `student` varchar(150) NOT NULL,
  `subject_code` varchar(150) NOT NULL,
  `exam_code` varchar(150) NOT NULL,
  `attempt` varchar(5) NOT NULL DEFAULT '0',
  `questions` text NOT NULL,
  `time_left` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `sn` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `exam_code` varchar(150) NOT NULL,
  `type` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `display` varchar(10) NOT NULL,
  `start` datetime NOT NULL,
  `ends` datetime NOT NULL,
  `password` varchar(50) NOT NULL,
  `nons` varchar(10) NOT NULL,
  `questions` varchar(10) NOT NULL,
  `set_by` varchar(15) NOT NULL,
  `calculator` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `code` int(200) NOT NULL,
  `sn` varchar(200) NOT NULL,
  `title` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `college` varchar(120) NOT NULL,
  `department` varchar(120) NOT NULL,
  `level` varchar(50) NOT NULL,
  `semester` int(20) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `dates` varchar(10) NOT NULL,
  `session` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`code`, `sn`, `title`, `amount`, `college`, `department`, `level`, `semester`, `status`, `dates`, `session`) VALUES
(1, 'dd3360368b9fd98153564be7ca811a45', 'DEV.FUND', '50000', 'SOC', 'IFT', '100', 1, 0, '15-01-23', '2022/2023'),
(2, '50fd20af2ba234e9c4ed04aae99285e2', 'P.T.A Level', '1000', 'SOS', 'BIO', '300', 1, 0, '15-01-23', '2022/2023'),
(3, 'c617d33ffdbe5cd42d57e3982ca83867', 'Lesson', '1000', 'SOS', 'BIO', '100', 1, 0, '15-01-23', '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `final_score`
--

CREATE TABLE `final_score` (
  `sn` int(11) NOT NULL,
  `student` varchar(15) NOT NULL,
  `exam_code` varchar(150) NOT NULL,
  `score` varchar(5) NOT NULL,
  `time_spent` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `gone_staff`
--

CREATE TABLE `gone_staff` (
  `sn` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `title` varchar(5) NOT NULL,
  `username` varchar(200) NOT NULL,
  `employee` varchar(20) NOT NULL,
  `job_description` varchar(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `salary_status` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `date_employed` varchar(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `nok` varchar(20) NOT NULL,
  `rnok` varchar(20) NOT NULL,
  `pnok` varchar(16) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `college` varchar(120) NOT NULL,
  `program` varchar(120) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `acc` varchar(15) NOT NULL,
  `last_update` varchar(20) NOT NULL,
  `genotype` varchar(25) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `anok` text NOT NULL,
  `role` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `gpa_record`
--

CREATE TABLE `gpa_record` (
  `sn` int(11) NOT NULL,
  `matric_no` varchar(220) NOT NULL,
  `session` varchar(220) NOT NULL,
  `semester` varchar(120) NOT NULL,
  `gpa` varchar(220) NOT NULL,
  `date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `graduated_students`
--

CREATE TABLE `graduated_students` (
  `sn` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `matric_no` varchar(20) NOT NULL,
  `program` varchar(120) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `level` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `religion` varchar(15) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `dates` varchar(10) NOT NULL,
  `parents` varchar(50) NOT NULL,
  `parents_phone1` varchar(16) NOT NULL,
  `parents_phone2` varchar(16) NOT NULL,
  `p_email` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `date_admitted` varchar(10) NOT NULL,
  `batch` varchar(12) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `genotype` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `last_update` varchar(11) NOT NULL,
  `extral` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `inactive`
--

CREATE TABLE `inactive` (
  `sn` int(11) NOT NULL,
  `matric_no` varchar(20) NOT NULL,
  `dates` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `left_students`
--

CREATE TABLE `left_students` (
  `sn` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `matric_no` varchar(20) NOT NULL,
  `program` varchar(120) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `level` varchar(50) NOT NULL,
  `college` varchar(120) NOT NULL,
  `department` varchar(120) NOT NULL,
  `address` text NOT NULL,
  `religion` varchar(15) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `dates` varchar(10) NOT NULL,
  `parents` varchar(50) NOT NULL,
  `parents_phone1` varchar(16) NOT NULL,
  `parents_phone2` varchar(16) NOT NULL,
  `p_email` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `date_admitted` date NOT NULL,
  `batch` varchar(12) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `genotype` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `last_update` varchar(11) NOT NULL,
  `extral` int(11) NOT NULL,
  `disability` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `sn` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `coordinator` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`sn`, `level`, `coordinator`, `status`) VALUES
(8, '100', '', 0),
(9, '200', '', 0),
(10, '300', '', 0),
(11, '400', '', 0),
(12, '500', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `sn` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`sn`, `user`, `type`, `action`, `details`, `date`, `ip`) VALUES
(1, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'delete admin', '7a1e83220aea7623f42dd8bf9cd5d419 deleted an admin account with username ', '0000-00-00 00:00:00', '::1'),
(2, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create admin', '7a1e83220aea7623f42dd8bf9cd5d419 created an admin account with staff ID 37', '2023-01-14 04:31:09', '::1'),
(3, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_department', '7a1e83220aea7623f42dd8bf9cd5d419 created department BIO', '2023-01-15 15:56:22', '::1'),
(4, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_staff', '7a1e83220aea7623f42dd8bf9cd5d419 added a new staff with staff id 63C42D4EC173D', '2023-01-15 17:43:58', '::1'),
(5, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_staff', '7a1e83220aea7623f42dd8bf9cd5d419 added a new staff with staff id 63C42E49042EA', '2023-01-15 17:48:09', '::1'),
(6, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_staff', '7a1e83220aea7623f42dd8bf9cd5d419 changed department name from IFT to IFTs', '2023-01-15 18:04:02', '::1'),
(7, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_staff', '7a1e83220aea7623f42dd8bf9cd5d419 changed department name from IFTs to IFT', '2023-01-15 18:04:51', '::1'),
(8, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_fee', '7a1e83220aea7623f42dd8bf9cd5d419 cretaed a fee of 1,000.00 with title Lesson', '2023-01-15 18:11:49', '::1'),
(9, '', 'admin', 'create_fee', ' imported 200 students', '2023-01-15 21:22:42', '::1'),
(10, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_fee', '7a1e83220aea7623f42dd8bf9cd5d419 imported 200 students', '2023-01-15 21:25:04', '::1'),
(11, '7a1e83220aea7623f42dd8bf9cd5d419', 'admin', 'create_staff', '7a1e83220aea7623f42dd8bf9cd5d419 changed department name from IFT to IFT', '2023-01-15 21:47:35', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `max_loads`
--

CREATE TABLE `max_loads` (
  `sn` int(11) NOT NULL,
  `min` int(11) NOT NULL DEFAULT 10,
  `max` int(11) NOT NULL DEFAULT 24,
  `level` varchar(12) NOT NULL,
  `semester` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `max_loads`
--

INSERT INTO `max_loads` (`sn`, `min`, `max`, `level`, `semester`) VALUES
(1, 10, 24, '100', '1'),
(2, 10, 24, '100', '2'),
(3, 10, 24, '200', '1'),
(4, 10, 24, '200', '2'),
(5, 10, 24, '300', '1'),
(6, 10, 24, '300', '2'),
(7, 10, 24, '400', '1'),
(8, 10, 24, '400', '2'),
(9, 10, 24, '500', '1'),
(10, 10, 24, '500', '2');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `sn` int(11) NOT NULL,
  `matric_no` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `dates` varchar(10) NOT NULL,
  `audience` varchar(20) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `feedback` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `paid_fees`
--

CREATE TABLE `paid_fees` (
  `sn` int(11) NOT NULL,
  `fees_id` varchar(200) DEFAULT NULL,
  `fid` int(11) NOT NULL,
  `student` varchar(10) DEFAULT NULL,
  `amount` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `session` varchar(11) NOT NULL,
  `semester` int(20) NOT NULL DEFAULT 1,
  `receiptid` varchar(10) NOT NULL,
  `reference_id` varchar(150) NOT NULL,
  `method` varchar(10) NOT NULL,
  `dates` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `sn` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(170) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `alt_phone` varchar(16) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `others` int(11) NOT NULL,
  `parent_id` varchar(50) NOT NULL,
  `ward_id` varchar(50) NOT NULL,
  `ward_id2` varchar(170) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `period_format`
--

CREATE TABLE `period_format` (
  `sn` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `period` varchar(20) NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `sn` int(11) NOT NULL,
  `pin` varchar(220) NOT NULL,
  `teller_no` varchar(220) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `fees_id` varchar(200) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `admission` varchar(10) NOT NULL,
  `dates` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `pre_students`
--

CREATE TABLE `pre_students` (
  `sn` int(11) NOT NULL,
  `application_no` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `application2` varchar(150) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `lga` varchar(50) NOT NULL,
  `state` varchar(70) NOT NULL,
  `country` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `f_phone` varchar(16) NOT NULL,
  `f_email` varchar(150) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `m_phone` varchar(16) NOT NULL,
  `m_email` varchar(150) NOT NULL,
  `f_occupation` varchar(150) NOT NULL,
  `m_occupation` varchar(150) NOT NULL,
  `last_school` varchar(70) NOT NULL,
  `last_class` varchar(10) NOT NULL,
  `class` varchar(10) NOT NULL,
  `cert` varchar(150) NOT NULL,
  `last_result` varchar(150) NOT NULL,
  `passport` varchar(150) NOT NULL,
  `complete_status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `sn` int(11) NOT NULL,
  `school` varchar(150) NOT NULL,
  `department` varchar(120) NOT NULL,
  `program_code` varchar(120) NOT NULL,
  `program` varchar(120) NOT NULL,
  `duration` varchar(120) NOT NULL,
  `title` varchar(110) NOT NULL,
  `status` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`sn`, `school`, `department`, `program_code`, `program`, `duration`, `title`, `status`) VALUES
(1, 'Science', 'fff', 'Amaths', 'Applied Mathematics', '4', '', ''),
(2, 'Science', 'fff', 'Aphysics', 'Applied Physics', '4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `sn` int(11) NOT NULL,
  `subject_id` varchar(150) NOT NULL,
  `exam_code` varchar(150) NOT NULL,
  `que_id` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `sn` int(11) NOT NULL,
  `resultid` varchar(20) NOT NULL,
  `score` varchar(3) NOT NULL,
  `course` varchar(120) NOT NULL,
  `matric_no` varchar(50) NOT NULL,
  `code` varchar(200) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT '0',
  `set_by` varchar(20) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `session` varchar(10) NOT NULL,
  `date_created` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `result_access`
--

CREATE TABLE `result_access` (
  `sn` int(11) NOT NULL,
  `status` varchar(3) NOT NULL,
  `jss3` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `result_access`
--

INSERT INTO `result_access` (`sn`, `status`, `jss3`) VALUES
(1, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `result_query`
--

CREATE TABLE `result_query` (
  `sn` int(11) NOT NULL,
  `result` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `result_query`
--

INSERT INTO `result_query` (`sn`, `result`, `status`) VALUES
(6, 'result', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result_record`
--

CREATE TABLE `result_record` (
  `sn` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `session` varchar(10) NOT NULL,
  `semester` varchar(3) NOT NULL,
  `course` varchar(200) NOT NULL,
  `code` varchar(10) NOT NULL,
  `uniq` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `result_record`
--

INSERT INTO `result_record` (`sn`, `name`, `session`, `semester`, `course`, `code`, `uniq`) VALUES
(2, 'INTJSS1 test 1 result for 1st term of 2019/2020', '2021/2022', '1', 'Electromagnetic waves', 'EIE111', '6207e1a3a01e9'),
(3, 'eg MAT111 result for 1st semester of 2017/2018 session', '2021/2022', '1', 'victor', 'vic2111', '621cdbb48dfd2'),
(4, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '1', 'victor', 'vic1111', '6297c9545fce9'),
(5, 'eg MAT111 result for 1st semester of 2017/2018 session', '2021/2022', '1', 'English', 'Eng111', '6297c9954f44e'),
(6, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '1', 'Total Man Concept', 'TMC111', '6297cb3ccb622'),
(7, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '1', 'Total Man Concept II', 'TMC112', '6297cb4c53d7f'),
(8, 'MAT111 result for 1st semester of 2017/2018 session', '2021/2022', '1', 'Total Man Concept II', 'TMC122', '6297cb63b0676'),
(9, 'MAT111 result for 1st semester of 2017/2018 session', '2021/2022', '1', 'Total Man Concept II', 'TMC113', '6297cb754198b'),
(10, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '1', 'Religion', 'rel111', '6297cc5b5160c'),
(11, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '2', 'geography ', 'geo121', '6299f21caf693'),
(12, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '2', 'English', 'eng121', '6299f230080dd'),
(13, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '2', 'chemistry', 'chm121', '6299f25336e71'),
(14, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '2', 'biology', 'bio121', '6299f267e4c1a'),
(15, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '2', 'thermodynamics', 'eie121', '6299f2cfe67cc'),
(16, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2021/2022', '2', 'Total Man Concept II', 'TMC122', '6299f30027ce2'),
(17, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2022/2023', '1', 'Total Man Concept II', 'TMC122', '629a5face34da'),
(18, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2022/2023', '1', 'Total Man Concept', 'TMC111', '629a5fb77f699'),
(19, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2022/2023', '1', 'Total Man Concept II', 'TMC112', '629a6514236b3'),
(20, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2022/2023', '1', 'Total Man Concept II', 'TMC113', '629a652964a9b'),
(21, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2022/2023', '1', 'English', 'Eng111', '629a6597f08a2'),
(22, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2022/2023', '1', 'Electromagnetic waves', 'EIE111', '629a65fedf681'),
(23, 'MATJSS1 test 1 result for 1st term of 2017/2018 session', '2022/2023', '1', 'victor', 'vic2111', '629a667918b09');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `sn` int(11) NOT NULL,
  `code` varchar(150) NOT NULL,
  `school` varchar(120) NOT NULL,
  `dean` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sn`, `code`, `school`, `dean`, `description`, `status`) VALUES
(1, 'Sci', 'Science', 'std/2229', '', ''),
(2, 'Art', 'Art', 'std/2232', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sn` int(11) NOT NULL,
  `session` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sn`, `session`) VALUES
(1, '2021/2022'),
(2, '2022/2023'),
(3, '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sn` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `title` varchar(5) NOT NULL,
  `username` varchar(200) NOT NULL,
  `employee` varchar(20) NOT NULL,
  `job_description` varchar(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `salary_status` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `date_employed` varchar(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `nok` varchar(20) NOT NULL,
  `rnok` varchar(20) NOT NULL,
  `pnok` varchar(16) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `college` varchar(120) NOT NULL,
  `program` varchar(120) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `acc` varchar(15) NOT NULL,
  `last_update` varchar(20) NOT NULL,
  `genotype` varchar(25) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `anok` text NOT NULL,
  `role` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sn`, `fname`, `mname`, `lname`, `gender`, `title`, `username`, `employee`, `job_description`, `marital_status`, `address`, `phone`, `email`, `lga`, `state`, `country`, `salary_status`, `level`, `date_employed`, `picture`, `religion`, `nok`, `rnok`, `pnok`, `qualification`, `age`, `dob`, `department`, `college`, `program`, `bank`, `acc`, `last_update`, `genotype`, `blood_group`, `weight`, `height`, `anok`, `role`) VALUES
(3, 'Dev', 'Dev', 'Inc', 'Male', '', '8c5a0e4d07867c72ddc229a1b5bece9d', '63C42E49042EA', 'teaching', 'Single', 'Lagos', '08063050592', 'dev@dev.com', 'Akure south', 'Ondo', 'Nigeria', '', '', '2022-08-01', '', '', '', '', '', '', 0, '2019-01-01', 'IFT', 'SOC', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sn` int(11) NOT NULL,
  `student` varchar(10) NOT NULL,
  `class` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `session` varchar(120) NOT NULL,
  `term` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sn` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `admission_no` varchar(50) NOT NULL,
  `matric_no` varchar(20) NOT NULL,
  `program` varchar(120) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `level` varchar(50) NOT NULL,
  `college` varchar(120) NOT NULL,
  `department` varchar(120) NOT NULL,
  `address` text NOT NULL,
  `religion` varchar(15) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `dates` varchar(10) NOT NULL,
  `parents` varchar(50) NOT NULL,
  `parents_phone1` varchar(16) NOT NULL,
  `parents_phone2` varchar(16) NOT NULL,
  `p_email` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(200) NOT NULL,
  `date_admitted` date NOT NULL,
  `batch` varchar(12) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `genotype` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `last_update` varchar(11) NOT NULL,
  `extral` int(11) NOT NULL,
  `disability` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sn`, `fname`, `mname`, `lname`, `admission_no`, `matric_no`, `program`, `email`, `phone`, `gender`, `level`, `college`, `department`, `address`, `religion`, `lga`, `state`, `country`, `picture`, `status`, `active`, `dates`, `parents`, `parents_phone1`, `parents_phone2`, `p_email`, `age`, `dob`, `username`, `date_admitted`, `batch`, `blood_group`, `genotype`, `height`, `weight`, `last_update`, `extral`, `disability`) VALUES
(1, 'Elinor', 'Dosi', 'Edgeson', '63C4611FF2536', 'mat0001', '', 'dedgeson0@paginegialle.it', '1062795025', 'Female', '400', 'SOC', 'IFT', '660 Monica Center', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Dosi Edgeson', '7475148217', '', 'dedgeson0@xrea.com', 0, '2002-11-30', 'c631b8e98a81e3a56e4b1e407ab219eb', '2019-05-16', '', '', '', '', '', '', 0, ''),
(2, 'Daune', 'Brunhilda', 'Gillani', '63C4611FF2A45', 'mat0002', '', 'bgillani1@yelp.com', '8855021094', 'Female', '100', 'SOS', 'BIO', '889 Sommers Crossing', '', '', '', 'Greece', '', 0, 1, '15-01-23', 'Brunhilda Gillani', '2208497211', '', 'bgillani1@arstechnica.com', 0, '2002-10-11', '1251f4c126e3becabbef04b51bd62b96', '2020-02-11', '', '', '', '', '', '', 0, ''),
(3, 'Rosalia', 'Addie', 'Duckworth', '63C4611FF2F5F', 'mat0003', '', 'aduckworth2@chronoengine.com', '7749294992', 'Female', '500', 'SOS', 'BIO', '8506 Dixon Avenue', '', '', 'Île-de-France', 'France', '', 0, 1, '15-01-23', 'Addie Duckworth', '7391417083', '', 'aduckworth2@hexun.com', 0, '1996-01-19', 'f8a146692ea9e78076b3024a7e9d0fca', '2022-12-11', '', '', '', '', '', '', 0, ''),
(4, 'Pinchas', 'Grantham', 'Helliwell', '63C4611FF3486', 'mat0004', '', 'ghelliwell3@forbes.com', '9422848078', 'Male', '100', 'SOS', 'BIO', '7922 Welch Road', '', '', '', 'China', '', 0, 1, '15-01-23', 'Grantham Helliwell', '9288934401', '', 'ghelliwell3@cafepress.com', 0, '1994-06-18', 'edc93952f552ed8e697406e260b0b956', '2018-12-05', '', '', '', '', '', '', 0, ''),
(5, 'Erna', 'Myrtice', 'Churchlow', '63C4611FF3914', 'mat0005', '', 'mchurchlow4@rakuten.co.jp', '4556458420', 'Female', '100', 'SOC', 'IFT', '09748 Scoville Terrace', '', '', '', 'China', '', 0, 1, '15-01-23', 'Myrtice Churchlow', '7565566855', '', 'mchurchlow4@globo.com', 0, '2002-03-27', 'c4450bcabba3600ed09ca638203b92d9', '2018-01-22', '', '', '', '', '', '', 0, ''),
(6, 'Chickie', 'Miller', 'Lovart', '63C4611FF3C93', 'mat0006', '', 'mlovart5@example.com', '3631240176', 'Male', '500', 'SOC', 'IFT', '040 Division Avenue', '', '', '', 'Mali', '', 0, 1, '15-01-23', 'Miller Lovart', '2818203380', '', 'mlovart5@drupal.org', 0, '1995-07-24', '7eb2c37d2239f7f3f8b4b055abf15f7e', '2022-03-21', '', '', '', '', '', '', 0, ''),
(7, 'Willie', 'Alex', 'Dunbobbin', '63C4611FF4005', 'mat0007', '', 'adunbobbin6@bandcamp.com', '3541001948', 'Female', '500', 'SOC', 'IFT', '309 Oxford Avenue', '', '', '', 'Poland', '', 0, 1, '15-01-23', 'Alex Dunbobbin', '1565405230', '', 'adunbobbin6@usnews.com', 0, '1996-08-10', '6962de7e825866077f001c1fa04e0364', '2020-01-15', '', '', '', '', '', '', 0, ''),
(8, 'Jarid', 'Corby', 'Wragge', '63C461200009F', 'mat0008', '', 'cwragge7@list-manage.com', '9157126184', 'Male', '100', 'SOS', 'BIO', '23726 Summit Way', '', '', 'Texas', 'United States', '', 0, 1, '15-01-23', 'Corby Wragge', '5264537754', '', 'cwragge7@squarespace.com', 0, '1995-04-07', 'bb935bb6cc8cdea2d68fabb7cb439b64', '2021-08-14', '', '', '', '', '', '', 0, ''),
(9, 'Amelie', 'Alyce', 'Willerton', '63C46120003B7', 'mat0009', '', 'awillerton8@wufoo.com', '7004075635', 'Female', '300', 'SOC', 'IFT', '44 Westerfield Drive', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Alyce Willerton', '1646833944', '', 'awillerton8@hp.com', 0, '2003-08-03', 'ffa8267162fe552289f6043d72c5b2cd', '2020-01-24', '', '', '', '', '', '', 0, ''),
(10, 'Celie', 'Beckie', 'Tyrwhitt', '63C46120006AE', 'mat0010', '', 'btyrwhitt9@msn.com', '4299642295', 'Female', '100', 'SOS', 'BIO', '92 Washington Circle', '', '', 'Michoacan De Oc', 'Mexico', '', 0, 1, '15-01-23', 'Beckie Tyrwhitt', '4521626024', '', 'btyrwhitt9@ovh.net', 0, '1998-11-09', 'c55c72942adb84e5bd1d7e906b941024', '2022-05-15', '', '', '', '', '', '', 0, ''),
(11, 'Lorenzo', 'Gare', 'Lampert', '63C4612000908', 'mat0011', '', 'glamperta@pbs.org', '4576669474', 'Male', '100', 'SOS', 'BIO', '5 Carioca Terrace', '', '', '', 'Cuba', '', 0, 1, '15-01-23', 'Gare Lampert', '7136238190', '', 'glamperta@bloglovin.com', 0, '1996-07-15', '32b19f679c9ba8e3667687db221d725f', '2018-04-11', '', '', '', '', '', '', 0, ''),
(12, 'Quincey', 'Wilmer', 'Jenkison', '63C4612000B03', 'mat0012', '', 'wjenkisonb@prlog.org', '7438133962', 'Male', '400', 'SOS', 'BIO', '0 Sauthoff Center', '', '', '', 'Ivory Coast', '', 0, 1, '15-01-23', 'Wilmer Jenkison', '1925904971', '', 'wjenkisonb@shareasale.com', 0, '1991-10-27', '7ab2761ea5088794029411d71f619b14', '2019-08-26', '', '', '', '', '', '', 0, ''),
(13, 'Wolf', 'Quent', 'Didball', '63C4612000CD6', 'mat0013', '', 'qdidballc@gravatar.com', '9532322031', 'Male', '300', 'SOS', 'BIO', '858 Hayes Crossing', '', '', '', 'Afghanistan', '', 0, 1, '15-01-23', 'Quent Didball', '7377882842', '', 'qdidballc@behance.net', 0, '1990-11-29', '2007ec6ca9ec61ca8d9ce3fb61cceacd', '2020-12-12', '', '', '', '', '', '', 0, ''),
(14, 'Legra', 'Georgianna', 'Mountain', '63C4612000EA4', 'mat0014', '', 'gmountaind@deviantart.com', '3065415964', 'Female', '300', 'SOC', 'IFT', '629 Marcy Junction', '', '', '', 'Brazil', '', 0, 1, '15-01-23', 'Georgianna Mountain', '3872137592', '', 'gmountaind@sbwire.com', 0, '1994-10-11', 'd467cb13e18f42c678b01b18cca01968', '2018-07-18', '', '', '', '', '', '', 0, ''),
(15, 'Abelard', 'Charles', 'De Ath', '63C461200108F', 'mat0015', '', 'cdee@addthis.com', '8265228936', 'Male', '300', 'SOS', 'BIO', '44 Veith Court', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Charles De Ath', '8544813705', '', 'cdee@cisco.com', 0, '1993-05-25', '533342674f17941298e2cd554e1e796c', '2020-11-21', '', '', '', '', '', '', 0, ''),
(16, 'Jessamine', 'Kandy', 'Joutapavicius', '63C4612001253', 'mat0016', '', 'kjoutapaviciusf@163.com', '8663890155', 'Female', '400', 'SOC', 'IFT', '0240 Springview Alley', '', '', '', 'China', '', 0, 1, '15-01-23', 'Kandy Joutapavicius', '2659083852', '', 'kjoutapaviciusf@imageshack.us', 0, '1993-11-05', '05b47452bb1b7c2ac46960f46024a299', '2018-05-29', '', '', '', '', '', '', 0, ''),
(17, 'Ruprecht', 'Teodoro', 'Lindhe', '63C4612001414', 'mat0017', '', 'tlindheg@mac.com', '9401105364', 'Male', '300', 'SOS', 'BIO', '63566 Waubesa Alley', '', '', '', 'Tanzania', '', 0, 1, '15-01-23', 'Teodoro Lindhe', '3222284091', '', 'tlindheg@miibeian.gov.cn', 0, '1996-09-15', '237c875540fac8b11f8e5a0c4944e13a', '2020-05-01', '', '', '', '', '', '', 0, ''),
(18, 'Kurt', 'Virgilio', 'O\'Shirine', '63C46120017F9', 'mat0018', '', 'voshirineh@google.ru', '1813568698', 'Male', '400', 'SOC', 'IFT', '3 Westport Place', '', '', '', 'Madagascar', '', 0, 1, '15-01-23', 'Virgilio O\'Shirine', '3415659054', '', 'voshirineh@w3.org', 0, '1996-01-01', 'fc8290eaa681fd5f7c669f8f05d2d58b', '2020-04-27', '', '', '', '', '', '', 0, ''),
(19, 'Gunar', 'Leo', 'Spurnier', '63C4612001E39', 'mat0019', '', 'lspurnieri@parallels.com', '9627460946', 'Male', '100', 'SOC', 'IFT', '44059 Cody Drive', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Leo Spurnier', '9579016738', '', 'lspurnieri@google.co.jp', 0, '1997-11-03', '9139c178b6a08c493704ef7be6f20234', '2022-09-01', '', '', '', '', '', '', 0, ''),
(20, 'Suzi', 'Shannen', 'Sinyard', '63C461200222E', 'mat0020', '', 'ssinyardj@blogs.com', '2925756964', 'Female', '500', 'SOC', 'IFT', '956 Acker Place', '', '', '', 'Afghanistan', '', 0, 1, '15-01-23', 'Shannen Sinyard', '7588178780', '', 'ssinyardj@nifty.com', 0, '1991-10-26', '2d02ee50a36401b63b41d2ba6347f18b', '2018-12-20', '', '', '', '', '', '', 0, ''),
(21, 'Carilyn', 'Daphene', 'O\'Collopy', '63C461200259B', 'mat0021', '', 'docollopyk@multiply.com', '7221947652', 'Female', '200', 'SOC', 'IFT', '37 Anthes Center', '', '', 'Perak', 'Malaysia', '', 0, 1, '15-01-23', 'Daphene O\'Collopy', '6362715109', '', 'docollopyk@theguardian.com', 0, '1993-09-21', '1e517c40c19514e210d66f9c59c858fe', '2018-10-31', '', '', '', '', '', '', 0, ''),
(22, 'Gualterio', 'Forrester', 'Pendrigh', '63C46120029D7', 'mat0022', '', 'fpendrighl@amazon.co.uk', '4358384668', 'Male', '400', 'SOS', 'BIO', '8 Esch Lane', '', '', 'Stockholm', 'Sweden', '', 0, 1, '15-01-23', 'Forrester Pendrigh', '3611653926', '', 'fpendrighl@wikispaces.com', 0, '1999-08-18', 'b207d25b3460fd92e2ce121bdd761d1d', '2022-08-30', '', '', '', '', '', '', 0, ''),
(23, 'Cameron', 'Waylan', 'Labon', '63C4612002F67', 'mat0023', '', 'wlabonm@bigcartel.com', '7795223131', 'Male', '500', 'SOC', 'IFT', '69434 Bonner Road', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Waylan Labon', '1336806601', '', 'wlabonm@privacy.gov.au', 0, '1992-05-26', 'd9f96aaad57334cd0eb6b5f4e940dbc6', '2019-07-22', '', '', '', '', '', '', 0, ''),
(24, 'Kristy', 'Clementine', 'Fancet', '63C461200322C', 'mat0024', '', 'cfancetn@reddit.com', '3674972161', 'Female', '500', 'SOC', 'IFT', '40310 Elmside Parkway', '', '', '', 'China', '', 0, 1, '15-01-23', 'Clementine Fancet', '8127397219', '', 'cfancetn@nbcnews.com', 0, '1991-10-17', '8d074cc31952885480478e590aae3052', '2022-03-03', '', '', '', '', '', '', 0, ''),
(25, 'Goldina', 'Courtnay', 'Leinweber', '63C4612003574', 'mat0025', '', 'cleinwebero@last.fm', '4533015204', 'Female', '100', 'SOC', 'IFT', '8813 Canary Terrace', '', '', '', 'Democratic Repu', '', 0, 1, '15-01-23', 'Courtnay Leinweber', '1096327127', '', 'cleinwebero@engadget.com', 0, '1992-11-23', '4a1b9fe61899a7e89acaeb123cd5a96c', '2021-01-29', '', '', '', '', '', '', 0, ''),
(26, 'Bernardine', 'Eveline', 'Pury', '63C461200382E', 'mat0026', '', 'epuryp@baidu.com', '8684198767', 'Female', '400', 'SOC', 'IFT', '6 Gulseth Street', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Eveline Pury', '9901243715', '', 'epuryp@istockphoto.com', 0, '1990-10-16', 'a8e27b8c65466aa9501d034f719b0af4', '2022-01-24', '', '', '', '', '', '', 0, ''),
(27, 'Zita', 'Odelia', 'Castanaga', '63C4612003ABD', 'mat0027', '', 'ocastanagaq@google.cn', '7139719445', 'Female', '500', 'SOC', 'IFT', '982 Messerschmidt Hill', '', '', 'Texas', 'United States', '', 0, 1, '15-01-23', 'Odelia Castanaga', '5378108781', '', 'ocastanagaq@google.co.jp', 0, '1992-02-01', '7437e703995690641d81ad4a3df63cc7', '2018-08-27', '', '', '', '', '', '', 0, ''),
(28, 'Zoe', 'Natalya', 'Waberer', '63C4612003CA4', 'mat0028', '', 'nwabererr@i2i.jp', '4839082423', 'Female', '200', 'SOC', 'IFT', '69209 Erie Street', '', '', '', 'Ukraine', '', 0, 1, '15-01-23', 'Natalya Waberer', '5036764168', '', 'nwabererr@naver.com', 0, '1993-02-21', 'ce934dce931583ac73d6215113bc6215', '2022-08-21', '', '', '', '', '', '', 0, ''),
(29, 'Waylan', 'Aguste', 'Ellif', '63C4612003ED1', 'mat0029', '', 'aellifs@goo.ne.jp', '2665427902', 'Male', '400', 'SOC', 'IFT', '53 Nobel Trail', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Aguste Ellif', '4562306048', '', 'aellifs@chicagotribune.com', 0, '1997-01-12', '54d73ebf91f7b5ebfcce3240d268cc2c', '2020-08-23', '', '', '', '', '', '', 0, ''),
(30, 'Patti', 'Kakalina', 'Dockwra', '63C4612004094', 'mat0030', '', 'kdockwrat@redcross.org', '5254874887', 'Female', '500', 'SOC', 'IFT', '6945 Pawling Alley', '', '', '', 'Japan', '', 0, 1, '15-01-23', 'Kakalina Dockwra', '6274843617', '', 'kdockwrat@friendfeed.com', 0, '1992-12-26', '6d149c346fe9dfb710ef595f8d02c4cf', '2019-11-10', '', '', '', '', '', '', 0, ''),
(31, 'Sonnnie', 'Fallon', 'Goose', '63C4612004290', 'mat0031', '', 'fgooseu@google.com.br', '1953704070', 'Female', '300', 'SOC', 'IFT', '1 Brentwood Alley', '', '', '', 'Thailand', '', 0, 1, '15-01-23', 'Fallon Goose', '9017617566', '', 'fgooseu@theatlantic.com', 0, '1999-07-19', 'f068279e67c732ff757e2aae56b0deb5', '2019-02-04', '', '', '', '', '', '', 0, ''),
(32, 'Turner', 'Delainey', 'Lannon', '63C4612004479', 'mat0032', '', 'dlannonv@bizjournals.com', '7045097084', 'Male', '200', 'SOC', 'IFT', '65 Banding Road', '', '', '', 'Ivory Coast', '', 0, 1, '15-01-23', 'Delainey Lannon', '4009710600', '', 'dlannonv@wisc.edu', 0, '1997-09-17', '1c777ea23fee12bb49f6fc446dc1b29d', '2021-08-28', '', '', '', '', '', '', 0, ''),
(33, 'Ingrim', 'Paten', 'Stansfield', '63C46120046BE', 'mat0033', '', 'pstansfieldw@live.com', '4294005378', 'Male', '100', 'SOS', 'BIO', '70 Namekagon Crossing', '', '', '', 'China', '', 0, 1, '15-01-23', 'Paten Stansfield', '1218889645', '', 'pstansfieldw@icq.com', 0, '2000-03-23', '8eb2a178542abab3301a916ee2c1d91c', '2019-08-21', '', '', '', '', '', '', 0, ''),
(34, 'Kimberlee', 'Loria', 'Wellen', '63C4612004945', 'mat0034', '', 'lwellenx@dagondesign.com', '8022748527', 'Female', '200', 'SOS', 'BIO', '27197 Fuller Junction', '', '', '', 'Uruguay', '', 0, 1, '15-01-23', 'Loria Wellen', '8328419642', '', 'lwellenx@rakuten.co.jp', 0, '1990-12-17', '1e0f27c1470a54fe1ea3a8541faf7e21', '2021-02-05', '', '', '', '', '', '', 0, ''),
(35, 'Lillian', 'Juliet', 'Gilburt', '63C4612004B3F', 'mat0035', '', 'jgilburty@tinyurl.com', '4622571427', 'Female', '300', 'SOC', 'IFT', '2550 Pierstorff Drive', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Juliet Gilburt', '8845620052', '', 'jgilburty@google.cn', 0, '1993-08-12', '45830bf2641e6bae7bee684de815e43e', '2022-10-08', '', '', '', '', '', '', 0, ''),
(36, 'Sarena', 'Olenka', 'Thursfield', '63C4612004D15', 'mat0036', '', 'othursfieldz@tamu.edu', '2175274989', 'Female', '400', 'SOS', 'BIO', '12285 Center Place', '', '', '', 'Bangladesh', '', 0, 1, '15-01-23', 'Olenka Thursfield', '3489071021', '', 'othursfieldz@tripadvisor.com', 0, '1994-07-02', '1d19e7a8decb15314b4250a772bfdd7a', '2018-05-14', '', '', '', '', '', '', 0, ''),
(37, 'Christophorus', 'Garwin', 'Godain', '63C4612004EE1', 'mat0037', '', 'ggodain10@economist.com', '3221828064', 'Male', '500', 'SOC', 'IFT', '2 Reinke Terrace', '', '', 'Midi-Pyrénées', 'France', '', 0, 1, '15-01-23', 'Garwin Godain', '9726525952', '', 'ggodain10@reddit.com', 0, '1996-03-27', 'b1dee669dcaaf9666b7ff3c76adbe13b', '2020-03-27', '', '', '', '', '', '', 0, ''),
(38, 'Randa', 'Adore', 'Badrick', '63C46120050AA', 'mat0038', '', 'abadrick11@abc.net.au', '3039496641', 'Female', '500', 'SOS', 'BIO', '1 Brentwood Road', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Adore Badrick', '4556283864', '', 'abadrick11@sciencedirect.com', 0, '1991-03-18', '1346d51cc8981f7fe09581f2e736baae', '2019-11-27', '', '', '', '', '', '', 0, ''),
(39, 'Audie', 'Germain', 'Hamstead', '63C461200526B', 'mat0039', '', 'ghamstead12@dyndns.org', '2735333674', 'Female', '400', 'SOS', 'BIO', '85864 Manley Circle', '', '', 'Stockholm', 'Sweden', '', 0, 1, '15-01-23', 'Germain Hamstead', '6505124507', '', 'ghamstead12@fotki.com', 0, '1993-06-24', 'f28897df3ff29f4c8a8b0885d2899953', '2022-06-04', '', '', '', '', '', '', 0, ''),
(40, 'Neall', 'Konstantine', 'Flexman', '63C4612005414', 'mat0040', '', 'kflexman13@sitemeter.com', '8023387296', 'Male', '300', 'SOC', 'IFT', '763 Fulton Place', '', '', '', 'China', '', 0, 1, '15-01-23', 'Konstantine Flexman', '9515955079', '', 'kflexman13@so-net.ne.jp', 0, '1997-11-04', '426c7bb1368bdaddbf797441fc621520', '2020-04-05', '', '', '', '', '', '', 0, ''),
(41, 'Mellie', 'Lorrayne', 'Locke', '63C46120058FE', 'mat0041', '', 'llocke14@cmu.edu', '9992831910', 'Female', '400', 'SOC', 'IFT', '308 Jenna Street', '', '', '', 'Colombia', '', 0, 1, '15-01-23', 'Lorrayne Locke', '2282617437', '', 'llocke14@linkedin.com', 0, '2002-10-30', '6388940e9daa26b8fb6567f3ba1917a7', '2021-01-12', '', '', '', '', '', '', 0, ''),
(42, 'Cahra', 'Claribel', 'Tolomei', '63C4612005D47', 'mat0042', '', 'ctolomei15@lulu.com', '5794867557', 'Female', '400', 'SOS', 'BIO', '137 Messerschmidt Lane', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Claribel Tolomei', '9455532326', '', 'ctolomei15@ucoz.com', 0, '1995-02-22', 'b035fd4a8011b7814297ff10872caf69', '2020-07-15', '', '', '', '', '', '', 0, ''),
(43, 'Alene', 'Tanitansy', 'Duferie', '63C461200626A', 'mat0043', '', 'tduferie16@yellowpages.com', '3729455008', 'Female', '200', 'SOC', 'IFT', '6055 Kenwood Alley', '', '', '', 'China', '', 0, 1, '15-01-23', 'Tanitansy Duferie', '8601924729', '', 'tduferie16@constantcontact.com', 0, '1995-01-30', 'f130c624a61ab1b054e76c3e12995bfb', '2022-01-17', '', '', '', '', '', '', 0, ''),
(44, 'Kylila', 'Karoline', 'Parken', '63C46120065B0', 'mat0044', '', 'kparken17@miibeian.gov.cn', '1838472773', 'Female', '400', 'SOS', 'BIO', '20685 Delaware Court', '', '', '', 'Finland', '', 0, 1, '15-01-23', 'Karoline Parken', '2303771666', '', 'kparken17@spotify.com', 0, '1990-01-26', '69c050ec35fa1a304fa89799f08c8e98', '2022-07-22', '', '', '', '', '', '', 0, ''),
(45, 'Clarita', 'Shirl', 'Currom', '63C4612006927', 'mat0045', '', 'scurrom18@illinois.edu', '1443488631', 'Female', '200', 'SOC', 'IFT', '934 Burning Wood Lane', '', '', '', 'Japan', '', 0, 1, '15-01-23', 'Shirl Currom', '7782145142', '', 'scurrom18@deviantart.com', 0, '2003-09-08', '864511f4afc1ff236721d6ecd318c45a', '2021-10-17', '', '', '', '', '', '', 0, ''),
(46, 'Kellyann', 'Sonya', 'Troctor', '63C4612006C4E', 'mat0046', '', 'stroctor19@cisco.com', '1964471130', 'Female', '300', 'SOS', 'BIO', '6766 Cottonwood Drive', '', '', '', 'China', '', 0, 1, '15-01-23', 'Sonya Troctor', '2485592832', '', 'stroctor19@theatlantic.com', 0, '1996-12-29', '1bfcd714a8e90cfd1e6cafa63369a126', '2020-03-07', '', '', '', '', '', '', 0, ''),
(47, 'Lionel', 'Lezley', 'Whitcher', '63C4612006F0D', 'mat0047', '', 'lwhitcher1a@ning.com', '2144145441', 'Male', '100', 'SOS', 'BIO', '5022 Linden Road', '', '', '', 'Nepal', '', 0, 1, '15-01-23', 'Lezley Whitcher', '5905665538', '', 'lwhitcher1a@nasa.gov', 0, '1997-04-24', '58e20c9b694a026cb0c1789a75007431', '2018-06-03', '', '', '', '', '', '', 0, ''),
(48, 'Rozalin', 'Cindy', 'Jutson', '63C4612007168', 'mat0048', '', 'cjutson1b@prlog.org', '9648911542', 'Female', '400', 'SOS', 'BIO', '13 Cherokee Avenue', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Cindy Jutson', '2113880127', '', 'cjutson1b@issuu.com', 0, '2000-03-21', 'e0aaff5c46d75ba1dbdd2c44eeabbeea', '2020-05-03', '', '', '', '', '', '', 0, ''),
(49, 'Crystal', 'Guenna', 'Simonazzi', '63C461200734A', 'mat0049', '', 'gsimonazzi1c@yahoo.co.jp', '2504240252', 'Female', '100', 'SOS', 'BIO', '30 Sundown Parkway', '', '', '', 'China', '', 0, 1, '15-01-23', 'Guenna Simonazzi', '6336733000', '', 'gsimonazzi1c@alexa.com', 0, '1995-04-25', '426c33df109f74f72b6e4efdbb22b18d', '2018-06-30', '', '', '', '', '', '', 0, ''),
(50, 'Ave', 'Morry', 'Korpolak', '63C4612007504', 'mat0050', '', 'mkorpolak1d@naver.com', '1745418052', 'Male', '300', 'SOC', 'IFT', '63 Judy Court', '', '', '', 'Ivory Coast', '', 0, 1, '15-01-23', 'Morry Korpolak', '6512389322', '', 'mkorpolak1d@odnoklassniki.ru', 0, '1997-03-18', 'b09022cd500e41169b379e77f49fe651', '2019-11-03', '', '', '', '', '', '', 0, ''),
(51, 'Pamella', 'Karita', 'Bourgaize', '63C461200767F', 'mat0051', '', 'kbourgaize1e@seattletimes.com', '3861792778', 'Female', '400', 'SOS', 'BIO', '680 Hovde Park', '', '', '', 'Ireland', '', 0, 1, '15-01-23', 'Karita Bourgaize', '1468037263', '', 'kbourgaize1e@alibaba.com', 0, '1992-02-08', '8b4a5cee22fe3555da310b4535ded583', '2019-10-07', '', '', '', '', '', '', 0, ''),
(52, 'Velma', 'De', 'Morgans', '63C46120078E1', 'mat0052', '', 'dmorgans1f@nymag.com', '8501272366', 'Female', '100', 'SOS', 'BIO', '9 Scott Center', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'De Morgans', '1827027995', '', 'dmorgans1f@free.fr', 0, '1999-10-31', '07898bad098042cd369df49c009690a7', '2019-01-17', '', '', '', '', '', '', 0, ''),
(53, 'Brandon', 'Roland', 'Bolger', '63C4612007A69', 'mat0053', '', 'rbolger1g@google.cn', '8799603346', 'Male', '200', 'SOC', 'IFT', '2 Harbort Circle', '', '', '', 'China', '', 0, 1, '15-01-23', 'Roland Bolger', '8683521997', '', 'rbolger1g@forbes.com', 0, '2000-10-31', '100c6e2979c1909bf8141e21964231fd', '2019-03-10', '', '', '', '', '', '', 0, ''),
(54, 'Agretha', 'Matilde', 'Armes', '63C4612007C01', 'mat0054', '', 'marmes1h@nifty.com', '9043822856', 'Female', '100', 'SOC', 'IFT', '6146 Marquette Park', '', '', '', 'China', '', 0, 1, '15-01-23', 'Matilde Armes', '2717490341', '', 'marmes1h@bloglines.com', 0, '1994-12-18', '34495b71014d0b9dd4588b973199dcc4', '2022-07-31', '', '', '', '', '', '', 0, ''),
(55, 'Avrom', 'Mychal', 'Kunzelmann', '63C4612007D6C', 'mat0055', '', 'mkunzelmann1i@alibaba.com', '3977390326', 'Male', '300', 'SOS', 'BIO', '3 Grayhawk Center', '', '', '', 'Czech Republic', '', 0, 1, '15-01-23', 'Mychal Kunzelmann', '6306461380', '', 'mkunzelmann1i@pen.io', 0, '2000-04-04', 'b72801a4cc16e626e9c934f5d8483197', '2020-11-03', '', '', '', '', '', '', 0, ''),
(56, 'Christen', 'Sibyl', 'Aguilar', '63C4612007EE7', 'mat0056', '', 'saguilar1j@cam.ac.uk', '3646174514', 'Female', '200', 'SOC', 'IFT', '3 Oak Valley Junction', '', '', 'Viana do Castel', 'Portugal', '', 0, 1, '15-01-23', 'Sibyl Aguilar', '7505189716', '', 'saguilar1j@java.com', 0, '1993-11-07', '49d4f21614616e4307afcf574e134f0b', '2020-02-14', '', '', '', '', '', '', 0, ''),
(57, 'Kurt', 'Theodoric', 'Nizard', '63C461200805B', 'mat0057', '', 'tnizard1k@npr.org', '6139521719', 'Male', '400', 'SOC', 'IFT', '693 Hovde Court', '', '', '', 'Brazil', '', 0, 1, '15-01-23', 'Theodoric Nizard', '2277996742', '', 'tnizard1k@slashdot.org', 0, '2001-04-01', '3b877420c1855fb97d3a9be5ff78eb1b', '2022-03-01', '', '', '', '', '', '', 0, ''),
(58, 'Meyer', 'Nolan', 'Kochs', '63C46120081C9', 'mat0058', '', 'nkochs1l@creativecommons.org', '1462659881', 'Male', '500', 'SOC', 'IFT', '43257 Eliot Alley', '', '', '', 'Ivory Coast', '', 0, 1, '15-01-23', 'Nolan Kochs', '3791553558', '', 'nkochs1l@360.cn', 0, '1990-11-13', '5c3f8167b07656e0721780f78eb18fb0', '2018-10-23', '', '', '', '', '', '', 0, ''),
(59, 'Gratia', 'Libbey', 'Staff', '63C461200834C', 'mat0059', '', 'lstaff1m@joomla.org', '1324183676', 'Female', '100', 'SOC', 'IFT', '9 Summit Parkway', '', '', 'Perlis', 'Malaysia', '', 0, 1, '15-01-23', 'Libbey Staff', '2394203604', '', 'lstaff1m@discovery.com', 0, '1996-03-25', '71c70b222626fa52e876b9d6e6742759', '2021-05-27', '', '', '', '', '', '', 0, ''),
(60, 'Archibold', 'Winn', 'Goaley', '63C46120084C0', 'mat0060', '', 'wgoaley1n@amazon.co.jp', '6331120582', 'Male', '500', 'SOS', 'BIO', '5 Erie Crossing', '', '', '', 'Argentina', '', 0, 1, '15-01-23', 'Winn Goaley', '5027216369', '', 'wgoaley1n@statcounter.com', 0, '1999-10-23', '786b633010b681ce7a5d4df376bde42b', '2021-05-02', '', '', '', '', '', '', 0, ''),
(61, 'Nickie', 'Constantine', 'Cranmore', '63C4612008638', 'mat0061', '', 'ccranmore1o@businessinsider.com', '5025004272', 'Male', '100', 'SOS', 'BIO', '46 Shasta Court', '', '', '', 'Syria', '', 0, 1, '15-01-23', 'Constantine Cranmore', '8999807609', '', 'ccranmore1o@mac.com', 0, '1990-03-03', 'b7c99576e691f20606de95c8ff80e210', '2022-03-10', '', '', '', '', '', '', 0, ''),
(62, 'Bartolomeo', 'Allen', 'Garford', '63C46120087C2', 'mat0062', '', 'agarford1p@google.com', '5042374649', 'Male', '100', 'SOS', 'BIO', '1 Waubesa Place', '', '', '', 'Peru', '', 0, 1, '15-01-23', 'Allen Garford', '5014754273', '', 'agarford1p@jigsy.com', 0, '2004-07-28', 'c074151d09c679e99a43f48847e1ab90', '2022-09-27', '', '', '', '', '', '', 0, ''),
(63, 'Guendolen', 'Constanta', 'Piggens', '63C4612008931', 'mat0063', '', 'cpiggens1q@webs.com', '4028081271', 'Female', '500', 'SOS', 'BIO', '5 Kenwood Crossing', '', '', '', 'Armenia', '', 0, 1, '15-01-23', 'Constanta Piggens', '2648534829', '', 'cpiggens1q@time.com', 0, '1996-01-27', '40767e2a3b6884346236ddf407a25460', '2018-01-21', '', '', '', '', '', '', 0, ''),
(64, 'Lucille', 'Avrit', 'Dumbelton', '63C4612008A9C', 'mat0064', '', 'adumbelton1r@taobao.com', '7356112843', 'Female', '400', 'SOS', 'BIO', '1 Hudson Park', '', '', '', 'Ukraine', '', 0, 1, '15-01-23', 'Avrit Dumbelton', '1927887254', '', 'adumbelton1r@ycombinator.com', 0, '2002-02-28', 'aa07ed24a750c249a2c8af289d0c7d2d', '2018-06-09', '', '', '', '', '', '', 0, ''),
(65, 'Keefer', 'Matty', 'Learmonth', '63C4612008C0D', 'mat0065', '', 'mlearmonth1s@domainmarket.com', '3217052383', 'Male', '200', 'SOS', 'BIO', '8 Eliot Place', '', '', '', 'China', '', 0, 1, '15-01-23', 'Matty Learmonth', '1671382347', '', 'mlearmonth1s@google.de', 0, '2000-06-24', '34b6980abe9eccfe32de618f9362614c', '2018-06-20', '', '', '', '', '', '', 0, ''),
(66, 'Aubine', 'Tatiania', 'Ruberti', '63C4612008D74', 'mat0066', '', 'truberti1t@ustream.tv', '6502955215', 'Female', '200', 'SOS', 'BIO', '37 Ridgeway Crossing', '', '', '', 'China', '', 0, 1, '15-01-23', 'Tatiania Ruberti', '4364724409', '', 'truberti1t@ted.com', 0, '1991-05-25', 'cb0ca59d65c0d208bd40b25394b809db', '2018-07-27', '', '', '', '', '', '', 0, ''),
(67, 'Thadeus', 'Russell', 'Terrazzo', '63C4612008EE7', 'mat0067', '', 'rterrazzo1u@imageshack.us', '9583840851', 'Male', '200', 'SOS', 'BIO', '823 Miller Crossing', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Russell Terrazzo', '3816600841', '', 'rterrazzo1u@webs.com', 0, '1998-05-09', '4990fbe20f6f25234c3f027db5cf981f', '2021-11-26', '', '', '', '', '', '', 0, ''),
(68, 'Randolf', 'Frederico', 'Burges', '63C461200905D', 'mat0068', '', 'fburges1v@imageshack.us', '1229848043', 'Male', '100', 'SOS', 'BIO', '897 Sunbrook Drive', '', '', 'Île-de-France', 'France', '', 0, 1, '15-01-23', 'Frederico Burges', '4096060631', '', 'fburges1v@tinyurl.com', 0, '1993-02-12', '03ca1c719d0f59718dac45a8cbd9fa5a', '2020-09-19', '', '', '', '', '', '', 0, ''),
(69, 'Domenic', 'Shawn', 'Onslow', '63C46120091C2', 'mat0069', '', 'sonslow1w@apple.com', '2684009312', 'Male', '300', 'SOS', 'BIO', '36 Waywood Plaza', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Shawn Onslow', '5614430127', '', 'sonslow1w@rediff.com', 0, '1997-02-13', '3710ca05589955503a944715fe6192bc', '2020-01-01', '', '', '', '', '', '', 0, ''),
(70, 'Marice', 'Leesa', 'Nunan', '63C4612009344', 'mat0070', '', 'lnunan1x@usda.gov', '1971550595', 'Female', '100', 'SOS', 'BIO', '33363 Sommers Parkway', '', '', 'Viana do Castel', 'Portugal', '', 0, 1, '15-01-23', 'Leesa Nunan', '7885782482', '', 'lnunan1x@lulu.com', 0, '1994-07-17', '97774d867ab419f22706cc2bf11165a0', '2019-01-09', '', '', '', '', '', '', 0, ''),
(71, 'Valentine', 'Dewain', 'Guirard', '63C46120094AF', 'mat0071', '', 'dguirard1y@dagondesign.com', '3953109772', 'Male', '500', 'SOS', 'BIO', '3814 Hauk Terrace', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Dewain Guirard', '6595433436', '', 'dguirard1y@cornell.edu', 0, '2003-12-23', '5a0d70749b084bb3beb3961b57586692', '2022-06-16', '', '', '', '', '', '', 0, ''),
(72, 'Cordy', 'Richmound', 'Chisnell', '63C4612009634', 'mat0072', '', 'rchisnell1z@prweb.com', '4174409545', 'Male', '400', 'SOC', 'IFT', '43264 Atwood Trail', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Richmound Chisnell', '2557185037', '', 'rchisnell1z@clickbank.net', 0, '1996-12-26', 'c5d797fe543bcaf55cf3a7616afbb589', '2021-12-25', '', '', '', '', '', '', 0, ''),
(73, 'Oriana', 'Sharron', 'Rykert', '63C46120098BD', 'mat0073', '', 'srykert20@narod.ru', '3755684442', 'Female', '500', 'SOS', 'BIO', '8907 Dovetail Avenue', '', '', '', 'Dominican Repub', '', 0, 1, '15-01-23', 'Sharron Rykert', '5415174464', '', 'srykert20@mail.ru', 0, '2003-12-17', 'bb94178c511ed82465b5d0ca1a280bb4', '2018-09-26', '', '', '', '', '', '', 0, ''),
(74, 'Cristionna', 'Madalena', 'Souster', '63C4612009F11', 'mat0074', '', 'msouster21@artisteer.com', '5811307051', 'Female', '300', 'SOS', 'BIO', '792 Hauk Park', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Madalena Souster', '1243387036', '', 'msouster21@live.com', 0, '1998-06-05', '9a22d8ccf23a8ceb6304fa46f2d601b2', '2021-03-11', '', '', '', '', '', '', 0, ''),
(75, 'Kristan', 'Hephzibah', 'Bexley', '63C461200A3DD', 'mat0075', '', 'hbexley22@lycos.com', '1113739573', 'Female', '100', 'SOS', 'BIO', '871 Cottonwood Trail', '', '', '', 'Brazil', '', 0, 1, '15-01-23', 'Hephzibah Bexley', '9941535999', '', 'hbexley22@arizona.edu', 0, '1996-09-01', 'bca1517b570aff4fb683f96400667704', '2022-01-22', '', '', '', '', '', '', 0, ''),
(76, 'Verena', 'Steffi', 'Longbottom', '63C461200A6BF', 'mat0076', '', 'slongbottom23@blogs.com', '4591321878', 'Female', '200', 'SOC', 'IFT', '33 Badeau Lane', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Steffi Longbottom', '2465015500', '', 'slongbottom23@goodreads.com', 0, '2000-07-13', '7870cf9910fe2c4089da211b5af323a3', '2022-09-21', '', '', '', '', '', '', 0, ''),
(77, 'Rene', 'Ambros', 'Casserly', '63C461200AA55', 'mat0077', '', 'acasserly24@nymag.com', '2008665575', 'Male', '400', 'SOC', 'IFT', '85 Vahlen Pass', '', '', '', 'Dominican Repub', '', 0, 1, '15-01-23', 'Ambros Casserly', '8456046094', '', 'acasserly24@accuweather.com', 0, '2001-07-19', 'ad0def9989181d0b4344407f6900336c', '2019-08-31', '', '', '', '', '', '', 0, ''),
(78, 'Leslie', 'Christian', 'Eyden', '63C461200AD72', 'mat0078', '', 'ceyden25@t.co', '9774024516', 'Male', '200', 'SOS', 'BIO', '4762 Buhler Place', '', '', '', 'South Korea', '', 0, 1, '15-01-23', 'Christian Eyden', '6435271172', '', 'ceyden25@apache.org', 0, '2001-05-28', '1ecc1f2a86385d2f6c391d4429132c52', '2020-10-14', '', '', '', '', '', '', 0, ''),
(79, 'Noell', 'Sam', 'Hynard', '63C461200B026', 'mat0079', '', 'shynard26@deviantart.com', '3602462164', 'Female', '300', 'SOC', 'IFT', '91 7th Point', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Sam Hynard', '6065182837', '', 'shynard26@livejournal.com', 0, '1993-01-03', '8e9f0f502633ad33fa1e0bf3530fe23a', '2018-10-12', '', '', '', '', '', '', 0, ''),
(80, 'Junia', 'Kayley', 'Lago', '63C461200B243', 'mat0080', '', 'klago27@lycos.com', '2596886931', 'Female', '300', 'SOC', 'IFT', '197 Roxbury Road', '', '', '', 'Brazil', '', 0, 1, '15-01-23', 'Kayley Lago', '9256979143', '', 'klago27@symantec.com', 0, '1998-01-18', 'e39f3ba1ef0ccbdf5f65f90f80dc9de5', '2018-09-24', '', '', '', '', '', '', 0, ''),
(81, 'Archambault', 'Ave', 'McIlheran', '63C461200B43D', 'mat0081', '', 'amcilheran28@tinyurl.com', '6009216240', 'Male', '300', 'SOS', 'BIO', '225 Scott Drive', '', '', '', 'Honduras', '', 0, 1, '15-01-23', 'Ave McIlheran', '9549615203', '', 'amcilheran28@netlog.com', 0, '1991-03-28', '3b8780a15761f7a6d9d72ffcc95d13b6', '2022-07-29', '', '', '', '', '', '', 0, ''),
(82, 'Amelie', 'Nonah', 'Helks', '63C461200B670', 'mat0082', '', 'nhelks29@merriam-webster.com', '3384287766', 'Female', '400', 'SOC', 'IFT', '690 Oak Valley Park', '', '', '', 'Nigeria', '', 0, 1, '15-01-23', 'Nonah Helks', '4403596078', '', 'nhelks29@bigcartel.com', 0, '1993-03-04', '4ebd8bfa07da3792ed14c2fa7b7ceb17', '2022-10-30', '', '', '', '', '', '', 0, ''),
(83, 'Berkie', 'Rutter', 'Bahls', '63C461200B848', 'mat0083', '', 'rbahls2a@taobao.com', '9549258438', 'Male', '500', 'SOS', 'BIO', '1 Merchant Pass', '', '', '', 'Mongolia', '', 0, 1, '15-01-23', 'Rutter Bahls', '1012029046', '', 'rbahls2a@slashdot.org', 0, '1992-10-15', 'd067dcd7be28e6c68b453955270f64ad', '2019-08-07', '', '', '', '', '', '', 0, ''),
(84, 'Winthrop', 'Randell', 'Emons', '63C461200BA16', 'mat0084', '', 'remons2b@boston.com', '9132846908', 'Male', '400', 'SOC', 'IFT', '39 Swallow Park', '', '', 'Portalegre', 'Portugal', '', 0, 1, '15-01-23', 'Randell Emons', '1409502716', '', 'remons2b@washingtonpost.com', 0, '2000-07-08', 'bc715f94ff2f8b1aa4162a7c759f0457', '2019-09-06', '', '', '', '', '', '', 0, ''),
(85, 'Doralynne', 'Gabbi', 'Codeman', '63C461200BBC6', 'mat0085', '', 'gcodeman2c@indiegogo.com', '7633697447', 'Female', '400', 'SOS', 'BIO', '9557 Cambridge Point', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Gabbi Codeman', '4337293296', '', 'gcodeman2c@soundcloud.com', 0, '2000-02-12', '328f9a310cd3e7e57a3bb72515aee46d', '2018-11-08', '', '', '', '', '', '', 0, ''),
(86, 'Douglas', 'Montague', 'Claughton', '63C461200BD9A', 'mat0086', '', 'mclaughton2d@who.int', '8716383077', 'Male', '500', 'SOC', 'IFT', '43055 Bayside Point', '', '', '', 'Czech Republic', '', 0, 1, '15-01-23', 'Montague Claughton', '8925588062', '', 'mclaughton2d@mail.ru', 0, '2001-02-05', 'e3c132cbb14c6f7b4fadd7941f01d866', '2021-03-04', '', '', '', '', '', '', 0, ''),
(87, 'Alvan', 'Cchaddie', 'Graysmark', '63C461200BF74', 'mat0087', '', 'cgraysmark2e@reuters.com', '8658304261', 'Male', '300', 'SOC', 'IFT', '7606 Killdeer Lane', '', '', '', 'Nigeria', '', 0, 1, '15-01-23', 'Cchaddie Graysmark', '7836051635', '', 'cgraysmark2e@zimbio.com', 0, '1994-08-24', '67e5232c81adce1598a0e443a9f77606', '2022-01-22', '', '', '', '', '', '', 0, ''),
(88, 'Stanwood', 'Sigfried', 'Borgnet', '63C461200C121', 'mat0088', '', 'sborgnet2f@ed.gov', '2238368497', 'Male', '400', 'SOC', 'IFT', '9356 Sunnyside Terrace', '', '', 'Aveiro', 'Portugal', '', 0, 1, '15-01-23', 'Sigfried Borgnet', '1124368258', '', 'sborgnet2f@joomla.org', 0, '1993-05-27', '869e0fee998a4e96634558bec2217898', '2018-07-04', '', '', '', '', '', '', 0, ''),
(89, 'Hastie', 'Ambrosius', 'Gurko', '63C461200C292', 'mat0089', '', 'agurko2g@vimeo.com', '8904011906', 'Male', '400', 'SOS', 'BIO', '3 Ilene Crossing', '', '', '', 'China', '', 0, 1, '15-01-23', 'Ambrosius Gurko', '6747140790', '', 'agurko2g@dedecms.com', 0, '1991-03-16', '05388cd8bff8e0d45a93dcf8662a5a59', '2018-07-10', '', '', '', '', '', '', 0, ''),
(90, 'Melisa', 'Thalia', 'Ewing', '63C461200C40A', 'mat0090', '', 'tewing2h@networksolutions.com', '7437454024', 'Female', '400', 'SOS', 'BIO', '57 Summit Crossing', '', '', '', 'Tunisia', '', 0, 1, '15-01-23', 'Thalia Ewing', '3833940951', '', 'tewing2h@about.com', 0, '1993-07-13', '12c91dd5c5032541e0c9e681f3214151', '2019-05-20', '', '', '', '', '', '', 0, ''),
(91, 'Maximo', 'Renard', 'Spawforth', '63C461200C572', 'mat0091', '', 'rspawforth2i@ca.gov', '1296721851', 'Male', '200', 'SOS', 'BIO', '1 Roxbury Way', '', '', '', 'China', '', 0, 1, '15-01-23', 'Renard Spawforth', '8281902625', '', 'rspawforth2i@rambler.ru', 0, '2003-06-27', '7cefd45828f84d52fc471e1b37d75a45', '2018-05-09', '', '', '', '', '', '', 0, ''),
(92, 'Melony', 'Susan', 'Divine', '63C461200C6F1', 'mat0092', '', 'sdivine2j@unblog.fr', '1666540302', 'Female', '500', 'SOC', 'IFT', '14 Alpine Court', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Susan Divine', '5691065296', '', 'sdivine2j@privacy.gov.au', 0, '2002-04-09', 'fcd33e14214497978d6d5e2a15e4811b', '2020-03-06', '', '', '', '', '', '', 0, ''),
(93, 'Viviana', 'Philly', 'Ponton', '63C461200C862', 'mat0093', '', 'pponton2k@mashable.com', '4922534229', 'Female', '300', 'SOC', 'IFT', '2111 Luster Terrace', '', '', 'Chihuahua', 'Mexico', '', 0, 1, '15-01-23', 'Philly Ponton', '5129100595', '', 'pponton2k@columbia.edu', 0, '1992-02-05', '748a312cd8e6b1ef9ed3cb7a98d31c84', '2022-11-07', '', '', '', '', '', '', 0, ''),
(94, 'Alexander', 'Newton', 'Stenton', '63C461200C9DB', 'mat0094', '', 'nstenton2l@github.com', '2684829144', 'Male', '300', 'SOS', 'BIO', '9556 Harper Hill', '', '', '', 'China', '', 0, 1, '15-01-23', 'Newton Stenton', '1922124317', '', 'nstenton2l@quantcast.com', 0, '1994-07-20', 'd1900e4e9274078e9dee9440bbc997a2', '2018-04-18', '', '', '', '', '', '', 0, ''),
(95, 'Garrot', 'Derick', 'Dominick', '63C461200CB4D', 'mat0095', '', 'ddominick2m@liveinternet.ru', '5418880632', 'Male', '200', 'SOS', 'BIO', '83529 Ronald Regan Avenue', '', '', '', 'Guinea', '', 0, 1, '15-01-23', 'Derick Dominick', '1394581352', '', 'ddominick2m@oracle.com', 0, '1997-10-14', 'fb0b034ccd1c95f69ee64465fc7a621f', '2021-07-14', '', '', '', '', '', '', 0, ''),
(96, 'Stevie', 'Isidore', 'Audsley', '63C461200CCB8', 'mat0096', '', 'iaudsley2n@cargocollective.com', '8155619063', 'Male', '500', 'SOS', 'BIO', '2 Holmberg Circle', '', '', '', 'Botswana', '', 0, 1, '15-01-23', 'Isidore Audsley', '7703054839', '', 'iaudsley2n@de.vu', 0, '2004-01-13', '1cee2746f28491116d1a326f7f9c5caa', '2021-11-23', '', '', '', '', '', '', 0, ''),
(97, 'Giffy', 'Zak', 'Kirwin', '63C461200CE2A', 'mat0097', '', 'zkirwin2o@netvibes.com', '3947772624', 'Male', '100', 'SOC', 'IFT', '8722 Carpenter Crossing', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Zak Kirwin', '5716654823', '', 'zkirwin2o@npr.org', 0, '1995-04-17', 'f3f7409e10394eab518e58fecf181323', '2021-05-11', '', '', '', '', '', '', 0, ''),
(98, 'Aguste', 'Leif', 'Impey', '63C461200CFA5', 'mat0098', '', 'limpey2p@imdb.com', '3459528305', 'Male', '100', 'SOC', 'IFT', '031 Westend Lane', '', '', '', 'Belarus', '', 0, 1, '15-01-23', 'Leif Impey', '7998320943', '', 'limpey2p@cbslocal.com', 0, '1997-05-17', '54eab19ef6945cb44d89b1829eecd150', '2018-07-23', '', '', '', '', '', '', 0, ''),
(99, 'Mortimer', 'Ashby', 'Agron', '63C461200D180', 'mat0099', '', 'aagron2q@soundcloud.com', '8378170058', 'Male', '100', 'SOS', 'BIO', '24950 School Lane', '', '', '', 'Azerbaijan', '', 0, 1, '15-01-23', 'Ashby Agron', '1178064771', '', 'aagron2q@over-blog.com', 0, '2003-09-29', 'a07b6fb4bcc8a977de4aa109cd8bcbdf', '2018-08-29', '', '', '', '', '', '', 0, ''),
(100, 'Dani', 'Mac', 'Godsil', '63C461200D30C', 'mat0100', '', 'mgodsil2r@cafepress.com', '7371815309', 'Male', '400', 'SOC', 'IFT', '903 Kropf Drive', '', '', '', 'China', '', 0, 1, '15-01-23', 'Mac Godsil', '6116612644', '', 'mgodsil2r@infoseek.co.jp', 0, '1993-10-27', 'd917ee3fe40a192d2dddcc74b5254dfd', '2022-08-26', '', '', '', '', '', '', 0, ''),
(101, 'Sargent', 'Wright', 'Redmore', '63C461200D489', 'mat0101', '', 'wredmore2s@abc.net.au', '1209655180', 'Male', '500', 'SOC', 'IFT', '8791 Rowland Drive', '', '', '', 'Serbia', '', 0, 1, '15-01-23', 'Wright Redmore', '5429728740', '', 'wredmore2s@lycos.com', 0, '1991-07-28', '7ccdf813fef35406992739a27c343ed1', '2018-02-12', '', '', '', '', '', '', 0, ''),
(102, 'Gilbertina', 'Nettle', 'Kingswold', '63C461200D604', 'mat0102', '', 'nkingswold2t@desdev.cn', '9361425293', 'Female', '300', 'SOC', 'IFT', '895 Chinook Road', '', '', 'Guanajuato', 'Mexico', '', 0, 1, '15-01-23', 'Nettle Kingswold', '8315914772', '', 'nkingswold2t@imgur.com', 0, '1995-05-08', '414813e207b4d034d0d537245d323a22', '2018-11-27', '', '', '', '', '', '', 0, ''),
(103, 'Pepillo', 'Rickert', 'Braz', '63C461200D774', 'mat0103', '', 'rbraz2u@google.nl', '4275656847', 'Male', '400', 'SOC', 'IFT', '3962 Trailsway Hill', '', '', '', 'China', '', 0, 1, '15-01-23', 'Rickert Braz', '2033609825', '', 'rbraz2u@cisco.com', 0, '1993-02-07', '19d12ff71be2b925e48c859bddd68dd2', '2022-11-19', '', '', '', '', '', '', 0, ''),
(104, 'Prudence', 'Kyle', 'Matthewson', '63C461200DACD', 'mat0104', '', 'kmatthewson2v@feedburner.com', '2705387526', 'Female', '200', 'SOC', 'IFT', '94500 Thierer Avenue', '', '', 'Chihuahua', 'Mexico', '', 0, 1, '15-01-23', 'Kyle Matthewson', '4278110825', '', 'kmatthewson2v@pagesperso-orange.fr', 0, '1996-04-28', '2dac119e8c14546534131d924fd77ae5', '2022-02-07', '', '', '', '', '', '', 0, ''),
(105, 'Matthiew', 'Merry', 'Karim', '63C461200DE8A', 'mat0105', '', 'mkarim2w@wordpress.org', '9691332873', 'Male', '200', 'SOS', 'BIO', '18227 Orin Hill', '', '', '', 'Afghanistan', '', 0, 1, '15-01-23', 'Merry Karim', '1729175455', '', 'mkarim2w@smugmug.com', 0, '1996-03-23', 'd687eacb70bc56ef07d9fb469a95f628', '2018-09-15', '', '', '', '', '', '', 0, ''),
(106, 'Lovell', 'Alphonso', 'Brower', '63C461200E3AE', 'mat0106', '', 'abrower2x@seattletimes.com', '2515055800', 'Male', '400', 'SOS', 'BIO', '6 Hooker Drive', '', '', '', 'Poland', '', 0, 1, '15-01-23', 'Alphonso Brower', '1699356791', '', 'abrower2x@usgs.gov', 0, '1993-03-02', 'ce8b456273e762a0d40f1e58dba03ef3', '2019-02-12', '', '', '', '', '', '', 0, ''),
(107, 'Jeremie', 'Kent', 'Dell', '63C461200E69D', 'mat0107', '', 'kdell2y@pagesperso-orange.fr', '7974122118', 'Male', '400', 'SOS', 'BIO', '462 Homewood Parkway', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Kent Dell', '5903416834', '', 'kdell2y@chicagotribune.com', 0, '2000-12-07', 'c7fe3661ba07cf4b511e011ba067a6f8', '2020-07-02', '', '', '', '', '', '', 0, ''),
(108, 'Bonnee', 'Katerine', 'Bucham', '63C461200EA70', 'mat0108', '', 'kbucham2z@mtv.com', '8609716927', 'Female', '500', 'SOS', 'BIO', '0 Hoard Lane', '', '', '', 'Czech Republic', '', 0, 1, '15-01-23', 'Katerine Bucham', '6665526842', '', 'kbucham2z@trellian.com', 0, '1998-08-12', '13563b54a4fa733166aebdafd9b0e460', '2018-03-31', '', '', '', '', '', '', 0, ''),
(109, 'Brandi', 'Moira', 'La Rosa', '63C461200ED5F', 'mat0109', '', 'mla30@zdnet.com', '9186762838', 'Female', '200', 'SOS', 'BIO', '88331 Harper Trail', '', '', 'Oklahoma', 'United States', '', 0, 1, '15-01-23', 'Moira La Rosa', '4721413098', '', 'mla30@zdnet.com', 0, '1993-12-11', 'cf49b3850c92026117c1baa7d23ffc9e', '2018-12-31', '', '', '', '', '', '', 0, ''),
(110, 'Thomasina', 'Wilie', 'Vearncombe', '63C461200EFE0', 'mat0110', '', 'wvearncombe31@wix.com', '7521906649', 'Female', '100', 'SOC', 'IFT', '8427 Sullivan Way', '', '', '', 'Chile', '', 0, 1, '15-01-23', 'Wilie Vearncombe', '1346390520', '', 'wvearncombe31@biblegateway.com', 0, '1997-04-04', '1c74dd808368eaa4b06308f389ce35c2', '2019-02-20', '', '', '', '', '', '', 0, ''),
(111, 'Shellysheldon', 'Konrad', 'Spurnier', '63C461200F1EA', 'mat0111', '', 'kspurnier32@plala.or.jp', '9913726766', 'Male', '500', 'SOC', 'IFT', '72 Kim Center', '', '', '', 'China', '', 0, 1, '15-01-23', 'Konrad Spurnier', '5959812049', '', 'kspurnier32@vistaprint.com', 0, '2004-02-18', '100bb93197e88140f2c5aadc05c4f22c', '2019-06-30', '', '', '', '', '', '', 0, ''),
(112, 'Rosanna', 'Gilli', 'Sandeman', '63C461200F405', 'mat0112', '', 'gsandeman33@weather.com', '6085751884', 'Female', '200', 'SOS', 'BIO', '2 Forest Run Hill', '', '', '', 'Japan', '', 0, 1, '15-01-23', 'Gilli Sandeman', '2342152220', '', 'gsandeman33@prnewswire.com', 0, '1994-05-17', '0586dea2c7422fddf97b66a64c93a2bf', '2022-04-26', '', '', '', '', '', '', 0, ''),
(113, 'Miof mela', 'Bamby', 'Pinnijar', '63C461200F62A', 'mat0113', '', 'bpinnijar34@ocn.ne.jp', '7654925961', 'Female', '100', 'SOC', 'IFT', '581 Meadow Valley Pass', '', '', 'Michoacan De Oc', 'Mexico', '', 0, 1, '15-01-23', 'Bamby Pinnijar', '2953779966', '', 'bpinnijar34@buzzfeed.com', 0, '1991-06-27', 'ccc0eb2f34f44afbd953ff647edd14eb', '2020-12-28', '', '', '', '', '', '', 0, ''),
(114, 'Dewain', 'Kelwin', 'Laguerre', '63C461200F840', 'mat0114', '', 'klaguerre35@4shared.com', '3602096972', 'Male', '100', 'SOS', 'BIO', '5466 Lighthouse Bay Lane', '', '', 'Washington', 'United States', '', 0, 1, '15-01-23', 'Kelwin Laguerre', '9957470098', '', 'klaguerre35@opera.com', 0, '1990-07-18', 'e4533311aaf242d914a8c72177cbfc62', '2021-12-13', '', '', '', '', '', '', 0, ''),
(115, 'Sela', 'Rina', 'Richmond', '63C461200FA20', 'mat0115', '', 'rrichmond36@noaa.gov', '8307786999', 'Female', '500', 'SOS', 'BIO', '9806 Mitchell Center', '', '', '', 'Bosnia and Herz', '', 0, 1, '15-01-23', 'Rina Richmond', '4356051795', '', 'rrichmond36@blogs.com', 0, '2003-08-28', 'd8a82d4061ed86ea985b26519008ff63', '2022-07-23', '', '', '', '', '', '', 0, ''),
(116, 'Moyna', 'Rowe', 'Winslade', '63C461200FC17', 'mat0116', '', 'rwinslade37@fda.gov', '5234726441', 'Female', '300', 'SOC', 'IFT', '47 Division Junction', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Rowe Winslade', '8379918703', '', 'rwinslade37@vimeo.com', 0, '1998-05-29', 'f4e8fc9908482b8e20692ec0ceb3e6e3', '2022-11-08', '', '', '', '', '', '', 0, ''),
(117, 'Claribel', 'Merrilee', 'Snoxall', '63C461200FDF2', 'mat0117', '', 'msnoxall38@technorati.com', '6436125562', 'Female', '500', 'SOC', 'IFT', '0277 Fairview Road', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Merrilee Snoxall', '9982342462', '', 'msnoxall38@shop-pro.jp', 0, '1994-11-25', 'c317fb8e642544a9acff735d3c38b769', '2020-11-01', '', '', '', '', '', '', 0, ''),
(118, 'Izzy', 'Elwood', 'Haslewood', '63C461200FFC7', 'mat0118', '', 'ehaslewood39@shop-pro.jp', '8798671491', 'Male', '100', 'SOC', 'IFT', '983 Ridge Oak Pass', '', '', '', 'Ecuador', '', 0, 1, '15-01-23', 'Elwood Haslewood', '7222370301', '', 'ehaslewood39@naver.com', 0, '2001-12-16', 'ca30eb365e158eb6fd7490cac6e98ec9', '2021-10-26', '', '', '', '', '', '', 0, ''),
(119, 'Remington', 'Tamas', 'Medley', '63C4612010211', 'mat0119', '', 'tmedley3a@google.de', '8348135317', 'Male', '200', 'SOC', 'IFT', '5466 Hollow Ridge Parkway', '', '', '', 'China', '', 0, 1, '15-01-23', 'Tamas Medley', '3476213734', '', 'tmedley3a@hostgator.com', 0, '1991-03-03', 'eaeb9156884e2d9126d21dd963b1fa8e', '2021-02-10', '', '', '', '', '', '', 0, ''),
(120, 'Arvie', 'Barton', 'Sawford', '63C46120104A4', 'mat0120', '', 'bsawford3b@github.io', '3127044639', 'Male', '500', 'SOC', 'IFT', '40 Muir Park', '', '', '', 'China', '', 0, 1, '15-01-23', 'Barton Sawford', '7855561564', '', 'bsawford3b@wiley.com', 0, '1993-09-16', '66f5e27ed8e246b495edb4020ff24fd0', '2022-07-05', '', '', '', '', '', '', 0, ''),
(121, 'Kellen', 'Camel', 'Bolesma', '63C4612010684', 'mat0121', '', 'cbolesma3c@tumblr.com', '9431752390', 'Female', '200', 'SOS', 'BIO', '11552 Donald Alley', '', '', '', 'Peru', '', 0, 1, '15-01-23', 'Camel Bolesma', '3091016454', '', 'cbolesma3c@japanpost.jp', 0, '2001-03-31', 'b088e7b3902d481dffe10f2ceedc0ab0', '2022-01-07', '', '', '', '', '', '', 0, ''),
(122, 'Graig', 'Felizio', 'Tregust', '63C461201085A', 'mat0122', '', 'ftregust3d@g.co', '2006022146', 'Male', '500', 'SOC', 'IFT', '40 Eagan Junction', '', '', '', 'Nigeria', '', 0, 1, '15-01-23', 'Felizio Tregust', '8613221245', '', 'ftregust3d@si.edu', 0, '1997-01-01', 'd1742d57e7ea8bf2e602f4e6326998fe', '2020-06-19', '', '', '', '', '', '', 0, ''),
(123, 'Terrel', 'Kaine', 'Ottam', '63C4612010A2B', 'mat0123', '', 'kottam3e@wp.com', '1292390638', 'Male', '500', 'SOS', 'BIO', '78 Dahle Road', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Kaine Ottam', '4442094763', '', 'kottam3e@independent.co.uk', 0, '2003-04-15', '605f6fec163d658fdfb78d843094c8b0', '2022-07-25', '', '', '', '', '', '', 0, ''),
(124, 'Arabelle', 'Ginevra', 'Bezley', '63C4612010BFE', 'mat0124', '', 'gbezley3f@patch.com', '8433431058', 'Female', '400', 'SOS', 'BIO', '98 Monument Junction', '', '', 'British Columbi', 'Canada', '', 0, 1, '15-01-23', 'Ginevra Bezley', '7948152255', '', 'gbezley3f@china.com.cn', 0, '2000-12-12', '7e1c7ec66b741598b660dc826bd186fc', '2019-08-14', '', '', '', '', '', '', 0, ''),
(125, 'Tedd', 'Arie', 'Harriday', '63C4612010DCD', 'mat0125', '', 'aharriday3g@umn.edu', '3367113618', 'Male', '100', 'SOS', 'BIO', '1156 Charing Cross Way', '', '', '', 'Japan', '', 0, 1, '15-01-23', 'Arie Harriday', '3841938895', '', 'aharriday3g@youku.com', 0, '1995-04-11', 'fc7b6ba18d00999b7a580ae2b12d8683', '2018-12-09', '', '', '', '', '', '', 0, ''),
(126, 'Edi', 'Nollie', 'Stockwell', '63C4612010FAB', 'mat0126', '', 'nstockwell3h@scientificamerican.com', '4624541788', 'Female', '100', 'SOC', 'IFT', '38 Colorado Court', '', '', '', 'China', '', 0, 1, '15-01-23', 'Nollie Stockwell', '4174964267', '', 'nstockwell3h@omniture.com', 0, '1995-11-11', '360c59e3d4fcdc30547353da9cb801ec', '2019-05-20', '', '', '', '', '', '', 0, ''),
(127, 'Loree', 'Jinny', 'Zavattieri', '63C461201116D', 'mat0127', '', 'jzavattieri3i@merriam-webster.com', '4964846861', 'Female', '100', 'SOC', 'IFT', '22626 Sundown Junction', '', '', 'Kelantan', 'Malaysia', '', 0, 1, '15-01-23', 'Jinny Zavattieri', '3306705473', '', 'jzavattieri3i@msn.com', 0, '1990-05-25', '2857ff627c796e76a51b9820ab4c22f4', '2020-10-24', '', '', '', '', '', '', 0, ''),
(128, 'Florina', 'Caro', 'Toms', '63C4612011342', 'mat0128', '', 'ctoms3j@jiathis.com', '1464519760', 'Female', '400', 'SOS', 'BIO', '87 Sundown Street', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Caro Toms', '2337887534', '', 'ctoms3j@odnoklassniki.ru', 0, '1998-11-23', '2757a5f17031dab2160137e1f1f0f13d', '2022-07-26', '', '', '', '', '', '', 0, ''),
(129, 'Ulises', 'Ode', 'Renner', '63C46120114D4', 'mat0129', '', 'orenner3k@irs.gov', '2332473607', 'Male', '300', 'SOS', 'BIO', '8208 Kedzie Hill', '', '', '', 'China', '', 0, 1, '15-01-23', 'Ode Renner', '7713563304', '', 'orenner3k@technorati.com', 0, '1996-06-27', 'e098caa21e576e582240f840ec902256', '2018-11-02', '', '', '', '', '', '', 0, ''),
(130, 'Cesare', 'Lonny', 'Grimstead', '63C46120116A3', 'mat0130', '', 'lgrimstead3l@wiley.com', '2293100263', 'Male', '100', 'SOC', 'IFT', '3 Nancy Way', '', '', '', 'China', '', 0, 1, '15-01-23', 'Lonny Grimstead', '2698435059', '', 'lgrimstead3l@hexun.com', 0, '2000-10-16', 'af1e36497473d320f4a73cbe2655c9ed', '2018-10-15', '', '', '', '', '', '', 0, ''),
(131, 'Ulick', 'Jorge', 'Orrock', '63C461201184D', 'mat0131', '', 'jorrock3m@unicef.org', '3088624686', 'Male', '200', 'SOS', 'BIO', '456 Dovetail Point', '', '', '', 'Luxembourg', '', 0, 1, '15-01-23', 'Jorge Orrock', '9344166219', '', 'jorrock3m@cargocollective.com', 0, '2003-01-17', '1b77e2cd67da86b67bae6eeeb9ef06cb', '2022-11-12', '', '', '', '', '', '', 0, ''),
(132, 'Doris', 'Lise', 'Borzone', '63C4612011B47', 'mat0132', '', 'lborzone3n@accuweather.com', '1799151540', 'Female', '200', 'SOC', 'IFT', '4855 Crescent Oaks Way', '', '', 'Rhône-Alpes', 'France', '', 0, 1, '15-01-23', 'Lise Borzone', '4531269276', '', 'lborzone3n@mail.ru', 0, '1993-08-25', '5a0925cb1b5031f52c9c0ba0aae03fa8', '2018-04-21', '', '', '', '', '', '', 0, ''),
(133, 'Leta', 'Yelena', 'Scottrell', '63C461201200D', 'mat0133', '', 'yscottrell3o@feedburner.com', '8821260880', 'Female', '500', 'SOC', 'IFT', '35 Moulton Street', '', '', '', 'Sudan', '', 0, 1, '15-01-23', 'Yelena Scottrell', '9746583228', '', 'yscottrell3o@booking.com', 0, '1995-04-18', '1758d7119fd81c94b3066b88eb10cf9e', '2022-03-20', '', '', '', '', '', '', 0, ''),
(134, 'Kelci', 'Brandice', 'Dameisele', '63C46120123D4', 'mat0134', '', 'bdameisele3p@cam.ac.uk', '7975389222', 'Female', '500', 'SOC', 'IFT', '9800 East Center', '', '', '', 'Poland', '', 0, 1, '15-01-23', 'Brandice Dameisele', '6032130498', '', 'bdameisele3p@cbsnews.com', 0, '2004-02-26', '56ddad79b9f7643c5800030a170f5050', '2021-06-22', '', '', '', '', '', '', 0, ''),
(135, 'Kay', 'Leland', 'Casillis', '63C4612012656', 'mat0135', '', 'lcasillis3q@squidoo.com', '5612677771', 'Female', '300', 'SOC', 'IFT', '3 Mockingbird Center', '', '', '', 'China', '', 0, 1, '15-01-23', 'Leland Casillis', '4656887116', '', 'lcasillis3q@omniture.com', 0, '1994-09-01', 'fe8fb7bc7d13b6ad56c27041c89e2975', '2021-11-03', '', '', '', '', '', '', 0, '');
INSERT INTO `students` (`sn`, `fname`, `mname`, `lname`, `admission_no`, `matric_no`, `program`, `email`, `phone`, `gender`, `level`, `college`, `department`, `address`, `religion`, `lga`, `state`, `country`, `picture`, `status`, `active`, `dates`, `parents`, `parents_phone1`, `parents_phone2`, `p_email`, `age`, `dob`, `username`, `date_admitted`, `batch`, `blood_group`, `genotype`, `height`, `weight`, `last_update`, `extral`, `disability`) VALUES
(136, 'Dareen', 'Elli', 'Belliveau', '63C4612012A31', 'mat0136', '', 'ebelliveau3r@telegraph.co.uk', '8542728577', 'Female', '100', 'SOS', 'BIO', '4925 Thompson Avenue', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Elli Belliveau', '7244710687', '', 'ebelliveau3r@yale.edu', 0, '1998-04-13', '8fc24685ec12c37ea011509bcf913cb7', '2022-08-31', '', '', '', '', '', '', 0, ''),
(137, 'Mariejeanne', 'Willi', 'Heart', '63C4612012DBF', 'mat0137', '', 'wheart3s@acquirethisname.com', '3992880549', 'Female', '100', 'SOC', 'IFT', '27 Crescent Oaks Trail', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Willi Heart', '4109337082', '', 'wheart3s@go.com', 0, '1999-10-14', '32402f67c97113dbe02cf89c8fc2f20b', '2020-01-01', '', '', '', '', '', '', 0, ''),
(138, 'Marrissa', 'Nalani', 'Voss', '63C461201309A', 'mat0138', '', 'nvoss3t@altervista.org', '1092557642', 'Female', '300', 'SOS', 'BIO', '039 Pine View Point', '', '', '', 'Brazil', '', 0, 1, '15-01-23', 'Nalani Voss', '8197463926', '', 'nvoss3t@who.int', 0, '2005-01-13', '677ca2b3fe5445893df2b40aca8891f4', '2021-07-09', '', '', '', '', '', '', 0, ''),
(139, 'Avril', 'Lorilee', 'Nannoni', '63C46120132B5', 'mat0139', '', 'lnannoni3u@com.com', '7022536423', 'Female', '400', 'SOC', 'IFT', '57037 Starling Street', '', '', 'Nevada', 'United States', '', 0, 1, '15-01-23', 'Lorilee Nannoni', '3184590636', '', 'lnannoni3u@posterous.com', 0, '2002-07-05', '1e75914842daafee222848dc802134d7', '2019-11-27', '', '', '', '', '', '', 0, ''),
(140, 'Torrin', 'Filip', 'Anfusso', '63C4612013487', 'mat0140', '', 'fanfusso3v@flavors.me', '9768237561', 'Male', '300', 'SOC', 'IFT', '70603 Amoth Plaza', '', '', 'Leiria', 'Portugal', '', 0, 1, '15-01-23', 'Filip Anfusso', '2973272570', '', 'fanfusso3v@lulu.com', 0, '2002-01-12', '041c5f2806d3b5c10f83b6d7b14a762a', '2020-11-16', '', '', '', '', '', '', 0, ''),
(141, 'Jeddy', 'Terrel', 'Menat', '63C4612013667', 'mat0141', '', 'tmenat3w@yolasite.com', '5231920974', 'Male', '400', 'SOC', 'IFT', '6807 Waywood Court', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Terrel Menat', '1257975284', '', 'tmenat3w@macromedia.com', 0, '2000-07-30', 'a8e98c89cbcff17de0cdf2292722419e', '2018-02-25', '', '', '', '', '', '', 0, ''),
(142, 'Stacee', 'Sashenka', 'Tort', '63C46120137F9', 'mat0142', '', 'stort3x@chron.com', '3625451638', 'Female', '300', 'SOS', 'BIO', '6 Sachtjen Way', '', '', '', 'China', '', 0, 1, '15-01-23', 'Sashenka Tort', '4806226173', '', 'stort3x@bloglovin.com', 0, '1998-05-28', 'a09d4314b43a046c659fbe5855342d87', '2019-03-30', '', '', '', '', '', '', 0, ''),
(143, 'Ahmed', 'Thibaut', 'Eakens', '63C46120139E1', 'mat0143', '', 'teakens3y@answers.com', '1611753337', 'Male', '400', 'SOC', 'IFT', '787 Susan Junction', '', '', '', 'China', '', 0, 1, '15-01-23', 'Thibaut Eakens', '8175556058', '', 'teakens3y@omniture.com', 0, '1992-11-01', 'f45416876397bc8915664b597970a537', '2020-08-08', '', '', '', '', '', '', 0, ''),
(144, 'Jeddy', 'Boot', 'Greatbatch', '63C4612013B98', 'mat0144', '', 'bgreatbatch3z@qq.com', '7921163551', 'Male', '100', 'SOC', 'IFT', '082 Delaware Plaza', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Boot Greatbatch', '4563454845', '', 'bgreatbatch3z@storify.com', 0, '1998-06-28', '71381150354e8f54ee40087c2a79477a', '2020-11-17', '', '', '', '', '', '', 0, ''),
(145, 'Dareen', 'Isabelle', 'Norquoy', '63C4612013D5A', 'mat0145', '', 'inorquoy40@google.pl', '6282520002', 'Female', '200', 'SOC', 'IFT', '3066 Steensland Parkway', '', '', '', 'Peru', '', 0, 1, '15-01-23', 'Isabelle Norquoy', '1892034046', '', 'inorquoy40@merriam-webster.com', 0, '1995-03-07', '3985a500631f5d0a7e1bd8dc797215f1', '2018-10-18', '', '', '', '', '', '', 0, ''),
(146, 'Gustave', 'Cirilo', 'Gallichiccio', '63C4612013F3B', 'mat0146', '', 'cgallichiccio41@e-recht24.de', '7402401219', 'Male', '200', 'SOS', 'BIO', '2136 Iowa Pass', '', '', '', 'Myanmar', '', 0, 1, '15-01-23', 'Cirilo Gallichiccio', '4899345765', '', 'cgallichiccio41@51.la', 0, '1992-05-12', 'a478d4bb380bfb5f3f8ceb52ce31a641', '2021-01-10', '', '', '', '', '', '', 0, ''),
(147, 'Bing', 'Abba', 'Fidell', '63C4612014101', 'mat0147', '', 'afidell42@icq.com', '7865442627', 'Male', '300', 'SOS', 'BIO', '37683 Goodland Parkway', '', '', 'Florida', 'United States', '', 0, 1, '15-01-23', 'Abba Fidell', '3989880287', '', 'afidell42@marriott.com', 0, '1996-04-27', '987371333241647414e1a363cd757eae', '2020-01-06', '', '', '', '', '', '', 0, ''),
(148, 'Troy', 'Alfy', 'Cadd', '63C46120142BC', 'mat0148', '', 'acadd43@spiegel.de', '9168073328', 'Male', '500', 'SOS', 'BIO', '20 Kennedy Junction', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Alfy Cadd', '4023243643', '', 'acadd43@edublogs.org', 0, '1996-08-03', '2743ff41e38b823a9e7ebda8a8274126', '2021-11-16', '', '', '', '', '', '', 0, ''),
(149, 'Guinevere', 'Carolee', 'Devaney', '63C4612014492', 'mat0149', '', 'cdevaney44@moonfruit.com', '6511882177', 'Female', '500', 'SOS', 'BIO', '11 International Park', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Carolee Devaney', '8908048287', '', 'cdevaney44@ow.ly', 0, '2001-09-15', '0f2670b44aed73d223b4423a490ffb20', '2019-01-08', '', '', '', '', '', '', 0, ''),
(150, 'Vannie', 'Lea', 'Flanne', '63C4612014645', 'mat0150', '', 'lflanne45@imdb.com', '3599330961', 'Female', '100', 'SOS', 'BIO', '80288 Nancy Circle', '', '', '', 'Thailand', '', 0, 1, '15-01-23', 'Lea Flanne', '5325129664', '', 'lflanne45@shop-pro.jp', 0, '1997-10-24', '47cae813b3a96f7054b0267b46bf92db', '2018-05-21', '', '', '', '', '', '', 0, ''),
(151, 'Tadeo', 'Lucias', 'Tart', '63C46120147BE', 'mat0151', '', 'ltart46@ucoz.ru', '5837186789', 'Male', '400', 'SOC', 'IFT', '5 Morningstar Center', '', '', '', 'Bulgaria', '', 0, 1, '15-01-23', 'Lucias Tart', '7045460478', '', 'ltart46@jalbum.net', 0, '1993-02-04', '2ca7558170aa3c4cd5535e2cc5829603', '2019-07-04', '', '', '', '', '', '', 0, ''),
(152, 'Ansel', 'Harwell', 'O\'Bradden', '63C461201492F', 'mat0152', '', 'hobradden47@yolasite.com', '1543083781', 'Male', '300', 'SOC', 'IFT', '231 Marcy Pass', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Harwell O\'Bradden', '7027715404', '', 'hobradden47@rambler.ru', 0, '1994-01-14', '647b657d6eba8466ff8793ccd83cb007', '2022-07-06', '', '', '', '', '', '', 0, ''),
(153, 'Savina', 'Shana', 'McKenney', '63C4612014AA1', 'mat0153', '', 'smckenney48@nytimes.com', '3244601037', 'Female', '300', 'SOC', 'IFT', '2174 Helena Point', '', '', '', 'China', '', 0, 1, '15-01-23', 'Shana McKenney', '8558874095', '', 'smckenney48@weebly.com', 0, '2004-09-06', '449781a9bd0923cae2f1ced4f4bbe795', '2018-07-27', '', '', '', '', '', '', 0, ''),
(154, 'Gaspard', 'Jedidiah', 'Temperton', '63C4612014C21', 'mat0154', '', 'jtemperton49@geocities.com', '1312814025', 'Male', '300', 'SOS', 'BIO', '05 Nova Terrace', '', '', '', 'Mauritius', '', 0, 1, '15-01-23', 'Jedidiah Temperton', '3678838635', '', 'jtemperton49@sohu.com', 0, '2002-07-28', '5e6ba3d6415151b9359b1a9cfdd99e2a', '2018-10-04', '', '', '', '', '', '', 0, ''),
(155, 'Janeen', 'Nessie', 'Gotobed', '63C4612014D98', 'mat0155', '', 'ngotobed4a@earthlink.net', '8301051937', 'Female', '200', 'SOC', 'IFT', '20 Dayton Plaza', '', '', '', 'China', '', 0, 1, '15-01-23', 'Nessie Gotobed', '4387495132', '', 'ngotobed4a@zdnet.com', 0, '1994-05-11', 'b590c9f97d1c981a1171743b94fd785a', '2022-06-04', '', '', '', '', '', '', 0, ''),
(156, 'Albina', 'Bianka', 'McAllaster', '63C4612014F11', 'mat0156', '', 'bmcallaster4b@ovh.net', '7617507143', 'Female', '300', 'SOS', 'BIO', '97218 Valley Edge Plaza', '', '', '', 'Colombia', '', 0, 1, '15-01-23', 'Bianka McAllaster', '8405952953', '', 'bmcallaster4b@php.net', 0, '2003-06-04', '95a90082ae9caa33a7c8a5e71ea79c84', '2018-04-18', '', '', '', '', '', '', 0, ''),
(157, 'Mozes', 'Pasquale', 'Baverstock', '63C46120150AE', 'mat0157', '', 'pbaverstock4c@noaa.gov', '9528980164', 'Male', '500', 'SOC', 'IFT', '544 Hayes Drive', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Pasquale Baverstock', '4461399593', '', 'pbaverstock4c@answers.com', 0, '2002-01-25', '2033e0f95e34de28f2c042175b422bb3', '2018-09-11', '', '', '', '', '', '', 0, ''),
(158, 'Martin', 'Leslie', 'Toland', '63C4612015223', 'mat0158', '', 'ltoland4d@networkadvertising.org', '2945882843', 'Male', '100', 'SOS', 'BIO', '82595 Havey Parkway', '', '', 'Lorraine', 'France', '', 0, 1, '15-01-23', 'Leslie Toland', '6484340283', '', 'ltoland4d@technorati.com', 0, '2002-04-25', '3cf6fdbfc4cfb8cfc8f8164d4d73c1ee', '2022-12-12', '', '', '', '', '', '', 0, ''),
(159, 'Fowler', 'Axel', 'Kovelmann', '63C46120154FC', 'mat0159', '', 'akovelmann4e@army.mil', '6558755338', 'Male', '200', 'SOS', 'BIO', '9 Northland Pass', '', '', '', 'Armenia', '', 0, 1, '15-01-23', 'Axel Kovelmann', '3688865001', '', 'akovelmann4e@prweb.com', 0, '1994-09-20', '173bd87cbd7dd33a3e004bae3d3da085', '2018-05-07', '', '', '', '', '', '', 0, ''),
(160, 'Laverna', 'Nike', 'Harman', '63C4612015738', 'mat0160', '', 'nharman4f@thetimes.co.uk', '8435004798', 'Female', '300', 'SOC', 'IFT', '3 Atwood Terrace', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Nike Harman', '2128488702', '', 'nharman4f@bandcamp.com', 0, '2000-03-25', 'e9be07378b705e422751a4ad609d36cb', '2022-06-11', '', '', '', '', '', '', 0, ''),
(161, 'Archambault', 'Gunther', 'Cuberley', '63C46120158CC', 'mat0161', '', 'gcuberley4g@sfgate.com', '3181774078', 'Male', '300', 'SOS', 'BIO', '306 Butterfield Crossing', '', '', '', 'Honduras', '', 0, 1, '15-01-23', 'Gunther Cuberley', '1231830544', '', 'gcuberley4g@china.com.cn', 0, '1996-03-05', 'f1dbc3921828b863878627ce0e45e9ab', '2018-03-07', '', '', '', '', '', '', 0, ''),
(162, 'Ulla', 'Yolanda', 'Meardon', '63C4612015AC6', 'mat0162', '', 'ymeardon4h@noaa.gov', '8734844357', 'Female', '300', 'SOS', 'BIO', '7 Sycamore Court', '', '', '', 'China', '', 0, 1, '15-01-23', 'Yolanda Meardon', '3398368256', '', 'ymeardon4h@godaddy.com', 0, '2002-12-27', 'b44ac020761404512e1d52a5bde299ee', '2022-12-14', '', '', '', '', '', '', 0, ''),
(163, 'Prescott', 'Egbert', 'Jonson', '63C4612015EA8', 'mat0163', '', 'ejonson4i@lycos.com', '9673314261', 'Male', '300', 'SOS', 'BIO', '27219 Kennedy Circle', '', '', '', 'Croatia', '', 0, 1, '15-01-23', 'Egbert Jonson', '8623663925', '', 'ejonson4i@un.org', 0, '2003-08-05', 'acc5bbdbe5b38f9fd2b0c6e10bc6110d', '2021-12-17', '', '', '', '', '', '', 0, ''),
(164, 'Jada', 'Maurise', 'Braithwait', '63C4612016344', 'mat0164', '', 'mbraithwait4j@live.com', '9855444917', 'Female', '300', 'SOC', 'IFT', '787 Mendota Center', '', '', '', 'Thailand', '', 0, 1, '15-01-23', 'Maurise Braithwait', '3028318017', '', 'mbraithwait4j@prweb.com', 0, '1992-02-19', 'b523dff42f2c57cb338db5c39ae11e6a', '2022-04-28', '', '', '', '', '', '', 0, ''),
(165, 'Drugi', 'Monty', 'Checkley', '63C461201664D', 'mat0165', '', 'mcheckley4k@sciencedaily.com', '8534556930', 'Male', '400', 'SOS', 'BIO', '58425 Florence Court', '', '', '', 'China', '', 0, 1, '15-01-23', 'Monty Checkley', '1825601243', '', 'mcheckley4k@blog.com', 0, '1997-02-11', '0206cb8dcff652ad8413cc36e53e4c3b', '2021-08-29', '', '', '', '', '', '', 0, ''),
(166, 'Jaclin', 'Eydie', 'Kleimt', '63C46120169BF', 'mat0166', '', 'ekleimt4l@360.cn', '7888489924', 'Female', '500', 'SOS', 'BIO', '7735 Cherokee Parkway', '', '', 'San Luis Potosi', 'Mexico', '', 0, 1, '15-01-23', 'Eydie Kleimt', '2291540724', '', 'ekleimt4l@fastcompany.com', 0, '1990-02-11', 'd828aee5c6d6333ccc69161236e7ddef', '2018-10-12', '', '', '', '', '', '', 0, ''),
(167, 'Marieann', 'Elana', 'Gouldie', '63C4612016D5D', 'mat0167', '', 'egouldie4m@wikispaces.com', '1059811036', 'Female', '500', 'SOS', 'BIO', '2445 Waywood Avenue', '', '', '', 'Russia', '', 0, 1, '15-01-23', 'Elana Gouldie', '4337233093', '', 'egouldie4m@163.com', 0, '2003-12-30', '91edad473542d3374dcd94a00fd6adce', '2020-05-14', '', '', '', '', '', '', 0, ''),
(168, 'Rees', 'Richie', 'Lamkin', '63C461201704A', 'mat0168', '', 'rlamkin4n@economist.com', '6017637080', 'Male', '100', 'SOC', 'IFT', '21 Melody Drive', '', '', '', 'China', '', 0, 1, '15-01-23', 'Richie Lamkin', '3146209230', '', 'rlamkin4n@mozilla.com', 0, '1990-08-12', '3b7630f751bd3080d044f16dcd7bfc51', '2020-01-03', '', '', '', '', '', '', 0, ''),
(169, 'Alvan', 'Eb', 'Watterson', '63C46120172F0', 'mat0169', '', 'ewatterson4o@dedecms.com', '8202779054', 'Male', '200', 'SOC', 'IFT', '1 Spaight Alley', '', '', 'Bretagne', 'France', '', 0, 1, '15-01-23', 'Eb Watterson', '2247430765', '', 'ewatterson4o@reuters.com', 0, '2001-09-01', 'd2f559aa54df07d74c71410c8343f2f0', '2021-02-24', '', '', '', '', '', '', 0, ''),
(170, 'Rhodia', 'Audre', 'Tipper', '63C46120174E5', 'mat0170', '', 'atipper4p@pbs.org', '5106926715', 'Female', '100', 'SOC', 'IFT', '0 Hooker Way', '', '', '', 'Syria', '', 0, 1, '15-01-23', 'Audre Tipper', '7707039452', '', 'atipper4p@answers.com', 0, '1992-12-28', '00616617a4f11b305a5af6d158d68db1', '2022-12-05', '', '', '', '', '', '', 0, ''),
(171, 'Corissa', 'Andie', 'Pennycock', '63C46120176F9', 'mat0171', '', 'apennycock4q@umn.edu', '5959623816', 'Female', '400', 'SOC', 'IFT', '315 Florence Road', '', '', '', 'Honduras', '', 0, 1, '15-01-23', 'Andie Pennycock', '7905967958', '', 'apennycock4q@cbc.ca', 0, '1990-10-18', 'ed5c2967ee53f1a951fc6cfcefa3c2f9', '2018-04-06', '', '', '', '', '', '', 0, ''),
(172, 'Germayne', 'Crawford', 'Sproule', '63C46120178FB', 'mat0172', '', 'csproule4r@cocolog-nifty.com', '1593243803', 'Male', '100', 'SOC', 'IFT', '6752 Hermina Trail', '', '', 'Mexico', 'Mexico', '', 0, 1, '15-01-23', 'Crawford Sproule', '8533358719', '', 'csproule4r@printfriendly.com', 0, '2003-04-10', '3ffddb0a01997591fbcaeec2c6176464', '2019-05-02', '', '', '', '', '', '', 0, ''),
(173, 'Grete', 'Kettie', 'Vida', '63C4612017AF3', 'mat0173', '', 'kvida4s@issuu.com', '6215675632', 'Female', '300', 'SOC', 'IFT', '0 Bellgrove Street', '', '', '', 'China', '', 0, 1, '15-01-23', 'Kettie Vida', '4377802913', '', 'kvida4s@youku.com', 0, '1991-11-02', '20c6e3b0075f691c2ecb4052eee9995a', '2020-08-10', '', '', '', '', '', '', 0, ''),
(174, 'Orion', 'Harland', 'O\'Noland', '63C4612017CB8', 'mat0174', '', 'honoland4t@yale.edu', '5521947798', 'Male', '400', 'SOC', 'IFT', '052 Old Shore Junction', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Harland O\'Noland', '2022460509', '', 'honoland4t@businessinsider.com', 0, '1993-06-14', '7716436ab9382a31f3edc9fd21de41a8', '2022-01-30', '', '', '', '', '', '', 0, ''),
(175, 'Jolyn', 'Ashia', 'Giocannoni', '63C4612017E3F', 'mat0175', '', 'agiocannoni4u@photobucket.com', '9479298342', 'Female', '200', 'SOC', 'IFT', '33653 Green Crossing', '', '', 'Picardie', 'France', '', 0, 1, '15-01-23', 'Ashia Giocannoni', '2388875307', '', 'agiocannoni4u@goo.gl', 0, '2002-11-28', 'f7e6cbca2bd7516e47dbec39f15020a5', '2019-12-21', '', '', '', '', '', '', 0, ''),
(176, 'Luci', 'Corabelle', 'Beauly', '63C4612017FBE', 'mat0176', '', 'cbeauly4v@addtoany.com', '8827432876', 'Female', '500', 'SOC', 'IFT', '50 Bashford Crossing', '', '', '', 'China', '', 0, 1, '15-01-23', 'Corabelle Beauly', '4555842489', '', 'cbeauly4v@icio.us', 0, '1991-05-08', '8b1e1730f071d1addb78a3b6b5b306e4', '2022-09-05', '', '', '', '', '', '', 0, ''),
(177, 'Norby', 'Stephanus', 'Arnecke', '63C461201813F', 'mat0177', '', 'sarnecke4w@mail.ru', '3933497032', 'Male', '500', 'SOS', 'BIO', '31 Cottonwood Lane', '', '', 'Pulau Pinang', 'Malaysia', '', 0, 1, '15-01-23', 'Stephanus Arnecke', '2231068876', '', 'sarnecke4w@4shared.com', 0, '1995-12-11', 'e5721f76bedd9b9c28594f82a9f46813', '2021-05-16', '', '', '', '', '', '', 0, ''),
(178, 'Arther', 'Waldemar', 'Carslaw', '63C46120182BB', 'mat0178', '', 'wcarslaw4x@google.pl', '1859798565', 'Male', '400', 'SOS', 'BIO', '8025 Bluestem Street', '', '', '', 'China', '', 0, 1, '15-01-23', 'Waldemar Carslaw', '5038065066', '', 'wcarslaw4x@amazon.co.uk', 0, '2004-03-08', '1d3015f02284841f267103f2cbb581da', '2020-03-09', '', '', '', '', '', '', 0, ''),
(179, 'Iolande', 'Augustine', 'Leverage', '63C4612018443', 'mat0179', '', 'aleverage4y@issuu.com', '7488070232', 'Female', '400', 'SOC', 'IFT', '316 Roxbury Drive', '', '', '', 'South Africa', '', 0, 1, '15-01-23', 'Augustine Leverage', '3451525893', '', 'aleverage4y@yolasite.com', 0, '2001-09-17', 'e0a65de8588e3e383acb05aa215f5b89', '2021-05-17', '', '', '', '', '', '', 0, ''),
(180, 'Gabby', 'Kurt', 'Flintiff', '63C46120185B3', 'mat0180', '', 'kflintiff4z@seattletimes.com', '6466133680', 'Male', '200', 'SOC', 'IFT', '7 Roxbury Point', '', '', '', 'Colombia', '', 0, 1, '15-01-23', 'Kurt Flintiff', '6444663733', '', 'kflintiff4z@bing.com', 0, '1992-01-01', '26d2e90752de4fc03f13e11412d2cd8f', '2021-01-18', '', '', '', '', '', '', 0, ''),
(181, 'Wash', 'Tedmund', 'Lawee', '63C461201873A', 'mat0181', '', 'tlawee50@yandex.ru', '4982113601', 'Male', '300', 'SOC', 'IFT', '28 Portage Junction', '', '', '', 'New Zealand', '', 0, 1, '15-01-23', 'Tedmund Lawee', '3833493616', '', 'tlawee50@github.com', 0, '1996-12-29', 'd3b715974b22e9564f33601a5f3b6073', '2021-02-22', '', '', '', '', '', '', 0, ''),
(182, 'Cristina', 'Guillema', 'Calendar', '63C46120188A7', 'mat0182', '', 'gcalendar51@ycombinator.com', '8215260467', 'Female', '400', 'SOC', 'IFT', '055 Golf View Point', '', '', 'Provincie Noord', 'Netherlands', '', 0, 1, '15-01-23', 'Guillema Calendar', '8668591090', '', 'gcalendar51@abc.net.au', 0, '2000-02-08', '2298d9423960c157e97833c0c052dbeb', '2021-01-18', '', '', '', '', '', '', 0, ''),
(183, 'Cissiee', 'Olimpia', 'Basley', '63C4612018A31', 'mat0183', '', 'obasley52@meetup.com', '6014779067', 'Female', '500', 'SOS', 'BIO', '3519 Toban Road', '', '', 'Mississippi', 'United States', '', 0, 1, '15-01-23', 'Olimpia Basley', '2926532636', '', 'obasley52@businesswire.com', 0, '1993-08-08', 'fdaf9f10794e01c3115c3aaea0c35ff7', '2020-12-06', '', '', '', '', '', '', 0, ''),
(184, 'Tan', 'Lionello', 'Kenen', '63C4612018BB3', 'mat0184', '', 'lkenen53@360.cn', '8189351775', 'Male', '400', 'SOC', 'IFT', '34 Muir Circle', '', '', '', 'Nigeria', '', 0, 1, '15-01-23', 'Lionello Kenen', '4283459056', '', 'lkenen53@usa.gov', 0, '1999-06-07', '6a7407150c67d0ee636cd04cf518f729', '2021-06-28', '', '', '', '', '', '', 0, ''),
(185, 'Farrell', 'Menard', 'Hadkins', '63C4612018D33', 'mat0185', '', 'mhadkins54@zdnet.com', '7742498500', 'Male', '500', 'SOC', 'IFT', '0028 Forest Dale Avenue', '', '', '', 'Japan', '', 0, 1, '15-01-23', 'Menard Hadkins', '6143520211', '', 'mhadkins54@w3.org', 0, '1993-06-01', '3af749486cbadf2f348aefb84c72aa60', '2021-01-17', '', '', '', '', '', '', 0, ''),
(186, 'Birch', 'Flinn', 'Tumilson', '63C4612018EA7', 'mat0186', '', 'ftumilson55@tripod.com', '9482513943', 'Male', '500', 'SOS', 'BIO', '163 Arizona Street', '', '', 'Rhône-Alpes', 'France', '', 0, 1, '15-01-23', 'Flinn Tumilson', '6407928036', '', 'ftumilson55@eventbrite.com', 0, '1994-09-20', 'f1091ae677610f9b860ba2e803dc7f97', '2021-06-24', '', '', '', '', '', '', 0, ''),
(187, 'Drugi', 'Ferris', 'Jurs', '63C4612019020', 'mat0187', '', 'fjurs56@sakura.ne.jp', '2187675918', 'Male', '300', 'SOC', 'IFT', '1 Rigney Lane', '', '', 'Gävleborg', 'Sweden', '', 0, 1, '15-01-23', 'Ferris Jurs', '6593072328', '', 'fjurs56@free.fr', 0, '1998-02-21', 'eef02b20aeaf650832354e6306c248fd', '2022-06-18', '', '', '', '', '', '', 0, ''),
(188, 'Claribel', 'Nita', 'Llywarch', '63C461201919C', 'mat0188', '', 'nllywarch57@globo.com', '9321970109', 'Female', '300', 'SOC', 'IFT', '2 Glacier Hill Park', '', '', '', 'China', '', 0, 1, '15-01-23', 'Nita Llywarch', '6057290945', '', 'nllywarch57@newyorker.com', 0, '1994-03-15', 'a16b39dd3996fd804a741d2b22397e5c', '2021-12-10', '', '', '', '', '', '', 0, ''),
(189, 'Zenia', 'Diandra', 'Renbold', '63C4612019318', 'mat0189', '', 'drenbold58@slideshare.net', '9326459459', 'Female', '200', 'SOC', 'IFT', '6646 Westridge Crossing', '', '', '', 'Indonesia', '', 0, 1, '15-01-23', 'Diandra Renbold', '3244353590', '', 'drenbold58@psu.edu', 0, '1998-11-03', '693670305e5d120649d744f7cd5582e2', '2022-01-22', '', '', '', '', '', '', 0, ''),
(190, 'Sharl', 'Vitia', 'Jacquet', '63C46120194B8', 'mat0190', '', 'vjacquet59@blogger.com', '4014507960', 'Female', '300', 'SOS', 'BIO', '7051 Anderson Plaza', '', '', '', 'Ukraine', '', 0, 1, '15-01-23', 'Vitia Jacquet', '6473726439', '', 'vjacquet59@comcast.net', 0, '1998-09-08', '8cc0de09a82a09c46ae0c995d032ab32', '2020-07-29', '', '', '', '', '', '', 0, ''),
(191, 'Waneta', 'Christie', 'Kilkenny', '63C461201976C', 'mat0191', '', 'ckilkenny5a@imgur.com', '4131662661', 'Female', '500', 'SOS', 'BIO', '6756 Buena Vista Parkway', '', '', '', 'Mongolia', '', 0, 1, '15-01-23', 'Christie Kilkenny', '4992417742', '', 'ckilkenny5a@hao123.com', 0, '2001-01-22', 'b1ab8e56a64ab6a285795c143dfd62ee', '2020-01-24', '', '', '', '', '', '', 0, ''),
(192, 'Lani', 'Naomi', 'Tandey', '63C4612019927', 'mat0192', '', 'ntandey5b@fema.gov', '7021919936', 'Female', '200', 'SOC', 'IFT', '0112 Bay Parkway', '', '', '', 'Greece', '', 0, 1, '15-01-23', 'Naomi Tandey', '2407773644', '', 'ntandey5b@tamu.edu', 0, '2003-10-11', '7e48ae5f25fdc4644f7901c370799552', '2021-06-08', '', '', '', '', '', '', 0, ''),
(193, 'Rhona', 'Linn', 'Espadas', '63C4612019AB6', 'mat0193', '', 'lespadas5c@usda.gov', '2433504231', 'Female', '300', 'SOC', 'IFT', '2315 Ramsey Parkway', '', '', '', 'Brazil', '', 0, 1, '15-01-23', 'Linn Espadas', '1608031682', '', 'lespadas5c@ameblo.jp', 0, '2001-12-19', '8ed2b713cbe8deb8e6399049f6e51355', '2022-01-11', '', '', '', '', '', '', 0, ''),
(194, 'Larisa', 'Charita', 'Noraway', '63C4612019DB4', 'mat0194', '', 'cnoraway5d@ebay.co.uk', '7091415230', 'Female', '300', 'SOS', 'BIO', '9 Village Point', '', '', '', 'Philippines', '', 0, 1, '15-01-23', 'Charita Noraway', '8888544051', '', 'cnoraway5d@cloudflare.com', 0, '2003-05-20', '40315eb11e125a35c2f978c9d777fc86', '2018-12-03', '', '', '', '', '', '', 0, ''),
(195, 'Kelcey', 'Bab', 'Calleja', '63C461201A0E1', 'mat0195', '', 'bcalleja5e@nydailynews.com', '4101385166', 'Female', '200', 'SOS', 'BIO', '4632 Huxley Junction', '', '', 'Oberösterreich', 'Austria', '', 0, 1, '15-01-23', 'Bab Calleja', '4178777643', '', 'bcalleja5e@naver.com', 0, '1995-05-15', '2c75be53e5f43181c8f9f3cd1887c405', '2022-01-31', '', '', '', '', '', '', 0, ''),
(196, 'Zachary', 'Thorin', 'Bellon', '63C461201A502', 'mat0196', '', 'tbellon5f@de.vu', '4765194343', 'Male', '100', 'SOC', 'IFT', '4164 Swallow Trail', '', '', '', 'China', '', 0, 1, '15-01-23', 'Thorin Bellon', '4624783229', '', 'tbellon5f@sohu.com', 0, '1998-04-07', '36f14214678cf56ae65c945520a8256f', '2018-11-03', '', '', '', '', '', '', 0, ''),
(197, 'Minnnie', 'Mercedes', 'Gowling', '63C461201A8BF', 'mat0197', '', 'mgowling5g@gmpg.org', '1179610830', 'Female', '200', 'SOC', 'IFT', '83 Jenifer Court', '', '', '', 'Japan', '', 0, 1, '15-01-23', 'Mercedes Gowling', '8817239941', '', 'mgowling5g@smh.com.au', 0, '2000-03-28', '26120a0334713b44399352e7c1f61f3c', '2021-02-07', '', '', '', '', '', '', 0, ''),
(198, 'Doro', 'Kacie', 'Piser', '63C461201AB89', 'mat0198', '', 'kpiser5h@meetup.com', '9341706269', 'Female', '100', 'SOC', 'IFT', '497 Jay Road', '', '', '', 'Thailand', '', 0, 1, '15-01-23', 'Kacie Piser', '1696657861', '', 'kpiser5h@ehow.com', 0, '1999-09-07', '70f7d80fd72bb9df8043a7c79e0629f5', '2021-08-21', '', '', '', '', '', '', 0, ''),
(199, 'Lindsey', 'Yule', 'Corona', '63C461201ADF1', 'mat0199', '', 'ycorona5i@unesco.org', '2337197665', 'Male', '100', 'SOC', 'IFT', '13853 Oxford Point', '', '', '', 'China', '', 0, 1, '15-01-23', 'Yule Corona', '2371914911', '', 'ycorona5i@columbia.edu', 0, '2001-06-03', '6e968b86c79efde913a58dbcfea8ce4a', '2019-08-22', '', '', '', '', '', '', 0, ''),
(200, 'Augusto', 'Nobe', 'Springett', '63C461201B01C', 'mat0200', '', 'nspringett5j@sciencedaily.com', '9966683735', 'Male', '200', 'SOS', 'BIO', '325 Park Meadow Parkway', '', '', '', 'Brazil', '', 0, 1, '15-01-23', 'Nobe Springett', '6034735714', '', 'nspringett5j@nih.gov', 0, '1998-07-11', '4d7afe6136d0d85da3037136aa127e7e', '2020-02-03', '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_option`
--

CREATE TABLE `student_option` (
  `sn` int(11) NOT NULL,
  `student` varchar(150) NOT NULL,
  `subject_id` varchar(15) NOT NULL,
  `exam_code` varchar(150) NOT NULL,
  `question_id` varchar(15) NOT NULL,
  `asumed_no` int(11) NOT NULL,
  `option_c` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `student_post`
--

CREATE TABLE `student_post` (
  `sn` int(11) NOT NULL,
  `post` varchar(500) NOT NULL,
  `job_description` text NOT NULL,
  `holder` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `sn` int(11) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `arm` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `period` varchar(12) DEFAULT NULL,
  `set_by` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(11) NOT NULL,
  `userid` varchar(150) NOT NULL,
  `userid2` varchar(150) NOT NULL,
  `password2` varchar(210) NOT NULL,
  `type` varchar(10) NOT NULL,
  `dates` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0,
  `presence` int(11) NOT NULL DEFAULT 1,
  `staff_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `userid`, `userid2`, `password2`, `type`, `dates`, `status`, `active`, `presence`, `staff_id`) VALUES
(456, 'admin_demo_0001', '7a1e83220aea7623f42dd8bf9cd5d419', 'cce2f81bb110bd8e7bab9779491caf09', 'admin', '27/10/2021', 1, 1, 1, 0),
(457, 'std/2221', '12344d639c65d0aa1cf88213cf424c8c', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 0, 0),
(458, 'std/2222', '9186a9d874a84f4ab23bf2a87d9e9bb8', '0cc175b9c0f1b6a831c399e269772661', 'staff', '05-11-21', 0, 1, 1, 0),
(459, 'std/2223', 'e6b894f98d392d7872d957255c3ecf17', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 1, 0),
(460, 'std/2224', '047372d0b1c321dcaa4d43e537922f06', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 0, 1, 1, 0),
(461, 'std/2225', '19284f788fe1aeaed08de72d84056007', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 1, 0),
(462, 'std/2226', '27eae1f89bb05a07b38a0266c7cffdcd', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 0, 1, 1, 0),
(463, 'std/2227', '225ab05648989ce97dcf703f046525b3', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 0, 1, 1, 0),
(464, 'std/2228', 'a878057e0ef0b12694d5be65abf48a4b', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 0, 1, 1, 0),
(465, 'std/2229', 'c7d9b2ee241f18e4b9db80a799cbdc78', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 1, 0),
(466, 'std/2230', '1ad15938691a0caccdf9c7b396adbaee', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 1, 0),
(467, 'std/2231', 'aee15aecce5ab707fc2ffa634a14ba99', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 1, 0),
(468, 'std/2232', '04f0408ffe1f46f79f68cb0af0bd5621', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 1, 0),
(469, 'std/2233', 'bab9a30fa9fe64021a58ae4fd475c6a3', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 0, 1, 1, 0),
(470, 'std/2234', '7815aedb0ee7dcf7876a4768f6b3c52c', 'aa1059884c4d3547935e52a351e93c91', 'staff', '05-11-21', 1, 1, 1, 0),
(559, 'std/2221_admin', 'da43062b75e3a03cfc799412d81999bf', 'cce2f81bb110bd8e7bab9779491caf09', 'admin', '13-01-23', 0, 1, 1, 21),
(560, 'std/2222_admin', '5618f9f6a599a2f9b8d50d3e2c0062f7', 'cce2f81bb110bd8e7bab9779491caf09', 'admin', '13-01-23', 0, 1, 1, 22),
(561, 'std/2225_admin', 'cefbcec41bd25d8fe29864069b9ed8c1', 'cce2f81bb110bd8e7bab9779491caf09', 'admin', '13-01-23', 0, 1, 1, 25),
(562, 'std/2230_admin', '1848632b81b1021e4b866d3451dcc52f', 'cce2f81bb110bd8e7bab9779491caf09', 'admin', '13-01-23', 0, 1, 1, 30),
(565, 'wwe', '947af30fc5fd1aaf1e0d8899d5d5baee', '0cc175b9c0f1b6a831c399e269772661', 'staff', '13-01-23', 0, 1, 1, 37),
(1579, 'mat0200', '4d7afe6136d0d85da3037136aa127e7e', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(574, 'wwe_admin', '91180a647b39daeac35a951ca6173780', 'cce2f81bb110bd8e7bab9779491caf09', 'admin', '14-01-23', 0, 1, 1, 37),
(1578, 'mat0199', '6e968b86c79efde913a58dbcfea8ce4a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 1, 1, 1, 0),
(1577, 'mat0198', '70f7d80fd72bb9df8043a7c79e0629f5', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1576, 'mat0197', '26120a0334713b44399352e7c1f61f3c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1575, 'mat0196', '36f14214678cf56ae65c945520a8256f', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1574, 'mat0195', '2c75be53e5f43181c8f9f3cd1887c405', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1573, 'mat0194', '40315eb11e125a35c2f978c9d777fc86', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1572, 'mat0193', '8ed2b713cbe8deb8e6399049f6e51355', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1571, 'mat0192', '7e48ae5f25fdc4644f7901c370799552', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1570, 'mat0191', 'b1ab8e56a64ab6a285795c143dfd62ee', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1569, 'mat0190', '8cc0de09a82a09c46ae0c995d032ab32', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1568, 'mat0189', '693670305e5d120649d744f7cd5582e2', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1567, 'mat0188', 'a16b39dd3996fd804a741d2b22397e5c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1566, 'mat0187', 'eef02b20aeaf650832354e6306c248fd', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1565, 'mat0186', 'f1091ae677610f9b860ba2e803dc7f97', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1564, 'mat0185', '3af749486cbadf2f348aefb84c72aa60', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1563, 'mat0184', '6a7407150c67d0ee636cd04cf518f729', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1562, 'mat0183', 'fdaf9f10794e01c3115c3aaea0c35ff7', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1561, 'mat0182', '2298d9423960c157e97833c0c052dbeb', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1560, 'mat0181', 'd3b715974b22e9564f33601a5f3b6073', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1559, 'mat0180', '26d2e90752de4fc03f13e11412d2cd8f', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1558, 'mat0179', 'e0a65de8588e3e383acb05aa215f5b89', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1557, 'mat0178', '1d3015f02284841f267103f2cbb581da', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1556, 'mat0177', 'e5721f76bedd9b9c28594f82a9f46813', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1555, 'mat0176', '8b1e1730f071d1addb78a3b6b5b306e4', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1554, 'mat0175', 'f7e6cbca2bd7516e47dbec39f15020a5', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1553, 'mat0174', '7716436ab9382a31f3edc9fd21de41a8', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1552, 'mat0173', '20c6e3b0075f691c2ecb4052eee9995a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1551, 'mat0172', '3ffddb0a01997591fbcaeec2c6176464', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1550, 'mat0171', 'ed5c2967ee53f1a951fc6cfcefa3c2f9', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1549, 'mat0170', '00616617a4f11b305a5af6d158d68db1', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1548, 'mat0169', 'd2f559aa54df07d74c71410c8343f2f0', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1547, 'mat0168', '3b7630f751bd3080d044f16dcd7bfc51', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1546, 'mat0167', '91edad473542d3374dcd94a00fd6adce', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1545, 'mat0166', 'd828aee5c6d6333ccc69161236e7ddef', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1544, 'mat0165', '0206cb8dcff652ad8413cc36e53e4c3b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1543, 'mat0164', 'b523dff42f2c57cb338db5c39ae11e6a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1542, 'mat0163', 'acc5bbdbe5b38f9fd2b0c6e10bc6110d', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1541, 'mat0162', 'b44ac020761404512e1d52a5bde299ee', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1540, 'mat0161', 'f1dbc3921828b863878627ce0e45e9ab', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1539, 'mat0160', 'e9be07378b705e422751a4ad609d36cb', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1538, 'mat0159', '173bd87cbd7dd33a3e004bae3d3da085', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1537, 'mat0158', '3cf6fdbfc4cfb8cfc8f8164d4d73c1ee', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1536, 'mat0157', '2033e0f95e34de28f2c042175b422bb3', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1535, 'mat0156', '95a90082ae9caa33a7c8a5e71ea79c84', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1534, 'mat0155', 'b590c9f97d1c981a1171743b94fd785a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1533, 'mat0154', '5e6ba3d6415151b9359b1a9cfdd99e2a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1532, 'mat0153', '449781a9bd0923cae2f1ced4f4bbe795', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1531, 'mat0152', '647b657d6eba8466ff8793ccd83cb007', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1530, 'mat0151', '2ca7558170aa3c4cd5535e2cc5829603', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1529, 'mat0150', '47cae813b3a96f7054b0267b46bf92db', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1528, 'mat0149', '0f2670b44aed73d223b4423a490ffb20', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1527, 'mat0148', '2743ff41e38b823a9e7ebda8a8274126', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1526, 'mat0147', '987371333241647414e1a363cd757eae', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1525, 'mat0146', 'a478d4bb380bfb5f3f8ceb52ce31a641', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1524, 'mat0145', '3985a500631f5d0a7e1bd8dc797215f1', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1523, 'mat0144', '71381150354e8f54ee40087c2a79477a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1522, 'mat0143', 'f45416876397bc8915664b597970a537', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1521, 'mat0142', 'a09d4314b43a046c659fbe5855342d87', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1520, 'mat0141', 'a8e98c89cbcff17de0cdf2292722419e', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1519, 'mat0140', '041c5f2806d3b5c10f83b6d7b14a762a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1518, 'mat0139', '1e75914842daafee222848dc802134d7', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1517, 'mat0138', '677ca2b3fe5445893df2b40aca8891f4', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1516, 'mat0137', '32402f67c97113dbe02cf89c8fc2f20b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1515, 'mat0136', '8fc24685ec12c37ea011509bcf913cb7', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1514, 'mat0135', 'fe8fb7bc7d13b6ad56c27041c89e2975', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1513, 'mat0134', '56ddad79b9f7643c5800030a170f5050', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1512, 'mat0133', '1758d7119fd81c94b3066b88eb10cf9e', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1511, 'mat0132', '5a0925cb1b5031f52c9c0ba0aae03fa8', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1510, 'mat0131', '1b77e2cd67da86b67bae6eeeb9ef06cb', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1509, 'mat0130', 'af1e36497473d320f4a73cbe2655c9ed', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1508, 'mat0129', 'e098caa21e576e582240f840ec902256', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1507, 'mat0128', '2757a5f17031dab2160137e1f1f0f13d', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1506, 'mat0127', '2857ff627c796e76a51b9820ab4c22f4', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1505, 'mat0126', '360c59e3d4fcdc30547353da9cb801ec', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1504, 'mat0125', 'fc7b6ba18d00999b7a580ae2b12d8683', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1503, 'mat0124', '7e1c7ec66b741598b660dc826bd186fc', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1502, 'mat0123', '605f6fec163d658fdfb78d843094c8b0', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1501, 'mat0122', 'd1742d57e7ea8bf2e602f4e6326998fe', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1500, 'mat0121', 'b088e7b3902d481dffe10f2ceedc0ab0', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1499, 'mat0120', '66f5e27ed8e246b495edb4020ff24fd0', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1498, 'mat0119', 'eaeb9156884e2d9126d21dd963b1fa8e', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1497, 'mat0118', 'ca30eb365e158eb6fd7490cac6e98ec9', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1496, 'mat0117', 'c317fb8e642544a9acff735d3c38b769', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1495, 'mat0116', 'f4e8fc9908482b8e20692ec0ceb3e6e3', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1494, 'mat0115', 'd8a82d4061ed86ea985b26519008ff63', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1493, 'mat0114', 'e4533311aaf242d914a8c72177cbfc62', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1492, 'mat0113', 'ccc0eb2f34f44afbd953ff647edd14eb', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1491, 'mat0112', '0586dea2c7422fddf97b66a64c93a2bf', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1490, 'mat0111', '100bb93197e88140f2c5aadc05c4f22c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1489, 'mat0110', '1c74dd808368eaa4b06308f389ce35c2', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1488, 'mat0109', 'cf49b3850c92026117c1baa7d23ffc9e', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1487, 'mat0108', '13563b54a4fa733166aebdafd9b0e460', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1486, 'mat0107', 'c7fe3661ba07cf4b511e011ba067a6f8', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1485, 'mat0106', 'ce8b456273e762a0d40f1e58dba03ef3', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1484, 'mat0105', 'd687eacb70bc56ef07d9fb469a95f628', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1483, 'mat0104', '2dac119e8c14546534131d924fd77ae5', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1482, 'mat0103', '19d12ff71be2b925e48c859bddd68dd2', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1481, 'mat0102', '414813e207b4d034d0d537245d323a22', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1480, 'mat0101', '7ccdf813fef35406992739a27c343ed1', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1479, 'mat0100', 'd917ee3fe40a192d2dddcc74b5254dfd', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1478, 'mat0099', 'a07b6fb4bcc8a977de4aa109cd8bcbdf', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1477, 'mat0098', '54eab19ef6945cb44d89b1829eecd150', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1476, 'mat0097', 'f3f7409e10394eab518e58fecf181323', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1475, 'mat0096', '1cee2746f28491116d1a326f7f9c5caa', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1474, 'mat0095', 'fb0b034ccd1c95f69ee64465fc7a621f', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1473, 'mat0094', 'd1900e4e9274078e9dee9440bbc997a2', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1472, 'mat0093', '748a312cd8e6b1ef9ed3cb7a98d31c84', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1471, 'mat0092', 'fcd33e14214497978d6d5e2a15e4811b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1470, 'mat0091', '7cefd45828f84d52fc471e1b37d75a45', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1469, 'mat0090', '12c91dd5c5032541e0c9e681f3214151', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1468, 'mat0089', '05388cd8bff8e0d45a93dcf8662a5a59', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1467, 'mat0088', '869e0fee998a4e96634558bec2217898', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1466, 'mat0087', '67e5232c81adce1598a0e443a9f77606', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1465, 'mat0086', 'e3c132cbb14c6f7b4fadd7941f01d866', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1464, 'mat0085', '328f9a310cd3e7e57a3bb72515aee46d', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1463, 'mat0084', 'bc715f94ff2f8b1aa4162a7c759f0457', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1462, 'mat0083', 'd067dcd7be28e6c68b453955270f64ad', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1461, 'mat0082', '4ebd8bfa07da3792ed14c2fa7b7ceb17', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1460, 'mat0081', '3b8780a15761f7a6d9d72ffcc95d13b6', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1459, 'mat0080', 'e39f3ba1ef0ccbdf5f65f90f80dc9de5', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1458, 'mat0079', '8e9f0f502633ad33fa1e0bf3530fe23a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1457, 'mat0078', '1ecc1f2a86385d2f6c391d4429132c52', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1456, 'mat0077', 'ad0def9989181d0b4344407f6900336c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1455, 'mat0076', '7870cf9910fe2c4089da211b5af323a3', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1454, 'mat0075', 'bca1517b570aff4fb683f96400667704', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1453, 'mat0074', '9a22d8ccf23a8ceb6304fa46f2d601b2', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1452, 'mat0073', 'bb94178c511ed82465b5d0ca1a280bb4', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1451, 'mat0072', 'c5d797fe543bcaf55cf3a7616afbb589', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1450, 'mat0071', '5a0d70749b084bb3beb3961b57586692', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1449, 'mat0070', '97774d867ab419f22706cc2bf11165a0', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1448, 'mat0069', '3710ca05589955503a944715fe6192bc', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1447, 'mat0068', '03ca1c719d0f59718dac45a8cbd9fa5a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1446, 'mat0067', '4990fbe20f6f25234c3f027db5cf981f', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1445, 'mat0066', 'cb0ca59d65c0d208bd40b25394b809db', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1444, 'mat0065', '34b6980abe9eccfe32de618f9362614c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1443, 'mat0064', 'aa07ed24a750c249a2c8af289d0c7d2d', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1442, 'mat0063', '40767e2a3b6884346236ddf407a25460', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1441, 'mat0062', 'c074151d09c679e99a43f48847e1ab90', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1440, 'mat0061', 'b7c99576e691f20606de95c8ff80e210', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1439, 'mat0060', '786b633010b681ce7a5d4df376bde42b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1438, 'mat0059', '71c70b222626fa52e876b9d6e6742759', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1437, 'mat0058', '5c3f8167b07656e0721780f78eb18fb0', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1436, 'mat0057', '3b877420c1855fb97d3a9be5ff78eb1b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1435, 'mat0056', '49d4f21614616e4307afcf574e134f0b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1434, 'mat0055', 'b72801a4cc16e626e9c934f5d8483197', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1433, 'mat0054', '34495b71014d0b9dd4588b973199dcc4', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1432, 'mat0053', '100c6e2979c1909bf8141e21964231fd', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1431, 'mat0052', '07898bad098042cd369df49c009690a7', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1430, 'mat0051', '8b4a5cee22fe3555da310b4535ded583', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1429, 'mat0050', 'b09022cd500e41169b379e77f49fe651', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1428, 'mat0049', '426c33df109f74f72b6e4efdbb22b18d', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1427, 'mat0048', 'e0aaff5c46d75ba1dbdd2c44eeabbeea', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1426, 'mat0047', '58e20c9b694a026cb0c1789a75007431', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1425, 'mat0046', '1bfcd714a8e90cfd1e6cafa63369a126', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1424, 'mat0045', '864511f4afc1ff236721d6ecd318c45a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1423, 'mat0044', '69c050ec35fa1a304fa89799f08c8e98', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1422, 'mat0043', 'f130c624a61ab1b054e76c3e12995bfb', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1421, 'mat0042', 'b035fd4a8011b7814297ff10872caf69', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1420, 'mat0041', '6388940e9daa26b8fb6567f3ba1917a7', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1419, 'mat0040', '426c7bb1368bdaddbf797441fc621520', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1418, 'mat0039', 'f28897df3ff29f4c8a8b0885d2899953', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1417, 'mat0038', '1346d51cc8981f7fe09581f2e736baae', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1416, 'mat0037', 'b1dee669dcaaf9666b7ff3c76adbe13b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1415, 'mat0036', '1d19e7a8decb15314b4250a772bfdd7a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1414, 'mat0035', '45830bf2641e6bae7bee684de815e43e', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1413, 'mat0034', '1e0f27c1470a54fe1ea3a8541faf7e21', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1412, 'mat0033', '8eb2a178542abab3301a916ee2c1d91c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1411, 'mat0032', '1c777ea23fee12bb49f6fc446dc1b29d', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1410, 'mat0031', 'f068279e67c732ff757e2aae56b0deb5', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1409, 'mat0030', '6d149c346fe9dfb710ef595f8d02c4cf', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1408, 'mat0029', '54d73ebf91f7b5ebfcce3240d268cc2c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1407, 'mat0028', 'ce934dce931583ac73d6215113bc6215', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1406, 'mat0027', '7437e703995690641d81ad4a3df63cc7', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1405, 'mat0026', 'a8e27b8c65466aa9501d034f719b0af4', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1404, 'mat0025', '4a1b9fe61899a7e89acaeb123cd5a96c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1403, 'mat0024', '8d074cc31952885480478e590aae3052', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1402, 'mat0023', 'd9f96aaad57334cd0eb6b5f4e940dbc6', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1401, 'mat0022', 'b207d25b3460fd92e2ce121bdd761d1d', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1400, 'mat0021', '1e517c40c19514e210d66f9c59c858fe', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1399, 'mat0020', '2d02ee50a36401b63b41d2ba6347f18b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1398, 'mat0019', '9139c178b6a08c493704ef7be6f20234', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1397, 'mat0018', 'fc8290eaa681fd5f7c669f8f05d2d58b', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1396, 'mat0017', '237c875540fac8b11f8e5a0c4944e13a', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1395, 'mat0016', '05b47452bb1b7c2ac46960f46024a299', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1394, 'mat0015', '533342674f17941298e2cd554e1e796c', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1393, 'mat0014', 'd467cb13e18f42c678b01b18cca01968', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1392, 'mat0013', '2007ec6ca9ec61ca8d9ce3fb61cceacd', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1391, 'mat0012', '7ab2761ea5088794029411d71f619b14', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1390, 'mat0011', '32b19f679c9ba8e3667687db221d725f', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1389, 'mat0010', 'c55c72942adb84e5bd1d7e906b941024', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1388, 'mat0009', 'ffa8267162fe552289f6043d72c5b2cd', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1387, 'mat0008', 'bb935bb6cc8cdea2d68fabb7cb439b64', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1386, 'mat0007', '6962de7e825866077f001c1fa04e0364', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1385, 'mat0006', '7eb2c37d2239f7f3f8b4b055abf15f7e', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1384, 'mat0005', 'c4450bcabba3600ed09ca638203b92d9', '0cc175b9c0f1b6a831c399e269772661', 'student', '15-01-23', 0, 0, 1, 0),
(1383, 'mat0004', 'edc93952f552ed8e697406e260b0b956', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1382, 'mat0003', 'f8a146692ea9e78076b3024a7e9d0fca', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(1381, 'mat0002', '1251f4c126e3becabbef04b51bd62b96', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0),
(779, '63C42E49042EA', '8c5a0e4d07867c72ddc229a1b5bece9d', 'aa1059884c4d3547935e52a351e93c91', 'staff', '15-01-23', 0, 0, 1, 3),
(1380, 'mat0001', 'c631b8e98a81e3a56e4b1e407ab219eb', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '15-01-23', 0, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `employee` (`employee_id`);

--
-- Indexes for table `admin_function`
--
ALTER TABLE `admin_function`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `anoucement`
--
ALTER TABLE `anoucement`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `ass_sub`
--
ALTER TABLE `ass_sub`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `dept_code` (`dept_code`);

--
-- Indexes for table `elibrary`
--
ALTER TABLE `elibrary`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `exam_access`
--
ALTER TABLE `exam_access`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `code` (`sn`);

--
-- Indexes for table `final_score`
--
ALTER TABLE `final_score`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `gone_staff`
--
ALTER TABLE `gone_staff`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `employee` (`employee`);

--
-- Indexes for table `gpa_record`
--
ALTER TABLE `gpa_record`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `graduated_students`
--
ALTER TABLE `graduated_students`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `admission_no` (`matric_no`);

--
-- Indexes for table `inactive`
--
ALTER TABLE `inactive`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `left_students`
--
ALTER TABLE `left_students`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `admission_no` (`matric_no`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `max_loads`
--
ALTER TABLE `max_loads`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `paid_fees`
--
ALTER TABLE `paid_fees`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `period_format`
--
ALTER TABLE `period_format`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `pin` (`pin`),
  ADD UNIQUE KEY `teller_no` (`teller_no`);

--
-- Indexes for table `pre_students`
--
ALTER TABLE `pre_students`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `result_access`
--
ALTER TABLE `result_access`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `result_query`
--
ALTER TABLE `result_query`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `result_record`
--
ALTER TABLE `result_record`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `employee` (`employee`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `student` (`student`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `admission_no` (`matric_no`);

--
-- Indexes for table `student_option`
--
ALTER TABLE `student_option`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `student_post`
--
ALTER TABLE `student_post`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `userid2` (`userid2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_function`
--
ALTER TABLE `admin_function`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `anoucement`
--
ALTER TABLE `anoucement`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_sub`
--
ALTER TABLE `ass_sub`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `course_registration`
--
ALTER TABLE `course_registration`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `elibrary`
--
ALTER TABLE `elibrary`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_access`
--
ALTER TABLE `exam_access`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `code` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `final_score`
--
ALTER TABLE `final_score`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gone_staff`
--
ALTER TABLE `gone_staff`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpa_record`
--
ALTER TABLE `gpa_record`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `graduated_students`
--
ALTER TABLE `graduated_students`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inactive`
--
ALTER TABLE `inactive`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `left_students`
--
ALTER TABLE `left_students`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `max_loads`
--
ALTER TABLE `max_loads`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_fees`
--
ALTER TABLE `paid_fees`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `period_format`
--
ALTER TABLE `period_format`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pre_students`
--
ALTER TABLE `pre_students`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_access`
--
ALTER TABLE `result_access`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result_query`
--
ALTER TABLE `result_query`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `result_record`
--
ALTER TABLE `result_record`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `student_option`
--
ALTER TABLE `student_option`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student_post`
--
ALTER TABLE `student_post`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1580;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
