CREATE TABLE `leaverequests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctorId` int(11) NOT NULL,
  `leaveType` varchar(255) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `doctorId` (`doctorId`),
  CONSTRAINT `leaverequests_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;