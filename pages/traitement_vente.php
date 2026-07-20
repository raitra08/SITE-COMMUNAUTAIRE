<?php
session_start();

include_once '../inc/connection.php';
include_once '../inc/fonctions.php';

if (!isset($_SESSION['membre_id'])) {
    header("Location: index.php");
    exit();
}

$id_produit = (int)$_POST['id_produit'];
$id_membre = $_SESSION['membre_id'];
$prix_vente = $_POST['prix_vente'];
$quantite_dispo = $_POST['quantite_dispo'];
$date_dispo = $_POST['date_disponible'];

insert_produit_membre(
    $id_produit,
    $id_membre,
    $prix_vente,
    $quantite_dispo,
    $date_dispo
);

header("Location: accueil.php");
exit();