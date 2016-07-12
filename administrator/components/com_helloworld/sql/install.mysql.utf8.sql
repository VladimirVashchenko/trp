DROP TABLE IF EXISTS `#__helloworld`;
 
CREATE TABLE `#__helloworld` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`asset_id` INT(10)     NOT NULL DEFAULT '0',
	`catid`	    int(11)    NOT NULL DEFAULT '0',
	`menuitem` int(11)    NOT NULL,
	`greeting` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL,
	`svgpath` TEXT NOT NULL,
	`blockmessage` TEXT NOT NULL,
	`params`   VARCHAR(1024) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
 
INSERT INTO `#__helloworld` (`greeting`) VALUES
('Hello World!'),
('Good bye World!');