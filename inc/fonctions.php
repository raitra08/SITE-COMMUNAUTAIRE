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

// function get_all_produits_en_vente($id_membre){

//     $sql = "SELECT
//                 pm.id_produit_membre,
//                 p.nom,
//                 pm.prix_vente,
//                 pm.quantite_dispo,
//                 pm.date_dispo

//             FROM produit_membre pm

//             JOIN produit p
//             ON pm.id_produit = p.id_produit

//             WHERE pm.id_membre != $id_membre
//             AND pm.quantite_dispo > 0

//             ORDER BY pm.date_dispo DESC";

//     return get_all_lines($sql);
// }


// function acheter_produit($id_produit_membre, $quantite){

//     $sql = "INSERT INTO vente(date, heure, id_produit_membre, quantite)
//             VALUES(CURDATE(), CURTIME(), $id_produit_membre, $quantite)";
//     mysqli_query(dbconnect(), $sql);

//     $sql = "UPDATE produit_membre
//             SET quantite_dispo = quantite_dispo - $quantite
//             WHERE id_produit_membre = $id_produit_membre";
//     mysqli_query(dbconnect(), $sql);
// }

function get_mes_ventes($id_membre){

    $sql = "
        SELECT
            produit.nom,
            produit_membre.prix_vente,
            SUM(vente.quantite) AS quantite_vendue,
            SUM(produit_membre.prix_vente * vente.quantite) AS montant

        FROM vente

        JOIN produit_membre
        ON vente.id_produit_membre = produit_membre.id_produit_membre

        JOIN produit
        ON produit_membre.id_produit = produit.id_produit

        WHERE produit_membre.id_membre = $id_membre

        GROUP BY produit.nom, produit_membre.prix_vente
    ";

    return get_all_lines($sql);
}

function get_total_ventes($id_membre){

    $sql = "
        SELECT
            SUM(pm.prix_vente * v.quantite) AS total

        FROM vente v

        JOIN produit_membre pm
        ON v.id_produit_membre = pm.id_produit_membre

        WHERE pm.id_membre = $id_membre
    ";

    return get_one_line($sql);
}

?>

