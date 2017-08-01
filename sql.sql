DROP DATABASE IF EXISTS `chat`;
CREATE DATABASE `chat`;


GRANT ALL ON `chat`.* TO 'ajax-chat-user'@'localhost' IDENTIFIED BY 'We LOVE SQL !';

USE `chat`;

CREATE TABLE `user` (
    `id`    INT AUTO_INCREMENT PRIMARY KEY,
    `name`  VARCHAR(64) NOT NULL,
    `password` VARCHAR (64) NOT NULL
);

CREATE TABLE `message` (
    `id`    INT AUTO_INCREMENT PRIMARY KEY,
    `text` VARCHAR(512) NOT NULL,
    `date` DATETIME NOT NULL,
    `user_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
 );