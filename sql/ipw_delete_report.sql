--
-- Structure de la table `ipw_delete_report`
--

CREATE TABLE IF NOT EXISTS `ipw_delete_report` (
  `id_delete_report` int(11) NOT NULL AUTO_INCREMENT,
  `deleted_by` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_report` int(11) NOT NULL,
  PRIMARY KEY (`id_delete_report`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
