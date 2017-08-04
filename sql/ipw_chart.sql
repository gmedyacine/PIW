

--
-- Structure de la table `ipw_chart`
--

CREATE TABLE IF NOT EXISTS `ipw_chart` (
  `id_chart` int(11) NOT NULL AUTO_INCREMENT,
  `id_report` int(11) NOT NULL,
  `chartType` varchar(20) NOT NULL,
  `chartX` varchar(35) NOT NULL,
  `chartY` varchar(35) NOT NULL,
  `multi` varchar(254) NOT NULL,
  PRIMARY KEY (`id_chart`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
