<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

include_once "../inc/fonctions.php";


if(isset($_POST['nom'])){

    $nom = $_POST['nom'];

    $numero = $_SESSION['numero_etu'];


    $image = NULL;

    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

        $image = $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/".$image
        );

    }

    ajouter_membre($nom, $numero, $image);

    $membre = connecter_membre($numero);

    $_SESSION['id_membre'] = $membre['id_membre'];
    $_SESSION['nom'] = $membre['nom'];
    $_SESSION['numero_etu'] = $membre['numero_etu'];


    header("Location: accueil.php");
    exit();

}

else{

    header("Location: inscription.php");
    exit();

}

?>