-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 09:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time DEFAULT NULL,
  `serial` varchar(255) NOT NULL,
  `problem` text NOT NULL,
  `approve` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `app_date`, `app_time`, `serial`, `problem`, `approve`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(1, 2, 1, '2023-06-09', '12:00:00', '', 'asdfasdfasdfasdfasdf', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-06-03 09:38:19'),
(2, 5, 5, '2023-06-13', '21:42:00', '5', 'bad headache', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-06-13 05:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `app_date` date DEFAULT NULL,
  `days` varchar(255) NOT NULL,
  `app_time` time DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_request`
--

INSERT INTO `appointment_request` (`id`, `patient_name`, `contact_no`, `doctor_name`, `app_date`, `days`, `app_time`, `symptoms`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 'Kamal Uddin', '01689754152', '0', '2023-06-09', '', '12:00:00', 'aksjdhf', NULL, NULL, NULL, NULL),
(2, 'asdf', '02045451', '0', '2023-06-03', '', '00:00:00', 'asdf', NULL, NULL, NULL, NULL),
(3, 'asdf', '02045451', '0', '2023-06-03', '', '00:00:00', 'asdf', NULL, NULL, NULL, NULL),
(4, 'sadf', '02045451', '0', '0000-00-00', '', '00:00:00', 'asdf', NULL, NULL, NULL, NULL),
(5, 'Kamal Uddin', '02045451', '0', '2023-06-03', '', '00:00:00', 'asdf', NULL, NULL, NULL, NULL),
(6, 'Kamal Uddin', 'asdf', '0', '2023-06-09', '', '00:00:00', 'asdf', NULL, NULL, NULL, NULL),
(7, 'Kamal Uddin', '02045451', '0', '0000-00-00', '', '00:00:00', 'asdf', NULL, NULL, NULL, NULL),
(8, 'asdf', '02045451', '0', '0000-00-00', '', '00:00:00', 'asdf', NULL, NULL, NULL, NULL),
(10, 'Galib', '01865850477', '3', '2023-06-27', 'Mon', '03:33:00', 'Fever', NULL, NULL, NULL, NULL),
(11, 'Abir', '44565', '6', '2023-06-04', 'Tue', '15:30:00', 'Fever', NULL, NULL, NULL, NULL),
(12, 'Abir', '44565', '6', '2023-06-04', 'Tue', '15:30:00', 'Fever', NULL, NULL, NULL, NULL),
(13, 'Galib', '0145464641', '4', '2023-05-30', 'Mon', '02:40:00', 'Fever', NULL, NULL, NULL, NULL),
(14, 'Galib', '0145464641', '4', '2023-05-30', 'Mon', '02:40:00', 'Fever', NULL, NULL, NULL, NULL),
(15, 'Galib', '0145464641', '3', '2023-05-29', 'Sun', '14:45:00', 'Fever', NULL, NULL, NULL, NULL),
(16, 'Galib', '0145464641', '3', '2023-05-29', 'Sun', '14:45:00', 'Fever', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `final_amount` decimal(10,2) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `dep_des` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_name`, `dep_des`, `deleted_at`) VALUES
(1, 'Cardiology', 'treatment for heart', '2023-06-04 16:11:03'),
(3, 'Pediatrics', 'Focuses on the medical care of infants, children, and adolescents.', NULL),
(4, 'Orthopedic ', 'Deals with conditions and injuries affecting the musculoskeletal system.', NULL),
(5, 'Neurology', 'Specializes in disorders of the nervous system.', NULL),
(6, 'Dermatology', 'Deals with skin-related conditions and disorders.', NULL),
(7, 'Cardiology', 'Specializes in diagnosing and treating heart-related conditions.', NULL),
(8, 'Psychiatry', 'Specializes in the diagnosis and treatment of mental disorders.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `desig_name` varchar(255) NOT NULL,
  `desig_des` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `desig_name`, `desig_des`, `deleted_at`) VALUES
(1, 'Department Head', 'Head of Department', NULL),
(2, 'Clinical Supervisor', 'Clinical Supervisor', NULL),
(3, 'Attending Physician', 'Physician', NULL),
(4, 'Chief Medical Officer (CMO)', 'Medical Officer', NULL),
(5, 'Senior Consultant', 'Consultant', NULL),
(6, 'Medical Superintendent', 'Medical Superintendent', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `specialist` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `days` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `designation_id`, `department_id`, `specialist`, `education`, `fees`, `days`, `start_time`, `end_time`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(1, 'Dr. Murad Hasan', 'murad@gamil.com', 1, 7, 'Cardiologist', 'MBBS, FCPS', '1200.00', '', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL),
(2, 'Dr. Harun', 'harunn@gmail.com', 1, 1, 'oncology', 'MBBS', '800.00', '', '00:00:00', '00:00:00', NULL, NULL, '2023-06-04 16:13:36', NULL, NULL),
(3, 'Dr. Shila Rahman', 'shilla@gmail.com', 2, 3, 'Pediatrician', 'MBBS, MD', '500.00', '', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL),
(4, 'Dr. Chamak Hasan', 'chamak@gmail.com', 4, 4, 'Orthopedic Surgeon', 'MBBS, MD', '2000.00', '', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL),
(5, 'Dr. Jamal khan', 'jamal@gmail.com', 6, 8, 'Psychiatrist', 'MBBS, MD', '2000.00', '', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL),
(6, 'Dr. Marufa', 'marufa@gamil.com', 4, 6, 'Dermatologist', 'MBBS, MD', '1000.00', '', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `present_address`, `permanent_address`, `birth_date`, `sex`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(1, 'Michael Johnson', 'michaeljohnson@example.com', '0185000034', '456 Pine Street', '789 Oak Avenue, ', '1991-06-25', 'Male', NULL, NULL, NULL, NULL, NULL),
(2, 'Emily Davis', 'emilydavis@example.com', '01735061377', '789 Elm Road', '123 Oak Avenue', '1997-10-13', 'Female', NULL, NULL, NULL, NULL, NULL),
(3, 'James Wilson', 'jameswilson@example.com', '01728985444', ' 321 Maple Avenue', ' 456 Pine Street', '1998-07-24', 'Male', NULL, NULL, NULL, NULL, NULL),
(4, 'Sarah Anderson', 'sarahanderson@example.com', '+88 12365498', '789 Oak Avenue', '789 Oak Avenue', '1990-09-06', 'Female', NULL, NULL, NULL, NULL, NULL),
(5, 'Kamal Uddin', '', '01689754152', '', '', '0000-00-00', 'Male', NULL, NULL, '2023-06-19 06:19:38', NULL, '2023-06-13 05:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `pay_date` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_admit`
--

CREATE TABLE `p_admit` (
  `admit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `husband_name` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `doctor_ref` varchar(255) DEFAULT NULL,
  `problem` text DEFAULT NULL,
  `admit_date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `guardian` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `conditions` text DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_medicine`
--

CREATE TABLE `p_medicine` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `advice` varchar(255) DEFAULT NULL,
  `before_after` varchar(255) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_medicine`
--

INSERT INTO `p_medicine` (`id`, `prescription_id`, `medicine_name`, `advice`, `before_after`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(1, 1, 'Napa 500', '1+0+1', 'After', NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Max-pro 20', '1+0+1', 'Before', NULL, NULL, NULL, NULL, NULL),
(3, 2, 'Napa 500', '1+0+1', 'After', NULL, NULL, NULL, NULL, NULL),
(4, 2, 'Max-pro 20', '1+0+1', 'Before', NULL, NULL, NULL, NULL, NULL),
(5, 2, 'C-Vit', '1+1+1', 'After', NULL, NULL, NULL, NULL, NULL),
(6, 3, 'Napa 500', '1+0+1', 'After', NULL, NULL, NULL, NULL, NULL),
(7, 3, 'Max-pro 20', '1+0+1', 'Before', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_prescription`
--

CREATE TABLE `p_prescription` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `inv` text DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `advice` varchar(255) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_prescription`
--

INSERT INTO `p_prescription` (`id`, `doctor_id`, `patient_id`, `age`, `weight`, `inv`, `cc`, `advice`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(1, 1, 2, 26, 60, '', 'asdf', 'asdf', NULL, NULL, NULL, NULL, NULL),
(2, 1, 2, 26, 60, '', 'asdf', 'asdf', NULL, NULL, NULL, NULL, '2023-06-12 05:37:03'),
(3, 5, 5, 26, 60, 'X-rey', 'bad headache', 'Sleep', NULL, NULL, NULL, NULL, '2023-06-13 05:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `p_test`
--

CREATE TABLE `p_test` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `service_charge` decimal(10,2) DEFAULT 0.00,
  `vat` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_test`
--

INSERT INTO `p_test` (`id`, `patient_id`, `sub_total`, `discount`, `service_charge`, `vat`, `total`, `bill_date`, `due`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(3, 4, '3000.00', '10.00', '5.00', '10.00', '3150.00', '2023-06-29', '0.00', NULL, NULL, NULL, NULL, NULL),
(4, 3, '3000.00', '10.00', '5.00', '10.00', '3150.00', '2023-06-22', '0.00', NULL, NULL, NULL, NULL, NULL),
(9, 2, '11500.00', '10.00', '10.00', '10.00', '12650.00', '2023-06-10', '1150.00', NULL, NULL, NULL, NULL, NULL),
(10, 2, '3000.00', '10.00', '10.00', '10.00', '3300.00', '2023-06-24', '2100.00', NULL, NULL, NULL, NULL, NULL),
(11, 3, '0.00', '10.00', '10.00', '10.00', '0.00', '2023-06-24', '3800.00', NULL, NULL, NULL, NULL, NULL),
(12, 3, '500.00', '10.00', '10.00', '10.00', '550.00', '2023-06-03', '100.00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_test_des`
--

CREATE TABLE `p_test_des` (
  `id` int(11) NOT NULL,
  `p_test_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_test_des`
--

INSERT INTO `p_test_des` (`id`, `p_test_id`, `test_id`, `amount`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(4, 3, 3, '3000.00', NULL, NULL, NULL, NULL, NULL),
(5, 4, 3, '3000.00', NULL, NULL, NULL, NULL, NULL),
(10, 9, 4, '8000.00', NULL, NULL, NULL, NULL, NULL),
(11, 9, 1, '500.00', NULL, NULL, NULL, NULL, NULL),
(12, 9, 3, '3000.00', NULL, NULL, NULL, NULL, NULL),
(13, 10, 3, '3000.00', NULL, NULL, NULL, NULL, NULL),
(14, 11, 0, '0.00', NULL, NULL, NULL, NULL, NULL),
(15, 12, 1, '500.00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `room_rent` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_no`, `room_type`, `capacity`, `room_rent`, `created_at`, `created_by`, `deleted_at`, `updated_at`, `updated_by`) VALUES
(1, '001', 'AC Word', 4, '500.00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `description`, `price`, `updated_by`, `updated_at`, `deleted_at`, `created_by`, `created_at`) VALUES
(1, 'Blood Test', 'Available', '500.00', NULL, NULL, NULL, NULL, NULL),
(2, 'Blood Test', 'Avail', '3000.00', NULL, NULL, '2023-06-19 05:45:04', NULL, NULL),
(3, 'X-Ray', 'fdgdsfgdsfg', '3000.00', NULL, NULL, NULL, NULL, NULL),
(4, 'Ultrasound Test', 'dfgdsfgdfg', '8000.00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact_no`, `password`, `image`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(1, 'Kamal Uddin', 'kamal@yahoo.com', '', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Galib', 'galib@gmail.com', '', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_id` (`designation_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_admit`
--
ALTER TABLE `p_admit`
  ADD PRIMARY KEY (`admit_id`);

--
-- Indexes for table `p_medicine`
--
ALTER TABLE `p_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_prescription`
--
ALTER TABLE `p_prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_test`
--
ALTER TABLE `p_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_test_des`
--
ALTER TABLE `p_test_des`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment_request`
--
ALTER TABLE `appointment_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_admit`
--
ALTER TABLE `p_admit`
  MODIFY `admit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_medicine`
--
ALTER TABLE `p_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p_prescription`
--
ALTER TABLE `p_prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_test`
--
ALTER TABLE `p_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `p_test_des`
--
ALTER TABLE `p_test_des`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
