<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-03-17 11:41:00 --> Severity: Notice --> Undefined variable: home /var/www/html/book/application/controllers/Book.php 1164
ERROR - 2020-03-17 11:41:00 --> Severity: Notice --> Undefined variable: home /var/www/html/book/application/controllers/Book.php 1166
ERROR - 2020-03-17 11:47:23 --> Severity: Notice --> Undefined variable: home /var/www/html/book/application/controllers/Book.php 1173
ERROR - 2020-03-17 11:47:23 --> Severity: Notice --> Undefined variable: home /var/www/html/book/application/controllers/Book.php 1174
ERROR - 2020-03-17 11:47:23 --> Severity: Notice --> Undefined variable: home /var/www/html/book/application/controllers/Book.php 1175
ERROR - 2020-03-17 11:47:23 --> Severity: Warning --> Division by zero /var/www/html/book/application/controllers/Book.php 1177
ERROR - 2020-03-17 11:49:11 --> Severity: Notice --> Undefined index: image /var/www/html/book/application/controllers/Book.php 356
ERROR - 2020-03-17 11:51:21 --> Query error: Unknown column 'supervisor_id' in 'where clause' - Invalid query: SELECT `id`, `business_name`, `owner_name`, `phone`
FROM `business_register`
WHERE `supervisor_id` = '1'
ERROR - 2020-03-17 11:51:41 --> Query error: Unknown column 'supervisor_id' in 'field list' - Invalid query: SELECT `id`, `business_name`, `owner_name`, `phone`, `supervisor_id`
FROM `business_register`
WHERE `supervisor_id` = '1'
ERROR - 2020-03-17 12:51:48 --> Severity: Notice --> Undefined variable: cash /var/www/html/book/application/controllers/Book.php 1200
ERROR - 2020-03-17 12:51:48 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1201
ERROR - 2020-03-17 12:51:48 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1202
ERROR - 2020-03-17 12:51:48 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1203
ERROR - 2020-03-17 13:12:11 --> Severity: Notice --> Undefined variable: total /var/www/html/book/application/controllers/Book.php 1181
ERROR - 2020-03-17 15:16:47 --> Query error: Can't DROP 'current_date'; check that column/key exists - Invalid query: ALTER TABLE `business_register` DROP COLUMN `current_date`
ERROR - 2020-03-17 15:25:12 --> Query error: Can't DROP 'supervioser_id'; check that column/key exists - Invalid query: ALTER TABLE `business_register` DROP COLUMN `supervioser_id`
ERROR - 2020-03-17 15:26:23 --> Query error: Can't DROP 'supervioser_id'; check that column/key exists - Invalid query: ALTER TABLE `business_register` DROP COLUMN `supervioser_id`
ERROR - 2020-03-17 15:28:52 --> Severity: Notice --> Undefined offset: 0 /var/www/html/book/application/models/Book_model.php 175
ERROR - 2020-03-17 15:28:52 --> Severity: Notice --> Undefined offset: 0 /var/www/html/book/application/models/Book_model.php 179
ERROR - 2020-03-17 15:28:52 --> Severity: Notice --> Undefined offset: 0 /var/www/html/book/application/models/Book_model.php 179
ERROR - 2020-03-17 15:28:52 --> Severity: Warning --> array_merge(): Argument #1 is not an array /var/www/html/book/application/models/Book_model.php 179
ERROR - 2020-03-17 15:29:26 --> Query error: Unknown column 'supervisor_id' in 'where clause' - Invalid query: SELECT `id`, `business_name`, `owner_name`, `phone`
FROM `business_register`
WHERE `supervisor_id` = '1'
ERROR - 2020-03-17 15:35:27 --> Query error: Duplicate column name 'location' - Invalid query: ALTER TABLE `business_register`
	ADD `superviser_id` VARCHAR(200),
	ADD `current_date` VARCHAR(200),
	ADD `comment` VARCHAR(200),
	ADD `location` VARCHAR(200),
	ADD `stock` VARCHAR(200),
	ADD `busy_shop` VARCHAR(200)
