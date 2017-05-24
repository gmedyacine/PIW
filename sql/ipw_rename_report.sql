
--
-- Structure de la table `ipw_rename_report`
--

CREATE TABLE IF NOT EXISTS `ipw_rename_report` (
  `id_rename_report` int(11) NOT NULL AUTO_INCREMENT,
  `renamed_by` int(11) NOT NULL,
  `new_report_name` varchar(35) NOT NULL,
  `old_report_name` varchar(35) NOT NULL,
  PRIMARY KEY (`id_rename_report`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE  `ipw_rename_report` ADD  `old_report_id` INT
