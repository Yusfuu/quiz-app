CREATE DATABASE quizapp;

USE quizapp;

CREATE TABLE users (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    email CHAR(50) NOT NULL,
    fullname CHAR(50) NOT NULL,
    username CHAR(50) UNIQUE ,
    password CHAR(255) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE account (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    avatar CHAR(255) DEFAULT 'default',
    description TEXT DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE scores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT ,
    score INT DEFAULT 0,
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE = InnoDB;