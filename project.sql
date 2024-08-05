-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 03:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(356) NOT NULL,
  `result_id` int(11) NOT NULL,
  `level` varchar(40) NOT NULL,
  `wpm` int(11) DEFAULT NULL,
  `mistake` int(11) DEFAULT NULL,
  `cpm` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `fname`, `lname`, `email`, `result_id`, `level`, `wpm`, `mistake`, `cpm`, `date`) VALUES
(2, 'ash', 'ss', 'templeshakya@gmail.com', 2, 'lvl1', 29, 1, 146, '2024-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `level` varchar(40) NOT NULL,
  `wpm` int(11) DEFAULT NULL,
  `mistake` int(11) DEFAULT NULL,
  `cpm` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `uname`, `level`, `wpm`, `mistake`, `cpm`, `date`) VALUES
(2, 'ss', 'lvl1', 29, 1, 146, '2024-08-05');

--
-- Triggers `result`
--
DELIMITER $$
CREATE TRIGGER `after_delete` AFTER DELETE ON `result` FOR EACH ROW begin
delete from download
where result_id=old.result_id;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_data` AFTER INSERT ON `result` FOR EACH ROW BEGIN
  INSERT INTO download(id,fname,lname,email,result_id,level,wpm,mistake, cpm, date)
  SELECT user.id, user.fname,user.lname, user.email,NEW.result_id, NEW.level, NEW.wpm, NEW.mistake, NEW.cpm, NEW.date
  FROM user
  WHERE user.uname = NEW.uname;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `email` varchar(356) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `uname`, `password`, `cpassword`, `email`) VALUES
(1, 'adarshaa', 'shakyaa', 'ad1', '$2y$10$qIa2pDTpkZrw/3E7rW5.5./jzES49D/lnon2rx/FK7Qxli4CNu1qi', '$2y$10$QAHYeKNFNJ2sZzmxWtPMuuaTV4bLXoMfI8pbIrpTer8LWunQf1DoK', 'adaashakya@gmail.com'),
(2, 'ash', 'ss', 'ss', '$2y$10$itdkpDfLuUsCRctSWln3gu0ieLid.ctBRwSLuajOS4JRIXSrrC3Tu', '$2y$10$q3LKPv8aX.bgTJ43tfgbAO9faIa4/H.Tjau/YKFniaUjVbcPVTuq.', 'templeshakya@gmail.com');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_delete_result` AFTER DELETE ON `user` FOR EACH ROW begin
delete from result
where uname=old.uname;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update` BEFORE UPDATE ON `user` FOR EACH ROW BEGIN
    update download set fname=new.fname, lname= new.lname, email=new.email where id=new.id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
