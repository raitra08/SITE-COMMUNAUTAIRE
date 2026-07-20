<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

include_once "../inc/fonctions.php";

if(isset($_POST['numero'])){

    $numero = $_POST['numero'];

    $membre = connecter_membre($numero);

    if($membre != null){

        $_SESSION['id_membre'] = $membre['id_membre'];
        $_SESSION['nom'] = $membre['nom'];
        $_SESSION['numero_etu'] = $membre['numero_etu'];

        header("Location: accueil.php");
        exit();

    }

    else{

        $_SESSION['numero_etu'] = $numero;

        header("Location: inscription.php");
        exit();

    }

}

else{

    header("Location: login.php");
    exit();

}

?>




