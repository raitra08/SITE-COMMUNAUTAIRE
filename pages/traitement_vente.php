<?php
session_start();
include_once '../inc/connection.php';
include '../inc/fonctions.php';

if (!isset($_SESSION['membre_id'])) {
    header('Location: pages/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: vendre.php');
    exit;
}

$id_produit = (int) ($_POST['id_produit'] ?? 0);
$id_membre = (int) $_SESSION['membre_id'];
$prix_vente = (float) ($_POST['prix_vente'] ?? 0);
$quantite_dispo = (int) ($_POST['quantite_dispo'] ?? 0);
$date_dispo = trim((string) ($_POST['date_disponible'] ?? ''));

if ($id_produit <= 0 || $prix_vente <= 0 || $quantite_dispo <= 0 || $date_dispo === '') {
    die('Veuillez remplir tous les champs correctement.');
}

insert_produit_membre($id_produit, $id_membre, $prix_vente, $quantite_dispo, $date_dispo);
header('Location: accueil.php');
exit;