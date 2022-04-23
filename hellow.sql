-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tubes
CREATE DATABASE IF NOT EXISTS `tubes` /*!40100 DEFAULT CHARACTER SET utf16 COLLATE utf16_bin */;
USE `tubes`;

-- Dumping structure for table tubes.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `username` varchar(50) COLLATE utf16_bin NOT NULL,
  `password` varchar(50) COLLATE utf16_bin DEFAULT NULL,
  `level` enum('admin','koor','pem') COLLATE utf16_bin DEFAULT 'pem',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Dumping data for table tubes.dosen: ~1 rows (approximately)
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
REPLACE INTO `dosen` (`username`, `password`, `level`) VALUES
	('admin', '123', 'admin'),
	('koor', '123', 'koor'),
	('pem', '123', 'pem');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table tubes.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `username` varchar(50) COLLATE utf16_bin NOT NULL,
  `password` varchar(50) COLLATE utf16_bin DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Dumping data for table tubes.mahasiswa: ~1 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
REPLACE INTO `mahasiswa` (`username`, `password`) VALUES
	('mhs', '123');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
