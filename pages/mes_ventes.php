<?php
session_start();

include_once "../inc/fonctions.php";

$ventes = get_mes_ventes($_SESSION['id_membre']);

$total = get_total_ventes($_SESSION['id_membre']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($ventes as $vente){ ?>

Produit : <?= $vente['nom']; ?><br>

Prix : <?= $vente['prix_vente']; ?> Ar<br>

Quantité vendue : <?= $vente['quantite_vendue']; ?><br>

Montant : <?= $vente['montant']; ?> Ar

<hr>

<?php } ?>

<h2>
Total gagné :
<?= $total['total']; ?> Ar
</h2>
</body>
</html>