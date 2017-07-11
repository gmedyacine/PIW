
--
-- Structure de la table `id_create_report`
--

CREATE TABLE IF NOT EXISTS `ipw_create_report` (
  `id_create_report` int(11) NOT NULL AUTO_INCREMENT,
  `renamed_by` int(11) NOT NULL,
  `new_report_name` varchar(35) NOT NULL,
  `old_report_name` varchar(35) NOT NULL,
  PRIMARY KEY (`id_create_report`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ipw_reports_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report` varchar(35) NOT NULL,
  `created_date` timestamp NOT NULL default current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
