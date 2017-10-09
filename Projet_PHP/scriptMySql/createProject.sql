CREATE DATABASE IF NOT EXISTS project CHARACTER SET utf8
COLLATE utf8_general_ci;

USE project;


CREATE TABLE users (
	user_id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    mdp TEXT NOT NULL,
    droits INT NOT NULL DEFAULT 1,
    CONSTRAINT pk_users PRIMARY KEY(user_id)
)ENGINE=InnoDB;

CREATE TABLE cartes (
    nom VARCHAR(255) NOT NULL,
    type INT NOT NULL,
    classe VARCHAR(255) NOT NULL,
    cout VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    poussieres INT NOT NULL,
    carte_id INT NOT NULL AUTO_INCREMENT,
    CONSTRAINT pk_cartes PRIMARY KEY(carte_id)
)ENGINE=InnoDB;

CREATE TABLE deck (
    nom VARCHAR(255) NOT NULL,
    deck_id INT NOT NULL AUTO_INCREMENT,
    user INT NOT NULL,
    classe VARCHAR(255) NOT NULL,
    CONSTRAINT pk_deck PRIMARY KEY (deck_id),
	CONSTRAINT FK_deck FOREIGN KEY (user) REFERENCES users(user_id) ON DELETE CASCADE
)ENGINE=InnoDB; 

CREATE TABLE lien (
    carte_id INT NOT NULL,
    deck_id INT NOT NULL,
	CONSTRAINT FK_lien FOREIGN KEY (deck_id) REFERENCES deck(deck_id) ON DELETE CASCADE
)ENGINE=InnoDB;


