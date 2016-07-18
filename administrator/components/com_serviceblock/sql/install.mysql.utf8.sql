DROP TABLE IF EXISTS `#__serviceblock`;
 
CREATE TABLE `#__serviceblock` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`asset_id` INT(10)     NOT NULL DEFAULT '0',
	`catid`	    INT(11)    NOT NULL DEFAULT '0',
	`menuitem_id` INT(11)    NOT NULL,
	`blocktitle` VARCHAR(100) NOT NULL,
	`blocktitle_size` tinyint(2) NOT NULL,
	`blocktitle_height` tinyint(2) NOT NULL,
	`svgpath` TEXT NOT NULL,
	`viewportwidth` INT(10) NOT NULL DEFAULT '0',
	`viewportheight` INT(10) NOT NULL DEFAULT '0',
	`viewboxwidth` INT(10) NOT NULL DEFAULT '0',
	`viewboxheight` INT(10) NOT NULL DEFAULT '0',
	`blockmessage` TEXT NOT NULL,
	`params`   VARCHAR(1024) NOT NULL DEFAULT '',
	`state` tinyint(1) NOT NULL default '0',
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;