<?php

include_once "../inc/connection.php";
include_once "../inc/fonctions.php";

$id_produit_membre = (int)$_POST['id_produit_membre'];
$quantite_achat = (int)$_POST['quantite_achat'];
    
if (traitement_achat($id_produit_membre, $quantite_achat)) {
    header("Location: accueil.php");
    exit();
} 

else {
    echo "Stock insuffisant.";
}
?>