UPDATE menu SET link="", parentid=0, displayorder=4, accesslevel=90 WHERE id="15";
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('settings','modules/base/adminsettings.php',15,10,2,2,'2006-10-16 05:19:30','2006-10-19 21:32:14',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('modules','search.php?id=21',15,99,2,2,'2006-10-16 05:20:31','2006-10-19 21:32:53',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('menu','search.php?id=19',15,30,2,2,'2006-10-16 05:21:14','2006-10-19 21:33:14',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('table definitions','search.php?id=11',15,80,2,2,'2006-10-16 05:21:59','2006-10-19 21:33:59',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('files','search.php?id=26',15,30,2,2,'2006-10-16 05:22:31','2006-10-19 21:34:08',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('users','search.php?id=9',15,20,2,2,'2006-10-16 05:23:27','2006-10-19 21:32:36',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('----','N/A',15,15,2,2,'2006-10-19 15:26:58','2006-10-19 21:33:32',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('reports','search.php?id=16',15,50,2,2,'2006-10-19 15:42:58','2006-10-19 21:43:19',-90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('relationships','search.php?id=10',15,60,2,2,'2006-10-19 15:44:10','2006-10-19 21:44:10',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('Saved Searchs/Sorts','search.php?id=17',15,40,2,2,'2006-10-19 15:44:54','2006-10-19 21:44:54',90);
INSERT INTO `menu` (name,link,parentid,displayorder,createdby,modifiedby,creationdate,modifieddate,accesslevel) VALUES ('----','N/A',15,45,2,2,'2006-10-19 15:45:18','2006-10-19 21:45:18',90);
ALTER TABLE tablecolumns CHANGE COLUMN `format` `format` enum('date','time','currency','boolean','datetime','filelink','noencoding') default NULL;
UPDATE tablecolumns SET format="noencoding" WHERE `column` like "%<%";
UPDATE tablecolumns SET name="inherent" WHERE id=93;
ALTER TABLE users ADD COLUMN admin tinyint(4) NOT NULL DEFAULT 0;
ALTER TABLE users ADD COLUMN portalaccess tinyint(4) NOT NULL DEFAULT 0;
CREATE TABLE `roles` (`id` INTEGER UNSIGNED DEFAULT NULL AUTO_INCREMENT, `name` VARCHAR(64) NOT NULL,`description` TEXT,`inactive` tinyint(4) NOT NULL,`createdby` INTEGER UNSIGNED,`creationdate` DATETIME,`modifiedby` INTEGER UNSIGNED,`modifieddate` TIMESTAMP,PRIMARY KEY(`id`))TYPE = MyISAM;
INSERT INTO `roles` (`id`,`name`,`description`,`inactive`,`createdby`,`creationdate`,`modifiedby`) VALUES (10,'shipping','Basic user access only.',0,1,NOW(),1);
INSERT INTO `roles` (`id`,`name`,`description`,`inactive`,`createdby`,`creationdate`,`modifiedby`) VALUES (20,'sales','Power User.',0,1,NOW(),1);
INSERT INTO `roles` (`id`,`name`,`description`,`inactive`,`createdby`,`creationdate`,`modifiedby`) VALUES (30,'sales manager','',0,1,NOW(),1);
INSERT INTO `roles` (`id`,`name`,`description`,`inactive`,`createdby`,`creationdate`,`modifiedby`) VALUES (50,'upper manager','',0,1,NOW(),1);
CREATE TABLE `rolestousers` (`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT, `userid` INTEGER UNSIGNED NOT NULL, `roleid` INTEGER UNSIGNED NOT NULL, PRIMARY KEY(`id`)) TYPE = MYISAM;
UPDATE users SET admin=1 WHERE accesslevel>=90;
UPDATE users SET portalaccess=1 WHERE accesslevel<0;
UPDATE users set accesslevel=0 WHERE  accesslevel<0 or accesslevel>=90;
ALTER TABLE menu CHANGE accesslevel roleid int(11) NOT NULL default '0';
UPDATE tablecolumns SET name='access', `column`='if(menu.roleid=0,\'EVERYONE\',if(menu.roleid=-100,\'Administrators\',roles.name))',sortorder='' WHERE id=88;
UPDATE tabledefs SET querytable="((menu LEFT JOIN menu as parentmenu on menu.parentid=parentmenu.id) LEFT JOIN roles on menu.roleid=roles.id)" WHERE id=19;
UPDATE menu SET roleid=0 WHERE roleid<0;
UPDATE menu SET roleid=-100 WHERE roleid>=90;
UPDATE menu SET roleid=-100 WHERE parentid=15;
UPDATE menu SET roleid=0 WHERE parentid=14 or id=14;
ALTER TABLE tabledefs ADD COLUMN searchroleid int(11) NOT NULL DEFAULT 0;
ALTER TABLE tabledefs ADD COLUMN addroleid int(11) NOT NULL DEFAULT 0;
ALTER TABLE tabledefs ADD COLUMN editroleid int(11) NOT NULL DEFAULT 0;
ALTER TABLE tabledefs ADD COLUMN advsearchroleid int(11) NOT NULL DEFAULT -100;
ALTER TABLE tabledefs ADD COLUMN viewsqlroleid int(11) NOT NULL DEFAULT -100;
UPDATE tabledefs set searchroleid=-100,addroleid=-100,editroleid=-100 WHERE moduleid=1 AND id IN(21,26,19,10,11,9,200,17);
UPDATE tableoptions set accesslevel=0 WHERE accesslevel <0;
UPDATE tableoptions set accesslevel=-100 WHERE accesslevel >=90;
ALTER TABLE tableoptions CHANGE accesslevel roleid int(11) NOT NULL default '0';
UPDATE tablefindoptions set accesslevel=0 WHERE accesslevel <0;
UPDATE tablefindoptions set accesslevel=0 WHERE accesslevel =11;
UPDATE tablefindoptions set accesslevel=-100 WHERE accesslevel >=90;
ALTER TABLE tablefindoptions CHANGE accesslevel roleid int(11) NOT NULL default '0';
UPDATE files set accesslevel=0 WHERE accesslevel <0;
UPDATE files set accesslevel=-100 WHERE accesslevel >=90;
ALTER TABLE files CHANGE accesslevel roleid int(11) NOT NULL default '0';
UPDATE usersearches set accesslevel=0 WHERE accesslevel <0;
UPDATE usersearches set accesslevel=-100 WHERE accesslevel >=90;
ALTER TABLE usersearches CHANGE accesslevel roleid int(11) NOT NULL default '0';
UPDATE reports set accesslevel=0 WHERE accesslevel <0;
UPDATE reports set accesslevel=-100 WHERE accesslevel >=90;
ALTER TABLE reports CHANGE accesslevel roleid int(11) NOT NULL default '0';
ALTER TABLE `users` DROP COLUMN `accesslevel`;
INSERT INTO `settings` (`name`, `value`) VALUES ('phone_format','US - Loose');
UPDATE `menu` SET `name` ='configuration', `roleid` =0 WHERE `name` ='settings';
UPDATE `menu` SET `name` ='Settings', `roleid` =0 WHERE `name` ='Admin';
INSERT INTO `menu` (`name`, `link`, `parentid`, `displayorder`, `createdby`, `modifiedby`, `creationdate`, `modifieddate`, `roleid`) VALUES ('my account','modules/base/myaccount.php',6,-10,1,1,NOW(),NOW(),0);
INSERT INTO `menu` (`name`, `link`, `parentid`, `displayorder`, `createdby`, `modifiedby`, `creationdate`, `modifieddate`, `roleid`) VALUES ('----','',6,-5,1,1,NOW(),NOW(),0);
CREATE TABLE `scheduler` (`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,`name` VARCHAR(45),`job` VARCHAR(128),`crontab` VARCHAR(64),`lastrun` DATETIME, `startdatetime` DATETIME, `enddatetime` DATETIME, `description` TEXT, `inactive` TINYINT UNSIGNED NOT NULL DEFAULT 0, `createdby` INTEGER UNSIGNED, `creationdate` DATETIME, `modifiedby` INTEGER UNSIGNED, `modifieddate` TIMESTAMP, PRIMARY KEY(`id`) )ENGINE = MYISAM;
INSERT INTO `settings` (`name`, `value`) VALUES ('date_format','English, US');
INSERT INTO `settings` (`name`, `value`) VALUES ('time_format','12 Hour');