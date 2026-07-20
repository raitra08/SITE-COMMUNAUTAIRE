<?php

session_start();

include_once "../inc/fonctions.php";


$nom = $_POST['nom'];

$numero = $_SESSION['numero_etu'];


$image = NULL;


if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

    $image = uploaderImage($_FILES['image']);

}


ajouter_membre($nom, $numero, $image);



$membre = connecter_membre($numero);


$_SESSION['id_membre'] = $membre['id_membre'];
$_SESSION['nom'] = $membre['nom'];


header("Location: accueil.php");

?>