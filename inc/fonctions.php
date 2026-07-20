<?php
include_once 'connection.php';

function get_all_lines($sql){
    //echo $sql;
    $req = mysqli_query(dbconnect(),$sql );
    if (!$req) {
        die('Erreur SQL : ' . mysqli_error(dbconnect()));
    }
    $result = array();
    while ($line = mysqli_fetch_assoc($req)) {
        $result[] = $line;
    }
    mysqli_free_result($req);
    return $result;
}

function get_one_line($sql){

    $req = mysqli_query(dbconnect(),$sql );
    if (!$req) {
        die('Erreur SQL : ' . mysqli_error(dbconnect()));
    }
    $result = mysqli_fetch_assoc($req);
    mysqli_free_result($req);
    return $result;
}

function connecter_membre($ETU){
    $sql = "SELECT * FROM membre where numero_etu= '$ETU'";
    return get_one_line($sql); 
}

function ajouter_membre($nom, $numero, $image = NULL){
    if($image!= null){
        $sql = "INSERT INTO membre (nom,numero_etu,image_profil) VALUES ('$nom','$numero','$image')";
    }
    else{
        $sql = "INSERT INTO membre (nom,numero_etu) VALUES ('$nom','$numero')";
    }
    mysqli_query(dbconnect(), $sql);
}
?>