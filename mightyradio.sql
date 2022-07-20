/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 8.0.28-0ubuntu0.20.04.3 : Database - mightyradio
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*Table structure for table `app_settings` */

DROP TABLE IF EXISTS `app_settings`;

CREATE TABLE `app_settings` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `key` varchar(255) DEFAULT NULL,
    `value` longtext,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
	`id` bigint unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) DEFAULT NULL,
	`logo` text,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `slider` */

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `url` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` TINYINT UNSIGNED DEFAULT '1' COMMENT '0-Inactive, 1- Active',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `station` */

DROP TABLE IF EXISTS `station`;

CREATE TABLE `station` (
	`id` bigint unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) DEFAULT NULL,
	`category_id` bigint unsigned DEFAULT NULL,
	`logo` text,
	`url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
	`is_popular` tinyint unsigned DEFAULT '1' COMMENT '0-No, 1- Yes',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id` int unsigned NOT NULL AUTO_INCREMENT,
	`email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
	`password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
	`first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
	`last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`first_name`,`last_name`) values (1,'admin@admin.com','21232f297a57a5a743894a0e4a801fc3','Admin','Admin');
