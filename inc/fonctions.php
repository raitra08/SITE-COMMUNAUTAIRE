<?php
include_once 'connection.php';

function get_all_lines($sql){
    $req = mysqli_query(dbconnect(), $sql);
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
    $req = mysqli_query(dbconnect(), $sql);
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

function uploaderImage($image){

    $nomImage = time() . "_" . $image['name'];

    $destination = "../uploads/" . $nomImage;

    move_uploaded_file(
        $image['tmp_name'],
        $destination
    );

    return "uploads/" . $nomImage;
}


function get_produit($id){
    $id = (int) $id;
    $sql = "SELECT * FROM produit WHERE id_produit = $id";
    return get_one_line($sql);
}

function get_all_produits(){
    $sql = "SELECT * FROM produit ORDER BY nom";
    return get_all_lines($sql);
}

function insert_produit_membre($id_produit, $id_membre, $prix_vente, $quantite_dispo, $date_dispo){
    $connect = dbconnect();
    $stmt = mysqli_prepare($connect, "INSERT INTO produit_membre (id_produit, id_membre, prix_vente, quantite_dispo, date_dispo) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die('Erreur SQL : ' . mysqli_error($connect));
    }

    mysqli_stmt_bind_param($stmt, 'iidis', $id_produit, $id_membre, $prix_vente, $quantite_dispo, $date_dispo);

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        die('Erreur SQL : ' . mysqli_error($connect));
    }

    $insert_id = mysqli_insert_id($connect);
    mysqli_stmt_close($stmt);
    return $insert_id;
}


// function get_produits_membre_en_vente(){
//     $sql = "SELECT pm.id_produit_membre, p.nom, c.nom_categorie, m.nom AS vendeur, pm.prix_vente, pm.quantite_dispo, pm.date_dispo
//             FROM produit_membre pm
//             JOIN produit p ON pm.id_produit = p.id_produit
//             JOIN categorie c ON p.id_categorie = c.id_categorie
//             JOIN membre m ON pm.id_membre = m.id_membre
//             WHERE pm.quantite_dispo > 0
//             ORDER BY pm.id_produit_membre DESC";
//     return get_all_lines($sql);
// }

function get_all_produits_en_vente(){
    $sql = "SELECT 
                pm.id_produit_membre,
                p.nom,
                pm.prix_vente,
                pm.quantite_dispo,
                pm.date_dispo,
                m.nom AS vendeur
            FROM produit_membre pm
            JOIN produit p 
            ON pm.id_produit = p.id_produit
            JOIN membre m
            ON pm.id_membre = m.id_membre
            WHERE pm.quantite_dispo > 0
            ORDER BY pm.date_dispo DESC";

    return get_all_lines($sql);
}


function add_achat_dans_vente($id_produit_membre, $quantite_achat){

    $sql1 = "SELECT id_produit_membre
             FROM produit_membre
             WHERE id_produit_membre = $id_produit_membre";

    $result = get_one_line($sql1);

    if(!$result){
        echo "Produit introuvable";
        return false;
    }
    


    $sql2 = "INSERT INTO vente(date, heure, id_produit_membre, quantite)
             VALUES(CURDATE(), CURTIME(), $id_produit_membre, $quantite_achat)";


    if(!mysqli_query(dbconnect(), $sql2)){
        echo mysqli_error(dbconnect());
        return false;
    }

    return true;
}


function traitement_achat($id_produit_membre, $quantite_achat){

    $sql1 = "SELECT quantite_dispo 
             FROM produit_membre
             WHERE id_produit_membre = $id_produit_membre";

    $produit = get_one_line($sql1);

    if(!$produit){
        return false;
    }

    $quantite_dispo = $produit['quantite_dispo'];

    if($quantite_achat > $quantite_dispo){
        return false;
    }


    if(!add_achat_dans_vente($id_produit_membre, $quantite_achat)){
        return false;
    }


    $sql2 = "UPDATE produit_membre
             SET quantite_dispo = quantite_dispo - $quantite_achat
             WHERE id_produit_membre = $id_produit_membre";


    if(!mysqli_query(dbconnect(), $sql2)){
        return false;
    }


    return true;
}

?>