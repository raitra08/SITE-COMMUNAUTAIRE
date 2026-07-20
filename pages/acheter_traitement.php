<?php

include_once "../inc/fonctions.php";

$id_produit_membre = $_POST['id_produit_membre'];
$quantite = $_POST['quantite'];

acheter_produit($id_produit_membre, $quantite);

header("Location: accueil.php");
exit();

?>
