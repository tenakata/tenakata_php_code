<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-03-20 11:08:06 --> Query error: Incorrect table definition; there can be only one auto column and it must be defined as a key - Invalid query: CREATE TABLE `training` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(200) NOT NULL,
	`description` TEXT NULL,
	`video` VARCHAR(200) NOT NULL,
	`role` VARCHAR(200) NOT NULL,
	`rating` VARCHAR(200) NOT NULL,
	`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	`updated_at` VARCHAR(200) NOT NULL
) DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2020-03-20 12:09:08 --> Severity: error --> Exception: Argument 1 passed to CI_Form_validation::set_data() must be of the type array, null given, called in /var/www/html/book/application/controllers/Book.php on line 1541 /var/www/html/book/system/libraries/Form_validation.php 267
ERROR - 2020-03-20 12:43:36 --> Severity: Notice --> Undefined variable: rating /var/www/html/book/application/controllers/Book.php 1665
ERROR - 2020-03-20 13:30:21 --> Severity: error --> Exception: Argument 1 passed to CI_Form_validation::set_data() must be of the type array, null given, called in /var/www/html/book/application/controllers/Book.php on line 1697 /var/www/html/book/system/libraries/Form_validation.php 267
ERROR - 2020-03-20 13:30:53 --> Severity: error --> Exception: Argument 1 passed to CI_Form_validation::set_data() must be of the type array, null given, called in /var/www/html/book/application/controllers/Book.php on line 1697 /var/www/html/book/system/libraries/Form_validation.php 267
ERROR - 2020-03-20 13:33:13 --> Severity: Notice --> Undefined variable: sorting_type /var/www/html/book/application/controllers/Book.php 1725
ERROR - 2020-03-20 13:35:33 --> Severity: error --> Exception: syntax error, unexpected '}' /var/www/html/book/application/models/Book_model.php 1006
ERROR - 2020-03-20 13:57:08 --> Severity: Notice --> Undefined variable: Perpage /var/www/html/book/application/models/Book_model.php 1018
ERROR - 2020-03-20 13:57:08 --> Severity: Warning --> Division by zero /var/www/html/book/application/models/Book_model.php 1019
ERROR - 2020-03-20 13:57:08 --> Severity: Notice --> Undefined variable: page /var/www/html/book/application/models/Book_model.php 1021
ERROR - 2020-03-20 13:57:08 --> Severity: Notice --> Undefined variable: page /var/www/html/book/application/models/Book_model.php 1023
ERROR - 2020-03-20 13:57:08 --> Severity: Notice --> Undefined variable: timeSQL /var/www/html/book/application/models/Book_model.php 1030
ERROR - 2020-03-20 13:57:55 --> Severity: Notice --> Undefined variable: timeSQL /var/www/html/book/application/models/Book_model.php 1018
ERROR - 2020-03-20 14:01:47 --> Severity: Notice --> Undefined variable: timeSQL /var/www/html/book/application/models/Book_model.php 1011
ERROR - 2020-03-20 14:01:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT * FROM daily_sales_purchases WHERE 
ERROR - 2020-03-20 14:56:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' and '2020-03-18' at line 1 - Invalid query:  select * from daily_sales_purchases where created_at between  2020-03-12' and '2020-03-18 
ERROR - 2020-03-20 15:01:47 --> Severity: error --> Exception: syntax error, unexpected 'else' (T_ELSE) /var/www/html/book/application/models/Book_model.php 1025
ERROR - 2020-03-20 15:04:26 --> Severity: Notice --> Undefined variable: id /var/www/html/book/application/models/Book_model.php 1030
