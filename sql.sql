DROP DATABASE IF EXISTS `justin_chat`;
CREATE DATABASE `justin_chat`;


-- GRANT ALL ON `chat`.* TO 'ajax-chat-user'@'localhost' IDENTIFIED BY 'We LOVE SQL !';

USE `justin_chat`;

CREATE TABLE `user` (
    `id`    INT AUTO_INCREMENT PRIMARY KEY,
    `username`  VARCHAR(64) NOT NULL,
    `pass` VARCHAR (64) NOT NULL
);

CREATE TABLE `message` (
    `id`    INT AUTO_INCREMENT PRIMARY KEY,
    `text` VARCHAR(512) NOT NULL,
    `date` VARCHAR(32) NOT NULL,
    `user_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`)
 );