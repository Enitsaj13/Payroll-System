-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 06:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Jastine Formentera', 'enitsaj@gmail.com', '111300', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(20) NOT NULL,
  `IT_Department` varchar(30) NOT NULL,
  `Accountant` varchar(30) NOT NULL,
  `Sales` varchar(30) NOT NULL,
  `Head_Office` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date_hired` date NOT NULL,
  `department` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `employee_type` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `password` varchar(50) NOT NULL DEFAULT '12345',
  `image_upload` varchar(50) NOT NULL DEFAULT 'pic.jpg',
  `verify_token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `contact`, `address`, `date_hired`, `department`, `position`, `employee_type`, `user_type`, `password`, `image_upload`, `verify_token`) VALUES
(2, 'Vernice Burgwyn', 'vburgwyn1@simplemachines.org', 2609817203, '520 Lyons Park', '2022-07-08', 'Sales', 'Sales Manager', 'Contractual', 'user', '12345	', '', ''),
(3, 'Emmey Poleyes', 'epoleye2@auda.org.au', 8486368705, '525 Esch Road', '2022-07-08', 'IT Department', 'Programmer', 'Contractual', 'user', '12345	', '', ''),
(4, 'Waldemar Philot', 'wphilot3@paginegialle.it', 7647537919, '4 Alpine Parkway', '2022-07-08', 'IT Department', 'Encoder', 'Regular', 'user', '12345	', '', ''),
(5, 'Hector Kretchmer', 'hkretchmer4@pagesperso-orange.fr', 2744885918, '7201 Burrows Center', '2022-07-08', 'Sales', 'Sales Manager', 'Consultant', 'user', '12345	', '', ''),
(7, 'Johnette Learmont', 'jlearmont6@networkadvertising.org', 6561439113, '94 Almo Pass', '2022-07-08', 'Head Office', 'Department Secretary', 'Contractual', 'user', '12345	', '', ''),
(8, 'Dulcine Nendick', 'dnendick7@youku.com', 2082810409, '35 Dennis Crossing', '2022-07-08', 'Head Office', 'Office Clerk', 'Regular', 'user', '12345	', '', ''),
(9, 'Tuckie Pickover', 'tpickover8@tinyurl.com', 5456733842, '92 Dixon Trail', '2022-07-08', 'Accountant', 'Junior Accountant', 'Regular', 'user', '12345	', '', ''),
(11, 'Michaela McCrie', 'mmccriea@dmoz.org', 6096314595, '7968 Northwestern Center', '2022-07-08', 'Sales', 'Office Clerk', 'Part-time', 'user', '12345', '', ''),
(12, 'Isabeau Wardhaw', 'iwardhawb@wix.com', 8575501722, '0 Hollow Ridge Plaza', '2022-07-08', 'Accountant', 'Head Accountant', 'Regular', 'user', '12345', '', ''),
(13, 'Otis Montilla', 'omontillac@spotify.com', 9891032637, '48865 Spenser Hill', '2022-07-08', 'Accountant', 'Head Accountant', 'Contractual', 'user', '12345', '', ''),
(14, 'Ibbie Fossey', 'ifosseyd@technorati.com', 6099698749, '40 Golden Leaf Way', '2022-07-08', 'IT Department', 'DB Admin', 'Regular', 'user', '12345', '', ''),
(15, 'Rafael Grassick', 'rgrassicke@chron.com', 1716588605, '911 Emmet Parkway', '2022-07-08', 'IT Department', 'Programmer', 'Part-time', 'user', '12345', '', ''),
(16, 'Eadith Rain', 'erainf@time.com', 6054405899, '93 Fremont Avenue', '2022-07-08', 'Sales', 'DB Admin', 'Consultant', 'user', '12345', '', ''),
(17, 'Britta Manginot', 'bmanginotg@storify.com', 9839783406, '108 Loftsgordon Circle', '2022-07-08', 'Accountant', 'Junior Accountant', 'Regular', 'user', '12345', '', ''),
(18, 'Joberta Mema', 'AmieLamplughs@gmail.com', 9211234567, '123 malacanang', '2022-07-13', 'Sales', 'Sales Manager', 'Regular', 'user', '12345', '', ''),
(19, 'Noam Keelin', 'nkeelini@studiopress.com', 8286669424, '47 Eagan Center', '2022-07-08', 'Head Office', 'Liaison', 'Part-time', 'user', '12345', '', ''),
(20, 'Katrine Gerrietz', 'kgerrietzj@slideshare.net', 6461313846, '2236 Scofield Center', '2022-07-08', 'Accountant', 'Head Accountant', 'Part-time', 'user', '12345', '', ''),
(21, 'Carlie Fydo', 'cfydok@instagram.com', 7181826072, '308 Maryland Pass', '2022-07-08', 'Sales', 'Sales Manager', 'Regular', 'user', '12345', '', ''),
(22, 'Tomasina Cissen', 'tcissenl@un.org', 2061914656, '35369 Gina Point', '2022-07-08', 'Head Office', 'Liaison', 'Contractual', 'user', '12345', '', ''),
(23, 'Armand Bartalis', 'abartalim@icio.us', 4767442439, '99011 Arizona Pass', '2022-07-08', 'IT Department', 'Designer', 'Regular', 'user', '12345', '', ''),
(24, 'Frazier Sugar', 'fsugarn@earthlink.net', 3033251743, '97 Manufacturers Avenue', '2022-07-08', 'Accountant', 'Head Accountant', 'Contractual', 'user', '12345', '', ''),
(25, 'Thadeus Dunkerton', 'tdunkertono@drupal.org', 9954143907, '7680 Sycamore Place', '2022-07-08', 'IT Department', 'Designer', 'Regular', 'user', '12345', '', ''),
(26, 'Ciro Maior', 'cmaiorp@toplist.cz', 2095411599, '6 Meadow Ridge Alley', '2022-07-08', 'Head Office', 'Office Clerk', 'Regular', 'user', '12345', '', ''),
(27, 'Drona Riccetti', 'driccettiq@earthlink.net', 6113036779, '45017 Ridgeway Trail', '2022-07-08', 'Sales', 'Junior Accountant', 'Part-time', 'user', '12345', '', ''),
(28, 'Callida Jaggs', 'cjaggsr@bluehost.com', 2366523803, '23148 Hazelcrest Drive', '2022-07-08', 'Head Office', 'Liaison', 'Regular', 'user', '12345', '', ''),
(29, 'Stacia Polson', 'spolsons@amazonaws.com', 3763023946, '06 Westend Circle', '2022-07-08', 'IT Department', 'Encoder', 'Regular', 'user', '12345', '', ''),
(30, 'Kim Skegg', 'kskeggt@blinklist.com', 5143220493, '97 Fairview Trail', '2022-07-08', 'Sales', 'DB Admin', 'Part-time', 'user', '12345', '', ''),
(31, 'Free Perrot', 'fperrotu@hc360.com', 7625104253, '58740 Morningstar Pass', '2022-07-08', 'Sales', 'Sales Representative', 'Regular', 'user', '12345', '', ''),
(32, 'Baxter Rosson', 'brossonv@4shared.com', 4346172625, '6796 Summit Lane', '2022-07-12', 'Accountant', 'Head Accountant', 'Regular', 'user', '12345', '', ''),
(33, 'Jerry O\'Kinedy', 'jokinedyw@usda.gov', 8497236588, '1973 Corry Junction', '2022-07-21', 'Sales', 'Sales Representative', 'Contractual', 'user', '12345', '', ''),
(34, 'Marcellina Ghilardini', 'mghilardinix@latimes.com', 7591148947, '42391 Kedzie Point', '2022-07-03', 'IT Department', 'DB Admin', 'Consultant', 'user', '12345', '', ''),
(35, 'Hannah Melville', 'hmelvilley@tinypic.com', 3873052454, '1 Manitowish Hill', '2022-07-02', 'Accountant', 'Junior Accountant', 'Regular', 'user', '12345', '', ''),
(37, 'Jessika Kissack', 'jkissack10@bloomberg.com', 2314960414, '8 Summerview Drive', '2022-07-08', 'Head Office', 'Office Clerk', 'Part-time', 'user', '12345', '', ''),
(38, 'Bo Fossick', 'bfossick11@jigsy.com', 8643863843, '4 Glendale Court', '2022-07-13', 'IT Department', 'DB Admin', 'Regular', 'user', '12345', '', ''),
(39, 'Crystie Gwyllt', 'cgwyllt12@hao123.com', 7081639988, '18 Valley Edge Place', '2022-07-22', 'IT Department', 'Project Manager', 'Regular', 'user', '12345', '', ''),
(40, 'Nelli McGlew', 'nmcglew13@cloudflare.com', 9802502174, '8 Village Terrace', '2019-07-17', 'Sales', 'Sales Manager', 'Part-time', 'user', '12345', '', ''),
(42, 'Donia Simoni', 'dsimoni15@tripod.com', 8003066241, '4 Eliot Drive', '1900-01-17', 'Accountant', 'Sales Manager', 'Consultant', 'user', '12345', '', ''),
(43, 'Dyanne Bispham', 'dbispham16@nbcnews.com', 2028557525, '068 Bultman Hill', '2022-07-14', 'Sales', 'Junior Accountant', 'Part-time', 'user', '12345', '', ''),
(44, 'Marlena Gaule', 'mgaule17@archive.org', 2615529402, '8 Nova Crossing', '2022-07-04', 'Sales', 'DB Admin', 'Contractual', 'user', '12345', '', ''),
(45, 'Monti Stratten', 'mstratten18@seattletimes.com', 7925454615, '87 Stone Corner Park', '2022-07-25', 'Sales', 'Junior Accountant', 'Contractual', 'user', '12345', '', ''),
(46, 'Lazarus Halso', 'lhalso19@census.gov', 6081315427, '871 Northwestern Crossing', '2022-07-10', 'Accountant', 'Department Secretary', 'Regular', 'user', '12345', '', ''),
(47, 'Karil Leyre', 'kleyre1a@sbwire.com', 4937376307, '83 Caliangt Court', '2022-07-17', 'Accountant', 'DB Admin', 'Contractual', 'user', '12345', '', ''),
(48, 'Saundra Metschke', 'smetschke1b@amazon.co.uk', 5472727115, '95 Arizona Place', '2022-07-08', 'Head Office', 'Liaison', 'Contractual', 'user', '12345', '', ''),
(49, 'Hilliary Linebarger', 'hlinebarger1c@bigcartel.com', 7116302620, '33758 Jackson Avenue', '2022-07-12', 'Accountant', 'Liaison', 'Consultant', 'user', '12345', '', ''),
(50, 'Carissa Storrah', 'cstorrah1d@ow.ly', 1258423492, '025 David Drive', '2022-07-08', 'Sales', 'Sales Manager', 'Regular', 'user', '12345', '', ''),
(52, 'asfasf', 'asfasf@gmail.com', 954645642, 'dsfsdfds', '2022-07-13', 'IT Department', 'Designer', 'Regular', 'user', 'de0eea1b2131b85e34ee465704623cf04960e9b0', 'tiger.jpg', ''),
(53, 'Vice Ganda', 'ViceGanda@gmail.com', 987434212, '122 Francisco Baltazar', '2022-07-12', 'Accountant', 'Head Accountant', 'Contractual', 'user', 'e1e6668fd21e9141cb208f30bb25bf5816e774e3', 'w3logo.jpg', ''),
(54, 'Rhiana Rosas', 'Reyana@gmail.com', 915438762, 'Malabon City 123', '2022-07-07', 'Accountant', 'Head Accountant', 'Contractual', 'user', 'f48bb9239978ab8f8952b0fd248b3e6514e938e1', 'signature.png', ''),
(55, 'dsfsdfdsfsd sdfsdfsd', 'jaicaformentera@gmail.com', 987434214, 'malabon city', '2022-07-16', 'Sales', 'Sales Representative', 'Contractual', 'user', '3b41572405aed9fe7ad762090f739b1c4a42942e', 'sc.jpg', ''),
(56, 'Eli Soriano', 'elisoriano@gmail.com', 987434243, '123 Apalit', '2022-07-11', 'Head_Office', 'Department Secretary', 'Regular', 'user', '792503ebcd8bff2e14b3b8de94a33505e2054241', 'broeli.jpg', ''),
(59, 'Jastine Formentera', 'jastine13@gmail.com', 987434214, 'malabon city', '2022-07-01', 'IT_Department', 'Programmer', 'Regular', 'admin', '4a63d69061b869b245610447dd31e6d3b855b3a7', 'james.jpg', ''),
(60, 'Payrol System', 'payroll.system2k22@gmail.com', 987434212, '122 Francisco Baltazar', '2022-07-07', 'IT_Department', 'Programmer', 'Regular', 'user', '8cb2237d0679ca88db6464eac60da96345513964', 'payroll.png', '43390da65a2c49797e94f15f6cae524a');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_process`
--

CREATE TABLE `payroll_process` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `rate` int(20) NOT NULL,
  `day_work` int(20) NOT NULL,
  `overtime` int(20) NOT NULL,
  `late` int(20) NOT NULL,
  `leave_number` int(20) NOT NULL,
  `absence` int(20) NOT NULL,
  `grosspay` int(20) NOT NULL,
  `deductions` int(30) NOT NULL,
  `netpay` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_process`
--

INSERT INTO `payroll_process` (`id`, `name`, `department`, `position`, `rate`, `day_work`, `overtime`, `late`, `leave_number`, `absence`, `grosspay`, `deductions`, `netpay`) VALUES
(39, 'Arman Hagues', 'IT Department', 'Programmer', 2000, 15, 1, 1, 1, 1, 30400, 8293, 22107),
(40, 'Arman Hagues', 'IT Department', 'Programmer', 2000, 16, 4, 3, 1, 1, 33600, 9087, 24513);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_process`
--
ALTER TABLE `payroll_process`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `payroll_process`
--
ALTER TABLE `payroll_process`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
