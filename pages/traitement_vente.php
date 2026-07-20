<?php

error_reporting(E_ALL);
ini_set('display_errors',1);


session_start();

include_once "../inc/fonctions.php";

$id_produit = $_POST['id_produit'];
$prix = $_POST['prix_vente'];
$quantite = $_POST['quantite_dispo'];
$date = $_POST['date_disponible'];
$id_membre = $_SESSION['id_membre'];




insert_produit_membre($id_produit,$id_membre,$prix,$quantite,$date);

header("Location: accueil.php");

exit();


?>