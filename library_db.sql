-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 08:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrative`
--

CREATE TABLE `administrative` (
  `id` int(11) NOT NULL,
  `administrative_title` varchar(255) NOT NULL,
  `administrative_project` varchar(255) NOT NULL,
  `administrative_pdf` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrative`
--

INSERT INTO `administrative` (`id`, `administrative_title`, `administrative_project`, `administrative_pdf`, `created_at`) VALUES
(2, '2025, Construction Statistics from Approved Building Permits', 'Approved Building Permits', '1745371009_Approve Building Permits Special Release.pdf', '2025-04-23 01:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(6, 'admin', '$2y$10$xlAP2Jpvs7c8beApwl2QBeYoPggQsH1EI3d3x5Rp1./edbYcWiP6S');

-- --------------------------------------------------------

--
-- Table structure for table `cif`
--

CREATE TABLE `cif` (
  `id` int(11) NOT NULL,
  `title_cif` varchar(255) NOT NULL,
  `pdf_cif` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cif`
--

INSERT INTO `cif` (`id`, `title_cif`, `pdf_cif`, `created_at`) VALUES
(2, 'Countryside in Figures 2022, City of Muntinlupa', '1744783138_Countryside in Figures 2022-City of Muntinlupa (1).pdf', '2025-04-16 05:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `civil_registration`
--

CREATE TABLE `civil_registration` (
  `id` int(11) NOT NULL,
  `civil_title` varchar(255) NOT NULL,
  `civil_pdf` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `civil_registration`
--

INSERT INTO `civil_registration` (`id`, `civil_title`, `civil_pdf`, `created_at`) VALUES
(1, '2016, CRVS HANDBOOK FOR HEALTH WORKERS (Second Edition)', '68084bb0c6939_CRVS HANDBOOK FOR HEALTH WORKERS (Second Edition).pdf', '2025-04-23 01:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `establishment`
--

CREATE TABLE `establishment` (
  `id` int(11) NOT NULL,
  `establishment_title` varchar(255) NOT NULL,
  `establishment_project` varchar(255) NOT NULL,
  `establishment_pdf` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `establishment`
--

INSERT INTO `establishment` (`id`, `establishment_title`, `establishment_project`, `establishment_pdf`, `created_at`) VALUES
(14, '2022 [Region 04-B] Provincial Product Accounts - MIMAROPA', 'Provincial Product Accounting (PPA)', '1745392600_2022 [Region 04-B] Provincial Product Accounts - MIMAROPA.pdf', '2025-04-23 07:16:41'),
(77, '2022 [Region 08] Provincial Product Accounts - Eastern Visayas', 'Provincial Product Accounting (PPA)', '2022 [Region 08] Provincial Product Accounts - Eastern Visayas.pdf', '2025-04-23 07:34:29'),
(78, '2022 [Region 05] Provincial Product Accounts - Bicol', 'Provincial Product Accounting (PPA)', '2022 [Region 05] Provincial Product Accounts - Bicol.pdf', '2025-04-23 07:34:29'),
(79, '2022 [Region 11] Provincial Product Accounts - Davao', 'Provincial Product Accounting (PPA)', '2022 [Region 11] Provincial Product Accounts - Davao.pdf', '2025-04-23 07:34:29'),
(80, '2022 [Region 03] Provincial Product Accounts - Central Luzon', 'Provincial Product Accounting (PPA)', '2022 [Region 03] Provincial Product Accounts - Central Luzon.pdf', '2025-04-23 07:34:29'),
(81, '2022 [Region 12] Provincial Product Accounts - SOCCSKSARGEN', 'Provincial Product Accounting (PPA)', '2022 [Region 12] Provincial Product Accounts - SOCCSKSARGEN.pdf', '2025-04-23 07:34:29'),
(82, '2022 [Region 13] Provincial Product Accounts - CARAGA', 'Provincial Product Accounting (PPA)', '2022 [Region 13] Provincial Product Accounts - CARAGA.pdf', '2025-04-23 07:34:29'),
(83, '2022 [Region 10] Provincial Product Accounts - Northern Mindanao', 'Provincial Product Accounting (PPA)', '2022 [Region 10] Provincial Product Accounts - Northern Mindanao.pdf', '2025-04-23 07:34:29'),
(84, '2022 CAR Provincial Product Accounts', 'Provincial Product Accounting (PPA)', '2022 CAR Provincial Product Accounts.pdf', '2025-04-23 07:34:29'),
(85, '2022 [Region 04-A] Provincial Product Accounts - CALABARZON', 'Provincial Product Accounting (PPA)', '2022 [Region 04-A] Provincial Product Accounts - CALABARZON.pdf', '2025-04-23 07:34:29'),
(86, '2022 [Region 01] Provincial Product Accounts - Ilocos', 'Provincial Product Accounting (PPA)', '2022 [Region 01] Provincial Product Accounts - Ilocos.pdf', '2025-04-23 07:34:29'),
(87, '2022 [Region 02] Provincial Product Accounts - Cagayan Valley', 'Provincial Product Accounting (PPA)', '2022 [Region 02] Provincial Product Accounts - Cagayan Valley.pdf', '2025-04-23 07:34:29'),
(88, '2022 BARMM Provincial Product Accounts', 'Provincial Product Accounting (PPA)', '2022 BARMM Provincial Product Accounts.pdf', '2025-04-23 07:34:29'),
(89, '2022 [Region 09] Provincial Product Accounts - Zamboanga Peninsula', 'Provincial Product Accounting (PPA)', '2022 [Region 09] Provincial Product Accounts - Zamboanga Peninsula.pdf', '2025-04-23 07:34:29'),
(90, '2022 [Region 07] Provincial Product Accounts - Central Visayas', 'Provincial Product Accounting (PPA)', '2022 [Region 07] Provincial Product Accounts - Central Visayas.pdf', '2025-04-23 07:34:29'),
(91, '2023 [Region 11] PPA Davao', 'Provincial Product Accounting (PPA)', '2023 [Region 11] PPA Davao.pdf', '2025-04-23 07:34:29'),
(92, '2023 [Region 03] PPA Central Luzon', 'Provincial Product Accounting (PPA)', '2023 [Region 03] PPA Central Luzon.pdf', '2025-04-23 07:34:29'),
(93, '2023 [Region 09] PPA Zamboanga Peninsula', 'Provincial Product Accounting (PPA)', '2023 [Region 09] PPA Zamboanga Peninsula.pdf', '2025-04-23 07:34:29'),
(94, '2023 [Region 02] PPA Cagayan Valley', 'Provincial Product Accounting (PPA)', '2023 [Region 02] PPA Cagayan Valley.pdf', '2025-04-23 07:34:29'),
(95, '2023 [Region 10] PPA Northern Mindanao', 'Provincial Product Accounting (PPA)', '2023 [Region 10] PPA Northern Mindanao.pdf', '2025-04-23 07:34:29'),
(96, '2023 [Region 01] PPA Ilocos', 'Provincial Product Accounting (PPA)', '2023 [Region 01] PPA Ilocos.pdf', '2025-04-23 07:34:29'),
(97, '2023 [Region 08] PPA Eastern Visayas', 'Provincial Product Accounting (PPA)', '2023 [Region 08] PPA Eastern Visayas.pdf', '2025-04-23 07:34:29'),
(98, '2023 MIMAROPA PPA', 'Provincial Product Accounting (PPA)', '2023 MIMAROPA PPA.pdf', '2025-04-23 07:34:29'),
(99, '2023 [Region 07] PPA Central Visayas', 'Provincial Product Accounting (PPA)', '2023 [Region 07] PPA Central Visayas.pdf', '2025-04-23 07:34:29'),
(100, '2023 BARMM PPA', 'Provincial Product Accounting (PPA)', '2023 BARMM PPA.pdf', '2025-04-23 07:34:29'),
(101, '2023 [Region 06] PPA Western Visayas', 'Provincial Product Accounting (PPA)', '2023 [Region 06] PPA Western Visayas.pdf', '2025-04-23 07:34:29'),
(102, '2023 CAR PPA', 'Provincial Product Accounting (PPA)', '2023 CAR PPA.pdf', '2025-04-23 07:34:29'),
(103, '2023 [Region 13] PPA CARAGA', 'Provincial Product Accounting (PPA)', '2023 [Region 13] PPA CARAGA.pdf', '2025-04-23 07:34:29'),
(104, '2023 [Region 04-A] PPA CALABARZON', 'Provincial Product Accounting (PPA)', '2023 [Region 04-A] PPA CALABARZON.pdf', '2025-04-23 07:34:29'),
(105, '2023 NCR PPA', 'Provincial Product Accounting (PPA)', '2023 NCR PPA.pdf', '2025-04-23 07:34:29'),
(106, '2023 [Region 12] PPA SOCCSKSARGEN', 'Provincial Product Accounting (PPA)', '2023 [Region 12] PPA SOCCSKSARGEN.pdf', '2025-04-23 07:34:29'),
(107, '2023 [Region 05] PPA Bicol', 'Provincial Product Accounting (PPA)', '2023 [Region 05] PPA Bicol.pdf', '2025-04-23 07:34:29'),
(108, '2000 CPBI - AGRICULTURE AND FORESTRY', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - AGRICULTURE AND FORESTRY.pdf', '2025-04-25 05:24:05'),
(109, '2000 CPBI - FISHING', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - FISHING.pdf', '2025-04-25 05:24:05'),
(110, '2006 CPBI - AGRICULTURE, FORESTRY, AND FISHING VOL 1', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - AGRICULTURE, FORESTRY, AND FISHING VOL 1.pdf', '2025-04-25 05:24:05'),
(111, '2006 CPBI - AGRICULTURE, FORESTRY, AND FISHING VOL 2', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - AGRICULTURE, FORESTRY, AND FISHING VOL 2.pdf', '2025-04-25 05:24:05'),
(112, '2018 CPBI - AGRICULTURE, FORESTRY, AND FISHING', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - AGRICULTURE, FORESTRY, AND FISHING.pdf', '2025-04-25 05:24:05'),
(113, '2000 CPBI - MINING AND QUARRYING', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - MINING AND QUARRYING.pdf', '2025-04-25 05:25:32'),
(114, '2006 CPBI - MINING AND QUARRYING', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - MINING AND QUARRYING.pdf', '2025-04-25 05:25:32'),
(115, '2018 CPBI - MINING AND QUARRYING', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - MINING AND QUARRYING.pdf', '2025-04-25 05:25:32'),
(116, '2000 CPBI - MANUFACTURING', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - MANUFACTURING.pdf', '2025-04-25 05:27:48'),
(117, '2000 CPBI - MANUFACTURING VOL 4', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - MANUFACTURING VOL 4.pdf', '2025-04-25 05:27:48'),
(118, '2006 CPBI - MANUFACTURING VOL 4A', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - MANUFACTURING VOL 4A.pdf', '2025-04-25 05:27:48'),
(119, '2006 CPBI - MANUFACTURING VOL 4B', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - MANUFACTURING VOL 4B.pdf', '2025-04-25 05:27:48'),
(120, '2006 CPBI - MANUFACTURING VOL 4C', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - MANUFACTURING VOL 4C.pdf', '2025-04-25 05:27:48'),
(121, '2012 CPBI - MANUFACTURING VOL 3A', 'Census of Philippine Business and Industry (CPBI)', '2012 CPBI - MANUFACTURING VOL 3A.pdf', '2025-04-25 05:27:48'),
(122, '2018 CPBI - MANUFACTURING VOL 3', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - MANUFACTURING VOL 3.pdf', '2025-04-25 05:27:48'),
(123, '2000 CPBI - CONSTRUCTION', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - CONSTRUCTION.pdf', '2025-04-25 05:35:54'),
(124, '2006 CPBI - CONSTRUCTION', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - CONSTRUCTION.pdf', '2025-04-25 05:35:54'),
(125, '2018 CPBI - CONSTRUCTION', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - CONSTRUCTION.pdf', '2025-04-25 05:35:54'),
(126, '2000 CPBI - ELECTRICITY, GAS AND WATER SUPPLY', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - ELECTRICITY, GAS AND WATER SUPPLY.pdf', '2025-04-25 05:38:52'),
(127, '2006 CPBI - ELECTRICITY, GAS AND WATER SUPPLY', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - ELECTRICITY, GAS AND WATER SUPPLY.pdf', '2025-04-25 05:38:52'),
(128, '2018 CPBI - ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY.pdf', '2025-04-25 05:38:52'),
(129, '2000 CPBI - WHOLE SALE AND RETAIL TRADE', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - WHOLE SALE AND RETAIL TRADE.pdf', '2025-04-25 05:43:46'),
(130, '2006 CPBI - WHOLE SALE AND RETAIL TRADE', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - WHOLE SALE AND RETAIL TRADE.pdf', '2025-04-25 05:43:46'),
(131, '2018 CPBI - WHOLE SALE AND RETAIL TRADE', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - WHOLE SALE AND RETAIL TRADE.pdf', '2025-04-25 05:43:46'),
(132, '2000 CPBI - TRANSPORT AND STORAGE', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - TRANSPORT AND STORAGE.pdf', '2025-04-25 05:46:44'),
(133, '2006 CPBI - TRANSPORT AND STORAGE', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - TRANSPORT AND STORAGE.pdf', '2025-04-25 05:46:44'),
(134, '2018 CPBI - TRANSPORT AND STORAGE', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - TRANSPORT AND STORAGE.pdf', '2025-04-25 05:46:44'),
(135, '2000 CPBI - HOTELS AND RESTAURANTS', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - HOTELS AND RESTAURANTS.pdf', '2025-04-25 05:48:35'),
(136, '2006 CPBI - HOTELS AND RESTAURANTS', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - HOTELS AND RESTAURANTS.pdf', '2025-04-25 05:48:35'),
(137, '2012 CPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2012 CPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 05:55:26'),
(138, '2000 CPBI - REAL ESTATE, RENTING, AND BUSINESS ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - REAL ESTATE, RENTING, AND BUSINESS ACTIVITIES.pdf', '2025-04-25 05:59:54'),
(139, '2006 CPBI - REAL ESTATE, RENTING, AND BUSINESS ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - REAL ESTATE, RENTING, AND BUSINESS ACTIVITIES.pdf', '2025-04-25 05:59:54'),
(140, '2012 CPBI - REAL ESTATE, RENTING, AND BUSINESS ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2012 CPBI - REAL ESTATE, RENTING, AND BUSINESS ACTIVITIES.pdf', '2025-04-25 05:59:54'),
(141, '2000 CPBI - PRIVATE EDUCATION', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - PRIVATE EDUCATION.pdf', '2025-04-25 06:03:05'),
(142, '2006 CPBI - PRIVATE EDUCATION', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - PRIVATE EDUCATION.pdf', '2025-04-25 06:03:05'),
(143, '2012 CPBI - PRIVATE EDUCATION', 'Census of Philippine Business and Industry (CPBI)', '2012 CPBI - PRIVATE EDUCATION.pdf', '2025-04-25 06:03:05'),
(144, '2000 CPBI - HEALTH AND SOCIAL WORK', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - HEALTH AND SOCIAL WORK.pdf', '2025-04-25 06:03:05'),
(145, '2006 CPBI - HEALTH AND SOCIAL WORK', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - HEALTH AND SOCIAL WORK.pdf', '2025-04-25 06:03:05'),
(146, '2012 CPBI - HEALTH AND SOCIAL WORK', 'Census of Philippine Business and Industry (CPBI)', '2012 CPBI - HEALTH AND SOCIAL WORK.pdf', '2025-04-25 06:03:05'),
(147, '2000 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2000 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES.pdf', '2025-04-25 06:03:05'),
(148, '2006 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2006 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES.pdf', '2025-04-25 06:03:05'),
(149, '2012 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2012 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES.pdf', '2025-04-25 06:03:05'),
(150, '2018 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES', 'Census of Philippine Business and Industry (CPBI)', '2018 CPBI - OTHER COMMUNITY, SOCIAL, AND PERSONAL SERVICE ACTIVITIES.pdf', '2025-04-25 06:03:05'),
(151, '2003 ASPBI AGRICULTURE, FORESTRY, AND FISHING VOL 1', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI AGRICULTURE, FORESTRY, AND FISHING VOL 1.pdf', '2025-04-25 06:31:29'),
(152, '2003 ASPBI FISHING VOL 2', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI FISHING VOL 2.pdf', '2025-04-25 06:31:29'),
(153, '2008 ASPBI AGRICULTURE, FORESTRY, AND FISHING VOL 1', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI AGRICULTURE, FORESTRY, AND FISHING VOL 1.pdf', '2025-04-25 06:31:29'),
(154, '2008 ASPBI FISHING VOL 2', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI FISHING VOL 2.pdf', '2025-04-25 06:31:29'),
(155, '2009 ASPBI AGRICULTURE, HUNTING, AND FORESTRY', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI AGRICULTURE, HUNTING, AND FORESTRY.pdf', '2025-04-25 06:31:29'),
(156, '2009 ASPBI FISHING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI FISHING.pdf', '2025-04-25 06:31:29'),
(157, '2010 ASPBI AGRICULTURE, FORESTRY, AND FISHING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI AGRICULTURE, FORESTRY, AND FISHING.pdf', '2025-04-25 06:31:29'),
(158, '2013 ASPBI AGRICULTURE, FORESTRY, AND FISHING VOL 1', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI AGRICULTURE, FORESTRY, AND FISHING VOL 1.pdf', '2025-04-25 06:31:29'),
(159, '2019 ASPBI AGRICULTURE, FORESTRY, AND FISHING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI AGRICULTURE, FORESTRY, AND FISHING.pdf', '2025-04-25 06:31:29'),
(160, '2020 ASPBI AGRICULTURE, FORESTRY, AND FISHING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2020 ASPBI AGRICULTURE, FORESTRY, AND FISHING.pdf', '2025-04-25 06:31:29'),
(161, '2003 ASPBI MINING AND QUARRYING VOL 3', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI MINING AND QUARRYING VOL 3.pdf', '2025-04-25 06:35:56'),
(162, '2008 ASPBI MINING AND QUARRYING VOL 3', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI MINING AND QUARRYING VOL 3.pdf', '2025-04-25 06:35:56'),
(163, '2009 ASPBI MINING AND QUARRYING VOL 3', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI MINING AND QUARRYING VOL 3.pdf', '2025-04-25 06:35:56'),
(164, '2010 ASPBI MINING AND QUARRYING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI MINING AND QUARRYING.pdf', '2025-04-25 06:35:56'),
(165, '2013 ASPBI MINING AND QUARRYING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI MINING AND QUARRYING.pdf', '2025-04-25 06:35:56'),
(166, '2015 ASPBI MINING AND QUARRYING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI MINING AND QUARRYING.pdf', '2025-04-25 06:35:56'),
(167, '2019 ASPBI MINING AND QUARRYING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI MINING AND QUARRYING.pdf', '2025-04-25 06:35:56'),
(168, '2002 ASPBI MANUFACTURING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2002 ASPBI MANUFACTURING.pdf', '2025-04-25 06:57:08'),
(169, '2003 ASPBI MANUFACTURING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI MANUFACTURING.pdf', '2025-04-25 06:57:08'),
(170, '2008 ASPBI MANUFACTURING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI MANUFACTURING.pdf', '2025-04-25 06:57:08'),
(171, '2009 ASPBI MANUFACTURING VOL 4A', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI MANUFACTURING VOL 4A.pdf', '2025-04-25 06:57:08'),
(172, '2009 ASPBI MANUFACTURING VOL 4B', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI MANUFACTURING VOL 4B.pdf', '2025-04-25 06:57:08'),
(173, '2019 ASPBI MANUFACTURING', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI MANUFACTURING.pdf', '2025-04-25 06:57:08'),
(174, '2003 ASPBI CONSTRUCTION VOL 6', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI CONSTRUCTION VOL 6.pdf', '2025-04-25 07:00:06'),
(175, '2008 ASPBI CONSTRUCTION VOL 6', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI CONSTRUCTION VOL 6.pdf', '2025-04-25 07:00:06'),
(176, '2009 ASPBI CONSTRUCTION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI CONSTRUCTION.pdf', '2025-04-25 07:00:06'),
(177, '2010 ASPBI CONSTRUCTION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI CONSTRUCTION.pdf', '2025-04-25 07:00:06'),
(178, '2013 ASPBI CONSTRUCTION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI CONSTRUCTION.pdf', '2025-04-25 07:00:06'),
(179, '2015 ASPBI CONSTRUCTION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI CONSTRUCTION.pdf', '2025-04-25 07:00:06'),
(180, '2019 ASPBI CONSTRUCTION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI CONSTRUCTION.pdf', '2025-04-25 07:00:06'),
(181, '2003 ASPBI ELECTRICITY, GAS, STEAM, AND WATER VOL 5', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI ELECTRICITY, GAS, STEAM, AND WATER VOL 5.pdf', '2025-04-25 07:04:58'),
(182, '2008 ASPBI ELECTRICITY, GAS, STEAM, AND WATER VOL 5', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI ELECTRICITY, GAS, STEAM, AND WATER VOL 5.pdf', '2025-04-25 07:04:58'),
(183, '2009 ASPBI ELECTRICITY, GAS, STEAM, AND WATER VOL 5', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI ELECTRICITY, GAS, STEAM, AND WATER VOL 5.pdf', '2025-04-25 07:04:58'),
(184, '2010 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY.pdf', '2025-04-25 07:04:58'),
(185, '2013 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY.pdf', '2025-04-25 07:04:58'),
(186, '2015 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY.pdf', '2025-04-25 07:04:58'),
(187, '2019 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI ELECTRICITY, GAS, STEAM, AND AIR CONDITIONING SUPPLY.pdf', '2025-04-25 07:04:58'),
(188, '2002 ASPBI VOLUME 7 - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2002 ASPBI VOLUME 7 - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(189, '2003 ASPBI VOLUME 7 - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI VOLUME 7 - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(190, '2005 ASPBI VOLUME 7 - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2005 ASPBI VOLUME 7 - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(191, '2009 ASPBI - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(192, '2010 ASPBI - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(193, '2013 ASPBI VOLUME 8 - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI VOLUME 8 - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(194, '2015 ASPBI - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(195, '2016 ASPBI - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2016 ASPBI - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(196, '2017 ASPBI - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2017 ASPBI - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(197, '2019 ASPBI - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(198, '2020 ASPBI - WHOLESALE AND RETAIL TRADE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2020 ASPBI - WHOLESALE AND RETAIL TRADE.pdf', '2025-04-25 07:05:47'),
(199, '2010 ASPBI - TRANSPORTATION AND STORAGE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI - TRANSPORTATION AND STORAGE.pdf', '2025-04-25 07:06:20'),
(200, '2013 ASPBI - TRANSPORTATION AND STORAGE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI - TRANSPORTATION AND STORAGE.pdf', '2025-04-25 07:06:20'),
(201, '2015 ASPBI - TRANSPORTATION AND STORAGE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI - TRANSPORTATION AND STORAGE.pdf', '2025-04-25 07:06:20'),
(202, '2017 ASPBI - TRANSPORTATION AND STORAGE', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2017 ASPBI - TRANSPORTATION AND STORAGE.pdf', '2025-04-25 07:06:20'),
(203, '2002 ASPBI - HOTELS AND RESTAURANTS', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2002 ASPBI - HOTELS AND RESTAURANTS.pdf', '2025-04-25 07:06:56'),
(204, '2003 ASPBI - HOTELS AND RESTAURANTS', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI - HOTELS AND RESTAURANTS.pdf', '2025-04-25 07:06:56'),
(205, '2005 ASPBI - HOTELS AND RESTAURANTS', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2005 ASPBI - HOTELS AND RESTAURANTS.pdf', '2025-04-25 07:06:56'),
(206, '2008 ASPBI - HOTELS AND RESTAURANTS', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI - HOTELS AND RESTAURANTS.pdf', '2025-04-25 07:06:56'),
(207, '2009 ASPBI - HOTELS AND RESTAURANTS', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI - HOTELS AND RESTAURANTS.pdf', '2025-04-25 07:06:56'),
(208, '2009 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(209, '2010 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(210, '2013 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(211, '2015 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(212, '2017 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2017 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(213, '2019 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(214, '2020 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2020 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(215, '2021 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2021 ASPBI - FINANCIAL AND INSURANCE ACTIVITIES.pdf', '2025-04-25 07:07:30'),
(225, '2002 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2002 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(226, '2003 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2003 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(227, '2005 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2005 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(228, '2008 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(229, '2009 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(230, '2010 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(231, '2013 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(232, '2015 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(233, '2016 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2016 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(234, '2017 ASPBI - REAL ESTATE AND RENTING ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2017 ASPBI - REAL ESTATE AND RENTING ACTIVITIES.pdf', '2025-04-25 07:11:24'),
(235, '2002 ASPBI - EDUCATION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2002 ASPBI - EDUCATION.pdf', '2025-04-25 07:12:00'),
(236, '2008 ASPBI - EDUCATION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2008 ASPBI - EDUCATION.pdf', '2025-04-25 07:12:00'),
(237, '2009 ASPBI - EDUCATION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI - EDUCATION.pdf', '2025-04-25 07:12:00'),
(238, '2010 ASPBI - EDUCATION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI - EDUCATION.pdf', '2025-04-25 07:12:00'),
(239, '2013 ASPBI - EDUCATION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI - EDUCATION.pdf', '2025-04-25 07:12:00'),
(240, '2015 ASPBI - EDUCATION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI - EDUCATION.pdf', '2025-04-25 07:12:00'),
(241, '2016 ASPBI - EDUCATION', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2016 ASPBI - EDUCATION.pdf', '2025-04-25 07:12:00'),
(242, '2009 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(243, '2010 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(244, '2013 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(245, '2015 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(246, '2016 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2016 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(247, '2017 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2017 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(248, '2019 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(249, '2020 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2020 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(250, '2021 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2021 ASPBI - HUMAN HEALTH AND SOCIAL WORKS ACTIVITIES.pdf', '2025-04-25 07:12:31'),
(251, '2009 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2009 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(252, '2010 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2010 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(253, '2013 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2013 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(254, '2015 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2015 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(255, '2016 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2016 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(256, '2017 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2017 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(257, '2019 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2019 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(258, '2020 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2020 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05'),
(259, '2021 ASPBI - OTHER SERVICE ACTIVITIES', 'Annual Survey of Philippine Business and Industry (ASPBI)', '2021 ASPBI - OTHER SERVICE ACTIVITIES.pdf', '2025-04-25 07:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `id` int(11) NOT NULL,
  `household_title` varchar(255) NOT NULL,
  `household_project` varchar(255) NOT NULL,
  `household_pdf` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`id`, `household_title`, `household_project`, `household_pdf`, `timestamp`) VALUES
(25, '1961 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '1961 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(26, '1965 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '1965 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(27, '1971 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '1971 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(28, '1977 FAMILY INCOME AND EXPENDITURE SURVEY VOL 2', 'Family Income and Expenditure Survey (FIES)', '1977 FAMILY INCOME AND EXPENDITURE SURVEY VOL 2.pdf', '2025-04-24 01:48:20'),
(29, '1977 FAMILY INCOME AND EXPENDITURE SURVEY VOL 3', 'Family Income and Expenditure Survey (FIES)', '1977 FAMILY INCOME AND EXPENDITURE SURVEY VOL 3.pdf', '2025-04-24 01:48:20'),
(30, '1985 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1', 'Family Income and Expenditure Survey (FIES)', '1985 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1.pdf', '2025-04-24 01:48:20'),
(31, '1985 FAMILY INCOME AND EXPENDITURE SURVEY ISHB', 'Family Income and Expenditure Survey (FIES)', '1985 FAMILY INCOME AND EXPENDITURE SURVEY ISHB.pdf', '2025-04-24 01:48:20'),
(32, '1985 FAMILY INCOME AND EXPENDITURE SURVEY VOL 3', 'Family Income and Expenditure Survey (FIES)', '1985 FAMILY INCOME AND EXPENDITURE SURVEY VOL 3.pdf', '2025-04-24 01:48:20'),
(33, '1985 FAMILY INCOME AND EXPENDITURE SURVEY VOL 4', 'Family Income and Expenditure Survey (FIES)', '1985 FAMILY INCOME AND EXPENDITURE SURVEY VOL 4.pdf', '2025-04-24 01:48:20'),
(34, '1985 FAMILY INCOME AND EXPENDITURE SURVEY SP ON HOUSING', 'Family Income and Expenditure Survey (FIES)', '1985 FAMILY INCOME AND EXPENDITURE SURVEY SP ON HOUSING.pdf', '2025-04-24 01:48:20'),
(35, '1988 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1 NATIONAL SUMMARY', 'Family Income and Expenditure Survey (FIES)', '1988 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1 NATIONAL SUMMARY.pdf', '2025-04-24 01:48:20'),
(36, '1988 FAMILY INCOME AND EXPENDITURE SURVEY VOL 2', 'Family Income and Expenditure Survey (FIES)', '1988 FAMILY INCOME AND EXPENDITURE SURVEY VOL 2.pdf', '2025-04-24 01:48:20'),
(37, '1991-1994 FAMILY INCOME AND EXPENDITURE SURVEY VOL 5', 'Family Income and Expenditure Survey (FIES)', '1991-1994 FAMILY INCOME AND EXPENDITURE SURVEY VOL 5.pdf', '2025-04-24 01:48:20'),
(38, '1997 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1 NATIONAL SUMMARY', 'Family Income and Expenditure Survey (FIES)', '1997 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1 NATIONAL SUMMARY.pdf', '2025-04-24 01:48:20'),
(39, '2000 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1 NATIONAL SUMMARY', 'Family Income and Expenditure Survey (FIES)', '2000 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1 NATIONAL SUMMARY.pdf', '2025-04-24 01:48:20'),
(40, '2000 FAMILY INCOME AND EXPENDITURE SURVEY VOL 2 PROVINCIAL KEY CITY', 'Family Income and Expenditure Survey (FIES)', '2000 FAMILY INCOME AND EXPENDITURE SURVEY VOL 2 PROVINCIAL KEY CITY.pdf', '2025-04-24 01:48:20'),
(41, '2003 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1', 'Family Income and Expenditure Survey (FIES)', '2003 FAMILY INCOME AND EXPENDITURE SURVEY VOL 1.pdf', '2025-04-24 01:48:20'),
(42, '2006 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '2006 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(43, '2009 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '2009 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(44, '2012 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '2012 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(45, '2015 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '2015 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(46, '2018 FAMILY INCOME AND EXPENDITURE SURVEY', 'Family Income and Expenditure Survey (FIES)', '2018 FAMILY INCOME AND EXPENDITURE SURVEY.pdf', '2025-04-24 01:48:20'),
(47, '1988 HOUSEHOLD ENERGY CONSUMPTION SURVEY', 'Household Energy Consumption Survey (HECS)', '1988 HOUSEHOLD ENERGY CONSUMPTION SURVEY.pdf', '2025-04-24 01:52:39'),
(48, '1995 HOUSEHOLD ENERGY CONSUMPTION SURVEY', 'Household Energy Consumption Survey (HECS)', '1995 HOUSEHOLD ENERGY CONSUMPTION SURVEY.pdf', '2025-04-24 01:52:39'),
(49, '2004 HOUSEHOLD ENERGY CONSUMPTION SURVEY', 'Household Energy Consumption Survey (HECS)', '2004 HOUSEHOLD ENERGY CONSUMPTION SURVEY.pdf', '2025-04-24 01:52:39'),
(50, '2011 HOUSEHOLD ENERGY CONSUMPTION SURVEY', 'Household Energy Consumption Survey (HECS)', '2011 HOUSEHOLD ENERGY CONSUMPTION SURVEY.pdf', '2025-04-24 01:52:39'),
(51, '2005 HOUSEHOLD SURVEY ON DOMESTIC VISITORS', 'Household Survey on Domestic Visitors (HSDV)', '2005 HOUSEHOLD SURVEY ON DOMESTIC VISITORS.pdf', '2025-04-24 01:55:37'),
(52, '2016 HOUSEHOLD SURVEY ON DOMESTIC VISITORS', 'Household Survey on Domestic Visitors (HSDV)', '2016 HOUSEHOLD SURVEY ON DOMESTIC VISITORS.pdf', '2025-04-24 01:55:37'),
(53, '2018 NATIONAL MIGRATION SURVEY', 'National Migration Survey (NMS)', '1745460071_2018 NATIONAL MIGRATION SURVEY.pdf', '2025-04-24 02:01:11'),
(54, '1993 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY', 'National Demographic and Health Survey (NDHS)', '1993 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY.pdf', '2025-04-24 02:05:36'),
(55, '1998 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY', 'National Demographic and Health Survey (NDHS)', '1998 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY.pdf', '2025-04-24 02:05:36'),
(56, '2003 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY', 'National Demographic and Health Survey (NDHS)', '2003 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY.pdf', '2025-04-24 02:05:36'),
(57, '2008 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY KEY FINDINGS', 'National Demographic and Health Survey (NDHS)', '2008 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY KEY FINDINGS.pdf', '2025-04-24 02:05:36'),
(58, '2008 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY', 'National Demographic and Health Survey (NDHS)', '2008 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY.pdf', '2025-04-24 02:05:36'),
(59, '2013 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY', 'National Demographic and Health Survey (NDHS)', '2013 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY.pdf', '2025-04-24 02:05:36'),
(60, '2017 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY', 'National Demographic and Health Survey (NDHS)', '2017 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY.pdf', '2025-04-24 02:05:36'),
(61, '2017 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY KIR', 'National Demographic and Health Survey (NDHS)', '2017 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY KIR.pdf', '2025-04-24 02:05:36'),
(62, '2022 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY', 'National Demographic and Health Survey (NDHS)', '2022 NATIONAL DEMOGRAPHIC AND HEALTH SURVEY.pdf', '2025-04-24 02:05:36'),
(63, '1981-1982 LABOR FORCE SURVEY NO. 51', 'Labor Force Survey (LFS)', '1981-1982 LABOR FORCE SURVEY NO. 51.pdf', '2025-04-24 03:01:12'),
(64, '1983 LABOR FORCE SURVEY NO. 52', 'Labor Force Survey (LFS)', '1983 LABOR FORCE SURVEY NO. 52.pdf', '2025-04-24 03:01:12'),
(65, '1983 LABOR FORCE SURVEY NO. 53', 'Labor Force Survey (LFS)', '1983 LABOR FORCE SURVEY NO. 53.pdf', '2025-04-24 03:01:12'),
(66, '1984 LABOR FORCE SURVEY NO. 54', 'Labor Force Survey (LFS)', '1984 LABOR FORCE SURVEY NO. 54.pdf', '2025-04-24 03:01:12'),
(67, '1985 LABOR FORCE SURVEY NO. 55', 'Labor Force Survey (LFS)', '1985 LABOR FORCE SURVEY NO. 55.pdf', '2025-04-24 03:01:12'),
(68, '1986 LABOR FORCE SURVEY NO. 56', 'Labor Force Survey (LFS)', '1986 LABOR FORCE SURVEY NO. 56.pdf', '2025-04-24 03:01:12'),
(69, '1987 LABOR FORCE SURVEY NO. 58', 'Labor Force Survey (LFS)', '1987 LABOR FORCE SURVEY NO. 58.pdf', '2025-04-24 03:01:12'),
(70, '1987 LABOR FORCE SURVEY NO. 59', 'Labor Force Survey (LFS)', '1987 LABOR FORCE SURVEY NO. 59.pdf', '2025-04-24 03:01:12'),
(71, '1988 LABOR FORCE SURVEY NO. 60', 'Labor Force Survey (LFS)', '1988 LABOR FORCE SURVEY NO. 60.pdf', '2025-04-24 03:01:12'),
(72, '1989 LABOR FORCE SURVEY NO. 62', 'Labor Force Survey (LFS)', '1989 LABOR FORCE SURVEY NO. 62.pdf', '2025-04-24 03:01:12'),
(73, '1990 LABOR FORCE SURVEY NO. 63', 'Labor Force Survey (LFS)', '1990 LABOR FORCE SURVEY NO. 63.pdf', '2025-04-24 03:01:12'),
(74, '1991 LABOR FORCE SURVEY NO. 64 - JANUARY', 'Labor Force Survey (LFS)', '1991 LABOR FORCE SURVEY NO. 64 - JANUARY.pdf', '2025-04-24 03:01:12'),
(75, '1991 LABOR FORCE SURVEY NO. 65 - APRIL', 'Labor Force Survey (LFS)', '1991 LABOR FORCE SURVEY NO. 65 - APRIL.pdf', '2025-04-24 03:01:12'),
(76, '1991 LABOR FORCE SURVEY NO. 66 - JULY', 'Labor Force Survey (LFS)', '1991 LABOR FORCE SURVEY NO. 66 - JULY.pdf', '2025-04-24 03:01:12'),
(77, '1991 LABOR FORCE SURVEY NO. 67 - OCTOBER', 'Labor Force Survey (LFS)', '1991 LABOR FORCE SURVEY NO. 67 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(78, '1992 LABOR FORCE SURVEY NO. 68 - JANUARY', 'Labor Force Survey (LFS)', '1992 LABOR FORCE SURVEY NO. 68 - JANUARY.pdf', '2025-04-24 03:01:12'),
(79, '1992 LABOR FORCE SURVEY NO. 69 - APRIL', 'Labor Force Survey (LFS)', '1992 LABOR FORCE SURVEY NO. 69 - APRIL.pdf', '2025-04-24 03:01:12'),
(80, '1992 LABOR FORCE SURVEY NO. 70 - JULY', 'Labor Force Survey (LFS)', '1992 LABOR FORCE SURVEY NO. 70 - JULY.pdf', '2025-04-24 03:01:12'),
(81, '1992 LABOR FORCE SURVEY NO. 71 - OCTOBER', 'Labor Force Survey (LFS)', '1992 LABOR FORCE SURVEY NO. 71 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(82, '1993 LABOR FORCE SURVEY NO. 73 - JANUARY', 'Labor Force Survey (LFS)', '1993 LABOR FORCE SURVEY NO. 73 - JANUARY.pdf', '2025-04-24 03:01:12'),
(83, '1993 LABOR FORCE SURVEY NO. 74 - APRIL', 'Labor Force Survey (LFS)', '1993 LABOR FORCE SURVEY NO. 74 - APRIL.pdf', '2025-04-24 03:01:12'),
(84, '1993 LABOR FORCE SURVEY NO. 75 - JULY', 'Labor Force Survey (LFS)', '1993 LABOR FORCE SURVEY NO. 75 - JULY.pdf', '2025-04-24 03:01:12'),
(85, '1993 LABOR FORCE SURVEY NO. 76 - OCTOBER', 'Labor Force Survey (LFS)', '1993 LABOR FORCE SURVEY NO. 76 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(86, '1994 LABOR FORCE SURVEY NO. 77 - JANUARY', 'Labor Force Survey (LFS)', '1994 LABOR FORCE SURVEY NO. 77 - JANUARY.pdf', '2025-04-24 03:01:12'),
(87, '1994 LABOR FORCE SURVEY NO. 78 - APRIL', 'Labor Force Survey (LFS)', '1994 LABOR FORCE SURVEY NO. 78 - APRIL.pdf', '2025-04-24 03:01:12'),
(88, '1994 LABOR FORCE SURVEY NO. 79 - JULY', 'Labor Force Survey (LFS)', '1994 LABOR FORCE SURVEY NO. 79 - JULY.pdf', '2025-04-24 03:01:12'),
(89, '1994 LABOR FORCE SURVEY NO. 80 - OCTOBER', 'Labor Force Survey (LFS)', '1994 LABOR FORCE SURVEY NO. 80 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(90, '1995 LABOR FORCE SURVEY NO. 81 - JANUARY', 'Labor Force Survey (LFS)', '1995 LABOR FORCE SURVEY NO. 81 - JANUARY.pdf', '2025-04-24 03:01:12'),
(91, '1995 LABOR FORCE SURVEY NO. 82 - APRIL', 'Labor Force Survey (LFS)', '1995 LABOR FORCE SURVEY NO. 82 - APRIL.pdf', '2025-04-24 03:01:12'),
(92, '1995 LABOR FORCE SURVEY NO. 83 - JULY', 'Labor Force Survey (LFS)', '1995 LABOR FORCE SURVEY NO. 83 - JULY.pdf', '2025-04-24 03:01:12'),
(93, '1995 LABOR FORCE SURVEY NO. 84 - OCTOBER', 'Labor Force Survey (LFS)', '1995 LABOR FORCE SURVEY NO. 84 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(94, '1996 LABOR FORCE SURVEY NO. 85 - JANUARY', 'Labor Force Survey (LFS)', '1996 LABOR FORCE SURVEY NO. 85 - JANUARY.pdf', '2025-04-24 03:01:12'),
(95, '1996 LABOR FORCE SURVEY NO. 86 - APRIL', 'Labor Force Survey (LFS)', '1996 LABOR FORCE SURVEY NO. 86 - APRIL.pdf', '2025-04-24 03:01:12'),
(96, '1996 LABOR FORCE SURVEY NO. 88 - OCTOBER', 'Labor Force Survey (LFS)', '1996 LABOR FORCE SURVEY NO. 88 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(97, '1997 LABOR FORCE SURVEY NO. 89 - JANUARY', 'Labor Force Survey (LFS)', '1997 LABOR FORCE SURVEY NO. 89 - JANUARY.pdf', '2025-04-24 03:01:12'),
(98, '1997 LABOR FORCE SURVEY NO. 90 - APRIL', 'Labor Force Survey (LFS)', '1997 LABOR FORCE SURVEY NO. 90 - APRIL.pdf', '2025-04-24 03:01:12'),
(99, '1997 LABOR FORCE SURVEY NO. 91 - JULY', 'Labor Force Survey (LFS)', '1997 LABOR FORCE SURVEY NO. 91 - JULY.pdf', '2025-04-24 03:01:12'),
(100, '1997 LABOR FORCE SURVEY NO. 92 - OCTOBER', 'Labor Force Survey (LFS)', '1997 LABOR FORCE SURVEY NO. 92 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(101, '1998 LABOR FORCE SURVEY NO. 93 - JANUARY', 'Labor Force Survey (LFS)', '1998 LABOR FORCE SURVEY NO. 93 - JANUARY.pdf', '2025-04-24 03:01:12'),
(102, '1998 LABOR FORCE SURVEY NO. 94 - APRIL', 'Labor Force Survey (LFS)', '1998 LABOR FORCE SURVEY NO. 94 - APRIL.pdf', '2025-04-24 03:01:12'),
(103, '1998 LABOR FORCE SURVEY NO. 95 - JULY', 'Labor Force Survey (LFS)', '1998 LABOR FORCE SURVEY NO. 95 - JULY.pdf', '2025-04-24 03:01:12'),
(104, '1998 LABOR FORCE SURVEY NO. 96 - OCTOBER', 'Labor Force Survey (LFS)', '1998 LABOR FORCE SURVEY NO. 96 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(105, '1999 LABOR FORCE SURVEY NO. 97 - JANUARY', 'Labor Force Survey (LFS)', '1999 LABOR FORCE SURVEY NO. 97 - JANUARY.pdf', '2025-04-24 03:01:12'),
(106, '1999 LABOR FORCE SURVEY NO. 100 - JULY', 'Labor Force Survey (LFS)', '1999 LABOR FORCE SURVEY NO. 100 - JULY.pdf', '2025-04-24 03:01:12'),
(107, '1999 LABOR FORCE SURVEY NO. 101 - OCTOBER', 'Labor Force Survey (LFS)', '1999 LABOR FORCE SURVEY NO. 101 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(108, '2000 LABOR FORCE SURVEY NO. 102 - JANUARY', 'Labor Force Survey (LFS)', '2000 LABOR FORCE SURVEY NO. 102 - JANUARY.pdf', '2025-04-24 03:01:12'),
(109, '2000 LABOR FORCE SURVEY NO. 103 - APRIL', 'Labor Force Survey (LFS)', '2000 LABOR FORCE SURVEY NO. 103 - APRIL.pdf', '2025-04-24 03:01:12'),
(110, '2000 LABOR FORCE SURVEY NO. 104 - JULY', 'Labor Force Survey (LFS)', '2000 LABOR FORCE SURVEY NO. 104 - JULY.pdf', '2025-04-24 03:01:12'),
(111, '2000 LABOR FORCE SURVEY NO. 105 - OCTOBER', 'Labor Force Survey (LFS)', '2000 LABOR FORCE SURVEY NO. 105 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(112, '2001 LABOR FORCE SURVEY NO. 106 - JANUARY', 'Labor Force Survey (LFS)', '2001 LABOR FORCE SURVEY NO. 106 - JANUARY.pdf', '2025-04-24 03:01:12'),
(113, '2001 LABOR FORCE SURVEY NO. 107 - APRIL', 'Labor Force Survey (LFS)', '2001 LABOR FORCE SURVEY NO. 107 - APRIL.pdf', '2025-04-24 03:01:12'),
(114, '2001 LABOR FORCE SURVEY NO. 108 - JULY', 'Labor Force Survey (LFS)', '2001 LABOR FORCE SURVEY NO. 108 - JULY.pdf', '2025-04-24 03:01:12'),
(115, '2001 LABOR FORCE SURVEY NO. 110 - OCTOBER', 'Labor Force Survey (LFS)', '2001 LABOR FORCE SURVEY NO. 110 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(116, '2002 LABOR FORCE SURVEY NO. 111 - JANUARY', 'Labor Force Survey (LFS)', '2002 LABOR FORCE SURVEY NO. 111 - JANUARY.pdf', '2025-04-24 03:01:12'),
(117, '2002 LABOR FORCE SURVEY NO. 112 - APRIL', 'Labor Force Survey (LFS)', '2002 LABOR FORCE SURVEY NO. 112 - APRIL.pdf', '2025-04-24 03:01:12'),
(118, '2002 LABOR FORCE SURVEY NO. 113 - JULY', 'Labor Force Survey (LFS)', '2002 LABOR FORCE SURVEY NO. 113 - JULY.pdf', '2025-04-24 03:01:12'),
(119, '2003 LABOR FORCE SURVEY NO. 115 - JANUARY', 'Labor Force Survey (LFS)', '2003 LABOR FORCE SURVEY NO. 115 - JANUARY.pdf', '2025-04-24 03:01:12'),
(120, '2003 LABOR FORCE SURVEY NO. 116 - APRIL', 'Labor Force Survey (LFS)', '2003 LABOR FORCE SURVEY NO. 116 - APRIL.pdf', '2025-04-24 03:01:12'),
(121, '2003 LABOR FORCE SURVEY NO. 117 - JULY', 'Labor Force Survey (LFS)', '2003 LABOR FORCE SURVEY NO. 117 - JULY.pdf', '2025-04-24 03:01:12'),
(122, '2003 LABOR FORCE SURVEY NO. 118 - OCTOBER', 'Labor Force Survey (LFS)', '2003 LABOR FORCE SURVEY NO. 118 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(123, '2004 LABOR FORCE SURVEY NO. 119 - JANUARY', 'Labor Force Survey (LFS)', '2004 LABOR FORCE SURVEY NO. 119 - JANUARY.pdf', '2025-04-24 03:01:12'),
(124, '2004 LABOR FORCE SURVEY NO. 120 - APRIL', 'Labor Force Survey (LFS)', '2004 LABOR FORCE SURVEY NO. 120 - APRIL.pdf', '2025-04-24 03:01:12'),
(125, '2004 LABOR FORCE SURVEY NO. 121 - JULY', 'Labor Force Survey (LFS)', '2004 LABOR FORCE SURVEY NO. 121 - JULY.pdf', '2025-04-24 03:01:12'),
(126, '2005 LABOR FORCE SURVEY NO. 123 - JANUARY', 'Labor Force Survey (LFS)', '2005 LABOR FORCE SURVEY NO. 123 - JANUARY.pdf', '2025-04-24 03:01:12'),
(127, '2005 LABOR FORCE SURVEY NO. 124 - APRIL', 'Labor Force Survey (LFS)', '2005 LABOR FORCE SURVEY NO. 124 - APRIL.pdf', '2025-04-24 03:01:12'),
(128, '2005 LABOR FORCE SURVEY NO. 125 - JULY', 'Labor Force Survey (LFS)', '2005 LABOR FORCE SURVEY NO. 125 - JULY.pdf', '2025-04-24 03:01:12'),
(129, '2005 LABOR FORCE SURVEY NO. 126 - OCTOBER', 'Labor Force Survey (LFS)', '2005 LABOR FORCE SURVEY NO. 126 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(130, '2006 LABOR FORCE SURVEY NO. 127 - JANUARY', 'Labor Force Survey (LFS)', '2006 LABOR FORCE SURVEY NO. 127 - JANUARY.pdf', '2025-04-24 03:01:12'),
(131, '2006 LABOR FORCE SURVEY NO. 128 - APRIL', 'Labor Force Survey (LFS)', '2006 LABOR FORCE SURVEY NO. 128 - APRIL.pdf', '2025-04-24 03:01:12'),
(132, '2006 LABOR FORCE SURVEY NO. 129 - JULY', 'Labor Force Survey (LFS)', '2006 LABOR FORCE SURVEY NO. 129 - JULY.pdf', '2025-04-24 03:01:12'),
(133, '2006 LABOR FORCE SURVEY NO. 130 - OCTOBER', 'Labor Force Survey (LFS)', '2006 LABOR FORCE SURVEY NO. 130 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(134, '2007 LABOR FORCE SURVEY NO. 131 - JANUARY', 'Labor Force Survey (LFS)', '2007 LABOR FORCE SURVEY NO. 131 - JANUARY.pdf', '2025-04-24 03:01:12'),
(135, '2007 LABOR FORCE SURVEY NO. 132 - APRIL', 'Labor Force Survey (LFS)', '2007 LABOR FORCE SURVEY NO. 132 - APRIL.pdf', '2025-04-24 03:01:12'),
(136, '2007 LABOR FORCE SURVEY NO. 133 - JULY', 'Labor Force Survey (LFS)', '2007 LABOR FORCE SURVEY NO. 133 - JULY.pdf', '2025-04-24 03:01:12'),
(137, '2007 LABOR FORCE SURVEY NO. 134 - OCTOBER', 'Labor Force Survey (LFS)', '2007 LABOR FORCE SURVEY NO. 134 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(138, '2008 LABOR FORCE SURVEY NO. 135 - JANUARY', 'Labor Force Survey (LFS)', '2008 LABOR FORCE SURVEY NO. 135 - JANUARY.pdf', '2025-04-24 03:01:12'),
(139, '2008 LABOR FORCE SURVEY NO. 136 - APRIL', 'Labor Force Survey (LFS)', '2008 LABOR FORCE SURVEY NO. 136 - APRIL.pdf', '2025-04-24 03:01:12'),
(140, '2008 LABOR FORCE SURVEY NO. 137 - JULY', 'Labor Force Survey (LFS)', '2008 LABOR FORCE SURVEY NO. 137 - JULY.pdf', '2025-04-24 03:01:12'),
(141, '2008 LABOR FORCE SURVEY NO. 138 - OCTOBER', 'Labor Force Survey (LFS)', '2008 LABOR FORCE SURVEY NO. 138 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(142, '2009 LABOR FORCE SURVEY NO. 139 - JANUARY', 'Labor Force Survey (LFS)', '2009 LABOR FORCE SURVEY NO. 139 - JANUARY.pdf', '2025-04-24 03:01:12'),
(143, '2009 LABOR FORCE SURVEY NO. 140 - APRIL', 'Labor Force Survey (LFS)', '2009 LABOR FORCE SURVEY NO. 140 - APRIL.pdf', '2025-04-24 03:01:12'),
(144, '2009 LABOR FORCE SURVEY NO. 141 - JULY', 'Labor Force Survey (LFS)', '2009 LABOR FORCE SURVEY NO. 141 - JULY.pdf', '2025-04-24 03:01:12'),
(145, '2009 LABOR FORCE SURVEY NO. 142 - OCTOBER', 'Labor Force Survey (LFS)', '2009 LABOR FORCE SURVEY NO. 142 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(146, '2010 LABOR FORCE SURVEY NO. 143 - JANUARY', 'Labor Force Survey (LFS)', '2010 LABOR FORCE SURVEY NO. 143 - JANUARY.pdf', '2025-04-24 03:01:12'),
(147, '2010 LABOR FORCE SURVEY NO. 144 - APRIL', 'Labor Force Survey (LFS)', '2010 LABOR FORCE SURVEY NO. 144 - APRIL.pdf', '2025-04-24 03:01:12'),
(148, '2010 LABOR FORCE SURVEY NO. 145 - JULY', 'Labor Force Survey (LFS)', '2010 LABOR FORCE SURVEY NO. 145 - JULY.pdf', '2025-04-24 03:01:12'),
(149, '2010 LABOR FORCE SURVEY NO. 146 - OCTOBER', 'Labor Force Survey (LFS)', '2010 LABOR FORCE SURVEY NO. 146 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(150, '2011 LABOR FORCE SURVEY NO. 147 - JANUARY', 'Labor Force Survey (LFS)', '2011 LABOR FORCE SURVEY NO. 147 - JANUARY.pdf', '2025-04-24 03:01:12'),
(151, '2011 LABOR FORCE SURVEY NO. 148 - APRIL', 'Labor Force Survey (LFS)', '2011 LABOR FORCE SURVEY NO. 148 - APRIL.pdf', '2025-04-24 03:01:12'),
(152, '2011 LABOR FORCE SURVEY NO. 149 - JULY', 'Labor Force Survey (LFS)', '2011 LABOR FORCE SURVEY NO. 149 - JULY.pdf', '2025-04-24 03:01:12'),
(153, '2011 LABOR FORCE SURVEY NO. 150 - OCTOBER', 'Labor Force Survey (LFS)', '2011 LABOR FORCE SURVEY NO. 150 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(154, '2012 LABOR FORCE SURVEY NO. 151 - JANUARY', 'Labor Force Survey (LFS)', '2012 LABOR FORCE SURVEY NO. 151 - JANUARY.pdf', '2025-04-24 03:01:12'),
(155, '2012 LABOR FORCE SURVEY NO. 152 - APRIL', 'Labor Force Survey (LFS)', '2012 LABOR FORCE SURVEY NO. 152 - APRIL.pdf', '2025-04-24 03:01:12'),
(156, '2012 LABOR FORCE SURVEY NO. 153 - JULY', 'Labor Force Survey (LFS)', '2012 LABOR FORCE SURVEY NO. 153 - JULY.pdf', '2025-04-24 03:01:12'),
(157, '2012 LABOR FORCE SURVEY NO. 154 - OCTOBER', 'Labor Force Survey (LFS)', '2012 LABOR FORCE SURVEY NO. 154 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(158, '2013 LABOR FORCE SURVEY NO. 155 -JANUARY', 'Labor Force Survey (LFS)', '2013 LABOR FORCE SURVEY NO. 155 -JANUARY.pdf', '2025-04-24 03:01:12'),
(159, '2013 LABOR FORCE SURVEY NO. 156 - APRIL', 'Labor Force Survey (LFS)', '2013 LABOR FORCE SURVEY NO. 156 - APRIL.pdf', '2025-04-24 03:01:12'),
(160, '2013 LABOR FORCE SURVEY NO. 157 - JULY', 'Labor Force Survey (LFS)', '2013 LABOR FORCE SURVEY NO. 157 - JULY.pdf', '2025-04-24 03:01:12'),
(161, '2013 LABOR FORCE SURVEY NO. 158 - OCTOBER', 'Labor Force Survey (LFS)', '2013 LABOR FORCE SURVEY NO. 158 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(162, '2014 LABOR FORCE SURVEY NO. 159 -JANUARY', 'Labor Force Survey (LFS)', '2014 LABOR FORCE SURVEY NO. 159 -JANUARY.pdf', '2025-04-24 03:01:12'),
(163, '2014 LABOR FORCE SURVEY NO. 160 - APRIL', 'Labor Force Survey (LFS)', '2014 LABOR FORCE SURVEY NO. 160 - APRIL.pdf', '2025-04-24 03:01:12'),
(164, '2014 LABOR FORCE SURVEY NO. 161 -JULY', 'Labor Force Survey (LFS)', '2014 LABOR FORCE SURVEY NO. 161 -JULY.pdf', '2025-04-24 03:01:12'),
(165, '2014 LABOR FORCE SURVEY NO. 162 - OCTOBER', 'Labor Force Survey (LFS)', '2014 LABOR FORCE SURVEY NO. 162 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(166, '2015 LABOR FORCE SURVEY NO. 163 - JANUARY', 'Labor Force Survey (LFS)', '2015 LABOR FORCE SURVEY NO. 163 - JANUARY.pdf', '2025-04-24 03:01:12'),
(167, '2015 LABOR FORCE SURVEY NO. 164 - APRIL', 'Labor Force Survey (LFS)', '2015 LABOR FORCE SURVEY NO. 164 - APRIL.pdf', '2025-04-24 03:01:12'),
(168, '2015 LABOR FORCE SURVEY NO. 165 - JULY', 'Labor Force Survey (LFS)', '2015 LABOR FORCE SURVEY NO. 165 - JULY.pdf', '2025-04-24 03:01:12'),
(169, '2015 LABOR FORCE SURVEY NO. 166 - OCTOBER', 'Labor Force Survey (LFS)', '2015 LABOR FORCE SURVEY NO. 166 - OCTOBER.pdf', '2025-04-24 03:01:12'),
(170, '2016 LABOR FORCE SURVEY NO. 170 - JULY', 'Labor Force Survey (LFS)', '2016 LABOR FORCE SURVEY NO. 170 - JULY.pdf', '2025-04-24 03:01:12'),
(171, '2019 LABOR FORCE SURVEY NO. 183 - JULY', 'Labor Force Survey (LFS)', '2019 LABOR FORCE SURVEY NO. 183 - JULY.pdf', '2025-04-24 03:01:12'),
(172, '2020 LABOR FORCE SURVEY NO. 186 - APRIL', 'Labor Force Survey (LFS)', '2020 LABOR FORCE SURVEY NO. 186 - APRIL.pdf', '2025-04-24 03:01:12'),
(173, '1994 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY VOL 2', 'Functional Literacy, Education and Mass Media Survey (FLEMMS)', '1994 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY VOL 2.pdf', '2025-04-24 03:44:09'),
(174, '2003 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY', 'Functional Literacy, Education and Mass Media Survey (FLEMMS)', '2003 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY.pdf', '2025-04-24 03:44:09'),
(175, '2008 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY', 'Functional Literacy, Education and Mass Media Survey (FLEMMS)', '2008 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY.pdf', '2025-04-24 03:44:09'),
(176, '2013 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY', 'Functional Literacy, Education and Mass Media Survey (FLEMMS)', '2013 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY.pdf', '2025-04-24 03:44:09'),
(177, '2019 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY', 'Functional Literacy, Education and Mass Media Survey (FLEMMS)', '2019 FUNCTIONAL LITERACY, EDECATION AND MASS MEDIA SURVEY.pdf', '2025-04-24 03:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `infographics`
--

CREATE TABLE `infographics` (
  `id` int(11) NOT NULL,
  `title_info` varchar(255) NOT NULL,
  `pdf_info` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infographics`
--

INSERT INTO `infographics` (`id`, `title_info`, `pdf_info`, `uploaded_at`) VALUES
(12, '2023 VITAL STATISTICS PASAY CITY', '2023 VITAL STATISTICS PASAY CITY.pdf', '2025-04-24 00:37:17'),
(13, '2023 VITAL STATISTICS CITY OF PARAÑAQUE', '2023 VITAL STATISTICS CITY OF PARAÑAQUE.pdf', '2025-04-24 00:37:17'),
(14, '2023 VITAL STATISTICS CITY OF LAS PIÑAS', '2023 VITAL STATISTICS CITY OF LAS PIÑAS.pdf', '2025-04-24 00:37:17'),
(15, '2023 VITAL STATISTICS CITY OF MUNTINLUPA', '2023 VITAL STATISTICS CITY OF MUNTINLUPA.pdf', '2025-04-24 00:37:17'),
(16, '2022 DEATH STATISTICS CITY OF PARAÑAQUE', '2022 DEATH STATISTICS CITY OF PARAÑAQUE.pdf', '2025-04-24 00:37:17'),
(17, '2022 DEATH STATISTICS PASAY CITY', '2022 DEATH STATISTICS PASAY CITY.pdf', '2025-04-24 00:37:17'),
(18, '2022 DEATH STATISTICS CITY OF MUNTINLUPA', '2022 DEATH STATISTICS CITY OF MUNTINLUPA.pdf', '2025-04-24 00:37:17'),
(19, '2023 ECONOMIC PERFORMANCE OF THE CITY OF PARAÑAQUE', '2023 ECONOMIC PERFORMANCE OF THE CITY OF PARAÑAQUE.pdf', '2025-04-24 00:37:17'),
(20, '2023 ECONOMIC PERFORMANCE OF THE CITY OF LAS PIÑAS', '2023 ECONOMIC PERFORMANCE OF THE CITY OF LAS PIÑAS.pdf', '2025-04-24 00:37:17'),
(21, '2023 ECONOMIC PERFORMANCE OF THE CITY OF MUNTINLUPA', '2023 ECONOMIC PERFORMANCE OF THE CITY OF MUNTINLUPA.pdf', '2025-04-24 00:37:17'),
(22, '2023 ECONOMIC PERFORMANCE OF PASAY CITY', '2023 ECONOMIC PERFORMANCE OF PASAY CITY.pdf', '2025-04-24 00:37:17'),
(23, '2022 MARRIAGE STATISTICS CITY OF LAS PIÑAS', '2022 MARRIAGE STATISTICS CITY OF LAS PIÑAS.pdf', '2025-04-24 00:37:17'),
(24, '2022 MARRIAGE STATISTICS CITY OF MUNTINLUPA', '2022 MARRIAGE STATISTICS CITY OF MUNTINLUPA.pdf', '2025-04-24 00:37:17'),
(25, '2022 MARRIAGE STATISTICS CITY OF PARAÑAQUE', '2022 MARRIAGE STATISTICS CITY OF PARAÑAQUE.pdf', '2025-04-24 00:37:17'),
(26, '2022 MARRIAGE STATISTICS PASAY CITY', '2022 MARRIAGE STATISTICS PASAY CITY.pdf', '2025-04-24 00:37:17'),
(27, '2022 DEATH STATISTICS CITY OF LAS PIÑAS', '1745456397_2022 DEATH STATISTICS CITY OF LAS PIÑAS.pdf', '2025-04-24 00:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `grade_course` varchar(100) DEFAULT NULL,
  `school` varchar(150) DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `name`, `age`, `sex`, `grade_course`, `school`, `purpose`, `created_at`) VALUES
(1, 'Alice Johnson', 20, 'Female', 'BS Psychology', 'Greenwood University', 'Enrollment', '2025-04-07 04:20:59'),
(2, 'Michael Reyes', 19, 'Male', 'Grade 11', 'Sunrise High School', 'Study', '2025-04-07 04:20:59'),
(3, 'Florence Ayen De Jesus', 22, 'Male', 'BS Information Technology', 'STI', 'RRL', '2025-04-07 04:20:59'),
(4, 'Kwon Soon Young', 23, 'Male', 'BS Education', 'UP', 'Study', '2025-04-07 04:20:59'),
(5, 'Ricky Reyes', 20, 'Male', 'BS Business Administration', 'Navotas Polytecnic College', 'Research', '2025-04-07 04:20:59'),
(6, 'Lorraine Cruz', 24, 'Female', 'BS Nursing', 'Pamantasan ng Lungsod ng Maynila', 'Study', '2025-04-07 04:20:59'),
(7, 'Roselle Delos Reyes', 22, 'Female', 'BS Hospitality Management', 'Divine Mercy College', 'Study', '2025-04-07 04:20:59'),
(8, 'Jasmine Lopez', 21, 'Female', 'BS Computer Science', 'Adamson University', 'Thesis', '2025-04-07 08:10:40'),
(9, 'Marco Dela Cruz', 18, 'Male', 'Grade 12', 'Makati Science High School', 'Enrollment', '2025-04-07 08:10:40'),
(10, 'John Doe', 16, 'Male', '10th Grade', 'Springfield High School', 'Education', '2025-04-21 06:52:12'),
(11, 'Jane Smith', 15, 'Female', '9th Grade', 'Riverdale High School', 'Education', '2025-04-21 06:52:12'),
(12, 'Michael Johnson', 17, 'Male', '11th Grade', 'Central High School', 'Sports', '2025-04-21 06:52:12'),
(13, 'Emily Davis', 14, 'Female', '8th Grade', 'Westfield Academy', 'Art', '2025-04-21 06:52:12'),
(14, 'David Brown', 16, 'Male', '10th Grade', 'Lakeside High School', 'Music', '2025-04-21 06:52:12'),
(15, 'Sarah Wilson', 18, 'Female', '12th Grade', 'Eastwood High School', 'Scholarship', '2025-04-21 06:52:12'),
(16, 'Chris Lee', 15, 'Male', '9th Grade', 'Green Valley School', 'Education', '2025-04-21 06:52:12'),
(17, 'Olivia White', 17, 'Female', '11th Grade', 'Sunset High School', 'Dance', '2025-04-21 06:52:12'),
(18, 'Daniel Martinez', 16, 'Male', '10th Grade', 'Pinecrest High School', 'Theater', '2025-04-21 06:52:12'),
(19, 'Sophia Harris', 14, 'Female', '8th Grade', 'Blue Ridge School', 'Writing', '2025-04-21 06:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `special_releases`
--

CREATE TABLE `special_releases` (
  `id` int(11) NOT NULL,
  `title_sp` varchar(255) NOT NULL,
  `pdf_sp` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_releases`
--

INSERT INTO `special_releases` (`id`, `title_sp`, `pdf_sp`, `created_at`) VALUES
(16, 'Vital-Statistics_SR_2022 BMD_Las-Piñas', 'Vital-Statistics_SR_2022 BMD_Las-Piñas.pdf', '2025-04-24 01:03:59'),
(17, 'Vital-Statistics_SR_2023 BMD_Muntinlupa', 'Vital-Statistics_SR_2023 BMD_Muntinlupa.pdf', '2025-04-24 01:03:59'),
(18, 'Vital-Statistics_SR_2023 BMD_Parañaque', 'Vital-Statistics_SR_2023 BMD_Parañaque.pdf', '2025-04-24 01:03:59'),
(19, 'Vital-Statistics_SR_2023 BMD_Pasay', 'Vital-Statistics_SR_2023 BMD_Pasay.pdf', '2025-04-24 01:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `wam`
--

CREATE TABLE `wam` (
  `id` int(11) NOT NULL,
  `title_wam` varchar(255) NOT NULL,
  `pdf_wam` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wam`
--

INSERT INTO `wam` (`id`, `title_wam`, `pdf_wam`, `created_at`) VALUES
(8, '2024 WAM_Muntinlupa City', '2024 WAM_Muntinlupa City.pdf', '2025-04-24 00:45:33'),
(9, '2024 WAM_Pasay City', '2024 WAM_Pasay City.pdf', '2025-04-24 00:45:33'),
(10, '2024 WAM_Parañaque City', '2024 WAM_Parañaque City.pdf', '2025-04-24 00:45:33'),
(11, '2024 WAM_Las Piñas City', '2024 WAM_Las Piñas City.pdf', '2025-04-24 00:45:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrative`
--
ALTER TABLE `administrative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cif`
--
ALTER TABLE `cif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civil_registration`
--
ALTER TABLE `civil_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `establishment`
--
ALTER TABLE `establishment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infographics`
--
ALTER TABLE `infographics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_releases`
--
ALTER TABLE `special_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wam`
--
ALTER TABLE `wam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrative`
--
ALTER TABLE `administrative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cif`
--
ALTER TABLE `cif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `civil_registration`
--
ALTER TABLE `civil_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `establishment`
--
ALTER TABLE `establishment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `infographics`
--
ALTER TABLE `infographics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `special_releases`
--
ALTER TABLE `special_releases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wam`
--
ALTER TABLE `wam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
