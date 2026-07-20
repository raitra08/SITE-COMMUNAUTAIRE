<?php

session_start();

include_once "../inc/fonctions.php";

$ventes = get_mes_ventes($_SESSION['id_membre']);
$total = get_total_ventes($_SESSION['id_membre']);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mes ventes</title>
</head>
<body>
<h1>Mes ventes</h1>

<a href="accueil.php">
Retour accueil
</a>

<br><br>
<?php foreach($ventes as $vente){ ?>
Produit :
<?= $vente['nom']; ?>
<br>

Prix :
<?= $vente['prix_vente']; ?> Ar
<br>

Quantité vendue :
<?= $vente['quantite_vendue']; ?>
<br>

Montant :
<?= $vente['montant']; ?> Ar
<hr>
<?php } ?>

<h2>
Total gagné :
<?= $total['total']; ?> Ar
</h2>



</body>

</html>