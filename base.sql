CREATE DATABASE site_communautaire;

USE site_communautaire;

CREATE TABLE membre(
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    numero_etu VARCHAR(20) NOT NULL UNIQUE,
    image_profil VARCHAR(255) NULL
);

CREATE TABLE categorie(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(50) NOT NULL
);

CREATE TABLE produit(
    id_produit INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    id_categorie INT NOT NULL,
    prix_reference DECIMAL(10,2) NOT NULL
);

CREATE TABLE produit_membre(
    id_produit_membre INT PRIMARY KEY AUTO_INCREMENT,
    id_produit INT NOT NULL,
    id_membre INT NOT NULL,
    prix_vente DECIMAL(10,2) NOT NULL,
    quantite_dispo INT NOT NULL,
    date_dispo DATE NOT NULL
);

CREATE TABLE vente(
    id_vente INT PRIMARY KEY AUTO_INCREMENT,
    date_vente DATE NOT NULL,
    heure TIME NOT NULL,
    id_produit_membre INT NOT NULL,
    quantite INT NOT NULL
);

INSERT INTO membre (id_membre, nom, numero_etu, image_profil) VALUES
(1, 'Alice Dupont', 'ETU0001', 'alice.jpg'),
(2, 'Bob Martin', 'ETU0002', 'bob.jpg'),
(3, 'Charlie Durand', 'ETU0003', 'charlie.jpg'),
(4, 'David Petit', 'ETU0004', 'david.jpg'),
(5, 'Eva Moreau', 'ETU0005', 'eva.jpg'),
(6, 'François Leroy', 'ETU0006', 'francois.jpg'),
(7, 'Gabrielle Simon', 'ETU0007', 'gabrielle.jpg'),
(8, 'Hugo Bernard', 'ETU0008', 'hugo.jpg'),
(9, 'Isabelle Lefevre', 'ETU0009', 'isabelle.jpg'),
(10, 'Julien Roux', 'ETU0010', 'julien.jpg');

INSERT INTO categorie (id_categorie, nom_categorie) VALUES
(1, 'Plat'),
(2, 'Boisson'),
(3, 'Snack'),
(4, 'Dessert');

INSERT INTO produit (id_produit, nom, id_categorie, prix_reference) VALUES
(1, 'Pizza Margherita', 1, 8.50),
(2, 'Burger Classique', 1, 7.00),
(3, 'Salade César', 1, 6.50),
(4, 'Coca-Cola', 2, 2.00),
(5, 'Jus orange', 2, 2.50),
(6, 'Eau minérale', 2, 1.50),
(7, 'Chips', 3, 1.00),
(8, 'Barre chocolatée', 3, 1.20),
(9, 'Glace vanille', 4, 3.00),
(10, 'Tarte aux pommes', 4, 4.00),
(11, 'Pâtes Carbonara', 1, 9.00),
(12, 'Smoothie fraise', 2, 3.50),
(13, 'Croissant', 3, 1.80),
(14, 'Mousse au chocolat', 4, 3.50),
(15, 'Wrap poulet', 1, 7.50);

INSERT INTO produit_membre (id_produit, id_membre, prix_vente, quantite_dispo, date_dispo) VALUES
(1, 1, 9.00, 10, '2024-06-01'),
(2, 2, 7.50, 15, '2024-06-02'),
(3, 3, 6.80, 20, '2024-06-03'),
(4, 4, 2.20, 30, '2024-06-04'),
(5, 5, 2.70, 25, '2024-06-05'),
(6, 6, 1.60, 40, '2024-06-06'),
(7, 7, 1.10, 50, '2024-06-07'),
(8, 8, 1.30, 35, '2024-06-08'),
(9, 9, 3.20, 20, '2024-06-09'),
(10, 10, 4.20, 15, '2024-06-10'),
(11, 1, 9.50, 12, '2024-06-11'),
(12, 2, 3.80, 18, '2024-06-12'),
(13, 3, 2.00, 22, '2024-06-13'),
(14, 4, 3.80, 28, '2024-06-14'),
(15, 5, 8.00, 16,'2024-06-15');






