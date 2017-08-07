
ALTER TABLE `ipw_files` CHANGE  `heure_lib` `heure_lib` VARCHAR(25) NOT NULL; 

ALTER TABLE  `ipw_create_report` ADD  `report_categ` INT DEFAULT NULL;

ALTER TABLE  `ipw_create_report` ADD  `report_sous_categ` INT DEFAULT NULL;

DROP TABLE `ipw_rename_report`;

ALTER TABLE `ipw_chart` ADD `chartTitle`  VARCHAR(30) NOT NULL AFTER `chartType`;