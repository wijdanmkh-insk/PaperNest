CREATE DATABASE IF NOT EXIST papernest
USE papernest

CREATE TABLE users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_username VARCHAR(255) NOT NULL UNIQUE,
    user_firstname VARCHAR(500) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_created VARCHAR(255) NOT NULL 
)
