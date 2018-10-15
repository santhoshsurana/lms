-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2014 at 03:36 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms`
--
CREATE DATABASE IF NOT EXISTS `lms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lms`;

-- --------------------------------------------------------

--
-- Table structure for table `ada_levels`
--

CREATE TABLE IF NOT EXISTS `ada_levels` (
  `id` bigint(20) unsigned NOT NULL,
  `nature_of_specimen` varchar(10) NOT NULL,
  `result` varchar(10) NOT NULL,
  `normal` varchar(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bio_chemistry`
--

CREATE TABLE IF NOT EXISTS `bio_chemistry` (
  `id` bigint(20) unsigned NOT NULL,
  `sugar_fasting` varchar(20) DEFAULT NULL,
  `sugar_P.P` varchar(20) DEFAULT NULL,
  `sugar_random` varchar(20) DEFAULT NULL,
  `urea` varchar(20) DEFAULT NULL,
  `s_creatinine` varchar(20) DEFAULT NULL,
  `total_cholestrol` varchar(20) DEFAULT NULL,
  `hdl_cholestrol` varchar(20) DEFAULT NULL,
  `vldl_cholestrol` varchar(20) DEFAULT NULL,
  `ldl` varchar(20) DEFAULT NULL,
  `triglycerides` varchar(20) DEFAULT NULL,
  `vanden_bergh_reaction` varchar(20) DEFAULT NULL,
  `total_bilirubin` varchar(20) DEFAULT NULL,
  `direct_bilirubin` varchar(20) DEFAULT NULL,
  `indirect_bilirubin` varchar(20) DEFAULT NULL,
  `sgpt` varchar(20) DEFAULT NULL,
  `sgot` varchar(20) DEFAULT NULL,
  `alkaline_phosphatase` varchar(20) DEFAULT NULL,
  `acid_phosphatase` varchar(20) DEFAULT NULL,
  `acid_phosphatase_prostatic` varchar(20) DEFAULT NULL,
  `total_protein` varchar(20) DEFAULT NULL,
  `albumin` varchar(20) DEFAULT NULL,
  `globulin` varchar(20) DEFAULT NULL,
  `ag_ratio` varchar(20) DEFAULT NULL,
  `calcium` varchar(20) DEFAULT NULL,
  `phosphorous` varchar(20) DEFAULT NULL,
  `uric_acid` varchar(20) DEFAULT NULL,
  `serum_amylase` varchar(20) DEFAULT NULL,
  `fibrinogen` varchar(20) DEFAULT NULL,
  `prothrombin_test` varchar(20) DEFAULT NULL,
  `prothrombin_control` varchar(20) DEFAULT NULL,
  `prothrombin_index` varchar(20) DEFAULT NULL,
  `prothrombin_ratio` varchar(20) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE IF NOT EXISTS `blood_bank` (
  `id` bigint(20) unsigned NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `rh_typing` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_examination`
--

CREATE TABLE IF NOT EXISTS `blood_examination` (
  `id` bigint(20) unsigned NOT NULL,
  `Haemoglobin` varchar(50) NOT NULL,
  `total_wbc_count` varchar(50) NOT NULL,
  `Neutrophils` varchar(50) NOT NULL,
  `lymphocytes` varchar(50) NOT NULL,
  `eosinophils` varchar(50) NOT NULL,
  `monocytes` varchar(50) NOT NULL,
  `basophils` varchar(50) NOT NULL,
  `E.S.R` varchar(50) NOT NULL,
  `A.E.C` varchar(50) NOT NULL,
  `platelet_count` varchar(50) NOT NULL,
  `reticulocyte_count` varchar(50) NOT NULL,
  `haematocrit(pcv)` varchar(50) NOT NULL,
  `bleeding_time` varchar(50) NOT NULL,
  `clotting_time` varchar(50) NOT NULL,
  `MCV` varchar(50) NOT NULL,
  `MCH` varchar(50) NOT NULL,
  `MCHC` varchar(50) NOT NULL,
  `colour_index` varchar(50) NOT NULL,
  `smear_for_M.P` varchar(50) NOT NULL,
  `smear_for_M.F` varchar(50) NOT NULL,
  `L.E_cell_phenomenon` varchar(50) NOT NULL,
  `sickle_cell_test` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cholinesterase`
--

CREATE TABLE IF NOT EXISTS `cholinesterase` (
  `id` bigint(20) unsigned NOT NULL,
  `result` varchar(20) NOT NULL,
  `Females` varchar(20) NOT NULL,
  `Males` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `csf_analysis`
--

CREATE TABLE IF NOT EXISTS `csf_analysis` (
  `id` bigint(20) unsigned NOT NULL,
  `cell_count` varchar(50) NOT NULL,
  `type_of_cells` varchar(50) NOT NULL,
  `pandys_test` varchar(50) NOT NULL,
  `globulin` varchar(50) NOT NULL,
  `total_protein` varchar(50) NOT NULL,
  `sugar` varchar(50) NOT NULL,
  `chlorides` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `glucose_tolerance`
--

CREATE TABLE IF NOT EXISTS `glucose_tolerance` (
  `id` bigint(20) unsigned NOT NULL,
  `fasting_glucose` varchar(20) NOT NULL,
  `hour1` varchar(20) NOT NULL,
  `hour2` varchar(20) NOT NULL,
  `hour3` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` tinyint(2) unsigned NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '0',
  `phone` varchar(10) DEFAULT NULL,
  `reference` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plasma_fibrinogen`
--

CREATE TABLE IF NOT EXISTS `plasma_fibrinogen` (
  `id` bigint(20) unsigned NOT NULL,
  `result` varchar(20) NOT NULL,
  `normal` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `semen_analysis`
--

CREATE TABLE IF NOT EXISTS `semen_analysis` (
  `id` bigint(20) unsigned NOT NULL,
  `volume` varchar(50) NOT NULL,
  `reaction_ph` varchar(50) NOT NULL,
  `viscosity` varchar(50) NOT NULL,
  `count` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `puss_cells` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `serology`
--

CREATE TABLE IF NOT EXISTS `serology` (
  `id` bigint(20) unsigned NOT NULL,
  `vdrl` varchar(50) NOT NULL,
  `tpha` varchar(50) NOT NULL,
  `hepatitisb` varchar(50) NOT NULL,
  `hiv` varchar(50) NOT NULL,
  `hepatitisc` varchar(50) NOT NULL,
  `ra_factor` varchar(50) NOT NULL,
  `aso_test` varchar(50) NOT NULL,
  `crp` varchar(50) NOT NULL,
  `mantoux_test` varchar(50) NOT NULL,
  `sputum_for_afb` varchar(50) NOT NULL,
  `salmonella_typhi_o` varchar(50) NOT NULL,
  `salmonella_typhi_h` varchar(50) NOT NULL,
  `salmonella_typhi_ah` varchar(50) NOT NULL,
  `salmonella_typhi_bh` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `serum_electrolyte`
--

CREATE TABLE IF NOT EXISTS `serum_electrolyte` (
  `id` bigint(20) unsigned NOT NULL,
  `sodium_na` varchar(50) NOT NULL,
  `potassium_k` varchar(50) NOT NULL,
  `Chlorides` varchar(50) NOT NULL,
  `calcium` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemical_name` varchar(50) NOT NULL,
  `test_name` bigint(20) unsigned NOT NULL,
  `Normal_value` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_name` (`test_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `chemical_name`, `test_name`, `Normal_value`) VALUES
(1, 'Haemoglobin Men', 0, '-'),
(2, 'Haemoglobin Women', 0, '-'),
(3, 'Total W.B.C Count', 0, '-'),
(4, 'Neutrophils', 0, '-'),
(5, 'Lymphocytes', 0, '-'),
(6, 'Eosinophils', 0, '-'),
(7, 'Monocytes', 0, '-'),
(8, 'Basophils', 0, '-'),
(9, 'E.S.R Men', 0, '-'),
(10, 'E.S.R Women', 0, '-'),
(11, 'A.E.C', 0, '-'),
(12, 'Platelet', 0, '-'),
(13, 'Reticulocyte', 0, '-'),
(14, 'Haematocrit Men', 0, '-'),
(15, 'Haematocrit Women', 0, '-'),
(16, 'Bleeding', 0, '-'),
(17, 'Clotting', 0, '-'),
(18, 'MCV', 0, '-'),
(19, 'MCH', 0, '-'),
(20, 'MCHC', 0, '-'),
(21, 'Colour', 0, '-'),
(22, 'Sugar fasting', 3, '-'),
(23, 'Sugar pp', 3, '-'),
(24, 'Sugar random', 3, '-'),
(25, 'Urea', 3, '-'),
(26, 'S.Creatinine', 3, '-'),
(27, 'Total', 3, '-'),
(28, 'HDL', 3, '-'),
(29, 'VLDL', 3, '-'),
(30, 'LDL', 3, '-'),
(31, 'Triglycerides', 3, '-'),
(32, 'Total', 3, '-'),
(33, 'Direct', 3, '-'),
(34, 'Indirect', 3, '-'),
(35, 'S.G.P.T', 3, '-'),
(36, 'S.G.O.T', 3, '-'),
(37, 'Alkaline', 3, '-'),
(38, 'ACID', 3, '-'),
(39, 'ACID', 3, '-'),
(40, 'Total', 3, '-'),
(41, 'Albumin', 3, '-'),
(42, 'A/G', 3, '-'),
(43, 'Calcium', 3, '-'),
(44, 'Phosphorous', 3, '-'),
(45, 'Uric', 3, '-'),
(46, 'Uric', 3, '-'),
(47, 'Serum', 3, '-'),
(48, 'Fibrinogen', 3, '-'),
(49, 'Sodium', 4, '-'),
(50, 'Potassium', 4, '-'),
(51, 'Chlorides', 4, '-'),
(52, 'Calcium', 4, '-');

-- --------------------------------------------------------

--
-- Table structure for table `stool_examination`
--

CREATE TABLE IF NOT EXISTS `stool_examination` (
  `id` bigint(20) unsigned NOT NULL,
  `colour` varchar(50) NOT NULL,
  `consistency` varchar(50) NOT NULL,
  `mucous` varchar(50) NOT NULL,
  `ph_reaction` varchar(50) NOT NULL,
  `reducing_substances` varchar(50) NOT NULL,
  `occult_blood` varchar(50) NOT NULL,
  `ova` varchar(50) NOT NULL,
  `cysts` varchar(50) NOT NULL,
  `puss_cells` varchar(50) NOT NULL,
  `rbc` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_name` tinyint(2) NOT NULL DEFAULT '0',
  `test_type` int(1) NOT NULL DEFAULT '0',
  `patient_name` int(11) unsigned NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `paid_amount` decimal(10,0) NOT NULL,
  `due_amount` decimal(10,0) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `patient_name` (`patient_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `urine_examination`
--

CREATE TABLE IF NOT EXISTS `urine_examination` (
  `id` bigint(20) unsigned NOT NULL,
  `albumin` varchar(50) NOT NULL,
  `phosphates` varchar(50) NOT NULL,
  `sugar(Fasting)` varchar(50) NOT NULL,
  `sugar(P.P)` varchar(50) NOT NULL,
  `sugar(random)` varchar(50) NOT NULL,
  `wbc_puss_cells` varchar(50) NOT NULL,
  `rbc` varchar(50) NOT NULL,
  `epithelial_cells` varchar(50) NOT NULL,
  `casts` varchar(50) NOT NULL,
  `crystals` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `appearance` varchar(50) NOT NULL,
  `sediment` varchar(50) NOT NULL,
  `ph_reaction` varchar(50) NOT NULL,
  `specific_gravity` varchar(50) NOT NULL,
  `bile_salts` varchar(50) NOT NULL,
  `bile_pigments` varchar(50) NOT NULL,
  `urobilinogen` varchar(50) NOT NULL,
  `ketone` varchar(50) NOT NULL,
  `nitrite` varchar(50) NOT NULL,
  `ketone_bodies_acetone` varchar(50) NOT NULL,
  `chyle` varchar(50) NOT NULL,
  `bence_zence_protein` varchar(50) NOT NULL,
  `occult_blood` varchar(50) NOT NULL,
  `pregnancy_test` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `date`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 0, '2014-02-04 18:54:44');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ada_levels`
--
ALTER TABLE `ada_levels`
  ADD CONSTRAINT `ada_level` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bio_chemistry`
--
ALTER TABLE `bio_chemistry`
  ADD CONSTRAINT `bio_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD CONSTRAINT `bloodgrop_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_examination`
--
ALTER TABLE `blood_examination`
  ADD CONSTRAINT `blood_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cholinesterase`
--
ALTER TABLE `cholinesterase`
  ADD CONSTRAINT `cholinesterase_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `csf_analysis`
--
ALTER TABLE `csf_analysis`
  ADD CONSTRAINT `csf_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `glucose_tolerance`
--
ALTER TABLE `glucose_tolerance`
  ADD CONSTRAINT `glucose_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plasma_fibrinogen`
--
ALTER TABLE `plasma_fibrinogen`
  ADD CONSTRAINT `Plasma_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semen_analysis`
--
ALTER TABLE `semen_analysis`
  ADD CONSTRAINT `semen_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serology`
--
ALTER TABLE `serology`
  ADD CONSTRAINT `serol_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serum_electrolyte`
--
ALTER TABLE `serum_electrolyte`
  ADD CONSTRAINT `serum_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stool_examination`
--
ALTER TABLE `stool_examination`
  ADD CONSTRAINT `stool_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `test_patient` FOREIGN KEY (`patient_name`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `urine_examination`
--
ALTER TABLE `urine_examination`
  ADD CONSTRAINT `urine_test` FOREIGN KEY (`id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
