#create database antimaterDimension;
use antimaterDimension;
DROP TABLE IF EXISTS commande;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS categorie ;
DROP TABLE IF EXISTS clients ;

CREATE TABLE clients(
code_client int primary key,
nom varchar(30),
prenom varchar(30),
email varchar(50),
genre varchar(6),
metier varchar(30),
date_de_naissance datetime,
 date_de_contact datetime);

CREATE TABLE compte(
id int PRIMARY KEY,
pseudo varchar(30) UNIQUE,
mdp varchar(30),
code_client int,
 FOREIGN KEY(code_client) REFERENCES clients(code_client));

CREATE TABLE categorie(
id int primary key,
nom varchar(30));

CREATE TABLE produit(
id int primary key,
nom varchar(30),
quantite_en_stock int,
id_categorie int,
photo varchar(50),
text_description varchar(200),
prix int,
FOREIGN KEY(id_categorie) REFERENCES categorie (id));

CREATE TABLE commande(
code_client int NOT NULL,
id_produit int NOT NULL,
quantite_commande int,
FOREIGN KEY(code_client) REFERENCES clients (code_client),
FOREIGN KEY(id_produit) REFERENCES produit (id),
PRIMARY KEY(code_client,id_produit));

INSERT INTO categorie VALUE (1,'Celestial');
INSERT INTO categorie VALUE (2,'Glyph');
INSERT INTO categorie VALUE (3,'Succes');

INSERT INTO produit VALUE(1,'Teresa',10,1,'','Teresa, celestial des realités',1);
INSERT INTO produit VALUE(2,'Effarig',10,1,'','Effarig, celestial des anciennes reliques',1);
INSERT INTO produit VALUE(3,'Anonyme',10,1,'','L\'anonyme, celestial des prisoniers',1);
INSERT INTO produit VALUE(4,'V',10,1,'','V, celestial des succes',1);
INSERT INTO produit VALUE(5,'Ra',10,1,'','Ra, celestial de l\'oublie',1);
INSERT INTO produit VALUE(6,'Lai\'tela',10,1,'','Lai\'tela, celestial de l\'antimatiere',1);

INSERT INTO produit VALUE(7,'Glyphe de puissance',10,2,'','Amplifie la puissance des dimensions d\'antimatiere',1);
INSERT INTO produit VALUE(8,'Glyphe de l\'infini',10,2,'','Amplifie la puissance des dimensions d\'infini',1);
INSERT INTO produit VALUE(9,'Glyphe de temps',10,2,'','Amplifie la puissance des dimensions temporelles',1);
INSERT INTO produit VALUE(10,'Glyphe de replication',10,2,'','Amplification des reproduction des replicantis',1);
INSERT INTO produit VALUE(11,'Glyphe de dilatation',10,2,'','Amplifie la puissance des dimensions d\'antimatiere lors de la dilatation',1);
INSERT INTO produit VALUE(12,'Glyphe d\'Effarig',10,2,'','',1);
INSERT INTO produit VALUE(13,'Glyphe de la realite',10,2,'','',1);


