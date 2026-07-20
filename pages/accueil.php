<?php
include_once "../inc/connection.php";
include_once "../inc/fonctions.php";

$produits = get_all_produits_en_vente();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur le site de vente entre étudiants</h1>
    <?php foreach($produits as $produit){ ?>

<div class="produit">

    <h3>
        <?= $produit['nom']; ?>
    </h3>

    <p>
        Prix :
        <?= $produit['prix_vente']; ?> Ar
    </p>

    <p>
        Quantité disponible :
        <?= $produit['quantite_dispo']; ?>
    </p>

    <p>
        Disponible depuis :
        <?= $produit['date_dispo']; ?>
    </p>

    
        <a href="acheter.php?id=<?= $produit['id_produit_membre']; ?>">Acheter</a>

</div>

<?php } ?>
</body>
</html>