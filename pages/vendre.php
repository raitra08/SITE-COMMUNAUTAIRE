<?php
include_once '../inc/connection.php';
include '../inc/fonctions.php';

$produits = get_all_produits();
if (!$produits) {
    die('Produit introuvable.');
}

$selectedProduit = null;
if (isset($_GET['id'])) {
    foreach ($produits as $produit) {
        if ($produit['id_produit'] == $_GET['id']) {
            $selectedProduit = $produit;
            break;
        }
    }
}
$id = isset($_GET['id']) ? $_GET['id'] : 0;
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche de vente</title>
</head>
<body>

<h1>Fiche de vente</h1>
<p><a href="accueil.php">Retour à l'accueil</a></p>

<form action="traitement_vente.php" method="post">


    <p>Produit :
        <select name="id_produit">

            <option value="">Sélectionner un produit</option>

            <?php foreach ($produits as $produit): ?>
            
                <option value="<?= $produit['id_produit'] ?>" 
                    <?= ($produit['id_produit'] == $id) ? 'selected' : '' ?>>
                    <?= $produit['nom'] ?>
                </option>
            
            <?php endforeach; ?>
        
        </select>
    </p>

 

    <p>Prix de vente :
        <input type="number" name="prix_vente" step="0.01" min="0" value="<?= $selectedProduit ? htmlspecialchars((string) $selectedProduit['prix_reference']) : '' ?>">
    </p>

    <p>Quantité disponible :
        <input type="number" name="quantite_dispo" min="1" value="1">
    </p>

    <p>Date disponible :
        <input type="date" name="date_disponible" required>
    </p>

    <p><input type="submit" value="Vendre"></p>

</form>

</body>
</html>