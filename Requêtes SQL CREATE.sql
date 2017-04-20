CREATE DATABASE youtof;
USE youtof;

CREATE TABLE `picture` (
    `id` SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `legend` TINYTEXT,
    `upload_date` DATETIME NOT NULL,
    `resolution` FLOAT(4,2) NOT NULL,
    `filesize` MEDIUMINT UNSIGNED NOT NULL,
   `uploader_id` TINYINT UNSIGNED NOT NULL
    );
    
    
CREATE TABLE `user` (
    `id` TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `email` VARCHAR(60) NOT NULL
);

CREATE TABLE `gallery`(
    `id` SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(20) NOT NULL
);

CREATE TABLE `picture_gallery` (
    `picture_id` SMALLINT UNSIGNED NOT NULL,
    `gallery_id` SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (picture_id, gallery_id)
);