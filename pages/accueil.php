<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

include_once "../inc/fonctions.php";

$produits = get_all_produits_en_vente($_SESSION['id_membre']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accueil</title>
</head>
<body>
<h1>
Bienvenue sur le site de vente entre étudiants
</h1>
<h3>
Connecté en tant que :
<?php echo $_SESSION['nom']; ?>
</h3>
<a href="vendre.php">
Proposer un produit en vente
</a>
<br>
<a href="mes_ventes.php">
Mes ventes
</a>
<?php foreach($produits as $produit){ ?>

<div class="produit">
<h3>
<?php echo $produit['nom']; ?>
</h3>

<p>

Prix :

<?php echo $produit['prix_vente']; ?> Ar

</p>
<p>

Quantité disponible :

<?php echo $produit['quantite_dispo']; ?>

</p>
<p>

Disponible depuis :

<?php echo $produit['date_dispo']; ?>

</p>




<p>

Vendeur :

<?php echo $produit['vendeur']; ?>

</p>
<form action="traitement_achat.php" method="post">
<input type="hidden"

name="id_produit_membre"

value="<?php echo $produit['id_produit_membre']; ?>">
<p>

Quantité à acheter :

<input

type="number"

name="quantite_achat"

min="1"

max="<?php echo $produit['quantite_dispo']; ?>"

value="1"

required>
</p>
<input type="submit" value="Acheter">
</form>

</div>
<?php } ?>
</body>

</html>