ERROR - 2020-03-17 18:41:22 --> Severity: Notice --> Undefined index: create_at /var/www/html/book/application/models/Book_model.php 708
ERROR - 2020-03-17 18:41:22 --> Severity: Notice --> Undefined index: create_at /var/www/html/book/application/models/Book_model.php 708
ERROR - 2020-03-17 18:41:22 --> Severity: Notice --> Undefined index: create_at /var/www/html/book/application/models/Book_model.php 708
ERROR - 2020-03-17 18:48:28 --> Query error: Unknown column '$supervisor_id' in 'field list' - Invalid query: SELECT `id`, `business_name`, `owner_name`, `phone`, `$supervisor_id`
FROM `business_register`
WHERE `supervisor_id` = '1'
ERROR - 2020-03-17 19:01:43 --> Severity: error --> Exception: syntax error, unexpected '%' /var/www/html/book/application/models/Book_model.php 725
ERROR - 2020-03-17 19:09:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '. MONTH, '%Y-%m-01') AND last_day(NOW() - INTERVAL .03. MONTH)' at line 3 - Invalid query: SELECT id,amount,created_at 
                FROM daily_sales_purchases
                WHERE daily_sales_purchases.created_at BETWEEN date_format(NOW() - INTERVAL .03. MONTH, '%Y-%m-01') AND last_day(NOW() - INTERVAL .03. MONTH)
ERROR - 2020-03-17 19:26:18 --> Severity: Notice --> Undefined variable: cash /var/www/html/book/application/controllers/Book.php 1206
ERROR - 2020-03-17 19:26:18 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1207
ERROR - 2020-03-17 19:26:18 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1208
ERROR - 2020-03-17 19:26:18 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1209
ERROR - 2020-03-17 19:26:29 --> Severity: Notice --> Undefined variable: cash /var/www/html/book/application/controllers/Book.php 1206
ERROR - 2020-03-17 19:26:29 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1207
ERROR - 2020-03-17 19:26:29 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1208
ERROR - 2020-03-17 19:26:29 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1209
ERROR - 2020-03-17 19:41:12 --> Severity: Notice --> Undefined variable: cash_amount_data /var/www/html/book/application/controllers/Book.php 1202
ERROR - 2020-03-17 19:41:12 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1203
ERROR - 2020-03-17 19:41:12 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1204
ERROR - 2020-03-17 19:41:12 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1205
ERROR - 2020-03-17 19:43:32 --> Severity: Notice --> Undefined variable: cash_amount_data /var/www/html/book/application/controllers/Book.php 1202
ERROR - 2020-03-17 19:43:32 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1203
ERROR - 2020-03-17 19:43:32 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1204
ERROR - 2020-03-17 19:43:32 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1205
ERROR - 2020-03-17 19:43:40 --> Severity: Notice --> Undefined variable: cash_amount_data /var/www/html/book/application/controllers/Book.php 1202
ERROR - 2020-03-17 19:43:40 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1203
ERROR - 2020-03-17 19:43:40 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1204
ERROR - 2020-03-17 19:43:40 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1205
ERROR - 2020-03-17 19:43:54 --> Severity: Notice --> Undefined variable: cash_amount_data /var/www/html/book/application/controllers/Book.php 1202
ERROR - 2020-03-17 19:43:54 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1203
ERROR - 2020-03-17 19:43:54 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1204
ERROR - 2020-03-17 19:43:54 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1205
ERROR - 2020-03-17 19:44:23 --> Severity: Notice --> Undefined variable: cash /var/www/html/book/application/controllers/Book.php 1206
ERROR - 2020-03-17 19:44:23 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1207
ERROR - 2020-03-17 19:44:23 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1208
ERROR - 2020-03-17 19:44:23 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1209
ERROR - 2020-03-17 19:44:31 --> Severity: Notice --> Undefined variable: cash /var/www/html/book/application/controllers/Book.php 1206
ERROR - 2020-03-17 19:44:31 --> Severity: Notice --> Undefined variable: credit /var/www/html/book/application/controllers/Book.php 1207
ERROR - 2020-03-17 19:44:31 --> Severity: Notice --> Undefined variable: av /var/www/html/book/application/controllers/Book.php 1208
ERROR - 2020-03-17 19:44:31 --> Severity: Notice --> Undefined variable: av1 /var/www/html/book/application/controllers/Book.php 1209
