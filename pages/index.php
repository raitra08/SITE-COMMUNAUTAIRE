<?php
session_start();
include_once '../inc/connection.php';
include '../inc/fonctions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bouton_connexion'])) {
    $numero = trim((string) ($_POST['numero'] ?? ''));
    $membre = connecter_membre($numero);

    if ($membre) {
        $_SESSION['membre_id'] = (int) $membre['id_membre'];
        $_SESSION['membre_nom'] = $membre['nom'];
        header('Location: ../accueil.php');
        exit;
    }

    $message = 'Numéro étudiant introuvable.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGE LOGIN</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if ($message !== '') : ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form action="acceuil.php" method="post">
        <label>Numero ETU :</label><br>
        <input type="text" name="numero" required><br><br>
        <button type="submit" name="bouton_connexion">Se connecter</button>
    </form>

</body>
</html>