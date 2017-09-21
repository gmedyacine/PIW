
ALTER TABLE `ipw_files` CHANGE  `heure_lib` `heure_lib` VARCHAR(25) NOT NULL; 

ALTER TABLE  `ipw_create_report` ADD  `report_categ` INT DEFAULT NULL;

ALTER TABLE  `ipw_create_report` ADD  `report_sous_categ` INT DEFAULT NULL;

DROP TABLE `ipw_rename_report`;

ALTER TABLE `ipw_chart` ADD `chartTitle`  VARCHAR(30) NOT NULL AFTER `chartType`;

--
-- Créer une catégorie Archive .. pour archver les fichiers supprimés
--
INSERT INTO `ipw_lib_categ‏` (`lib_categ_id`, `lib_categ`, `commentaire`, `added_by`, `added_at`) VALUES
(1, 'Archive', 'un dossier qui contient les fichiers supprimé', '1', '2017-08-25 12:44:26');

--
-- ajouter un champ Archived .. pour archver les catégories supprimées
--
ALTER TABLE  `ipw_report_categ` ADD  `archived` INT DEFAULT 0;

--
-- il y a un espace invisible dans le nom de la colonne il faudrait l'enlever
--
ALTER TABLE `ipw_lib_sous_categ‏` CHANGE  `lib_sous_categ‏_nom` `lib_sous_categ_nom` VARCHAR(250) NOT NULL; 