ALTER TABLE `blackout_series` ADD `announce_id` INT NULL AFTER `repeat_options`;

ALTER TABLE `reservation_series` CHANGE `title` `title` VARCHAR(85) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;