DROP TABLE IF EXISTS `#__svglink`;
 
CREATE TABLE `#__svglink` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`asset_id` INT(10)     NOT NULL DEFAULT '0',
	`menuitem_id` INT(11)    NOT NULL,
	`linktitle` VARCHAR(100) NOT NULL,
	`linktitle_size` tinyint(2) NOT NULL,
	`svgpath` TEXT NOT NULL,
	`svgcolor` VARCHAR(30) NOT NULL DEFAULT '#000',
	`viewportwidth` INT(10) NOT NULL DEFAULT '0',
	`viewportheight` INT(10) NOT NULL DEFAULT '0',
	`viewboxwidth` INT(10) NOT NULL DEFAULT '0',
	`viewboxheight` INT(10) NOT NULL DEFAULT '0',
	`show_title`   tinyint(1) NOT NULL default '0',
	`state` tinyint(1) NOT NULL default '0',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;