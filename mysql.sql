CREATE DATABASE greenspace;

USE greenspace;

CREATE TABLE categorias (
	cat_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cat_slug VARCHAR(45) UNIQUE KEY NOT NULL
);

CREATE TABLE usuarios (
	usr_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usr_username VARCHAR(45) UNIQUE KEY NOT NULL,
    usr_password VARCHAR(45) NOT NULL,
    usr_email VARCHAR(45) NOT NULL,
    usr_role VARCHAR(45) NOT NULL
);

CREATE TABLE posts (
	post_id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    post_title VARCHAR(45) NOT NULL,
    post_featured_img TEXT NOT NULL,
    post_date DATETIME NOT NULL,
   	fk_cat_id INTEGER,
    FOREIGN KEY(fk_cat_id) REFERENCES categorias(cat_id)
);

INSERT INTO usuarios (usr_username, usr_password, usr_email, usr_role) values ('admin','admin', 'web@greenspace.com', 'admin');

INSERT INTO categorias (cat_slug) values ('marketing'); 
INSERT INTO categorias (cat_slug) values ('meio pomba');
INSERT INTO categorias (cat_slug) values ('sei la');
INSERT INTO categorias (cat_slug) values ('hmmmmmm');

INSERT INTO posts (post_title, post_featured_img, post_date, fk_cat_id) values ('M A R K E T I N G', 'almie.jpg', current_timestamp(), 1);
INSERT INTO posts (post_title, post_featured_img, post_date, fk_cat_id) values ('Mantenham o decoro, oxe', 'rlinha.jpg', current_timestamp(), 4);
INSERT INTO posts (post_title, post_featured_img, post_date, fk_cat_id) values ('Pru', 'aaaa.jpg', current_timestamp(), 3);
INSERT INTO posts (post_title, post_featured_img, post_date, fk_cat_id) values ('Achei meio pomba..', 'pomba.jpg', current_timestamp(), 2);
INSERT INTO posts (post_title, post_featured_img, post_date, fk_cat_id) values ('Torcedor do botafogo', 'topper.jpg', current_timestamp(), 4);




