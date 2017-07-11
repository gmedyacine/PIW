
--
-- Structure de la table `ipw_report_sous_categ`
--

CREATE TABLE IF NOT EXISTS `ipw_report_sous_categ` (
  `id_report_sous_categ` int(11) NOT NULL AUTO_INCREMENT,
  `report_categ` int(11) NOT NULL,
  `nom_report_sous_categ` varchar(25) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_at` datetime NOT NULL,
  PRIMARY KEY (`id_report_sous_categ`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
