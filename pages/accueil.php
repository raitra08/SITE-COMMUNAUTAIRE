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
    <h1>Bienvenue sur le site de vente entre étudiants</h1>
    <h3>Vous êtes connecté(e) en tant que : <?php echo $_SESSION['nom'];?></h3>
    <a href="vendre.php">Proposer un produit en vente</a>
    <a href="mes_ventes.php">Mes ventes</a>
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
        <?= $produit['vendeur']; ?>
    </p>

<form action="traitement_achat.php" method="post">

    <input type="hidden"
           name="id_produit_membre"
           value="<?= $produit['id_produit_membre']; ?>">

    <p>
        Quantité à acheter :
        <input
            type="number"
            name="quantite_achat"
            min="1"
            max="<?= $produit['quantite_dispo']; ?>"
            value="1">
    </p>

    <input type="submit" value="Acheter">

</form>

    <!-- <p>Quantité à acheter :
        <input type="number" name="quantite_achat"
                min="1" max="<?= $produit['quantite_dispo']; ?>"
                value="1">
    </p>
        <a href="traitement_achat.php?id_produit_membre=<?= $produit['id_produit_membre']; ?>">Acheter</a> -->

        <form action="acheter_traitement.php" method="POST">
        <input type="hidden" name="id_produit_membre" value="<?= $produit['id_produit_membre']; ?>">

        Quantité :

        <input type="number" name="quantite" min="1" max="<?= $produit['quantite_dispo']; ?>"
            required>

        <button type="submit">
            Acheter
        </button>

    </form>

    </div>

<?php } ?>
</body>
</html>

