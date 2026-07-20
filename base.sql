CREATE DATABASE site_communautaire;

USE site_communautaire;

CREATE TABLE membre(
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    numero_etu VARCHAR(20) NOT NULL UNIQUE,
    image_profil VARCHAR(255)
);

CREATE TABLE categorie(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(50) NOT NULL
);

CREATE TABLE produit(
    id_produit INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    id_categorie INT NOT NULL,
    prix_reference DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)
);

CREATE TABLE produit_membre(
    id_produit_membre INT PRIMARY KEY AUTO_INCREMENT,
    id_produit INT NOT NULL,
    id_membre INT NOT NULL,
    prix_vente DECIMAL(10,2) NOT NULL,
    quantite_dispo INT NOT NULL,
    date_dispo DATE NOT NULL,
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);

CREATE TABLE vente(
    id_vente INT PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    id_produit_membre INT NOT NULL,
    quantite INT NOT NULL,
    FOREIGN KEY (id_produit_membre) REFERENCES produit_membre(id_produit_membre)
);


INSERT INTO membre(nom, numero_etu, image_profil) VALUES
('Alice Dupont', 'ETU0001', 'alice.jpg'),
('Bob Martin', 'ETU0002', 'bob.jpg'),
('Charlie Durand', 'ETU0003', 'charlie.jpg'),
('David Petit', 'ETU0004', 'david.jpg'),
('Eva Moreau', 'ETU0005', 'eva.jpg'),
('François Leroy', 'ETU0006', 'francois.jpg'),
('Gabrielle Simon', 'ETU0007', 'gabrielle.jpg'),
('Hugo Bernard', 'ETU0008', 'hugo.jpg'),
('Isabelle Lefevre', 'ETU0009', 'isabelle.jpg'),
('Julien Roux', 'ETU0010', 'julien.jpg');


INSERT INTO categorie(nom_categorie) VALUES
('Plat'),
('Boisson'),
('Snack'),
('Dessert');

INSERT INTO produit(nom, id_categorie, prix_reference) VALUES
('Pizza Margherita', 1, 8.50),
('Burger Classique', 1, 7.00),
('Salade César', 1, 6.50),
('Coca-Cola', 2, 2.00),
('Jus Orange', 2, 2.50),
('Eau Minérale', 2, 1.50),
('Chips', 3, 1.00),
('Barre Chocolatée', 3, 1.20),
('Glace Vanille', 4, 3.00),
('Tarte aux Pommes', 4, 4.00),
('Pâtes Carbonara', 1, 9.00),
('Smoothie Fraise', 2, 3.50),
('Croissant', 3, 1.80),
('Mousse au Chocolat', 4, 3.50),
('Wrap Poulet', 1, 7.50);


INSERT INTO produit_membre(id_produit, id_membre, prix_vente, quantite_dispo, date_dispo) VALUES
(1,1,9.00,10,'2026-07-20'),
(2,2,7.50,15,'2026-07-20'),
(3,3,6.80,20,'2026-07-20'),
(4,4,2.20,30,'2026-07-20'),
(5,5,2.70,25,'2026-07-20'),
(6,6,1.60,40,'2026-07-20'),
(7,7,1.10,50,'2026-07-20'),
(8,8,1.30,35,'2026-07-20'),
(9,9,3.20,20,'2026-07-20'),
(10,10,4.20,15,'2026-07-20'),
(11,1,9.50,12,'2026-07-20'),
(12,2,3.80,18,'2026-07-20'),
(13,3,2.00,22,'2026-07-20'),
(14,4,3.80,28,'2026-07-20'),
(15,5,8.00,16,'2026-07-20'),
(1,6,8.80,8,'2026-07-20'),
(4,7,2.10,20,'2026-07-20'),
(10,8,4.10,10,'2026-07-20'),
(15,9,7.80,12,'2026-07-20'),
(2,10,7.20,18,'2026-07-20');
