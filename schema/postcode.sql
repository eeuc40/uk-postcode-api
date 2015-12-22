--
-- Table structure for table `postcode`
--

CREATE TABLE IF NOT EXISTS `postcode` (
  `postcode` varchar(7) NOT NULL,
  `position_quality_indicator` int(11) NOT NULL,
  `eastings` int(11) NOT NULL,
  `northings` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `nhs_regional_code` varchar(10) NOT NULL,
  `nhs_code` varchar(10) NOT NULL,
  `county_code` varchar(10) NOT NULL,
  `district_code` varchar(10) NOT NULL,
  `ward_code` varchar(10) NOT NULL,
  PRIMARY KEY (`postcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
