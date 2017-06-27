
--
-- Structure de la table `ipw_report_categ`
--

CREATE TABLE IF NOT EXISTS `ipw_report_categ` (
  `id_report_categ` int(11) NOT NULL AUTO_INCREMENT,
  `nom_report_categ` varchar(25) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_at` datetime NOT NULL,
  PRIMARY KEY (`id_report_categ`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ipw_report_categ`
--

INSERT INTO `ipw_report_categ` (`id_report_categ`, `nom_report_categ`, `added_by`, `added_at`) VALUES
(1, 'Finance', 1, '2017-05-17 08:56:14'),
(2, 'Telecom', 1, '2017-05-17 08:55:01'),
(3, 'Comptabilité', 1, '2017-05-17 09:48:28'),
(4, 'RH', 1, '2017-05-17 09:55:01'),
(5, 'VEGA', 1, '2017-05-17 10:27:47');

