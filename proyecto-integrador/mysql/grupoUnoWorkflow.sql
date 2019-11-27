CREATE DATABASE grupoUnoWorkflow;
USE grupoUnoWorkflow;

CREATE TABLE post (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	text VARCHAR(300),
	image VARCHAR(400),
	likes INT,
	user_id INT(10) UNSIGNED DEFAULT NULL,
    create_at DATETIME NOT NULL
);

CREATE TABLE comment (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	creation_date DATETIME NOT NULL,
	modify_date DATETIME,
	text VARCHAR(300) NOT NULL,
	image VARCHAR(400),
	likes INT,
	user_id INT(10) UNSIGNED DEFAULT NULL,
	post_id INT(10) UNSIGNED DEFAULT NULL
);

CREATE TABLE team (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(15) NOT NULL,
	area VARCHAR(15) NOT NULL,
	creation_date DATETIME NOT NULL,
	modify_date DATETIME
);

CREATE TABLE profile (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	telephone_number INT(15),
	skills VARCHAR(100),
	social_networks VARCHAR(100),
	birthday_date DATETIME NOT NULL,
	image VARCHAR(400),
	education VARCHAR(100),
	user_id INT(10) UNSIGNED DEFAULT NULL
);

CREATE TABLE user (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
	email VARCHAR(100) NOT NULL,
    password VARCHAR(255),
    password_verify VARCHAR(255),
	remember_me BOOLEAN,
	administrator BOOLEAN,
    create_at DATE NOT NULL,
	team_id INT(10) UNSIGNED DEFAULT NULL
);

select * from users;
select * from posts;

show users;