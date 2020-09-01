CREATE DATABASE recipe_book

use recipe_book;

CREATE TABLE recipes (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	recipename VARCHAR(30) NOT NULL,
	ingredients VARCHAR(50) NOT NULL,
	recipe VARCHAR(30) NOT NULL,
    difficulty VARCHAR(30) NOT NULL,
	date TIMESTAMP
)