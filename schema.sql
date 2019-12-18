DROP DATABASE `task-force`;
CREATE DATABASE `task-force`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE `task-force`;

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(64) NOT NULL,
  `avatar` VARCHAR(64) DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(64) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `date_birth` DATETIME NOT NULL,
  `city_id` INT NOT NULL,
  `rating` INT DEFAULT 0,
  `date_active` DATETIME DEFAULT NOW(),
  `date_register` DATETIME DEFAULT NOW(),
  `tel` VARCHAR(64) DEFAULT NULL,
  `skype` VARCHAR(64) DEFAULT NULL,
  `contacts` VARCHAR(64) DEFAULT NULL,
  `show_contacts` BIT DEFAULT 1,
  `show_profile` BIT DEFAULT 1,
  `is_customer` BIT DEFAULT 1,
  `profile_views` INT DEFAULT 0,
  `failed_tasks_count` INT DEFAULT 0
);

CREATE TABLE `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(64) NOT NULL
);

CREATE TABLE `user_photos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `path` VARCHAR(64) DEFAULT NULL
);

CREATE TABLE `user_favorites` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `favorite_id` INT NOT NULL
);

CREATE TABLE `user_specializations` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `category_id` INT NOT NULL
);

CREATE TABLE `tasks` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(64) NOT NULL,
  `status` VARCHAR(64) DEFAULT 'Новое',
  `description` VARCHAR(255) DEFAULT NULL,
  `category_id` INT NOT NULL,
  `budget` INT DEFAULT NULL,
  `date_expire` DATETIME NOT NULL,
  `date_create` DATETIME DEFAULT NOW(),
  `coords` VARCHAR(64) DEFAULT NULL,
  `city_id` INT DEFAULT NULL,
  `contractor_id` INT DEFAULT NULL,
  `customer_id` INT NOT NULL
);

CREATE TABLE `task_files` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `task_id` INT NOT NULL,
  `file_path` VARCHAR(64) DEFAULT NULL
);

CREATE TABLE `cities` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(64) NOT NULL
);

/* отклики */
CREATE TABLE `responses` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `task_id` INT NOT NULL,
  `contractor_id` INT NOT NULL,
  `date_create` DATETIME DEFAULT NOW(),
  `price` INT NOT NULL,
  `comment` VARCHAR(64) NOT NULL
);

/* отзывы */
CREATE TABLE `reviews` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `task_id` INT NOT NULL,
  `comment` VARCHAR(64) DEFAULT NULL,
  `mark` INT NOT NULL,
  `contractor_id` INT NOT NULL,
  `customer_id` INT NOT NULL
);

CREATE TABLE `messages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `task_id` INT NOT NULL,
  `date_create` DATETIME DEFAULT NOW(),
  `user_id` INT NOT NULL,
  `is_customer` BIT DEFAULT 0 /* пока не уверен, что это нужно */
);

CREATE TABLE `notifications` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `type` VARCHAR(64) DEFAULT NULL,
  `name` VARCHAR(64) DEFAULT NULL,
  `task_id` INT NOT NULL,
  `user_id`  INT NOT NULL
);



